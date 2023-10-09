<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Barang;
use App\Models\Barangkeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BarangkeluarController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::User();
        $retur = Barangkeluar::paginate(10);
        /*digunakan ketika tidak menggukanan data tables*/
        // if ($request->has('search')) {
        //     $retur = Barangkeluar::paginate(5)->where('barang', 'like', '%' . $request->search . '%');
        // } else {
        //     $retur = Barangkeluar::paginate(5);
        // }
        return view('/barang_keluar.index', compact('retur', 'user'));
    }

    public function create()
    {
        $user = Auth::User();
        $barang = Barang::all();
        $u = User::all();
        return view('barang_keluar.create', compact('u', 'barang', 'user'));
    }
    public function simpan(Request $request)
    {
        Barang::where('id', $request->barang_id)->update(['stok' => $request->total_stok]);
        Barangkeluar::create($request->except(['token', 'submmit']));
        return redirect('/retur');
    }
    public function destroy($id)
    {
        $retur = Barangkeluar::find($id);
        $retur->delete();
        return redirect('/retur');
    }
    public function laporanbarangkeluar()
    {
        $user = Auth::User();
        $retur = Barangkeluar::paginate(5);
        return view('/laporan.laporan_barangKeluar', compact('retur', 'user'));
    }
}
