<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Member;

class LoginController extends Controller
{
    public function check(){
        $uid = request('uid');
        $pwd = request('pwd');

        $row = Member::where('uid','=', $uid)->
                       where('pwd','=', $pwd)->first();

        if($row){
            session()->put('uid',$row->uid);
            session()->put('name',$row->name);
            session()->put('rank',$row->rank);
        }else{
            echo "<script>alert('로그인 실패');</script>";
        }            

        return view('index');
    }

    public function logout(){
        echo("
            <script>
                if(!confirm('로그아웃 하시겠습니까?')){
                   history.back();
                };
            </script>"
        );

        session()->forget('uid');
        session()->forget('name');
        session()->forget('rank');
        
        return view('index');
    }
}
