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

    function formedit($id) {
        $destinasi = Destinasi::find($id);
        return view('edit', ['destinasi' => $destinasi]);
    }

    function edit(Request $request, $id, Destinasi $destinasi) {
        $destinasi = Destinasi::find($id);
        $data = $request->validate([
            'foto' => 'file|image',
            'nama' => 'required',
            'alamat' => 'required',
            'link' => 'required',
            'deskripsi' => 'required',
        ]);
        if($request->hasFile('foto'))
        {
            $data['foto'] =$request->foto->store('img');
        }
        else
        {
            unset($data['foto']);
        }
        $destinasi->update($data);
        return redirect()->route('admin.dashboard')->with('success', 'Destinasi Berhasil diubah');
    }
    
    public function hapus($id) {
        // Hapus destinasi berdasarkan ID
        Destinasi::destroy($id);
        return redirect()->route('admin.dashboard')->with('success', 'Destinasi berhasil dihapus');
    }
    function homeadmin() {
        $destinasis = Destinasi::all();

        return view('homeadmin', ['destinasis' => $destinasis]);
    }

    function tambahform()
    {
        return view('tambah');
    }

    function tambah(Request $request) {
        $request->validate([
            'foto' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'link' => 'required',
            'deskripsi' => 'required',
        ]);

        $filename = time() .'.'. $request->foto->getClientOriginalName();
        $request->foto->move(public_path('img'),$filename);
        Destinasi::create([
            'foto' => 'img/'. $filename ,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'link' => $request->link,
            'user_id'=>auth()->id(),
            'deskripsi' => $request->deskripsi,
        ]);
        return redirect()->route('admin.dashboard')->with('success', 'Destinasi Berhasil Ditambah');
    }
}
