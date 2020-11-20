<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('user_id')->unsigned()->nullable();
            $table->Integer('payment_id')->unsigned()->nullable();
            $table->string('ip_address')->nullable();
            $table->string('name');
            $table->string('phone_no');
            $table->text('shipping_address');
            $table->string('email')->nullable();
            $table->text('message')->nullable();
            $table->boolean('paid')->default(0);
            $table->boolean('completed')->default(0);
            $table->boolean('is_seen_by_admin')->default(0);
            $table->string('transaction_id')->nullable();
            $table->Integer('total_price')->nullable();
            $table->Integer('total_price_with_shipping_cost')->nullable();

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('payment_id')->references('id')->on('payments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
