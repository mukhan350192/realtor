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
        Schema::create('post_details', function (Blueprint $table) {
            $table->id();
            $table->integer('type_object');
            $table->double('price');
            $table->integer('city');
            $table->integer('region');
            $table->integer('district');
            $table->double('area');
            $table->integer('floor')->nullable();
            $table->integer('floor_quantity')->nullable();
            $table->integer('year')->nullable();
            $table->integer('rooms');
            $table->integer('type_building')->nullable();
            $table->text('state')->nullable();
            $table->integer('balcony')->nullable();
            $table->integer('internet')->nullable();
            $table->text('mebel');
            $table->text('description');
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
        Schema::dropIfExists('post_details');
    }
};
