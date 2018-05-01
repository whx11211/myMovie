<?php
namespace Home\Controller;
use Think\Log;
use Think\Controller;
use Think;


//登录接口
class IndexController extends Controller {


    //登录界面
    public function index(){
        $XSVerification = new  XSVerification();  // 加载类 XSVerification.class.php
        $data = $XSVerification->getOkPng();
        $temp = array_chunk($data['data'],20);
        $this->assign('left_pic',$temp[0]);
        $this->assign('right_pic',$temp[1]);
        $this->assign('pg_bg',$data['bg_pic']);
        $this->assign('ico_pic',$data['ico_pic']);
        $this->assign('y_point',$data['y_point']);
        session("XSVer_VAL_SUM",1);
        $this->display();
    }

    //校验
    public function XSValidation(){

        $username = I('post.if_admin_name');
        $password = I('post.if_admin_password');
        if( empty($username)  || empty($password) ) {
            exit(json_encode(array(5822,'用户名或密码错误')));
        }
        static $v_num=1;
        $ret =  XSVerification::checkData(I('post.point'),session('XSVer'));
        $v_num +=  session("XSVer_VAL_SUM");
        if( $v_num > 6 ) {
            session("XSVer_SUM",null);
            exit(json_encode(array('state'=>4603,'data'=>'验证码失效')));
        } else {
            session("XSVer_VAL_SUM",$v_num);
        }
        if( $ret['state'] == 0 ) {
            session("XSVer_VAL_SUM",0x111);
            exit(json_encode(array('state'=>0,'data'=>session('XSVer'))));
        } else {
            session("XSVer_VAL_SUM",null);
            exit(json_encode(array('state'=>603,'data'=>'错误'.$v_num)));
        }
    }

    //接收登录数据
    public function get_data()
    {
        if( session("XSVer_VAL_SUM") !== 0x111 ) {
            exit(json_encode(array(5821,'图片验证码错误')));
        }
        $username = I('post.if_admin_name');
        $password = I('post.if_admin_password');
        if( empty($username)  || empty($password) ) {
            exit(json_encode(array(5822,'用户名或密码错误')));
        }
       
    }

   
}