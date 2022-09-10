<?php

namespace App\Http\Controllers;

use App\Models\BobotNilai;
use App\Models\DetailKriteriaPenilaianSemester;
use App\Models\DetailPenilaian;
use App\Models\KriteriaNilai;
use App\Models\Penilaian;
use App\Models\User;
use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    public function index(){

        $penilaian = Penilaian::all();
        return view('penilaian/index', ['penilaianList' => $penilaian]);
    }

    public function input(){

        return view('penilaian/create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'kode' => 'required',
            'title' => 'required',
            'periode_bulan' => 'required',
            'periode_tahun' => 'required',
        ]);

        $penilaian = Penilaian::create([
            'kode_penilaian' => $request->input('kode'),
            'periode_bulan' => $request->input('periode_bulan'),
            'periode_tahun' => $request->input('periode_tahun'),
            'title' => $request->input('title')
        ]);

        if($penilaian){
            //redirect dengan pesan sukses
            return redirect('/admin/penilaian')->with(['status' => 'Data Berhasil Disimpan!']);
        }else{
            //redirect dengan pesan error
            return redirect('/admin/penilaian')->with(['status' => 'Data Gagal Disimpan!']);
        }
    }

    public function update(Request $request, $kode_penilaian)
    {
        $this->validate($request, [
            'kode' => 'required',
            'title' => 'required',
            'periode_bulan' => 'required',
            'periode_tahun' => 'required',
        ]);

        $penilaian = Penilaian::where('kode_penilaian', $kode_penilaian)->first();
        $penilaian->update([
            'kode_penilaian' => $request->input('kode'),
            'periode_bulan' => $request->input('periode_bulan'),
            'periode_tahun' => $request->input('periode_tahun'),
            'title' => $request->input('title')
        ]);

        if($penilaian){
             //redirect dengan pesan sukses
             return redirect('/admin/penilaian')->with(['status' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect('/admin/penilaian')->with(['status' => 'Data Gagal Diupdate!']);
        }
    }

    public function edit($kode_penilaian){

        $penilaian = Penilaian::where('kode_penilaian', $kode_penilaian)->first();
        return view('penilaian/edit', ['penilaian' => $penilaian]);
    }

    public function delete($kode_penilaian){

        $penilaian = Penilaian::where('kode_penilaian', $kode_penilaian)->first();
        return view('penilaian/delete', ['penilaian' => $penilaian]);
    }

    public function destroy($kode_penilaian){

        $penilaian = Penilaian::where('kode_penilaian', $kode_penilaian)->first();
        $penilaian->delete();

        return redirect('/admin/penilaian')->with(['status' => 'Data Berhasil Dihapus!']);
    }

    public function penilaian($kode_penilaian){

        $user = User::where('jabatan_id', 4)->get();
        return view('penilaian/penilaian', [
            'penilaian' => Penilaian::where('kode_penilaian', $kode_penilaian)->first(),
            'karyawan' => $user,
            'kriteria' => KriteriaNilai::get()
        ]);
    }

    public function hasilpenilaian(Request $request)
    {
        foreach ($request->item as $val) {
            $data = [
                'penilaian_id' => $request->kode,
                'user_id' => $val['user_id']
            ];

            $detailData = [];
            $skor_akhir = 0;
            foreach ($val['kriteria'] as $nilai) {
                $subSkor = 0;
                if($nilai['skor'] > $nilai['target']){
                    $subSkor = 100;
                }else{
                    $subSkor = ($nilai['skor'] / $nilai['target'])*100;
                }
                $finalSkor = ($subSkor * $nilai['bobot'])/100;
                $skor_akhir += $finalSkor;

                $detailData[] = [
                    'kriteria_nilai_id' => $nilai['id'],
                    'total_skor' => $subSkor,
                    'sub_skor' => $finalSkor
                ];
            }

            $data['total_final_nilai'] = $skor_akhir;

            // $grade = BobotNilai::where('minNilai', '>=', (int)round($skor_akhir))->orderBy('minNilai', 'DESC')->first();
            // $data['grade'] = $grade;

            $grade = BobotNilai::get();

            foreach ($grade as $gr) {
                if((int)round($skor_akhir) >= $gr->minNilai){
                    $data['grade'] = $gr->grade;
                    $data['keterangan'] = $gr->keterangan;
                    break;
                }
            }

            $details = DetailPenilaian::create($data);
            foreach ($detailData as $detail) {
                $detail['detail_penilaian_id'] = $details->id;
                DetailKriteriaPenilaianSemester::create($detail);
            }
        }

        return redirect('/admin/penilaian')->with('notif','
            <div class="alert alert-primary dark alert-dismissible fade show" role="alert">
                <i data-feather="check-circle"></i>
                <p><strong>Successfull!</strong> Successfull Proses Penilaian Karyawan</p>
                <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close" data-bs-original-title="" title=""></button>
            </div>');
    }
}
