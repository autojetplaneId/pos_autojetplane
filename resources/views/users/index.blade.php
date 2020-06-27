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
            <a href="{{ route('users.create') }}"
                class="btn btn-primary">
                <i class="fa fa-edit"></i> Tambah User
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
                        <th>No.</th>
                        <th>Photo</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>No. HP</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
              </thead>
              <tbody>
              @php $no = 1; @endphp
              @forelse ($users as $row)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>
                            @if (!empty($row->photo))
                                <img src="{{ asset('uploads/users/' . $row->photo) }}"
                                    alt="{{ $row->name }}" width="80px" height="80px">
                            @else
                                <img src="http://via.placeholder.com/80x80" alt="{{ $row->name }}">
                            @endif
                        </td>
                        <td>
                            <strong>{{ ucfirst($row->name) }}</strong>
                        </td>
                        <td>{{ $row->email }}</td>
                        <td>{{ $row->username }}</td>
                        <td>{{ $row->no_hp }}</td>
                        <td>
                            @foreach ($row->getRoleNames() as $role)
                                <label for="" class="badge badge-info">{{ $role }}</label>
                            @endforeach
                        </td>
                        <td>
                            @if ($row->status)
                                <label class="badge badge-success">Aktif</label>
                            @else
                                <label for="" class="badge badge-default">Suspend</label>
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('users.destroy', $row->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <a href="{{ route('users.edit', $row->id) }}"
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
    })
    </script>
@endpush
