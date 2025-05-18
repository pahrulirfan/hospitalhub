<?php
namespace App\Http\Controllers\Api;

use App\Models\Spesialisasi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SpesialisasiResource;
use Illuminate\Support\Facades\Validator;

class SpesialisasiController extends Controller
{
    public function index()
    {
        $spesialisasis = Spesialisasi::with('dokters')->get();
        return SpesialisasiResource::collection($spesialisasis);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|unique:spesialisasis,nama',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $spesialisasi = Spesialisasi::create($request->all());
        return new SpesialisasiResource($spesialisasi);
    }

    public function show($id)
    {
        $spesialisasi = Spesialisasi::with('dokters')->findOrFail($id);
        return new SpesialisasiResource($spesialisasi);
    }

    public function update(Request $request, $id)
    {
        $spesialisasi = Spesialisasi::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|unique:spesialisasis,nama,' . $id,
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $spesialisasi->update($request->all());
        return new SpesialisasiResource($spesialisasi);
    }

    public function destroy($id)
    {
        try {
            $spesialisasi = Spesialisasi::findOrFail($id);
            $spesialisasi->delete();
            return response()->json(['message' => 'Data berhasil dihapus.']);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Data dengan ID ' . $id . ' tidak ditemukan.'], 404);
        }

        return response()->json(['message' => 'Spesialisasi berhasil dihapus.']);
    }
}
