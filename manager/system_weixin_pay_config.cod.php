<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>
<!-- content -->
<div class="gcontent" id="uwechat_config">
  <ul class="am-nav am-nav-pills ubread">
    <li><a href="system_ali_pay_config.php">支付宝当面付设置</a></li>
    <li class="am-active"><a href="javascript: void(0);">微信支付设置</a></li>
  </ul>
  <div class="gspace20"></div>
  <form class="am-form">
    <div class="am-u-lg-12 ua">
      <label class="am-u-lg-2 ua1">APPID：</label> 
      <input class="am-form-field uinput uinput-220" type="text" name="">
    </div>
    <div class="am-u-lg-12 ua">
      <label class="am-u-lg-2 ua1">MCHID：</label> 
      <input class="am-form-field uinput uinput-220" type="text" name="">
    </div>
    <div class="am-u-lg-12 ua">
      <label class="am-u-lg-2 ua1">商户支付密钥：</label> 
      <input class="am-form-field uinput uinput-220" type="text" name="">
    </div>
    <div class="am-u-lg-12 ua">
      <label class="am-u-lg-2 ua1">APPSECRET：</label> 
      <input class="am-form-field uinput uinput-220" type="text" name="">
    </div>
    <div class="am-u-lg-12 ua">
      <label class="am-u-lg-2 ua1">商户证书(SSLCERT)：</label>
      <div class="am-form-file am-text-left am-u-lg-2 ub">
        <button type="button" class="am-btn am-btn-default am-btn-sm">
          <i class="am-icon-cloud-upload"></i> 选择要上传的文件
        </button>
        <input type="file" id="doc-form-file">
        <div id="file-list"></div>
      </div>
      <div class="am-u-lg-4 ua1 am-text-left am-u-end">退款、撤销订单时需要</div>
    </div>
    <div class="am-u-lg-12 ua">
      <label class="am-u-lg-2 ua1">商户证书(SSLKEY)：</label>
      <div class="am-form-file am-text-left am-u-lg-2 ub">
        <button type="button" class="am-btn am-btn-default am-btn-sm">
          <i class="am-icon-cloud-upload"></i> 选择要上传的文件
        </button>
        <input type="file" id="doc-form-file">
        <div id="file-list"></div>
      </div>
      <div class="am-u-lg-4 ua1 am-text-left am-u-end">退款、撤销订单时需要</div>
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
