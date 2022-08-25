<?php

namespace App\Http\Controllers;

use App\Models\PermintaanBbm;
use App\Models\PermintaanKendaraan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\BbmExport;
use Maatwebsite\Excel\Facades\Excel;

class PermintaanBbmController extends Controller
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
        $permintaan = PermintaanKendaraan::all();
        return view('permintaan_bbm.index', compact('permintaan'));
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

    public function data()
    {
        
        $permintaan = DB::table('permintaan_bbm')
                    ->leftJoin('tb_permintaan_kendaraan', 'tb_permintaan_kendaraan.id_permintaan', '=', 'permintaan_bbm.permintaan_id')
                    ->leftJoin('driver', 'driver.id_driver', '=', 'tb_permintaan_kendaraan.driver_id')
                    ->leftJoin('master_kendaraan', 'master_kendaraan.id_kendaraan', '=', 'tb_permintaan_kendaraan.kendaraan_id')
                    ->select('permintaan_bbm.*', 'master_kendaraan.nama_kendaraan', 'driver.nama_driver', 'tb_permintaan_kendaraan.kode_permintaan')
                    ->get();
        return DataTables()
            ->of($permintaan)
            ->addIndexColumn()
            ->make(true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $permintaan = new PermintaanBbm();
        $permintaan->tanggal = now();
        $permintaan->permintaan_id = $request->id_permintaan;
        $permintaan->jumlah = $request->jumlah;
        $permintaan->save();

        toast('data berhasil ditambahkan', 'success');

        return redirect()->route('bensin.index');
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

    public function export() 
    {
        return Excel::download(new BbmExport, 'permintaanbbm.xlsx');
    }
}
