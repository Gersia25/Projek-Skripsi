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
        Schema::create('mapel', function (Blueprint $table) {
            $table->id('id_mapel');
            $table->string('nama_mapel',100);
            $table->integer('type')->nullable(); #1=mata pelajaran 2= extrakulikuler
            $table->integer('kurikulum')->nullable(); #1=k13 2= Merdeka 3=K13 dan Merdeka
            $table->string('kelompok')->nullable(); #A dan B
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
        Schema::dropIfExists('mapel');
    }
};
