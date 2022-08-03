<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome_workshop',
        'nomes_alunos',
        'tipo_workshop',
        'jcgm_id',
        'obs',
        'ficheiro_id',
        'desc',
        'guiao',

    ];
    public function ficheiro()
    {
        return $this->belongsTo('App\Models\Ficheiro');
    }
    public function jcgm()
    {
        return $this->belongsTo(App\Models\Jcgm::class);
    }
}
