<?php

use Illuminate\Database\Seeder;

class ProductsSeederClass extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1 Strong Kangen
        DB::table('products')->insert([
            'water_id' => 1,
            'container_id' => 6,
            'isi' => 500.0,
            'harga' => 55000.0,
        ]);
        // 2 Kangen 8,5 sedang
        DB::table('products')->insert([
            'water_id' => 2,
            'container_id' => 5,
            'isi' => 600.0,
            'harga' => 5000.0,
        ]);
        // 3 Kangen 8,5 galon 5 Liter
        DB::table('products')->insert([
            'water_id' => 2,
            'container_id' => 7,
            'isi' => 5000.0,
            'harga' => 20000.0,
        ]);

        // 4 Kangen 9.0 sedang
        DB::table('products')->insert([
            'water_id' => 6,
            'container_id' => 5,
            'isi' => 600.0,
            'harga' => 5000.0,
        ]);
        // 5 Kangen 9.0 galon 5 Liter
        DB::table('products')->insert([
          'water_id' => 6,
          'container_id' => 7,
          'isi' => 5000.0,
          'harga' => 20000.0,
        ]);

        // 6 Kangen 9.5 sedang
        DB::table('products')->insert([
            'water_id' => 7,
            'container_id' => 5,
            'isi' => 600.0,
            'harga' => 5000.0,
        ]);
        // 7 Kangen 9.5 galon 5 Liter
        DB::table('products')->insert([
          'water_id' => 7,
          'container_id' => 7,
          'isi' => 5000.0,
          'harga' => 20000.0,
        ]);

        // 8 Beauty Water Kecil
        DB::table('products')->insert([
          'water_id' => 5,
          'container_id' => 3,
          'isi' => 200.0,
          'harga' => 20000.0,
        ]);

        // 9 Beauty Water Sedang
        DB::table('products')->insert([
          'water_id' => 5,
          'container_id' => 4,
          'isi' => 400.0,
          'harga' => 40000.0,
        ]);

        // 10 Strong Acid Kecil
        DB::table('products')->insert([
          'water_id' => 3,
          'container_id' => 1,
          'isi' => 200.0,
          'harga' => 20000.0,
        ]);

        // 11 Strong Acid Sedang
        DB::table('products')->insert([
          'water_id' => 3,
          'container_id' => 2,
          'isi' => 400.0,
          'harga' => 40000.0,
        ]);

    }
}
