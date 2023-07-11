<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MataKuliah;

class MataKuliahController extends Controller
{
    public function index() {
        return view('pages.matakuliah.index');
    }
    public function create() {
        return view('pages.matakuliah.create');
    }
    public function edit($id) {
        return view('pages.matakuliah.edit')
            ->with('obj', MataKuliah::find($id));
    }

    public function store(Request $request) {
        $request->validate([
            'code' => 'required|string',
            'name' => 'required|string',
            'sks' => 'required|integer|min:1',
        ]);

        $mk = new MataKuliah;
        $mk->code = $request->code;
        $mk->name = $request->name;
        $mk->sks = $request->sks;
        $mk->save();

        return redirect()->route('matakuliah.index')
            ->with('success', 'Mata Kuliah berhasil ditambahkan');
    }

    public function update($id, Request $request) {
        $mk = MataKuliah::find($id);
        $request->validate([
            'code' => 'required|string',
            'name' => 'required|string',
            'sks' => 'required|integer|min:1',
        ]);

        $mk->code = $request->code;
        $mk->name = $request->name;
        $mk->sks = $request->sks;
        $mk->save();

        return redirect()->route('matakuliah.index')
            ->with('success', 'Mata Kuliah berhasil diubah');
    }

    public function destroy($id) {
        $mk = MataKuliah::find($id);
        $mk->delete();

        return redirect()->route('matakuliah.index')
            ->with('success', 'Mata Kuliah berhasil dihapus');
    }
}
