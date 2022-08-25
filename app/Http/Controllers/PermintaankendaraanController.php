<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Masterkendaraan;
use App\Models\PermintaanKendaraan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\PermintaanExport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class PermintaankendaraanController extends Controller
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
        $kendaraan = Masterkendaraan::where('status', 1)->get();
        $driver = Driver::where('status', 1)->pluck('nama_driver', 'id_driver');
        return view('permintaan_kendaraan.index', compact('kendaraan', 'driver'));
    }

    public function data()
    {
        
        $permintaan = DB::table('tb_permintaan_kendaraan')
                    ->leftJoin('master_kendaraan', 'master_kendaraan.id_kendaraan', '=', 'tb_permintaan_kendaraan.kendaraan_id')
                    ->leftJoin('driver', 'driver.id_driver', '=', 'tb_permintaan_kendaraan.driver_id')
                    ->select('tb_permintaan_kendaraan.*', 'master_kendaraan.nama_kendaraan', 'driver.nama_driver')
                    ->get();
        return DataTables()
            ->of($permintaan)
            ->addIndexColumn()
            ->addColumn('aksi', function ($permintaan) {
                if($permintaan->status == 'submited'){
                    if(Auth::user()->level == 'manager'){
                        return '
                    <div class="btn-group">
                        <a href="'. route('permintaan.setuju', $permintaan->id_permintaan) .'" class="btn btn-success">Approve</a>
                        <a href="'. route('permintaan.reject', $permintaan->id_permintaan) .'" class="btn btn-danger mr-2">Reject</a>
                        <a href="'. route('permintaan.kembali', $permintaan->id_permintaan) .'" class="btn btn-success" style="display:none">kembali</a>
                    </div>
                    ';
                    }else{
                        return '
                        <div class="btn-group">
                            <a href="'. route('permintaan.kembali', $permintaan->id_permintaan) .'" class="btn btn-success" style="display:none">kembali</a>
                        </div>
                        ';
                    }
                }else if($permintaan->status == 'Approved'){
                    if(Auth::user()->level == 'manager'){
                        return '
                    <div class="btn-group">
                        <a href="'. route('permintaan.setuju', $permintaan->id_permintaan) .'" class="btn btn-danger" style="display:none">Approve</a>
                        <a href="'. route('permintaan.kembali', $permintaan->id_permintaan) .'" class="btn btn-success">kembali</a>
                    </div>
                    ';
                    }else{
                        return '
                        <div class="btn-group">
                            <a href="'. route('permintaan.kembali', $permintaan->id_permintaan) .'" class="btn btn-success">kembali</a>
                        </div>
                        ';
                    }
                }else{
                    return '
                    <div class="btn-group">
                        <a href="'. route('permintaan.setuju', $permintaan->id_permintaan) .'" class="btn btn-danger" style="display:none">Approve</a>
                        <a href="'. route('permintaan.kembali', $permintaan->id_permintaan) .'" class="btn btn-success" style="display:none">kembali</a>
                    </div>
                    ';
                }
            })
            ->rawColumns(['aksi'])
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
        $permintaan = PermintaanKendaraan::latest()->first() ?? new PermintaanKendaraan();
        $kode_permintaan1 = substr($permintaan->kode_permintaan,2);
        $kode_permintaan = (int) $kode_permintaan1 +1;

        $permintaan = new PermintaanKendaraan();
        $permintaan->kode_permintaan = 'PM'.tambah_nol_didepan($kode_permintaan, 5);
        $permintaan->tanggal = now();
        $permintaan->pemohon = $request->pemohon;
        $permintaan->keperluan = $request->keperluan;
        $permintaan->kendaraan_id = $request->kendaraan_id;
        $permintaan->driver_id = $request->driver_id;
        $permintaan->tanggal_pinjam = $request->tanggal_pinjam;
        $permintaan->tanggal_kembali = Null;
        $permintaan->approval_1 = Null;
        $permintaan->approval_2 = Null;
        $permintaan->status = 'submited';
        $permintaan->save();

        toast('data berhasil ditambahkan', 'success');

        return redirect()->route('permintaan.index');
    }

    public function approve($id){
        $permintaan = PermintaanKendaraan::find($id);
        $permintaan->status = 'Approved';
        $permintaan->update();

        $driver = Driver::find($permintaan->driver_id);
        $driver->status = false;
        $driver->update();

        $driver = Masterkendaraan::find($permintaan->kendaraan_id);
        $driver->status = false;
        $driver->update();

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

    public function export() 
    {
        return Excel::download(new PermintaanExport, 'permintaan.xlsx');
    }

    public function kembali($id){
        $permintaan = PermintaanKendaraan::find($id);
        $permintaan->status = 'Approved,Kendaraan Sudah Kembali';
        $permintaan->tanggal_kembali = now();
        $permintaan->update();

        $kendaraan = Masterkendaraan::find($permintaan->kendaraan_id);
        $kendaraan->status = true;
        $kendaraan->update();

        $driver = Driver::find($permintaan->driver_id);
        $driver->status = true;
        $driver->update();

        toast('Kendaraan dan Driver telah Kembali', 'success');

        return redirect()->route('permintaan.index');
    }

    public function reject($id){
        $permintaan = PermintaanKendaraan::find($id);
        $permintaan->status = 'Rejected';
        $permintaan->update();

        toast('Permintaan dengan kode Permintaan ' . $permintaan->kode_permintaan . ' ditolak', 'success');

        return redirect()->route('permintaan.index');
    }
}
