<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>
<div id="umgoods_catalog" class="gcontent">
  <ul class="am-nav am-nav-pills ubread">
    <li><a href="mgoods.php">多店通用商品</a></li>
    <li class="am-active"><a href="#">商品分类</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="utools">
  <form class="am-form-inline uform2">
  </form>
  <button class="am-btn ubtn-sure ubtn-blue" data-am-modal="{target: '#umgoods_catalogm1'}">
  <i class="iconfont icon-xinzeng"></i>
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
    <?php foreach($this->_data['mgoods_catalog_list']['list'] as $row) { ?>
    <tr>
      <td><?php echo $row['mgoods_catalog_name']; ?></td>
      <td>
        <button class="am-btn ubtn-table ubtn-green cid-update" value="<?php echo $row['mgoods_catalog_id'];?>" data-am-modal="{target: '#umgoods_catalogm2'}">
          <i class="iconfont icon-bianji"></i>
          修改
        </button>
        &nbsp;
        <button class="am-btn ubtn-table ubtn-gray cdel" value="<?php echo $row['mgoods_catalog_id'];?>" >
          <i class="iconfont icon-shanchu"></i>
          删除
        </button>
      </td>
    </tr> 
    <?php } ?>
  </table>
  <?php pageHtml($this->_data['mgoods_catalog_list'],$this->_data['request'],'mgoods_catalog.php');?>
</div>


<!--添加分类-->
<div class="am-modal" tabindex="-1" id="umgoods_catalogm1">
  <div class="am-modal-dialog umodal umodal-simple">
    <div class="am-modal-hd uhead">添加分类
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd">
      <form class="am-form am-form-horizontal" id="form1">
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">分类名称：</label>
          <div class="umodal-normal">
            <input type="text" class="am-form-field uinput uinput-max" name="mgoods_catalog_name">
          </div>
        </div> 
      </form>
    </div>
    <div class="am-modal-footer ufoot">
      <div class="am-btn-group">
        <button type="submit" class="am-btn ubtn-sure ubtn-green cadd-form1"><i class="iconfont icon-yuanxingxuanzhong"></i>
          完成
        </button>
      </div>
    </div>
  </div>
</div>
<!--修改分类-->
<div class="am-modal" tabindex="-1" id="umgoods_catalogm2">
  <div class="am-modal-dialog umodal umodal-simple">
    <div class="am-modal-hd uhead">修改分类
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd">
      <form class="am-form am-form-horizontal" id="form2" method="post" action="mgoods_catalog_edit_do.php">
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">分类名称：</label>
          <div class="umodal-normal">
            <input type="text" class="am-form-field uinput uinput-max ccatalog_name" name="mgoods_catalog_name" value=''>
            <input type="hidden" class="ccatalog_name_old" name="mgoods_catalog_name_old">
          </div>
        </div> 
        <input type="hidden" class="ccatalog_id" name="mgoods_catalog_id">
      </form>
    </div>
    <div class="am-modal-footer ufoot">
      <div class="am-btn-group">
        <button type="submit" class="am-btn ubtn-sure ubtn-green cadd-form2"><i class="iconfont icon-yuanxingxuanzhong"></i>
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

<?php pageJs($this->_data['mgoods_catalog_list'],$this->_data['request'],'mgoods_catalog.php');?>
$('.cdel').on('click', function() {
  $('#cconfirm').modal({
    relatedTarget: this,
    onConfirm: function(options) {
      $.post('mgoods_catalog_delete_do.php',{'mgoods_catalog_id':$(this.relatedTarget).val()},function(res){
        if(res=='0'){
          window.location.reload();
        }else if(res=='1'){
          alert("分类下面有商品，不能删除！");
          $('.cadd-form1').attr('disabled',false);
        }else{
          alert("删除失败");
        }
      });
    },
    onCancel: function() {
      return false;
    }
  });
});


//添加分类提交按钮
$('.cadd-form1').on('click',function(){
  $(this).attr('disabled',true);
  var url="mgoods_catalog_add_do.php";
  var data = $("#form1").serialize();
  $.post(url,data,function(res){
    if(res=='0'){
      window.location.href='mgoods_catalog.php';
    }else if(res=='1'){
      alert("名字不能重复");
      $('.cadd-form1').attr('disabled',false);
    }else{
      alert("添加失败");
    }
  });
});


//修改按钮
$('.cid-update').on('click', function() {
  var mgoods_catalog_id = $(this).val();
  var mgoods_catalog_name = $(this).parent().siblings().eq(0).text();
  $("#umgoods_catalogm2 .ccatalog_name").val(mgoods_catalog_name);
  $("#umgoods_catalogm2 .ccatalog_name_old").val(mgoods_catalog_name);
  $("#umgoods_catalogm2 .ccatalog_id").val(mgoods_catalog_id);
});

//修改分类提交按钮
$('.cadd-form2').on('click',function(){
  if($("#umgoods_catalogm2 .ccatalog_name_old").val()==$("#umgoods_catalogm2 .ccatalog_name").val()){
    $("#umgoods_catalogm2").modal('close');
    return false;
  }
  $(this).attr('disabled',true);
  var url="mgoods_catalog_edit_do.php";
  var data = $("#form2").serialize();
  $.post(url,data,function(res){
    if(res=='0'){
      window.location.reload();
    }else if(res=='1'){
      alert("名字不能重复");
      $('.cadd-form2').attr('disabled',false);
    }else{
      alert("修改失败");
    }
  });
});
</script>
</body>
</html>