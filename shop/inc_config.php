<?php
if(!defined('C_CNFLY')) {
	exit();
}

$gdb->pub_prefix2 = substr($GLOBALS['_SESSION']['login_code'], 0, 5) . '_' . str_pad($GLOBALS['_SESSION']['login_cid'], 4, '0' , STR_PAD_LEFT) . '_';


function pageHtml($datalist,$request,$url){
	echo '<ul class="am-pagination am-pagination-centered upages"><li class="upage-info">共'.$datalist['pagecount'].'页，'.$datalist['allcount'].'条记录</li><li class="cfirst am-disabled"><a href="'.$url.'?'.api_value_query($request, $datalist['pagepre']).'">&laquo;</a></li><li class="am-active"><a href="#">'.$datalist['pagenow'].'</a></li><li class="clast"><a href="'.$url.'?'.api_value_query($request, $datalist['pagenext']).'">&raquo;</a></li><li>，跳转到第 <input id="idpagego" class="am-form-field uinput" style="width:50px;height: 26px;line-height:26px;vertical-align:bottom;" onkeydown="if(event.keyCode == 13){page_do();}"> 页</li></ul>';
}

function pageJs($datalist,$request,$url){
	echo "if(".$datalist['pagenow'].">1){";
	echo '$(".upages .cfirst").removeClass("am-disabled")};';
	echo "if(";
	echo $datalist['pagecount']-$datalist['pagenow'];
	echo "<1){";
	echo '$(".upages .clast").addClass("am-disabled")};';
	echo 'function page_do() {';
	echo 'var intpage = parseInt(document.getElementById("idpagego").value);';
	echo 'if(isNaN(intpage)) {';
	echo 'alert("请输入正确的页码！");';
	echo '} else {';
	echo 'window.location = "';
	echo $url;
	echo '?';
	echo api_value_query($request);
	echo '&page="+intpage';
	echo '}}';
}
?>