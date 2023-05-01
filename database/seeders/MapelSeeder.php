<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mapel')->insert([
            [
                'nama_mapel' => 'Pendidikan Agama dan Budi Pekerti',
                'type'=>1,
                'kurikulum'=>2,
                'kelompok'=>'A'
            ],
            [
                'nama_mapel' => 'Pendidikan Pancasila',
                'type'=>1,
                'kurikulum'=>2,
                'kelompok'=>'A'
            ],
            [
                'nama_mapel' => 'Bahasa Indonesia',
                'type'=>1,
                'kurikulum'=>2,
                'kelompok'=>'A'
            ],
            [
                'nama_mapel' => 'Matematika',
                'type'=>1,
                'kurikulum'=>2,
                'kelompok'=>'A'
            ],
            [
                'nama_mapel' => 'Ilmu Pengetahuan Alam',
                'type'=>1,
                'kurikulum'=>2,
                'kelompok'=>'A'
            ],
            [
                'nama_mapel' => 'Ilmu Pengetahuan Sosial',
                'type'=>1,
                'kurikulum'=>2,
                'kelompok'=>'A'
            ],
            [
                'nama_mapel' => 'Bahasa Inggris',
                'type'=>1,
                'kurikulum'=>2,
                'kelompok'=>'A',
            ],
            [
                'nama_mapel' => 'Pendidikan Jasmani, Olahraga dan Kesehatan',
                'type'=>1,
                'kurikulum'=>2,
                'kelompok'=>'B'
            ],
            [
                'nama_mapel' => 'Informatika',
                'type'=>1,
                'kurikulum'=>2,
                'kelompok'=>'-'
            ],
            [
                'nama_mapel' => 'Seni Tari',
                'type'=>1,
                'kurikulum'=>2,
                'kelompok'=>'-'
            ],
            [
                'nama_mapel' => 'Seni Budaya',
                'type'=>1,
                'kurikulum'=>2,
                'kelompok'=>'B'
            ],
            [
                'nama_mapel' => 'Prakarya',
                'type'=>1,
                'kurikulum'=>2,
                'kelompok'=>'B'
            ],
            [
                'nama_mapel' => 'Pramuka',
                'type'=>2,
                'kurikulum'=>2,
                'kelompok'=>'-'
            ],
            [
                'nama_mapel' => 'Paskibra',
                'type'=>2,
                'kurikulum'=>2,
                'kelompok'=>'-'
            ],
        ]);
    }
}
