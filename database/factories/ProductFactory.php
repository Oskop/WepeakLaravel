<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        //
        'water_id' => rand( 1, 100),
        'container_id' => rand(1, 100),
        'isi' => rand(4000, 19000),
        'harga' => rand( 4000, 100000),
    ];
});
