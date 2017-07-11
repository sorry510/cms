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
        <option value="0">全部</option>
        <?php foreach($this->_data['card_type_list'] as $row) { ?>
           <option value="<?php echo $row['card_type_id'];?>" <?php if($row['card_type_id']==$this->_data['request']['card_type']) echo "selected";?>><?php echo $row['card_type_name'];?></option>
        <?php }?>
        </select>
      </div>
      <div class="am-form-group">
        <label for="doc-ipt-3" class="am-form-label">搜索：</label>
        <input type="text" class="am-form-field uinput uinput-160" placeholder="卡号/手机号/姓名" name="search" value="<?php echo $this->_data['request']['search'];?>">
      </div>
      <div class="am-form-group">
        <button type="submit" class="am-btn ubtn-search csearch">
          <i class="iconfont icon-search"></i>查询
        </button>
      </div>
    </form>
    <button class="am-btn ubtn-sure ubtn-blue cmodalopen1">
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
          <button class="am-btn ubtn-table ubtn-orange cmodalopen2" value="<?php echo $row['card_id']; ?>">
            <i class="iconfont icon-chongzhi"></i>
             充值
          </button>&nbsp;
          <button class="am-btn ubtn-table ubtn-orange cmodalopen3" value="<?php echo $row['card_id']; ?>">
            <i class="iconfont icon-liwu"></i>
            买套餐
          </button>&nbsp;
          <button class="am-btn ubtn-table ubtn-orange cmodalopen1-1" value="<?php echo $row['card_id']; ?>">
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
    <li class="am-active"><a href="#"><?php echo $GLOBALS['intpage'];?></a></li>
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
                <?php foreach($this->_data['worker_list'] as $row) { ?>
                  <option value="<?php echo $row['worker_id'];?>"><?php echo $row['worker_name'];?></option>
                <?php }?>
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
              <label class="am-form-label umodal-label"></label>
              <div class="umodal-normal">
              </div>
              <label class="am-form-label umodal-label">备注：</label>
              <div class="umodal-max">
               <input type="text" name="card_memo" class="am-form-field uinput uinput-max">
              </div>
              <div style="clear:both;"></div>
            </div>
            <div style="clear:both;"></div>
        </div>
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
          <select class="uselect uselect-auto ccard_type" name="card_type">
          <option value="">请选择</option>
          <?php foreach($this->_data['card_type_list'] as $row) { ?>
            <option discount="<?php echo $row['card_type_discount'];?>" value="<?php echo $row['card_type_id'];?>"><?php echo $row['card_type_name']; ?></option>
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
          <input name="cash" class="am-form-field umoneyinput" type="text" placeholder="0.00">&nbsp;&nbsp;元
        </div>
      </div>
      <div class="gspace15"></div>
      <div class="utitle">付款方式</div>
      <div class="am-btn-group ucontent3">
         <a class="am-btn am-btn-default upay upay-active" payType="1">现金</a>
         <a class="am-btn am-btn-default upay" payType="2">银行卡</a>
         <a class="am-btn am-btn-default upay" payType="3">微信支付</a>
         <a class="am-btn am-btn-default upay" payType="4">支付宝</a>
      </div>
      <input type="hidden" name="card_id" value="">
    </div>
    <div class="am-modal-footer ufoot">
      <div class="ua1">充值总额：<span class="am-text-lg gtext-orange call_money">0.00</span>元,赠送总额<span class="am-text-lg gtext-orange cgive_money">0.00</span>元</div>
      <div class="ua2">
        <label class="am-checkbox">
          <input type="checkbox" value="" data-am-ucheck> 打印充值单
        </label>
      </div>
      <div class="am-btn-group">
        <button type="button" class="am-btn ubtn-sure ubtn-green cmodalopen3"><i class="iconfont icon-liwu"></i>
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
        <div class="am-u-lg-4">会员卡号：<span class="ccard_code"></span></div>
        <div class="am-u-lg-4">会员姓名：<span class="ccard_name"></span></div>
        <div class="am-u-lg-4">手机号码：<span class="ccard_phone"></span></div>
        <div class="am-u-lg-4">卡余额：<span class="am-text-lg gtext-orange ccard_ymoney"></span>元</div>
        <div class="am-u-lg-4">会员卡类型：<span class="ccard_type"></span></div>
        <div class="am-u-lg-4 am-u-end">会员折扣：<span class="am-text-lg gtext-orange ccard_discount"></span>折</div>
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
                <input class="am-form-field uinput2 uinput2-max csearch_words" type="text" placeholder="套餐">
              </div>
              <div class="ub2">
                <button type="button" class="am-btn ubtn-search3 ubtn-green csearch_mcombo">
                  <i class="iconfont icon-search"></i>
                  查询
                </button>
              </div>
            </div>
            <ul class="uc">
            <?php foreach($this->_data['mcombo_list'] as $row){?>
              <li class="uc2">
                <div class="uc2a" price="<?php echo $row['mcombo_price'];?>" cprice="<?php echo $row['mcombo_cprice'];?>" mcombo_id="<?php echo $row['mcombo_id'];?>"><?php echo $row['mcombo_name']."(".$row['mcombo_price'].")";?></div>
                <div class="uc2b cadd"><a href="#">添加</a></div>
              </li>
            <?php }?>
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
        <div class="ua">已选择套餐<span style="float:right;">（数量默认为1）</span></div>
        <ul class="ub">
          <li class="ub1">名称</li>
          <li class="ub2">数量</li>
          <li class="ub3">操作</li>
        </ul>
        <form name="mcombo">
        <ul class="uc">
        </ul>
        </form>
      </div>
      <div style="clear:both;"></div>
    </div>
    <div class="am-modal-footer ufoot">
          <div class="utext1">共 <span class="cmcombo_num">0</span> 件，共计：<span class="am-text-lg gtext-orange cymoney">0</span>元</div>
          <div class="am-btn-group">
            <button type="button" class="am-btn ubtn-sure ubtn-green cmodalopen4"><i class="iconfont icon-xiangyou2"></i>
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
        <div class="am-u-lg-4">会员卡号：<span class="ccard_code"></span></div>
        <div class="am-u-lg-4">会员姓名：<span class="ccard_name"></span></div>
        <div class="am-u-lg-4">手机号码：<span class="ccard_phone"></span></div>
        <div class="am-u-lg-4">卡余额：<span class="am-text-lg gtext-orange ccard_ymoney"></span>元</div>
        <div class="am-u-lg-4">会员卡类型：<span class="ccard_type"></span></div>
        <div class="am-u-lg-4 am-u-end">会员折扣：<span class="am-text-lg gtext-orange ccard_discount"></span>折</div>
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
          </tbody>
        </table>
      </div>
      <div class="utitle">付款金额</div>
      <div class="ucontent2">
        <div class="utext">应付金额：</div>
        <div class='umodal-text'>
          <input name="pay" class="am-form-field umoneyinput cpay" type="text" placeholder="请输入金额" value="0">&nbsp;&nbsp;元
          <input type="hidden" name="ymoney" class="cheji">
        </div>
        <label class="umodal-search">&nbsp;</label>
        <div class="utext">手动优惠：</div>
        <div class='umodal-text'>
          <input name="give" class="am-form-field umoneyinput" type="text" placeholder="0.0" value="0">&nbsp;&nbsp;元
        </div>
      </div>
      <div class="utitle">付款方式</div>
      <div class="am-btn-group ucontent3">
         <button class="am-btn am-btn-default upay upay-active" payType="1">现金</button>
         <button class="am-btn am-btn-default upay" payType="2">银行卡</button>
         <button class="am-btn am-btn-default upay" payType="3">微信支付</button>
         <button class="am-btn am-btn-default upay" payType="4">支付宝</button>
         <button class="am-btn am-btn-default upay" payType="5">卡扣</button>
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
        <div>合计：<span class="am-text-lg gtext-orange cymoney">0</span>元，折扣：<span class="am-text-lg gtext-orange ccard_discount"></span>折，实收金额：<span class="am-text-lg gtext-orange relmoney">0</span>元
        </div>
      </div>
      <div class="am-btn-group">
        <button type="button" class="am-btn ubtn-sure ubtn-green cmodalopen3up"><i class="iconfont icon-xiangyou2"></i>
          上一步
        </button>
        <button type="button" class="am-btn ubtn-sure ubtn-green cmodalcommit4"><i class="iconfont icon-yuanxingxuanzhong"></i>
          完成
        </button>
      </div>
    </div>
  </div>
</div>
<!-- 确认密码 -->
<div id="upwd-alert" class="am-modal am-modal-confirm" tabindex="-1">
  <div class="am-modal-dialog">
    <div class="am-modal-hd">请输入会员卡密码</div>
    <div class="am-modal-bd">
      <div class="am-form-group" style="padding:10px 20px 0 20px;">
         <input type="password" class="am-form-field uinput uinput-max ccard_password">
         <input type="hidden" class="ccard_id">
      </div>
    </div>
    <div class="am-modal-footer">
      <span class="am-modal-btn" data-am-modal-close>取消</span>
      <span class="am-modal-btn cpwd-btn" data-am-modal-confirm>确定</span>
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
        <div class="am-u-lg-6">会员姓名：<span class="ccard_name"></span></div>
        <div class="am-u-lg-6">手机号码：<span class="ccard_phone"></span></div>
        <div class="am-u-lg-6">会员卡号：<span class="ccard_code"></span></div>
        <div class="am-u-lg-6">性别：<span class="ccard_sex"></span></div>
        <div class="am-u-lg-6">出生日期：<span class="ccard_birthday"></span></div>
        <div class="am-u-lg-6">到期时间：<span class="ccard_edate"></span></div>
        <div class="am-u-lg-6">联系地址：<span class="ccard_address"></span></div>
        <div class="am-u-lg-6">余额：<font class="gtext-orange ccard_ymoney"></font><span>元</span></div>
        <div class="am-u-lg-12">备注：<span class="ccard_memo"></span></div>
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
<script src="../js/amazeui.js"></script>
<script type="text/javascript">
$(function() {
    //分页首末页不可选中
    if(<?php echo $GLOBALS['intpage'];?>>1){
      $('.upages li').eq(1).removeClass('am-disabled');
    }
    if(<?php echo $this->_data['cards_list']['pagecount']-$GLOBALS['intpage']; ?><1){
      $('.upages li').last().addClass('am-disabled');
    }
    //付款方式
    $('.upay').on('click',function(){
      $(this).addClass('upay-active').siblings().removeClass('upay-active');
    });
    // + -
    $(document).on("click", ".cbtndec", function() {
      var _self= $(this).siblings('input');
      var mcombo_id = _self.attr('mcombo_id');
      if(parseInt(_self.val())>=1)
        $("input[mcombo_id="+mcombo_id+"]").val(parseInt(_self.val())-1);
      jisuan();
    });
    $(document).on("click", ".cbtnplus", function() {
      var _self= $(this).siblings('input');
      var mcombo_id = _self.attr('mcombo_id');
      $("input[mcombo_id="+mcombo_id+"]").val(parseInt(_self.val())+1);
      jisuan();
    });
    //计算合计金额
    function jisuan(){
      var ymoney = 0;//原始总价
      var all_money = 0;//应付价
      var num = 0;
      var discount = Number($("#ucardm3 .ccard_discount").text());
      $("#ucardm3 .uright .cnum").each(function(){
        if($(this).attr('cprice')==0){
          all_money = Number(all_money) + Number($(this).val())*Number($(this).attr('price'))*discount/10;
        }else{
          all_money = Number(all_money) + Number($(this).val())*Number($(this).attr('cprice'));
        }
        ymoney = Number(ymoney) + Number($(this).val())*Number($(this).attr('price'));
        num = Number(num) + Number($(this).val());
      });
      $("#ucardm3 .cymoney").text(ymoney);
      $("#ucardm4 .cymoney").text(ymoney);
      $("#ucardm4 .cheji").val(ymoney);
      $("#ucardm4 .cpay").val(all_money);
      $("#ucardm4 .relmoney").text(all_money);
      $("#ucardm3 .cmcombo_num").text(num);
    }
    //当直接填入数量时计算金额
    function jisuan2(){
      var id = $(this).attr('mcombo_id');
      $("input[mcombo_id="+id+"]").val($(this).val());
      jisuan();
    }
    $('#doc-form-file').on('change',showPreview);
    //上传文件
    function showPreview() {
        var file = this.files[0];
        if(window.FileReader) {
            var fr = new FileReader();
            fr.onloadend = function(e) {
              $("#cimg").attr('src',e.target.result);
              // document.getElementById("portrait").src = e.target.result;
            }
            fr.readAsDataURL(file);
        }
    }
    //删除购买套餐modal套餐
    $(document).on("click",".cdel2",function(){
      $(".cdel[mcombo_id="+$(this).attr('mcombo_id')+"]").parent().parent().remove();
      $(this).parent().remove();
      $("#ucardm3 .uleft [mcombo_id="+$(this).attr('mcombo_id')+"] + .cadd").bind('click',cadd);
      jisuan();
    });
    //删除购买套餐完成modal套餐
    $(document).on("click",".cdel",function(){
      $(".cdel2[mcombo_id="+$(this).attr('mcombo_id')+"]").parent().remove();
      $(this).parent().parent().remove();
      $("#ucardm3 .uleft [mcombo_id="+$(this).attr('mcombo_id')+"] + .cadd").bind('click',cadd);
      jisuan();
    });
    // 添加套餐
    var cadd = function(){
      $(this).unbind("click"); //移除click
      var product = $(this).prev().text();
      var price = $(this).prev().attr('price');
      var cprice = $(this).prev().attr('cprice');
      var mcombo_id = $(this).prev().attr('mcombo_id');
      var addhtml ='<li><div class="uc1">'+product+'</div><div class="uc2"><a href="javascript:;" class="uc2a cbtndec"><i class="am-icon-minus"></i></a><input type="text" mcombo_id="'+mcombo_id+'" price="'+price+'" cprice="'+cprice+'" class="uinput2 uinput-35 cnum" value="1"><a href="javascript:;" class=" uc2b cbtnplus"><i class="am-icon-plus"></i></a></div><div class="uc3 cdel2" mcombo_id="'+mcombo_id+'"><a href="javascript:;">移除</a></div></li>';
      $(".uright .uc").append(addhtml);
      $.ajax({
        url:'card_mcombo_ajax.php',
        data:{
          mcombo_id:mcombo_id
        },
        type:"GET",
        dataType:"json"
      }).then(function(res){
        var cont = '';
        $.each(res,function(k,v){
          cont +=v.mgoods_name+v.mcombo_goods_count+'次,';
        })
        cont = cont.substr(0,cont.length-1);
        if(product.length>20){
          product1 = product.substr(0,16)+'...';
        }else{
          product1 = product;
        }
        if(cont.length>30){
          cont1 = cont.substr(0,26)+'...';
        }else{
          cont1 = cont;
        }
        var addtr = '<tr><td title="'+product+'">'+product1+'</td><td title="'+cont+'">'+cont1+'</td><td><span class="gtext-orange">￥'+price+'</span></td><td><a href="javascript:;" class="uc2a cbtndec"><i class="am-icon-minus"></i></a><input type="text" class="uinput2 uinput-35 cnum" mcombo_id="'+mcombo_id+'" value="1"><a href="javascript:;" class=" uc2b cbtnplus"><i class="am-icon-plus"></i></a></td><td><a href="javascript:;" class="am-text-primary cdel" mcombo_id="'+mcombo_id+'">移除</a></td></tr>'
        $('#ucardm4 table tbody').append(addtr);
      }).then(function(){
        jisuan()
        $("#ucardm3 .uright .cnum").on("input propertychange",jisuan2);
        $("#ucardm4 .cnum").on("input propertychange",jisuan2);
      })
    }
    /******************************************modal************************************/
    //新增会员
    $('.cmodalopen1').on('click', function(e) {
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
      $(this).attr('disabled',true);
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
    $('.cmodalopen1-1').on('click', function(e) {
      var url = "card_edit_ajax.php";
      // console.log($(this).val());
      $.getJSON(url,{card_id:$(this).val()},function(res){
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
            $(this).uCheck('check');
          }
        });
        if(res.card_password_state==1){
          $('.callow').attr('disabled',false);
        }else{
          $('.callow').attr('disabled',true);
        }
        $("#ucardm1-1 input[name='card_sex']").each(function(){
          if($(this).val()==res.card_sex){
            $(this).uCheck('check');
          }
        });
      });
      $('#ucardm1-1').modal('open');
      $('#ucardm1-1 input').eq(0).focus();
    });
    //card修改提交信息
    $('.ccardeditsubmit').on('click',function(){
      $(this).attr('disabled',true);
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
    $('.cmodalopen2').on('click', function() {
      var url = "card_recharge_ajax.php";
      $.getJSON(url,{card_id:$(this).val()},function(res){
        $("#ucardm2 .ccard_name").text(res.card_name);
        $("#ucardm2 .ccard_code").text(res.card_code);
        $("#ucardm2 .ccard_phone").text(res.card_phone);
        $("#ucardm2 .ccard_birthday").text(res.card_birthday);
        $("#ucardm2 .ccard_edate").text(res.card_edate);
        $("#ucardm2 .ccard_memo").text(res.card_memo);
        $("#ucardm2 .ccard_ymoney").text(res.s_card_ymoney);
        $("#ucardm2 .ccard_type_discount").text(res.c_card_type_discount);
        $("#ucardm2 input[name='card_id']").val(res.card_id);
        $("#ucardm2 .cmodalopen3").val(res.card_id);
        $('#ucardm2 .ccard_type').val(res.card_type_id);
        $('#ucardm2 .ccard_type').selected();
      });
      $('#ucardm2').modal('open');
      $('#ucardm2 input').eq(0).focus();
    });
    $('#ucardm2').on('close.modal.amui', function(){
      $('#ucardm2 .ccard_type').selected('destroy');
    });
    //改变会员卡折扣
    $('#ucardm2 .ccard_type').on('change',function(){
      var discount = $(this).find("option:selected").attr('discount');
      $("#ucardm2 .ccard_type_discount").text(discount);
    })
    //填充金额
    $("#ucardm2 input[name='money']").keyup(function(){
      $("#ucardm2 .call_money").text($(this).val());
      var relmoney = $("#ucardm2 input[name='cash']").val()==''?0:$("#ucardm2 input[name='cash']").val();
      $("#ucardm2 .cgive_money").text($(this).val()-relmoney);
    });
    $("#ucardm2 input[name='cash']").keyup(function(){
      var allmoney = $("#ucardm2 input[name='money']").val()==''?0:$("#ucardm2 input[name='money']").val();
      $("#ucardm2 .cgive_money").text(allmoney-$(this).val());
    });
    //会员充值提交
    $('.ccardrechargesubmit').on('click',function(){
      var url="card_recharge_do.php";
      var card_id = $("#ucardm2 input[name='card_id']").val();
      var money = $("#ucardm2 input[name='money']").val();
      var cash = $("#ucardm2 input[name='cash']").val();
      var card_type_id = $("#ucardm2 .ccard_type").val();
      var pay_type = $("#ucardm2 .upay-active").attr('payType');
      var data = {
            money:money,
            cash:cash,
            card_id:card_id,
            card_type_id:card_type_id,
            pay_type:pay_type
          }
      $.post(url,data,function(res){
        if(res=='0'){
          window.location.reload();
        }else{
          alert('充值失败');
          console.log(res);
        }
      });
    });
    //购买套餐
    $('.cmodalopen3').on('click', function() {
      $('#ucardm2').modal('close');
      var card_id = $(this).val();
      $('#ucardm4 .cmodalcommit4').val(card_id);
      var url = "card_password_ajax.php";
      $.get(url,{card_id:card_id},function(res){
        if(res=='1'){
          $('#upwd-alert').modal({
            closeOnConfirm: false,
          });
          $('#upwd-alert input').eq(0).focus();
          $('#upwd-alert .ccard_id').val(card_id);
        }else{
          $.getJSON('card_edit_ajax.php',{card_id:card_id},function(res){
            $("#ucardm3 .ccard_name").text(res.card_name);
            $("#ucardm3 .ccard_code").text(res.card_code);
            $("#ucardm3 .ccard_discount").text(res.c_card_type_discount);
            $("#ucardm3 .ccard_type").text(res.c_card_type_name);
            $("#ucardm3 .ccard_ymoney").text(res.s_card_ymoney);
            $("#ucardm3 .ccard_phone").text(res.card_phone);
            $("#ucardm3 .cmodalopen4").val(res.card_id);
          });
          $('#ucardm3').modal('open');
          $('#ucardm3 input').eq(0).focus();
        }
      });
    });
    //验证密码
    $('.cpwd-btn').on('click', function() {
      var card_id = $("#upwd-alert .ccard_id").val();
      var url = "card_password_do.php";
      var data = {
        card_id:card_id,
        card_password:$("#upwd-alert .ccard_password").val()
      };
      $.get(url,data,function(res){
        if(res=='1'){
          // 密码正确
          $('#upwd-alert').modal('close');
          $.getJSON('card_edit_ajax.php',{card_id:card_id},function(res){
            $("#ucardm3 .ccard_name").text(res.card_name);
            $("#ucardm3 .ccard_code").text(res.card_code);
            $("#ucardm3 .ccard_discount").text(res.c_card_type_discount);
            $("#ucardm3 .ccard_type").text(res.c_card_type_name);
            $("#ucardm3 .ccard_ymoney").text(res.s_card_ymoney);
            $("#ucardm3 .ccard_phone").text(res.card_phone);
            $("#ucardm3 .cmodalopen4").val(res.card_id);
          });
          $('#ucardm3').modal('open');
          $('#ucardm3 input').eq(0).focus();
        }else{
          // 密码错误
          alert('密码错误');
        }
      });
    });
    // 添加套餐
    $(".cadd").on('click',cadd);
    //套餐查询
    $('#ucardm3 .csearch_mcombo').on('click', function(){
      $(this).attr('disabled',true);
      $("#ucardm3 .uleft .uc .uc2").hide();
      var search = $('#ucardm3 .csearch_words').val();
      $.ajax({
        url:'card_mcombo_ajax2.php',
        data:{
          search:search
        },
        type:"GET",
        dataType:"json"
      }).then(function(res){
        $.each(res, function(key, val) {
         $("#ucardm3 .uleft .uc .uc2 .uc2a").each(function(){
          if($(this).attr('mcombo_id')==val.mcombo_id){
            $(this).parent().show();
          }
         });
        });
      }).then(function(){
        $('#ucardm3 .csearch_mcombo').attr('disabled',false);
      })
    });
    //返回上一步
    $('.cmodalopen3up').on('click', function() {
      $('#ucardm4').modal('close');
      $('#ucardm3').modal('open');
      $('#ucardm3 input').eq(0).focus();
    });
    // 填充金额
    $("#ucardm4 input[name='pay']").on("input propertychange",function(){
      var relmoney = $(this).val()-$("#ucardm4 input[name='give']").val();
      $("#ucardm4 .relmoney").text(relmoney);
    });
    $("#ucardm4 input[name='give']").keyup(function(){
      var relmoney = $("#ucardm4 .cpay").val()-$(this).val();;
      $("#ucardm4 .relmoney").text(relmoney);
    });
     //购买套餐完成
    $('.cmodalopen4').on('click', function() {
      var card_id = $(this).val();
      $('#ucardm3').modal('close');
      $.getJSON('card_edit_ajax.php',{card_id:card_id},function(res){
        $("#ucardm4 .ccard_name").text(res.card_name);
        $("#ucardm4 .ccard_code").text(res.card_code);
        $("#ucardm4 .ccard_discount").text(res.c_card_type_discount);
        $("#ucardm4 .ccard_type").text(res.c_card_type_name);
        $("#ucardm4 .ccard_ymoney").text(res.s_card_ymoney);
        $("#ucardm4 .ccard_phone").text(res.card_phone);
        $("#ucardm4 input[name='card_id']").val(res.card_id);
      });
      $('#ucardm4').modal('open');
      $('#ucardm4 input').eq(0).focus();
    });
    // 购买套餐完成提交
    $('.cmodalcommit4').on('click', function() {
      var url="card_mcombo_do.php";
      var card_id=$(this).val();
      var arr= [];
      $("#ucardm4 .cnum").each(function(k,v){
        var json = {'id':$(this).attr('mcombo_id'),'num':$(this).val()};
        arr.push(json);
      });
      var ymoney = $("#ucardm4 input[name='ymoney']").val();
      var money = $("#ucardm4 input[name='pay']").val();
      var give = $("#ucardm4 input[name='give']").val();
      var pay_type = $("#ucardm4 .upay-active").attr('payType');
      var data = {
            card_id:card_id,
            ymoney:ymoney,
            money:money,
            give:give,
            arr:arr,
            pay_type:pay_type
          }
      $.post(url,data,function(res){
        if(res=='0'){
          window.location.reload();
        }else{
          // alert('购买套餐失败');
          console.log(res);
        }
      });
    })
    //侧拉打开
    $('.coffopen').on('click', function() {
      var url = "card_edit_ajax.php";
      $.getJSON(url,{card_id:$(this).attr('cardid')},function(res){
        // console.log(res);
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
      // console.log(data);
      $.post(url,data,function(res){
        if(res=='0'){
          window.location.reload();
          //console.log(res);
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
          // console.log(res);
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
});
</script>
</body>
</html>