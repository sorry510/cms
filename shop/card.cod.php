<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>
<!-- content -->
<div class="gcontent" id="ucard">
  <ul class="am-nav am-nav-pills ubread">
	  <li class="am-active"><a href="javascript:void">会员管理</a></li>
	  <li><a href="#">过期会员</a></li>
	  <li><a href="#">回收站</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="utools">
    <form class="am-form-inline uform2" method="get">
      <div class="am-form-group">
        <label for="doc-ipt-3" class="am-form-label">卡类型：</label>
        <select class="uselect uselect-auto" data-am-selected name="card_type">
           <option value="all">全部</option>
           <option value="2">2</option>
           <option value="3">3</option>
        </select>
      </div>
      <div class="am-form-group">
        <label for="doc-ipt-3" class="am-form-label">搜索：</label>
        <input type="text" class="am-form-field uinput uinput-160" placeholder="卡号/手机号/姓名" name="search">
      </div>
      <div class="am-form-group">
        <button type="submit" class="am-btn ubtn-search csearch">
          <i class="iconfont icon-search"></i>查询
        </button>
      </div>
    </form>
    <button class="am-btn ubtn-sure ubtn-blue cmodelopen1">
      <i class="iconfont icon-xinzeng"></i>
      新增会员
    </button>
  </div>
  <div class="gspace15"></div>
  <?php foreach($this->_data['cards_list']['list'] as $row) { ?>
  <table class="am-table am-table-bordered am-table-hover am-table-compact utable1">
    <thead>
      <tr>
        <td>卡号</td>
        <td>姓名</td>
        <td>手机</td>
        <td>性别</td>
        <td>生日</td>
        <td>开卡时间</td>
    	<td>卡类型</td>
    	<td>折扣</td>
        <td>到期时间</td>
        <td>卡状态</td>
        <td>开卡店铺</td>
        <td>电子档案</td>
        <td>消费明细</td>
        <td>操作</td>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="coffopen" cardid="<?php echo $row['card_id']; ?>"><a href="javascript:;"><?php echo $row['card_code']; ?></a></td>
        <td class="coffopen" cardid="<?php echo $row['card_id']; ?>"><a href="javascript:;"><?php echo $row['card_name']; ?></a></td>
        <td><?php echo $row['card_phone']; ?></td>
        <td><?php echo $row['card_sex'] == '3' ? '保密' : ($row['card_sex'] == '1' ? '男':'女'); ?></td>
        <td><?php echo date("Y-m-d",$row['card_birthday']); ?></td>
        <td><?php echo date("Y-m-d",$row['card_atime']); ?></td>
        <td><?php echo $row['c_card_type_name']; ?></td>
        <td><span class="gtext-orange"><?php echo $row['c_card_type_discount']; ?></span>折</td>
        <td><?php echo date("Y-m-d",$row['card_edate']); ?></td>
        <td><?php echo $row['card_state']=='1'?'正常':'停用';; ?></td>
        <td>解放路分店</td>
        <td><a href="e-record.php">电子档案</a></td>
        <td><a href="#">消费明细</a></td>
        <td>
          <button class="am-btn ubtn-table ubtn-orange cmodelopen2" value="<?php echo $row['card_id']; ?>">
            <i class="iconfont icon-chongzhi"></i>
             充值
          </button>&nbsp;
          <button class="am-btn ubtn-table ubtn-orange cmodelopen3" value="<?php echo $row['card_id']; ?>">
            <i class="iconfont icon-liwu"></i>
            买套餐
          </button>&nbsp;
          <button class="am-btn ubtn-table ubtn-orange cmodelopen1-1" value="<?php echo $row['card_id']; ?>">
            <i class="iconfont icon-bianji"></i>
            修改
          </button>
        </td>
      </tr>
      <tr>
        <td colspan="15" class="utable-text">余额：<span class="gtext-orange">￥<?php echo $row['s_card_ymoney']; ?></span>，剩余积分：<span class="gtext-orange"><?php echo $row['s_card_score']; ?></span>，套餐余：【中医问诊(<span class="gtext-orange">5</span>次)，经络疏通-专家(<span class="gtext-orange">6</span>次)，艾灸(<span class="gtext-orange">6</span>次) ，到期时间：2017-12-15】</td>
      </tr>
      <tr>
        <td colspan="15" class="utable-text">累计消费：<span class="gtext-orange">10331</span>元，累计赠送：<span class="gtext-orange">568.8</span>元，累计积分：<span class="gtext-orange">89634</span>元</td>
      </tr>
    </tbody>
  </table>
  <div class="gspace15"></div>
  <?php }?>
  <ul class="am-pagination am-pagination-centered upages">
    <li class="upage-info">共<?php echo $this->_data['cards_list']['pagecount']; ?>页 <?php echo $this->_data['cards_list']['allcount']; ?>条记录</li>
    <li class="am-disabled"><a href="card.php?<?php echo api_value_query($this->_data['request'], $this->_data['cards_list']['pagepre']); ?>">&laquo;</a></li>
    <li><a class="am-active" href="#"><?php echo $GLOBALS['intpage'];?></a></li>
    <li><a href="card.php?<?php echo api_value_query($this->_data['request'], $this->_data['cards_list']['pagenext']); ?>">&raquo;</a></li>
  </ul>
</div>
<!-- 新增会员 -->
<div id="ucardm1" class="am-modal" tabindex="-1">
  <div class="am-modal-dialog umodal">
    <div class="am-modal-hd uhead">新增会员
      <a href="javascript:void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd">
      <form class="am-form" id="ccardinfoadd" enctype="multipart/form-data">
        <div class="utextbox">
          <span class="utextbox-title">会员基本信息</span>
            <div class="am-form-group">
              <label class="am-form-label umodal-label"><span class="gtext-orange">*</span>会员姓名：</label>
              <div class="umodal-normal">
                <input type="text" class="am-form-field uinput uinput-max" name="card_name">
              </div>
              <div class="umodal-search">&nbsp;</div>
              <label class="am-form-label umodal-label"><span class="gtext-orange">*</span>性别：</label>
              <div class="umodal-normal am-text-left">
                <label class="am-radio-inline">
                  <input type="radio" name="card_sex" value="1" data-am-ucheck checked> 男
                </label>
                <label class="am-radio-inline">
                  <input type="radio" name="card_sex" value="2" data-am-ucheck> 女
                </label>
                <label class="am-radio-inline">
                  <input type="radio" name="card_sex" value="3" data-am-ucheck> 保密
                </label> 
              </div>
              <label class="am-form-label umodal-label"><span class="gtext-orange">*</span>手机号码：</label>
              <div class="umodal-normal">
                <input type="text" class="am-form-field uinput uinput-max" name="card_phone">
              </div>
              <div class="umodal-search">&nbsp;</div>
              <label class="am-form-label umodal-label">出生日期：</label>
              <div class="umodal-normal">
                <div class="am-input-group am-datepicker-date udatepicker udatepicker-max" data-am-datepicker="{format:'yyyy-mm-dd'}">
                  <input type="text" class="am-form-field" name="card_birthday">
                  <span class="am-input-group-btn am-datepicker-add-on">
                    <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span></button>
                  </span>
                </div>
              </div>
              <label class="am-form-label umodal-label">启用密码：</label>
              <div class="umodal-normal am-text-left">
                <label class="am-radio-inline">
                  <input class="cispwd" type="radio" name="pwd_state" value="1" data-am-ucheck> 是
                </label>
                <label class="am-radio-inline">
                  <input class="cispwd" type="radio" name="pwd_state" value="2" data-am-ucheck checked> 否
                </label>
              </div>
              <div class="umodal-search">&nbsp;</div>
              <label class="am-form-label umodal-label">输入密码：</label>
              <div class="umodal-normal">
                <input type="password" name="card_password" class="am-form-field uinput uinput-max callow" disabled>
              </div>
            </div>
            <div class="am-form-file uphoto">
              <img id="cimg" src="../img/li.jpg">
              <a class="am-btn am-btn-gray am-btn-sm">
                <i class="am-icon-cloud-upload"></i> 点击上传</a>
              <input name="card_photo_file" id="doc-form-file" type="file" multiple>
            </div>
            <div style="clear:both;"></div>
        </div>
        <div class="utextbox">
          <span class="utextbox-title">会员卡信息</span>
            <div class="am-form-group">
              <label class="am-form-label umodal-label">会员卡号：</label>
              <div class="umodal-normal">
                <input type="text" name="card_code" class="am-form-field uinput uinput-max">
              </div>
              <div class="umodal-search">&nbsp;</div>
              <label class="am-form-label umodal-label">ID号：</label>
              <div class="umodal-normal">
                <input type="text" name="card_ikey" class="am-form-field uinput uinput-max">
              </div>
              <label class="am-form-label umodal-label">到期时间：</label>
              <div class="umodal-normal">
                <div class="am-input-group am-datepicker-date udatepicker udatepicker-max" data-am-datepicker="{format:'yyyy-mm-dd'}">
                  <input id="date1" type="text" name="card_edate" class="am-form-field">
                  <span class="am-input-group-btn am-datepicker-add-on">
                    <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span></button>
                  </span>
                </div>
              </div>
            </div>
            <div style="clear:both;"></div>
        </div>
        <div class="utextbox">
          <span class="utextbox-title">更多会员信息</span>
            <div class="am-form-group">
              <label class="am-form-label umodal-label">身份证号：</label>
              <div class="umodal-normal">
                <input type="text" name="card_identity" class="am-form-field uinput uinput-max">
              </div>
              <div class="umodal-search">&nbsp;</div>
              <label class="am-form-label umodal-label">车牌：</label>
              <div class="umodal-normal">
                <input type="text" name="card_car_id" class="am-form-field uinput uinput-max">
              </div>
              <label class="am-form-label umodal-label">联系人：</label>
              <div class="umodal-normal">
                <input type="text" name="card_linkman" class="am-form-field uinput uinput-max">
              </div>
              <div class="umodal-search">&nbsp;</div>
              <label class="am-form-label umodal-label">服务员：</label>
              <div class="umodal-normal">
                <select name="card_waiter" class="uselect uselect-max" data-am-selected>
                  <option value="a">Apple</option>
                  <option value="b">Banana</option>
                  <option value="o">Orange</option>
                  <option value="m">Mango</option>
                  <option value="d">禁用</option>
                </select>
              </div>
              <label class="am-form-label umodal-label">备注：</label>
              <div class="umodal-max">
               <input type="text" name="card_memo" class="am-form-field uinput uinput-max">
              </div>
              <div style="clear:both;"></div>
            </div>
            <div style="clear:both;"></div>
        </div>
      </form>
    </div>
    <div class="am-modal-footer ufoot">
      <div class="am-btn-group">
        <button type="button" class="am-btn ubtn-sure ubtn-green ccardaddsubmit"><i class="iconfont icon-xiangyou2"></i>
          完成
        </button>
      </div>
    </div>
  </div>
</div>
<!-- 修改会员 -->
<div id="ucardm1-1" class="am-modal" tabindex="-1">
  <div class="am-modal-dialog umodal">
    <div class="am-modal-hd uhead">修改会员
      <a href="javascript:void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd">
      <form class="am-form" id="ccardinfoedit" enctype="multipart/form-data">
        <div class="utextbox">
          <span class="utextbox-title">会员基本信息</span>
            <div class="am-form-group">
              <label class="am-form-label umodal-label"><span class="gtext-orange">*</span>会员姓名：</label>
              <div class="umodal-normal">
                <input type="text" class="am-form-field uinput uinput-max" name="card_name" value="">
              </div>
              <div class="umodal-search">&nbsp;</div>
              <label class="am-form-label umodal-label"><span class="gtext-orange">*</span>性别：</label>
              <div class="umodal-normal am-text-left">
                <label class="am-radio-inline">
                  <input type="radio" name="card_sex" value="1" data-am-ucheck> 男
                </label>
                <label class="am-radio-inline">
                  <input type="radio" name="card_sex" value="2" data-am-ucheck> 女
                </label>
                <label class="am-radio-inline">
                  <input type="radio" name="card_sex" value="3" data-am-ucheck> 保密
                </label> 
              </div>
              <label class="am-form-label umodal-label"><span class="gtext-orange">*</span>手机号码：</label>
              <div class="umodal-normal">
                <input type="text" class="am-form-field uinput uinput-max" name="card_phone">
              </div>
              <div class="umodal-search">&nbsp;</div>
              <label class="am-form-label umodal-label">出生日期：</label>
              <div class="umodal-normal">
                <div class="am-input-group am-datepicker-date udatepicker udatepicker-max" data-am-datepicker="{format:'yyyy-mm-dd'}">
                  <input type="text" class="am-form-field" name="card_birthday">
                  <span class="am-input-group-btn am-datepicker-add-on">
                    <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span></button>
                  </span>
                </div>
              </div>
              <label class="am-form-label umodal-label">启用密码：</label>
              <div class="umodal-normal am-text-left">
                <label class="am-radio-inline">
                  <input class="cispwd" type="radio" name="pwd_state" value="1" data-am-ucheck> 是
                </label>
                <label class="am-radio-inline">
                  <input class="cispwd" type="radio" name="pwd_state" value="2" data-am-ucheck> 否
                </label>
              </div>
              <div class="umodal-search">&nbsp;</div>
              <label class="am-form-label umodal-label">输入密码：</label>
              <div class="umodal-normal">
                <input type="password" name="card_password" class="am-form-field uinput uinput-max callow" disabled>
              </div>
            </div>
            <div class="am-form-file uphoto">
              <img id="cimg" src="../img/li.jpg">
              <a class="am-btn am-btn-gray am-btn-sm">
                <i class="am-icon-cloud-upload"></i> 点击上传</a>
              <input name="card_photo_file" id="doc-form-file" type="file" multiple>
            </div>
            <div style="clear:both;"></div>
        </div>
        <div class="utextbox">
          <span class="utextbox-title">会员卡信息</span>
            <div class="am-form-group">
              <label class="am-form-label umodal-label">会员卡号：</label>
              <div class="umodal-normal">
                <input type="text" name="card_code" class="am-form-field uinput uinput-max">
              </div>
              <div class="umodal-search">&nbsp;</div>
              <label class="am-form-label umodal-label">ID号：</label>
              <div class="umodal-normal">
                <input type="text" name="card_ikey" class="am-form-field uinput uinput-max">
              </div>
              <label class="am-form-label umodal-label">到期时间：</label>
              <div class="umodal-normal">
                <div class="am-input-group am-datepicker-date udatepicker udatepicker-max" data-am-datepicker="{format:'yyyy-mm-dd'}">
                  <input id="date1" type="text" name="card_edate" class="am-form-field">
                  <span class="am-input-group-btn am-datepicker-add-on">
                    <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span></button>
                  </span>
                </div>
              </div>
            </div>
            <div style="clear:both;"></div>
        </div>
        <div class="utextbox">
          <span class="utextbox-title">更多会员信息</span>
            <div class="am-form-group">
              <label class="am-form-label umodal-label">身份证号：</label>
              <div class="umodal-normal">
                <input type="text" name="card_identity" class="am-form-field uinput uinput-max">
              </div>
              <div class="umodal-search">&nbsp;</div>
              <label class="am-form-label umodal-label">车牌：</label>
              <div class="umodal-normal">
                <input type="text" name="card_car_id" class="am-form-field uinput uinput-max">
              </div>
              <label class="am-form-label umodal-label">联系人：</label>
              <div class="umodal-normal">
                <input type="text" name="card_linkman" class="am-form-field uinput uinput-max">
              </div>
              <div class="umodal-search">&nbsp;</div>
              <label class="am-form-label umodal-label">服务员：</label>
              <div class="umodal-normal">
                <select name="card_waiter" class="uselect uselect-max" data-am-selected>
                  <option value="a">Apple</option>
                  <option value="b">Banana</option>
                  <option value="o">Orange</option>
                  <option value="m">Mango</option>
                  <option value="d">禁用</option>
                </select>
              </div>
              <label class="am-form-label umodal-label">备注：</label>
              <div class="umodal-max">
               <input type="text" name="card_memo" class="am-form-field uinput uinput-max">
              </div>
              <div style="clear:both;"></div>
            </div>
            <div style="clear:both;"></div>
        </div>
        <input type="hidden" name="type" value="edit">
        <input type="hidden" name="card_id" value="">
      </form>
    </div>
    <div class="am-modal-footer ufoot">
      <div class="am-btn-group">
        <button type="button" class="am-btn ubtn-sure ubtn-green ccardeditsubmit"><i class="iconfont icon-xiangyou2"></i>
          完成
        </button>
      </div>
    </div>
  </div>
</div>
<!-- 会员充值 -->
<div id="ucardm2" class="am-modal" tabindex="-1">
  <div class="am-modal-dialog umodal">
    <div class="am-modal-hd uhead">会员充值
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd">
      <div class="am-g ucontent">
        <div class="am-u-lg-4">会员卡号：<span class="ccard_code"></span></div>
        <div class="am-u-lg-4">会员姓名：<span class="ccard_name"></span></div>
        <div class="am-u-lg-4">手机号码：<span class="ccard_phone"></span></div>
        <div class="am-u-lg-4">卡余额：<span class="am-text-lg gtext-orange ccard_ymoney"></span>元</div>
        <div class="am-u-lg-4">会员卡类型：
          <select data-am-selected class="uselect uselect-auto ccard_type" name="card_type">
          <?php foreach($this->_data['card_type_list'] as $row) { ?>
            <option value="<?php echo $row['card_type_id']."_".$row['card_type_name']."_".$row['card_type_discount'];?>"><?php echo $row['card_type_name']; ?></option>
          <? }?>
          </select>
        </div>
        <div class="am-u-lg-4">会员折扣：<span class="am-text-lg gtext-orange ccard_type_discount"></span>折</div>
      </div>
      <div class="gspace15"></div>
      <div class="utitle">充值金额</div>
      <div class="ucontent2">
        <div class="utext">充值金额：</div>
        <div class='umodal-text'>
          <input name="money" class="am-form-field umoneyinput" type="text" placeholder="请输入金额">&nbsp;&nbsp;元
        </div>
        <label class="umodal-search">&nbsp;</label>
        <div class="utext">实收金额：</div>
        <div class='umodal-text'>
          <input name="cash" class="am-form-field umoneyinput" type="text" placeholder="0.0">&nbsp;&nbsp;元
        </div>
      </div>
      <div class="gspace15"></div>
      <div class="utitle">付款方式</div>
      <div class="am-btn-group ucontent3">
         <a class="am-btn am-btn-default upay" role="button">现金</a>
         <a class="am-btn am-btn-default upay" role="button">银行卡</a>
         <a class="am-btn am-btn-default upay" role="button">微信支付</a>
         <a class="am-btn am-btn-default upay upay-active" role="button">支付宝</a>
      </div>
      <input type="hidden" name="card_id" value="">
    </div>
    <div class="am-modal-footer ufoot">
      <div class="ua1">充值总额：<span class="am-text-lg gtext-orange">0.00</span>元,赠送总额<span class="am-text-lg gtext-orange">0.00</span>元</div>
      <div class="ua2">
        <label class="am-checkbox">
          <input type="checkbox" value="" data-am-ucheck> 打印充值单
        </label>
      </div>
      <div class="am-btn-group">
        <button type="button" class="am-btn ubtn-sure ubtn-green cmodelopen3"><i class="iconfont icon-liwu"></i>
          买套餐
        </button>
        <button type="button" class="am-btn ubtn-sure ubtn-green ccardrechargesubmit"><i class="iconfont icon-yuanxingxuanzhong"></i>
          完成
        </button>
      </div>
    </div>
  </div>
</div>
<!-- 购买套餐 -->
<div id="ucardm3" class="am-modal" tabindex="-1">
  <div class="am-modal-dialog umodal">
    <div class="am-modal-hd uhead">购买套餐
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd">
      <div class="am-g ucontent" style="margin:0 2%; width:95%;">
        <div class="am-u-lg-4">会员卡号：1000125</div>
        <div class="am-u-lg-4">会员姓名：张三</div>
        <div class="am-u-lg-4">手机号码：3700824417</div>
        <div class="am-u-lg-4">卡余额：<span class="am-text-lg gtext-orange">0.00</span>元</div>
        <div class="am-u-lg-4">会员卡类型：打折卡</div>
        <div class="am-u-lg-4 am-u-end">会员折扣：<span class="am-text-lg gtext-orange">8</span>折</div>
      </div>
      <div class="gspace10"></div>
      <div class="am-tabs uleft" data-am-tabs="{noSwipe:1}">
        <ul class="am-tabs-nav am-nav am-nav-tabs">
          <li class="am-active"><a href="#tab1">添加套餐</a></li>
          <li><a href="#tab2">扫码添加套餐</a></li>
        </ul>
        <div class="am-tabs-bd">
          <div class="am-tab-panel am-active" id="tab1">
            <div class="ua"><span class="ua1">分类/名称</span><span class="ua2">操作</span></div>
            <div class="am-form-group ub">
              <div class="ub1">
                <select class="uselect2 uselect-max" data-am-selected>
                  <option value="a">aaa</option>
                  <option value="b">Banana</option>
                  <option value="o">Orange</option>
                  <option value="d">禁用</option>
                </select>
              </div>
              <div class="ub1">
                <input id="" class="am-form-field uinput2 uinput2-max" type="text" placeholder="">
              </div>
              <div class="ub2">
                <button type="button" class="am-btn ubtn-search3 ubtn-green">
                  <i class="iconfont icon-search"></i>
                  查询
                </button>
              </div>
            </div>
            <ul class="uc">
              <li class="uc2">
                <div class="uc2a">基础套餐（138元）基础套餐包含针灸，理疗，足疗，等各项10次</div>
                <div class="uc2b cadd"><a href="#">添加</a></div>
              </li>
              <li class="uc2">
                <div class="uc2a">vip至尊套餐（6638元）</div>
                <div class="uc2b cadd"><a href="#">添加</a></div>
              </li>
              <li class="uc2">
                <div class="uc2a">中秋大礼包（888元）</div>
                <div class="uc2b cadd"><a href="#">添加</a></div>
              </li>
              <li class="uc2">
                <div class="uc2a">端午大酬宾（666元）</div>
                <div class="uc2b cadd"><a href="#">添加</a></div>
              </li>

              <li class="uc2">
                <div class="uc2a">美丽人生（12306元）</div>
                <div class="uc2b cadd"><a href="#">添加</a></div>
              </li>              
            </ul>
          </div>
          <div class="am-tab-panel am-fade" id="tab2" style="height:370px;">
            <div class="gspace50"></div>
            <div class="gspace50"></div>
            <div>
              <div class="umodal-normal" style="width:180px; margin:0px 5% 0px 15%;">
                <input id="" class="am-form-field uinput uinput-max" type="text" placeholder="条码枪扫码或手动输入">
              </div>           
              <button type="button" class="am-btn ubtn-search2 ubtn-green usearch" style="width:80px;">
                添加
              </button>
            </div>
          </div>
        </div>
      </div>
      <div class="uright">
        <div class="ua">已选择套餐<span style="float:right;">（数量为0代表不限数量）</span></div>
        <ul class="ub">
          <li class="ub1">名称</li>
          <li class="ub2">数量</li>
          <li class="ub3">操作</li>
        </ul>
        <ul class="uc">
          <li>
            <div class="uc1">基础套餐</div>
            <div class="uc2">
              <a href="javascript:;" class="uc2a cbtndec"><i class="am-icon-minus"></i></a>
              <input type="text" name="" class="uinput2 uinput-35" value="0">
              <a href="javascript:;" class=" uc2b cbtnplus"><i class="am-icon-plus"></i></a>
            </div>
            <div class="uc3 cdel2"><a href="javascript:;">移除</a></div>
          </li>
        </ul>
      </div>
      <div style="clear:both;"></div>
    </div>
    <div class="am-modal-footer ufoot">
          <div class="utext1">共 2 件，共计:<span class="am-text-lg gtext-orange">126</span>元</div>
          <div class="am-btn-group">
            <button type="button" class="am-btn ubtn-sure ubtn-green cmodelopen4"><i class="iconfont icon-xiangyou2"></i>
              下一步
            </button>
          </div>  
    </div>
   
  </div>
</div>
<!-- 购买完成 -->
<div id="ucardm4" class="am-modal" tabindex="-1">
  <div class="am-modal-dialog umodal">
    <div class="am-modal-hd uhead">购买套餐
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd">
      <div class="am-g ucontent">
        <div class="am-u-lg-4">会员卡号：1000125</div>
        <div class="am-u-lg-4">会员姓名：张三</div>
        <div class="am-u-lg-4">手机号码：3700824417</div>
        <div class="am-u-lg-4">余额：<span class="am-text-lg gtext-orange">0.00</span>元</div>
        <div class="am-u-lg-4">会员卡类型：打折卡</div>
        <div class="am-u-lg-4 am-u-end">会员折扣：<span class="am-text-lg gtext-orange">8</span>折</div>
      </div>
      <div class="gspace15"></div>
      <div class="am-scrollable-vertical" style="max-height:150px;margin:0 4%;">
        <table class="am-table am-table-bordered am-table-centered am-table-hover am-table-compact utable1" style="width:100%;">
          <thead>
            <tr>
              <td>套餐名称</td>
              <td>内容</td>
              <td>单价</td>
              <td>数量</td>
              <td>操作</td>
            </tr>
          </thead>
          <tbody>
              <tr>
                  <td>基础套餐</td>
                  <td>理疗6次，颈肩理疗10次，艾灸30次，其它赠送10次</td>
                  <td><span class="gtext-orange">￥998</span></td>   
                  <td><a href="javascript:;" class="uc2a cbtndec"><i class="am-icon-minus"></i></a>
              <input type="text" name="" class="uinput2 uinput-35" value="0">
              <a href="javascript:;" class=" uc2b cbtnplus"><i class="am-icon-plus"></i></a></td>
                  <td><a href="javascript:;" class="am-text-primary cdel">移除</a></td>
              </tr>
              <tr>
                  <td>健康丽人</td>
                  <td>理疗6次，颈肩理疗10次，艾灸30次，其它赠送10次</td>
                  <td><span class="gtext-orange">￥8888</span></td>
                  <td><a href="javascript:;" class="uc2a cbtndec"><i class="am-icon-minus"></i></a>
              <input type="text" name="" class="uinput2 uinput-35" value="0">
              <a href="javascript:;" class=" uc2b cbtnplus"><i class="am-icon-plus"></i></a></td>
                  <td><a href="javascript:;" class="am-text-primary cdel">移除</a></td>
              </tr>
              <tr>
                  <td>套餐3</td>
                  <td>理疗6次，颈肩理疗10次，艾灸30次，其它赠送10次</td>
                  <td><span class="gtext-orange">￥688</span></td>
                  <td><a href="javascript:;" class="uc2a cbtndec"><i class="am-icon-minus"></i></a>
              <input type="text" name="" class="uinput2 uinput-35" value="0">
              <a href="javascript:;" class=" uc2b cbtnplus"><i class="am-icon-plus"></i></a></td>
                  <td><a href="javascript:;" class="am-text-primary cdel">移除</a></td>
              </tr>
              <tr>
                  <td>套餐3</td>
                  <td>理疗6次，颈肩理疗10次，艾灸30次，其它赠送10次</td>
                  <td><span class="gtext-orange">￥688</span></td>
                  <td><a href="javascript:;" class="uc2a cbtndec"><i class="am-icon-minus"></i></a>
              <input type="text" name="" class="uinput2 uinput-35" value="0">
              <a href="javascript:;" class=" uc2b cbtnplus"><i class="am-icon-plus"></i></a></td>
                  <td><a href="javascript:;" class="am-text-primary cdel">移除</a></td>
              </tr>
              <tr>
                  <td>套餐3</td>
                  <td>理疗6次，颈肩理疗10次，艾灸30次，其它赠送10次</td>
                  <td><span class="gtext-orange">￥688</span></td>
                  <td><a href="javascript:;" class="uc2a cbtndec"><i class="am-icon-minus"></i></a>
              <input type="text" name="" class="uinput2 uinput-35" value="0">
              <a href="javascript:;" class=" uc2b cbtnplus"><i class="am-icon-plus"></i></a></td>
                  <td><a href="javascript:;" class="am-text-primary cdel">移除</a></td>
              </tr>
              <tr>
                  <td>套餐3</td>
                  <td>理疗6次，颈肩理疗10次，艾灸30次，其它赠送10次</td>
                  <td><span class="gtext-orange">￥688</span></td>
                  <td><a href="javascript:;" class="uc2a cbtndec"><i class="am-icon-minus"></i></a>
              <input type="text" name="" class="uinput2 uinput-35" value="0">
              <a href="javascript:;" class=" uc2b cbtnplus"><i class="am-icon-plus"></i></a></td>
                  <td><a href="javascript:;" class="am-text-primary cdel">移除</a></td>
              </tr>
          </tbody>
        </table>
      </div>
      <div class="utitle">付款金额</div>
      <div class="ucontent2">
        <div class="utext">应付金额：</div>
        <div class='umodal-text'>
          <input id="" class="am-form-field umoneyinput" type="text" placeholder="请输入金额">&nbsp;&nbsp;元
        </div>
        <label class="umodal-search">&nbsp;</label>
        <div class="utext">手动优惠：</div>
        <div class='umodal-text'>
          <input id="" class="am-form-field umoneyinput" type="text" placeholder="0.0">&nbsp;&nbsp;元
        </div>
      </div>
      <div class="utitle">付款方式</div>
      <div class="am-btn-group ucontent3">
         <a class="am-btn am-btn-default upay" role="button">现金</a>
         <a class="am-btn am-btn-default upay" role="button">银行卡</a>
         <a class="am-btn am-btn-default upay" role="button">微信支付</a>
         <a class="am-btn am-btn-default upay upay-active" role="button">支付宝</a>
      </div>
    </div>
    <div class="am-modal-footer ufoot">
      <div class="ufootleft am-text-left">
        <div>
          <label class="am-checkbox">
            <input type="checkbox" value="" data-am-ucheck> 免单
          </label>
        </div>
        <div class="am-text-secondary"><i class="icon iconfont icon-dayin"></i> 预打账单</div>
        <div>合计：<span class="am-text-lg gtext-orange">126</span>元，折扣：<span class="am-text-lg gtext-orange">8</span>折，实收金额：<span class="am-text-lg gtext-orange">126</span>元
        </div>
      </div>
      <div class="am-btn-group">
        <button type="button" class="am-btn ubtn-sure ubtn-green cmodelopen3up"><i class="iconfont icon-xiangyou2"></i>
          上一步
        </button>
        <button type="button" class="am-btn ubtn-sure ubtn-green"><i class="iconfont icon-yuanxingxuanzhong"></i>
          完成
        </button>
      </div>
    </div>
  </div>
</div>
<!-- 确认密码 -->
<div id='upwd-alert' class="am-modal am-modal-alert" tabindex="-1">
  <div class="am-modal-dialog">
    <div class="am-modal-hd">请输入会员卡密码</div>
    <div class="am-modal-bd">
      <div class="am-form-group" style="padding:10px 20px 0 20px;">
         <input type="text" class="am-form-field uinput uinput-max">
      </div>
    </div>
    <div class="am-modal-footer">
      <span class="am-modal-btn cpwd-btn">确定</span>
    </div>
  </div>
</div>
<!-- 侧拉框 -->
<div id="ucardoff1" class="am-offcanvas">
  <div class="am-offcanvas-bar am-offcanvas-bar-flip uoffcanvas">
    <div class="am-offcanvas-content" >
      <div class="am-modal-hd"><span class="utitle">会员明细</span>
        <a href="javascript: void(0)" class="am-close am-close-spin uclose2 coffcanvas1" data-rel="close"><img src="../img/close.jpg"></a>
      </div>
      <div class="gspace15"></div>
      <div class="am-g">
        <div class="am-u-lg-6">会员姓名：<span class="ccard_name">张三</span></div>
        <div class="am-u-lg-6">手机号码：<span class="ccard_phone">3700824417</span></div>
        <div class="am-u-lg-6">会员卡号：<span class="ccard_code">a123212</span></div>
        <div class="am-u-lg-6">性别：<span class="ccard_sex">男</span></div>
        <div class="am-u-lg-6">出生日期：<span class="ccard_birthday">1992-04-20</span></div>
        <div class="am-u-lg-6">到期时间：<span class="ccard_edate">2017-06-20</span></div>
        <div class="am-u-lg-6">联系地址：<span class="ccard_address">无</span></div>
        <div class="am-u-lg-6">余额：<font class="gtext-orange ccard_ymoney">0.00</font><span>元</span></div>
        <div class="am-u-lg-12">备注：<span class="ccard_memo">无</span></div>
        <div class="am-u-lg-12"></div>
        <div>
          <button class="am-btn ubtn-sure ubtn-gray ubutton1 ccarddel">
            <i class="iconfont icon-shanchu"></i>
            删除
          </button>
          <button class="am-btn ubtn-sure ubtn-red ubutton2">
          </button>
        </div>
        <input type="hidden" name="card_id" value="">
      </div>
    </div>
  </div>
</div>

<script src="../js/jquery.min.js"></script>
<script src="../js/amazeui.min.js"></script>
<script type="text/javascript">
$(function() {
    //分页首末页不可选中
    if(<?php echo $GLOBALS['intpage'];?>>1){
      $('.upages li').eq(1).removeClass('am-disabled');
    }
    if(<?php echo $this->_data['cards_list']['pagecount']-$GLOBALS['intpage']; ?><1){

      $('.upages li').last().addClass('am-disabled');
    }
    //新增会员
    $('.cmodelopen1').on('click', function(e) {
      $('#ucardm1').modal('open');
      $('#ucardm1 input').eq(0).focus();
    });
    //是否启用密码
    $('.cispwd').on('click',function(){
      if($(this).val()==1){
        $('.callow').attr('disabled',false);
      }else{
        $('.callow').attr('disabled',true);
      }
    });
    //card新增提交信息
    $('.ccardaddsubmit').on('click',function(){
      var url="card_add_do.php";
      var data = $("#ccardinfoadd").serialize();
      $.post(url,data,function(res){
        if(res=='0'){
          // window.location.reload();
          window.location.href='card.php';
        }else{
          alert('添加失败');
          // console.log(res);
        }
      });
    });
    //会员修改
    $('.cmodelopen1-1').on('click', function(e) {
      var url = "card_edit_do.php";
      // console.log($(this).val());
      $.getJSON(url,{card_id:$(this).val(),type:"show"},function(res){
        console.log(res);
        $("#ucardm1-1 input[name='card_name']").val(res.card_name);
        $("#ucardm1-1 input[name='card_code']").val(res.card_code);
        $("#ucardm1-1 input[name='card_phone']").val(res.card_phone);
        $("#ucardm1-1 input[name='card_birthday']").val(res.card_birthday);
        $("#ucardm1-1 input[name='card_password']").val(res.card_password);
        $("#ucardm1-1 input[name='card_edate']").val(res.card_edate);
        $("#ucardm1-1 input[name='card_identity']").val(res.card_identity);
        $("#ucardm1-1 input[name='card_memo']").val(res.card_memo);
        $("#ucardm1-1 input[name='card_id']").val(res.card_id);
        $("#ucardm1-1 input[name='pwd_state']").each(function(){
          if($(this).val()==res.card_password_state){
            $(this).attr('checked',true);
          }
        });
        if(res.card_password_state==1){
          $('.callow').attr('disabled',false);
        }else{
          $('.callow').attr('disabled',true);
        }
        $("#ucardm1-1 input[name='card_sex']").each(function(){
          if($(this).val()==res.card_sex){
            $(this).attr('checked',true);
          }
        });
      });
      $('#ucardm1-1').modal('open');
      $('#ucardm1-1 input').eq(0).focus();
    });
    // card修改提交信息
    $('.ccardeditsubmit').on('click',function(){
      var url="card_edit_do.php";
      var data = $("#ccardinfoedit").serialize();
      $.post(url,data,function(res){
        if(res=='0'){
          window.location.reload();
        }else{
          alert('修改失败');
          console.log(res);
        }
      });
    });
    //会员充值
    $('.cmodelopen2').on('click', function() {
      var url = "card_recharge_do.php";
      $.getJSON(url,{card_id:$(this).val(),type:"show"},function(res){
        console.log(res);
        $("#ucardm2 .ccard_name").text(res.card_name);
        $("#ucardm2 .ccard_code").text(res.card_code);
        $("#ucardm2 .ccard_phone").text(res.card_phone);
        $("#ucardm2 .ccard_birthday").text(res.card_birthday);
        $("#ucardm2 .ccard_edate").text(res.card_edate);
        $("#ucardm2 .ccard_memo").text(res.card_memo);
        $("#ucardm2 .ccard_ymoney").text(res.s_card_ymoney);
        $("#ucardm2 .ccard_type_discount").text(res.c_card_type_discount);
        $("#ucardm2 input[name='card_id']").val(res.card_id);
        if(res.c_card_type_name!=''){
          $("#ucardm2 .ccard_type").prepend("<option value='"+res.card_type_id+"_"+res.c_card_type_name+"_"+res.c_card_type_discount+"' selected>"+res.c_card_type_name+"</option>");
        }
      });
      $('#ucardm2').modal('open');
      $('#ucardm2 input').eq(0).focus();
    });
    //改变会员卡折扣
    $('#ucardm2 .ccard_type').on('change',function(){
      var arr = $(this).val().split("_");
      $("#ucardm2 .ccard_type_discount").text(arr[2]);
    })
    //会员充值提交
    $('.ccardrechargesubmit').on('click',function(){
      var url="card_recharge_do.php";
      var card_id = $("#ucardm2 input[name='card_id']").val();
      var money = $("#ucardm2 input[name='money']").val();
      var cash = $("#ucardm2 input[name='cash']").val();
      var strtypeinfo = $("#ucardm2 .ccard_type").val();
      var arrtypeinfo = strtypeinfo.split("_");
      var card_type_id = arrtypeinfo[0];
      var card_type_name = arrtypeinfo[1];
      var card_type_discount = arrtypeinfo[2];
      var data = {
            type:'edit',
            money:money,
            cash:cash,
            card_id:card_id,
            card_type_id:card_type_id,
            card_type_name:card_type_name,
            card_type_discount:card_type_discount
          }
      $.post(url,data,function(res){
        if(res=='0'){
          window.location.reload();
        }else{
          alert('修改失败');
          console.log(res);
        }
      });
    });
    //购买套餐
    $('.cmodelopen3').on('click', function(e) {
            $('#ucardm2').modal('close');
            if(true){
              // 有会员卡密码
              $('#upwd-alert').modal('open');
            }else{
              // 无密码
              $('#ucardm3').modal('open');
              $('#ucardm3 input').eq(0).focus();
            }
            
    });
    // 返回上一步
    $('.cmodelopen3up').on('click', function(e) {
      $('#ucardm4').modal('close');
      $('#ucardm3').modal('open');
      $('#ucardm3 input').eq(0).focus();
    });
    // 确认密码
    $('.cpwd-btn').on('click', function(e) {
            if(true){
              // 密码正确
              $('#ucardm3').modal('open');
              $('#ucardm3 input').eq(0).focus();
            }else{
              // 密码错误
              return 0;
            }
            
    });
     //购买套餐完成
    $('.cmodelopen4').on('click', function(e) {
            $('#ucardm3').modal('close');
            $('#ucardm4').modal('open');
    });
    // + -
    $(document).on("click", ".cbtndec", function() {
      var _self= $(this).siblings('input');
      if(parseInt(_self.val())>=1)
        _self.val(parseInt(_self.val())-1);
    });
    $(document).on("click", ".cbtnplus", function() {
      var _self= $(this).siblings('input');
      _self.val(parseInt(_self.val())+1);
    });

    // 添加
    $('.cadd').on('click', function(){
      var product = $(this).prev().text();
      var addhtml ='<li><div class="ub1">'+product+'</div><div class="ub2"><a href="javascript:;" class="ufont1 cbtndec"><i class="am-icon-minus"></i></a>&nbsp;<input id="" class="am-form-field uinput uinput-max" type="text" placeholder="" value="0">&nbsp;<a href="javascript:;" class="ufont1 cbtnplus"><i class="am-icon-plus"></i></a></div><div class="ub3 cdel2"><a href="javascript:;">移除</a></div></li>';
      $(".uright .ub").append(addhtml);
    });
    //侧拉打开
    $('.coffopen').on('click', function() {
      // console.log($(this).attr('cardid'));
      var url = "card_edit_do.php";
      $.getJSON(url,{card_id:$(this).attr('cardid'),type:"show"},function(res){
        $("#ucardoff1 .ccard_name").text(res.card_name);
        $("#ucardoff1 .ccard_code").text(res.card_code);
        $("#ucardoff1 .ccard_phone").text(res.card_phone);
        $("#ucardoff1 .ccard_birthday").text(res.card_birthday);
        $("#ucardoff1 .ccard_edate").text(res.card_edate);
        $("#ucardoff1 .ccard_memo").text(res.card_memo);
        $("#ucardoff1 input[name='card_id']").val(res.card_id);
        switch(res.card_sex)
        {
          case '1':
            $("#ucardoff1 .ccard_sex").text('男');
            break;
          case '2':
            $("#ucardoff1 .ccard_sex").text('女');
            break;
          default :
            $("#ucardoff1 .ccard_sex").text('保密');
        }
        if(res.card_state=='1'){
          $("#ucardoff1 .ubutton2").removeClass('ccardnormal').addClass('ccardstop').html('<i class="iconfont icon-tingyong"></i> 停用');
        }else{
          $("#ucardoff1 .ubutton2").removeClass('ccardstop').addClass('ccardnormal').html('<i class="iconfont icon-question"></i> 启用');
        }
      });
      $('#ucardoff1').offCanvas('open');
    });
    //侧拉停用card
    $(document).on("click",".ccardstop",function(){
      var url = 'card_state_do.php';
      var data ={
          type:'stop',
          card_id:$("#ucardoff1 input[name='card_id']").val()
      }
      $.post(url,data,function(res){
        if(res=='0'){
          window.location.reload();
        }else{
          alert('停用失败');
          // console.log(res);
        }
      });
    });
    //侧拉重新启用card
    $(document).on("click",".ccardnormal",function(){
      var url = 'card_state_do.php';
      var data ={
          type:'normal',
          card_id:$("#ucardoff1 input[name='card_id']").val()
      }
      $.post(url,data,function(res){
        if(res=='0'){
          window.location.reload();
        }else{
          alert('启用失败');
          // console.log(res);
        }
      });
    });
    //侧拉删除card
    $('.ccarddel').on('click',function(){   
      var url = 'card_state_do.php';
      var data ={
          type:'del',
          card_id:$("#ucardoff1 input[name='card_id']").val()
      }
      $.post(url,data,function(res){
        if(res=='0'){
          window.location.reload();
        }else{
          alert('删除失败');
          // console.log(res);
        }
      });
    });
    //侧拉关闭
    $('.coffcanvas1').on('click', function() {
      $('#ucardoff1').offCanvas('close');
    });
    //侧拉去掉禁止选中
    $('.goffcanvas').parent().on('open.offcanvas.amui', function() {
      $(this).css('user-select','');
    });
    $('#doc-form-file').on('change',showPreview);
    //上传文件
    function showPreview() {  
        var file = this.files[0];
        console.log(file);
        if(window.FileReader) {
            var fr = new FileReader();
            fr.onloadend = function(e) {
              $("#cimg").attr('src',e.target.result);
              // document.getElementById("portrait").src = e.target.result;
            } 
            fr.readAsDataURL(file);
        }
    }
    //删除
    $(document).on("click",".cdel2",function(){
        $(this).parent().remove();
    });
    $(document).on("click",".cdel",function(){
        $(this).parent().parent().remove();
    });
   
});
</script>
</body>
</html>