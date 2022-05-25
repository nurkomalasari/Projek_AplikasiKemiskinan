<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\HasilSurvei;
// use App\Models\OpsiJawaban;
use Illuminate\Http\Request;

class HasilSurveiController extends Controller
{
    public function index()
    {
        $hasil_survey = HasilSurvei::with('pertanyaan', 'opsiJawaban', 'penduduk', 'surveyor', 'pertanyaan')->get();
        if ($hasil_survey) {
            return ResponseFormatter::success(
                $hasil_survey,
                'Data opsi jawaban Berhasil di ambil'
            );
        } else {
            return ResponseFormatter::error(
                null,
                'Data Tidak Ada',
                404
            );
        }
        // return response()->json(['opsi jawaban  successfully.', ($hasil_survey)]);

        // dd($hasil_survey);
    }

    public function tampil()
    {
        $hasil_survey = HasilSurvei::with('pertanyaan', 'opsiJawaban')->where('id_pertanyaan', '=', '1')->orWhere('id_opsi_jawaban')->get();
        // return response()->json(['Program update successfully.', ($hasil_survey)]);
        dd($hasil_survey);

        // return response()->json([($hasil_survey)]);
    }

    public function create(Request $request)
    {




        $hasil_survey = HasilSurvei::with('pertanyaan')->create([
            'id_surveyor' => $request->id_surveyor,
            'id_penduduk' => $request->id_penduduk,
            'id_pertanyaan' => $request->id_pertanyaan,
            'id_opsi_jawaban' => $request->id_opsi_jawaban,
            'tanggal' => $request->tanggal,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
        ]);

        return response()->json(['opsi jawaban created successfully.', ($hasil_survey)]);
    }

    public function show($id)
    {
        $hasil_survey = HasilSurvei::find($id);
        if (is_null($hasil_survey)) {
            return response()->json('Data not found', 404);
        }
        return response()->json([($hasil_survey)]);
    }

    public function update(Request $request, $id)
    {
        // $hasil_survey = $request->id_pertanyaan;
        $hasil_survey = HasilSurvei::find($id)
            ->update([
                'id_surveyor' => $request->id_surveyor,
                'id_penduduk' => $request->id_penduduk,
                'id_pertanyaan' => $request->id_pertanyaan,
                'id_opsi_jawaban' => $request->id_opsi_jawaban,
                'tanggal' => $request->tanggal,
                'longitude' => $request->longitude,
                'latitude' => $request->latitude,


            ]);
        return response()->json(['Program update successfully.', ($hasil_survey)]);
    }

    public function delete($id)
    {
        $hasil_survey = HasilSurvei::find($id);
        $hasil_survey->delete();
        # code...
        return "Pertanyaan berhasil didelete";
    }
}
