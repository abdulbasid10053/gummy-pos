<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Customer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SeederCustomer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Customer::truncate();
        Schema::enableForeignKeyConstraints();

        $customer = [

            [
                'nama' => 'umum',
                'no_tlp' => '0123466546',
                'alamat' => 'umum',
                'poin' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama' => 'joker',
                'no_tlp' => '0856462323',
                'alamat' => 'bruno',
                'poin' => '1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];

        foreach ($customer as $c => $v) {
            Customer::insert($v);
        }
    }
}
