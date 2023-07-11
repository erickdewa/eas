<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MataKuliah extends Model
{
    protected $table = 'mata_kuliahs';
    protected $fillable = ['id', 'code', 'name', 'sks', 'created_at', 'updated_at'];
}
