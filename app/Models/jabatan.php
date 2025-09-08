<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Pegawai;

class jabatan extends Model
{
    protected $table = 'jabatan';
    protected $fillable = [
        'jabatan'
    ];
    public function pegawai(): HasMany
    {
        return $this->hasMany(Pegawai::class);
    }
}
