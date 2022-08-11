<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\BobotNilai;
use Carbon\Carbon;

class BobotNilaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        BobotNilai::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            ['keterangan' => 'Sangat Melampaui Harapan','slug' => 'sangat-melampaui-harapan','minNilai' => 95,'grade' => 'A'],
            ['keterangan' => 'Melampaui Harapan','slug' => 'melampaui-harapan','minNilai' => 90,'grade' => 'B'],
            ['keterangan' => 'Memenuhi Harapan','slug' => 'memenuhi-harapan','minNilai' => 85,'grade' => 'C'],
            ['keterangan' => 'Hampir Memenuhi Harapan','slug' => 'hampir-memenuhi-harapan','minNilai' => 80,'grade' => 'D'],
            ['keterangan' => 'Tidak Memenuhi Harapan','slug' => 'tidak-memenuhi-harapan','minNilai' => 0,'grade' => 'E']
        ];
        foreach ($data as $value){
            BobotNilai::insert([
                'keterangan' => $value['keterangan'],
                'slug' => $value['slug'],
                'minNilai' => $value['minNilai'],
                'grade' => $value['grade'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
    
            ]);
        }
    }
}
