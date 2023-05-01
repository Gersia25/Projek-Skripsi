<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TahunAjaran extends Model
{
    use HasFactory;

    protected $primaryKey = "id_ta";
    protected $table = "tahun_ajaran";
    protected $guarded = ["id_ta"];
}
