<?php

namespace App\Http\Controllers;

use App\Exports\BbmExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class BensinreportController extends Controller
{
    public function index(){
        return view('report.bbm');
    }

    public function getData($tanggal_awal, $tanggal_akhir){
        $permintaan = DB::table('master_kendaraan')->orderBy('id_kendaraan')
        ->get();

        foreach ($permintaan as $item) {
            $bensin = DB::table('permintaan_bbm')
                    ->leftJoin('tb_permintaan_kendaraan', 'tb_permintaan_kendaraan.id_permintaan', '=', 'permintaan_bbm.permintaan_id')
                    ->where('tb_permintaan_kendaraan.kendaraan_id', $item->id_kendaraan)
                    ->where('permintaan_bbm.tanggal', '>=', $tanggal_awal)
                    ->where('permintaan_bbm.tanggal', '<=', $tanggal_akhir)
                    ->select('permintaan_bbm.*', 'master_kendaraan.nama_kendaraan', 'driver.nama_driver', 'tb_permintaan_kendaraan.kode_permintaan')
                    ->sum('permintaan_bbm.jumlah');

                    $row = array();
                        $row['nama_kendaraan'] = $item->nama_kendaraan;
                        $row['total'] = $bensin;
            
                        $data[] = $row;
        }

        return datatables()
            ->of($data)
            ->addIndexColumn()
            ->make(true);
        }

    

    public function export(Request $request) 
    {
        return Excel::download(new BbmExport($request->date1, $request->date2), 'permintaanBBM_'.$request->date1 .'-'. $request->date2 .'.xlsx');
    }
}
