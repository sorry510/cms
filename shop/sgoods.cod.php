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
						<a href="sgoods.php">单店商品管理</a>
					</li>
					<li>
						<a href="sgoods_catalog.php">商品分类</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-sgoods layui-tab-content">
<form class="layui-form">
	<div class="laimi-tools layui-form-item">		
		<label class="layui-form-label">选择分类</label>
		<div class="layui-input-inline">
			<select name="sgoods_catalog_id">
				<option value="0">全部</option>
        <?php foreach($this->_data['sgoods_catalog_list'] as $row) { ?>
        <option value="<?php echo $row['sgoods_catalog_id'] ?>" <?php if($row['sgoods_catalog_id'] == $this->_data['request']['sgoods_catalog_id']){echo "selected";} ?> ><?php echo $row['sgoods_catalog_name'] ?></option>
        <?php } ?>
			</select>
		</div>
		<label class="layui-form-label">商品</label>
		<div class="layui-input-inline last">
			<input class="layui-input laimi-input-200" type="text" name="search" value="<?php echo $this->_data['request']['search'];?>" placeholder="商品名称/编码/简拼">
		</div>
		<div class="layui-input-inline">
			<button class="layui-btn layui-btn-normal">搜索</button>
		</div>
		<div class="laimi-float-right">
			<a class="layui-btn laimi-add">新增商品</a>
		</div>
	</div>
</form>
<table class="layui-table">
	<thead>
		<tr>
			<th>分类</th>
			<th>名称</th>
			<th>编码</th>
			<th>商品价格</th>
			<th>会员价格</th>
			<th>库存</th>
			<th>状态</th>
			<th width="180">操作</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($this->_data['sgoods_list']['list'] as $row) { ?>
		<tr>
			<td><?php echo $row['sgoods_catalog_name']; ?></td>
      <td><?php echo $row['sgoods_name']; ?></td>
      <td><?php echo $row['sgoods_code']; ?></td>
      <td><?php echo $row['sgoods_price']; ?></td>
			<td><?php echo $row['sgoods_cprice']==0?'--':$row['sgoods_cprice']; ?></td>
			<td><i class="layui-icon <?php echo $row['sgoods_type']==2?'laimi-icon-dui':'laimi-icon-cuo';?>"">&#x1005;</i></td>
			<td class="<?php echo $row['sgoods_state']=='1'?'':'laimi-color-hong';?>"><?php echo $row['sgoods_state']=='1'?'正常':'停用';?></td>
			<td>
				<button class="layui-btn layui-btn-mini laimi-edit" value="<?php echo $row['sgoods_id']; ?>">
					<svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-bianji"></use></svg>
					修改
				</button>
				<?php if($row['sgoods_state'] == 1){
                echo '<button class="layui-btn layui-bg-red layui-btn-mini laimi-state" value="'.$row["sgoods_id"].'" state="'.$row['sgoods_state'].'">
                        <svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-tingyong"></use></svg>
                        停用
                      </button>';
              }else if($row['sgoods_state'] == 2){
                echo '<button class="layui-btn layui-bg-blue layui-btn-mini laimi-state2" value="'.$row["sgoods_id"].'" state="'.$row['sgoods_state'].'">
                        <svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-dui"></use></svg>
                        启用
                      </button>';
              }
        ?>
				<button class="layui-btn layui-btn-primary layui-btn-mini laimi-del" value="<?php echo $row['sgoods_id']; ?>">
					<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-clear"></use></svg>
					删除
				</button>
			</td>
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
	<!--新增商品弹出层开始-->
	<script type="text/html" id="laimi-add">
		<div id="laimi-modal-add" class="laimi-modal">
			<form class="layui-form">
				<div class="layui-form-item">
			    <label class="layui-form-label"><span>*</span> 商品分类</label>
			    <div class="layui-input-inline">
			      <select name="txtsgoods_catalog_id">
			        <option value="0">请选择分类</option>
              <?php foreach($this->_data['sgoods_catalog_list'] as $row) { ?>
              <option value="<?php echo $row['sgoods_catalog_id'] ?>"><?php echo $row['sgoods_catalog_name'] ?></option>
              <?php } ?>
			      </select>
			    </div>
				</div>
				<div class="layui-form-item">
			    <label class="layui-form-label"><span>*</span> 商品名称</label>
			    <div class="layui-input-inline">
			      <input id="laimi-goodsname" class="layui-input laimi-input-300" type="text" name="txtsgoods_name" lay-verify="required">
			    </div>
			    <label class="layui-form-label" style="width:auto;">简拼</label>
			    <div class="layui-input-inline">
			      <input id="laimi-upen" class="layui-input laimi-input-80" type="text" name="txtjianpin">
			    </div>
				</div>
				<div class="layui-form-item">
			    <label class="layui-form-label">商品编码</label>
			    <div class="layui-input-inline">
			      <input class="layui-input laimi-input-300" type="text" name="txtsgoods_code">
			    </div>
				</div>
				<div class="layui-form-item">
			    <label class="layui-form-label"><span>*</span> 商品价格</label>
			    <div class="layui-input-inline">
			      <input class="layui-input laimi-input-100" type="text" name="txtsgoods_price" placeholder="￥" lay-verify="required">
			    </div>
			    <div class="layui-form-mid layui-word-aux">元</div>
				</div>
				<div class="layui-form-item">
			    <label class="layui-form-label">会员价格</label>
			    <div class="layui-input-inline">
			      <input class="layui-input laimi-input-100" type="text" name="txtsgoods_cprice" placeholder="￥">
			    </div>
			    <div class="layui-form-mid layui-word-aux">元&nbsp;&nbsp;如有会员价，优先按会员价结算</div>
				</div>
				<div class="layui-form-item">
			    <label class="layui-form-label">商品库存</label>
			    <div class="layui-input-inline">
				    <input type="radio" name="txtsgoods_type" value="1" title="无库存">
					  <input type="radio" name="txtsgoods_type" value="2" title="有库存">
				  </div>
				</div>
		  	<div class="layui-form-item">
		    	<div class="layui-input-block">
			      <button class="layui-btn laimi-button-100" lay-filter="laimi-submitadd" lay-submit>
			      	完成
			      </button>
			      <button class="layui-btn layui-btn-primary" type="reset">
			      	重置
			      </button>
		    	</div>
		  	</div>
			</form>
		</div>
	</script>
	<!--新增商品弹出层结束-->
	<!--修改商品弹出层开始-->
	<script type="text/html" id="laimi-edit">
		<div id="laimi-modal-edit" class="laimi-modal">
			<form class="layui-form">
				<div class="layui-form-item">
			    <label class="layui-form-label"><span>*</span> 商品分类</label>
			    <div class="layui-input-inline">
			      <select name="txtsgoods_catalog_id">
			        <option value="0">请选择</option>
              <?php foreach($this->_data['sgoods_catalog_list'] as $row) { ?>
              <option value="<?php echo $row['sgoods_catalog_id'] ?>"><?php echo $row['sgoods_catalog_name'] ?></option>
              <?php } ?>
			      </select>
			    </div>
				</div>
				<div class="layui-form-item">
			    <label class="layui-form-label"><span>*</span> 商品名称</label>
			    <div class="layui-input-inline">
			      <input id="laimi-goodsname2" class="layui-input laimi-input-300" type="text" name="txtsgoods_name">
			      <input class="layui-input laimi-input-300" type="hidden" name="txtsgoods_id">
			    </div>
			    <label class="layui-form-label" style="width:auto;">简拼</label>
			    <div class="layui-input-inline">
			      <input id="laimi-upen2" class="layui-input laimi-input-80" type="text" name="txtjianpin">
			    </div>
				</div>
				<div class="layui-form-item">
			    <label class="layui-form-label">商品编码</label>
			    <div class="layui-input-inline">
			      <input class="layui-input laimi-input-300" type="text" name="txtsgoods_code">
			    </div>
				</div>
				<div class="layui-form-item">
			    <label class="layui-form-label"><span>*</span> 商品价格</label>
			    <div class="layui-input-inline">
			      <input class="layui-input laimi-input-100" type="text" name="txtsgoods_price" placeholder="￥">
			    </div>
			    <div class="layui-form-mid layui-word-aux">元</div>
				</div>
				<div class="layui-form-item">
			    <label class="layui-form-label">会员价格</label>
			    <div class="layui-input-inline">
			      <input class="layui-input laimi-input-100" type="text" name="txtsgoods_cprice" placeholder="￥">
			    </div>
			    <div class="layui-form-mid layui-word-aux">元&nbsp;&nbsp;如有会员价，优先按会员价结算</div>
				</div>
				<div class="layui-form-item">
			    <label class="layui-form-label">商品库存</label>
			    <div class="layui-input-inline">
				    <input type="radio" name="txtsgoods_type" value="1" title="无库存" disabled>
					  <input type="radio" name="txtsgoods_type" value="2" title="有库存" disabled>
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
			</form>
		</div>
	</script>
	<!--修改商品弹出层结束-->
<?php echo $this->fun_fetch('inc_foot', ''); ?>
	<script src="../js/pinying.js"></script>
	<script>
	layui.use(["element", "laypage", "layer", "form"], function() {
		var $ = layui.jquery;
		var objlayer = layui.layer;
		var objelement = layui.element;
		var objpage = layui.laypage;
		var objform = layui.form;
		objpage.render({
			elem: 'laimi-page-content',
			count: <?php echo $this->_data['sgoods_list']['allcount'];?>,
			limit: 50,
			curr: <?php echo $this->_data['sgoods_list']['pagenow'];?>,
			layout: ['count', 'prev', 'page', 'next',  'skip'],
			jump: function(obj,first) {
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
				title: ["新增商品", "font-size:16px;"],
				btnAlign: "r",
				area: ["680px", "auto"],
				shadeClose: true,//点击遮罩关闭
				content: $("#laimi-add").html(),
				success: function(){
					renderAll();
				}
			});
			objform.render();
		});
		$(".laimi-edit").on("click", function() {
			objlayer.open({
				type: 1,
				title: ["修改商品", "font-size:16px;"],
				btnAlign: "r",
				area: ["680px", "auto"],
				shadeClose: true,//点击遮罩关闭
				content: $("#laimi-edit").html(),
				success: function(){
					renderAll();
				}
			});
			var sgoods_id = $(this).val();
		  $.ajax({
		    type: "get",
		    url: "sgoods_edit_ajax.php",
		    data: {sgoods_id:sgoods_id}, 
		    dataType:'json',
		    success: function(msg){
		      $("#laimi-modal-edit input[name='txtsgoods_name']").val(msg.sgoods_name);
		      $("#laimi-modal-edit input[name='txtjianpin']").val(msg.sgoods_jianpin);
		      $("#laimi-modal-edit input[name='txtsgoods_code']").val(msg.sgoods_code);
		      $("#laimi-modal-edit input[name='txtsgoods_price']").val(msg.sgoods_price);
		      if(msg.sgoods_cprice==0){
		        msg.sgoods_cprice = '';
		      }
		      $("#laimi-modal-edit input[name='txtsgoods_cprice']").val(msg.sgoods_cprice);
		      $("#laimi-modal-edit input[name='txtsgoods_id']").val(msg.sgoods_id);
		      $("#laimi-modal-edit option").each(function () {
		    		if($(this).val()==(msg.sgoods_catalog_id)){
	            $(this).attr('selected',true);
	          }
		      });
		      $("#laimi-modal-edit input[name='txtsgoods_type']").each(function(){
	          if($(this).val()==msg.sgoods_type){
	            $(this).attr('checked',true);
	          }
	        });
		      objform.render();
		    }
		  });
  	});
		//添加商品submit
		objform.on("submit(laimi-submitadd)", function(data) {
		  var _self = $(this);
		  _self.attr('disabled',true);
		  var url="sgoods_add_do.php";
		  $.post(url,data.field,function(res){
		    if(res=='0'){
		      window.location.href='sgoods.php';
		    }else if(res=='1'){
		      alert("缺少必填项");
		      _self.attr('disabled',false);
		    }else if(res=='2'){
		      alert("商品编码不能重复");
		      _self.attr('disabled',false);
		    }else{
		      alert("添加失败");
		    }
		  });
			return false;
		});
		//修改商品submit
		objform.on("submit(laimi-submitedit)", function(data) {
		  var _self = $(this);
		  _self.attr('disabled',true);
		  var url="sgoods_edit_do.php";
		  console.log(data.field);
		  $.post(url,data.field,function(res){
		    if(res=='0'){
		      window.location.href='sgoods.php';
		    }else if(res=='1'){
		      alert("缺少必填项");
		      _self.attr('disabled',false);
		    }else if(res=='2'){
		      alert("商品编码不能重复");
		      _self.attr('disabled',false);
		    }else{
		      alert("添加失败");
		    }
		  });
			return false;
		});
		//删除操作JS
	  $(".laimi-del").on("click", function() {
			var id = $(this).val();
			objlayer.confirm('你确定要删除吗', {icon: 0, title:'提示',shadeClose: true}, function(index){
			  $.post('sgoods_delete_do.php', {id:id}, function(res){
			  	if(res == 0){
			  		window.location.reload();
			  	}else if(res=='1'){
			  		objlayer.alert("套餐中含有此商品，不能删除！", {
			  			title: '提示信息'
			  		});
			  	}else if(res=='2'){
			  		objlayer.alert("优惠券中含有此商品，不能删除！", {
			  			title: '提示信息'
			  		});
			  	}else{
			  		objlayer.alert('删除失败，请联系管理员', {
			  			title: '提示信息'
			  		});
			  	}
			  })
			  objlayer.close(index);
			});
		});
		//停用启用
	  $(".laimi-state").on("click", function() {
			var id = $(this).val();
			objlayer.confirm('你确定要修改吗', {icon: 0, title:'提示',shadeClose: true}, function(index){
			  $.post('sgoods_state_do.php',{'sgoods_id':id},function(res){
	        if(res=='0'){
	          window.location.reload();
	        }else if(res=='1'){
	          objlayer.alert('修改失败', {
			  			title: '提示信息'
			  		});
	        }
	      });
			  objlayer.close(index);
			});
		});
		$(".laimi-state2").on("click", function() {
			var id = $(this).val();
			objlayer.confirm('你确定要修改吗', {icon: 0, title:'提示',shadeClose: true}, function(index){
			  $.post('sgoods_state_do.php',{'sgoods_id':id},function(res){
	        if(res=='0'){
	          window.location.reload();
	        }else if(res=='1'){
	          objlayer.alert('修改失败', {
			  			title: '提示信息'
			  		});
	        }
	      });
			  objlayer.close(index);
			});
		});
		function renderAll(){
			objform.render();
			$('#laimi-goodsname').focusout(function () {
				console.log(1);
				$("#laimi-upen").val(null);
			  var str = $("#laimi-goodsname").val().trim();
			  if(str == "") return;
			  var arrRslt = makePy(str)[0];
			  $("#laimi-upen").val(arrRslt);
			});
			$('#laimi-goodsname2').focusout(function () {
				$("#laimi-upen").val(null);
			  var str = $("#laimi-goodsname2").val().trim();
			  if(str == "") return;
			  var arrRslt = makePy(str)[0];
			  $("#laimi-upen2").val(arrRslt);
			});
		}
	});
	</script>
</body>
</html>