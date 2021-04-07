<!DOCTYPE html>
<!-- Passo 2: criando a view referente a função criada anteriormente -->
<html lang="pt-br">

<head>
    <title>Tags Apagadas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script>
        function confirmRestore(route) {
            return confirm('Deseja restaurar a tag?');
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
        <h1>Lista de tags apagadas</h1>

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
                            <form method='POST' class='d-inline' onsubmit="return confirmRestore();" action='{{ Route('tag.restore', $tag->id) }}'>
                                @csrf
                                @method('PATCH')
                                <button type='submit' class='btn btn-sm btn-primary'>Restaurar</button>
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