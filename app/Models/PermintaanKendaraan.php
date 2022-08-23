<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermintaanKendaraan extends Model
{
    use HasFactory;
    protected $table = 'tb_permintaan_kendaraan';
    protected $primaryKey = 'id_permintaan';
    protected $guarded = [];

    public function kendaraan(){
        return $this->hasMany(Masterkendaraan::class, 'id_kendaraan', 'kendaraan_id');
    }
}
