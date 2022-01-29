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
            $table->id();
            $table->bigInteger('user_id')->nullable()->unsigned();
            $table->foreign('user_id')->references('id')->on('users')
            ->onDelete('cascade')->onUpdate('cascade'); 
            $table->bigInteger('pizza_id')->nullable()->unsigned();
            $table->foreign('pizza_id')->references('id')->on('pizzas')
            ->onDelete('cascade')->onUpdate('cascade'); 
            $table->string('name'); 
            $table->string('description');
            $table->double('price')->default(100);
            $table->string('image'); 
            $table->string('size');
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
        Schema::dropIfExists('orders');
    }
}
