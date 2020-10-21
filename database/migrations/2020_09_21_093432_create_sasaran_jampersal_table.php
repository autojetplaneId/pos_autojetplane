<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSasaranJampersalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sasaran_jampersal', function (Blueprint $table) {
            $table->id();
            $table->string('kode_jampersal')->unique()->nullable();
            $table->string('nik_istri')->unique()->nullable();
            $table->string('nik_suami')->unique()->nullable();
            $table->string('no_sktm')->unique()->nullable();
            $table->string('nama_istri');
            $table->string('nama_suami');
            $table->string('alamat')->nullable();
            $table->string('rt')->nullable();
            $table->string('rw')->nullable();
            $table->string('nama_desa')->nullable();
            $table->string('nama_kecamatan')->nullable();
            $table->string('nama_kabupaten')->nullable();
            $table->string('nama_provinsi')->nullable();
            $table->date('tahun_sasaran');
            $table->string('status');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sasaran_jampersal');
    }
}
