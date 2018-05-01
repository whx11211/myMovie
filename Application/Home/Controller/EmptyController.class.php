<?php 
namespace Home\Controller;
use Think\Controller;
//C('URL_PARAMS_BIND_TYPE',1);
var_dump(C('ACTION_BIND_CLASS'));
class EmptyController extends Controller{
	 public function run(){
        echo '执行',CONTROLLER_NAME,'控制器的',ACTION_NAME,'操作';
    }
    public function index($city='empty'){
        echo 'Now you are in ',$city;
    } 
    public function _empty($city){
    	$this->city($city);
    }

    protected function city($city){
    	echo 'Now you are in ',$city;
    }
   

}

 ?>