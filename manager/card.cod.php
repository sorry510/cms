<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>
<!-- content -->
<div class="gcontent" id="ucard">
  <ul class="am-nav am-nav-pills ubread">
	  <li class="am-active"><a href="card.php">会员管理</a></li>
	  <li><a href="#">过期会员</a></li>
	  <li><a href="#">回收站</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="utools">
    <form class="am-form-inline uform2">
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
        <input type="text" class="am-form-field uinput uinput-160" placeholder="卡号/手机号/姓名" name="">
      </div>
      <div class="am-form-group">
        <button type="submit" class="am-btn ubtn-search">
          <i class="iconfont icon-search"></i>查询
        </button>
      </div>
    </form>
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
      </tr>
    </thead>
    <tbody>
      <tr>
        <td data-am-offcanvas="{target: '#ucardoff1'}"><a href="">ahh120</a></td>
        <td data-am-offcanvas="{target: '#ucardoff1'}"><a href="">刘艳芳</a></td>
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
      </tr>
      <tr>
        <td colspan="14" class="utable-text">余额：<span class="gtext-orange">￥5680.8</span>，剩余积分：<span class="gtext-orange">1234</span>，套餐余：【中医问诊(<span class="gtext-orange">5</span>次)，经络疏通-专家(<span class="gtext-orange">6</span>次)，艾灸(<span class="gtext-orange">6</span>次) ，到期时间：2017-12-15】</td>
      </tr>
      <tr>
        <td colspan="14" class="utable-text">累计消费：<span class="gtext-orange">10331</span>元，累计赠送：<span class="gtext-orange">568.8</span>元，累计积分：<span class="gtext-orange">89634</span>元</td>
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

<!-- 侧拉框 -->
<div id="ucardoff1" class="am-offcanvas">
  <div class="am-offcanvas-bar am-offcanvas-bar-flip uoffcanvas">
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
            <i class="iconfont icon-tingyong"></i>
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
    //侧拉关闭
    $('.coffcanvas1').on('click', function() {
      $('#ucardoff1').offCanvas('close');
    });
    //去掉禁止选中
    $('.goffcanvas').parent().on('open.offcanvas.amui', function() {
      $(this).css('user-select','');
    });
});
</script>
</body>
</html>