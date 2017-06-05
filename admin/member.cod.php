<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>
<!-- content -->
<div class="gcontent" id="umember">
  <ul class="am-nav am-nav-pills ubread">
	  <li class="am-active"><a href="user.html">会员管理</a></li>
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
        <td>到期时间</td>
        <td>积分</td>
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
        <td>2017-06-18</td>
        <td>625</td>
        <td>正常</td>
        <td>解放路分店</td>
        <td><a href="e-record.php">电子档案</a></td>
        <td><a href="#">消费明细</a></td>
        <td>
          <button class="am-btn ubtn-table ubtn-orange cmodelopen2">
            <i class="iconfont icon-chongzhi"></i>
             充值
          </button>
          &nbsp;
          <button class="am-btn ubtn-table ubtn-orange cmodelopen3">
            <i class="iconfont icon-liwu"></i>
            买套餐
          </button>
        </td>
      </tr>
      <tr>
        <td colspan="13" class="utable-text">卡类型：<span class="am-badge am-badge-secondary am-text-sm ubadge1">白金型</span>，卡折扣：<span class="gtext-orange">10</span>折，余：<span class="gtext-orange">￥5680.8</span>，积分：<span class="gtext-orange">1234</span>，套餐：【中医问诊(<span class="gtext-orange">5</span>次)，经络疏通-专家(<span class="gtext-orange">6</span>次)，艾灸(<span class="gtext-orange">6</span>次) ，到期时间：2017-12-15】</td>
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
    <div class="am-modal-bd umain1">
      <form class="am-form am-form-horizontal">
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for=""><span class="gtext-orange">*</span>会员姓名：</label>
          <div class="umodal-normal">
            <input type="text" class="am-form-field uinput uinput-max">
          </div>
          <div class="umodal-search">&nbsp;</div>
          <label class="umodal-label am-form-label" for=""><span class="gtext-orange">*</span>手机号码：</label>
          <div class="umodal-normal">
            <input type="text" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">车牌：</label>
          <div class="umodal-normal">
            <input type="text" class="am-form-field uinput uinput-max">
          </div>
          <div class="umodal-search">&nbsp;</div>
          <label class="umodal-label am-form-label" for="">联系人：</label>
          <div class="umodal-normal">
            <input type="text" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group ">
          <label class="umodal-label am-form-label">照片：</label>
          <div class="umodal-normal am-form-file am-text-left">
            <button type="button" class="am-btn am-btn-default am-btn-sm">
              <i class="am-icon-cloud-upload"></i> 选择要上传的照片
            </button>
            <input type="file" id="doc-form-file">
            <div id="file-list"></div>
          </div>
          <div class="umodal-search">&nbsp;</div>
          <label class="umodal-label am-form-label">身份证号：</label>
          <div class="umodal-normal">
            <input id="" class="uinput uinput-max" type="text" placeholder="">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">会员卡号：</label>
          <div class="umodal-normal">
            <input id="" class="uinput uinput-max" type="text" placeholder="">
          </div>
          <div class="umodal-search">&nbsp;</div>
          <label class="umodal-label am-form-label" for="">启用密码：</label>
          <div class="umodal-normal am-text-left">
            <label class="am-radio-inline">
              <input type="radio" name="radio1" class="cchecked" value="0" data-am-ucheck> 是
            </label>
            <label class="am-radio-inline">
              <input type="radio" name="radio1" class="cchecked" value="1" data-am-ucheck checked> 否
            </label>
          </div>
        </div>
        <div class="am-form-group cispwd">
          <label class="umodal-label am-form-label" for="">输入密码：</label>
          <div class="umodal-normal">
            <input id="" class="uinput uinput-max" type="password" placeholder="">
          </div>
          <div class="umodal-search">&nbsp;</div>
          <label class="umodal-label am-form-label" for="">确认密码：</label>
          <div class="umodal-normal">
            <input id="" class="uinput uinput-max" type="password" placeholder="">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">性别：</label>
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
          <div class="umodal-search">&nbsp;</div>
          <label class="umodal-label am-form-label" for="">出生日期：</label>
          <div class="umodal-normal">
            <div class="am-input-group am-datepicker-date udatepicker udatepicker-max" data-am-datepicker="{format:'yyyy-mm-dd'}">
              <input type="text" class="am-form-field">
              <span class="am-input-group-btn am-datepicker-add-on">
                <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span></button>
              </span>
            </div>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">到期时间：</label>
          <div class="umodal-normal">
            <div class="am-input-group am-datepicker-date udatepicker udatepicker-max" data-am-datepicker="{format:'yyyy-mm-dd'}">
              <input type="text" class="am-form-field">
              <span class="am-input-group-btn am-datepicker-add-on">
                <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span></button>
              </span>
            </div>
          </div>
          <div class="umodal-search">&nbsp;</div>
          <label class="umodal-label am-form-label" for="">服务员：</label>
          <div class="umodal-normal">
            <select class="uselect uselect-max" data-am-selected>
              <option value="a">Apple</option>
              <option value="b">Banana</option>
              <option value="o">Orange</option>
              <option value="m">Mango</option>
              <option value="d">禁用</option>
            </select>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">联系地址：</label>
          <div class="umodal-max">
            <input id="" class="am-form-field uinput uinput-max" type="text" placeholder="">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">备注：</label>
          <div class="umodal-max">
            <textarea class="am-form-field utextarea utextarea-max" row="3"></textarea>
          </div>
        </div>
      </form>
    </div>
    <div class="am-modal-footer ufoot">
      <div class="am-btn-group">
        <button type="button" class="am-btn ubtn-sure ubtn-green"><i class="iconfont icon-xiangyou2"></i>
          下一步
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
    <div class="am-modal-bd umain2">
      <h3 class="utitle">会员资料</h3>
      <div class="am-g ucontent">
        <div class="am-u-lg-4">会员卡号：1000125</div>
        <div class="am-u-lg-4">会员姓名：张三</div>
        <div class="am-u-lg-4">手机号码：13700824417</div>
        <div class="am-u-lg-4">余额：<span class="am-text-lg gtext-orange">0.00</span>元</div>
        <div class="am-u-lg-4">会员卡类型：
          <select data-am-selected class="uselect">
            <option value="a" selected>请选择类型</option>
            <option value="b" >Banana</option>
            <option value="o">Orange</option>
            <option value="m">Mango</option>
            <option value="d">禁用</option>
          </select>
        </div>
        <div class="am-u-lg-4">会员折扣：<input class="am-form-field uinput" type="text" name=""></div>
      </div>
      <div class="am-g">
        <div class="am-u-lg-7">
          <h3 class="utitle">充值金额</h3>
          <div class="am-tabs" data-am-tabs="{noSwipe: 1}" id="utab2">
            <ul class="am-tabs-nav am-nav am-nav-tabs">
              <li class="am-active"><a href="javascript: void(0)">现金</a></li>
              <li><a href="javascript: void(0)">刷卡</a></li>
              <li><a href="javascript: void(0)">支付宝</a></li>
              <li><a href="javascript: void(0)">微信</a></li>
            </ul>
            <div class="am-tabs-bd">
              <div class="am-tab-panel am-active">
                <input type="text" class="am-form-field uinput umoneyinput" placeholder="请输入金额"><span> 元</span>
              </div>
              <div class="am-tab-panel">
                <input type="text" class="am-form-field uinput umoneyinput" placeholder="请输入金额"><span> 元</span>
              </div>
              <div class="am-tab-panel">
                <input type="text" class="am-form-field uinput umoneyinput" placeholder="请输入金额"><span> 元</span>
              </div>
              <div class="am-tab-panel">
                <input type="text" class="am-form-field uinput umoneyinput" placeholder="请输入金额"><span> 元</span>
              </div>
            </div>
          </div>
        </div>
        <div class="am-u-lg-1"></div>
        <div class="am-u-lg-4">
          <h3 class="utitle">赠送金额</h3>
          <div class="am-tabs" data-am-tabs="{noSwipe: 1}" id="utab3">
            <ul class="am-tabs-nav am-nav am-nav-tabs">
              <li class="am-active"><a href="javascript: void(0)">赠送金额</a></li>
            </ul>
            <div class="am-tabs-bd">
              <div class="am-tab-panel am-active">
                <input type="text" class="am-form-field uinput umoneyinput" placeholder="请输入金额"><span> 元</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="am-modal-footer ufoot">
      <div class="ua1">充值总额：<span class="am-text-lg gtext-orange">0.00</span>元,赠送总额<span class="am-text-lg gtext-orange">0.00</span>元</div>
      <div class="ua2"><input type="checkbox"> 打印充值单</div>
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
    <div class="am-modal-bd umain2">
      <h3 class="utitle">会员资料</h3>
      <div class="am-g ucontent">
        <div class="am-u-lg-4">会员卡号：1000125</div>
        <div class="am-u-lg-4">会员姓名：张三</div>
        <div class="am-u-lg-4">手机号码：3700824417</div>
        <div class="am-u-lg-4">余额：<span class="am-text-lg gtext-orange">0.00</span>元</div>
        <div class="am-u-lg-4 am-u-end">会员折扣：<span class="am-text-lg gtext-orange">8</span>折</div>
      </div>
      <div class="gspace15"></div>
      <div class="am-g">
        <div class="am-u-lg-4">
          <table class="am-table am-table-bordered am-table-centered am-table-hover am-table-compact utable2">
            <thead>
              <tr>
                <td>套餐名称</td>
                <td>单价</td>
                <td>添加</td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>基础套餐</td>
                <td><span class="gtext-orange">￥998</span></td>
                <td><a href="javascript:;" class="am-text-success cadd1">添加</a></td>
              </tr>
              <tr>
                <td>套餐1</td>
                <td><span class="gtext-orange">￥1998</span></td>
                <td><a href="javascript:;" class="am-text-success cadd1">添加</a></td>
              </tr>
              <tr>
                <td>套餐2</td>
                <td><span class="gtext-orange">￥2998</span></td>
                <td><a href="javascript:;" class="am-text-success cadd1">添加</a></td>
              </tr>
              <tr>
                <td>健康丽人</td>
                <td><span class="gtext-orange">￥8888</span></td>
                <td><a href="javascript:;" class="am-text-success cadd1">添加</a></td>
              </tr>
              <tr>
                <td>套餐3</td>
                <td><span class="gtext-orange">￥688</span></td>
                <td><a href="javascript:;" class="am-text-success cadd1">添加</a></td>
              </tr>
            </tbody>
         </table>
        </div>
        <div class="am-u-lg-1">
          <div class="uiconexchange"><i class="iconfont icon-shuangxiangjiantou"></i></div>
        </div>
        <div class="am-u-lg-7">
          <table class="am-table am-table-bordered am-table-centered am-table-hover am-table-compact utable3 ctadd">
            <thead>
              <tr class="utr1">
                <td>套餐名称</td>
                <td>单价</td>
                <td>数量</td>
                <td>移除</td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>基础套餐</td>
                <td><span class="gtext-orange">￥998</span></td>
                <td><a href="javascript:;" class="ufont1 cbtndec"><i class="am-icon-minus"></i></a><input type="text" name="adcd" class="uinputmin1" value="1"><a href="javascript:;" class="ufont1 cbtnplus"><i class="am-icon-plus"></i></a></td>
                <td><a href="javascript:;" class="am-text-primary cdel">移除</a></td>
              </tr>
              <tr>
                <td>健康丽人</td>
                <td><span class="gtext-orange">￥8888</span></td>
                <td><a href="javascript:;" class="ufont1 cbtndec"><i class="am-icon-minus"></i></a><input type="text" name="adcd" class="uinputmin1" value="1"><a href="javascript:;" class="ufont1 cbtnplus"><i class="am-icon-plus"></i></a></td>
                <td><a href="javascript:;" class="am-text-primary cdel">移除</a></td>
              </tr>
              <tr>
                <td>套餐3</td>
                <td><span class="gtext-orange">￥688</span></td>
                <td><a href="javascript:;" class="ufont1 cbtndec"><i class="am-icon-minus"></i></a><input type="text" name="adcd" class="uinputmin1" value="1"><a href="javascript:;" class="ufont1 cbtnplus"><i class="am-icon-plus"></i></a></td>
                <td><a href="javascript:;" class="am-text-primary cdel">移除</a></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="am-modal-footer ufoot">
          <div class="ua1">共 2 件，共计:<span class="am-text-lg gtext-orange">126</span>元</div>
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
    <div class="am-modal-bd umain2">
      <h3 class="utitle">会员资料</h3>
      <div class="am-g ucontent">
        <div class="am-u-lg-4">会员卡号：1000125</div>
        <div class="am-u-lg-4">会员姓名：张三</div>
        <div class="am-u-lg-4">手机号码：3700824417</div>
        <div class="am-u-lg-4">余额：<span class="am-text-lg gtext-orange">0.00</span>元</div>
        <div class="am-u-lg-4 am-u-end">会员折扣：<span class="am-text-lg gtext-orange">8</span>折</div>
      </div>
      <div class="gspace15"></div>
      <table class="am-table am-table-bordered am-table-centered am-table-hover am-table-compact utable2">
        <thead>
          <tr>
            <td>套餐名称</td>
            <td>内容</td>
            <td>单价</td>
            <td>数量</td>
            <td>移除</td>
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
                <td><a href="javascript:;" class="ufont1 cbtndec"><i class="am-icon-minus"></i></a><input type="text" name="adcd" class="uinputmin1" value="1"><a href="javascript:;" class="ufont1 cbtnplus"><i class="am-icon-plus"></a></td>
                <td><a href="javascript:;" class="am-text-primary cdel">移除</a></td>
            </tr>
            <tr>
                <td>套餐3</td>
                <td>理疗6次，颈肩理疗10次，艾灸30次，其它赠送10次</td>
                <td><span class="gtext-orange">￥688</span></td>
                <td><a href="javascript:;" class="ufont1 cbtndec"><i class="am-icon-minus"></i></a><input type="text" name="adcd" class="uinputmin1" value="1"><a href="javascript:;" class="ufont1 cbtnplus"><i class="am-icon-plus"></a></td>
                <td><a href="javascript:;" class="am-text-primary cdel">移除</a></td>
            </tr>
        </tbody>
      </table>
      <div class="gspace30"></div>
      <div class="am-g">
        <h3 class="utitle">支付方式</h3>
        <div class="am-u-lg-6 utabsleft">
          <div class="am-tabs" data-am-tabs="{noSwipe: 1}" id="utab2">
            <ul class="am-tabs-nav am-nav am-nav-tabs">
              <li class="am-active"><a href="javascript: void(0)">会员卡扣</a></li>
              <li><a href="javascript: void(0)">现金</a></li>
              <li><a href="javascript: void(0)">刷卡</a></li>
              <li><a href="javascript: void(0)">支付宝</a></li>
              <li><a href="javascript: void(0)">微信</a></li>
            </ul>

            <div class="am-tabs-bd tabs">
              <div class="am-tab-panel am-active">
                    <input type="text" class="am-form-field umoneyinput" id="doc-ipt-email-1" placeholder="请输入金额"><span> 元</span>
              </div>
              <div class="am-tab-panel">
                <input type="text" class="am-form-field umoneyinput" id="doc-ipt-email-1" placeholder="请输入金额"><span> 元</span>
              </div>
              <div class="am-tab-panel">
                <input type="text" class="am-form-field umoneyinput" id="doc-ipt-email-1" placeholder="请输入金额"><span> 元</span>
              </div>
              <div class="am-tab-panel">
                <input type="text" class="am-form-field umoneyinput" id="doc-ipt-email-1" placeholder="请输入金额"><span> 元</span>
              </div>
              <div class="am-tab-panel">
                <input type="text" class="am-form-field umoneyinput" id="doc-ipt-email-1" placeholder="请输入金额"><span> 元</span>
              </div>
            </div>
          </div>
        </div>
        <div class="am-u-lg-6 utabsright">
            <div class="am-tabs" data-am-tabs="{noSwipe: 1}" id="utab2">
              <ul class="am-tabs-nav am-nav am-nav-tabs">
                <li class="am-active"><a href="javascript: void(0)">手动优惠</a></li>
              </ul>

              <div class="am-tabs-bd">
                <div class="am-tab-panel am-active">
                      <input type="text" class="am-form-field umoneyinput" id="doc-ipt-email-1" placeholder="请输入金额"><span> 元</span>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
    <div class="am-modal-footer ufoot">
      <div class="ua1">合计：<span class="am-text-lg gtext-orange">126</span>元，折扣：<span class="am-text-lg gtext-orange">8</span>折，应付总共：<span class="am-text-lg gtext-orange">126</span>元</div>
      <div class="am-btn-group">
        <button type="button" class="am-btn ubtn-sure ubtn-green"><i class="iconfont icon-yuanxingxuanzhong"></i>
          完成
        </button>
      </div>
    </div>
  </div>
</div>
<!-- 侧拉框 -->
<div id="umemberoff1" class="am-offcanvas">
  <div class="am-offcanvas-bar am-offcanvas-bar-flip goffcanvas">
    <div class="am-offcanvas-content" >
      <div class="am-modal-hd"><span class="title">会员明细</span>
        <a href="javascript: void(0)" class="am-close am-close-spin uclose2 coffcanvas1" data-rel="close"><img src="../img/close.jpg"></a>
      </div>
      <div class="gspace15"></div>
      <div class="am-g ucontent">
        <div class="am-u-lg-6">会员姓名：张三</div>
        <div class="am-u-lg-6">手机号码：3700824417</div>
        <div class="am-u-lg-6">会员卡号：a123212</div>
        <div class="am-u-lg-6">性别：男</div>
        <div class="am-u-lg-6">出生日期：1992-04-20</div>
        <div class="am-u-lg-6">到期时间：2017-06-20</div>
        <div class="am-u-lg-6">联系地址：无</div>
        <div class="am-u-lg-6">余额：<span class="gtext-orange">0.00</span>元</div>
        <div class="am-u-lg-12">备注：无</div>
        <div class="am-u-lg-6"><button class="am-btn ubtn-sure ubtn-gray">
          <i class="iconfont icon-shanchu"></i>
          删除
        </button></div>
        <div class="am-u-lg-6"><button class="am-btn ubtn-sure ubtn-red">
          <i class="iconfont icon-question"></i>
          停用
        </button></div>
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
    $('.cispwd').hide();
    // 密码隐藏
    $('.cchecked').on('click', function(e) {
            if($(this).val()==0){
              $('.cispwd').fadeIn(200);
            }else{
              $('.cispwd').fadeOut(200);
            }
    });
    //会员充值
    $('.cmodelopen2').on('click', function(e) {
            $('#umemberm2').modal('open');
            $('#umemberm2 input').eq(0).focus();
    });
    //购买套餐
    $('.cmodelopen3').on('click', function(e) {
            $('#umemberm2').modal('close');
            $('#umemberm3').modal('open');
            $('#umemberm2 input').eq(0).focus();
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
    // 添加套餐
    $('.cadd1').on('click',function(){
      var oldtr = $(this).parent('td').parent('tr').clone();
      $('.ctadd tbody').append(oldtr);
      $('.ctadd tbody tr').last().children('td').last().remove();
      var newtr = '<td><a href="javascript:;" class="ufont1 cbtndec"><i class="am-icon-minus"></i></a><input type="text" name="adcd" class="uinputmin1" value="1"><a href="javascript:;" class="ufont1 cbtnplus"><i class="am-icon-plus"></i></a></td><td><a href="javascript:;" class="am-text-primary cdel" >移除</a></td>';
      $('.ctadd tbody tr').last().append(newtr);
    });
    //侧拉关闭
    $('.coffcanvas1').on('click', function() {
      $('#umemberoff1').offCanvas('close');
    });
    //上传文件
    $('#doc-form-file').on('change', function() {
      var fileNames = '';
      $.each(this.files, function() {
        fileNames += '<span class="am-badge">' + this.name + '</span> ';
      });
      $('#file-list').html(fileNames);
    });
    // 删除
    $(document).on("click", ".cdel", function() {
        $(this).parent().parent().remove();
    });
});
</script>
</body>
</html>