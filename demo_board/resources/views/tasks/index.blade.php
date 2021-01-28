@extends('layouts.task_layout')
{{-- 레이아웃을 사용함. --}}
{{-- blade파일에서 @section('yield 이름') 으로 yield 부분에 넣을 컨텐츠를 작성할 수 있고 @endsection으로 닫아줘야한다. --}}
@section('title')
게시판
@endsection

@section('style')
<style>
    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
        margin: 20px 20px -15px 20px;
    }

    th,
    td {
        padding: 5px;
    }

    th {
        background-color: honeydew;
    }
</style>
@endsection
@section('content')
<h1>게시판</h1>
<small><?= $totalCount ?>개의 글이 있습니다.
    <?= $pageNum ?>페이지 입니다.</small>
<table>
    <tr>
        <th>ID</th>
        <th>MEMO</th>
        <th>NAME</th>
        <th>DATE</th>
        <th></th>
    </tr>
    {{-- foreach 문은 배열의 원소나, 객체의 프로퍼티 수만큼 반복하여 동작하는 구문 --}}
    {{-- 블레이드 템플릿에서 제공하는 반복문을 위한 지시어. foreach와 기능은 똑같다. --}}
    @foreach($comments as $comment)
    <tr>
        <td>
            {{-- 데이터를 표시 할 땐 {{ }}로 감싸준다. --}}
            {{ $comment->id }}
        </td>
        <td>
            @if ($comment->depth==0)
            {{ $comment->memo }}
            @else
            @for ($i=0; $i<$comment->depth; $i++)
                {{-- 대댓글을 구분하기 위해 깊이만큼 띄어쓰기. --}}
                &nbsp&nbsp
                @endfor
                └{{ $comment->memo }}
                @endif
        </td>
        <td>
            {{ $comment->creator_name }}
        </td>
        <td>
            {{ $comment->created_at }}
        </td>
        <td>
            {{-- create뷰로 파라미터를 보내주는 댓글달기 버튼을 클릭하면 commentInfo 함수가 실행 --}}
            <form style="float:left; margin-right:10px;" action="tasks/create" method="GET">
                <button onClick="commentInfo({{ $comment->id }},{{ $comment->grp }}
        	,{{ $comment->sort }},{{ $comment->depth }})">댓글달기</button>
                <input type="hidden" name="mode" value="0">
                <input type="hidden" class="id" name="id" value="">
                <input type="hidden" class="grp" name="grp" value="">
                <input type="hidden" class="sort" name="sort" value="">
                <input type="hidden" class="depth" name="depth" value="">
                <input type="hidden" name="page" value="<?= $pageNum ?>">
            </form>
            {{-- 삭제하기 버튼을 누르면 삭제를 구분해줄 파라미터와 삭제할 코멘트의 아이디를 보낸다. --}}
            <form action="/tasks" method="GET" style="float:left;">
                <input type="submit" value="삭제하기">
                <input type="hidden" name="del" value="1">
                <input type="hidden" name="delId" value="{{ $comment->id }}">
                <input type="hidden" name="page" value="{{$pageNum}}">
            </form>
        </td>
    </tr>
    @endforeach
</table>
<form action="tasks/create" method="GET">
    <button style="margin-top:20px;">글쓰기</button>
    <input type="hidden" name="mode" value="1">
    <input type="hidden" name="page" value="{{ $pageNum }}">
</form>

{{-- 페이징 부분이다 --}}
<a href="/tasks?pageNum={{ $startPage }}">
    <<</a> <?php if($pageNum == 1)
    {
    echo "";
    }
    else
    { ?> <a href="/tasks?page={{ $pageNum-1 }}">
        <</a> <?php } ?> <?php for($i=$startPage; $i<=$endPage; $i++)
    { ?> <a href="/tasks?page=<?= $i ?>"><?= $i ?>
</a>
<?php } ?>
<?php if($pageNum == $totalPage)
    { 
    echo "";
    }
    else 
    { ?>
<a href="/tasks?page={{ $pageNum+1 }}">></a>
<?php } ?>
<a href="/tasks?page={{ $endPage }}">>></a><br>

@section('script')
<script>
    // 버튼을 클릭하면 그 버튼이 위치한 행의 id, grp, sort, depth 값이 create에 파라미터 값으로 보내질 value 값에 들어가는 자바스크립트 함수
    function commentInfo(id,grp,sort,depth)
{
    $('.id').val(id);
    $('.grp').val(grp);
    $('.sort').val(sort);
    $('.depth').val(depth);
};
</script>
@endsection
@endsection