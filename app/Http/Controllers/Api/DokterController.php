<?php
namespace App\Http\Controllers\Api;

use App\Models\Dokter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\DokterResource;
use Illuminate\Support\Facades\Validator;

class DokterController extends Controller
{
    public function index()
    {
        $dokters = Dokter::with('spesialisasi')->get();
        return DokterResource::collection($dokters);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string',
            'no_str' => 'required|string|unique:dokters',
            'jenis_kelamin' => 'required|in:L,P',
            'tanggal_lahir' => 'nullable|date',
            'spesialisasi_id' => 'required|exists:spesialisasis,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $dokter = Dokter::create($request->all());
        return new DokterResource($dokter->load('spesialisasi'));
    }

    public function show($id)
    {
        $dokter = Dokter::with('spesialisasi')->findOrFail($id);
        return new DokterResource($dokter);
    }

    public function update(Request $request, $id)
    {
        $dokter = Dokter::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'nama' => 'sometimes|string',
            'no_str' => 'sometimes|string|unique:dokters,no_str,' . $dokter->id,
            'jenis_kelamin' => 'sometimes|in:L,P',
            'tanggal_lahir' => 'nullable|date',
            'spesialisasi_id' => 'sometimes|exists:spesialisasis,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $dokter->update($request->all());
        return new DokterResource($dokter->load('spesialisasi'));
    }

    public function destroy($id)
    {
        $dokter = Dokter::findOrFail($id);
        $dokter->delete();
        return response()->json(['message' => 'Dokter deleted successfully.']);
    }
}
