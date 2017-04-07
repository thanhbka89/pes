<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    public function up()
      {
          Schema::create('orders', function (Blueprint $table) {
              $table->increments('id');
              $table->string('order_number', 50)->unique();
              $table->string('transaction_date', 100);
              $table->integer('customer_id')->unsigned()->index();
              $table->float('total_amount');
              $table->string('status', 20);
              $table->timestamps();
              $table->softDeletes();

              $table->foreign('customer_id')->references('id')->on('customers');
          });
      }

      public function down()
      {
          Schema::dropIfExists('orders');
      }
}
