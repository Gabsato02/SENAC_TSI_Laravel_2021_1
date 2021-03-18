<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // O fillable determina quais dados são preenchíveis. Os demais campos são automáticos, ou se algum valor for setado será ignorado.
    protected $fillable = ['name', 'description', 'price', 'category_id'];

    // Trazendo a categoria daquele produto
    public function category() {
        return $this->belongsTo(Category::class);
    }
}
