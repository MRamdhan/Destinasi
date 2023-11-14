<?php

namespace App\Http\Controllers;

use App\Models\Destinasi;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    function add(Request $request) {
        $validator = $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif',
            'nama' => 'required',
            'alamat' => 'required',
            'link' => 'required',
            'deskripsi' => 'required',
        ]);

        $foto =$request->file('foto');
        $fotoNama = time() . '.' . $foto->getClientOriginalExtension();
        $foto->move(public_path('img'),$fotoNama);

        $destinasis = new Destinasi();
        $destinasis->foto = $fotoNama;
        $destinasis->nama = $validator['nama'];
        $destinasis->alamat = $validator['alamat'];
        $destinasis->link = $validator['link'];
        $destinasis->deskripsi = $validator['deskripsi'];
        $destinasis->save();

        return response()->json($destinasis, 201);
    }

    function getAll(){
        $data = Destinasi::all();
        
        return response()->json($data);
    }

    function getDetail(Destinasi $data){
        return response()->json($data);
    }
}
