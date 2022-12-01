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
        Schema::create('tokobukus', function (Blueprint $table) {
            $table->id();
            $table->string('judul', 255);
            $table->string('penerbit', 255);
            $table->string('genre', 100);
            $table->string('pengarang', 100);
            $table->string('isbnbuku')->unique();
            $table->string('harga');
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
        Schema::dropIfExists('tokobukus');
    }
};
