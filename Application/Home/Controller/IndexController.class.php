<?php
namespace Home\Controller;
use Think\Controller;
use Think\Log;
echo C('VIEW_PATH');
//C('SHOW_PAGE_TRACE',true);
$username=I('session.username');
if($username==""){
    redirect(URL_ROOT_PATH.'index.php/home/User/login',0,'请先登录，页面跳转中...');
}


class IndexController extends Controller {
    public function index($mo=0,$page=1){
        $this->assign('username',I('session.username'));
        $Post=D('Post');
        switch ($mo) {
            case '0':
                $mulu='最新动态';
                $count=$Post->count();
                break;
            case '1':
                $mulu='最新回复';
                $count=$Post->count();
                break;
            case '2':
                $mulu='热门帖子';
                $w['userid']=I('session.userid',0);
                $count= $Post->field('count(1) as total')->where($w)->select()[0]['total'];
                break;
            case '3':
                $mulu='我收到的回复';
                $w['post.userid']=I('session.userid',0);
                $count=$Post->field('count(1) as total')->join('repost ON post.postid = repost.postid')->where($w)->select()[0]['total'];
                break;
            case '4':
                $mulu='我回复的帖子';
                $w['repost.userid']=I('session.userid',0);
                $count=$Post->field('count(1) as total')->join('repost ON post.postid = repost.postid')->where($w)->select()[0]['total'];
                break;
            case '5':
                $mulu='我发的帖子';
                $w['userid']=I('session.userid',0);
                $count=$Post->field('count(1) as total')->where($w)->select()[0]['total'];
                break;
            default:
                $mulu='最新动态';
                $count=$Post->count();
                break;
        }
        
        $y=' 共'.$Post->getPageNum($count).'页';
        $this->assign('mulu',$mulu);
        $this->assign('y',$y);
        $fy=$Post->getPage($page,$count);
        $this->assign('fy',$fy);
        $post=$Post->getPost($page,$mo);
        $this->assign('post',$post);
        //print_r($post);
        $count='共计'.$count.'条帖子 ';
        $this->assign('count',$count);
        $this->display(index);
    }
    public function search($key='3',$page=1){
        $this->assign('username',I('session.username'));
        $mulu='搜索结果';
        $this->assign('mulu',$mulu);
        $Post=D('Post');
        $w['title']=array('like','%'.$key.'%');
        $post=$Post->where($w)->select();
        $count='共计'.count($post).'条帖子 ';
        $this->assign('count',$count);
        $y=' 共'.$Post->getSearchPageNum(count($post)).'页';

        $this->assign('y',$y);
        $fy=$Post->getSearchPage($key,$page);
        $this->assign('fy',$fy);
        $post=$Post->getSearchPost($key,$page);
        $this->assign('post',$post);
        //print_r($fy);
        $this->display(index);

    }
    public function qq($v)
    {
        echo $v;
    }

    public function _before_index(){
    	//echo 'before<br/>';
    }

    public function _after_index(){
    	//echo '<br/>after';
    }

    public function read($id){
    	echo '<br/>',$id,'<br/>';
    }

    public function hello(){
    	echo 'hello thinkphp!';
    }
}