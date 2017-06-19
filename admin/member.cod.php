<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>
<!-- content -->
<div class="gcontent" id="umember">
  <ul class="am-nav am-nav-pills ubread">
	  <li class="am-active"><a href="member.html">会员管理</a></li>
	  <li><a href="#">过期会员</a></li>
	  <li><a href="#">回收站</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="utools">
    <form class="am-form-inline uform2">
      <div class="am-form-group">
        <label for="doc-ipt-3" class="am-form-label">开卡店铺：</label>
        <select class="uselect uselect-auto" data-am-selected name="">
          <option value="all">全部</option>
          <option value="2">2</option>
          <option value="3">3</option>
        </select>
      </div>
      <div class="am-form-group">
        <label for="doc-ipt-3" class="am-form-label">卡类型：</label>
        <select class="uselect uselect-auto" data-am-selected name="">
           <option value="all">全部</option>
           <option value="2">2</option>
           <option value="3">3</option>
        </select>
      </div>
      <div class="am-form-group">
        <label for="doc-ipt-3" class="am-form-label">搜索：</label>
        <input type="text" class="am-form-field uinput uinput-220" placeholder="卡号/手机号/姓名" name="">
      </div>
      <div class="am-form-group">
        <button type="submit" class="am-btn ubtn-search">
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
        <td data-am-offcanvas="{target: '#umemberoff1'}"><a href="">ahh120</a></td>
        <td data-am-offcanvas="{target: '#umemberoff1'}"><a href="">刘艳芳</a></td>
        <td>12344920013</td>
        <td>女</td>
        <td>1983-05-16</td>
        <td>2015-06-18</td>
        <td>钻石卡</td>
        <td><span class="gtext-orange">10</span>折</td>
        <td>2017-06-18</td>
        <td>正常</td>
        <td>解放路分店</td>
        <td><a href="e-record.php">电子档案</a></td>
        <td><a href="#">消费明细</a></td>
        <td>
          <button class="am-btn ubtn-table ubtn-orange cmodelopen2">
            <i class="iconfont icon-chongzhi"></i>
             充值
          </button>&nbsp;
          <button class="am-btn ubtn-table ubtn-orange cmodelopen3">
            <i class="iconfont icon-liwu"></i>
            买套餐
          </button>
        </td>
      </tr>
      <tr>
        <td colspan="15" class="utable-text">余额：<span class="gtext-orange">￥5680.8</span>，剩余积分：<span class="gtext-orange">1234</span>，套餐余：【中医问诊(<span class="gtext-orange">5</span>次)，经络疏通-专家(<span class="gtext-orange">6</span>次)，艾灸(<span class="gtext-orange">6</span>次) ，到期时间：2017-12-15】</td>
      </tr>
      <tr>
        <td colspan="15" class="utable-text">累计消费：<span class="gtext-orange">10331</span>元，累计赠送：<span class="gtext-orange">568.8</span>元，累计积分：<span class="gtext-orange">89634</span>元</td>
      </tr>
    </tbody>
  </table>
  <div class="gspace15"></div>
  <ul class="am-pagination am-pagination-centered upages">
    <li class="upage-info">共1页 3条记录</li>
    <li class="am-disabled"><a href="#">&laquo;</a></li>
    <li class="am-active"><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">&raquo;</a></li>
  </ul>
</div>

<!-- 新增会员 -->
<div id="umemberm1" class="am-modal" tabindex="-1">
  <div class="am-modal-dialog umodal">
    <div class="am-modal-hd uhead">新增会员
      <a href="javascript:void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd">
      <form class="am-form">
        <div class="uborder">
          <span class="uborder-title">会员基本信息</span>
            <div class="am-form-group">
              <label class="am-form-label umodal-label"><span class="gtext-orange">*</span>会员姓名：</label>
              <div class="umodal-normal">
                <input type="text" class="am-form-field uinput uinput-max">
              </div>
              <div class="umodal-search">&nbsp;</div>
              <label class="am-form-label umodal-label"><span class="gtext-orange">*</span>性别：</label>
              <div class="umodal-normal am-text-left">
                <label class="am-radio-inline">
                  <input type="radio" name="radio1" value="0" data-am-ucheck> 男
                </label>
                <label class="am-radio-inline">
                  <input type="radio" name="radio1" value="1" data-am-ucheck> 女
                </label>
                <label class="am-radio-inline">
                  <input type="radio" name="radio1" value="2" data-am-ucheck> 保密
                </label> 
              </div>
              <label class="am-form-label umodal-label"><span class="gtext-orange">*</span>手机号码：</label>
              <div class="umodal-normal">
                <input type="text" class="am-form-field uinput uinput-max">
              </div>
              <div class="umodal-search">&nbsp;</div>
              <label class="am-form-label umodal-label">出生日期：</label>
              <div class="umodal-normal">
                <div class="am-input-group am-datepicker-date udatepicker udatepicker-max" data-am-datepicker="{format:'yyyy-mm-dd'}">
                  <input id="date1" type="text" class="am-form-field">
                  <span class="am-input-group-btn am-datepicker-add-on">
                    <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span></button>
                  </span>
                </div>
              </div>
              <label class="am-form-label umodal-label">启用密码：</label>
              <div class="umodal-normal am-text-left">
                <label class="am-radio-inline">
                  <input class="cispwd" type="radio" name="radio2" value="0" data-am-ucheck> 是
                </label>
                <label class="am-radio-inline">
                  <input class="cispwd" type="radio" name="radio2" value="1" data-am-ucheck checked> 否
                </label>
              </div>
              <div class="umodal-search">&nbsp;</div>
              <label class="am-form-label umodal-label">输入密码：</label>
              <div class="umodal-normal">
                <input type="text" class="am-form-field uinput uinput-max callow" disabled>
              </div>
            </div>
            <div class="am-form-file uphoto">
              <img id="cimg" src="../img/li.jpg">
              <a class="am-btn am-btn-gray am-btn-sm">
                <i class="am-icon-cloud-upload"></i> 点击上传</a>
              <input id="doc-form-file" type="file" multiple>
            </div>
            <div style="clear:both;"></div>
        </div>
        <div class="uborder">
          <span class="uborder-title">会员卡信息</span>
            <div class="am-form-group">
              <label class="am-form-label umodal-label">会员卡号：</label>
              <div class="umodal-normal">
                <input type="text" class="am-form-field uinput uinput-max">
              </div>
              <div class="umodal-search">&nbsp;</div>
              <label class="am-form-label umodal-label">ID号：</label>
              <div class="umodal-normal">
                <input type="text" class="am-form-field uinput uinput-max">
              </div>
              <label class="am-form-label umodal-label">到期时间：</label>
              <div class="umodal-normal">
                <div class="am-input-group am-datepicker-date udatepicker udatepicker-max" data-am-datepicker="{format:'yyyy-mm-dd'}">
                  <input id="date1" type="text" class="am-form-field">
                  <span class="am-input-group-btn am-datepicker-add-on">
                    <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span></button>
                  </span>
                </div>
              </div>
              <div class="umodal-search">&nbsp;</div>
              <label class="am-form-label umodal-label">微信：</label>
              <div class="umodal-normal">
                <input type="text" class="am-form-field uinput uinput-max">
              </div>
            </div>
            <div style="clear:both;"></div>
        </div>
        <div class="uborder">
          <span class="uborder-title">更多会员信息</span>
            <div class="am-form-group">
              <label class="am-form-label umodal-label">身份证号：</label>
              <div class="umodal-normal">
                <input type="text" class="am-form-field uinput uinput-max">
              </div>
              <div class="umodal-search">&nbsp;</div>
              <label class="am-form-label umodal-label">车牌：</label>
              <div class="umodal-normal">
                <input type="text" class="am-form-field uinput uinput-max">
              </div>
              <label class="am-form-label umodal-label">联系人：</label>
              <div class="umodal-normal">
                <input type="text" class="am-form-field uinput uinput-max">
              </div>
              <div class="umodal-search">&nbsp;</div>
              <label class="am-form-label umodal-label">服务员：</label>
              <div class="umodal-normal">
                <select class="uselect uselect-max" data-am-selected>
                  <option value="a">Apple</option>
                  <option value="b">Banana</option>
                  <option value="o">Orange</option>
                  <option value="m">Mango</option>
                  <option value="d">禁用</option>
                </select>
              </div>
              <label class="am-form-label umodal-label">备注：</label>
              <div class="umodal-max">
               <input type="text" class="am-form-field uinput uinput-max">
              </div>
              <div style="clear:both;"></div>
            </div>
            <div style="clear:both;"></div>
        </div>
      </form>
    </div>
    <div class="am-modal-footer ufoot">
      <div class="am-btn-group">
        <button type="button" class="am-btn ubtn-sure ubtn-green"><i class="iconfont icon-xiangyou2"></i>
          完成
        </button>
      </div>
    </div>
  </div>
</div>
<!-- 会员充值 -->
<div id="umemberm2" class="am-modal" tabindex="-1">
  <div class="am-modal-dialog umodal">
    <div class="am-modal-hd uhead">会员充值
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd umain1">
      <div class="am-g ucontent">
        <div class="am-u-lg-4">会员卡号：1000125</div>
        <div class="am-u-lg-4">会员姓名：张三</div>
        <div class="am-u-lg-4">手机号码：13700824417</div>
        <div class="am-u-lg-4">卡余额：<span class="am-text-lg gtext-orange">0.00</span>元</div>
        <div class="am-u-lg-4">会员卡类型：
          <select data-am-selected class="uselect">
            <option value="a" selected>请选择类型</option>
            <option value="b" >Banana</option>
            <option value="o">Orange</option>
            <option value="m">Mango</option>
            <option value="d">禁用</option>
          </select>
        </div>
        <div class="am-u-lg-4">会员折扣：<span class="am-text-lg gtext-orange">7</span>折</div>
      </div>
      <div class="gspace15"></div>
      <div class="utitle">充值金额</div>
      <div class="am-form-group ucontent2">
        <div class="umodal-text" style="padding-left:20px; line-height:43px;">实收金额：</div>
        <div class='umodal-text'>
          <input id="" class="am-form-field umoneyinput" type="text" placeholder="请输入金额">&nbsp;&nbsp;元
        </div>
        <label class="umodal-search">&nbsp;</label>
        <div class="umodal-text" style="line-height:43px;">赠送金额：</div>
        <div class='umodal-text'>
          <input id="" class="am-form-field umoneyinput" type="text" placeholder="0.0">&nbsp;&nbsp;元
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
        <button type="button" class="am-btn ubtn-sure ubtn-green"><i class="iconfont icon-yuanxingxuanzhong"></i>
          完成
        </button>
      </div>
    </div>
  </div>
</div>
<!-- 购买套餐 -->
<div id="umemberm3" class="am-modal" tabindex="-1">
  <div class="am-modal-dialog umodal">
    <div class="am-modal-hd uhead">购买套餐
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd umain1">
      <div class="am-g ucontent" style="margin:0 2%; width:95%;">
        <div class="am-u-lg-4">会员卡号：1000125</div>
        <div class="am-u-lg-4">会员姓名：张三</div>
        <div class="am-u-lg-4">手机号码：3700824417</div>
        <div class="am-u-lg-4">卡余额：<span class="am-text-lg gtext-orange">0.00</span>元</div>
        <div class="am-u-lg-4">会员卡类型：打折卡</div>
        <div class="am-u-lg-4 am-u-end">会员折扣：<span class="am-text-lg gtext-orange">8</span>折</div>
      </div>
      <div class="gspace10"></div>
      <div class="am-tabs uleft" data-am-tabs="{noSwipe: 1}">
        <ul class="am-tabs-nav am-nav am-nav-tabs">
          <li class="am-active"><a href="#tab1">添加套餐</a></li>
          <li><a href="#tab2">扫码添加套餐</a></li>
        </ul>
        <div class="am-tabs-bd">
          <div class="am-tab-panel am-active" id="tab1">
            <div class="ua"><span class="ua1">分类/名称</span><span class="ua2">操作</span></div>
            <div class="am-form-group ub">
              <form action="">
                <div class="umodal-normal ub1">
                  <input id="" class="am-form-field uinput uinput-max" type="text" placeholder="">
                </div>
                <div class="umodal-search ub2">
                  <button type="button" class="am-btn ubtn-search2 ubtn-green">
                    <i class="iconfont icon-search"></i>
                    查询
                  </button>
                </div>
              </form>
            </div>
            <ul class="uc" style="height:300px;">
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
        <ul class="ub-head">
          <li class="ub-head1">名称</li>
          <li class="ub-head2">数量</li>
          <li class="ub-head2">操作</li>
        </ul>
        <ul class="ub" style="height:336px;">
          <li>
            <div class="ub1">基础套餐</div>
            <div class="ub2" style="padding-top:3px;">
              <a href="javascript:;" class="ufont1 cbtndec"><i class="am-icon-minus"></i></a>
              <input type="text" name="" class="uinput" value="0">
              <a href="javascript:;" class="ufont1 cbtnplus"><i class="am-icon-plus"></i></a>
            </div>
            <div class="ub3 cdel2"><a href="javascript:;">移除</a></div>
          </li>
        </ul>
      </div>
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
<div id="umemberm4" class="am-modal" tabindex="-1">
  <div class="am-modal-dialog umodal">
    <div class="am-modal-hd uhead">购买套餐
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd umain1">
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
                  <td><a href="javascript:;" class="ufont1 cbtndec"><i class="am-icon-minus"></i></a><input type="text" name="adcd" class="uinputmin1" value="1"><a href="javascript:;" class="ufont1 cbtnplus"><i class="am-icon-plus" aria-hidden="true"></i></a></td>
                  <td><a href="javascript:;" class="am-text-primary cdel">移除</a></td>
              </tr>
              <tr>
                  <td>健康丽人</td>
                  <td>理疗6次，颈肩理疗10次，艾灸30次，其它赠送10次</td>
                  <td><span class="gtext-orange">￥8888</span></td>
                  <td><a href="javascript:;" class="ufont1 cbtndec"><i class="am-icon-minus"></i></a><input type="text" name="adcd" class="uinputmin1" value="1"><a href="javascript:;" class="ufont1 cbtnplus"><i class="am-icon-plus"></i></a></td>
                  <td><a href="javascript:;" class="am-text-primary cdel">移除</a></td>
              </tr>
              <tr>
                  <td>套餐3</td>
                  <td>理疗6次，颈肩理疗10次，艾灸30次，其它赠送10次</td>
                  <td><span class="gtext-orange">￥688</span></td>
                  <td><a href="javascript:;" class="ufont1 cbtndec"><i class="am-icon-minus"></i></a><input type="text" name="adcd" class="uinputmin1" value="1"><a href="javascript:;" class="ufont1 cbtnplus"><i class="am-icon-plus"></i></a></td>
                  <td><a href="javascript:;" class="am-text-primary cdel">移除</a></td>
              </tr>
              <tr>
                  <td>套餐3</td>
                  <td>理疗6次，颈肩理疗10次，艾灸30次，其它赠送10次</td>
                  <td><span class="gtext-orange">￥688</span></td>
                  <td><a href="javascript:;" class="ufont1 cbtndec"><i class="am-icon-minus"></i></a><input type="text" name="adcd" class="uinputmin1" value="1"><a href="javascript:;" class="ufont1 cbtnplus"><i class="am-icon-plus"></i></a></td>
                  <td><a href="javascript:;" class="am-text-primary cdel">移除</a></td>
              </tr>
              <tr>
                  <td>套餐3</td>
                  <td>理疗6次，颈肩理疗10次，艾灸30次，其它赠送10次</td>
                  <td><span class="gtext-orange">￥688</span></td>
                  <td><a href="javascript:;" class="ufont1 cbtndec"><i class="am-icon-minus"></i></a><input type="text" name="adcd" class="uinputmin1" value="1"><a href="javascript:;" class="ufont1 cbtnplus"><i class="am-icon-plus"></a></td>
                  <td><a href="javascript:;" class="am-text-primary cdel">移除</a></td>
              </tr>
              <tr>
                  <td>套餐3</td>
                  <td>理疗6次，颈肩理疗10次，艾灸30次，其它赠送10次</td>
                  <td><span class="gtext-orange">￥688</span></td>
                  <td><a href="javascript:;" class="ufont1 cbtndec"><i class="am-icon-minus"></i></a><input type="text" name="adcd" class="uinputmin1" value="1"><a href="javascript:;" class="ufont1 cbtnplus"><i class="am-icon-plus"></i></a></td>
                  <td><a href="javascript:;" class="am-text-primary cdel">移除</a></td>
              </tr>
              <tr>
                  <td>套餐3</td>
                  <td>理疗6次，颈肩理疗10次，艾灸30次，其它赠送10次</td>
                  <td><span class="gtext-orange">￥688</span></td>
                  <td><a href="javascript:;" class="ufont1 cbtndec"><i class="am-icon-minus"></i></a><input type="text" name="adcd" class="uinputmin1" value="1"><a href="javascript:;" class="ufont1 cbtnplus"><i class="am-icon-plus"></i></a></td>
                  <td><a href="javascript:;" class="am-text-primary cdel">移除</a></td>
              </tr>
              <tr>
                  <td>套餐3</td>
                  <td>理疗6次，颈肩理疗10次，艾灸30次，其它赠送10次</td>
                  <td><span class="gtext-orange">￥688</span></td>
                  <td><a href="javascript:;" class="ufont1 cbtndec"><i class="am-icon-minus"></i></a><input type="text" name="adcd" class="uinputmin1" value="1"><a href="javascript:;" class="ufont1 cbtnplus"><i class="am-icon-plus"></i></a></td>
                  <td><a href="javascript:;" class="am-text-primary cdel">移除</a></td>
              </tr>
          </tbody>
        </table>
      </div>
      <div class="utitle">付款金额</div>
      <div class="am-form-group ucontent2">
        <div class="umodal-text" style="padding-left:20px; line-height:43px;">应付金额：</div>
        <div class='umodal-text'>
          <input id="" class="am-form-field umoneyinput" type="text" placeholder="请输入金额">&nbsp;&nbsp;元
        </div>
        <label class="umodal-search">&nbsp;</label>
        <div class="umodal-text" style="line-height:43px;">手动优惠：</div>
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
<div id="umemberoff1" class="am-offcanvas">
  <div class="am-offcanvas-bar am-offcanvas-bar-flip goffcanvas">
    <div class="am-offcanvas-content" >
      <div class="am-modal-hd"><span class="utitle">会员明细</span>
        <a href="javascript: void(0)" class="am-close am-close-spin uclose2 coffcanvas1" data-rel="close"><img src="../img/close.jpg"></a>
      </div>
      <div class="gspace15"></div>
      <div class="am-g">
        <div class="am-u-lg-6">会员姓名：<span>张三</span></div>
        <div class="am-u-lg-6">手机号码：<span>3700824417</span></div>
        <div class="am-u-lg-6">会员卡号：<span>a123212</span></div>
        <div class="am-u-lg-6">性别：<span>男</span></div>
        <div class="am-u-lg-6">出生日期：<span>1992-04-20</span></div>
        <div class="am-u-lg-6">到期时间：<span>2017-06-20</span></div>
        <div class="am-u-lg-6">联系地址：<span>无</span></div>
        <div class="am-u-lg-6">余额：<font class="gtext-orange">0.00</font><span>元</span></div>
        <div class="am-u-lg-12">备注：<span>无</span></div>
        <div class="am-u-lg-12"></div>
        <div>
          <button class="am-btn ubtn-sure ubtn-gray ubutton1">
            <i class="iconfont icon-shanchu"></i>
            删除
          </button>
          <button class="am-btn ubtn-sure ubtn-red ubutton2">
            <i class="iconfont icon-question"></i>
            停用
          </button>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="../js/jquery.min.js"></script>
<script src="../js/amazeui.min.js"></script>
<script type="text/javascript">
$(function() {
    //新增会员
    $('.cmodelopen1').on('click', function(e) {
            $('#umemberm1').modal('open');
            $('#umemberm1 input').eq(0).focus();
    });
    // 选填密码
    $('.cispwd').on('click',function(){
      if($(this).val()==0){
        $('.callow').attr('disabled',false);
      }else{
        $('.callow').attr('disabled',true);
      }
    })
    //会员充值
    $('.cmodelopen2').on('click', function(e) {
            $('#umemberm2').modal('open');
            $('#umemberm2 input').eq(0).focus();
    });
    //购买套餐
    $('.cmodelopen3').on('click', function(e) {
            $('#umemberm2').modal('close');
            if(true){
              // 有会员卡密码
              $('#upwd-alert').modal('open');
            }else{
              // 无密码
              $('#umemberm3').modal('open');
              $('#umemberm3 input').eq(0).focus();
            }
            
    });
    // 返回上一步
    $('.cmodelopen3up').on('click', function(e) {
      $('#umemberm4').modal('close');
      $('#umemberm3').modal('open');
      $('#umemberm3 input').eq(0).focus();
    });
    // 确认密码
    $('.cpwd-btn').on('click', function(e) {
            if(true){
              // 密码正确
              $('#umemberm3').modal('open');
              $('#umemberm3 input').eq(0).focus();
            }else{
              // 密码错误
              return 0;
            }
            
    });
     //购买套餐完成
    $('.cmodelopen4').on('click', function(e) {
            $('#umemberm3').modal('close');
            $('#umemberm4').modal('open');
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

    //侧拉关闭
    $('.coffcanvas1').on('click', function() {
      $('#umemberoff1').offCanvas('close');
    });
    //去掉禁止选中
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