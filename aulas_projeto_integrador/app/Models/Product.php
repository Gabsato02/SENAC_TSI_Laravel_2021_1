<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    // O fillable determina quais dados são preenchíveis. Os demais campos são automáticos, ou se algum valor for setado será ignorado.
    protected $fillable = ['name', 'description', 'price', 'category_id', 'image'];

    // Trazendo a categoria daquele produto
    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function tags() {
        // Inner Join com tabela de explosão
        return $this->belongsToMany(Tag::class);
    }
}
