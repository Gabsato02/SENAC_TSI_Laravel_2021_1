@extends('layouts.store')
@section('content')

    <h2>Carrinho de Compras</h2>

    <table class='table table-striped'>
        <thead>
            <tr>
                <th>Imagem</th>
                <th>Produto</th>
                <th>Quantidade</th>
                <th>Preço Unitário</th>
                <th>Preço Total</th>
                <th>Gerenciar</th>
            </tr>
        </thead>

        <tbody>
            @php
                $total = 0;
            @endphp
            @foreach($cart as $item)
                <tr>
                    <td><img src="{{ asset($item->product()->image) }}" style="width: 100px"></td>
                    <td><a href="{{ route('product.show', $item->product()->id) }}">{{ $item->product()->name }}</a></td>
                    <td>{{ $item->quantity }}</td>
                    <td><span> R$ {{ number_format($item->product()->price, 2, ',', '.') }}</td>
                    <td><span> R$ {{ number_format($item->product()->price * $item->quantity, 2, ',', '.') }}</td>
                    <td>
                        <a href='{{ route('cart.add', $item->product()->id) }}' class='btn btn-sm btn-success'>+</a>
                        <a href='{{ route('cart.remove', $item->product()->id) }}'class='btn btn-sm btn-warning'>-</a>    
                    </td>
                </tr>

                @php
                    $total += $item->product()->price * $item->quantity;
                @endphp
            @endforeach
        </tbody>
    </table>
    <div class='d-flex flex-column flex-wrap align-items-end'>
        <span class='h4'>Total da Compra: R$ {{ number_format($total, 2, ',', '.') }}</span>
        <a href="{{ route('cart.payment') }}" class="btn btn-primary btn-lg mt-3">Finalizar Compra</a>
    </div>
@endsection