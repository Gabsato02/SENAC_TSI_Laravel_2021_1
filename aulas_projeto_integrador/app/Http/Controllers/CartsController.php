<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;

class CartsController extends Controller
{
    public function add(Product $product) {

        $item = Cart::where([
            ['product_id', '=', $product->id],
            ['user_id', '=', Auth()->user()->id]
        ])->first();

        if($item) {
            $item->update([
                'quantity' => $item->quantity += 1
            ]);
            session()->flash('success', '1 unidade do produto adicionado ao carrinho!');
            return redirect()->back();
        } else {
            Cart::create([
                'user_id' => Auth()->user()->id,
                'product_id' => $product->id,
                'quantity' => 1
            ]);
            session()->flash('success', 'Produto adicionado ao carrinho!');
            return redirect()->back();
        }
    }

    public function remove(Product $product) {

        $item = Cart::where([
            ['product_id', '=', $product->id],
            ['user_id', '=', Auth()->user()->id]
        ])->first();

        if($item->quantity > 1) {
            $item->update([
                'quantity' => $item->quantity - 1
            ]);
            session()->flash('success', '1 unidade do produto removida do carrinho!');
            return redirect()->back();
        } else {
            $item->delete();
            session()->flash('success', 'Produto removido ao carrinho!');
            return redirect()->back();
        }
    }

    public function show() {
        $cart = Cart::where('user_id', '=', Auth()->user()->id)->get();
        return view('cart.show')->with('cart', $cart);
    }

    public function payment() {
        $cart = Cart::where('user_id', '=', Auth()->user()->id)->get();
        return view('cart.payment')->with('cart', $cart);
    }

}
