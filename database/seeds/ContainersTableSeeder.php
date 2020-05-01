<?php

use Illuminate\Database\Seeder;

class ContainersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1
        DB::table('containers')->insert([
            'jenis_botol' => 'Botol Kuning Kecil',
            'isi' => 200.0,
            'harga' => 5000.0,
        ]);
        // 2
        DB::table('containers')->insert([
            'jenis_botol' => 'Botol Kuning Sedang',
            'isi' => 400.0,
            'harga' => 6000.0,
        ]);
        // 3
        DB::table('containers')->insert([
            'jenis_botol' => 'Botol Merah Muda Kecil',
            'isi' => 200.0,
            'harga' => 5000.0,
        ]);
        // 4
        DB::table('containers')->insert([
            'jenis_botol' => 'Botol Merah Muda Sedang',
            'isi' => 400.0,
            'harga' => 6000.0,
        ]);
        // 5
        DB::table('containers')->insert([
          'jenis_botol' => 'Botol Biasa Sedang',
          'isi' => 600.0,
          'harga' => 1000.0,
        ]);
        // 6
        DB::table('containers')->insert([
          'jenis_botol' => 'Botol Putih Khusus Kecil',
          'isi' => 500.0,
          'harga' => 10000.0,
        ]);
        // 7
        DB::table('containers')->insert([
          'jenis_botol' => 'Galon Biru Berkeran Sedang',
          'isi' => 5000.0,
          'harga' => 6000.0,
        ]);
    }
}
