<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\D_Transaction;
use Faker\Generator as Faker;

$factory->define(D_Transaction::class, function (Faker $faker) {
    return [
        //
        'transaction_id' => rand(1,100)
        ,'product_id' => rand(1,100)
        ,'jumlah' => rand(1,100)
        ,'subtotal' => rand(5000,99999)
    ];
});
