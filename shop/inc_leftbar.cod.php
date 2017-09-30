<ul id="uleftbar" class="am-nav">
  <li class="<?php if($GLOBALS['strchannel'] == 'workbench') {echo 'uhighlight';} ?>"><a href="workbench.php"><span class="iconfont icon-xiaofei"></span>&nbsp;&nbsp;收银</a></li>
  <li class="<?php if($GLOBALS['strchannel'] == 'card') {echo 'uhighlight';} ?>"><a href="card.php"><span class="iconfont icon-huiyuan"></span>&nbsp;&nbsp;会员</a></li>
  <?php if(companyConfig()['erecord_flag'] ==1){?>
  <li class="<?php if($GLOBALS['strchannel'] == 'e-record') {echo 'uhighlight';} ?>"><a href="e-record.php"><span class="iconfont icon-dangan"></span>&nbsp;&nbsp;档案</a></li>
  <?php }?>
  <li class="<?php if($GLOBALS['strchannel'] == 'reserve') {echo 'uhighlight';} ?>"><a href="reserve_today.php"><span class="iconfont icon-yuyue1"></span>&nbsp;&nbsp;预约</a></li>
  <li class="<?php if($GLOBALS['strchannel'] == 'record') {echo 'uhighlight';} ?>"><a href="record.php"><span class="iconfont icon-mingxi"></span>&nbsp;&nbsp;明细</a></li>
  <li class="<?php if($GLOBALS['strchannel'] == 'count') {echo 'uhighlight';} ?>"><a href="count.php"><span class="iconfont icon-fcstubiao19"></span>&nbsp;&nbsp;统计</a></li>
  <li class="am-dropdown <?php if($GLOBALS['strchannel'] == 'goods') {echo 'uhighlight';} ?>" data-am-dropdown>
    <a href="javascript:;" class="am-dropdown-toggle" data-am-dropdown-toggle><span class="iconfont icon-shangpin1"></span>&nbsp;&nbsp;商品</a>
    <ul class="am-dropdown-content umenu2 umenu2-four">
      <li><a href="mgoods.php">1. 多店通用商品</a></li>
      <li><a href="sgoods.php">2. 单店销售商品</a></li>
      <li><a href="mcombo_time.php">3. 计时卡套餐</a></li>
      <li><a href="mcombo_number.php">4. 计次卡套餐</a></li>
    </ul>
  </li>
  <li class="am-dropdown <?php if($GLOBALS['strchannel'] == 'worker') {echo 'uhighlight';} ?>" data-am-dropdown>
    <a href="javascript:;" class="am-dropdown-toggle" data-am-dropdown-toggle><span class="iconfont icon-yuangong"></span>&nbsp;&nbsp;员工</a>
    <ul class="am-dropdown-content umenu2 umenu2-five">
      <li><a href="worker_manage.php">1. 员工管理</a></li>
      <li><a href="worker_group.php">2. 分组管理</a></li>
      <li><a href="worker_reward.php">3. 员工提成</a></li>
      <li><a href="worker_reward_detail.php">4. 员工提成明细</a></li>
      <li><a href="worker_reward_count.php">5. 员工提成统计</a></li>
    </ul>
  </li>
  <li class="am-dropdown <?php if($GLOBALS['strchannel'] == 'bill') {echo 'uhighlight';} ?>" data-am-dropdown><a href="javascript:;" class="am-dropdown-toggle" data-am-dropdown-toggle><span class="iconfont icon-shouzhiguanli"></span>&nbsp;&nbsp;收支</a>
    <ul class="am-dropdown-content umenu2 umenu2-two">
      <li><a href="cash.php">1. 收支管理</a></li>
      <li><a href="cash_type.php">2. 收支分类</a></li>
    </ul>
  </li>
  <li class="am-dropdown <?php if($GLOBALS['strchannel'] == 'marketing') {echo 'uhighlight';} ?>" data-am-dropdown>
    <a href="javascript:;" class="am-dropdown-toggle" data-am-dropdown-toggle><span class="iconfont icon-yingxiao"></span>&nbsp;&nbsp;营销</a>
    <ul class="am-dropdown-content umenu2 umenu2-one">
      <li><a href="marketing_sms.php">1. 短信营销</a></li>
    </ul>
  </li>
  <li class="am-dropdown <?php if($GLOBALS['strchannel'] == 'stock') {echo 'uhighlight';} ?>" data-am-dropdown><a href="javascript:;" class="am-dropdown-toggle" data-am-dropdown-toggle><span class="iconfont icon-stock"></span>&nbsp;&nbsp;库存</a>
    <ul class="am-dropdown-content umenu2 umenu2-two">
      <li><a href="store.php">1. 入库和出库</a></li>
      <li><a href="store_info_mgoods.php">2. 商品库存查询</a></li>
    </ul>
  </li>
  <li class="am-dropdown <?php if($GLOBALS['strchannel'] == 'system') {echo 'uhighlight';} ?>" data-am-dropdown>
    <a href="javascript:;" class="am-dropdown-toggle" data-am-dropdown-toggle><span class="iconfont icon-tripshezhishi"></span>&nbsp;&nbsp;系统</a>
    <ul class="am-dropdown-content umenu2 umenu2-five">
      <li><a href="system_shop_config.php">1. 参数设置</a></li>
      <li><a href="system_user.php">2. 操作员管理</a></li>
      <li><a href="system_card_type.php">3. 会员卡分类</a></li>
      <li><a href="system_score.php">4. 积分换礼</a></li>
      <li><a href="system_roomcard.php">5. 房间手牌</a></li>
    </ul>
  </li>
</ul>