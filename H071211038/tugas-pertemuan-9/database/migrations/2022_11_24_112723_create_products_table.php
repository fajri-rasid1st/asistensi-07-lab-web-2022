<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{ 
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id')->nullable(false);
            $table->string("name")->nullable(false);
            $table->integer("seller_id")->unsigned()->nullable(false);
            $table->integer("category_id")->unsigned()->nullable(false);
            $table->decimal("price")->nullable(false);
            $table->string("status")->nullable(false);
            $table->foreign("seller_id")->references("id")->on("sellers")->onDelete('cascade');
            $table->foreign("category_id")->references("id")->on("categories")->onDelete('cascade');
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
        Schema::dropIfExists('products');
    }
};