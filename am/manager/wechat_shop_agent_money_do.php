<?php
define('C_CNFLY', true);
define('C_NOTEMPLATE', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$arr1 = api_value_post('arr1');
$inttime = time();

$intreturn = 0;

if (!empty($arr1)) {
	if ($intreturn == 0) {
		foreach ($arr1 as $key => $value) {

			$decwgoods_price = api_value_decimal($value['price'],2);

			$strsql = "UPDATE " . $gdb->fun_table2('wgoods') . " ( SET wgoods_reward ) VALUES ( ". $decwgoods_price ." ) ";
			$hresult = $gdb->fun_do($strsql);
			if($hresult == FALSE) {
				$intreturn = 1;
			}
		}
	}
}

echo $intreturn;

?>