<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Laporan Hasil Penilaian Karyawan</title>
</head>
<body>
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Data Penilaian {{ $penilaian->title. " Periode ". $penilaian->periode_bulan." - ".$penilaian->periode_tahun }}</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover" style="width: 100%" border="1" cellpadding="8" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            {{-- <th>Kode Penilaian</th>
                                <th>Title</th>
                                <th>Periode</th> --}}
                                <th>Nama Karyawan</th>
                                <th>Nilai</th>
                                <th>Keterangan</th>
                                <th>Detail Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($detail as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                {{-- <td>{{ $data->penilaian->kode_penilaian }}</td>
                                <td>{{ $data->penilaian->title }}</td>
                                <td>{{ $data->penilaian->periode_bulan. '-'.$data->penilaian->periode_tahun }}</td> --}}
                                <td>{{ $data->user->nama_user }}</td>
                                <td>{{ $data->total_final_nilai ." / ". $data->grade }}</td>
                                <td>{{ $data->keterangan }}</td>
                                <td>
                                    <table style="width: 100%" border="0">
                                        @foreach ($data->detailkriteriapenilaiansemester as $item)
                                        <tr>
                                            <td>{{ $item->kriteria_nilai->keterangan }}</td>
                                            <td> : </td>
                                            <td>{{ $item->total_skor }} ({{ $item->sub_skor }})</td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </body>
    </html>
