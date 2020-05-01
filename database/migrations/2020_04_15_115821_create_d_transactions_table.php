<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('d_transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('transaction_id')->unsigned()->index();
            $table->bigInteger('product_id')->unsigned()->index();
            $table->integer('jumlah');
            $table->double('subtotal', 11, 2);
            $table->timestamps();
            $table->softDeletesTz();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('d_transactions');
    }
}
