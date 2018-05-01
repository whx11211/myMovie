<?php
namespace Home\Controller;
use Think\Controller;
//C('SHOW_PAGE_TRACE',true);
$username=I('session.username');
    if($username==""){
    redirect(URL_ROOT_PATH.'index.php/home/User/login',0,'请先登录，页面跳转中...');
}

class PostController extends Controller {
    public function index($postid){
        $this->assign('username',I('session.username'));
        $Post=M('post');
        $c['postid']=$postid;
        $post=$Post->where($c)->select();
        if(!$post){
            $this->success('您访问的帖子不存在，返回首页中...',URL_ROOT_PATH.'index.php/home/',2);
        }
        $post[0]['posttime']=date("Y-m-d H:i",$post[0]['posttime']);
        $this->assign('post',$post[0]);

        $Repost=M('repost');
        $w['postid']=$postid;
        $repost=$Repost->where($w)->select();
        $this->assign('repost',$repost);

        //echo strip_tags($post[0]['postdesc']);
        //exit;
        //print_r($repost);
        $this->display();
    }       
        
    public function add(){
        $this->assign('username',I('session.username'));
        $this->display();
    }
    public function qq(){
            $this->display();
    }
    public function addact(){
        $data=I('post.','','stripslashes');
        $Post=D('post');
        $data['userid']=I('session.userid');
        $data['username']=I('session.username');
        if (!$Post->create($data)) {
            $this->error($Post->getError(),'add',3);
            exit;
        }
        $r=$Post->add();
        if($r){
            $this->success('发布成功','../post?postid='.$r,1);
        }
    }
    public function replyact(){
        $data=I('post.','','stripslashes');
        $Repost=D('repost');
        $data['userid']=I('session.userid');
        $data['username']=I('session.username');
        if (!$Repost->create($data)) {
            $this->error($Repost->getError(),'',3);
            exit;
        }

        $r=$Repost->add();
        if($r){
            $Post=M('Post');
            $u['lastreply']=time();
            $w['postid']=$data['postid'];
            if($Post->where($w)->setinc('reply',1)&&$Post->where($w)->save($u)){
                $this->success('回复成功','../post?postid='.$data['postid'],1);
            }else{
                $Repost->delete($r);
                $this->error('回复失败','',3);
            }
            
        }
    }
}