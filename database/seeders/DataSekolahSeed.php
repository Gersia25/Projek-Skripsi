<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DataSekolahSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('data_sekolah')->insert([
            'nama_sekolah'=> 'SMP Negeri XXXX',
            'npsn'=>'1111111',
            'akreditasi'=>'A',
            'alamat'=> 'Jl. XXXXX',
            'kode_pos'=>'123456',
            'telepon'=>'081111111',
            'email'=>'xxxxxxxx@gmail.com',
            'jenjang'=>'SMP'

        ]);
    }
}
