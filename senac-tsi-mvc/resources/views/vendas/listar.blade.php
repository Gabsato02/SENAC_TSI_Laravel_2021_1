<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aula 09/04</title>
</head>
<body style='background: #202124; color: #f0f1f2; text-align: center;'>
    <h1>Lista de Vendas</h1>
    <table border='1' style='margin: 50px auto;'>
        <thead>
            <tr>
                <th>Data da Venda</th>
                <th>Valor</th>
                <th>Vendedor</th>
                <th>Comprador</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vendas as $venda)
                <tr>
                    <td>{{ $venda->data_da_venda }}</td>
                    <td>{{ $venda->valor }}</td>
                    <td>{{ $venda->funcionario->nome }}</td>
                    <td>{{ $venda->cliente->nome }}</td>
                </tr>
            @endforeach
        </tbody>

    </table>
</body>
</html>