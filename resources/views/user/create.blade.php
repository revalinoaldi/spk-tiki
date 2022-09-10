@extends('layouts/panel')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Input Data User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="/admin/user">User</a></li>
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
              <form action="/admin/user/" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="InputNIK">NIK</label>
                    <input type="text" name="nik" class="form-control" id="InputNIK" placeholder="Enter NIK">
                    <label for="InputNamaUser">Nama User</label>
                    <input type="text" name="nama_user" class="form-control" id="InputNamaUser" placeholder="Enter Nama User">
                    <label for="InputUsername">Username</label>
                    <input type="text" name="username" class="form-control" id="InputUsername" placeholder="Enter Username">
                    <label for="InputEmail">Email</label>
                    <input type="email" name="email" class="form-control" id="InputEmail" placeholder="Enter Email">
                    <label for="InputPassword">Password</label>
                    <input type="password" name="password" class="form-control" id="InputPassword" placeholder="Enter Password">
                    <label for="InputAlamat">Alamat</label>
                    <input type="text" name="alamat" class="form-control" id="InputAlamat" placeholder="Enter Alamat">
                    <label for="InputTelp">No. Telp</label>
                    <div class="input-group-prepend">
                        <span class="input-group-text">(+62)</span>
                        <input type="text" name="no_telp" class="form-control" id="InputTelp" placeholder="Enter No. Telp">
                    </div>
                    <div class="form-group">
                      <label for="InputJabatan">Jabatan</label>
                      <select class="form-control" id="InputJabatan" name="jabatan">
                        <option> Select One </option>
                        @foreach($jabatan as $data)
                        <option value="{{ $data->id }}">{{ $data->jabatan }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="InputJK">Jenis Kelamin</label>
                      <select class="form-control" id="InputJK" name="jenis_kelamin">
                        <option> Select One </option>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="InputSK">Status Karyawan</label>
                      <select class="form-control" id="InputSK" name="status_karyawan">
                        <option> Select One </option>
                        <option value="1">Aktif</option>
                        <option value="0">Tidak Aktif</option>
                      </select>
                    </div>

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
