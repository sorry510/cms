<ul id="uleftbar" class="am-nav">
  <li class="am-dropdown <?php if($GLOBALS['strchannel'] == 'member') {echo 'uhighlight';} ?>" data-am-dropdown>
    <a href="javascript:;" class="am-dropdown-toggle" data-am-dropdown-toggle><span class="iconfont icon-wsmp-payuser"></span>会员</a>
    <ul class="am-dropdown-content umenu2 umenu2-two">
      <li><a href="member.php">1. 会员管理</a></li>
      <li><a href="e-record.php">2. 电子档案</a></li>
    </ul>
  </li>
  <li class="<?php if($GLOBALS['strchannel'] == 'appoint') {echo 'uhighlight';} ?>"><a href="appoint.php"><span class="iconfont icon-clock"></span> 预约</a></li>
  <li class="<?php if($GLOBALS['strchannel'] == 'detail') {echo 'uhighlight';} ?>"><a href="detail.php"><span class="iconfont icon-ziliao"></span> 明细</a></li>
  <li class="<?php if($GLOBALS['strchannel'] == 'count') {echo 'uhighlight';} ?>"><a href="count.php"><span class="iconfont icon-baobiao-xianxing"></span> 统计</a></li>
  <li class="am-dropdown <?php if($GLOBALS['strchannel'] == 'goods') {echo 'uhighlight';} ?>" data-am-dropdown>
    <a href="javascript:;" class="am-dropdown-toggle" data-am-dropdown-toggle><span class="iconfont icon-iconfont31quanbushangpin"></span> 商品</a>
    <ul class="am-dropdown-content umenu2 umenu2-four">
      <li><a href="goods_info.php">1. 多店通用商品</a></li>
      <li><a href="goods_diy.php">2. 单店销售商品</a></li>
      <li><a href="goods_package.php">3. 套餐管理</a></li>
      <li><a href="goods_stock.php">4. 商品库存查询</a></li>
    </ul>
  </li>
  <li class="am-dropdown <?php if($GLOBALS['strchannel'] == 'employee') {echo 'uhighlight';} ?>" data-am-dropdown>
    <a href="javascript:;" class="am-dropdown-toggle" data-am-dropdown-toggle><span class="iconfont icon-baobiao-xianxing"></span> 员工</a>
    <ul class="am-dropdown-content umenu2 umenu2-five">
      <li><a href="employee_manage.php">1. 员工管理</a></li>
      <li><a href="employee_bonus.php">2. 员工提成方案</a></li>
      <li><a href="employee_bonus_detail.php">3. 员工提成明细</a></li>
      <li><a href="employee_bonus_count.php">4. 员工提成统计</a></li>
    </ul>
  </li>
  <li class="am-dropdown <?php if($GLOBALS['strchannel'] == 'wechat') {echo 'uhighlight';} ?>" data-am-dropdown>
    <a href="javascript:;" class="am-dropdown-toggle" data-am-dropdown-toggle><span class="iconfont icon-weixin"></span> 微信</a>
    <ul class="am-dropdown-content umenu2 umenu2-three">
      <li><a href="#">1. 公众号设置</a></li>
      <li><a href="#">2. 微店设置</a></li>
      <li><a href="wechat_redpacket.php">3. 微信红包活动</a></li>
      <li><a href="wechat_redpacket_count.php">4. 微信红包发放统计</a></li>
    </ul>
  </li>
  <li class="am-dropdown <?php if($GLOBALS['strchannel'] == 'bill') {echo 'uhighlight';} ?>" data-am-dropdown><a href="javascript:;" class="am-dropdown-toggle" data-am-dropdown-toggle><span class="iconfont icon-jifen-xianxing"></span> 收支</a>
    <ul class="am-dropdown-content umenu2 umenu2-two">
      <li><a href="bill_manage.php">1. 收支管理</a></li>
      <li><a href="bill_cate.php">2. 收支分类</a></li>
    </ul>
  </li>
  <li class="am-dropdown <?php if($GLOBALS['strchannel'] == 'marketing') {echo 'uhighlight';} ?>" data-am-dropdown>
    <a href="javascript:;" class="am-dropdown-toggle" data-am-dropdown-toggle><span class="iconfont icon-iconfont31quanbushangpin"></span> 营销</a>
    <ul class="am-dropdown-content umenu2 umenu2-seven">
      
      <li><a href="marketing_voucher.php">1. 代金券管理</a></li>
      <li><a href="marketing_experience.php">2. 体验券管理</a></li>
      <li><a href="marketing_discount.php">3. 限时打折</a></li>
      <li><a href="marketing_reduction.php">4. 满减活动</a></li>
      <li><a href="marketing_gift.php">5. 满送活动</a></li>
      <li><a href="marketing_coupon.php">6. 赠送优惠券</a></li>
      <li><a href="marketing_coupon_count.php">7. 优惠券发放统计</a></li>
      <li><a href="marketing_coupon_count.php">8. 短信营销(未做)</a></li>
    </ul>
  </li>
  <li class="am-dropdown <?php if($GLOBALS['strchannel'] == 'stock') {echo 'uhighlight';} ?>" data-am-dropdown><a href="javascript:;" class="am-dropdown-toggle" data-am-dropdown-toggle><span class="iconfont icon-kucun"></span> 库存</a>
    <ul class="am-dropdown-content umenu2 umenu2-one">
      <li><a href="stock_manage.php">1. 库存管理</a></li>
    </ul>
  </li>
  <li class="am-dropdown <?php if($GLOBALS['strchannel'] == 'system') {echo 'uhighlight';} ?>" data-am-dropdown>
    <a href="javascript:;" class="am-dropdown-toggle" data-am-dropdown-toggle><span class="iconfont icon-setup"></span> 系统</a>
    <ul class="am-dropdown-content umenu2 umenu2-seven">
      <li><a href="system_baseinfo.php">1. 企业信息</a></li>
      <li><a href="#">2. 参数设置</a></li>
      <li><a href="#">3. 支付设置</a></li>
      <li><a href="system_shopmanage.php">4. 分店管理</a></li>
      <li><a href="system_operator.php">5. 操作员管理</a></li>
      <li><a href="system_card.php">6. 会员卡分类</a></li>
      <li><a href="convert.php">7. 积分换礼</a></li>
      <li><a href="giftmanager.php">7. 礼品设置</a></li>
      <li><a href="system_roomcard.php">9. 房间手牌设置</a></li>
      <li><a href="#">10. 打印设置（未做）</a></li>
      
    </ul>
  </li>
</ul>