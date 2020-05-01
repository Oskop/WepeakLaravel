<?php

use Illuminate\Database\Seeder;

class TransactionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Pesanan Tio
        $transaksi = new App\Transaction;
        $transaksi->pelanggan = 'Tio';
        $transaksi->alamat = 'Jl. Nuri Gg. 1 No. 5';
        $transaksi->total = 20000;
        $transaksi->lunas = 0;
        $transaksi->save();

        // Pesanan Tio
        $transaksi = new App\Transaction;
        $transaksi->pelanggan = 'Tyas';
        $transaksi->alamat = 'Jl. Ketilang No. 6';
        $transaksi->total = 20000;
        $transaksi->lunas = 0;
        $transaksi->save();
    }
}
