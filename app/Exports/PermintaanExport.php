<?php

namespace App\Exports;

use App\Models\PermintaanKendaraan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\DB;

class PermintaanExport implements FromView
{
    protected $date1;
    protected $date2;

    function __construct($date1, $date2) {
        $this->tanggal_awal = $date1;
        $this->tanggal_akhir = $date2;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): view
    {
        return view('report.export', [
            'permintaan' => DB::table('tb_permintaan_kendaraan')
            ->leftJoin('master_kendaraan', 'master_kendaraan.id_kendaraan', '=', 'tb_permintaan_kendaraan.kendaraan_id')
            ->leftJoin('driver', 'driver.id_driver', '=', 'tb_permintaan_kendaraan.driver_id')
            ->where('tanggal_pinjam', '>=', $this->tanggal_awal)
            ->where('tanggal_pinjam', '<=', $this->tanggal_akhir)
            ->select('tb_permintaan_kendaraan.*', 'master_kendaraan.nama_kendaraan', 'driver.nama_driver')
            ->get(),
            'tanggal_awal' => $this->tanggal_awal,
            'tanggal_akhir' => $this->tanggal_akhir
        ]);
    }
}
