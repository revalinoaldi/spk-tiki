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
        Schema::create('detail_penilaians', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('penilaian_id');
            $table->unsignedBigInteger('user_id');
            $table->float('total_final_nilai');
            $table->string('grade', 1);
            $table->timestamps($precision = 0);
            $table->string('keterangan', 100);


            $table->foreign('penilaian_id')->references('id')->on('penilaians');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('detail_penilaians', function (Blueprint $table) {
            $table->dropForeign(['penilaian_id']);
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('detail_penilaians');
    }
};
