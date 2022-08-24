<?php

namespace App\Exports;

use App\Models\PermintaanBbm;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\DB;

class BbmExport implements  FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): view
    {
        return view('permintaan_bbm.export', [
            'bbm' => DB::table('permintaan_bbm')
                        ->leftJoin('tb_permintaan_kendaraan', 'tb_permintaan_kendaraan.id_permintaan', '=', 'permintaan_bbm.permintaan_id')
                        ->leftJoin('driver', 'driver.id_driver', '=', 'tb_permintaan_kendaraan.driver_id')
                        ->leftJoin('master_kendaraan', 'master_kendaraan.id_kendaraan', '=', 'tb_permintaan_kendaraan.kendaraan_id')
                        ->select('permintaan_bbm.*', 'master_kendaraan.nama_kendaraan', 'driver.nama_driver', 'tb_permintaan_kendaraan.kode_permintaan')
                        ->get()
        ]);
    }
}
