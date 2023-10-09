<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        if ($user = Auth::user()) {

            if ($user->level == '1') {
                return redirect()->intended('/');
            } elseif ($user->level == '2') {
                return redirect()->intended('/penjualan');
            }
            return redirect()->intended('/');
        }
        return view('login', compact('user'));
    }

    public function proses(Request $request)
    {
        $request->validate(

            [
                'username' => 'required',
                'password' => 'required'
            ],

            [
                'username.required' => 'Username tidak boleh Kosong',
            ]

        );

        $kredensial = $request->only('username', 'password');

        if (Auth::attempt($kredensial)) {

            $request->session()->regenerate();
            $user = Auth::user();
            if ($user->level == '1') {
                return redirect()->intended('/');
            } elseif ($user->level == '2') {
                return redirect()->intended('/penjualan');
            }
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'username' => 'maaf username or password salah'
        ])->onlyInput('username');
    }
    public function keluar()
    {
        Auth::logout();
        Session::flush();
        return redirect('login');
    }
}
