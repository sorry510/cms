<?php
define('C_CNFLY', true);

require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$text = api_value_post('text');
var_dump($text);
?>

<!DOCTYPE html>
<html>
<head>
	<title>dd1</title>
</head>
<body>
	<form method='post' enctype="multipart/form-data">
		<input type="input" name="text">
		<button type="submit">完成</button>
	</form>
	
</body>
</html>