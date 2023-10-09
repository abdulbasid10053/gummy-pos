<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\FlareClient\Api;
use Symfony\Contracts\Service\Attribute\Required;



class UserController extends Controller
{

    public function index()
    {
        // $user = Auth::User(); adalah user yang terlogin
        $user = Auth::User();
        $u = User::all();
        return view('user.index', ["titel" => "user"], compact('user', 'u'));
    }
    public function create()
    {
        $user = Auth::User();
        return view('user.create', compact('user'));
    }
    public function simpan(Request $request)
    {

        $request->validate([
            'username' => 'required|max:255',
            'password' => 'required|max:255',
            'email' => 'required|email:dns',
            'nama' => 'required|max:255',
            'hp' => 'required|max:255',
            'level' => 'required|max:1',
            /*'status' => 'required|max:1',*/
        ]);

        // $validated['password'] = Hash::make($validated['password']);
        User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'nama' => $request->nama,
            'hp' => $request->hp,
            'level' => $request->level,
        ]);
        /*digunakan bila ga di validasi*/
        //User::create($request->except(['token', 'submmit']));
        return redirect('/user');
    }

    public function edit($id)
    {

        $user = Auth::User();
        $u = User::find($id);
        return view('/user.edit', ["titel" => "akun"], compact('user', 'u'));
    }
    public function update($id, Request $request)
    {
        $u = User::find($id);
        //dd($request); /*worked*/

        // $validated = $request->validate([
        //     'username' => 'required|max:255',
        //     'password' => 'required|max:255',
        //     'email' => 'required|email:dns',
        //     'nama' => 'required|max:255',
        //     'hp' => 'required|max:255',
        //     'level' => 'required|max:1',
        //     'status' => 'required|max:1',
        // ]);
        // $validated['password'] = Hash::make($request['password']);

        // $u->update($request);
        /*normal tanpa enskrip passsword*/
        $u->update($request->except(['token', 'submmit']));
        return redirect('/user');
    }
    public function destroy($id)
    {
        $u = User::find($id);
        $u->delete();
        return redirect('/user');
    }
    /*ga dipake*/
    public function editPassword($id, Request $request)
    {
        $user = Auth::User();
        $u = User::find($id);
        //$u->bcrypt(['password']);
        // $validated = $request->validate([
        //     'password' => bcrypt($u)
        // ]);
        return view('/user.editPassword', compact('user', 'u'));
    }

    // update password validasi
    public function updatePassword($id, Request $request)
    {
        /*worked tapi hanya untuk user yang terlogin*/
        //$u = User database
        $u = User::find($id);
        //cek password lama
        $cek = Hash::check($request->old_password, auth()->user()->password);

        if (!$cek) {
            return back()->with('error', 'Old Password Ga sama bro');
            dd('old password ga sama');
        }

        //cek password baru dan confirm password
        if ($request->new_password != $request->repeat_password) {
            return back()->with('error', 'password baru dan konfirmasi password ga sama');
            // dd('new pw sama cfrm pw ga sama');
        }
        // dd(auth()->user($u));
        auth()->user($u);
        //dd($u);
        $u->update([
            'password' => Hash::make($request->new_password)
        ]);
        /*belum jadi ke pake teori kurang matang*/
        // $request->validate([
        //     'old_password' => ['current_password', 'required'],
        //     'newPassword' => ['required', 'min:3'],
        //     'Password' => ['required', 'min:3', 'confirmed'],
        // ]);
        // $u->update();
        return redirect('/user')->with('status', 'Ganti Password Telah Sukses');
        //return back()->with('status', 'Ganti Password Telah Sukses');
    }
}
