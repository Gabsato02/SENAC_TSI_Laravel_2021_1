<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aviso extends Model
{
    use HasFactory;


    protected $fillable = [ 'id',
                            'texto_do_aviso',
                            'data_do_aviso',
                            'funcionario_id'];

    public function funcionario() {
        return $this->belongsTo(Funcionario::class, 'id');
    }

}
