<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
          $table->bigIncrements('id');
          // $table->bigInteger('user_id')->unsigned()->index();
          $table->string('pelanggan', 30);
          $table->text('alamat');
          // $table->string('status', 15);
          // $table->bigInteger('container_id')->unsigned()->index();
          // $table->double('ongkir', 8, 2);
          $table->double('total', 11, 2);
          $table->boolean('lunas');
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
        Schema::dropIfExists('transactions');
    }
}
