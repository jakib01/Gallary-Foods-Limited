<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('product_id')->unsigned()->nullable();
            $table->Integer('user_id')->unsigned()->nullable();
            $table->Integer('order_id')->unsigned()->nullable();
            $table->string('ip_address')->nullable();
            $table->integer('product_quantity')->default(1)->nullable();
            $table->integer('product_unit')->nullable();
            $table->string('color')->nullable();
            $table->string('size')->nullable();
            $table->integer('product_code')->nullable();
            $table->Integer('unit_price')->nullable();
            $table->Integer('unit_total_price')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
//                ->onDelete('cascade');

            $table->foreign('product_id')->references('id')->on('products');
//                ->onDelete('cascade');

            $table->foreign('order_id')->references('id')->on('orders');
//                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
    }
}
