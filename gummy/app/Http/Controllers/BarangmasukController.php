<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Barang;
use App\Models\Satuan;
use App\Models\Supplier;
use Barryvdh\DomPDF\PDF;
use App\Models\Barangmasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BarangmasukController extends Controller
{
    public function index()
    {
        $user = Auth::User();
        $barang_masuk = Barangmasuk::all();
        return view('/barang_masuk.index', compact('user', 'barang_masuk'));
    }
    // public function generatepdf()
    // {
    //     $data = Barangmasuk::all();
    //     $data = ['title' => 'test'];
    //     $pdf = PDF::loadView('/barang_masuk.index', $data);
    //     return $pdf->download('Barangmasuk.pdf');
    // }
    public function create()
    {
        $user = Auth::User();
        $u = User::all();
        $satuan = Satuan::all();
        $supplier = Supplier::all();
        $barang = Barang::all();
        return view('barang_masuk.create', compact('user', 'satuan', 'supplier', 'barang', 'u'));
    }
    public function simpan(Request $request)
    {
        Barang::where('id', $request->barang_id)->update(['stok' => $request->total_stok]);
        Barangmasuk::create($request->except(['token', 'submmit']));
        return redirect('/barang_masuk');
    }
    public function edit($id)
    {
        $user = Auth::User();
        $u = User::all();
        $satuan = Satuan::all();
        $supplier = Supplier::all();
        $barang = Barang::all();
        $barangmasuk = Barangmasuk::find($id);
        return view('/barang_masuk.edit', compact('barangmasuk', 'user', 'supplier', 'barang', 'satuan', 'u'));
    }
    public function update($id, Request $request)
    {
        $barang = Barangmasuk::find($id);
        $barang->update($request->except(['token', 'submmit']));
        Barang::where('id', $request->barang_id)->update(['stok' => $request->jumlah_masuk]);
        return redirect('/barang_masuk');
    }
    public function destroy($id)
    {
        $barang = Barangmasuk::find($id);
        $barang->delete();
        return redirect('/barang_masuk');
    }
    public function laporanbarangmasuk()
    {
        $user = Auth::User();
        $barang_masuk = Barangmasuk::all();
        return view('/laporan.laporan_barangMasuk', compact('user', 'barang_masuk'));
    }
}
