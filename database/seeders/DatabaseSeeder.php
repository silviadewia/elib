<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        DB::table('users')->insert(
            [
                'name' => 'silvia',
                'email' => 'callmesil@gmail.com',
                'password' => Hash::make('kacangbawang'),
                'created_at' => Carbon::now()->toDateTimeLocalString(),
                'updated_at' => Carbon::now()->toDateTimeLocalString()
            ],
            [
                'name' => 'nawang',
                'email' => 'callmenaw@gmail.com',
                'password' => Hash::make('kacangbawang'),
                'created_at' => Carbon::now()->toDateTimeLocalString(),
                'updated_at' => Carbon::now()->toDateTimeLocalString()
            ],
            [
                'name' => 'ardan',
                'email' => 'callmedan@gmail.com',
                'password' => Hash::make('kacangbawang'),
                'created_at' => Carbon::now()->toDateTimeLocalString(),
                'updated_at' => Carbon::now()->toDateTimeLocalString()
            ],
            [
                'name' => 'herman',
                'email' => 'callmeman@gmail.com',
                'password' => Hash::make('kacangbawang'),
                'created_at' => Carbon::now()->toDateTimeLocalString(),
                'updated_at' => Carbon::now()->toDateTimeLocalString()
            ],
        );
    }
}