<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Criação de categorias</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body>
    @include('layouts.menu')
    <main class='container mt-5'>
        <h1>Criação de categorias</h1>
        <form method='POST' action='{{ Route('category.store') }}' >
            <!-- O CSRF serve pra proteger o site de requisições cross-site -->
            @csrf
            <div class='row'>
                <span class='form-label'>Nome</span>
                <input type='text' class='form-control' name='name' />
            </div>

            <div class='row mt-4'>
                <button type='submit' class='btn btn-lg btn-success'>Salvar</button>
            </div>
        </form>
    </main>
</body>

</html>