<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdentitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('identitas', function (Blueprint $table) {
            $table->id();
            $table->string('no_rm');
            $table->string('gelar_depan')->nullable();
            $table->string('nama_lengkap');
            $table->string('gelar_belakang')->nullable();
            $table->string('nik')->nullable();
            $table->string('no_bpjs')->nullable();
            $table->string('jenis_kelamin');
            $table->string('agama');
            $table->string('golongan_darah')->nullable();
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('alamat');
            $table->string('rt');
            $table->string('rw');
            $table->string('nama_desa');
            $table->string('kode_desa');
            $table->string('kode_kecamatan');
            $table->string('nama_kecamatan');
            $table->string('kode_kabupaten');
            $table->string('nama_kabupaten');
            $table->string('kode_pos');
            $table->string('penyandang_cacat')->nullable();
            $table->string('pendidikan_terakhir')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('status_kawin')->nullable();
            $table->string('e_ktp_status')->nullable();
            $table->string('nik_ayah')->nullable();
            $table->string('nama_ayah')->nullable();
            $table->string('nik_ibu')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->string('no_kk')->nullable();
            $table->string('no_akta_lahir')->nullable();
            $table->string('nama_asuransi')->nullable();
            $table->string('status_hidup');
            $table->string('ras_suku')->nullable();
            $table->string('stat_hubungan_keluarga')->nullable();
            $table->string('photo');
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
        Schema::dropIfExists('identitas');
    }
}
