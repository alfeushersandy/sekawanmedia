<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use App\Models\Masterkendaraan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {
    $this->middleware('auth');
    }

    public function index(){
        $kendaraan_tersedia = Masterkendaraan::where('status', 1)->count();
        $driver_tersedia = Driver::where('status', 1)->count();
        $kendaraan_keluar = Masterkendaraan::where('status', 0)->count();

        $kijang_inova = DB::table('tb_permintaan_kendaraan')
                ->where('kendaraan_id', 1)
                ->count();

        $pick_up = DB::table('tb_permintaan_kendaraan')
                ->where('kendaraan_id', 2)
                ->count();

        $wuling = DB::table('tb_permintaan_kendaraan')
                ->where('kendaraan_id', 3)
                ->count();

        $hrv = DB::table('tb_permintaan_kendaraan')
                ->where('kendaraan_id', 4)
                ->count();


        return view('dashboard.index', [
            'kendaraan_tersedia' => $kendaraan_tersedia,
            'driver_tersedia' => $driver_tersedia,
            'kendaraan_keluar' => $kendaraan_keluar,

            'kijang_inova' => $kijang_inova,
            'pick_up' => $pick_up,
            'wuling' => $wuling,
            'hrv' => $hrv,
        ]);
    }
}
