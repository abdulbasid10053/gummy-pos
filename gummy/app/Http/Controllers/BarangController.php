<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Satuan;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Console\View\Components\Confirm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::User();
        $barang = Barang::paginate(100);
        return view('/barang.index', compact('barang', 'user'));
    }
    public function print(Request $request)
    {
        $user = Auth::User();
        $barang = Barang::paginate(100);
        //    $databarcode = array();
        //    foreach ($request->id as $id ) {
        //     $barang = Barang::find($id);
        //  }
        return view('/barang.printbarcode', compact('barang', 'user'));
    }
    public function create()
    {
        $user = Auth::User();
        $kategori = Kategori::all();
        $satuan = Satuan::all();
        $q = DB::table('barang')->select(DB::raw('MAX(RIGHT(barcode,4)) as kode'));
        $kd = "";
        if ($q->count() > 0) {
            foreach ($q->get() as $k) {
                $tmp = ((int)$k->kode) + 1;
                $kd = sprintf("%04s", $tmp);
            }
        } else {
            $kd = "0001";
        }
        return view('barang.create', compact('kategori', 'satuan', 'kd', 'user'));
    }
    public function simpan(Request $request)
    {
        Barang::create($request->except(['token', 'submmit']));

        return redirect('/barang');
    }
    public function edit($id)
    {
        $user = Auth::User();
        $barang = Barang::find($id);
        $kategori = Kategori::all();
        $satuan = Satuan::all();
        return view('/barang.edit', compact('barang', 'kategori', 'satuan', 'user'));
    }
    public function update($id, Request $request)
    {
        $barang = Barang::find($id);
        $barang->update($request->except(['token', 'submmit']));
        return redirect('/barang');
    }
    public function destroy($id)
    {

        $barang = Barang::find($id);
        $barang->delete();
        return redirect('/barang');
    }
    public function laporanbarang()
    {
        $user = Auth::User();
        $barang = Barang::paginate(100);
        return view('/laporan.laporan_dataBarang', compact('barang', 'user'));
    }
}
