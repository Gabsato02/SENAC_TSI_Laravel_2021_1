<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aula 07/05</title>
</head>
<body style='background: #202124; color: #f0f1f2; text-align: center;'>
    <h1>Lista de Produtos</h1>
    <table border='1' style='margin: 50px auto;'>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Preço</th>
                <th>Fabricante</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produtos as $produto)
                <tr>
                    <td>{{ $produto->nome }}</td>
                    <td>{{ $produto->preco }}</td>
                    <td>{{ $produto->fabricante }}</td>
                </tr>
            @endforeach
        </tbody>

    </table>
</body>
</html>