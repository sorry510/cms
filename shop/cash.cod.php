<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>
<div id="ucash" class="gcontent">
  <ul class="am-nav am-nav-pills ubread">
    <li class="am-active"><a href="#">收支管理</a></li>
    <li><a href="cash_type.php">收支分类</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="utools">
    <form class="am-form-inline uform2" method="get">
      <div class="am-form-group">
        <label for="doc-ipt-3" class="am-form-label">收支类型：</label>
        <select class="uselect uselect-auto" data-am-selected name="state">
          <option value="0" <?php if($this->_data['request']['state']==0)echo 'selected';?>>全部</option>
          <option value="1" <?php if($this->_data['request']['state']==1)echo 'selected';?>>收入</option>
          <option value="2" <?php if($this->_data['request']['state']==2)echo 'selected';?>>支出</option>
        </select>
      </div>
      <div class="am-form-group">
        <label for="doc-ipt-3" class="am-form-label">收支分类：</label>
        <select class="uselect uselect-auto" data-am-selected name="type">
           <option value="0" <?php if($this->_data['request']['type']==0)echo 'selected';?>>全部</option>
           <?php foreach($this->_data['cash_type_list'] as $row){?>
           <option value="<?php echo $row['cash_type_id'];?>" <?php if($this->_data['request']['type']==$row['cash_type_id'])echo 'selected';?>><?php echo $row['cash_type_name'];?></option>
           <?php }?>
        </select>
      </div>
      <div class="am-form-group">
        <label for="doc-ipt-3" class="am-form-label">日期：</label>
        <div class="am-input-group am-datepicker-date udatepicker" data-am-datepicker="{format: 'yyyy-mm-dd'}">
          <input type="text" class="am-form-field" name="from" value="<?php echo $this->_data['request']['from'];?>">
          <span class="am-input-group-btn am-datepicker-add-on">
            <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span>
            </button>
          </span>
        </div>  
      </div>
      <div class="am-form-group">    
        <label for="doc-ipt-3" class="am-form-label">至：</label>
        <div class="am-input-group am-datepicker-date udatepicker udatepicker140" data-am-datepicker="{format: 'yyyy-mm-dd'}">
          <input type="text" class="am-form-field" name="to" value="<?php echo $this->_data['request']['to'];?>">
          <span class="am-input-group-btn am-datepicker-add-on">
            <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span> </button>
          </span>
        </div>
      </div>
      <div class="am-form-group">
        <button type="submit" class="am-btn ubtn-search">
          <i class="iconfont icon-search"></i>查询
        </button>
      </div>
    </form>
    <button class="am-btn ubtn-sure ubtn-blue" data-am-modal="{target:'#ucashm1'}">
      <i class="iconfont icon-xinzeng"></i>
      新增收支
    </button>
  </div>
  <div class="gspace15"></div>
  <table class="am-table am-table-bordered am-table-hover am-table-compact utable1">
    <thead>
      <tr>
        <td>收支</td>
        <td>名称</td>
        <td>分类</td>
        <td>金额</td>
        <td>时间</td>
        <td>备注</td>
        <td style="width:12%;">操作</td>
      </tr>
    </thead>
    <tbody>
      <?php foreach($this->_data['cash_list']['list'] as $row){?>
      <tr>
        <td><?php echo $row['cash_state']==1?'收入':'支出';?></td>
        <td><?php echo $row['cash_name'];?></td>
        <td><?php echo $row['cash_type_name'];?></td>
        <td><?php echo $row['cash_money'];?></td>
        <td><?php echo date("Y-m-d H:i", $row['cash_time']);?></td>
        <td><?php echo $row['cash_memo'];?></td>
        <td>
          <button class="am-btn ubtn-table ubtn-green ceditshow" data-am-modal="{target:'#ucashm2'}" value="<?php echo $row['cash_id'];?>">
            <i class="iconfont icon-bianji"></i>
           修改
          </button>
          &nbsp;
          <button class="am-btn ubtn-table ubtn-gray cdel" value="<?php echo $row['cash_id'];?>">
             <i class="iconfont icon-shanchu"></i>
            删除
          </button> 
        </td>
      </tr>
      <?php }?>
    </tbody>
  </table>
  <?php pageHtml($this->_data['cash_list'], $this->_data['request'], 'cash.php');?>
</div>
<!-- 弹出框添加 -->
<div class="am-modal" tabindex="-1" id="ucashm1">
  <div class="am-modal-dialog umodal umodal-simple">
    <div class="am-modal-hd uhead">新增收支
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd umain1">
      <form class="am-form am-form-horizontal" id="cform1">
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">收支：</label>
          <div class="umodal-normal am-text-left">
            <label class="am-radio-inline">
              <input type="radio" name="state" value="1" data-am-ucheck checked> 收入
            </label>
            <label class="am-radio-inline">
              <input type="radio" name="state" value="2" data-am-ucheck> 支出
            </label>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">名称：</label>
          <div class="umodal-normal">
            <input type="text" class="am-form-field uinput uinput-max cvalid" name="name">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">分类：</label>
          <div class="umodal-normal">
            <select class="uselect uselect-max cvalid" data-am-selected name="type">
              <option value="0">请选择</option>
              <?php foreach($this->_data['cash_type_list'] as $row){?>
              <option value="<?php echo $row['cash_type_id'];?>"><?php echo $row['cash_type_name'];?></option>
              <?php }?>
            </select>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">金额：</label>
          <div class="umodal-normal">
            <input type="text" class="am-form-field uinput uinput-max cvalid" name="money">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">时间：</label>
          <div class="umodal-normal">
            <div class="am-input-group am-datepicker-date udatepicker udatepicker-max cvalid" data-am-datepicker="{format:'yyyy-mm-dd'}">
              <input type="text" class="am-form-field" name="time">
              <span class="am-input-group-btn am-datepicker-add-on">
                <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span></button>
              </span>
            </div>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">备注：</label>
          <div class="umodal-max">
            <textarea class="am-form-field utextarea utextarea-max" row="3" name="memo"></textarea>
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
<div class="am-modal" tabindex="-1" id="ucashm2">
  <div class="am-modal-dialog umodal umodal-simple">
    <div class="am-modal-hd uhead">修改收支
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd umain1">
      <form class="am-form am-form-horizontal" id="cform2">
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">收支：</label>
          <div class="umodal-normal am-text-left">
            <label class="am-radio-inline">
              <input type="radio" name="state" value="1" data-am-ucheck> 支出
            </label>
            <label class="am-radio-inline">
              <input type="radio" name="state" value="2" data-am-ucheck> 收入
            </label>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">名称：</label>
          <div class="umodal-normal">
            <input type="text" class="am-form-field uinput uinput-max cname cvalid" name="name">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">分类：</label>
          <div class="umodal-normal">
            <select class="uselect uselect-max ctype cvalid" name="type">
              <option value="0">请选择</option>
              <?php foreach($this->_data['cash_type_list'] as $row){?>
              <option value="<?php echo $row['cash_type_id'];?>"><?php echo $row['cash_type_name'];?></option>
              <?php }?>
            </select>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">金额：</label>
          <div class="umodal-normal">
            <input type="text" class="am-form-field uinput uinput-max cmoney cvalid" name="money">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">时间：</label>
          <div class="umodal-normal">
            <div class="am-input-group am-datepicker-date udatepicker udatepicker-max cvalid" data-am-datepicker="{format:'yyyy-mm-dd'}">
              <input type="text" class="am-form-field ctime" name="time">
              <span class="am-input-group-btn am-datepicker-add-on">
                <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span></button>
              </span>
            </div>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">备注：</label>
          <div class="umodal-max">
            <textarea class="am-form-field utextarea utextarea-max cmemo" row="3" name="memo"></textarea>
          </div>
        </div>
        <input type="hidden" class="am-form-field cid" name="id">
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
  <?php pageJs($this->_data['cash_list'], $this->_data['request'], 'cash.php');?>
  // cvalid
  $('input.cvalid').on('input propertychange blur', function(){
    $(this).val()==''?$(this).addClass('am-field-error'):$(this).removeClass('am-field-error');
  })
  // select cvalid
  $('select.cvalid').on('change', function(){
    $(this).val()=='0'?$(this).addClass('am-field-error'):$(this).removeClass('am-field-error');
  })
  // 日期
  $('div.cvalid input').on('input propertychange blur', function(){
    $(this).val()==''?$(this).parent().addClass('am-field-error'):$(this).parent().removeClass('am-field-error');
  })
  $('.caddsubmit').on('click', function(){
    var _this = $(this);
    _this.attr('disabled', true);
    // 验证变红
    $('#ucashm1 .cvalid').each(function(){
      if($(this).prop('tagName')=='SELECT'){
        if($(this).val()=='0'){
          $(this).addClass('am-field-error');
        }
      }else if($(this).prop('tagName')=='DIV'){
        if($(this).find('input').val()==''){
          $(this).addClass('am-field-error');
        }
      }else{
        if($(this).val()==''){
          $(this).addClass('am-field-error');
        }
      }
    })
    // 验证返回
    if($('#ucashm1 .cvalid').hasClass("am-field-error")){
      _this.attr('disabled',false);
      return false;
    }
    $.post('cash_add_do.php', $('#cform1').serialize(), function(res){
      // console.log(res);
      _this.attr('disabled', false);
      if(res==0){
        window.location.href="cash.php";
      }else if(res==1){
        alert('添加失败');
      }
    })
  })
  $('.ceditshow').on('click', function(){
    var id = $(this).val();
    $.getJSON('cash_edit_ajax.php', {id:id}, function(res){
      if(res){
        $("#ucashm2 .cid").val(res.cash_id);
        $("#ucashm2 input[name='state']").each(function(){
          if($(this).val()==res.cash_state){
            $(this).uCheck('check');
          }
        });
        $("#ucashm2 .ctype").val(res.cash_type_id);
        $("#ucashm2 .cname").val(res.cash_name);
        $("#ucashm2 .ctype").selected();
        $("#ucashm2 .cmoney").val(res.cash_money);
        $("#ucashm2 .ctime").val(res.time);
        $("#ucashm2 .cmemo").val(res.cash_memo);
      }
    })
  })
  // 关闭弹出框时删除select
  $('#ucashm2').on('close.modal.amui', function(){
    $('#ucashm2 .ctype').selected('destroy');
  });
  $('.ceditsubmit').on('click', function(){
    var _this = $(this);
    _this.attr('disabled', true);
    // 验证变红
    $('#ucashm2 .cvalid').each(function(){
      if($(this).prop('tagName')=='SELECT'){
        if($(this).val()=='0'){
          $(this).addClass('am-field-error');
        }
      }else if($(this).prop('tagName')=='DIV'){
        if($(this).find('input').val()==''){
          $(this).addClass('am-field-error');
        }
      }else{
        if($(this).val()==''){
          $(this).addClass('am-field-error');
        }
      }
    })
    // 验证返回
    if($('#ucashm2 .cvalid').hasClass("am-field-error")){
      _this.attr('disabled',false);
      return false;
    }
    $.post('cash_edit_do.php', $('#cform2').serialize(), function(res){
      // console.log(res);
      _this.attr('disabled', false);
      if(res==0){
        window.location.reload();
      }else if(res==1){
        alert('修改失败');
      }
    })
  })
  $('.cdel').on('click', function(){
    $('#cconfirm').modal({
      relatedTarget: this,
      onConfirm: function(options) {
        $.ajax({
          type: "POST",
          url: "cash_delete_do.php",
          data: {id:$(this.relatedTarget).val()},
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
  })
</script>
</body>
</html>