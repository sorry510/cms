<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>
<!-- content -->
<div class="gcontent" id="umarketing_gift">
  <ul class="am-nav am-nav-pills ubread">
    <li class="am-active"><a href="javascript: void(0);">满送活动</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="utools">
    <form class="am-form-inline uform2">
    </form>
    <button class="am-btn ubtn-sure ubtn-blue" data-am-modal="{target:'#umarketing_giftm1'}">
      <i class="iconfont icon-question"></i>
      新增满送
    </button>
  </div>
  <div class="gspace30"></div>
  <table class="am-table am-table-bordered am-table-hover am-table-compact utable1">
    <thead>
      <tr>
        <td>范围</td>
        <td>活动名称</td>
        <td>顾客类型</td>
        <td>实付满</td>
        <td>送(优惠券)</td>
        <td>开始时间</td>
        <td>结束时间</td>
        <td>备注</td>
        <td style="width:12%;">操作</td>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>五一大酬宾</td>
        <td>五一大酬宾</td>
        <td>全体顾客</td>
        <td>100元</td>
        <td>10元</td>
        <td>2017-4-29</td>
        <td>2017-5-2</td>
        <td>机会难得，赶紧来购吧</td>
        <td>
          <button class="am-btn ubtn-table ubtn-green">
            <i class="iconfont icon-bianji"></i>
            编辑
          </button>&nbsp;&nbsp;
          <button class="am-btn ubtn-table ubtn-gray cdel">
            <i class="iconfont icon-shanchu"></i>
            删除
          </button> 
        </td>
      </tr>
      <tr>
        <td>五一大酬宾</td>
        <td>五一大酬宾</td>
        <td>全体顾客</td>
        <td>100元</td>
        <td>10元</td>
        <td>2017-4-29</td>
        <td>2017-5-2</td>
        <td>机会难得，赶紧来购吧</td>
        <td>
          <button class="am-btn ubtn-table ubtn-green">
            <i class="iconfont icon-bianji"></i>
            编辑
          </button>&nbsp;&nbsp;
          <button class="am-btn ubtn-table ubtn-gray cdel">
            <i class="iconfont icon-shanchu"></i>
            删除
          </button> 
        </td>
      </tr>
      <tr>
        <td>五一大酬宾</td>
        <td>五一大酬宾</td>
        <td>全体顾客</td>
        <td>100元</td>
        <td>10元</td>
        <td>2017-4-29</td>
        <td>2017-5-2</td>
        <td>机会难得，赶紧来购吧</td>
        <td>
          <button class="am-btn ubtn-table ubtn-green">
            <i class="iconfont icon-bianji"></i>
            编辑
          </button>&nbsp;&nbsp;
          <button class="am-btn ubtn-table ubtn-gray cdel">
            <i class="iconfont icon-shanchu"></i>
            删除
          </button> 
        </td>
      </tr>
    </tbody>
  </table>
</div>
<!-- 弹出框 -->
<div id="umarketing_giftm1" class="am-modal" tabindex="-1">
  <div class="am-modal-dialog umodal">
    <div class="am-modal-hd uhead">新增满送
      <a href="javascript:void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd umain1">
      <form class="am-form am-form-horizontal">
        <div class="am-form-group">
          <label class="am-u-lg-3 am-form-label" for="">活动名称</label>
          <div class="am-u-lg-4">
            <input id="" class="uinput uinput-max" type="text" placeholder="">
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-3 am-form-label ua" for="">顾客类型</label>
          <div class="am-u-lg-8 ub">
            <label class="am-radio-inline">
              <input type="radio" name="radio1" value="male" data-am-ucheck checked> 仅限会员
            </label> 
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-3 am-form-label" for="">(消费)实付款满</label>
          <div class="am-u-lg-3 uc">
            <input id="" class="uinput uinput-max" type="text" placeholder="">
            <span>元</span>
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-3 am-form-label" for="">(优惠券)送</label>
          <div class="am-u-lg-3 uc">
            <input id="" class="uinput uinput-max" type="text" placeholder="">
            <span>元</span>
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-3 am-form-label" for="">优惠券有效期</label>
          <div class="am-u-lg-3 uc">
            <input id="" class="uinput uinput-max" type="text" placeholder="">
            <span>元</span>
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-3 am-form-label" for="">优惠券使用范围</label>
          <div class="am-u-lg-4 ud">
            <span>满</span>
            <input id="" class="uinput uinput-max" type="text" placeholder="">
            <span>元 可以使用</span>
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-3 am-form-label" for="">开始时间</label>
          <div class="am-u-lg-4">
            <div class="am-input-group am-datepicker-date udatepicker udatepicker-max" data-am-datepicker="{format:'yyyy-mm-dd'}">
              <input type="text" class="am-form-field">
              <span class="am-input-group-btn am-datepicker-add-on">
                <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span></button>
              </span>
            </div>
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-3 am-form-label" for="">结束时间</label>
          <div class="am-u-lg-4">
            <div class="am-input-group am-datepicker-date udatepicker udatepicker-max" data-am-datepicker="{format:'yyyy-mm-dd'}">
              <input type="text" class="am-form-field">
              <span class="am-input-group-btn am-datepicker-add-on">
                <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span></button>
              </span>
            </div>
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-3 am-form-label" for="">备注</label>
          <div class="am-u-lg-9">
            <textarea class="am-form-field utextarea utextarea-max" row="3"></textarea>
          </div>
        </div>
      </form>
    </div>
    <div class="am-modal-footer ufoot">
      <div class="am-btn-group">
        <button type="button" class="am-btn ubtn-sure ubtn-green"><i class="iconfont icon-yuanxingxuanzhong"></i>
          完成
        </button>
      </div>
    </div>
  </div>
</div>
<!-- 删除按钮弹出框 -->
<div id="cconfirm" class="am-modal am-modal-confirm" tabindex="-1">
  <div class="am-modal-dialog uconfirm">
    <div class="am-modal-hd uhead"><b>删&nbsp;&nbsp;&nbsp;&nbsp;除&nbsp;&nbsp;&nbsp;&nbsp;提&nbsp;&nbsp;&nbsp;&nbsp;醒</b></div>
    <div class="am-modal-bd">
      你，确定要删除这条记录吗？
    </div>
    <div class="am-modal-footer">
      <span class="am-modal-btn" data-am-modal-cancel>取消</span>
      <span class="am-modal-btn" data-am-modal-confirm>确定</span>
    </div>
  </div>
</div>
<script src="../js/jquery.min.js"></script>
<script src="../js/amazeui.min.js"></script>
<script type="text/javascript">
$(function() {
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