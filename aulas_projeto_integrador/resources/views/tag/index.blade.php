<!DOCTYPE html>
<!-- Passo 2: criando a view referente a função criada anteriormente -->
<html lang="pt-br">

<head>
    <title>Lista de tags</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script>
        function confirmDelete(route) {
            return confirm('Deseja remover a tag?');
        }
    </script>
</head>

<body>
    @include('layouts.menu')
    <main class='container mt-5'>
        <h1>Lista de tags</h1>
        <!-- As mustache tags aqui servem pra interpolar PHP -->
        <a href="{{ Route('tag.create') }}" class='btn btn-lg btn-primary'>Criar tag</a>
        <a href="{{ Route('tag.trash') }}" class='btn btn-lg btn-danger'>Ver lixeira</a>
        <div class='row'>
            <table class='table table-striped'>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tags as $tag)
                    <tr>
                        <td>{{ $tag->id }}</td>
                        <td>{{ $tag->name }}</td>
                        <td>
                            <a href='#' class='btn btn-sm btn-success'>Visualizar</a>
                            <a href='{{ Route('tag.edit', $tag->id) }}' class='btn btn-sm btn-warning'>Editar</a>
                            <!-- O formulário abaixo é uma forma mais segura de enviar um DELETE, através de um POST -->
                            <form method='POST' class='d-inline' onsubmit="return confirmDelete();" action='{{ Route('tag.destroy', $tag->id) }}'>
                                @csrf
                                @method('DELETE')
                                <button type='submit' class='btn btn-sm btn-danger'>Apagar</button>
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