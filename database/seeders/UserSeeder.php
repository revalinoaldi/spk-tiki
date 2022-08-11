<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        User::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            ['nama_user' => 'Farhan Aldiansyah', 'username' => 'farhanaldi', 'email' => 'farhanaldi@gmail.com',
            'alamat' => 'Bekasi','no_telp' => '8159878369','password' => 'passwordhint','jabatan_id' => 2,
            'jenis_kelamin' => 'Laki-Laki','status_karyawan' => '1','nik' => 'hit_nik'],
            ['nama_user' => 'Nia Dwi Lestari', 'username' => 'niadwils', 'email' => 'niadwils@gmail.com',
            'alamat' => 'Bekasi','no_telp' => '8159878369','password' => 'passwordhint','jabatan_id' => 2,
            'jenis_kelamin' => 'Perempuan','status_karyawan' => '0','nik' => 'hit_nik']
            
        ];
        foreach ($data as $value){
            User::insert([
                'nama_user' => $value['nama_user'],
                'username' => $value['username'],
                'email' => $value['email'],
                'alamat' => $value['alamat'],
                'no_telp' => $value['no_telp'],
                'password' => $value['password'],
                'jabatan_id' => $value['jabatan_id'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'jenis_kelamin' => $value['jenis_kelamin'],
                'status_karyawan' => $value['status_karyawan'],
                'nik' => $value['nik']
    
            ]);
        }
    }
}
