<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelRaport extends Model
{
    use HasFactory;

    protected $table = "format_raport";
    protected $guarded = ["id_format"];
    protected $primaryKey = "id_format";
}
