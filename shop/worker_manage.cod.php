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
    <button class="am-btn ubtn-sure ubtn-blue" data-am-modal="{target: '#uworker_managem1'}">
      <i class="iconfont icon-xinzeng"></i>
      新增员工
    </button>
  </div>
  <div class="gspace15"></div>
  <table class="am-table am-table-bordered am-table-hover am-table-compact utable1" id="doc-modal-list">
    <thead>
      <tr>
        <td>员工分组</td>
        <td>员工姓名</td>
        <td>员工编号</td>
        <td>性别</td>
        <td>出生日期</td>
        <td>手机号码</td>
        <td>学历</td>
        <td>入职时间</td>
        <td>基本工资</td>
        <td width="12%">操作</td>
      </tr>
    </thead>
    <?php foreach($this->_data['worker_list']['list'] as $row){?>
    <tr>
      <td><?php echo $row['worker_group_name'];?></td>
      <td><a class="coffcanvasopen" data-am-offcanvas="{target: '#uworkeroff1'}" href="#" worker_id="<?php echo $row['worker_id'];?>"><?php echo $row['worker_name'];?></a></td>
      <td><?php echo $row['worker_code'];?></td>
      <td><?php echo $row['worker_sex']=='2'?'女':'男';?></td>
      <td><?php echo $row['worker_birthday_date']=='0'?'--':date('Y-m-d',$row['worker_birthday_date']);?></td>
      <td><?php echo $row['worker_phone'];?></td>
      <td><?php echo $row['education_name'];?></td>
      <td><?php echo $row['worker_join']=='0'?'--':date('Y-m-d',$row['worker_join']);?></td>
      <td><?php echo $row['worker_wage'];?></td>
      <td>
        <button class="am-btn ubtn-table ubtn-green cedit" data-am-modal="{target: '#uworker_managem2'}" value="<?php echo $row['worker_id'];?>">
          <i class="iconfont icon-bianji"></i>
          修改
        </button>
        &nbsp;
        <button class="am-btn ubtn-table ubtn-gray cdel" value="<?php echo $row['worker_id'];?>">
          <i class="iconfont icon-shanchu"></i>
          删除
        </button>
      </td>
    </tr>
    <?php }?>
  </table>
  <?php pageHtml($this->_data['worker_list'],$this->_data['request'],'worker_manage.php');?>
</div>

<!--modal框-->
<div class="am-modal" tabindex="-1" id="uworker_managem1">
  <div class="am-modal-dialog umodal">
    <div class="am-modal-hd uhead">新增员工
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd umain1">
      <form class="am-form am-form-horizontal">
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">员工分组：</label>
          <div class="umodal-normal">
            <select name="worker_group_id" class="uselect uselect-max cworker_group_id" data-am-selected>
            <?php foreach($this->_data['worker_group_list'] as $row){?>
              <option value="<?php echo $row['worker_group_id'];?>"><?php echo $row['worker_group_name'];?></option>
            <?php }?>
            </select>
          </div>
          <div class="umodal-search">&nbsp;</div>
          <label class="umodal-label am-form-label" for="">&nbsp;</label>
          <div class="umodal-normal">
            &nbsp;
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for=""><span class="gtext-orange">*</span>员工姓名：</label>
          <div class="umodal-normal">
            <input name="worker_name" type="text" class="am-form-field uinput uinput-max cworker_name cvalid">
          </div>
          <div class="umodal-search">&nbsp;</div>
          <label class="umodal-label am-form-label" for="">员工编号：</label>
          <div class="umodal-normal">
            <input name="worker_code" type="text" class="am-form-field uinput uinput-max cworker_code">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">性别：</label>
          <div class="umodal-normal am-text-left">
            <label class="am-radio-inline">
              <input type="radio" name="worker_sex1" value="1" data-am-ucheck checked> 男
            </label>
            <label class="am-radio-inline">
              <input type="radio" name="worker_sex1" value="2" data-am-ucheck> 女
            </label>
          </div>
          <div class="umodal-search">&nbsp;</div>
          <label class="umodal-label am-form-label" for="">出生日期：</label>
          <div class="umodal-normal">
            <div class="am-input-group am-datepicker-date udatepicker udatepicker-max" data-am-datepicker="{format:'yyyy-mm-dd'}">
              <input name="worker_birthday_date" type="text" class="am-form-field cworker_birthday_date">
              <span class="am-input-group-btn am-datepicker-add-on">
                <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span></button>
              </span>
            </div>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for=""><span class="gtext-orange">*</span>手机号码：</label>
          <div class="umodal-normal">
            <input name="worker_phone" type="text" class="am-form-field uinput uinput-max cworker_phone cvalid">
          </div>
          <div class="umodal-search">&nbsp;</div>
          <label class="umodal-label am-form-label" for="">身份证号：</label>
          <div class="umodal-normal">
            <input name="worker_identity" type="text" class="am-form-field uinput uinput-max cworker_identity">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">最高学历：</label>
          <div class="umodal-normal">
            <select name="worker_education" class="uselect uselect-max cworker_education" data-am-selected>
            <?php foreach($GLOBALS['gconfig']['worker']['education'] as $key => $row){?>
              <option value="<?php echo $key;?>"><?php echo $row;?></option>
            <?php }?>
            </select>
          </div>
          <div class="umodal-search">&nbsp;</div>
          <label class="umodal-label am-form-label" for="">入职时间：</label>
          <div class="umodal-normal">
            <div class="am-input-group am-datepicker-date udatepicker udatepicker-max" data-am-datepicker="{format:'yyyy-mm-dd'}">
              <input name="worker_join" type="text" class="am-form-field cworker_join">
              <span class="am-input-group-btn am-datepicker-add-on">
                <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span></button>
              </span>
            </div>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label">员工照片：</label>
          <div class="umodal-normal am-form-file am-text-left">
            <button type="button" class="am-btn am-btn-default am-btn-sm" style="width: 100%;">
              <i class="am-icon-cloud-upload"></i> 选择要上传的照片
            </button>
            <input id="cworker_photo1" class="cfile" name="worker_photo1" type="file">
            <div class="file-list"></div>
          </div>
          <div class="umodal-search">&nbsp;</div>
          <label class="umodal-label am-form-label">身份证照：</label>
          <div class="umodal-normal am-form-file am-text-left">
            <button type="button" class="am-btn am-btn-default am-btn-sm" style="width: 100%;">
              <i class="am-icon-cloud-upload"></i> 选择要上传的照片
            </button>
            <input id="cworker_photo2" class="cfile" name="worker_photo2" type="file">
            <div class="file-list"></div>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">住址：</label>
          <div class="umodal-normal">
            <input name="worker_address" class="am-form-field uinput uinput-max cworker_address" type="text">
          </div>
          <div class="umodal-search">&nbsp;</div>
          <label class="umodal-label am-form-label" for="">基本工资：</label>
          <div class="umodal-normal">
            <input name="worker_wage" type="text" class="am-form-field uinput uinput-max cworker_wage">
          </div>
        </div>
      </form>
    </div>
    <div class="am-modal-footer ufoot">
      <div class="am-btn-group">
        <button type="button" class="am-btn ubtn-sure ubtn-green cworkeradd">
          <i class="iconfont icon-xiangyou2"></i>
          完成
        </button>
      </div>
    </div>
  </div>
</div>
<div class="am-modal" tabindex="-1" id="uworker_managem2">
  <div class="am-modal-dialog umodal">
    <div class="am-modal-hd uhead">修改员工
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd umain1">
      <form class="am-form am-form-horizontal">
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">分店：</label>
          <div class="umodal-normal">
            <select name="shop_id" class="uselect uselect-max cshop_id" disabled>
              <?php foreach($this->_data['shop_list'] as $row){?>
                <option value="<?php echo $row['shop_id'];?>" <?php if($row['shop_id']==$GLOBALS['_SESSION']['login_sid'])echo "selected";?>><?php echo $row['shop_name'];?></option>
              <?php }?>
            </select>
          </div>
          <div class="umodal-search">&nbsp;</div>
          <label class="umodal-label am-form-label" for="">员工分组：</label>
          <div class="umodal-normal">
            <select name="worker_group_id" class="uselect uselect-max cworker_group_id">
            <?php foreach($this->_data['worker_group_list'] as $row){?>
              <option value="<?php echo $row['worker_group_id'];?>"><?php echo $row['worker_group_name'];?></option>
            <?php }?>
            </select>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for=""><span class="gtext-orange">*</span>员工姓名：</label>
          <div class="umodal-normal">
            <input name="worker_name" type="text" class="am-form-field uinput uinput-max cworker_name cvalid">
          </div>
          <div class="umodal-search">&nbsp;</div>
          <label class="umodal-label am-form-label" for="">员工编号：</label>
          <div class="umodal-normal">
            <input name="worker_code" type="text" class="am-form-field uinput uinput-max cworker_code">
            <input name="worker_code_old" type="hidden" class="am-form-field uinput uinput-max cworker_code_old">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">性别：</label>
          <div class="umodal-normal am-text-left">
            <label class="am-radio-inline">
              <input type="radio" name="worker_sex2" value="1" data-am-ucheck checked> 男
            </label>
            <label class="am-radio-inline">
              <input type="radio" name="worker_sex2" value="2" data-am-ucheck> 女
            </label>
          </div>
          <div class="umodal-search">&nbsp;</div>
          <label class="umodal-label am-form-label" for="">出生日期：</label>
          <div class="umodal-normal">
            <div class="am-input-group am-datepicker-date udatepicker udatepicker-max" data-am-datepicker="{format:'yyyy-mm-dd'}">
              <input name="worker_birthday_date" type="text" class="am-form-field cworker_birthday_date">
              <span class="am-input-group-btn am-datepicker-add-on">
                <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span></button>
              </span>
            </div>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for=""><span class="gtext-orange">*</span>手机号码：</label>
          <div class="umodal-normal">
            <input name="worker_phone" type="text" class="am-form-field uinput uinput-max cworker_phone cvalid">
          </div>
          <div class="umodal-search">&nbsp;</div>
          <label class="umodal-label am-form-label" for="">身份证号：</label>
          <div class="umodal-normal">
            <input name="worker_identity" type="text" class="am-form-field uinput uinput-max cworker_identity">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">最高学历：</label>
          <div class="umodal-normal">
            <select name="worker_education" class="uselect uselect-max cworker_education">
            <?php foreach($GLOBALS['gconfig']['worker']['education'] as $key => $row){?>
              <option value="<?php echo $key;?>"><?php echo $row;?></option>
            <?php }?>
            </select>
          </div>
          <div class="umodal-search">&nbsp;</div>
          <label class="umodal-label am-form-label" for="">入职时间：</label>
          <div class="umodal-normal">
            <div class="am-input-group am-datepicker-date udatepicker udatepicker-max" data-am-datepicker="{format:'yyyy-mm-dd'}">
              <input name="worker_join" type="text" class="am-form-field cworker_join">
              <span class="am-input-group-btn am-datepicker-add-on">
                <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span></button>
              </span>
            </div>
          </div>
        </div>
        <div class="am-form-group ">
          <label class="umodal-label am-form-label">员工照片：</label>
          <div class="umodal-normal am-form-file am-text-left">
            <button type="button" class="am-btn am-btn-default am-btn-sm" style="width: 100%;">
              <i class="am-icon-cloud-upload"></i> 选择要上传的照片
            </button>
            <input id="cworker_photo3" class="cfile" name="worker_photo3" type="file">
            <div class="file-list"></div>
          </div>
          <div class="umodal-search">&nbsp;</div>
          <label class="umodal-label am-form-label">身份证照：</label>
          <div class="umodal-normal am-form-file am-text-left">
            <button type="button" class="am-btn am-btn-default am-btn-sm" style="width: 100%;">
              <i class="am-icon-cloud-upload"></i> 选择要上传的照片
            </button>
            <input id="cworker_photo4" class="cfile" name="worker_photo4" type="file">
            <div class="file-list"></div>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">住址：</label>
          <div class="umodal-normal">
            <input name="worker_address" class="am-form-field uinput uinput-max cworker_address" type="text">
          </div>
          <div class="umodal-search">&nbsp;</div>
          <label class="umodal-label am-form-label" for="">基本工资：</label>
          <div class="umodal-normal">
            <input name="worker_wage" type="text" class="am-form-field uinput uinput-max cworker_wage">
          </div>
        </div>
        <input type="hidden" class="cworker_id">
      </form>
    </div>
    <div class="am-modal-footer ufoot">
      <div class="am-btn-group">
        <button type="button" class="am-btn ubtn-sure ubtn-green cworkeredit">
          <i class="iconfont icon-xiangyou2"></i>
          完成
        </button>
      </div>
    </div>
  </div>
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
        <div class="am-u-lg-12 gspace15"></div>
        <label class="am-u-lg-6">照片</label>
        <label class="am-u-lg-6">身份证</label>
        <div class="am-u-lg-6"><img class="uphoto cworker_photo1" src="../img/wu.jpg"></div>
        <div class="am-u-lg-6"><img class="uphoto cworker_photo2" src="../img/wu.jpg"></div>
      </div>
    </div>
  </div>
</div>
<!-- 删除框 -->
<div id="cconfirm" class="am-modal am-modal-confirm" tabindex="-1">
  <div class="am-modal-dialog uconfirm">
    <div class="am-modal-hd uhead"><b>删&nbsp;&nbsp;&nbsp;&nbsp;除&nbsp;&nbsp;&nbsp;&nbsp;提&nbsp;&nbsp;&nbsp;&nbsp;醒</b></div>
    <div class="am-modal-bd">
      你，确定要删除这条记录吗?
    </div>
    <div class="am-modal-footer">
      <span class="am-modal-btn" data-am-modal-cancel>取消</span>
      <span class="am-modal-btn" data-am-modal-confirm>确定</span>
    </div>
  </div>
</div>
<script src="../js/jquery.min.js"></script>
<script src="../js/amazeui.min.js"></script>
<script src="../js/ajaxfileupload.js"></script>
<script>
<?php pageJs($this->_data['worker_list'],$this->_data['request'],'worker_manage.php');?>
// cvalid
$('.cvalid').on('input propertychange blur', function(){
  $(this).val()==''?$(this).addClass('am-field-error'):$(this).removeClass('am-field-error');
});

//文件上传
$('.cfile').on('change', function() {
  var fileNames = '';
  $.each(this.files, function() {
    fileNames += '<span class="am-badge">' + this.name + '</span> ';
  });
  $(this).siblings('.file-list').html(fileNames);
});


// 添加提交
$('.cworkeradd').on('click', function(){
  var _self = $(this);
  _self.attr('disabled',true);
  // 验证变红
  $('#uworker_managem1 .cvalid').each(function(){
    if($(this).val()==''){
      $(this).addClass('am-field-error');
    }
  })
  // 验证返回
  if($('#uworker_managem1 .cvalid').hasClass("am-field-error")){
    _self.attr('disabled',false);
    return false;
  }
  var url="worker_manage_add_do.php";
  var count=0;
  var worker_id = 0;
  var data = {
        shop_id:$('#uworker_managem1 .cshop_id').val(),
        worker_group_id:$('#uworker_managem1 .cworker_group_id').val(),
        worker_name:$('#uworker_managem1 .cworker_name').val(),
        worker_code:$('#uworker_managem1 .cworker_code').val(),
        worker_sex:$("#uworker_managem1 input[name='worker_sex1']:checked").val(),
        worker_birthday_date:$('#uworker_managem1 .cworker_birthday_date').val(),
        worker_phone:$('#uworker_managem1 .cworker_phone').val(),
        worker_identity:$('#uworker_managem1 .cworker_identity').val(),
        worker_education:$('#uworker_managem1 .cworker_education').val(),
        worker_join:$('#uworker_managem1 .cworker_join').val(),
        worker_address:$('#uworker_managem1 .cworker_address').val(),
        worker_wage:$('#uworker_managem1 .cworker_wage').val()
      }
  // console.log(data);
  $.ajax({
    url:url,
    data:data,
    type:'POST'
  }).then(function(res){
    if(res!='error'){
      worker_id = res;
    }else{
      count = 10;
      alert('添加失败');
      $('.cworkeradd').attr('disabled',false);
      console.log(res);
    }
  }).then(function(){
    if(count!=10){
      $.ajaxFileUpload ({
        url:'worker_upload_do.php', //你处理上传文件的服务端
        secureuri:false,
        fileElementId:'cworker_photo1',//与页面处理代码中file相对应的ID值
        data:{worker_id:worker_id,worker_photo_name:'worker_photo1',address:'worker_photo_file'},
        dataType: 'text', //返回数据类型:text，xml，json，html,scritp,jsonp五种
        success: function (data) {
          count++;
        }
      });
    }
  }).then(function(){
    if(count!=10){
      $.ajaxFileUpload ({
        url:'worker_upload_do.php', //你处理上传文件的服务端
        secureuri:false,
        fileElementId:'cworker_photo2',//与页面处理代码中file相对应的ID值
        data:{worker_id:worker_id,worker_photo_name:'worker_photo2',address:'worker_identity_file'},
        dataType: 'text', //返回数据类型:text，xml，json，html,scritp,jsonp五种
        success: function (data) {
          count++;
        }
      });
    }
  }).then(function(){
    setInterval(function(){
      if(count===2)
        window.location.href='worker_manage.php';
    }, 200)
  });
});

//修改打开
$('.cedit').on('click', function(){
  var worker_id = $(this).val();
  $("#uworker_managem2 .cworker_id").val(worker_id);
  $.ajax({
    type: "GET",
    url: "worker_manage_edit_ajax.php",
    data: {worker_id:worker_id}, 
    dataType:'json',
    success: function(res){
      // console.log(res);
      if(res){
        $("#uworker_managem2 .cshop_id").val(res.shop_id);
        $("#uworker_managem2 .cshop_id").selected();
        $("#uworker_managem2 .cworker_group_id").val(res.worker_group_id);
        $("#uworker_managem2 .cworker_group_id").selected();
        $("#uworker_managem2 .cworker_name").val(res.worker_name);
        $("#uworker_managem2 .cworker_code").val(res.worker_code);
        $("#uworker_managem2 .cworker_code_old").val(res.worker_code);
        $("#uworker_managem2 input[name='worker_sex2']").each(function(){
          if($(this).val() == res.worker_sex){
            $(this).uCheck('check');
          }
        });
        $("#uworker_managem2 .cworker_birthday_date").val(res.worker_birthday_date);
        $("#uworker_managem2 .cworker_phone").val(res.worker_phone);
        $("#uworker_managem2 .cworker_identity").val(res.worker_identity);
        $("#uworker_managem2 .cworker_education").val(res.worker_education);
        $("#uworker_managem2 .cworker_education").selected();
        $("#uworker_managem2 .cworker_join").val(res.worker_join);
        $("#uworker_managem2 .cworker_address").val(res.worker_address);
        $("#uworker_managem2 .cworker_wage").val(res.worker_wage);

        $("#uworker_managem2 input[name='worker_reserve2']").each(function(){
          if($(this).val() == res.worker_config_reserve){
            $(this).uCheck('check');
          }
        });
        $("#uworker_managem2 input[name='worker_guide2']").each(function(){
          if($(this).val() == res.worker_config_guide){
            $(this).uCheck('check');
          }
        });
      }
    }
  });
});
// 关闭修改弹出框时删除select
$('#uworker_managem2').on('close.modal.amui', function(){
  $('#uworker_managem2 .cshop_id').selected('destroy');
  $('#uworker_managem2 .cworker_group_id').selected('destroy');
  $('#uworker_managem2 .cworker_education').selected('destroy');
});

// 修改提交
$('.cworkeredit').on('click', function(){
  var _self = $(this);
  _self.attr('disabled',true);
  // 验证变红
  $('#uworker_managem2 .cvalid').each(function(){
    if($(this).val()==''){
      $(this).addClass('am-field-error');
    }
  })
  // 验证返回
  if($('#uworker_managem2 .cvalid').hasClass("am-field-error")){
    _self.attr('disabled',false);
    return false;
  }
  var count = 0;
  var url="worker_manage_edit_do.php";
  var worker_id = $('#uworker_managem2 .cworker_id').val();
  var data = {
    worker_id:$('#uworker_managem2 .cworker_id').val(),
    shop_id:$('#uworker_managem2 .cshop_id').val(),
    worker_group_id:$('#uworker_managem2 .cworker_group_id').val(),
    worker_name:$('#uworker_managem2 .cworker_name').val(),
    worker_code:$('#uworker_managem2 .cworker_code').val(),
    worker_code_old:$('#uworker_managem2 .cworker_code_old').val(),
    worker_sex:$("#uworker_managem2 input[name='worker_sex2']:checked").val(),
    worker_birthday_date:$('#uworker_managem2 .cworker_birthday_date').val(),
    worker_phone:$('#uworker_managem2 .cworker_phone').val(),
    worker_identity:$('#uworker_managem2 .cworker_identity').val(),
    worker_education:$('#uworker_managem2 .cworker_education').val(),
    worker_join:$('#uworker_managem2 .cworker_join').val(),
    worker_address:$('#uworker_managem2 .cworker_address').val(),
    worker_wage:$('#uworker_managem2 .cworker_wage').val(),
    worker_reserve:$("#uworker_managem2 input[name='worker_reserve2']:checked").val(),
    worker_guide:$("#uworker_managem2 input[name='worker_guide2']:checked").val(),
  }
  // console.log(data);
  $.ajax({
    url:url,
    data:data,
    type:'POST'
  }).then(function(res){
    if(res!='0'){
      alert('修改失败');
      count=10;
      console.log(res);
    }
  }).then(function(){
    if(count!=10){
      $.ajaxFileUpload ({
        url:'worker_upload_do.php', //你处理上传文件的服务端
        secureuri:false,
        fileElementId:'cworker_photo3',//与页面处理代码中file相对应的ID值
        data:{worker_id:worker_id,worker_photo_name:'worker_photo3',address:'worker_photo_file'},
        dataType: 'text', //返回数据类型:text，xml，json，html,scritp,jsonp五种
        success: function (data) {
          count++;
          console.log(data);
        }
      });
    }
  }).then(function(){
    if(count!=10){
      $.ajaxFileUpload ({
        url:'worker_upload_do.php', //你处理上传文件的服务端
        secureuri:false,
        fileElementId:'cworker_photo4',//与页面处理代码中file相对应的ID值
        data:{worker_id:worker_id,worker_photo_name:'worker_photo4',address:'worker_identity_file'},
        dataType: 'text', //返回数据类型:text，xml，json，html,scritp,jsonp五种
        success: function (data) {
          count++;
        }
      });
    }
  }).then(function(){
    // console.log(count);
    setInterval(function(){
      // console.log(count);
      if(count===2)
        window.location.reload();
    }, 200)
  });
})

$('.cdel').on('click', function() {
  $('#cconfirm').modal({
    relatedTarget: this,
    onConfirm: function(options) {
      $.post('worker_manage_delete_do.php', {worker_id:$(this.relatedTarget).val()}, function(res){
        if(res=='0'){
          window.location.reload();
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
        $("#uworkeroff1 .cworker_photo1").attr('src','http://<?php echo $GLOBALS["gconfig"]["path"]['photo_worker_show'];?>/'+res.worker_photo_file+'?'+Math.random()*1000);
      if(res.worker_identity_file)
        $("#uworkeroff1 .cworker_photo2").attr('src','http://<?php echo $GLOBALS["gconfig"]["path"]['photo_worker_show'];?>/'+res.worker_identity_file+'?'+Math.random()*1000);
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
