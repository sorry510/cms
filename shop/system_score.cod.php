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
			<input class="layui-input" type="text" name="key" placeholder="卡号/手机号/姓名" value="<?php echo $this->_data['request']['key']?>">
		</div>
		<label class="layui-form-label">日期</label>
		<div class="layui-input-inline">
			<input id="laimi-from" class="layui-input laimi-input-100" type="text" name="from" placeholder="yyyy-MM-dd" value="<?php echo $this->_data['request']['from']?>">
		</div>
		<label class="layui-form-label">至</label>
		<div class="layui-input-inline">
			<input id="laimi-to" class="layui-input laimi-input-100" type="text" name="to" placeholder="yyyy-MM-dd" value="<?php echo $this->_data['request']['to']?>">
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
			<th>分店</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($this->_data['gift_record_list']['list'] as $row){?>
		<tr>
			<td><?php echo $row['atime'];?></td>
			<td><?php echo $row['c_card_code'];?></td>
			<td><?php echo $row['c_card_name'];?></td>
			<td><?php echo $row['gift_goods'];?></td>
			<td><?php echo $row['gift_score'];?>分</td>
			<td><?php echo $row['shop_name'];?></td>
		</tr>
	<?php }?>
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
	<script type="text/html" id="laimi-add">
		<div id="laimi-modal-add" class="laimi-modal">
			<form class="layui-form" lay-filter="add">
				<blockquote class="layui-elem-quote" style="padding:8px;">
					<div class="layui-form-item">
				    <label class="layui-form-label" style="width:60px;">搜索条件</label>
						<div class="layui-input-inline">
							<input class="layui-input laimi-search" type="text" name="search" placeholder="卡号/手机号/姓名">
							<input class="laimi-card-id" type="hidden" name="id" value="0">
						</div>
				    <div class="layui-inline">
				       <button type="button" class="layui-btn layui-btn-normal laimi-card-search" lay-filter="search">搜索</button>
				    </div>
						<div class="layui-inline" style="margin-left:20px;">
							<span class="laimi-card-name">--</span>，余<span class="laimi-font2 laimi-card-score">0</span>分
						</div>
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
					<?php foreach($this->_data['gift_list'] as $row){ ?>
						<tr>
							<td><input gift="<?php echo $row['gift_id']; ?>" class="laimi-check" type="checkbox" name="txtid[]" lay-skin="primary" lay-filter="checkone"></td>
							<td><?php echo $row['gift_name']; ?></td>
							<td><?php echo $row['gift_score']; ?>分</td>
							<td>
								<div class="layui-input-inline">
									<button type="button" class="layui-btn layui-btn-primary layui-btn-small laimi-dec" value="<?php echo $row['gift_id']; ?>" style="width:35px; height:30px;">
										<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-jian"></use></svg>
									</button>
								</div>
								<div class="layui-input-inline" style="width:40px;">
									<input class="layui-input laimi-gift" type="text" gift="<?php echo $row['gift_id']; ?>" score="<?php echo $row['gift_score']; ?>" giftname="<?php echo $row['gift_name']; ?>" value="1" lay-verify="number" style="padding-left:0px;height:30px;text-align:center;">
								</div>
								<div class="layui-input-inline">
									<button type="button" class="layui-btn layui-btn-primary layui-btn-small laimi-plus" value="<?php echo $row['gift_id']; ?>" style="width:35px; height:30px;">
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
					累计扣除积分：<span class="laimi-font2 laimi-use-score">0</span>分，剩余积分：<span class="laimi-left-score">0</span>分
				</div>
				<div class="layui-input-inline laimi-float-right" style="margin-top:20px;">
					<button class="layui-btn laimi-button-100" lay-filter="laimi-submit" lay-submit style="margin-right:30px;">
						兑换礼品
					</button>
				</div>
			</form>
		</div>
	</script>
	<!--积分换礼弹出层结束-->
<?php echo $this->fun_fetch('inc_foot', ''); ?>
	<script>
	layui.use(["element", "laydate", "laypage", "layer", "form"], function() {
		var $ = layui.jquery;
		var objlayer = layui.layer;
		var objelement = layui.element;
		var objdate = layui.laydate;
		var objpage = layui.laypage;
		var objform = layui.form;
		objdate.render({
			elem: '#laimi-from'
		});
		objdate.render({
			elem: '#laimi-to'
		});
		objpage.render({
			elem: 'laimi-page-content',
			count: <?php echo $this->_data['gift_record_list']['allcount'];?>,
			limit: 5,
			curr: <?php echo $this->_data['gift_record_list']['pagenow'];?>,
			layout: ['count', 'prev', 'page', 'next',  'skip'],
			jump: function(obj, first){
				var search = "<?php echo api_value_query($this->_data['request']);?>";
				var url = window.location.pathname+'?'+'page='+obj.curr+'&'+search;
				if(!first){
					window.location.href = url;
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
				content: $("#laimi-add").html(),
				success: function(){
					objform.render(null, 'add');
				}
			});
		});
		objform.on('checkbox(checkall)', function(data){
		  $('.laimi-check').prop("checked", data.elem.checked);
		  objform.render(null, 'add');
		  getScore();
		});
		objform.on('checkbox(checkone)', function(){
		  getScore();
		});
		//查询会员
		$(document).on('click', '.laimi-card-search', function(){
			var search = $('#laimi-modal-add .laimi-search').val();
			$.getJSON('card_search_ajax.php', {search: search}, function(cardlist){
				//可能会有多个，暂时只处理第一个
				var cardinfo = cardlist[0];
				if(cardinfo){
					$("#laimi-modal-add .laimi-card-name").text(cardinfo.card_name);
					$("#laimi-modal-add .laimi-card-score").text(cardinfo.s_card_yscore);
					$("#laimi-modal-add .laimi-left-score").text(cardinfo.s_card_yscore);
					$("#laimi-modal-add .laimi-card-id").val(cardinfo.card_id);
				}else{
					$("#laimi-modal-add .laimi-card-name").text('--');
					$("#laimi-modal-add .laimi-card-score").text('0');
					$("#laimi-modal-add .laimi-left-score").text('0');
					$("#laimi-modal-add .laimi-card-id").val(0);
				}
				getScore();
			});
		})
		$(document).on("click", ".laimi-dec", function() {
		  var gift = $(this).val();
		  var _self = $(".laimi-gift[gift='"+gift+"']");
		  if(parseInt(_self.val()) >= 1)
		    _self.val(parseInt(_self.val()) - 1);
		  getScore();
		});
		$(document).on("click", ".laimi-plus", function() {
			var gift = $(this).val();
		  var _self = $(".laimi-gift[gift='"+gift+"']");
		  _self.val(parseInt(_self.val()) + 1);
		  getScore();
		});
		$(document).on('input propertychange', '.laimi-gift', getScore);

		objform.on("submit(laimi-submit)", function(data) {
			var arr = [];
			var json = {};
			var card_id = $(".laimi-card-id").val();
			var left_score = $('.laimi-left-score').text();
			var use_score = 0;
			var gift = 0;
			if(card_id == 0){
			  objlayer.alert('必须选择一个会员', {
					title: '提示信息'
				});
			  return false;
			}
			if(Number(left_score) < 0){
			  objlayer.alert('超出最大积分', {
					title: '提示信息'
				});
			  return false;
			}
			$(".laimi-gift").each(function(){
				gift = $(this).attr('gift');
				if($(".laimi-check[gift='"+gift+"']").prop('checked')){
					use_score = Number(use_score) + Number($(this).val() * $(this).attr('score'));
					json = {'gift_id': gift, 'gift_score': $(this).attr('score'), 'gift_num': $(this).val(),'gift_name': $(this).attr('giftname')};
					arr.push(json);
				}
			});
			var data ={
			  card_id:card_id,
			  gift_score:use_score,
			  arr:arr
			}
			// console.log(data);return false;
			$.post('system_score_add_do.php', data, function(code){
			  console.log(code);
			  if(code == 0){
			    window.location.reload();
			  }else{
			    objlayer.alert('兑换积分失败，请联系管理员', {
						title: '提示信息'
					});
			  }
			})
			return false;
		});

		function getScore(){
			var use_score = 0;
			var score = Number($('.laimi-card-score').text());
			var gift = 0;
			$(".laimi-gift").each(function(){
			  if(isNaN($(this).val())){
			    $(this).val(1);
			  }
			  var gift = $(this).attr('gift');
			  if($(".laimi-check[gift='"+gift+"']").prop('checked')){
			  	use_score = Number(use_score) + Number($(this).val() * $(this).attr('score'));
			  }
			});
			$('.laimi-use-score').text(use_score);
			$('.laimi-left-score').text(score - use_score);
		}
	});
	</script>
</body>
</html>