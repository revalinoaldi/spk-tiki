@extends('layouts/panel')

@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Data Kriteria Nilai</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="/admin/kriteria-nilai">Kriteria Nilai</a></li>
              <li class="breadcrumb-item active">Edit Form</li>
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
                <h3 class="card-title">Edit Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="/admin/kriteria-nilai/{{ $kriterianilai->slug }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                    <label for="InputKode">Kode</label>
                    <input type="text" name="kode" class="form-control" id="InputKode" placeholder="Enter Kode" value="{{ $kriterianilai->kode }}">
                    <label for="InputKeterangan">Keterangan</label>
                    <input type="text" name="keterangan" class="form-control" id="InputKeterangan" placeholder="Enter Keterangan" value="{{ $kriterianilai->keterangan }}">
                    <label for="InputBobot">Bobot</label>
                    <input type="number" name="bobot" class="form-control" id="InputBobot" placeholder="Enter Bobot" value="{{ $kriterianilai->bobot }}">
                    <label for="InputTarget">Target</label>
                    <input type="number" name="target" class="form-control" id="InputTarget" placeholder="Enter Target" value="{{ $kriterianilai->target }}">
                    <label for="InputDeskripsi">Deskripsi</label>
                    <input type="text" name="deskripsi" class="form-control" id="InputTarget" placeholder="Enter Deskripsi" value="{{ $kriterianilai->deskripsi }}">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-success">Edit</button>
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