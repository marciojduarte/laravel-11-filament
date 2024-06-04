<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgenteSaude extends Model
{
    use HasFactory;

    // Atributos que podem ser preenchidos em massa
    protected $fillable = [
        'nome',
        'telefone',
        'regiao',
    ];
}
