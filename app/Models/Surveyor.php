<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surveyor extends Model
{
    use HasFactory;
    protected $table = 'surveyors';
    protected $fillable = [
        'no_identitas', 'nama_lengkap', 'jenis_kelamin', 'agama', 'tanggal_lahir', 'alamat'
    ];

    public function hasilSurvey()
    {
        return $this->hasMany(HasilSurvei::class);
    }
}
