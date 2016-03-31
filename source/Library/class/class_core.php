<?php
define('IN_PLAY', true);
define('PLAY_ROOT', substr(dirname(__FILE__), 0, -20));
define('LIBRARY_ROOT', substr(dirname(__FILE__), 0, -6));
define('PLUGIN_ROOT', substr(dirname(__FILE__), 0, -13).'plugin\\');
set_exception_handler(array('core','handleException'));
set_error_handler(array('core','handleError'));
register_shutdown_function(array('core', 'handleShutdown'));
spl_autoload_register(array('core', 'autoload'));
require PLAY_ROOT.'/source/Library/function/core.php';
$_G['loadtimeset']['start']=microtime(get_as_float);
C::init();
class core
{
	private static $_tables;
	private static $_imports;
	public static function init(){
		new base\init;
	}
	public static function t($name, $type='', $folder='', $force=true){
		$name = str_replace('/','\\',$name);
		if(strpos($name, ':')){
			list($plugin) = explode(':', $name);
			$name = substr($name,strlen($plugin)+1);
		}
		$tname = ($plugin?'plugin\\'.$plugin.'\\':'') . ($type?$type.'\\':'') . ($folder?$folder.'\\':'') .$name;
		if(!isset(self::$_tables[$tname])){
			global $_G;
			
			if(self::import(($folder?$folder.'\\':'').$name,$type,$plugin,false)){
				self::$_tables[$tname] = new $tname($name);
			}elseif(!$plugin && $_G['plugin'] && self::import(($folder?$folder.'\\':'').$name,$type,$_G['plugin'],$force)){
				$uname = 'plugin\\' . $_G['plugin'] .'\\' . ($type?$type.'\\':'') . ($folder?$folder.'\\':'') .$name;
				self::$_tables[$tname] = new $uname($name);
			}else self::$_tables[$tname] = false;
		}
		return self::$_tables[$tname];
	}
	public static function m($name, $folder=''){
		return self::t($name,'model',$folder);
	}
	public static function c($name, $folder=''){
		return self::t($name,'control',$folder,false);
	}
	public static function import($class, $type= false, $plugin = false, $force = true) {
		if(strpos($class, '\\')){
			$pre = explode('\\',$class);
			$class = $pre[count($pre)-1];
			unset($pre[count($pre)-1]);
		}
		$key = ($plugin?$plugin.'_':'').($type?$type.'_':'');
		$path = ($plugin?PLUGIN_ROOT.$plugin:LIBRARY_ROOT).'\\class\\'.($type?$type.'\\':($pre?'':'class_'));
		if($pre)foreach($pre as $v){
			$key .= $v.'_';
			$path  .= $v.'\\';
		}
		$key .= $class;
		if(self::$_imports[$key])return true;
		$path .= $class.($plugin && $type?'.'.$type:'').'.php';
		if(is_file($path)) {
			include $path;
			self::$_imports[$key] = true;
			return true;
		} elseif(!$force) {
			return false;
		} else {
			throw new Exception('file lost: '.(defined('SHOW_ERROR')?$path:$key));
		}
	}
	public static function handleException($exception) {
		if(defined('SHOW_ERROR'))var_dump($exception);
		echo "handleException";
		die();
	}
	public static function handleError($errno, $errstr, $errfile, $errline) {
		if($errno) {
			switch($errno){
				case 2:
					if(stristr($errstr,'foreach'))return null;
					elseif(stristr($errstr,'mysql'))return null;
					elseif(stristr($errstr,'argument'))return null;
					//elseif(stristr($errstr,'match'))return null;
					break;
				case 8:
				//case 2:
					return null;
					break;
				default:
					break;
			}
			var_dump($errno,$errstr,basename($errfile),$errline);
			echo "handleError";
			die();
		}
	}

	public static function handleShutdown() {
		if(($error = error_get_last()) && $error['type']) {
			if(stristr($error['file'],'eval'))return null;
			if(defined('SHOW_ERROR'))var_dump($error);
			echo "handleShutdown";
			die();
		}
	}
	public static function autoload($class){
		$class = strtolower($class);
		if(strpos($class, '\\')) {
			$class_array = explode('\\', $class);
			list($folder) =$class_array;
			if($folder==='plugin'){
				list(,$plugin,$type) = $class_array;
				$class = substr($class,strlen($folder.'\\'.$plugin.'\\'.$type)+1);
			}else{
				$type = $folder;
				$class = substr($class,strlen($type)+1);
			}
		}
		self::import($class,$type,$plugin);
		return true;
	}
}

class C extends core {}

?>