<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Avisos</title>
</head>
<body>
    
    <main class='container p-5'>
        <div class='row d-flex justify-content-evenly'>
            <div class='col-5'>

                @include('layouts.title')

                <form class='mx-auto w-100' method='POST' action='{{ Route('store') }}' >
                    @csrf
                    <div class='form-group mt-3'>
                        <label class="form-label" for='texto' name='texto_do_aviso'>Mensagem de aviso:</label>
                        <textarea class="form-control" style='resize: none' name='texto_do_aviso'></textarea>
                    </div>

                    <div class='form-group mt-3'>
                        <label class="form-label" for='data_do_aviso'>Data do aviso</label>
                        <input class="form-control" type='date' name='data_do_aviso'>
                    </div>

                    <div class='form-group mt-3'>
                        <label class="form-label" for='funcionario_id'>ID do Funcionário:</label>
                        <input class="form-control" type='number' name='funcionario_id'>
                    </div>

                    <button class='btn btn-success w-100 mx-auto mt-3'>Enviar</button>
                </form>
            </div>

            <div class='col-5'>

                <h1 class='display-6 text-center'>Quadro de Avisos</h1>

                <div class='mx-auto w-100'>
                    <table class='table'>
                        <thead>
                            <tr>
                                <th scope='col'>Aviso</th>
                                <th scope='col'>Data</th>
                                <th scope='col'>Funcionário</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($avisos as $aviso)
                                <tr>
                                    <th>{{ $aviso->texto_do_aviso }}</th>
                                    <th>{{ $aviso->data_do_aviso }}</th>
                                    <th>{{ $aviso->funcionario_id }}</th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    
</body>
</html>