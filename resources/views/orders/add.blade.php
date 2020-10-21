@extends('layouts.master')

@section('title')
    <title>Transaksi</title>
@endsection

@section('css')
    <link href="{{ asset('plugins/select2/dist/css/select2.min.css') }}" rel="stylesheet" />
@endsection

@section('content')
 <!-- Content Header (Page header) -->
 <section class="content-header">
    <h1>Transaksi</h1>
        <ol class="breadcrumb">
            <li><a href=" {{ route('home') }}"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active">Transaksi</li>
        </ol>
</section>

<section class="content" id="dw">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title"> Transaksi</h3>
                    </div>
                    <div class="box-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Produk</label>
                                <select name="product_id" id="product_id" class="form-control" required width="100%">
                                    <option value="">Pilih</option>
                                    @foreach ($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->code }} - {{ $product->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Qty</label>
                                <input type="number" name="qty" id="qty" value="1" min="1" class="form-control">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-sm">
                                    <i class="fa fa-shopping-cart"></i> Ke Keranjang
                                </button>
                            </div>
                        </div>

                        <!-- MENAMPILKAN DETAIL PRODUCT -->
                        <div class="col-md-5">
                            <h4>Detail Produk</h4>
                            <div v-if="product.name">
                                <table class="table table-stripped">
                                    <tr>
                                        <th>Kode</th>
                                        <td>:</td>
                                        <td>@{{ product.code }}</td>
                                    </tr>
                                    <tr>
                                        <th width="3%">Produk</th>
                                        <td width="2%">:</td>
                                        <td>@{{ product.name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Harga</th>
                                        <td>:</td>
                                        <td>@{{ product.price | currency }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <!-- MENAMPILKAN IMAGE DARI PRODUCT -->
                        <div class="col-md-3" v-if="product.photo">
                            <img :src="'/uploads/product/' + product.photo"
                                height="150px"
                                width="150px"
                                :alt="product.name">
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection

@section('js')
<script src="{{ asset('plugins/select2/dist/js/select2.min.js') }}"></script>
<script src="{{ asset('plugins/accounting/accounting.min.js') }}"></script>
<script src="{{ asset('js/transaksi.js') }}"></script>
@endsection'
