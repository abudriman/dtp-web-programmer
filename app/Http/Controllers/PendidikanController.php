<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendidikan;

class PendidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return csrf_token();
        return json_encode(Pendidikan::all()); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pendidikan = new Pendidikan;

        $pendidikan->nama_sekolah = $request->nama_sekolah;
        $pendidikan->jurusan = $request->jurusan;
        $pendidikan->tahun_masuk = $request->tahun_masuk;
        $pendidikan->tahun_lulus = $request->tahun_lulus;
        $pendidikan->nomor_ktp = $request->nomor_ktp;

        $pendidikan->save();
        return response(json_encode($pendidikan), 201)->header('Content-Type', 'application/json');
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
        $pendidikan = Pendidikan::find($id);
        
        if($request->nama_sekolah) $pendidikan->nama_sekolah = $request->nama_sekolah;
        if($request->jurusan) $pendidikan->jurusan = $request->jurusan;
        if($request->tahun_masuk) $pendidikan->tahun_masuk = $request->tahun_masuk;
        if($request->tahun_lulus) $pendidikan->tahun_lulus = $request->tahun_lulus;
        if($request->nomor_ktp) $pendidikan->nomor_ktp = $request->nomor_ktp;

        $pendidikan->save();
        return response(json_encode($pendidikan), 200)->header('Content-Type', 'application/json');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pendidikan = Pendidikan::find($id);

        $pendidikan->delete();
        return response(200);
    }
}
