<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name');
            $table->string('caption');
            $table->softDeletes();
            $table->foreign('karbar_id')
                ->references('id')
                ->on('karbars');
        });

        Schema::table('posts' , function (Blueprint $table){
            $table->integer('karbar_id')
                ->unsigned()
                ->nullable()
                ->change();
        });

    }




    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
