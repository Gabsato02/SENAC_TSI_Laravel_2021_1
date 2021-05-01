<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Loja do SENAC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
    @yield('css')
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-sm navbar-light bg-white shadow-sm">
            <div class="container">
                <h1><a class="navbar-brand" href="{{ url('/') }}">Loja do SENAC</a></h1>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuCategory" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Categorias
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuCategory">
                                @foreach(\App\Models\Category::all() as $category)
                                <li><a class="dropdown-item" href="{{ route('category.show', $category->id) }}">{{ $category->name }}</a></li>
                                @endforeach
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuTag" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Tags
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuTag">
                                @foreach(\App\Models\Tag::all() as $tag)
                                <li><a class="dropdown-item" href="{{ route('tag.show', $tag->id) }}">{{ $tag->name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                </div>

            </div>
        </nav>
    </header>

    <main class='container my-4'>
        @if(session()->has('success'))
        <div class='alert alert-success' roles='alert'>{{ session()->get('success') }}</div>
        @endif
        @if(session()->has('error'))
        <div class='alert alert-error' roles='alert'>{{ session()->get('error') }}</div>
        @endif

        @yield('content')
    </main>

    <footer class='container bg-primary text-white p-5 m-auto w-100'>
        <div class='row'>
            <div class='col-6'>
                <h2>Localização</h2>
                <address>
                    Rua Lorem ipsum dolor, 123<br>
                    Lorem ipsum - Lorem, LR<br>
                    CEP: 00000-000<br>
                    Telefone: (11) 99999-9999
                </address>
            </div>

            <div class='col-6'>
                <h2>Horário de funcionamento</h2>
                <ul class='list-unstyled'>
                    <li>Segunda - Sexta: 09h as 18h</li>
                    <li>Sábado: 10h as 16h</li>
                </ul>
            </div>
        </div>
    </footer>

</body>

</html>