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
				<div id="laimi-main" class="p-worker layui-tab-content" style="padding:0px;">
<form class="layui-form">
<table class="layui-table" lay-skin="line">
  <tbody>
    <tr>
      <td style="padding:0px;" class="layui-bg-gray" colspan="2">
      	<div class="layui-form-mid" style="margin-left:20px;"><input class="layui-input card-search" type="text" name="txtname" placeholder="卡号/姓名/手机号"></div>
		<div class="layui-form-mid"><a class="layui-btn layui-btn-normal laimi-add3">搜索</a></div>
		<div class="layui-form-mid laimi-float-right"><a href="card_add.php" target="_blank" class="layui-btn layui-btn-danger">开卡</a></div>
	  </td>
    </tr>
    <tr class="laimi-cardinfo layui-hide">
      <td style="padding:0px;height:50px;line-height:50px;">
      	<div class="layui-form-mid laimi-color-hui" style="margin-left:25px;">卡号</div>
				<div class="layui-form-mid laimi-color-lan laimi-card-code">--</div>
				<div class="layui-form-mid laimi-color-hui" style="margin-left:25px;">姓名</div>
				<div class="layui-form-mid laimi-color-ju laimi-card-name">--</div>
				<div class="layui-form-mid laimi-color-hui" style="margin-left:25px;">性别</div>
				<div class="layui-form-mid laimi-color-lan laimi-card-sex">--</div>
				<div class="layui-form-mid laimi-color-hui" style="margin-left:25px;">手机</div>
				<div class="layui-form-mid laimi-color-lan laimi-card-phone">--</div>
				<div class="layui-form-mid laimi-color-hui" style="margin-left:25px;">卡类型</div>
				<div class="layui-form-mid laimi-color-lan laimi-card-typename">--</div>
				<div class="layui-form-mid laimi-color-hui" style="margin-left:25px;">余额</div>
				<div class="layui-form-mid laimi-color-ju laimi-card-ymoney" style="font-weight:bold;">¥0.00</div>
				<div class="layui-form-mid laimi-color-hui" style="margin-left:25px;">积分</div>
				<div class="layui-form-mid laimi-color-lan laimi-card-yscore">0</div>
      </td>
      <td width="140" style="padding:0px;">
				<div class="layui-form-mid laimi-float-right"><button type="button" class="layui-btn layui-btn-normal laimi-add2">充值</button></div>
      </td>
    </tr>
  </tbody>
</table>
<div class="laimi-tools layui-form-item" style="padding:0px;">
	<div class="layui-row layui-col-space15">
    <div class="layui-col-md4">
      	<div class="layui-tab">
		  <ul class="layui-tab-title">
		    <li class="layui-this" style="padding:0px 6px;">可选商品</li>
		    <li style="padding:0px 6px;">买套餐</li>
		    <li style="padding:0px 12px;">会员套餐<span class="layui-badge layui-bg-orange">3</span></li>
		    <li style="padding:0px 12px;">体验券<span class="layui-badge layui-bg-orange">2</span></li>
		  </ul>
		  <div class="layui-tab-content" style="padding:0px;">
		    <div class="layui-tab-item layui-show">
		    	<table class="layui-table" style="margin-top:0px;" lay-skin="line">
					  <thead>
					    <tr class="layui-bg-green">
					      <th>分类/名称</th>
					      <th width="40">价格</th>
					      <th width="40">操作</th>
					    </tr>
					    <tr>
					      <td colspan="3" style="text-align:left;background-color:#F8F8F8;color:#FF5722;">
				      		限时打折：2017-8-15至2017-8-30
					      </td>
					    </tr>
					  </thead>
					  <tbody>
					    <tr>
					      <td colspan="3" style="text-align: left;">
								<div class="layui-input-inline last" style="width:100px;">
									<select name="goodscatalog">
										<option value="">商品分类</option>
										<?php foreach($this->_data['mgoods_catalog_list'] as $row) { ?>
		                <option value="<?php echo 'm-'.$row['mgoods_catalog_id']; ?>"><?php echo $row['mgoods_catalog_name']; ?></option>
		              	<?php } ?>
		              	<?php foreach($this->_data['sgoods_catalog_list'] as $row) { ?>
		                <option value="<?php echo 's-'.$row['sgoods_catalog_id']; ?>"><?php echo $row['sgoods_catalog_name']; ?></option>
		              	<?php } ?>
									</select>
								</div>
								<div class="layui-input-inline last">
									<input class="layui-input laimi-input-200 laimi-search" type="text" placeholder="商品名称/编码/简拼" style="width:120px;">
								</div>
								<div class="layui-input-inline">
									<button type="button" class="layui-btn layui-btn-normal laimi-button-search">F2搜索</button>
							  </td>
					    </tr>
					  <?php foreach($this->_data['mgoods_list'] as $row) { ?>
					    <tr class="laimi-goods-cate laimi-goods" cate gtype="m" catalog="<?php echo $row['mgoods_catalog_id']; ?>">
					      <td colspan="3" style="text-align:left;" class="laimi-color-lan"><span class="layui-badge layui-bg-blue">通用</span>&nbsp;<?php echo $row['mgoods_catalog_name']; ?></td>
					    </tr>
					    <?php foreach($row['mgoods'] as $row2){ ?>
					    <tr class="laimi-goods" gtype="m" catalog="<?php echo $row['mgoods_catalog_id']; ?>" gcode="<?php echo $row2['mgoods_code']; ?>" gname="<?php echo $row2['mgoods_name']; ?>" gshort="<?php echo $row2['mgoods_jianpin']; ?>">
					      <td style="text-align:left;">
				      		<?php echo $row2['mgoods_name']; ?> <span class="laimi-color-hui">(34)</span>
					      </td>
					      <td>
				      		<span class="laimi-color-hui2">¥<?php echo $row2['mgoods_price']; ?>&nbsp;<span class="laimi-color-ju">¥22</span>
					      </td>
					      <td>
				      		<a href="#" class="laimi-color-lan">添加</a>
					      </td>
					    </tr>
					    <?php } ?>
					  <?php } ?>
			  	  <?php foreach($this->_data['sgoods_list'] as $row) { ?>
			  	    <tr class="laimi-goods-cate laimi-goods" cate gtype="s" catalog="<?php echo $row['sgoods_catalog_id']; ?>">
			  	      <td colspan="3" style="text-align:left;" class="laimi-color-lan"><span class="layui-badge layui-bg-blue">单店</span>&nbsp;<?php echo $row['sgoods_catalog_name']; ?></td>
			  	    </tr>
			  	    <?php foreach($row['sgoods'] as $row2){ ?>
			  	    <tr class="laimi-goods" gtype="s" catalog="<?php echo $row['sgoods_catalog_id']; ?>" gcode="<?php echo $row2['sgoods_code']; ?>" gname="<?php echo $row2['sgoods_name']; ?>" gshort="<?php echo $row2['sgoods_jianpin']; ?>">
			  	      <td style="text-align:left;">
			        		<?php echo $row2['sgoods_name']; ?> <span class="laimi-color-hui">(34)</span>
			  	      </td>
			  	      <td>
			        		<span class="laimi-color-hui2">¥<?php echo $row2['sgoods_price']; ?>&nbsp;<span class="laimi-color-ju">¥22</span>
			  	      </td>
			  	      <td>
			        		<a href="#" class="laimi-color-lan">添加</a>
			  	      </td>
			  	    </tr>
			  	    <?php } ?>
			  	  <?php } ?>
					  </tbody>
					</table>
		    </div>
		    <div class="layui-tab-item">
		    	<table class="layui-table" style="margin-top:0px;" lay-skin="line">
				  <thead>
				    <tr class="layui-bg-green">
				      <th width="200">可选套餐</th>
				      <th>价格</th>
				      <th width="40">操作</th>
				    </tr>
				    <tr>
				      <td colspan="3" style="text-align:left;background-color:#F8F8F8;color:#FF5722;">
			      		限时打折：2017-8-15至2017-8-30
				      </td>
				    </tr>
				  </thead>
				  <tbody>
				  <?php foreach($this->_data['mcombo_list'] as $row) { ?>
				  	<tr>
				      <td style="text-align:left;" class="laimi-color-lan">
				      	<span class="layui-badge layui-bg-blue"><?php echo $row['mcombo_type'] == 1 ? '次' : '时'; ?></span>&nbsp;<?php echo $row['mcombo_name']; ?>
				       </td>
				       <td>
				      	<span class="laimi-color-hui2">¥<?php echo $row['mcombo_price']; ?></span><!-- &nbsp;<span class="laimi-color-ju">¥116.00</span> -->
				       </td>
				       <td>
				      	<a href="" class="laimi-color-lan">添加</a>
				       </td>
				    </tr>
				    <?php foreach($row['goods'] as $row2){ ?>
				    	<tr>
				    		<td style="text-align:left;" colspan="3">
				    	  	<?php echo $row2['mgoods_name']; ?>&nbsp;<?php if($row['mcombo_type'] == 1){ ?><span class="layui-badge layui-bg-gray"><?php echo $row2['mcombo_goods_count']; ?>次</span><?php } ?>&nbsp;<span class="layui-badge layui-bg-gray"><?php echo $row['days']; ?></span>
				    	  </td>
				    	</tr>
				    <?php } ?>
				  <?php } ?>
				  </tbody>
				</table>
		    </div>
		    <div class="layui-tab-item">
		    	<table class="layui-table" style="margin-top:0px;" lay-skin="line">
				  <thead>
				    <tr class="layui-bg-green">
				      <th>会员卡余套餐</th>
				      <th width="40">操作</th>
				    </tr> 
				  </thead>
				  <tbody class="laimi-mycombo">

				  </tbody>
				</table>
		    </div>
		    <div class="layui-tab-item" style="padding:10px;">
		    	<div style="width:80%;padding:10px;height:60px;background: url('../img/ticket_bg2.png') no-repeat;margin-left:20px;margin-bottom:8px;">
				    <div class="layui-col-md9" style="margin-left:20px;margin-top:5px;">
				      <ul>
						<li style="line-height:26px;font-size:18px;color:#FFFFFF;">总监理发&nbsp;×1&nbsp;<span class="layui-badge layui-bg-cyan">体验券</span></li>
						<li style="line-height:26px;font-size:12px;">2017-9-30至2017-12-31</li>
					</ul>
				    </div>
				    <div class="layui-col-md2 laimi-float-right" style="margin-top:15px;">
				    	<a href="" style="color:#FFFFFF;">使用</a>
				    </div>
		    	</div>
		    </div>
		  </div>
		</div>
    </div>
    <div class="layui-col-md8">
      	<table class="layui-table" lay-skin="line">
			<thead>
				<tr class="layui-bg-orange">
					<th width="230">名称</th>
					<th>价格</th>
					<th>数量</th>
					<th>方式</th>
					<th>人员</th>
					<th width="50">操作</th>
				</tr>
			</thead>
			<tbody>
				<form class="layui-form layui-form-pane" action="">				
				<tr>
					<td style="text-align:left;"><span class="layui-badge layui-bg-blue">通用</span>&nbsp;收银员收银员收银员收银员</td>
					<td><span class="laimi-color-hui2">¥180.00</span>&nbsp;<span class="laimi-color-ju">¥180.00</span></td>					
					<td><input class="layui-input" type="text" name="txtname" value="1" style="width:50px;padding:5px;text-align:center;"></td>					
					<td><span class="layui-badge">卡扣</span></td>
					<td style="padding:5px;width:100px;text-align:left;">
						<select name="">
							<option value=""></option>
						</select>
					</td>
					<td>
						<a href="#" class="laimi-color-lan">移除</a>
					</td>
				</tr>
				<tr>
					<td style="text-align:left;"><span class="layui-badge layui-bg-blue">单店</span>&nbsp;收银员收银员收银员收银员</td>
					<td><span class="laimi-color-hui">¥180.00</span></td>					
					<td>1</td>					
					<td><span class="layui-badge">体验券</span></td>
					<td style="padding:5px;width:100px;text-align:left;">
						<select name="">
							<option value=""></option>
						</select>
					</td>
					<td>
						<a href="#" class="laimi-color-lan">移除</a>
					</td>
				</tr>
				<tr>
					<td style="text-align:left;"><span class="layui-badge layui-bg-blue">套餐</span>&nbsp;收银员收银员收银员收银员</td>
					<td><span class="laimi-color-hui">¥180.00</span></td>					
					<td><input class="layui-input" type="text" name="txtname" value="1" style="width:50px;padding:5px;text-align:center;"></td>					
					<td></td>
					<td style="padding:5px;width:100px;text-align:left;">
						<select name="">
							<option value=""></option>
						</select>
					</td>
					<td>
						<a href="#" class="laimi-color-lan">移除</a>
					</td>
				</tr>
				<tr>
					<td style="text-align:left;" colspan="6">						
						<label class="layui-form-label">
							<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-huo"></use></svg>
							满减：满200元减50元。满送：满200元减50元</label>
					</td>
				</tr>
				</form>
			</tbody>
		</table>
    </div>
  </div>
</div>
<div style="position:fixed;bottom:0px;width:100%;padding:0px 15px 0px 15px;height:70px;border:1px solid #eeeeee;line-height:70px;background-color:#F6F6F6;">
	<div class="layui-input-inline" style="margin-left:40px;">
		共<span style="font-weight:bold;font-size:16px;" class="laimi-color-ju">0</span>件，原价：<span style="font-size:16px; font-weight:bold;" class="laimi-color-hui">¥368.00</span>，优惠：<span style="font-size:16px; font-weight:bold;" class="laimi-color-hui">¥68.00</span>，应收金额：<span style="font-size:26px;font-weight:bold;" class="laimi-color-ju">¥256.00</span>
	</div>
	<div class="layui-input-inline laimi-float-right" style="margin-right:200px;margin-top:10px;">
		<a id="laimi-add" class="layui-btn layui-btn-big" style="height:50px;line-height:50px;font-size:24px;">&nbsp;&nbsp;结帐&nbsp;&nbsp;</a>
	</div>
</div>
</form>

				</div>
			</div>
		</div>
	</div>
	<!--结帐弹出层开始-->
	<script type="text/html" id="laimi-script-add">
		<div id="laimi-modal-add" class="laimi-modal">
			<form class="layui-form" lay-filter="pay">
			  <div class="layui-form-item">
			  	<fieldset class="layui-elem-field">
				  <legend style="font-size:16px;font-weight:bold;">可用优惠券</legend>
				  <div class="layui-field-box" style="margin-bottom:45px;">
				    <label class="layui-form-label">代金券</label>
					<div class="layui-input-inline">
						<select name="shop">
							<option value="">可用代金券</option>
							<option value="代金券1">代金券1</option>
							<option value="代金券2">代金券2</option>
							<option value="代金券3">代金券3</option>
						</select>
					</div>				    
				 </div>
				</fieldset>
			  	<div class="layui-field-box" style="font-size:16px;background-color:#FFFFDD;height:55px;padding-top:25px;border:1px solid #FCEFA1;margin-top:10px;">
				    <label class="layui-form-label">应收金额</label>
				    <div class="layui-form-mid laimi-color-hui" style="font-size:22px;font-weight:bold;">¥256.00</div>			    
				    <label class="layui-form-label" style="margin-left:30px;">手动优惠</label>
				    <div class="layui-input-inline">
				      <input class="layui-input laimi-input-80 laimi-color-lan" type="text" name="txtname" placeholder="0.00" style="height:50px;margin-top:-6px;line-height:50px;font-size:22px;">
				    </div>
				    <div class="layui-input-inline">
				     	<input type="checkbox" name="" title="免单" lay-skin="primary"> 
				    </div>
				    <label class="layui-form-label" style="margin-left:30px;">实收金额</label>
				    <div class="layui-form-mid laimi-color-ju" style="font-size:22px;font-weight:bold;">¥256.00</div>
				</div>
				<fieldset class="layui-elem-field" style="margin-top:10px;">
				  <legend style="font-size:16px;font-weight:bold;">付款方式</legend>
				  <div class="layui-field-box">
				    <div class="layui-row">
					    <div class="layui-col-md4">
					    	<div class="layui-form-mid">
					    		<input type="radio" name="txtbegin" value="2" title="会员卡（余¥256.00）" checked="">				    			
					    	</div>				      
					    </div>
					    <div class="layui-col-md3">
					    	<div class="layui-form-mid">
					    		<input type="radio" name="txtbegin" value="2" title="POS刷卡">				    			
					    	</div>				      
					    </div>
					    <div class="layui-col-md5">
					    	<div class="layui-form-mid" style="margin-right:0px;">
					    		<input type="radio" name="txtbegin" value="2" title="现金">				    			
					    	</div>
					    	<div class="layui-form-mid">
					    		<input class="layui-input laimi-input-80 laimi-color-lan" type="text" name="txtname" placeholder="0.00" style="font-size:20px;height:40px;line-height:40px;">			
							</div>
					    	<div class="layui-form-mid" style="margin-top:8px;">
					    		<span class="laimi-color-lan">找零：</span><span class="layui-bg-blue" style="padding:2px 6px ;border-radius:2px;font-size:18px;">25.00</span>
					    	</div>						
						</div>				    
					    <div class="layui-col-md4">
					      <input type="radio" name="txtbegin" value="1" title="支付宝扫码">
					    </div>
					    <div class="layui-col-md3">
					      <input type="radio" name="txtbegin" value="2" title="微信扫码"> 
					    </div>
					    <div class="layui-col-md5">
					      <input type="radio" name="txtbegin" value="2" title="团购"> 
					    </div>
				    </div>
				  </div>
				</fieldset>
				<div class="layui-field-box" style="font-size:14px;border:1px solid #F0F0F0;margin-top:20px;">
				    <label class="layui-form-label">赠送优惠券</label>
					<div class="layui-input-block">
						<input type="checkbox" name="" title="10元代金券（满100元可用，2017-10-1至2017-12-31）" lay-skin="primary" checked disabled>   				
					</div>
					<div class="layui-input-block">
						<input type="checkbox" name="" title="10元代金券（满100元可用，2017-10-1至2017-12-31）" lay-skin="primary" checked disabled>   				
					</div>
				</div>							
				<div class="layui-row" style="padding-top:15px;">
					<label class="layui-form-label">导购人员</label>
					<div class="layui-input-inline">
						<select name="shop" lay-search>
							<option value="">导购人员</option>
							<option value="分类1">分类1</option>
							<option value="分类2">分类2</option>
							<option value="分类3">分类3</option>
						</select>
					</div>			    
					<div class="laimi-float-right">
						<button class="layui-btn" style="height:50px;font-size:18px;">完成结帐</button>
					</div>
				</div>					
			  </div>		  
			  <div class="laimi-height-20"> </div>
			</form>
		</div>
	</script>
	<!--弹出层结束-->
	<!--充值弹出层开始-->
	<script type="text/html" id="laimi-script-add2">
		<div id="laimi-modal-add2" class="laimi-modal">
			<form class="layui-form">
			  <div class="layui-form-item">	
			  	<fieldset class="layui-elem-field">
				  <legend style="font-size:16px;font-weight:bold;">会员信息</legend>
				  <div class="layui-field-box">
				    <div class="layui-form-item">
						<label class="layui-form-label">会员卡号</label>
						<div class="layui-form-mid laimi-color-ju">10001</div>
						<label class="layui-form-label">会员姓名</label>
						<div class="layui-form-mid laimi-color-ju">张小宇</div>
						<label class="layui-form-label">手机号码</label>
						<div class="layui-form-mid laimi-color-ju">13623833360</div>
						<label class="layui-form-label">卡类型</label>
						<div class="layui-form-mid laimi-color-ju">注册会员（9折）</div>
					  </div>
				  </div>
				</fieldset>
			  	<div class="layui-field-box" style="font-size:16px;background-color:#FFFFDD;height:55px;padding-top:25px;border:1px solid #FCEFA1;">
				    <label class="layui-form-label">实收金额</label>
				    <div class="layui-input-inline">
				      <input class="layui-input laimi-input-100 laimi-color-lan" type="text" name="txtname" placeholder="0.00" style="height:50px;margin-top:-6px;line-height:50px;font-size:24px;font-weight:bold;">
				    </div>			    
				    <label class="layui-form-label" style="margin-left:30px;">充值金额</label>
				    <div class="layui-input-inline">
				      <input class="layui-input laimi-input-100 laimi-color-lan" type="text" name="txtname" placeholder="0.00" style="height:50px;margin-top:-6px;line-height:50px;font-size:24px;font-weight:bold;">
				    </div>
				    <label class="layui-form-label" style="margin-left:30px;">赠送金额</label>
				    <div class="layui-form-mid laimi-color-ju" style="font-size:28px;font-weight:bold;">¥256.00</div>
				</div>
				<fieldset class="layui-elem-field" style="margin-top:20px;">
				  <legend style="font-size:16px;font-weight:bold;">会员等级</legend>
				  <div class="layui-field-box">
				    <div class="layui-row">
					    <div class="layui-col-md12">
					    	<label class="layui-form-label">会员卡类型</label>
							<div class="layui-input-inline">
								<select name="shop">
									<option value="">全部分组</option>
									<option value="东风路分店">收银员</option>
									<option value="王城路分店">技师</option>
									<option value="九都路分店">理发师</option>
								</select>
							</div>
							<label class="layui-form-label">折扣</label>
							<div class="layui-form-mid laimi-color-ju" style="font-size:16px;">8.8折</div>			      
					    </div>
				    </div>
				  </div>
				</fieldset>
				<fieldset class="layui-elem-field" style="margin-top:20px;">
				  <legend style="font-size:16px;font-weight:bold;">付款方式</legend>
				  <div class="layui-field-box">
				    <div class="layui-row">
					    <div class="layui-col-md2">
					    	<div class="layui-form-mid">
					    		<input type="radio" name="txtbegin" value="1" title="支付宝">			    			
					    	</div>				      
					    </div>
					    <div class="layui-col-md2">
					    	<div class="layui-form-mid">
					    		<input type="radio" name="txtbegin" value="1" title="微信">	    			
					    	</div>				      
					    </div>
					    <div class="layui-col-md5">
					    	<div class="layui-form-mid" style="margin-right:0px;">
					    		<input type="radio" name="txtbegin" value="2" title="现金">				    			
					    	</div>
					    	<div class="layui-form-mid">
					    		<input class="layui-input laimi-input-80 laimi-color-lan" type="text" name="txtname" placeholder="0.00" style="font-size:20px;height:40px;line-height:40px;">			
							</div>
					    	<div class="layui-form-mid" style="margin-top:8px;">
					    		<span class="laimi-color-lan">找零：</span><span class="layui-badge layui-bg-blue" style="font-size:16px;padding:2px 10px;">25.00</span>
					    	</div>						
						</div>				    
					    <div class="layui-col-md3">
					    	<div class="layui-form-mid">
					    		<input type="radio" name="txtbegin" value="1" title="POS刷卡">	    			
					    	</div>				      
					    </div>
				    </div>
				  </div>
				</fieldset>					
				<div class="layui-row" style="padding-top:15px;">
					<label class="layui-form-label">导购人员</label>
					<div class="layui-input-inline">
						<select name="shop" lay-search>
							<option value="">导购人员</option>
							<option value="分类1">分类1</option>
							<option value="分类2">分类2</option>
							<option value="分类3">分类3</option>
						</select>
					</div>			    
					<div class="laimi-float-right">
						<button class="layui-btn" style="height:50px;font-size:18px;">完成结帐</button>
					</div>
				</div>					
			  </div>		  
			  <div class="laimi-height-20"> </div>
			</form>
		</div>
	</script>
	<!--新增分组弹出层结束-->
	<!--模糊弹出层开始-->
	<script type="text/html" id="laimi-script-add3">
		<div id="laimi-modal-add3" class="laimi-modal">
			<form class="layui-form">
				<div>
					共有2个会员
				</div>
				<table class="layui-table">
				  <thead>
				    <tr>
				      <th>卡号</th>
				      <th>姓名</th>
				      <th>性别</th>
				      <th>手机号</th>
				      <th>卡类型</th>
				      <th>折扣</th>
				      <th>操作</th>
				    </tr>
				  </thead>
				  <tbody>
				  {{#  layui.each(d, function(index, item){ }}
				    <tr>
				      <td>{{item.card_code}}</td>
				      <td>{{item.card_name}}</td>
				      <td>{{item.sex}}</td>
				      <td>{{item.card_phone}}</td>
				      <td>{{item.type_name}}</td>
				      <td>{{item.type_discount}}</td>
				      <td><a href="javascript:;" class="laimi-color-lan laimi-card-search" key="{{index}}">选择</a></td>
				    </tr>
				  {{# }) }}
				  </tbody>
				</table>
			</form>
		</div>
	</script>
	<!--弹出层结束-->
	<!--会员资料开始-->
	<script type="text/html" id="laimi-script-add4">
		<div id="laimi-modal-add4" class="laimi-modal">
			<form class="layui-form" lay-filter="card-info">
				<div class="layui-row">
					 <div class="layui-col-md3">
				      	<img src="<?php echo "read_image.php?c=".$GLOBALS['_SESSION']['login_cid']."&type=card&image=";?>{{d.card_photo_file}}" style="width:180px;height:180px;">
				    </div>
				    <div class="layui-col-md9">
					    <div class="layui-col-md6">
					      <div class="layui-form-item" style="margin-bottom:0;">
							    <label class="layui-form-label">会员卡号</label>
							    <div class="layui-form-mid layui-word-aux">{{d.card_code}}</div>
							  </div>
					    </div>	    
					    <div class="layui-col-md6">
					      <div class="layui-form-item" style="margin-bottom: 0px;">
							    <label class="layui-form-label">会员姓名</label>
							    <div class="layui-form-mid layui-word-aux"><span class="laimi-color-lan">{{d.card_name}}</span></div>
							  </div>
					    </div>			    
					    <div class="layui-col-md6">
						    <div class="layui-form-item" style="margin-bottom:0;">
							    <label class="layui-form-label">卡类型</label>
							    <div class="layui-form-mid layui-word-aux">{{d.type_name}}({{d.type_discount}}折)</div>
							  </div>
					    </div>
					    <div class="layui-col-md6">
					      <div class="layui-form-item" style="margin-bottom:0;">
							    <label class="layui-form-label">会员余额</label>
							    <div class="layui-form-mid layui-word-aux"><span class="laimi-color-ju">￥{{d.s_card_ymoney}}</span></div>
							  </div>
					    </div>
					    <div class="layui-col-md6">
					      <div class="layui-form-item" style="margin-bottom:0;">
							    <label class="layui-form-label">剩余积分</label>
							    <div class="layui-form-mid layui-word-aux">{{d.s_card_yscore}}分</div>
							  </div>
					    </div>
					    <div class="layui-col-md6">
					      <div class="layui-form-item" style="margin-bottom:0;">
							    <label class="layui-form-label">手机号码</label>
							    <div class="layui-form-mid layui-word-aux"><span class="laimi-color-ju">{{d.card_phone}}</span></div>
							  </div>
					    </div>
					    <div class="layui-col-md6">
					      <div class="layui-form-item" style="margin-bottom:0;">
							    <label class="layui-form-label">累计消费</label>
							    <div class="layui-form-mid layui-word-aux">￥{{d.s_card_smoney}}</div>
							  </div>
					    </div>
					    <div class="layui-col-md6">
					      <div class="layui-form-item" style="margin-bottom:0;">
							    <label class="layui-form-label">会员性别</label>
							    <div class="layui-form-mid layui-word-aux">{{d.sex}}</div>
							  </div>
					    </div>
					    <div class="layui-col-md6">
					      <div class="layui-form-item" style="margin-bottom:0;">
							    <label class="layui-form-label">出生日期</label>
							    <div class="layui-form-mid layui-word-aux">{{d.birthday}}</div>
							  </div>
					    </div>
					    <div class="layui-col-md6">
					      <div class="layui-form-item" style="margin-bottom:0;">
							    <label class="layui-form-label">身份证号</label>
							    <div class="layui-form-mid layui-word-aux">{{d.card_identity}}</div>
							  </div>
					    </div>
					    <div class="layui-col-md6">
					      <div class="layui-form-item" style="margin-bottom:0;">
							    <label class="layui-form-label">联系人</label>
							    <div class="layui-form-mid layui-word-aux">{{d.card_link}}</div>
							  </div>
					    </div>
					    <div class="layui-col-md6">
					      <div class="layui-form-item" style="margin-bottom:0;">
							    <label class="layui-form-label">开通时间</label>
							    <div class="layui-form-mid layui-word-aux">{{d.card_atime}}</div>
							  </div>
					    </div>
					    <div class="layui-col-md6">
					      <div class="layui-form-item" style="margin-bottom:0;">
							    <label class="layui-form-label">到期时间</label>
							    <div class="layui-form-mid layui-word-aux">{{d.edate}}</div>
							  </div>
					    </div>
					    <div class="layui-col-md6">
					      <div class="layui-form-item" style="margin-bottom:0;">
							    <label class="layui-form-label">推荐人</label>
							    <div class="layui-form-mid layui-word-aux">{{d.worker_name}}</div>
							  </div>
					    </div>
					    <div class="layui-col-md12">
					      <div class="layui-form-item" style="margin-bottom:0;">
							    <label class="layui-form-label">办卡备注</label>
							    <div class="layui-form-mid layui-word-aux laimi-input-b80" style="line-height: 26px;">{{d.card_memo}}</div>
							  </div>
						  </div>
				    </div>
				</div>
				<hr />
				<div class="layui-row" style="margin-top:20px;">
					<label class="layui-form-label">会员卡密码</label>
					<div class="layui-input-inline last">
						<input class="layui-input laimi-input-200" type="password" name="password" placeholder="请输入卡密码" autocomplete="new-password">
						<input class="layui-input laimi-input-200" type="hidden" name="id" value="{{d.card_id}}">
					</div>
					<div class="laimi-float-right">
						<button class="layui-btn" style="height:40px;font-size:16px;" lay-filter="laimi-card-confirm" lay-submit>确定</button>
					</div>
				</div>
			</form>
		</div>
	</script>
	<!--弹出层结束-->
<?php echo $this->fun_fetch('inc_foot', ''); ?>
	<script>
	layui.use(["element", "laydate", "upload", "layer", "form", "laytpl"], function() {
		var $ = layui.jquery;
		var objlayer = layui.layer;
		var objelement = layui.element;
		var objform = layui.form;
		var objlaytpl = layui.laytpl;
		$("#laimi-add").on("click", function() {
			objlayer.open({
				type: 1,
				title: ["结帐", "font-size:16px;"],
				btnAlign: "r",
				area: ["800px", "auto"],
				shadeClose: true,//点击遮罩关闭
				content: $("#laimi-script-add").html(),
				success: function(){
					objform.render(null, 'pay');
				}
			});
		});
		$(".laimi-add2").on("click", function() {
			objlayer.open({
				type: 1,
				title: ["充值", "font-size:16px;"],
				btnAlign: "r",
				area: ["800px", "auto"],
				shadeClose: true,//点击遮罩关闭
				content: $("#laimi-script-add2").html()
			});
		});
		// 选中会员卡
		objform.on("submit(laimi-card-confirm)", function(data) {
			cardChecked(data.field);
			return false;
		});
		var card_id = 0;
		var card_key = null;
	  var cardlist = [];
	  var card_act_discount = [];
	  var card_act_decrease = [];
	  var card_act_give = [];
	  var card_act_decrease_use = [];
	  var card_act_give_use = [];
	  var goods = {};
	  var money_act = 0;

	  function cardActDiscount(){
	    card_act_discount.length = 0;
	    // var dtd = $.Deferred();// 新建一个Deferred对象
	    $.getJSON('card_act_discount_ajax.php', {id: card_id}, function(res){
	    	card_act_discount = res;
	    	console.log(card_act_discount);
	      // dtd.resolve();
	    });
	    // return dtd.promise();
	  };
	  function cardActDecrease(){
	    card_act_decrease.length = 0;
	    $.getJSON('card_act_decrease_ajax.php', {id: card_id}, function(res){
	    	card_act_decrease = res;
	    	// console.log(card_act_decrease);
	    });
	  };
	  function cardActGive(){
	    card_act_give.length = 0;
	    $.getJSON('card_act_give_ajax.php', {id: card_id}, function(res){
	    	card_act_give = res;
	    });
	  };
	  function cardSearch(search){
	  	var search = search || $('.card-search').val();
	    var _this = $(this);
	    cardlist.length = 0;
	    _this.attr('disabled', true);
	    $.getJSON('card_search_ajax.php', {search: search}, function(res) {
	    	_this.attr('disabled', true);
	    	cardlist = res;
	    	if(res.length == 0){
	    	  cardClear();
	    	  objlayer.alert('没有此会员信息', {
		  			title: '提示信息'
		  		});
	    	}else if(res.length == 1){
	    		card_key = 0;
	    	  cardInfo(res[0]);
	    	}else{
	    		cardSelect(res);
	    	}
	    });
	  };
	  function cardSelect(list){
  		objlaytpl($("#laimi-script-add3").html()).render(list, function(html){
  		  objlayer.open({
  		  	type: 1,
  				title: ["精确搜索", "font-size:16px;"],
  				btnAlign: "r",
  				area: ["800px", "auto"],
  				shadeClose: true,//点击遮罩关闭
  				content: html,
  		  	success: function(layero, index){
  		  		$('.laimi-card-search').on('click',function(){
  		  			  var key = $(this).attr('key');
  		  			  if(cardlist[key]){
  		  			  	objlayer.close(index);
  		  			  	card_key = key;
  		  			  	cardInfo(cardlist[key]);
  		  			  }
  		  		});
  		  	},
  		  	end: function(){
  		  		$('.laimi-card-search').off('click');
  	    	}
  		  });
  		});
	  };
	  function cardInfo(info){
	  	objlaytpl($("#laimi-script-add4").html()).render(info, function(html){
	  	  objlayer.open({
	  	  	type: 1,
	  			title: ["会员资料", "font-size:16px;"],
	  			btnAlign: "r",
	  			area: ["800px", "auto"],
	  			shadeClose: true,//点击遮罩关闭
	  			content: html
	  	  });
	  	});
	  }
	  function cardChecked(data){
      $.get('card_password_ajax.php', data, function(state){
        if(state == '0'){
        	if(cardlist[card_key]){
        		objlayer.close(objlayer.index);
        		card_id = cardlist[card_key].card_id;
        		cardShow(cardlist[card_key]);
        		cardMcombo();
	         /* 
	          _this.cardMcombo(res.card_id);
	          _this.cardTicket(res.card_id);
	          //重新计算所有商品价格
	          cardActDiscount()
	            .then(function(){
	              // console.log('sucss');
	              var dtd = $.Deferred();
	              var count = $("#uworkbench .uright .cnum[mgoods_id]").length;
	              if(count > 0){
	                $("#uworkbench .uright .cnum[mgoods_id]").each(function(k,v){
	                  var elm = $(this);
	                  var index = k;
	                  _this.goodsPrice(elm.attr('mgoods_id'),1)
	                    .then(function(){
	                      elm.attr('min_price',_this.goods.min_price);
	                      elm.attr('act_discount_id',_this.goods.act_discount_id);
	                      elm.parent().prev().find('span').text(_this.goods.min_price);
	                      if(count - index <= 1){
	                        dtd.resolve();
	                      }
	                    })
	                })
	              }else{
	                dtd.resolve();
	              }
	              return dtd.promise();
	            })
	            .then(function(){
	              var dtd = $.Deferred();
	              var count = $("#uworkbench .uright .cnum[sgoods_id]").length;
	              if(count > 0){
	                $("#uworkbench .uright .cnum[sgoods_id]").each(function(k,v){
	                  // console.log($(this));
	                  var elm = $(this);
	                  var index = k;
	                  _this.goodsPrice(elm.attr('sgoods_id'),2)
	                    .then(function(){
	                      elm.attr('min_price', _this.goods.min_price);
	                      elm.attr('act_discount_id', _this.goods.act_discount_id);
	                      elm.parent().prev().find('span').text(_this.goods.min_price);
	                      if(count - index <= 1){
	                        dtd.resolve();
	                      }
	                    })
	                })
	              }else{
	                dtd.resolve();
	              }
	              return dtd.promise();
	            })
	            .then(function(){
	              _this.allGoodsPrice();
	            })
	          cardActDecrease();
	          cardActGive();*/
          }
        }else if(state == 1){
          // 密码错误
          objlayer.alert('密码错误', {
		  			title: '提示信息'
		  		});
          return false;
        }else{
        	objlayer.alert('没有此用户', {
		  			title: '提示信息'
		  		});
          return false;
        }
      });
	  };
	  function cardShow(card){
	  	if(card){
	  		$('#laimi-main .laimi-cardinfo').removeClass('layui-hide');
	  		$('#laimi-main .laimi-card-code').text(card.card_code);
	  		$('#laimi-main .laimi-card-name').text(card.card_name);
	  		$('#laimi-main .laimi-card-name').text(card.card_name);
	  		$('#laimi-main .laimi-card-sex').text(card.sex);
	  		$('#laimi-main .laimi-card-phone').text(card.card_phone);
	  		$('#laimi-main .laimi-card-typename').text(card.type_name);
	  		$('#laimi-main .laimi-card-ymoney').text(card.c_card_ymoney);
	  		$('#laimi-main .laimi-card-yscore').text(card.c_card_yscore);
	  	}else{
	  		$('#laimi-main .laimi-cardinfo').addClass('layui-hide');
	  		$('#laimi-main .laimi-card-code').text('--');
	  		$('#laimi-main .laimi-card-name').text('--');
	  		$('#laimi-main .laimi-card-sex').text('--');
	  		$('#laimi-main .laimi-card-phone').text('--');
	  		$('#laimi-main .laimi-card-typename').text('--');
	  		$('#laimi-main .laimi-card-ymoney').text('--');
	  		$('#laimi-main .laimi-card-yscore').text('--');
	  	}
	  }
	  function cardMcombo(){
	    var _this = $(this);
	    $('#laimi-main .laimi-mycombo').empty();
	    $.getJSON('card_mymcombo_ajax.php', {id: card_id}, function(res){
	    	// console.log(res);
	    	if(res){
	    		var type = '';
	    	  var tr = '';
	    	  $.each(res,function(k,v){
	    	    //没有做套餐用完时怎么显示
	    	    if(v.card_mcombo_type == 1){
	    	    	if(v.c_mcombo_type == 1){
	    	    		type = '计次';
	    	    	}else if(v.c_mcombo_type == 2){
	    	    		type = '计时';
	    	    	}
	    	      tr += ['<tr>',
          							'<td colspan="2" style="text-align:left;" class="laimi-color-lan" mcombo_id="'+v.mcombo_id+'">',
          								'<span class="layui-badge layui-bg-blue">'+type+'</span>&nbsp;'+v.c_mcombo_name,
          							'</td>',
          						'</tr>'].join('');
	    	    }else if(v.card_mcombo_type == 2){
	    	      if(v.c_mcombo_type == 1)
	    	      	tr += ['<tr mcombo_type="'+v.c_mcombo_type+'" mcombo_id="'+v.mcombo_id+'"><div class="uc2a" card_mcombo_id ="'+v.card_mcombo_id+'" mgoods_id="'+v.mgoods_id+'" mgoods_count="'+v.card_mcombo_gcount+'">',
					    						'<td style="text-align:left;">',
					      							v.c_mgoods_name+'&nbsp;<span class="layui-badge">余'+v.card_mcombo_gcount+'次</span>',
					       					'</td>',
						       				'<td>',
					      						'<a href="" class="laimi-color-lan">使用</a>',
					       					'</td>',
				    						'</tr>'].join('');
	    	      else if(v.c_mcombo_type == 2){
	    	      	tr += ['<tr mcombo_type="'+v.c_mcombo_type+'" mcombo_id="'+v.mcombo_id+'"><div class="uc2a" card_mcombo_id ="'+v.card_mcombo_id+'" mgoods_id="'+v.mgoods_id+'" mgoods_count="'+v.card_mcombo_gcount+'">',
					    						'<td style="text-align:left;">',
					      							v.c_mgoods_name+'&nbsp;<span class="layui-badge">余60天</span>',
					       					'</td>',
						       				'<td>',
					      						'<a href="" class="laimi-color-lan">使用</a>',
					       					'</td>',
				    						'</tr>'].join('');
	    	      }
	    	    }
	    	  });
	    	  $('#laimi-main .laimi-mycombo').append(tr);
	    	  // $('#uworkbench .uleft #tab2 .cadd2').on('click', _this.mcomboAdd);
	    	}
	    })
	  };
	  // function cardTicket(){
	  //   var _this = this;
	  //   $('#uworkbench .ub .uleft #tab3 .uc li').remove();
	  //   $.when($.getJSON('card_myticket_ajax.php', {card_id: card_id}))
	  //     .done(function(res){
	  //       if(res){
	  //         var addli = '';
	  //         $.each(res, function(k, v){
	  //           if(v.ticket_type=='1'){
	  //             addli += '<li class="uc2" ticket_money_id="'+v.ticket_money_id+'" ticket_type="'+v.ticket_type+'" ticket_id="'+v.card_ticket_id+'" ticket_value="'+v.c_ticket_value+'" ticket_limit="'+v.c_ticket_limit+'"><div class="uc2a">代金券：'+v.c_ticket_name+'('+v.c_ticket_value+')</div><div class="uc2b"><a href="#" class="cadd3">添加</a></div></li>';
	  //           }else{
	  //             addli += '<li class="uc2" ticket_goods_id="'+v.ticket_goods_id+'" mgoods_id="'+v.c_mgoods_id+'" ticket_type="'+v.ticket_type+'" ticket_id="'+v.card_ticket_id+'"><div class="uc2a">体验券：'+v.c_ticket_name+'('+v.c_ticket_value+')</div><div class="uc2b"><a href="#" class="cadd3">添加</a></div></li>';
	  //           }
	  //         });
	  //         $('#uworkbench .uleft #tab3 .uc').append(addli);
	  //         $('#uworkbench .uleft #tab3 .cadd3').on('click', function(event){
	  //           _this.ticketAdd(event)
	  //         });
	  //       }
	  //     })
	  // };
	  function cardClear(){
	    // var _this = this;
	    card_id = 0;
	    card_key = null;
	    cardlist.length = 0;
	    cardShow();
	    $('#laimi-main .laimi-mycombo').empty();
	    //重新计算所有商品价格
	    // _this.cardActDiscount()
	    //   .then(function(){
	    //     // console.log('sucss');
	    //     var dtd = $.Deferred();
	    //     var count = $("#uworkbench .uright .cnum[mgoods_id]").length;
	    //     if(count > 0){
	    //       $("#uworkbench .uright .cnum[mgoods_id]").each(function(k,v){
	    //         var elm = $(this);
	    //         var index = k;
	    //         _this.goodsPrice(elm.attr('mgoods_id'),1)
	    //           .then(function(){
	    //             elm.attr('min_price',_this.goods.min_price);
	    //             elm.attr('act_discount_id',_this.goods.act_discount_id);
	    //             elm.parent().prev().find('span').text(_this.goods.min_price);
	    //             if(count - index <= 1){
	    //               dtd.resolve();
	    //             }
	    //           })
	    //       })
	    //     }else{
	    //       dtd.resolve();
	    //     }
	    //     return dtd.promise();
	    //   })
	    //   .then(function(){
	    //     var dtd = $.Deferred();
	    //     var count = $("#uworkbench .uright .cnum[sgoods_id]").length;
	    //     if(count > 0){
	    //       $("#uworkbench .uright .cnum[sgoods_id]").each(function(k,v){
	    //         // console.log($(this));
	    //         var elm = $(this);
	    //         var index = k;
	    //         _this.goodsPrice(elm.attr('sgoods_id'),2)
	    //           .then(function(){
	    //             elm.attr('min_price', _this.goods.min_price);
	    //             elm.attr('act_discount_id', _this.goods.act_discount_id);
	    //             elm.parent().prev().find('span').text(_this.goods.min_price);
	    //             if(count - index <= 1){
	    //               dtd.resolve();
	    //             }
	    //           })
	    //       })
	    //     }else{
	    //       dtd.resolve();
	    //     }
	    //     return dtd.promise();
	    //   })
	    //   .then(function(){
	    //     _this.allGoodsPrice();
	    //   })
	    // _this.cardActDecrease();
	    // _this.cardActGive();
	  };
	  function goodsSearch(){
	    var search = $("#laimi-main select[name='goodscatalog']").val() || 0;
	    var goods = $("#laimi-main .laimi-search").val() || '';
	    goods = $.trim(goods);
	    $('#laimi-main .laimi-goods').addClass('layui-hide');
	    if(search == 0){
	    	if(goods == ''){
	    		$('#laimi-main .laimi-goods').removeClass('layui-hide');
	    	}else{
	    		$.each($('#laimi-main .laimi-goods'), function(){
	    			if($(this).attr('gname') == goods || $(this).attr('gcode') == goods || $(this).attr('gshort') == goods){
	    				$(this).removeClass('layui-hide');
	    				$("#laimi-main .laimi-goods[catalog='"+$(this).attr('catalog')+"'][gtype='m'][cate]").removeClass('layui-hide');
	    			}
	    		})
	    	}
	    }else{
	    	var arr = search.split("-");
	    	var type = arr[0];
	    	var id = arr[1];
	    	if(goods == ''){
	    		if(type == 'm')
	    			$("#laimi-main .laimi-goods[catalog='"+id+"'][gtype='m']").removeClass('layui-hide');
	    		if(type == 's')
	    			$("#laimi-main .laimi-goods[catalog='"+id+"'][gtype='s']").removeClass('layui-hide');
	    	}else{
	    		if(type == 'm'){
	    			$.each($("#laimi-main .laimi-goods[catalog='"+id+"'][gtype='m']"), function(){
	    				if($(this).attr('gname') == goods || $(this).attr('gcode') == goods || $(this).attr('gshort') == goods){
	    					$(this).removeClass('layui-hide');
	    				$("#laimi-main .laimi-goods[catalog='"+$(this).attr('catalog')+"'][gtype='m'][cate]").removeClass('layui-hide');
	    				}
	    			})
	    		}
	    		if(type == 's'){
	    			$.each($("#laimi-main .laimi-goods[catalog='"+id+"'][gtype='s']"), function(){
	    				if($(this).attr('gname') == goods || $(this).attr('gcode') == goods || $(this).attr('gshort') == goods){
	    					$(this).removeClass('layui-hide');
	    				}
	    				$("#laimi-main .laimi-goods[catalog='"+$(this).attr('catalog')+"'][gtype='s'][cate]").removeClass('layui-hide');
	    			})
	    		}
	    	}
	    }
	  };
	  (function init(){
	    // $('.ccardhas').hide();
	    cardActDiscount();//初始化活动
	    cardActDecrease();//初始化活动
	    // 会员卡搜索
	    $('.laimi-add3').on('click', function(){
	      cardSearch();
	    });
	    //搜索分类JS
	    $('.laimi-button-search').on('click',function(){
	    	goodsSearch();
	    });
	    /*
	    // 添加商品
	    $('#uworkbench .uleft #tab1 .cadd').on('click', function(event){
	      _this.goodsAdd(event);
	    });
	    // 扫码添加
	    $('#uworkbench .uleft #tab4 .cgoodscodeadd').on('click', function(event){
	      _this.goodsAdd2(event);
	    });
	    $('#uworkbench .uleft #tab4 .cgoodscode').on('keyup', function(event){
	      event.stopPropagation();
	      if(event.keyCode==13){
	       _this.goodsAdd2(event);
	      }
	    });
	    //删除商品,套餐商品,券
	    $(document).on("click",".cdel", function(event){
	      _this.goodsDelete(event);
	    });
	    //+ -
	    $(document).on("click", ".cbtndec", function(event) {
	      _this.goodsNumDec(event);
	    });
	    $(document).on("click", ".cbtnplus", function(event) {
	      _this.goodsNumPlus(event);
	    });
	    $('.cpayopen').on('click', function(){
	      _this.bill();
	      $('#uworkbenchm2').modal('open');
	    })
	    //付款方式
	    $('#uworkbenchm2 .upay').on('click',function(){
	      $(this).addClass('upay-active').siblings().removeClass('upay-active');
	    });
	    //赠送金额
	    $('#uworkbenchm2 .cjmoney').on('input propertychange',function(){
	      if(isNaN($(this).val())){
	        $(this).val('');
	      }
	      var jmoney = $(this).val()?$(this).val():0;
	      var ymoney = $('#uworkbenchm2 .cymoney2').val();
	      if(Number(jmoney) >= Number(ymoney)){
	        $(this).val(ymoney);
	        jmoney = ymoney;
	      }
	      var smoney = Number(ymoney) - Number(jmoney);
	        smoney = smoney.toFixed(2);
	      // console.log(smoney);
	      if($('#uworkbenchm2 .cfree').prop('checked')){
	        $('#uworkbenchm2 .csmoney').text('0.00');
	      }else{
	        $('#uworkbenchm2 .csmoney').text(smoney);
	      }
	    })
	    //免单
	    $('#uworkbenchm2 .cfree').on('click',function(){
	      if($(this).prop('checked')){
	        $('#uworkbenchm2 .csmoney').text('0.00');
	        $('#uworkbenchm2 .cact_dec_use').hide();
	        $('#uworkbenchm2 .cact_give_use').hide();
	      }else{
	        var jmoney = $('#uworkbenchm2 .cjmoney').val();
	        var ymoney = $('#uworkbenchm2 .cymoney2').val();
	        var smoney = Number(ymoney) - Number(jmoney);
	        $('#uworkbenchm2 .csmoney').text(smoney);
	        $('#uworkbenchm2 .cact_dec_use').show();
	        $('#uworkbenchm2 .cact_give_use').show();
	      }
	    })
	    $('#uworkbenchm2 .cpayconfirm').on('click', function(event){
	      _this.payConfirm(event);
	    })*/
	  })();
	});
	</script>
</body>
</html>