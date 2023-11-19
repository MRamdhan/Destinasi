<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function loginform()
    {
        return view('login');
    }

    function login(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return redirect()->back()->with('message', 'Data Tidak Lengkap');
        }

        if(!Auth::attempt($request->only(['email', 'password']))){
            return redirect()->back()->with('message', 'Email atau Password salah!');
        }

        $user = User::where('email', $request->email)->first();
        $token = $user->createToken("API TOKEN")->plainTextToken;

        return redirect()->route('admin.dashboard')->with('status', 'Selamat Datatang:'.$user->username);
    }

    function logout()
    {
        if(auth()->check()){
            Auth::user()->tokens()->delete();

            return redirect()->route('login')->with('message', 'Logout Berhasil');
        }
    }
}
