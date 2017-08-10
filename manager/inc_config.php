<?php
if(!defined('C_CNFLY')) {
	exit();
}

$gdb->pub_prefix2 = substr($GLOBALS['_SESSION']['login_code'], 0, 5) . '_' . str_pad($GLOBALS['_SESSION']['login_cid'], 4, '0' , STR_PAD_LEFT) . '_';


function pageHtml($datalist,$request){
	return  '<ul class="am-pagination am-pagination-centered upages"><li class="upage-info">共'.$datalist['pagecount'].'页,'.$datalist['allcount'].'条记录</li><li class="cfirst am-disabled"><a href="worker_reward_count.php?'.api_value_query($request, $datalist['pagepre']).'">&laquo;</a></li><li class="am-active"><a href="#">'.$datalist['pagenow'].'</a></li><li class="clast"><a href="worker_reward_count.php?'.api_value_query($request, $datalist['pagenext']).'">&raquo;</a></li><li>，跳转到第 <input id="idpagego" class="am-form-field uinput" style="width:50px;height: 26px;line-height:26px;vertical-align:bottom;" onkeydown="if(event.keyCode == 13){page_do();}"> 页</li></ul>';
}

?>