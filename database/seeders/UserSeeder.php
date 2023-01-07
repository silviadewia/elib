<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
            'name' => 'silvia',
            'email' => 'callmesil@gmail.com',
            'password' => Hash::make('kacangbawang'),
        ],
        [
            'name' => 'nawang', 
            'email' => 'callmenaw@gmail.com',
            'password' => Hash::make('kacangbawang'), 
        ],
        [
            'name' => 'ardan', 
            'email' => 'callmedan@gmail.com',
            'password' => Hash::make('kacangbawang'), 
        ],
        [
            'name' => 'herman', 
            'email' => 'callmeman@gmail.com',
            'password' => Hash::make('kacangbawang'), 
        ],
    );
    }
}
