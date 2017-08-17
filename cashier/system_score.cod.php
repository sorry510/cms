<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>
<!-- content -->
<div class="gcontent" id="system_score">
  <ul class="am-nav am-nav-pills ubread">
    <li class="am-active"><a href="javascript: void(0);">积分换礼</a></li>
    <li><a href="system_score_gift.php">礼品设置</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="utools">
    <form class="am-form-inline uform2">
      <div class="am-form-group">
        搜索：
        <input type="text" class="am-form-field uinput uinput140" placeholder="卡号/手机号/姓名" name="search" value="<?php echo $this->_data['request']['search']?>">
      </div>

      <div class="am-form-group">
        日期：
        <div class="am-input-group am-datepicker-date udatepicker udatepicker140" data-am-datepicker="{format: 'yyyy-mm-dd'}">
          <input type="text" class="am-form-field" name="from" value="<?php echo $this->_data['request']['from']?>">
          <span class="am-input-group-btn am-datepicker-add-on">
            <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span>
            </button>
          </span>
        </div>  
      </div>
      <div class="am-form-group">    
        至：
        <div class="am-input-group am-datepicker-date udatepicker udatepicker140" data-am-datepicker="{format: 'yyyy-mm-dd'}">
          <input type="text" class="am-form-field" name="to" value="<?php echo $this->_data['request']['to']?>">
          <span class="am-input-group-btn am-datepicker-add-on">
            <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span> </button>
          </span>
        </div>   
      </div>
      <div class="am-form-group search">
        <button type="submit" class="am-btn ubtn-search">
          <i class="iconfont icon-search"></i>查询
        </button>
      </div>
    </form>
    <button class="am-btn ubtn-sure ubtn-blue" data-am-modal="{target:'#usystem_scorem1'}">
      <i class="iconfont icon-question"></i>
      积分换礼
    </button>
  </div>
  <div class="gspace15"></div>
  <table class="am-table am-table-bordered am-table-hover am-table-compact utable1">
    <thead>
      <tr>
        <td>日期</td>
        <td>会员卡号</td>
        <td>卡类型</td>
        <td>兑换内容</td>
        <td>兑换积分</td>
      </tr>
    </thead>
    <tbody>
    <?php foreach($this->_data['gift_record_list']['list'] as $row){?>
      <tr>
        <td><?php echo date("Y-m-d H:i",$row['gift_record_atime']);?></td>
        <td><?php echo $row['c_card_code'];?></td>
        <td><?php echo $row['c_card_type_name'];?></td>
        <td><?php echo $row['gift_goods'];?></td>
        <td><?php echo $row['gift_score'];?></td>
      </tr>
    <?php }?>
    </tbody>
  </table>
  <?php pageHtml($this->_data['gift_record_list'],$this->_data['request'],'system_score.php');?>
</div>


<!-- 礼品兑换弹出框 -->
<div id="usystem_scorem1" class="am-modal" tabindex="-1">
  <div class="am-modal-dialog umodal umodal-simple">
    <div class="am-modal-hd uhead">礼品兑换
      <a href="javascript:void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd">
      <form class="am-form am-form-horizontal">
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">搜索：</label>
          <div class="umodal-normal">
            <input class="am-form-field uinput uinput-max csearch" type="text" placeholder="卡号/姓名/手机号">
          </div>
          <div class="umodal-search">
              <button type="button" class="am-btn ubtn-search2 ubtn-green ccard_search">
                <i class="iconfont icon-search"></i>
                查询
              </button>
          </div>
        </div>
        <div class="am-form-group">
          <div class="gspace20" style="border-bottom:1px solid #dddddd;"></div>
        </div>
        <div class="am-form-group" style="margin-bottom:0px;">
          <label class="umodal-label am-form-label" for="">会员卡号：</label>
          <div class="umodal-text ccard_code" style="width:200px;">&nbsp;</div>
          <label class="umodal-label am-form-label" for="">会员姓名：</label>
          <div class="umodal-text ccard_name">&nbsp;</div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">手机号码：</label>
          <div class="umodal-text ccard_phone" style="width:200px;">&nbsp;</div>
          <label class="umodal-label am-form-label" for="">积分：</label>
          <div class="umodal-text ccard_yscore">&nbsp;</div>
        </div>
        <div class="am-scrollable-vertical uscroll-table">
          <table class="am-table am-table-bordered am-table-hover am-table-compact utable1" style="width:100%;">
            <thead>
              <tr>
                <td>礼品列表</td>
                <td>名称</td>
                <td>扣除积分</td>
                <td>数量</td>
              </tr>
            </thead>
            <tbody>
            <?php foreach($this->_data['gift_list'] as $row){?>
              <tr>
                <td>        
                  <label class="am-checkbox-inline" style="margin:0px;">
                    <input type="checkbox" class="ccheck" value="111" data-am-ucheck>&nbsp;
                  </label>
                </td>
                <td><?php echo $row['gift_name'];?></td>
                <td><?php echo $row['gift_score'];?></td>
                <td>
                  <a href="javascript:;" class="ufont1 cbtndec"><i class="am-icon-minus"></i></a>
                  <input type="text" score="<?php echo $row['gift_score'];?>" gift_id="<?php echo $row['gift_id'];?>" gift_name="<?php echo $row['gift_name'];?>" class="uinputmin1 cnum" value="1">
                  <a href="javascript:;" class="ufont1 cbtnplus"><i class="am-icon-plus" aria-hidden="true"></i></a>
                </td>
              </tr>
            <?php }?>
            </tbody>
          </table>
        </div>
        <input type="hidden" class="ccard_id">
      </form>
    </div>
    <div class="am-modal-footer ufoot">
      <div class="am-btn-group ubtn-left">
        <div style="line-height:40px;">累计扣除积分：<span class="gtext-orange call_score">0</span>分，&nbsp;&nbsp;剩余积分：<span class="gtext-orange ccard_yscore_now">0</span>分</div>
      </div>
      <div class="am-btn-group">
        <button type="button" class="am-btn ubtn-sure ubtn-green caddsubmit"><i class="iconfont icon-yuanxingxuanzhong"></i>
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

<?php pageJs($this->_data['gift_record_list'],$this->_data['request'],'system_score.php');?>

$('.ccard_search').on('click' ,function(){
  var search = $('#usystem_scorem1 .csearch').val();
  console.log(search);
  $.getJSON('card_search_ajax.php' ,{search:search} ,function(res){
    //可能会有多个，暂时只处理第一个
    // console.log(res);
    res = res[0];
    if(res){
      $('#usystem_scorem1 .ccard_code').text(res.card_code);
      $('#usystem_scorem1 .ccard_name').text(res.card_name);
      $('#usystem_scorem1 .ccard_phone').text(res.card_phone);
      $('#usystem_scorem1 .ccard_yscore').text(res.s_card_yscore);
      $('#usystem_scorem1 .ccard_yscore_now').text(res.s_card_yscore);
      $('#usystem_scorem1 .ccard_id').val(res.card_id);
    }
  })
})

// + -
$(document).on("click", ".cbtndec", function() {
  var _self= $(this).siblings('input');
  if(parseInt(_self.val())>=1)
    _self.val(parseInt(_self.val())-1);
  jisuan();
});
$(document).on("click", ".cbtnplus", function() {
  var _self= $(this).siblings('input');
  _self.val(parseInt(_self.val())+1);
  jisuan();
});
$('#usystem_scorem1 .ccheck').on('change', jisuan)
$("#usystem_scorem1 .cnum").on("input propertychange", jisuan);

$('.caddsubmit').on('click', function(){
  var arr = [];
  var json = {};
  var card_id = $('#usystem_scorem1 .ccard_id').val();
  var card_yscore = $('#usystem_scorem1 .ccard_yscore_now').text();
  var gift_score = $('#usystem_scorem1 .call_score').text();
  if(!card_id){
    alert('必须选择一个会员');
    return false;
  }
  if(Number(card_yscore)<0){
    alert('超出最大积分');
    return false;
  }
  $('#usystem_scorem1 .cnum').each(function(){
    if($(this).parent().siblings().eq(0).find('input.ccheck').prop('checked')){
      json = {'gift_id':$(this).attr('gift_id'),'gift_score':$(this).attr('score'),'gift_num':$(this).val(),'gift_name':$(this).attr('gift_name')};
      arr.push(json);
    }
  });
  var data ={
    card_id:card_id,
    card_yscore:card_yscore,
    gift_score:gift_score,
    arr:arr
  }
  // console.log(data);return false;
  $.post('system_score_add_do.php', data, function(res){
    console.log(res);
    if(res == 0){

    }
  })

})
function jisuan(){
  var all_score = 0;
  var yscore = $('#usystem_scorem1 .ccard_yscore').text();
  $('#usystem_scorem1 .cnum').each(function(){
    if(isNaN($(this).val())){
      $(this).val(1);
    }
    if($(this).parent().siblings().eq(0).find('input.ccheck').prop('checked')){
      all_score = Number(all_score)+Number($(this).val()*$(this).attr('score'));
    }
  });
  $('#usystem_scorem1 .call_score').text(all_score);
  $('#usystem_scorem1 .ccard_yscore_now').text(Number(yscore)-Number(all_score));
}
</script>
</body>
</html>
