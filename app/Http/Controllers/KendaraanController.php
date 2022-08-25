<?php

namespace App\Http\Controllers;

use App\Models\Masterkendaraan;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    public function __construct()
    {
    $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kendaraan.index');
    }


    public function data()
    {
        
        $kendaraan = Masterkendaraan::all();
        return DataTables()
            ->of($kendaraan)
            ->addIndexColumn()
            ->addColumn('status', function ($driver) {
                if($driver->status == 1){
                    return '<span>Tersedia</span>';
                }else{
                    return '<span>Sedang Digunakan</span>';
                }
            })
            ->rawColumns(['status'])
            ->make(true);
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

        $kendaraan = new Masterkendaraan();
        $kendaraan->nama_kendaraan = $request->nama_kendaraan;
        $kendaraan->nopol = $request->nopol;
        $kendaraan->jenis_aset = $request->jenis_aset;
        $kendaraan->status_aset = $request->status_aset;
        $kendaraan->pekerjaan_terakhir = Null;
        $kendaraan->konsumsi_bbm_terakhir = Null;
        $kendaraan->service_terakhir = Null;
        $kendaraan->status = true;
        $kendaraan->save();

        toast('data berhasil ditambahkan', 'success');

        return redirect()->route('kendaraan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kendaraan = Masterkendaraan::find($id);

        return response()->json($kendaraan);
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
        $kendaraan = Masterkendaraan::find($id)->update($request->all());

        return response()->json('Data berhasil disimpan', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kendaraan = Masterkendaraan::find($id);
        $kendaraan->delete();

        return response(null, 204);
    }
}
