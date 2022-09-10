<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

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
            [
                'nama_user' => 'Farhan Aldiansyah',
                'username' => 'farhanaldi',
                'email' => 'farhanaldi@gmail.com',
                'alamat' => 'Bekasi',
                'no_telp' => '8159878369',
                'password' => Hash::make('password'),
                'jabatan_id' => 2,
                'jenis_kelamin' => 'Laki-Laki',
                'status_karyawan' => 1,
                'nik' => mt_rand(1000000000, 9999999999)
            ],
            [
                'nama_user' => 'Nia Dwi Lestari',
                'username' => 'niadwils',
                'email' => 'niadwils@gmail.com',
                'alamat' => 'Bekasi',
                'no_telp' => '8159878369',
                'password' => Hash::make('password'),
                'jabatan_id' => 3,
                'jenis_kelamin' => 'Perempuan',
                'status_karyawan' => 1,
                'nik' => mt_rand(1000000000, 9999999999)
            ],
            [
                'nama_user' => 'Opal Irsaka',
                'username' => 'opalirs',
                'email' => 'opalirs@gmail.com',
                'alamat' => 'Bekasi',
                'no_telp' => '8159878369',
                'password' => Hash::make('password'),
                'jabatan_id' => 4,
                'jenis_kelamin' => 'Perempuan',
                'status_karyawan' => 1,
                'nik' => mt_rand(1000000000, 9999999999)
            ],
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
                'jenis_kelamin' => $value['jenis_kelamin'],
                'status_karyawan' => $value['status_karyawan'],
                'nik' => $value['nik']
            ]);
        }

        User::factory(4)->create();
    }
}
