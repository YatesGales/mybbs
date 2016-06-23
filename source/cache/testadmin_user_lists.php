<?php defined('IN_PLAY') || exit('Access Denied');?><!DOCTYPE html><html lang="zh-CN"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, initial-scale=1"><meta name="keywords" content="<?php echo $g["template"]["keywords"];?>"><meta name="description" content="<?php echo $g["template"]["description"];?>"><title><?php echo $g["template"]["title"];?></title><base href="<?php echo $g["template"]["baseurl"];?>"><link rel="stylesheet" href="//apps.bdimg.com/libs/bootstrap/3.3.4/css/bootstrap.min.css"><?php addcss('component',0,'tool') ?><?php addcss('m',0,'tool') ?><script src="//apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js" type="text/javascript"></script><script src="//apps.bdimg.com/libs/jquery-lazyload/1.9.5/jquery.lazyload.min.js" type="text/javascript"></script><script src="//apps.bdimg.com/libs/bootstrap/3.3.4/js/bootstrap.min.js" type="text/javascript"></script><script src="//dn-cdnjsnet.qbox.me/crypto-js/3.1.2/rollups/md5.js"></script><script src="//apps.bdimg.com/libs/crypto-js/3.1.2/components/enc-base64-min.js" type="text/javascript"></script><!--[if lt IE 9]>  <script src="//apps.bdimg.com/libs/html5shiv/r29/html5.min.js"></script>  <script src="//apps.bdimg.com/libs/respond.js/1.4.2/respond.min.js"></script><![endif]--><?php addjs('p',0,'tool') ?></head><body><?php addjs('p',0,'adminloader') ?><?php addjs('inform',0,'adminloader') ?><script type="text/javascript" src='ueditor/ueditor.config.js'></script><script type="text/javascript" src='ueditor/ueditor.all.min.js'></script><style>.modal-backdrop{z-index:1}.modal{z-index:2}</style><div class="container"><?php echo $pageHeader;?><?php echo $nav;?></div><div class="container"><div class="alert_box"><style>.delSuccess:target,.saveSuccess:target{display:block}</style><div id="delSuccess" class="delSuccess alert alert-danger alert-dismissible fade in dn" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><p>删除成功</p></div><div id="saveSuccess" class="saveSuccess alert alert-success alert-dismissible fade in dn" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button><p>保存成功</p></div></div></div><div class="container subnav"><div class="col-md-12"><?php echo $subnav;?><div class="panel panel-default"><div class="panel-body"><table class="text-center table table-striped"><thead><tr><th class="text-center">UID</th><th class="text-center">用户名</th><th class="text-center">注册时间</th><th class="text-center">操作</th></tr></thead><tbody><?php foreach($list as $p){ ?><tr><td><?php echo $p["uid"];?></td><td><?php echo $p["nickname"];?></td><td class="changeToDate"><?php echo $p["ctime"];?></td><td><div class="btn-group t" role="group" aria-label="opition"><a type="button" class="btn btn-info" href="<?php echo $g["plugin"];?>/<?php echo $g["control"];?>/detail/<?php echo $p["uid"];?>">详情</a><button type="button" data-button="添加" data-title="确认添加?" data-content="<form><div class='form-inline'>覆盖到首页的推荐明星的第<select name='sid'><option selected value='1'>1</option><option value='2'>2</option><option value='3'>3</option><option value='4'>4</option></select>项内</div></form>" class="btn btn-success insav" data-action="<?php echo $g["plugin"];?>/index/add_stars/<?php echo $p["uid"];?>">推荐</button><button type="button" data-button="永久删除" data-content="删除后将不能恢复"  class="btn btn-danger indel" data-action="<?php echo $g["plugin"];?>/<?php echo $g["control"];?>/del_<?php echo $g["method"];?>/<?php echo $p["uid"];?>">删除</button></div></td></tr><?php } ?></tbody></table><div class="text-right fr"></div><nav><ul class="pagination pageset"><script>getPageSet(<?php echo $currentPage;?>,<?php echo $maxPage;?>,'href','<?php echo $g["plugin"];?>/<?php echo $g["control"];?>/lists/',(folder[5]?'/'+folder[5]:'')+(folder[6]?'/'+folder[6]:'')+(folder[7]?'/'+folder[7]:''));</script></ul></nav></div></div></div></div></body></html>