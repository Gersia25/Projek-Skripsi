<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::create('tahun_ajaran', function (Blueprint $table) {
            $table->id('id_ta');
            $table->integer('semester');
            $table->string('tahun_ajaran')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('tahun_ajaran');
    }
};
