<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>
<!-- content -->
<div class="gcontent" id="uworker_group">
  <ul class="am-nav am-nav-pills ubread">
    <li><a href="worker_manage.php">员工管理</a></li>
    <li class="am-active"><a href="javascript: void(0);">员工分组</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="utools">
    <form class="am-form-inline uform2">
    </form>
    <button class="am-btn ubtn-sure ubtn-blue" data-am-modal="{target:'#uworker_groupm1'}">
      <i class="iconfont icon-xinzeng"></i>
      新增分组
    </button>
  </div>
  <div class="gspace15"></div>
  <table class="am-table am-table-bordered am-table-hover am-table-compact utable1">
    <thead>
      <tr>
        <td>分组名称</td>
        <td style="width:12%;">操作</td>
      </tr>
    </thead>
    <tbody>
      <?php foreach($this->_data['worker_group_list'] as $row) { ?>
      <tr>
        <td><?php echo $row['worker_group_name']; ?></td>
        <td>
          <button class="am-btn ubtn-table ubtn-green cupdate" value="<?php echo $row['worker_group_id']; ?>" data-am-modal="{target:'#uworker_groupm2'}">
            <i class="iconfont icon-bianji"></i>
            修改
          </button>&nbsp;&nbsp;
          <button class="am-btn ubtn-table ubtn-gray cdel" value="<?php echo $row['worker_group_id']; ?>">
            <i class="iconfont icon-shanchu"></i>
            删除
          </button> 
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
  <div class="gspace20"></div>
</div>
<!-- 增加分组弹出框 -->
<div id="uworker_groupm1" class="am-modal" tabindex="-1">
  <div class="am-modal-dialog umodal umodal-simple">
    <div class="am-modal-hd uhead">新增分组
      <a href="javascript:void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd umain1">
      <form class="am-form am-form-horizontal" id="form1" method="post" action="worker_group_add_do.php">
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">分组名称：</label>
          <div class="umodal-normal">
            <input id="" class="uinput uinput-max" name="worker_group_name" type="text" placeholder="">
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

<!-- 修改分组弹出框 -->
<div id="uworker_groupm2" class="am-modal" tabindex="-1">
  <div class="am-modal-dialog umodal umodal-simple">
    <div class="am-modal-hd uhead">修改分组
      <a href="javascript:void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd umain1">
      <form class="am-form am-form-horizontal" id="form2">
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">分组名称：</label>
          <div class="umodal-normal">
            <input id="" class="uinput uinput-max name" name="worker_group_name" type="text" placeholder="">
          </div>
        </div>
        <input type="hidden" name="worker_group_id">
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
$(function() {
  $('.cdel').on('click', function() {
    var content = $(this).parent().parent();
    var worker_group_id = $(this).val();
    $('#cconfirm').modal({
      relatedTarget: this,
      onConfirm: function(options) {
      $.ajax({
        type: "GET",
        url: "worker_group_delete_do.php",
        data: {worker_group_id:worker_group_id}, 
        success: function(msg){
          if(msg = 'y'){
            content.remove();
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
});

//添加分组提交按钮
$('.cadd-form1').on('click',function(){
  $("#form1").submit();
});

//修改分组按钮
$('.cupdate').on('click', function() {
  var worker_group_id = $(this).val();
  var worker_group_name = $(this).parent().siblings().eq(0).text();
  $("#uworker_groupm2 input[name='worker_group_name']").val(worker_group_name);
  $("#uworker_groupm2 input[name='worker_group_id']").val(worker_group_id);
});

//修改分组提交
$('.cadd-form2').on('click',function(){
  var url="worker_group_editor_do.php";
  var data = $("#form2").serialize();
  $.post(url,data,function(res){
    if(res=='y'){
      window.location.reload();
    }else{
      alert('修改失败');
      console.log(res);
    }
  });
});
</script>
</body>
</html>