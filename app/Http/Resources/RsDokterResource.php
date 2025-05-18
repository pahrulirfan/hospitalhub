<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RsDokterResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'jadwal_praktek' => $this->jadwal_praktek,
            'rumah_sakit' => new RumahSakitResource($this->whenLoaded('rumahSakit')),
            'dokter' => new DokterResource($this->whenLoaded('dokter')),
            'created_at' => $this->created_at,
        ];
    }
}
