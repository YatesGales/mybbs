<?php defined('IN_PLAY') || exit('Access Denied');?><!DOCTYPE html><html lang="zh-CN"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, initial-scale=1"><meta name="keywords" content="<?php echo $g["template"]["keywords"];?>"><meta name="description" content="<?php echo $g["template"]["description"];?>"><title><?php echo $g["template"]["title"];?></title><base href="<?php echo $g["template"]["baseurl"];?>"><link rel="stylesheet" href="//apps.bdimg.com/libs/bootstrap/3.3.4/css/bootstrap.min.css"><?php addcss('m',0,'tool') ?><script src="//apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js" type="text/javascript"></script><script src="//apps.bdimg.com/libs/jquery-lazyload/1.9.5/jquery.lazyload.min.js" type="text/javascript"></script><script src="//apps.bdimg.com/libs/bootstrap/3.3.4/js/bootstrap.min.js" type="text/javascript"></script><script src="//dn-cdnjsnet.qbox.me/crypto-js/3.1.2/rollups/md5.js"></script><script src="//apps.bdimg.com/libs/crypto-js/3.1.2/components/enc-base64-min.js" type="text/javascript"></script><!--[if lt IE 9]>      <script src="//apps.bdimg.com/libs/html5shiv/r29/html5.min.js"></script>      <script src="//apps.bdimg.com/libs/respond.js/1.4.2/respond.min.js"></script><![endif]--><?php addjs('p',0,'seanime') ?></head><body><div class="jumbotron">    <div class="container">        <h1>Hello, Bye</h1>    </div></div><div class="container">    <blockquote>        <p>Example page header</p>            <footer>                <?php echo date('Y-m-d H:i:s') ?>            </footer>            </blockquote></div><div class="container">    <div class="container">            <p><?php echo $g["template"]["cacheid"];?></p>            <p>For example, <code>&lt;section&gt;</code> should be wrapped as inline.</p>            <img src="source/plugin/my/pic/2.gif" class="img-rounded">    </div>  </div></body></html>