<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Skpd extends Model
{
    protected $table = 'skpd';
    
    protected $fillable = [
        'skpd'
    ];

    public function unitKerja(): HasMany
    {
        return $this->hasMany(UnitKerja::class);
    }

    public function pegawai(): HasMany
    {
        return $this->hasMany(Pegawai::class);
    }
}