<?php
namespace plugin\user\control;
defined('IN_PLAY') || exit('Access Denied');
class center extends \control\ajax{
    function _beginning(){
        $this->user->_safe_login();
    }
    function _get_user(){
        return control('user:base','api');
    }
    function _get_model(){
        return model('user:user_info');
    }
    function change_avatar(){
        $pic = $this->tool->_up_avatar('avatar');
        if(!$pic)$this->error(418,'没有上传照片');
        $data['avatar'] = $pic[0];
        $this->model->data($data)->save($this->user->uid);
        $this->success();
    }
    function change_name(){
        $data['name'] = post('name');
        if(!$data)$this->error(401,'参数错误');
        $this->model->data($data)->save($this->user->uid);
        $this->success();
    }
    function change_nickname(){
        $data['nickname'] = post('nickname');
        if(!$data)$this->error(401,'参数错误');
        $this->model->data($data)->save($this->user->uid);
        $this->success();
    }
    function change_sex(){
        $data['sex'] = post('sex',0,'%d');
        if(!$data)$this->error(401,'参数错误');
        $this->model->data($data)->save($this->user->uid);
        $this->success();
    }
    function change_age(){
        $data['age'] = post('age',0,'%d');
        $this->model->data($data)->save($this->user->uid);
        $this->success();
    }
    function change_area(){
        $data['area'] = post('area');
        if(!$data)$this->error(401,'参数错误');
        $this->model->data($data)->save($this->user->uid);
        $this->success();
    }
    function change_marry(){
        $data['marry'] = post('marry')?1:0;
        $this->model->data($data)->save($this->user->uid);
        $this->success();
    }
    function change_child(){
        $data['child'] = post('child')?1:0;
        $this->model->data($data)->save($this->user->uid);
        $this->success();
    }
    function change_plastic(){
        $data['plastic'] = post('plastic')?1:0;
        $this->model->data($data)->save($this->user->uid);
        $this->success();
    }
    function change_email(){
        $data['email'] = post('email');
        if(!$data)$this->error(401,'参数错误');
        $this->model->data($data)->save($this->user->uid);
        $this->success();
    }
    function change_work(){
        $data['work'] = post('work');
        if(!$data)$this->error(401,'参数错误');
        $this->model->data($data)->save($this->user->uid);
        $this->success();
    }
    
    
    
    
    
    
    
    
    
    
    
    
}

?>