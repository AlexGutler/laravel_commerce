<?php
use \Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    public function run()
    {
        // limpar a tabela
        DB::table('categories')->truncate();

        factory('CodeCommerce\Category', 15)->create();
    }
}