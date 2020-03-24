<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\http\Request;
use App\Projeto;
use App\Desenvolvedor;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('home');
});

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::get('/variavel/{nome?}', function ($nome = null) {
    $return = "<p>Variável => /variavel/'$nome'</p>";
    $return .= "<p><a href='/'>Voltar</a></p>";
    return $return;
});

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::get('/regras/{nome}/{n}', function ($nome, $n) {
    echo "<p>Na URL /regras/$nome/$n</p>";
    for ($i = 0; $i < $n; $i++) {
        echo "<p>Essa linha vai repetir por '$n' vezes, e imprimir a variável tbm '$nome' </p>";
    }
    echo "<p><a href='/'>Voltar</a></p>";
})->where('nome', '[A-Za-z]+')->where('n', '[0-9]+');

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::prefix('/app')->group(function () {

    Route::get('/alex', function () {
        return view('alex');
    })->name('app.alex');;

    Route::get('/botelho', function () {
        return view('botelho');
    })->name('app.botelho');

    Route::get('/almeida', function () {
        return view('almeida');
    })->name('app.almeida');
});

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::post('/requisicoes', function (Request $request) {
    return 'Hello POST!';
});

Route::delete('/requisicoes', function (Request $request) {
    return 'Hello DELETE!';
});

Route::put('/requisicoes', function (Request $request) {
    return 'Hello PUT!';
});

Route::patch('/requisicoes', function (Request $request) {
    return 'Hello PATCH!';
});

Route::options('/requisicoes', function (Request $request) {
    return 'Hello OPTIONS!';
});

Route::get('/requisicoes', function (Request $request) {
    return 'Hello GET!';
});

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::get('/familia', 'MeuControlador@familia')->name('familia');
Route::get('/pai', 'MeuControlador@pai')->name('pai');
Route::get('/mae', 'MeuControlador@mae')->name('mae');
Route::get('/filho1', 'MeuControlador@filho1')->name('filho1');
Route::get('/filho2', 'MeuControlador@filho2')->name('filho2');
Route::get('/pet', 'MeuControlador@pet')->name('pet');

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::resource('cliente', 'ClienteControlador');

Route::get('produtos', function () {
    return view('outras.produtos');
})->name('produtos');
Route::get('departamentos', function () {
    return view('outras.departamentos');
})->name('departamentos');

Route::get('bootstrap', function () {
    return view('outras.exemplo');
})->name('bootstrap');

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::prefix('/projeto1')->group(function () {

    Route::get('/', function () {
        return view('projeto1.index');
    })->name('projeto1');

    Route::get('/categorias', 'ControladorCategoria@indexView')
        ->name('projeto1.categorias')
        ->middleware('auth');

    Route::get('/produtos', 'ControladorProduto@indexView')
        ->name('projeto1.produtos')
        ->middleware('admin');
});

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::resource('/projeto2', 'ControladorCliente');

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::prefix('/projeto3')->group(function () {

    Route::get('/usuarios', 'UsuarioControlador@index')
        ->middleware('usuario:Alex,40', 'senha:123456')
        ->name('projeto3.usuarios');

    Route::get('/produtos', 'ProdutoControlador@index')
        ->name('projeto3.produtos');

    Route::post('/login', function (Request $request) {

        $login_ok = false;
        $admin = false;

        switch ($request->input('user')) {
            case 'alex':
                $login_ok = $request->input('password') === "alex123";
                $admin = true;
                break;
            case 'luciana':
                $login_ok = $request->input('password') === "luciana123";
                break;
            case 'marcel':
                $login_ok = $request->input('password') === "marcel123";
                break;
            case 'italo':
                $login_ok = $request->input('password') === "italo123";
                break;
            case 'default':
                $login_ok = false;
                break;
        }

        if($login_ok) {
            $login = [ 'user' => $request->input('user'), 'admin' => $admin ];
            $request->session()->put('login', $login);
            return response("Login Success!", 200);
        } else {
            $request->session()->flush();
            return response("Login Error!", 404);
        }
    })->name('projeto3.login');

    Route::get('/negado', function () {
        return "Acesso negado";
    })->name('projeto3.negado');

});

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::prefix('/projeto4')->group(function () {

    Route::get('/', function () {
        return view('projeto4.index');
    })->name('projeto4.index');

    Route::get('/desenvolvedores', function () {
        $desenvolvedores = Desenvolvedor::with('projetos')->get();

        echo "<a href='/projeto4/desenvolvedores'>Desenvolvedor</a>  |  ";
        echo "<a href='/projeto4/projetos'>Projeto</a>  |  ";
        echo "<a href='/projeto4/alocacoes'>Alocação</a>  |";

        foreach ($desenvolvedores as $d) {
            echo "<p>Nome do Desenvolvedor: " . $d->nome . "</p>";
            echo "<p>Cargo do Desenvolvedor: " . $d->cargo . "</p>";
            if (count($d->projetos) > 0) {
                echo "<p>Projetos:</p>";
                echo "<ul>";
                foreach ($d->projetos as $p) {
                    echo "<li>";
                    echo "Nome: " . $p->nome . " | ";
                    echo "Horas Estimadas: " . $p->estimativa_horas . " | ";
                    echo "Horas Trabalhadas: " . $p->pivot->horas_semanais;
                    echo "</li>";
                }
                echo "</ul>";
            }
            echo "<hr>";
        }

        //return $desenvolvedores->toJson();
    })->name('projeto4.desenvolvedores');;

    Route::get('/projetos', function () {
        $projetos = Projeto::with('desenvolvedores')->get();

        echo "<a href='/projeto4/desenvolvedores'>Desenvolvedor</a>  |  ";
        echo "<a href='/projeto4/projetos'>Projeto</a>  |  ";
        echo "<a href='/projeto4/alocacoes'>Alocação</a>  |";

        foreach ($projetos as $p) {
            echo "<p>Nome do Projeto: " . $p->nome . "</p>";
            echo "<p>Estimativa de Horas: " . $p->estimativa_horas . "</p>";
            if (count($p->desenvolvedores) > 0) {
                echo "<p>Desenvolvedores:</p>";
                echo "<ul>";
                foreach ($p->desenvolvedores as $d) {
                    echo "<li>";
                    echo "Nome: " . $d->nome . " | ";
                    echo "Cargo: " . $d->cargo . " | ";
                    echo "Horas Trabalhadas: " . $d->pivot->horas_semanais;
                    echo "</li>";
                }
                echo "</ul>";
            }
            echo "<hr>";
        }

        //return $projetos->toJson();
    })->name('projeto4.projetos');;

    Route::get('/alocar', function () {
        $projeto = Projeto::find(4);

        //echo "<a href='/projeto4/desenvolvedores'>Desenvolvedor</a>  |  ";
        //echo "<a href='/projeto4/projetos'>Projeto</a>  |";

        if (isset($projeto)) {
            $projeto->desenvolvedores()->attach([
                // [ ID_Dev => [Hora_Semanais => n] ]
                1 => ['horas_semanais' => 100],
                2 => ['horas_semanais' => 200],
                3 => ['horas_semanais' => 300]
            ]);
        }

        //return $alocacoes->toJson();
    });

    Route::get('/desalocar', function () {
        $projeto = Projeto::find(4);

        //echo "<a href='/projeto4/desenvolvedores'>Desenvolvedor</a>  |  ";
        //echo "<a href='/projeto4/projetos'>Projeto</a>  |";

        if (isset($projeto)) {
            $projeto->desenvolvedores()->detach([1, 2, 3]); // IDs dos Devs
        }

        //return $alocacoes->toJson();
    });

});

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::get('/home', 'HomeController@index')
    ->name('home');

Auth::routes();

Route::get('/admin', 'HomeController@admin')
    ->name('admin')
    ->middleware('admin');

//Route::get('/admin', 'Auth\AdminController@showAdminForm')->name('admin');
//Route::post('/admin', 'Auth\AdminController@login');

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////

