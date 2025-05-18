<?php

namespace App\Http\Controllers\Api;

use App\Models\RumahSakit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\RumahSakitResource;
use Illuminate\Support\Facades\Validator;

class RumahSakitController extends Controller
{
    public function index()
    {
        return RumahSakitResource::collection(RumahSakit::all());
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'kota' => 'required|string|max:100',
            'telepon' => 'required|string|max:15',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $rs = RumahSakit::create($request->all());
        return new RumahSakitResource($rs);
    }

    public function show($id)
    {
        $rs = RumahSakit::findOrFail($id);
        return new RumahSakitResource($rs);
    }

    public function update(Request $request, $id)
    {
        $rs = RumahSakit::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'nama' => 'sometimes|required|string|max:255',
            'alamat' => 'sometimes|required|string',
            'kota' => 'sometimes|required|string|max:100',
            'telepon' => 'sometimes|required|string|max:50',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $rs->update($request->all());
        return new RumahSakitResource($rs);
    }

    public function destroy($id)
    {
        $rs = RumahSakit::findOrFail($id);
        $rs->delete();
        return response()->json(['message' => 'Rumah Sakit berhasil dihapus.']);
    }
}
