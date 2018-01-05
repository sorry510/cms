<?php
define('C_CNFLY', true);
require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strgoods_id = api_value_get('goods_id');
$intgoods_id = api_value_int0($strgoods_id);
$strtype = api_value_get('type');
$inttype = api_value_int0($strtype);
$strcard_id = api_value_get('card_id');
$intcard_id = api_value_int0($strcard_id);
$arract_id = api_value_get('act_id');

echo json_encode(laimi_goods_price($intgoods_id, $inttype, $intcard_id, $arract_id));






