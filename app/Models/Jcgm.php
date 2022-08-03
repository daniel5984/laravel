<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jcgm extends Model
{
    use HasFactory;
    protected $fillable = [
        'ano',
        'siteApp',
        'desc_Ecgm',
        'desc_Dwm',
        'desc_NCGM',
        'selecionado',

    ];
    public function palestras()
    {
        return $this->hasMany(\App\Models\Palestra::class);
    }
    public function ficheiros()
    {
        return $this->hasMany(\App\Models\Ficheiro::class);
    }
}
