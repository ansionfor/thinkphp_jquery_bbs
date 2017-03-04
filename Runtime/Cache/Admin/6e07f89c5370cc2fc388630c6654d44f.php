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
			<div class="list-body columnEdit">
				<form class="form-horizontal" id="catEdit" role="form" onsubmit="return catEdit();">
          <div class="form-group">
            <label for="columnName" class="col-sm-2 control-label">栏目名称</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="name" value="<?php echo ($cat["name"]); ?>"  id="columnName" required placeholder="栏目名称">
            </div>
          </div>
          <div class="form-group">
            <label for="columnSort" class="col-sm-2 control-label">排序</label>
            <div class="col-sm-10">
              <input type="text" style="width:50px" name="order" value="<?php echo ($cat["order"]); ?>" class="form-control" required id="columnSort" placeholder="排序">
            </div>
          </div>
          <div class="form-group">
            <label for="columnTitle" class="col-sm-2 control-label">栏目标题</label>
            <div class="col-sm-10">
              <input type="text" required class="form-control" name="title" value="<?php echo ($cat["title"]); ?>" id="columnTitle" placeholder="栏目标题">
            </div>
          </div>
          <div class="form-group">
            <label for="columnKeyword" class="col-sm-2 control-label">关键词</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="keywords" value="<?php echo ($cat["keywords"]); ?>" id="columnKeyword" required placeholder="栏目关键词，使用','隔开">
            </div>
          </div>
          <div class="form-group">
            <label for="columnDesc" class="col-sm-2 control-label">描述</label>
            <div class="col-sm-10">
             <textarea id="columnDesc" required name="desc" cols="30" rows="10"><?php echo ($cat["desc"]); ?></textarea>
            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-default">修改</button>
            </div>
          </div>
        </form>
			</div>
		</div>
	</div>

	<hr class="drivers">
</div>

<script>
  function catEdit (argument) {
    $.ajax({
      url:"<?php echo U('Index/catChange',array('cid'=>$cat['category_id']));?>",
      type:'post',
      data:$("#catEdit").serialize(),
      success:function(data){
        if (data == 1) {
          alert('修改成功')
          location.href=location.href
        };
      }
    })

    return false
  }


</script>
<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>