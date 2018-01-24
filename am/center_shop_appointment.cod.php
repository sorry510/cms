<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title></title>
    <script src="./js/mui.min.js"></script>
    <script src="http://at.alicdn.com/t/font_485373_jtxfnkz96dlblnmi.js"></script>
    <link href="css/mui.min.css" rel="stylesheet"/>
    <link href="css/laimi.css" rel="stylesheet"/> 
    <link rel="stylesheet" href="css/mui.picker.min.css" />
</head>
<body id="laimi-body">
	<header id="laimi-header" class="mui-bar mui-bar-nav">
		<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
		<h1 class="mui-title laimi-color-white laimi-font14" style="line-height:40px;">微信预约</h1>
	</header>
	<div id="laimi-content" class="mui-content">
		<div class="mui-card laimi-first" style="padding:6px;">
			<div class="mui-card-header mui-card-media laimi-card-header1">
				<img src="img/store.png" style="width:52px;height:52px;margin-right:10px;border-radius:50px;">
				<div class="mui-media-body laimi-font16" style="line-height:24px;">
					<?php echo $this->_data['shop']['shop_name']; ?>
					<p class="laimi-font12" style="line-height:26px;">电话：<?php echo $this->_data['shop']['shop_phone']; ?></p>
				</div>
			</div>
			<div class="laimi-color-gray laimi-font12" style="line-height:30px;margin-left:10px;">
				地址：<?php echo $this->_data['shop']['shop_area_address']; ?>
			</div>
		</div>
		<div class="mui-card laimi-first">
			<ul class="mui-table-view laimi-table-view">
				<li class="mui-table-view-cell">
					<span class="laimi-font12 laimi-color-orange">预约后请按时到店，如取消请提前联系我们，谢谢。</span>
				</li>
				<li class="mui-table-view-cell">				
					<span class="mui-badge mui-badge-inverted">
						<input type="text" name="card_name" placeholder="您的姓名" class="laimi-font14 laimi-input100" style="border:0px;text-align:right;" value="<?php echo $this->_data['assign']['card_name']?>">
						<input type="hidden" name="goods_id" value="<?php echo $this->_data['assign']['goods_id']?>">
					</span>
					会员姓名
				</li>
				<li class="mui-table-view-cell">
					<span class="mui-badge mui-badge-inverted">
						<input type="text" name="card_phone" placeholder="您的手机" class="laimi-font14 laimi-input100" style="border:0px;text-align:right;" value="<?php echo $this->_data['assign']['card_phone']?>">
					</span>
					手机号码
				</li>
				<li class="mui-table-view-cell btn">
					<a herf="javascript:;" class="mui-navigate-right"  data-options='{}'>
						<span class="mui-badge mui-badge-danger mui-badge-inverted laimi-dtime" style="font-size:14px;font-family:'Segoe UI';" id="laimi-time"><?php echo $this->_data['assign']['dtime']?></span>
						到店日期
					</a>
				</li>
				<li class="mui-table-view-cell">
					<span class="mui-badge mui-badge-inverted">
						<div class="mui-numbox" data-numbox-min='1' data-numbox-max='9' style="width:120px;height:30px;" >
							<button class="mui-btn mui-btn-numbox-minus" type="button">-</button>
							<input class="mui-input-numbox" value="<?php echo $this->_data['assign']['count']?>" type="number" name="count" style="font-size:14px;"/>
							<button class="mui-btn mui-btn-numbox-plus" type="button">+</button>
						</div>
					</span>
					到店人数
				</li>
				<li class="mui-table-view-cell">
					<a id="laimi-goods" class="mui-navigate-right" href="javascript:;">
						<span class="mui-badge mui-badge-inverted laimi-goods-name" style="font-size:14px;"><?php echo $this->_data['assign']['goods_name']?></span>
						服务项目
					</a>
				</li>
				<li class="mui-table-view-cell">						
					<span style="line-height:35px;">备注</span>
					<textarea id="textarea" name="memo" rows="5" placeholder="请填写备注" class="laimi-font14 laimi-color-gray" style="height:80px;padding:10px;"><?php echo $this->_data['assign']['memo']?></textarea>
				</li>
			</ul>		
		</div>
		<div id='result' class="ui-alert"></div>
		<div class="mui-content-padded">
	    <button type="button" class="mui-btn mui-btn-warning mui-btn-block laimi-botton laimi-submit">预约</button>
	  </div>
	</div>
<script src="./js/mui.picker.min.js"></script>
<script>
	mui.init();
	var btn = mui('.btn')[0];
	var result = mui('#laimi-time')[0];
	btn.addEventListener('tap', function() {
		var optionsJson = this.getAttribute('data-options') || '{}';
		var options = JSON.parse(optionsJson);
		/*
		 * 首次显示时实例化组件
		 * 示例为了简洁，将 options 放在了按钮的 dom 上
		 * 也可以直接通过代码声明 optinos 用于实例化 DtPicker
		 */
		var picker = new mui.DtPicker(options);
		picker.show(function(rs) {
			result.innerText = rs.text;
		  picker.dispose();
		});
	}, false);
	mui("#laimi-goods")[0].addEventListener('tap',function() {
		var card_name = mui("#laimi-content input[name='card_name']")[0].value;
		var card_phone = mui("#laimi-content input[name='card_phone']")[0].value;
		var goods_id = mui("#laimi-content input[name='goods_id']")[0].value;
		var dtime = mui("#laimi-time")[0].innerText;
		var count = mui("#laimi-content input[name='count']")[0].value;
		var memo = mui("#laimi-content textarea[name='memo']")[0].value;
		var url = encodeURI('center_shop_appointment_checkbox.php?card_name='+card_name+'&goods_id='+goods_id+'&card_phone='+card_phone+'&dtime='+dtime+'&count='+count+'&memo='+memo+'&shop_id='+<?php echo $GLOBALS['intshop_id'];?>);
		window.location.href = url;
	})
	mui(".laimi-submit")[0].addEventListener('tap',function(){
		var card_name = mui("#laimi-content input[name='card_name']")[0].value;
		var card_phone = mui("#laimi-content input[name='card_phone']")[0].value;
		var goods = <?php echo $GLOBALS['jsonarrmgoods'];?>;
		var dtime = mui("#laimi-time")[0].innerText;
		var count = mui("#laimi-content input[name='count']")[0].value;
		var memo = mui("#laimi-content textarea[name='memo']")[0].value;
		var shop_id = <?php echo $GLOBALS['intshop_id'];?>;
		var card_id = <?php echo api_value_int0($GLOBALS['_SESSION']['login_id'])?>;
		mui.post('center_shop_appointment_add_do.php',{
			card_name:card_name,
			card_phone:card_phone,
			goods:goods,
			dtime:dtime,
			count:count,
			memo:memo,
			shop_id:shop_id,
			card_id:card_id
		},function(res){
				if (res == 0) {
					window.location.href="center_shop_myappointment.php";
				}else if(res == 1){
					mui.alert('请您完善数据');
					console.log(res);
				}else if(res == 2){
					mui.alert('预约时间必须大于当前时间');
					console.log(res);
				}else{
					console.log(res);
					mui.alert('预约出现错误');
				}
			}
		);
	})
	
</script>
</body>
</html>