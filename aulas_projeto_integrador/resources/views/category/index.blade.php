<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Lista de categorias</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script>
        function confirmDelete(route) {
            if (confirm('Deseja remover a categoria?')) window.location = route
            return null;
        }
    </script>
</head>

<body class='container mt-5'>
    @if(session()->has('success'))
    <div class='alert alert-success' roles='alert'>
        {{ session()->get('success') }}
    </div>
    @endif
    <h1>Lista de categorias</h1>
    <a href='{{ Route('category.create') }}' class='btn btn-lg btn-primary'>Criar categoria</a>

    <div class='row'>
        <table class='table table-striped'>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Gerenciar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href='#' class='btn btn-sm btn-success'>Visualizar</a>
                        <a href='{{ Route('category.edit', $category->id) }}' class='btn btn-sm btn-warning'>Editar</a>
                        <form method='POST' class='d-inline' onsubmit="return confirmDelete();" action='{{ Route('category.destroy', $category->id) }}'>
                            @csrf
                            @method('DELETE')
                            <button type='submit' class='btn btn-sm btn-danger d-inline'>Apagar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>