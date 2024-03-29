@extends('layouts.store')
@section('content')

<h2>Pagamento</h2>

<div class="row justify-content-center">
    <div class="col-md-6 col-10 my-4 p-3">
        <h3>Endereço de Entrega</h3>
        <address class="ms-3">
            Rua Bento de Matos, 133<br>
            São Paulo, SP<br>
            CEP 123456-090<br>
            Brasil
        </address>
        <a href="#" class="float-end me-4">Trocar endereço</a>
    </div>

    <div class="col-md-6 col-10 my-4 p-3 bg-light">
        <h3>Resumo da Compra</h3>
        <div class='ms-3'>
            <div>
                <span>Quantidade de produtos comprados</span>
                <a href="{{ route('cart.show') }}" class="float-end me-4">10 produtos</a>
            </div>

            <div>
                <span>Frete:</span>
                <span class="float-end me-4 text-success font-weight-bold">GRÁTIS</a>
            </div>
            <hr>
            <div>
                <span class='h4'>Total a pagar</span>
                <span class='float-end me-4 h4'>R$ {{ number_format(\App\Models\Cart::totalValue(), 2, ',', '.') }}</span></span>
            </div>
        </div>
    </div>
</div>

<hr>

<form class='my-2'>
    @csrf
    
    <div class='row justify-content-center'>
        <div class='col-10'>
            <h2>Dados de Pagamento</h2>
        </div>

        <div class="col-md-5 col-10">
            <label for='cc-nome'>Nome no cartão de crédito</label>
            <input type='text' id='cc-nome' name='cc-nome' class='form-control' required>
            <span class="text-muted">O nome deve ser igual o que está no cartão</span>
        </div>

        <div class="col-md-5 col-10">
            <label for='cc-card'>Número do Cartão</label>
            <input type='number' id='cc-card' name='cc-card' class='form-control' required>
        </div>

        <div class="col-md-5 col-10">
            <label for='cc-cvv'>Código CVV</label>
            <input type='number' id='cc-cvv' name='cc-cvv' class='form-control' required>
        </div>
        
        <div class="col-md-5 col-10">
            <label for='cc-date'>Data de expiração</label>
            <input type='date' id='cc-date' name='cc-date' class='form-control' required>
        </div>
    </div>
    <div>

    </div>
    <button type='submit' class='btn btn-lg btn-success float-end'>Efetuar Pagamento</button>
</form>

@endsection