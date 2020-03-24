<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MeuControlador extends Controller
{
    public $familia;

    public function __construct()
    {
        $this->familia = "<p><a href='/'>Voltar</a></p>";
    }

    public function familia() {
        $this->familia .= "<a href='/pai'>" . MeuControlador::pai() . "</a>";
        $this->familia .= "<a href='/mae'>" . MeuControlador::mae() . "</a>";
        $this->familia .= "<a href='/filho1'>" . MeuControlador::filho1() . "</a>";
        $this->familia .= "<a href='/filho2'>" . MeuControlador::filho2() . "</a>";
        $this->familia .= "<a href='/pet'>" . MeuControlador::pet() . "</a>";
        return $this->familia;
    }

    public static function pai() {
        $familia = "<p>Alex Botelho | <a href='/familia'>Voltar</a></p>";
        return $familia;
    }

    public function mae() {
        $familia = "<p>Luciana Botelho | <a href='/familia'>Voltar</a></p>";
        return $familia;
    }

    public function filho1() {
        $familia = "<p>Marcel Botelho | <a href='/familia'>Voltar</a></p>";
        return $familia;
    }

    public function filho2() {
        $familia = "<p>Ítalo Botelho | <a href='/familia'>Voltar</a></p>";
        return $familia;
    }

    public function pet() {
        $familia = "<p>Nina Botelho | <a href='/familia'>Voltar</a></p>";
        return $familia;
    }
}
