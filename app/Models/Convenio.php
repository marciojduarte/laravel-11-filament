<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Convenio extends Model
{
    use HasFactory;
     // Atributos que podem ser preenchidos em massa
     protected $fillable = ['nome', 'valor_cota'];

     public function calendarios()
    {
        return $this->hasMany(Calendario::class);
    }

         // Mutator para formatar o valor da cota
     public function getValorCotaAttribute($value)
     {
         return number_format($value, 2, ',', '.');
     }


}
