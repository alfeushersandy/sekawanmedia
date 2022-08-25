<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\DB;

class BbmExport implements  FromView
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
        $permintaan = DB::table('master_kendaraan')->orderBy('id_kendaraan')
            ->get();
    
            foreach ($permintaan as $item) {
                $bensin = DB::table('permintaan_bbm')
                        ->leftJoin('tb_permintaan_kendaraan', 'tb_permintaan_kendaraan.id_permintaan', '=', 'permintaan_bbm.permintaan_id')
                        ->where('tb_permintaan_kendaraan.kendaraan_id', $item->id_kendaraan)
                        ->where('permintaan_bbm.tanggal', '>=', $this->tanggal_awal)
                        ->where('permintaan_bbm.tanggal', '<=', $this->tanggal_akhir)
                        ->select('permintaan_bbm.*', 'master_kendaraan.nama_kendaraan', 'driver.nama_driver', 'tb_permintaan_kendaraan.kode_permintaan')
                        ->sum('permintaan_bbm.jumlah');
    
                        $row = array();
                            $row['nama_kendaraan'] = $item->nama_kendaraan;
                            $row['total'] = $bensin;
                
                            $data[] = $row;
            }

        return view('permintaan_bbm.export', [
            'bbm' => $data,
            'tanggal_awal' => $this->tanggal_awal,
            'tanggal_akhir' => $this->tanggal_akhir
        ]);
    }
}
