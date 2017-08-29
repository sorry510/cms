<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>

<!-- content -->
<div id="uworker_manage" class="gcontent">
  <ul class="am-nav am-nav-pills ubread">
    <li class="am-active"><a href="javascript: void(0)">员工管理</a></li>
    <li><a href="worker_group.php">员工分组</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="utools">
    <form class="am-form-inline uform2">
      <div class="am-form-group">
        <label class="am-form-label">分店：</label> 
        <select class="uselect uselect-auto" data-am-selected name="shop_id">
        <option value="0">全部</option>
        <?php foreach($this->_data['shop_list'] as $row){?>
          <option value="<?php echo $row['shop_id'];?>" <?php if($row['shop_id']==$this->_data['request']['shop_id']) echo 'selected'?>><?php echo $row['shop_name'];?></option>
        <? }?>
        </select>
      </div>
      <div class="am-form-group">
        <label class="am-form-label">员工分组：</label> 
        <select class="uselect uselect-auto" data-am-selected name="worker_group_id">
          <option value="0">全部</option>
          <?php foreach($this->_data['worker_group_list'] as $row){?>
            <option value="<?php echo $row['worker_group_id'];?>" <?php if($row['worker_group_id']==$this->_data['request']['worker_group_id']) echo 'selected'?>><?php echo $row['worker_group_name'];?></option>
          <? }?>
        </select>
      </div>
      <div class="am-form-group">
        <label class="am-form-label">搜索：</label>
        <input class="am-form-field uinput uinput-220" type="text" name="search" value="<?php echo $this->_data['request']['search'];?>" placeholder="姓名/编号">
      </div>
      <div class="am-form-group">
        <button type="submit" class="am-btn ubtn-search">
          <i class="iconfont icon-search"></i>查询
        </button>
      </div>
    </form> 
  </div>
  <div class="gspace15"></div>
  <table class="am-table am-table-bordered am-table-hover am-table-compact utable1" id="doc-modal-list">
    <thead>
      <tr>
        <td>分店</td>
        <td>员工分组</td>
        <td>员工姓名</td>
        <td>员工编号</td>
        <td>性别</td>
        <td>出生日期</td>
        <td>手机号码</td>
        <td>学历</td>
        <td>入职时间</td>
        <td>基本工资</td>
        <td>参与预约</td>
        <td>导购提成</td>
      </tr>
    </thead>
    <?php foreach($this->_data['worker_list']['list'] as $row){?>
    <tr>
      <td><?php echo $row['shop_name'];?></td>
      <td><?php echo $row['worker_group_name'];?></td>
      <td><a class="coffcanvasopen" data-am-offcanvas="{target: '#uworkeroff1'}" href="#" worker_id="<?php echo $row['worker_id'];?>"><?php echo $row['worker_name'];?></a></td>
      <td><?php echo $row['worker_code'];?></td>
      <td><?php echo $row['worker_sex']=='2'?'女':'男';?></td>
      <td><?php echo date('Y-m-d',$row['worker_birthday_date']);?></td>
      <td><?php echo $row['worker_phone'];?></td>
      <td><?php echo $row['education_name'];?></td>
      <td><?php echo date('Y-m-d',$row['worker_join']);?></td>
      <td><?php echo $row['worker_wage'];?></td>
      <td><?php echo $row['worker_config_reserve']=='1'?'参与':'不参与';?></td>
      <td><?php echo $row['worker_config_guide']=='1'?'参与':'不参与';?></td>
    </tr>
    <?php }?>
  </table>
  <?php pageHtml($this->_data['worker_list'],$this->_data['request'],'worker_manage.php');?>
</div>

<!-- 侧拉框 -->
<div id="uworkeroff1" class="am-offcanvas" >
  <div class="am-offcanvas-bar am-offcanvas-bar-flip uoffcanvas" style="width: 690px;">
    <div class="am-offcanvas-content" >
      <div class="am-modal-hd"><span class="utitle">员工详细信息</span>
        <a href="javascript: void(0)" class="am-close am-close-spin doc-oc-js uclose2" data-rel="close"><img src="../img/close.jpg"></a>
      </div>
      <div class="gspace15"></div>
      <div class="am-g ucontent">
        <div class="am-u-lg-6">分店名称：<span class="cshop_name">&nbsp;</span></div>
        <div class="am-u-lg-6">员工分组：<span class="cworker_group_name">&nbsp;</span></div>
        <div class="am-u-lg-6">员工姓名：<span class="cworker_name">&nbsp;</span></div>
        <div class="am-u-lg-6">员工编号：<span class="cworker_code">&nbsp;</span></div>
        <div class="am-u-lg-6">　　性别：<span class="cworker_sex">&nbsp;</div>
        <div class="am-u-lg-6">出生日期：<span class="cworker_birthday_date">&nbsp;</span></div>
        <div class="am-u-lg-6">手机号码：<span class="cworker_phone">&nbsp;</span></div>
        <div class="am-u-lg-6">身份证号：<span class="cworker_identity">&nbsp;</span></div>
        <div class="am-u-lg-6">最高学历：<span class="cworker_education">&nbsp;</span></div>
        <div class="am-u-lg-6">入职时间：<span class="cworker_join">&nbsp;</span></div>
        <div class="am-u-lg-6">居信住址：<span class="cworker_address">&nbsp;</span></div>
        <div class="am-u-lg-6">基本工资：<span class="cworker_wage">&nbsp;</span></div>
        <div class="am-u-lg-6">参与预约：<span class="cworker_reserve">&nbsp;</span></div>
        <div class="am-u-lg-6">导购提成：<span class="cworker_guide">&nbsp;</span></div>
        <div class="am-u-lg-12">工作内容：<span class="cworker_goods">&nbsp;</span></div>
        <div class="am-u-lg-12 gspace15"></div>
        <label class="am-u-lg-6">照片</label>
        <label class="am-u-lg-6">身份证</label>
        <div class="am-u-lg-6"><img class="uphoto cworker_photo1" src="../img/wu.jpg"></div>
        <div class="am-u-lg-6"><img class="uphoto cworker_photo2" src="../img/wu.jpg"></div>
      </div>
    </div>
  </div>
</div>

<script src="../js/jquery.min.js"></script>
<script src="../js/amazeui.min.js"></script>
<script>
<?php pageJs($this->_data['worker_list'],$this->_data['request'],'worker_manage.php');?>

// 侧拉打开
$('.coffcanvasopen').on('click', function(){
  $("#uworkeroff1 .cshop_name").text('');
  $("#uworkeroff1 .cworker_group_name").text('');
  $("#uworkeroff1 .cworker_name").text('');
  $("#uworkeroff1 .cworker_code").text('');
  $("#uworkeroff1 .cworker_sex").text('');
  $("#uworkeroff1 .cworker_birthday_date").text('');
  $("#uworkeroff1 .cworker_phone").text('');
  $("#uworkeroff1 .cworker_identity").text('');
  $("#uworkeroff1 .cworker_education").text('');
  $("#uworkeroff1 .cworker_join").text('');
  $("#uworkeroff1 .cworker_address").text('');
  $("#uworkeroff1 .cworker_wage").text('');
  $("#uworkeroff1 .cworker_guide").text('');
  $("#uworkeroff1 .cworker_reserve").text('');
  $("#uworkeroff1 .cworker_goods").text('');
  $("#uworkeroff1 .cworker_photo1").attr('src','../img/wu.jpg');
  $("#uworkeroff1 .cworker_photo2").attr('src','../img/wu.jpg');
  var url = "worker_manage_edit_ajax.php";
  $.getJSON(url,{worker_id:$(this).attr('worker_id')},function(res){
    // console.log(res);
    if(res){
      $("#uworkeroff1 .cshop_name").text(res.shop_name);
      $("#uworkeroff1 .cworker_group_name").text(res.worker_group_name);
      $("#uworkeroff1 .cworker_name").text(res.worker_name);
      $("#uworkeroff1 .cworker_code").text(res.worker_code);
      $("#uworkeroff1 .cworker_sex").text(res.worker_sex_name);
      $("#uworkeroff1 .cworker_birthday_date").text(res.worker_birthday_date);
      $("#uworkeroff1 .cworker_phone").text(res.worker_phone);
      $("#uworkeroff1 .cworker_identity").text(res.worker_identity);
      $("#uworkeroff1 .cworker_education").text(res.worker_education_name);
      $("#uworkeroff1 .cworker_join").text(res.worker_join);
      $("#uworkeroff1 .cworker_address").text(res.worker_address);
      $("#uworkeroff1 .cworker_wage").text(res.worker_wage);
      $("#uworkeroff1 .cworker_guide").text(res.worker_config_guide_name);
      $("#uworkeroff1 .cworker_reserve").text(res.worker_config_reserve_name);
      if(res.goods_name)
        $("#uworkeroff1 .cworker_goods").text(res.goods_name);
      if(res.worker_photo_file)
        $("#uworkeroff1 .cworker_photo1").attr('src','http://<?php echo $GLOBALS["gconfig"]["path"]["photo_worker_show"];?>/'+res.worker_photo_file);
      if(res.worker_identity_file)
        $("#uworkeroff1 .cworker_photo2").attr('src','http://<?php echo $GLOBALS["gconfig"]["path"]["photo_worker_show"];?>/'+res.worker_identity_file);
    }
  });
})
/*右侧弹出框关闭按钮JS*/
$('.doc-oc-js').on('click', function() {
  $('#uworkeroff1').offCanvas($(this).data('rel'));
});
</script>
</body>
</html>
