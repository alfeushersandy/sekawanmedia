<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Masterkendaraan;
use App\Models\PermintaanKendaraan;
use Illuminate\Http\Request;

class PermintaankendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kendaraan = Masterkendaraan::all();
        $driver = Driver::where('status', 1)->pluck('nama_driver', 'id_driver');
        return view('permintaan_kendaraan.index', compact('kendaraan', 'driver'));
    }

    public function data()
    {
        
        $permintaan = PermintaanKendaraan::all();
        return DataTables()
            ->of($permintaan)
            ->addIndexColumn()
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
        $permintaan = new PermintaanKendaraan();
        $permintaan->tanggal = now();
        $permintaan->pemohon = $request->pemohon;
        $permintaan->keperluan = $request->keperluan;
        $permintaan->kendaraan_id = $request->kendaraan_id;
        $permintaan->driver_id = $request->driver_id;
        $permintaan->tanggal_pinjam = $request->tanggal_pinjam;
        $permintaan->tanggal_kembali = Null;
        $permintaan->approval_1 = Null;
        $permintaan->approval_2 = Null;
        $permintaan->save();

        toast('data berhasil ditambahkan', 'success');

        return redirect()->route('permintaan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permintaan = PermintaanKendaraan::find($id);

        return response()->json($permintaan);
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
        $permintaan = PermintaanKendaraan::find($id)->update($request->all());

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
        $permintaan = PermintaanKendaraan::find($id);
        $permintaan->delete();

        return response(null, 204);
    }
}
