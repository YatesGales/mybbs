<?php
namespace plugin\testadmin\control\na;
use plugin\adminloader\control\lib\base;
defined('IN_PLAY') || exit('Access Denied');
abstract class ba extends base{
    protected function _get_nav(){
        return array(
            'index'=>'首页',
            'user'=>'用户',
            'team'=>'团队',
            'contest'=>'赛事',
            'character'=>'角色',
            'ablum'=>'相册',
            'video'=>'视频',
            'picture'=>'图片',
            'blog'=>'blog',
            'permission'=>'权限',
        );
    }
    abstract protected function _get_defaultMethod();
    function _nomethod(){
        $this->_header($this->defaultMethod);
    }
    protected function _get_name(){
        return '炫漫';
    }
    protected function _get_subname(){
        return '后台';
    }
    protected function _beginning(){
        
    }
    protected function _header($s){
        header('Location:/'.PLUGIN_NAME.'/'.CONTROL_NAME.'/'.$s);die();
    }
    function _get_userInfo(){
        return model('App:UserInfo');
    }

}