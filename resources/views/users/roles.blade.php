@extends('layouts.master')

@section('title')
    <title>Set Role</title>
@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
                <h1>Set Role</h1>
                <ol class="breadcrumb">
                    <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Beranda</a></li>
                    <li><a href="{{route('users.index')}}"> User</a></li>
                    <li class="active">Role</li>
                </ol>
            </section>
                <!-- Content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title"> Set Role </h3>
                            </div>

                            <div class="box-body">

                            <form action="{{ route('users.set_role', $user->id) }}" method="post">
                                @csrf
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nama</th>
                                                <td>:</td>
                                                <td>{{ $user->name }}</td>
                                            </tr>
                                            <tr>
                                                <th>Email</th>
                                                <td>:</td>
                                                <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                                            </tr>
                                            <tr>
                                                <th>Role</th>
                                                <td>:</td>
                                                <td>
                                                    @foreach ($roles as $row)
                                                    <input type="radio" name="role"
                                                        {{ $user->hasRole($row) ? 'checked':'' }}
                                                        value="{{ $row }}"> {{  $row }} <br>
                                                    @endforeach
                                                </td>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary btn-sm float-right">
                                            Set Role
                                        </button>
                                    </div>
                               </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection
