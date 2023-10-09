<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Satuan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SatuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Satuan::truncate();
        Schema::enableForeignKeyConstraints();

        $satuan = [
            [
                'nama_satuan' => 'pack',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama_satuan' => 'botol',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'nama_satuan' => 'item',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];

        foreach ($satuan as $s => $value) {
            Satuan::insert($value);
        }
    }
}
