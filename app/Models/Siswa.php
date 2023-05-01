<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $primaryKey = "id_siswa";
    protected $table = "siswa";
    protected $guarded = ["id_siswa"];
    protected $with = ["absensi"];

    public function user()
    {
        return $this->belongsTo(User::class, "id_user");
    }
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, "id_kelas");
    }

    public function absensi()
    {
        return $this->hasMany(Kehadiran::class, "nisn_siswa", "nisn");
    }
}
