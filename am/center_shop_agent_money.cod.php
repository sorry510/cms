<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title></title>
    <script src="js/mui.min.js"></script>
    <script src="http://at.alicdn.com/t/font_485373_cencq7eaouqjv2t9.js"></script>
    <link href="css/mui.min.css" rel="stylesheet"/>
    <link href="css/laimi.css" rel="stylesheet"/> 
</head>
<body id="laimi-body">
<header id="laimi-header" class="mui-bar mui-bar-nav">
    <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
    <h1 class="mui-title laimi-color-white laimi-font14" style="line-height:40px;">提现记录</h1>
</header>
<div id="laimi-content" class="mui-content">
    <ul class="mui-table-view">
        <?php foreach($this->_data['wmoney'] as $row) { ?>
        <li class="mui-table-view-cell">
            <span class="mui-badge mui-badge-danger  mui-badge-inverted" style="font-size:14px;font-family:'Segoe UI';"><?php echo $row['wmoney_value']?></span>
            <span class="laimi-color-gray"><?php echo date('Y-m-d H:i',$row['wmoney_atime'])?></span>
        </li>
        <?php }?>
    </ul>
</div>
 <script type="text/javascript" charset="utf-8">
    mui.init();
</script>
</body>
</html>