<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    public function index() {
        return view('pages.mahasiswa.index');
    }
    public function create() {
        return view('pages.mahasiswa.create');
    }
    public function edit($id) {
        return view('pages.mahasiswa.edit')
            ->with('obj', Mahasiswa::find($id));
    }

    public function store(Request $request) {
        $request->validate([
            'year' => 'required|string',
            'nbi' => 'required|string',
            'name' => 'required|string',
            'fakultas' => 'required|string',
        ]);

        $mhs = new Mahasiswa;
        $mhs->year = $request->year;
        $mhs->nbi = $request->nbi;
        $mhs->name = $request->name;
        $mhs->fakultas = $request->fakultas;
        $mhs->save();

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Mahasiswa berhasil ditambahkan');
    }

    public function update($id, Request $request) {
        $mhs = Mahasiswa::find($id);
        $request->validate([
            'year' => 'required|string',
            'nbi' => 'required|string',
            'name' => 'required|string',
            'fakultas' => 'required|string',
        ]);

        $mhs->year = $request->year;
        $mhs->nbi = $request->nbi;
        $mhs->name = $request->name;
        $mhs->fakultas = $request->fakultas;
        $mhs->save();

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Mahasiswa berhasil diubah');
    }

    public function destroy($id) {
        $mhs = Mahasiswa::find($id);
        $mhs->delete();

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Mahasiswa berhasil dihapus');
    }
}
