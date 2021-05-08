<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
// Passo 4: Importando a model após a criação
use App\Models\Product;
use App\Models\Category;
use App\Models\Tag;

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
        return view('product.create')->with(['categories'=>Category::all(), 'tags'=>Tag::all()]);
    }

    /* 
        O parâmetro com a classe Request recebe o request que vier de uma requisição
    */
    public function store(Request $request) {
        /* Passo 2.3: criação de model e migration = php artisan make:model Product -m 
           Passo 4.1: A função abaixo cria a instância dos dados recebidos no banco
              Estrutura: Model::create(request->todos_os_dados());
        */
        if ($request->image) {
            $image = $request->file('image')->store('product');
            $image = "storage/".$image;
        } else {
            $image = "storage/product/imagem.png";
        }

        $product = Product::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'price'=>$request->price,
            'category_id'=>$request->category_id,
            'image'=>$image
        ]);
        
        // O Sync sincroniza as duas tabelas da explosão
        $product->tags()->sync($request->tags);

        // session()->flash() cria uma sessão que será destruída logo após a leitura
        session()->flash('success', 'Produto foi cadastrado com sucesso!');
        return redirect(route('product.index'));
    }

    public function show(Product $product) {
        return view('product.show')->with('product', $product);
    }

    public function edit(Product $product) {
        /* A view produt.edit será aberta com o parâmetro $product
        Estrutura: function edit(Model $elemento) */
        return view('product.edit')->with(['product'=>$product, 'categories'=>Category::all(), 'tags'=>Tag::all()]);
    }

    public function update(Request $request, Product $product)
    {
        if ($request->image) {
            $image = $request->file('image')->store('product');
            $image = "storage/".$image;
            if($product->image != "storage/product/image.png")
                Storage::delete(str_replace('storage/','',$product->image));
        } else {
            $image = $product->image;
        }

        $product->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'price'=>$request->price,
            'category_id'=>$request->category_id,
            'image'=>$image
        ]);

        $product->tags()->sync($request->tags);
        
        session()->flash('success', 'Produto foi alterado com sucesso!');
        return redirect(route('product.index'));
    }
    public function destroy(Product $product)
    {
        $product->delete($product);
        session()->flash('success', 'Produto foi excluído com sucesso!');
        return redirect(route('product.index'));
    }

    public function trash() {
        return view('product.trash')->with('products', Product::onlyTrashed()->get());
    }

    public function restore($id) {
        $product = Product::onlyTrashed()->where('id', $id)->firstOrFail();
        $product->restore();
        session()->flash('success', 'Produto restaurado com sucesso!');
        return redirect(route('product.trash'));
    }
}
