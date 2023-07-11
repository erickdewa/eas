<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $table = 'nilais';
    protected $fillable = ['id', 'year', 'semester', 'nbi', 'code_mk', 'nilai', 'created_at', 'updated_at'];
}
