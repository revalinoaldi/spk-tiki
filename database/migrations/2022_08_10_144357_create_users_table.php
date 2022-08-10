<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_user', 100);
            $table->string('username', 100)->unique()->required();
            $table->string('email', 125)->unique()->required();
            $table->string('alamat');
            $table->string('no_telp', 15);
            $table->string('password');
            $table->rememberToken();
            $table->unsignedBigInteger('jabatan_id');
            $table->timestamps($precision = 0);
            $table->enum('jenis_kelamin', ['Laki-Laki', 'Perempuan']);
            $table->enum('status_karyawan', ['1', '0']);
            $table->string('nik', 16);

            $table->foreign('jabatan_id')->references('id')->on('jabatans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users', function (Blueprint $table) {
            $table->dropForeign(['jabatan_id']);
        });

        Schema::dropIfExists('users');
    }
};
