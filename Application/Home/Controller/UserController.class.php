<?php
namespace Home\Controller;
use Think\Controller;
//echo C('DEFAULT_V_LAYER');
class UserController extends Controller {
    public function index(){
    	
    }

    public function reg(){
    	$this->display('reg');
    }

    public function regact(){
        $data=I('post.');
        $User=D('user');
        if (!$User->create($data)) {
            $this->error($User->getError(),'reg',3);
            exit;
        }
        $r=$User->add();
        if($r){
            $_SESSION['username']=$data['username'];
            $_SESSION['userid']=$r;
            $this->success('注册成功',URL_ROOT_PATH.'index.php/home/User/login',1);
        }
    }

    public function loginact(){
        $data=I('post.');
        $User=M('user');
        $u['username']=$data['username'];
        $u['passwd']=md5($data['passwd']);
        $us=$User->where($u)->field('userid')->select();

        if($us){
            $_SESSION['username']=$data['username'];
            $_SESSION['userid']=$us[0]['userid'];
            if($data['remenber']==1){
                setcookie('username',$data['username'],time()+3600*24*7);
            }else{
                setcookie('username','',time()-1);
            }
            $d['lastlogin']=time();
            $w['username']=$data['username'];
            $User->where($w)->save($d);
            redirect(URL_ROOT_PATH.'index.php/home/',0,'登陆成功');
        }else{
            $this->error('用户名或密码错误',URL_ROOT_PATH.'index.php/home/User/login',3);
        }
    }

    public function login(){
        $username=I('cookie.username');
        if ($username!="") {
            $this->assign('username',$username);
        }
    	$this->display('login');
    }
    public function logout(){
        unset($_SESSION['username']);
        redirect(URL_ROOT_PATH.'index.php/home/User/login',0,'退出成功');
    }
}