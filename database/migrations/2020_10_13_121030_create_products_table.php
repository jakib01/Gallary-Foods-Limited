<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('brand_id')->unsigned()->nullable();
            $table->string('title');
            $table->text('description');
            $table->string('unit')->nullable();
            $table->string('slug');
            $table->integer('quantity')->default(1);
            $table->integer('price');
            $table->integer('offer_price')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->string('color')->nullable();
            $table->string('size')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_keyword')->nullable();
            $table->integer('meta_dec')->nullable();
            $table->timestamps();

            $table->foreign('brand_id')->references('id')->on('brands');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
