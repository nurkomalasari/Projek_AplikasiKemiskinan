<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    protected $table = 'stores';

    protected $fillable = [
        "name",
        "province_id",
        "regency_id",
        "district_id",
        "village_id",
        "address",
    ];

    // Inverse
    public function province()
    {
        return $this->belongsTo(Province::class);
    }
    // Inverse
    public function regency()
    {
        return $this->belongsTo(Regency::class);
    }
    // Inverse
    public function district()
    {
        return $this->belongsTo(District::class);
    }
    // Inverse
    public function village()
    {
        return $this->belongsTo(Village::class);
    }
}
