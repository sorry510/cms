<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title></title>
    <script src="js/mui.min.js"></script>
    <script src="http://at.alicdn.com/t/font_485373_ir4fvm75c4ygb9.js"></script>
    <link href="css/mui.min.css" rel="stylesheet"/>
    <link href="css/laimi.css" rel="stylesheet"/> 
</head>
<body id="laimi-body">
<header id="laimi-header" class="mui-bar mui-bar-nav">
	<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
	<h1 class="mui-title laimi-color-white laimi-font14" style="line-height:40px;">我的预约</h1>
</header>
<div id="laimi-content" class="mui-content">
	<?php foreach($this->_data['reserve'] as $row) { ?>
	<div class="mui-card laimi-first" style="padding:6px;">
		<div class="mui-card-header mui-card-media laimi-card-header1">	
			<div class="laimi-font14" style="line-height:22px;">
				<p>
					<svg class="laimi-icon2" aria-hidden="true">
					    <use xlink:href="#icon-daoqi"></use>
					</svg>
					&nbsp;预约时间：<?php echo date('Y-m-d H:i',$row['reserve_dtime']);?>
				</p>
				<p class="laimi-font14 laimi-color-orange" style="line-height:22px;">预约项目：<?php echo $row['mgoods'];?></p>
				<button type="button" class="
				<?php if ($row['reserve_here'] == 2) {
					if ($row['reserve_state'] == 1) {
						echo 'mui-btn mui-btn-primary';
					}else{
						echo 'mui-btn mui-btn-grey';
					}
				}else{
					echo 'mui-btn mui-btn-warning';
				};?>" style="position: absolute;right:10px; top:10px;height:30px;">
				<?php if ($row['reserve_here'] == 2) {
					if ($row['reserve_state'] == 1) {
						echo '未到店';
					}else{
						echo '已取消';
					}
				}else{
					echo '已到店';
				};?></button>
			</div>
		</div>
		<div class="laimi-color-gray laimi-font12" style="line-height:30px;margin-left:10px;">
			<span class="laimi-font12">预约人数：<?php echo $row['reserve_count'];?>人</span>
			<span class="laimi-font12" style="float:right; margin-right:10px;">
				<svg class="laimi-icon2" aria-hidden="true">
				    <use xlink:href="<?php if ($row['reserve_type'] == 1) {
				    	echo '#icon-dianhua';
				    }else{
				    	echo '#icon-weixin1';
				    };?>"></use>
				</svg>
				<?php echo date('Y-m-d H:i',$row['reserve_atime']);?>
			</span>
		</div>
	</div>
	<?php };?>
</div>
 <script type="text/javascript" charset="utf-8">
    mui.init();
  	var phoneis = '<?php echo $this->_data['card_info']['card_phone']; ?>';
  	mui.ready(function(){
  		if(phoneis == ''){
  			show();
  		}
  	})
  	mui('body').on('tap', '.laimi-valid', function(){
  	  var _this = this;
  	  var maxtime = 60;
  	  var phone = mui('.laimi-tel')[0].value;
  	  if(!isPhone(phone)){
  	    alert('请填写正确的手机号码');
  	    return false;
  	  }
  	  // 获取验证码
  	  _this.disabled = true;
  	  _this.innerHTML = maxtime+'秒后重试';
  	  var time = setInterval(function() {
  	    maxtime--;
  	    _this.innerHTML = maxtime+'秒后重试';
  	    if(maxtime <= 0){
  	      clearInterval(time);
  	      _this.innerHTML = '获取验证码';
  	      _this.disabled = false;
  	    }
  	  }, 1000);
  	  
  	  mui.post('phone_sms_ajax.php', {phone: phone}, function(res){
  	    if(res == 0){
  	      alert('短信已发出请及时接收');
  	    }else if(res=='2'){
  	      alert('短信余额已不足');
  	    }else{
  	      alert(res);
  	    }
  	  });
  	});
  	mui('body').on('tap', '.laimi-btn-phone', function(){
  	  var phone = mui('.laimi-tel')[0].value || '';
  	  var verify = mui('.laimi-verify')[0].value || '';
  	  if(phone == '' || verify == ''){
  	    return false;
  	  }
  	  mui.ajax({
  	    url: './phone_bind_ajax.php',
  	    data: {
  	      phone: phone,
  	      verify: verify
  	    },
  	    dataType:"text",
  	    type:"post",
  	    timeout:5000,
  	    success: function(res){
  	      if(res == 0){
  	        alert('绑定成功');
  	        window.location.reload();
  	      }else if(res == 1){
  	        alert('验证码错误');
  	      }else if(res == 2){
  	        alert('验证码超时');
  	      }else if(res == 3){
  	        alert('没有此用户');
  	      }else if(res == 4){
  	        alert('您已经绑定过了');
  	      }else{
  	        alert('绑定失败');
  	      }
  	    },
  	    error: function(xhr, type, errorThrown){
  	      mui.alert("网络不给力，请稍后重试！", "提示信息");
  	    }
  	  })
  	})
  	function show() { //信息框
  	  layer.open({
  	    title: ['绑定手机号','background-color:#0162CB; color:#ffffff; height:36px; margin-top:0px;line-height:36px;'],
  	    Boolean: 'true',
        content: '<div style=text-align:left;><input class="laimi-tel" type="text" placeholder="手机号码" style="font-size:14px; width:160px;height:28px;padding:3px;padding-left:10px;"/></div><div style=text-align:left;><input type="text" class="laimi-verify" placeholder="验证码" style="font-size:14px; width:80px;height:28px;padding:3px;padding-left:10px;"/>&nbsp;&nbsp;<button type="button" class="mui-btn mui-btn-warning laimi-valid" style="padding:7px 8px;font-size:14px;">获取验证码</button></div><div style=text-align:left;margin-right:16px;><button type="button" class="mui-btn mui-btn-primary mui-btn-block laimi-btn-phone" style="font-size:14px;padding:8px;width:100%;">绑定手机号</button></div>',
        style: 'width:80%; height:auto;',
        end: function () {
          // window.history.go(-1);
          window.location.reload();
        }
  	  });
  	}
  	function isPhone(phone) {
  	  var myreg = /^[1][3,4,5,7,8][0-9]{9}$/;
  	  if (!myreg.test(phone)) {
  	      return false;
  	  } else {
  	      return true;
  	  }
  	}
</script>
</body>
</html>