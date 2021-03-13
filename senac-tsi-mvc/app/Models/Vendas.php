<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendas extends Model
{
    use HasFactory;

    protected $fillable = [ 'id',
                            'cliente_id',
                            'funcionario_id',
                            'data_da_venda',
                            'valor' ];

    protected $table = 'Vendas';

    public function cliente() {
        // Relacionando tabelas - Relacionamento 1:N
        // (classe que será associada, foreign_key)
        // No caso abaixo, retorna quais vendas estão associadas ao cliente
        return $this->belongsTo(Clientes::class, 'id');
    }

    public function funcionario() {
        return $this->belongsTo(Funcionario::class, 'id');
    }
}
