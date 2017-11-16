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
      	<div class="layui-form-mid" style="margin-left:20px;"><input class="layui-input" type="text" name="txtname" placeholder="卡号/姓名/手机号"></div>
		<div class="layui-form-mid"><a id="laimi-add4" class="layui-btn">精确搜索</a></div>
		<div class="layui-form-mid"><a id="laimi-add3" class="layui-btn layui-btn-normal">模糊搜索</a></div>
		<div class="layui-form-mid laimi-float-right"><a href="card_add.php" target="_blank" class="layui-btn layui-btn-danger">开卡</a></div>
	  </td>
    </tr>
    <tr>
      <td style="padding:0px;height:50px;line-height:50px;">
      	<div class="layui-form-mid laimi-color-hui" style="margin-left:25px;">卡号</div>
		<div class="layui-form-mid laimi-color-lan">10001</div>
		<div class="layui-form-mid laimi-color-hui" style="margin-left:25px;">姓名</div>
		<div class="layui-form-mid laimi-color-ju">张晓宇</div>
		<div class="layui-form-mid laimi-color-hui" style="margin-left:25px;">性别</div>
		<div class="layui-form-mid laimi-color-lan">男</div>
		<div class="layui-form-mid laimi-color-hui" style="margin-left:25px;">手机</div>
		<div class="layui-form-mid laimi-color-lan">13623833360</div>
		<div class="layui-form-mid laimi-color-hui" style="margin-left:25px;">卡类型</div>
		<div class="layui-form-mid laimi-color-lan">白金卡(8.8折)</div>
		<div class="layui-form-mid laimi-color-hui" style="margin-left:25px;">余额</div>
		<div class="layui-form-mid laimi-color-ju" style="font-weight:bold;">¥168.00</div>
		<div class="layui-form-mid laimi-color-hui" style="margin-left:25px;">积分</div>
		<div class="layui-form-mid laimi-color-lan">1680</div>
      </td>
      <td width="140" style="padding:0px;">
		<div class="layui-form-mid laimi-float-right"><a id="laimi-add2" class="layui-btn layui-btn-normal">充值</a></div>
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
							<select name="shop">
								<option value="">商品分类</option>
								<option value="分类1">分类1</option>
								<option value="分类2">分类2</option>
								<option value="分类3">分类3</option>
							</select>
						</div>
						<div class="layui-input-inline last">
							<input class="layui-input" type="text" name="txtname" placeholder="搜索关键词" style="width:120px;">
						</div>
						<div class="layui-input-inline">
							<button class="layui-btn layui-btn-normal">F2搜索</button>
					  </td>
				   </tr>								    
				    <tr>
				      <td colspan="3" style="text-align:left;" class="laimi-color-lan"><span class="layui-badge layui-bg-blue">通用</span>&nbsp;主营业务</td>
				    </tr>
				    <tr>
				      <td style="text-align:left;">
			      		许闲心许闲心 <span class="laimi-color-hui">(34)</span>
				      </td>
				      <td>
			      		<span class="laimi-color-hui2">¥18.00</span>&nbsp;<span class="laimi-color-ju">¥16.00</span>								      		
				      </td>
				      <td>
			      		<a href="" class="laimi-color-lan">添加</a>
				      </td>
				    </tr>
				    <tr>
				      <td style="text-align:left;">
			      		许闲心许闲心
				      </td>
				      <td>
			      		<span class="laimi-color-hui2">¥18.00</span>&nbsp;<span class="laimi-color-ju">¥16.00</span>								      		
				      </td>
				      <td>
			      		<a href="" class="laimi-color-lan">添加</a>
				      </td>
				    </tr>
				    <tr>
				      <td colspan="3" style="text-align:left;" class="laimi-color-lan"><span class="layui-badge layui-bg-blue">单店</span>&nbsp;主营业务</td>
				    </tr>
				    <tr>
				      <td style="text-align:left;">
			      		许闲心许闲心
				      </td>
				      <td>
			      		<span class="laimi-color-hui">¥18.00</span>							      		
				      </td>
				      <td>
			      		<a href="" class="laimi-color-lan">添加</a>
				      </td>
				    </tr>
				    <tr>
				      <td style="text-align:left;">
			      		许闲心许闲心
				      </td>
				      <td>
			      		<span class="laimi-color-hui">¥18.00</span>
				      </td>
				      <td>
			      		<a href="" class="laimi-color-lan">添加</a>
				      </td>
				    </tr>
				    <tr>
				      <td style="text-align:left;">
			      		许闲心许闲心
				      </td>
				      <td>
			      		<span class="laimi-color-hui">¥18.00</span>
				      </td>
				      <td>
			      		<a href="" class="laimi-color-lan">添加</a>
				      </td>
				    </tr>
				    <tr>
				      <td style="text-align:left;">
			      		许闲心许闲心
				      </td>
				      <td>
			      		<span class="laimi-color-hui">¥18.00</span>
				      </td>
				      <td>
			      		<a href="" class="laimi-color-lan">添加</a>
				      </td>
				    </tr>
				    <tr>
				      <td style="text-align:left;">
			      		许闲心许闲心
				      </td>
				      <td>
			      		<span class="laimi-color-hui">¥18.00</span>
				      </td>
				      <td>
			      		<a href="" class="laimi-color-lan">添加</a>
				      </td>
				    </tr>				    									    
				  </tbody>
				</table>
		    </div>
		    <div class="layui-tab-item">
		    	<table class="layui-table" style="margin-top:0px;" lay-skin="line">
				  <thead>
				    <tr class="layui-bg-green">
				      <th width="200">可选套餐</th>
				      <th >价格</th>
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
				      <td style="text-align:left;" class="laimi-color-lan">
				      	<span class="layui-badge layui-bg-blue">次</span>&nbsp;套餐名称套餐名称 002
				       </td>
				       <td>
				      	<span class="laimi-color-hui2">¥180.00</span>&nbsp;<span class="laimi-color-ju">¥116.00</span>
				       </td>
				       <td>
				      	<a href="" class="laimi-color-lan">添加</a>
				       </td>
				    </tr>
				    <tr>
				    	<td style="text-align:left;" colspan="3">
				      	总监精品理发&nbsp;<span class="layui-badge layui-bg-gray">5次</span>&nbsp;<span class="layui-badge layui-bg-gray">90天</span>
				      </td>		      
				    </tr>
				    <tr>
				    	<td style="text-align:left;" colspan="3">
				      	总监精品理发&nbsp;<span class="layui-badge layui-bg-gray">5次</span>&nbsp;<span class="layui-badge layui-bg-gray">90天</span>
				      </td>		      
				    </tr>										    
				    <tr>
				      <td style="text-align:left;" class="laimi-color-lan">
				      	<span class="layui-badge layui-bg-blue">时</span>&nbsp;理发年卡套餐
				       </td>
				       <td>
				      	<span class="laimi-color-hui">¥180.00</span>
				       </td>
				       <td>
				      	<a href="" class="laimi-color-lan">添加</a>
				       </td>
				    </tr>
				    <tr>
				    	<td style="text-align:left;" colspan="3">
				      	总监精品理发&nbsp;<span class="layui-badge layui-bg-gray">365天</span>
				      </td>		      
				    </tr>
				    <tr>
				    	<td style="text-align:left;" colspan="3">
				      	总监精品理发&nbsp;<span class="layui-badge layui-bg-gray">365天</span>
				      </td>		      
				    </tr>									    						    
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
				  <tbody>
				  	<tr>
				      <td colspan="2" style="text-align:left;" class="laimi-color-lan">
				      	<span class="layui-badge layui-bg-blue">计次</span>&nbsp;套餐名称套餐名称 002
				       </td>
				    </tr>
				    <tr>
				    	<td style="text-align:left;">
				      	总监精品理发&nbsp;<span class="layui-badge">余2次</span>
				       </td>
					       <td>
				      	<a href="" class="laimi-color-lan">使用</a>
				       </td>									      
				    </tr>
				    <tr>
				    	<td style="text-align:left;">
				      	总监精品理发&nbsp;<span class="layui-badge">余2次</span>
				       </td>
				       <td>
				       	<a href="" class="laimi-color-lan">使用</a>							      	
				       </td>									      
				    </tr>
				    <tr>
				      <td colspan="2" style="text-align:left;" class="laimi-color-lan">
				      	<span class="layui-badge layui-bg-blue">计时</span>&nbsp;套餐名称套餐名称 002
				       </td>
				    </tr>
				    <tr>
				    	<td style="text-align:left;">
				      	总监精品理发&nbsp;<span class="layui-badge">98天</span>
				       </td>
				       <td>
				      	<a href="" class="laimi-color-lan">使用</a>
				       </td>									      
				    </tr>
				    <tr>
				    	<td style="text-align:left;">
				      	总监精品理发&nbsp;<span class="layui-badge">98天</span>
				       </td>
				       <td><a href="" class="laimi-color-lan">使用</a>							      	
				       </td>									      
				    </tr>								    
				  </tbody>
				</table>
		    </div>
		    <div class="layui-tab-item" style="padding:10px;">
		    	<div style="width:80%;padding:10px;height:60px;background-image: url(/img/ticket_bg2.png);margin-left:20px;margin-bottom:8px;">
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
	<!--精确搜索弹出层开始-->
	<script type="text/html" id="laimi-script-add3">
		<div id="laimi-modal-add3" class="laimi-modal">
			<form class="layui-form">
				<div>
					搜索<span class="laimi-color-ju">13623833360</span>共有2个会员
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
				    <tr>
				      <td>10001</td>
				      <td>张小宇</td>
				      <td>男</td>
				      <td>13623833360</td>
				      <td>白金卡</td>
				      <td>8.8折</td>
				      <td><a href="#" class="laimi-color-lan">选择</a></td>
				    </tr>
				     <tr>
				      <td>10001</td>
				      <td>张小宇</td>
				      <td>男</td>
				      <td>13623833360</td>
				      <td>白金卡</td>
				      <td>8.8折</td>
				      <td><a href="#" class="laimi-color-lan">选择</a></td>
				    </tr>
				  </tbody>
				</table>
			</form>
		</div>
	</script>
	<!--弹出层结束-->
	<!--结账弹出层开始-->
	<script type="text/html" id="laimi-script-add4">
		<div id="laimi-modal-add4" class="laimi-modal">
			<form class="layui-form" lay-filter="">
				<div class="layui-row">
					 <div class="layui-col-md3">
				      	<img src="/img/no.jpg" style="width:180px;height:180px;">
				    </div>
				    <div class="layui-col-md9">    
					    <div class="layui-col-md6">
					      <div class="layui-form-item" style="margin-bottom:0;">
							    <label class="layui-form-label">会员卡号</label>
							    <div class="layui-form-mid layui-word-aux">1022511</div>
							  </div>
					    </div>	    
					    <div class="layui-col-md6">
					      <div class="layui-form-item" style="margin-bottom: 0px;">
							    <label class="layui-form-label">会员姓名</label>
							    <div class="layui-form-mid layui-word-aux"><span class="laimi-color-lan">刘德华</span></div>
							  </div>
					    </div>			    
					    <div class="layui-col-md6">
						    <div class="layui-form-item" style="margin-bottom:0;">
							    <label class="layui-form-label">卡类型</label>
							    <div class="layui-form-mid layui-word-aux">钻石卡(8.8折)</div>
							  </div>
					    </div>
					    <div class="layui-col-md6">
					      <div class="layui-form-item" style="margin-bottom:0;">
							    <label class="layui-form-label">会员余额</label>
							    <div class="layui-form-mid layui-word-aux"><span class="laimi-color-ju">￥1286.00</span></div>
							  </div>
					    </div>
					    <div class="layui-col-md6">
					      <div class="layui-form-item" style="margin-bottom:0;">
							    <label class="layui-form-label">剩余积分</label>
							    <div class="layui-form-mid layui-word-aux">1286分</div>
							  </div>
					    </div>				    
					    <div class="layui-col-md6">
					      <div class="layui-form-item" style="margin-bottom:0;">
							    <label class="layui-form-label">手机号码</label>
							    <div class="layui-form-mid layui-word-aux"><span class="laimi-color-ju">13623833360</span></div>
							  </div>
					    </div>
					    <div class="layui-col-md6">
					      <div class="layui-form-item" style="margin-bottom:0;">
							    <label class="layui-form-label">累计消费</label>
							    <div class="layui-form-mid layui-word-aux">￥8800.00</div>
							  </div>
					    </div>
					    <div class="layui-col-md6">
					      <div class="layui-form-item" style="margin-bottom:0;">
							    <label class="layui-form-label">会员性别</label>
							    <div class="layui-form-mid layui-word-aux">男</div>
							  </div>
					    </div>
					    <div class="layui-col-md6">
					      <div class="layui-form-item" style="margin-bottom:0;">
							    <label class="layui-form-label">出生日期</label>
							    <div class="layui-form-mid layui-word-aux">1988-12-12</div>
							  </div>
					    </div>
					    <div class="layui-col-md6">
					      <div class="layui-form-item" style="margin-bottom:0;">
							    <label class="layui-form-label">身份证号</label>
							    <div class="layui-form-mid layui-word-aux">410125198806251254</div>
							  </div>
					    </div>
					    <div class="layui-col-md6">
					      <div class="layui-form-item" style="margin-bottom:0;">
							    <label class="layui-form-label">联系人</label>
							    <div class="layui-form-mid layui-word-aux">王小英</div>
							  </div>
					    </div>
					    <div class="layui-col-md6">
					      <div class="layui-form-item" style="margin-bottom:0;">
							    <label class="layui-form-label">开通时间</label>
							    <div class="layui-form-mid layui-word-aux">2016-12-12 12:40</div>
							  </div>
					    </div>
					    <div class="layui-col-md6">
					      <div class="layui-form-item" style="margin-bottom:0;">
							    <label class="layui-form-label">到期时间</label>
							    <div class="layui-form-mid layui-word-aux">2018-12-12</div>
							  </div>
					    </div>
					    <div class="layui-col-md6">
					      <div class="layui-form-item" style="margin-bottom:0;">
							    <label class="layui-form-label">推荐人</label>
							    <div class="layui-form-mid layui-word-aux">小张</div>
							  </div>
					    </div>
					    <div class="layui-col-md12">
					      <div class="layui-form-item" style="margin-bottom:0;">
							    <label class="layui-form-label">办卡备注</label>
							    <div class="layui-form-mid layui-word-aux laimi-input-b80" style="line-height: 26px;">用于消除浮动</div>
							  </div>
						  </div>
				    </div>   		    			    
				</div>
				<hr />
				<div class="layui-row" style="margin-top:20px;">
					<label class="layui-form-label">会员卡密码</label>
					<div class="layui-input-inline last">
						<input class="layui-input laimi-input-200" type="text" name="txtname" placeholder="请输入卡密码">
					</div>
					<div class="laimi-float-right">
						<button class="layui-btn" style="height:40px;font-size:16px;">确定</button>
					</div>
				</div>
			</form>
		</div>
	</script>
	<!--弹出层结束-->
<?php echo $this->fun_fetch('inc_foot', ''); ?>
	<script>
	layui.use(["element", "laydate", "upload", "layer", "form"], function() {
		var $ = layui.jquery;
		var objlayer = layui.layer;
		var objelement = layui.element;
		var objform = layui.form;
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
		$("#laimi-add2").on("click", function() {
			objlayer.open({
				type: 1,
				title: ["充值", "font-size:16px;"],
				btnAlign: "r",
				area: ["800px", "auto"],
				shadeClose: true,//点击遮罩关闭
				content: $("#laimi-script-add2").html()
			});
		});
		$("#laimi-add3").on("click", function() {
			objlayer.open({
				type: 1,
				title: ["精确搜索", "font-size:16px;"],
				btnAlign: "r",
				area: ["800px", "auto"],
				shadeClose: true,//点击遮罩关闭
				content: $("#laimi-script-add3").html()
			});
		});
		$("#laimi-add4").on("click", function() {
			objlayer.open({
				type: 1,
				title: ["会员资料", "font-size:16px;"],
				btnAlign: "r",
				area: ["800px", "auto"],
				shadeClose: true,//点击遮罩关闭
				content: $("#laimi-script-add4").html(),
				success: function(){
					objform.render(null, 'pay');
				}
			});
		});
		objform.on("submit(laimi-submit)", function(data) {
			objlayer.alert(JSON.stringify(data.field), {
				title: '提示信息'
			});
			return false;
		});
	});
	</script>
</body>
</html>