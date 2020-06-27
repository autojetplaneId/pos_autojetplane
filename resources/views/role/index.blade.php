@extends('layouts.master')

@section('title')
    <title>Manajemen Role</title>
@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
                <h1>Manajemen Role</h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
                    <li class="active">Role</li>
                </ol>
            </section>
                <!-- Content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title"> Tambah Role </h3>
                        </div>

                        <div class="box-body">

                                <form role="form" action="{{ route('role.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Role</label>
                                        <input type="text"
                                        name="name"
                                        class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" id="name" required>
                                    </div>

                        </div>
                            <div class="box-footer">
                                <button class="btn btn-primary">Simpan</button>
                            </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-md-8">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title"> Tambah Role </h3>
                        </div>

                            <div class="table-responsive">
                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <strong> {{ $message }} </strong>
                                    </div>
                                @endif

                                @if ($message = Session::get('error'))
                                    <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <strong> {{ $message }} </strong>
                                    </div>
                                @endif
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <td>#</td>
                                            <td>Role</td>
                                            <td>Guard</td>
                                            <td>Created At</td>
                                            <td>Aksi</td>

                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php $no = 1; @endphp
                                        @forelse ($role as $row)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $row->name }}</td>
                                            <td>{{ $row->guard_name }}</td>
                                            <td>{{ $row->created_at }}</td>
                                            <td>
                                                <form action="{{ route('role.destroy', $row->id) }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="5" class="text-center">Tidak ada data</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                                </div>
                                <div class="float-right">
                                    {!! $role->links() !!}
                                </div>

                            </div>
                    </div>
                    </div>
                </div>
            </div>
        </section>
@endsection
