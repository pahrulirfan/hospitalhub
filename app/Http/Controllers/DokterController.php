<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Spesialisasi;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    public function index()
    {
        $dokters = Dokter::with('spesialisasi')->latest()->get();
        return view('dokters.index', compact('dokters'));
    }

    public function create()
    {
        $spesialisasis = Spesialisasi::all();
        return view('dokters.create', compact('spesialisasis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'no_str' => 'required|unique:dokters,no_str',
            'jenis_kelamin' => 'required|in:L,P',
            'tanggal_lahir' => 'nullable|date',
            'spesialisasi_id' => 'required|exists:spesialisasis,id',
        ]);

        Dokter::create($request->all());
        return redirect()->route('dokters.index')->with('success', 'Data dokter berhasil ditambahkan.');
    }

    public function edit(Dokter $dokter)
    {
        $spesialisasis = Spesialisasi::all();
        return view('dokters.edit', compact('dokter', 'spesialisasis'));
    }

    public function update(Request $request, Dokter $dokter)
    {
        $request->validate([
            'nama' => 'required',
            'no_str' => 'required|unique:dokters,no_str,' . $dokter->id,
            'jenis_kelamin' => 'required|in:L,P',
            'tanggal_lahir' => 'nullable|date',
            'spesialisasi_id' => 'required|exists:spesialisasis,id',
        ]);

        $dokter->update($request->all());
        return redirect()->route('dokters.index')->with('success', 'Data dokter berhasil diperbarui.');
    }

    public function destroy(Dokter $dokter)
    {
        $dokter->delete();
        return back()->with('success', 'Data dokter berhasil dihapus.');
    }
}

