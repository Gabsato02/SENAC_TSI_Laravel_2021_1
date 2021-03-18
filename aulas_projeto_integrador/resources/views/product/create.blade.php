<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Criação de produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body>
    @include('layouts.menu')
    <main class='container mt-5'>
        <h1>Criação de produtos</h1>
        <form method='post' action='{{ Route('product.store') }}' >
            <!-- O CSRF serve pra proteger o site de requisições cross-site -->
            @csrf
            <div class='row'>
                <span class='form-label'>Nome</span>
                <input type='text' class='form-control' name='name' />
            </div>

            <div class='row'>
                <span class='form-label'>Descrição</span>
                <textarea class='form-control' name='description'></textarea>
            </div>

            <div class='row'>
                <span class='form-label'>Preço</span>
                <input type='number' min='0.00' max='10000' step='0.01' class='form-control' name='price' />
            </div>

            <div class='row'>
                <span class='form-label'>Categoria</span>
                <select class='form-select' name='category_id'>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class='row mt-4'>
                <button type='submit' class='btn btn-lg btn-success'>Salvar</button>
            </div>
        </form>
    </main>
</body>

</html>