<?php
use \Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use \CodeCommerce\Product;
use Faker\Factory as Faker;

class ProductTableSeeder extends Seeder
{
    public function run()
    {
        // limpar a tabela
        DB::table('products')->truncate();

        $faker = Faker::create();

        foreach (range(1, 15) as $i) {
            Product::create([
                    'name' => $faker->word(),
                    'description' => $faker->sentence(),
                    'price' => mt_rand(0, 5000),
                    'featured' => (bool)rand(0,1),
                    'recommend' => (bool)rand(0,1),
                ]);
        }
    }
}