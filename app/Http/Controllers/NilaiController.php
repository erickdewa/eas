<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\MataKuliah;
use App\Models\Nilai;
use PDF;

class NilaiController extends Controller
{
    public function index() {
        return view('pages.nilai.index');
    }
    public function create() {
        return view('pages.nilai.create');
    }
    public function edit($id) {
        return view('pages.nilai.edit')
            ->with('obj', Nilai::find($id));
    }

    public function store(Request $request) {
        $request->validate([
            'year' => 'required|string',
            'semester' => 'required|string',
            'nbi' => 'required|string',
            'code_mk' => 'required|string',
            'nilai' => 'required|string',
        ]);

        $nilai = new Nilai;
        $nilai->year = $request->year;
        $nilai->semester = $request->semester;
        $nilai->nbi = $request->nbi;
        $nilai->code_mk = $request->code_mk;
        $nilai->nilai = $request->nilai;
        $nilai->save();

        return redirect()->route('nilai.index')
            ->with('success', 'Nilai berhasil ditambahkan');
    }

    public function update($id, Request $request) {
        $nilai = Nilai::find($id);
        $request->validate([
            'year' => 'required|string',
            'semester' => 'required|integer',
            'nbi' => 'required|string',
            'code_mk' => 'required|string',
            'nilai' => 'required|integer|min:1',
        ]);

        $nilai->year = $request->year;
        $nilai->semester = $request->semester;
        $nilai->nbi = $request->nbi;
        $nilai->code_mk = $request->code_mk;
        $nilai->nilai = $request->nilai;
        $nilai->save();

        return redirect()->route('nilai.index')
            ->with('success', 'Nilai berhasil diubah');
    }

    public function destroy($id) {
        $nilai = Nilai::find($id);
        $nilai->delete();

        return redirect()->route('nilai.index')
            ->with('success', 'Nilai berhasil dihapus');
    }

    public function export(Request $request) {
        $request->validate([
            'year' => 'required|string',
            'semester' => 'required|integer',
            'nbi' => 'required|string',
        ]);

        $mahasiswa = Mahasiswa::where('nbi', $request->nbi)->first();
        $nilai = Nilai::where('year', $request->year)
            ->where('semester', $request->semester)
            ->where('nbi', $request->nbi)
            ->get();

        $pdf = PDF::loadview('report.nilai', compact('request', 'mahasiswa', 'nilai'));
        return $pdf->stream();
        // return $pdf->download('Nilai-' . $request->nbi . '-Semester-' . $request->semester . '-' . $request->year . '.pdf');
    }
}
