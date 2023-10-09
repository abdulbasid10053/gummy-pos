<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StrukController extends Controller
{
    public function index()
    {
        $id = $_GET['id'];
        // $id = '11';
        // $sales = Sales::paginate(5);
        // // $detail = Detail_penjualan::whare('penjualan_id')->id(11);
        // $detail = DB::table('detailpenjualan')->select(DB::raw("detailpenjualan where penjualan_id = '11'"));
        $data['jual'] = DB::table('penjualan')->where('id', $id)->first();
        $data['detail'] = DB::table('detailpenjualan')
            ->join('barang', 'barang.id', '=', 'detailpenjualan.barang_id')
            ->where('detailpenjualan.penjualan_id', $id)->get();

        return view('transaksi.struk', $data);
    }
}
