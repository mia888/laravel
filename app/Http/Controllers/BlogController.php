<?php 
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Blog;

class BlogController extends Controller{

    //首页
    public function index(){

    }


    public function test1(){
        // return 'test1';
       //查询
       $post =  DB::select("select * from post");
        //增加
        // $add = DB::insert("insert into poststatus (`name`,`position`) values(?,?)",['审核中啊',3]);
        //修改
        // $edit = DB::update('update poststatus set name=? where id=?',['审核失败',3]);
        //删除
        $del = DB::delete('delete  from poststatus where id=?',[3]);

        // dd($post);查看数组
       // var_dump($del);

    }

    //使用查询构造器添加数据
    public function query1(){
        //添加
        // $bool = DB::table('poststatus')->insert(['name'=>'审核失败','position'=>3]);

        // $id = DB::table('poststatus')->insertGetId(['name'=>'审核过期','position'=>4]);

        //插入多条数据
        $add = DB::table('poststatus')->insert(
            ['name'=>'审核入档','position'=>6],
            ['name'=>'审核失效','position'=>7]
            );

        // var_dump($add);

    }
    //使用查询构造器更新数据
    public function query2(){
        //更新操作
        // $edit = DB::table('poststatus')
        //     ->where('id',1)
        //     ->update(['name'=>'审核']);

        // }

        //更新自增
        // $edit = DB::table('poststatus')
        //     ->where('id',6)
        //     ->increment('position');

        //更新自减
        $edit = DB::table('poststatus')
            ->where('id',6)
            ->decrement('position',3,['name'=>'审核测试']);

    // var_dump($edit);

    }

    //使用查询构造器删除数据
    public function query3(){
       // $num =  DB::table('poststatus')
       //      ->where('id',6)
       //      ->delete();

        // $num =  DB::table('poststatus')
        //     ->where('id','>=',5)
        //     ->delete();
        //清空数据表
        DB::table('poststatus')->truncate();
        // var_dump($num);
    }
    //使用查询构造器删数据
    public function query4(){
        //插入数据
        // DB::table('poststatus')->insert(['name'=>'审核测试','position'=>6]);
        //get查询
        // $row = DB::table('poststatus')->get();

        //first查询
        // $one = DB::table('poststatus')->first();
        // $one = DB::table('poststatus')
        //     ->orderBy('id','desc')
        //     ->first();


        //where查询
        // $row = DB::table('poststatus')
        //     ->whereRaw('id>=? and position>=?',[3,1])
        //     ->get();
        // dd($row);

        //pluck查询
        // $row = DB::table('poststatus')
        //     ->pluck('name','id');
        //     dd($row);

        //lists 查询
            // $row = DB::table('poststatus')
            // ->lists('name','id');
            // dd($row);
        

        //select查询
        // $row = DB::table('poststatus')
        //     ->select('name','id','position')
        //     ->get();
        

        //chunk
        DB::table('poststatus')->chunk(2,function($row){
            


        });
            // dd($row);

    }

    //查询构造器的聚合函数
    public function query5(){
        //count
        // $num = DB::table('poststatus')->count();
        // $num = DB::table('poststatus')->min('position');
        // $num = DB::table('poststatus')->max('position');
        // $num = DB::table('poststatus')->avg('position');
        // $num = DB::table('poststatus')->sum('position');
        // $num = DB::table('poststatus')
        //     ->whereRaw('id>=?',[3])
        //     ->sum('position');
        // var_dump($num);
    }


    public function org1(){

        //all
        // $row = Blog::all();

        //find
        // $one = Blog::find(1);

        //findOrFail
        // $one = Blog::findOrFail(9);

        //查询构造器

        // $row = Blog::get();
        // $row = Blog::first();
        // $row = Blog::select('id','name')->get();
        // $row = Blog::where('id','>=','3')->get();
        // Blog::chunk(2,function($row){
        //     var_dump($row);
        // });
        // $num = Blog::count();
        $num = Blog::max('position');
        // $num = Blog::count();
        var_dump($num);
        // dd($row);
    }

    //新增数据
    public function org2(){
        $blog = new Blog;

        //创建对象新增
        // $blog->name='审核测试1';
        // $blog->position=8;
        // $bool = $blog->save();
        // var_dump($bool);

        //批量赋值 creat
        // $blog = Blog::create(
        //         ['name'=>'测试2','position'=>10]
        //     );

        //firstOrCreat
        // $blog = Blog::firstOrCreate(['name'=>'测试2']);

        //createOrNew
        // $blog = Blog::firstOrNew(['name'=>'测试5']);
        // $bool = $blog->save();
        // dd($bool);


    }

    //orm更新操作
    public function orm3(){

        // $blog = Blog::find(12);
        // $blog->position = 12;
        // $bool = $blog->save();

        //批量更新
        $num = Blog::where('id','>',10)->update(['position'=>777]);
        var_dump($num);
    }


    //orm删除
    public function orm4(){

        //模型删除
        // $blog =Blog::find(12);
        // $bool = $blog->delete();
        
        //主键删除
        // $num = Blog::destroy(11);
        // $num = Blog::destroy(10,9);


        //条件删除
        // $num = Blog::where('position','=',6)->delete();
        // var_dump($num);

    }

    public function blade1(){

        //渲染变量

        $name = '我是变量';
        $post = [];
        return view('Blog.blade1',['name'=>$name,'post'=>$post]);
    }


    //路由测试
    public function urlTest(){
        return 'urltest';
    }
}



 ?>