@extends('layouts.master')

@section('title')
    <title>Manajemen Users | Edit User</title>
@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
                <h1>Manajemen Users</h1>
                <ol class="breadcrumb">
                    <li><a href=" {{ route('home') }}"><i class="fa fa-dashboard"></i> Beranda</a></li>
                    <li class="active">Edit User</li>
                </ol>
            </section>
 <!-- Content -->
 <section class="content">
      <div class="row">
        <div class="col-xs-12">

        <div class="box">
            <div class="box-header">
            <h3>Edit User</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="_method" value="PUT">
                                <div class="form-group">
                                    <label for="">Nama Produk</label>
                                    <input type="text" name="name" required
                                        value="{{ $user->name }}"
                                        class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}">
                                    <p class="text-danger">{{ $errors->first('name') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" name="email" required
                                        value="{{ $user->email }}"
                                        class="form-control {{ $errors->has('email') ? 'is-invalid':'' }}">
                                    <p class="text-danger">{{ $errors->first('email') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="">Username</label>
                                    <input type="text" name="username" required
                                        value="{{ $user->username }}"
                                        class="form-control {{ $errors->has('username') ? 'is-invalid':'' }}">
                                    <p class="text-danger">{{ $errors->first('username') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="">No. HP</label>
                                    <input type="text" name="no_hp" required
                                        value="{{ $user->no_hp }}"
                                        class="form-control {{ $errors->has('no_hp') ? 'is-invalid':'' }}">
                                    <p class="text-danger">{{ $errors->first('no_hp') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="password" name="password"
                                        class="form-control {{ $errors->has('password') ? 'is-invalid':'' }}">
                                    <p class="text-danger">{{ $errors->first('password') }}</p>
                                    <p class="text-warning">Biarkan kosong, jika tidak ingin mengganti password</p>
                                </div>
                                <div class="form-group">
                                    <label for="">Foto</label>
                                    <input type="file" name="photo" class="form-control">
                                    <p class="text-danger">{{ $errors->first('photo') }}</p>
                                    @if (!empty($user->photo))
                                        <hr>
                                        <img src="{{ asset('uploads/users/' . $user->photo) }}"
                                            alt="{{ $user->name }}"
                                            width="150px" height="150px">
                                    @endif
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-info btn-sm">
                                        <i class="fa fa-refresh"></i> Update
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
