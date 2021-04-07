<!DOCTYPE html>
<!-- Passo 2: criando a view referente a função criada anteriormente -->
<html lang="pt-br">

<head>
    <title>Produtos Apagados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script>
        function confirmRestore(route) {
            return confirm('Deseja restaurar o produto?');
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
        <h1>Lista de produtos apagados</h1>

        <div class='row'>
            <table class='table table-striped'>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Preço</th>
                        <th>Categoria</th>
                        <th>Gerenciar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>
                            <form method='POST' class='d-inline' onsubmit="return confirmRestore();" action='{{ Route('product.restore', $product->id) }}'>
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