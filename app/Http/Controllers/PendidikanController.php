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
        foreach ($request->pendidikan as $value) {
            $pendidikan = new Pendidikan;

            $pendidikan->nama_sekolah = $value["nama_sekolah"];
            $pendidikan->jurusan = $value["jurusan"];
            $pendidikan->tahun_masuk = $value["tahun_masuk"];
            $pendidikan->tahun_lulus = $value["tahun_lulus"];
            $pendidikan->nomor_ktp = $value["nomor_ktp"];

            $pendidikan->save();
        }
        
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
    public function update(Request $request)
    {
        foreach ($request->pendidikan as $value) {
            if($value["id"]==0){
                $pendidikan = new Pendidikan;

                $pendidikan->nama_sekolah = $value["nama_sekolah"];
                $pendidikan->jurusan = $value["jurusan"];
                $pendidikan->tahun_masuk = $value["tahun_masuk"];
                $pendidikan->tahun_lulus = $value["tahun_lulus"];
                $pendidikan->nomor_ktp = $value["nomor_ktp"];

                $pendidikan->save();
                continue;
            }
            $pendidikan = Pendidikan::find($value["id"]);
        
            if($value["nama_sekolah"]) $pendidikan->nama_sekolah = $value["nama_sekolah"];
            if($value["jurusan"]) $pendidikan->jurusan = $value["jurusan"];
            if($value["tahun_masuk"]) $pendidikan->tahun_masuk = $value["tahun_masuk"];
            if($value["tahun_lulus"]) $pendidikan->tahun_lulus = $value["tahun_lulus"];
            if($value["nomor_ktp"]) $pendidikan->nomor_ktp = $value["nomor_ktp"];

            $pendidikan->save();
        }
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
