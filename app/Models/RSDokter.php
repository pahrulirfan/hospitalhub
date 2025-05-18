<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class RsDokter extends Pivot
{
    protected $table = 'rs_dokters';

    protected $fillable = ['dokter_id', 'rumah_sakit_id', 'jadwal_praktek'];

    public function dokter()
    {
        return $this->belongsTo(Dokter::class);
    }

    public function rumahSakit()
    {
        return $this->belongsTo(RumahSakit::class);
    }

}

