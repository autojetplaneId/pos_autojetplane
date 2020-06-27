@extends('layouts.master')

@section('title')
    <title>Manajemen Kategori</title>
@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
                <h1>Manajemen Kategori</h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
                    <li class="active">Edit Kategori</li>
                </ol>
            </section>
                <!-- Content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title"> Edit Kategori </h3>
                        </div>

                        <div class="box-body">

                                <form role="form" action="{{ route('kategori.update', $categories->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="PUT">
                                    <div class="form-group">
                                        <label for="name">Kategori</label>
                                        <input type="text"
                                        name="name"
                                        value="{{ $categories->name }}"
                                        class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" id="name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Deskripsi</label>

                                        <textarea name="description" id="description" cols="5" rows="5" class="form-control {{ $errors->has('description') ? 'is-invalid':'' }}">{{ $categories->description }}</textarea>
                                    </div>
                        </div>
                            <div class="box-footer">
                                <button class="btn btn-primary">Update</button>
                            </div>
                            </form>
                        </div>
                    </div>


                </div>
            </div>
        </section>
@endsection
