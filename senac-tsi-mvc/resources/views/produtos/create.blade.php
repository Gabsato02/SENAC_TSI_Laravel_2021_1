@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Cadastrar produto</h2>
        </div>

        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('produtos.index') }}"> Voltar</a>
        </div>
    </div>
</div>
</br>


@if (count($errors) > 0)

<div class="alert alert-danger">
    <strong>Ops!</strong> Há algo errado com os dados passados.<br><br>
    <ul>
        @foreach ($errors->all() as $error)

        <li>{{ $error }}</li>

        @endforeach
    </ul>
</div>

@endif

{!! Form::open(array('route' => 'produtos.store','method'=>'POST')) !!}

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Nome:</strong>

            {!! Form::text('nome', null, array('placeholder' => 'Nome','class' => 'form-control')) !!}

        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Preço</strong>
            {!! Form::number('preco', null, array('placeholder' => 'Preço','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Fabricante:</strong>
            {!! Form::text('fabricante', null, array('placeholder' => 'Fabricante','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Gravar</button>
    </div>

</div>

{!! Form::close() !!}

@endsection