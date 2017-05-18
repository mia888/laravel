@extends('Layouts.public')

@section('style')
    <script type="text/javascript" src="{{asset('Admin/js/custom/forms.js')}}"></script>
    <script type="text/javascript" src="{{asset('Admin/js/plugins/jquery.validate.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('Admin/js/plugins/jquery.tagsinput.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('Admin/js/plugins/charCount.js')}}"></script>
    <script type="text/javascript" src="{{asset('Admin/js/plugins/ui.spinner.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('Admin/js/plugins/chosen.jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('Admin/js/custom/forms.js')}}"></script>
    <script type="text/javascript" charset="utf-8" src="{{asset('Admin/editor/ueditor.config.js')}}"></script>
    <script type="text/javascript" charset="utf-8" src="{{asset('Admin/editor/ueditor.all.min.js')}}"> </script>
    <script type="text/javascript" charset="utf-8" src="{{asset('Admin/editor/lang/zh-cn/zh-cn.js')}}"></script>
@stop



@section('sideBar')
    <ul>
        <li class="current"><a href="#formsub" >文章管理</a>
            <span class="arrow"></span>
            <ul id="formsub">
                <li class="current"><a href="{{url('admin/text/add')}}">添加文章</a></li>
                <li><a href="{{url('admin/text/list')}}">查看文章</a></li>
            </ul>
        </li>
    </ul>
@stop



@section('content')
    <div class="pageheader">
        <h1 class="pagetitle">添加文章</h1>
        <span class="pagedesc"></span>
        
        <!-- <ul class="hornav">
            <li ><a href="#basicform">Basic</a></li>
            <li class="current"><a href="#validation">Validation</a></li>
        </ul> -->
    </div><!--pageheader-->

    <div id="validation" class="subcontent" >

                    <form id="form1" class="stdform" method="post" action="{{url('admin/text/saveInfo')}}">
                    <!-- 防止csrf攻击 -->
                    {{csrf_field()}}
                        <p>
                            <label>标题：</label>
                            <span class="field"><input type="text" name="title" class="smallinput" value="{{isset($data->title)? $data->title : ''}}" /></span>
                        </p>
                        <p>
                            <label>标签：</label>
                            <span class="field">
                            <select name="tid" id="selection">
                                @foreach($tags as $tag)
                                    <option value="{{$tag->id}}" {{isset($data->tid)? (($data->tid == $tag->id) ? 'selected' :''): ''}}>{{$tag->name}}</option>
                                @endforeach
                            </select>
                            </span>
                        </p>
                        <p>
                            <label>内容：</label>
                            <span class="field"><script id="editor" type="text/plain" name="content" style="width:800px;height:600px;">{{isset($data->content)? $data->content : ''}}</script></span>
                        </p>
                        
                        <p>
                            <label>状态</label>
                            <span class="field">
                            <select name="status" id="selection">
                                <option value="1" {{isset($data->status)? (($data->status ==1) ? 'selected' :''): ''}}>待审核</option>
                                <option value="2" {{isset($data->status)? (($data->status ==2) ? 'selected' :''): ''}}>审核成功</option>
                                <option value="3" {{isset($data->status)? (($data->status ==3) ? 'selected' :''): ''}}>审核失败</option>
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
<script type="text/javascript">
   
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('editor');
</script>
@stop


