<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>
<div id="usystem_user" class="gcontent">
  <ul class="am-nav am-nav-pills ubread">
    <li class="am-active"><a href="#">操作员管理</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="utools">
    <form class="am-form-inline uform2">
    </form> 
    <button class="am-btn ubtn-sure ubtn-blue caddopen">
      <i class="iconfont icon-xinzeng"></i>
      新增操作员
    </button>
  </div>
  <div class="gspace15"></div>
  <table class="am-table am-table-bordered am-table-hover am-table-compact utable1" id="doc-modal-list">
    <thead>
      <tr>
        <td>身份</td>
        <td>帐号</td>
        <td>姓名</td>
        <td width="12%">操作</td>
      </tr>
    </thead>
    <?php foreach($this->_data['user_list']['list'] as $row) { ?>
    <tr>
      <td><?php echo $row['user_power'] ?></td>
      <td><?php echo $row['user_account']; ?></td>
      <td><?php echo $row['user_name']; ?></td>
      <td>
        <button class="am-btn ubtn-table ubtn-green cupdate" value="<?php echo $row['user_id'];?>" data-am-modal="{target: '#usystem_userm2'}">
          <i class="iconfont icon-bianji"></i>
          修改
        </button>
        &nbsp;
        <?php if($row['user_id']!=$GLOBALS['_SESSION']['login_id']){?>
        <button class="am-btn ubtn-table ubtn-gray cdel" value="<?php echo $row['user_id'];?>">
          <i class="iconfont icon-shanchu"></i>
          删除
        </button>
        <?php }?>
      </td>
    </tr>
    <?php } ?>
  </table>
  <?php pageHtml($this->_data['user_list'],$this->_data['request'],'system_user.php');?>
</div>

<!--添加操作员-->
<div class="am-modal" tabindex="-1" id="usystem_userm1">
  <div class="am-modal-dialog umodal umodal-simple">
    <div class="am-modal-hd uhead">新增操作员
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd">
      <form class="am-form am-form-horizontal" id="form1"  method="post" action="system_user_add_do.php">
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">身份：</label>
          <div class="umodal-normal" style="text-align:left;">
            <label class="am-radio-inline">
              <input type="radio" name="type"  class="cid" value="2" data-am-ucheck> 店长
            </label>
            <label class="am-radio-inline">
              <input type="radio" name="type"  class="cid" value="3" data-am-ucheck checked> 收银员
            </label>  
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">帐号：</label>
          <div class="umodal-normal">
            <input type="text" name="account" class="am-form-field uinput uinput-max cvalid">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">密码：</label>
          <div class="umodal-normal">
            <input type="password"  name="password" class="am-form-field uinput uinput-max cvalid">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">确认密码：</label>
          <div class="umodal-normal">
            <input type="password"  name="password2" class="am-form-field uinput uinput-max cvalid">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">姓名：</label>
          <div class="umodal-normal">
            <input type="text" name="name" class="am-form-field uinput uinput-max cvalid">
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

<!-- 修改操作员 -->
<div class="am-modal" tabindex="-1" id="usystem_userm2">
  <div class="am-modal-dialog umodal umodal-simple">
    <div class="am-modal-hd uhead">修改操作员
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd">
      <form class="am-form am-form-horizontal" id="form3">
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">身份：</label>
          <label class="umodal-label am-form-label am-text-left cuser_type"></label>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">帐号：</label>
          <label class="umodal-normal am-form-label am-text-left cuser_account"></label>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">姓名：</label>
          <label class="umodal-normal am-form-label am-text-left cuser_name"></label>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">旧密码：</label>
          <div class="umodal-normal">
            <input type="password" class="am-form-field uinput uinput-max cvalid"  name="user_password_old">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">新密码：</label>
          <div class="umodal-normal">
            <input type="password" class="am-form-field uinput uinput-max cvalid"  name="user_password">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">确认密码：</label>
          <div class="umodal-normal">
            <input type="password" class="am-form-field uinput uinput-max cvalid"  name="user_password2">
          </div>
        </div>
        <input type="hidden" class="cuser_id" name="user_id">
      </form>
    </div>
    <div class="am-modal-footer ufoot">
      <div class="am-btn-group">
        <button type="button" class="am-btn ubtn-sure ubtn-green cadd-form cupdate_form3"><i class="iconfont icon-yuanxingxuanzhong"></i>
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
<div class="am-modal am-modal-alert" tabindex="-1" id="calert">
  <div class="am-modal-dialog">
    <div class="am-modal-hd">警告</div>
    <div class="am-modal-bd">
      超过操作员最大数量限制！
    </div>
    <div class="am-modal-footer">
      <span class="am-modal-btn">确定</span>
    </div>
  </div>
</div>
<script src="../js/jquery.min.js"></script>
<script src="../js/amazeui.min.js"></script>
<script>

<?php pageJs($this->_data['user_list'],$this->_data['request'],'system_user.php');?>
// cvalid
$('.cvalid').on('input propertychange blur', function(){
  $(this).val()==''?$(this).addClass('am-field-error'):$(this).removeClass('am-field-error');
})

$('.cdel').on('click', function() {
  var content = $(this).parent().parent();
  var user_id = $(this).val();
  $('#cconfirm').modal({
    relatedTarget: this,
    onConfirm: function(options) {
    $.ajax({
      type: "POST",
      url: "system_user_delete_do.php",
      data: {user_id:$(this.relatedTarget).val()},
      success: function(res){
        if(res == '0'){
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

// 是否可以添加店铺
$('.caddopen').on('click', function(){
  $.ajax({
    url:'system_user_count_ajax.php',
  }).then(function(res){
    if(res==0){
      $('#usystem_userm1').modal('open');
    }else{
      $('#calert').modal('open');
    }
  })
})
// 所属分店变灰
$('.cid').on('click', function() {
  var val = $(this).val();
  if(val == 1){
    $('#usystem_userm1 .am-selected-btn').attr('disabled','disabled');
  }else{
    $('#usystem_userm1 .am-selected-btn').removeAttr('disabled');
  }
});

//添加操作员提交按钮
$('.cadd-form1').on('click',function(){
  var _self = $(this);
  _self.attr('disabled',true);
  // 验证变红
  $('#usystem_userm1 .cvalid').each(function(){
    if($(this).val()==''){
      $(this).addClass('am-field-error');
    }
  })
  // 验证返回
  if($('#usystem_userm1 .cvalid').hasClass("am-field-error")){
    _self.attr('disabled',false);
    return false;
  }
  $.post('system_user_add_do.php', $("#form1").serialize(), function(res){
    if(res=='0'){
      window.location.reload();
    }else if(res=='1'){
      alert('超出最大数量限制');
      _self.attr('disabled',false);
    }else if(res=='2'){
      alert('用户名已存在，请重新输入');
      _self.attr('disabled',false);
    }else if(res=='3'){
      alert('密码不能为空');
      _self.attr('disabled',false);
    }else if(res=='4'){
      alert('密码不一致');
      _self.attr('disabled',false);
    }else if(res=='5'){
      alert('非法操作');
      _self.attr('disabled',false);
    }else{
      alert('添加失败');
      _self.attr('disabled',false);
    }
  });
});

//修改操作员show
$('.cupdate').on('click', function(e) {
  var url = "system_user_edit_ajax.php";
   $.getJSON(url,{user_id:$(this).val()},function(res){
    // console.log(res);
    $("#usystem_userm2 .cuser_type").text(res.type);
    $("#usystem_userm2 .cuser_account").text(res.user_account);
    $("#usystem_userm2 .cuser_name").text(res.user_name);
    $("#usystem_userm2 .cuser_id").val(res.user_id);
  });
});
// edit-submit
$('.cupdate_form3').on('click',function(){
  // 验证变红
  $('#usystem_userm2 .cvalid').each(function(){
    if($(this).val()==''){
      $(this).addClass('am-field-error');
    }
  })
  // 验证返回
  if($('#usystem_userm2 .cvalid').hasClass("am-field-error")){
    return false;
  }
  $.post('system_user_edit_do.php', $("#form3").serialize(), function(res){
    // console.log(res);
    if(res=='0'){
      window.location.reload();
    }else if(res=='1'){
      alert('密码不一致');
    }else if(res=='2'){
      alert('密码错误，修改失败');
    }else{
      alert('修改失败');
    }
  })
});

</script>
</body>
</html>