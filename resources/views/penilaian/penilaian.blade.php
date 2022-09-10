@extends('layouts/panel')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Input Penilaian</h1>
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
                        <form action="/admin/penilaian/proses/hitung" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="InputKode">Kode Penilaian</label>
                                    <input type="text" name="kode" class="form-control" value="{{ $penilaian->kode_penilaian }}" readonly id="InputKode" placeholder="Enter Kode Penilaian" maxlength="7" required
                                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">

                                    <input type="hidden" name="kode" class="form-control" value="{{ $penilaian->id }}" readonly id="InputKode" placeholder="Enter Kode Penilaian" maxlength="7" required
                                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                </div>

                                <div class="form-group">
                                    <label for="InputKode">Prihal Penilaian</label>
                                    <input type="text" name="title" class="form-control" value="{{ $penilaian->title }}" readonly id="InputKode" placeholder="Enter Kode Penilaian" maxlength="7" required>
                                </div>

                                <table class="table">
                                    <tr>
                                        <td>Nama</td>
                                        @foreach ($kriteria as $kri)
                                        <td>{{ $kri->keterangan }}</td>
                                        @endforeach
                                    </tr>

                                    @php
                                    $i = 0;
                                    @endphp
                                    @foreach ($karyawan as $kar)
                                    <tr>
                                        <td>
                                            {{ $kar->nama_user }}
                                            <input type="hidden" name="item[{{ $i }}][user_id]" value="{{ $kar->id }}">
                                        </td>

                                        @foreach ($kriteria as $item)
                                        <td>
                                            <input type="hidden" name="item[{{ $i }}][kriteria][{{ $item->id }}][id]" value="{{ $item->id }}">
                                            <input type="hidden" name="item[{{ $i }}][kriteria][{{ $item->id }}][target]" value="{{ $item->target }}">
                                            <input type="hidden" name="item[{{ $i }}][kriteria][{{ $item->id }}][bobot]" value="{{ $item->bobot }}">
                                            <input type="number" name="item[{{ $i }}][kriteria][{{ $item->id }}][skor]" class="form-controll" placeholder="Enter value">
                                            <small>Max : {{ $item->target }}</small>
                                        </td>
                                        @endforeach
                                    </tr>
                                    @php
                                    $i++
                                    @endphp
                                    @endforeach
                                </table>
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
