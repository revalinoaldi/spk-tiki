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
        Schema::create('kriteria_nilais', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode',10)->unique()->required();
            $table->string('keterangan',100)->required();
            $table->string('slug',100)->unique()->required();
            $table->integer('bobot');
            $table->float('bobotInFloat', 8, 2);
            $table->integer('target');
            $table->timestamps($precision = 0);
            $table->string('deskripsi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kriteria_nilais');
    }
};
