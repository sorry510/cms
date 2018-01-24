<?php
echo iconv('utf-8', 'gbk', '分组') . ",";
echo iconv('utf-8', 'gbk', '姓名') . ",";
echo iconv('utf-8', 'gbk', '编号') . ",";
echo iconv('utf-8', 'gbk', '性别') . ",";
echo iconv('utf-8', 'gbk', '出生日期') . ",";
echo iconv('utf-8', 'gbk', '手机号码') . ",";
echo iconv('utf-8', 'gbk', '学历') . ",";
echo iconv('utf-8', 'gbk', '入职时间') . ",";
echo iconv('utf-8', 'gbk', '基本工资') . ",";
echo iconv('utf-8', 'gbk', '所属店铺') . "\n";

// $strother = '';
foreach($this->_data['worker_list'] as $row) {
	echo iconv('utf-8', 'gbk', $row['worker_group_name']) . ",";
	echo @iconv('utf-8', 'gbk', $row['worker_name']) . ",";
	echo iconv('utf-8', 'gbk', $row['worker_code']) . ",";
	echo iconv('utf-8', 'gbk', $row['mysex']) . ",";
	echo iconv('utf-8', 'gbk', $row['mybirthday']) . ",";
	echo iconv('utf-8', 'gbk', $row['worker_phone']) . ",";
	echo iconv('utf-8', 'gbk', $GLOBALS['gconfig']['worker']['education'][$row['worker_education']]) . ",";
	echo iconv('utf-8', 'gbk', $row['myjoin']) . ",";
	echo iconv('utf-8', 'gbk', $row['worker_wage']) . ",";
	echo iconv('utf-8', 'gbk', $row['shop_name']) . "\n";
}
?>