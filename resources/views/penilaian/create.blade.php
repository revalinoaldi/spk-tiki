@extends('layouts/panel')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Input Data Penilaian</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="/admin/penilaian">Penilaian</a></li>
              <li class="breadcrumb-item active">Input Form</li>
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
                <h3 class="card-title">Input Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="/admin/penilaian/" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="InputKode">Kode Penilaian</label>
                    <input type="text" name="kode" class="form-control" id="InputKode" placeholder="Enter Kode Penilaian" maxlength="7" required
                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                    <label for="InputTitle">Title</label>
                    <input type="text" name="title" class="form-control" id="InputTitle" placeholder="Enter Title">
                    <div class="form-group">
                       <label for="InputPeriodeBulan">Periode Bulan</label>
                       <select class="form-control" id="InputPeriodeBulan" name="periode_bulan">
                         <option> Select One </option>
                         <option value="Januari">Januari</option>
                         <option value="Februari">Februari</option>
                         <option value="Maret">Maret</option>
                         <option value="April">April</option>
                         <option value="Mei">Mei</option>
                         <option value="Juni">Juni</option>
                         <option value="Juli">Juli</option>
                         <option value="Agustus">Agustus</option>
                         <option value="September">September</option>
                         <option value="Oktober">Oktober</option>
                         <option value="November">November</option>
                         <option value="Desember">Desember</option>
                       </select>
                    </div>
                    <label for="InputPeriodeTahun">Periode Tahun</label>
                    <input type="number" name="periode_tahun" class="form-control" id="InputPeriodeTahun" placeholder="Enter Periode Tahun" maxlength="4" required
                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
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