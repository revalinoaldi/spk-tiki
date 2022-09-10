@extends('layouts/panel')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Hasil Penilaian Karyawan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Hasil Penilaian Karyawan</li>
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
                            <h3 class="card-title">Data Penilaian {{ $kode }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <a href="/admin/penilaian/cetak/hasil/{{ $kode }}" class="btn btn-primary text-right" style="padding-top: 10px;"><i class="fa fa-print"></i> Cetak Hasil</a>
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Kode Penilaian</th>
                                        <th>Title</th>
                                        <th>Periode</th>
                                        <th>Nama Karyawan</th>
                                        <th>Nilai</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($list as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->penilaian->kode_penilaian }}</td>
                                        <td>{{ $data->penilaian->title }}</td>
                                        <td>{{ $data->penilaian->periode_bulan. '-'.$data->penilaian->periode_tahun }}</td>
                                        <td>{{ $data->user->nama_user }}</td>
                                        <td>{{ $data->total_final_nilai ." / ". $data->grade }}</td>
                                        <td>{{ $data->keterangan }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
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
