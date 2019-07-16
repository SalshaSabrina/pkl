<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    protected $table = "sekolah";
    protected $primaryKey = "id";
    protected $fillable = ['nama_siswa', 'nama_guru', 'nama_pelajaran', 'kelas', 'nis'];
}
