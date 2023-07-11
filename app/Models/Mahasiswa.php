<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswas';
    protected $fillable = ['id', 'year', 'name', 'nbi', 'fakultas', 'created_at', 'updated_at'];
}
