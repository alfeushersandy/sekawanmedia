<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masterkendaraan extends Model
{
    use HasFactory;
    protected $table = 'master_kendaraan';
    protected $primaryKey = 'id_kendaraan';
    protected $guarded = [];
}
