@inject('request', 'Illuminate\Http\Request')
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Mia个人博客后台</title>
<link rel="stylesheet" href="{{asset('Admin/css/styledefault.css')}}" type="text/css" />
<script type="text/javascript" src="{{asset('Admin/js/plugins/jquery-1.7.min.js')}}"></script>
<script type="text/javascript" src="{{asset('Admin/js/plugins/jquery-ui-1.8.16.custom.min.js')}}"></script>
<script type="text/javascript" src="{{asset('Admin/js/plugins/jquery.cookie.js')}}"></script>
<script type="text/javascript" src="{{asset('Admin/js/plugins/jquery.uniform.min.js')}}"></script>
<script type="text/javascript" src="{{asset('Admin/js/custom/general.js')}}"></script>

@section('style')
<script type="text/javascript" src="{{asset('Admin/js/plugins/jquery.flot.min.js')}}"></script>
<script type="text/javascript" src="{{asset('Admin/js/plugins/jquery.flot.resize.min.js')}}"></script>
<script type="text/javascript" src="{{asset('Admin/js/plugins/jquery.slimscroll.js')}}"></script>
<script type="text/javascript" src="{{asset('Admin/js/custom/dashboard.js')}}"></script>
@show

<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="{{asset('Admin/js/plugins/excanvas.min.js')}}"></script><![endif]-->
<!--[if IE 9]>
    <link rel="stylesheet" media="screen" href="{{asset('Admin/css/style.ie9.css')}}"/>
<![endif]-->
<!--[if IE 8]>
    <link rel="stylesheet" media="screen" href="{{asset('Admin/css/style.ie8.css')}}"/>
<![endif]-->
<!--[if lt IE 9]>
    <script src="{{asset('Admin/js/plugins/css3-mediaqueries.js')}}"></script>
<![endif]-->
</head>

<body class="withvernav">
<div class="bodywrapper">
    <div class="topheader">
        <div class="left">
            <h1 class="logo">Ama.<span>Admin</span></h1>
            <span class="slogan">后台管理系统</span>
            
            <div class="search">
                <form action="" method="post">
                    <input type="text" name="keyword" id="keyword" value="请输入" />
                    <button class="submitbutton"></button>
                </form>
            </div><!--search-->
            
            <br clear="all" />
            
        </div><!--left-->
        
        <div class="right">
            <!--<div class="notification">
                <a class="count" href="{{asset('Admin/ajax/notifications.html')}}"><span>9</span></a>
            </div>-->
            <div class="userinfo">
                <img src="{{asset('Admin/images/thumbs/avatar.png')}}" alt="" />
                <span>管理员</span>
            </div><!--userinfo-->
            
            <div class="userinfodrop">
                <div class="avatar">
                    <a href=""><img src="{{asset('Admin/images/thumbs/avatarbig.png')}}" alt="" /></a>
                    <div class="changetheme">
                        切换主题: <br />
                        <a class="default"></a>
                        <a class="blueline"></a>
                        <a class="greenline"></a>
                        <a class="contrast"></a>
                        <a class="custombg"></a>
                    </div>
                </div><!--avatar-->
                <div class="userdata">
                    <h4>{{session('user')}}</h4>
                    <span class="email">{{session('email')}}</span>
                    <ul>
                        <li><a href="{{url('admin/user/add',['id'=>session('id')])}}">编辑资料</a></li>
                        <li><a href="accountsettings.html">账号设置</a></li>
                        <li><a href="help.html">帮助</a></li>
                        <li><a href="{{url('admin/quit')}}">退出</a></li>
                    </ul>
                </div><!--userdata-->
            </div><!--userinfodrop-->
        </div><!--right-->
    </div><!--topheader-->
    {{strpos('/',$request->getPathInfo())}}
    <div class="header">
        <ul class="headermenu">
            <li class="{{$request->getPathInfo() == '/admin/user/add' ? 'current' :''}}"><a href="{{url('admin/user/add')}}"><span class="icon icon-flatscreen"></span>用户管理</a></li>
            <li class="{{$request->getPathInfo() == '/admin/text/add' ? 'current' :''}}"><a href="{{url('admin/text/add')}}"><span class="icon icon-pencil"></span>博客管理</a></li>
            <li class="{{$request->getPathInfo() == '/admin/tag/add' ? 'current' :''}}"><a href="{{url('admin/tag/add')}}"><span class="icon icon-chart"></span>栏目管理</a></li>
        </ul>
        
       <div class="headerwidget">
            <div class="earnings">
                <div class="one_half">
                    <h4>Today's Earnings</h4>
                    <h2>$640.01</h2>
                </div><!--one_half-->
                <div class="one_half last alignright">
                    <h4>Current Rate</h4>
                    <h2>53%</h2>
                </div><!--one_half last-->
            </div><!--earnings-->
        </div><!--headerwidget-->
        
    </div><!--header-->
    
    <div class="vernav2 iconmenu">
        @section('sideBar')
        <ul>
            <li><a href="#formsub" class="editor">用户管理</a>
                <span class="arrow"></span>
                <ul id="formsub">
                    <li><a href="{{url('admin/user/add')}}">添加用户</a></li>
                    <li><a href="{{url('admin/user/list')}}">查看用户</a></li>
                </ul>
            </li>
            <!--<li><a href="filemanager.html" class="gallery">文件管理</a></li>-->
            <!-- <li><a href="elements.html" class="elements">网页元素</a></li>
            <li><a href="widgets.html" class="widgets">网页插件</a></li>
            <li><a href="calendar.html" class="calendar">日历事件</a></li>
            <li><a href="support.html" class="support">客户支持</a></li>
            <li><a href="typography.html" class="typo">文字排版</a></li>
            <li><a href="tables.html" class="tables">数据表格</a></li>
            <li><a href="buttons.html" class="buttons">按钮 &amp; 图标</a></li>
            <li><a href="#error" class="error">错误页面</a>
                <span class="arrow"></span>
                <ul id="error">
                    <li><a href="notfound.html">404错误页面</a></li>
                    <li><a href="forbidden.html">403错误页面</a></li>
                    <li><a href="internal.html">500错误页面</a></li>
                    <li><a href="offline.html">503错误页面</a></li>
                </ul>
            </li>
            <li><a href="#addons" class="addons">其他页面</a>
                <span class="arrow"></span>
                <ul id="addons">
                    <li><a href="newsfeed.html">新闻订阅</a></li>
                    <li><a href="profile.html">资料页面</a></li>
                    <li><a href="productlist.html">产品列表</a></li>
                    <li><a href="photo.html">图片视频分享</a></li>
                    <li><a href="gallery.html">相册</a></li>
                    <li><a href="invoice.html">购物车</a></li>
                </ul>
            </li> -->
        </ul>
        @show
        <a class="togglemenu"></a>
        <br /><br />
    </div><!--leftmenu-->
        
    <div class="centercontent">
    
        @section('content')

        @show
        
    </div><!-- centercontent -->
    
    
</div><!--bodywrapper-->

</body>
</html>
