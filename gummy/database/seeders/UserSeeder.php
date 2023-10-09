<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Schema;
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
        Schema::disableForeignKeyConstraints();
        User::truncate();
        Schema::enableForeignKeyConstraints();

        $user = [
            [
                'username' => 'admin',
                'password' => bcrypt('admin'),
                'nama' => 'Arif Ibrahim',
                'email' => 'arif.ibrahim@gmail.com',
                'hp' => '082298352607',
                'status' => 1,
                'level' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()


            ],
            [
                'username' => 'kasir',
                'password' => bcrypt('kasir'),
                'nama' => 'Hanna Yunika',
                'email' => 'hay.ika@gmail.com',
                'hp' => '082298356542',
                'status' => 1,
                'level' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()


            ],
            [
                'username' => 'kasir2',
                'password' => bcrypt('kasir2'),
                'nama' => 'ika',
                'email' => 'ika@gmail.com',
                'hp' => '082548356542',
                'status' => 0,
                'level' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()


            ],
            [
                'username' => 'pemilik',
                'password' => bcrypt('pemilik'),
                'nama' => 'Kriswanto',
                'email' => 'wanto.uye@gmail.com',
                'hp' => '082265492607',
                'status' => 1,
                'level' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()


            ]

        ];
        foreach ($user as $u => $value) {
            User::insert($value);
        }
    }
}
