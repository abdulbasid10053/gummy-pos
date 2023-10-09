<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Supplier;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Supplier::truncate();
        Schema::enableForeignKeyConstraints();

        $supplier = [
            [

                'nama' => 'safrizal',
                'no_tlp' => '082298352607',
                'alamat' => 'Amerika srikit',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()


            ],
            [

                'nama' => 'anif',
                'no_tlp' => '082546312607',
                'alamat' => 'cilacap',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()


            ],
            [

                'nama' => 'rijalul',
                'no_tlp' => '082795842607',
                'alamat' => 'poncowarno bumen',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()


            ]
        ];
        foreach ($supplier as $sup => $value) {
            Supplier::insert($value);
        }
    }
}
