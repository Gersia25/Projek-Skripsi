<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $primaryKey = "id_kelas";
    protected $table = "kelas";
    protected $guarded = ["id_kelas"];
    protected $with = ["guru"];

    public function guru()
    {
        return $this->belongsTo(Guru::class, "id_wali");
    }
}
