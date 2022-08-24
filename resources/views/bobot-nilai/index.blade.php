@extends('layouts/panel')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Bobot Nilai</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Bobot Nilai</li>
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
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Bobot Nilai</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <a href="/admin/bobot-nilai/input" class="btn btn-primary" style="padding-top: 10px;"><i class="fa fa-plus-circle"></i> Input Data</a>
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>Keterangan</th>
                    <th>Minimal Nilai</th>
                    <th>Grade</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($bobotnilaiList as $data)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="col-sm-4">{{ $data->keterangan }}</td>
                    <td class="col-sm-2">{{ $data->minNilai }}</td>
                    <td class="col-sm-2">{{ $data->grade }}</td>
                    <td>
                        <a href="/admin/bobot-nilai/edit/{{ $data->slug }}" type="button" class="btn btn-success">Edit Data</a>
                        <a href="/admin/bobot-nilai/delete/{{ $data->slug }}" type="button" class="btn btn-danger">Hapus Data</a>
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>No.</th>
                    <th>Keterangan</th>
                    <th>Minimal Nilai</th>
                    <th>Grade</th>
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