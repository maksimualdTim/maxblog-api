<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods', function(Blueprint $table){
            $table->id();
            $table->float('price');
            $table->foreignId('preview')->constrained('files', 'id');
            $table->foreignId('category')->constrained('categories', 'id');
            $table->string('name');
            $table->text('shortDesc');
            $table->text('fullDesc');
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
        Schema::dropIfExists('goods');
    }
}
