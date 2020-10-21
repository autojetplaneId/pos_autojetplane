<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'jenis_kelamin' =>['required','string'],
            'no_hp' => ['numeric', 'min:11', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $jenis_kelamin = $data['jenis_kelamin'];

        if ($jenis_kelamin === 'Laki-laki'){
            $img_avatar = 'avatar_pria.png';
        } else
            $img_avatar = 'avatar_wanita.png';

        $user =  User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'no_hp' => $data['no_hp'],
            'email' => $data['email'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'photo' => $img_avatar,
            'status' => 'Aktif',
            'level_user' => 'Guest',
            'password' => Hash::make($data['password']),
        ]);

        $user->assignRole('Guest');

        return $user;




    }
}
