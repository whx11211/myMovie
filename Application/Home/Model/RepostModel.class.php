<?php 
namespace Home\Model;
use Think\Model;
class RepostModel extends Model{
	protected $fields = array('repostid', 'repostdesc', 'reposttime','userid','username','postid','_pk'=>'repostid');
	protected $_validate = array(
		);
	protected $_auto = array (        
	   	array('reposttime','time',1,'function'), 
	   	);
}



 ?>