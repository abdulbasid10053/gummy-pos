<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function index()
    {
        $user = Auth::User();
        $customer = Customer::paginate(10);
        return view('customer.index', compact('customer', 'user'));
    }

    public function create()
    {
        $user = Auth::User();
        return view('customer.create', compact('user'));
    }
    public function simpan(Request $request)
    {
        Customer::create($request->except(['token', 'submmit']));
        return redirect('/customer');
    }
    public function edit($id)
    {
        $user = Auth::User();
        $customer = Customer::find($id);
        return view('/customer.edit', compact('customer', 'user'));
    }
    public function update($id, Request $request)
    {
        $customer = Customer::find($id);
        $customer->update($request->except(['token', 'submmit']));
        return redirect('/customer');
    }
    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        return redirect('/customer');
    }
}
