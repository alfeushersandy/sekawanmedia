<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PermintaanExport;

class ReportController extends Controller
{
    public function index(){
        return view('report.index');
    }

    public function getData($tanggal_awal, $tanggal_akhir){
        $permintaan = DB::table('tb_permintaan_kendaraan')
        ->leftJoin('master_kendaraan', 'master_kendaraan.id_kendaraan', '=', 'tb_permintaan_kendaraan.kendaraan_id')
        ->leftJoin('driver', 'driver.id_driver', '=', 'tb_permintaan_kendaraan.driver_id')
        ->where('tanggal_pinjam', '>=', $tanggal_awal)
        ->where('tanggal_pinjam', '<=', $tanggal_akhir)
        ->select('tb_permintaan_kendaraan.*', 'master_kendaraan.nama_kendaraan', 'driver.nama_driver')
        ->get();

        return datatables()
            ->of($permintaan)
            ->addIndexColumn()
            ->make(true);
    }

    public function export(Request $request) 
    {
        return Excel::download(new PermintaanExport($request->date1, $request->date2), 'permintaankendaraan_'.$request->date1 .'-'. $request->date2 .'.xlsx');
    }
}
