<?php
use \Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use \CodeCommerce\Tag;
use Faker\Factory as Faker;

class TagTableSeeder extends Seeder
{
    public function run()
    {
        // limpar a tabela
        DB::table('tags')->truncate();

        $faker = Faker::create();

        foreach (range(1, 15) as $i)
        {
            Tag::create(['name' => $faker->word()]);
        }
    }
}