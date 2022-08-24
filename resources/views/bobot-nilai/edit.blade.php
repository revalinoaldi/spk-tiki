@extends('layouts/panel')

@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Data Bobot Nilai</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="/admin/bobot-nilai">Bobot Nilai</a></li>
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
              <form action="/admin/bobot-nilai/{{ $bobotnilai->slug }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                    <label for="InputKeterangan">Keterangan</label>
                    <input type="text" name="keterangan" class="form-control" id="InputKeterangan" placeholder="Enter Keterangan" value="{{ $bobotnilai->keterangan }}">
                    <label for="InputMinNilai">Minimal Nilai</label>
                    <input type="number" name="minNilai" class="form-control" id="InputMinNilai" placeholder="Enter Minimal Nilai" value="{{ $bobotnilai->minNilai }}">
                    <label for="InputGrade">Grade</label>
                    <input type="text" name="grade" class="form-control" id="InputGrade" placeholder="Enter Grade" value="{{ $bobotnilai->grade }}">
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