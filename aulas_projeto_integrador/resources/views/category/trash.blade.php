<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Categorias apagadas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script>
        function confirmRestore(route) {
            if (confirm('Deseja restaurar a categoria?')) window.location = route
            return null;
        }
    </script>
</head>

<body>
    @include('layouts.menu')
    <main class='container mt-5'>
        @if(session()->has('success'))
        <div class='alert alert-success' roles='alert'>
            {{ session()->get('success') }}
        </div>
        @endif
        <h1>Lista de categorias apagadas</h1>
        <div class='row'>
            <table class='table table-striped'>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Qtde. de Produtos</th>
                        <th>Gerenciar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->products->count() }}</td>
                        <td>
                            <form method='POST' class='d-inline' onsubmit="return confirmRestore();" action='{{ Route('category.restore', $category->id) }}'>
                                @csrf
                                @method('PATCH')
                                <button type='submit' class='btn btn-sm btn-primary d-inline'>Restaurar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>