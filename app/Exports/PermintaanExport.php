<?php

namespace App\Exports;

use App\Models\PermintaanKendaraan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\DB;

class PermintaanExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): view
    {
        return view('permintaan_kendaraan.export', [
            'permintaan' => DB::table('tb_permintaan_kendaraan')
                            ->leftJoin('master_kendaraan', 'master_kendaraan.id_kendaraan', '=', 'tb_permintaan_kendaraan.kendaraan_id')
                            ->leftJoin('driver', 'driver.id_driver', '=', 'tb_permintaan_kendaraan.driver_id')
                            ->select('tb_permintaan_kendaraan.*', 'master_kendaraan.nama_kendaraan', 'driver.nama_driver')
                            ->get()
        ]);
    }
}
