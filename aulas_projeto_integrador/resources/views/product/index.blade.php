<!DOCTYPE html>
<!-- Passo 2: criando a view referente a função criada anteriormente -->
<html lang="pt-br">

<head>
    <title>Lista de produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script>
        function confirmDelete(route) {
            return confirm('Deseja remover o produto?');
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
        <h1>Lista de produtos</h1>
        <!-- As mustache tags aqui servem pra interpolar PHP -->
        <a href="{{ Route('product.create') }}" class='btn btn-lg btn-primary'>Criar produto</a>

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
                            <a href='#' class='btn btn-sm btn-success'>Visualizar</a>
                            <a href='{{ Route('product.edit', $product->id) }}' class='btn btn-sm btn-warning'>Editar</a>
                            <form method='POST' class='d-inline' onsubmit="return confirmDelete();" action='{{ Route('product.destroy', $product->id) }}'>
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
    </main>
</body>

</html>