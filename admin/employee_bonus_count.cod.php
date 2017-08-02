<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>
<!-- content -->
<div class="gcontent" id="uemployee_bonus_detail">
  <ul class="am-nav am-nav-pills ubread">
    <li class="am-active"><a href="javascript: void(0);">员工提成统计</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="utools">
    <form class="am-form-inline uform2">
      <div class="am-form-group">
        <label for="doc-ipt-3" class="am-form-label">分店：</label>
        <select class="uselect uselect-auto" data-am-selected name="">
          <option value="all">请选择</option>
          <option value="2">2</option>
          <option value="3">3</option>
        </select>
      </div>
      <div class="am-form-group">
        <label for="doc-ipt-3" class="am-form-label">日期：</label>
        <div class="am-input-group am-datepicker-date udatepicker" data-am-datepicker="{format: 'yyyy-mm-dd'}">
          <input type="text" class="am-form-field" name="">
          <span class="am-input-group-btn am-datepicker-add-on">
            <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span>
            </button>
          </span>
        </div>  
      </div>
      <div class="am-form-group">    
        <label for="doc-ipt-3" class="am-form-label">至：</label>
        <div class="am-input-group am-datepicker-date udatepicker udatepicker140" data-am-datepicker="{format: 'yyyy-mm-dd'}">
          <input type="text" class="am-form-field" name="">
          <span class="am-input-group-btn am-datepicker-add-on">
            <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span> </button>
          </span>
        </div>
      </div>
      <div class="am-form-group">
        <label for="doc-ipt-3" class="am-form-label">员工：</label>
        <input type="text" class="am-form-field uinput uinput-220" placeholder="姓名" name="">
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
        <td rowspan="2">排名</td>
        <td rowspan="2">员工姓名</td>
        <td rowspan="2">分组</td>
        <td colspan="2">办卡</td>
        <td colspan="2">充值</td>
        <td colspan="3">服务</td>
        <td colspan="3">商品</td>
        <td rowspan="2">导购提成</td>
        <td rowspan="2">基本工资</td>
        <td rowspan="2">合计工资</td>
        <td rowspan="2">分店</td>
      </tr>
      <tr>
        <td>数量</td>
        <td>提成</td>
        <td>金额</td>
        <td>提成</td>
        <td>金额</td>
        <td>次数</td>
        <td>提成</td>
        <td>金额</td>
        <td>数量</td>
        <td>提成</td>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>李四</td>
        <td>理疗师</td>
        <td>25</td>
        <td>250元</td>
        <td>10000元</td>
        <td>1025元</td>
        <td>10250元</td>
        <td>30</td>
        <td>1025元</td>
        <td>1025元</td>
        <td>50</td>
        <td>500元</td>
        <td>1500元</td>
        <td>1200元</td>
        <td><span class="gtext-orange">4500</span>元</td>
        <td>南大街11号当铺</td>
      </tr>
       <tr>
        <td>2</td>
        <td>小明</td>
        <td>理疗师</td>
        <td>25</td>
        <td>250元</td>
        <td>10000元</td>
        <td>1025元</td>
        <td>10250元</td>
        <td>30</td>
        <td>1025元</td>
        <td>1025元</td>
        <td>50</td>
        <td>500元</td>
        <td>1500元</td>
        <td>1200元</td>
        <td><span class="gtext-orange">7000</span>元</td>
        <td>南大街11号当铺</td>
      </tr>
      <tr>
        <td>3</td>
        <td>李无</td>
        <td>理疗师</td>
        <td>25</td>
        <td>250元</td>
        <td>10000元</td>
        <td>1025元</td>
        <td>10250元</td>
        <td>30</td>
        <td>1025元</td>
        <td>1025元</td>
        <td>50</td>
        <td>500元</td>
        <td>1500元</td>
        <td>1200元</td>
        <td><span class="gtext-orange">4500</span>元</td>
        <td>南大街11号当铺</td>
      </tr>
    </tbody>
  </table>
  <ul class="am-pagination am-pagination-centered upages">
    <li class="upage-info">共1页 5条记录</li>
    <li class="am-disabled"><a href="#">&laquo;</a></li>
    <li class="am-active"><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">&raquo;</a></li>
  </ul>
</div>
<!-- 弹出框 -->
<div id="uemployee_bonus_detailm1" class="am-modal" tabindex="-1">
  <div class="am-modal-dialog umodal">
    <div class="am-modal-hd uhead">新增预约
      <a href="javascript:void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd umain1">
      <form class="am-form am-form-horizontal">
        <div class="am-form-group">
          <label class="am-u-lg-2 am-form-label" for="">联系电话</label>
          <div class="am-u-lg-4">
            <input id="" class="uinput uinput-max" type="text" placeholder="">
          </div>
          <div class="am-u-lg-1">
            <button type="button" class="am-btn ubtn-search2 ubtn-green">
              <i class="iconfont icon-search"></i>搜索
            </button>
          </div>
          <label class="am-u-lg-2 am-form-label" for="">姓名</label>
          <div class="am-u-lg-3">
            <input id="" class="uinput uinput-max" type="text" placeholder="">
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-2 am-form-label" for="">预约时间</label>
          <div class="am-u-lg-4">
            <div class="am-input-group am-datepicker-date udatepicker udatepicker-max" data-am-datepicker="{format:'yyyy-mm-dd'}">
              <input type="text" class="am-form-field">
              <span class="am-input-group-btn am-datepicker-add-on">
                <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span></button>
              </span>
            </div>
          </div>
          <div class="am-u-lg-1">&nbsp;</div>
          <label class="am-u-lg-2 am-form-label" for="">人数</label>
          <div class="am-u-lg-3">
            <input id="" class="uinput uinput-max" type="text" placeholder="">
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-2 am-form-label" for="">预约内容</label>
          <div class="am-u-lg-10">
            <input id="" class="am-form-field uinput uinput-max" type="password" placeholder="">
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-2 am-form-label" for="">短信通知</label>
          <div class="am-u-lg-10">
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
