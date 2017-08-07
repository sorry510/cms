<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>
<div id="ucard" class="gcontent">
  <ul class="am-nav am-nav-pills ubread">
    <li class="am-active"><a href="#">会员卡分类</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="utools">
    <form class="am-form-inline uform2">
    </form>
    <button class="am-btn ubtn-sure ubtn-blue" data-am-modal="{target:'#usystem_card_typem1'}">
      <i class="iconfont icon-addition"></i>
      新增会员卡分类
    </button>
  </div>
  <div class="gspace15"></div>
  <table class="am-table am-table-bordered am-table-hover am-table-compact utable1">
    <thead>
      <tr>
        <td>分类名称</td>
        <td>卡折扣</td>
        <td>描述</td>
        <td style="width:12%;">操作</td>
      </tr>
    </thead>
    <tbody>
      <?php foreach($this->_data['card_type_list']['list'] as $row) { ?>
      <tr>
        <td><?php echo $row['card_type_name'] ?></td>
        <td><?php echo $row['card_type_discount'] ?></td>
        <td><?php echo $row['card_type_info'] ?></td>
        <td>
          <button class="am-btn ubtn-table ubtn-green cupdate" value="<?php echo $row['card_type_id'] ?>"data-am-modal="{target:'#usystem_card_typem2'}">
            <i class="iconfont icon-bianji"></i>
           修改
          </button>
          &nbsp;
          <button class="am-btn ubtn-table ubtn-gray cdel" value="<?php echo $row['card_type_id'] ?>">
             <i class="iconfont icon-shanchu"></i>
                      删除
          </button> 
        </td>
      </tr>
    <?php } ?>
    </tbody>
  </table>
  <ul class="am-pagination am-pagination-centered upages">
      <li class="upage-info">共<?php echo $this->_data['card_type_list']['pagecount']; ?>页 <?php echo $this->_data['card_type_list']['allcount']; ?>条记录</li>
      <li class="am-disabled"><a href="system_card_type.php?<?php echo api_value_query($this->_data['request'], $this->_data['card_type_list']['pagepre']); ?>">&laquo;</a></li>
      <li class="am-active"><a href="#"><?php echo $GLOBALS['intpage'];?></a></li>
      <li><a href="system_card_type.php?<?php echo api_value_query($this->_data['request'], $this->_data['card_type_list']['pagenext']); ?>">&raquo;</a></li>
    </ul> 
</div>
<!-- 添加会员卡分类 -->
<div id="usystem_card_typem1" class="am-modal" tabindex="-1">
  <div class="am-modal-dialog umodal umodal-simple">
    <div class="am-modal-hd uhead">新增会员卡分类
      <a href="javascript:void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd">
      <form class="am-form am-form-horizontal" id="form1">
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">分类名称：</label>
          <div class="umodal-normal">
            <input id="" class="uinput uinput-max" type="text" placeholder="" name="card_type_name">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">卡折扣：</label>
          <div class="umodal-normal">
            <input id="" class="uinput uinput-max cfilter" type="text" placeholder="" value="10" name="card_type_discount">
          </div>
          <div class="umodal-text gtext-green">（八八折填8.8，不打折填10）
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">描述：</label>
          <div class="umodal-max">
            <textarea class="am-form-field utextarea utextarea-max" row="3" name="card_type_info"></textarea>
          </div>
        </div>
      </form>
    </div>
    <div class="am-modal-footer ufoot">
      <div class="am-btn-group">
        <button type="button" class="am-btn ubtn-sure ubtn-green cadd-form1"><i class="iconfont icon-yuanxingxuanzhong"></i>
          完成
        </button>
      </div>
    </div>
  </div>
</div>

<!-- 修改会员卡类型 -->
<div id="usystem_card_typem2" class="am-modal" tabindex="-1">
  <div class="am-modal-dialog umodal umodal-simple">
    <div class="am-modal-hd uhead">修改会员卡分类
      <a href="javascript:void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd">
      <form class="am-form am-form-horizontal"  id="form2"  method="post" action="system_card_type_editor_do.php">
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">分类名称：</label>
          <div class="umodal-normal">
            <input class="uinput uinput-max" type="text" placeholder="" name="card_type_name">
            <input class="uinput uinput-max" type="hidden" placeholder="" name="card_type_name_old">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">卡折扣：</label>
          <div class="umodal-normal">
            <input id="" class="uinput uinput-max" type="text" placeholder="" name="card_type_discount">
          </div>
          <div class="umodal-text gtext-green">（八八折填8.8，不打折填10）

          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">描述：</label>
          <div class="umodal-max">
            <textarea class="am-form-field utextarea utextarea-max" row="3" name="card_type_info"></textarea>
          </div>
        </div>
        <input type="hidden" name="card_type_id">
      </form>
    </div>
    <div class="am-modal-footer ufoot">
      <div class="am-btn-group">
        <button type="button" class="am-btn ubtn-sure ubtn-green cadd-form2"><i class="iconfont icon-yuanxingxuanzhong"></i>
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

$('.cdel').on('click', function() {
  $('#cconfirm').modal({
    relatedTarget: this,
    onConfirm: function(options) {
    $.ajax({
      type: "POST",
      url: "system_card_type_delete_do.php",
      data: {card_type_id:$(this.relatedTarget).val()},
      success: function(res){
        if(res = '0'){
          window.location.reload();
        }else{
          alert('删除失败');
        }
      }
    });
  },
  
  onCancel: function() {
      return;
  }
  });
});


//分页首末页不可选中
if(<?php echo $GLOBALS['intpage'];?>>1){
  $('.upages li').eq(1).removeClass('am-disabled');
}
if(<?php echo $this->_data['card_type_list']['pagecount']-$GLOBALS['intpage']; ?><1){
  $('.upages li').last().addClass('am-disabled');
}
// 折扣js
$('.cfilter').on('input propertychange',function(){
  var discount = Number($(this).val());
  if(isNaN(discount)){
    $(this).val(10);
  }
  if(discount>10){
    $(this).val(10);
  }
  if(discount<0){
    $(this).val(10);
  }
})
//添加会员卡add-submit
$('.cadd-form1').on('click',function(){
  $.post('system_card_type_add_do.php', $("#form1").serialize(), function(res){
    if(res=='0'){
      window.location.reload();
    }else if(res=='1'){
      alert('会员卡类型名已存在，请重新输入');
    }else{
      alert('添加失败');
    }
  });
});

//修改会员卡edit-show
$('.cupdate').on('click', function(e) {
  var card_type_id = $(this).val();
  //console.log(card_type_id);
  $.ajax({
    type: "GET",
    url: "system_card_type_edit_ajax.php",
    data: {card_type_id:card_type_id}, 
    dataType:"json",
    success: function(msg){
    // console.log(msg);
    $("#usystem_card_typem2 input[name='card_type_id']").val(msg.card_type_id);
    $("#usystem_card_typem2 input[name='card_type_name']").val(msg.card_type_name);
    $("#usystem_card_typem2 input[name='card_type_name_old']").val(msg.card_type_name);
    $("#usystem_card_typem2 input[name='card_type_discount']").val(msg.card_type_discount);
    $("#usystem_card_typem2 textarea[name='card_type_info']").val(msg.card_type_info);
    }
  });
});

//修改会员卡分类edit-submit
$('.cadd-form2').on('click',function(){
  $.post('system_card_type_edit_do.php', $("#form2").serialize(), function(res){
    console.log(res);
    if(res=='0'){
      window.location.reload();
    }else if(res=='1'){
      alert('会员卡类型名已存在，请重新输入');
    }else{
      alert('修改失败');
    }
  });
});
</script>
</body>
</html>