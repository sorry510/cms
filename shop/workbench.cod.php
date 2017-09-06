<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>

<!-- content -->
<div id="uworkbench" class="gcontent">
  <ul class="am-nav am-nav-pills utop">
    <li>
      <div class="ucardsearch">
        <input type="text" class="am-form-field uinput uinput-160" placeholder="卡号/手机号/姓名" name="search" value="">
        <button type="submit" class="am-btn ubtn-search ccardsearch">
          F1查询
        </button>
      </div>
    </li>
    <li>
      <ul class="am-nav am-nav-pills ucarddetail">
        <li>姓名：<span>校长啊</span></li>
        <li>类型：<span>8折卡</span></li>
        <li>卡折扣：<span>8</span>折</li>
        <li>手机号：<span>123953</span></li>
      </ul>
    </li>
    <li class="uroomcard gtext-yellow"><i class="iconfont icon-search"></i><span>201-1001</span></li>
  </ul>
  <div class="gspace15"></div>
  <div class="am-u-lg-4 uleft">
    <div class="am-tabs" data-am-tabs="{noSwipe: 1}">
      <ul class="am-tabs-nav am-nav am-nav-tabs ulhead">
        <li class="am-active"><a href="#tab1">可选商品</a></li>
        <li><a href="#tab2">我的套餐</a></li>
        <li><a href="#tab3">我的优惠券</a></li>
      </ul>
      <div class="am-tabs-bd">
        <div class="am-tab-panel am-active" id="tab1">
          <div class="ua"><span class="ua1">分类/名称</span><span class="ua2">操作</span></div>
            <div class="am-form-group ub">
              <div class="umodal-normal ub1">
                <select name="type" class="uselect uselect-max ctype" data-am-selected>
                <option value="0">全部</option>
                <?php foreach($this->_data['mgoods_catalog_list'] as $row) { ?>
                  <option value="<?php echo 'm-'.$row['mgoods_catalog_id']; ?>"><?php echo $row['mgoods_catalog_name']; ?></option>
                <?php }?>
                <?php foreach($this->_data['sgoods_catalog_list'] as $row) { ?>
                  <option value="<?php echo 's-'.$row['sgoods_catalog_id']; ?>"><?php echo $row['sgoods_catalog_name']; ?></option>
                <?php }?>
                </select>
              </div>
              <div class="umodal-normal ub1">
                <input name="search" class="am-form-field uinput uinput-max csearch" type="text" placeholder="">
              </div>
              <div class="umodal-search ub2">
                <button type="button" class="am-btn ubtn-search2 ubtn-green cgoodssubmit">
                  <span class="gtext-yellow">F2</span><i class="iconfont icon-search"></i>
                  查询
                </button>
              </div>
            </div>
          <ul class="uc">
          <?php foreach($this->_data['mgoods_list'] as $row) { ?>
            <li class="uc1" mgoods_type="<?php echo $row['mgoods_catalog_id'];?>"><?php echo $row['mgoods_catalog_name'];?></li>
            <?php foreach($row['mgoods'] as $row2){ ?>
              <li class="uc2" mgoods_id="<?php echo $row2['mgoods_id'];?>">
                <div class="uc2a" price="<?php echo $row2['mgoods_price'];?>" cprice="<?php echo $row2['mgoods_cprice'];?>"><?php echo $row2['mgoods_name']."(".$row2['mgoods_price'].")";?></div>
                <div class="uc2b cadd"><a href="#">添加</a></div>
              </li>
            <?php } ?>
          <?php }?>
          <?php foreach($this->_data['sgoods_list'] as $row) { ?>
            <li class="uc1" sgoods_type="<?php echo $row['sgoods_catalog_id'];?>"><?php echo $row['sgoods_catalog_name'];?></li>
            <?php foreach($row['sgoods'] as $row2){ ?>
              <li class="uc2" sgoods_id="<?php echo $row2['sgoods_id'];?>">
                <div class="uc2a" price="<?php echo $row2['sgoods_price'];?>" cprice="<?php echo $row2['sgoods_cprice'];?>"><?php echo $row2['sgoods_name']."(".$row2['sgoods_price'].")";?></div>
                <div class="uc2b cadd"><a href="#">添加</a></div>
              </li>
            <?php } ?>
          <?php }?>
          </ul>
        </div>
        <div class="am-tab-panel am-fade" id="tab2">
          <div class="ua"><span class="ua1">分类/名称</span><span class="ua2">操作</span></div>
          <ul class="uc" style="height: 362px;">
          </ul>
        </div>
        <div class="am-tab-panel am-fade" id="tab3">
          <div class="ua"><span class="ua1">分类/名称</span><span class="ua2">操作</span></div>
          <ul class="uc" style="height: 362px;">
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="am-u-lg-7 am-fr uright">
    <ul class="am-g am-nav am-nav-pills urhead">
      <li class="am-u-lg-4">名称</li>
      <li class="am-u-lg-2">真实价格</li>
      <li class="am-u-lg-2">数量</li>
      <li class="am-u-lg-2">服务员</li>
      <li class="am-u-lg-2">操作</li>
    </ul>
    <ul class="urcontent">
      <li class="am-u-lg-4 gtext-overflow" title="苏打水苏苏打水苏打水苏苏打水（100元）">苏打水苏苏打水（100元）</li>
      <li class="am-u-lg-2"><span>56</span>元</li>
      <li class="am-u-lg-2">
        <a href="javascript:;" class="udec cbtndec"><i class="am-icon-minus"></i></a><input type="text" class="uinput2 uinput-35 cnum" mcombo_id="" value="1"><a href="javascript:;" class="uplus cbtnplus"><i class="am-icon-plus"></i></a>
      </li>
      <li class="am-u-lg-2">
        <select class="uselect uselect-auto" data-am-selected name="">
          <option value="all">全部</option>
          <option value="0">大大</option>
          <option value="2">大大</option>
          <option value="3">大大</option>
        </select>
      </li>
      <li class="am-u-lg-2 udel"><a href="javascript:;">移除</a></li>
      <li class="am-u-lg-4 gtext-overflow" title="苏打水苏苏打水苏打水苏苏打水（100元）">苏打水苏苏打水（100元）</li>
      <li class="am-u-lg-2"><span>56</span>元</li>
      <li class="am-u-lg-2">
        <a href="javascript:;" class="udec cbtndec"><i class="am-icon-minus"></i></a><input type="text" class="uinput2 uinput-35 cnum" mcombo_id="" value="1"><a href="javascript:;" class="uplus cbtnplus"><i class="am-icon-plus"></i></a>
      </li>
      <li class="am-u-lg-2">
        <select class="uselect uselect-auto" data-am-selected name="">
          <option value="all">全部</option>
          <option value="0">大大</option>
          <option value="2">大大</option>
          <option value="3">大大</option>
        </select>
      </li>
      <li class="am-u-lg-2 udel"><a href="javascript:;">移除</a></li>
      <li class="am-u-lg-4 gtext-overflow" title="苏打水苏苏打水苏打水苏苏打水（100元）">苏打水苏苏打水（100元）</li>
      <li class="am-u-lg-2"><span>56</span>元</li>
      <li class="am-u-lg-2">
        <a href="javascript:;" class="udec cbtndec"><i class="am-icon-minus"></i></a><input type="text" class="uinput2 uinput-35 cnum" mcombo_id="" value="1"><a href="javascript:;" class="uplus cbtnplus"><i class="am-icon-plus"></i></a>
      </li>
      <li class="am-u-lg-2">
        <select class="uselect uselect-auto" data-am-selected name="">
          <option value="all">全部</option>
          <option value="0">大大</option>
          <option value="2">大大</option>
          <option value="3">大大</option>
        </select>
      </li>
      <li class="am-u-lg-2"><a href="javascript:;">移除</a></li>
      <li class="am-u-lg-4 gtext-overflow" title="苏打水苏苏打水苏打水苏苏打水（100元）">苏打水苏苏打水（100元）</li>
      <li class="am-u-lg-2"><span>56</span>元</li>
      <li class="am-u-lg-2">
        <a href="javascript:;" class="udec cbtndec"><i class="am-icon-minus"></i></a><input type="text" class="uinput2 uinput-35 cnum" mcombo_id="" value="1"><a href="javascript:;" class="uplus cbtnplus"><i class="am-icon-plus"></i></a>
      </li>
      <li class="am-u-lg-2">
        <select class="uselect uselect-auto" data-am-selected name="">
          <option value="all">全部</option>
          <option value="0">大大</option>
          <option value="2">大大</option>
          <option value="3">大大</option>
        </select>
      </li>
      <li class="am-u-lg-2"><a href="javascript:;">移除</a></li>
      <li class="am-u-lg-4 gtext-overflow" title="苏打水苏苏打水苏打水苏苏打水（100元）">苏打水苏苏打水（100元）</li>
      <li class="am-u-lg-2"><span>56</span>元</li>
      <li class="am-u-lg-2">
        <a href="javascript:;" class="udec cbtndec"><i class="am-icon-minus"></i></a><input type="text" class="uinput2 uinput-35 cnum" mcombo_id="" value="1"><a href="javascript:;" class="uplus cbtnplus"><i class="am-icon-plus"></i></a>
      </li>
      <li class="am-u-lg-2">
        <select class="uselect uselect-auto" data-am-selected name="">
          <option value="all">全部</option>
          <option value="0">大大</option>
          <option value="2">大大</option>
          <option value="3">大大</option>
        </select>
      </li>
      <li class="am-u-lg-2"><a href="javascript:;">移除</a></li>
      <li class="am-u-lg-4 gtext-overflow" title="苏打水苏苏打水苏打水苏苏打水（100元）">苏打水苏苏打水（100元）</li>
      <li class="am-u-lg-2"><span>56</span>元</li>
      <li class="am-u-lg-2">
        <a href="javascript:;" class="udec cbtndec"><i class="am-icon-minus"></i></a><input type="text" class="uinput2 uinput-35 cnum" mcombo_id="" value="1"><a href="javascript:;" class="uplus cbtnplus"><i class="am-icon-plus"></i></a>
      </li>
      <li class="am-u-lg-2">
        <select class="uselect uselect-auto" data-am-selected name="">
          <option value="all">全部</option>
          <option value="0">大大</option>
          <option value="2">大大</option>
          <option value="3">大大</option>
        </select>
      </li>
      <li class="am-u-lg-2"><a href="javascript:;">移除</a></li>
      <li class="am-u-lg-4 gtext-overflow" title="苏打水苏苏打水苏打水苏苏打水（100元）">苏打水苏苏打水（100元）</li>
      <li class="am-u-lg-2"><span>56</span>元</li>
      <li class="am-u-lg-2">
        <a href="javascript:;" class="udec cbtndec"><i class="am-icon-minus"></i></a><input type="text" class="uinput2 uinput-35 cnum" mcombo_id="" value="1"><a href="javascript:;" class="uplus cbtnplus"><i class="am-icon-plus"></i></a>
      </li>
      <li class="am-u-lg-2">
        <select class="uselect uselect-auto" data-am-selected name="">
          <option value="all">全部</option>
          <option value="0">大大</option>
          <option value="2">大大</option>
          <option value="3">大大</option>
        </select>
      </li>
      <li class="am-u-lg-2"><a href="javascript:;">移除</a></li>
      <li class="am-u-lg-4 gtext-overflow" title="苏打水苏苏打水苏打水苏苏打水（100元）">苏打水苏苏打水（100元）</li>
      <li class="am-u-lg-2"><span>56</span>元</li>
      <li class="am-u-lg-2">
        <a href="javascript:;" class="udec cbtndec"><i class="am-icon-minus"></i></a><input type="text" class="uinput2 uinput-35 cnum" mcombo_id="" value="1"><a href="javascript:;" class="uplus cbtnplus"><i class="am-icon-plus"></i></a>
      </li>
      <li class="am-u-lg-2">
        <select class="uselect uselect-auto" data-am-selected name="">
          <option value="all">全部</option>
          <option value="0">大大</option>
          <option value="2">大大</option>
          <option value="3">大大</option>
        </select>
      </li>
      <li class="am-u-lg-2"><a href="javascript:;">移除</a></li>
      <li class="am-u-lg-4 gtext-overflow" title="苏打水苏苏打水苏打水苏苏打水（100元）">苏打水苏苏打水（100元）</li>
      <li class="am-u-lg-2"><span>56</span>元</li>
      <li class="am-u-lg-2">
        <a href="javascript:;" class="udec cbtndec"><i class="am-icon-minus"></i></a><input type="text" class="uinput2 uinput-35 cnum" mcombo_id="" value="1"><a href="javascript:;" class="uplus cbtnplus"><i class="am-icon-plus"></i></a>
      </li>
      <li class="am-u-lg-2">
        <select class="uselect uselect-auto" data-am-selected name="">
          <option value="all">全部</option>
          <option value="0">大大</option>
          <option value="2">大大</option>
          <option value="3">大大</option>
        </select>
      </li>
      <li class="am-u-lg-2"><a href="javascript:;">移除</a></li>
      <li class="am-u-lg-4 gtext-overflow" title="苏打水苏苏打水苏打水苏苏打水（100元）">苏打水苏苏打水（100元）</li>
      <li class="am-u-lg-2"><span>56</span>元</li>
      <li class="am-u-lg-2">
        <a href="javascript:;" class="udec cbtndec"><i class="am-icon-minus"></i></a><input type="text" class="uinput2 uinput-35 cnum" mcombo_id="" value="1"><a href="javascript:;" class="uplus cbtnplus"><i class="am-icon-plus"></i></a>
      </li>
      <li class="am-u-lg-2">
        <select class="uselect uselect-auto" data-am-selected name="">
          <option value="all">全部</option>
          <option value="0">大大</option>
          <option value="2">大大</option>
          <option value="3">大大</option>
        </select>
      </li>
      <li class="am-u-lg-2"><a href="javascript:;">移除</a></li>
      <li class="am-u-lg-4 gtext-overflow" title="苏打水苏苏打水苏打水苏苏打水（100元）">苏打水苏苏打水（100元）</li>
      <li class="am-u-lg-2"><span>56</span>元</li>
      <li class="am-u-lg-2">
        <a href="javascript:;" class="udec cbtndec"><i class="am-icon-minus"></i></a><input type="text" class="uinput2 uinput-35 cnum" mcombo_id="" value="1"><a href="javascript:;" class="uplus cbtnplus"><i class="am-icon-plus"></i></a>
      </li>
      <li class="am-u-lg-2">
        <select class="uselect uselect-auto" data-am-selected name="">
          <option value="all">全部</option>
          <option value="0">大大</option>
          <option value="2">大大</option>
          <option value="3">大大</option>
        </select>
      </li>
      <li class="am-u-lg-2 udel"><a href="javascript:;">移除</a></li>
    </ul>
    <div class="am-u-lg-12 utotaltext">
      共计<span class="gtext-orange">0</span>件，原价<span class="gtext-orange">289.34</span>元，折扣<span class="gtext-orange">4.2</span>折，应收<span class="gtext-orange">242.2</span>元
    </div>
  </div>
  <div class="ubottom">
    <div class="am-u-lg-2">
      <button class="am-btn ubtn-guadan">
        挂单
      </button>
    </div>
    <div class="am-u-lg-3" style="padding-left:30px;">
      <span>合计金额：</span>
      <span class="gtext-orange ufont1">123.42</span>　
      <span>元</span>　
    </div>
    <div class="am-u-lg-3">
      <span>导购：</span>
      <select class="uselect uselect-auto" data-am-selected="{dropUp: 1,maxHeight: '130px'}" name="">
        <option value="all">全部</option>
        <option value="0">大大</option>
        <option value="2">大大</option>
        <option value="3">大大</option>
      </select>
    </div>
    <div class="am-u-lg-2">
      <button type="button" class="am-btn ubtn-pay cpayopen">
        结账
      </button>
    </div>
  </div>
</div>
<!-- 选择会员 -->
<div id="uworkbenchm1" class="am-modal" tabindex="-1">
  <div class="am-modal-dialog umodal">
    <div class="am-modal-hd uhead">会员信息
      <a href="javascript:void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd">
      <div class="am-u-lg-4">
        <div class="am-form-group am-u-lg-12">
          <select class="uselect uselect-max" data-am-selected="{maxHeight: '130px'}" name="">
            <option value="all">全部</option>
            <option value="0">大大</option>
            <option value="2">大大</option>
            <option value="3">大大</option>
          </select>
        </div>
        <div class="am-u-lg-12">
          <img class="ucardphoto" src="../img/wu.jpg">
        </div>
      </div>
      <div class="am-u-lg-8">
        <div class="am-g ucontent">
          <div class="am-u-lg-6">会员卡号：<span></span></div>
          <div class="am-u-lg-6">会员姓名：<span></span></div>
          <div class="am-u-lg-6">手机号码：<span></span></div>
          <div class="am-u-lg-6">卡类型：<span></span></div>
          <div class="am-u-lg-6">会员折扣：<span></span></div>
          <div class="am-u-lg-6">卡余额：<span></span></div>
        </div>
        <div class="am-g ucontent udelbottomboder">
          <div class="am-u-lg-6">积分剩余：<span></span></div>
          <div class="am-u-lg-6">车牌号码：<span></span></div>
          <div class="am-u-lg-6">累计消费：<span></span></div>
          <div class="am-u-lg-6">生日：<span></span></div>
          <div class="am-u-lg-6">累计赠送：<span></span></div>
          <div class="am-u-lg-6">开卡店铺：<span></span></div>
          <div class="am-u-lg-12">到期时间：<span></span></div>
          <div class="am-u-lg-12">会员备注：<span></span></div>
        </div>
      </div>
      <div style="clear:both;"></div>
    </div>
    <div class="am-modal-footer ufoot">
      <div class="am-fl ua1">密码：<input type="password" name="card_password" class="am-form-field uinput uinput-160" ></div>
      <div class="am-btn-group">
        <button type="button" class="am-btn ubtn-sure ubtn-green ccardaddsubmit"><i class="iconfont icon-xiangyou2"></i>
          完成
        </button>
      </div>
    </div>
  </div>
</div>
<!-- 结账 -->
<div id="uworkbenchm2" class="am-modal" tabindex="-1">
  <div class="am-modal-dialog umodal">
    <div class="am-modal-hd uhead">结账
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd">
      <div class="utitle">付款金额</div>
      <div class="ucontent2">
        <div class="utext">应收金额：</div>
        <div class='umodal-text'>
          <input name="money" class="am-form-field umoneyinput" type="text">&nbsp;&nbsp;元
        </div>
        <label class="umodal-search">&nbsp;</label>
        <div class="utext">手动优惠：</div>
        <div class='umodal-text'>
          <input name="cash" class="am-form-field umoneyinput" type="text" placeholder="请输入金额">&nbsp;&nbsp;元
        </div>
      </div>
      <div class="gspace15"></div>
      <div class="am-g ucontent">
        <div class="am-u-lg-12">满减活动：满100减20元，满200减40元。</div>
        <div class="am-u-lg-12">满送活动：满100送10元券，满500送公仔。<span>共赠送公仔*3，公仔，公仔公仔公仔公仔公仔公仔公仔公仔公仔公仔公仔公仔公仔公仔公仔公仔公仔公仔公仔公仔公仔公仔公仔</span></div>
      </div>
      <div class="gspace5"></div>
      <div class="utitle">付款方式</div>
      <div class="am-btn-group ucontent3">
         <a class="am-btn am-btn-default upay upay-active" payType="1">现金</a>
         <a class="am-btn am-btn-default upay" payType="2">银行卡</a>
         <a class="am-btn am-btn-default upay" payType="3">微信支付</a>
         <a class="am-btn am-btn-default upay" payType="4">支付宝</a>
         <a class="am-btn am-btn-default upay" payType="5">卡扣</a>
      </div>
      <input type="hidden" name="card_id" value="">
    </div>
    <div class="am-modal-footer ufoot">
      <div class="am-fl ua1">实收金额：<span class="am-text-lg gtext-orange">23.20</span>元</div>
      <div class="am-fl ua2">
        <label class="am-checkbox">
          <input type="checkbox" value="" data-am-ucheck> 免单
        </label>
      </div>
      <div class="am-btn-group">
        <button type="button" class="am-btn ubtn-sure ubtn-green ccardrechargesubmit"><i class="iconfont icon-yuanxingxuanzhong"></i>
          完成
        </button>
      </div>
    </div>
  </div>
</div>

<script src="../js/jquery.min.js"></script>
<script src="../js/amazeui.min.js"></script>
<script type="text/javascript">
  $('.ccardsearch').on('click', function(){
    $('#uworkbenchm1').modal('open');
  })
  $('.cpayopen').on('click', function(){
    $('#uworkbenchm2').modal('open');
  })
  //付款方式
  $('.upay').on('click',function(){
    $(this).addClass('upay-active').siblings().removeClass('upay-active');
  });
</script>
</body>
</html>
