<?php

namespace App\Http\Controllers;

use App\Models\Alamat;
use App\Models\Penduduk;
use App\Models\Status;
use Illuminate\Http\Request;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('penduduk.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $status = Status::orderBy('status_penduduk', 'DESC')->get();
        $alamat = Alamat::orderBy('alamat_lengkap', 'DESC')->get();


        return view('penduduk.create')->with([
            'status' => $status,
            'alamat' => $alamat

        ]);
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
        $this->validate($request, [
            'id_alamat' => 'required',
            'nama' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'id_status' => 'required',
            'pekerjaan' => 'required',
            'kewarganegaraan' => 'required',


        ]);
        $data = array(
            'id_alamat'     =>  $request->id_alamat,
            'nama'    =>  $request->nama,
            'tanggal_lahir'     =>  $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama'     =>  $request->agama,
            'id_status'     =>  $request->id_status,
            'pekerjaan'     =>  $request->pekerjaan,
            'kewarganegaraan'     =>  $request->kewarganegaraan,

        );


        Penduduk::insert($data);
    }

    public function read()
    {

        $data = Penduduk::orderBy('id', 'DESC')->get();;
        return view('penduduk.read')->with([
            'data' => $data
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Penduduk::findOrFail($id);
        return view('penduduk.edit')->with([
            'data' => $data
        ]);
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
        $data = Penduduk::findOrFail($id);
        $data->id_alamat = $request->id_alamat;
        $data->nama = $request->nama;
        $data->tanggal_lahir = $request->tanggal_lahir;
        $data->jenis_kelamin = $request->jenis_kelamin;
        $data->agama = $request->agama;
        $data->id_status = $request->id_status;
        $data->pekerjaan = $request->pekerjaan;
        $data->kewarganegaran = $request->kewarganegaran;

        $data->save();
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
        $data = Penduduk::findOrFail($id);
        $data->delete();
    }
}
