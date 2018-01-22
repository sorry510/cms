<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="zh-CN" xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php echo $this->fun_fetch('inc_head', ''); ?>
</head>
<body class="layui-layout-body">
	<div class="layui-layout layui-layout-admin">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_left', ''); ?>
		<div id="laimi-content" class="layui-body">
			<div class="layui-tab layui-tab-brief">
				<ul class="layui-tab-title">
					<li class="layui-this">
						<a href="system_score.php">积分换礼</a>
					</li>
					<li>
						<a href="system_gift.php">礼品管理</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-system-score layui-tab-content">
<form class="layui-form">		    
	<div class="laimi-tools layui-form-item">		  	
		<label class="layui-form-label">搜索</label>
		<div class="layui-input-inline">
			<input class="layui-input laimi-focus" type="text" name="key" placeholder="卡号/手机号/姓名" value="<?php echo htmlspecialchars($GLOBALS['strkey']); ?>">
		</div>
		<label class="layui-form-label">日期</label>
		<div class="layui-input-inline">
			<input id="laimi-from" class="layui-input laimi-input-100" type="text" name="from" placeholder="yyyy-MM-dd" value="<?php echo $GLOBALS['strfrom']; ?>">
		</div>
		<label class="layui-form-label">至</label>
		<div class="layui-input-inline">
			<input id="laimi-to" class="layui-input laimi-input-100" type="text" name="to" placeholder="yyyy-MM-dd" value="<?php echo $GLOBALS['strto']; ?>">
		</div>
		<div class="layui-input-inline">
			<button class="layui-btn layui-btn-normal">搜索</button>
		</div>
		<div class="laimi-float-right">
			<a class="layui-btn laimi-add">积分换礼</a>
		</div>
	</div>
</form>
<table class="layui-table">
	<thead>
		<tr>
			<th>日期</th>
			<th>卡号</th>
			<th>会员姓名</th>
			<th>兑换内容</th>
			<th>兑换积分</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($this->_data['gift_record_list']['list'] as $row) { ?>
		<tr>
			<td><?php echo date("Y-m-d H:i", $row['gift_record_atime']); ?></td>
			<td><?php echo $row['c_card_code']; ?></td>
			<td><?php echo $row['c_card_name']; ?></td>
			<td><?php echo $row['mycontent'];?></td>
			<td><?php echo $row['gift_record_score']; ?>分</td>
		</tr>
		<?php } ?>
	</tbody>
</table>
<div class="laimi-page">
	<div id="laimi-page-content"></div>
</div>
				</div>
			</div>
		</div>
	</div>
	<!--积分换礼弹出层开始-->
	<script type="text/html" id="laimi-script-add">
		<div id="laimi-modal-add" class="laimi-modal">
			<form class="layui-form" lay-filter="laimi-form-add">
				<blockquote class="layui-elem-quote" style="padding:8px;">
					<div class="layui-form-item">
				    <label class="layui-form-label" style="width:60px;">搜索条件</label>
						<div class="layui-input-inline">
							<input class="layui-input laimi-key-add" type="text" placeholder="卡号/手机号">
						</div>
				    <div class="layui-inline">
				       <button class="layui-btn layui-btn-normal laimi-search-add" type="button">搜索</button>
				    </div>
						<div class="layui-inline laimi-card-add" card_id="0" s_card_yscore="0" style="margin-left:20px;"></div>
			  	</div>
				</blockquote>
				<div style="overflow-y:auto; height:300px;">
				<table class="layui-table">
					<thead>
						<tr>
							<th width="30"><input type="checkbox" lay-skin="primary" lay-filter="checkall"></th>
							<th>礼品名称</th>
							<th>扣除积分</th>
							<th>数量</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($this->_data['gift_list'] as $row) { ?>
						<tr>
							<td><input class="laimi-check" type="checkbox" name="txtid[]" gift_id="<?php echo $row['gift_id']; ?>" lay-skin="primary" lay-filter="checkone"></td>
							<td><?php echo $row['gift_name']; ?></td>
							<td><?php echo $row['gift_score']; ?>分</td>
							<td>
								<div class="layui-input-inline">
									<button class="layui-btn layui-btn-primary layui-btn-small laimi-dec" type="button" gift_id="<?php echo $row['gift_id']; ?>" style="width:35px; height:30px;">
										<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-jian"></use></svg>
									</button>
								</div>
								<div class="layui-input-inline" style="width:40px;">
									<input class="layui-input laimi-count" type="text" name="txtcount[]" value="1" gift_id="<?php echo $row['gift_id']; ?>" gift_name="<?php echo $row['gift_name']; ?>" gift_score="<?php echo $row['gift_score']; ?>" lay-verify="number" style="padding-left:0px;height:30px;text-align:center;">
								</div>
								<div class="layui-input-inline">
									<button type="button" class="layui-btn layui-btn-primary layui-btn-small laimi-plus" gift_id="<?php echo $row['gift_id']; ?>" style="width:35px; height:30px;">
										<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-jia"></use></svg>
									</button>
								</div>
							</td>
						</tr>
						<?php } ?>
					</tbody>
					</table>
				</div>
				<div class="layui-input-inline" style="margin-top:20px;">
					累计扣除积分：<span class="laimi-use-score">0</span>分，剩余积分：<span class="laimi-left-score">0</span>分
				</div>
				<div class="layui-input-inline laimi-float-right" style="margin-top:20px;">
					<button class="layui-btn laimi-button-100 laimi-do-add" lay-filter="laimi-submit-add" lay-submit style="margin-right:30px;">
						兑换礼品
					</button>
				</div>
			</form>
		</div>
	</script>
	<!--积分换礼弹出层结束-->
<?php echo $this->fun_fetch('inc_foot', ''); ?>
	<script>
	layui.use(["layer", "element", "laydate", "laypage", "form"], function() {
		var $ = layui.jquery;
		var objlayer = layui.layer;
		var objelement = layui.element;
		var objdate = layui.laydate;
		var objpage = layui.laypage;
		var objform = layui.form;

		$('.laimi-focus').focus();
		
		objdate.render({
			elem: '#laimi-from'
		});
		objdate.render({
			elem: '#laimi-to'
		});
		objpage.render({
			elem: 'laimi-page-content',
			count: <?php echo $this->_data['gift_record_list']['allcount']; ?>,
			limit: 50,
			curr: <?php echo $this->_data['gift_record_list']['pagenow']; ?>,
			layout: ['count', 'prev', 'page', 'next',  'skip'],
			jump: function(obj, first){
				if(!first) {
					window.location = "system_score.php?<?php echo api_value_query($this->_data['request']);?>&page=" + obj.curr;
       }
			}
		});
		$(".laimi-add").on("click", function() {
			objlayer.open({
				type: 1,
				title: ["积分换礼", "font-size:16px;"],
				btnAlign: "r",
				area: ["680px", "auto"],
				shadeClose: true,//点击遮罩关闭
				content: $("#laimi-script-add").html(),
			});
			objform.render(null, "laimi-form-add");
		});
		$(document).on("click", ".laimi-search-add", function() {
			var strkey = $("#laimi-modal-add .laimi-key-add").val();
			$.getJSON("pub_card_ajax.php", {key:strkey}, function(objdata) {
				var obj = $("#laimi-modal-add .laimi-card-add");
				if(objdata.card_id) {
					obj.attr("card_id", objdata.card_id);
					obj.attr("s_card_yscore", objdata.s_card_yscore);
					obj.text(objdata.card_name + "，余" + objdata.s_card_yscore + "分。");
				} else {
					obj.attr("card_id", "0");
					obj.attr("s_card_yscore", "0");
					obj.text("");
					objlayer.alert('没有找到符合条件的会员！', {
						title: '提示信息'
					});
				}
				score_do();
			});
		});
		objform.on('checkbox(checkall)', function(objdata) {
		  $("#laimi-modal-add .laimi-check").prop("checked", objdata.elem.checked);
		  objform.render(null, "laimi-form-add");
		  score_do();
		});
		objform.on('checkbox(checkone)', function() {
		  score_do();
		});
		$(document).on("click", ".laimi-dec", function() {
		  var obj = $("#laimi-modal-add .laimi-count[gift_id=" + $(this).attr("gift_id") + "]");
		  var int = parseInt(obj.val());
		  if(isNaN(int)) {
		  	int = 1;
		  } else if(int < 2) {
		  	int = 1;
		  } else {
		  	int = int - 1;
		  }
		  obj.val(int);
		  score_do();
		});
		$(document).on("click", ".laimi-plus", function() {
			var obj = $("#laimi-modal-add .laimi-count[gift_id=" + $(this).attr("gift_id") + "]");
		  var int = parseInt(obj.val());
		  if(isNaN(int)) {
		  	int = 1;
		  } else {
		  	int = int + 1;
		  }
		  obj.val(int);
		  score_do();
		});
		$(document).on("input propertychange", ".laimi-count", function() {
			var int = parseInt($(this).val());
		  if(isNaN(int)) {
		  	int = 1;
		  }
		  $(this).val(int);
			score_do();
		});
		objform.on("submit(laimi-submit-add)", function(objdata) {
			return false;
		});
		$(document).on("click", ".laimi-do-add", function() {
			$(this).attr("disabled", true);
			var obj = $("#laimi-modal-add .laimi-card-add");
			var strcard = obj.attr("card_id");
			if(strcard == 0) {
				objlayer.alert('请先选择一个会员！', {
					title: '提示信息'
				});
				$(this).attr("disabled", false);
				return;
			}
			if($("#laimi-modal-add .laimi-left-score").text() < 0) {
				objlayer.alert('积分余额不足！', {
					title: '提示信息'
				});
				$(this).attr("disabled", false);
				return;
			}
			var arr1 = new Array();
			var obj1 = new Object();
			var objcount = null;
			$("#laimi-modal-add .laimi-check:checked").each(function() {
				objcount = $("#laimi-modal-add .laimi-count[gift_id=" + $(this).attr("gift_id") + "]");
				obj1 = {"gift_id":objcount.attr("gift_id"),"gift_count":objcount.val()};
				arr1.push(obj1);
			});
			if(arr1.length == 0) {
				objlayer.alert('请选择兑换礼品！', {
					title: '提示信息'
				});
				$(this).attr("disabled", false);
				return;
			}
			var objdata = {
	      card: strcard,
	      arr1:arr1,
		  }
		  $.post("system_score_add_do.php", objdata, function(strdata) {
		    if(strdata == 0) {
		      window.location="system_score.php";
		    } else {
		      objlayer.alert("添加积分换礼失败，请联系管理员！", {
						title: '提示信息'
					});
		      $(".laimi-do-add").attr("disabled", false);
		    }
		  });
		});
		function score_do() {
			var objcard = $("#laimi-modal-add .laimi-card-add");
			if(objcard.attr("card_id") == 0) {
				return;
			}
			var intcard = objcard.attr("s_card_yscore");
			
			var objcount = null;
			var intuse = 0;
			$("#laimi-modal-add .laimi-check:checked").each(function() {
				objcount = $("#laimi-modal-add .laimi-count[gift_id=" + $(this).attr("gift_id") + "]");
				intuse = intuse + objcount.attr("gift_score") * objcount.val();
			});
			
			$("#laimi-modal-add .laimi-use-score").text(intuse);
			$("#laimi-modal-add .laimi-left-score").text(intcard - intuse);
		}
	});
	</script>
</body>
</html>