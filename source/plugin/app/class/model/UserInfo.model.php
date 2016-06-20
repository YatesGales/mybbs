<?php
namespace plugin\app\model;
defined('IN_PLAY') || die('Access Denied');
class UserInfo extends \model{
    protected $tableMap = array(
        'user_info'=>array(
            'uid','nickname','area','age','constel','interest','password','salt','phone','avatar','ctime','cover','tid','sign'
        ),
    );
    protected $countMap = array(
        'user_count'=>array(
            'follow','fans','_on'=>'uid'
        )
    );
    function _beginning(){

    }
    function safe_info(){
        $this->tableMap['user_info'] = array(
            'uid','nickname','area','age','constel','interest','phone','avatar','cover','tid','sign'
        );return $this;
    }
    function add_count(){
        return $this->add_table($this->countMap);
    }


}
?>