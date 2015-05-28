<?php
use \Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use \CodeCommerce\User;
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        // limpar a tabela
        DB::table('users')->truncate();

        $faker = Faker::create();

        User::create([
            'name' => 'Alex',
            'email' => 'alex11jgt@hotmail.com',
            'password' => Hash::make('00ag00'),
        ]);

        foreach (range(1, 8) as $i) {
            User::create([
                'name' => $faker->name(),
                'email' => $faker->email(),
                'password' => Hash::make($faker->word()),
            ]);
        }
    }
}