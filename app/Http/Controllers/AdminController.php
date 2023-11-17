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

    function edit(Request $request, $id) {
        $destinasi = Destinasi::find($id);
    
        $data = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'link' => 'required',
            'deskripsi' => 'required',
        ]);
    
        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('img'), $imageName);
            $data['foto'] = 'img/' . $imageName;
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
    
        $imageName = time() . '.' . $request->foto->getClientOriginalName();
        $request->foto->move(public_path('img'), $imageName);
    
        Destinasi::create([
            'foto' => 'img/' . $imageName,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'link' => $request->link,
            'user_id' => auth()->id(),
            'deskripsi' => $request->deskripsi,
        ]);
    
        return redirect()->route('admin.dashboard')->with('success', 'Destinasi Berhasil Ditambah');
    }

    public function show($id)
    {
        $destinasi = Destinasi::find($id);

        return view('detail', compact('destinasi'));
    }
}
