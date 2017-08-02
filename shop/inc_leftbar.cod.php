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
      <li><a href="mgoods.php"><span class="iconfont icon-question"></span> 通用型商品</a></li>
      <li><a href="sgoods.php"><span class="iconfont icon-question"></span> 店铺型商品</a></li>
      <li><a href="goods_stock.php"><span class="iconfont icon-question"></span> 商品库存管理</a></li>
      <li><a href="goods_package.php"><span class="iconfont icon-question"></span> 套餐管理</a></li>
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
    <ul class="am-dropdown-content umenu2 umenu2-seven">
      <li><a href="marketing_discount.php"><span class="iconfont icon-question"></span> 即时打折</a></li>
      <li><a href="marketing_voucher.php"><span class="iconfont icon-question"></span> 代金券</a></li>
      <li><a href="marketing_experience.php"><span class="iconfont icon-question"></span> 体验券</a></li>
      <li><a href="marketing_coupon.php"><span class="iconfont icon-question"></span> 赠送优惠券</a></li>
      <li><a href="marketing_reduction.php"><span class="iconfont icon-question"></span> 满减</a></li>
      <li><a href="marketing_gift.php"><span class="iconfont icon-question"></span> 满送</a></li>
      <li><a href="marketing_coupon_count.php"><span class="iconfont icon-question"></span> 优惠券发放统计</a></li>
    </ul>
  </li>
  <li class="am-dropdown <?php if($GLOBALS['strchannel'] == 'stock') {echo 'uhighlight';} ?>" data-am-dropdown><a href="javascript:;" class="am-dropdown-toggle" data-am-dropdown-toggle><span class="iconfont icon-kucun"></span> 库存</a>
    <ul class="am-dropdown-content umenu2 umenu2-one">
      <li><a href="stock_manage.php"><span class="iconfont icon-question"></span> 库存管理</a></li>
    </ul>
  </li>
  <li class="am-dropdown <?php if($GLOBALS['strchannel'] == 'system') {echo 'uhighlight';} ?>" data-am-dropdown>
    <a href="javascript:;" class="am-dropdown-toggle" data-am-dropdown-toggle><span class="iconfont icon-setup"></span> 系统</a>
    <ul class="am-dropdown-content umenu2 umenu2-seven">
      <li><a href="system_baseinfo.php"><span class="iconfont icon-question"></span> 企业信息</a></li>
      <li><a href="#"><span class="iconfont icon-question"></span> 参数设置</a></li>
      <li><a href="system_shopmanage.php"><span class="iconfont icon-question"></span> 分店管理</a></li>
      <li><a href="system_operator.php"><span class="am-icon-user am-icon-fw"></span> 操作员</a></li>
      <li><a href="system_card.php"><span class="iconfont icon-question"></span> 会员卡</a></li>
      <li><a href="system_roomcard.php"><span class="iconfont icon-question"></span> 房间手牌设置</a></li>
      <li><a href="#"><span class="iconfont icon-question"></span> 支付设置</a></li>
    </ul>
  </li>
</ul>