<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Task를 하면 모델인 Task 클래스를 상속받는다.
use App\Task; // 테이블명 지정

class TaskController extends Controller
{
    // use Illuminate\Http\Request 클래스의 변수
    public function index(Request $request) // Request 클래스의 변수 매개변수로 사용
    {
        
        $pageNum     = $request->input('page');
        // view에서 넘어온 현재페이지의 파라미터 값.
        $pageNum     = (isset($pageNum)?$pageNum:1);
        // 페이지 번호가 없으면 1, 있다면 그대로 사용
        $startNum    = ($pageNum-1)*10;
        // 페이지 내 첫 게시글 번호
        $writeList   = 10;
        // 한 페이지당 표시될 글 갯수
        $pageNumList = 10;
        // 전체 페이지 중 표시될 페이지 갯수
        // ceil 함수는 올림 함수다. 소수점 아래 값이 있으면 무조건 올린다. 
        $pageGroup   = ceil($pageNum/$pageNumList);
        // 페이지 그룹 번호
        $startPage   = (($pageGroup-1)*$pageNumList)+1;
        // 페이지 그룹 내 첫 페이지 번호
        $endPage     = $startPage + $pageNumList-1;
        // 페이지 그룹 내 마지막 페이지 번호
        $totalCount  = Task::count();
        // 전체 게시글 갯수
        $totalPage   = ceil($totalCount/$writeList);
        // 전체 페이지 갯수
        if($endPage >= $totalPage) {
        $endPage = $totalPage;
        } // 페이지 그룹이 마지막일 때 마지막 페이지 번호

        // 뷰에서 [ 삭제하기 ] 버튼을 클릭하면 del 파라미터에 1의 값이 들어온다.
        if($request->input('del')==1) {
            // where('컬럼이름','데이터') 는 SQL문에서 where '컬럼이름' = '데이터' 와 같음.
            // where 명령어를 실행한 뒤 그 위치의 'memo' 컬럼의 내용을 "삭제된글입니다." 로 바꾼다.
            Task::where('id', $request->input('delId'))->update(['memo'=>'삭제된글입니다.']);
        }

        // comments 를 선언하고 변수 안에 쿼리빌더의 결과를 넣는다.
        // 테이블은 Task 테이블이고 grp와 sort를 정렬한다.
        $comments = Task::orderby('grp', 'DESC')
        // skip은 offset과 같고, take는 limit와 같은 의미이다. 마지막으로 get() 메소드를 사용하여 결과를 가져올 수 있다.
        ->orderby('sort')->skip($startNum)->take($writeList)->get();
        // 테이블에서 가져온 DB 뷰에서 사용 할 수 있는 변수에 저장.

        // 뷰의 파일명인 resources/views/tasks/index.blade.php 에 변수들을 넘겨준다. 저 변수들은 이제 뷰 에서도 사용이 가능하다.
        return view('tasks.index', [ //경로를 작성할 때 \대신 .을 사용
            'totalCount'=>$totalCount,
            'comments'=>$comments,
            'pageNum'=>$pageNum,
            'startPage'=>$startPage,
            'endPage'=>$endPage,
            'totalPage'=>$totalPage
        ]);
        // 요청된 정보 처리 후 결과 되돌려줌
    }

    public function create() 
    {
        // craete 메소드는 뷰만 보여주면된다
        return view('tasks.create');
    }

    public function store(request $request)
    {
        $pageNum = $request->input('page'); //댓글을 작성한 페이지로 돌아가기 위해 필요
        $mode =  $request->input('mode'); // 댓글작성인지 글작성인지 구분하기 위한 변수
        $memo = $request->input('memo');
        $creatorName = $request->input('creator_name');
        $creatorName = (isset($creatorName)?$creatorName:"익명");
        $id = $request->input('id');
        $grp = $request->input('grp');
        $sort = $request->input('sort');
        $depth =  $request->input('depth');

        // $mode변수에 파라미터 값이 '0' 이 들어오는 건 게시물에 댓글을 작성하는 경우
        if($mode==0) {
            // 쿼리빌더를 사용해 댓글의 grp값이 있는 컬럼을 찾고 댓글의 sort 값보다 큰 sort 값들에게 1을 더해준다. 
            Task::where([
                ['grp',$grp],
                ['sort','>',$sort],
            ])->increment('sort', 1);
            // 값을 저장할 때는 라라벨의 ORM인 Eloquent를 사용한다. 
            // Eloquent ORM은 데이터베이스에서 동작하는 아름답고 심플한 액티브 레코드를 제공
            // 모델의 인스턴스를 생성하고 모델의 속성을 설정한 뒤 저장한다
            $commentPage = new Task;
            $commentPage->memo = $memo;
            $commentPage->creator_name  = $creatorName;
            $commentPage->grp = $grp; 
            $commentPage->sort = $sort+1; 
            $commentPage->depth = $depth+1;
            $commentPage->save();
        } else {
            $commentPage = new Task;
            $commentPage->memo = $memo;
            $commentPage->creator_name  = $creatorName;
            $commentPage->sort = 0;
            $commentPage->depth = 0;
            $commentPage->save();
            $commentPage->grp = $commentPage->id;
            $commentPage->save();
        }
        // 리다이렉트 response는 Illuminate\Http\RedirectResponse 클래스의 인스턴스이며 
        // 사용자를 다른 URL로 리다이렉트 시키기 위한 준비된 헤더를 포함
        // return redirect 를 사용하여 create 페이지에서 값을 저장하고 난 뒤 create 페이지가 아닌 메인페이지에 페이지 파라미터 
        // 값을 넘겨주어서 글쓰기 or 댓글쓰기 버튼을 눌렀던 페이지로 돌아간다.
        return redirect("/tasks?page=$pageNum");
    }

}
