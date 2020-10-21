<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableKaryawan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karyawan', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            $table->string('kode_karyawan');
            $table->string('status_karyawan');
            $table->string('absensi_fp');
            $table->string('absensi_manual');
            $table->string('nik');
            $table->string('status_aktif');
            $table->date('tmt_kerja');
            $table->date('tmt_kerja_puskesmas');
            $table->foreign('user_id')
                  ->references('id')
                  ->on('identitas')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
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
        Schema::dropIfExists('table_karyawan');
    }
}
