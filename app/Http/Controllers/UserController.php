<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use File;
use Image;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use DB;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('created_at', 'DESC')->paginate(10);
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $role = Role::orderBy('name', 'ASC')->get();
        return view('users.create', compact('role'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users',
            'username' => 'required|string|min:3|unique:users',
            'no_hp' => 'required|string|min:10|unique:users',
            'password' => 'required|min:6|confirmed',
            'role' => 'required|string|exists:roles,name',
            'photo' => 'nullable|image|mimes:jpg,png,jpeg'
        ]);

        try {
            //default $photo = null
            $photo = null;
            //jika terdapat file (Foto / Gambar) yang dikirim
            if ($request->hasFile('photo')) {
                //maka menjalankan method saveFile()
                $photo = $this->saveFile($request->name, $request->file('photo'));
            }


        $user = User::firstOrCreate([
            'email' => $request->email
        ], [
            'name' => $request->name,
            'username' =>$request->username,
            'no_hp' => $request->no_hp,
            'password' => bcrypt($request->password),
            'status' => true,
            'photo' => $photo
        ]);

        $user->assignRole($request->role);
        return redirect(route('users.index'))->with(['success' => 'User: <strong>' . $user->name . '</strong> Ditambahkan']);
        } catch (\Exception $e) {
            //jika gagal, kembali ke halaman sebelumnya kemudian tampilkan error
            return redirect()->back()
                ->with(['error' => $e->getMessage()]);
        }
    }

    private function saveFile($name, $photo)
    {
        //set nama file adalah gabungan antara nama produk dan time(). Ekstensi gambar tetap dipertahankan
        $images = Str::slug($name) . time() . '.' . $photo->getClientOriginalExtension();
        //set path untuk menyimpan gambar
        $path = public_path('uploads/users');

        //cek jika uploads/product bukan direktori / folder
        if (!File::isDirectory($path)) {
            //maka folder tersebut dibuat
            File::makeDirectory($path, 0777, true, true);
        }
        //simpan gambar yang diuplaod ke folrder uploads/produk
        Image::make($photo)->save($path . '/' . $images);
        //mengembalikan nama file yang ditampung divariable $images
        return $images;
    }


    public function edit($id)
    {
        $user = User::findOrFail($id);
        //dd($user);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        //validasi
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'email' => 'required|email|exists:users,email',
            'password' => 'nullable|min:6',
            'username' => 'required|string|min:3|exists:users,username',
            'no_hp' => 'required|string|min:10|exists:users,no_hp',
            'photo' => 'nullable|image|mimes:jpg,png,jpeg'
        ]);


        try {
            //query select berdasarkan id
            $users = User::findOrFail($id);
            $photo = $users->photo;

            //cek jika ada file yang dikirim dari form
            if ($request->hasFile('photo')) {
                //cek, jika photo tidak kosong maka file yang ada di folder uploads/product akan dihapus
                !empty($photo) ? File::delete(public_path('uploads/users/' . $photo)):null;
                //uploading file dengan menggunakan method saveFile() yg telah dibuat sebelumnya
                $photo = $this->saveFile($request->name, $request->file('photo'));
            }

            $password = !empty($request->password) ? bcrypt($request->password):$users->password;

            $users->update([
                'name' => $request->name,
                'username' => $request->username,
                'no_hp' => $request->no_hp,
                'password' => $password,
                'photo' => $photo
            ]);

            return redirect(route('users.index'))
                ->with(['success' => '<strong>' . $users->name . '</strong> Diperbaharui']);
            }
        catch (\Exception $e)
        {
        return redirect()->back()
            ->with(['error' => $e->getMessage()]);
        }
    }

    public function rolePermission(Request $request)
    {
        $role = $request->get('role');

        //Default, set dua buah variable dengan nilai null
        $permissions = null;
        $hasPermission = null;

        //Mengambil data role
        $roles = Role::all()->pluck('name');

        //apabila parameter role terpenuhi
        if (!empty($role)) {
            //select role berdasarkan namenya, ini sejenis dengan method find()
            $getRole = Role::findByName($role);

            //Query untuk mengambil permission yang telah dimiliki oleh role terkait
            $hasPermission = DB::table('role_has_permissions')
                ->select('permissions.name')
                ->join('permissions', 'role_has_permissions.permission_id', '=', 'permissions.id')
                ->where('role_id', $getRole->id)->get()->pluck('name')->all();

            //Mengambil data permission
            $permissions = Permission::all()->pluck('name');
        }
        return view('users.role_permission', compact('roles', 'permissions', 'hasPermission'));
    }

    public function addPermission(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|unique:permissions'
        ]);

        $permission = Permission::firstOrCreate([
            'name' => $request->name
        ]);
        return redirect()->back();
    }

    public function setRolePermission(Request $request, $role)
    {
        //select role berdasarkan namanya
        $role = Role::findByName($role);

        //fungsi syncPermission akan menghapus semua permissio yg dimiliki role tersebut
        //kemudian di-assign kembali sehingga tidak terjadi duplicate data
        $role->syncPermissions($request->permission);
        return redirect()->back()->with(['success' => 'Permission to Role Saved!']);
    }

    public function roles(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all()->pluck('name');
        return view('users.roles', compact('user', 'roles'));
    }

    public function setRole(Request $request, $id)
    {
        $this->validate($request, [
            'role' => 'required'
        ]);

        $user = User::findOrFail($id);
        //menggunakan syncRoles agar terlebih dahulu menghapus semua role yang dimiliki
        //kemudian di-set kembali agar tidak terjadi duplicate
        $user->syncRoles($request->role);
        return redirect()->back()->with(['success' => 'Role Sudah Di Set']);
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with(['success' => 'User: <strong>' . $user->name . '</strong> Dihapus']);
    }



}
