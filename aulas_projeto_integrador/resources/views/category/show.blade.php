@extends('layouts.store');

@section('content')

<section>
    <div class='row'>
        <div class='my-2 text-center'>
            <h2>{{ $category->name }}</h2>
        </div>
    </div>

    <div class='row'>
        @foreach ($category->products()->paginate(3) as $product)

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

    <div class='d-flex justify-content-center mt-5'>
        {{ $products->links() }}
    </div>
</section>

@endsection