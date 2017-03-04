<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>后台管理</title>
	<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="/web/Public/css/style.css">
  <script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<script>
    function changeCode()
    {
        $('img').attr('src',"<?php echo U('Login/verifyCode');?>?"+Math.random())
    }

    function login()
    {
        $.ajax({
          url:"<?php echo U('Login/login');?>",
          type:'post',
          data:$('#login').serialize(),
          success:function(data){
              if (data == 1) {
                alert('登录成功')
                location.href="<?php echo U('Index/index');?>"
              }else if (data == 2) {
                alert('密码错误')
                changeCode()
              }else if (data == 3) {
                alert('用户名错误')
                changeCode()
              }else if (data == 4) {
                alert('验证码错误')
                changeCode()
              };
          }
        })
        return false
    }
</script>
</head>

<body>

<div class="container">
	<div class="row">
		<div class="col-md-5 col-sm-12 center-block">
			<div class="list-header">
				<span class="list-title">登录</span>
			</div>
			<div class="list-body">
				<form class="form-horizontal" id="login" onsubmit="return login();">
          <div class="form-group">
            <label for="inputName" class="col-sm-2 control-label">登录名</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="name" required id="inputName" placeholder="登录名">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">密码</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" name="pwd" required id="inputPassword3" placeholder="密码">
            </div>
          </div>
            <div class="form-group">
            <label for="inputVerify" class="col-sm-2 control-label">验证码</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="verifyCode" required id="inputVerify" placeholder="验证码">
            </div>
          </div>
            <div class="form-group">
            <div class="col-sm-10">
              <img src="<?php echo U('Login/verifyCode');?>" onclick="changeCode()" class="img-responsive register-verifyCode center-block" alt="">
              </div>
            </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-default">登录</button>
            </div>
          </div>
        </form>
			</div>
		</div>
	</div>

	<hr class="drivers">
</div>