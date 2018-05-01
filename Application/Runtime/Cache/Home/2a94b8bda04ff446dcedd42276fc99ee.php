<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN">
<head>
<title>我的电影论坛</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="/tp3/Public/css/reset.css" />
<link rel="stylesheet" href="/tp3/Public/css/index.css" />
</head>
    <body>
        <div id="alltop"> 
          <div id="top">
            <a id="aimg" href="<?php echo (URL_ROOT_PATH); ?>index.php/home/"><img src="/tp3/Public/images/logo.png" alt="电影论坛" /></a>
              <form action="<?php echo (URL_ROOT_PATH); ?>index.php/home/index/search">
                <div id="search">
                  <input type="text" id="inputkey" name="key" placeholder="搜索你感兴趣的电影"/>
                </div>
                <input type="submit" id="inputbt"  value="搜索"/>
              </form>
            <a class="la" href="<?php echo (URL_ROOT_PATH); ?>index.php/home/">首页</a>
            <a class="la" href="<?php echo (URL_ROOT_PATH); ?>index.php/home/index?mo=1">最新</a>
            <a class="la" href="<?php echo (URL_ROOT_PATH); ?>index.php/home/index?mo=2">最热</a>
            <a class="la" href="<?php echo (URL_ROOT_PATH); ?>index.php/home/index?mo=3">消息</a>
            <a id="abt" href="<?php echo (URL_ROOT_PATH); ?>index.php/home/post/add">发帖</a>

            <p class="rp">您好,<a class="ra" href="<?php echo (URL_ROOT_PATH); ?>index.php/home/index?mo=5"><?php echo ($username); ?></a>,欢迎回来！<a class="ra2" href="<?php echo (URL_ROOT_PATH); ?>index.php/home/User/logout">退出</a></p>
          </div>
        </div>
        <div id="mid">
          <div id="left">
            <div id="title">
              <i id="icon"></i>
              <?php echo ($mulu); ?>
            </div>
            <div id="leftmid">
              <?php if(empty($post)){?>
              <div id='none'><?php echo '搜索不到任何东西'; ?></div>
              <?php } ?>
              <?php if(is_array($post)): $i = 0; $__LIST__ = $post;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$p): $mod = ($i % 2 );++$i;?><div class="list">
                  <div class="list1">
                    <p class="count"><?php echo ($p['reply']); ?></p>
                  </div>
                  <div class="list2">
                    <a href="<?php echo (URL_ROOT_PATH); ?>index.php/home/post?postid=<?php echo ($p['postid']); ?>" title="<?php echo ($p['title']); ?>" target="_blank" class="listtitle"><?php echo ($p['title']); ?></a>
                    <a class="a3" href=""><?php echo ($p['username']); ?></a>
                    <p>
                      <f class="f1"><?php echo (strip_tags($p['postdesc'])); ?></f>
                      <f class="f2"><?php echo (date("m-d",$p['posttime'])); ?></f>
                    </p>
                  </div>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
              <div style="clear:both"></div>
              <div class="page">
                <?php if(is_array($fy)): $i = 0; $__LIST__ = $fy;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pp): $mod = ($i % 2 );++$i; echo ($pp); endforeach; endif; else: echo "" ;endif; ?>
                <a class="a1" style="float:right;margin-right:"><?php echo ($count); ?>   <?php echo ($y); ?></a>
              </div>
            </div>
          </div>
          <div id="right">
            <img src="/tp3/Public/images/right.png" alt="" />
            <div class="rgroup">
              <ul>
                <li>
                  <a href="<?php echo (URL_ROOT_PATH); ?>index.php/home/index?mo=5">我发布的帖子 </a>
                </li>
                <li>
                  <a href="<?php echo (URL_ROOT_PATH); ?>index.php/home/index?mo=4">我回复的帖子 </a>
                </li>
                <li>
                  <a href="<?php echo (URL_ROOT_PATH); ?>index.php/home/index?mo=3">收到的回复 </a>
                </li>
                <li>
                  <a href="">我关注的帖子</a>
                </li>
              </ul>
            </div>
            <div class="rgroup">
              <ul>
              <ul>
                <li>
                  <a  href="<?php echo (URL_ROOT_PATH); ?>index.php/home/">论坛首页 </a>
                </li>
                <li>
                  <a  href="<?php echo (URL_ROOT_PATH); ?>index.php/home/index?mo=2">热门帖子 </a>
                </li>
                <li>
                  <a  href="">话题中心 </a>
                </li>
                <li>
                  <a  href="">公共编辑中心</a>
                </li>
              </ul>
            </div>
          <img src="/tp3/Public/images/right2.png" alt="" />
        </div>
    </body>
</html>