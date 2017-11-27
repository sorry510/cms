<?php
echo setcookie('CF_SKEY', 'f900eb6d1fcf08f1a83b5ff075993097f6f9a9d0', 0, '/', '', false);
// define('C_CNFLY', true);
// define('C_NOTEMPLATE', true);
// require('inc_path.php');
// require(C_ROOT . '/_include/inc_init.php');
// require('inc_limit.php');

// $time = time();
// echo strtotime('-1 day', $time);
// echo "<br/>";
// echo strtotime(date('Y-m-d', time()));
// echo "<br/>";
// echo md5(uniqid(md5(microtime(true)),true));
// echo "<br/>";

/*$key = md5(uniqid(mt_rand(), true));
$strcrc = C_ROOT . $key . 'a9c901455f34ca' . '165e23968c7683c5f1';
echo sprintf('%08x', crc32($strcrc));*/

/*$strcookie = '065a821ff7439b209a4e6a08dcd4a54a81113405';//40位
$strcookie1 = substr($strcookie, 0, 32);//32位
$strcookie2 = substr($strcookie, 32);//8位
$strcrc = C_ROOT . $strcookie1 . 'a9c901455f34ca' . '165e23968c7683c5f1';

echo $strcookie1;
echo "<br/>";
echo $strcookie2;
echo "<br/>";
echo sprintf('%08x', crc32($strcrc));*/

/*$str = 'abccdeacebadecadedaabdabababc';//29位
$arr = [];
// echo strlen($str);
for($i = 1; $i < strlen($str) - 1; $i++){
	$k = $i;
	$j = $i;
	while($str[--$k] == $str[++$j]){
	}
	echo $arr[($i - $k) * 2 - 1] = substr($str, $k+1, ($i - $k) * 2 - 1);
	echo "<br/>";
}
print_r(array_keys($arr));
echo $arr[max(array_keys($arr))];*/
// ini_set('memory_limit', '64M');
// echo memory_get_usage() . "\n"; // 36640

// $a = str_repeat("Hello", 4242);

// echo memory_get_usage() . "\n"; // 57960

// unset($a);

// echo memory_get_usage() . "\n"; // 36744

