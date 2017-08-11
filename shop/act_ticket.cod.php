<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>
<div id="ucard" class="gcontent">
  <ul class="am-nav am-nav-pills ubread">
    <li class="am-active"><a href="#">赠送优惠券</a></li>
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
    <button class="am-btn ubtn-sure ubtn-blue cgive" data-am-modal="{target:'#ucardm1'}">
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
        <td>上次到店时间</td>
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
        <td><?php echo date('Y-m-d H:i:s',$row['card_ltime']); ?></td>
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
    <li>，跳转到第 <input id="idpagego" class="am-form-field uinput" style="width:45px;height: 26px;vertical-align:bottom;line-height: 26px;" onkeydown="if(event.keyCode == 13){page_do();}"> 页</li>
  </ul>
</div>
<!-- 批量赠送 -->
<div class="am-modal" tabindex="-1" id="ucardm1">
  <div class="am-modal-dialog umodal umodal-simple">
    <div class="am-modal-hd uhead">批量赠送优惠券
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd">
      <form class="am-form am-form-horizontal">
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">活动名称：</label>
          <div class="umodal-normal">
            <input class="am-form-field uinput uinput-max" type="" name="act_name">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">赠送方式：</label>
          <div class="umodal-normal">
            <select class="uselect uselect-max" data-am-selected>
              <option value="4">营销赠送</option>
            </select>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">赠送类型：</label>
          <div class="umodal-normal am-text-left">
            <label class="am-radio-inline">
              <input class="cttype" type="radio" name="ttype" value="1" data-am-ucheck checked> 代金券
            </label>
            <label class="am-radio-inline">
              <input class="cttype" type="radio" name="ttype" value="2" data-am-ucheck> 体验券
            </label> 
          </div>
        </div>
        <div class="am-form-group cmoney">
          <label class="umodal-label am-form-label" for="">代金券：</label>
          <div class="umodal-normal">
            <select class="uselect uselect-max" name="ticket_money_id" data-am-selected>
              <?php foreach($this->_data['money'] as $row) { ?>
                <option value="<?php echo $row['ticket_money_id']; ?>"><?php echo $row['ticket_money_name']; ?></option>
              <?php } ?> 
            </select>
          </div>
        </div>
        <div class="am-form-group cgoods" style="display: none;">
          <label class="umodal-label am-form-label" for="">体验券：</label>
          <div class="umodal-normal">
            <select class="uselect uselect-max" name="ticket_goods_id" data-am-selected>
              <?php foreach($this->_data['goods'] as $row) { ?>
                <option value="<?php echo $row['ticket_goods_id']; ?>"><?php echo $row['ticket_goods_name']; ?></option>
              <?php } ?> 
            </select>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label">短信通知：</label>
          <div class="umodal-max am-text-left">
            <label class="am-checkbox-inline">
              <input type="checkbox" name="sms"  value="1" data-am-ucheck> &nbsp;
            </label>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label">&nbsp;</label>
          <div class="umodal-max">
            <textarea class="am-form-field utextarea utextarea-max" name="info" row="3"></textarea>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label">微信推送：</label>
          <div class="umodal-normal am-text-left">
            <label class="am-checkbox-inline">
              <input type="checkbox" name="weixin"  value="1" data-am-ucheck> &nbsp;
            </label>
          </div>
        </div>
      </form>
    </div>
    <div class="am-modal-footer ufoot">
      <div class="am-btn-group">
        <button type="button" class="am-btn ubtn-sure ubtn-green copenm3 csubmitadd"><i class="iconfont icon-yuanxingxuanzhong"></i>
          确认发放
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
function GetQueryString(name)
{
  var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)");
  var r = window.location.search.substr(1).match(reg);
  if(r!=null)return  unescape(r[2]); return '';
}
$('#date2').on('focusout',function(){
  if ($('#date2').val()!='') {$('#date1').val(null)}
})
$('#date4').on('focusout',function(){
  if ($('#date4').val()!='') {$('#date3').val(null)}
})
$('#ucardm1 .cttype').on('click',function(){
    if($(this).val()==1){
      $('#ucardm1 .cmoney').fadeIn(0);
      $('#ucardm1 .cgoods').fadeOut(0);
    }else{
      $('#ucardm1 .cgoods').fadeIn(0);
      $('#ucardm1 .cmoney').fadeOut(0);
    }
});
$('.csearch').on('click',function(){
  var type = $("#ucard .uform2 select[name='type']").val();
  $("#ucardm2 input[name='type']").val(type);
  $('#cadd').submit();
});
//添加操作JS
$('.csubmitadd').on('click',function(){
  console.log(GetQueryString('sex'));
    $('.csubmitadd').attr("disabled",true);
    var url="card_add_do.php";
    var type = GetQueryString('type');
    var sex = GetQueryString('sex');
    var atime = GetQueryString('atime');
    var latime = GetQueryString('latime');
    var edate = GetQueryString('ledate');
    var ledate = GetQueryString('ledate');
    var birthday = GetQueryString('birthday');
    var lbirthday = GetQueryString('lbirthday');
    var ldays = GetQueryString('ldays');
    var act_name = $("#ucardm1 input[name='act_name']").val();
    var ttype = $("#ucardm1 input[name='ttype']:checked").val();
    var ticket_money_id = $("#ucardm1 select[name='ticket_money_id']").val();
    var ticket_goods_id = $("#ucardm1 select[name='ticket_goods_id']").val();
    var start = $("#ucardm1 input[name='start']").val();
    var timetype = $("#ucardm1 input[name='timetype']").val();
    var tdays = $("#ucardm1 input[name='tdays']").val();
    var ttime = $("#ucardm1 input[name='ttime']").val();
    var sms = $("#ucardm1 input[name='sms']").val();
    var info = $("#ucardm1 textarea[name='info']").val();
    var weixin = $("#ucardm1 input[name='weixin']").val();
    var data = {
      type:type,
      sex:sex,
      atime:atime,
      latime:latime,
      edate:edate,
      ledate:ledate,
      birthday:birthday,
      lbirthday:lbirthday,
      ldays:ldays,
      act_name:act_name,
      ttype:ttype,
      ticket_money_id:ticket_money_id,
      ticket_goods_id:ticket_goods_id,
      start:start,
      timetype:timetype,
      tdays:tdays,
      ttime:ttime,
      sms:sms,
      info:info,
      weixn:weixin
    };
    console.log(data);
    $.post(url,data,function(res){
      if(res=='0'){
        window.location.reload();
      }else if(res=='100'){
        alert('没有发送对象');
        $('.csubmitadd').attr("disabled",false);
      }else{
        alert('发送失败');
        console.log(res);
        $('.csubmitadd').attr("disabled",false);
      }
    });
  });
</script>
</body>
</html>