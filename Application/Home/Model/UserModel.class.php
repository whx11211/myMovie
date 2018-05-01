<?php 
namespace Home\Model;
use Think\Model;
class UserModel extends Model{
	protected $fields = array('userid', 'username', 'email', 'regtime','passwd','laslogin','_pk'=>'userid');
	protected $_validate = array(
	    array('username','','帐号名称已经存在！',0,'unique',1), 
	    array('email','email','邮箱地址不正确！'),
	    array('repasswd','passwd','确认密码不正确',0,'confirm'), 
	    array('passwd','6,16','密码长度错误！',1,'length'),
		);
	protected $_auto = array (
	   	array('passwd','md5',3,'function') , // 对password字段在新增和编辑的时候使md5函数处理         
	   	array('regtime','time',1,'function'), // 对update_time字段在更新的时候写入当前时间戳     
	   	array('lastlogin','time',2,'function'), // 对update_time字段在更新的时候写入当前时间戳     
	   	);
}



 ?>