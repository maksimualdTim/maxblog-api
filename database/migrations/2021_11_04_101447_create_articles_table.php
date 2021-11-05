<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function(Blueprint $table){
            $table->id();
            $table->foreignId('author_id')->constrained('users', 'id');
            $table->string('title');
            $table->text('shortText');
            $table->text('text');
            $table->foreignId('category_id')->constrained('categories', 'id');
            $table->bigInteger('views')->default(0);
            $table->float('rating')->nullable();
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
        Schema::dropIfExists('articles');
    }
}
