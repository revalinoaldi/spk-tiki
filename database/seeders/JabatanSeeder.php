<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\Jabatan;
use Carbon\Carbon;

class JabatanSeeder extends Seeder
{


    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Jabatan::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            ['jabatan' => 'Direktur','slug' => 'direktur'],
            ['jabatan' => 'Manager Ops','slug' => 'manager-operasional'],
            ['jabatan' => 'Supervisor','slug' => 'supervisor'],
            ['jabatan' => 'Karyawan','slug' => 'karyawan']

        ];
        foreach ($data as $value){
            Jabatan::insert([
                'jabatan' => $value['jabatan'],
                'slug' => $value['slug']
            ]);
        }
    }
}
