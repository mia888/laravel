<?php 
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\User;

class LoginController extends CommonController{


    public function Login(){
        if($input = Input::all()){//post提交
            //查询用户
            $res = User::select('id','username','password','email')->where('username','=',$input['username'])->first(); 
            // var_dump($res);
            if(!$res) return back()->with('usermsg','用户名不存在');
            //检查密码
            if(Crypt::decrypt($res->password) != $input['password'] ){
                return back()->with('passmsg','密码错误');
            }

        }else{//否则展现页面
            return view('Admin.login');
        }

        session(['user'=>$res->username,'id'=>$res->id,'email'=>$res->email]);
        return redirect('admin/user/add');
    }

     public function quit(){
        session(['user'=>null]);
        return redirect('admin/login');
    }




    
}