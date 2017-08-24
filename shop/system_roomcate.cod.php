<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>

<!-- content -->
<div id="usystem_roomcate" class="gcontent">
  <ul class="am-nav am-nav-pills ubread">
    <li><a href="system_roomcard.php">房间手牌设置</a></li>
    <li class="am-active"><a href="javascript: void(0)">分类</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="utools">
  <form class="am-form-inline uform2">
  </form>
  <button class="am-btn ubtn-sure ubtn-blue" data-am-modal="{target: '#usystem_roomcatem1'}">
  <i class="iconfont icon-question"></i>
    添加分类
  </button>
  <div style="clear: both;"></div>
  </div>
  <div class="gspace15"></div>
  <table class="am-table am-table-bordered am-table-hover am-table-compact utable1" id="doc-modal-list">
    <thead>
      <tr>
        <td>分类名称</td>
        <td style="width: 12%;">操作</td>
      </tr>
    </thead>
    <?php foreach($this->_data['roomcate_list']['list'] as $row){?>
    <tr>
      <td><?php echo $row['room_catalog_name'];?></td>
      <td>
        <button class="am-btn ubtn-table ubtn-green cmodal2open" data-am-modal="{target: '#usystem_roomcatem2'}" value="<?php echo $row['room_catalog_id'];?>">
          <i class="iconfont icon-bianji"></i>
          修改
        </button>
        <button class="am-btn ubtn-table ubtn-gray cdel" value="<?php echo $row['room_catalog_id'];?>">
          <i class="iconfont icon-shanchu"></i>
          删除
        </button>
      </td>
    </tr>
    <?php }?>
  </table>
  <?php pageHtml($this->_data['roomcate_list'],$this->_data['request'],'system_roomcate.php');?>
</div>

<!--modal框-->
<div class="am-modal" tabindex="-1" id="usystem_roomcatem1">
  <div class="am-modal-dialog umodal umodal-simple" >
    <div class="am-modal-hd uhead">添加分类
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd umain1">
      <form class="am-form am-form-horizontal" id="cform1">
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">分类名称：</label>
          <div class="umodal-normal">
            <input type="text" class="am-form-field uinput uinput-max" name="name">
          </div>
          <div class="umodal-text gtext-green">（备注：如一楼包间，一楼大厅）</div>
        </div> 
      </form>
    </div>
    <div class="am-modal-footer ufoot">
      <div class="am-btn-group">
        <button type="submit" class="am-btn ubtn-sure ubtn-green cadd"><i class="iconfont icon-yuanxingxuanzhong"></i>
          完成
        </button>
      </div>
    </div>
  </div>
</div>

<div class="am-modal" tabindex="-1" id="usystem_roomcatem2">
  <div class="am-modal-dialog umodal umodal-simple" >
    <div class="am-modal-hd uhead">修改分类
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd umain1">
      <form class="am-form am-form-horizontal" id="cform2">
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">分类名称：</label>
          <div class="umodal-normal">
            <input type="text" class="am-form-field uinput uinput-max" name="name">
            <input type="hidden" class="am-form-field uinput uinput-max" name="id">
          </div>
          <div class="umodal-text gtext-green">（备注：如一楼包间，一楼大厅）</div>
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
<?php pageJs($this->_data['roomcate_list'],$this->_data['request'],'system_roomcate.php');?>

$('.cdel').on('click', function() {
  $('#cconfirm').modal({
    relatedTarget: this,
    onConfirm: function(options) {
      $.post('system_roomcate_delete_do.php', {'id':$(this.relatedTarget).val()}, function(res){
        if(res=='0'){
          window.location.reload();
        }else if(res=='2'){
          alert('类目下面有房间');
        }else{
          alert('删除失败');
        }
      })
    },
    onCancel: function() {
      return;
    }
  });
});

$('.cadd').on('click', function() {
  var ele = $(this);
  ele.attr('disable',true);
  $.post('system_roomcate_add_do.php' ,$('#cform1').serialize() ,function(res){
    if(res=='0'){
      window.location.href="system_roomcate.php";
    }else{
      alert('添加失败');
      ele.attr('disable',false);
    }
  })
});

$('.cmodal2open').on('click', function() {
  var id = $(this).val();
  var name = $(this).parent().siblings().text();
  $("#usystem_roomcatem2 input[name='id']").val(id);
  $("#usystem_roomcatem2 input[name='name']").val(name);
});

$('.ceditsubmit').on('click',function(){
  var target = $(this);
  target.attr('disabled',true);
  $.post('system_roomcate_edit_do.php', $("#cform2").serialize(), function(res){
    console.log(res);
    if(res=='0'){
      window.location.reload();
    }else{
      target.attr('disabled',false);
      alert('修改失败');
    }
  });
});
</script>
</body>
</html>
