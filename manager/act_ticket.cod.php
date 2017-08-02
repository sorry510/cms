<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>
<div id="uact_ticket" class="gcontent">
  <ul class="am-nav am-nav-pills ubread">
    <li class="am-active"><a href="#">赠送优惠券</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="utools">
    <form class="am-form-inline uform2">
      <div class="am-form-group">
        <label class="am-form-label">卡类型：</label> 
        <select class="uselect uselect-auto" data-am-selected name="">
          <option value="all">全部卡类型</option>
          <option value="2">fsdsdfsdfsdffdfsd</option>
          <option value="3">3</option>
        </select>
      </div>
      <div class="am-form-group">
        <button type="submit" class="am-btn ubtn-search">
          <i class="iconfont icon-search"></i>查询
        </button>
      </div>
      <div class="am-form-group">
        <button type="button" class="am-btn ubtn-search" data-am-modal="{target:'#uact_ticketm2'}">
          <i class="iconfont icon-search"></i>更多查询条件
        </button>
      </div>
    </form>
    <button class="am-btn ubtn-sure ubtn-blue" data-am-modal="{target:'#uact_ticketm1'}">
      <i class="iconfont icon-xinzeng"></i>
      批量赠送
    </button>
  </div>
  <div class="gspace15"></div>
  <table class="am-table am-table-bordered am-table-hover am-table-compact utable1">
    <thead>
      <tr>
        <td>姓名</td>
        <td>性别</td>
        <td>卡号</td>
        <td>手机号</td>
        <td>生日</td>
        <td>卡类型</td>
        <td>办卡时间</td>
        <td>到期时间</td>
        <td>未到店天数</td>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>校长</td>
        <td>男</td>
        <td>a1101</td>
        <td>13700835534</td>
        <td>1992-3-23</td>
        <td>vip至尊</td>
        <td>2017-05-04</td>
        <td>2017-05-30</td>
        <td>3</td>
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
<div class="am-modal" tabindex="-1" id="uact_ticketm1">
  <div class="am-modal-dialog umodal umodal-simple">
    <div class="am-modal-hd uhead">批量赠送优惠券
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd">
      <form class="am-form am-form-horizontal">
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">活动名称：</label>
          <div class="umodal-normal">
            <input class="am-form-field uinput uinput-max" type="" name="">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">赠送方式：</label>
          <div class="umodal-normal">
            <select class="uselect uselect-max" data-am-selected>
              <option value="a">开卡赠送</option>
              <option value="b">活动赠送</option>
              <option value="o">营销赠送</option>
              <option value="m">Mango</option>
              <option value="d">禁用</option>
            </select>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">赠送类型：</label>
          <div class="umodal-normal am-text-left">
            <label class="am-radio-inline">
              <input type="radio" name="radio1" value="male" data-am-ucheck checked> 代金券
            </label>
            <label class="am-radio-inline">
              <input type="radio" name="radio1" value="female" data-am-ucheck> 体验券
            </label> 
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">优惠券：</label>
          <div class="umodal-normal">
            <select class="uselect uselect-max" data-am-selected>
              <option value="a">20元代金券</option>
              <option value="b">名称2</option>
              <option value="o">Orange</option>
              <option value="m">Mango</option>
              <option value="d">禁用</option>
            </select>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">开始时间：</label>
          <div class="umodal-normal am-text-left">
            <div class="am-input-group am-datepicker-date udatepicker udatepicker-max" data-am-datepicker="{format:'yyyy-mm-dd'}">
              <input id="date1" type="text" class="am-form-field">
              <span class="am-input-group-btn am-datepicker-add-on">
                <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span></button>
              </span>
            </div>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">可用时限：</label>
          <div class="umodal-normal am-text-left">
            <label class="am-radio-inline">
              <input type="radio" name="radio1" class="cchecked" value="0" data-am-ucheck checked> 有效期
            </label>
            <label class="am-radio-inline">
              <input type="radio" name="radio1" class="cchecked" value="1" data-am-ucheck> 到期时间
            </label>
          </div>
        </div>
        <div class="am-form-group cispwd1">
          <label class="umodal-label am-form-label" for="">有效期：</label>
          <div class="umodal-normal">
            <input id="date2" type="text" class="am-form-field uinput uinput-max">
          </div>
          <label class="umodal-label am-form-label am-text-left">&nbsp;天</label>
        </div>
        <div class="am-form-group cispwd2">
          <label class="umodal-label am-form-label" for="">到期时间：</label>
          <div class="umodal-normal">
            <div class="am-input-group am-datepicker-date udatepicker udatepicker-max" data-am-datepicker="{format:'yyyy-mm-dd'}">
              <input id="date1" type="text" class="am-form-field">
              <span class="am-input-group-btn am-datepicker-add-on">
                <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span></button>
              </span>
            </div>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label">短信通知：</label>
          <div class="umodal-max am-text-left">
            <label class="am-checkbox-inline">
              <input type="checkbox"  value="" data-am-ucheck> &nbsp;
            </label>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label">&nbsp;</label>
          <div class="umodal-max">
            <textarea class="am-form-field utextarea utextarea-max" row="3"></textarea>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label">微信推送：</label>
          <div class="umodal-normal am-text-left">
            <label class="am-checkbox-inline">
              <input type="checkbox"  value="" data-am-ucheck> &nbsp;
            </label>
          </div>
        </div>
      </form>
    </div>
    <div class="am-modal-footer ufoot">
      <div class="am-btn-group">
        <button type="button" class="am-btn ubtn-sure ubtn-green copenm3"><i class="iconfont icon-yuanxingxuanzhong"></i>
          确认发放
        </button>
      </div>
    </div>
  </div>
</div>
<!-- 更多查询 -->
<div class="am-modal" tabindex="-1" id="uact_ticketm2">
  <div class="am-modal-dialog umodal">
    <div class="am-modal-hd uhead">更多查询条件
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd">
      <form class="am-form am-form-horizontal" id="cadd">
        <div class="am-form-group">
          <label class="umodal-label am-form-label">性别：</label>
          <div class="umodal-normal am-text-left">
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
          <label class="umodal-label am-form-label" for="">开卡时段：</label>
          <div class="umodal-normal">
            <div class="am-input-group am-datepicker-date udatepicker udatepicker-max" data-am-datepicker="{format:'yyyy-mm-dd'}">
              <input type="text" class="am-form-field">
              <span class="am-input-group-btn am-datepicker-add-on">
                <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span></button>
              </span>
            </div>
          </div>
          <div class="umodal-text">&nbsp;&nbsp;~&nbsp;&nbsp;</div>
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
          <label class="umodal-label am-form-label" for="">到期时段：</label>
          <div class="umodal-normal">
            <div class="am-input-group am-datepicker-date udatepicker udatepicker-max" data-am-datepicker="{format:'yyyy-mm-dd'}">
              <input type="text" class="am-form-field">
              <span class="am-input-group-btn am-datepicker-add-on">
                <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span></button>
              </span>
            </div>
          </div>
          <div class="umodal-text">&nbsp;&nbsp;~&nbsp;&nbsp;</div>
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
          <label class="umodal-label am-form-label" for="">生日时段：</label>
          <div class="umodal-normal">
            <div class="am-input-group am-datepicker-date udatepicker udatepicker-max" data-am-datepicker="{format:'yyyy-mm-dd'}">
              <input type="text" class="am-form-field">
              <span class="am-input-group-btn am-datepicker-add-on">
                <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span></button>
              </span>
            </div>
          </div>
          <div class="umodal-text">&nbsp;&nbsp;~&nbsp;&nbsp;</div>
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
          <label class="umodal-label am-form-label" for="">未到天数：</label>
          <div class="umodal-normal">
            <input id="" class="uinput uinput-max" type="text" placeholder="">
          </div>
          <div class="umodal-text">&nbsp;天</div>
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
    // 时限设置隐藏
    $('.cispwd2').hide();
    $('.cchecked').on('click', function(e) {
            if($(this).val()==1){
              $('.cispwd1').fadeOut(0);
              $('.cispwd2').fadeIn(0);
            }else{
              $('.cispwd2').fadeOut(0);
              $('.cispwd1').fadeIn(0);
            }
    });
</script>
</body>
</html>