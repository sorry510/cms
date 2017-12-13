<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title></title>
    <script src="js/mui.min.js"></script>
    <script src="js/mui.picker.min.js"></script>
    <script src="http://at.alicdn.com/t/font_485373_jtxfnkz96dlblnmi.js"></script>
    <link href="css/mui.min.css" rel="stylesheet"/>
    <link href="css/laimi.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="css/mui.picker.min.css" />
</head>
<body id="laimi-body">
<header id="laimi-header" class="mui-bar mui-bar-nav">
	<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
	<h1 class="mui-title laimi-color-white laimi-font14" style="line-height:40px;">我的信息</h1>
</header>
<div id="laimi-content" class="mui-content">
	<form class="mui-input-group laimi-form" action="./center_shop_my_do.php" method="post">
	<div class="mui-card laimi-first">
    <div class="mui-table-view-cell">
    	<span class="mui-badge mui-badge-inverted" style="font-size:14px;">游泳的鱼</span>
				微信昵称
    <input type="hidden" name="id" class="mui-input-clear" value="<?php echo $this->_data['card_info']['card_id']; ?>">
    </div>
    <div class="mui-table-view-cell">
    	<span class="mui-badge mui-badge-inverted" style="font-size:14px;"><?php echo $this->_data['card_info']['card_code']; ?></span>
    	会员卡号
    </div>
    <div class="mui-table-view-cell">
    	<span class="mui-badge mui-badge-inverted" style="font-size:14px;"><?php echo $this->_data['card_info']['card_phone']; ?></span>
    	手机号码
    </div>
    <div class="mui-input-row">
        <label>会员姓名</label>
    <input type="text" name="cardname" class="mui-input-clear" placeholder="请输入姓名" value="<?php echo $this->_data['card_info']['card_name']; ?>">
    </div>
    <div class="mui-input-row">
        <label>会员密码</label>
    <input type="password" name="password" class="mui-input-password" placeholder="请输入密码">
    </div>
		<div class="mui-table-view-cell">
			<a href="javascript:;" id='date1' class="mui-navigate-right" data-options='{}'>
				<span class="mui-badge mui-badge-danger mui-badge-inverted laimi-birthday" style="font-size:14px;font-family:'Segoe UI';"><?php echo $this->_data['card_info']['date']; ?></span>
				出生日期
				<input type="hidden" name="birthday" class="date1" value="<?php echo $this->_data['card_info']['date']; ?>">
			</a>
		</div>
	</div>
	<div class="mui-content-padded">
     <button type="submit" class="mui-btn mui-btn-warning mui-btn-block laimi-botton laimi-submit">完成</button>
  </div>
  </form>
</div>
 <script type="text/javascript" charset="utf-8">
    mui.init();
    mui.init();
    var result = mui('.laimi-birthday')[0];
    var date1 = mui('.date1')[0];
    mui('#date1')[0].addEventListener('tap', function() {
    	var _self = this;
    	if(_self.picker) {
    		_self.picker.show(function (rs) {
    			result.innerText =  rs.text;
    			date1.value = rs.text;
    			_self.picker.dispose();
    			_self.picker = null;
    		});
    	} else {
    		/*
    		 * 首次显示时实例化组件
    		 * 示例为了简洁，将 options 放在了按钮的 dom 上
    		 * 也可以直接通过代码声明 optinos 用于实例化 DtPicker
    		 */
    		_self.picker = new mui.DtPicker({
    		    type: "date",//设置日历初始视图模式 
    		    beginDate: new Date(1900, 01, 01),//设置开始日期 
    		    // endDate: new Date(2016, 04, 25),//设置结束日期 
    		    // labels: ['Year', 'Mon', 'Day', 'Hour', 'min'],//设置默认标签区域提示语 
    		    // customData: { 
    		    //     h: [
    		    //         { value: 'AM', text: 'AM' },
    		    //         { value: 'PM', text: 'PM' }
    		    //     ] 
    		    // }//时间/日期别名
    		})
    		_self.picker.show(function(rs) {
    			/*
    			 * rs.value 拼合后的 value
    			 * rs.text 拼合后的 text
    			 * rs.y 年，可以通过 rs.y.vaue 和 rs.y.text 获取值和文本
    			 * rs.m 月，用法同年
    			 * rs.d 日，用法同年
    			 * rs.h 时，用法同年
    			 * rs.i 分（minutes 的第二个字母），用法同年
    			 */
    			result.innerText = rs.text;
    			date1.value = rs.text;
    			/*
    			 * 返回 false 可以阻止选择框的关闭
    			 * return false;
    			 */
    			/*
    			 * 释放组件资源，释放后将将不能再操作组件
    			 * 通常情况下，不需要示放组件，new DtPicker(options) 后，可以一直使用。
    			 * 当前示例，因为内容较多，如不进行资原释放，在某些设备上会较慢。
    			 * 所以每次用完便立即调用 dispose 进行释放，下次用时再创建新实例。
    			 */
    			_self.picker.dispose();
    			_self.picker = null;
    		});
    	}
    }, false);
    // mui('.laimi-submit')[0].addEventListener('tap', function() {
    // 	// mui.post('', , function(){

    // 	// })
    // })
</script>
</body>
</html>