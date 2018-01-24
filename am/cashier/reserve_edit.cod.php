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
					<li>
						<a href="reserve_today.php">今日预约</a>
					</li>
					<li>
						<a href="reserve_tomrrow.php">明日预约</a>
					</li>
					<li>
						<a href="reserve_more.php">更多预约</a>
					</li>
					<li>
						<a href="reserve_expire.php">过期预约</a>
					</li>
					<li class="layui-this">
						<a href="reserve_edit.php">修改预约</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-goods2-add layui-tab-content">
<form id="laimi-form" class="layui-form">
	<div class="layui-row">		
		<div class="layui-col-xs6" style="padding-top:10px;">
			<div class="layui-form-item">
		    <label class="layui-form-label">搜索条件</label>
				<div class="layui-input-inline">
					<input class="layui-input" type="txtphone" name="search" placeholder="卡号/手机号">
				</div>
		    <div class="layui-inline">
		      <button type="button" class="layui-btn layui-btn-normal laimi-search">搜索</button>
		    </div>
				<div class="layui-inline" style="margin-left:20px;">
					卡号：<span class="laimi-color-ju laimi-code" style="font-weight:bold;font-size:16px;"><?php echo $this->_data['edit']['card_code'];?></span>
				</div>
	  	</div>
			<div class="layui-form-item">
		    <label class="layui-form-label"><span>*</span>姓名</label>
		    <div class="layui-input-inline">
		      <input class="layui-input laimi-input-200" type="text" value="<?php echo $this->_data['edit']['reserve_name'];?>" name="txtname">
		      <input class="layui-input laimi-input-200" type="hidden" value="<?php echo $this->_data['edit']['card_id'];?>" name="txtcard_id">
		      <input class="layui-input laimi-input-200" type="hidden" value="<?php echo $this->_data['edit']['reserve_id'];?>" name="txtreserve_id">
		    </div>
			</div>
			<div class="layui-form-item">
		    <label class="layui-form-label"><span>*</span>人数</label>
		    <div class="layui-input-inline">
		      <input class="layui-input laimi-input-100" value="<?php echo $this->_data['edit']['reserve_count'];?>" type="text" name="txtcount">
		    </div>
			</div>
			<div class="layui-form-item">
		    <label class="layui-form-label"><span>*</span>手机</label>
		    <div class="layui-input-inline">
		      <input class="layui-input laimi-input-200" type="text" value="<?php echo $this->_data['edit']['reserve_phone'];?>" name="txtphone1">
		    </div>
			</div>
			<div class="layui-form-item">
		    <label class="layui-form-label"><span>*</span>到店时间</label>
		    <div class="layui-input-inline">
		      <input name="txtdtime" id="laimi-time" value="<?php echo $this->_data['edit']['dtime'];?>" class="layui-input laimi-input-200" type="text" placeholder="yyyy-MM-dd">
		    </div>
			</div>
			<div class="layui-form-item">
		    <label class="layui-form-label">备注</label>
		    <div class="layui-input-block">
		      <textarea class="layui-textarea laimi-input-b80" name="txtmemo"><?php echo $this->_data['edit']['reserve_memo'];?></textarea>
		    </div>
		  </div>
	  	<div class="layui-form-item">
	    	<div class="layui-input-block">
		      <button class="layui-btn laimi-button-100 laimi-submitedit" lay-filter="laimi-submitedit" lay-submit>
		      	完成
		      </button>
		      <button class="layui-btn layui-btn-primary" type="reset">
		      	重置
		      </button>
	    	</div>
	  	</div>
		</div>
		<div class="layui-col-xs6">
			<div class="layui-tab">
				<ul class="layui-tab-title">
					<li class="layui-this">
						可选商品
					</li>
				</ul>
				<div class="layui-tab-content" style="padding:0;">
					<div class="layui-tab-item layui-show" style="overflow-y:auto; height:400px;">
						<table id="laimi-goods" class="layui-table" style="margin:0;">
							<thead>
								<tr>
									<th>分类</th>
									<th>商品名称</th>
									<th width="50">选择</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th colspan="3" style="text-align:left;">
										<div class="layui-input-inline">
											<select name="search" lay-search>
												<option value="0">请选择商品分类</option>
												<?php foreach($this->_data['mgoods_catalog'] as $row) { ?>
                        <option value="<?php echo $row['mgoods_catalog_id']; ?>"><?php echo $row['mgoods_catalog_name']; ?></option>
                      	<?php } ?>
											</select>
										</div>
										<div class="layui-input-inline">
											<input class="layui-input laimi-input-200" type="text" name="txtsearch">
										</div>
										<div class="layui-inline">
								     	<button type="button" class="laimi-search2 layui-btn layui-btn-small layui-btn-normal">搜索</button>
								  	</div>
									</th>
								</tr>
								<?php foreach($this->_data['mgoods_catalog'] as $row) { ?>
									<?php foreach($this->_data['mgoods'] as $row2) { 
	                 if ($row['mgoods_catalog_id'] == $row2['mgoods_catalog_id']) {
	              	?>
								<tr class="laimi-goods laimi-use1" mgoods_code="<?php echo $row2['mgoods_code'];?>" mgoods_name="<?php echo $row2['mgoods_name'];?>" mgoods_catalog_id="<?php echo $row['mgoods_catalog_id'];?>" mgoods_id="<?php echo $row2['mgoods_id'];?>" mgoods_price="<?php echo $row2['mgoods_price'];?>">
									<td><?php echo $row['mgoods_catalog_name'];?></td>
									<td style="text-align: left;"><?php echo $row2['mgoods_name'];?><span class="laimi-color-ju">（￥<?php echo $row2['mgoods_price'];?>）</span></td>
									<td style="padding-top:5px; padding-bottom:5px;">																
										<input type="checkbox" mgoods_name="<?php echo $row2['mgoods_name'];?>" value="<?php echo $row2['mgoods_id'];?>" name="mgoods_id[]" lay-skin="primary" > 选择
									</td>
								</tr>
									<?php }
		              } ?>
		            <?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
				</div>
			</div>
		</div>
	</div>
<?php echo $this->fun_fetch('inc_foot', ''); ?>
	<script>
	layui.use(["element", "laydate", "layer", "form"], function() {
		var $ = layui.jquery;
		var objlayer = layui.layer;
		var objelement = layui.element;
		var objform = layui.form;
		var objdate = layui.laydate;
		objdate.render({
			elem: '#laimi-time'
		});
		$(function () {
			var res = <?php echo $this->_data['edit']['reserve_goods'];?>;
			for (var i = 0; i < res.length; i++) {
        $("#laimi-goods input[name='mgoods_id[]']").each(function() {
          if ($(this).val() == res[i].mgoods_id) {
            $(this).attr("checked",true);
          }
        })
	    }
	    objform.render();
		})
		//搜索分类JS
		$('.laimi-search2').on('click',function(){
		  $('#laimi-goods .laimi-goods').each(function () {
		  	$(this).addClass('layui-hide');
		  	$(this).removeClass('laimi-use1');
		  	if ($("#laimi-goods input[name='txtsearch']").val() == '') {
		  		if($("#laimi-goods select[name='search']").val() == '0') {
			      $(this).removeClass('layui-hide');
			      $(this).addClass('laimi-use1');
			    }else{
			      if ($("#laimi-goods select[name='search']").val() == $(this).attr('mgoods_catalog_id')) {
			      	$(this).removeClass('layui-hide');
			      	$(this).addClass('laimi-use1');
			      }
			    }
		  	}else{
		  		if ($("#laimi-goods input[name='txtsearch']").val() == $(this).attr('mgoods_code') || $("#laimi-goods input[name='txtsearch']").val() == $(this).attr('mgoods_name')) {
		  			$(this).removeClass('layui-hide');
			      $(this).addClass('laimi-use1');
		  		}
		  	}
		  })
		});
		//搜索会员JS
		$('.laimi-search').on('click',function(){
			$('.laimi-code').text('');
	    var url="reserve_search_ajax.php";
	    var data = $("#laimi-form input[name='search']").val();
	    $.getJSON(url,{phone:data},function(res){
	      console.log(res);
	      if (res == false) {
	      	alert('没有该会员');
	        $('.laimi-code').text('');
	        $("#laimi-form input[name='card_id']").val('');
	      }else{
	        $('.laimi-code').text(res.card_code);
          $("#laimi-form input[name='txtcard_id']").val(res.card_id);
          $("#laimi-form input[name='txtname']").val(res.card_name);
          $("#laimi-form input[name='txtphone1']").val(res.card_phone);
	      };
	    });
	    $('.laimi-search').attr('disabled',false);
	  });
		//修改操作JS
		objform.on("submit(laimi-submitedit)", function(data) {
		  $('.laimi-submitedit').attr("disabled",true);
		  var url="reserve_edit_do.php";
		  var arr = [];
		  $("#laimi-goods .laimi-goods input[name='mgoods_id[]']:checked").each(function(){
		    var json = {'mgoods_id':$(this).val(),'mgoods_name':$(this).attr('mgoods_name')};
		    arr.push(json);
		  });

		  if (arr.length == 0) {
		    alert('折扣商品或套餐不能为空');
		    $('.laimi-submitedit').attr("disabled",false);
		    return false;
		  }

		  var txtname = $(".layui-form input[name='txtname']").val();
		  var txtcount = $(".layui-form input[name='txtcount']").val();
		  var txtreserve_id = $(".layui-form input[name='txtreserve_id']").val();
		  var txtdtime = $(".layui-form input[name='txtdtime']").val();
		  var txtcard_id = $(".layui-form input[name='txtcard_id']").val();
		  var txtphone = $(".layui-form input[name='txtphone1']").val();
		  var txtmemo = $(".layui-form textarea[name='txtmemo']").val();

		  var data = {
	      txtname:txtname,
	      txtcount:txtcount,
	      txtreserve_id:txtreserve_id,
	      txtdtime:txtdtime,
	      txtcard_id:txtcard_id,
	      txtphone:txtphone,
	      txtmemo:txtmemo,
	      arr:arr
		  }
		  console.log(data);
		  $.post(url,data,function(res){
		    if(res=='201'){
		     window.location="reserve_today.php";
		    }else if(res=='202'){
		      window.location="reserve_tomrrow.php";
		    }else if(res=='203'){
		      window.location="reserve_more.php";
		    }else if(res == '1' || res == '2'){
		      alert('请完善数据');
		    }else{
		      alert('添加失败');
		      console.log(res);
		    }
		  });
		  return false;
		});
	});
	</script>
</body>
</html>