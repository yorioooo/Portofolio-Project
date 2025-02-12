<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswa::all();
        return view('mahasiswa.index', ['mahasiswas' => $mahasiswas]);
    }
    public function edit(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.edit', ['mahasiswa' => $mahasiswa]);
    }
    public function show($mahasiswa)
    {
        $result = Mahasiswa::findOrFail($mahasiswa);
        return view('mahasiswa.show', ['mahasiswa' => $result]);
    }
    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();
        return redirect()->route('mahasiswas.index')
        ->with('pesan',"Hapus data $mahasiswa->nama berhasil");
    }
    public function create()
    {
        return view('mahasiswa.create');
    }
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nim' => 'required|size:8|unique:mahasiswas',
            'nama' => 'required|min:3|max:50',
            'jenis_kelamin' => 'required|in:P,L',
            'jurusan' => 'required',
            'alamat' => '',
        ]);
         
        Mahasiswa::create($validateData);
        
        return redirect()->route('mahasiswas.index')->with('pesan',
        "Penambah data {$validateData['nama']}  berhasil");;
    }
    
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $validateData = $request->validate([
        'nim' => 'required|size:8|unique:mahasiswas,nim,'.$mahasiswa->id,
        'nama' => 'required|min:3|max:50',
        'jenis_kelamin' => 'required|in:P,L',
        'jurusan' => 'required',
        'alamat' => '',
    ]);
     
    Mahasiswa::where('id', $mahasiswa->id)->update($validateData);

    return redirect()->route('mahasiswas.show', ['mahasiswa' => $mahasiswa->id])
        ->with('pesan', "Update data {$validateData['nama']} berhasil");
    }
}