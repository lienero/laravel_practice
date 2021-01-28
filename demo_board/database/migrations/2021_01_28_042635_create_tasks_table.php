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
            /**
             * id : 글 번호, 기본키입니다. increment 속성이므로 데이터가 생성되면 1씩 증가합니다.
             * memo : 사용자가 작성한 글.
             * creator_name : 사용자가 입력한 사용자의 이름입니다.
             * grp : 같은 주제를 갖는 게시물의 고유번호. 부모 글과 부모 글로부터 파생된 모든 자식 글은 같은 번호를 갖습니다.
             * sort : 같은 그룹 내 댓글의 순서.
             * depth : 같은 그룹 내 댓글의 계층.
             */
            // $table->속성('컬럼명'); 의 형식으로 정의
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
