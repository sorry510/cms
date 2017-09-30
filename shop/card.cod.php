<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>
<!-- content -->
<div class="gcontent" id="ucard">
  <ul class="am-nav am-nav-pills ubread">
	  <li class="am-active"><a href="javascript:void">会员管理</a></li>
	  <li><a href="card2.php">过期会员</a></li>
	  <li><a href="card3.php">回收站</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="utools">
    <form class="am-form-inline uform2" method="get">
      <div class="am-form-group">
        <label for="doc-ipt-3" class="am-form-label">卡类型：</label>
        <select class="uselect uselect-auto" data-am-selected name="card_type">
        <option value="all" <?php if($this->_data['request']['card_type']=='all') echo "selected";?>>全部</option>
        <option value="0" <?php if($this->_data['request']['card_type']=='0') echo "selected";?>>未设置</option>
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

  <table class="am-table am-table-bordered am-table-hover am-table-compact utable1">
    <thead>
      <tr>
        <td>卡号</td>
        <td>姓名</td>
        <td>手机</td>
        <td>性别</td>
        <td width="8%">生日</td>
        <td width="8%">开卡时间</td>
    	  <td>卡类型</td>
    	  <td>折扣</td>
        <td>到期时间</td>
        <td>卡状态</td>
        <td width="10%">开卡店铺</td>
        <td>电子档案</td>
        <td>消费明细</td>
        <td width="18%">操作</td>
      </tr>
    </thead>
    <tbody>
    <?php foreach($this->_data['cards_list']['list'] as $row) { ?>
      <tr>
        <td class="coffopen" cardid="<?php echo $row['card_id']; ?>"><a href="javascript:;"><?php echo $row['card_code']; ?><?php if(!empty($row['card_okey'])){?><span class="gtext-green">(WX)</span><?php }?></a></td>
        <td class="coffopen" cardid="<?php echo $row['card_id']; ?>"><a href="javascript:;"><?php echo $row['card_name']; ?></a></td>
        <td><?php echo $row['card_phone']; ?></td>
        <td><?php echo $row['card_sex'] == '3' ? '保密' : ($row['card_sex'] == '1' ? '男':'女'); ?></td>
        <td><span class="<?php if(date("m-d",$row['card_birthday_date'])==date("m-d",time())) echo 'gtext-orange';?>"><?php echo $row['card_birthday_date'] == 0 ? '--' : date("Y-m-d",$row['card_birthday_date']); ?></span></td>
        <td><?php echo date("Y-m-d",$row['card_atime']); ?></td>
        <td><?php echo $row['c_card_type_name']; ?></td>
        <td><span class="gtext-orange"><?php echo $row['c_card_type_discount'] == '0' ? '10.0' : $row['c_card_type_discount']; ?></span>折</td>
        <td class="<?php if($row['card_edate'] < time() && $row['card_edate'] != 0) echo 'gtext-orange';?>"><?php echo $row['card_edate'] == 0 ? '--' : date("Y-m-d",$row['card_edate']); ?></td>
        <td><span class="<?php if($row['card_state']=='2') echo 'gtext-orange';?>"><?php echo $row['card_state']=='1'?'正常':'停用';; ?></span></td>
        <td><?php echo $row['shop_name']?></td>
        <td><a href="e-record.php">电子档案</a></td>
        <td><a href="record_all.php?card_code=<?php echo $row['card_code']?>">消费明细</a></td>
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
        <td colspan="14" class="utable-text">余额：<span class="gtext-orange">￥<?php echo $row['s_card_ymoney']; ?></span>，剩余积分：<span class="gtext-orange"><?php echo $row['s_card_yscore']; ?></span>
        <?php if(!empty($row['mcombo'])){?>，套餐余：【
          <?php foreach($row['mcombo'] as $row2){
          echo $row2['mgoods_name'];
          if($row2['c_mcombo_type']==1){
            echo '(<span class="gtext-orange">'.$row2['card_mcombo_gcount'].'</span>)';
          }
          echo '，到期时间:';
          echo date('Y-m-d',$row2['card_mcombo_cedate']);
          echo '；';
          }?>】<?php }?>
        <?php if(!empty($row['ticket'])){?>,卡券余：【
          <?php foreach($row['ticket'] as $row2){
          echo $row2['c_ticket_name'];
          echo '(<span class="gtext-orange">'.$row2['c_ticket_value'].'</span>)';
          echo '，到期时间:';
          echo date('Y-m-d',$row2['card_ticket_edate']);
          echo '；';
          }?>】
        <?php }?>
        </td>
      </tr>
    <?php }?>
    </tbody>
  </table>
  <div class="gspace15"></div>
  <?php pageHtml($this->_data['cards_list'],$this->_data['request'],'card.php');?>
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
                <input type="text" class="am-form-field uinput uinput-max cvalid" name="card_name">
              </div>
              <div class="umodal-search">&nbsp;</div>
              <label class="am-form-label umodal-label">性别：</label>
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
                <input type="text" class="am-form-field uinput uinput-max cvalid" name="card_phone">
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
              <img id="cimg1" src="../img/wu.jpg">
              <a class="am-btn am-btn-gray am-btn-sm">
                <i class="am-icon-cloud-upload"></i> 点击上传</a>
              <input name="card_photo" id="doc-form-file1" class="cphoto" type="file" multiple>
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
                <input type="text" name="card_carcode" class="am-form-field uinput uinput-max">
              </div>
              <label class="am-form-label umodal-label">备注：</label>
              <div class="umodal-max">
               <input type="text" name="card_memo" class="am-form-field uinput uinput-max">
              </div>
              <label class="am-form-label umodal-label">推荐人：</label>
              <div class="umodal-normal">
                <select name="worker_id" class="uselect uselect-max" data-am-selected>
                  <option value="0">无</option>
                <?php foreach($this->_data['worker_list'] as $row) { ?>
                  <option value="<?php echo $row['worker_id'];?>"><?php echo $row['worker_name'];?></option>
                <?php }?>
                </select>
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
                <input type="text" class="am-form-field uinput uinput-max cvalid" name="card_name" value="">
              </div>
              <div class="umodal-search">&nbsp;</div>
              <label class="am-form-label umodal-label">性别：</label>
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
                <input type="text" class="am-form-field uinput uinput-max cvalid" name="card_phone">
              </div>
              <div class="umodal-search">&nbsp;</div>
              <label class="am-form-label umodal-label">出生日期：</label>
              <div class="umodal-normal">
                <div class="am-input-group am-datepicker-date udatepicker udatepicker-max" data-am-datepicker="{format:'yyyy-mm-dd'}">
                  <input type="text" class="am-form-field" name="card_birthday_date">
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
              <img id="cimg2" src="../img/wu.jpg">
              <a class="am-btn am-btn-gray am-btn-sm">
                <i class="am-icon-cloud-upload"></i> 点击上传</a>
              <input name="card_photo" id="doc-form-file2" class="cphoto" type="file" multiple>
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
                <input type="text" name="card_carcode" class="am-form-field uinput uinput-max">
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
          <select class="uselect uselect-auto ccard_type cvalid" name="card_type">
          <option value="0">请选择</option>
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
        <div class="utext"><span class="gtext-orange">*</span>充值金额：</div>
        <div class='umodal-text'>
          <input name="money" class="am-form-field umoneyinput cvalid" type="text" placeholder="请输入金额">&nbsp;&nbsp;元
        </div>
        <label class="umodal-search">&nbsp;</label>
        <div class="utext"><span class="gtext-orange">*</span>实收金额：</div>
        <div class='umodal-text'>
          <input name="cash" class="am-form-field umoneyinput cvalid" type="text" placeholder="请输入金额">&nbsp;&nbsp;元
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
      <div class="gspace15"></div>
      <div class="utitle">推荐人</div>
      <div class="am-btn-group ucontent3">
        <!-- <label class="am-form-label umodal-label">推荐人：</label> -->
        <div class="umodal-normal">
          <select name="worker_id" class="uselect uselect-auto cworker" data-am-selected>
            <option value="0">无</option>
          <?php foreach($this->_data['worker_list'] as $row) { ?>
            <option value="<?php echo $row['worker_id'];?>"><?php echo $row['worker_name'];?></option>
          <?php }?>
          </select>
        </div>
      </div>
      <input type="hidden" name="card_id" value="">
    </div>
    <div class="am-modal-footer ufoot">
     <div class="am-fl ua1">
        <label class="am-checkbox">
          <input type="checkbox" value="" data-am-ucheck> 打印充值单
        </label>
      </div>
      <div class="am-fl ua2">充值总额：<span class="am-text-lg gtext-orange call_money">0.00</span>元,赠送总额<span class="am-text-lg gtext-orange cgive_money">0.00</span>元</div>
      <div class="am-btn-group">
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
                <div class="uc2a" price="<?php echo $row['mcombo_price'];?>" cprice="<?php echo $row['mcombo_cprice'];?>" mcombo_id="<?php echo $row['mcombo_id'];?>" mcombo_act="<?php echo $row['mcombo_act'];?>"><?php echo $row['mcombo_name']."(".$row['mcombo_price'].")";?></div>
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
                <input class="am-form-field uinput uinput-max cmcombo_code" type="text" placeholder="条码枪扫码或手动输入">
              </div>
              <button type="button" class="am-btn ubtn-search2 ubtn-green usearch cmcombo_code_search" style="width:80px;">
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
          <div class="utext1">共 <span class="cmcombo_num">0</span> 件，原计：<span class="am-text-lg gtext-orange cymoney">0</span>元，合计：<span class="am-text-lg gtext-orange chmoney">0</span>元</div>
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
        <table class="am-table am-table-bordered am-table-centered am-table-hover am-table-compact utable1 utable1-fixed" style="width:100%;">
          <thead>
            <tr>
              <td width="20%">套餐名称</td>
              <td width="38%">内容</td>
              <td width="20%">单价</td>
              <td>数量</td>
              <td width="8%">操作</td>
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
          <input name="pay" class="am-form-field umoneyinput cpay" type="text" value="0" disabled>&nbsp;&nbsp;元
          <input type="hidden" name="ymoney" class="cheji">
        </div>
        <label class="umodal-search">&nbsp;</label>
        <div class="utext">手动优惠：</div>
        <div class='umodal-text'>
          <input name="give" class="am-form-field umoneyinput cgive" type="text" placeholder="请输入金额" value="0">&nbsp;&nbsp;元
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
      <div class="utitle">满减活动</div>
      <div class="am-btn-group ucontent3 cactgive">
        
      </div>
      <div class="utitle">推荐人</div>
      <div class="am-btn-group ucontent3">
        <!-- <label class="am-form-label umodal-label">推荐人：</label> -->
        <div class="umodal-normal">
          <select name="worker_id" class="uselect uselect-auto cworker" data-am-selected>
            <option value="0">无</option>
          <?php foreach($this->_data['worker_list'] as $row) { ?>
            <option value="<?php echo $row['worker_id'];?>"><?php echo $row['worker_name'];?></option>
          <?php }?>
          </select>
        </div>
      </div>
      <div class="utitle">赠送卡券</div>
      <div class="am-btn-group ucontent4">

      </div>
    </div>
    <div class="am-modal-footer ufoot">
      <div class="ufootleft am-text-left">
        <div>
          <label class="am-checkbox">
            <input class="cfree" type="checkbox" value="4" data-am-ucheck> 免单
          </label>
        </div>
        <div>合计：<span class="am-text-lg gtext-orange cymoney">0</span>元，实收金额：<span class="am-text-lg gtext-orange relmoney">0</span>元
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
    <form id="cformpassword">
      <div class="am-form-group" style="padding:10px 20px 0 20px;">
         <input type="password" name="card_password" class="am-form-field uinput uinput-max ccard_password">
         <input type="hidden" name="card_id" class="ccard_id">
      </div>
    </form>
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
        <div class="am-u-lg-6">出生日期：<span class="ccard_birthday_date"></span></div>
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
<!-- 警告框 -->
<div class="am-modal am-modal-alert" tabindex="-1" id="ualert">
  <div class="am-modal-dialog">
    <div class="am-modal-hd">警 告</div>
    <div class="am-modal-bd ctext">
      如有问题，请联系管理员！
    </div>
    <div class="am-modal-footer">
      <span class="am-modal-btn">确定</span>
    </div>
  </div>
</div>
<!-- 删除框 -->
<?php confirmHtml(1);?>
<!-- 停用框 -->
<?php confirmHtml(2);?>
<!-- 启用框 -->
<?php confirmHtml(3);?>
<script src="../js/jquery.min.js"></script>
<script src="../js/ajaxfileupload.js"></script>
<script src="../js/amazeui.js"></script>
<script type="text/javascript">
<?php pageJs($this->_data['cards_list'],$this->_data['request'],'card.php');?>
;(function(){
  var cardstate = {
      card_id: 0,
      successs: false
  };
  var mcombo = {};//套餐真实价格和限时打折id
  var act_discount_id = [];//限时打折活动id
  var act_decrease_id = [];//减价降序排列
  var act_give_id = [];
  var use_act_decrease_id = [];
  var json1 = {};
  <?php foreach($this->_data['act_discount_list'] as $k => $v){?>
    act_discount_id[<?php echo $k;?>] = <?php echo $v['act_discount_id'];?>;
  <?php }?>
  <?php foreach($this->_data['act_decrease_list'] as $k => $v){?>
    json1 ={'act_decrease_id':'<?php echo $v['act_decrease_id'];?>','act_decrease_man':'<?php echo $v['act_decrease_man'];?>','act_decrease_jian':'<?php echo $v['act_decrease_jian'];?>','act_decrease_name':'<?php echo $v['act_decrease_name'];?>'};
    act_decrease_id.push(json1);
  <?php }?>
  <?php foreach($this->_data['act_give_list'] as $k => $v){?>
    act_give_id[<?php echo $k;?>] = <?php echo $v['act_give_id'];?>;
  <?php }?>
  // 会员添加
  function cardAdd(){
    $.ajax({
      url: 'card_add_do.php',
      type: 'POST',
      cache: false,
      data: new FormData($('#ccardinfoadd')[0]),
      processData: false,
      contentType: false
    }).done(function(res) {
      $('.ccardaddsubmit').attr('disabled',false);
      switch(res)
      {
        case '0':
          window.location.href='card.php';break;
        case '1':
          alert('缺少必填项');break;
        case '2':
          alert('添加失败');break;
        case '3':
          alert('上传图片失败');break;
        case '4':
          alert('上传图片失败');break;
        case '5':
          alert('上传图片过大');break;
        case '6':
          alert('上传图片类型不对');break;
        default:
          alert('异常错误');
      }
    }).fail(function(res) {
      $('.ccardaddsubmit').attr('disabled',false);
      alert('服务器异常');
    });
  }
  //会员修改
  function cardEditShow(obj){
    $.getJSON('card_edit_ajax.php',{card_id:obj.val()},function(res){
      $("#ucardm1-1 input[name='card_name']").val(res.card_name);
      $("#ucardm1-1 input[name='card_code']").val(res.card_code);
      $("#ucardm1-1 input[name='card_phone']").val(res.card_phone);
      $("#ucardm1-1 input[name='card_carcode']").val(res.card_carcode);
      $("#ucardm1-1 input[name='card_ikey']").val(res.card_ikey);
      if(res.card_birthday_date=='1970-01-01'){
        $("#ucardm1-1 input[name='card_birthday_date']").val();
      }else{
        $("#ucardm1-1 input[name='card_birthday_date']").val(res.card_birthday_date);
      }
      $("#ucardm1-1 input[name='card_password']").val(res.card_password);
      if(res.card_edate=='1970-01-01'){
        $("#ucardm1-1 input[name='card_edate']").val('');
      }else{
        $("#ucardm1-1 input[name='card_edate']").val(res.card_edate);
      }
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
      if(res.card_photo_file.length!=0){
        $("#ucardm1-1 #cimg2").attr('src','http://<?php echo $GLOBALS["gconfig"]["path"]["photo_card_show"];?>/'+res.card_photo_file+'?'+Math.random()*1000);
      }else{
        $("#ucardm1-1 #cimg2").attr('src','../img/wu.jpg');
      }
    });
    $('#ucardm1-1').modal('open');
    $('#ucardm1-1 input').eq(0).focus();
  }
  //会员修改提交
  function cardEdit(){
    $.ajax({
      url: 'card_edit_do.php',
      type: 'POST',
      cache: false,
      data: new FormData($('#ccardinfoedit')[0]),
      processData: false,
      contentType: false
    }).done(function(res) {
      $('.ccardeditsubmit').attr('disabled',false);
      switch(res)
      {
        case '0':
          window.location.reload();break;
        case '1':
          alert('缺少必填项');break;
        case '2':
          alert('添加失败');break;
        case '3':
          alert('上传图片失败');break;
        case '4':
          alert('上传图片失败');break;
        case '5':
          alert('上传图片过大');break;
        case '6':
          alert('上传图片类型不对');break;
        default:
          alert('异常错误');
      }
    }).fail(function(res) {
      $('.ccardeditsubmit').attr('disabled',false);
      alert('服务器异常');
    });
  }
  //会员充值
  function cardRechargeShow(obj){
    $.getJSON('card_recharge_ajax.php',{card_id:obj.val()},function(res){
      $("#ucardm2 .ccard_name").text(res.card_name);
      $("#ucardm2 .ccard_code").text(res.card_code);
      $("#ucardm2 .ccard_phone").text(res.card_phone);
      $("#ucardm2 .ccard_birthday_date").text(res.card_birthday_date);
      $("#ucardm2 .ccard_edate").text(res.card_edate);
      $("#ucardm2 .ccard_memo").text(res.card_memo);
      $("#ucardm2 .ccard_ymoney").text(res.s_card_ymoney);
      if(res.c_card_type_discount==0){
        $("#ucardm2 .ccard_type_discount").text(10.0);
      }else{
        $("#ucardm2 .ccard_type_discount").text(res.c_card_type_discount);
      }
      $("#ucardm2 input[name='card_id']").val(res.card_id);
      $("#ucardm2 .cmodalopen3").val(res.card_id);
      $('#ucardm2 .ccard_type').val(res.card_type_id);
      $('#ucardm2 .ccard_type').selected();
    });
    $('#ucardm2').modal('open');
    $('#ucardm2 input').eq(0).focus();
  }
  // 充值提交
  function cardRecharge(){
    var card_id = $("#ucardm2 input[name='card_id']").val(),
        money = $("#ucardm2 input[name='money']").val(),
        cash = $("#ucardm2 input[name='cash']").val(),
        card_type_id = $("#ucardm2 .ccard_type").val(),
        card_type_discount = $("#ucardm2 .ccard_type_discount").text(),
        pay_type = $("#ucardm2 .upay-active").attr('payType'),
        worker_id = $("#ucardm2 .cworker").val(),
        data = {
          money:money,
          cash:cash,
          card_id:card_id,
          card_type_id:card_type_id,
          card_type_discount:card_type_discount,
          pay_type:pay_type,
          worker_id:worker_id
        };
    $.post('card_recharge_do.php',data,function(res){
      $('.ccardrechargesubmit').attr('disabled',false);
      if(res=='0'){
        window.location.reload();
      }else if(res=='4'){
        alert('没有这种卡类型,请选择卡类型');
        return false;
      }else if(res=='5'){
        alert('金额必填');
        return false;
      }else{
        alert('充值失败')
        return false;
      }
    });
  }
  //验证是否需要密码
  function cardPassword(card_id){
    $.get('card_password_ajax.php',{card_id:card_id},function(res){
      if(res == '1'){
        // 需要密码
        $('#upwd-alert').modal({
          closeOnConfirm: false,//取消确认默认事件
        });
        $('#upwd-alert input').eq(0).focus();
        $('#upwd-alert input').eq(0).val('');
        $('#upwd-alert .ccard_id').val(card_id);
      }else if(res == '0'){
        cardMcomboShow(card_id);
      }
    })
  }
  // 验证密码正确性
  function cardPasswordDo(){
    $.get('card_password_do.php', $('#cformpassword').serialize(),function(res){
      if(res=='0'){
        // 密码正确
        var card_id = $('#cformpassword .ccard_id').val();
        cardstate.success = true;
        cardstate.card_id = card_id;
        $('#upwd-alert').modal('close');
        cardMcomboShow(card_id);
      }else{
        alert('密码错误');
      }
    });
  }
  //购买套餐
  function cardMcomboShow(card_id){
    $.getJSON('card_edit_ajax.php',{card_id:card_id},function(res){
      $("#ucardm3 .ccard_name").text(res.card_name);
      $("#ucardm3 .ccard_code").text(res.card_code);
      if(res.c_card_type_discount==0){
        $("#ucardm3 .ccard_discount").text(10.0);
      }else{
        $("#ucardm3 .ccard_discount").text(res.c_card_type_discount);
      }
      $("#ucardm3 .ccard_type").text(res.c_card_type_name);
      $("#ucardm3 .ccard_ymoney").text(res.s_card_ymoney);
      $("#ucardm3 .ccard_phone").text(res.card_phone);
      $("#ucardm3 .cmodalopen4").val(res.card_id);
    });
    $('#ucardm3').modal('open');
    $('#ucardm3 input').eq(0).focus();
  }
  // 套餐查询
  function mcomboSearch(){
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
      $('#ucardm3 .csearch_mcombo').attr('disabled',false);
    })
  }
  // 购买套餐完成页show
  function cardMcomboShow2(card_id){
    $.getJSON('card_edit_ajax.php',{card_id:card_id},function(res){
      $("#ucardm4 .ccard_name").text(res.card_name);
      $("#ucardm4 .ccard_code").text(res.card_code);
      if(res.c_card_type_discount==0){
        $("#ucardm4 .ccard_discount").text(10.0);
      }else{
        $("#ucardm4 .ccard_discount").text(res.c_card_type_discount);
      }
      $("#ucardm4 .ccard_type").text(res.c_card_type_name);
      $("#ucardm4 .ccard_ymoney").text(res.s_card_ymoney);
      $("#ucardm4 .ccard_phone").text(res.card_phone);
      $("#ucardm4 input[name='card_id']").val(res.card_id);
    });
    $('#ucardm4').modal('open');
    $('#ucardm4 input').eq(0).focus();
  }
  // 购买套餐提交
  function cardMcomboDo(){
    var card_id = $('#ucardm4 .cmodalcommit4').val();
    var arr = [];
    var arr2 = [];
    var json = {};
    $("#ucardm3 .cnum").each(function(k,v){
      json = {'id':$(this).attr('mcombo_id'),'num':$(this).val(),'act_discount_id':$(this).attr('act_discount_id')};
      arr.push(json);
    });
    if(arr.length==0){
      alert('套餐选择不能为空，请添加至少一个套餐');
      $(this).attr('disabled',false);
      return false;
    }
    $("#ucardm4 .cgive_ticket").each(function(k,v){
      json = {'id':$(this).attr('act_id'),'num':$(this).attr('num')};
      arr2.push(json);
    });
    var ymoney = $("#ucardm4 input[name='ymoney']").val();
    var money = $("#ucardm4 input[name='pay']").val();
    var give = $("#ucardm4 input[name='give']").val();
    var pay_type = $("#ucardm4 .upay-active").attr('payType');
    var card_ymoney = $("#ucardm4 .ccard_ymoney").text();
    var worker_id = $("#ucardm4 .cworker").val();
    var state = 1;
    if($("#ucardm4 .cfree").prop('checked')){
      state = $("#ucardm4 .cfree").val();
    }
    if(Number(money)-Number(give) > Number(card_ymoney) && pay_type == '5'){
      alert('卡里余额不足，请充值或用其它方式付款');
      $(this).attr('disabled',false);
      return false;
    }

    var data = {
          card_id:card_id,
          ymoney:ymoney,
          money:money,
          give:give,
          arr:arr,
          arr2:arr2,
          arr_give:act_give_id,
          act_decrease:use_act_decrease_id,
          pay_type:pay_type,
          worker_id:worker_id,
          state:state
        }
    // console.log(data);
    // return false;
    $.post('card_mcombo_do.php',data,function(res){
      $('.cmodalcommit4').attr('disabled',false);
      console.log(res);
      if(res=='0'){
        window.location.reload();
      }else{
        alert('购买套餐失败，请重新购买');
      }
    });
  }
  // 侧拉
  function cardInfo(card_id){
    $.getJSON('card_edit_ajax.php',{card_id:card_id},function(res){
      // console.log(res);
      $("#ucardoff1 .ccard_name").text(res.card_name);
      $("#ucardoff1 .ccard_code").text(res.card_code);
      $("#ucardoff1 .ccard_phone").text(res.card_phone);
      if(res.card_birthday_date=='1970-01-01'){
        $("#ucardoff1 .ccard_birthday_date").text('--');
      }else{
        $("#ucardoff1 .ccard_birthday_date").text(res.card_birthday_date);
      }
      if(res.card_birthday_date=='1970-01-01'){
        $("#ucardoff1 .ccard_edate").text('--');
      }else{
        $("#ucardoff1 .ccard_edate").text(res.card_edate);
      }
      $("#ucardoff1 .ccard_memo").text(res.card_memo);
      $("#ucardoff1 .ccard_ymoney").text(res.s_card_ymoney);
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
  }
  // 会员状态
  function cardState(type){
    var content = '请重新尝试';
    if(type == 'stop'){
      content = "停用失败，请重新尝试";
    }else if(type == 'normal'){
      content = "启用失败，请重新尝试";
    }else if(type == 'del'){
      content = "删除失败，请重新尝试";
    }
    var data ={
        type: type,
        card_id: $("#ucardoff1 input[name='card_id']").val()
    }
    $.post('card_state_do.php',data,function(res){
      if(res=='0'){
        window.location.reload();
      }else if(res=='3'){
        $('#ualert .ctext').html("<span class='gtext-orange am-text-large'>删除失败，有套餐或有余额</span>");
        $('#ualert').modal('open');
      }else{
        $('#ualert .ctext').html("<span class='gtext-orange am-text-large'>"+content+"</span>");
        $('#ualert').modal('open');
      }
    });
  }
  // 表单验证
  function valid(obj, elm){
    var _self = obj;
    _self.attr('disabled',true);
    // 验证变红
    $(elm).find('.cvalid').each(function(){
      if($(this).prop('tagName')=='SELECT'){
        if($(this).val()=='0'){
          $(this).addClass('am-field-error');
        }
      }else if($(this).prop('tagName')=='DIV'){
        if($(this).find('input').val()==''){
          $(this).addClass('am-field-error');
        }
      }else if($(this).prop('tagName')=='INPUT'){
        if($(this).val()==''){
          $(this).addClass('am-field-error');
        }
      }
    })
    // 验证返回
    if($(elm).find('.cvalid').hasClass("am-field-error")){
      _self.attr('disabled',false);
      return false;
    }else{
      return true;
    }
  }
  //计算合计金额
  function AllMcomboPrice(){
    var ymoney = 0;//原始总价
    var hmoney = 0;//所有商品折扣价
    var all_money = 0;//所有商品价格
    var act_money = 0;//参加活动的所有商品价格
    var rel_money = 0;//应付价
    var last_money = 0;//最终价格
    var num = 0;
    var jian = 0;//满减
    var limit_money = 0;//满减活动用于计算的money,参加活动的所有商品价格
    var give_money = $('#ucardm4 .cgive').val();//手动优惠的价格
    use_act_decrease_id.splice(0,use_act_decrease_id.length);//清空使用的满减活动
    $('#ucardm4 .ucontent4 .cgive_ticket').remove();//清空送的券
    $('#ucardm4 .cactgive').html('');
    $("#ucardm3 .uright .cnum").each(function(){
      if($(this).attr('mcombo_act') == '1'){
        act_money = Number(act_money) + Number($(this).val())*Number($(this).attr('min_price'));
      }
      all_money = Number(all_money) + Number($(this).val())*Number($(this).attr('min_price'));
      ymoney = Number(ymoney) + Number($(this).val())*Number($(this).attr('price'));
      hmoney = Number(hmoney) + Number($(this).val())*Number($(this).attr('min_price'));
      num = Number(num) + Number($(this).val());
    });
    limit_money = act_money;
    // 一次
    $.each(act_decrease_id, function(k, v){
      if(limit_money>v.act_decrease_man){
        jian = v.act_decrease_jian;
        use_act_decrease_id.push(v.act_decrease_id);//新的满减活动
        var addhtml = '<span>'+v.act_decrease_name+'</span>';
        $('#ucardm4 .cactgive').append(addhtml);
        return false;//跳出循环
      }
    })
    // 多次
    /*for(var i=0;i<act_decrease_id.length;){
      if(limit_money>act_decrease_id[i].act_decrease_man){
        limit_number = parseInt(Number(limit_money)/Number(act_decrease_id[i].act_decrease_man));//减了几次
        limit_money = Number(limit_money)%Number(act_decrease_id[i].act_decrease_man);//减过之后剩余价格
        jian = Number(jian) + Number(act_decrease_id[i].act_decrease_jian)*Number(limit_number);//总共减了多少钱
        use_act_decrease_id.push(act_decrease_id[i].act_decrease_id);//新的满减活动
      }else{
        i++;
      }
    }*/
    rel_money = Number(all_money) - Number(jian);
    rel_money = rel_money.toFixed(2);
    last_money = Number(rel_money) - Number(give_money);
    last_money = last_money > 0 ? last_money.toFixed(2) : 0;
    // 免单实付价为0
    if($("#ucardm4 .cfree").prop('checked')){
      last_money = 0;
    }
    //满送，减手动优惠价
    limit_money = Number(act_money) - Number(give_money);
    // console.log(limit_money);
    // 没有免单
    if(!$("#ucardm4 .cfree").prop('checked')){
      var give_data = {
        limit_money:limit_money,
        act_give:act_give_id
      }
      var addhtml = '';
      $.getJSON('card_act_give_ticket_ajax.php',give_data,function(res){
        // console.log(res);
        if(res){
          $.each(res, function(k,v){
            // console.log(k);//活动id
            var act_id = k;
            // console.log(v);
            $.each(v, function(k,v){
              addhtml = '<span class="am-badge am-badge-success am-radius am-text-default uticket-show cgive_ticket" act_id="'+act_id+'" num="'+v+'">'+k+'*'+v+'</span>';
              $('#ucardm4 .ucontent4').append(addhtml);
            })
          });
        }
      });
    }
    ymoney = ymoney.toFixed(2);
    hmoney = hmoney.toFixed(2);
    $("#ucardm3 .cymoney").text(ymoney);
    $("#ucardm3 .chmoney").text(hmoney);
    $("#ucardm4 .cymoney").text(hmoney);
    $("#ucardm4 .cheji").val(ymoney);
    $("#ucardm4 .cpay").val(rel_money);
    $("#ucardm4 .relmoney").text(last_money);
    $("#ucardm3 .cmcombo_num").text(num);
  }
  // 真实价格
  function mcomboPrice(mcombo_id){
    var dtd = $.Deferred();// 新建一个Deferred对象
    var data = {
      mcombo_id:mcombo_id,
      card_id:$(".cmodalopen4").val(),
      act_discount_id:act_discount_id
    };
    $.ajax({
      url:'goods_price_ajax.php',
      data:data,
      type:"POST",
      dataType:"json"
    }).then(function(res){
      mcombo = res;
      dtd.resolve();
    })
    return dtd.promise();
  }
  // 添加套餐
  function cadd(){
    var product = $(this).prev().text();
    var mcombo_name = product.slice(0,product.indexOf("("));
    var price = $(this).prev().attr('price');
    var mcombo_id = $(this).prev().attr('mcombo_id');
    var mcombo_act = $(this).prev().attr('mcombo_act');
    var key = new Date().getTime();
    var addhtml = '';
    // var flag = true;
    // $('#ucardm3 .cnum').each(function(){
    //   if(mcombo_id == $(this).attr('mcombo_id')){
    //     flag = false;
    //   }
    // })
    // if(!flag){
    //   return false;//添加过了后面不在执行
    // }
    $.when(mcomboPrice(mcombo_id))
      .then(function(){
        var dtd = $.Deferred();// 新建一个Deferred对象
        product = mcombo_name+'(<span class="gtext-line">￥'+price+'</span>，<span>￥'+mcombo.min_price+'</span>)';
        addhtml ='<li><div class="uc1">'+product+'</div><div class="uc2"><a href="javascript:;" class="uc2a cbtndec"><i class="am-icon-minus"></i></a><input type="text" key="'+key+'" mcombo_id="'+mcombo_id+'" mcombo_act="'+mcombo_act+'" price="'+price+'" min_price="'+mcombo.min_price+'" act_discount_id="'+mcombo.act_discount_id+'" class="uinput2 uinput-35 cnum" value="1"><a href="javascript:;" class="uc2b cbtnplus"><i class="am-icon-plus"></i></a></div><div class="uc3 cdel2" key="'+key+'"><a href="javascript:;">移除</a></div></li>';
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
            if(v.mcombo_goods_count!=0){
              cont +=v.mgoods_name+'('+v.mcombo_goods_count+'),';
            }else{
              cont +=v.mgoods_name+',';
            }
          })
          cont = cont.substr(0,cont.length-1);
          var addtr = '<tr><td class="gtext-overflow cproduct">'+product+'</td><td class="gtext-overflow" title="'+cont+'">'+cont+'</td><td><span class="gtext-orange">(￥'+price+'，￥'+mcombo.min_price+')</span></td><td><a href="javascript:;" class="uc2a cbtndec"><i class="am-icon-minus"></i></a><input type="text" class="uinput2 uinput-35 cnum" mcombo_id="'+mcombo_id+'" key="'+key+'" value="1"><a href="javascript:;" class=" uc2b cbtnplus"><i class="am-icon-plus"></i></a></td><td><a href="javascript:;" class="am-text-primary cdel" key="'+key+'">移除</a></td></tr>'
          $('#ucardm4 table tbody').append(addtr);
          $('#ucardm4 .cproduct').popover({
             content: mcombo_name+'(￥'+price+'，￥'+mcombo.min_price+')',
             trigger: 'hover'
           })
          $("#ucardm3 .uright .cnum").on("input propertychange",AllMcomboPrice);
          $("#ucardm4 .cnum").on("input propertychange",function(){
            $("#ucardm3 .uright .cnum[mcombo_id='"+$(this).attr('mcombo_id')+"']").val($(this).val());
            AllMcomboPrice();
          });
          dtd.resolve();
        })
        return dtd.promise();
      }).then(function(){
        AllMcomboPrice();
      })
  }
  // 扫码添加
  function cadd2(){
    var mcombo_code = $('.cmcombo_code').val();
    var product = '';
    var price = '';
    var cprice = '';
    var mcombo_id = '';
    var mcombo_name = '';
    var mcombo_act = '';
    var key = new Date().getTime();
    var addhtml = '';
    $.ajax({
      url:'card_mcombo_ajax3.php',
      data:{
        mcombo_code:mcombo_code
      },
      type:"GET",
      dataType:"json"
    }).then(function(res){
      // console.log(res);
      price = res.mcombo_price;
      cprice = res.mcombo_cprice;
      mcombo_id = res.mcombo_id;
      mcombo_name = res.mcombo_name;
      mcombo_act = res.mcombo_act;
      $.when(mcomboPrice(mcombo_id))
        .then(function(){
          product = mcombo_name+'(<span class="gtext-line">￥'+price+'</span>，<span>￥'+mcombo.min_price+'</span>)';
          var dtd = $.Deferred();// 新建一个Deferred对象
          addhtml ='<li><div class="uc1">'+product+'</div><div class="uc2"><a href="javascript:;" class="uc2a cbtndec"><i class="am-icon-minus"></i></a><input type="text" key="'+key+'" mcombo_id="'+mcombo_id+'" mcombo_act="'+mcombo_act+'" price="'+price+'" min_price="'+mcombo.min_price+'" act_discount_id="'+mcombo.act_discount_id+'" class="uinput2 uinput-35 cnum" value="1"><a href="javascript:;" class="uc2b cbtnplus"><i class="am-icon-plus"></i></a></div><div class="uc3 cdel2" key="'+key+'"><a href="javascript:;">移除</a></div></li>';
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
              if(v.mcombo_goods_count!=0){
                cont +=v.mgoods_name+'('+v.mcombo_goods_count+'),';
              }else{
                cont +=v.mgoods_name+',';
              }
            })
            cont = cont.substr(0,cont.length-1);
            var addtr = '<tr><td class="gtext-overflow cproduct">'+product+'</td><td class="gtext-overflow" title="'+cont+'">'+cont+'</td><td><span class="gtext-orange">(￥'+price+'，￥'+mcombo.min_price+')</span></td><td><a href="javascript:;" class="uc2a cbtndec"><i class="am-icon-minus"></i></a><input type="text" class="uinput2 uinput-35 cnum" mcombo_id="'+mcombo_id+'" key="'+key+'" value="1"><a href="javascript:;" class=" uc2b cbtnplus"><i class="am-icon-plus"></i></a></td><td><a href="javascript:;" class="am-text-primary cdel" key="'+key+'">移除</a></td></tr>'
            $('#ucardm4 table tbody').append(addtr);
            $('#ucardm4 .cproduct').popover({
               content: mcombo_name+'(￥'+price+'，￥'+mcombo.min_price+')',
               trigger: 'hover'
             })
            $("#ucardm3 .uright .cnum").on("input propertychange",AllMcomboPrice);
            $("#ucardm4 .cnum").on("input propertychange",function(){
              $("#ucardm3 .uright .cnum[mcombo_id='"+$(this).attr('mcombo_id')+"']").val($(this).val());
              AllMcomboPrice();
            });
            dtd.resolve();
          })
          return dtd.promise();
        }).then(function(){
          AllMcomboPrice();
        })
    });
  }
  function mcomboNumPlus(obj){
    var _self= obj.siblings('input');
    var key = _self.attr('key');
    $("input[key="+key+"]").val(parseInt(_self.val())+1);
    AllMcomboPrice();
  }
  function mcomboNumDec(obj){
    var _self= obj.siblings('input');
    var key = _self.attr('key');
    $("input[key="+key+"]").val(parseInt(_self.val())-1);
    AllMcomboPrice();
  }
  // 删除之前参与套餐信息
  function delMcombo(){
    $('#ucardm3 .uright .uc li').remove();
    $('#ucardm3 .cymoney').text(0);
    $('#ucardm3 .chmoney').text(0);
    $('#ucardm3 .cmcombo_num').text(0);
    $('#ucardm4 .utable1 tbody tr').remove();
    $('#ucardm4 .cpay').val('');
    $('#ucardm4 .cgive').val('');
    $('#ucardm4 .cymoney').text(0);
    $('#ucardm4 .relmoney').text(0);
    $('#ucardm4 .cgive_ticket').remove();
    $('#ucardm4 .cactgive').html('');
  }
  // init
  (function init(){
    // cvalid
    $('input.cvalid').on('input propertychange blur', function(){
      $(this).val()==''?$(this).addClass('am-field-error'):$(this).removeClass('am-field-error');
    });
    // select cvalid
    $('select.cvalid').on('change', function(){
      $(this).val()=='0'?$(this).addClass('am-field-error'):$(this).removeClass('am-field-error');
    });
    //上传文件
    $(".cphoto").on('change',function(){
      var img = $(this).siblings('img');
      var file = this.files[0];
      if(window.FileReader) {
          var fr = new FileReader();
          fr.onloadend = function(e) {
            img.attr('src',e.target.result);
          }
          fr.readAsDataURL(file);
      }
    });
    //付款方式
    $('.upay').on('click',function(){
      $(this).addClass('upay-active').siblings().removeClass('upay-active');
    });
    // + -
    $(document).on("click", ".cbtndec", function() {
      mcomboNumDec($(this));
    });
    $(document).on("click", ".cbtnplus", function() {
      mcomboNumPlus($(this));
    });
    //删除购买套餐modal套餐
    $(document).on("click",".cdel2",function(){
      $(".cdel[key="+$(this).attr('key')+"]").parent().parent().remove();
      $(this).parent().remove();
      AllMcomboPrice();
    });
    //删除购买套餐完成modal套餐
    $(document).on("click",".cdel",function(){
      $(".cdel2[key="+$(this).attr('key')+"]").parent().remove();
      $(this).parent().parent().remove();
      AllMcomboPrice();
    });
    //新增会员
    $('.cmodalopen1').on('click', function(e) {
      $('#ucardm1').modal('open');
      $('#ucardm1 input').eq(0).focus();
    });
    //是否启用密码
    $('.cispwd').on('click',function(){
      if($(this).val() == 1){
        $('.callow').attr('disabled',false);
      }else{
        $('.callow').attr('disabled',true);
      }
    });
    //card新增提交信息
    $('.ccardaddsubmit').on('click',function(){
      if(valid($(this), '#ucardm1')){
        cardAdd();
      }
    });
    //会员修改
    $('.cmodalopen1-1').on('click', function(){
      cardEditShow($(this));
    });
    //card修改提交信息
    $('.ccardeditsubmit').on('click',function(){
      if(valid($(this), '#ucardm1-1')){
         cardEdit();
      }
    });
    //会员充值
    $('.cmodalopen2').on('click', function(){
      cardRechargeShow($(this));
    });
    // 关闭弹出框时删除select
    $('#ucardm2').on('close.modal.amui', function(){
      $('#ucardm2 .ccard_type').selected('destroy');
    });
    //改变会员卡折扣
    $('#ucardm2 .ccard_type').on('change',function(){
      var discount = $(this).find("option:selected").attr('discount');
      $("#ucardm2 .ccard_type_discount").text(discount);
    })
    //充值填充金额
    $("#ucardm2 input[name='money']").keyup(function(){
      $("#ucardm2 .call_money").text($(this).val());
      var relmoney = $("#ucardm2 input[name='cash']").val()==''?0:$("#ucardm2 input[name='cash']").val();
      $("#ucardm2 .cgive_money").text($(this).val()-relmoney);
    });
    $("#ucardm2 input[name='cash']").keyup(function(){
      var allmoney = $("#ucardm2 input[name='money']").val()==''?0:$("#ucardm2 input[name='money']").val();
      var givemoney = Number(allmoney)-Number($(this).val());
          givemoney = givemoney > 0 ? givemoney : 0;
      $("#ucardm2 .cgive_money").text(givemoney);
    });
    //会员充值提交
    $('.ccardrechargesubmit').on('click',function(){
      if(valid($(this), '#ucardm2')){
         cardRecharge();
      }
    });
    //购买套餐
    $('.cmodalopen3').on('click', function() {
      delMcombo();
      var card_id = $(this).val();
      $('#ucardm4 .cmodalcommit4').val(card_id);
      if(cardstate.success && cardstate.card_id == card_id){
        cardMcomboShow(card_id);
      }else{
        cardPassword(card_id);
      }
    });
    //验证密码
    $('.cpwd-btn').on('click', function() {
      cardPasswordDo();
    });
    // 添加套餐
    $(".cadd").on('click',cadd);
    $(".cmcombo_code_search").on('click',cadd2);
    //套餐查询
    $('#ucardm3 .csearch_mcombo').on('click', mcomboSearch);
    //返回上一步
    $('.cmodalopen3up').on('click', function() {
      $('#ucardm4').modal('close');
      $('#ucardm3').modal('open');
      $('#ucardm3 input').eq(0).focus();
    });

    $("#ucardm4 input[name='give']").on("input propertychange",AllMcomboPrice);
     //购买套餐完成
    $('.cmodalopen4').on('click', function() {
      var card_id = $(this).val();
      $('#ucardm3').modal('close');
      cardMcomboShow2(card_id);
    });
    //免单
    $("#ucardm4 .cfree").on('click', AllMcomboPrice);
    // 购买套餐完成提交
    $('.cmodalcommit4').on('click', function() {
      $(this).attr('disabled',true);
      cardMcomboDo();
    })
    //侧拉打开
    $('.coffopen').on('click', function() {
      var card_id = $(this).attr('cardid');
      cardInfo(card_id);
      $('#ucardoff1').offCanvas('open');
    });
    //侧拉停用card
    $(document).on("click",".ccardstop",function(){
      $('#cconfirm2').modal({
        onConfirm: function(options) {
          cardState('stop');
        },
        onCancel: function() {
          return false;
        }
      });
    });
    //侧拉重新启用card
    $(document).on("click",".ccardnormal",function(){
      $('#cconfirm3').modal({
        onConfirm: function(options) {
          cardState('normal');
        },
        onCancel: function() {
          return false;
        }
      });
    });
    //侧拉删除card
    $('.ccarddel').on('click', function() {
      $('#cconfirm1').modal({
        onConfirm: function(options) {
          cardState('del');
        },
        onCancel: function() {
          return false;
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
  })();
})()
</script>
</body>
</html>