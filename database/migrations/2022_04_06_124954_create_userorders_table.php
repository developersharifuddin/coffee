<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserordersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userorders', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->unsignedBigInteger('item_id');
            $table->string('subtotal');
            $table->string('discount');
            $table->string('tax');
            $table->string('total'); 
            $table->string('quantity')->default('1'); 
            $table->string('firstname');
            $table->string('lastname');
            $table->string('country');
            $table->string('city');
            $table->string('postcode');
            $table->string('email');
            $table->string('phone');
            $table->string('line1');
            $table->string('line2')->nullable();
            $table->string('payment_method');
            $table->boolean('status');
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('userorders');
    }
}
