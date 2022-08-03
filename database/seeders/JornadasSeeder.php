<?php

namespace Database\Seeders;

use App\Models\Jcgm;
use Illuminate\Database\Seeder;

class JornadasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jornada = new Jcgm();
        $jornada->ano = 2022;
        $jornada->siteApp = "jcgm.com";
        $jornada->data_inicial = "2022-07-12 20:43:57";
        $jornada->data_final = "2022-07-25 20:43:57";
        $jornada->desc_Ecgm = "desc_Ecgm";
        $jornada->desc_Dwm = "desc_Dwm";
        $jornada->desc_NCGM = "desc_NCGM";
        $jornada->selecionado = 1;

        $jornada->save();

    }
}
