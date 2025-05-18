<?php
namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\RumahSakit;
use App\Models\RsDokter;
use Illuminate\Http\Request;

class PraktekDokterController extends Controller
{
    public function index()
    {
        $praktek = RsDokter::with(['dokter', 'rumahSakit'])->get();
        return view('praktek_dokter.index', compact('praktek'));
    }

    public function create()
    {
        $dokters = Dokter::all();
        $rumahSakits = RumahSakit::all();
        return view('praktek_dokter.create', compact('dokters', 'rumahSakits'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'dokter_id' => 'required|exists:dokters,id',
            'rumah_sakit_id' => 'required|exists:rumah_sakits,id',
            'jadwal_praktek' => 'nullable|string',
        ]);

        RsDokter::create($request->only(['dokter_id', 'rumah_sakit_id', 'jadwal_praktek']));

        return redirect()->route('praktek-dokter.index')->with('success', 'Praktek dokter berhasil ditambahkan.');
    }

    public function edit($dokter_id, $rumah_sakit_id)
    {
        $entry = RsDokter::where('dokter_id', $dokter_id)
            ->where('rumah_sakit_id', $rumah_sakit_id)
            ->firstOrFail();

        $dokters = Dokter::all();
        $rumahSakits = RumahSakit::all();

        return view('praktek_dokter.edit', compact('entry', 'dokters', 'rumahSakits'));
    }

    public function update(Request $request, $dokter_id, $rumah_sakit_id)
    {
        $request->validate([
            'jadwal_praktek' => 'nullable|string',
        ]);

        $entry = RsDokter::where('dokter_id', $dokter_id)
            ->where('rumah_sakit_id', $rumah_sakit_id)
            ->firstOrFail();

        $entry->update(['jadwal_praktek' => $request->jadwal_praktek]);

        return redirect()->route('praktek-dokter.index')->with('success', 'Jadwal praktek diperbarui.');
    }

    public function destroy($dokter_id, $rumah_sakit_id)
    {
        RsDokter::where('dokter_id', $dokter_id)
            ->where('rumah_sakit_id', $rumah_sakit_id)
            ->delete();

        return redirect()->route('praktek-dokter.index')->with('success', 'Data praktek dihapus.');
    }
}

