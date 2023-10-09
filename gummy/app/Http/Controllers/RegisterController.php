<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }
    public function simpan(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|max:255',
            'password' => 'required|max:255',
            'email' => 'required|email:dns',
            'nama' => 'required|max:255',
            'hp' => 'required|max:255',
            'level' => 'required|max:1',
        ]);
        $validatedData['password'] = bcrypt($validatedData['password']);
        User::create($validatedData);
        return redirect('/login');
    }
    public function struk()
    {
        return view("/transaksi.struk");
    }
}
