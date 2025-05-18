<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\RsDokter;
use Illuminate\Http\Request;
use App\Http\Resources\RsDokterResource;

class RsDokterController extends Controller
{
    public function index()
    {
        $data = RsDokter::with(['dokter', 'rumahSakit'])->get();
        return RsDokterResource::collection($data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'rumah_sakit_id' => 'required|exists:rumah_sakits,id',
            'dokter_id' => 'required|exists:dokters,id',
            'jadwal_praktek' => 'required|string',
        ]);

        // Cek apakah sudah ada relasi tersebut
        $exists = \App\Models\RsDokter::where('rumah_sakit_id', $validated['rumah_sakit_id'])
            ->where('dokter_id', $validated['dokter_id'])
            ->exists();

        if ($exists) {
            return response()->json(['message' => 'Data sudah ada'], 409);
        }

        $rsDokter = \App\Models\RsDokter::create($validated);

        return new \App\Http\Resources\RsDokterResource($rsDokter->load(['dokter', 'rumahSakit']));
    }

    public function update(Request $request, $id)
    {
        $rsDokter = \App\Models\RsDokter::find($id);

        if (!$rsDokter) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $validated = $request->validate([
            'jadwal_praktek' => 'required|string',
            // Optional: bisa tambahkan validasi lain jika dibutuhkan
        ]);

        $rsDokter->update($validated);

        return new \App\Http\Resources\RsDokterResource($rsDokter->load(['dokter', 'rumahSakit']));
    }


    public function destroy($id)
    {
        $rsDokter = RsDokter::find($id);

        if (!$rsDokter) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $rsDokter->delete();
        return response()->json(['message' => 'Data berhasil dihapus']);
    }
}
