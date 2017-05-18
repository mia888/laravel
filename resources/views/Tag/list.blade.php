@extends('Layouts.public')

@section('style')
    <script type="text/javascript" src="{{asset('Admin/js/plugins/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('Admin/js/custom/tables.js')}}"></script>
    <meta name="csrf-token" content="{{csrf_token()}}">
@stop


@section('sideBar')
    <ul>
        <li class="current"><a href="#formsub" class="editor">栏目管理</a>
            <span class="arrow"></span>
            <ul id="formsub">
                <li><a href="{{url('admin/tag/add')}}">添加栏目</a></li>
                <li class="current"><a href="{{url('admin/tag/list')}}">查看栏目</a></li>
            </ul>
        </li>
    </ul>
@stop

@section('content')
    <div class="pageheader notab">
        <h1 class="pagetitle">栏目列表</h1>
        <!-- <span class="pagedesc">This is a sample description of a page</span> -->
            
    </div><!--pageheader-->
    <div id="contentwrapper" class="contentwrapper">
        <!-- <div class="contenttitle2">
            <h3>用户列表</h3>
        </div> -->
        <!--contenttitle-->
        <div class="tableoptions">
            <button class="deletebutton radius3" title="table1" url="{{url('admin/tag/delete')}}">删除</button> &nbsp;
            <select class="radius3">
                <option value="">Show All</option>
                <option value="">Rendering Engine</option>
                <option value="">Platform</option>
            </select> &nbsp;
            <button class="radius3">搜索</button>
        </div><!--tableoptions-->   
        <table cellpadding="0" cellspacing="0" border="0" id="table1" class="stdtable stdtablecb">
            <colgroup>
                <col class="con0" style="width: 4%" />
                <col class="con1" />
                <col class="con0" />
                <col class="con1" />
                <col class="con0" />
                <col class="con1" />
            </colgroup>
            <thead>
                <tr>
                    <th class="head0"><input type="checkbox" class="checkall" /></th>
                    <th class="head1">id</th>
                    <th class="head1">栏目名称</th>
                    <th class="head0">点击次数</th>
                    <th class="head0">操作</th>
                </tr>
            </thead>
           
            <tbody>
                @foreach($list as $val)
                <tr>
                    <td align="center"><input type="checkbox" ids="{{$val->id}}" /></td>
                    <td>{{$val->id}}</td>
                     <td>{{$val->name}}</td>
                     <td>{{$val->frequency}}</td>
                    <td class="center"><a href="{{url('admin/tag/add',['id'=>$val->id])}}">修改</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <br /><br />
    </div><!--contentwrapper-->
    <!-- <div class="dataTables_paginate paging_full_numbers"> -->
        <!-- <div class="dataTables_paginate paging_full_numbers"> -->
        {{$list->render()}}
        <!-- </div> -->
    <!-- </div> -->
@stop