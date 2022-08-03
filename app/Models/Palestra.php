<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Palestra extends Model
{
    use HasFactory;
    protected $fillable = [
        'titulo',
        'nome_orador',
        'data',
        'hora',
        'status',
        'desc',
        'site',
        'jcgm_id',
        'numero_telefone',
        'morada',
    ];
    public function ficheiro()
    {
        return $this->belongsTo(App\Models\Ficheiro::class);
    }

    public function jcgm()
    {
        return $this->belongsTo(App\Models\Jcgm::class);
    }

}
