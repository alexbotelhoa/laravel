<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DesenvolvedoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('desenvolvedores')->insert(['nome' => 'Alex Botelho', 'cargo' => 'Analista Sr']);
        DB::table('desenvolvedores')->insert(['nome' => 'Marcel Botelho', 'cargo' => 'Analista Pl']);
        DB::table('desenvolvedores')->insert(['nome' => 'Ítalo Botelho', 'cargo' => 'Analista Jr']);
    }
}
