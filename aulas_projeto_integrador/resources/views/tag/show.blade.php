@extends('layouts.store');

@section('content')

<section>
    <div class='row'>
        <div class='my-2 text-center'>
            <h2>{{ $tag->name }}</h2>
        </div>
    </div>

    <div class='row'>
        @foreach ($tag->products as $product)

        <div class='col-10 col-md-6 col-lg-3 mx-auto mt-3'>
            <div class='text-center'>
                <img src="{{ asset($product->image) }}" style='height: 200px;'>
            </div>
            <div class='text-center mt-3'>
                <span class='d-block'>{{ $product->name }}</span>
                <span class='text-decoration-line-through text-muted'>R$100,00</span>
                <span class=''>{{ $product->price }}</span>
                <div class='mt-3'>
                    <a href='#' class='btn btn-secondary'>Visualizar</a>
                    <a href='#' class='btn btn-primary'>Comprar</a>
                </div>
            </div>
        </div>

        @endforeach

    </div>
</section>

@endsection