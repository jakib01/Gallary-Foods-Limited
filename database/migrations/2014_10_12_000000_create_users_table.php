<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('username')->unique()->nullable();
            $table->string('email')->nullable();
            $table->string('phone_code')->nullable();
            $table->string('phone_no')->unique();
            $table->string('password');
            $table->string('country')->nullable();
            $table->date('date_of_birth');
            $table->string('gender');

            $table->unsignedTinyInteger('status')->default(1)->comment('0=Inactive|1=Active|2=Ban');
            $table->string('ip_address')->nullable();
            $table->string('avatar')->nullable();
            $table->text('shipping_address')->nullable();

            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('post_code')->nullable();
            $table->string('occupation')->nullable();
            $table->string('nominee_name')->nullable();
            $table->string('nominee_relation')->nullable();
            $table->text('nominee_address')->nullable();

            $table->string('other')->nullable();
            $table->string('other1')->nullable();


            $table->text('street_address')->nullable();
            $table->Integer('countrie_id')->unsigned()->nullable();
            $table->Integer('division_id')->unsigned()->nullable();
            $table->Integer('district_id')->unsigned()->nullable();
            $table->Integer('upazilas_id')->unsigned()->nullable();

            $table->rememberToken();
            $table->timestamps();

            $table->foreign('division_id')->references('id')->on('divisions');
//                ->onDelete('cascade');

            $table->foreign('countrie_id')->references('id')->on('countries');
//                ->onDelete('cascade');

            $table->foreign('district_id')->references('id')->on('districts');
//                ->onDelete('cascade');

            $table->foreign('upazilas_id')->references('id')->on('upazilas');
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
        Schema::dropIfExists('users');
    }
}
