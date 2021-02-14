<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;

// use App\Task를 하면 모델인 Task 클래스를 상속받는다.
use App\Member; // 테이블명 지정

class MemberController extends Controller
{
    // 회원가입 메소드
    public function member_register(request $request)
    {
        $mem_id = $request->input('id'); 
        $mem_pw =  $request->input('password'); 
        $pw_check = $request->input('pwcheck'); 
        $mem_email = $request->input('email');

        $members = Member::where('mem_id',$mem_id)->get();
        foreach($members as $member){
            Alert::error('ID重複', 'このIDは他の方が使っているIDです。');
            return redirect("/login/register");
        }

        if(strlen($mem_pw) >= 8){
            if($mem_pw == $pw_check){
                $member= new Member;
                $member->mem_id = $mem_id;
                $member->mem_pw  = Hash::make($mem_pw);
                $member->mem_email = $mem_email;
                $member->save();
        
                Alert::success('会員登録完了', '会員登録が完了されました。');

                return redirect("/login/login");
            } else {
                Alert::error('パスワードエラー', 'パスワードの確認が間違っています。');
                return redirect("/login/register");
            }
        } else {
            Alert::error('パスワードエラー', 'パスワードの長さが間違っています。');
            return redirect("/login/register");
        }    
    }

    // 로그인 메소드
    public function member_login(request $request)
    {
        $mem_id = $request->input('id'); 
        $mem_pw = $request->input('password'); 
        $mem_password = Hash::make($mem_pw);
        $members = Member::where('mem_id',$mem_id)->get();
        $id=NULL;
        $password=NULL;
        $email=NULL;
        $rank=NULL;

        foreach($members as $member){
            $id = $member -> mem_id;
            $password = $member -> mem_pw;
            $email = $member -> mem_email;    
            $rank = $member -> rank;       
        }

        if($mem_id != $id){
            Alert::warning('IDエラー', 'IDが間違っています。');  
            return redirect("/login/login");
        }else{
            if (Hash::check($mem_pw, $password)) {
                if($rank == "manager"){
                    $request->session()->put('member_id', $mem_id);
                    $request->session()->put('email', $email);
                    $request->session()->put('rank', $rank);
                    Alert::success('管理者ログイン完了', 'ログインが完了されました。');
                    return redirect("/manager");
                }else{
                    $request->session()->put('member_id', $mem_id);
                    $request->session()->put('email', $email);
                    Alert::success('ログイン完了', 'ログインが完了されました。');
                    return redirect("/");
                }
            }else{
                Alert::warning('パスワード間違', 'パスワードが間違っています。');
                return redirect("/login/login");  
            }
        }           
    }

    // 로그아웃 메소드
    public function logout(request $request)
    {
        $request->session()->forget('member_id');
        $request->session()->forget('email');
        if(session('rank')){
            $request->session()->forget('rank'); 
        }
        
        Alert::success('ログアウト完了', 'ログアウトが完了されました。');

        return redirect("/");
    }

    // 회원탈퇴 메소드
    public function delete_member(Request $request) 
    {
        if(session('member_id')){
            $mem_id = session('member_id');
            Member::where('mem_id',$mem_id)->delete();
            $request->session()->forget('member_id');
            $request->session()->forget('email');
            if(session('rank')){
                $request->session()->forget('rank'); 
            }
            Alert::success('会員退会', '会員退会が完了されました。');
            return redirect("/");
        } else {
            Alert::warning('会員退会失敗', '会員退会に失敗しました');
            return redirect("/mypage");
        }
   }

   // 회원관리 메소드
   public function member_management(request $request)
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
        $pageGroup   = ceil($pageNum/$pageNumList);
        // 페이지 그룹 번호
        $startPage   = (($pageGroup-1)*$pageNumList)+1;
        // 페이지 그룹 내 첫 페이지 번호
        $endPage     = $startPage + $pageNumList-1;
        // 페이지 그룹 내 마지막 페이지 번호
        $totalCount  = Member::where('rank','<>','manager')->count();
        // 전체 게시글 갯수
        $totalPage   = ceil($totalCount/$writeList);
        // 전체 페이지 갯수
        if($endPage >= $totalPage) {
        $endPage = $totalPage;
        } // 페이지 그룹이 마지막일 때 마지막 페이지 번호
       $members = Member::where('rank','<>','manager')->skip($startNum)->take($writeList)->get();

       return view('manager.member_management', [
            'totalCount'=>$totalCount,
            'pageNum'=>$pageNum,
            'startPage'=>$startPage,
            'endPage'=>$endPage,
            'totalPage'=>$totalPage,
            'members' => $members
        ]);
    }
 
    // 회원 삭제 메소드
    public function members_delete(request $request)
    {
        $members = Member::get();
 
        if($request->input('checked') != NULL) {
            $checked = $request->input('checked');
            foreach($checked as $check){
                Member::where('mem_id', $check)->delete();
            }
            Alert::success('会員退会', '会員退会が完了されました。');
        } else {
            Alert::warning('チェックエラー', 'チェックボックスをチェックしてください。');
        }

        return redirect("/manager/member_management");
     } 
     
     public function password_find(request $request)
     {
         return view('login.password_set');
      }

      public function password_reset(request $request)
      {
            $mem_id = $request->input('id'); 
            $mem_pw =  $request->input('password');
            $hash_pw = Hash::make($mem_pw);
            $mem_email = $request->input('email');

            $id=NULL;
            $password=NULL;
            $email=NULL;

            $members = Member::where('mem_id',$mem_id)->get();
    
            foreach($members as $member){
                $id = $member -> mem_id;
                $password = $member -> mem_pw;
                $email = $member -> mem_email;        
            }

            if($id == $mem_id){
                if($email == $mem_email){
                    if(strlen($mem_pw) >= 8){
                        Member::where('mem_id', $mem_id)->update(['mem_pw' => $hash_pw]);
                        Alert::success('パスワード変更成功', 'パスワード変更に成功しました。');
                        return redirect("/login/login");
                    } else {
                        Alert::error('パスワードエラー', 'パスワードの長さが間違っています。');
                        return view('login.password_set');
                    }
                } else {
                    Alert::warning('メールアドレスエラー', 'メールアドレスが間違っています。'); 
                    return view('login.password_set');
                }
            } else {
                Alert::warning('IDエラー', 'IDが間違っています。');
                return view('login.password_set');
            }
       }

}
