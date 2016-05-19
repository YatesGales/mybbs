<?php
namespace plugin\community\control;
defined('IN_PLAY') || exit('Access Denied');
class thread extends \control\ajax{
    function _beginning(){
        
    }
    function _get_user(){
        return control('user:base','api');
    }
    function _get_model(){
        return model('community:thread');
    }
    function _get_tool(){
        return control('tool:other');
    }
    function _get_tag(){
        return model('community:community_tag');
    }
    function _get_modelView(){
        $t = model('community:thread_link_tag');
        $t->add_table($t->threadMap);
        return $t;
    }
    function _get_threadTag(){
        return model('community:thread_link_tag');
    }
    function get_tag(){
        $this->user->_safe_login();
        $m = $this->tag->field(array('tid','tname'))->order('torder')->limit(9999)->select();
        $this->success($m);
    }

    function get_theme($tid=0){
        $this->user->_safe_login();
        $limit = post('limit',6,'%d');
        $tid = post('tid',$tag,'%d');
        $line = post('last',0,'%d');
        if($tid)$where['tid'] = $tid;
        $where['reply'] = 0;
        if($line)$where['last'] = array('logic',$line,'<');
        if(!$tid)$m = $this->model->where($where)->field(array('hid','title','pic','ctime','uid','last','favo','reply_num'))->order('last','DESC')->limit($limit)->select();
        else $m = $this->modelView->where($where)->field(array('hid','title','pic','ctime','uid','last','favo','reply_num'))->order('last','DESC')->limit($limit)->select();
        foreach($m as &$v)$v['pic'] = $v['pic']?unserialize($v['pic']):array();
        $this->success($m);
    }
    function get_detail($hid=0){
        $this->user->_safe_login();
        $limit = post('limit',6,'%d');
        $hid = post('hid',$hid,'%d');
        $line = post('ctime',0,'%d');
        if(!$hid)$this->error(401,'参数错误');
        $where0['hid'] = $hid;
        $where0['reply'] = 0;
        $where['reply'] = $hid;
        if($line)$where['ctime'] = array('logic',$line,'>');
        $this->model->add_table($this->model->userMap);
        $theme = $line ? array() : $this->model->where($where0)->field(array('hid','title','content','pic','ctime','uid','nickname','avatar'))->find();
        $reply = $this->model->where($where)->field(array('hid','content','ctime','uid','nickname','avatar'))->order('ctime')->limit($limit)->select();
        if($theme)$theme['pic'] = $theme['pic']?unserialize($theme['pic']):array();
        foreach($reply as &$v)$v['pic'] = $v['pic']?unserialize($v['pic']):array();
        $m = array('theme'=>$theme,'reply'=>$reply);
        $this->success($m);
    }
    function new_theme(){
        $this->user->_safe_login();
        $data['title'] = post('title');
        $data['content'] = post('content');
        $tag = post('tag');
        if(!is_array($tag))$this->error(401,'参数错误');
        $data['pic'] = $this->tool->_up_pic('community');
        if(!$data['title'] || $data['content'])$this->error(401,'参数错误');
        $data['pic'] = serialize($data['pic']);
        $data['ctime'] = $data['last'] = time();
        $data['uid'] = $this->user->uid;
        if(!$hid = $this->model->data($data)->add())$this->error(416,'创建失败');
        foreach($tag as $t){
            $data = array('hid'=>$hid,'tid'=>$t);
            $this->threadTag->$data($data)->add(true);
        }
        $array = array('hid'=>$hid);
        $this->success($array);
    }
    function new_reply(){
        $hid = post('hid');
        $data['reply'] = $hid;
        $data['content'] = post('content');
        if(!$data['reply'] || $data['content'])$this->error(401,'参数错误');
        $data['ctime'] = time();
        $data['uid'] = $this->user->uid;
        if(!$hid = $this->model->data($data)->add())$this->error(416,'创建失败');
        $data = array();
        $data['reply_num'] = array('add',1);
        $data['last'] = time();
        $this->model->data($data)->save($hid);
        $this->success();
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}

?>