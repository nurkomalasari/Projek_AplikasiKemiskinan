<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Penduduk extends Model
{

    use SoftDeletes;

    protected $table = 'penduduks';
    protected $fillable = [
        'id_alamat', 'nama', 'tanggal_lahir', 'jenis_kelamin', 'agama', 'id_status', 'pekerjaan', 'kewarganegaraan'
    ];

    public function alamat()
    {
        return $this->belongsTo(Alamat::class, 'id');
    }
    public function status()
    {
        return $this->belongsTo(Status::class, 'id');
    }

    public function hasilSurvey()
    {
        return $this->hasMany(HasilSurvei::class, 'id_penduduk');
    }
    // protected $hidden;
}
