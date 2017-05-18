<?php 
namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Text;
use App\Tag;

class TextController extends CommonController{


    /**
     * 添加页面
     */
    Public function index($id=0){
        //获取栏目标签
        $tags = Tag::all();

        if($id!=0){
            $data = Text::find($id);
            return view('text.add',['data'=>$data,'tags'=>$tags]);
        }
        return view('text.add',['tags'=>$tags]);
    }

    /**
     * 保存文章
     */
    public function saveInfo(Request $request){
        //获取表单数据
        $data = $request->all();
        // var_dump($data);die;
        if($data['id']){///更新操作
            $id = $data['id'];
            
            $res = Text::where('id','=',$id)->update(['title'=>$data['title'],'content'=>$data['content'],'tid'=>$data['tid'],'status'=>$data['status']]);
        }else{
            $res = Text::create($data);
        }

        // var_dump($data);die;
        
        if($res)   return redirect('admin/text/list')->with('success','保存成功');
        return redirect()->back()->with('errors','操作失败');
        // var_dump($res);

        // 规则
        // $rules = [
        //     'textname' => 'required|alpha_num|min:6|max:12',//最小6位 最大12位
        //     'password' => 'required|alpha_num|min:6|max:12',  //必填 最小6位 最大12位
        //     'repassword' => 'required|alpha_num|min:6|max:12', //必填 字符串
        //     'email' => 'required|email', //必填 数值
        //     'status' => 'required|numeric', //必填 最大255位
        // ];
        // $messages = [
        //     'required' => ' :attribute 字段必须填写.',
        //     'textname' => ' :用户名',
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
    public function textlist(){
        //获取所有用户
        $arr = DB::table('text')
                    ->join('tag','tag.id','=','text.tid')
                    ->select('text.*','tag.name')
                    ->orderBy('text.id','Desc')
                    ->paginate(15);
        return view('text/list',['list'=>$arr]);
    }

    /**
     * 删除操作
     */
    public function delete(Request $request){
        //获取表单数据
        $arr = $request->all();
        $num = Text::destroy($arr['ids']);
        if($num){
            echo $num;
        }
    }

}