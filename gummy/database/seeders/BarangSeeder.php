<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Barang;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Barang::truncate();
        Schema::enableForeignKeyConstraints();

        $barang = [
            [
                'barcode' => 'DUMMY-0100',
                'nama_barang' => 'ayam bakar keju',
                'harga' => '15000',
                'harga_jual' => '20000',
                'stok' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'barcode' => 'DUMMY-0101',
                'nama_barang' => 'Sapi bakar keju',
                'harga' => '50000',
                'harga_jual' => '70000',
                'stok' => '0',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];
        foreach ($barang as $brg => $value) {
            Barang::insert($value);
        }
    }
}
