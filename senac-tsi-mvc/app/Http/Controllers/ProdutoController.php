<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProdutoController extends Controller
{
    public function __construct() {
        $this->middleware('permission:product-list',['only' => ['index', 'show']]);
        $this->middleware('permission:product-create',['only' => ['create', 'store']]);
        $this->middleware('permission:product-edit',['only' => ['edit', 'update']]);
        $this->middleware('permission:product-delete',['only' => ['destroy']]);
    }

    public function listar() {
        $produtos = Produto::all();

        return view('produtos.listar', ['produtos' => $produtos]);
    }

    public function index(Request $request)
    { 
        $qtde_por_pagina = 5;

        $data = Produto::orderBy('id', 'DESC')->paginate($qtde_por_pagina);

        return view('produtos.index', compact('data'))->with('i', ($request->input('page', 1) * 1) * $qtde_por_pagina);
    }

    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();

        return view('produtos.create', compact('roles'));
    }

    public function store(Request $request)
    {
        // Validação de campos
        $this->validate($request,
            ['nome' => 'required',
            'preco' => 'required',
            'fabricante' => 'required']);

        $input = $request->all();

        Produto::create($input);

        return redirect()->route('produtos.index')->with('success', 'Produto criado com sucesso');
    }

    public function show($id)
    {
        $produto = Produto::find($id);

        return view('produtos.show', compact('produto'));
    }

    public function edit($id)
    {
        $produto = Produto::find($id);

        return view('produtos.edit', compact('produto'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,
            ['nome' => 'required',
            'preco' => 'required',
            'fabricante' => 'required']);

        $input = $request->all();

        $produto = Produto::find($id);

        $produto->update($input);

        return redirect()->route('produtos.index')->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy($id)
    {
        Produto::find($id)->delete();

        return redirect()->route('produtos.index')->with('success', 'Produto removido com sucesso!');
    }
}
