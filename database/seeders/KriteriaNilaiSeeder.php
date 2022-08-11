<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\KriteriaNilai;
use Carbon\Carbon;

class KriteriaNilaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        KriteriaNilai::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            ['kode' => 'C1','keterangan' => 'Kehadiran','slug' => 'kehadiran','bobot' => 20,'bobotInFloat' => 0.20,
            'target' => 260,'deskripsi' => 'desc_hit'],
            ['kode' => 'C2','keterangan' => 'Tugas Pokok','slug' => 'tugas-pokok','bobot' => 15,'bobotInFloat' => 0.15,
            'target' => 90,'deskripsi' => 'desc_hit'],
            ['kode' => 'C3','keterangan' => 'Disiplin','slug' => 'disiplin','bobot' => 15,'bobotInFloat' => 0.15,
            'target' => 95,'deskripsi' => 'desc_hit'],
            ['kode' => 'C4','keterangan' => 'Tanggung Jawab','slug' => 'tanggung-jawab','bobot' => 10,'bobotInFloat' => 0.10,
            'target' => 95,'deskripsi' => 'desc_hit'],
            ['kode' => 'C5','keterangan' => 'Inisiatif','slug' => 'inisiatif','bobot' => 10,'bobotInFloat' => 0.10,
            'target' => 85,'deskripsi' => 'desc_hit'],
            ['kode' => 'C6','keterangan' => 'Kerja Sama','slug' => 'kerja-sama','bobot' => 30,'bobotInFloat' => 0.30,
            'target' => 80,'deskripsi' => 'desc_hit']
        ];
        foreach ($data as $value){
            KriteriaNilai::insert([
                'kode' => $value['kode'],
                'keterangan' => $value['keterangan'],
                'slug' => $value['slug'],
                'bobot' => $value['bobot'],
                'bobotInFloat' => $value['bobotInFloat'],
                'target' => $value['target'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'deskripsi' => $value['deskripsi']
    
            ]);
        }
    }
}
