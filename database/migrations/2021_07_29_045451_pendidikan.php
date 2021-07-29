<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pendidikan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendidikans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_sekolah');
            $table->string('jurusan');
            $table->integer('tahun_masuk');
            $table->integer('tahun_lulus');
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
        Schema::dropIfExists('pendidikans');
    }
}
