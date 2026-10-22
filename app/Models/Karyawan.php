<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $fillable = [
        'username',
        'password',
        'email',
        'level',
        'nama_karyawan',
        'alamat',
        'jenis_kelamin',
        'jabatan'
    ];
}