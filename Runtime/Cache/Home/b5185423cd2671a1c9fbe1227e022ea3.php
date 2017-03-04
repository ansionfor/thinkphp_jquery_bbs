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
    <?php echo ($article["title"]); ?>
  </div>
  <div class="panel-body">
    <?php echo ($article["title"]); ?>
    <div class="post-time" style="margin-top:10px">作者：<a href="<?php echo U('Index/memberPub',array('mid'=>$article['member_id']));?>"><?php echo ($article["name"]); ?></a><br>发布时间：<?php echo (date("y-m-d H:i",$article["create_time"])); ?> <br><span>点击数：<?php echo ($article["click"]); ?></span>  </div>
    <div style="padding: 20px;"><?php echo ($article["content"]); ?></div>
  </div>
  <div class="panel-footer"></div>
          <div class="ylcon">


    <div id="messDivId">

      <?php if(is_array($comment)): $i = 0; $__LIST__ = $comment;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="story">
        <?php if($vo["parent_id"] == 0): ?><div class="opbtn"></div>
        <div class="m_top">
          <div class="aut_na">
            <h4><strong><?php echo ($vo["name"]); ?></strong>&nbsp;&nbsp;&nbsp;</h4>
          </div>
          
        </div>
        <p class="story_time"><?php echo (date("y-m-d H:i",$vo["create_time"])); ?></p>
        <p class="story_m"><?php echo ($vo["content"]); ?><div class="btn-group btn-group-xs edit_ri pull-right" role="group" aria-label="...">
            <button type="button" class="btn btn-default reply" data-toggle="modal" data-target="#myModal" data-replyto="<?php echo ($vo["name"]); ?>" data-aid="<?php echo ($vo["article_id"]); ?>" data-cid="<?php echo ($vo["comment_id"]); ?>"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>&nbsp;回复</button>
          </div></p>

        <?php else: ?>

        <div class="opbtn"></div>
        <div class="m_top">
          <div class="aut_na">
            <h4><strong><?php echo ($vo["name"]); ?></strong>&nbsp;&nbsp;&nbsp;</h4>
          </div>
          
        </div>
        <p class="story_time"><?php echo (date("y-m-d H:i",$vo["create_time"])); ?></p>
        <p class="story_m"><?php echo ($vo["content"]); ?><div class="btn-group btn-group-xs edit_ri pull-right" role="group" aria-label="...">
            <button type="button" class="btn btn-default reply" data-toggle="modal" data-target="#myModal" data-replyto="<?php echo ($vo["name"]); ?>" data-aid="<?php echo ($vo["article_id"]); ?>" data-cid="<?php echo ($vo["comment_id"]); ?>"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>&nbsp;回复</button>
          </div></p>
        
        <?php if(is_array($comment)): $i = 0; $__LIST__ = $comment;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo_reply): $mod = ($i % 2 );++$i; if($vo['parent_id'] == $vo_reply['comment_id']): ?><p class="story_hf"><strong><?php echo ($vo_reply["name"]); ?></strong><small>(<?php echo (date("y-m-d H:i",$vo_reply["create_time"])); ?>)</small>:<?php echo ($vo_reply["content"]); ?><div class="btn-group btn-group-xs edit_ri pull-right" role="group" aria-label="...">
            <button type="button" class="btn btn-default reply" data-toggle="modal" data-target="#myModal" data-replyto="<?php echo ($vo_reply["name"]); ?>" data-aid="<?php echo ($vo_reply["article_id"]); ?>" data-cid="<?php echo ($vo_reply["comment_id"]); ?>"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>&nbsp;回复</button>
          </div></p><?php endif; endforeach; endif; else: echo "" ;endif; endif; ?>
      </div><?php endforeach; endif; else: echo "" ;endif; ?>


    </div>
  </div>
</div>
<div class="panel panel-default send-msg"> 
      <form id="artReply" class="form-horizontal" onsubmit="return artReply();"> 
       <input type="hidden" name="aid" value="<?php echo ($article["article_id"]); ?>">
       <div class="form-group"> 
        <label for="inputEmail3" class="col-sm-2 control-label">回帖</label> 
        <div class="col-sm-10"> 
         <textarea class="form-control" rows="3" required name="content"></textarea> 
        </div> 
       </div> 
        <div class="form-group">
              <label for="exampleInputVerify" style="display:inline">验证码</label>
              <input type="text" style="display:inline;width:70%" class="form-control" id="exampleInputVerify" required name="verifyCode" placeholder="验证码">
            </div>
            <div class="form-group">
              <div style="text-align: -webkit-center;text-align:-ms-center"><img src="<?php echo U('Index/verifyCode');?>" onclick="changeCode();" class="img-responsive register-verifyCode" alt=""></div>
            </div>
       <div class="form-group"> 
        <div class="col-sm-offset-2 col-sm-10"> 
         <button type="submit" class="btn btn-default">发送</button> 
        </div> 
       </div> 
      </form> 
     </div>
	</div>
	
	
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;">
    <div class="modal-dialog" role="document">
      <form role="form" id="edit_form">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            <h4 class="modal-title" id="myModalLabel">回复<span></span></h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="content">内容</label>
              <textarea id="content" class="form-control" rows="3"></textarea>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal" id="cancel">取消</button>
            <button type="button" class="btn btn-primary" id="sub_btn">完成</button>
          </div>
        </div>
      </form>
    </div>
  </div>


<script type="text/javascript">
  function artReply () {
    $.ajax({
      url:"<?php echo U('Index/artReply');?>",
      type:'post',
      data:$('#artReply').serialize(),
      success:function(data){
        if (data == 1) {
          alert('请先登录')
          location.href="<?php echo U('Index/regLog');?>"
        }else if (data == 2) {
          alert('回复成功')
          location.href=location.href
        }else if (data == 3) {
          alert('回复失败,请重试')
          changeCode()
        }else{
          alert('验证码错误')
          changeCode()
        }
      }
    })
    return false
  }

  /**
   * 回复弹出框
   */
  
var  comment_id = ''
var  article_id = ''

  $('#myModal').on('show.bs.modal', function (e) {
          var replyTo = $(e.relatedTarget)
          var replyToName = replyTo.data('replyto')
          $(this).find('#myModalLabel span').text(replyToName)
          comment_id = replyTo.data('cid')
          article_id = replyTo.data('aid')
      });
    
    $('#sub_btn').on('click',function(){
        var content = $('#content').val();
        if (content == '') {
          alert('内容为空')
          return
        }else{
          $.ajax({
            url:"<?php echo U('Index/comReply');?>",
            type:'post',
            data:{
              'cid':comment_id,
              'aid':article_id,
              'content':content
            },
            success:function(data){
              if (data == 1) {
                alert('请先登录')
                location.href="<?php echo U('Index/regLog');?>"
              }else if(data == 2){
                alert('回复成功')
                location.href=location.href
              }else{
                alert('回复失败，请重试')
              }
            }
          })
        }
        $('#myModal').modal('hide');
    });

    $('#cancel').on('click', function(){
      $('#name').val('');
      $('#content').val('')
    })
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