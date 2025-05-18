<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RumahSakitResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nama' => $this->nama,
            'alamat' => $this->alamat,
            'kota' => $this->kota,
            'telepon' => $this->telepon,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
