<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>
<!-- content -->
<div class="gcontent" id="uwechat_shop_config">
  <ul class="am-nav am-nav-pills ubread">
    <li class="am-active"><a href="javascript: void(0);">微商城</a></li>
  </ul>
  <div class="gspace20"></div>
  <form class="am-form">
    <div class="am-u-lg-12 ua">
      <label class="am-u-lg-2 ua1">微商城：</label>
      <div class="am-u-lg-3 ub">
        <label class="am-radio-inline">
          <input type="radio" name="radio1" value="0" data-am-ucheck> 启用
        </label>
        <label class="am-radio-inline">
          <input type="radio" name="radio1" value="1" data-am-ucheck> 不启用
        </label>
      </div>
    </div>
    <div class="am-u-lg-12 ua">
      <label class="am-u-lg-2 ua1">微信在线充值：</label>
      <div class="am-u-lg-3 ub">
        <label class="am-radio-inline">
          <input type="radio" name="radio1" value="0" data-am-ucheck> 启用
        </label>
        <label class="am-radio-inline">
          <input type="radio" name="radio1" value="1" data-am-ucheck> 不启用
        </label>
      </div>
    </div>
    <div class="am-u-lg-12 ua">
      <label class="am-u-lg-2 ua1">微商城发货：</label>
      <div class="am-u-lg-2 ub">
        <label class="am-radio-inline">
          <input type="radio" name="radio1" value="0" data-am-ucheck> 总店发
        </label>
        <label class="am-radio-inline">
          <input type="radio" name="radio1" value="1" data-am-ucheck> 各分店发
        </label>
      </div>
      <div class="am-u-lg-8 ua1 am-text-left am-u-end">(按会员开店铺发货，没有开店的总店发)</div>
    </div>
    <div class="am-u-lg-12 ua">
      <label class="am-u-lg-2 ua1">自由/邮寄：</label>
      <div class="am-u-lg-3 ub">
        <label class="am-radio-inline">
          <input type="radio" name="radio1" value="0" data-am-ucheck> 自取
        </label>
        <label class="am-radio-inline">
          <input type="radio" name="radio1" value="1" data-am-ucheck> 邮寄
        </label>
        <label class="am-radio-inline">
          <input type="radio" name="radio1" value="2" data-am-ucheck> 会员自主选择
        </label>
      </div>
    </div>
    <div class="am-u-lg-12 ua">
      <label class="am-u-lg-2 ua1"></label> 
      <div class="am-u-lg-8 ub">
        <button type="button" class="am-btn ubtn-sure ubtn-green">
          <i class="iconfont icon-yuanxingxuanzhong"></i>
            完成
        </button>
      </div>
    </div>
    <div class="am-u-lg-12"><div class="gspace20"></div></div> 
  </form>
</div>

<script src="../js/jquery.min.js"></script>
<script src="../js/amazeui.min.js"></script>
</body>
</html>
