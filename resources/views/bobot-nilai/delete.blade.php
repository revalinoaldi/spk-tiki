@extends('layouts/panel')

@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Delete Data Jabatan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="/admin/bobot-nilai">Bobot Nilai</a></li>
              <li class="breadcrumb-item active">Delete Data</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Delete Data</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="/admin/bobot-nilai/delete/{{ $bobotnilai->slug }}" method="POST">
                @csrf
                @method('delete')
                <div class="card-body">
                  <div class="form-group">
                    <h3>Apakah anda yakin akan menghapus data : {{ $bobotnilai->keterangan }}(Grade : {{ $bobotnilai->grade }}) ?</h3>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-danger">Hapus</button>
                  <a href="/admin/bobot-nilai"  class="btn btn-primary">Kembali</a>
                </div>
              </form>
            </div>
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
          
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


@endsection