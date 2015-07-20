<?php
use \Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder
{
    public function run()
    {
        // limpar a tabela
        DB::table('tags')->truncate();

        factory('CodeCommerce\Cidade', 15)->create();
    }
}