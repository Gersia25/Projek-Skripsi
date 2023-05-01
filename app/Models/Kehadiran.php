<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kehadiran extends Model
{
    use HasFactory;
    protected $primaryKey = "id_kehadiran";
    protected $table = "kehadiran";
    protected $guarded = ["id_kehadiran"];
}
