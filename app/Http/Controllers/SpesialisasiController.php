<?php
namespace App\Http\Controllers;

use App\Models\Spesialisasi;
use Illuminate\Http\Request;

class SpesialisasiController extends Controller
{
    public function index()
    {
        $spesialisasis = Spesialisasi::all();
        return view('spesialisasis.index', compact('spesialisasis'));
    }

    public function create()
    {
        return view('spesialisasis.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|unique:spesialisasis,nama|max:255',
        ]);

        Spesialisasi::create($request->all());

        return redirect()->route('spesialisasis.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit(Spesialisasi $spesialisasi)
    {
        return view('spesialisasis.edit', compact('spesialisasi'));
    }

    public function update(Request $request, Spesialisasi $spesialisasi)
    {
        $request->validate([
            'nama' => 'required|unique:spesialisasis,nama,' . $spesialisasi->id,
        ]);

        $spesialisasi->update($request->all());

        return redirect()->route('spesialisasis.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(Spesialisasi $spesialisasi)
    {
        $spesialisasi->delete();

        return redirect()->route('spesialisasis.index')->with('success', 'Data berhasil dihapus.');
    }
}
