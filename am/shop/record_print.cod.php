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
<script language="javascript" src="../../js/LodopFuncs.js"></script>
</head>
<body>
	<object id="LODOP_X" classid="clsid:2105C259-1E0C-4534-8141-A753534CB4CA" width=100% height=500>
	        <param name="Color" value="#ADD8E6">
		<embed id="LODOP_EM" TYPE="application/x-print-lodop" width=100% height=500 color="#ADD8E6"  PLUGINSPAGE="install_lodop32.exe"></embed>
	</object>
	<div id="laimi-container">
	  <div class="laimi-line" style="padding:5pt 0;text-align:center;font-size:12pt;font-weight:bold;">
      <?php echo $this->_data['record_info']['shop_name']; ?>
    </div>
    <div class="laimi-line">
			消费时间：<?php echo $this->_data['record_info']['atime']; ?>
    </div>
  <?php if($this->_data['record_info']['card_id'] != 0) { ?>
    <div class="laimi-line">
			会员卡号：<?php echo $this->_data['record_info']['c_card_code']; ?>
    </div>
    <div class="laimi-line">
			会员姓名：<?php echo $this->_data['record_info']['c_card_name']; ?>
    </div>
    <div class="laimi-line">
			卡类型：<?php echo $this->_data['record_info']['cardtype']; ?>(<?php echo $this->_data['record_info']['discount']; ?>折)
    </div>
  <?php } ?>
    <div class="laimi-line">
			消费类型：<?php echo $this->_data['record_info']['recordtype']; ?>
    </div>
    <div class="laimi-line hr"></div>
    <div class="laimi-line">
	    <?php if($this->_data['record_info']['card_record_type'] == 1) { ?>
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
				      <td>¥<?php echo $this->_data['record_info']['card_record_cmoney']; ?></td>
				    </tr>
				  </tbody>
				</table>
			<?php } ?>
			<?php if($this->_data['record_info']['card_record_type'] == 2) { ?>
	    	<table class="layui-table">
				  <thead>
				    <tr>
				      <th width="400">名称</th>
				      <th>数量</th>
				      <th>单价</th>
				      <th>优惠价</th>
				    </tr>
				  </thead>
				  <tbody>
				  <?php foreach($this->_data['record_info']['mcombo_goods_list'] as $row) { ?>
				    <tr>
				      <td><?php echo $row['c_mgoods_name']; ?></td>
				      <td><?php echo $row['card_record2_mcombo_gcount']; ?></td>
				      <td style="text-decoration:line-through;">¥<?php echo $row['c_mgoods_price'] + 0; ?></td>
				      <td><?php echo $row['c_mgoods_cprice'] != 0 ? ($row['c_mgoods_cprice'] + 0) : '--'; ?></td>
				    </tr>
				  <?php } ?>
				  </tbody>
				</table>
			<?php } ?>
	    <?php if($this->_data['record_info']['card_record_type'] == 3) { ?>
	    	<table class="layui-table">
				  <thead>
				    <tr>
				      <th>名称</th>
				      <th>单价</th>
				    </tr>
				  </thead>
				  <tbody>
				  <?php foreach($this->_data['record_info']['goods_list'] as $row) { ?>
				    <tr>
				      <td><?php echo $row['c_mgoods_name'] != '' ? $row['c_mgoods_name'] : $row['c_sgoods_name']; ?>x<?php echo $row['card_record3_goods_count'] + 0; ?></td>
				      <td>¥<?php echo $row['c_mgoods_rprice'] != 0 ? ($row['c_mgoods_rprice'] + 0) : ($row['c_sgoods_rprice'] + 0); ?></td>
				    </tr>
				  <?php } ?>
				  <?php foreach($this->_data['record_info']['mcombo_goods_list2'] as $row) { ?>
				    <tr>
				      <td><?php echo $row['c_mgoods_name']; ?>(套餐)x<?php echo $row['card_record3_mgoods_count']; ?></td>
				      <td>¥0</td>
				    </tr>
				  <?php } ?>
				  </tbody>
				</table>
			<?php } ?>
    </div>
    <div class="laimi-line hr"></div>
  <?php if($this->_data['record_info']['card_record_type'] == 1) { ?>
		<div class="laimi-line laimi-text-right">
			实收金额：¥<?php echo $this->_data['record_info']['card_record_smoney']; ?>
    </div>
    <div class="laimi-line laimi-text-right">
			赠送金额：¥<?php echo $this->_data['record_info']['card_record_cmoney'] - $this->_data['record_info']['card_record_smoney']; ?>
    </div>
    <div class="laimi-line laimi-text-right">
			充值金额：¥<?php echo $this->_data['record_info']['card_record_cmoney']; ?>
    </div>
    <div class="laimi-line laimi-text-right">
			当前卡余额：¥<?php echo $this->_data['record_info']['card_record_emoney']; ?>
    </div>
    <div class="laimi-line laimi-text-right">
			付款方式：<?php echo $this->_data['record_info']['paytype']; ?>
    </div>
  <?php } ?>
  <?php if($this->_data['record_info']['card_record_type'] == 3) { ?>
    <div class="laimi-line laimi-text-right">
			实收金额：¥<?php echo $this->_data['record_info']['card_record_smoney'] + 0; ?>
    </div>
    <div class="laimi-line laimi-text-right">
			合计金额：¥<?php echo $this->_data['record_info']['goods_money'] + 0; ?>
    </div>
    <div class="laimi-line laimi-text-right">
			折扣优惠：¥<?php echo $this->_data['record_info']['goods_money'] - $this->_data['record_info']['goods_money2']; ?>
    </div>
    <div class="laimi-line laimi-text-right">
			满减优惠：¥<?php echo $this->_data['record_info']['card_record_mmoney'] + 0; ?>
    </div>
    <div class="laimi-line laimi-text-right">
			手动优惠：¥<?php echo $this->_data['record_info']['card_record_jmoney'] + 0; ?>
    </div>
    <div class="laimi-line hr"></div>
    <?php foreach($this->_data['record_info']['ticket_list'] as $key => $row) { ?>
    <div class="laimi-line">
			<?php if($key == 0) echo '满送：'; ?><?php echo $row['c_ticket_name']."x".$row['count']."(满".($row['c_ticket_limit'] + 0)."元可用)"; ?>
    </div>
    <?php } ?>
    <div class="laimi-line hr"></div>
    <div class="laimi-line">
			卡余额：¥<?php echo $this->_data['record_info']['card_record_emoney'] + 0; ?>
    </div>
    <div class="laimi-line">
			卡余套餐：<?php echo $this->_data['card_info']; ?>
    </div>
    <div class="laimi-line hr"></div>
  <?php } ?>
    <div class="laimi-line">
			<?php echo $this->_data['record_info']['shop_name']; ?>
    </div>
    <div class="laimi-line">
			电话：<?php echo $this->_data['record_info']['shop_phone']; ?>
    </div>
    <div class="laimi-line">
			地址：<?php echo $this->_data['record_info']['address']; ?>
    </div>
    <div class="laimi-line" style="margin:12pt 0; text-align:center; font-size:10pt; font-weight:bold;">
		  谢谢惠顾，欢迎下次光临~
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
		var device = '<?php echo $this->_data['print_info']['sprint_device']; ?>';
		LODOP.PRINT_INIT(title);
		LODOP.ADD_PRINT_HTM(0, 0, '100%', '100%', strFormHtml);
		LODOP.SET_PRINT_PAGESIZE(3, width, 0, '');//设定纸张大小
		var flag = LODOP.SET_PRINTER_INDEX(device);
		if(!flag){
			alert("当前设备没有检测到此打印驱动");
			return false;
		}
		return true;
	};

	function OpenPreview() {
		if(CreateOnePage()){
			// LODOP.SET_PRINT_MODE("PRINT_PAGE_PERCENT","Full-Page");//按整页缩放
			// LODOP.SET_SHOW_MODE("HIDE_PAPER_BOARD",true);//隐藏走纸板
			// LODOP.SET_PREVIEW_WINDOW(0,3,0,0,0,""); //隐藏工具条，设置适高显示
			// LODOP.SET_SHOW_MODE("PREVIEW_IN_BROWSE",true); //预览界面内嵌到页面内
			LODOP.PREVIEW();//打印预览
			// LODOP.PRINT();//打印
			// blPreviewOpen=true;
	  }
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
<!-- <?php
// if(1 == 1) {
// 	echo '<script type="text/javascript">alert("消费成功！");</script>';
// }
?> -->
</html>