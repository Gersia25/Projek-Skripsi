<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'telepon' => '0852448890',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('123'),
                'level' => 1
            ],
            [
                'name' => 'Suci Putri,Sp.d',
                'telepon' => '0852448890',
                'email' => 'suci@gmail.com',
                'password' => Hash::make('123'),
                'level' => 3
            ],
            [
                'name' => 'Hartono, Sp.d',
                'telepon' => '0852448890',
                'email' => 'hartono@gmail.com',
                'password' => Hash::make('123'),
                'level' => 2
            ],
            [
                'name' => 'Rendi Saputra',
                'telepon' => '0852448890',
                'email' => 'rendi@gmail.com',
                'password' => Hash::make('123'),
                'level' => 4
            ],
            [
                'name' => 'Putra Jaya',
                'telepon' => '0852448890',
                'email' => 'putra@gmail.com',
                'password' => Hash::make('123'),
                'level' => 4
            ],
            [
                'name' => 'Bambang Suryono',
                'telepon' => '0852448890',
                'email' => 'bambang@gmail.com',
                'password' => Hash::make('123'),
                'level' => 1
            ],
            [
                'name' => 'Budi Sanjaya, Sp.d',
                'telepon' => '0852448890',
                'email' => 'budi@gmail.com',
                'password' => Hash::make('123'),
                'level' => 3
            ],
            [
                'name' => 'Suci Putri',
                'telepon' => '0852448890',
                'email' => 'suciputri@gmail.com',
                'password' => Hash::make('123'),
                'level' => 4
            ],
            [
                'name' => 'Rani',
                'telepon' => '0852448890',
                'email' => 'rani@gmail.com',
                'password' => Hash::make('123'),
                'level' => 4
            ],
            [
                'name' => 'Rehan',
                'telepon' => '0852448890',
                'email' => 'rehan@gmail.com',
                'password' => Hash::make('123'),
                'level' => 4
            ],
            [
                'name' => 'Rianza',
                'telepon' => '0852448890',
                'email' => 'rianza@gmail.com',
                'password' => Hash::make('123'),
                'level' => 4
            ],
        ]);
    }
}
