<?php 
namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends model{
    //指定表名
    protected $table='tag';
    //指定主键
    protected $primayKey='id';

    //关闭时间戳
    public $timestamps = false;

    // //允许赋值的字段
    protected $fillable =['name','frequency'];
    //不允许赋值的字段

}



 ?>