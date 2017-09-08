<?php
if(!defined('C_CNFLY')) {
	exit();
}

// 分页html
function pageHtml($datalist,$request,$url){
	echo '<ul class="am-pagination am-pagination-centered upages"><li class="upage-info">共'.$datalist['pagecount'].'页，'.$datalist['allcount'].'条记录</li><li class="cfirst am-disabled"><a href="'.$url.'?'.api_value_query($request, $datalist['pagepre']).'">&laquo;</a></li><li class="am-active"><a href="#">'.$datalist['pagenow'].'</a></li><li class="clast"><a href="'.$url.'?'.api_value_query($request, $datalist['pagenext']).'">&raquo;</a></li><li class="upage-info">，跳转到第 <input id="idpagego" class="am-form-field uinput" style="width:50px;height: 26px;line-height:26px;vertical-align:bottom;text-align:center;" onkeydown="if(event.keyCode == 13){page_do();}"> 页</li></ul>';
}

// 分页js
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

// 提示框 
/*1删除 2停用 3启用 4还原 5取消 6确认 7到店 8同步 9总店*/
function confirmHtml($type){
	switch ($type)
	{
		case 1:
			$header = '删&nbsp;&nbsp;&nbsp;&nbsp;除&nbsp;&nbsp;&nbsp;&nbsp;提&nbsp;&nbsp;&nbsp;&nbsp;醒';
			$content = '你确认要删除吗';
			break;
		case 2:
			$header = '停&nbsp;&nbsp;&nbsp;&nbsp;用&nbsp;&nbsp;&nbsp;&nbsp;提&nbsp;&nbsp;&nbsp;&nbsp;醒';
			$content = '你确认要停用吗';
			break;
		case 3:
			$header = '启&nbsp;&nbsp;&nbsp;&nbsp;用&nbsp;&nbsp;&nbsp;&nbsp;提&nbsp;&nbsp;&nbsp;&nbsp;醒';
			$content = '你确认要启用吗';
			break;
		case 4:
			$header = '恢&nbsp;&nbsp;&nbsp;&nbsp;复&nbsp;&nbsp;&nbsp;&nbsp;提&nbsp;&nbsp;&nbsp;&nbsp;醒';
			$content = '你确认要恢复吗';
			break;
		case 5:
			$header = '取&nbsp;&nbsp;&nbsp;&nbsp;消&nbsp;&nbsp;&nbsp;&nbsp;提&nbsp;&nbsp;&nbsp;&nbsp;醒';
			$content = '你确认要取消吗';
			break;
		case 6:
			$header = '确&nbsp;&nbsp;&nbsp;&nbsp;认&nbsp;&nbsp;&nbsp;&nbsp;提&nbsp;&nbsp;&nbsp;&nbsp;醒';
			$content = '你已经确认了吗';
			break;
		case 7:
			$header = '到&nbsp;&nbsp;&nbsp;&nbsp;店&nbsp;&nbsp;&nbsp;&nbsp;提&nbsp;&nbsp;&nbsp;&nbsp;醒';
			$content = '你确认要到店吗';
			break;
		case 8:
			$header = '同&nbsp;&nbsp;&nbsp;&nbsp;步&nbsp;&nbsp;&nbsp;&nbsp;提&nbsp;&nbsp;&nbsp;&nbsp;醒';
			$content = '你确认要同步吗';
			break;
		case 9:
			$header = '设&nbsp;&nbsp;&nbsp;&nbsp;置&nbsp;&nbsp;&nbsp;&nbsp;提&nbsp;&nbsp;&nbsp;&nbsp;醒';
			$content = '你确认要把它设置为总店吗';
			break;
		default:
			$header = '提&nbsp;&nbsp;&nbsp;&nbsp;醒';
			$content = '你确认吗';
			break;
	}
	echo '<div id="cconfirm'.$type.'" class="am-modal am-modal-confirm" tabindex="-1">';
	echo   '<div class="am-modal-dialog uconfirm">';
	echo     '<div class="am-modal-hd uhead"><b>'.$header.'</b></div>';
	echo    	'<div class="am-modal-bd">';
	echo      		$content;
	echo    	'</div>';
	echo    	'<div class="am-modal-footer">';
	echo      		'<span class="am-modal-btn" data-am-modal-cancel>取消</span>';
	echo      		'<span class="am-modal-btn" data-am-modal-confirm>确定</span>';
	echo    	'</div>';
	echo  	'</div>';
	echo '</div>';
}

// 获取当前用户姓名
function userName(){
	$arr = array();
	$strsql = "SELECT user_name FROM ".$GLOBALS['gdb']->fun_table2('user'). " WHERE user_id=".$GLOBALS['_SESSION']['login_id'];
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	$user_name = $arr['user_name'];
	return $user_name;
}

function companyState(){
	$arr = array();
	$strsql = "SELECT company_state FROM ".$GLOBALS['gdb']->fun_table('company'). " WHERE company_id=".$GLOBALS['_SESSION']['login_cid'];
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	$company_state = $arr['company_state'];
	return $company_state;
}

function shopEdate(){
	$arr = array();
	$strsql = "SELECT shop_edate FROM ".$GLOBALS['gdb']->fun_table('shop'). " WHERE shop_id=".$GLOBALS['_SESSION']['login_sid'];
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	$shop_edate = $arr['shop_edate'];
	return $shop_edate;
}

function shopState(){
	$arr = array();
	$strsql = "SELECT shop_state FROM ".$GLOBALS['gdb']->fun_table('shop'). " WHERE shop_id=".$GLOBALS['_SESSION']['login_sid'];
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_assoc($hresult);
	$shop_state = $arr['shop_state'];
	return $shop_state;
}
// 正常的没有过期的店铺
function shopList(){
	$arr = array();
	$strsql = "SELECT shop_id,shop_name FROM " . $GLOBALS['gdb']->fun_table('shop')."where shop_state=1 and shop_edate>".time()." order by shop_id";
	$hresult = $GLOBALS['gdb']->fun_query($strsql);
	$arr = $GLOBALS['gdb']->fun_fetch_all($hresult);
	return $arr;
}