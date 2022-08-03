<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjetosAluno extends Model
{
    use HasFactory;
    protected $fillable = [
        'nomes_alunos',
        'ano',
        'jcgm_id',
        'link_video',
        'ficheiro_id',
        'local_video',
        'nome_disciplina',
        'categoria',
        'obs',
        'imagemVideo',

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
