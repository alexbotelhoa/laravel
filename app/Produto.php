<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['nome'];

    public function categoria()
    {
        return $this->belongsTo('App\Categoria');
    }
}
