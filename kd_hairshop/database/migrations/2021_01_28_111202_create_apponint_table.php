<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApponintTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appoint', function (Blueprint $table) {
            $table->increments('No');
            $table->string('mem_id', 45);
            $table->string('mem_email', 45);
            $table->string('designer', 45);
            $table->string('hair_style', 45);
            $table->dateTime('appoint_st');
            $table->dateTime('appoint_end');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apponint');
    }
}
