<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShiftTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shift', function (Blueprint $table) {
            $table->date('date')->primary('date');
            $table->string('staff_1', 45)->nullable();
            $table->string('staff_2', 45)->nullable();
            $table->string('staff_3', 45)->nullable();
            $table->string('staff_4', 45)->nullable();
            $table->string('staff_5', 45)->nullable();
            $table->string('staff_6', 45)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shift');
    }
}
