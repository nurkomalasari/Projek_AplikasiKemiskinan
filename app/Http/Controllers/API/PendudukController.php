<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Penduduk;
use Illuminate\Http\Request;

class PendudukController extends Controller
{
    public function all(Request $request)
    {



        $penduduk = Penduduk::with(['alamat', 'status'])->get();
        if ($penduduk) {
            return ResponseFormatter::success(
                $penduduk,
                'Data penduduk Berhasil di ambil'
            );
        } else {
            return ResponseFormatter::error(
                null,
                'Data Tidak Ada',
                404
            );
        }
    }
}
