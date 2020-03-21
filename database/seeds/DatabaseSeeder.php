<?php

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
        $this->call(DesenvolvedoresSeeder::class);
        $this->call(ProjetosSeeder::class);
        $this->call(AlocacoesSeeder::class);
    }
}
