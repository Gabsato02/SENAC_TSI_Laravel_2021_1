<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function index() {
        return view('category.index')->with('categories', Category::all());
    }
    
    public function create() {
        return view('category.create');
    }

    public function store(Request $payload) {
        Category::create($payload->all());
        session()->flash('success', 'Categoria foi cadastrada com sucesso!');
        return redirect(route('category.index'));
    }

    public function edit(Category $category) {
        return view('category.edit')->with('category', $category);
    }

    public function update(Request $payload, Category $category)
    {
        $category->update($payload->all());
        session()->flash('success', 'Categoria foi alterada com sucesso!');
        return redirect(route('category.index'));
    }

    public function destroy(Category $category)
    {
        $category->delete($category);
        session()->flash('success', 'Categoria foi excluída com sucessa!');
        return redirect(route('category.index'));
    }
}
