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
		<div class="col-md-12">
			<div class="list-header">
				<span class="list-title"><?php echo ($category["1"]["name"]); ?><a href="<?php echo U('Index/distrib',array('id'=>2));?>" class="pull-right">更多>></a></span>
			</div>
			<div class="list-body">
				<ul>
					<?php if(is_array($need)): $i = 0; $__LIST__ = $need;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li>
					<a href="<?php echo U('Index/taskPage',array('tid'=>$vo['task_id']));?>">
					<?php switch($vo["state"]): case "1": ?><span class="list-status doing">进行中</span><?php break;?>
					<?php case "2": ?><span class="list-status done">已完成</span><?php break;?>
					<?php case "3": ?><span class="list-status closed">已关闭</span><?php break; endswitch;?>			
					<span class="price"><?php echo ($vo["price"]); ?></span><span class="list-time"><?php echo (date("H:i",$vo["create_time"])); ?></span><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="list-header">
				<span class="list-title"><?php echo ($category["2"]["name"]); ?><a href="<?php echo U('Index/distrib',array('id'=>3));?>" class="pull-right">更多>></a></span>
			</div>
			<div class="list-body">
				<ul>
				<?php if(is_array($service)): $i = 0; $__LIST__ = $service;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo U('Index/taskPage',array('tid'=>$vo['task_id']));?>">					
					<?php switch($vo["state"]): case "1": ?><span class="list-status doing">进行中</span><?php break;?>
					<?php case "2": ?><span class="list-status done">已完成</span><?php break;?>
					<?php case "3": ?><span class="list-status closed">已关闭</span><?php break; endswitch;?>
					<span class="price"><?php echo ($vo["price"]); ?></span><span class="list-time"><?php echo (date("H:i",$vo["create_time"])); ?></span><?php echo ($vo["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="list-header">
				<span class="list-title"><?php echo ($category["4"]["name"]); ?><a href="<?php echo U('Index/distrib',array('id'=>5));?>" class="pull-right">更多>></a></span>
			</div>
			<div class="list-style-a">
				<ul>
					<?php if(is_array($article_5)): $i = 0; $__LIST__ = $article_5;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><p><a href="<?php echo U('Index/articlePage',array('id'=>$vo['category_id'],'aid'=>$vo['article_id']));?>"><?php echo ($vo["title"]); ?></a><span><?php echo (date("y-m-d",$vo["create_time"])); ?></span></p></li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="list-header">
				<span class="list-title"><?php echo ($category["5"]["name"]); ?><a href="<?php echo U('Index/distrib',array('id'=>6));?>" class="pull-right">更多>></a></span>
			</div>
			<div class="list-style-a">
				<ul>
				<?php if(is_array($article_6)): $i = 0; $__LIST__ = $article_6;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><p><a href="<?php echo U('Index/articlePage',array('id'=>$vo['category_id'],'aid'=>$vo['article_id']));?>"><?php echo ($vo["title"]); ?></a><span><?php echo (date("y-m-d",$vo["create_time"])); ?></span></p></li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
		</div>
	</div>
	<hr class="drivers">
</div>

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