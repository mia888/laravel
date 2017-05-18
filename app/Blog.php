<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends model{
    //指定表名
    protected $table='poststatus';
    //指定主键
    protected $primayKey='id';

    //关闭时间戳
    public $timestamps = false;

    //允许赋值的字段
    protected $fillable =['name','position'];

    //不允许赋值的字段
    protected $guarded = [];

    //修改时间戳格式
    protected function getDateFormat(){
        return time();
    }

    ///不做任何时间处理
    protected function asDateTime($val){
        return $val;
    }




}



 ?>