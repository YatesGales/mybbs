<?php
defined('IN_PLAY') || exit('Access Denied');
function dintval($int, $allowarray = false){
	$ret = intval($int);
	if($int == $ret || !$allowarray && is_array($int))return $ret;
	if($allowarray && is_array($int)) {
		foreach($int as &$v)$v=dintval($v,true);
		return $int;
	}elseif($int <= 0xffffffff){
		$l = strlen($int);
		$m = substr($int, 0, 1) == '-' ? 1 : 0;
		if(($l - $m) === strspn($int,'0987654321', $m))return $int;
	}
	return $ret;
}
function template($t=true,$f=true){
	global $_G;
	if(is_bool($t)){
		$f=$t;$t=$_G['plugin'].'/'.($_G['folder']?$_G['folder'].'_':'').$_G['control'];
	}
	return template\base::load($t,$f);
	
}
function table($t,$f='',$e='',$r=true){return C::t($t,$f,$e,$r);}
function control($t=false,$f=''){
	global $_G;
	if(!$t){
		$t = $_G['plugin'].':'.$_G['control'];$f=$_G['folder'];
	}
	//var_dump($t);
	return C::c($t,$f);
}
function model($m,$f=''){return C::m($m,$f);}
function addcss($t=0,$p=0,$e=true){
	global $_G;
	if(!$t)$t=$_G['mod'];
	if(!$p)$p=$_G['plugin'];
	$r = "<link rel=\"stylesheet\" type=\"text/css\" href=\"".$_G['template']['baseurl']."source/plugin/".$p."/css/".$t.".css?".$_G['cache']['id']."\">";
	if($e)echo $r;
	return $r;
}
function addjs($t=0,$p=0,$e=true){
	global $_G;
	if(!$t)$t=$_G['mod'];
	if(!$p)$p=$_G['plugin'];
	$r = '<script src="'.$_G['template']['baseurl'].'source/plugin/'.$p.'/js/'.$t.'.js?'.$_G['cache']['id'].'" type="text/javascript"></script>';
	if($e)echo $r;
	return $r;
}
?>