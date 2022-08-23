<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermintaanBbm extends Model
{
    use HasFactory;
    protected $table = 'permintaan_bbm';
    protected $primaryKey = 'id_permintaan_bbm';
    protected $guarded = [];
}
