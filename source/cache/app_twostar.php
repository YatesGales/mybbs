<?php defined('IN_PLAY') || exit('Access Denied');?><pre><?php foreach($g['template'] as $k=>$v){ ?><h2><?php echo $k ?></h2><p><?php var_dump($v) ?></p><?php } ?></pre>