<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>
<!-- content -->
<div class="gcontent" id="system_score_gift">
  <ul class="am-nav am-nav-pills ubread">
    <li><a href="system_score.php">积分换礼</a></li>
    <li  class="am-active"><a href="javascript: void(0);">礼品设置</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="utools">
    <form class="am-form-inline uform2">
      <div class="am-form-group">
        <input type="text" class="am-form-field uinput uinput-220" placeholder="礼品名称" name="gift_name" value="<?php echo $this->_data['request']['gift_name']?>">
      </div>
      <div class="am-form-group">
        <button type="submit" class="am-btn ubtn-search">
          <i class="iconfont icon-search"></i>查询
        </button>
      </div>
    </form>
    <button class="am-btn ubtn-sure ubtn-blue" data-am-modal="{target:'#usystem_score_giftm1'}">
      <i class="iconfont icon-xinzeng"></i>
      新增礼品
    </button>
  </div>
  <div class="gspace15"></div>
  <table class="am-table am-table-bordered am-table-hover am-table-compact utable1">
    <thead>
      <tr>
        <td>名称</td>
        <td>积分</td>
        <td style="width:12%">操作</td>
      </tr>
    </thead>
    <tbody>
    <?php foreach($this->_data['gift_list']['list'] as $row){?>
      <tr>
        <td><?php echo $row['gift_name'];?></td>
        <td><?php echo $row['gift_score'];?></td>
        <td>
          <button class="am-btn ubtn-table ubtn-green cupdate" value="<?php echo $row['gift_id'];?>" data-am-modal="{target:'#usystem_score_giftm2'}">
            <i class="iconfont icon-bianji"></i>
            修改
          </button>&nbsp;&nbsp;
          <button class="am-btn ubtn-table ubtn-gray cdel" value="<?php echo $row['gift_id'];?>">
            <i class="iconfont icon-shanchu"></i>
            删除
          </button>
        </td>
      </tr>
    <?php }?>
    </tbody>
  </table>
  <?php pageHtml($this->_data['gift_list'],$this->_data['request'],'system_score_gift.php');?>
</div>
<!-- 增加礼品弹出框 -->
<div id="usystem_score_giftm1" class="am-modal" tabindex="-1">
  <div class="am-modal-dialog umodal umodal-simple">
    <div class="am-modal-hd uhead">新增礼品
      <a href="javascript:void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd">
      <form class="am-form am-form-horizontal" id="cform1">
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">名称：</label>
          <div class="umodal-normal">
            <input name="name" class="uinput uinput-max" type="text" placeholder="">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">积分：</label>
          <div class="umodal-normal">
            <input name="score" class="uinput uinput-max" type="text" placeholder="">
          </div>
          <div class="umodal-text gtext-green">
            &nbsp;分
          </div>      
        </div>
      </form>
    </div>
    <div class="am-modal-footer ufoot">
      <div class="am-btn-group">
        <button type="button" class="am-btn ubtn-sure ubtn-green caddsubmit"><i class="iconfont icon-yuanxingxuanzhong"></i>
          完成
        </button>
      </div>
    </div>
  </div>
</div>

<!-- 修改礼品弹出框 -->
<div id="usystem_score_giftm2" class="am-modal" tabindex="-1">
  <div class="am-modal-dialog umodal umodal-simple">
    <div class="am-modal-hd uhead">修改礼品
      <a href="javascript:void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd">
      <form class="am-form am-form-horizontal" id="cform2">
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">名称：</label>
          <div class="umodal-normal">
            <input name="gift_name" class="uinput uinput-max" type="text" placeholder="">
            <input name="gift_name_old" class="uinput uinput-max" type="hidden" placeholder="">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">积分：</label>
          <div class="umodal-normal">
            <input name="gift_score" class="uinput uinput-max" type="text" placeholder="">
          </div>
          <div class="umodal-text gtext-green">
            &nbsp;分
          </div>      
        </div>
        <input type="hidden" name="gift_id">
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
<?php pageJs($this->_data['gift_list'],$this->_data['request'],'system_score_gift.php');?>
$(function() {
  $('.cdel').on('click', function() {
    $('#cconfirm').modal({
      relatedTarget: this,
      onConfirm: function(options) {
      $.ajax({
        type: "POST",
        url: "system_score_gift_delete_do.php",
        data: {gift_id:$(this.relatedTarget).val()},
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

  $('.caddsubmit').on('click', function(){
    $.post('system_score_gift_add_do.php' ,$('#cform1').serialize() ,function(res){
      if(res=='0'){
        window.location.reload();
      }else if(res=='1'){
        alert('名字不能重复');
      }else{
        alert('添加失败');
      }
    })
  })
  $('.cupdate').on('click', function(){
    var gift_id = $(this).val();
    //console.log(gift_id);
    $.ajax({
      type: "GET",
      url: "system_score_gift_edit_ajax.php",
      data: {gift_id:gift_id}, 
      dataType:"json",
      success: function(msg){
      // console.log(msg);
      $("#usystem_score_giftm2 input[name='gift_id']").val(msg.gift_id);
      $("#usystem_score_giftm2 input[name='gift_name']").val(msg.gift_name);
      $("#usystem_score_giftm2 input[name='gift_name_old']").val(msg.gift_name);
      $("#usystem_score_giftm2 input[name='gift_score']").val(msg.gift_score);
      }
    });
  })
  $('.ceditsubmit').on('click',function(){
    var target = $(this);
    target.attr('disabled',true);
    $.post('system_score_gift_edit_do.php', $("#cform2").serialize(), function(res){
      console.log(res);
      if(res=='0'){
        window.location.reload();
      }else if(res=='1'){
        target.attr('disabled',false);
        alert('礼品名字已存在，请重新输入');
      }else{
        target.attr('disabled',false);
        alert('修改失败');
      }
    });
  });
});
</script>
</body>
</html>
