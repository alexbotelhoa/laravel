<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Desenvolvedor extends Model
{
    protected $table = 'desenvolvedores';

    public function projetos()
    {
        return $this->belongsToMany("App\Projeto", 'alocacoes')->withPivot('horas_semanais');
    }
}
