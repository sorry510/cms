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
<script language="javascript" src="../js/LodopFuncs.js"></script>
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
    <div class="laimi-line">
			会员卡号：<?php echo $this->_data['record_info']['c_card_code']; ?>
    </div>
    <div class="laimi-line">
			会员姓名：<?php echo $this->_data['record_info']['c_card_name']; ?>
    </div>
    <div class="laimi-line">
			卡类型：<?php echo $this->_data['record_info']['cardtype']; ?>(<?php echo $this->_data['record_info']['discount']; ?>折)
    </div>
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
	    	<!-- <table class="layui-table">
				  <thead>
				    <tr>
				      <th width="400">名称</th>
				      <th>数量</th>
				      <th>单价</th>
				      <th>优惠价</th>
				    </tr>
				  </thead>
				  <tbody>
				  {{#  layui.each(d.mcombo_goods_list, function(index, item){ }}
				    <tr>
				      <td>{{item.c_mgoods_name}}</td>
				      <td>{{item.card_record2_mcombo_gcount}}</td>
				      <td style="text-decoration:line-through;">¥{{item.c_mgoods_price}}</td>
				      <td>{{item.c_mgoods_cprice != 0 ? '¥'+item.c_mgoods_cprice : '--'}}</td>
				    </tr>
				  {{# }) }}
				    <tr>
				      <td colspan="4" style="text-align:right;">共{{d.mcombo_goods_count}}件，合计<span class="laimi-color-ju">¥{{d.mcombo_goods_money}}</span>，实收<span class="laimi-color-ju" style="font-size:18pt;">¥{{d.card_record_smoney}}</span>&nbsp;&nbsp;</td>
				    </tr>
				  </tbody>
				</table> -->
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
				  {{# layui.each(d.goods_list, function(index, item){ }}
				    <tr>
				      <td>{{item.c_mgoods_name || item.c_sgoods_name}}</td>
				      <td>{{item.card_record3_goods_count}}</td>
				      <td style="text-decoration:line-through;">¥{{item.c_mgoods_price != 0 ? item.c_mgoods_price : item.c_sgoods_price}}</td>
				      <td>¥{{item.c_mgoods_rprice != 0 ? item.c_mgoods_rprice : item.c_sgoods_rprice}}</td>
				    </tr>
				  {{# }) }}
				  {{# layui.each(d.mcombo_goods_list2, function(index, item){ }}
				    <tr>
				      <td>{{item.c_mgoods_name}}(套餐)</td>
				      <td>{{item.card_record3_mgoods_count}}</td>
				      <td style="text-decoration:line-through;">¥{{item.c_mgoods_price}}</td>
				      <td>{{item.c_mgoods_cprice != 0 ? '¥'+item.c_mgoods_cprice : '--'}}</td>
				    </tr>
				  {{# }) }}
				    <tr>
				      <td colspan="4" style="text-align:right;">共{{d.goods_count + d.mcombo_goods_count2}}件，合计<span class="laimi-color-ju">¥{{d.goods_money + d.mcombo_goods_money2}}</span>，实收<span class="laimi-color-ju" style="font-size:18pt;">¥{{d.card_record_smoney}}</span>&nbsp;&nbsp;</td>
				    </tr>
				    <tr>
				      <td colspan="4" style="text-align:left;">优惠：满100元减10元&nbsp;&nbsp;×1</td>
				    </tr>
				  {{# if(d.ticket_list.length > 0){ }}
					    <tr>
				      <td colspan="4" style="text-align:left;">赠送优惠券：
							{{# layui.each(d.ticket_list, function(index, item){ }}
				      {{item.c_ticket_name}}&nbsp;&nbsp;×{{item.count}}（{{item.c_ticket_value}}元）;
							{{# }) }}
				      </td>
				    </tr>
				  {{# } }}
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
    <div class="laimi-line">
			实收金额：¥<?php echo $this->_data['record_info']['card_record_smoney']; ?>
    </div>
    <div class="laimi-line">
			手动优惠：¥<?php echo $this->_data['record_info']['card_record_jmoney']; ?>
    </div>
    <div class="laimi-line hr"></div>
    <div class="laimi-line">
			卡余额：¥<?php echo $this->_data['record_info']['card_record_emoney']; ?>
    </div>
    <div class="laimi-line">
			卡余套餐：¥<?php echo $this->_data['record_info']['card_record_jmoney']; ?>
    </div>
  <?php } ?>
    <div class="laimi-line hr"></div>
    <div class="laimi-line">
			<?php echo $this->_data['record_info']['shop_name']; ?>
    </div>
    <div class="laimi-line">
			电话：<?php echo $this->_data['record_info']['shop_phone']; ?>
    </div>
    <div class="laimi-line" style="white-space:normal; word-break:break-all; min-height:40pt;">
			地址：<?php echo $this->_data['record_info']['address']; ?>
    </div>
<!--     <div class="laimi-line" style="margin:12pt 0; text-align:center; font-size:10pt; font-weight:bold;">
  谢谢惠顾，欢迎下次光临~
</div> -->

	</div>
</body>
<script type="text/javascript" language="javascript">
	var LODOP;
	function CreateOnePage(){
		LODOP=getLodop();
		var strBodyStyle="<style>"+document.getElementById("style1").innerHTML+"</style>";
		var strFormHtml=strBodyStyle+"<body>"+document.getElementById("laimi-container").innerHTML+"</body>";
		LODOP.PRINT_INIT("打印");
		LODOP.ADD_PRINT_HTM(0,0,'100%','100%',strFormHtml);
		LODOP.SET_PRINT_PAGESIZE(3,580,0,'');//设定纸张大小
	};
	// function Print(){
	// 	CreateOnePage();
	// 	LODOP.PREVIEW();
	// }
	function OpenPreview() {
		CreateOnePage();
		// LODOP.SET_PRINT_MODE("PRINT_PAGE_PERCENT","Full-Page");//按整页缩放
		// LODOP.SET_SHOW_MODE("HIDE_PAPER_BOARD",true);//隐藏走纸板
		// LODOP.SET_PREVIEW_WINDOW(0,3,0,0,0,""); //隐藏工具条，设置适高显示
		// LODOP.SET_SHOW_MODE("PREVIEW_IN_BROWSE",true); //预览界面内嵌到页面内
		LODOP.PREVIEW();
		// LODOP.PRINT();
		// blPreviewOpen=true;
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