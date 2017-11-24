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
            <a href="tongji_all.php">基础销售统计</a>
          </li>
          <li>
            <a href="tongji_goods.php">商品销售排名</a>
          </li>
          <li>
            <a href="tongji_business.php">营业收入对比</a>
          </li>
          <li>
            <a href="tongji_income.php">新增会员曲线</a>
          </li>
          <li>
            <a href="tongji_shop_revenue.php">店铺收入占比</a>
          </li>
          <li>
            <a href="tongji_shop_ranking.php">店铺收入排名</a>
          </li>
        </ul>
				<div id="laimi-main" class="p-tongji-all layui-tab-content">
<form class="layui-form">
	<div class="laimi-tools layui-form-item">
		<label class="layui-form-label">分店</label>
		<div class="layui-input-inline">
			<select name="shop_id">
				<option value="0">全部</option>
        <?php foreach($this->_data['shop'] as $row) { ?>
        <option value="<?php echo $row['shop_id']; ?>" <?php if($row['shop_id'] == $this->_data['request']['shop_id']){
        echo "selected" ;}?> ><?php echo $row['shop_name']; ?></option>
        <?php } ;?>
			</select>
		</div>		
		<label class="layui-form-label laimi-input">日期</label>
		<div class="layui-input-inline">
			<input id="laimi-from" class="layui-input laimi-input-100" type="text" name="from" placeholder="yyyy-MM-dd" value="<?php echo htmlspecialchars($this->_data['request']['from']); ?>">
		</div>
		<label class="layui-form-label laimi-input" style="width: 0px;margin-right:10px">至</label>
		<div class="layui-input-inline">
			<input id="laimi-to" class="layui-input laimi-input-100" type="text" name="to" placeholder="yyyy-MM-dd" value="<?php echo htmlspecialchars($this->_data['request']['to']); ?>">
		</div>		
		<div class="layui-input-inline">
			<button class="layui-btn layui-btn-normal">搜索</button>
		</div>
	</div>
</form>
<blockquote class="layui-elem-quote" style="margin-top:20px;">
  <div class="layui-row">
    <div class="layui-col-md2">
      <div class="layui-bg-orange layui-circle" style="margin:0 auto;width:120px;height:120px;"><span style="margin-left:40px;line-height:120px;font-size:22px;">收入</span></div>
    </div>
    <div class="layui-col-md1" style="height:120px;background-color:#DDDDDD;width:1px;"></div>
    <div class="layui-col-md3" style="line-height:26px;margin-top:20px;">
    	<ul>
    		<li style="text-align:center;"><span class="laimi-color-ju" style="font-size:18px;">¥</span><span style="font-size:32px;font-weight:bold;" class="laimi-color-ju"><?php echo $this->_data['income']['all'];?></span></li>
    		<li class="laimi-color-hui" style="text-align:center;">店铺实收</li>
    		<li style="text-align:center;color:#C9C9C9;">(会员卡扣不计入实收)</li>
    	</ul>
    </div>
    <div class="layui-col-md1" style="margin-right:30px;width:1px;height:120px;background-color:#DDDDDD;"></div>
    <div class="layui-col-md4" style="line-height:25px;margin-top:15px;">
    	<ul>
    		<li><span class="layui-text">现金付款：</span><span class="laimi-color-ju">¥<?php echo $this->_data['income']['xianjin_all'];?></span>（会员：<?php echo $this->_data['income']['xianjin_card'];?>元，散客：<?php echo $this->_data['income']['xianjin_normal'];?>元）</li>
    		<li><span class="layui-text">POS刷卡：</span><span class="laimi-color-ju">¥<?php echo $this->_data['income']['yinhang_all'];?></span>（会员：<?php echo $this->_data['income']['yinhang_card'];?>元，散客：<?php echo $this->_data['income']['yinhang_normal'];?>元）</li>
    		<li><span class="layui-text">团购付款：</span><span class="laimi-color-ju">¥<?php echo $this->_data['income']['tuan_all'];?></span></li>
      </ul>
		</div>
		<div class="layui-col-md2" style="margin-top:15px;line-height:25px;">
    	<ul>
    		<li><span class="layui-text">会员卡扣：</span><span class="laimi-color-ju">¥<?php echo $this->_data['income']['kakou_all'];?></span></li>
    		<li><span class="layui-text">微信付款：</span><span class="laimi-color-ju">¥<?php echo $this->_data['income']['weixin_all'];?></span></li>
    		<li><span class="layui-text">支付宝付款：</span><span class="laimi-color-ju">¥<?php echo $this->_data['income']['zhifubao_all'];?></span></li>
      </ul>
		</div>
  </div>
</blockquote>
<blockquote class="layui-elem-quote" style="margin-top:20px;">
  <div class="layui-row">
    <div class="layui-col-md2">
      <div class="layui-bg-blue layui-circle" style="margin:0 auto;width:120px;height:120px;"><span style="margin-left:40px;line-height:120px;font-size:22px;">消费</span></div>
    </div>
    <div class="layui-col-md1" style="width:1px;height:120px;background-color:#DDDDDD;"></div>
    <div class="layui-col-md3" style="line-height:26px;margin-top:30px;">
    	<ul>
    		<li style="text-align:center;"><span class="laimi-color-ju" style="font-size:32px;font-weight:bold;"><?php echo $this->_data['shopping']['all_shopping_times'];?></span><span class="laimi-color-ju">次</span></li>
    		<li class="laimi-color-hui" style="text-align:center;">消费次数 </li>
    	</ul>
    </div>
    <div class="layui-col-md1" style="margin-right:30px;width:1px;height:120px;background-color:#DDDDDD;"></div>
    <div class="layui-col-md4" style="margin-top:10px;line-height:25px;">
    	<ul>
    		<li><span class="layui-text">会员消费：</span><span class="laimi-color-ju"><?php echo $this->_data['shopping']['card_shopping_times'];?></span>次，消费&nbsp;<span class="laimi-color-ju">¥<?php echo $this->_data['shopping']['card_shopping'];?></span></li>
    		<li><span class="layui-text">散客消费：</span><span class="laimi-color-ju"><?php echo $this->_data['shopping']['normal_shopping_times'];?></span>次，消费&nbsp;<span class="laimi-color-ju">¥<?php echo $this->_data['shopping']['normal_shopping'];?></span></li>
      </ul>
		</div>
  </div>
</blockquote>
<blockquote class="layui-elem-quote" style="margin-top:20px;">
  <div class="layui-row">
    <div class="layui-col-md2">
      <div class="layui-bg-green layui-circle" style="margin:0 auto;width:120px;height:120px;"><span style="margin-left:40px;line-height:120px;font-size:22px;">会员</span></div>
    </div>
    <div class="layui-col-md1" style="width:1px;height:120px;background-color:#DDDDDD;"></div>
    <div class="layui-col-md3" style="line-height:26px;margin-top:30px;">
    	<ul>
    		<li style="text-align:center;"><span class="laimi-color-ju" style="font-size:32px;font-weight:bold;"><?php echo $this->_data['card']['card_all'];?></span><span class="laimi-color-ju">人</span></li>
    		<li class="laimi-color-hui" style="text-align:center;">全部会员 </li>
    	</ul>
    </div>
    <div class="layui-col-md1" style="margin-right:30px;width:1px;height:120px;background-color:#DDDDDD;"></div>
    <div class="layui-col-md6" style="margin-top:10px;line-height:25px;">
    	<ul>
    		<li><span class="layui-text">正常会员：</span><span class="laimi-color-ju"><?php echo $this->_data['card']['card_normal'];?></span>人</li>
    		<li><span class="layui-text">停用会员：</span><span class="laimi-color-ju"><?php echo $this->_data['card']['card_tingyong'];?></span>人</li>
    		<li><span class="layui-text">过期会员：</span><span class="laimi-color-ju"><?php echo $this->_data['card']['card_expired'];?></span>人</li>
    		<li><span class="layui-text">累计余额：</span><span class="laimi-color-ju">¥<?php echo $this->_data['card']['card_ymoney'];?></span></li>
      </ul>
		</div>
  </div>
</blockquote>
<blockquote class="layui-elem-quote" style="margin-top:20px;">
  <div class="layui-row">
    <div class="layui-col-md2">
      <div class="layui-bg-cyan layui-circle" style="margin:0 auto;width:120px;height:120px;"><span style="margin-left:40px;line-height:120px;font-size:22px;">商品</span></div>
    </div>
    <div class="layui-col-md1" style="width:1px;height:120px;background-color:#DDDDDD;"></div>
    <div class="layui-col-md3" style="margin-top:38px;line-height:26px;">
    	<ul>
    		<li style="text-align:center;"><span class="laimi-color-ju" style="font-size:18px;">¥</span><span class="laimi-color-ju" style="font-size:32px;font-weight:bold;"><?php echo $this->_data['goods']['sales_volume'];?></span></li>
    		<li class="laimi-color-hui" style="text-align:center;">商品销售额 </li>
    	</ul>
    </div>
    <div class="layui-col-md1" style="height:120px;background-color:#DDDDDD;width:1px;margin-right:30px;"></div>
    <div class="layui-col-md6" style="margin-top:30px;line-height:25px;">
    	<ul>
    		<li><span class="layui-text">商品销售额：</span><span class="laimi-color-ju">¥<?php echo $this->_data['goods']['sales_volume'];?></span>&nbsp;&nbsp;&nbsp;&nbsp;<a href="tongji_goods.php?<?php echo api_value_query($this->_data['request']);?>" style="color:#004C96;">查看商品销售排名</a></li>
    		<li><span class="layui-text">商品销售数量：</span><span class="laimi-color-ju"><?php echo $this->_data['goods']['sales_count'];?></span>个</li>
      </ul>
		</div>
  </div>
</blockquote>
				</div>
			</div>
		</div>
	</div>
<?php echo $this->fun_fetch('inc_foot', ''); ?>
	<script>
	layui.use(["element", "laydate", "form"], function() {
		var $ = layui.jquery;
		var objlayer = layui.layer;
		var objelement = layui.element;
		var objdate = layui.laydate;
		var objform = layui.form;
		objdate.render({
			elem: '#laimi-from'
		});
		objdate.render({
			elem: '#laimi-to'
		});
	});
	</script>
</body>
</html>