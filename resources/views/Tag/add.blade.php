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
        <li class="current"><a href="#formsub" class="editor">栏目管理</a>
            <span class="arrow"></span>
            <ul id="formsub">
                <li class="current"><a href="{{url('admin/tag/add')}}">添加栏目</a></li>
                <li><a href="{{url('admin/tag/list')}}">查看栏目</a></li>
            </ul>
        </li>
    </ul>
@stop



@section('content')
    <div class="pageheader">
        <h1 class="pagetitle">添加栏目名称</h1>
        <span class="pagedesc"></span>
        
        <!-- <ul class="hornav">
            <li ><a href="#basicform">Basic</a></li>
            <li class="current"><a href="#validation">Validation</a></li>
        </ul> -->
    </div><!--pageheader-->

    <div id="validation" class="subcontent" >

                    <form id="form1" class="stdform" method="post" action="{{url('admin/tag/saveInfo')}}">
                    <!-- 防止csrf攻击 -->
                    {{csrf_field()}}
                        <p>
                            <label>栏目名称：</label>
                            <span class="field"><input type="text" name="name" id="name" class="longinput" placeholder="请输入栏目名称" value="{{isset($data->name)? $data->name : ''}}" /></span>
                        </p>
                       
                        <input type="hidden" name="id" value="{{isset($data->id)? $data->id : ''}}">
                        <p class="stdformbutton">
                            <input type="submit" class="submit radius2" value="提交">
                        </p>
                    </form>

    </div><!--subcontent-->

@stop