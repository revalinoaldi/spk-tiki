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
        Schema::create('detail_kriteria_penilaian_semesters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('detail_penilaian_id');
            $table->unsignedBigInteger('kriteria_nilai_id');
            $table->float('total_skor');
            $table->float('sub_skor');
            $table->timestamps($precision = 0);
            $table->foreign('detail_penilaian_id')->references('id')->on('detail_penilaians');
            $table->foreign('kriteria_nilai_id')->references('id')->on('kriteria_nilais');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('detail_kriteria_penilaian_semesters', function (Blueprint $table) {
            $table->dropForeign(['detail_penilaian_id']);
            $table->dropForeign(['kriteria_nilai_id']);
        });

        Schema::dropIfExists('detail_kriteria_penilaian_semesters');
    }
};
