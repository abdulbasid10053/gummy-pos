<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KategoriController extends Controller
{
    public function index()
    {
        $user = Auth::User();
        $kategori = Kategori::all();
        return view('/kategori.index', compact('kategori', 'user'));
    }
    public function create()
    {
        $user = Auth::User();
        return view('kategori.create', compact('user'));
    }
    public function simpan(Request $request)
    {
        Kategori::create($request->except(['token', 'submit']));
        return redirect('/kategori');
    }
    public function edit($id)
    {
        $user = Auth::User();
        $kategori = Kategori::find($id);
        return view('/kategori.edit', compact('kategori', 'user'));
    }
    public function update($id, Request $request)
    {
        $kategori = Kategori::find($id);
        $kategori->update($request->except(['token', 'submit']));
        return redirect('/kategori');
    }
    public function destroy($id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();
        return redirect('/kategori');
    }
}
