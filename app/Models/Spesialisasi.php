<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Spesialisasi extends Model
{
    protected $fillable = ['nama'];

    public function dokters(): HasMany
    {
        return $this->hasMany(Dokter::class);
    }
}
