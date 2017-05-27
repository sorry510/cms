<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>
<!-- content -->
<div id="udetail" class="gcontent">
  <ul class="am-nav am-nav-pills ubread">
    <li class="am-active"><a href="javascript: void(0)">今日明细</a></li>
    <li><a href="javascript: void(0)">所有明细</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="utools">
    <form class="am-form-inline uform1">
      <div class="am-form-group">
        开卡店铺： 
        <select class="uselect" data-am-selected name="">
          <option value="all">全部</option>
          <option value="2">fsdsdfsdfsdffdfsd</option>
          <option value="3">3</option>
        </select>
      </div>
      <div class="am-form-group">
        卡类型： 
        <select class="uselect" data-am-selected name="">
          <option value="all">全部</option>
          <option value="2">2</option>
          <option value="3">3</option>
        </select>
      </div>
      <div class="am-form-group">
        会员卡号： 
        <input class="am-form-field uinput" type="text" name="">
      </div>
      <div class="am-form-group">
        时间： 
        <div class="am-input-group am-datepicker-date udatepicker" data-am-datepicker="{format: 'yyyy-mm-dd'}">
          <input type="text" class="am-form-field">
          <span class="am-input-group-btn am-datepicker-add-on">
            <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span> </button>
          </span>
        </div>
      </div>
      <div class="am-form-group">
        至： 
        <div class="am-input-group am-datepicker-date udatepicker" data-am-datepicker="{format: 'yyyy-mm-dd'}">
          <input type="text" class="am-form-field">
          <span class="am-input-group-btn am-datepicker-add-on">
            <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span> </button>
          </span>
        </div>
      </div>
      <div class="am-form-group">
        <button type="submit" class="am-btn ubtn-search">
          <i class="iconfont icon-search"></i>查询
        </button>
      </div>       
    </form> 
  </div> 
  <div class="gspace30"></div>   
   <table class="am-table am-table-bordered am-table-hover utable1 am-table-compact">
    <thead>
      <tr>
        <td>开卡类型</td>
        <td>消费单号</td>
        <td>卡号</td>
        <td>姓名</td>
        <td>消费类型</td>
        <td>会员卡扣</td>
        <td>现金</td>
        <td>刷卡</td>
        <td>团购</td>
        <td>微信/支付宝</td>
        <td>消费店铺</td>
        <td style="width: 12%;">操作</td>
      </tr>
    </thead>
    <tr data-am-offcanvas="{target: '#uoffcanvas'}">
      <td>2015-06-18&nbsp;12:21</td>
      <td>2017030412456</td>
      <td>HY1001</td>
      <td>刘艳秋</td>
      <td>消费</td>
      <td class="gtext-orange">￥368</td>
      <td>0.0</td>
      <td>0.0</td>
      <td>0.0</td>
      <td class="gtext-orange">￥200</td>
      <td>解放路分店</td>
      <td>
        <button class="am-btn ubtn-table ubtn-orange">
          <i class="iconfont icon-dayin"></i>
          打印小票
        </button>
      </td>
    </tr>
    <tr data-am-offcanvas="{target: '#uoffcanvas'}">
      <td>2015-06-18&nbsp;12:21</td>
      <td>2017030412456</td>
      <td>HY1001</td>
      <td>刘艳秋</td>
      <td>消费</td>
      <td class="gtext-orange">￥368</td>
      <td>0.0</td>
      <td>0.0</td>
      <td>0.0</td>
      <td class="gtext-orange">￥200</td>
      <td>解放路分店</td>
      <td>
        <button class="am-btn ubtn-table ubtn-orange">
          <i class="iconfont icon-dayin"></i>
          打印小票
        </button>
      </td>
    </tr>
    <tr data-am-offcanvas="{target: '#uoffcanvas'}">
      <td>2015-06-18&nbsp;12:21</td>
      <td>2017030412456</td>
      <td>HY1001</td>
      <td>刘艳秋</td>
      <td>消费</td>
      <td class="gtext-orange">￥368</td>
      <td>0.0</td>
      <td>0.0</td>
      <td>0.0</td>
      <td class="gtext-orange">￥200</td>
      <td>解放路分店</td>
      <td>
        <button class="am-btn ubtn-table ubtn-orange">
          <i class="iconfont icon-dayin"></i>
          打印小票
        </button>
      </td>
    </tr>
  </table>
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
<div id="uoffcanvas" class="am-offcanvas">
  <div class="am-offcanvas-bar am-offcanvas-bar-flip goffcanvas">
    <div class="am-offcanvas-content" >
      <div class="am-modal-hd"><span class="title">消费单号:201703041256</span>
        <a href="javascript: void(0)" class="am-close am-close-spin doc-oc-js uclose2" data-rel="close"><img src="../img/close.jpg"></a>
      </div>
      <div class="gspace15"></div>
      <div class="ua">
        <ul class="ua1">
          <li>
            消费时间：<span>2017-03-04&nbsp;09:31:06</span>
          </li>
          <li>
            会员卡号：<span>HY1001</span>
          </li>
          <li>
           消费总额：<span>191.0元</span>
          </li>
          <li>
            会员优惠：<span>0.0元</span>
          </li>
        </ul>
        <ul class="ua2">
          <li>
            消费时间：<span>201703041256</span>
          </li>
          <li>
            会员卡号：<span>HY1001</span>
          </li>
          <li>
            消费总额：<span>191.0元</span>
          </li>
          <li>
            会员优惠：<span>0.0元</span>
          </li>
        </ul>
      </div>
      <p><strong>商品消费清单</strong></p>
      <table class="am-table am-table-bordered am-table-hover utable1 am-table-compact">
        <thead>
          <tr>
            <td>名称</td>
            <td>单价</td>
            <td>数量</td>
            <td>金额</td>
            <td>时间</td>
          </tr>
        </thead>
        <tr>
          <td>普洱</td>
          <td>88元</td>
          <td>1泡</td>
          <td>88.0元</td>
          <td>2017-03-24&nbsp;09:31:44</td>
        </tr>
        <tr>
          <td>普洱</td>
          <td>88元</td>
          <td>1泡</td>
          <td>88.0元</td>
          <td>2017-03-24&nbsp;09:31:44</td>
        </tr>
        <tr>
          <td>普洱</td>
          <td>88元</td>
          <td>1泡</td>
          <td>88.0元</td>
          <td>2017-03-24&nbsp;09:31:44</td>
        </tr>
      </table>
      <p><strong>付款信息</strong></p>
      <table class="am-table am-table-bordered am-table-hover utable1 am-table-compact">
        <thead>
          <tr>
          <td>支付方式</td>
          <td>金额</td>
        </tr>
        </thead>
        <tr>
          <td>支付宝</td>
          <td>371.0元</td>
        </tr>
      </table>
      <div class="gspace20"></div>
      <div class="ub">
        <button class="am-btn ubtn-sure ubtn-blue" style="float: left;margin-left: 2.5%;">
          <i class="iconfont icon-dayin"></i>
          打印小票
        </button>
        <button class="am-btn ubtn-sure ubtn-red" style="margin-right: 2.5%" data-am-modal="{target: '#udetailm1', closeViaDimmer: 0, width: 300, height: 300}">
          <i class="iconfont icon-huaidanbaotui"></i>
          反结帐
        </button>
      </div> 
    </div>
  </div>
</div>

<div id="udetailm1" class="am-modal am-modal-no-btn" tabindex="-1" >
  <div class="am-modal-dialog umodal" style="width: 300px;">
    <div class="am-modal-hd uhead" style="height: ">反结账
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd umain1">
      <form class="am-form am-form-horizontal">
        <div class="am-form-group">
          <label class="am-u-lg-4 am-form-label" for="">授权密码</label>
          <div class="am-u-lg-8">
            <input class="am-form-field uinput uinput-max" type="password" name="password" placeholder="请输入授权密码">
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-4 am-form-label" for="">备注</label>
          <div class="am-u-lg-8">
            <textarea style="height: 60px;" class="am-form-field utextarea utextarea-max" row="3" placeholder="请输入备注信息"></textarea>
          </div>
        </div>
        <p>1.如未设置，请到“设置”->“其他设置”->“授权密码”进行设置；</p>
        <div class="gspace15"></div>
        <div class="ua1">
          <button class="am-btn ubtn-sure ubtn-red" type="submit">
            <i class="iconfont icon-huaidanbaotui"></i>
            反结帐
          </button><a class="a2"  href="">取消</a>
        </div>
      </form>
    </div>
  </div>
</div> 
<script src="../js/jquery.min.js"></script>
<script src="../js/amazeui.min.js"></script>
<script>
/*右侧弹出框关闭按钮JS*/
  $(function() {
    var id = '#uoffcanvas';
    var $myOc = $(id);
    $('.doc-oc-js').on('click', function() {
      $myOc.offCanvas($(this).data('rel'));
    });
    $('.cdel').on('click', function() {
      $('#cconfirm').modal({
        relatedTarget: this,
        onConfirm: function(options) {
          $(this.relatedTarget).parent('td').parent('tr').remove();
        },
        onCancel: function() {
          return;
        }
      });
    });
  });
</script>
</body>
</html>
