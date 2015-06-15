<?php
use \Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        // limpar a tabela
        DB::table('users')->truncate();

        factory('CodeCommerce\User')->create(
            [
                'name' => 'Alex',
                'email' => 'alex11jgt@hotmail.com',
                'isAdmin' => 1,
                'password' => Hash::make('00ag00'),
            ]
        );

        factory('CodeCommerce\User')->create(
            [
                'name' => 'Teste',
                'email' => 'teste@email.com',
                'isAdmin' => 0,
                'password' => Hash::make('00fb00'),
            ]
        );

        factory('CodeCommerce\User', 10)->create();
    }
}