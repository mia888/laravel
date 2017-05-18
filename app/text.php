<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Text extends model
{
    //指定表名
    protected $table = 'text';
    //制定主键
    protected $primayKey ='id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'content', 'tid','status','create_at','update_at'
    ];
    
    /**
     * 设置时间戳
     */
    protected function getDateFormat(){
        return time();
    }

    /**
     * 不设置任何时间
     */
    protected function asDateTime($val){
        return $val;
    }
}
