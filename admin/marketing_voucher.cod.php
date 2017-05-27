<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>

<!-- content -->
<div id="umarketing_voucher" class="gcontent">
  <ul class="am-nav am-nav-pills ubread">
    <li class="am-active"><a href="javascript: void(0)">代金券设置</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="utools">
  <form class="am-form-inline uform2">
  </form>
  <button class="am-btn ubtn-sure ubtn-blue" data-am-modal="{target: '#umarketing_voucherm1'}">
  <i class="iconfont icon-question"></i>
    新增代金券
  </button>
  <div style="clear: both;"></div>
  </div>
  <div class="gspace30"></div>
  <table class="am-table am-table-bordered am-table-hover am-table-compact utable1" id="doc-modal-list">
    <thead>
      <tr>
        <td>名称</td>
        <td>有效期</td>
        <td>到期时间</td>
        <td>价值</td>
        <td>消费限额</td>
        <td style="width: 12%;">操作</td>
      </tr>
    </thead>
    <tr>
      <td>一楼大厅</td>
      <td>1000</td>
      <td>20110308</td>
      <td>2131</td>
      <td>200</td>
      <td>
        <button class="am-btn ubtn-table ubtn-green" data-am-modal="{target: '#umarketing_voucherm2'}">
          <i class="iconfont icon-bianji"></i>
          修改
        </button>
        <button class="am-btn ubtn-table ubtn-gray cdel">
          <i class="iconfont icon-shanchu"></i>
          删除
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

<!--modal框-->
<div class="am-modal" tabindex="-1" id="umarketing_voucherm1">
  <div class="am-modal-dialog umodal">
    <div class="am-modal-hd uhead">新增代金券
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd umain1">
      <form class="am-form am-form-horizontal">
        <div class="am-form-group">
          <label class="am-u-lg-2 am-form-label" for="">名称</label>
          <div class="am-u-lg-4">
            <input type="text" class="am-form-field uinput uinput-max">
          </div>
          <div class="am-u-lg-6">
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-2 am-form-label" for="">面值</label>
          <div class="am-u-lg-4">
            <input type="text" class="am-form-field uinput uinput-max">
          </div>
          <div class="am-u-lg-6">
          </div>
        </div> 
        <div class="am-form-group">
          <label class="am-u-lg-2 am-form-label" for="" >消费限额</label>
          <div class="am-u-lg-4">
            <input type="text" class="am-form-field uinput uinput-max">
          </div>
          <label class="am-u-lg-6 am-form-label" style="text-align: left;">无以上使用</label>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-2 am-form-label" for="">到期时间</label>
          <div class="am-u-lg-4">
            <div class="am-input-group am-datepicker-date udatepicker udatepicker-max" data-am-datepicker="{format:'yyyy-mm-dd'}">
              <input id="date1" type="text" class="am-form-field">
              <span class="am-input-group-btn am-datepicker-add-on">
                <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span></button>
              </span>
            </div>
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-2 am-form-label" for="">有效期</label>
          <div class="am-u-lg-4">
            <input id="date2" type="text" class="am-form-field uinput uinput-max">
          </div>
          <label class="am-u-lg-6 am-form-label" style="text-align: left;">天</label>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-2 am-form-label" for="">备注</label>
          <div class="am-u-lg-10">
            <textarea class="am-form-field utextarea utextarea-max" row="3"></textarea>
          </div>
        </div>
      </form>
    </div>
    <div class="am-modal-footer ufoot">
      <div class="am-btn-group">
        <button type="submit" class="am-btn ubtn-sure ubtn-green"><i class="iconfont icon-yuanxingxuanzhong"></i>
          完成
        </button>
      </div>
    </div>
  </div>
</div>

<div class="am-modal" tabindex="-1" id="umarketing_voucherm2">
  <div class="am-modal-dialog umodal">
    <div class="am-modal-hd uhead">新增代金券
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd umain1">
      <form class="am-form am-form-horizontal">
        <div class="am-form-group">
          <label class="am-u-lg-2 am-form-label" for="">名称</label>
          <div class="am-u-lg-4">
            <input type="text" class="am-form-field uinput uinput-max">
          </div>
          <div class="am-u-lg-6">
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-2 am-form-label" for="">面值</label>
          <div class="am-u-lg-4">
            <input type="text" class="am-form-field uinput uinput-max">
          </div>
          <div class="am-u-lg-6">
          </div>
        </div> 
        <div class="am-form-group">
          <label class="am-u-lg-2 am-form-label" for="" >消费限额</label>
          <div class="am-u-lg-4">
            <input type="text" class="am-form-field uinput uinput-max">
          </div>
          <label class="am-u-lg-6 am-form-label" style="text-align: left;">无以上使用</label>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-2 am-form-label" for="">到期时间</label>
          <div class="am-u-lg-4">
            <div class="am-input-group am-datepicker-date udatepicker udatepicker-max" data-am-datepicker="{format:'yyyy-mm-dd'}">
              <input id="date3" type="text" class="am-form-field">
              <span class="am-input-group-btn am-datepicker-add-on">
                <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span></button>
              </span>
            </div>
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-2 am-form-label" for="">有效期</label>
          <div class="am-u-lg-4">
            <input id="date4" type="text" class="am-form-field uinput uinput-max">
          </div>
          <label class="am-u-lg-6 am-form-label" style="text-align: left;">天</label>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-2 am-form-label" for="">备注</label>
          <div class="am-u-lg-10">
            <textarea class="am-form-field utextarea utextarea-max" row="3"></textarea>
          </div>
        </div>
      </form>
    </div>
    <div class="am-modal-footer ufoot">
      <div class="am-btn-group">
        <button type="submit" class="am-btn ubtn-sure ubtn-green"><i class="iconfont icon-yuanxingxuanzhong"></i>
          完成
        </button>
      </div>
    </div>
  </div>
</div>
<!-- 删除框 -->
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
<script>
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
  $('#date2').on('focusout',function(){
    if ($('#date2').val()!='') {$('#date1').val(null)}
  })
  $('#date4').on('focusout',function(){
    if ($('#date4').val()!='') {$('#date3').val(null)}
  })
});
</script>
</body>
</html>
