@extends('layouts.master')

@section('content')
                <!-- Content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title"> Halaman Beranda </h3>
                            </div>

                            <div class="box-body">

                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                Selamat Datang di Aplikasi Bantu Puskesmas ( Abus ) Versi 0.0.1
                                <br>
                                Abus v.0.0.1 adalah aplikasi versi beta.
                                <br>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection
