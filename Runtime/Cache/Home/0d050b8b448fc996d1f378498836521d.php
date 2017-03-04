<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  <meta name="keywords" content="<?php echo ($web["keywords"]); ?>">
  <meta name="description" content="<?php echo ($web["desc"]); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo ($web["name"]); ?>-<?php echo ($category_meta["name"]); ?>-<?php echo ($web["title"]); ?></title>
	<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="/college1/Public/css/style.css">
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
      <a class="navbar-brand" href="/college1">
      <?php echo ($web["name"]); ?>
      </a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
       
        <li><a href="/college1">首页</a></li>

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
        <li><a href="/college1">首页</a></li>
        <?php if(is_array($crumb)): $i = 0; $__LIST__ = $crumb;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$crumb): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Index/distrib',array('id'=>$crumb['category_id']));?>"><?php echo ($crumb["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>        
      </ol>
    </div>
  </div>


<div class="row">
  <div class="panel panel-default">
  <div class="panel-heading">

          <?php switch($task["state"]): case "1": ?><span class="list-status doing">进行中</span><?php break;?>
          <?php case "2": ?><span class="list-status done">已完成</span><?php break;?>
          <?php case "3": ?><span class="list-status closed">已关闭</span><?php break; endswitch;?>

    <?php echo ($task["title"]); ?>
  </div>
  <div class="panel-body">
    <?php echo ($task["content"]); ?>
    <div class="post-info" style="margin-top:10px">作者：<a href=""><?php echo ($task["name"]); ?></a><br>发布时间：<?php echo (date("y-m-d h:s",$vo["create_time"])); ?> <br><span>接受人数：<?php echo ($task["confirm"]); ?></span></div>
  </div>
  <div class="panel-footer col-md-3">

     <div class="form-group">
              <label for="exampleInputVerify">验证码</label>
              <input type="text" class="form-control" id="exampleInputVerify" value="" placeholder="验证码">
            </div>
            <div class="form-group">
              <img src="<?php echo U('Index/verifyCode');?>" onclick="changeCode();" class="img-responsive register-verifyCode" alt="">
            </div>
            <button type="button" onclick="confirmTask();" class="btn btn-primary">接受任务</button>


  </div>
</div>
	</div>	
</div>
<script>
    function confirmTask()
    { 
        var verifyCode = $('#exampleInputVerify').val()
        if (verifyCode == '') {
            alert('请填写验证码')
            return
        }else{
            $.ajax({
              url:"<?php echo U('Index/confirmTask');?>",
              type:'get',
              data:{
                'tid':"<?php echo ($task["task_id"]); ?>",
                'verifyCode':verifyCode
              },
              success:function(data){
                console.log(data)
                  if (data == 2) {
                    alert('确认成功，请留意手机')
                  }else if (data == 1) {
                    alert('不能重复确认')
                  }else if (data == 3) {
                    alert('接受失败，请重试')
                    changeCode()
                  }else if (data == 5) {
                    alert('请完善手机与班级信息')
                    location.href="<?php echo U('Index/member');?>"
                  }else if (data == 4){
                    alert('验证码错误')
                    changeCode()
                  }else{
                    alert('请先登录')
                    location.href="<?php echo U('Index/regLog');?>"
                  }
              }
            })
        }
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
				</div>
			</div>
		</div>
	</div>
</footer>

<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="/college1/Public/js/main.js"></script>
</body>
</html>