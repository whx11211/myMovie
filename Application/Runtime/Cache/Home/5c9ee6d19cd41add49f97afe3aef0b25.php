<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN">
<head>
<title>我的电影论坛</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="/tp3/Public/css/reset.css" />
<link rel="stylesheet" href="/tp3/Public/css/reg.css" />
</head>
    <body>
        <div id="main">
          <img src="/tp3/Public/images/blogo.png" alt="电影论坛" />
          <h2>发现精彩电影 分享观影感受</h2>
          <div id="rl">
            <h2>
              <a  href="reg">注册</a>&nbsp
              <a class="a1">登陆</a>
            </h2>
          </div>
          <form class="fbox" action="loginact" method="post">
            <div>
              <input class="in1" name="username" value="<?php echo ($username); ?>" placeholder="用户名" type="text">
            </div>
            <div>
              <input class="in1" name="passwd" placeholder="密码（不少于 6 位）" type="password">
            </div>
            <div id="d1">
              <input type="checkbox" name="remenber" value="1" /> 记住我
            </div>
            <div >
              <button class="bt" type="submit">登 陆</button>
            </div>

          </form>
        </div>
    </body>
</html>