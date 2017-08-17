<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>
<div id="ucard" class="gcontent">
  <ul class="am-nav am-nav-pills ubread">
    <li class="am-active"><a href="#">短信营销</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="utools">
    <form class="am-form-inline uform2">
      <div class="am-form-group">
        <label class="am-form-label">卡类型：</label> 
        <select class="uselect uselect-auto" data-am-selected name="type">
          <option value="0">全部卡类型</option>
        <?php foreach($this->_data['card_type'] as $row) { ?>
          <option value="<?php echo $row['card_type_id']; ?>" <?php if($this->_data['request']['type']==$row['card_type_id']){echo "selected='selected'";}  ;?>><?php echo $row['card_type_name']; ?></option>
        <?php } ?> 
        </select>
      </div>
      <div class="am-form-group">
        <button type="submit" class="am-btn ubtn-search">
          <i class="iconfont icon-search"></i>查询
        </button>
      </div>
      <div class="am-form-group">
        <button type="button" class="am-btn ubtn-search" data-am-modal="{target:'#ucardm2'}">
          <i class="iconfont icon-search"></i>更多查询条件
        </button>
      </div>
    </form>
    <button class="am-btn ubtn-sure ubtn-blue" data-am-modal="{target:'#umarketing_couponm1'}">
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
      <?php foreach($this->_data['card_list']['list'] as $row) { ?>
      <tr>
        <td><?php echo $row['card_name']; ?></td>
        <td><?php echo $row['sex']; ?></td>
        <td><?php echo $row['card_code']; ?></td>
        <td><?php echo $row['card_phone']; ?></td>
        <td><?php echo date('Y-m-d',$row['card_birthday']); ?></td>
        <td><?php echo $row['c_card_type_name']; ?></td>
        <td><?php echo date('Y-m-d',$row['card_atime']); ?></td>
        <td><?php echo date('Y-m-d',$row['card_edate']); ?></td>
        <td><?php echo $row['leave_days']; ?></td>
      </tr>
    <?php } ?> 
    </tbody>
  </table>
  <ul class="am-pagination am-pagination-centered upages">
    <li class="upage-info">共<?php echo $this->_data['card_list']['pagecount']; ?>页 <?php echo $this->_data['card_list']['allcount']; ?>条记录</li>
    <li class="cfirst am-disabled"><a href="card.php?<?php echo api_value_query($this->_data['request'], $this->_data['card_list']['pagepre']); ?>">&laquo;</a></li>
    <li class="am-active"><a href="#"><?php echo $this->_data['card_list']['pagenow'];?></a></li>
    <li class="clast"><a href="card.php?<?php echo api_value_query($this->_data['request'], $this->_data['card_list']['pagenext']); ?>">&raquo;</a></li>
    <li class="upage-info">，跳转到第 <input id="idpagego" class="am-form-field uinput" style="width:45px;height: 26px;vertical-align:bottom;line-height: 26px;" onkeydown="if(event.keyCode == 13){page_do();}"> 页</li>
  </ul>
</div>
<!-- 批量赠送 -->
<!-- 批量发短信 -->
<div class="am-modal" tabindex="-1" id="umarketing_couponm1">
  <div class="am-modal-dialog umodal umodal-simple">
    <div class="am-modal-hd uhead">批量发送短信
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd">
      <form class="am-form am-form-horizontal">
        <div class="am-form-group">
          <label class="umodal-label am-form-label">注意事项：</label>
          <div class="umodal-max am-text-left">
            <label class="am-checkbox-inline">
              营销短信发送时间为8:00-18:00，其它时间发送，将影响您的发送结果~
            </label>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label">短信内容：</label>
          <div class="umodal-max">
            <textarea class="am-form-field utextarea utextarea-max" row="3"></textarea>
          </div>
        </div>
      </form>
    </div>
    <div class="am-modal-footer ufoot">
      <div class="am-btn-group">
        <button type="button" class="am-btn ubtn-sure ubtn-green copenm3"><i class="iconfont icon-yuanxingxuanzhong"></i>
          确认发送短信
        </button>
      </div>
    </div>
  </div>
</div>
<!-- 更多查询 -->
<div class="am-modal" tabindex="-1" id="ucardm2">
  <div class="am-modal-dialog umodal">
    <div class="am-modal-hd uhead">更多查询条件
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd">
      <form class="am-form am-form-horizontal" id="cadd" action="">
        <div class="am-form-group">
          <label class="umodal-label am-form-label">性别：</label>
          <div class="umodal-normal am-text-left">
            <label class="am-radio-inline">
              <input type="radio" name="sex" value="0" data-am-ucheck checked> 不限
            </label>
            <label class="am-radio-inline">
              <input type="radio" name="sex" value="1" data-am-ucheck> 男
            </label>
            <label class="am-radio-inline">
              <input type="radio" name="sex" value="2" data-am-ucheck> 女
            </label>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">开卡时段：</label>
          <div class="umodal-normal">
            <div class="am-input-group am-datepicker-date udatepicker udatepicker-max" data-am-datepicker="{format:'yyyy-mm-dd'}">
              <input type="text" class="am-form-field" name="atime">
              <span class="am-input-group-btn am-datepicker-add-on">
                <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span></button>
              </span>
            </div>
          </div>
          <div class="umodal-text">&nbsp;&nbsp;~&nbsp;&nbsp;</div>
          <div class="umodal-normal">
            <div class="am-input-group am-datepicker-date udatepicker udatepicker-max" data-am-datepicker="{format:'yyyy-mm-dd'}">
              <input type="text" class="am-form-field" name="latime">
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
              <input type="text" class="am-form-field" name="edate">
              <span class="am-input-group-btn am-datepicker-add-on">
                <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span></button>
              </span>
            </div>
          </div>
          <div class="umodal-text">&nbsp;&nbsp;~&nbsp;&nbsp;</div>
          <div class="umodal-normal">
            <div class="am-input-group am-datepicker-date udatepicker udatepicker-max" data-am-datepicker="{format:'yyyy-mm-dd'}">
              <input type="text" class="am-form-field" name="ledate">
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
              <input type="text" class="am-form-field" name="birthday">
              <span class="am-input-group-btn am-datepicker-add-on">
                <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span></button>
              </span>
            </div>
          </div>
          <div class="umodal-text">&nbsp;&nbsp;~&nbsp;&nbsp;</div>
          <div class="umodal-normal">
            <div class="am-input-group am-datepicker-date udatepicker udatepicker-max" data-am-datepicker="{format:'yyyy-mm-dd'}">
              <input type="text" class="am-form-field" name="lbirthday">
              <span class="am-input-group-btn am-datepicker-add-on">
                <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span></button>
              </span>
            </div>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">未到天数：</label>
          <div class="umodal-normal">
            <input id="" class="uinput uinput-max" type="text" placeholder="" name="ldays">
            <input id="" class="uinput uinput-max" type="hidden" placeholder="" name="type">
          </div>
          <div class="umodal-text">&nbsp;天</div>
        </div>
      </form>
    </div>
    <div class="am-modal-footer ufoot">
      <div class="am-btn-group">
        <button type="button" class="am-btn ubtn-sure ubtn-green csearch"><i class="iconfont icon-yuanxingxuanzhong"></i>
          完成
        </button>
      </div>
    </div>
  </div>
</div>
<script src="../js/jquery.min.js"></script>
<script src="../js/amazeui.min.js"></script>
<script>
//分页首末页不可选中
if(<?php echo $this->_data['card_list']['pagenow'];?>>1){
  $('.upages li.cfirst').removeClass('am-disabled');
}
if(<?php echo $this->_data['card_list']['pagecount']-$this->_data['card_list']['pagenow']; ?><1){
  $('.upages li.clast').addClass('am-disabled');
}

function page_do() {
  var intpage = parseInt(document.getElementById("idpagego").value);
  if(isNaN(intpage)) {
    alert("请输入正确的页码！");
  } else {
    window.location = "card.php?<?php echo api_value_query($this->_data['request']); ?>&page=" + intpage;
  }
}
$('.csearch').on('click',function(){
  var type = $("#ucard .uform2 select[name='type']").val();
  $("#ucardm2 input[name='type']").val(type);
  $('#cadd').submit();
});
</script>
</body>
</html>

