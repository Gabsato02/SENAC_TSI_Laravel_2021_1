<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aula 09/04</title>
</head>
<body style='background: #202124; color: #f0f1f2; text-align: center;'>
    <h1>Lista de Clientes</h1>
    <table border='1' style='margin: 50px auto;'>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Endereço</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->nome }}</td>
                    <td>{{ $cliente->endereco }}</td>
                </tr>
            @endforeach
        </tbody>

    </table>
</body>
</html>