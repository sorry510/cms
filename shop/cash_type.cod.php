<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>
<div id="ucash_type" class="gcontent">
  <ul class="am-nav am-nav-pills ubread">
    <li><a href="cash.php">收支管理</a></li>
    <li class="am-active"><a href="#">收支分类</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="utools">
    <form class="am-form-inline uform2">
    </form>
    <button class="am-btn ubtn-sure ubtn-blue" data-am-modal="{target:'#ucash_typem1'}">
      <i class="iconfont icon-xinzeng"></i>
      新增收支分类
    </button>
  </div>
  <div class="gspace15"></div>
  <table class="am-table am-table-bordered am-table-hover am-table-compact utable1" id="doc-modal-list">
    <thead>
      <tr>
      <td>分类名称</td>
      <td style="width: 12%;">操作</td>
    </tr>
    </thead>
    <?php foreach($this->_data['cash_type']['list'] as $row){?>
    <tr>
      <td><?php echo $row['cash_type_name'];?></td>
      <td>
        <button class="am-btn ubtn-table ubtn-green ceditshow" data-am-modal="{target: '#ucash_typem2'}" value="<?php echo $row['cash_type_id'];?>">
          <i class="iconfont icon-bianji"></i>
          修改
        </button>
        &nbsp;
        <button class="am-btn ubtn-table ubtn-gray cdel" value="<?php echo $row['cash_type_id'];?>">
          <i class="iconfont icon-shanchu"></i>
          删除
        </button>
      </td>
    </tr>
    <?php }?>
  </table>
  <?php pageHtml($this->_data['cash_type'], $this->_data['request'], 'cash_type.php');?>
</div>
<!-- 弹出框添加 -->
<div class="am-modal" tabindex="-1" id="ucash_typem1">
  <div class="am-modal-dialog umodal umodal-simple">
    <div class="am-modal-hd uhead">添加分类
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd">
      <form class="am-form am-form-horizontal" id="cform1">
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">分类名称：</label>
          <div class="umodal-normal">
            <input type="text" class="am-form-field uinput uinput-max cvalid" name="name">
          </div>
        </div> 
      </form>
    </div>
    <div class="am-modal-footer ufoot">
      <div class="am-btn-group">
        <button type="submit" class="am-btn ubtn-sure ubtn-green caddsubmit"><i class="iconfont icon-yuanxingxuanzhong"></i>
          完成
        </button>
      </div>
    </div>
  </div>
</div>
<div class="am-modal" tabindex="-1" id="ucash_typem2">
  <div class="am-modal-dialog umodal umodal-simple">
    <div class="am-modal-hd uhead">修改分类
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd">
      <form class="am-form am-form-horizontal" id="cform2">
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">分类名称：</label>
          <div class="umodal-normal">
            <input type="text" class="am-form-field uinput uinput-max cname cvalid" name="name">
            <input type="hidden" class="am-form-field uinput uinput-max cid" name="id">
          </div>
        </div> 
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
  <?php pageJs($this->_data['cash_type'], $this->_data['request'], 'cash_type.php');?>
  // cvalid
  $('input.cvalid').on('input propertychange blur', function(){
    $(this).val()==''?$(this).addClass('am-field-error'):$(this).removeClass('am-field-error');
  })
  $('.caddsubmit').on('click', function(){
    var _this = $(this);
    _this.attr('disabled', true);
    // 验证变红
    $('#ucash_typem1 .cvalid').each(function(){
      if($(this).val()==''){
        $(this).addClass('am-field-error');
      }
    })
    // 验证返回
    if($('#ucash_typem1 .cvalid').hasClass("am-field-error")){
      _this.attr('disabled',false);
      return false;
    }
    $.post('cash_type_add_do.php', $('#cform1').serialize(), function(res){
      _this.attr('disabled', false);
      if(res==0){
        window.location.href="cash_type.php";
      }else if(res==1){
        alert('名字不能重复');
      }else if(res==2){
        alert('添加失败');
      }
    })
  })
  $('.ceditshow').on('click', function(){
    var id = $(this).val()
    var name = $(this).parent().prev('td').text();
    $('#ucash_typem2 .cname').val(name);
    $('#ucash_typem2 .cid').val(id);
  })
  $('.ceditsubmit').on('click', function(){
    var _this = $(this);
    _this.attr('disabled', true);
    // 验证变红
    $('#ucash_typem2 .cvalid').each(function(){
      if($(this).val()==''){
        $(this).addClass('am-field-error');
      }
    })
    // 验证返回
    if($('#ucash_typem2 .cvalid').hasClass("am-field-error")){
      _this.attr('disabled',false);
      return false;
    }
    $.post('cash_type_edit_do.php', $('#cform2').serialize(), function(res){
      console.log(res);
      _this.attr('disabled', false);
      if(res==0){
        window.location.reload();
      }else if(res==1){
        alert('修改失败');
      }
    })
  })
  $('.cdel').on('click', function(){
    $('#cconfirm').modal({
      relatedTarget: this,
      onConfirm: function(options) {
        $.ajax({
          type: "POST",
          url: "cash_type_delete_do.php",
          data: {id:$(this.relatedTarget).val()},
          success: function(res){
            if(res == '0'){
              window.location.reload();
            }else if(res=='1'){
              alert('分类下面有收支不能删除');
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
  })
</script>
</body>
</html>