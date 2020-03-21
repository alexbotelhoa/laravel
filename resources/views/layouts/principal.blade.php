<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('titulo')</title>
    <link rel="stylesheet" href="{{asset('css/principal.css')}}">
</head>
<body>
<div class="row">
    <div class="col1">
        <div class="menu">
            <ul>
                <li><a class="{{request()->routeIs('cliente.*') ? 'active' : ''}}" href="{{route('cliente.index')}}">Clientes</a></li>
                <li><a class="{{request()->routeIs('produtos') ? 'active' : ''}}" href="{{route('produtos')}}">Produtos</a></li>
                <li><a class="{{request()->routeIs('departamentos') ? 'active' : ''}}" href="{{route('departamentos')}}">Departamentos</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="col2">
    @yield('conteudo')
</div>
<div class="col2">
    @yield('brand')
</div>
</body>
</html>