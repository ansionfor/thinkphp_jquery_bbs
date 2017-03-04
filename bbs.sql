-- phpMyAdmin SQL Dump
-- version 2.9.2
-- http://www.phpmyadmin.net
-- 
-- 主机: hkmysql18.zzidc.ha.cn:3306
-- 生成日期: 2017 年 03 月 04 日 01:33
-- 服务器版本: 5.5.54
-- PHP 版本: 5.2.17
-- 
-- 数据库: `english`
-- 

-- --------------------------------------------------------

-- 
-- 表的结构 `bbs_admin`
-- 

CREATE TABLE `bbs_admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '管理员id',
  `name` varchar(20) NOT NULL DEFAULT '0' COMMENT '登录名',
  `pwd` varchar(256) NOT NULL DEFAULT '0' COMMENT '登录密码',
  `salt` varchar(20) NOT NULL DEFAULT 'sdEF4gsD40' COMMENT 'salt值',
  `last_time` int(11) DEFAULT '0' COMMENT '上次登录时间',
  `create_time` int(11) DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='管理员表' AUTO_INCREMENT=2 ;

-- 
-- 导出表中的数据 `bbs_admin`
-- 

INSERT INTO `bbs_admin` VALUES (1, 'admin', '2ada32abd06e8be8598f9c97a6fdbd98c80f000b70c97dc014519eb18a925e46', 'sdEF4gsD40', 55, 4545);

-- --------------------------------------------------------

-- 
-- 表的结构 `bbs_article`
-- 

CREATE TABLE `bbs_article` (
  `article_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '帖子id',
  `title` varchar(200) NOT NULL DEFAULT '0' COMMENT '帖子标题',
  `member_id` int(11) NOT NULL DEFAULT '0' COMMENT '作者id/会员id',
  `category_id` int(11) NOT NULL DEFAULT '0' COMMENT '栏目id',
  `content` text NOT NULL COMMENT '帖子内容',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '发帖时间',
  `update_time` int(11) DEFAULT '0' COMMENT '更新时间',
  `click` int(8) DEFAULT '0' COMMENT '点击数',
  `status` int(2) NOT NULL DEFAULT '1' COMMENT '状态，1为已审核，0为未审核',
  `is_delete` int(2) NOT NULL DEFAULT '0' COMMENT '是否删除，1为删除，0为否',
  PRIMARY KEY (`article_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='发帖表' AUTO_INCREMENT=62 ;

-- 
-- 导出表中的数据 `bbs_article`
-- 

INSERT INTO `bbs_article` VALUES (7, '灌水帖', 13, 5, '灌水帖', 1487603430, 0, 0, 1, 0);
INSERT INTO `bbs_article` VALUES (8, '测试文章', 12, 6, '测试文章', 1487603661, 0, 0, 1, 0);
INSERT INTO `bbs_article` VALUES (9, '测试文章', 12, 6, '测试文章', 1487603661, 0, 0, 1, 0);
INSERT INTO `bbs_article` VALUES (10, '测试文章', 12, 6, '测试文章', 1487603661, 0, 0, 1, 0);
INSERT INTO `bbs_article` VALUES (11, '测试文章', 12, 6, '测试文章', 1487603661, 0, 0, 1, 0);
INSERT INTO `bbs_article` VALUES (12, '测试文章', 12, 6, '测试文章', 1487603661, 0, 0, 1, 0);
INSERT INTO `bbs_article` VALUES (13, '测试文章', 12, 6, '测试文章', 1487603661, 0, 0, 1, 0);
INSERT INTO `bbs_article` VALUES (14, '测试文章', 12, 6, '测试文章', 1487603661, 0, 0, 1, 0);
INSERT INTO `bbs_article` VALUES (15, '测试文章', 12, 6, '测试文章', 1487603661, 0, 0, 1, 0);
INSERT INTO `bbs_article` VALUES (16, '测试文章', 12, 6, '测试文章', 1487603661, 0, 0, 1, 0);
INSERT INTO `bbs_article` VALUES (17, '测试文章', 12, 6, '测试文章', 1487603661, 0, 0, 1, 0);
INSERT INTO `bbs_article` VALUES (18, '测试文章', 12, 6, '测试文章', 1487603661, 0, 0, 1, 0);
INSERT INTO `bbs_article` VALUES (19, '测试文章', 12, 6, '测试文章', 1487603661, 0, 0, 1, 0);
INSERT INTO `bbs_article` VALUES (20, '测试文章', 12, 6, '测试文章', 1487603661, 0, 0, 1, 0);
INSERT INTO `bbs_article` VALUES (21, '测试文章', 13, 6, '测试文章', 1487603661, 0, 0, 1, 0);
INSERT INTO `bbs_article` VALUES (22, '测试文章', 13, 6, '测试文章', 1487603661, 0, 0, 1, 0);
INSERT INTO `bbs_article` VALUES (23, '测试文章', 12, 6, '测试文章', 1487603661, 0, 0, 1, 0);
INSERT INTO `bbs_article` VALUES (24, '测试文章', 12, 6, '测试文章', 1487603661, 0, 0, 1, 0);
INSERT INTO `bbs_article` VALUES (25, '测试文章', 12, 6, '测试文章', 1487603661, 0, 0, 1, 0);
INSERT INTO `bbs_article` VALUES (26, '测试文章', 12, 6, '测试文章', 1487603661, 0, 0, 1, 0);
INSERT INTO `bbs_article` VALUES (27, '测试文章', 12, 6, '测试文章', 1487603661, 0, 0, 1, 0);
INSERT INTO `bbs_article` VALUES (28, '测试文章', 12, 6, '测试文章', 1487603661, 0, 0, 1, 0);
INSERT INTO `bbs_article` VALUES (29, '测试文章', 12, 6, '测试文章', 1487603661, 0, 0, 1, 0);
INSERT INTO `bbs_article` VALUES (30, '测试文章', 12, 6, '测试文章', 1487603661, 0, 0, 1, 0);
INSERT INTO `bbs_article` VALUES (31, '测试文章', 12, 6, '测试文章', 1487603661, 0, 0, 1, 0);
INSERT INTO `bbs_article` VALUES (32, '测试文章', 12, 6, '测试文章', 1487603661, 0, 0, 1, 0);
INSERT INTO `bbs_article` VALUES (33, '测试文章', 12, 6, '测试文章', 1487603661, 0, 0, 1, 0);
INSERT INTO `bbs_article` VALUES (34, '测试文章', 13, 6, '测试文章', 1487603661, 0, 0, 1, 0);
INSERT INTO `bbs_article` VALUES (35, '测试文章', 13, 6, '测试文章', 1487603661, 0, 0, 1, 0);
INSERT INTO `bbs_article` VALUES (36, '测试文章', 12, 5, '测试文章', 1487603661, 0, 0, 1, 0);
INSERT INTO `bbs_article` VALUES (37, '测试文章', 12, 5, '测试文章', 1487603661, 0, 0, 1, 0);
INSERT INTO `bbs_article` VALUES (38, '测试文章', 12, 5, '测试文章', 1487603661, 0, 0, 1, 0);
INSERT INTO `bbs_article` VALUES (39, '测试文章', 12, 6, '测试文章', 1487603661, 0, 0, 1, 0);
INSERT INTO `bbs_article` VALUES (40, '测试文章', 12, 5, '测试文章', 1487603661, 0, 0, 1, 0);
INSERT INTO `bbs_article` VALUES (41, '测试文章', 12, 5, '测试文章', 1487603661, 0, 0, 1, 0);
INSERT INTO `bbs_article` VALUES (42, '测试文章', 12, 5, '测试文章', 1487603661, 0, 0, 1, 0);
INSERT INTO `bbs_article` VALUES (43, '测试文章', 12, 6, '测试文章', 1487603661, 0, 0, 1, 0);
INSERT INTO `bbs_article` VALUES (44, '测试文章', 12, 6, '测试文章', 1487603661, 0, 0, 1, 0);
INSERT INTO `bbs_article` VALUES (45, '测试文章', 12, 6, '测试文章', 1487603661, 0, 0, 1, 0);
INSERT INTO `bbs_article` VALUES (46, '测试文章', 12, 6, '测试文章', 1487603661, 0, 0, 1, 0);
INSERT INTO `bbs_article` VALUES (47, '测试文章', 13, 5, '测试文章', 1487603661, 0, 0, 1, 0);
INSERT INTO `bbs_article` VALUES (48, '测试文章', 13, 5, '测试文章', 1487603661, 0, 0, 1, 0);
INSERT INTO `bbs_article` VALUES (49, '测试文章', 12, 5, '测试文章', 1487603661, 0, 0, 1, 0);
INSERT INTO `bbs_article` VALUES (50, '测试文章', 12, 5, '测试文章', 1487603661, 0, 0, 1, 0);
INSERT INTO `bbs_article` VALUES (51, '测试文章', 12, 5, '测试文章', 1487603661, 0, 0, 1, 0);
INSERT INTO `bbs_article` VALUES (52, '测试文章', 12, 6, '测试文章', 1487603661, 0, 0, 1, 0);
INSERT INTO `bbs_article` VALUES (53, '测试文章', 12, 5, '测试文章', 1487603661, 0, 0, 1, 0);
INSERT INTO `bbs_article` VALUES (54, '测试文章', 12, 5, '测试文章', 1487603661, 0, 0, 1, 0);
INSERT INTO `bbs_article` VALUES (55, '测试文章', 12, 5, '测试文章', 1487603661, 0, 0, 1, 0);
INSERT INTO `bbs_article` VALUES (56, '测试文章', 12, 6, '测试文章', 1487603661, 0, 0, 1, 0);
INSERT INTO `bbs_article` VALUES (57, '测试文章', 12, 6, '测试文章', 1487603661, 0, 0, 1, 0);
INSERT INTO `bbs_article` VALUES (58, '测试文章', 12, 6, '测试文章', 1487603661, 0, 0, 1, 0);
INSERT INTO `bbs_article` VALUES (59, '测试文章', 12, 6, '测试文章', 1487603661, 0, 0, 1, 0);
INSERT INTO `bbs_article` VALUES (60, '测试文章', 13, 5, '测试文章', 1487603661, 0, 0, 1, 0);
INSERT INTO `bbs_article` VALUES (61, '测试文章', 13, 5, '测试文章', 1487603661, 0, 0, 1, 0);

-- --------------------------------------------------------

-- 
-- 表的结构 `bbs_category`
-- 

CREATE TABLE `bbs_category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '栏目id',
  `parent_id` int(11) NOT NULL DEFAULT '0' COMMENT '父栏目id',
  `name` varchar(50) NOT NULL DEFAULT '0' COMMENT '栏目名称',
  `title` varchar(255) NOT NULL DEFAULT '0' COMMENT '栏目标题',
  `order` int(5) NOT NULL DEFAULT '0' COMMENT '栏目排序',
  `desc` varchar(500) NOT NULL DEFAULT '0' COMMENT '栏目描述',
  `keywords` varchar(255) NOT NULL DEFAULT '0' COMMENT '栏目关键词',
  `child_num` int(5) NOT NULL DEFAULT '0' COMMENT '下级栏目数量',
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='栏目表' AUTO_INCREMENT=8 ;

-- 
-- 导出表中的数据 `bbs_category`
-- 

INSERT INTO `bbs_category` VALUES (1, 0, '任务大厅', '广航任务发布大厅', 1, '广航任务 你发发发可以在这里', '广航,广航任务,广航任 ', 2);
INSERT INTO `bbs_category` VALUES (2, 1, '需求', '广航任务发布大厅', 1, '广航任务发布大厅,你可以在这里', '广航,广航任务,广航任务发布平台', 0);
INSERT INTO `bbs_category` VALUES (3, 1, '服务', '广航任务发布大厅', 2, '广航任务发布大厅,你可以在这里', '广航,广航任务,广航任务发布平台', 0);
INSERT INTO `bbs_category` VALUES (4, 0, '娱乐杂烩', '广航任务娱乐大厅', 2, '广航任务发布大厅,你可以在这里', '广航,广航任务,广航任务发布平台', 2);
INSERT INTO `bbs_category` VALUES (5, 4, '灌水区', '广航任务发布大厅', 1, '广航任务发布大厅,你可以在这里', '广航,广航任务,广航任务发布平台', 0);
INSERT INTO `bbs_category` VALUES (6, 4, '校园嗅事', '广航任务发布大厅', 2, '广航任务发布大厅,你可以在这里', '广航,广航任务,广航任务发布平台', 0);
INSERT INTO `bbs_category` VALUES (7, 6, '校园嗅事7', '广航任务发布大厅', 2, '广航任务发布大厅,你可以在这里', '广航,广航任务,广航任务发布平台', 0);

-- --------------------------------------------------------

-- 
-- 表的结构 `bbs_comment`
-- 

CREATE TABLE `bbs_comment` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '评论id',
  `parent_id` int(11) NOT NULL DEFAULT '0' COMMENT '评论父id',
  `article_id` int(11) NOT NULL DEFAULT '0' COMMENT '对应帖子id',
  `member_id` int(11) NOT NULL DEFAULT '0' COMMENT '发布者id',
  `content` varchar(500) NOT NULL DEFAULT '0' COMMENT '评论内容',
  `agree` int(11) NOT NULL DEFAULT '0' COMMENT '赞成数',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '发布时间',
  `status` int(5) NOT NULL DEFAULT '1' COMMENT '状态，1为已审核，0为未审核',
  `is_delete` int(5) NOT NULL DEFAULT '0' COMMENT '是否删除，1为删除，0为否',
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='评论表' AUTO_INCREMENT=18 ;

-- 
-- 导出表中的数据 `bbs_comment`
-- 

INSERT INTO `bbs_comment` VALUES (11, 0, 4, 12, '123132132', 0, 1487411007, 1, 1);
INSERT INTO `bbs_comment` VALUES (12, 0, 61, 13, '回帖测试', 0, 1487604953, 1, 0);
INSERT INTO `bbs_comment` VALUES (13, 12, 61, 13, '回帖测试', 0, 1487604970, 1, 0);
INSERT INTO `bbs_comment` VALUES (14, 0, 36, 13, '回帖', 0, 1487687826, 1, 0);
INSERT INTO `bbs_comment` VALUES (15, 14, 36, 13, '1', 0, 1487687833, 1, 0);
INSERT INTO `bbs_comment` VALUES (16, 14, 36, 13, '123', 0, 1487687852, 1, 0);
INSERT INTO `bbs_comment` VALUES (17, 12, 61, 13, '111', 0, 1488198891, 1, 0);

-- --------------------------------------------------------

-- 
-- 表的结构 `bbs_config`
-- 

CREATE TABLE `bbs_config` (
  `config_id` int(11) NOT NULL DEFAULT '0' COMMENT '配置id',
  `name` varchar(225) NOT NULL COMMENT '网站名称',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '网站标题',
  `keywords` varchar(255) NOT NULL DEFAULT '0' COMMENT '网站关键词,英文逗号分隔',
  `copyright` varchar(255) NOT NULL DEFAULT '0' COMMENT '网站版权信息',
  `desc` varchar(516) NOT NULL DEFAULT '0' COMMENT '网站描述',
  `footer_text` varchar(1024) NOT NULL DEFAULT '0' COMMENT '底部声明文字',
  `friends_link` varchar(512) NOT NULL DEFAULT '0' COMMENT '友情链接',
  PRIMARY KEY (`config_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='网站设置';

-- 
-- 导出表中的数据 `bbs_config`
-- 

INSERT INTO `bbs_config` VALUES (1, '广航任务发布平台', '广航任务发布平台网站标题', '广航,任务发布平台,广航任务,广航任务发布平台', 'Copyright © 2017 广州航海学院14级计商2班', '这里是我的网站', '<h3>网站声明</h3>\r\n				<p>1、本网部分资料为网上搜集转载，均尽力标明作者和出处。对于本网刊载作品涉及版权等问题的，请作者与本网站联系，本网站核实确认后会尽快予以处理。\r\n 2、本网转载之作品，并不意味着认同该作品的观点或真实性。如其他媒体、网站或个人转载使用，请与著作权人联系，并自负法律责任。</p>', '<h3>友情链接</h3> \r\n<ul> \r\n<li><a href="">友情链接</a></li>\r\n <li><a href="">友情链接</a></li>\r\n <li><a href="">友情链接</a></li>\r\n <li><a href="">友情链接</a></li>\r\n <li><a href="">友情链接</a></li> \r\n</ul>');

-- --------------------------------------------------------

-- 
-- 表的结构 `bbs_member`
-- 

CREATE TABLE `bbs_member` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '会员id',
  `name` varchar(100) NOT NULL DEFAULT '会员' COMMENT '会员昵称',
  `email` varchar(255) NOT NULL DEFAULT '0' COMMENT '邮箱/登录账户',
  `pwd` varchar(280) NOT NULL DEFAULT '0' COMMENT '登录密码',
  `salt` varchar(50) NOT NULL DEFAULT 'sdEF4gsD40' COMMENT '盐值',
  `tel` varchar(25) NOT NULL DEFAULT '0' COMMENT '手机',
  `class` varchar(100) NOT NULL DEFAULT '0' COMMENT '班级，计商142',
  `credit` int(11) NOT NULL DEFAULT '0' COMMENT '会员积分',
  `last_time` int(11) DEFAULT NULL COMMENT '上次登录时间',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `status` int(5) NOT NULL DEFAULT '1' COMMENT '是否审核，1为已审核，0为未审核',
  `is_delete` int(5) NOT NULL DEFAULT '0' COMMENT '是否删除，1为删除，0为否',
  PRIMARY KEY (`member_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='会员表' AUTO_INCREMENT=17 ;

-- 
-- 导出表中的数据 `bbs_member`
-- 

INSERT INTO `bbs_member` VALUES (13, 'ansion', '77931774@qq.com', '6dd46924f7362fbea4e25865f9715cea8be63a096ea9d8968c649f7ff2cd77f9', 'n5r2FF4e34', '13143338720', '计商142', 0, 1488198875, 1487412218, 1, 0);


-- --------------------------------------------------------

-- 
-- 表的结构 `bbs_task`
-- 

CREATE TABLE `bbs_task` (
  `task_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '任务id',
  `member_id` int(11) NOT NULL COMMENT '任务发布者id',
  `title` varchar(255) NOT NULL DEFAULT '0' COMMENT '任务主题',
  `type` int(5) NOT NULL DEFAULT '2' COMMENT '任务类型，2为需求，3为服务',
  `content` varchar(1024) DEFAULT NULL COMMENT '任务详情内容',
  `price` varchar(20) NOT NULL DEFAULT '0' COMMENT '任务收费，单位（元），免费或者议价',
  `state` int(5) NOT NULL DEFAULT '1' COMMENT '任务状态，1为进行中，2为已完成，3为已关闭',
  `status` int(5) NOT NULL DEFAULT '1' COMMENT '审核状态，1为已审核，0为未审核',
  `click` int(8) NOT NULL DEFAULT '0' COMMENT '点击数',
  `confirm` int(11) NOT NULL DEFAULT '0' COMMENT '确认任务数',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) DEFAULT '0' COMMENT '更新时间',
  `is_delete` int(5) NOT NULL DEFAULT '0' COMMENT '是否删除，1为删除，0为否',
  PRIMARY KEY (`task_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='任务表' AUTO_INCREMENT=49 ;

-- 
-- 导出表中的数据 `bbs_task`
-- 

INSERT INTO `bbs_task` VALUES (10, 13, '网站测试', 2, '网站测试', '免费', 1, 1, 0, 0, 1487412412, 1488159624, 0);
INSERT INTO `bbs_task` VALUES (11, 13, '网站测试', 2, '网站测试', '议价', 1, 1, 0, 0, 1487603364, 0, 0);
INSERT INTO `bbs_task` VALUES (12, 13, '网站测试', 3, '网站测试', '3元', 1, 1, 0, 0, 1487603390, 1488159848, 0);
INSERT INTO `bbs_task` VALUES (13, 13, '网站测试', 2, '网站测试', '5元', 1, 1, 0, 0, 1487603875, 1487605243, 0);
INSERT INTO `bbs_task` VALUES (14, 13, '网站测试', 2, '网站测试', '5元', 2, 1, 0, 0, 1487603875, 0, 0);
INSERT INTO `bbs_task` VALUES (15, 13, '网站测试', 2, '网站测试', '5元', 2, 1, 0, 0, 1487603875, 0, 0);
INSERT INTO `bbs_task` VALUES (16, 13, '网站测试', 2, '网站测试', '5元', 2, 1, 0, 0, 1487603875, 0, 0);
INSERT INTO `bbs_task` VALUES (17, 13, '网站测试', 2, '网站测试', '5元', 3, 1, 0, 0, 1487603875, 0, 0);
INSERT INTO `bbs_task` VALUES (18, 13, '网站测试', 2, '网站测试', '5元', 3, 1, 0, 0, 1487603875, 0, 0);
INSERT INTO `bbs_task` VALUES (19, 13, '网站测试', 2, '网站测试', '5元', 3, 1, 0, 0, 1487603875, 0, 0);
INSERT INTO `bbs_task` VALUES (20, 13, '网站测试', 2, '网站测试', '5元', 1, 1, 0, 0, 1487603875, 0, 0);
INSERT INTO `bbs_task` VALUES (21, 13, '网站测试', 2, '网站测试', '5元', 1, 1, 0, 0, 1487603875, 0, 0);
INSERT INTO `bbs_task` VALUES (22, 13, '网站测试', 2, '网站测试', '5元', 1, 1, 0, 0, 1487603875, 0, 0);
INSERT INTO `bbs_task` VALUES (23, 13, '网站测试', 2, '网站测试', '5元', 1, 1, 0, 0, 1487603875, 0, 0);
INSERT INTO `bbs_task` VALUES (24, 13, '网站测试', 2, '网站测试', '5元', 1, 1, 0, 0, 1487603875, 0, 0);
INSERT INTO `bbs_task` VALUES (25, 13, '网站测试', 2, '网站测试', '5元', 1, 1, 0, 0, 1487603875, 0, 0);
INSERT INTO `bbs_task` VALUES (26, 13, '网站测试', 2, '网站测试', '5元', 1, 1, 0, 0, 1487603875, 0, 0);
INSERT INTO `bbs_task` VALUES (27, 13, '网站测试', 2, '网站测试', '5元', 1, 1, 0, 0, 1487603875, 0, 0);
INSERT INTO `bbs_task` VALUES (28, 13, '网站测试', 2, '网站测试', '5元', 1, 1, 0, 0, 1487603875, 0, 0);
INSERT INTO `bbs_task` VALUES (29, 13, '网站测试', 2, '网站测试', '5元', 1, 1, 0, 0, 1487603875, 0, 0);
INSERT INTO `bbs_task` VALUES (30, 13, '网站测试', 2, '网站测试', '5元', 1, 1, 0, 0, 1487603875, 0, 0);
INSERT INTO `bbs_task` VALUES (31, 13, '网站测试', 3, '网站测试', '5元', 2, 1, 0, 0, 1487603875, 0, 0);
INSERT INTO `bbs_task` VALUES (32, 13, '网站测试', 3, '网站测试', '5元', 2, 1, 0, 0, 1487603875, 0, 0);
INSERT INTO `bbs_task` VALUES (33, 13, '网站测试', 3, '网站测试', '5元', 2, 1, 0, 0, 1487603875, 0, 0);
INSERT INTO `bbs_task` VALUES (34, 13, '网站测试', 3, '网站测试', '5元', 3, 1, 0, 0, 1487603875, 0, 0);
INSERT INTO `bbs_task` VALUES (35, 13, '网站测试', 3, '网站测试', '5元', 3, 1, 0, 0, 1487603875, 0, 0);
INSERT INTO `bbs_task` VALUES (36, 13, '网站测试', 3, '网站测试', '5元', 3, 1, 0, 0, 1487603875, 0, 0);
INSERT INTO `bbs_task` VALUES (37, 13, '网站测试', 3, '网站测试', '5元', 1, 1, 0, 0, 1487603875, 0, 0);
INSERT INTO `bbs_task` VALUES (38, 13, '网站测试', 2, '网站测试', '5元', 1, 1, 0, 0, 1487603875, 0, 0);
INSERT INTO `bbs_task` VALUES (39, 13, '网站测试', 2, '网站测试', '5元', 1, 1, 0, 0, 1487603875, 0, 0);
INSERT INTO `bbs_task` VALUES (40, 13, '网站测试', 2, '网站测试', '5元', 1, 1, 0, 0, 1487603875, 0, 0);
INSERT INTO `bbs_task` VALUES (41, 13, '网站测试', 2, '网站测试', '5元', 1, 1, 0, 0, 1487603875, 0, 0);
INSERT INTO `bbs_task` VALUES (42, 13, '网站测试', 2, '网站测试', '5元', 1, 1, 0, 0, 1487603875, 0, 0);
INSERT INTO `bbs_task` VALUES (43, 13, '网站测试', 2, '网站测试', '5元', 1, 1, 0, 0, 1487603875, 0, 0);
INSERT INTO `bbs_task` VALUES (44, 13, '网站测试', 2, '网站测试', '5元', 1, 1, 0, 0, 1487603875, 0, 0);
INSERT INTO `bbs_task` VALUES (45, 13, '网站测试', 2, '网站测试', '5元', 1, 1, 0, 0, 1487603875, 0, 0);
INSERT INTO `bbs_task` VALUES (46, 13, '网站测试', 2, '网站测试', '5元', 1, 1, 0, 0, 1487603875, 0, 0);
INSERT INTO `bbs_task` VALUES (47, 13, '网站测试', 2, '网站测试', '5元', 1, 1, 0, 0, 1487603875, 0, 0);
INSERT INTO `bbs_task` VALUES (48, 16, '呼叫ansion', 2, '写递归', '议价', 3, 1, 0, 0, 1488159689, 1488159979, 0);

-- --------------------------------------------------------

-- 
-- 表的结构 `bbs_task_confirm`
-- 

CREATE TABLE `bbs_task_confirm` (
  `tc_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '任务确认id',
  `task_id` int(11) NOT NULL DEFAULT '0' COMMENT '任务id',
  `member_id` int(11) NOT NULL DEFAULT '0' COMMENT '确认会员id',
  `confirm_time` int(11) NOT NULL DEFAULT '0' COMMENT '确认时间',
  `state` int(5) NOT NULL DEFAULT '0' COMMENT '任务状态，1为已采纳，0为未采纳',
  PRIMARY KEY (`tc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='任务确认表' AUTO_INCREMENT=10 ;

-- 
-- 导出表中的数据 `bbs_task_confirm`
-- 

INSERT INTO `bbs_task_confirm` VALUES (4, 10, 13, 1487427274, 0);
INSERT INTO `bbs_task_confirm` VALUES (5, 13, 13, 1487605243, 0);
INSERT INTO `bbs_task_confirm` VALUES (6, 10, 16, 1488159624, 0);
INSERT INTO `bbs_task_confirm` VALUES (7, 12, 16, 1488159848, 0);
INSERT INTO `bbs_task_confirm` VALUES (8, 48, 13, 1488159914, 0);
INSERT INTO `bbs_task_confirm` VALUES (9, 48, 16, 1488159979, 0);
