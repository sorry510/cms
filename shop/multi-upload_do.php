<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$arrreturn = array(
	'code' => 0,
	'msg' => '',
	'data' => [
		'photo' => null
	]
);

$intreturn = 0;
// $photo = array();
$arrfile = $_FILES['file'];
// foreach($arrfile as $key => $row){
// 	$new_name = md5(uniqid(md5(microtime(true)),true));
// 	array_push($photo, $key);
// 	// $strext = strtolower(strrchr($row['name'], '.'));
// 	// $intlength = $row['size'];
// 	// if($strext == '.jpg' || $strext == '.gif' || $strext == '.png') {
// 	// 	if($intlength < 1024000) {
// 	// 		$hresult = move_uploaded_file($row['tmp_name'], $GLOBALS['gconfig']['photo'][0].$new_name.$strext);
// 	// 		if(!$hresult) {
// 	// 			$intreturn = 1;
// 	// 		}else{
// 	// 			$photo[$key] = $new_name.$strext;
// 	// 		}
// 	// 	}else{
// 	// 		$intreturn = 2;
// 	// 	}
// 	// }else{
// 	// 	$intreturn = 3;
// 	// }
// }
$photo = json_encode($arrfile);

if($intreturn == 0){
	$arrreturn['code'] = '200';
	$arrreturn['msg'] = 'ok';
	$arrreturn['data']['photo'] = $photo;
}else if($intreturn == 1){
	$arrreturn['code'] = '500';
	$arrreturn['msg'] = 'err1';
}else if($intreturn == 2){
	$arrreturn['code'] = '500';
	$arrreturn['msg'] = 'err2';
}else if($intreturn == 2){
	$arrreturn['code'] = '500';
	$arrreturn['msg'] = 'err3';
}else{
	$arrreturn['code'] = '500';
	$arrreturn['msg'] = 'err4';
}
echo json_encode($arrreturn);


