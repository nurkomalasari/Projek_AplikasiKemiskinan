<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alamat extends Model
{
    use HasFactory;
    protected $table = 'alamats';

    protected $fillable = [
        'rt', 'rw', 'desa', 'kecamatan', 'kabupaten_kota', 'provinsi', 'kode_pos', 'alamat_lengkap'
    ];

    public function penduduk()
    {
        return $this->hasMany(Penduduk::class);
    }
}
