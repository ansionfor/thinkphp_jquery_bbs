<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  <meta name="keywords" content="<?php echo ($web["keywords"]); ?>">
  <meta name="description" content="<?php echo ($web["desc"]); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo ($web["name"]); ?>-<?php echo ($category_meta["name"]); ?>-<?php echo ($web["title"]); ?></title>
	<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="/web/Public/css/style.css">
  <script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<script>
    function changeCode()
    {
        $('img').attr('src',"<?php echo U('Index/verifyCode');?>?"+Math.random())
    }
</script>
</head>

<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/web">
      <?php echo ($web["name"]); ?>
      </a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
       
        <li><a href="/web">首页</a></li>

        <?php if(is_array($category)): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$parent): $mod = ($i % 2 );++$i; if($parent["child_num"] > 0): ?><li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo ($parent["name"]); ?> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <?php if(is_array($category)): $i = 0; $__LIST__ = $category;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$child): $mod = ($i % 2 );++$i; if($child["parent_id"] == $parent['category_id']): ?><li><a href="<?php echo U('Index/distrib',array('id'=>$child['category_id']));?>"><?php echo ($child["name"]); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
          </ul>
        </li><?php endif; endforeach; endif; else: echo "" ;endif; ?>

      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php if($_SESSION['member']== null): ?><li><a href="<?php echo U('Index/regLog');?>">注册</a></li>
        <li><a href="<?php echo U('Index/regLog');?>">登录</a></li>
        <?php else: ?>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo ($_SESSION['member']['name']); ?> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo U('Index/member');?>">个人中心</a></li>
            <li><a href="<?php echo U('Index/logout');?>">退出</a></li>
          </ul>
        </li><?php endif; ?>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


<div class="container">
  <div class="row">
    <div class="top-breadcrumb">
      <ol class="breadcrumb">
        <li><a href="/web">首页</a></li>
        <?php if(is_array($crumb)): $i = 0; $__LIST__ = $crumb;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$crumb): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Index/distrib',array('id'=>$crumb['category_id']));?>"><?php echo ($crumb["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>        
      </ol>
    </div>
  </div>


<div class="row">
      <div class="list-header">
        <span class="list-title">登录/注册</span>

      </div> 
      <div class="col-md-6">
    <div class="list-body task-list">
       <form id="logForm" onsubmit="return checkLog();">
            <div class="form-group">
              <label for="exampleInputEmail1">邮箱(登录账户)</label>
              <input type="email" name="email" class="form-control" id="logInputEmail1" required placeholder="邮箱">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">密码</label>
              <input type="password" name="pwd" class="form-control" id="logInputPassword1" required placeholder="密码">
            </div>
            <div class="form-group">
              <label for="exampleInputVerify">验证码</label>
              <input type="text" name="verifyCode" class="form-control" id="logInputVerify" required placeholder="验证码">
            </div>
            <div class="form-group">
              <img src="<?php echo U('Index/verifyCode');?>" onclick="changeCode();" class="img-responsive register-verifyCode" alt="">
            </div>
            <button type="submit" class="btn btn-default">登录</button>
        </form>
        </div>
    </div>
		<div class="col-md-6">
			
			<div class="list-body task-list">
				  <form id="regForm" onsubmit="return checkReg();">
            <div class="form-group">
              <label for="exampleInputEmail1">邮箱(登录账户)</label>
              <input type="email" name="email" class="form-control" id="regInputEmail1" required placeholder="邮箱">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">密码</label>
              <input type="password" name="pwd" class="form-control" id="regInputPassword1" required placeholder="密码">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">确认密码</label>
              <input type="password" name="pwd2" class="form-control" id="regInputPassword2" required placeholder="确认密码">
            </div>
            <div class="form-group">
              <label for="exampleInputVerify">验证码</label>
              <input type="text" name="verifyCode" class="form-control" id="regInputVerify" required placeholder="验证码">
            </div>
            <div class="form-group">
              <img src="<?php echo U('Index/verifyCode');?>" onclick="changeCode();" class="img-responsive register-verifyCode" alt="">
            </div>
            <button type="submit" class="btn btn-default">注册</button>
        </form>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
    /**
     *会员注册登录
     */
    
    function checkLog()
    {
        $.ajax({
          url:'<?php echo U("Index/login");?>',
          data:$('#logForm').serialize(),
          type:'post',
          success:function(data){
              if (data == 1) {
                  alert('登录成功！')
                  location.href='<?php echo U("Index/member");?>'
              }else if(data == 2){
                  alert('密码错误！')
              }else if(data == 3){
                alert('账户错误！')
              }else{
                changeCode()
                alert('验证码错误!')

              }

          },
          error:function(XMLHttpRequest, textStatus, errorThrown){
              console.log(XMLHttpRequest)
              console.log(textStatus)
              console.log(errorThrown)
          }
        })        
        return false
    }

    function checkReg()
    {
        if ($('#regInputPassword1').val() == $('#regInputPassword2').val()) {
             $.ajax({
                url:'<?php echo U("Index/register");?>',
                data:$('#regForm').serialize(),
                type:'post',
                success:function(data){
                    if (data == 1) {
                        alert('注册成功')
                        location.href='<?php echo U("Index/member");?>'
                    }else if(data == 2){
                        alert('账户已存在')
                    }else{
                        changeCode()
                        alert('验证码错误')
                    }
                }
              })

        }else{
            alert('两次密码不匹配')
        }
        return false;
    }



</script>
<footer>
	<div class="container footer">
		<div class="row">
			<div class="col-md-4">
				<?php echo ($web["friends_link"]); ?>
			</div>
			<div class="col-md-8">
				<?php echo ($web["footer_text"]); ?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="copyright text-center">
					<?php echo ($web["copyright"]); ?>
					<a href="/web/admin.php" style="color:black">E</a>
				</div>
			</div>
		</div>
	</div>
</footer>

<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="/web/Public/js/main.js"></script>
</body>
</html>