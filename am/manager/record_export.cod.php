<?php
echo iconv('utf-8', 'gbk', '时间') . ",";
echo iconv('utf-8', 'gbk', '单号') . ",";
echo iconv('utf-8', 'gbk', '卡号') . ",";
echo iconv('utf-8', 'gbk', '姓名') . ",";
echo iconv('utf-8', 'gbk', '性别') . ",";
echo iconv('utf-8', 'gbk', '手机') . ",";
echo iconv('utf-8', 'gbk', '消费类型') . ",";
echo iconv('utf-8', 'gbk', '付款方式') . ",";
echo iconv('utf-8', 'gbk', '金额') . ",";
echo iconv('utf-8', 'gbk', '分店') . ",";
echo iconv('utf-8', 'gbk', '状态') . "\n";
// echo iconv('utf-8', 'gbk', '明细') . "\n";

// $strother = '';
foreach($this->_data['card_records_list'] as $row) {
	echo iconv('utf-8', 'gbk', date('Y-m-d H:i', $row['card_record_atime'])) . ",";
	echo iconv('utf-8', 'gbk', $row['card_record_code']) . ",";
	echo iconv('utf-8', 'gbk', $row['c_card_code']) . ",";
	echo @iconv('utf-8', 'gbk', $row['c_card_name']) . ",";
	echo iconv('utf-8', 'gbk', $row['mysex']) . ",";
	echo iconv('utf-8', 'gbk', $row['c_card_phone']) . ",";
	echo iconv('utf-8', 'gbk', $row['recordtype']) . ",";
	echo iconv('utf-8', 'gbk', $row['paytype']) . ",";
	echo iconv('utf-8', 'gbk', $row['card_record_smoney']) . ",";
	echo iconv('utf-8', 'gbk', $row['shop_name']) . ",";
	echo iconv('utf-8', 'gbk', $row['state']) . "\n";
	// echo iconv('utf-8', 'gbk', $strother) . "\n";
}
?>