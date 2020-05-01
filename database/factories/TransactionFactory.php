<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Transaction;
use Faker\Generator as Faker;

$factory->define(Transaction::class, function (Faker $faker) {
    return [
        //
        'pelanggan' => $faker->name
        ,'alamat' => $faker->address
        ,'total' => rand(5000,999999)
        ,'lunas' => rand(0,1)
    ];
});
