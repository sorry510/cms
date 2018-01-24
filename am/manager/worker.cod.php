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
					<li class="<?php if($GLOBALS['intstate'] == 1) echo 'layui-this'; ?>">
						<a href="worker.php?state=1">员工管理</a>
					</li>
					<li class="<?php if($GLOBALS['intstate'] == 2) echo 'layui-this'; ?>">
						<a href="worker.php?state=2">离职员工</a>
					</li>
					<li>
						<a href="worker_group.php">员工分组</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-worker layui-tab-content">
<form class="layui-form">
<input type="hidden" name="state" value="<?php echo $GLOBALS['intstate']; ?>">
	<div class="laimi-tools layui-form-item">
		<label class="layui-form-label">选择分店</label>
		<div class="layui-input-inline">
			<select name="shop">
				<option value="">全部分店</option>
				<?php foreach($GLOBALS['gshop'] as $row) { ?>
				<option value="<?php echo $row['shop_id']; ?>"<?php if($row['shop_id'] == $GLOBALS['intshop']) echo ' selected'; ?>><?php echo $row['shop_name']; ?></option>
				<?php } ?>
			</select>
		</div>
		<label class="layui-form-label">选择分组</label>
		<div class="layui-input-inline">
			<select name="group">
				<option value="">全部分组</option>
				<?php foreach($this->_data['worker_group_list'] as $row) { ?>
				<option value="<?php echo $row['worker_group_id']; ?>"<?php if($row['worker_group_id'] == $GLOBALS['intgroup']) echo ' selected'?>><?php echo $row['worker_group_name']; ?></option>
				<?php } ?>
			</select>
		</div>
		<label class="layui-form-label">员工</label>
		<div class="layui-input-inline last">
			<input class="layui-input laimi-input-200 laimi-focus" type="text" name="key" placeholder="姓名/编号" value="<?php echo $GLOBALS['strkey']; ?>">
		</div>
		<div class="layui-input-inline">
			<button class="layui-btn layui-btn-normal">搜索</button>
		</div>
		<div class="laimi-float-right">
			<a href="worker_export.php?<?php echo api_value_query($this->_data['request']);?>" class="layui-btn">员工导出</a>
		</div>
		<div class="laimi-float-right" style="margin-right:20px;">
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
		<?php foreach($this->_data['worker_list']['list'] as $row) { ?>
		<tr>
			<td><?php echo $row['worker_group_name']; ?></td>
			<td><a href="javasript:;" class="laimi-color-lan laimi-info" wid="<?php echo $row['worker_id']; ?>"><?php echo $row['worker_name']; ?></a></td>
			<td><?php echo $row['worker_code']; ?></td>
			<td><?php echo $row['mysex']; ?></td>
			<td><?php echo $row['mybirthday']; ?></td>
			<td><?php echo $row['worker_phone']; ?></td>
			<td><?php echo $GLOBALS['gconfig']['worker']['education'][$row['worker_education']]; ?></td>
			<td><?php echo $row['myjoin']; ?></td>
			<td>￥<?php echo $row['worker_wage'] + 0; ?></td>
			<td><?php echo $row['shop_name']; ?></td>
			<td>
				<?php if($row['worker_state'] == 1) { ?>
				<button class="layui-btn layui-btn-mini laimi-edit" value="<?php echo $row['worker_id']; ?>">
					<svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-bianji"></use></svg>
					修改
				</button>
				<button class="layui-btn layui-btn-primary layui-btn-mini laimi-state2" value="<?php echo $row['worker_id']; ?>">
					<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-clear"></use></svg>
					离职
				</button>
				<?php } else if($row['worker_state'] == 2) { ?>
				<button class="layui-btn layui-btn-mini laimi-state1" value="<?php echo $row['worker_id']; ?>">
					<svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-bianji"></use></svg>
					恢复
				</button>
				<button class="layui-btn layui-btn-primary layui-btn-mini laimi-del" value="<?php echo $row['worker_id']; ?>">
					<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-clear"></use></svg>
					删除
				</button>
				<?php	} ?>
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
	<!--新增员工弹出层开始-->
	<script type="text/html" id="laimi-script-add">
		<div id="laimi-modal-add" class="laimi-modal">
			<form class="layui-form" lay-filter="laimi-form-add">
				<div class="layui-row">
					<div class="layui-col-md6">
						<div class="layui-form-item">
							<label class="layui-form-label"><span>*</span> 所属分店</label>
					    <div class="layui-input-inline">
					      <select name="txtshop" lay-verify="required">
					        <option value="">请选择分店</option>
					        <?php foreach($GLOBALS['gshop'] as $row) { ?>
					        <option value="<?php echo $row['shop_id']; ?>"><?php echo $row['shop_name']; ?></option>
					        <?php } ?>
					      </select>
					    </div>
					  </div>
			    </div>
			    <div class="layui-col-md6">
			      <div class="layui-form-item">
					    <label class="layui-form-label"><span>*</span> 员工分组</label>
					    <div class="layui-input-inline">
					      <select name="txtgroup" lay-verify="required">
					        <option value="">请选择分组</option>
					        <?php foreach($this->_data['worker_group_list'] as $row) { ?>
					        <option value="<?php echo $row['worker_group_id']; ?>"><?php echo $row['worker_group_name']; ?></option>
					        <?php } ?>
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
					      <input class="layui-input laimi-input-200" type="text" name="txtphone" lay-verify="phone">
					    </div>
					  </div>
			    </div>
			    <div class="layui-col-md6">
			      <div class="layui-form-item">
					    <label class="layui-form-label">出生日期</label>
					    <div class="layui-input-inline">
					      <input id="laimi-birthday" class="layui-input laimi-input-200" type="text" name="txtbirthday" placeholder="yyyy-MM-dd">
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
					        <option value="">请选择学历</option>
					        <?php foreach($GLOBALS['gconfig']['worker']['education'] as $key => $row) { ?>
					        <?php if($key > 0) { ?><option value="<?php echo $key; ?>"><?php echo $row; ?></option><?php } ?>
					        <?php } ?>
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
					    <div class="layui-input-inline" style="padding-top:7px;">
					      <button id="laimi-photo" class="layui-btn layui-btn-normal layui-btn-small" type="button"><i class="layui-icon"></i>上传图片</button>
					      <input id="laimi-photo-name" type="hidden" name="txtphoto" value="">
					      <span id="laimi-photo-info" style="color:#999999;"></span>
					    </div>
					  </div>
			    </div>
			    <div class="layui-col-md6">
			      <div class="layui-form-item">
					    <label class="layui-form-label">身份证照</label>
					    <div class="layui-input-inline" style="padding-top:7px;">
					      <button id="laimi-identity" class="layui-btn layui-btn-normal layui-btn-small" type="button"><i class="layui-icon"></i>上传图片</button>
					      <input id="laimi-identity-name" type="hidden" name="txtidentity2" value="">
					      <span id="laimi-identity-info" style="color:#999999;"></span>
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
			      <button class="layui-btn laimi-button-100" lay-filter="laimi-submit-add" lay-submit>
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
	<!--修改员工弹出层开始-->
	<script type="text/html" id="laimi-script-edit">
		<div id="laimi-modal-edit" class="laimi-modal">
			<form class="layui-form" lay-filter="laimi-form-edit">
			<input type="hidden" name="txtid" value="{{d.worker_id}}">
				<div class="layui-row">
					<div class="layui-col-md6">
						<div class="layui-form-item">
							<label class="layui-form-label"><span>*</span> 所属分店</label>
					    <div class="layui-input-inline">
					      <select name="txtshop" disabled>
					        <option value="">请选择分店</option>
					        <?php foreach($GLOBALS['gshop'] as $row) { ?>
					          <option value="<?php echo $row['shop_id']; ?>" 
										{{# if(d.shop_id == <?php echo $row['shop_id']; ?>) { }}
											selected
										{{#  } }}
					          ><?php echo $row['shop_name']; ?></option>
					        <?php } ?>
					      </select>
					    </div>
					  </div>
			    </div>
			    <div class="layui-col-md6">
			      <div class="layui-form-item">
					    <label class="layui-form-label"><span>*</span> 员工分组</label>
					    <div class="layui-input-inline">
					      <select name="txtgroup" lay-verify="required">
					        <option value="">请选择分组</option>
					        <?php foreach($this->_data['worker_group_list'] as $row) { ?>
					          <option value="<?php echo $row['worker_group_id']; ?>"
					          {{# if(d.worker_group_id == <?php echo $row['worker_group_id']; ?>){ }}
					          	selected
					          {{#  } }}
					          ><?php echo $row['worker_group_name']; ?></option>
					        <?php } ?>
					      </select>
					    </div>
					  </div>
			    </div>
			    <div class="layui-col-md6">
			      <div class="layui-form-item">
					    <label class="layui-form-label"><span>*</span> 姓名</label>
					    <div class="layui-input-inline">
					      <input class="layui-input laimi-input-200" type="text" name="txtname" value="{{d.worker_name}}" lay-verify="required">
					    </div>
					  </div>
			    </div>
			    <div class="layui-col-md6">
						<div class="layui-form-item">
					    <label class="layui-form-label">员工编号</label>
					    <div class="layui-input-inline">
					      <input class="layui-input laimi-input-200" type="text" name="txtcode" value="{{d.worker_code}}">
					    </div>
					  </div>
			    </div>
			    <div class="layui-col-md6">
			      <div class="layui-form-item">
					    <label class="layui-form-label"><span>*</span> 性别</label>
					    <div class="layui-input-inline">
					      <input type="radio" name="txtsex" value="1" title="男" 
								{{# if(d.worker_sex == 1){ }}
								checked
								{{# } }}
					      >
					      <input type="radio" name="txtsex" value="2" title="女" 
								{{# if(d.worker_sex == 2){ }}
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
					      <input class="layui-input laimi-input-200" type="text" name="txtphone" value="{{d.worker_phone}}" lay-verify="phone">
					    </div>
					  </div>
			    </div>
			    <div class="layui-col-md6">
			      <div class="layui-form-item">
					    <label class="layui-form-label">出生日期</label>
					    <div class="layui-input-inline">
					      <input id="laimi-birthday" class="layui-input laimi-input-200" type="text" name="txtbirthday" placeholder="yyyy-MM-dd" value="{{d.mybirthday}}">
					    </div>
					  </div>
			    </div>
			    <div class="layui-col-md6">
			      <div class="layui-form-item">
					    <label class="layui-form-label"><span>*</span> 身份证号</label>
					    <div class="layui-input-inline">
					      <input class="layui-input laimi-input-200" type="text" name="txtidentity" value="{{d.worker_identity}}" lay-verify="required">
					    </div>
					  </div>
			    </div>
			    <div class="layui-col-md6">
			      <div class="layui-form-item">
					    <label class="layui-form-label">学历</label>
					    <div class="layui-input-inline">
					      <select name="txteducation">
					        <option value="">请选择学历</option>
					        <?php foreach($GLOBALS['gconfig']['worker']['education'] as $key => $row) { ?>
					        <option value="<?php echo $key; ?>" 
									{{# if(d.worker_education == <?php echo $key; ?>){ }}
									selected
									{{# } }}
					        ><?php echo $row; ?></option>
					        <?php }?>
					      </select>
					    </div>
					  </div>
			    </div>
			    <div class="layui-col-md6">
			      <div class="layui-form-item">
					    <label class="layui-form-label">入职时间</label>
					    <div class="layui-input-inline">
					      <input id="laimi-join" class="layui-input laimi-input-200" type="text" name="txtjoin" placeholder="yyyy-MM-dd" value="{{d.myjoin}}">
					    </div>
					  </div>
			    </div>
			    <div class="layui-col-md6">
			      <div class="layui-form-item">
					    <label class="layui-form-label">员工照片</label>
					    <div class="layui-input-inline" style="padding-top:7px;">
					      <button id="laimi-photo" class="layui-btn layui-btn-normal layui-btn-small" type="button"><i class="layui-icon"></i>上传图片</button>
					      <input id="laimi-photo-name" type="hidden" name="txtphoto" value="">
					      <span id="laimi-photo-info" style="color:#999999;">{{d.worker_photo_file}}</span>
					    </div>
					  </div>
			    </div>
			    <div class="layui-col-md6">
			      <div class="layui-form-item">
					    <label class="layui-form-label">身份证照</label>
					    <div class="layui-input-inline" style="padding-top:7px;">
					      <button id="laimi-identity" class="layui-btn layui-btn-normal layui-btn-small" type="button"><i class="layui-icon"></i>上传图片</button>
					      <input id="laimi-identity-name" type="hidden" name="txtidentity2" value="">
					      <span id="laimi-identity-info" style="color:#999999;">{{d.worker_identity_file}}</span>
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
			      <button class="layui-btn laimi-button-100" lay-filter="laimi-submit-edit" lay-submit>
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
	<!--修改员工弹出层结束-->
	<script type="text/html" id="laimi-modal-info">
		<div id="laimi-modal-info" class="laimi-modal">
			<div class="layui-row">
		    <div class="layui-col-md6">
		      <div class="layui-form-item" style="margin-bottom:-6px;">
				    <label class="layui-form-label">所属分店</label>
				    <div class="layui-form-mid layui-word-aux">{{d.shop_name}}</div>
				  </div>
		    </div>
		    <div class="layui-col-md6">
		      <div class="layui-form-item" style="margin-bottom:-6px;">
				    <label class="layui-form-label">员工分组</label>
				    <div class="layui-form-mid layui-word-aux">{{d.worker_group_name}}</div>
				  </div>
		    </div>
		    <div class="layui-col-md6">
		      <div class="layui-form-item" style="margin-bottom:-6px;">
				    <label class="layui-form-label">姓名</label>
				    <div class="layui-form-mid layui-word-aux"><span class="laimi-color-lan">{{d.worker_name}}</span></div>
				  </div>
		    </div>
		    <div class="layui-col-md6">
		      <div class="layui-form-item" style="margin-bottom:-6px;">
				    <label class="layui-form-label">员工编号</label>
				    <div class="layui-form-mid layui-word-aux">{{d.worker_code}}</div>
				  </div>
		    </div>
		    <div class="layui-col-md6">
		      <div class="layui-form-item" style="margin-bottom:-6px;">
				    <label class="layui-form-label">性别</label>
				    <div class="layui-form-mid layui-word-aux">{{d.worker_sex_name}}</div>
				  </div>
		    </div>
		    <div class="layui-col-md6">
		      <div class="layui-form-item" style="margin-bottom:-6px;">
				    <label class="layui-form-label">手机号码</label>
				    <div class="layui-form-mid layui-word-aux">{{d.worker_phone}}</div>
				  </div>
		    </div>
		    <div class="layui-col-md6">
		      <div class="layui-form-item" style="margin-bottom:-6px;">
				    <label class="layui-form-label">出生日期</label>
				    <div class="layui-form-mid layui-word-aux">{{d.worker_birthday_date}}</div>
				  </div>
		    </div>
		    <div class="layui-col-md6">
		      <div class="layui-form-item" style="margin-bottom:-6px;">
				    <label class="layui-form-label">身份证号</label>
				    <div class="layui-form-mid layui-word-aux">{{d.worker_identity}}</div>
				  </div>
		    </div>
		    <div class="layui-col-md6">
		      <div class="layui-form-item" style="margin-bottom:-6px;">
				    <label class="layui-form-label">学历</label>
				    <div class="layui-form-mid layui-word-aux">{{d.worker_education_name}}</div>
				  </div>
		    </div>
		    <div class="layui-col-md6">
		      <div class="layui-form-item" style="margin-bottom:-6px;">
				    <label class="layui-form-label">入职时间</label>
				    <div class="layui-form-mid layui-word-aux">{{d.worker_join}}</div>
				  </div>
		    </div>
		    <div class="layui-col-md6">
		      <div class="layui-form-item" style="margin-bottom:-6px;">
				    <label class="layui-form-label">居住地址</label>
				    <div class="layui-form-mid layui-word-aux">{{d.worker_address}}</div>
				  </div>
		    </div>
		    <div class="layui-col-md6">
		      <div class="layui-form-item" style="margin-bottom:-6px;">
				    <label class="layui-form-label">基本工资</label>
				    <div class="layui-form-mid layui-word-aux">¥{{d.worker_wage}}</div>
				  </div>
		    </div>
		    <div class="layui-col-md6">
		    	<div class="layui-form-item" style="margin-bottom:-6px;">
						<label class="layui-form-label">会员照片</label>
			  		<div class="layui-form-mid layui-word-aux"><img src="pub_image_file.php?type=worker-photo&file={{d.worker_photo_file}}" style="width:130px;height:130px;"></div>
					</div>
		    </div>
		    <div class="layui-col-md6">
		    	<div class="layui-form-item" style="margin-bottom:-6px;">
						<label class="layui-form-label">身份证照</label>
			  		<div class="layui-form-mid layui-word-aux"><img src="pub_image_file.php?type=worker-identity&file={{d.worker_identity_file}}" style="width:200px;height:130px;"></div>
			  	</div>
			  </div>
		  </div>
		</div>
	</script>
<?php echo $this->fun_fetch('inc_foot', ''); ?>
	<script>
	layui.use(["layer", "element", "laypage", "laydate", "upload", "laytpl", "form"], function() {
		var $ = layui.jquery;
		var objlayer = layui.layer;
		var objelement = layui.element;
		var objpage = layui.laypage;
		var objdate = layui.laydate;
		var objupload = layui.upload;
		var objlaytpl = layui.laytpl;
		var objform = layui.form;

		$('.laimi-focus').focus();
		
		objpage.render({
			elem: 'laimi-page-content',
			count: <?php echo $this->_data['worker_list']['allcount']; ?>,
			limit: 50,
			curr: <?php echo $this->_data['worker_list']['pagenow']; ?>,
			layout: ['count', 'prev', 'page', 'next',  'skip'],
			jump: function(obj, first) {
				if(!first) {
					window.location = "worker.php?<?php echo api_value_query($this->_data['request']); ?>&page=" + obj.curr;
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
				content: $("#laimi-script-add").html()
			});
			render_do();
			objform.render(null, "laimi-form-add");
		});
		objform.on("submit(laimi-submit-add)", function(objdata) {
			var objthis = $(this);
			objthis.attr("disabled", true);
			$.post('worker_add_do.php', objdata.field, function(strdata) {
				if(strdata == 0) {
					window.location.reload();
				} else if(strdata == 2) {
					objlayer.alert("员工编码不能重复！", {
						title: '提示信息'
					});
				} else {
					objlayer.alert("新增员工失败，请联系管理员！", {
						title: '提示信息'
					});
				}
				objthis.attr("disabled", false);
			});
			return false;
		});
		$(".laimi-edit").on("click", function() {
			$.getJSON('worker_edit_ajax.php', {id:$(this).val()}, function(objdata) {
				objlaytpl($("#laimi-script-edit").html()).render(objdata, function(strhtml) {
				  objlayer.open({
				  	type: 1,
				  	title: ["修改员工", "font-size:16px;"],
				  	btnAlign: "r",
				  	area: ["680px", "auto"],
				  	shadeClose: true,//点击遮罩关闭
				  	content: strhtml
				  });
				  render_do();
				  objform.render(null, "laimi-form-edit");
				});
			});
		});
		objform.on("submit(laimi-submit-edit)", function(objdata) {
			var objthis = $(this);
			objthis.attr("disabled", true);
			$.post('worker_edit_do.php', objdata.field, function(strdata) {
				if(strdata == 0) {
					window.location.reload();
				} else if(strdata == 2) {
					objlayer.alert("员工编码不能重复！", {
						title: '提示信息'
					});
				} else {
					objlayer.alert("修改员工失败，请联系管理员！", {
						title: '提示信息'
					});
				}
				objthis.attr("disabled", false);
			});
			return false;
		});
		$(".laimi-state2").on("click", function() {
			var strid = $(this).val();
			objlayer.confirm('确定该员工离职吗？', {icon:0, title:'提示', shadeClose:true}, function(hindex) {
			  $.post('worker_state_do.php', {id:strid, state:2}, function(strdata) {
			  	if(strdata == 0) {
			  		window.location.reload();
			  	} else {
			  		objlayer.alert('操作失败，请联系管理员！', {
			  			title: '提示信息'
			  		});
			  	}
			  });
			  objlayer.close(hindex);
			});
		});
		$(".laimi-state1").on("click", function() {
			var strid = $(this).val();
			objlayer.confirm('确定该员工复职吗？', {icon:0, title:'提示', shadeClose:true}, function(hindex) {
			  $.post('worker_state_do.php', {id:strid, state:1}, function(strdata) {
			  	if(strdata == 0) {
			  		window.location.reload();
			  	} else {
			  		objlayer.alert('操作失败，请联系管理员！', {
			  			title: '提示信息'
			  		});
			  	}
			  });
			  objlayer.close(hindex);
			});
		});
		$(".laimi-del").on("click", function() {
			var strid = $(this).val();
			objlayer.confirm('确定要删除该员工吗？', {icon:0, title:'提示', shadeClose:true}, function(hindex) {
			  $.post('worker_delete_do.php', {id:strid}, function(strdata) {
			  	if(strdata == 0) {
			  		window.location.reload();
			  	} else {
			  		objlayer.alert('删除失败，请联系管理员！', {
			  			title: '提示信息'
			  		});
			  	}
			  });
			  objlayer.close(hindex);
			});
		});
		$(".laimi-info").on("click", function() {
			$.getJSON('worker_info_ajax.php', {id:$(this).attr('wid')}, function(res){
				objlaytpl($("#laimi-modal-info").html()).render(res, function(html){
				  objlayer.open({
				  	type: 1,
				  	title: ["员工信息", "font-size:16px;"],
				  	btnAlign: "r",
				  	offset: 'rt',
				  	anim: 0,
				  	area: ["800px", "100%"],
				  	shadeClose: true,//点击遮罩关闭
				  	content: html,
				  });
				});
			})
		});
		function render_do() {
			objdate.render({
				elem: '#laimi-birthday'
			});
			objdate.render({
				elem: '#laimi-join'
			});
			objupload.render({
			  elem: '#laimi-photo', //绑定元素
			  url: 'pub_upload_do.php', //上传接口
			  exts: 'jpg|gif|png',
			  data: {
			  	type:'image'
			  },
			  before: function(obj) {
			    obj.preview(function(index, file, result) {
			      $('#laimi-photo-info').text(file.name);
			    });
			  },
			  done: function(res, index, upload) {
			  	if(res.code == 0) {
			  		$("#laimi-photo-name").val(res.image);
			  	} else {
			  		objlayer.alert('图片上传失败，请联系管理员！', {
				    	title: "提示信息"
				    });
			  	}
			  },
			  error: function(index, upload) {
			    objlayer.alert('图片上传失败，请联系管理员！', {
			    	title: "提示信息"
			    });
			  }
		  });
		  objupload.render({
			  elem: '#laimi-identity', //绑定元素
			  url: 'pub_upload_do.php', //上传接口
			  exts: 'jpg|gif|png',
			  data: {
			  	type:'image'
			  },
			  before: function(obj) {
			    obj.preview(function(index, file, result) {
			      $('#laimi-identity-info').text(file.name);
			    });
			  },
			  done: function(res, index, upload) {
			  	if(res.code == 0) {
			  		$("#laimi-identity-name").val(res.image);
			  	} else {
			  		objlayer.alert('图片上传失败，请联系管理员！', {
				    	title: "提示信息"
				    });
			  	}
			  },
			  error: function(index, upload) {
			    objlayer.alert('图片上传失败，请联系管理员！', {
			    	title: "提示信息"
			    });
			  }
		  });
		}
	});
	</script>
</body>
</html>