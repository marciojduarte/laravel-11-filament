<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitante extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'nome',
        'contato',
        'matricula',
        'telefone_comercial',
        'telefone_celular',
    ];
}
