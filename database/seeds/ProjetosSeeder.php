<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjetosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projetos')->insert(['nome' => 'ERP', 'estimativa_horas' => 1000]);
        DB::table('projetos')->insert(['nome' => 'BI', 'estimativa_horas' => 2000]);
        DB::table('projetos')->insert(['nome' => 'CRM', 'estimativa_horas' => 3000]);
    }
}
