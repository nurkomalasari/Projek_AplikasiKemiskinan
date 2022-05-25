<?php

namespace App\Http\Controllers;

use App\Models\HasilSurvei;
use App\Models\Penduduk;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;

class HasilSurveyController extends Controller
{
    public function index()
    {
        return view('hasilSurvey.index');
    }

    public function read()
    {
        $penduduk = Penduduk::with([
            'hasilSurvey',
            'hasilSurvey.pertanyaan',
            'hasilSurvey.opsiJawaban',
            'hasilSurvey.surveyor'
        ])
            ->get()
            ->toArray();
        // $data = HasilSurvei::with([
        //     'pertanyaan', 'opsiJawaban', 'penduduk', 'surveyor'
        // ])
        //     ->get()
        //     ->toArray();

        dd($penduduk);
    }

    public function pertanyaan()
    {
        $pertanyaan = Pertanyaan::with(['opsiJawaban'])->get()->toArray();

        dd($pertanyaan);
    }
}
