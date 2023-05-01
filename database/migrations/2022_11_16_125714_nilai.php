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
        Schema::create('nilai_mapel_k_merdeka', function (Blueprint $table) {
            $table->id('id_nilai');
            $table->integer('id_kelas');
            $table->integer('id_tahun_ajaran');
            $table->integer('id_guru');
            $table->integer('id_mapel');
            $table->integer('nisn_siswa');
            $table->integer('nilai_akhir');
            $table->string('capaian');
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
        Schema::dropIfExists('nilai_mapel_k_merdeka');
    }
};
