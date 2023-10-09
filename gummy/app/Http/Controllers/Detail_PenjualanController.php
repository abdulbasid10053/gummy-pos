<?php

namespace App\Http\Controllers;

use App\Models\Barangkeluar;
use App\Models\Detail_penjualan;
use App\Models\Sales;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Detail_PenjualanController extends Controller
{
    public function index()
    {
        $id = $_GET['id'];
        // $id = '5';
        // $sales = Sales::paginate(5);
        // // $detail = Detail_penjualan::whare('penjualan_id')->id(11);
        // $detail = DB::table('detailpenjualan')->select(DB::raw("detailpenjualan where penjualan_id = '11'"));
        $data['jual'] = DB::table('penjualan')->where('id', $id)->first();
        $data['detail'] = DB::table('detailpenjualan')
            ->join('barang', 'barang.id', '=', 'detailpenjualan.barang_id')
            ->where('detailpenjualan.penjualan_id', $id)->get();

        return view('transaksi.struk', $data);
    }

    public function laporan()
    {
        $user = Auth::user();
        $detail = Detail_penjualan::all();
        return view('/laporan.laporan_barangTerjual', compact('detail', 'user'));
    }

    public function detail($id)
    {
        $detail = Detail_penjualan::find($id);
        return view('transaksi.struk', compact('detail'));
    }
}
