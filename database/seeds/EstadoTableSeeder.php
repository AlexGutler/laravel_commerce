<?php
use \Illuminate\Database\Seeder;

class EstadoTableSeeder extends Seeder
{
    public function run()
    {
        // limpar a tabela
        DB::table('estados')->truncate();

        factory(\CodeCommerce\Estado::class, 3)->create();
    }
}