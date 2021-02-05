<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// 모델을 담당하는 Task 모델은 컨트롤러에 의해 호출되어 DB에 데이터를 저장하거나, 
// DB에서 데이터를 가져와서 뷰가 사용할 수 있는 형태로 컨트롤러에 반환한다. 
// 클래스 안에 protected $table = '테이블명'; 선언을 해주면 생성한 Task 모델에서 어떤 테이블을 사용해야 할지 Model 에게 알려준다.

class Appoint extends Model
{
    protected $table = 'appoint';
    public $timestamps = false;
}