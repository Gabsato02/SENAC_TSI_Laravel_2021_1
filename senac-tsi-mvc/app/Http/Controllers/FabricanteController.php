<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fabricante;

class FabricanteController extends Controller
{

    public function index()
    {
        return Fabricante::all();
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        $json = $request->getContent();

        return Fabricante::create(json_decode($json, JSON_OBJECT_AS_ARRAY));
    }

    public function show($id)
    {
        $fabricante = Fabricante::find($id);

        if ($fabricante) {
            return $fabricante;
        } else {
            return json_encode([$id => 'nao existe']);
        }
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $fabricante = Fabricante::find($id);

        if ($fabricante) {

            $json = $request->getContent();
            $atualizacao = json_decode($json, JSON_OBJECT_AS_ARRAY);
            $fabricante->nome = $atualizacao['nome'];

            $ret = $fabricante->update() ? [$id => 'atualizado'] : [$id => 'erro'];

        } else {
            $ret = [$id => 'nao existe'];
        }

        return json_encode($ret);
    }

    public function destroy($id)
    {
        $fabricante = Fabricante::find($id);

        if ($fabricante) {

            $ret = $fabricante->delete() ? [$id => 'apagado'] : [$id => 'erro'];

        } else {

            $ret = [$id => 'nao existe'];
        }

        return json_encode($ret);
    }
}
