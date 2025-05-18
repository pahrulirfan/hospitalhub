<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RumahSakit extends Model
{
    protected $table = 'rumah_sakits';
    protected $fillable = [
        'nama',
        'alamat',
        'kota',
        'telepon',
    ];

    public function dokters()
    {
        return $this->belongsToMany(Dokter::class, 'rs_dokters')
            ->withPivot('jadwal_praktek')
            ->withTimestamps();
    }

}
