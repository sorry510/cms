<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title></title>
    <script src="js/mui.min.js"></script>
    <script src="js/iconfont.js"></script>
    <link href="css/mui.min.css" rel="stylesheet"/>
    <link href="css/laimi.css" rel="stylesheet"/>
    <style type="text/css">
    	.laimi-state{border:1px solid #FF5053;border-radius:3px;padding:1px 4px; color:#FF5053;}
    	/*toast信息提示*/
			.mui-toast-container {bottom: 50% !important;}
    </style>
</head>
<body id="laimi-body">
<header class="mui-bar mui-bar-nav">
	<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
	<h1 class="mui-title laimi-font14">选择收货地址</h1>
	<a class="mui-pull-right laimi-font12" style="margin-top:13px;" href="center_shop_address.php">
		管理收货地址
	</a>
</header>
<div id="laimi-content" class="mui-content">
	<?php foreach($this->_data['waddress'] as $row) { ?>
	<div class="mui-card mui-table-view mui-table-view-cell laimi-edit " id="<?php echo $row['waddress_id'];?>" style="margin:0px;padding:10px 12px;margin-top:6px;">
		<svg class="laimi-icon5 mui-pull-left" aria-hidden="true" style="height:14px;color:#1F84D1;margin-top:28px;">
		    <use xlink:href="#icon-dingwei1"></use>
		</svg>
		<div class="mui-media-body mui-navigate-right" style="white-space:normal;">
			<div class="laimi-clear <?php if ($row['waddress_state'] == 2) {
		echo "laimi-sign";
	};?>">
				<span class="laimi-font14" style="font-weight:bold;line-height:24px;"><?php echo $row['waddress_name'];?>，<?php echo $row['waddress_phone'];?></span>&nbsp;&nbsp;
				<?php if ($row['waddress_state'] == 2) { ?>
					<span class="laimi-font10 laimi-state" style="">默认地址</span>
				<?php };?>
			</div>
			<div class="laimi-color-gray laimi-font12" style="margin-right:30px;">
				<?php echo $row['waddress_detail'];?>
			</div>
		</div>
	</div>
	<?php };?>
</div>
<script type="text/javascript" charset="utf-8">
  mui.init();
	function hasClass(obj,cls) {  
	  return obj.className.match(new RegExp('(\\s|^)' + cls + '(\\s|$)'));  
	};  
  
	function addClass(obj,cls) {  
	  if (!hasClass(obj,cls)) obj.className += " " + cls;  
	}  
  
	function removeClass(obj,cls) {  
	  if (hasClass(obj,cls)) {  
	    var reg = new RegExp('(\\s|^)' + cls + '(\\s|$)');  
	    obj.className = obj.className.replace(reg, ' ');  
	  }  
	};   
  mui('#laimi-content').on('tap', '.laimi-edit', function(event) {
  	var _this = this;
  	var son = _this.getElementsByClassName('laimi-clear')[0];
		var id = this.getAttribute("id");
		mui.confirm('确认设置为默认地址吗', '提醒', ['确认', '取消'], function(e) {
			if (e.index == 0) {
				mui.ajax({
					url: 'address_edit_do.php',
					data: {id: id},
					dataType:"text",
					type:"post",
					timeout:5000,
					success: function(res){
						if(res == 0){
							var target = mui('.laimi-sign')[0];
  						var child = target.getElementsByClassName('laimi-state')[0];
							target.removeChild(child);
							removeClass(target,'laimi-sign');
							addClass(son,'laimi-sign');
							var span = document.createElement('span');
							span.innerHTML = "默认地址";
							span.setAttribute('class','laimi-font10 laimi-state');
							son.appendChild(span);
						}else{
							mui.toast('设置失败');
						}
					},
					error: function(xhr, type, errorThrown){
						mui.toast("网络不给力，请稍后重试！", "提示信息");
					}
				})
			}
		});
	});
</script>
</body>
</html>