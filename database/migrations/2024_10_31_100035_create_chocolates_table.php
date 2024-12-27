<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChocolatesTable extends Migration
{
    public function up()
    {
        Schema::create('chocolates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');  // Added description field
            $table->decimal('price', 8, 2);
            $table->string('image')->nullable(); // Image field for storing the file path
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('chocolates');
    }
}