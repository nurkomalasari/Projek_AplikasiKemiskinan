<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\OpsiJawaban;
use Illuminate\Http\Request;

class OpsiJawabanController extends Controller
{
    public function index()
    {
        $opsi_jawaban = OpsiJawaban::with('pertanyaan')->get();
        if ($opsi_jawaban) {
            return ResponseFormatter::success(
                $opsi_jawaban,
                'Data opsi jawaban Berhasil di ambil'
            );
        } else {
            return ResponseFormatter::error(
                null,
                'Data Tidak Ada',
                404
            );
        }
        // return response()->json(['opsi jawaban  successfully.', ($opsi_jawaban)]);

        // dd($opsi_jawaban);
    }



    public function create(Request $request)
    {




        $opsi_jawaban = OpsiJawaban::with('pertanyaan')->create([
            'id_pertanyaan' => $request->id_pertanyaan,
            'pilihan_jawaban' => $request->pilihan_jawaban,
            'poin_jawaban' => $request->poin_jawaban,


        ]);

        return response()->json(['opsi jawaban created successfully.', ($opsi_jawaban)]);
    }

    public function show($id)
    {
        $opsi_jawaban = OpsiJawaban::find($id);
        if (is_null($opsi_jawaban)) {
            return response()->json('Data not found', 404);
        }
        return response()->json([($opsi_jawaban)]);
    }

    public function update(Request $request, $id)
    {
        // $opsi_jawaban = $request->id_pertanyaan;
        $opsi_jawaban = OpsiJawaban::find($id)
            ->update([
                'id_pertanyaan' => $request->id_pertanyaan,
                'pilihan_jawaban' => $request->pilihan_jawaban,
                'poin_jawaban' => $request->poin_jawaban,


            ]);
        return response()->json(['Program update successfully.', ($opsi_jawaban)]);
    }

    public function delete($id)
    {
        $opsi_jawaban = OpsiJawaban::find($id);
        $opsi_jawaban->delete();
        # code...
        return "Pertanyaan berhasil didelete";
    }
}
