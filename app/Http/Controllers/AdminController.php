<?php

namespace App\Http\Controllers;

use App\Models\Destinasi;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function home()
    {
        $destinasis = Destinasi::all();

        return view('welcome', ['destinasis' => $destinasis]);
    }
    function homeadmin() {
        $destinasis = Destinasi::all();

        return view('homeadmin', ['destinasis' => $destinasis]);
    }
    function tambah() {
        return view('tambah');
    }

    function edit()
    {
        return view('edit');
    }

    function lat() 
    {
        return view('lat');
    }
}
