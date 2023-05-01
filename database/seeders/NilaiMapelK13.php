<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NilaiMapelK13 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nilai_mapel_k13')->insert([
            [
                'id_kelas'=>3,
                'id_tahun_ajaran'=>2,
                'id_guru'=>3,
                'id_mapel'=>3,
                'nisn_siswa'=>'45464748',
                'nilai_peng'=>'A',
                'nilai_prak'=>'A',
                'nilai_sikap'=>'A',
                'des_peng'=>'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consectetur, necessitatibus!',
                'des_prak'=>'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consectetur, necessitatibus!',
                'des_sikap'=>'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Consectetur, necessitatibus!',
                
            ],
        ]);
    }
}
