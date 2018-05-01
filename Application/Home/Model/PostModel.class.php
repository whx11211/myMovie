<?php 
namespace Home\Model;
use Think\Model;
class PostModel extends Model{
	protected $fields = array('postid', 'title', 'postdesc', 'posttime','userid','username','reply','lastreply','_pk'=>'postid');
	protected $_validate = array(
	    array('title','','标题名称已经存在！',0,'unique',1), 
		);
	protected $_auto = array (        
	   	array('posttime','time',1,'function'), 
	   	array('lastreply','time',2,'function'), 
	   	);
	protected $page=10;
	public function getPage($p=1,$num=0){
		$page=array();
		$num=ceil($num/$this->page);
		$uri=I('server.REQUEST_URI','','stripslashes');
		$parse=parse_url($uri);
		$param=array();
		isset($parse['query'])?parse_str($parse['query'],$param):0;
		unset($param['page']);
		$path=$parse['path'].'?';
		!empty($param)?$path=$path.$param=http_build_query($param).'&':0;
		$i=1;
		$l=$p-1;
		$r=$p+1;
		$page[]='<a class="a1" >'.$p.'</a>';
		while ($i<6&&($l>0||$r<=$num)) {
			if($l>0){
				$a='<a href="'.$path.'page='.$l.'">'.$l.'</a>';
				array_unshift($page,$a);
				$l--;
				$i++;
			}
			if($r<=$num){
				$a='<a href="'.$path.'page='.$r.'">'.$r.'</a>';
				$page[]=$a;
				$r++;
				$i++;
			}
		}
		if(($p+1)<=$num){
			$page[]='<a href="'.$path.'page='.($p+1).'">下一页</a>';
		}
		if($p-1>0){
			$a='<a href="'.$path.'page='.($p-1).'">上一页</a>';
			array_unshift($page,$a);
		}
		$a='<a href="'.$path.'page=1">首页</a>';
		array_unshift($page,$a);
		$page[]='<a href="'.$path.'page='.$num.'">尾页</a>';
		return $page;
	}
	public function getPageNum($num=0){
		return ceil($num/$this->page);
	}
	public function getPost($page=1,$mo=0){
		switch ($mo) {
			case '1':
				return $this->page($page,$this->page)->order('lastreply desc')->select();
				break;
			case '2':
				return $this->page($page,$this->page)->order('reply desc')->select();
				break;
			case '3':
				$w['post.userid']=I('session.userid',0);
				$l=array();
				$r= $this->join('repost ON post.postid = repost.postid')->page($page,$this->page)->where($w)->order('lastreply desc')->select();
				foreach ($r as $k=>$v) {
					$l[$k]['title']=$v['title'];
					$l[$k]['postid']=$v['postid'];
					$l[$k]['posttime']=$v['reposttime'];
					$l[$k]['postdesc']=$v['repostdesc'];
					$l[$k]['reply']=$v['reply'];
				}
				return $l;
				break;
			case '4':
				$w['repost.userid']=I('session.userid',0);
				$l=array();
				$r= $this->join('repost ON post.postid = repost.postid')->page($page,$this->page)->where($w)->order('lastreply desc')->select();
				foreach ($r as $k=>$v) {
					$l[$k]['title']=$v['title'];
					$l[$k]['postid']=$v['postid'];
					$l[$k]['posttime']=$v['reposttime'];
					$l[$k]['postdesc']=$v['repostdesc'];
					$l[$k]['reply']=$v['reply'];
				}
				return $l;
				break;
			case '5':
				$w['userid']=I('session.userid',0);
				return $this->page($page,$this->page)->where($w)->order('lastreply desc')->select();
				break;
			default:
				return $this->page($page,$this->page)->order('posttime desc')->select();
				break;
		}
		
	}
	public function getSearchPage($s,$p=1){
		$w['title']=array('like','%'.$s.'%');
		$num=count($this->where($w)->select());
		$page=array();
		$num=ceil($num/$this->page);
		$i=1;
		$l=$p-1;
		$r=$p+1;
		$page[]='<a class="a1" >'.$p.'</a>';
		while ($i<6&&($l>0||$r<=$num)) {
			if($l>0){
				$a='<a href="'.URL_ROOT_PATH.'index.php/home/index/search?key='.$s.'&page='.$l.'">'.$l.'</a>';
				array_unshift($page,$a);
				$l--;
				$i++;
			}
			if($r<=$num){
				$a='<a href="'.URL_ROOT_PATH.'index.php/home/index/search?key='.$s.'&page='.$r.'">'.$r.'</a>';
				$page[]=$a;
				$r++;
				$i++;
			}
		}
		if(($p+1)<=$num){
			echo $p;
			$page[]='<a href="'.URL_ROOT_PATH.'index.php/home/index/search?key='.$s.'&page='.($p+1).'">下一页</a>';
		}
		if($p-1>0){
			$a='<a href="'.URL_ROOT_PATH.'index.php/home/index/search?key='.$s.'&page='.($p-1).'">上一页</a>';
			array_unshift($page,$a);
		}
		return $page;
	}
	public function getSearchPost($s,$page=1){
		$w['title']=array('like','%'.$s.'%');
		return $this->page($page,$this->page)->order('postid desc')->where($w)->select();
	}
	public function getSearchPageNum($n=0){
		return ceil($n/$this->page);
	}
	
}



 ?>