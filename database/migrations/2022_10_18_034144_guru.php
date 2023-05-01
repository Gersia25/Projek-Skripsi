<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::create('guru', function (Blueprint $table) {
            $table->id('id_guru');
            $table->string('nip')->nullable();
            $table->string('nama_guru');
            $table->string('alamat',100)->nullable();
            $table->string('telepon',20)->nullable();
            $table->integer('id_mapel')->nullable();
            $table->integer('id_user');
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('guru');
    }
};
