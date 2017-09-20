<?php
define('C_CNFLY', true);

require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

// $TxtFileName = "text.txt";
// //以读写方式打写指定文件，如果文件不存则创建
// if( ($TxtRes=fopen ($TxtFileName,"w+")) === FALSE){
// echo("创建可写文件：".$TxtFileName."失败");
// exit();
// }
// echo ("创建可写文件".$TxtFileName."成功！</br>");

// // $_FILES[];

// $StrConents = json_encode($_FILES["file"]);
// $StrConents .= "/n";//要 写进文件的内容

// if(!fwrite ($TxtRes,$StrConents)){ //将信息写入文件
// echo ("尝试向文件".$TxtFileName."写入".$StrConents."失败！");
// fclose($TxtRes);
// exit();
// }
// echo ("尝试向文件".$TxtFileName."写入".$StrConents."成功！");
// fclose ($TxtRes); //关闭指针

// echo md5(uniqid(md5(microtime(true)),true));
echo uniqid(time());
