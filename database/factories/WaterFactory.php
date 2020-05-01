<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Water;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Water::class, function (Faker $faker) {
    return [
        //
        'nama' => 'Air Dummy - ' . Str::random(4),
        'ph' => rand( 20, 140)/10,
        'manfaat' => 'Sebagai dummy - ' . $faker->sentence(),
    ];
});
