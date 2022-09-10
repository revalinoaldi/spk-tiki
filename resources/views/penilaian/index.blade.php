@extends('layouts/panel')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Penilaian</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Penilaian</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            @if (session('notif'))
            {!! session('notif') !!}
            @endif

          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Penilaian</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <a href="/admin/penilaian/input" class="btn btn-primary" style="padding-top: 10px;"><i class="fa fa-plus-circle"></i> Input Data</a>
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>Kode Penilaian</th>
                    <th>Title</th>
                    <th>Periode Bulan</th>
                    <th>Periode Tahun</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($penilaianList as $data)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->kode_penilaian }}</td>
                    <td>{{ $data->title }}</td>
                    <td>{{ $data->periode_bulan }}</td>
                    <td>{{ $data->periode_tahun }}</td>
                    <td class="col-sm-3">
                        <a href="/admin/penilaian/edit/{{ $data->kode_penilaian }}" type="button" class="btn btn-success btn-sm">Edit Data</a>
                        <a href="/admin/penilaian/delete/{{ $data->kode_penilaian }}" type="button" class="btn btn-danger btn-sm">Hapus Data</a>
                        <a href="/admin/penilaian/proses/{{ $data->kode_penilaian }}" type="button" class="btn btn-info btn-sm">Proses Penilaian</a>
                        <a href="/admin/penilaian/hasil/{{ $data->kode_penilaian }}" type="button" class="btn btn-primary btn-sm">Lihat Penilaian</a>
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No.</th>
                    <th>Kode Penilaian</th>
                    <th>Title</th>
                    <th>Periode Bulan</th>
                    <th>Periode Tahun</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->


            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
