<?php 
namespace Home\Controller;
use Think\Controller;
use Think\Page;
use Think\Upload;
use Think\Image;
//C('URL_PARAMS_BIND_TYPE',1);
class BlogController extends Controller{
    public function read($id=0){
        $Page=new Page(2000,20);
        $a=$Page->show();
        $this->assign('a',$a);
        $this->display();
    }
    public function index(){
        $this->display('up');

    }  
    public function mo(){
        $this->display(1);
    }
    public function moo(){
        //layout('blog/1');
        $this->display(2);
    }
    public function up(){
        //$f=$_FILES['pic']['error']==0?$_FILES['pic']:null;
        //var_dump($f);
        //$m=getimagesize($f['tmp_name']);
        //var_dump($m);
        $config = array(
            'exts'          =>  array('png','jpg','gif','jpeg'), //允许上传的文件后缀
            'autoSub'       =>  true, //自动子目录保存文件
            'subName'       =>  array('date', 'Y-m-d'), //子目录创建方式，[0]-函数名，[1]-参数，多个参数使用数组
            'rootPath'      =>  'Public/', //保存根路径
            'savePath'      =>  'Data/images/', //保存路径
            'saveName'      =>  array('uniqid', ''), //上传文件命名规则，[0]-函数名，[1]-参数，多个参数使用数组
        );
        $Up=new Upload($config);
        //$f=$Up->upload($_FILES);
        $path=$f['pic']['savepath'].$f['pic']['savename'];
        print_r($f);
        //echo $Up->getError();
        //echo $path;
       
        
        //header("Content-type: image/jpeg");
        //imagejpeg($Im);

        
    } 

    public function _empty($city='Blog'){
    	$this->city($city);
    }

    protected function city($city){
    	echo 'Now you are in ',$city;
    }

    public function a($year='2013',$month='01'){
		echo 'year='.$year.'&month='.$month;
    }}

 ?>