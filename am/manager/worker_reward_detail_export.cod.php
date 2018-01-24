<?php
echo iconv('utf-8', 'gbk', '时间') . ",";
echo iconv('utf-8', 'gbk', '消费单号') . ",";
echo iconv('utf-8', 'gbk', '会员卡号') . ",";
echo iconv('utf-8', 'gbk', '会员姓名') . ",";
echo iconv('utf-8', 'gbk', '消费类型') . ",";
echo iconv('utf-8', 'gbk', '消费内容') . ",";
echo iconv('utf-8', 'gbk', '提成金额') . ",";
echo iconv('utf-8', 'gbk', '员工') . ",";
echo iconv('utf-8', 'gbk', '所属店铺') . "\n";

$strother = '--';
foreach($this->_data['worker_reward_list'] as $row) {
	if($row['c_goods_name'] != '') {
		$strother = $row['c_goods_name'].'*'.$row['c_goods_count'];
	}
	echo iconv('utf-8', 'gbk', date('Y-m-d', $row['worker_reward_atime'])) . ",";
	echo iconv('utf-8', 'gbk', $row['c_card_record_code']) . ",";
	echo iconv('utf-8', 'gbk', $row['c_card_code']) . ",";
	echo @iconv('utf-8', 'gbk', $row['c_card_name']) . ",";
	echo iconv('utf-8', 'gbk', $row['mytype']) . ",";
	echo iconv('utf-8', 'gbk', $strother) . ",";
	echo iconv('utf-8', 'gbk', $row['worker_reward_money']) . ",";
	echo @iconv('utf-8', 'gbk', $row['c_worker_name']) . ",";
	echo iconv('utf-8', 'gbk', $row['shop_name']) . "\n";
}
?>