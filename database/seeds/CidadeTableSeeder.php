<?php
use \Illuminate\Database\Seeder;

class CidadeTableSeeder extends Seeder
{
    public function run()
    {
        // limpar a tabela
        DB::table('cidades')->truncate();

        factory('CodeCommerce\Cidade', 15)->create();
    }
}