@extends('Layouts.public')

@section('style')
    <script type="text/javascript" src="{{asset('Admin/js/custom/forms.js')}}"></script>
    <script type="text/javascript" src="{{asset('Admin/js/plugins/jquery.validate.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('Admin/js/plugins/jquery.tagsinput.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('Admin/js/plugins/charCount.js')}}"></script>
    <script type="text/javascript" src="{{asset('Admin/js/plugins/ui.spinner.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('Admin/js/plugins/chosen.jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('Admin/js/custom/forms.js')}}"></script>
@stop



@section('sideBar')
    <ul>
        <li class="current"><a href="#formsub" class="editor">用户管理</a>
            <span class="arrow"></span>
            <ul id="formsub">
                <li class="current"><a href="{{url('admin/user/add')}}">添加用户</a></li>
                <li><a href="{{url('admin/user/list')}}">查看用户</a></li>
            </ul>
        </li>
    </ul>
@stop



@section('content')
    <div class="pageheader">
        <h1 class="pagetitle">添加用户</h1>
        <span class="pagedesc"></span>
        
        <!-- <ul class="hornav">
            <li ><a href="#basicform">Basic</a></li>
            <li class="current"><a href="#validation">Validation</a></li>
        </ul> -->
    </div><!--pageheader-->

    <div id="validation" class="subcontent" >

                    <form id="form1" class="stdform" method="post" action="{{url('admin/user/saveInfo')}}">
                    <!-- 防止csrf攻击 -->
                    {{csrf_field()}}
                        <p>
                            <label>用户名：</label>
                            <span class="field"><input type="text" name="username" id="username" class="longinput" placeholder="请输入由数字字母6-12位用户名" value="{{isset($data->username)? $data->username : ''}}" /></span>
                        </p>
                        <p>
                            <label>密码：</label>
                            <span class="field"><input name="password" type="password" id="password" class="longinput" placeholder="请输入由数字字母6-12位密码" value="{{isset($data->password)? $data->password : ''}}" /></span>
                        </p>
                        <p>
                            <label>确认密码：</label>
                            <span class="field"><input name="repassword" type="password"id="repassword" class="longinput" value="{{isset($data->password)? $data->password : ''}}"/></span>
                        </p>
                        
                        <p>
                            <label>邮箱：</label>
                            <span class="field"><input type="text" name="email" id="email" class="longinput" value="{{isset($data->email)? $data->email : ''}}"/></span>
                        </p>
                        
                        <p>
                            <label>状态</label>
                            <span class="field">
                            <select name="status" id="selection">
                                <option value="">请选择</option>
                                <option value="1" {{isset($data->status)? (($data->status ==1) ? 'selected' :''): ''}}>超级管理员</option>
                                <option value="2" {{isset($data->status)? (($data->status ==2) ? 'selected' :''): ''}}>管理员</option>
                                <option value="3" {{isset($data->status)? (($data->status ==3) ? 'selected' :''): ''}}>VIP</option>
                                <option value="4" {{isset($data->status)? (($data->status ==4) ? 'selected' :''): ''}}>游客</option>
                            </select>
                            </span>
                        </p>
                        <br />
                        <input type="hidden" name="id" value="{{isset($data->id)? $data->id : ''}}">
                        <p class="stdformbutton">
                           
                            <input type="submit" class="submit radius2" value="提交">
                        </p>
                    </form>

    </div><!--subcontent-->

@stop