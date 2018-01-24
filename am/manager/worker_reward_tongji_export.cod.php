<?php
echo iconv('utf-8', 'gbk', '排名') . ",";
echo iconv('utf-8', 'gbk', '员工姓名') . ",";
echo iconv('utf-8', 'gbk', '分组') . ",";
echo iconv('utf-8', 'gbk', '办卡提成') . ",";
echo iconv('utf-8', 'gbk', '充值提成') . ",";
echo iconv('utf-8', 'gbk', '服务提成') . ",";
echo iconv('utf-8', 'gbk', '商品提成') . ",";
echo iconv('utf-8', 'gbk', '导购提成') . ",";
echo iconv('utf-8', 'gbk', '基本工资') . ",";
echo iconv('utf-8', 'gbk', '合计工资') . ",";
echo iconv('utf-8', 'gbk', '所属店铺') . "\n";

foreach($this->_data['worker_reward_tongji'] as $key => $row) {
	echo iconv('utf-8', 'gbk', $key+1) . ",";
	echo @iconv('utf-8', 'gbk', $row['c_worker_name']) . ",";
	echo iconv('utf-8', 'gbk', $row['c_worker_group_name']) . ",";
	echo iconv('utf-8', 'gbk', $row['tc_kk']) . ",";
	echo iconv('utf-8', 'gbk', $row['tc_cz']) . ",";
	echo iconv('utf-8', 'gbk', $row['tc_fw']) . ",";
	echo iconv('utf-8', 'gbk', $row['tc_sw']) . ",";
	echo iconv('utf-8', 'gbk', $row['tc_dg']) . ",";
	echo iconv('utf-8', 'gbk', $row['worker_wage']) . ",";
	echo iconv('utf-8', 'gbk', $row['sz_wage']) . ",";
	echo iconv('utf-8', 'gbk', $row['shop_name']) . "\n";
}
?>