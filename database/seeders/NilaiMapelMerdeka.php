<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NilaiMapelMerdeka extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nilai_mapel_k_merdeka')->insert([
            [
                'id_kelas'=>1,
                'id_tahun_ajaran'=>2,
                'id_guru'=>1,
                'id_mapel'=>1,
                'nisn_siswa'=>'345678',
                'nilai_akhir'=>87,
                'capaian'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem excepturi nesciunt repudiandae quod dolore at ipsum blanditiis vitae ad doloremque!'
            ],
            [
                'id_kelas'=>2,
                'id_tahun_ajaran'=>2,
                'id_guru'=>1,
                'id_mapel'=>1,
                'nisn_siswa'=>'667789',
                'nilai_akhir'=>87,
                'capaian'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem excepturi nesciunt repudiandae quod dolore at ipsum blanditiis vitae ad doloremque!'
            ],
        ]);
    }
}
