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

    function tambahform()
    {
        return view('tambah');
    }

    function tambah(Request $request) {
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

        return redirect()->route('admin.dashboard')->with('success', 'Destinasi Berhasil Ditambah');
    }

    function formedit($id) {
        $destinasi = Destinasi::find($id);
        return view('edit', ['destinasi' => $destinasi]);
    }
    
    function edit(Request $request, $id) {
        $destinasi = Destinasi::find($id);
    
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoNama = time() . '.' . $foto->getClientOriginalExtension();
            $foto->move(public_path('img'), $fotoNama);
            $destinasi->foto = $fotoNama;
        }
    
        $destinasi->nama = $request->input('nama');
        $destinasi->alamat = $request->input('alamat');
        $destinasi->link = $request->input('link');
        $destinasi->deskripsi = $request->input('deskripsi');
        $destinasi->save();
    
        return redirect()->route('admin.dashboard')->with('success', 'Destinasi Berhasil diubah');
    }
    
    
    public function hapus($id) {
        // Hapus destinasi berdasarkan ID
        Destinasi::destroy($id);
        return redirect()->route('admin.dashboard')->with('success', 'Destinasi berhasil dihapus');
    }
}
