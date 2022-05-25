<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'provinces';

    use HasFactory;

    // Province -> Regency (One to Many)
    public function regencies()
    {
        return $this->hasMany(Regency::class);
    }

    // Province -> Store (One to Many)
    public function stores()
    {
        return $this->hasOne(Store::class);
    }
}
