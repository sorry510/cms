<?php
echo iconv('utf-8', 'gbk', '卡号') . ",";
echo iconv('utf-8', 'gbk', '姓名') . ",";
echo iconv('utf-8', 'gbk', '手机') . ",";
echo iconv('utf-8', 'gbk', '性别') . ",";
echo iconv('utf-8', 'gbk', '开卡时间') . ",";
echo iconv('utf-8', 'gbk', '卡类型') . ",";
echo iconv('utf-8', 'gbk', '卡状态') . ",";
echo iconv('utf-8', 'gbk', '所属店铺') . ",";
echo iconv('utf-8', 'gbk', '明细') . "\n";

$strother = '';
foreach($this->_data['card_list'] as $row) {
	$strother = '余额：￥' . $row['s_card_ymoney'] . '，剩余积分：' . $row['s_card_yscore'];
	if(!empty($row['mymcombo'])){
		$strother .= '，卡余：【';
		foreach($row['mymcombo'] as $row2) {
			$strother .= $row2['c_mgoods_name'];
			if($row2['c_mcombo_type'] == 1) {
			  $strother .= '(' . $row2['card_mcombo_gcount'] . ')';
			}
			$strother .= '，到期时间:';
			$strother .= date('Y-m-d', $row2['card_mcombo_cedate']);
			$strother .= '；';
		}
		$strother .= '】';
	}
	echo iconv('utf-8', 'gbk', $row['card_code']) . ",";
	echo @iconv('utf-8', 'gbk', $row['card_name']) . ",";
	echo iconv('utf-8', 'gbk', $row['card_phone']) . ",";
	echo iconv('utf-8', 'gbk', $row['mysex']) . ",";
	echo iconv('utf-8', 'gbk', date('Y-m-d H:i', $row['card_atime'])) . ",";
	echo iconv('utf-8', 'gbk', $row['c_card_type_name'].'('.$row['mydiscount'].')') . ",";
	echo iconv('utf-8', 'gbk', $row['mystate']) . ",";
	echo iconv('utf-8', 'gbk', empty($row['shop_name']) ? '总店会员' : $row['shop_name']) . ",";
	echo iconv('utf-8', 'gbk', $strother) . "\n";
}
?>