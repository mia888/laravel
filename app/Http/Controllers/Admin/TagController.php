<?php 
namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Tag;

class TagController extends CommonController{


    /**
     * 添加栏目 
     */
    Public function index($id=0){
        if($id){
            $data = Tag::find($id);
            return view('tag.add',['data'=>$data]);
        }
        return view('tag.add');
    }

    /**
     * 保存栏目信息
     */
    public function saveInfo(Request $request){
        //获取表单数据
        $data = $request->all();

        
        if($data['id']){///更新操作
            $id = $data['id'];
            $res = Tag::where('id','=',$id)->update(['name'=>$data['name']]);
        }else{
            $res = Tag::create($data);
        }

        
        if($res)   return redirect('admin/tag/list')->with('success','保存成功');
        return redirect()->back()->with('errors','操作失败');
        // var_dump($res);

        // 规则
        // $rules = [
        //     'tagname' => 'required|alpha_num|min:6|max:12',//最小6位 最大12位
        //     'password' => 'required|alpha_num|min:6|max:12',  //必填 最小6位 最大12位
        //     'repassword' => 'required|alpha_num|min:6|max:12', //必填 字符串
        //     'email' => 'required|email', //必填 数值
        //     'status' => 'required|numeric', //必填 最大255位
        // ];
        // $messages = [
        //     'required' => ' :attribute 字段必须填写.',
        //     'tagname' => ' :用户名',
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
    public function taglist(){
        //获取所有用户
        $arr = Tag::paginate(15);
        return view('tag/list',['list'=>$arr]);
    }

    /**
     * 删除操作
     */
    public function delete(Request $request){
        //获取表单数据
        $arr = $request->all();
        $num = Tag::destroy($arr['ids']);
        if($num){
            echo $num;
        }
    }

   

}