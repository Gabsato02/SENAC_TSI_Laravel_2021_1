@extends('layouts.store')
@section('content')
    <nav aria-label='breadcrumb'>
        <ol class='breadcrumb'>
            <li class='breadcrumb-item'><a href="{{ url('/') }}">Loja do SENAC</a></li>
            <li class='breadcrumb-item'><a href="{{ route('category.show', $product->category_id) }}">{{ $product->category->name }}</a></li>
            <li class='breadcrumb-item active' aria-current='page'>{{ $product->name }}</li>
        </ol>
    </nav>

    <div class='row my-5'>
        <div class='col-6'>
            <img src="{{ asset($product->image) }}" style="width: 250px;">
        </div>

        <div class='col-6 text-center'>
            <h2>{{ $product->name }}</h2>
            <p class='my-3'>{{ $product->description }}</p>
            <span class='h4 d-block my-3'>R$ {{ $product->price }}</span>
            <a href="{{ route('cart.add', $product->id) }}" class='btn btn-primary my-2'>Adicionar ao carrinho</a>
            <div class='d-block my-1'>
                <span class='h4 d-block'>Tags</span>
                @foreach ($product->tags as $tag)
                <a href='{{ route('tag.show', $tag->id) }}' class='btn btn-sm btn-light'>{{ $tag->name }}</a>
                @endforeach
            </div>
        </div>
    </div>
@endsection