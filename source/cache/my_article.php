<?php defined('IN_PLAY') || exit('Access Denied');?><!DOCTYPE html><html lang="zh-CN"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, initial-scale=1"><meta name="keywords" content="<?php echo $g["template"]["keywords"];?>"><meta name="description" content="<?php echo $g["template"]["description"];?>"><title><?php echo $g["template"]["title"];?></title><base href="<?php echo $g["template"]["baseurl"];?>"><link rel="stylesheet" href="//apps.bdimg.com/libs/bootstrap/3.3.4/css/bootstrap.min.css"><?php addcss('component',0,'tool') ?><?php addcss('m',0,'tool') ?><script src="//apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js" type="text/javascript"></script><script src="//apps.bdimg.com/libs/jquery-lazyload/1.9.5/jquery.lazyload.min.js" type="text/javascript"></script><script src="//apps.bdimg.com/libs/bootstrap/3.3.4/js/bootstrap.min.js" type="text/javascript"></script><script src="//dn-cdnjsnet.qbox.me/crypto-js/3.1.2/rollups/md5.js"></script><script src="//apps.bdimg.com/libs/crypto-js/3.1.2/components/enc-base64-min.js" type="text/javascript"></script><!--[if lt IE 9]>  <script src="//apps.bdimg.com/libs/html5shiv/r29/html5.min.js"></script>  <script src="//apps.bdimg.com/libs/respond.js/1.4.2/respond.min.js"></script><![endif]--><?php addjs('p',0,'tool') ?></head><body><?php addjs('classie',0,'tool') ?><div class="jumbotron cd nos"><div class="container"><h1>Hello, Bye</h1><footer class="text-muted">Here is zcat's blog </footer></div></div><div class="container"><div class="container"><ol class="breadcrumb" style="background:none"><li><a href="">Home</a></li><li><a href="my/article/list">List</a></li><li><a href="my/article/aid/<?php echo $article["aid"];?>">Article</a></li></ol></div><div class="container"><blockquote class="blog_title"><p><strong><?php echo $article["title"];?></strong></p><footer> <?php echo $article["date"];?></footer></blockquote><div class="container"><?php foreach($article['passage'] as $words){ ?><?php echo $words;?><?php } ?></div>  </div><div class="container" style="margin-top:50px"><?php foreach($reply as $b){ ?><div class="panel "><div class="panel-body"><div class="row"><div class="col-md-2"></div><div class="col-md-1"><div class="text-center"><img src="<?php echo $b["md5"];?>?s=40" class="img-responsive center-block img-circle"></div><div class="text-center"><strong><?php echo $b["nickname"];?></strong></div><div class="text-center "><small class="text-muted toStringTime"><?php echo $b["rctime"];?></small></div></div><div class="col-md-8" style="padding-top:10px"><?php echo $b["content"];?></div><div class="col-md-1"><small class="text-muted cp" data-reply="<?php echo $b["rid"];?>" data-nickname="<?php echo $b["nickname"];?>">[回复]</small></div></div></div>  </div>  <?php } ?></div><div class="container"><form><input type="hidden" name="x"><div class="text-center"><span class="input input--hoshi"><input class="input__field input__field--hoshi" type="text" name="email" style="height:57px;line-hieght:57px"><label class="input__label input__label--hoshi input__label--hoshi-color-3"><span class="input__label-content input__label-content--hoshi">邮箱</span></label></span></div><div class="text-center"><span class="input input--hoshi"><input class="input__field input__field--hoshi" type="text" name="nickname" style="height:57px;line-hieght:57px"><label class="input__label input__label--hoshi input__label--hoshi-color-3"><span class="input__label-content input__label-content--hoshi">昵称</span></label></span></div><div class="text-center"><span class="input input--hoshi"><input class="input__field input__field--hoshi" type="text" name="website" style="height:57px;line-hieght:57px"><label class="input__label input__label--hoshi input__label--hoshi-color-3"><span class="input__label-content input__label-content--hoshi">网址</span></label></span></div><div class="form-group text-center">   <textarea id="textarea" class="form-control center-block" rows="10" name="content" style="width:500px;resize:none" placeholder="评论内容"></textarea></div></form><div class="form-group text-center">   <button class="btn btn-default t">咻(o´・ェ・｀o</button>   <script id="up">j('[data-reply]').click(function(){location.hash='textarea';j('[name=x]').val(j(this).attr('data-reply'));j('textarea').val('@'+j(this).attr('data-nickname')+': ')});j('textarea').on({change:e=>{if(!j('textarea').val().match(/^[^ ]+:/))j('[name=x]').val('')},blur:e=>location.hash='none'});j('.toStringTime').html(function(){return j(this).text().timeChange()});j('button').click(a=>j.post('_my/article/reply/'+folder[4],j('form').serializeArray(),d=>{if(d.code==200)location.reload(true);else{j('.modal-body p').html('错误'+d.code+':'+d.desc);j('.modal').modal()}}));j('#up').remove()   </script></div></div><div class="modal fade">  <div class="modal-dialog"><div class="modal-content">  <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="modal-title">错误</h4>  </div>  <div class="modal-body"><p>One fine body&hellip;</p>  </div>  <div class="modal-footer"><button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  </div></div><!-- /.modal-content -->  </div><!-- /.modal-dialog --></div><!-- /.modal --></div><div class="container" style="height:100px"></div></body></html>