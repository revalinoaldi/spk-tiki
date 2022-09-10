<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $jk = ['Laki-Laki', 'Perempuan'];
        return [
            'nama_user' => fake()->name(),
            'username' => fake()->userName(),
            'email' => fake()->safeEmail(),
            'alamat' => fake()->address(),
            'no_telp' => fake()->e164PhoneNumber(),
            'password' => Hash::make('password'),
            'jabatan_id' => 4,
            'jenis_kelamin' => $jk[rand(0,1)],
            'status_karyawan' => 1,
            'nik' => mt_rand(1000000000, 9999999999)

        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
