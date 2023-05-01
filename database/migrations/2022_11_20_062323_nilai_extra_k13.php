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
        Schema::create('nilai_extra_k13', function (Blueprint $table) {
            $table->id('id_nilai');
            $table->integer('id_kelas');
            $table->integer('id_tahun_ajaran');
            $table->integer('id_guru');
            $table->integer('id_mapel');
            $table->integer('nisn_siswa');
            $table->integer('nilai');
            $table->string('ket');
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
        Schema::dropIfExists('nilai_extra_k13');
    }
};
