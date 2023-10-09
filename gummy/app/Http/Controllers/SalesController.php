<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Sales;
use App\Models\Barang;
use App\Models\Barangkeluar;
use App\Models\Barangmasuk;
use App\Models\Customer;
use App\Models\Detail_penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SalesController extends Controller
{
    public function index()
    {
        $user = Auth::User();
        $customer = Customer::all();
        $barang = Barang::all();
        $sales = Sales::paginate(5);
        $u = User::all();
        $kd = DB::table('customer');
        $kd = "1";
        $q = DB::table('penjualan')->select(DB::raw('MAX(RIGHT(invoice,4)) as kode'));
        $kde = "";
        if ($q->count() > 0) {
            foreach ($q->get() as $k) {
                $tmp = ((int)$k->kode) + 1;
                $kde = sprintf("%04s", $tmp);
            }
        } else {
            $kde = "0001";
        }
        return view('transaksi/penjualan', compact('sales', 'customer',  'barang', 'user', 'kd', 'kde', 'u'));
    }

    /*laporan*/
    public function det()
    {
        $barang = Barang::all()->count();
        $sales = Sales::all()->count();
        $retur = Barangkeluar::all()->count();
        $barang_masuk = Barangmasuk::all()->count();
        $user = Auth::User();
        return view('laporan/detail_laporan', compact('sales', 'retur', 'barang_masuk', 'barang', 'user'));
    }
    /*akhir laporan*/

    public function simpan(Request $request)
    {
        // $sales = Sales::all();
        $sales = Sales::create($request->except(['token', 'submmit']));
        for ($i = 0; $i < count($request->barang_id); $i++) {
            DB::table('detailpenjualan')->insert([
                'jumlah_keluar' => $request->jumlah_keluar[$i],
                'barang_id' => $request->barang_id[$i],
                'penjualan_id' => $sales->id
            ]);
            Barang::where('id', $request->barang_id[$i])->update(['stok' => $request->sisa_stok[$i]]);
        }

        //retrun redirect('transaksi/struk');
        return redirect('/detailPenjualan?id=' . $sales->id);
    }
    public function struk()
    {
        return view('transaksi/struk');
    }
    public function proses(Request $request)
    {
        Barang::where('id', $request->barang_id)->update(['stok' => $request->total_stok]);
        //Sales::create($request->except(['token', 'submmit']));
    }
    public function destroy($id)
    {
        $sales = Sales::find($id);
        $sales->delete();
        return redirect('/penjualan');
    }
}
