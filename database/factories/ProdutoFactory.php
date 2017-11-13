<?php

use Faker\Generator as Faker;

$factory->define(\App\Produto::class, function (Faker $faker) {
    return [
        'nome'=>$faker->company,
        'preco'=>$faker->randomFloat(2, 1, 100),
        'quantidade'=>$faker->randomNumber(2)
    ];
});
