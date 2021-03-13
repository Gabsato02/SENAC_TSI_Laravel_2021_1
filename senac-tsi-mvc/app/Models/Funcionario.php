<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;
    /* NOTA BD
       protected, private e public alteram as configuraçoes de acesso dos atributos
       abaixo a declaração de campos e de uma tabela no banco de dados */
    protected $fillable = [ 'id',
                            'nome',
                            'endereco',
                            'email',
                            'telefone'];
    
    protected $table = 'Funcionario';

    /* 
       CRIAÇÃO DE CAMPOS EM TABELA 
       Alteração da PK (o padrão é ID): protected $primaryKey = 'nome_da_pk'
       Sem auto increment: public $increment = false;
       Tipagem: protected $ketType = 'string';
       ORM Eloquent cria colunas de timestamp, de criação e alteração dos registros
       Para tirar esses timestamps: public $timestamps = false; */

}
