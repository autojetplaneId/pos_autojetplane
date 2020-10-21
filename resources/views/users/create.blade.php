@extends('layouts.master')

@section('title')
    <title>Manajemen Users</title>
@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
                <h1>Manajemen Users</h1>
                <ol class="breadcrumb">
                    <li><a href=" {{ route('home') }}"><i class="fa fa-dashboard"></i> Beranda</a></li>
                    <li class="active">Users</li>
                </ol>
            </section>
 <!-- Content -->
 <section class="content">
      <div class="row">
        <div class="col-xs-12">

        <div class="box">
            <div class="box-header">
            <h3>Tambah User Baru</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{ $message }}
                 </div>
            @endif

            @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{ $message }}
                </div>
            @endif

            <form action="{{ route('users.store') }}"  method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="">Nama</label>
                                    <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" required>
                                    <p class="text-danger">{{ $errors->first('name') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" name="email" class="form-control {{ $errors->has('email') ? 'is-invalid':'' }}" required>
                                    <p class="text-danger">{{ $errors->first('email') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="">Username</label>
                                    <input type="text" name="username" class="form-control {{ $errors->has('username') ? 'is-invalid':'' }}" required>
                                    <p class="text-danger">{{ $errors->first('username') }}</p>
                                </div>
                                {{--JENIS KELAMIN--}}

                                <div class="form-group">
                                    <label for="jenis_kelamin">
                                        <input type="radio" name="jenis_kelamin" value="Laki-laki" > Laki-Laki
                                        <input type="radio" name="jenis_kelamin" value="Perempuan" > Perempuan
                                    </label>
                                </div>

                                <div class="form-group">
                                    <label for="">No. HP</label>
                                    <input type="text" name="no_hp" class="form-control {{ $errors->has('no_hp') ? 'is-invalid':'' }}" required>
                                    <p class="text-danger">{{ $errors->first('no_hp') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid':'' }}" required>
                                    <p class="text-danger">{{ $errors->first('password') }}</p>
                                </div>
                                <div class="form-group">
                                <label for="">Ulangi Password</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Ulangi Password">
                                    <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                                </div>
                                <div class="form-group">
                                    <label for="">Role</label>
                                    <select name="role" class="form-control {{ $errors->has('role') ? 'is-invalid':'' }}" required>
                                        <option value="">Pilih</option>
                                        @foreach ($role as $row)
                                        <option value="{{ $row->name }}">{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                    <p class="text-danger">{{ $errors->first('role') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="">Foto</label>
                                    <input type="file" name="photo" class="form-control">
                                    <p class="text-danger">{{ $errors->first('photo') }}</p>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-sm">
                                        <i class="fa fa-send"></i> Simpan
                                    </button>
                                </div>
                            </form>


            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

@endsection
@push('scripts')
    <script>
    $(function () {
        $('#example1').DataTable()
    })
    </script>
@endpush
