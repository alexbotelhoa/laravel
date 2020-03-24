<nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbar">
        <ul class="navbar-nav mr-auto">
            <li @if($current == "home") class="nav-item active" @else class="nav-item" @endif>
                <a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li @if($current == "home") class="nav-item active" @else class="nav-item" @endif>
                <a class="nav-link" href="{{ route('projeto1') }}">Projeto 1 <span class="sr-only">(current)</span></a>
            </li>
            <li @if($current == "categorias") class="nav-item active" @else class="nav-item" @endif>
                <a class="nav-link" href="{{ route('projeto1.categorias') }}">Categorias <span class="sr-only">(current)</span></a>
            </li>
            <li @if($current == "produtos") class="nav-item active" @else class="nav-item" @endif>
                <a class="nav-link" href="{{ route('projeto1.produtos') }}">Produtos <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>

    </div>
</nav>