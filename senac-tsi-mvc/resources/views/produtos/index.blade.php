@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Produtos</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('produtos.create') }}"> + Novo produto</a>
        </div>
    </div>
</div>

<br>

@if ($message = Session::get('success'))

<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>

@endif


<table class="table table-bordered">

    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Preço</th>
        <th>Fabricante</th>
        <th width="280px">Ação</th>
    </tr>

    @foreach ($data as $key => $produto)

    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $produto->nome }}</td>
        <td>{{ $produto->preco }}</td>
        <td>{{ $produto->fabricante }}</td>
        <td>
            <a class="btn btn-info" href="{{ route('produtos.show',$produto->id) }}">Mostrar</a>
            <a class="btn btn-primary" href="{{ route('produtos.edit',$produto->id) }}">Editar</a>

            {!! Form::open(['method' => 'DELETE','route' => ['produtos.destroy',
            $produto->id],'style'=>'display:inline']) !!}

            {!! Form::submit('Apagar', ['class' => 'btn btn-danger']) !!}

            {!! Form::close() !!}

        </td>
    </tr>

    @endforeach

</table>

{!! $data->render() !!}

@endsection