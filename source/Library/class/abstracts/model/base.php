<?php
namespace abstracts\model;
if(!defined('IN_PLAY')) {
	exit('Access Denied');
}
abstract class base{
	function __call($name,$args) {
		if(!method_exists($this,$name))
			throw new \Exception('The method "'.get_class($this).'::'.$name.'()" is not defined');	
	}
	abstract protected function zero();
	abstract protected function tablefirst();
	abstract protected function sql($sql);
	abstract protected function table($table);
	abstract protected function page($page,$limit);
	abstract protected function limit($start,$limit);
	abstract protected function where($w,$clean);
	abstract protected function select($keyfield);
	abstract protected function data($data);
	abstract protected function save($key);
	abstract protected function add($replace);
	abstract protected function find($key);
	abstract protected function getfield($key,$format);
	abstract protected function field($field);
	abstract protected function order($field,$order);
}
?>