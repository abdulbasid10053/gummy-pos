<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SatuanController extends Controller
{
    public function index()
    {
        $user = Auth::User();
        $satuan = Satuan::paginate(100);
        return view('/satuan.index', compact('satuan', 'user'));
    }
    public function create()
    {
        $user = Auth::User();
        return view('satuan.create', compact('user'));
    }
    public function simpan(Request $request)
    {
        Satuan::create($request->except(['token', 'submit']));
        return redirect('/satuan');
    }
    public function edit($id)
    {
        $user = Auth::User();
        $satuan = Satuan::find($id);
        return view('/satuan.edit', compact('satuan', 'user'));
    }
    public function update(Request $request, $id)
    {
        $satuan = Satuan::find($id);
        $satuan->update($request->except(['token', 'submit']));
        return redirect('/satuan');
    }
    public function destroy($id)
    {
        $satuan = Satuan::find($id);
        $satuan->delete();
        return redirect('/satuan');
    }
}
