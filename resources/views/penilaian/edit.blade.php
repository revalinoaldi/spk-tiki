@extends('layouts/panel')

@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Data Penilaian</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="/admin/penilaian">Penilaian</a></li>
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
              <form action="/admin/penilaian/{{ $penilaian->kode_penilaian }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                    <label for="InputKode">Kode Penilaian</label>
                    <input type="text" name="kode" value="{{ $penilaian->kode_penilaian }}" class="form-control" id="InputKode" placeholder="Enter Kode Penilaian" maxlength="7" required
                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                    <label for="InputTitle">Title</label>
                    <input type="text" name="title" class="form-control" id="InputTitle" placeholder="Enter Title" value="{{ $penilaian->title }}">
                    <div class="form-group">
                       <label for="InputPeriodeBulan">Periode Bulan</label>
                       <select class="form-control" id="InputPeriodeBulan" name="periode_bulan">
                         <option value="Januari" @if ($penilaian->periode_bulan == "Januari")
                             selected
                         @endif>Januari</option>
                         <option value="Februari" @if ($penilaian->periode_bulan == "Februari")
                            selected
                        @endif>Februari</option>
                         <option value="Maret" @if ($penilaian->periode_bulan == "Maret")
                            selected
                        @endif>Maret</option>
                         <option value="April" @if ($penilaian->periode_bulan == "April")
                            selected
                        @endif>April</option>
                         <option value="Mei" @if ($penilaian->periode_bulan == "Mei")
                            selected
                        @endif>Mei</option>
                         <option value="Juni" @if ($penilaian->periode_bulan == "Juni")
                            selected
                        @endif>Juni</option>
                         <option value="Juli" @if ($penilaian->periode_bulan == "Juli")
                            selected
                        @endif>Juli</option>
                         <option value="Agustus" @if ($penilaian->periode_bulan == "Agustus")
                            selected
                        @endif>Agustus</option>
                         <option value="September" @if ($penilaian->periode_bulan == "September")
                            selected
                        @endif>September</option>
                         <option value="Oktober" @if ($penilaian->periode_bulan == "Oktober")
                            selected
                        @endif>Oktober</option>
                         <option value="November" @if ($penilaian->periode_bulan == "November")
                            selected
                        @endif>November</option>
                         <option value="Desember" @if ($penilaian->periode_bulan == "Desember")
                            selected
                        @endif>Desember</option>
                       </select>
                    </div>
                    <label for="InputPeriodeTahun">Periode Tahun</label>
                    <input type="number" name="periode_tahun" value="{{ $penilaian->periode_tahun }}" class="form-control" id="InputPeriodeTahun" placeholder="Enter Periode Tahun" maxlength="4" required
                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
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