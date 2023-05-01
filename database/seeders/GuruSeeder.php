<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('guru')->insert([
            [
                'nip'=>'897866778890',
                'nama_guru'=>'Suci Putri,Sp.d',
                'id_mapel'=>1,
                'id_user'=>2
            ],
            [
                'nip'=>'989900231230',
                'nama_guru'=>'Hartono, Sp.d',
                'id_mapel'=>2,
                'id_user'=>3
            ],
            [
                'nip'=>'43643646436436',
                'nama_guru'=>'Budi Sanjaya, Sp.d',
                'id_mapel'=>3,
                'id_user'=>7
            ],
        ]);
    }
}
