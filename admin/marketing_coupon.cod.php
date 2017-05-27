<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>
<div id="umarketing_coupon" class="gcontent">
  <ul class="am-nav am-nav-pills ubread">
    <li class="am-active"><a href="#">赠送优惠券</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="utools">
    <form class="am-form-inline uform2">
      <div class="am-form-group">
        <label for="doc-ipt-3" class="am-form-label">查询：</label>
        <input type="text" class="am-form-field uinput uinput140" placeholder="" name="">
      </div>
      <div class="am-form-group">
        <button type="submit" class="am-btn ubtn-search">
          <i class="iconfont icon-search"></i>查询
        </button>
      </div>
      <div class="am-form-group">
        <button type="button" class="am-btn ubtn-search" data-am-modal="{target:'#umarketing_couponm2'}">
          <i class="iconfont icon-question"></i>更多查询条件
        </button>
      </div>
    </form>
    <button class="am-btn ubtn-sure ubtn-blue" data-am-modal="{target:'#umarketing_couponm1'}">
      <i class="iconfont icon-addition"></i>
      批量赠送
    </button>
  </div>
  <div class="gspace30"></div>
  <table class="am-table am-table-bordered am-table-hover am-table-compact utable1">
    <thead>
      <tr>
        <td>
          <label class="am-checkbox-inline">
              <input type="checkbox" value="join" data-am-ucheck id="apickall">
          </label>
        </td>
        <td>顾客类型</td>
        <td>姓名</td>
        <td>性别</td>
        <td>卡号</td>
        <td>手机号</td>
        <td>生日</td>
        <td>卡类型</td>
        <td>办卡时间</td>
        <td>到期时间</td>
        <td>未到店天数</td>
        <td style="width:8%;">操作</td>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
          <label class="am-checkbox-inline">
              <input type="checkbox" value="join" data-am-ucheck id="apick1">
          </label>
        </td>
        <td>会员</td>
        <td>校长</td>
        <td>男</td>
        <td>a1101</td>
        <td>13700835534</td>
        <td>1992-3-23</td>
        <td>vip至尊</td>
        <td>2017-05-04</td>
        <td>2017-05-30</td>
        <td>3</td>
        <td>
          <button class="am-btn ubtn-table ubtn-green">
            <i class="iconfont icon-bianji"></i>
           编辑
          </button>
        </td>
      </tr>
    </tbody>
  </table>
  <ul class="am-pagination am-pagination-centered upages">
    <li class="upagedec">共1页 3条记录</li>
    <li class="am-disabled"><a href="#">&laquo;</a></li>
    <li class="am-active"><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">&raquo;</a></li>
  </ul> 
</div>
<!-- 批量赠送 -->
<div class="am-modal" tabindex="-1" id="umarketing_couponm1">
  <div class="am-modal-dialog umodal">
    <div class="am-modal-hd uhead">批量赠送优惠券
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd umain1">
      <form class="am-form am-form-horizontal" id="cadd">
        <div class="am-form-group">
          <label class="am-u-lg-2 am-form-label" for="">赠送方式</label>
          <div class="am-u-lg-10 am-u-end">
            <label class="am-radio-inline">
              <input type="radio" name="radio1" value="0" data-am-ucheck> 开卡赠送
            </label>
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-2 am-form-label" for=""></label>
          <div class="am-u-lg-10 am-u-end">
            <label class="am-radio-inline">
              <input type="radio" name="radio1" value="0" data-am-ucheck> 充值赠送
            </label>
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-2 am-form-label" for=""></label>
          <div class="am-u-lg-10 am-u-end">
            <label class="am-radio-inline">
              <input type="radio" name="radio1" value="0" data-am-ucheck> 消费赠送
            </label>
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-2 am-form-label" for=""></label>
          <div class="am-u-lg-10 am-u-end">
            <label class="am-radio-inline">
              <input type="radio" name="radio1" value="0" data-am-ucheck> 营销赠送
            </label>
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-2 am-form-label" for=""></label>
          <div class="am-u-lg-10 am-u-end">
            <label class="am-radio-inline">
              <input type="radio" name="radio1" value="0" data-am-ucheck> 微信赠送
            </label>
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-2 am-form-label" for=""></label>
          <div class="am-u-lg-10 am-u-end">
            <label class="am-radio-inline">
              <input type="radio" name="radio1" value="0" data-am-ucheck> 其它方式
            </label>
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-2 am-form-label" for="">优惠券列表</label>
          <div class="am-u-lg-10 am-u-end">
            <label class="am-radio-inline">
              <input type="radio" name="radio1" value="0" data-am-ucheck> 代金券 名称1 28元 2017-05-04~2017-05-06
            </label>
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-2 am-form-label" for=""></label>
          <div class="am-u-lg-10 am-u-end">
            <label class="am-radio-inline">
              <input type="radio" name="radio1" value="0" data-am-ucheck> 体验券 名称2 38元 2017-05-04~2017-05-06
            </label>
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-2 am-form-label">短信通知
            <label class="am-checkbox-inline">
              <input type="checkbox" value="join" data-am-ucheck>
            </label>
          </label> 
        </div>
        <div class="am-form-group">
          <div class="am-u-lg-12 am-u-end">
            <textarea class="am-form-field utextarea utextarea-max" row="3"></textarea>
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-2 am-form-label">微信通知
            <label class="am-checkbox-inline">
              <input type="checkbox" value="join" data-am-ucheck>
            </label>
          </label> 
        </div>
      </form>
    </div>
    <div class="am-modal-footer ufoot">
      <div class="am-btn-group">
        <button type="button" class="am-btn ubtn-sure ubtn-green copenm3"><i class="iconfont icon-yuanxingxuanzhong"></i>
          完成
        </button>
      </div>
    </div>
  </div>
</div>
<!-- 更多查询 -->
<div class="am-modal" tabindex="-1" id="umarketing_couponm2">
  <div class="am-modal-dialog umodal">
    <div class="am-modal-hd uhead">更多查询条件
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd umain1">
      <form class="am-form am-form-horizontal" id="cadd">
        <div class="am-form-group">
          <label class="am-u-lg-3 am-form-label" for="">顾客类型</label>
          <div class="am-u-lg-4">
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
          <label class="am-u-lg-3 am-form-label" for="">卡类型</label>
          <div class="am-u-lg-4">
            <select class="uselect uselect-max" data-am-selected>
              <option value="a">A1</option>
              <option value="b">Baa</option>
              <option value="o">C1</option>
              <option value="m">Mango</option>
              <option value="d">禁用</option>
            </select>
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-3 am-form-label">性别</label>
          <div class="am-u-lg-4 am-u-end">
            <label class="am-radio-inline">
              <input type="radio" name="radio4" value="0" data-am-ucheck> 不限
            </label>
            <label class="am-radio-inline">
              <input type="radio" name="radio4" value="1" data-am-ucheck> 男
            </label>
            <label class="am-radio-inline">
              <input type="radio" name="radio4" value="1" data-am-ucheck> 女
            </label>
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-3 am-form-label" for="">开卡时段</label>
          <div class="am-u-lg-4">
            <div class="am-input-group am-datepicker-date udatepicker udatepicker-max" data-am-datepicker="{format:'yyyy-mm-dd'}">
              <input type="text" class="am-form-field">
              <span class="am-input-group-btn am-datepicker-add-on">
                <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span></button>
              </span>
            </div>
          </div>
          <div class="am-u-lg-1 ua1">~</div>
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
          <label class="am-u-lg-3 am-form-label" for="">到期时段</label>
          <div class="am-u-lg-4">
            <div class="am-input-group am-datepicker-date udatepicker udatepicker-max" data-am-datepicker="{format:'yyyy-mm-dd'}">
              <input type="text" class="am-form-field">
              <span class="am-input-group-btn am-datepicker-add-on">
                <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span></button>
              </span>
            </div>
          </div>
          <div class="am-u-lg-1 ua1">~</div>
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
          <label class="am-u-lg-3 am-form-label" for="">生日时段</label>
          <div class="am-u-lg-4">
            <div class="am-input-group am-datepicker-date udatepicker udatepicker-max" data-am-datepicker="{format:'yyyy-mm-dd'}">
              <input type="text" class="am-form-field">
              <span class="am-input-group-btn am-datepicker-add-on">
                <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span></button>
              </span>
            </div>
          </div>
          <div class="am-u-lg-1 ua1">~</div>
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
          <label class="am-u-lg-3 am-form-label" for="">未到店天数</label>
          <div class="am-u-lg-4">
            <input id="" class="uinput uinput-max" type="text" placeholder="">
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

<script src="../js/jquery.min.js"></script>
<script src="../js/amazeui.min.js"></script>
<script type="text/javascript">
$(function() {
  $(document).on('click','#apickall',function(){
    $("[id*='apick']").prop('checked',$("#apickall").prop('checked'));
  })
});
</script>
</body>
</html>