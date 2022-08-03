<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cartaz extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome_aluno',
        'numero_aluno',

        'jcgm_id',

        'ficheiro_id',

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
