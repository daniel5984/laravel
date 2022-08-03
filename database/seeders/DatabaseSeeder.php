<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();

        $this->call(RoleSeeder::class);
        $this->call(JornadasSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(FicheiroSeeder::class);
        $this->call(CartazSeeder::class);
        $this->call(PalestraSeeder::class);
        $this->call(WorkshopSeeder::class);
        $this->call(ProjetosAlunosSeeder::class);

    }
}
