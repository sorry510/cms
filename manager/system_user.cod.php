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
    <form class="am-form-inline uform2"  id="form2"  method="post" action="system_user.php">
      <div class="am-form-group">
        <label for="doc-ipt-3" class="am-form-label">分店：</label>
        <select class="uselect uselect-auto" data-am-selected name="shop_id">
          <option value="all">全部</option>
          <?php foreach($this->_data['shop_list'] as $row) { ?>
          <option value="<?php echo $row['shop_id'] ?>" <?php if($row['shop_id'] == $this->_data['shop_id']){echo "selected";}?>> <?php echo $row['shop_name'] ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="am-form-group">
        <button type="submit" class="am-btn ubtn-search cadd_form2">
          <i class="iconfont icon-search"></i>查询
        </button>
      </div>
    </form> 
    <button class="am-btn ubtn-sure ubtn-blue" data-am-modal="{target: '#usystem_userm1'}">
      <i class="iconfont icon-xinzeng"></i>
      新增操作员
    </button>
  </div>
  <div class="gspace15"></div>
  <table class="am-table am-table-bordered am-table-hover am-table-compact utable1" id="doc-modal-list">
    <thead>
      <tr>
        <td>身份</td>
        <td>所属分店</td>
        <td>帐号</td>
        <td>姓名</td>
        <td width="12%">操作</td>
      </tr>
    </thead>
    <?php foreach($this->_data['user_list']['list'] as $row) { ?>
    <tr>
      <td><?php echo $row['user_power'] ?></td>
      <td><?php echo $row['shop_name']; ?></td>
      <td><?php echo $row['user_account']; ?></td>
      <td><?php echo $row['user_name']; ?></td>
      <td>
        <button class="am-btn ubtn-table ubtn-green cupdate" value="<?php echo $row['user_id'];?>" data-am-modal="{target: '#usystem_userm2'}">
          <i class="iconfont icon-bianji"></i>
          修改
        </button>
        &nbsp;
        <button class="am-btn ubtn-table ubtn-gray cdel" value="<?php echo $row['user_id'];?>">
          <i class="iconfont icon-shanchu"></i>
          删除
        </button>
      </td>
    </tr>
    <?php } ?>
  </table>
  <ul class="am-pagination am-pagination-centered upages">
    <li class="upage-info">共<?php echo $this->_data['user_list']['pagecount']; ?>页 <?php echo $this->_data['user_list']['allcount']; ?>条记录</li>
    <li><a href="system_user.php?page=<?php echo $this->_data['user_list']['pagepre']; ?>">&laquo;</a></li>
    <li><a class="am-active" href="#"><?php echo $GLOBALS['intpage'];?></a></li>
    <li><a href="system_user.php?page=<?php echo $this->_data['user_list']['pagenext']; ?>">&raquo;</a></li>
  </ul> 
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
              <input type="radio" name="type" class="cid" value="0" data-am-ucheck> 管理员
            </label>
            <label class="am-radio-inline">
              <input type="radio" name="type"  class="cid" value="1" data-am-ucheck> 店长
            </label>
            <label class="am-radio-inline">
              <input type="radio" name="type"  class="cid" value="2" data-am-ucheck> 收银员
            </label>  
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">所属分店：</label>
          <div class="umodal-normal">
            <select class="uselect uselect-max cshop" name="shop" data-am-selected>
              <?php foreach($this->_data['shop_list'] as $row) { ?>
              <option value="<?php echo $row['shop_id'] ?>" > <?php echo $row['shop_name'] ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">帐号：</label>
          <div class="umodal-normal">
            <input type="text" name="account" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">密码：</label>
          <div class="umodal-normal">
            <input type="password"  name="password" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">姓名：</label>
          <div class="umodal-normal">
            <input type="text" name="name" class="am-form-field uinput uinput-max">
          </div>
        </div>
      </form>
    </div>
    <div class="am-modal-footer ufoot">
      <div class="am-btn-group">
        <button type="button" class="am-btn ubtn-sure ubtn-green cadd-form cadd-form1"><i class="iconfont icon-yuanxingxuanzhong"></i>
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
      <form class="am-form am-form-horizontal" id="form3"  method="post" action="system_user_editor_do.php">
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">身份：</label>
          <div class="umodal-normal" style="text-align:left;">
            <label class="am-radio-inline">
              <input type="radio" name="user_type"  value="1" data-am-ucheck> 管理员
            </label>
            <label class="am-radio-inline">
              <input type="radio" name="user_type" value="2" data-am-ucheck> 店长
            </label>
            <label class="am-radio-inline">
              <input type="radio" name="user_type" value="3" data-am-ucheck> 收银员
            </label>  
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">所属分店：</label>
          <div class="umodal-normal">
            <select class="uselect uselect-max cshop" name="shop_id">
              <?php foreach($this->_data['shop_list'] as $row) { ?>
              <option value="<?php echo $row['shop_id'] ?>" > <?php echo $row['shop_name'] ?></option>
              <?php } ?>
              <option value="4">5</option>
            </select>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">帐号：</label>
          <div class="umodal-normal">
            <input type="text" class="am-form-field uinput uinput-max"  name="user_account">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">密码：</label>
          <div class="umodal-normal">
            <input type="text" class="am-form-field uinput uinput-max"  name="user_password">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">姓名：</label>
          <div class="umodal-normal">
            <input type="text" class="am-form-field uinput uinput-max"  name="user_name">
          </div>
        </div>
        <input type="hidden"  name="user_id">
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
<script src="../js/jquery.min.js"></script>
<script src="../js/amazeui.min.js"></script>
<script>
$(function() {
  $('.cdel').on('click', function() {
    var content = $(this).parent().parent();
    var user_id = $(this).val();
    $('#cconfirm').modal({
      relatedTarget: this,
      onConfirm: function(options) {
      $.ajax({
        type: "GET",
        url: "system_user_delete.php",
        data: {user_id:user_id}, 
        success: function(msg){
          if(msg = 'y'){
            content.remove();
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
});

// 所属分店变灰
$('.cid').on('click', function() {
  var val = $(this).val();
  if(val == 0){
    $('.am-selected-btn').attr('disabled','disabled');
  }else{
    $('.am-selected-btn').removeAttr('disabled','disabled');
  }
});

//修改按钮
$('.cid-update').on('click', function() {
  var val = $(this).val();
  if(val == 0){
    $('.am-selected-btn').attr('disabled','disabled');
  }else{
    $('.am-selected-btn').removeAttr('disabled','disabled');
  }
});

//添加操作员提交按钮
$('.cadd-form1').on('click',function(){
  $("#form1").submit();
});

$('.cadd-form2').on('click',function(){
  $("#form2").submit();
});

//修改操作员提交按钮
$('.cupdate').on('click', function(e) {
  var url = "system_user_editor_ajax.php";
   $.getJSON(url,{user_id:$(this).val()},function(res){
    $("#usystem_userm2 input[name='user_id']").val(res.user_id);
    $("#usystem_userm2 input[name='user_name']").val(res.user_name);
    $("#usystem_userm2 input[name='user_account']").val(res.user_account);
    $("#usystem_userm2 input[name='user_password']").val(res.user_password);
    $("#usystem_userm2 input[name='user_type']").each(function(){
      if($(this).val() == res.user_type){
        $(this).attr('checked',true);
      }
    });
    $("#usystem_userm2 .cshop").find('option').each(function(){
      if($(this).val() == res.shop_id){
        $(this).attr('selected',true);
      }
    });
  });
});
$('.cupdate_form3').on('click',function(){
  $("#form3").submit();
});

</script>
</body>
</html>