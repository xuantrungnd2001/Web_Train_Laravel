<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function login()
    {
        return view('auth.login');
    }
    public function processLogin(Request $request)
    {
        $user = User::where('account', $request->account)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                session(['user' => $user]);
                return redirect()->route('user.index');
            }
        }
        return redirect()->route('login');
    }
    public function logout()
    {
        session()->flush();
        return redirect()->route('login');
    }
}