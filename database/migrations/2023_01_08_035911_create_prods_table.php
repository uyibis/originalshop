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
        Schema::create('prods', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->text('description')->nullable();
            $table->string('short_description')->nullable();
            $table->string('images')->nullable();
            $table->float('price')->default(0.0);
            $table->float('sale_price')->default(0.0);
            $table->string('page_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->boolean('visibility')->default(0);
            $table->string('categories') ->nullable();
            $table->boolean('verified')->default(0);
            $table->text('brand')->nullable();
            $table->string('manufacturer')->nullable();
            $table->text('tags')->nullable();
            $table->year('myear')->nullable();
            $table->foreignId('category_id');
            $table->foreignId('user_id');
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
        Schema::dropIfExists('prods');
    }
};
