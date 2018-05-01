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
              发布帖子
            </div>
            <div id="leftmid">
              <form id="f" action="addact" method="post">
                <input id="int" type="text" name="title" placeholder="请填写标题" />
                <script id="postdesc" name="postdesc" type="text/plain"></script>
                <input id="ins" type="submit" value="发布"/>
              </form>
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
    <script type="text/javascript" src="/tp3/Public/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" src="/tp3/Public/ueditor/ueditor.all.js"></script>
    <script type="text/javascript" >
        var editor=UE.getEditor('postdesc',{
                              toolbars: [[
                                  'fullscreen', 'source', '|','undo', 'redo', '|',
                                  'simpleupload', 'insertimage',  'attachment','|','emotion','link', 'unlink',  
                              ]]  ,
                              autoHeightEnabled: true,
                              autoFloatEnabled: true,
                            initialFrameWidth:640,
                            initialFrameHeight:350});
  </script>
</html>