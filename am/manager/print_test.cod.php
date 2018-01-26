<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="zh-CN" xmlns="http://www.w3.org/1999/xhtml">
<head>
<style type="text/css" id="style1">
	#laimi-container{width:100%;padding:0;margin:0;}
	.laimi-line{float:left; margin:2pt 0%; width:100%; font-size:9pt;}
	.laimi-line2{float:left; margin:2pt 0%; width:100%; font-size:9pt;}
	.laimi-text-right{text-align:right;}
	.hr{margin:5pt 0; width:100%; border-bottom:1pt dashed #000;}
</style>
<style type="text/css" media="screen">
	.hide{
		display:none;
	}
</style>
<script language="javascript" src="../../js/LodopFuncs.js"></script>
</head>
<body>
	<object id="LODOP_X" classid="clsid:2105C259-1E0C-4534-8141-A753534CB4CA" width=0 height=0 style="display:none;">
	        <param name="Color" value="#ADD8E6">
		<embed id="LODOP_EM" TYPE="application/x-print-lodop" width=100% height=500 color="#ADD8E6"  PLUGINSPAGE="install_lodop32.exe"></embed>
	</object>
	<div id="laimi-container" class="hide">
	  <div class="laimi-line" style="padding:5pt 0;text-align:center;font-size:12pt;font-weight:bold;">
      <?php echo $this->_data['print_info']['sprint_title'] ; ?>
    </div>
    <div class="laimi-line">
			消费时间：<?php echo time(); ?>
    </div>
    <div class="laimi-line">
			会员卡号：test
    </div>
    <div class="laimi-line">
			会员姓名：张三
    </div>
    <div class="laimi-line">
			卡类型：普通会员(10折)
    </div>
    <div class="laimi-line">
			消费类型：充值
    </div>
    <div class="laimi-line hr"></div>
    <div class="laimi-line">
	    	<table class="laimi-table">
				  <thead>
				    <tr>
				      <th>名称</th>
				      <th>单价</th>
				    </tr>
				  </thead>
				  <tbody>
				    <tr>
				      <td>会员卡</td>
				      <td>¥100</td>
				    </tr>
				  </tbody>
				</table>
    </div>
    <div class="laimi-line hr"></div>
		<div class="laimi-line laimi-text-right">
			实收金额：¥100
    </div>
    <div class="laimi-line laimi-text-right">
			赠送金额：¥50
    </div>
    <div class="laimi-line laimi-text-right">
			充值金额：¥150
    </div>
    <div class="laimi-line laimi-text-right">
			当前卡余额：¥200
    </div>
    <div class="laimi-line laimi-text-right">
			付款方式：支付宝
    </div>
	</div>
</body>
<script type="text/javascript" language="javascript">
	var LODOP;
	function CreateOnePage(){
		LODOP=getLodop();
		var strBodyStyle="<style>"+document.getElementById("style1").innerHTML+"</style>";
		var strFormHtml=strBodyStyle+"<body>"+document.getElementById("laimi-container").innerHTML+"</body>";
		var title = '<?php echo $this->_data['print_info']['sprint_title']; ?>';
		var width = 580;
		var widthindex = '<?php echo $this->_data['print_info']['sprint_width']; ?>';
		if(widthindex == 1){
			width = 580;
		}else if(widthindex == 2){
			width = 880;
		}
		LODOP.PRINT_INIT(title);
		LODOP.ADD_PRINT_HTM(0, 0, '100%', '100%', strFormHtml);
		LODOP.SET_PRINT_PAGESIZE(3, width, 0, '');//设定纸张大小
		return true;
	};

	function OpenPreview() {
		if(CreateOnePage()){
			// LODOP.SET_PRINT_MODE("PRINT_PAGE_PERCENT","Full-Page");//按整页缩放
			// LODOP.SET_SHOW_MODE("HIDE_PAPER_BOARD",true);//隐藏走纸板
			// LODOP.SET_PREVIEW_WINDOW(0,3,0,0,0,""); //隐藏工具条，设置适高显示
			// LODOP.SET_SHOW_MODE("PREVIEW_IN_BROWSE",true); //预览界面内嵌到页面内
			// LODOP.PREVIEW();//打印预览
			LODOP.PRINT();//打印
			// blPreviewOpen=true;
	  }
	  //延时跳转
	  setTimeout(function(){
	  	window.location.href = 'http://test.laimisoft.com/lodop.htm';
	  }, 0)
	};
	if (needCLodop()) {
		window.On_CLodop_Opened=function(){
			OpenPreview();
			window.On_CLodop_Opened=null;
		};
	} else{
		window.onload = function(){
			OpenPreview();
		};
	}
</script>
</html>