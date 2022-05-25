<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Pertanyaan;
use Illuminate\Http\Request;

class PertanyaanController extends Controller
{
    public function index()
    {
        return Pertanyaan::all();
    }

    public function create(Request $request)
    {




        $pertanyaan = Pertanyaan::create([
            'Isi_pertanyaan' => $request->Isi_pertanyaan,
        ]);

        return response()->json(['Program created successfully.', ($pertanyaan)]);
    }

    public function show($id)
    {
        $pertanyaan = Pertanyaan::find($id);
        if (is_null($pertanyaan)) {
            return response()->json('Data not found', 404);
        }
        return response()->json([($pertanyaan)]);
    }

    public function update(Request $request, $id)
    {
        // $pertanyaan = $request->Isi_pertanyaan;
        $pertanyaan = Pertanyaan::find($id)
            ->update([
                'Isi_pertanyaan' => $request->Isi_pertanyaan,
            ]);
        return response()->json(['Program update successfully.', ($pertanyaan)]);
    }

    public function delete($id)
    {
        $pertanyaan = Pertanyaan::find($id);
        $pertanyaan->delete();
        # code...
        return "Pertanyaan berhasil didelete";
    }
    public function pertanyaan()
    {
        $pertanyaan = Pertanyaan::with(['opsiJawaban'])->get()->toArray();
        return response()->json(['Program update successfully.', ($pertanyaan)]);
    }
}
