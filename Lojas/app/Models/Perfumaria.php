<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perfumaria extends Model
{
    protected $fillable = [
        'nome_perfumaria',
        'setor_perfumaria',
        'funcionarios_perfumaria',
    ];
}
