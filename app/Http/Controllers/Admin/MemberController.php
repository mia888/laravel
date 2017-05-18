<?php 

namespace App\Http\Controllers;

use App\Member;
class MemberController extends Controller{

    public function info($id){
        // return 'member-info'.$id;
        // return route('memberinfo');
        

        return Member::getMember();
        //输出视图
        // return view('member/info',['name'=>'hmm','id'=>$id]);
    }
}