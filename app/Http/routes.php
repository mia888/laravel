<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::group(['middleware' => ['web','admin.login'],'prefix'=>'admin','namespace'=>'Admin'], function () {
   
    Route::any('quit', 'LoginController@quit');


    //用户
    Route::get('/',['uses'=>'UserController@index']);
    Route::any('user/add/{id?}',['uses'=>'UserController@index']);
    Route::any('user/saveInfo',['uses'=>'UserController@saveInfo']);
    Route::any('user/list',['uses'=>'UserController@userlist']);
    Route::any('user/delete',['uses'=>'UserController@delete']);
    Route::any('user/edit',['uses'=>'UserController@edit']);

    //栏目
    Route::any('tag/add/{id?}',['uses'=>'TagController@index']);
    Route::any('tag/saveInfo',['uses'=>'TagController@saveInfo']);
    Route::any('tag/list',['uses'=>'TagController@taglist']);
    Route::any('tag/delete',['uses'=>'TagController@delete']);
    Route::any('tag/edit',['uses'=>'TagController@edit']);

    //文章
    Route::any('text/add/{id?}',['uses'=>'TextController@index']);
    Route::any('text/saveInfo',['uses'=>'TextController@saveInfo']);
    Route::any('text/list',['uses'=>'TextController@textlist']);
    Route::any('text/delete',['uses'=>'TextController@delete']);
    Route::any('text/edit',['uses'=>'TextController@edit']);
});

Route::group(['middleware' => ['web'],'prefix'=>'admin','namespace'=>'Admin'], function () {
    //后台管理员
    Route::any('login', 'LoginController@login');
    // Route::any('logout', 'Admin\AuthController@logout');
    // Route::any('admin/register', 'Admin\AuthController@register');

    
});
    // Route::get('/',['uses'=>'IndexController@index']);
    


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

//基础路由
Route::get('basic1',function(){
    return 'basic';
});

Route::post('basic2',function(){ 
    return 'basic2';
});

//多种请求 
Route::match(['get','post'],'multy1',function(){
    return '多种请求';
});

//所有http类型请求
Route::any('multy2',function(){
    return '多种请求2';
});

 
//路由参数

// Route::get('user/{id}',function($id){
//     return 'user-id-'.$id;

// });

// Route::post('user2/{id}',function($id){
//     return 'user2-id'.$id;
// });


Route::get('goods/{name?}',function($name=null){
    return 'goods-name-'.$name;
});

Route::get('goods2/{id}/{name}',function($id,$name){
    return 'id-'.$id.'-name-'.$name;
});

//验证参数
Route::get('doc/{name?}',function($name='hao'){
    return 'name-'.$name;
})->where('name','[A-Za-z]+');

Route::get('test/{id}/{name}',function($id,$name){
    return 'id-'.$id.'-name-'.$name;
})->where(['id'=>'[0-9]+','name'=>'[A-Za-z]+']);

//路由别名

Route::get('user3/center',['as'=>'center',function(){
    return route('center');
}]);

//路由集群
Route::group(['prefix'=>'member'],function(){
    Route::get('user3/center',['as'=>'center',function(){
        return route('center');
    }]);

    Route::get('testuser/{id}',function($id){
        return 'user-id-'.$id;

    });

});



//路由输出视图
Route::get('view',function(){
    return view('welcome');
});


//路由控制器

// Route::get('member/info','MemberController@info');

// Route::get('member/info',['uses'=>'MemberController@info']);
//别名
// Route::get('member/info',
//             [
//             'uses'=>'MemberController@info',
//             'as'=>'memberinfo'
//     ]);


//参数加验证
Route::get('member/info/{id}',['uses'=>'MemberController@info'])->where('id','[0-9]');

Route::get('blog/test1',['uses'=>'BlogController@test1']);
Route::get('blog/query1',['uses'=>'BlogController@query1']);
Route::get('blog/query2',['uses'=>'BlogController@query2']);
Route::get('blog/query3',['uses'=>'BlogController@query3']);
Route::get('blog/query4',['uses'=>'BlogController@query4']);
Route::get('blog/query5',['uses'=>'BlogController@query5']);
Route::get('blog/org1',['uses'=>'BlogController@org1']);
Route::get('blog/org2',['uses'=>'BlogController@org2']);
Route::get('blog/orm3',['uses'=>'BlogController@orm3']);
Route::get('blog/orm4',['uses'=>'BlogController@orm4']);
Route::get('blog/blade1',['uses'=>'BlogController@blade1']);
Route::get('blog/url',['as'=>'url','uses'=>'BlogController@urlTest']);





