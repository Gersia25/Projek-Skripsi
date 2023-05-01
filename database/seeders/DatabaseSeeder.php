<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            MapelSeeder::class,
            UserSeeder::class,
            GuruSeeder::class,
            KelasSeeder::class,
            SiswaSeeder::class,
            TahunAjaran::class,
            DataSekolahSeed::class,
            FormatRaport::class,
           #NilaiMapelMerdeka::class,
            #NilaiMapelK13::class,
        ]);
    }
}
