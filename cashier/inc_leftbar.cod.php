<ul id="uleftbar" class="am-nav">
  <li class="<?php if($GLOBALS['strchannel'] == 'money') {echo 'uhighlight';} ?>"><a href="money.php"><span class="iconfont icon-wsmp-payuser"></span> 消费</a></li>
  <li class="<?php if($GLOBALS['strchannel'] == 'card') {echo 'uhighlight';} ?>"><a href="card.php"><span class="iconfont icon-wsmp-payuser"></span> 会员</a></li>
  <li class="<?php if($GLOBALS['strchannel'] == 'e-record') {echo 'uhighlight';} ?>"><a href="e-record.php"><span class="iconfont icon-wsmp-payuser"></span> 档案</a></li>
  <li class="<?php if($GLOBALS['strchannel'] == 'reserve') {echo 'uhighlight';} ?>"><a href="reserve.php"><span class="iconfont icon-clock"></span> 预约</a></li>
  <li class="<?php if($GLOBALS['strchannel'] == 'record') {echo 'uhighlight';} ?>"><a href="record.php"><span class="iconfont icon-ziliao"></span> 明细</a></li>
  <li class="<?php if($GLOBALS['strchannel'] == 'count') {echo 'uhighlight';} ?>"><a href="count.php"><span class="iconfont icon-baobiao-xianxing"></span> 统计</a></li>
  <li class="am-dropdown <?php if($GLOBALS['strchannel'] == 'goods') {echo 'uhighlight';} ?>" data-am-dropdown>
    <a href="javascript:;" class="am-dropdown-toggle" data-am-dropdown-toggle><span class="iconfont icon-iconfont31quanbushangpin"></span> 商品</a>
    <ul class="am-dropdown-content umenu2 umenu2-four">
      <li><a href="mgoods.php">1. 多店通用商品</a></li>
      <li><a href="sgoods.php">2. 单店销售商品</a></li>
      <li><a href="mcombo_time.php">3. 计时卡套餐</a></li>
      <li><a href="mcombo_number.php">4. 计次卡套餐</a></li>
    </ul>
  </li>
  <li class="am-dropdown <?php if($GLOBALS['strchannel'] == 'worker') {echo 'uhighlight';} ?>" data-am-dropdown>
    <a href="javascript:;" class="am-dropdown-toggle" data-am-dropdown-toggle><span class="iconfont icon-baobiao-xianxing"></span> 员工</a>
    <ul class="am-dropdown-content umenu2 umenu2-five">
      <li><a href="worker_manage.php"><span class="iconfont icon-question"></span> 员工管理</a></li>
      <li><a href="worker_group.php"><span class="iconfont icon-question"></span> 分组管理</a></li>
      <li><a href="worker_reward.php"><span class="iconfont icon-question"></span> 员工提成</a></li>
      <li><a href="worker_reward_detail.php"><span class="iconfont icon-question"></span> 员工提成明细</a></li>
      <li><a href="worker_reward_count.php"><span class="iconfont icon-question"></span> 员工提成统计</a></li>
    </ul>
  </li>
  <li class="am-dropdown <?php if($GLOBALS['strchannel'] == 'wechat') {echo 'uhighlight';} ?>" data-am-dropdown>
    <a href="javascript:;" class="am-dropdown-toggle" data-am-dropdown-toggle><span class="iconfont icon-weixin"></span> 微信</a>
    <ul class="am-dropdown-content umenu2 umenu2-three">
      <li><a href="#"><span class="iconfont icon-question"></span> 公众号设置</a></li>
      <li><a href="#"><span class="iconfont icon-question"></span> 微店设置</a></li>
      <li><a href="wechat_redpacket.php"><span class="iconfont icon-question"></span> 微信红包设置</a></li>
    </ul>
  </li>
  <li class="am-dropdown <?php if($GLOBALS['strchannel'] == 'bill') {echo 'uhighlight';} ?>" data-am-dropdown><a href="javascript:;" class="am-dropdown-toggle" data-am-dropdown-toggle><span class="iconfont icon-jifen-xianxing"></span> 收支</a>
    <ul class="am-dropdown-content umenu2 umenu2-two">
      <li><a href="bill_manage.php"><span class="iconfont icon-question"></span> 收支管理</a></li>
      <li><a href="bill_cate.php"><span class="iconfont icon-question"></span> 收支分类</a></li>
    </ul>
  </li>
  <li class="am-dropdown <?php if($GLOBALS['strchannel'] == 'marketing') {echo 'uhighlight';} ?>" data-am-dropdown>
    <a href="javascript:;" class="am-dropdown-toggle" data-am-dropdown-toggle><span class="iconfont icon-iconfont31quanbushangpin"></span> 营销</a>
    <ul class="am-dropdown-content umenu2 umenu2-eight">
      <li><a href="act_discount.php"><span class="iconfont icon-question"></span> 即时打折</a></li>
      <li><a href="ticket_money.php"><span class="iconfont icon-question"></span> 代金券</a></li>
      <li><a href="ticket_goods.php"><span class="iconfont icon-question"></span> 体验券</a></li>
      <li><a href="act_ticket.php"><span class="iconfont icon-question"></span> 赠送优惠券</a></li>
      <li><a href="act_decrease.php"><span class="iconfont icon-question"></span> 满减</a></li>
      <li><a href="act_give.php"><span class="iconfont icon-question"></span> 满送</a></li>
      <li><a href="marketing_coupon_count.php"><span class="iconfont icon-question"></span> 优惠券发放统计</a></li>
      <li><a href="marketing_sms.php"><span class="iconfont icon-question"></span> 短信营销</a></li>
    </ul>
  </li>
  <li class="am-dropdown <?php if($GLOBALS['strchannel'] == 'stock') {echo 'uhighlight';} ?>" data-am-dropdown><a href="javascript:;" class="am-dropdown-toggle" data-am-dropdown-toggle><span class="iconfont icon-kucun"></span> 库存</a>
    <ul class="am-dropdown-content umenu2 umenu2-two">
      <li><a href="store.php">1. 库存管理</a></li>
      <li><a href="store_info_mgoods.php">2. 商品库存查询</a></li>
    </ul>
  </li>
  <li class="am-dropdown <?php if($GLOBALS['strchannel'] == 'system') {echo 'uhighlight';} ?>" data-am-dropdown>
    <a href="javascript:;" class="am-dropdown-toggle" data-am-dropdown-toggle><span class="iconfont icon-setup"></span> 系统</a>
    <ul class="am-dropdown-content umenu2 umenu2-four">
      <li><a href="#">1. 参数设置</a></li>
      <li><a href="system_user.php">2. 操作员</a></li>
      <li><a href="system_card_type.php">3. 会员卡分类</a></li>
      <li><a href="system_score.php">4. 积分换礼</a></li>
    </ul>
  </li>
</ul>