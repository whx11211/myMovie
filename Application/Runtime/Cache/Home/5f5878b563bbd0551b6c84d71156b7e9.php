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
            <a id="aimg" href="'.URL_ROOT_PATH.'home/"><img src="/tp3/Public/images/logo.png" alt="电影论坛" /></a>
              <form action="#">
                <div id="search">
                  <input type="text" id="inputkey" name="keyword" placeholder="搜索你感兴趣的电影"/>
                </div>
                <input type="submit" id="inputbt"  value="搜索"/>
              </form>
            <a class="la" href="#">首页</a>
            <a class="la" href="#">最新</a>
            <a class="la" href="#">最热</a>
            <a class="la" href="#">消息</a>
            <a id="abt" href="'.URL_ROOT_PATH.'home/post/add">发帖</a>

            <p class="rp">您好,<a class="ra" href=""><?php echo ($username); ?></a>,欢迎回来！<a class="ra2" href="../User/logout">退出</a></p>
          </div>
        </div>
        <div id="mid">
          <div id="left">
            <div id="title">
              <i id="icon"></i>
              最新动态
            </div>
            <div id="leftmid">
              <div class="list">
                <div class="list1">
                  <p class="count">23</p>
                </div>
                <div class="list2">
                  <a href="#" title="【投票】大家帮忙来投个票" target="_blank" class="listtitle">【投票】大家帮忙来投个票</a>
                  <a class="a3" href="">仰望星空</a>
                  <p>
                    <f class="f1">言情小说的结局大家是喜欢悲剧还是喜剧(:з」∠)_</f>
                    <f class="f2">15:23</f>
                    <a href=""><f class="f4">dsfse</f></a>
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div id="right">
            <img src="/tp3/Public/images/right.png" alt="" />
            <div class="rgroup">
              <ul>
                <li>
                  <a href="">我发布的帖子 </a>
                </li>
                <li>
                  <a href="">我回复的帖子 </a>
                </li>
                <li>
                  <a href="">收到的回复 </a>
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
                  <a  href="">论坛首页 </a>
                </li>
                <li>
                  <a  href="">热门帖子 </a>
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