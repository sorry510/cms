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
        <label class="am-form-label">会员卡号：</label> 
        <input class="am-form-field uinput uinput-160" type="text" name="">
      </div>
      <div class="am-form-group">
        <label class="am-form-label">开卡店铺：</label> 
        <select class="uselect uselect-auto" data-am-selected name="">
          <option value="all">全部</option>
          <option value="2">大学路分店</option>
          <option value="3">3</option>
        </select>
      </div>
      <div class="am-form-group">
        <label class="am-form-label">卡类型：</label> 
        <select class="uselect uselect-auto" data-am-selected name="">
          <option value="all">全部</option>
          <option value="2">钻石卡</option>
          <option value="3">3</option>
        </select>
      </div>
      <div class="am-form-group">
        <label class="am-form-label">时间：</label> 
        <div class="am-input-group am-datepicker-date udatepicker" data-am-datepicker="{format: 'yyyy-mm-dd'}">
          <input type="text" class="am-form-field">
          <span class="am-input-group-btn am-datepicker-add-on">
            <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span> </button>
          </span>
        </div>
      </div>
      <div class="am-form-group">
        <label class="am-form-label">至：</label> 
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
  <div class="gspace15"></div>   
   <table class="am-table am-table-bordered am-table-hover utable1 am-table-compact">
    <thead>
      <tr>
        <td>消费时间</td>
        <td>消费单号</td>
        <td>卡号</td>
        <td>姓名</td>
        <td>性别</td>
        <td>手机号码</td>
        <td>卡类型</td>
        <td>消费类型</td>
        <td>会员卡扣</td>
        <td>现金</td>
        <td>刷卡</td>
        <td>团购</td>
        <td>微信</td>
        <td>支付宝</td>
        <td>消费店铺</td>
        <td width="12%;">操作</td>
      </tr>
    </thead>
    <tr>
      <td>2015-06-18&nbsp;12:21</td>
      <td><a href="javascript:void"  data-am-offcanvas="{target: '#uoffcanvas'}">2017030412456</a></td>
      <td>HY1001</td>
      <td>刘艳秋</td>
      <td>男</td>
      <td>13176684759</td>
      <td>会员卡</td>
      <td>消费</td>
      <td class="gtext-orange">￥368</td>
      <td>0.0</td>
      <td>0.0</td>
      <td>0.0</td>
      <td class="gtext-orange">￥200</td>
      <td class="gtext-orange">￥200</td>
      <td>解放路分店</td>
      <td>
        <button class="am-btn ubtn-table ubtn-orange">
          <i class="iconfont icon-dayin"></i>
          打印小票
        </button>
      </td>
    </tr>
    <tr>
      <td>2015-06-18&nbsp;12:21</td>
      <td><a href="javascript:void"  data-am-offcanvas="{target: '#uoffcanvas'}">2017030412456</a></td>
      <td>HY1001</td>
      <td>刘艳秋</td>
      <td>男</td>
      <td>13176684759</td>
      <td>会员卡</td>
      <td>消费</td>
      <td class="gtext-orange">￥368</td>
      <td>0.0</td>
      <td>0.0</td>
      <td>0.0</td>
      <td class="gtext-orange">￥200</td>
      <td class="gtext-orange">￥200</td>
      <td>解放路分店</td>
      <td>
        <button class="am-btn ubtn-table ubtn-orange">
          <i class="iconfont icon-dayin"></i>
          打印小票
        </button>
      </td>
    </tr>
    <tr>
      <td>2015-06-18&nbsp;12:21</td>
      <td><a href="javascript:void"  data-am-offcanvas="{target: '#uoffcanvas'}">2017030412456</a></td>
      <td>HY1001</td>
      <td>刘艳秋</td>
      <td>男</td>
      <td>13176684759</td>
      <td>会员卡</td>
      <td>消费</td>
      <td class="gtext-orange">￥368</td>
      <td>0.0</td>
      <td>0.0</td>
      <td>0.0</td>
      <td class="gtext-orange">￥200</td>
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
  <div class="am-offcanvas-bar am-offcanvas-bar-flip uoffcanvas">
    <div class="am-offcanvas-content" >
      <div class="am-modal-hd"><span class="utitle">消费单号:201703041256</span>
        <a href="javascript: void(0)" class="am-close am-close-spin doc-oc-js uclose2" data-rel="close"><img src="../img/close.jpg"></a>
      </div>
      <div class="gspace15"></div>
      <div class="am-g ucontent">
        <div class="am-u-lg-6">消费时间：<span>2017-03-03 12:32</span></div>
        <div class="am-u-lg-6">消费单号：<span>2017030234353</span></div>
        <div class="am-u-lg-6">会员卡号：<span>103201</span></div>
        <div class="am-u-lg-6">会员姓名：<span>张小明</span></div>
        <div class="am-u-lg-6">会员类型：<span>金卡</div>
        <div class="am-u-lg-6">会员折扣：<span>8折</div>
        <div class="am-u-lg-6">操作类型：<span>消费</span></div>
        <div class="am-u-lg-6">本次消费：<span>191.0元</span></div>
        <div class="am-u-lg-6">支付方式：<span>支付宝</span></div>
        <div class="am-u-lg-6">手动优惠：<span>--</span></div>
        <div class="am-u-lg-6">操作人员：<span>张小明</span></div>
        <div class="am-u-lg-6">是否免单：<span>--</span></div>
      </div>
      <p><strong>商品消费清单</strong></p>
      <table class="am-table am-table-bordered am-table-hover utable1 am-table-compact" style="color:black;">
        <thead>
          <tr>
          	<td>编码</td>
            <td>名称</td>
            <td>单价</td>
            <td>数量</td>
            <td>金额</td>
            <td>折后价</td>
          </tr>
        </thead>
        <tr>
          <td>4548415878</td>
          <td>普洱</td>
          <td>88元</td>
          <td>1泡</td>
          <td>88元</td>
          <td>58元</td>
        </tr>
        <tr>
          <td>4548415878</td>
          <td>普洱</td>
          <td>88元</td>
          <td>1泡</td>
          <td>88元</td>
          <td>58元</td>
        </tr>
        <tr>
          <td>4548415878</td>
          <td>普洱</td>
          <td>88元</td>
          <td>1泡</td>
          <td>88元</td>
          <td>58元</td>
        </tr>
        <tr>
          <td>4548415878</td>
          <td>普洱</td>
          <td>88元</td>
          <td>1泡</td>
          <td>88元</td>
          <td>58元</td>
        </tr>
      </table>
      <div class="gspace20"></div>
      <div class="ub">
        <button class="am-btn ubtn-sure ubtn-blue ubutton1">
          <i class="iconfont icon-dayin"></i>
          打印小票
        </button>
        <button class="am-btn ubtn-sure ubtn-red ubutton2" data-am-modal="{target: '#udetailm1', closeViaDimmer: 0, width: 320, height: 320}">
          <i class="iconfont icon-huaidanbaotui"></i>
          退款
        </button>
      </div>
     <div class="gspace15"></div>
    </div>
  </div>
</div>

<div id="udetailm1" class="am-modal am-modal-no-btn" tabindex="-1" >
  <div class="am-modal-dialog umodal">
    <div class="am-modal-hd uhead">退款
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="gspace15"></div>
    <div class="am-modal-bd umain1">
      <form class="am-form am-form-horizontal">
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">授权密码</label>
          <div class="umodal-small">
            <input class="am-form-field uinput uinput-max" type="password" name="password" placeholder="请输入授权密码">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">备注</label>
          <div class="umodal-small">
            <textarea style="height: 60px;" class="am-form-field utextarea utextarea-max" row="3" placeholder="请输入备注信息"></textarea>
          </div>
        </div>
        <div class="gspace20"></div>
        <p>1.如未设置，请到“设置”->“其他设置”->“授权密码”进行设置；</p>
        <div class="gspace15"></div>
        <div class="ua1">
          <button class="am-btn ubtn-sure ubtn-red" type="submit">
            <i class="iconfont icon-huaidanbaotui"></i>
            退款
          </button>
          <button class="am-btn ubtn-sure ubtn-red" type="submit">
            取消
          </button>
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
