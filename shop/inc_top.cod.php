<header id="uheader" class="am-topbar am-topbar-fixed-top">
  <div class="am-topbar-brand ulogo">
    <a href=""><img src="../img/logo.png" height="40"></a>
  </div>
  <div class="am-topbar-left utitle"><?php echo gGetCompanyInfo()['company_name']."——".gGetShopInfo()['shop_name'];?></div>
  <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right unav">
    <li>
      <a href="javascript:;"><span class="iconfont icon-xiaoxihui"></span> <span>消息</span></a>
    </li>
    <li class="am-dropdown" data-am-dropdown>
      <a class="am-dropdown-toggle" href="javascript:;" data-am-dropdown-toggle>
        <span class="iconfont icon-huiyuan1"></span> <span class="udropdown"><?php echo $GLOBALS['_SESSION']['login_account']?></span>
      </a>
      <ul class="am-dropdown-content umenu1">
        <li><a href="#"><span class="am-icon-user am-icon-fw"></span>资料</a></li>
        <li><a href="#"><span class="am-icon-cog am-icon-fw"></span>设置</a></li>
        <li><a href="#"><span class="am-icon-power-off am-icon-fw"></span>退出</a></li>
      </ul>
    </li>
    <?php if($GLOBALS['_SESSION']['login_type']==1){?>
    <li>
      <a href="identify_exchange_do.php">
        <span class="iconfont icon-quanxian"></span><span>转换为管理员</span>
      </a>
    </li>
    <?php }?>
  </ul>
  <a href="#" class="am-topbar-right uhelp">视频教程</a>
</header>