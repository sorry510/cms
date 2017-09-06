<ul id="uleftbar" class="am-nav">
  <li class="<?php if($GLOBALS['strchannel'] == 'card') {echo 'uhighlight';} ?>"><a href="card.php"><span class="iconfont icon-wsmp-payuser"></span> 会员</a></li>
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
  <li class="am-dropdown <?php if($GLOBALS['strchannel'] == 'store') {echo 'uhighlight';} ?>" data-am-dropdown>
    <a href="javascript:;" class="am-dropdown-toggle" data-am-dropdown-toggle><span class="iconfont icon-baobiao-xianxing"></span> 库存</a>
    <ul class="am-dropdown-content umenu2 umenu2-one">
      <li><a href="store_info_mgoods.php">1. 商品库存查询</a></li>
    </ul>
  </li>
  <li class="am-dropdown <?php if($GLOBALS['strchannel'] == 'worker') {echo 'uhighlight';} ?>" data-am-dropdown>
    <a href="javascript:;" class="am-dropdown-toggle" data-am-dropdown-toggle><span class="iconfont icon-baobiao-xianxing"></span> 员工</a>
    <ul class="am-dropdown-content umenu2 umenu2-four">
      <li><a href="worker_manage.php">1. 员工管理</a></li>
      <li><a href="worker_reward.php">2. 员工提成方案</a></li>
      <li><a href="worker_reward_detail.php">3. 员工提成明细</a></li>
      <li><a href="worker_reward_count.php">4. 员工提成统计</a></li>
    </ul>
  </li>
  <li class="am-dropdown <?php if($GLOBALS['strchannel'] == 'wechat') {echo 'uhighlight';} ?>" data-am-dropdown>
    <a href="javascript:;" class="am-dropdown-toggle" data-am-dropdown-toggle><span class="iconfont icon-weixin"></span> 微信</a>
    <ul class="am-dropdown-content umenu2 umenu2-five">
      <li><a href="wechat_config.php">1. 公众号设置</a></li>
      <li><a href="wechat_shop_config.php">2. 微店设置</a></li>
      <li><a href="wechat_redpacket.php">3. 微信红包活动</a></li>
      <li><a href="wechat_redpacket_count.php">4. 微信红包发放统计</a></li>
      <li><a href="wechat_concern_coupon.php">5. 关注优惠券设置</a></li>
      <li><a href="wechat_shop_config.php">6. 微商城</a></li>
    </ul>
  </li>
  <li class="am-dropdown <?php if($GLOBALS['strchannel'] == 'marketing') {echo 'uhighlight';} ?>" data-am-dropdown>
    <a href="javascript:;" class="am-dropdown-toggle" data-am-dropdown-toggle><span class="iconfont icon-iconfont31quanbushangpin"></span> 营销</a>
    <ul class="am-dropdown-content umenu2 umenu2-eight">   
      <li><a href="ticket_money.php">1. 代金券管理</a></li>
      <li><a href="ticket_goods.php">2. 体验券管理</a></li>
      <li><a href="act_discount.php">3. 限时打折</a></li>
      <li><a href="act_decrease.php">4. 满减活动</a></li>
      <li><a href="act_give.php">5. 满送活动</a></li>
      <li><a href="act_ticket.php">6. 赠送优惠券</a></li>
      <li><a href="marketing_coupon_count.php">7. 优惠券发放统计</a></li>
      <li><a href="marketing_sms.php">8. 短信营销</a></li>
    </ul>
  </li>
  <li class="am-dropdown <?php if($GLOBALS['strchannel'] == 'system') {echo 'uhighlight';} ?>" data-am-dropdown>
    <a href="javascript:;" class="am-dropdown-toggle" data-am-dropdown-toggle><span class="iconfont icon-setup"></span> 系统</a>
    <ul class="am-dropdown-content umenu2 umenu2-seven">
      <li><a href="system_company.php">1. 企业信息</a></li>
      <li><a href="system_base_config.php">2. 参数设置</a></li>
      <li><a href="system_pay_config.php">3. 支付设置</a></li>
      <li><a href="system_shop.php">4. 分店管理</a></li>
      <li><a href="system_user.php">5. 操作员管理</a></li>
      <li><a href="system_card_type.php">6. 会员卡分类</a></li>
      <li><a href="system_score.php">7. 积分换礼</a></li>
    </ul>
  </li>
</ul>