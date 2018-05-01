<?php 
namespace Home\Event;
use Think\Controller;
class UserEvent extends Controller{
	public function login(){
	       echo 'login event';
    }    
    public function logout(){
		echo 'logout event';    
	}
}




 ?>