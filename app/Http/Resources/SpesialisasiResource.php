<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SpesialisasiResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nama' => $this->nama,
            'dokters' => DokterResource::collection($this->whenLoaded('dokters')),
        ];
    }
}

