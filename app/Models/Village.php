<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    protected $table = 'villages';

    use HasFactory;
    // Inverse
    public function district()
    {
        return $this->belongsTo(District::class);
    }

    // Village -> Store (One to Many)
    public function stores()
    {
        return $this->hasOne(Store::class);
    }
}
