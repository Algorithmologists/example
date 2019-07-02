<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TahlilExam extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       /* Schema::create('exam',function (Blueprint $table){
            $table->string('doc',250)->nullable();
        });*/

        Schema::table('exam', function (Blueprint $table) {
            $table->string('course' , 50)->change();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('exam', function (Blueprint $table) {
            //
        });
    }
}
