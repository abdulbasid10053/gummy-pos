<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use App\Models\Barang;
use App\Models\Barangmasuk;
use App\Models\Barangkeluar;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::User();
        $u = User::all()->count();
        $customer = Customer::all()->count();
        $barang = Barang::all()->count();
        $barang_keluar = Barangkeluar::all()->count();
        $barang_masuk = Barangmasuk::all()->count();
        $sales = Sales::all()->count();
        return view('dashboard', compact('barang', 'u', 'customer', 'barang_keluar', 'barang_masuk', 'sales', 'user'));
    }
}
