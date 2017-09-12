<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>

<!-- content -->
<div id="usystem_roomcard" class="gcontent">
  <ul class="am-nav am-nav-pills ubread">
  	<li class="am-active"><a href="javascript: void(0)">房间手牌设置</a></li>
    <li><a href="system_roomcate.php">分类</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="utools">
	<form class="am-form-inline uform2">
	</form>
	<button class="am-btn ubtn-sure ubtn-blue" data-am-modal="{target: '#usystem_roomcardm1'}">
	<i class="iconfont icon-question"></i>
	  新增房间/手牌
	</button>
  </div>
  <div class="gspace15"></div>
  <table class="am-table am-table-bordered am-table-hover am-table-compact utable1" id="doc-modal-list">
    <thead>
      <tr>
        <td>分类</td>
        <td>名称</td>
        <td>ID</td>
        <td width="12%">操作</td>
      </tr>
    </thead>
    <?php foreach($this->_data['room_list']['list'] as $row){?>
    <tr>
      <td><?php echo $row['room_catalog_name'];?></td>
      <td><?php echo $row['room_name'];?></td>
      <td><?php echo $row['room_code'];?></td>
      <td>
        <button class="am-btn ubtn-table ubtn-green cmodal2open" data-am-modal="{target: '#usystem_roomcardm2'}" value="<?php echo $row['room_id'];?>">
          <i class="iconfont icon-bianji"></i>
          修改
        </button>
        <button class="am-btn ubtn-table ubtn-gray cdel" value="<?php echo $row['room_id'];?>">
          <i class="iconfont icon-shanchu"></i>
          删除
        </button>
      </td>
    </tr>
    <?php }?>
  </table>
  <?php pageHtml($this->_data['room_list'],$this->_data['request'],'system_roomcard.php');?>
</div>

<!--modal框-->
<div class="am-modal" tabindex="-1" id="usystem_roomcardm1">
  <div class="am-modal-dialog umodal umodal-simple">
    <div class="am-modal-hd uhead">新增房间/手牌
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd umain1">
      <form class="am-form am-form-horizontal" id="cform1">
      	<div class="am-form-group">
          <label class="umodal-label am-form-label" for="">分类：</label>
          <div class="umodal-normal">
            <select class="uselect uselect-max cvalid" data-am-selected name="catalog">
            <option value="0">请选择</option>
            <?php foreach($this->_data['room_catalog_list'] as $row){?>
              <option value="<?php echo $row['room_catalog_id'];?>"><?php echo $row['room_catalog_name'];?></option>
            <?php }?>
            </select>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">名称：</label>
          <div class="umodal-normal">
            <input type="text" class="am-form-field uinput uinput-max cvalid" name="name">
          </div>
          <div class="umodal-text gtext-green">（备注：房间/手牌号）</div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">ID号：</label>
          <div class="umodal-normal">
            <input type="text" class="am-form-field uinput uinput-max cvalid" name="code">
          </div>
        </div> 
      </form>
    </div>
    <div class="am-modal-footer ufoot">
      <div class="am-btn-group">
        <button type="button" class="am-btn ubtn-sure ubtn-green cadd"><i class="iconfont icon-yuanxingxuanzhong"></i>
          完成
        </button>
      </div>
    </div>
  </div>
</div>

<div class="am-modal" tabindex="-1" id="usystem_roomcardm2">
  <div class="am-modal-dialog umodal umodal-simple">
    <div class="am-modal-hd uhead">修改房间/手牌
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd umain1">
      <form class="am-form am-form-horizontal" id="cform2">
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">分类：</label>
          <div class="umodal-normal">
            <select class="uselect uselect-max cvalid" name="catalog">
              <option value="0">请选择</option>
              <?php foreach($this->_data['room_catalog_list'] as $row){?>
              <option value="<?php echo $row['room_catalog_id'];?>"><?php echo $row['room_catalog_name'];?></option>
              <?php }?>
            </select>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">名称：</label>
          <div class="umodal-normal">
            <input type="text" class="am-form-field uinput uinput-max cvalid" name="name">
          </div>
          <div class="umodal-text gtext-green">（备注：房间/手牌号）</div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">ID号：</label>
          <div class="umodal-normal">
            <input type="text" class="am-form-field uinput uinput-max cvalid" name="code">
          </div>
        </div>
        <input type="hidden" name="id">
      </form>
    </div>
    <div class="am-modal-footer ufoot">
      <div class="am-btn-group">
        <button type="button" class="am-btn ubtn-sure ubtn-green ceditsubmit"><i class="iconfont icon-yuanxingxuanzhong"></i>
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
<?php pageJs($this->_data['room_list'],$this->_data['request'],'system_roomcard.php');?>
// cvalid
$('input.cvalid').on('input propertychange blur', function(){
  $(this).val()==''?$(this).addClass('am-field-error'):$(this).removeClass('am-field-error');
})
// select cvalid
$('select.cvalid').on('change', function(){
  $(this).val()=='0'?$(this).addClass('am-field-error'):$(this).removeClass('am-field-error');
})

$('.cdel').on('click', function() {
  $('#cconfirm').modal({
    relatedTarget: this,
    onConfirm: function(options) {
      $.post('system_roomcard_delete_do.php', {'id':$(this.relatedTarget).val()}, function(res){
        if(res=='0'){
          window.location.reload();
        }else if(res=='2'){
          alert('类目下面有房间');
        }else{
          alert('删除失败');
        }
      });
    },
    onCancel: function() {
      return;
    }
  });
});

$('.cadd').on('click', function() {
  var _self = $(this);
  _self.attr('disabled',true);
  // 验证变红
  $('#usystem_roomcardm1 .cvalid').each(function(){
    if($(this).prop('tagName')=='SELECT'){
      if($(this).val()=='0'){
        $(this).addClass('am-field-error');
      }
    }else{
      if($(this).val()==''){
        $(this).addClass('am-field-error');
      }
    }
  })
  // 验证返回
  if($('#usystem_roomcardm1 .cvalid').hasClass("am-field-error")){
    _self.attr('disabled',false);
    return false;
  }
  $.post('system_roomcard_add_do.php', $("#cform1").serialize(), function(res){
    // console.log(res);
    if(res==0){
      window.location.href="system_roomcard.php";
    }else{
      alert('添加失败');
      _self.attr('disable',false);
    }
  })
});

$('.cmodal2open').on('click', function() {
  $.getJSON('system_roomcard_edit_ajax.php', {'id':$(this).val()}, function(res){
    // console.log(res);
    $("#usystem_roomcardm2 select[name='catalog']").val(res.room_catalog_id);
    $("#usystem_roomcardm2 select[name='catalog']").selected();
    $("#usystem_roomcardm2 input[name='name']").val(res.room_name);
    $("#usystem_roomcardm2 input[name='code']").val(res.room_code);
    $("#usystem_roomcardm2 input[name='id']").val(res.room_id);
  })
});

$("#usystem_roomcardm2").on('close.modal.amui', function(){
  $("#usystem_roomcardm2 select[name='catalog']").selected('destroy');
})

$('.ceditsubmit').on('click', function(){
  var _self = $(this);
  _self.attr('disabled',true);
  // 验证变红
  $('#usystem_roomcardm2 .cvalid').each(function(){
    if($(this).prop('tagName')=='SELECT'){
      if($(this).val()=='0'){
        $(this).addClass('am-field-error');
      }
    }else{
      if($(this).val()==''){
        $(this).addClass('am-field-error');
      }
    }
  })
  // 验证返回
  if($('#usystem_roomcardm2 .cvalid').hasClass("am-field-error")){
    _self.attr('disabled',false);
    return false;
  }
  $.post('system_roomcard_edit_do.php', $("#cform2").serialize(), function(res){
    console.log(res);
    if(res==0){
      window.location.reload();
    }else{
      alert('修改失败');
    }
  })
})
</script>
</body>
</html>
