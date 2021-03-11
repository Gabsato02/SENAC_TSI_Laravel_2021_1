<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Editar categoria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body class='container mt-5 bg-light'>
    <h1>Editar categoria</h1>
    <form method='POST' action='{{ Route('category.update', $category->id) }}'>
        @method('PATCH')
        @csrf
        <div class='row'>
            <span class='form-label'>Nome</span>
            <input type='text' class='form-control' name='name' value='{{ $category->name }}' />
        </div>

        <div class='row mt-4'>
            <button type='submit' class='btn btn-lg btn-success'>Atualizar</button>
        </div>
    </form>

</body>

</html>