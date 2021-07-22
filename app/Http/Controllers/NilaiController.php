<?php

namespace App\Http\Controllers;

use App\Nilai;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function index()
    {
        $nilai = Nilai::with(['mahasiswa'])->get(); // select * from nama_table
        return view('nilai.index', compact('nilai'));
    }

    public function create()
    {
        $user = User::all();
        return view('mahasiswa.create', compact('user'));
    }

    public function store(Request $request)
    {
        Mahasiswa::create($request->all());
        alert()->success('Sukses','Data Berhasil Disimpan');
        return redirect()->route('mahasiswa');
    }

    public function edit($id)
    {
        $user = User::all();
        $mahasiswa = Mahasiswa::find($id); // select * from nam_table where id = $id;
        return view('mahasiswa.edit', compact('mahasiswa', 'user'));
    }

    public function update(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->update($request->all());
        toast('YEAHHH!!! Berhasil Mengedit Data','success');
        return redirect()->route('mahasiswa');
    }

    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->delete();
        toast('YEAHHH!!! Berhasil Menghapus Data','success');
        return redirect()->route('mahasiswa');
    }
}
