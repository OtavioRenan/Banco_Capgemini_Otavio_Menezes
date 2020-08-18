<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Repositorio\ContaCorrente;
use Faker\Generator as Faker;

$factory->define(ContaCorrente::class, function (Faker $faker) {
    return [        
        'conta' => $faker->unique()->randomNumber,
        'saldo' => 100.0,
    ];
});
