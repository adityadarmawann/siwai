<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UnitKerja extends Model
{
    protected $table = 'unit_kerja';
    
    protected $fillable = [
        'unit_kerja',
        'skpd_id'
    ];

    public function skpd(): BelongsTo
    {
        return $this->belongsTo(Skpd::class);
    }

    public function pegawai(): HasMany
    {
        return $this->hasMany(Pegawai::class);
    }
}