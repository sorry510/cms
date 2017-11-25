<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$snapData = api_value_post('snapData');

$snapData = str_replace('data:image/png;base64,', '', $snapData);//将base64的头部信息字段去掉再保存，否则似乎图像是损坏无法打开滴
// $snapData = str_replace(' ', '+', $snapData);
$img = base64_decode($snapData);

$uploadDir = '../photo/temp/';
$fileName = md5(uniqid(md5(microtime(true)),true)).".jpg";

if (!(file_put_contents($uploadDir . $fileName, $img))) {
   echo json_encode(array('code' => 500, 'msg' => '文件上传失败'));
} else {
   echo json_encode(array('code' => 200, 'msg' => '文件上传成功', 'photo' => $fileName));
}
