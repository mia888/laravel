<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>登录页面</title>
<link rel="stylesheet" href="{{asset('Admin/css/styledefault.css')}}" type="text/css" />
<script type="text/javascript" src="{{asset('Admin/js/plugins/jquery-1.7.min.js')}}"></script>
<script type="text/javascript" src="{{asset('Admin/js/plugins/jquery-ui-1.8.16.custom.min.js')}}"></script>
<script type="text/javascript" src="{{asset('Admin/js/plugins/jquery.cookie.js')}}"></script>
<script type="text/javascript" src="{{asset('Admin/js/plugins/jquery.uniform.min.js')}}"></script>
<script type="text/javascript" src="{{asset('Admin/js/custom/general.js')}}"></script>
<script type="text/javascript" src="{{asset('Admin/js/custom/index.js')}}"></script>
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

<body class="loginpage">
    <div class="loginbox">
        <div class="loginboxinner">
            
            <div class="logo">
                <h1 class="logo">Ama.<span>Admin</span></h1>
                <span class="slogan">后台管理系统</span>
            </div><!--logo-->
            
            <br clear="all" /><br />
            
            <div class="nousername">
                <div class="loginmsg">请填写正确用户名或者密码</div>
            </div><!--nousername-->

            @if(session('usermsg'))
            <div class="nousername" style="display: block;">
                <div class="loginmsg">{{session('usermsg')}}</div>
            </div><!--nousername-->
            @endif

            <form id="login" action="" method="post">
                <!-- 防止csrf攻击 -->
                    {{csrf_field()}}
                <div class="username">
                    <div class="usernameinner">
                        <input type="text" name="username" id="username"/>
                    </div>
                </div>
                
                <div class="password">
                    <div class="passwordinner">
                        <input type="password" name="password" id="password" />
                    </div>
                </div>
                
                <button>登录</button>
                
                <div class="keep"><input type="checkbox" /> 记住密码</div>
            
            </form>
            
        </div><!--loginboxinner-->
    </div><!--loginbox-->


</body>
</html>
