@extends('layouts/panel')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="/admin/user">User</a></li>
              <li class="breadcrumb-item active">Detail</li>
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
            <a href="/admin/user" class="btn btn-primary" style="padding-top: 10px; margin-bottom: 10px;"><i class="fa fa-arrow-left"></i> Kembali</a>
               <!-- About Me Box -->
            <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Detail User</h3>
                </div>
                <!-- /.card-header -->
                @foreach($user as $data)
                <div class="card-body">
                  <strong>Nama User</strong>
                  <p class="text-muted">
                    {{ $data->nama_user }}
                  </p>
  
                  <hr>
                  <strong>Username</strong>
                  <p class="text-muted">
                    {{ $data->username }}
                  </p>
  
                  <hr>
                  <strong>Email</strong>
                  <p class="text-muted">
                    {{ $data->email }}
                  </p>
  
                  <hr>
                  <strong>Alamat</strong>
                  <p class="text-muted">
                    {{ $data->alamat }}
                  </p>
  
                  <hr>
                  <strong>No. Telp</strong>
                  <p class="text-muted">
                    {{ $data->no_telp }}
                  </p>
  
                  <hr>
                  <strong>Jabatan</strong>
                  <p class="text-muted">
                    {{ $data->jabatan['jabatan'] }}
                  </p>
  
                  <hr>
                  <strong>Jenis Kelamin</strong>
                  <p class="text-muted">
                    {{ $data->jenis_kelamin }}
                  </p>
  
                  <hr>
                  <strong>Status Karyawan</strong>
                  <p class="text-muted">
                    @if($data->status_karyawan == '1')
                    Aktif
                    @else
                    Tidak Aktif                       
                    @endif
                  </p>
  
                  <hr>
                  <strong>NIK</strong>
                  <p class="text-muted">
                    {{ $data->nik }}
                  </p>
  
                  <hr>
                  
  
                  
                </div>
                @endforeach
                <!-- /.card-body -->
            </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection