<?php
namespace App\Http\Controllers;
use App\Models\RumahSakit;
use Illuminate\Http\Request;

class RumahSakitController extends Controller
{
    public function index()
    {
        $rumahSakits = RumahSakit::latest()->get();
        return view('rumah_sakits.index', compact('rumahSakits'));
    }

    public function create()
    {
        return view('rumah_sakits.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'nullable',
            'kota' => 'nullable',
            'telepon' => 'nullable',
        ]);

        RumahSakit::create($request->all());

        return redirect()->route('rumah_sakits.index')->with('success', 'Data rumah sakit berhasil ditambahkan.');
    }

    public function edit(RumahSakit $rumahSakit)
    {
        return view('rumah_sakits.edit', compact('rumahSakit'));
    }

    public function update(Request $request, RumahSakit $rumahSakit)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        $rumahSakit->update($request->all());

        return redirect()->route('rumah_sakits.index')->with('success', 'Data rumah sakit berhasil diperbarui.');
    }

    public function destroy(RumahSakit $rumahSakit)
    {
        $rumahSakit->delete();
        return back()->with('success', 'Data rumah sakit berhasil dihapus.');
    }
}
