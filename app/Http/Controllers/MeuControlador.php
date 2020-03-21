<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MeuControlador extends Controller
{
    public function familia() {
        $familia = MeuControlador::pai();
        $familia .= MeuControlador::mae();
        $familia .= MeuControlador::filho1();
        $familia .= MeuControlador::filho2();
        $familia .= MeuControlador::pet();

        return $familia;
    }

    public static function pai() {
        return "Alex Botelho<br>";
    }

    public static function mae() {
        return "Luciana Botelho<br>";
    }

    public static function filho1() {
        return "Marcel Botelho<br>";
    }

    public static function filho2() {
        return "Ítalo Botelho<br>";
    }

    public static function pet() {
        return "Nina Botelho<br>";
    }
}
