<?php if (!defined('THINK_PATH')) exit();?><html>
	<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo["goods_id"]); ?>:<?php echo ($vo["goods_name"]); ?><br/><?php endforeach; endif; else: echo "" ;endif; ?>
	<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if(($mod) == "1"): echo ($vo["goods_id"]); endif; endforeach; endif; else: echo "" ;endif; ?>
</html>