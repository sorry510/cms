<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="zh-CN" xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php echo $this->fun_fetch('inc_head', ''); ?>
<style type="text/css" media="screen">
	.hr{margin:20px 0; height:1px; width:100%; border-bottom:1px dashed #000;}
</style>
<script language="javascript" src="../js/LodopFuncs.js"></script>
</head>
<body>
	<object id="LODOP_X" classid="clsid:2105C259-1E0C-4534-8141-A753534CB4CA" width=100% height=500>
	        <param name="Color" value="#ADD8E6">
		<embed id="LODOP_EM" TYPE="application/x-print-lodop" width=100% height=500 color="#ADD8E6"  PLUGINSPAGE="install_lodop32.exe"></embed>
	</object>
	<div id="laimi-modal-info" class="laimi-modal">
		<div class="layui-row">
		  <div class="layui-col-md12" style="padding:20px 0;text-align:center;font-size:20px;font-weight:bold;">
	      <?php echo $this->_data['record_info']['shop_name']; ?>
	    </div>
	    <div class="layui-col-md12">
				消费时间:<?php echo $this->_data['record_info']['atime']; ?>
	    </div>
	    <div class="layui-col-md12">
				会员卡号:<?php echo $this->_data['record_info']['c_card_code']; ?>
	    </div>
	    <div class="layui-col-md12">
				会员姓名:<?php echo $this->_data['record_info']['c_card_name']; ?>
	    </div>
	    <div class="layui-col-md12">
				卡类型:(<?php echo $this->_data['record_info']['discount']; ?>)
	    </div>
	    <div class="layui-col-md12">
				消费类型:<?php echo $this->_data['record_info']['recordtype']; ?>
	    </div>
	    <div class="layui-col-md12 hr"></div>
	    <div class="layui-col-md12">
				实收金额:￥<?php echo $this->_data['record_info']['card_record_smoney']; ?>
	    </div>
	    <div class="layui-col-md12">
				手动优惠:￥<?php echo $this->_data['record_info']['card_record_jmoney']; ?>
	    </div>
	    <div class="layui-col-md12">
		    <?php if($this->_data['record_info']['card_record_type'] == 3) { ?>
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
					  {{# layui.each(d.goods_list, function(index, item){ }}
					    <tr>
					      <td>{{item.c_mgoods_name || item.c_sgoods_name}}</td>
					      <td>{{item.card_record3_goods_count}}</td>
					      <td style="text-decoration:line-through;">￥{{item.c_mgoods_price != 0 ? item.c_mgoods_price : item.c_sgoods_price}}</td>
					      <td>￥{{item.c_mgoods_rprice != 0 ? item.c_mgoods_rprice : item.c_sgoods_rprice}}</td>
					    </tr>
					  {{# }) }}
					  {{# layui.each(d.mcombo_goods_list2, function(index, item){ }}
					    <tr>
					      <td>{{item.c_mgoods_name}}(套餐)</td>
					      <td>{{item.card_record3_mgoods_count}}</td>
					      <td style="text-decoration:line-through;">￥{{item.c_mgoods_price}}</td>
					      <td>{{item.c_mgoods_cprice != 0 ? '￥'+item.c_mgoods_cprice : '--'}}</td>
					    </tr>
					  {{# }) }}
					    <tr>
					      <td colspan="4" style="text-align:right;">共{{d.goods_count + d.mcombo_goods_count2}}件，合计<span class="laimi-color-ju">￥{{d.goods_money + d.mcombo_goods_money2}}</span>，实收<span class="laimi-color-ju" style="font-size:18px;">￥{{d.card_record_smoney}}</span>&nbsp;&nbsp;</td>
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
					      <td style="text-decoration:line-through;">￥{{item.c_mgoods_price}}</td>
					      <td>{{item.c_mgoods_cprice != 0 ? '￥'+item.c_mgoods_cprice : '--'}}</td>
					    </tr>
					  {{# }) }}
					    <tr>
					      <td colspan="4" style="text-align:right;">共{{d.mcombo_goods_count}}件，合计<span class="laimi-color-ju">￥{{d.mcombo_goods_money}}</span>，实收<span class="laimi-color-ju" style="font-size:18px;">￥{{d.card_record_smoney}}</span>&nbsp;&nbsp;</td>
					    </tr>
					  </tbody>
					</table> -->
				<?php } ?>
	    </div>
	    <div class="layui-col-md12 hr"></div>
	    <div class="layui-col-md12">
				卡余额:￥<?php echo $this->_data['record_info']['card_record_jmoney']; ?>
	    </div>
	    <div class="layui-col-md12">
				卡余套餐:￥<?php echo $this->_data['record_info']['card_record_jmoney']; ?>
	    </div>
	    <div class="layui-col-md12 hr"></div>
	    <div class="layui-col-md12">
				<?php echo $this->_data['record_info']['shop_name']; ?>
	    </div>
      <div class="layui-col-md12">
				电话:<?php echo $this->_data['record_info']['shop_phone']; ?>
      </div>
      <div class="layui-col-md12">
				地址:<?php echo $this->_data['record_info']['shop_area_address']; ?>
	    </div>
      <div class="layui-col-md12">
      	<a class="layui-btn layui-btn-normal" href="javascript:Print()">打印预览</a>
      </div>
		</div>
	</div>
</body>
<script type="text/javascript" language="javascript">
	var LODOP;
	function CreateOnePage(){
		LODOP=getLodop();
		LODOP.PRINT_INIT("打印控件功能演示_Lodop功能_表单一");
		LODOP.SET_PRINT_STYLE("FontSize",18);
		LODOP.SET_PRINT_STYLE("Bold",1);
		// LODOP.ADD_PRINT_TEXT(50,231,260,39,"打印页面部分内容");
		LODOP.ADD_PRINT_HTM(88,200,350,600,document.getElementById("laimi-modal-info").innerHTML);
	};
	function Print(){
		CreateOnePage();
		LODOP.PREVIEW();
	}
	function OpenPreview() {
	  LODOP=getLodop(document.getElementById('LODOP_X'),document.getElementById('LODOP_EM')); 
		LODOP.PRINT_INIT("打印控件Lodop功能演示_自己设计预览界面");
		LODOP.SET_PRINT_STYLE("FontSize",21);
		// LODOP.ADD_PRINT_TEXT(50,231,260,39,"打印页面部分内容");
		LODOP.ADD_PRINT_HTM(88,200,350,600,document.getElementById("laimi-modal-info").innerHTML);
		LODOP.SET_PRINT_PAGESIZE(0,1380,2450,"A4");
		LODOP.SET_PRINT_MODE("PRINT_PAGE_PERCENT","Full-Page");//按整页缩放
		LODOP.SET_SHOW_MODE("HIDE_PAPER_BOARD",true);//隐藏走纸板
		LODOP.SET_PREVIEW_WINDOW(0,3,0,0,0,""); //隐藏工具条，设置适高显示
		LODOP.SET_SHOW_MODE("PREVIEW_IN_BROWSE",true); //预览界面内嵌到页面内
		// LODOP.PREVIEW();
		// LODOP.PRINT();
		blPreviewOpen=true;
	};
	if (needCLodop()) {
		window.On_CLodop_Opened=function(){
			OpenPreview();
			window.On_CLodop_Opened=null;
		};
	} else
	window.onload = function(){OpenPreview();};
</script>
</html>