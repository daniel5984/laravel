<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ficheiro extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome_ficheiro',
        'tipo_ficheiro',
        'link_principal',
        'link_adicional',
        'jcgm_id',
        'desc',
        'tamanho',
        'categoria',
        'filePath',

    ];
    public function jcgm()
    {
        return $this->belongsTo('App\Models\Jcgm');
    }

}
