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
        return view('auth/login');
    }

    function login(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return redirect()->back()->with('message', 'Invalid field');
        }

        if(!Auth::attempt($request->only(['email', 'password']))){
            return redirect()->back()->with('message', 'Username atau Password salah!');
        }

        $user = User::where('email', $request->email)->first();
        $token = $user->createToken("API TOKEN")->plainTextToken;

        return redirect()->route('admin.dashboard');
    }

    function logout()
    {
        if(auth()->check()){
            Auth::user()->tokens()->delete();

            return redirect()->route('login');
        }
    }

    // function homeadmin()
    // {
    //     return view('homeadmin');
    // }
}
