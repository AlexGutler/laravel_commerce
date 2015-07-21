<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(CodeCommerce\User::class, function ($faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => str_random(10),
        'remember_token' => str_random(10)
    ];
});
$factory->define(CodeCommerce\Category::class, function ($faker) {
    return [
        'name' => $faker->word(),
        'description' => $faker->sentence()
    ];
});
$factory->define(CodeCommerce\Tag::class, function ($faker) {
    return [
        'name' => $faker->word(),
    ];
});
$factory->define(CodeCommerce\Product::class, function ($faker) {
    return [
        'name' => $faker->word(),
        'description' => $faker->sentence(),
        'price' => $faker->randomNumber(2),
        'category_id' => $faker->numberBetween(1, 15),
        'featured' => $faker->boolean(),
        'recommend' => $faker->boolean()
    ];
});
$factory->define(\CodeCommerce\Estado::class, function ($faker) {
    return [
        'nome' => $faker->word()
    ];
});
$factory->define(CodeCommerce\Cidade::class, function ($faker) {
    return [
        'nome' => $faker->word(),
        'estado_id' => $faker->numberBetween(1, 3)
    ];
});