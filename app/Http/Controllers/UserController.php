<?php 
namespace App\Http\Admin\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller{


    /**
     * 添加页面
     */
    Public function index($id=0){
        if($id!=0){
            $data = User::find($id);
            return view('user.add',['data'=>$data]);
        }
        return view('user.add');
    }

    /**
     * 保存用户信息
     */
    public function saveInfo(Request $request){
        //获取表单数据
        $data = $request->all();

        //判断密码
        if($data['repassword'] != $data['password']){
            //返回页面
            return redirect()->back()->with('errors','密码不一致');
        }

        $data['password'] = md5($data['password']);
        $data['created_at'] = time();
        $data['updated_at'] = time();

        if($data['id']){///更新操作
            $id = $data['id'];
            
            
            $res = User::where('id','=',$id)->update(['username'=>$data['username'],'email'=>$data['email'],'password'=>$data['password'],'status'=>$data['status']]);
        }else{
            $res = User::create($data);
        }

        // var_dump($data);die;
        
        if($res)   return redirect('admin/user/list')->with('success','保存成功');
        return redirect()->back()->with('errors','操作失败');
        // var_dump($res);

        // 规则
        // $rules = [
        //     'username' => 'required|alpha_num|min:6|max:12',//最小6位 最大12位
        //     'password' => 'required|alpha_num|min:6|max:12',  //必填 最小6位 最大12位
        //     'repassword' => 'required|alpha_num|min:6|max:12', //必填 字符串
        //     'email' => 'required|email', //必填 数值
        //     'status' => 'required|numeric', //必填 最大255位
        // ];
        // $messages = [
        //     'required' => ' :attribute 字段必须填写.',
        //     'username' => ' :用户名',
        //     'password' => ' :密码',
        //     'repassword' => '确认密码',
        //     'email' => ' 邮箱',
        //     'status' => '用户状态',
        // ]; 

        // //验证
        // $validator = \validator::make($request->input(),$rules,$message);

        // var_dump($validator);
    } 
    
    /**
     * 用户列表
     */
    public function userlist(){
        //获取所有用户
        $arr = User::paginate(15);
        return view('user/list',['list'=>$arr]);
    }

    /**
     * 删除操作
     */
    public function delete(Request $request){
        //获取表单数据
        $arr = $request->all();
        $num = User::destroy($arr['ids']);
        if($num){
            echo $num;
        }
    }

   

}