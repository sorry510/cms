<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
// require('inc_limit.php');
$strsql = "SELECT sum(card_record_smoney),from_unixtime(card_record_atime,'%Y-%m-%d') as a,card_record_atime FROM `am_0001_card_record` group by a having unix_timestamp(a) < 1510224347";
$hresult = $gdb->fun_query($strsql);
$arr = $gdb->fun_fetch_all($hresult);
// echo json_encode($arr);

$arr2 = array_sort($arr, 'card_record_atime','desc');
echo "<pre>";
echo var_dump($arr2);
echo "</pre>";
function array_sort($array,$keys,$type='asc'){
//$array为要排序的数组,$keys为要用来排序的键名,$type默认为升序排序
	$keysvalue = $new_array = array();
	foreach($array as $k=>$v){
		$keysvalue[$k] = $v[$keys];
	}

	if($type == 'asc'){
		asort($keysvalue);
	}else{
		arsort($keysvalue);
	}
	reset($keysvalue);
	$i = 0;
	foreach ($keysvalue as $k=>$v){
		$new_array[$i++] = $array[$k];
	}
	return $new_array;
}
?>