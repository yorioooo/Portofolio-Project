<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fish;
class FishController extends Controller
{
    public function index()
    {
        $fishs = Fish::all();
        return view('fish.index', ['fishs' => $fishs]);
    }
    public function edit(Fish $fish)
    {
        return view('fish.edit', ['fish' => $fish]);
    }
    public function show($fish)
    {
        $result = Fish::findOrFail($fish);
        return view('fish.show', ['fish' => $result]);
    }
    public function destroy(Fish $fish)
    {
        $fish->delete();
        return redirect()->route('fishs.index')
        ->with('pesan',"Hapus data $fish->Author berhasil");
    }
    public function create()
    {
        return view('fish.create');
    }
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'Species' => 'required',
            'Weight' => 'required',
            'Length' => 'required',
            'Diagonal' => 'required',
            'Height' => 'required',
            'Width' => 'required',
        ]);
        
        Fish::create($validateData);
        
        return redirect()->route('fishs.index')
            ->with('pesan', "Penambah data {$validateData['Species']} berhasil");
    }

    public function update(Request $request, Fish $fish)
    {
        $validateData = $request->validate([
            'Species' => 'required',
            'Weight' => 'required',
            'Length' => 'required',
            'Diagonal' => 'required',
            'Height' => 'required',
            'Width' => 'required',
        ]);
        
        Fish::where('id', $fish->id)->update($validateData);

        return redirect()->route('fishs.show', ['fish' => $fish->id])
            ->with('pesan', "Update data {$validateData['Species']} berhasil");
    }
}