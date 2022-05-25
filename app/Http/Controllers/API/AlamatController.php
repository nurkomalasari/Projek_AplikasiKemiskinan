<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Alamat;
use Illuminate\Http\Request;

class AlamatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all(Request $request)
    {
        $alamat = Alamat::all();
        if ($alamat) {
            return ResponseFormatter::success(
                $alamat,
                'Data Alamat Ready'
            );
        } else {
            return ResponseFormatter::error(
                null,
                'Data Tidak Ada',
                404
            );
        }
    }
    public function index(Request $request)
    {
        $id = $request->input('id');
        $rt = $request->input('rt');
        $rw = $request->input('rw');
        $desa = $request->input('desa');
        $kecamatan = $request->input('kecamatan');
        $kabupaten_kota = $request->input('kabupaten_kota');
        $provinsi = $request->input('provinsi');
        $kode_pos = $request->input('kode_pos');
        $alamat_lengkap = $request->input('alamat_lengkap');

        if ($id) {
            $alamat = Alamat::find($id);
            if ($alamat) {
                return ResponseFormatter::success(
                    $alamat,
                    'Data Alamat Berhasil di ambil'
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $alamat = new Alamat;
        $alamat->rt = $request->rt;
        $alamat->rw = $request->rw;
        $alamat->desa = $request->desa;
        $alamat->kecamatan = $request->kecamatan;
        $alamat->kabupaten_kota = $request->kabupaten_kota;
        $alamat->Provinsi = $request->Provinsi;
        $alamat->kode_post = $request->kode_post;
        $alamat->alamat_lengkap = $request->alamat_lengkap;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
