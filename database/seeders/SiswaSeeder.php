<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('siswa')->insert([
            [
                'nisn'=>'345678',
                'nama_siswa'=>'Rendi Saputra',
                'jk'=>'L',
                'id_kelas'=>1,
                'tingkatan'=>7,
                'id_user'=>4
            ],
            [
                'nisn'=>'667789',
                'nama_siswa'=>'Putra Jaya',
                'jk'=>'L',
                'id_kelas'=>1,
                'tingkatan'=>7,
                'id_user'=>5
            ],
            [
                'nisn'=>'898989',
                'nama_siswa'=>'Suci Putri',
                'jk'=>'P',
                'id_kelas'=>2,
                'tingkatan'=>8,
                'id_user'=>8
            ],
            [
                'nisn'=>'767676',
                'nama_siswa'=>'Rani',
                'jk'=>'P',
                'id_kelas'=>2,
                'tingkatan'=>8,
                'id_user'=>9
            ],
            [
                'nisn'=>'65765657',
                'nama_siswa'=>'Raihan',
                'jk'=>'P',
                'id_kelas'=>3,
                'tingkatan'=>9,
                'id_user'=>10
            ],
            [
                'nisn'=>'45464748',
                'nama_siswa'=>'Rianza',
                'jk'=>'P',
                'id_kelas'=>3,
                'tingkatan'=>9,
                'id_user'=>11
            ],
        ]);
    }
}
