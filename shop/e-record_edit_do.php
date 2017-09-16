<?php
define('C_CNFLY', true);

require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');
require('inc_limit.php');

$strcard_record_id = api_value_post('record_id');
$intcard_record_id = api_value_int0($strcard_record_id);
$strtime = api_value_post('time');
$inttime = strtotime($strtime)?strtotime($strtime):0;
$strworker_id = api_value_post('worker_id');
$intworker_id = api_value_int0($strworker_id);
$strquestion = api_value_post('question');
$sqlquestion = $gdb->fun_escape($strquestion);
$strresult = api_value_post('result');
$sqlresult = $gdb->fun_escape($strresult);
$strplan = api_value_post('plan');
$sqlplan = $gdb->fun_escape($strplan);

$intreturn = 0;
$arr = array();
$arrrecord = array();
$imgfile = array();