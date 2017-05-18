<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    //指定表名
    protected $table = 'user';
    //制定主键
    protected $primayKey ='id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password','status','create_at','update_at'
    ];
    //不允许赋值的字段
    protected $guarded = ['repassword'];
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
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
