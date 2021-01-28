<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // up메소드는 데이터베이스에 테이블, 컬럼, 인덱스를 추가하는데 사용
    public function up()
    {
        Schema::create('Task', function (Blueprint $table) {
            $table->increments('id');
            $table->text('memo');
            $table->text('creator_name');
            $table->integer('grp')->nullable();
            $table->integer('sort')->nullable();
            $table->integer('depth')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    // down메소드는 up메소드의 동작을 취소
    public function down()
    {
        Schema::dropIfExists('Task');
    }
}
