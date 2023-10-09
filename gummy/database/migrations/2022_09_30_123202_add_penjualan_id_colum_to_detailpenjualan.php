<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detailpenjualan', function (Blueprint $table) {
            $table->unsignedBigInteger('penjualan_id')->required()->after('jumlah_keluar');
            $table->foreign('penjualan_id')->references('id')->on('penjualan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detailpenjualan', function (Blueprint $table) {
            $table->dropForeign('penjualan_id');
            $table->dropColumn('penjualan_id');
        });
    }
};
