<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataSekolah extends Model
{
    use HasFactory;

    protected $primaryKey = "id_sekolah";
    protected $table = "data_sekolah";
    protected $guarded = ["id_sekolah"];
}
