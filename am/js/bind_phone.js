function bind_phone(mui, layer, cardid){
	if(cardid == 0){
		show();
	}
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
	      // alert('短信已发出请及时接收');
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
	        alert(res);
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
      shadeClose: false,
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
}