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
        Schema::create('bobot_nilais', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('keterangan',100)->required();
            $table->string('slug',100)->unique()->required();
            $table->integer('minNilai')->required();
            $table->string('grade',1)->required();
            $table->timestamps($precision = 0);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bobot_nilais');
    }
};
