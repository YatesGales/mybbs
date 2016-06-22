<?php
namespace plugin\app\control;
defined('IN_PLAY') || die('Access Denied');
class Team extends api\ajax{
    function _beginning(){
        
    }
    function _teams($page,$order){
        $key = $order?'tid':'fans';
        return model('team')->order(array('fans'=>'DESC'))->page($page,8)->order(array($key=>'DESC'))->select();
    }
    function _teamsCount(){
        return model('team')->get_field();
    }
    function index($page=1,$order=0){
        if($order)
        $page = floor($page)?floor($page):1;
        $this->g->template['title'] = '团队列表';
        $this->g->template['keywords'] = 'COS,炫漫';
        $this->g->template['description'] = '炫漫重视所有的的coser，尊重coser的自主意愿和需求，致力将您打造成高人气的二次元明星';
        $this->g->template['teams'] = $this->_teams($page,$order);
        $c = $this->g->template['teamsCount'] = $this->_teamsCount();
        $maxPage = $this->g->template['maxPage'] =floor(($c-1)/16)+1;
        $this->g->template['thisPage'] = $page;
        T();

    }
    
}




?>