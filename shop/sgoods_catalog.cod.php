<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>
<div id="usgoods_catalog" class="gcontent">
  <ul class="am-nav am-nav-pills ubread">
    <li><a href="sgoods.php">单店销售商品</a></li>
    <li class="am-active"><a href="#">商品分类</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="utools">
  <button class="am-btn ubtn-sure ubtn-blue" data-am-modal="{target: '#usgoods_catalogm1'}">
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
    <?php foreach($this->_data['sgoods_catalog_list']['list'] as $row) { ?>
    <tr>
      <td><?php echo $row['sgoods_catalog_name']; ?></td>
      <td>
        <button class="am-btn ubtn-table ubtn-green cid-update" value="<?php echo $row['sgoods_catalog_id'];?>" data-am-modal="{target: '#usgoods_catalogm2'}">
          <i class="iconfont icon-bianji"></i>
          修改
        </button>
        <input type="hidden" value="<?php echo $row['shop_id'];?>">
        &nbsp;
        <button class="am-btn ubtn-table ubtn-gray cdel" value="<?php echo $row['sgoods_catalog_id'];?>" >
          <i class="iconfont icon-shanchu"></i>
          删除
        </button>
      </td>
    </tr> 
    <?php } ?>
  </table>
  <?php pageHtml($this->_data['sgoods_catalog_list'],$this->_data['request'],'sgoods_catalog.php');?>
</div>


<!--modal框-->
<div class="am-modal" tabindex="-1" id="usgoods_catalogm1">
  <div class="am-modal-dialog umodal umodal-simple">
    <div class="am-modal-hd uhead">添加分类
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd">
      <form class="am-form am-form-horizontal"  id="cform1">
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">分类名称：</label>
          <div class="umodal-normal">
            <input type="text" name="sgoods_catalog_name" class="am-form-field uinput uinput-max">
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

<div class="am-modal" tabindex="-1" id="usgoods_catalogm2">
  <div class="am-modal-dialog umodal umodal-simple">
    <div class="am-modal-hd uhead">修改分类
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd">
      <form class="am-form am-form-horizontal" id="cform2">
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">分类名称：</label>
          <div class="umodal-normal">
            <input type="text" class="am-form-field uinput uinput-max ccatalog_name" name="sgoods_catalog_name">
            <input type="hidden" class="am-form-field uinput uinput-max ccatalog_name_old" name="sgoods_catalog_name_old">
          </div>
        </div> 
        <input type="hidden" class="ccatalog_id" name="sgoods_catalog_id">
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
<!-- 删除框 -->
<?php confirmHtml(1);?>

<script src="../js/jquery.min.js"></script>
<script src="../js/amazeui.min.js"></script>
<script>
<?php pageJs($this->_data['sgoods_catalog_list'],$this->_data['request'],'sgoods_catalog.php');?>

$('.cdel').on('click', function() {
  $('#cconfirm1').modal({
    relatedTarget: this,
    onConfirm: function(options) {
      $.post('sgoods_catalog_delete_do.php',{'sgoods_catalog_id':$(this.relatedTarget).val()},function(res){
        if(res=='0'){
          window.location.reload();
        }else if(res=='1'){
          alert("分类下面有商品，不能删除！");
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
  var url="sgoods_catalog_add_do.php";
  var data = $("#cform1").serialize();
  $.post(url,data,function(res){
    if(res=='0'){
      window.location.href='sgoods_catalog.php';
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
  var sgoods_catalog_id = $(this).val();
  var sgoods_catalog_name = $(this).parent().siblings().eq(0).text();
  // console.log(sgoods_catalog_name);
  $("#usgoods_catalogm2 .ccatalog_name").val(sgoods_catalog_name);
  $("#usgoods_catalogm2 .ccatalog_name_old").val(sgoods_catalog_name);
  $("#usgoods_catalogm2 .ccatalog_id").val(sgoods_catalog_id);
});

//修改分类提交按钮
$('.cadd-form2').on('click',function(){
  if($("#usgoods_catalogm2 .ccatalog_name_old").val()==$("#usgoods_catalogm2 .ccatalog_name").val()){
    $("#usgoods_catalogm2").modal('close');
    return false;
  }
  $(this).attr('disabled',true);
  var url="sgoods_catalog_edit_do.php";
  var data = $("#cform2").serialize();
  // console.log(data);
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