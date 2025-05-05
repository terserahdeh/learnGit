<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\detail_mahasiswa;

class MahasiswaController extends Controller
{
    public function index(){
        $mahasiswa = detail_mahasiswa::all(); 
        return view('mahasiswa.index', ['mahasiswa' => $mahasiswa]); 
    }
    public function create(){
        return view('mahasiswa.create');
    }
    public function store(Request $request){
        $data = $request->validate([
            'nama' => 'required',
            'nim' => 'required',
            'alamat'=> 'required'
        ]);

        $newMhs = detail_mahasiswa::create($data);
        return redirect(route('Mahasiswa.index'));
    }
    public function edit(detail_mahasiswa $mahasiswa){
         return view('Mahasiswa.edit',['mahasiswa'=>$mahasiswa]);
    }
    public function update(detail_mahasiswa $mahasiswa, Request $request){
        $data = $request->validate([
            'nama' => 'required',
            'nim' => 'required',
            'alamat'=> 'required'
        ]);

        $mahasiswa->update($data);
        return redirect(route('Mahasiswa.index'))->with('success', 'Mahasiswa berhasil diperbarui');
    }
    public function delete(detail_mahasiswa $mahasiswa){
        $mahasiswa->delete();
        return redirect(route('Mahasiswa.index'))->with('success', 'Mahasiswa berhasil dihapus');
    }
}
