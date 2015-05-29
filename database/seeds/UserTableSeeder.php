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
            'isAdmin' => 1,
            'password' => Hash::make('00ag00'),
        ]);

        User::create([
            'name' => 'Teste',
            'email' => 'teste@email.com',
            'isAdmin' => 0,
            'password' => Hash::make('00fb00'),
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