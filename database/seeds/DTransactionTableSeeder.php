<?php

use Illuminate\Database\Seeder;

class DTransactionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Pesanan Tio 9,5 Galon 1
        $dtransaksi = new App\D_Transaction;
        $dtransaksi->transaction_id = 1;
        $dtransaksi->product_id = 7;
        $dtransaksi->jumlah = 1;
        $dtransaksi->subtotal = 20000;
        $dtransaksi->save();

        // Pesanan Tyas 9,5 Galon 1
        $dtransaksi = new App\D_Transaction;
        $dtransaksi->transaction_id = 2;
        $dtransaksi->product_id = 7;
        $dtransaksi->jumlah = 1;
        $dtransaksi->subtotal = 20000;
        $dtransaksi->save();
    }
}
