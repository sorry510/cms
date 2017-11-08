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
						<a href="worker.php">员工管理</a>
					</li>
					<li>
						<a href="worker_group.php">员工分组</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-worker layui-tab-content">
<form class="layui-form">
	<div class="laimi-tools layui-form-item">
		<label class="layui-form-label">选择分店</label>
		<div class="layui-input-inline">
			<select name="shop">
				<option value="">全部分店</option>
				<?php foreach($this->_data['shop_list'] as $row){?>
				  <option value="<?php echo $row['shop_id'];?>" <?php if($row['shop_id']==$this->_data['request']['shop']) echo 'selected'?>><?php echo $row['shop_name'];?></option>
				<? }?>
			</select>
		</div>
		<label class="layui-form-label">选择分组</label>
		<div class="layui-input-inline">
			<select name="group">
				<option value="">全部分组</option>
				<?php foreach($this->_data['worker_group_list'] as $row){?>
				  <option value="<?php echo $row['worker_group_id'];?>" <?php if($row['worker_group_id']==$this->_data['request']['group']) echo 'selected'?>><?php echo $row['worker_group_name'];?></option>
				<? }?>
			</select>
		</div>
		<label class="layui-form-label">员工</label>
		<div class="layui-input-inline last">
			<input class="layui-input laimi-input-200" type="text" name="search" placeholder="姓名/编号" value="<?php echo $this->_data['request']['search'];?>">
		</div>
		<div class="layui-input-inline">
			<button class="layui-btn layui-btn-normal">搜索</button>
		</div>
		<div class="laimi-float-right">
			<a class="layui-btn laimi-add">新增员工</a>
		</div>
	</div>
</form>
<table class="layui-table">
	<thead>
		<tr>
			<th>分组</th>
			<th>姓名</th>
			<th>编号</th>
			<th>性别</th>
			<th>出生日期</th>
			<th>手机号码</th>
			<th>学历</th>
			<th>入职时间</th>
			<th>基本工资</th>
			<th>所属店铺</th>
			<th width="130">操作</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach($this->_data['worker_list']['list'] as $row){?>
		<tr>
			<td><?php echo $row['worker_group_name'];?></td>
			<td><?php echo $row['worker_name'];?></td>
			<td><?php echo $row['worker_code'];?></td>
			<td><?php echo $row['sex'];?></td>
			<td><?php echo $row['birthday'];?></td>
			<td><?php echo $row['worker_phone'];?></td>
			<td><?php echo $row['education_name'];?></td>
			<td><?php echo $row['join'];?></td>
			<td><?php echo $row['worker_wage'];?>元</td>
			<td><?php echo $row['shop_name'];?></td>
			<td>
				<button class="layui-btn layui-btn-mini laimi-edit" value="<?php echo $row['worker_id'];?>">
					<svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-bianji"></use></svg>
					修改
				</button>
				<button class="layui-btn layui-btn-primary layui-btn-mini laimi-del" value="<?php echo $row['worker_id'];?>">
					<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-clear"></use></svg>
					删除
				</button>
			</td>
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
	<!--新增员工弹出层开始-->
	<script type="text/html" id="laimi-add">
		<div id="laimi-modal-add" class="laimi-modal">
			<form class="layui-form">
				<div class="layui-row">
					<div class="layui-col-md6">
						<div class="layui-form-item">
							<label class="layui-form-label"><span>*</span> 所属分店</label>
					    <div class="layui-input-inline">
					      <select name="txtshop" lay-verify="required">
					        <option value="" selected="">请选择分店</option>
					        <?php foreach($this->_data['shop_list'] as $row){?>
					          <option value="<?php echo $row['shop_id'];?>"><?php echo $row['shop_name'];?></option>
					        <? }?>
					      </select>
					    </div>
					  </div>
			    </div>
			    <div class="layui-col-md6">
			      <div class="layui-form-item">
					    <label class="layui-form-label"><span>*</span> 员工分组</label>
					    <div class="layui-input-inline">
					      <select name="txtgroup" lay-verify="required">
					        <option value="" selected="">请选择分组</option>
					        <?php foreach($this->_data['worker_group_list'] as $row){?>
					          <option value="<?php echo $row['worker_group_id'];?>"><?php echo $row['worker_group_name'];?></option>
					        <? }?>
					      </select>
					    </div>
					  </div>
			    </div>
			    <div class="layui-col-md6">
			      <div class="layui-form-item">
					    <label class="layui-form-label"><span>*</span> 姓名</label>
					    <div class="layui-input-inline">
					      <input class="layui-input laimi-input-200" type="text" name="txtname" lay-verify="required">
					    </div>
					  </div>
			    </div>
			    <div class="layui-col-md6">
						<div class="layui-form-item">
					    <label class="layui-form-label">员工编号</label>
					    <div class="layui-input-inline">
					      <input class="layui-input laimi-input-200" type="text" name="txtcode">
					    </div>
					  </div>
			    </div>
			    <div class="layui-col-md6">
			      <div class="layui-form-item">
					    <label class="layui-form-label"><span>*</span> 性别</label>
					    <div class="layui-input-inline">
					      <input type="radio" name="txtsex" value="1" title="男" checked>
					      <input type="radio" name="txtsex" value="2" title="女">
					    </div>
					  </div>
			    </div>
			    <div class="layui-col-md6">
			      <div class="layui-form-item">
					    <label class="layui-form-label"><span>*</span> 手机号码</label>
					    <div class="layui-input-inline">
					      <input class="layui-input laimi-input-200" type="text" name="txtaccount" lay-verify="required">
					    </div>
					  </div>
			    </div>
			    <div class="layui-col-md6">
			      <div class="layui-form-item">
					    <label class="layui-form-label"><span>*</span> 出生日期</label>
					    <div class="layui-input-inline">
					      <input id="laimi-birthday" class="layui-input laimi-input-200" type="text" name="txtbirthday" placeholder="yyyy-MM-dd" lay-verify="required">
					    </div>
					  </div>
			    </div>
			    <div class="layui-col-md6">
			      <div class="layui-form-item">
					    <label class="layui-form-label"><span>*</span> 身份证号</label>
					    <div class="layui-input-inline">
					      <input class="layui-input laimi-input-200" type="text" name="txtidentity" lay-verify="required">
					    </div>
					  </div>
			    </div>
			    <div class="layui-col-md6">
			      <div class="layui-form-item">
					    <label class="layui-form-label">学历</label>
					    <div class="layui-input-inline">
					      <select name="txteducation">
					        <option value="" selected>请选择学历</option>
					        <?php foreach($GLOBALS['gconfig']['education'] as $key => $row){ ?>
					        <option value="<?php echo $key;?>"><?php echo $row;?></option>
					        <?php }?>
					      </select>
					    </div>
					  </div>
			    </div>
	        <div class="layui-col-md6">
	          <div class="layui-form-item">
	    		    <label class="layui-form-label">入职时间</label>
	    		    <div class="layui-input-inline">
	    		      <input id="laimi-join" class="layui-input laimi-input-200" type="text" name="txtjoin" placeholder="yyyy-MM-dd">
	    		    </div>
	    		  </div>
	        </div>
			    <div class="layui-col-md6">
			      <div class="layui-form-item">
					    <label class="layui-form-label">员工照片</label>
					    <div class="layui-input-inline">
					    	<input type="hidden" name="photo1">
					      <button id="laimi-photo" class="layui-btn layui-btn-normal layui-btn-small" type="button"><i class="layui-icon"></i>上传图片</button>
					    </div>
					  </div>
			    </div>
			    <div class="layui-col-md6">
			      <div class="layui-form-item">
					    <label class="layui-form-label">身份证</label>
					    <div class="layui-input-inline">
					    <input type="hidden" name="photo2">
					      <button id="laimi-identity" class="layui-btn layui-btn-normal layui-btn-small" type="button"><i class="layui-icon"></i>上传图片</button>
					    </div>
					  </div>
			    </div>
			    <div class="layui-col-md6">
			      <div class="layui-form-item">
					    <label class="layui-form-label">居住地址</label>
					    <div class="layui-input-inline">
					      <input class="layui-input laimi-input-200" type="text" name="txtaddress">
					    </div>
					  </div>
			    </div>
			    <div class="layui-col-md6">
			      <div class="layui-form-item">
					    <label class="layui-form-label">基本工资</label>
					    <div class="layui-input-inline">
					      <input class="layui-input laimi-input-80" type="text" name="txtwage" placeholder="￥">
					    </div>
					    <div class="layui-form-mid layui-word-aux">元</div>
					  </div>
			    </div>
				</div>
			  <div class="layui-form-item">
			    <div class="layui-input-block">
			      <button class="layui-btn laimi-button-100" lay-filter="laimi-add" lay-submit>
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
	<!--新增员工弹出层结束-->
	<script type="text/html" id="laimi-edit">
		<div id="laimi-modal-edit" class="laimi-modal">
			<form class="layui-form">
				<div class="layui-row">
					<div class="layui-col-md6">
						<div class="layui-form-item">
							<label class="layui-form-label"><span>*</span> 所属分店</label>
							<input type="hidden" name="txtid" value="{{d.worker_id}}">
					    <div class="layui-input-inline">
					      <select name="txtshop">
					        <option value="" selected="">请选择分店</option>
					        <?php foreach($this->_data['shop_list'] as $row){?>
					          <option value="<?php echo $row['shop_id'];?>" 
										{{# if(d.shop_id==<?php echo $row['shop_id'];?>){ }}
											selected
										{{#  } }}
					          ><?php echo $row['shop_name'];?></option>
					        <? }?>
					      </select>
					    </div>
					  </div>
			    </div>
			    <div class="layui-col-md6">
			      <div class="layui-form-item">
					    <label class="layui-form-label"><span>*</span> 员工分组</label>
					    <div class="layui-input-inline">
					      <select name="txtgroup">
					        <option value="" selected="">请选择分组</option>
					        <?php foreach($this->_data['worker_group_list'] as $row){?>
					          <option value="<?php echo $row['worker_group_id'];?>"
					          {{# if(d.worker_group_id==<?php echo $row['worker_group_id'];?>){ }}
					          	selected
					          {{#  } }}
					          ><?php echo $row['worker_group_name'];?></option>
					        <? }?>
					      </select>
					    </div>
					  </div>
			    </div>
			    <div class="layui-col-md6">
			      <div class="layui-form-item">
					    <label class="layui-form-label"><span>*</span> 姓名</label>
					    <div class="layui-input-inline">
					      <input class="layui-input laimi-input-200" type="text" name="txtname" value="{{d.worker_name}}">
					    </div>
					  </div>
			    </div>
			    <div class="layui-col-md6">
						<div class="layui-form-item">
					    <label class="layui-form-label">员工编号</label>
					    <div class="layui-input-inline">
					      <input class="layui-input laimi-input-200" type="text" name="txtcode" value="{{d.worker_code}}">
					      <input class="layui-input laimi-input-200" type="hidden" name="txtcodeold" value="{{d.worker_code}}">
					    </div>
					  </div>
			    </div>
			    <div class="layui-col-md6">
			      <div class="layui-form-item">
					    <label class="layui-form-label"><span>*</span> 性别</label>
					    <div class="layui-input-inline">
					      <input type="radio" name="txtsex" value="1" title="男" 
								{{# if(d.worker_sex==1){ }}
								checked
								{{# } }}
					      >
					      <input type="radio" name="txtsex" value="2" title="女" 
								{{# if(d.worker_sex==2){ }}
								checked
								{{# } }}
					      >
					    </div>
					  </div>
			    </div>
			    <div class="layui-col-md6">
			      <div class="layui-form-item">
					    <label class="layui-form-label"><span>*</span> 手机号码</label>
					    <div class="layui-input-inline">
					      <input class="layui-input laimi-input-200" type="text" name="txtaccount" value="{{d.worker_phone}}">
					    </div>
					  </div>
			    </div>
			    <div class="layui-col-md6">
			      <div class="layui-form-item">
					    <label class="layui-form-label"><span>*</span> 出生日期</label>
					    <div class="layui-input-inline">
					      <input id="laimi-birthday" class="layui-input laimi-input-200" type="text" name="txtbirthday" placeholder="yyyy-MM-dd" value="{{d.worker_birthday_date}}">
					    </div>
					  </div>
			    </div>
			    <div class="layui-col-md6">
			      <div class="layui-form-item">
					    <label class="layui-form-label"><span>*</span> 身份证号</label>
					    <div class="layui-input-inline">
					      <input class="layui-input laimi-input-200" type="text" name="txtidentity" value="{{d.worker_identity}}">
					    </div>
					  </div>
			    </div>
			    <div class="layui-col-md6">
			      <div class="layui-form-item">
					    <label class="layui-form-label">学历</label>
					    <div class="layui-input-inline">
					      <select name="txteducation">
					        <option value="" selected="">请选择学历</option>
					        <?php foreach($GLOBALS['gconfig']['education'] as $key => $row){ ?>
					        <option value="<?php echo $key;?>" 
									{{# if(d.worker_education==<?php echo $key;?>){ }}
									selected
									{{# } }}
					        ><?php echo $row;?></option>
					        <?php }?>
					      </select>
					    </div>
					  </div>
			    </div>
			    <div class="layui-col-md6">
			      <div class="layui-form-item">
					    <label class="layui-form-label">入职时间</label>
					    <div class="layui-input-inline">
					      <input id="laimi-join" class="layui-input laimi-input-200" type="text" name="txtjoin" placeholder="yyyy-MM-dd" value="{{d.worker_join}}">
					    </div>
					  </div>
			    </div>
			    <div class="layui-col-md6">
			      <div class="layui-form-item">
					    <label class="layui-form-label">员工照片</label>
					    <div class="layui-input-inline">
					    <input type="hidden" name="photo1">
					      <button id="laimi-photo" class="layui-btn layui-btn-normal layui-btn-small" type="button"><i class="layui-icon"></i>上传图片</button>
					    </div>
					  </div>
			    </div>
			    <div class="layui-col-md6">
			      <div class="layui-form-item">
					    <label class="layui-form-label">身份证</label>
					    <div class="layui-input-inline">
					    <input type="hidden" name="photo2">
					      <button id="laimi-identity" class="layui-btn layui-btn-normal layui-btn-small" type="button"><i class="layui-icon"></i>上传图片</button>
					    </div>
					  </div>
			    </div>
			    <div class="layui-col-md6">
			      <div class="layui-form-item">
					    <label class="layui-form-label">居住地址</label>
					    <div class="layui-input-inline">
					      <input class="layui-input laimi-input-200" type="text" name="txtaddress" value="{{d.worker_address}}">
					    </div>
					  </div>
			    </div>
			    <div class="layui-col-md6">
			      <div class="layui-form-item">
					    <label class="layui-form-label">基本工资</label>
					    <div class="layui-input-inline">
					      <input class="layui-input laimi-input-80" type="text" name="txtwage" placeholder="￥" value="{{d.worker_wage}}">
					    </div>
					    <div class="layui-form-mid layui-word-aux">元</div>
					  </div>
			    </div>
				</div>
			  <div class="layui-form-item">
			    <div class="layui-input-block">
			      <button class="layui-btn laimi-button-100" lay-filter="laimi-edit" lay-submit>
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
<?php echo $this->fun_fetch('inc_foot', ''); ?>
	<script>
	layui.use(["element", "laydate", "laypage", "upload", "layer", "form", "laytpl"], function() {
		var $ = layui.jquery;
		var objlayer = layui.layer;
		var objelement = layui.element;
		var objdate = layui.laydate;
		var objpage = layui.laypage;
		var objupload = layui.upload;
		var objform = layui.form;
		var objlaytpl = layui.laytpl;

		objpage.render({
			elem: 'laimi-page-content',
			count: <?php echo $this->_data['worker_list']['allcount'];?>,
			limit: 5,
			curr: <?php echo $this->_data['worker_list']['pagenow'];?>,
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
				title: ["新增员工", "font-size:16px;"],
				btnAlign: "r",
				area: ["800px", "auto"],
				shadeClose: true,//点击遮罩关闭
				content: $("#laimi-add").html(),
				success: function(){
					renderAll();
				}
			});
		});
		objform.on("submit(laimi-add)", function(data) {
			$.post('worker_add_do.php', data.field, function(res){
				// console.log(res);
				if(res == 0){
					window.location.reload();
				}else if(res == 2){
					objlayer.alert('新增失败，编码必须唯一', {
						title: '提示信息'
					});
				}else{
					objlayer.alert('新增失败，请联系管理员', {
						title: '提示信息'
					});
				}
			})
			return false;
		});
		$(".laimi-edit").on("click", function() {
			$.getJSON('worker_edit_ajax.php', {id:$(this).val()}, function(res){
				objlaytpl($("#laimi-edit").html()).render(res, function(html){
				  objlayer.open({
				  	type: 1,
				  	title: ["修改员工", "font-size:16px;"],
				  	btnAlign: "r",
				  	area: ["680px", "auto"],
				  	shadeClose: true,//点击遮罩关闭
				  	content: html,
				  	success: function(){
				  		renderAll();
				  	}
				  });
				});
			})
		});
		objform.on("submit(laimi-edit)", function(data) {
			$.post('worker_edit_do.php', data.field, function(res){
				console.log(res);
				if(res == 0){
					window.location.reload();
				}else if(res == 2){
					objlayer.alert('新增失败，编码必须唯一', {
						title: '提示信息'
					});
				}else{
					objlayer.alert('修改失败，请联系管理员', {
						title: '提示信息'
					});
				}
			})
			return false;
		});
		$(".laimi-del").on("click", function() {
			var id = $(this).val();
			objlayer.confirm('你确定要删除吗', {icon: 0, title:'提示', shadeClose: true}, function(index){
			  $.post('worker_delete_do.php', {id:id}, function(res){
			  	if(res == 0){
			  		window.location.reload();
			  	}else if(res == 1){
						objlayer.alert('删除失败，此员工有提成不能删除', {
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
		})

		function renderAll(){
			objform.render();
			objdate.render({
				elem: '#laimi-birthday'
			});
			objdate.render({
				elem: '#laimi-join'
			});
			objupload.render({
				elem: '#laimi-photo',
				url: './upload_do.php',
				accept: 'jpg|png|gif',
				size: 10240, //限制文件大小，单位 KB
				before: function(obj){
				  //预读本地文件示例，不支持ie8
				  // obj.preview(function(index, file, result){
				  //   $('#laimi-showimg').attr('src', result); //图片链接（base64）
				  // });
				},
				done: function(res) {
				  if(res.code == 200){
				  	$(".laimi-modal input[name='photo1']").val(res.data.photo);
				  }
				}
		  });
		  objupload.render({
				elem: '#laimi-identity',
				url: './upload_do.php',
				accept: 'jpg|png|gif',
				size: 10240, //限制文件大小，单位 KB
				before: function(obj){
				  //预读本地文件示例，不支持ie8
				  // obj.preview(function(index, file, result){
				  //   $('#laimi-showimg').attr('src', result); //图片链接（base64）
				  // });
				},
				done: function(res) {
				  if(res.code == 200){
				  	$(".laimi-modal input[name='photo2']").val(res.data.photo);
				  }
				}
		  });
		}
	});
	</script>
</body>
</html>