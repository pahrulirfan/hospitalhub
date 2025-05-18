<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DokterResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nama' => $this->nama,
            'no_str' => $this->no_str,
            'jenis_kelamin' => $this->jenis_kelamin,
            'tanggal_lahir' => $this->tanggal_lahir,
            'spesialisasi' => new SpesialisasiResource($this->whenLoaded('spesialisasi')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
