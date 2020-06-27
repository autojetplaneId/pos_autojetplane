@extends('layouts.master')

@section('content')
                <!-- Content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title"> Tambah Kategori </h3>
                            </div>

                            <div class="box-body">

                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                You are logged in!
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection
