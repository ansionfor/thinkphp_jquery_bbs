<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>后台管理</title>
	<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="/web/Public/css/style.css">

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
      <a class="navbar-brand" href="<?php echo U('index');?>">
      后台管理
      </a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
           <li><a href="<?php echo U('category');?>">栏目管理</a></li>
          <li><a href="<?php echo U('task');?>">任务管理</a></li>
           <li><a href="<?php echo U('article');?>">文章管理</a></li>
           <li><a href="<?php echo U('member');?>">会员管理</a></li>
           <li><a href="<?php echo U('comment');?>">评论管理</a></li>
           <li><a href="<?php echo U('config');?>">网站设置</a></li>
           <li><a href="/web">网站首页</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo ($_SESSION['admin']['name']); ?> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="<?php echo U('Login/logout');?>">退出</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="list-header">
				<span class="list-title">栏目管理</span>
			</div>
			<div class="list-body">
				<div class="table-responsive">
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th>排序</th>
            <th>栏目名称</th>
            <th>操作</th>
          </tr>
        </thead>
        <tbody>

          <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["child_num"] > 0): ?><tr>
            <th scope="row"><?php echo ($vo["order"]); ?></th>
            <td><?php echo ($vo["name"]); ?></td>
            <td><a href="<?php echo U('Index/categoryEdit',array('cid'=>$vo['category_id']));?>">编辑</a></td>
          </tr>
          <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo_child): $mod = ($i % 2 );++$i; if($vo_child["parent_id"] == $vo['category_id']): ?><tr>
            <th scope="row"><?php echo ($vo_child["order"]); ?></th>
            <td>----<?php echo ($vo_child["name"]); ?></td>
            <td><a href="<?php echo U('Index/categoryEdit',array('cid'=>$vo_child['category_id']));?>">编辑</a></td>
          </tr><?php endif; endforeach; endif; else: echo "" ;endif; endif; endforeach; endif; else: echo "" ;endif; ?>

         
        </tbody>
      </table>
    </div>
			</div>
		</div>
	</div>

	<hr class="drivers">
</div>
<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>