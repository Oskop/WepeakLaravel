<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Container;
use Faker\Generator as Faker;

$factory->define(Container::class, function (Faker $faker) {
    return [
        //
        'jenis_botol' => 'Wadah Dummy - ' . Str::random(4),
        'isi' => rand( 1000, 19000),
        'harga' => rand( 4000, 75000),
    ];
});
