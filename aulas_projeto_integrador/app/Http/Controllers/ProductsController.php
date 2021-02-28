<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Passo 4: Importando a model após a criação
use App\Models\Product;

/* Passo 2: No console: php artisan make:controller ProductsController, para que seja criada a controller referente a view Product
Passo 2.1: O retorno da view que antes estava na Route, agora ocorre dentro da função que foi criada pra isso
*/

class ProductsController extends Controller
{
    public function index() {
        // ->with('nome_da_tabela', Model::todos_os_registros()) faz com que uma view receba dados para exibição/manipulação
        return view('product.index')->with('products', Product::all());
    }

    public function create() {
        return view('product.create');
    }
    /* 
        O parâmetro com a classe Request recebe o payload que vier de uma requisição
    */
    public function store(Request $payload) {
        /* Passo 2.3: criação de model e migration = php artisan make:model Product -m 
           Passo 4.1: A função abaixo cria a instância dos dados recebidos no banco
              Estrutura: Model::create(payload->todos_os_dados());
        */
        Product::create($payload->all());
        // session()->flash() cria uma sessão que será destruída logo após a leitura
        session()->flash('success', 'Produto foi cadastrado com sucesso!');
        return redirect(route('product.index'));
    }

    public function edit(Product $product) {
        /* A view produt.edit será aberta com o parâmetro $product
        Estrutura: function edit(Model $elemento) */
        return view('product.edit')->with('product', $product);
    }

    public function update(Request $payload, Product $product)
    {
        $product->update($payload->all());
        session()->flash('success', 'Produto foi alterado com sucesso!');
        return redirect(route('product.index'));
    }
    public function destroy(Product $product)
    {
        $product->delete($product);
        session()->flash('success', 'Produto foi excluído com sucesso!');
        return redirect(route('product.index'));
    }
}
