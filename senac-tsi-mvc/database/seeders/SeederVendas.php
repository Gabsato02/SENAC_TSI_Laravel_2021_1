<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vendas;

class SeederVendas extends Seeder
{
    public function run()
    {
        Vendas::create(['data_da_venda' => '2021-04-30',
                        'valor' => 5000,
                        'funcionario_id' => 1,
                        'cliente_id' => 1]);

    }
}
