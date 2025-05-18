<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    protected $table = 'dokters';
    protected $guarded = [];

    public function spesialisasi()
    {
        return $this->belongsTo(Spesialisasi::class);
    }

    public function rumahSakits()
    {
        return $this->belongsToMany(RumahSakit::class, 'rs_dokters')
            ->withPivot('jadwal_praktek')
            ->withTimestamps();
    }


}
