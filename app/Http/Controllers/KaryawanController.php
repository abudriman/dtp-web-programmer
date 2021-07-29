<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return json_encode(Karyawan::all()); 
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
        $karyawan = new Karyawan;

        $karyawan->name = $request->name;
        $karyawan->alamat = $request->alamat;
        $karyawan->nomor_ktp = $request->nomor_ktp;

        $karyawan->save();
        return response(json_encode($karyawan), 201)->header('Content-Type', 'application/json');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pendidikan = Karyawan::find($id)->pendidikan;
        $experience = Karyawan::find($id)->experience;
        $data = (object) [
            'pendidikan' => $pendidikan,
            'experience' => $experience
        ];
        return json_encode($data);
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
        $karyawan = Karyawan::where('nomor_ktp', $id)->first();
        if($request->name){
            $karyawan->name = $request->name;
        }        
        if($request->alamat){
            $karyawan->alamat = $request->alamat;
        }
        if($request->nomor_ktp){
            $karyawan->nomor_ktp = $request->nomor_ktp;
        }
        $karyawan->save();
        return response(json_encode($karyawan), 200)->header('Content-Type', 'application/json');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $karyawan = Karyawan::where('nomor_ktp', $id);

        $karyawan->delete();
        return response(200);
    }
}
