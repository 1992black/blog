<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:98:"/data/home/bxu2359050697/htdocs/otherweb/tp-admin-master/public/../app/admin/view/login/index.html";i:1485612889;}*/ ?>

<!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title><?php echo \think\Config::get('website.name'); ?> | <?php echo lang('Login'); ?></title>
    <meta name="KeyWords" content="<?php echo \think\Config::get('website.keywords'); ?>">
    <meta name="Description" content="<?php echo \think\Config::get('website.description'); ?>">
	<link rel="stylesheet" type="text/css" href="__LIB__/bootstrap3/css/bootstrap.min.css" />

	<link rel="stylesheet" type="text/css" href="__CSS__/bootstrap-table.css" />

	<link rel="stylesheet" type="text/css" href="__LIB__/font-awesome-4.6/css/font-awesome.min.css" />

	<link rel="stylesheet" type="text/css" href="__CSS__/animate.css" />
	<link rel="stylesheet" type="text/css" href="__CSS__/style.css" />
	<script type="text/javascript" src="__LIB__/jquery-3.1.0.min.js"></script>
	<script type="text/javascript" src="__LIB__/bootstrap3/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="__JS__/jquery.validate.min.js"></script>
</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>
                <h1 class="logo-name">RED</h1>
            </div>
            <h3>Welcome to RED</h3>
            <!-- <p>Perfectly designed,Simplicity,Useful,Free.
            </p>
            <p>Login in. To see it in action.</p> -->

			<!-- <a class="right-sidebar-toggle" href="#">
                <i class="fa fa-tasks"></i>
            </a> -->
            
            <form class="m-t" id="login-form-hooks" onsubmit="return false;">
            	<div class="msgerr" style="color: #e15f63;text-align: left;"></div>
                <div class="form-group">
                    <input id="mobile" name="mobile" class="form-control" placeholder="Moblie" maxlength="11" value="13330613321" required="">
                </div>
                <div class="form-group">
                    <input id="password" name="password" type="password"  class="form-control" placeholder="Password" rangelength="[6,16]" value="123456">
                </div>

                <div class="form-group">
                    <input id="captcha" name="captcha" type="text"  class="form-control" placeholder="Captcha" required="">
                </div>

                <div class="form-group" style="float: left;">
                    <img id="captchaimg" src="<?php echo captcha_src(); ?>" alt="<?php echo lang('Captcha'); ?>" width="130" height="38" class="verify refcaptcha">
                    <span style="width: 100px;padding-left: 10px" class="refcaptcha"><?php echo lang('Click On The Image Change One'); ?></span>
                </div>

                <button id="sub-login" type="submit" class="btn btn-primary block full-width m-b"><?php echo lang('Login'); ?></button>

               <!--  <a href="#"><small>Forgot password?</small></a>
                <p class="text-muted text-center"><small>Do not have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="#">Create an account</a> -->
            </form>

            <p class="m-t"> <small>Tp-admin framework base on Bootstrap 3 &copy; 2016</small> </p>
            <p class="m-t"> <small>Thank you very much Inspinia's theme.</small> </p>
        </div>
    </div>


<script type="text/javascript">

    $(function () {
        //这个控件，验证通过执行提交
       $("#login-form-hooks").validate({
            submitHandler: function () {
                doLogin();
            }
       })

        $('.refcaptcha').on('click', function(){
            $('#captchaimg').get(0).src=($('#captchaimg').get(0).src+'?=r'+Math.random(1, 10000));
        });
    })

    function doLogin() {
    	$(function(){
    		$.post('<?php echo url("/admin/login/doLogin"); ?>', $('#login-form-hooks').serialize(), function(o){
    			if(o.code == 1) {
    				window.location.href = o.url;
    			} else {
    				$(".msgerr").html(o.msg);
    			}
                $('.refcaptcha').click();
    		}, 'json');
    	})
        return false;
    }


</script>
</body>
</html>

	
