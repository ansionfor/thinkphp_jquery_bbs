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
  <div class="panel panel-default">
  <div class="panel-heading">
    欢迎您，<span><?php echo ($_SESSION['member']['name']); ?></span>&nbsp;!
  </div>
  <div class="panel-body">
    <div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">任务动态</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">任务列表</a></li>
    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">发帖列表</a></li>
    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">个人信息</a></li>
    <li role="presentation"><a href="#settingsb" aria-controls="settingsb" role="tab" data-toggle="tab">修改密码</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">

    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="member-task">
    <span><?php echo (date("y-m-d H:i",$vo["confirm_time"])); ?></span><br>
    <span><?php echo ($vo["class"]); ?>--</span>
    <span><a href="tel:<?php echo ($vo["tel"]); ?>"><?php echo ($vo["tel"]); ?></a></span>的用户
    <span><a href="<?php echo U('Index/memberPub',array('mid'=>$vo['member_id']));?>"><?php echo ($vo["name"]); ?></a></span>确认了你的任务
    <span><a href="<?php echo U('Index/taskPage',array('tid'=>$vo['task_id']));?>"><?php echo ($vo["title"]); ?></a></span>
    <a class="btn btn-default" href="#" onclick="return changeState(1,<?php echo ($vo['task_id']); ?>)" role="button">采纳 </a>
    <a class="btn btn-default" href="#" onclick="return changeState(2,<?php echo ($vo['task_id']); ?>)" role="button">关闭 </a>
    </div><?php endforeach; endif; else: echo "" ;endif; ?>

    <div class="text-center"><?php echo ($page); ?></div> 
    </div>

    <div role="tabpanel" class="tab-pane" id="profile">

      <?php if(is_array($list_task)): $i = 0; $__LIST__ = $list_task;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="member-task">
      <a href="<?php echo U('Index/taskPage',array('tid'=>$vo['task_id']));?>"><?php echo ($vo["title"]); ?></a>&nbsp;&nbsp;
      <span>确认人数：<?php echo ($vo["confirm"]); ?></span>&nbsp;&nbsp;
      <span>发布：<?php echo (date("H:i",$vo["create_time"])); ?></span>
      <span>&nbsp;&nbsp;更新：<?php echo (date("H:i",$vo["update_time"])); ?></span>&nbsp;&nbsp;
      <span>状态：
          <?php switch($vo["state"]): case "1": ?><span class="list-status doing">进行中</span><?php break;?>
          <?php case "2": ?><span class="list-status done">已完成</span><?php break;?>
          <?php case "3": ?><span class="list-status closed">已关闭</span><?php break; endswitch;?>
      </span>
      </div><?php endforeach; endif; else: echo "" ;endif; ?>

   <div class="text-center"><?php echo ($page_task); ?></div>
    </div>

    <div role="tabpanel" class="tab-pane" id="messages"> 

    <?php if(is_array($list_art)): $i = 0; $__LIST__ = $list_art;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="member-task">
    <a href="<?php echo U('Index/articlePage',array('aid'=>$vo['article_id']));?>"><?php echo ($vo["title"]); ?></a>&nbsp;&nbsp;
    <span>点击：<?php echo ($vo["click"]); ?></span>&nbsp;&nbsp;
    <span>发布：<?php echo (date("y-m-d",$vo["create_time"])); ?></span>
    <span>&nbsp;&nbsp;更新：<?php echo (date("y-m-d",$vo["update_time"])); ?></span>
    </div><?php endforeach; endif; else: echo "" ;endif; ?>

  <div class="text-center"><?php echo ($page_art); ?></div>

    </div>




    <div role="tabpanel" class="tab-pane" id="settings">
       <form id="changeInfo" class="verify-form" onsubmit="return changeInfo();">
            <div class="form-group">
              <label for="exampleInputName">昵称</label>
              <input type="text" name="name" class="form-control" value="<?php echo ($member["name"]); ?>" id="exampleInputName" placeholder="昵称" required>
            </div>
            <div class="form-group">
              <label for="exampleInputTel">手机</label>
              <input type="number" name="tel" class="form-control" value="<?php echo ($member["tel"]); ?>" id="exampleInputTel" placeholder="真实手机--线下联系必填" required>
            </div>
            <div class="form-group">
              <label for="exampleInputAdd">班级</label>
              <input type="text" name="class" class="form-control" value="<?php echo ($member["class"]); ?>"  id="exampleInputAdd" placeholder="计商142--确认任务必填" required>
            </div>
            <button type="submit" class="btn btn-default">更新信息</button>
        </form>
    </div>
    <div role="tabpanel" class="tab-pane" id="settingsb">
    <form id="changePwd" class="verify-form" onsubmit="return changePwd();">
            <div class="form-group">
              <label for="exampleInputEmail">邮箱</label>
              <input type="email" name="email" class="form-control" value="<?php echo ($member["email"]); ?>" id="exampleInputEmail" placeholder="邮箱" disabled required>
            </div>
            <div class="form-group">
              <label for="exampleInputPwd">密码</label>
              <input type="password" name="pwd" class="form-control" id="InputPwd1" placeholder="密码" required>
            </div>
            <div class="form-group">
              <label for="exampleInputPwd">确认密码</label>
              <input type="password" name="pwd2" class="form-control" id="InputPwd2" placeholder="确认密码" required>
            </div>
            <button type="submit" class="btn btn-default">修改</button>
        </form>
    </div>
  </div>

</div>
  </div>
  <div class="panel-footer"></div>
</div>
	</div>	
</div>

<script>
  function changeState (type,tid) {
    if (type==1) {
      var result = confirm('您是否已经与对方完成交易？')
      if (!result) {
        return
      }
    }else if (type==2) {
      var result = confirm('确定关闭吗？')
      if (!result) {
        return
      }
    }
    
    $.ajax({
      url:"<?php echo U('Index/changeState');?>",
      type:'get',
      data:{
        'type':type,
        'tid':tid
      },
      success:function(data){
        if (data == 1) {
          alert('采纳成功')
          location.href=location.href
        }else if (data == 2) {
          alert('采纳失败，请重试')
        }else if (data == 3) {
          alert('关闭成功')
          location.href=location.href
        }else if (data == 4){
          alert('关闭失败，请重试')
        }
      }
    })
    return false
  }


  function changeInfo (argument) {
    
    $.ajax({
      url:"<?php echo U('Index/changeInfo',array('type'=>1));?>",
      type:'post',
      data:$('#changeInfo').serialize(),
      success:function(data){
        if (data == 1) {
          alert('修改成功')
        }else if (data == 2) {
          alert('修改失败')
        }else if (data == 5) {
          alert('非法操作')
        };
      }
    })

    return false
  }

  function changePwd (argument) {
    if ($('#InputPwd1').val()!=$('#InputPwd2').val()) {
        alert('两次密码不匹配')
        return false
    }else{
      $.ajax({
        url:"<?php echo U('Index/changeInfo',array('type'=>2));?>",
        type:'post',
        data:$('#changePwd').serialize(),
        success:function(data){
           if (data == 3) {
            alert('修改成功')
            location.href = "<?php echo U('Index/regLog');?>"
          }else if (data == 4) {
            alert('修改失败')
          }else if (data == 5) {
            alert('非法操作')
          };
        }
      })
    }


    return false
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