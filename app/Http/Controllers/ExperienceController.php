<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Experience;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return csrf_token();
        return json_encode(Experience::all()); 
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
        foreach ($request->experience as $value) {
            $experience = new Experience;

            $experience->perusahaan = $value["perusahaan"];
            $experience->jabatan = $value["jabatan"];
            $experience->tahun = $value["tahun"];
            $experience->keterangan = $value["keterangan"];
            $experience->nomor_ktp = $value["nomor_ktp"];

            $experience->save();
        }
        return response(json_encode($experience), 201)->header('Content-Type', 'application/json');
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
        foreach ($request->experience as $value) {
            if($value["id"]==0){
                $experience = new Experience;

                $experience->perusahaan = $value["perusahaan"];
                $experience->jabatan = $value["jabatan"];
                $experience->tahun = $value["tahun"];
                $experience->keterangan = $value["keterangan"];
                $experience->nomor_ktp = $value["nomor_ktp"];

                $experience->save();
                continue;

            }
            $experience = Experience::find($value["id"]);
            
            if($value['perusahaan']) $experience->perusahaan = $value['perusahaan'];
            if($value['jabatan']) $experience->jabatan = $value['jabatan'];
            if($value['tahun']) $experience->tahun = $value['tahun'];
            if($value['keterangan']) $experience->keterangan = $value['keterangan'];
            if($value['nomor_ktp']) $experience->nomor_ktp = $value['nomor_ktp'];

            $experience->save();
        }
        return response(json_encode($experience), 200)->header('Content-Type', 'application/json');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $experience = Experience::find($id);

        $experience->delete();
        return response(200);
    }
}
