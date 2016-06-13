<?php
namespace plugin\app\control;
defined('IN_PLAY') || die('Access Denied');
class Album extends api\ajax{
    function _beginning(){
        
    }
    function _picture($aid){
        $where['aid'] = $aid;
        return $this->picture->where($where)->limit(9999)->select();
    }
    function _album($aid){
        return $this->album->find($aid);
    }
    function _get_picture(){
        return model('app:Picture');
    }

    function index($aid){
        $this->g->template['album'] = $album = $this->_album($aid);
        if(!$album)$this->error(401,'相册不存在');
        $this->g->template['pictures'] = $this->_picture($aid);
        T('Album');
    }

    function create($title){
        $this->user->_safe_login();
        $title = $data['title'] = post('title',$title);
        if(!$title)$this->error(401,'标题不允许为空');
        $data['thumb'] = 'no_album_thumb.jpg';
        $data['uid'] = $this->user->uid;
        $data['tid'] = $this->user->tid;
        $data['ctime'] = TIME_NOW;
        $aid = $this->album->data($data)->add();
        $array['aid'] = $aid;
        $this->success($array);
    }

    function delete($aid){
        $where['aid'] = $aid = post('aid',$aid);
        $album = $this->album->find($aid);
        if(!$album)$this->success(array('count'=>0));
        $this->user->_safe_right($album['uid']);
        $c = $this->album->remove($aid);
        $c2 = $this->picture->where($where)->remove();
        $this->success(array('count'=>$c2));
    }
    function upload($aid){
        $this->user->_safe_login();
        $aid = post('aid',$aid);
        $album = $this->album->find($aid);
        if(!$album)$this->error(401,'没有找到相册');
        $this->user->_safe_right($album['uid']);
        $src = control('tool:upload','picture')->parsing_one('album',1,1);
        if(!$src)$this->success(array('count'=>0));
        $data['src'] = $src['e'];
        $data['aid'] = $aid;
        $data['uid'] = $this->user->uid;
        $c = $this->picture->data($data)->add();
        $this->success(array('pid'=>$c));
    }

}




?>