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
  <form class="am-form-inline uform2" id="form1" method="get" action="sgoods_catalog.php">
    <div class="am-form-group">
      <label for="doc-ipt-3" class="am-form-label">分店：</label>
      <select class="uselect uselect-auto" data-am-selected name="shop_id">
        <option value="0">全部</option>
        <?php foreach($this->_data['shop_list'] as $row) { ?>
          <option value="<?php echo $row['shop_id']; ?>" <?php if($row['shop_id'] == $this->_data['request']['shop_id']){
          echo "selected" ;}?> ><?php echo $row['shop_name']; ?></option>
        <?php } ?>
      </select>
    </div>
    <div class="am-form-group">
      <button type="submit" class="am-btn ubtn-search cbtn-form1">
        <i class="iconfont icon-search"></i>查询
      </button>
    </div>
  </form>
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
      <td>分店</td>
      <td style="width: 12%;">操作</td>
    </tr>
    </thead>
    <?php foreach($this->_data['sgoods_catalog_list']['list'] as $row) { ?>
    <tr>
      <td><?php echo $row['sgoods_catalog_name']; ?></td>
      <td><?php echo $row['shop_name']; ?></td>
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
  <ul class="am-pagination am-pagination-centered upages">
    <li class="upage-info">共<?php echo $this->_data['sgoods_catalog_list']['pagecount']; ?>页 <?php echo $this->_data['sgoods_catalog_list']['allcount']; ?>条记录</li>
    <li><a href="sgoods_catalog.php?page=<?php echo  $this->_data['sgoods_catalog_list']['pagepre']; ?>">&laquo;</a></li>
    <li class="am-active" ><a href="#"><?php echo $this->_data['sgoods_catalog_list']['pagenow']; ?></a></li>
    <li><a href="sgoods_catalog.php?page=<?php echo  $this->_data['sgoods_catalog_list']['pagenext']; ?>">&raquo;</a></li>
  </ul>
</div>


<!--modal框-->
<div class="am-modal" tabindex="-1" id="usgoods_catalogm1">
  <div class="am-modal-dialog umodal umodal-simple">
    <div class="am-modal-hd uhead">添加分类
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd">
      <form class="am-form am-form-horizontal"  id="form2" method="post" action="sgoods_catalog_add_do.php">
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">分类名称：</label>
          <div class="umodal-normal">
            <input type="text" name="sgoods_catalog_name" class="am-form-field uinput uinput-max">
          </div>
        </div> 
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">分店：</label>
          <div class="umodal-normal">
            <select class="uselect uselect-max" name="shop_id" data-am-selected>
            <?php foreach($this->_data['shop_list'] as $row) { ?>
              <option value="<?php echo $row['shop_id']; ?>"><?php echo $row['shop_name']; ?></option>
            <?php } ?>
            </select>
          </div>
        </div>
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

<div class="am-modal" tabindex="-1" id="usgoods_catalogm2">
  <div class="am-modal-dialog umodal umodal-simple">
    <div class="am-modal-hd uhead">修改分类
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd">
      <form class="am-form am-form-horizontal">
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">分类名称：</label>
          <div class="umodal-normal">
            <input type="text" class="am-form-field uinput uinput-max" name="sgoods_catalog_name">
          </div>
        </div> 
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">分店：</label>
          <div class="umodal-normal">
            <select name="shop_id" class="uselect uselect-max cshop_id" data-am-selected>
              <?php foreach($this->_data['shop_list'] as $row) { ?>
              <option value="<?php echo $row['shop_id']; ?>"><?php echo $row['shop_name']; ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <input type="hidden" name="sgoods_catalog_id">
      </form>
    </div>
    <div class="am-modal-footer ufoot">
      <div class="am-btn-group">
        <button type="submit" class="am-btn ubtn-sure ubtn-green ceditor-sgoods-catalog"><i class="iconfont icon-yuanxingxuanzhong"></i>
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
    var sgoods_catalog_id = $(this).val();
    $('#cconfirm').modal({
      relatedTarget: this,
      onConfirm: function(options) {
      $.ajax({
        type: "GET",
        url: "sgoods_catalog_delete.php",
        data: {sgoods_catalog_id:sgoods_catalog_id}, 
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

//搜索提交按钮
$('.cbtn-form1').on('click',function(){
  $("#form1").submit();
});
//添加分类提交按钮
$('.cadd-form2').on('click',function(){
  $("#form2").submit();
});

//修改按钮
$('.cid-update').on('click', function() {
  var sgoods_catalog_id = $(this).val();
  var shop_id = $(this).next().val();
  var sgoods_catalog_name = $(this).parent().siblings().eq(0).text();
  //console.log(shop_id);
  $("#usgoods_catalogm2 input[name='sgoods_catalog_name']").val(sgoods_catalog_name);
  $("#usgoods_catalogm2 input[name='sgoods_catalog_id']").val(sgoods_catalog_id);
  $('#usgoods_catalogm2 .cshop_id').val(shop_id);
  $('#usgoods_catalogm2 .cshop_id').selected();
});
$('#usgoods_catalogm2').on('close.modal.amui', function(){
  $('#usgoods_catalogm2 .cshop_id').selected('destroy');
});
//修改提交按钮
$('.ceditor-sgoods-catalog').on('click',function(){
  var url="sgoods_catalog_editor_do.php";
  var sgoods_catalog_name = $("#usgoods_catalogm2 input[name='sgoods_catalog_name']").val();
  var sgoods_catalog_id = $("#usgoods_catalogm2 input[name='sgoods_catalog_id']").val();
  var shop_id = $("#usgoods_catalogm2 select[name='shop_id']").find("option:selected").val();
  console.log(shop_id);
  var data = {
        sgoods_catalog_name:sgoods_catalog_name,
        sgoods_catalog_id:sgoods_catalog_id,
        shop_id:shop_id,
      }
      $.post(url,data,function(res){
        console.log(res);
        if(res=='y'){
          window.location.reload();
        }else{
          alert('修改单店商品分类失败');
          console.log(res);
        }
      });
});
</script>
</body>
</html>