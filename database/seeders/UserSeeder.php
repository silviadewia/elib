<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
        DB::table('users')->insert(
            [
                'nis' => '1234567890',
                'name' => 'silvia',
                'nama_lengkap' => 'silvia',
                'jurusan' => "RPL",
                'tempat_lahir' => 'bandung',
                'tanggal_lahir' => '2000-01-01',
                'level' => 0,
                'jenis_kelamin' => 'p',
                'telepon' => '081234567890',
                'foto' => 'default.png',
                'alamat' => 'bandung',
                'email' => 'callmesil@gmail.com',
                'password' => Hash::make('kacangbawang'),
                'created_at' => Carbon::now()->toDateTimeLocalString(),
                'updated_at' => Carbon::now()->toDateTimeLocalString()
            ],
        );
    }
}
