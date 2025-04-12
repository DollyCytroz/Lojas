<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livraria extends Model
{

    protected $table = 'livraria';
    protected $fillable = [
        'nome_livraria',
        'setor',
        'funcionarios_livraria',
    ];
}
