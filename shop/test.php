<?php
define('C_CNFLY', true);

require('inc_path.php');
require(C_ROOT . '/_include/inc_init.php');

$text = api_value_post('text');
$arr = array();
if($text != ''){
	$strsql = "select * from ".$gdb->fun_table2('test')." limit 1";
	// echo $strsql;
	$hresult = $gdb->fun_query($strsql);
	$arr1 = $gdb->fun_fetch_assoc($hresult);
	if(!empty($arr1)){
		$strsql = "update ".$gdb->fun_table2('test')." set text='".$text."' where id=".$arr1['id'];
		$hresult = $gdb->fun_do($strsql);
	}else{
		$strsql = "insert into ".$gdb->fun_table2('test')." (text) values ('".$text."')";
		// echo $strsql;
		$hresult = $gdb->fun_do($strsql);
	}
}else{
	$strsql = "select * from ".$gdb->fun_table2('test')." limit 1";
	// echo $strsql;
	$hresult = $gdb->fun_query($strsql);
	$arr = $gdb->fun_fetch_assoc($hresult);
	// echo $arr['text'];
}
?>

<html>
<head>
    <title>完整demo</title>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
    <script type="text/javascript" charset="utf-8" src="./css/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="./css/ueditor.all.min.js"> </script>
    <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
    <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
    <script type="text/javascript" charset="utf-8" src="./css/lang/zh-cn/zh-cn.js"></script>

    <style type="text/css">
        div{
            width:100%;
        }
    </style>
</head>
<body>
<div>
    <h1>完整demo</h1>
    <form method="post" action="test.php" enctype="multipart/form-data">
    	<script id="editor" name="text" type="text/plain" style="width:1024px;height:500px;"></script>
    	<button type="submit">sub</button>
    </form>
</div>
<script type="text/javascript">
	var ue = UE.getEditor('editor',{
		// toolbars: [
		//     ['fullscreen', 'source', 'undo', 'redo', 'bold']
		// ]
	});
	ue.ready(function() {
		<?php if(!empty($arr)){?>
			ue.setContent('<?php echo $arr['text'];?>');
			console.log(111);
		<?php }?>
	});
	
</script>
</body>
</html>





