<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Calendario extends Model
{
    use HasFactory;

    // Atributos que podem ser preenchidos em massa
    protected $fillable = [
        'data',
        'limite',
        'convenio_id',
    ];

    /**
     * Relação com o modelo Convenio
     * Um calendário pertence a um convênio.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function convenio():BelongsTo
    {
        return $this->belongsTo(Convenio::class);
    }
}
