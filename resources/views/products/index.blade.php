@extends('layouts.master')

@section('title')
    <title>Manajemen Produk</title>
@endsection

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
                <h1>Manajemen Produk</h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
                    <li class="active">Produk</li>
                </ol>
            </section>
 <!-- Content -->
 <section class="content">
      <div class="row">
        <div class="col-xs-12">

        <div class="box">
            <div class="box-header">
            <a href="{{ route('produk.create') }}"
                class="btn btn-primary">
                <i class="fa fa-edit"></i> Tambah
            </a>
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
              <table id="example1" class="table table-bordered table-hover table-striped">
              <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Produk</th>
                        <th>Stok</th>
                        <th>Harga</th>
                        <th>Kategori</th>
                        <th>Last Update</th>
                        <th>Aksi</th>
                    </tr>
              </thead>
              <tbody>
              @forelse ($products as $row)
                    <tr>
                        <td>
                            @if (!empty($row->photo))
                                <img src="{{ asset('uploads/product/' . $row->photo) }}"
                                    alt="{{ $row->name }}" width="50px" height="50px">
                            @else
                                <img src="http://via.placeholder.com/50x50" alt="{{ $row->name }}">
                            @endif
                        </td>
                        <td>
                            <sup class="label label-success">({{ $row->code }})</sup>
                            <strong>{{ ucfirst($row->name) }}</strong>
                        </td>
                        <td>{{ $row->stock }}</td>
                        <td>Rp {{ number_format($row->price) }}</td>
                        <td>{{ $row->category->name }}</td>
                        <td>{{ $row->updated_at }}</td>
                        <td>
                            <form action="{{ route('produk.destroy', $row->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <a href="{{ route('produk.edit', $row->id) }}"
                                    class="btn btn-warning btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <button class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center">Tidak ada data</td>
                    </tr>
                    @endforelse
              </tbody>
              <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Nama Produk</th>
                        <th>Stok</th>
                        <th>Harga</th>
                        <th>Kategori</th>
                        <th>Last Update</th>
                        <th>Aksi</th>
                    </tr>
              </tfoot>
              </table>
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
        $('#example2').DataTable({
        'paging'      : true,
        'lengthChange': false,
        'searching'   : false,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false
        })
    })
    </script>
@endpush
