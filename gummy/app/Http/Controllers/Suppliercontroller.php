<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Suppliercontroller extends Controller
{
    public function index()
    {
        $user = Auth::User();
        $supplier = Supplier::paginate(5);
        return view('supplier.index', ["titel" => "Supplier"], compact('supplier', 'user'));
    }
    public function create()
    {
        $user = Auth::User();
        return view('supplier.create', ["titel" => "Tambah supplier"], compact('user'));
    }
    public function simpan(Request $request)
    {
        Supplier::create($request->except(['token', 'submmit']));
        return redirect('/supplier');
    }
    public function edit($id)
    {
        $user = Auth::User();
        $supplier = Supplier::find($id);
        return view('/supplier.edit', ["titel" => "supplier"], compact('supplier', 'user'));
    }
    public function update($id, Request $request)
    {
        $supplier = Supplier::find($id);
        $supplier->update($request->except(['token', 'submmit']));
        return redirect('/supplier');
    }
    public function destroy($id)
    {
        $supplier = Supplier::find($id);
        $supplier->delete();
        return redirect('/supplier');
    }
}
