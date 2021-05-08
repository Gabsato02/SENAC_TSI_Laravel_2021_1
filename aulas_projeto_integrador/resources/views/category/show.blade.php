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
                <span class=''>R$ {{ number_format($product->price, 2, ',', '.') }}</span>
                <div class='mt-3'>
                    <a href='{{ route('product.show', $product->id) }}' class='btn btn-secondary'>Visualizar</a>
                    <a href="{{ route('cart.add', $product->id) }}" class='btn btn-primary my-2'>Adicionar ao carrinho</a>
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