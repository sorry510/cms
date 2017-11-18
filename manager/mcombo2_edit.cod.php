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
						<a href="mcombo2.php">计时套餐</a>
					</li>
					<li class="layui-this">
						<a href="mcombo2_add.php">新增计时套餐</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-mcombo2-add layui-tab-content">
<form class="layui-form">
	<div class="layui-row">
		<div class="layui-col-xs6" style="padding-top:10px;">
			<div class="layui-form-item">
		    <label class="layui-form-label"><span>*</span> 套餐名称</label>
		    <div class="layui-input-inline">
		      <input id="laimi-comboname" class="layui-input laimi-input-200" type="text" name="txtmcombo_name" value="<?php echo $this->_data['edit']['mcombo_name'];?>" lay-verify="required">
		      <input class="layui-input laimi-input-200" type="hidden" name="txtmcombo_type" value="2">
		      <input class="layui-input laimi-input-200" type="hidden" name="txtmcombo_id" value="<?php echo $this->_data['edit']['mcombo_id'];?>">
		      <input class="layui-input laimi-input-200" type="hidden" name="txtmcombo_code_old" value="<?php echo $this->_data['edit']['mcombo_code'];?>">
		    </div>
			</div>
			<div class="layui-form-item">
		    <label class="layui-form-label">简拼</label>
		    <div class="layui-input-inline">
		      <input id="laimi-upen" class="layui-input laimi-input-80" type="text" name="txtmcombo_jianpin" value="<?php echo $this->_data['edit']['mcombo_jianpin'];?>">
		    </div>
			</div>
			<div class="layui-form-item">
		    <label class="layui-form-label">套餐编码</label>
		    <div class="layui-input-inline">
		      <input class="layui-input laimi-input-200" type="text" name="txtmcombo_code" value="<?php echo $this->_data['edit']['mcombo_code'];?>">
		    </div>
			</div>
			<div class="layui-form-item">
		    <label class="layui-form-label"><span>*</span> 套餐价格</label>
		    <div class="layui-input-inline">
		      <input class="layui-input laimi-input-100" type="text" name="txtmcombo_price" placeholder="￥" value="<?php echo $this->_data['edit']['mcombo_price'];?>" lay-verify="required">
		    </div>
		    <div class="layui-form-mid layui-word-aux">元。</div>
			</div>
			<div class="layui-form-item">
		    <label class="layui-form-label">会员价格</label>
		    <div class="layui-input-inline">
		      <input class="layui-input laimi-input-100" type="text" name="txtmcombo_cprice" placeholder="￥" value="<?php echo $this->_data['edit']['mcombo_cprice'];?>">
		    </div>
		    <div class="layui-form-mid layui-word-aux">元。如有会员价，优先按会员价结算</div>
			</div>
			<div class="layui-form-item">
		    <label class="layui-form-label">有效时间</label>
		    <div class="layui-input-inline">
		      <input class="layui-input laimi-input-100" type="text" name="txtmcombo_limit_days" value="<?php echo $this->_data['edit']['mcombo_limit_days'];?>">
		    </div>
		    <div class="layui-form-mid layui-word-aux">天</div>
			</div>
			<div class="layui-form-item">
		    <label class="layui-form-label">参与活动</label>
		    <div class="layui-input-inline">
		      <input type="radio" name="txtmcombo_act" value="2" title="不参与" <?php if ($this->_data['edit']['mcombo_act'] == 2) {
		      	echo "checked";
		      };?>>
			  	<input type="radio" name="txtmcombo_act" value="1" title="参与活动" <?php if ($this->_data['edit']['mcombo_act'] == 1) {
		      	echo "checked";
		      };?>>
		  	</div>
		   	<div class="layui-form-mid layui-word-aux">套餐是否参于满减、满送额度计算</div>
			</div>
			<div class="layui-form-item">
		    <label class="layui-form-label">参与预约</label>
		    <div class="layui-input-inline">
		      <input type="radio" name="txtmcombo_reserve" value="2" title="不参与" <?php if ($this->_data['edit']['mcombo_reserve'] == 2) {
		      	echo "checked";
		      };?>>
				  <input type="radio" name="txtmcombo_reserve" value="1" title="参与预约" <?php if ($this->_data['edit']['mcombo_reserve'] == 1) {
		      	echo "checked";
		      };?>>
			  </div>
			</div>
	  	<div class="layui-form-item">
	    	<div class="layui-input-block">
		      <button class="layui-btn laimi-button-100" lay-filter="laimi-submitedit" lay-submit>
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
						<table id="laimi-mcombo" class="layui-table" style="margin:0;">
							<thead>
								<tr>
									<th>分类</th>
									<th>商品名称</th>
									<th width="50">选择</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th colspan="2" style="text-align:left;">
										<div class="layui-input-inline">
											<select name="search" lay-search>
												<option value="0">请选择商品分类</option>
												<?php foreach($this->_data['mgoods_catalog'] as $row) { ?>
                        <option value="<?php echo $row['mgoods_catalog_id']; ?>"><?php echo $row['mgoods_catalog_name']; ?></option>
                      	<?php } ?>
											</select>
										</div>
										<div class="layui-inline">
								     	<button type="button" class="laimi-search layui-btn layui-btn-small layui-btn-normal">搜索</button>
								  	</div>
										</th>
									<th >
										<input lay-filter="laimi-all" class="laimi-all" type="checkbox" name="mgoods" lay-skin="primary"> 全选
									</th>
								</tr>
								<?php foreach($this->_data['mgoods_catalog'] as $row) { ?>
									<?php foreach($this->_data['mgoods'] as $row2) { 
	                 if ($row['mgoods_catalog_id'] == $row2['mgoods_catalog_id']) {
	              	?>
								<tr class="laimi-mcombo laimi-use1" mgoods_catalog_id="<?php echo $row['mgoods_catalog_id'];?>" mgoods_id="<?php echo $row2['mgoods_id'];?>" mgoods_price="<?php echo $row2['mgoods_price'];?>">
									<td><?php echo $row['mgoods_catalog_name'];?></td>
									<td style="text-align: left;"><?php echo $row2['mgoods_name'];?><span class="laimi-color-ju">（￥<?php echo $row2['mgoods_price'];?>）</span></td>
									<td style="padding-top:5px; padding-bottom:5px;">																
										<input type="checkbox" value="<?php echo $row2['mgoods_id'];?>" name="mgoods_id[]" lay-skin="primary" > 选择
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
	<script src="../js/pinying.js"></script>
	<script>
	layui.use(["element", "layer", "form"], function() {
		var $ = layui.jquery;
		var objlayer = layui.layer;
		var objelement = layui.element;
		var objform = layui.form;
		$('#laimi-comboname').focusout(function () {
			$("#laimi-upen").val(null);
		  var str = $("#laimi-comboname").val().trim();
		  if(str == "") return;
		  var arrRslt = makePy(str)[0];
		  $("#laimi-upen").val(arrRslt);
		});
		$(function () {
			var res = <?php echo $this->_data['edit']['mgoods'];?>;
			for (var i = 0; i < res.length; i++) {
        $("#laimi-mcombo input[name='mgoods_id[]']").each(function() {
          if ($(this).val() == res[i].mgoods_id) {
            $(this).attr("checked",true);
          }
        })
	    }
	    objform.render();
		})
		//搜索分类JS
		$('.laimi-search').on('click',function(){
		  $('#laimi-mcombo .laimi-mcombo').each(function () {
		  	$(this).addClass('layui-hide');
		  	$(this).removeClass('laimi-use1');
		    if($("#laimi-mcombo select[name='search']").val() == '0') {
		      $(this).removeClass('layui-hide');
		      $(this).addClass('laimi-use1');
		    }else{
		      if ($("#laimi-mcombo select[name='search']").val() == $(this).attr('mgoods_catalog_id')) {
		      	$(this).removeClass('layui-hide');
		      	$(this).addClass('laimi-use1');
		      }
		    } 
		  }) 
		});
		//点击全部按钮，选择所有
		objform.on("checkbox(laimi-all)", function(data){
		  $("#laimi-mcombo .laimi-use1 input[name='mgoods_id[]']").prop("checked",data.elem.checked);
		  objform.render();
		});
		//添加操作JS
		objform.on("submit(laimi-submitedit)", function(data) {
			console.log(1);
		  $('.laimi-submitadd').attr("disabled",true);
		  var url="mcombo_edit_do.php";
		  var arr = [];
		  $("#laimi-mcombo .laimi-mcombo input[name='mgoods_id[]']:checked").each(function(){
		    var json = {'mgoods_id':$(this).val(),'number':0};
		    arr.push(json); 
		  });

		  if (arr.length == 0) {
		    alert('折扣商品或套餐不能为空');
		    $('.laimi-submitadd').attr("disabled",false);
		    return false;
		  }

		  var txtmcombo_id = $(".layui-form input[name='txtmcombo_id']").val();
		  var txtmcombo_code_old = $(".layui-form input[name='txtmcombo_code_old']").val();
		  var txtmcombo_name = $(".layui-form input[name='txtmcombo_name']").val();
		  var txtmcombo_type = $(".layui-form input[name='txtmcombo_type']").val();
		  var txtmcombo_jianpin = $(".layui-form input[name='txtmcombo_jianpin']").val();
		  var txtmcombo_code = $(".layui-form input[name='txtmcombo_code']").val();
		  var txtmcombo_price = $(".layui-form input[name='txtmcombo_price']").val();
		  var txtmcombo_cprice = $(".layui-form input[name='txtmcombo_cprice']").val();
		  var txtmcombo_limit_days = $(".layui-form input[name='txtmcombo_limit_days']").val();
		  var txtmcombo_act = $(".layui-form input[name='txtmcombo_act']:checked").val();
		  var txtmcombo_reserve = $(".layui-form input[name='txtmcombo_reserve']:checked").val();
		  var data = {
		      txtmcombo_id:txtmcombo_id,
		      txtmcombo_code_old:txtmcombo_code_old,
		      txtmcombo_name:txtmcombo_name,
		      txtmcombo_type:txtmcombo_type,
		      txtmcombo_jianpin:txtmcombo_jianpin,
		      txtmcombo_code:txtmcombo_code,
		      txtmcombo_price:txtmcombo_price,
		      txtmcombo_cprice:txtmcombo_cprice,
		      txtmcombo_limit_days:txtmcombo_limit_days,
		      txtmcombo_act:txtmcombo_act,
		      txtmcombo_reserve:txtmcombo_reserve,
		      arr:arr
		  }
		  $.post(url,data,function(res){
		    if(res=='0'){
		      window.location="mcombo2.php";
		    }else{
		      $('.laimi-submitadd').attr("disabled",false);
		      alert('修改失败');
		      console.log(res);
		    }
		  });
		  return false;
		});
	});
	</script>
</body>
</html>