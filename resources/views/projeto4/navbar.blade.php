<nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbar">
        <ul class="navbar-nav mr-auto">
            <li @if($current == "home") class="nav-item active" @else class="nav-item" @endif>
                <a class="nav-link" href="/home">Home <span class="sr-only">(current)</span></a>
            </li>
            <li @if($current == "home") class="nav-item active" @else class="nav-item" @endif>
                <a class="nav-link" href="/projeto4">Projeto 4 <span class="sr-only">(current)</span></a>
            </li>
            <li @if($current == "desenvolvedores") class="nav-item active" @else class="nav-item" @endif>
                <a class="nav-link" href="/projeto4/desenvolvedores">Desenvolvedores <span class="sr-only">(current)</span></a>
            </li>
            <li @if($current == "projetos") class="nav-item active" @else class="nav-item" @endif>
                <a class="nav-link" href="/projeto4/projetos">Projetos <span class="sr-only">(current)</span></a>
            </li>
        </ul>

    </div>
</nav>