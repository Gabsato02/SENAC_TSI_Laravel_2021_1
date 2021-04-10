<?php

namespace App\Http\Controllers;
use App\Models\Vendas;
use Illuminate\Http\Request;

class VendasController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function listar() {
        $vendas = Vendas::all();

        return view('vendas.listar', ['vendas' => $vendas]);
    }
}
