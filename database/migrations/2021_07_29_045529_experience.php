<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Experience extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->string('perusahaan');
            $table->string('jabatan');
            $table->integer('tahun');
            $table->string('keterangan');
            $table->unsignedBigInteger('nomor_ktp');
            $table->foreign('nomor_ktp')->references('nomor_ktp')->on('karyawans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('experiences');
    }
}
