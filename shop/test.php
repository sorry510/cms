<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

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

$strcookie = '065a821ff7439b209a4e6a08dcd4a54a81113405';//40位
$strcookie1 = substr($strcookie, 0, 32);//32位
$strcookie2 = substr($strcookie, 32);//8位
$strcrc = C_ROOT . $strcookie1 . 'a9c901455f34ca' . '165e23968c7683c5f1';

echo $strcookie1;
echo "<br/>";
echo $strcookie2;
echo "<br/>";
echo sprintf('%08x', crc32($strcrc));
