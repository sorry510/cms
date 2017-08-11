<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>
<!-- content -->
<div class="gcontent" id="uact_give">
  <ul class="am-nav am-nav-pills ubread">
    <li class="am-active"><a href="javascript: void(0);">满送活动</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="utools">
    <form class="am-form-inline uform2">
    <div class="am-form-group">
        <label for="doc-ipt-3" class="am-form-label">活动名称：</label>
        <input type="text" value="<?php echo htmlspecialchars($this->_data['request']['act_name']); ?>" class="am-form-field uinput uinput-220" placeholder="" name="act_name">
    </div>
      <div class="am-form-group">
        <label for="doc-ipt-3" class="am-form-label">日期：</label>
        <div class="am-input-group am-datepicker-date udatepicker" data-am-datepicker="{format: 'yyyy-mm-dd'}">
          <input type="text" class="am-form-field" name="from" value="<?php echo htmlspecialchars($this->_data['request']['from']); ?>">
          <span class="am-input-group-btn am-datepicker-add-on">
            <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span>
            </button>
          </span>
        </div>  
      </div>
      <div class="am-form-group">    
        <label for="doc-ipt-3" class="am-form-label">至：</label>
        <div class="am-input-group am-datepicker-date udatepicker udatepicker140" data-am-datepicker="{format: 'yyyy-mm-dd'}">
          <input type="text" class="am-form-field" name="to" value="<?php echo htmlspecialchars($this->_data['request']['to']); ?>">
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
    <button class="am-btn ubtn-sure ubtn-blue" data-am-modal="{target:'#uact_givem1'}">
      <i class="iconfont icon-xinzeng"></i>
      新增满送活动
    </button>
  </div>
  <div class="gspace15"></div>
  <table class="am-table am-table-bordered am-table-hover am-table-compact utable1">
    <thead>
      <tr>
        <td>新增时间</td>
        <td>活动名称</td>
        <td>实付满</td>
        <td>类型</td>
        <td>优惠券</td>
        <td>可用时间</td>
        <td>开始时间</td>
        <td>结束时间</td>
        <td>参加店铺</td>
        <td>活动状态</td>
        <td>备注</td>
        <td style="width:16%;">操作</td>
      </tr>
    </thead>
    <tbody>
      <?php foreach($this->_data['act_give_list']['list'] as $row) { ?>
      <tr>
        <td><?php echo date('Y-m-d H:i',$row['act_give_atime']) ; ?></td>
        <td><?php echo $row['act_give_name']; ?></td>
        <td><?php echo $row['act_give_man']; ?>元</td>
        <td><?php echo $row['ttype']; ?></td>
        <td><?php echo $row['c_ticket_name']; ?></td>
        <td><?php echo $row['begin']; ?></td>
        <td><?php echo date('Y-m-d',$row['act_give_start']); ?></td>
        <td><?php echo date('Y-m-d',$row['act_give_end']); ?></td>
        <td><?php echo $row['shoptype'] ;?></td>
        <td<?php
        if ($row['act_give_state'] == 1) {
          if ($row['datstate'] == '进行中') {
            echo " class='gtext-green'>进行中";
          }elseif ($row['datstate'] == '未开始') {
             echo " class='gtext-orange'>未开始";
          }elseif ($row['datstate'] == '已结束') {
             echo " >已结束";
          }
        }else{ echo " class='gtext-orange'>停止"; }
          ;?></td>
        <td><?php echo $row['act_give_memo']; ?></td>
        <td>
          <button <?php if ($row['datstate'] == '已结束') {
            echo "style='display:none'";
          } ;?> class="am-btn ubtn-table ubtn-green cedit" data-am-modal="{target: '#uact_givem2'}" value="<?php echo $row['act_give_id']; ?>">
            <i class="iconfont icon-bianji"></i>
            修改
          </button>
          <?php if ($row['datstate'] == '未开始') {
            echo "&nbsp;";
          } ;?>
          <button <?php if ($row['datstate'] == '已结束' || $row['datstate'] == '进行中') {
            echo "style='display:none'";
          } ;?> class="am-btn ubtn-table ubtn-gray cdel" value="<?php echo $row['act_give_id']; ?>">
            <i class="iconfont icon-shanchu"></i>
            删除
          </button>
          <?php if ($row['datstate'] == '进行中') {
            echo "&nbsp;";
          } ;?>
          <button <?php if ($row['datstate'] == '已结束' || $row['datstate'] == '未开始') {
            echo "style='display:none'";
          } ;?> class="am-btn ubtn-table <?php if ($row['act_give_state'] == 1) {
            echo " ubtn-red cstop";
          }else{echo " ubtn-green cstart";} ; ?> " value="<?php echo $row['act_give_id']; ?>">
            <i class="iconfont icon-shanchu"></i>
            <?php if ($row['act_give_state'] == 1) {
              echo "停止";
            }else{ echo "启用";} ;?>
          </button>
        </td>
      </tr>
    <?php } ?> 
    </tbody>
  </table>
  <ul class="am-pagination am-pagination-centered upages">
    <li class="upage-info">共<?php echo $this->_data['act_give_list']['pagecount']; ?>页 <?php echo $this->_data['act_give_list']['allcount']; ?>条记录</li>
    <li class="cfirst am-disabled"><a href="act_give.php?<?php echo api_value_query($this->_data['request'], $this->_data['act_give_list']['pagepre']); ?>">&laquo;</a></li>
    <li class="am-active"><a href="#"><?php echo $this->_data['act_give_list']['pagenow'];?></a></li>
    <li class="clast"><a href="act_give.php?<?php echo api_value_query($this->_data['request'], $this->_data['act_give_list']['pagenext']); ?>">&raquo;</a></li>
    <li>，跳转到第 <input id="idpagego" class="am-form-field uinput" style="width:45px;height: 26px;vertical-align:bottom;line-height: 26px;" onkeydown="if(event.keyCode == 13){page_do();}"> 页</li>
  </ul>
</div>
<!-- 弹出框 -->
<div id="uact_givem1" class="am-modal" tabindex="-1">
  <div class="am-modal-dialog umodal umodal-simple">
    <div class="am-modal-hd uhead">新增满送活动
      <a href="javascript:void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd umain1">
      <form class="am-form am-form-horizontal" id="cinfoadd">
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">活动名称：</label>
          <div class="umodal-normal">
            <input id="" class="uinput uinput-max" name="name" type="text" placeholder="">
          </div>
        </div>
        
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">顾客类型：</label>
          <div class="umodal-normal am-text-left">
            <label class="am-radio-inline">
              <input type="radio" name="client" value="2" data-am-ucheck checked> 仅限会员
            </label> 
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">实付满：</label>
          <div class="umodal-normal">
            <input id="" class="uinput uinput-max" name="man" type="text" placeholder="">
          </div>
          <div class="umodal-text">&nbsp;元</div>
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
          <label class="umodal-label am-form-label" for="">开始时间：</label>
          <div class="umodal-normal">
            <div class="am-input-group am-datepicker-date udatepicker udatepicker-max" data-am-datepicker="{format:'yyyy-mm-dd'}">
              <input type="text" class="am-form-field" name="start">
              <span class="am-input-group-btn am-datepicker-add-on">
                <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span></button>
              </span>
            </div>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">结束时间：</label>
          <div class="umodal-normal">
            <div class="am-input-group am-datepicker-date udatepicker udatepicker-max" data-am-datepicker="{format:'yyyy-mm-dd'}">
              <input type="text" class="am-form-field" name="end">
              <span class="am-input-group-btn am-datepicker-add-on">
                <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span></button>
              </span>
            </div>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">备注：</label>
          <div class="umodal-max">
            <textarea class="am-form-field utextarea utextarea-max" name="memo" row="3"></textarea>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">参加店铺：</label>
          <div class="umodal-max am-text-left">
            <label class="am-checkbox-inline">
              <input type="checkbox" name="shop" value="all" data-am-ucheck> 全部
            </label>
          <?php foreach($this->_data['shop'] as $row) { ?>
            <label class="am-checkbox-inline" style="margin-left: 0px;margin-right: 10px;">
              <input type="checkbox" class="ccc" name="shop_id[]" value="<?php echo $row['shop_id']; ?>" data-am-ucheck> <?php echo $row['shop_name']; ?>
            </label>
          <?php } ?>
          </div>
        </div>
      </form>
    </div>
    <div class="am-modal-footer ufoot">
      <div class="am-btn-group">
        <button type="button" class="am-btn ubtn-sure ubtn-green csubmitadd"><i class="iconfont icon-yuanxingxuanzhong"></i>
        完成
      </button>
      </div>
    </div>
  </div>
</div>

<div id="uact_givem2" class="am-modal" tabindex="-1">
  <div class="am-modal-dialog umodal umodal-simple">
    <div class="am-modal-hd uhead">修改满送活动
      <a href="javascript:void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd umain1">
      <form class="am-form am-form-horizontal cinfoedit">
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">活动名称：</label>
          <div class="umodal-normal">
            <input id="" class="uinput uinput-max" name="id" type="hidden" placeholder="">
            <input id="" class="uinput uinput-max" name="name" type="text" placeholder="">
          </div>
        </div>
        
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">顾客类型：</label>
          <div class="umodal-normal am-text-left">
            <label class="am-radio-inline">
              <input type="radio" name="client" value="2" data-am-ucheck checked> 仅限会员
            </label> 
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">实付满：</label>
          <div class="umodal-normal">
            <input id="" class="uinput uinput-max" name="man" type="text" placeholder="">
          </div>
          <div class="umodal-text">&nbsp;元</div>
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
            <select class="uselect uselect-max" name="ticket_money_id">
              <?php foreach($this->_data['money'] as $row) { ?>
                <option value="<?php echo $row['ticket_money_id']; ?>" ><?php echo $row['ticket_money_name']; ?></option>
              <?php } ?> 
            </select>
          </div>
        </div>
        <div class="am-form-group cgoods" >
          <label class="umodal-label am-form-label" for="">体验券：</label>
          <div class="umodal-normal">
            <select class="uselect uselect-max" name="ticket_goods_id">
              <?php foreach($this->_data['goods'] as $row) { ?>
                <option value="<?php echo $row['ticket_goods_id']; ?>"><?php echo $row['ticket_goods_name']; ?></option>
              <?php } ?> 
            </select>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">开始时间：</label>
          <div class="umodal-normal">
            <div class="am-input-group am-datepicker-date udatepicker udatepicker-max" data-am-datepicker="{format:'yyyy-mm-dd'}">
              <input type="text" class="am-form-field" name="start">
              <span class="am-input-group-btn am-datepicker-add-on">
                <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span></button>
              </span>
            </div>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">结束时间：</label>
          <div class="umodal-normal">
            <div class="am-input-group am-datepicker-date udatepicker udatepicker-max" data-am-datepicker="{format:'yyyy-mm-dd'}">
              <input type="text" class="am-form-field" name='end'>
              <span class="am-input-group-btn am-datepicker-add-on">
                <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span></button>
              </span>
            </div>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">备注：</label>
          <div class="umodal-max">
            <textarea class="am-form-field utextarea utextarea-max" name="memo" row="3"></textarea>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">参加店铺：</label>
          <div class="umodal-max am-text-left">
            <label class="am-checkbox-inline">
              <input type="checkbox" name="shop" value="all" data-am-ucheck> 全部
            </label>
          <?php foreach($this->_data['shop'] as $row) { ?>
            <label class="am-checkbox-inline" style="margin-left: 0px;margin-right: 10px;">
              <input type="checkbox" class="ccc" name="shop_id[]" value="<?php echo $row['shop_id']; ?>" data-am-ucheck> <?php echo $row['shop_name']; ?>
            </label>
          <?php } ?>
          </div>
        </div>
      </form>
    </div>
    <div class="am-modal-footer ufoot">
      <div class="am-btn-group">
        <button type="button" class="am-btn ubtn-sure ubtn-green csubmitedit"><i class="iconfont icon-yuanxingxuanzhong"></i>
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
$('#uact_givem1 .cttype').on('click',function(){
      if($(this).val()==1){
        $('#uact_givem1 .cmoney').fadeIn(0);
        $('#uact_givem1 .cgoods').fadeOut(0);
      }else{
        $('#uact_givem1 .cgoods').fadeIn(0);
        $('#uact_givem1 .cmoney').fadeOut(0);
      }
});
$('#uact_givem2 .cttype').on('click',function(){
      if($(this).val()==1){
        $('#uact_givem2 .cmoney').fadeIn(0);
        $('#uact_givem2 .cgoods').fadeOut(0);
      }else{
        $('#uact_givem2 .cgoods').fadeIn(0);
        $('#uact_givem2 .cmoney').fadeOut(0);
      }
});
//分页首末页不可选中
if(<?php echo $this->_data['act_give_list']['pagenow'];?>>1){
  $('.upages li.cfirst').removeClass('am-disabled');
}
if(<?php echo $this->_data['act_give_list']['pagecount']-$this->_data['act_give_list']['pagenow']; ?><1){
  $('.upages li.clast').addClass('am-disabled');
}

function page_do() {
  var intpage = parseInt(document.getElementById("idpagego").value);
  if(isNaN(intpage)) {
    alert("请输入正确的页码！");
  } else {
    window.location = "act_give.php?<?php echo api_value_query($this->_data['request']); ?>&page=" + intpage;
  }
}
//删除操作JS
$(function() {
  $('.cdel').on('click', function() {
    $('#cconfirm').modal({
      relatedTarget: this,
      onConfirm: function(options) {
        var url="act_give_delete_do.php";
        $.post(url,{'id':$(this.relatedTarget).val()},function(res){
          if(res=='0'){
            window.location.reload();
          }else if(res =='100'){
            alert('活动正在进行');
          }else if(res =='101'){
            alert('活动已经结束'); 
          }else{
            alert('删除失败');
            console.log(res);
          }
        });
      },
      onCancel: function() {
        return;
      }
    });
  });
});
//添加操作JS
$('.csubmitadd').on('click',function(){
    $('.csubmitadd').attr("disabled",true);
    var url="act_give_add_do.php";
    var data = $("#cinfoadd").serialize();
/*    console.log(data);*/
    $.post(url,data,function(res){
      if(res=='0'){
        window.location.reload();
      }else if(res=='1'){
        alert('请完善数据');
        $('.csubmitadd').attr("disabled",false);
      }else{
        alert('添加失败');
        $('.csubmitadd').attr("disabled",false);
        console.log(res);
      }
    });
  });
//关闭弹出框时删除select
$('#uact_givem2').on('close.modal.amui', function(){
      $("#uact_givem2 select[name='ticket_goods_id']").selected('destroy');
      $("#uact_givem2 select[name='ticket_money_id']").selected('destroy');
    });
//修改AJAX JS
$('.cedit').on('click',function(){
  $("#uact_givem2 input[name='shop_id[]']").uCheck('uncheck')
    var url="act_give_edit_ajax.php";
    var data = $(this).val();
    console.log(data);
    $.getJSON(url,{id:data},function(res){
      console.log(res);
      $("#uact_givem2 input[name='id']").val(res[0].act_give_id);
      $("#uact_givem2 input[name='name']").val(res[0].act_give_name);
      $("#uact_givem2 input[name='man']").val(res[0].act_give_man);
      $("#uact_givem2 input[name='jian']").val(res[0].act_give_jian);
      $("#uact_givem2 input[name='ttype']").each(function(){
          if($(this).val()==res[0].act_give_ttype){
            $(this).uCheck('check');
          }
        });
      $("#uact_givem2 input[name='begin']").each(function(){
          if($(this).val()==res[0].act_give_begin){
            $(this).uCheck('check');
          }
        });
      $("#uact_givem2 .cgoods").show();
      $("#uact_givem2 .cmoney").show();
      if (res[0].act_give_ttype == 1) {
          $("#uact_givem2 .cgoods").hide();
      }else if(res[0].act_give_ttype == 2){
          $("#uact_givem2 .cmoney").hide();
      }
      $("#uact_givem2 select[name='ticket_goods_id']").val(res[0].ticket_goods_id);
      $("#uact_givem2 select[name='ticket_goods_id']").selected();
      $("#uact_givem2 select[name='ticket_money_id']").val(res[0].ticket_money_id);
      $("#uact_givem2 select[name='ticket_money_id']").selected();
      if (res[0].act_give_shop==1) {$("#uact_givem2 input[name='shop']").uCheck('check');}else{$("#uact_givem2 input[name='shop']").uCheck('uncheck');}
      $("#uact_givem2 input[name='shop_id[]']").each(function(){
        // console.log($(this).val());
          for (var i = 0; i < res.length; i++) {
            if($(this).val()==res[i].shop_id){
              $(this).uCheck('check');
            }
          }
        });
      $("#uact_givem2 input[name='start']").val(res[0].act_give_start);
      $("#uact_givem2 input[name='end']").val(res[0].act_give_end);
      $("#uact_givem2 input[name='tdays']").val(res[0].act_give_tdays);
      $("#uact_givem2 textarea[name='memo']").val(res[0].act_give_memo);
    });
  });
//修改操作JS
$('.csubmitedit').on('click',function(){
    $('.csubmitedit').attr("disabled",true);
    var url="act_give_edit_do.php";
    var data = $(".cinfoedit").serialize();
    console.log(data);
    $.post(url,data,function(res){
      if(res=='0'){
        window.location.reload();
      }else if(res=='101'){
        alert('活动已经结束');
      }else if(res=='1'){
        alert('请完善数据');
        $('.csubmitedit').attr("disabled",false);
      }else{
        alert('修改失败');
        $('.csubmitedit').attr("disabled",false);
        console.log(res);
      }
    });
  });
//停止启用操作JS
$('.cstop').on('click',function(){
    var url="act_give_stop_do.php";
    var data = {
      id:$(this).val(),
      type:'stop'
    }
    console.log(data);
    $.post(url,data,function(res){
      if(res=='0'){
        window.location.reload();
      }else if(res=='101'){
        alert('活动已经结束');
      }else if(res=='102'){
        alert('活动未开始');
      }else{
        alert('停止失败');
        console.log(res);
      }
    });
  });
$('.cstart').on('click',function(){
    var url="act_give_stop_do.php";
    var data = {
      id:$(this).val(),
      type:'start'
    }
    console.log(data);
    $.post(url,data,function(res){
      if(res=='0'){
        window.location.reload();
      }else{
        alert('启用失败');
        console.log(res);
      }
    });
  });
//点击全部按钮，选择所有店铺
$("#uact_givem1 input[name='shop']").on('change',function(){
  $("#uact_givem1 input:checkbox").prop("checked",$(this).prop('checked'));
});
$("#uact_givem2 input[name='shop']").on('change',function(){
  $("#uact_givem2 input:checkbox").prop("checked",$(this).prop('checked'));
});
</script>
</body>
</html>