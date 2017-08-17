<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>
<!-- content -->
<div class="gcontent" id="uact_decrease">
  <ul class="am-nav am-nav-pills ubread">
    <li class="am-active"><a href="javascript: void(0);">满减活动</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="utools">
    <form class="am-form-inline uform2">
    <div class="am-form-group">
        <label for="doc-ipt-3" class="am-form-label">活动名称：</label>
        <input type="text" value="<?php echo htmlspecialchars($this->_data['request']['act_name']); ?>" class="am-form-field uinput uinput-220" placeholder="" name="act_name">
    </div>
    <!-- <div class="am-form-group">
        <label for="doc-ipt-3" class="am-form-label">顾客类型：</label>
        <select class="uselect uselect-auto" data-am-selected name="client">
          <option value="0">全部</option>
          <option value="1" <?php if($this->_data['request']['client']=='1'){echo "selected='selected'";}  ;?>>不限</option>
          <option value="2" <?php if($this->_data['request']['client']=='2'){echo "selected='selected'";} ;?>>会员</option>
          <option value="3" <?php if($this->_data['request']['client']=='3'){echo "selected='selected'";} ;?>>非会员</option>
        </select>
      </div> -->
      <div class="am-form-group">
        <label for="doc-ipt-3" class="am-form-label">日期：</label>
        <div class="am-input-group am-datepicker-date udatepicker" data-am-datepicker="{format: 'yyyy-mm-dd'}">
          <input type="text" class="am-form-field" name="from" value="<?php echo htmlspecialchars($this->_data['request']['from']); ?>">
          <span class="am-input-group-btn am-datepicker-add-on">
            <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span>
            </button>
          </span>
        </div>  
      </div>
      <div class="am-form-group">    
        <label for="doc-ipt-3" class="am-form-label">至：</label>
        <div class="am-input-group am-datepicker-date udatepicker udatepicker140" data-am-datepicker="{format: 'yyyy-mm-dd'}">
          <input type="text" class="am-form-field" name="to" value="<?php echo htmlspecialchars($this->_data['request']['to']); ?>">
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
    <button class="am-btn ubtn-sure ubtn-blue" data-am-modal="{target:'#uact_decreasem1'}">
      <i class="iconfont icon-xinzeng"></i>
      新增满减活动
    </button>
  </div>
  <div class="gspace15"></div>
  <table class="am-table am-table-bordered am-table-hover am-table-compact utable1">
    <thead>
      <tr>
        <td>新增时间</td>
        <td>活动名称</td>
        <td>顾客类型</td>
        <td>实付满--减</td>
        <td>开始时间</td>
        <td>结束时间</td>
        <td>参加店铺</td>
        <td>活动状态</td>
        <td>备注</td>
        <td style="width:16%;">操作</td>
      </tr>
    </thead>
    <tbody>
      <?php foreach($this->_data['act_decrease_list']['list'] as $row) { ?>
      <tr>
        <td><?php echo date('Y-m-d H:i',$row['act_decrease_atime']) ; ?></td>
        <td><?php echo $row['act_decrease_name']; ?></td>
        <td><?php echo $row['clienttype'] ;?></td>
        <td>实付满<?php echo $row['act_decrease_man'] ;?>元减<?php echo $row['act_decrease_jian'] ;?>元</td>
        <td><?php echo date('Y-m-d',$row['act_decrease_start']); ?></td>
        <td><?php echo date('Y-m-d',$row['act_decrease_end']); ?></td>
        <td><?php echo $row['shoptype'] ;?></td>
        <td<?php
        if ($row['act_decrease_state'] == 1) {
          if ($row['datstate'] == '进行中') {
            echo " class='gtext-green'>进行中";
          }elseif ($row['datstate'] == '未开始') {
             echo " class='gtext-orange'>未开始";
          }elseif ($row['datstate'] == '已结束') {
             echo " >已结束";
          }
        }else{ echo " class='gtext-orange'>停止"; }
          ;?></td>
        <td><?php echo $row['act_decrease_memo']; ?></td>
        <td>
          <button <?php if ($row['datstate'] == '已结束') {
            echo "style='display:none'";
          } ;?> class="am-btn ubtn-table ubtn-green cedit" data-am-modal="{target: '#uact_decreasem2'}" value="<?php echo $row['act_decrease_id']; ?>">
            <i class="iconfont icon-bianji"></i>
            修改
          </button>
          <?php if ($row['datstate'] == '未开始') {
            echo "&nbsp;";
          } ;?>
          <button <?php if ($row['datstate'] == '已结束' || $row['datstate'] == '进行中') {
            echo "style='display:none'";
          } ;?> class="am-btn ubtn-table ubtn-gray cdel" value="<?php echo $row['act_decrease_id']; ?>">
            <i class="iconfont icon-shanchu"></i>
            删除
          </button>
          <?php if ($row['datstate'] == '进行中') {
            echo "&nbsp;";
          } ;?>
          <button <?php if ($row['datstate'] == '已结束' || $row['datstate'] == '未开始') {
            echo "style='display:none'";
          } ;?> class="am-btn ubtn-table <?php if ($row['act_decrease_state'] == 1) {
            echo " ubtn-red cstop";
          }else{echo " ubtn-green cstart";} ; ?> " value="<?php echo $row['act_decrease_id']; ?>">
            <i class="iconfont icon-shanchu"></i>
            <?php if ($row['act_decrease_state'] == 1) {
              echo "停止";
            }else{ echo "启用";} ;?>
          </button>
        </td>
      </tr>
    <?php } ?> 
    </tbody>
  </table>
  <ul class="am-pagination am-pagination-centered upages">
    <li class="upage-info">共<?php echo $this->_data['act_decrease_list']['pagecount']; ?>页 <?php echo $this->_data['act_decrease_list']['allcount']; ?>条记录</li>
    <li class="cfirst am-disabled"><a href="act_decrease.php?<?php echo api_value_query($this->_data['request'], $this->_data['act_decrease_list']['pagepre']); ?>">&laquo;</a></li>
    <li class="am-active"><a href="#"><?php echo $this->_data['act_decrease_list']['pagenow'];?></a></li>
    <li class="clast"><a href="act_decrease.php?<?php echo api_value_query($this->_data['request'], $this->_data['act_decrease_list']['pagenext']); ?>">&raquo;</a></li>
    <li class="upage-info">，跳转到第 <input id="idpagego" class="am-form-field uinput" style="width:45px;height: 26px;vertical-align:bottom;line-height: 26px;" onkeydown="if(event.keyCode == 13){page_do();}"> 页</li>
  </ul>
</div>
<!-- 弹出框 -->
<div id="uact_decreasem1" class="am-modal" tabindex="-1">
  <div class="am-modal-dialog umodal umodal-simple">
    <div class="am-modal-hd uhead">新增满减活动
      <a href="javascript:void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd umain1">
      <form class="am-form am-form-horizontal" id="cinfoadd">
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">活动名称：</label>
          <div class="umodal-normal">
            <input id="" class="uinput uinput-max" type="text" placeholder="" name="name">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">顾客类型：</label>
          <div class="umodal-normal am-text-left">
            <label class="am-radio-inline">
              <input type="radio" name="client" value="1" data-am-ucheck checked> 不限
            </label>
            <label class="am-radio-inline">
              <input type="radio" name="client" value="2" data-am-ucheck> 会员
            </label>
            <label class="am-radio-inline">
              <input type="radio" name="client" value="3" data-am-ucheck> 非会员
            </label>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">实付满：</label>
          <div class="umodal-normal">
            <input id="" class="uinput uinput-max" type="text" placeholder="" name="man">
          </div>
          <div class="umodal-text">&nbsp;元</div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">减：</label>
          <div class="umodal-normal">
            <input id="" class="uinput uinput-max" type="text" placeholder="" name="jian">
          </div>
          <div class="umodal-text">&nbsp;元</div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">开始时间：</label>
          <div class="umodal-normal">
            <div class="am-input-group am-datepicker-date udatepicker udatepicker-max" data-am-datepicker="{format:'yyyy-mm-dd'}">
              <input type="text" class="am-form-field" name="start">
              <span class="am-input-group-btn am-datepicker-add-on">
                <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span></button>
              </span>
            </div>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">结束时间：</label>
          <div class="umodal-normal">
            <div class="am-input-group am-datepicker-date udatepicker udatepicker-max" data-am-datepicker="{format:'yyyy-mm-dd'}">
              <input type="text" class="am-form-field" name="end">
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
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">参加店铺：</label>
          <div class="umodal-max am-text-left">
            <label class="am-checkbox-inline">
              <input type="checkbox" name="shop" value="all" data-am-ucheck> 全部
            </label>
          <?php foreach($this->_data['shop'] as $row) { ?>
            <label class="am-checkbox-inline" style="margin-left: 0px;margin-right: 10px;">
              <input type="checkbox" class="ccc" name="shop_id[]" value="<?php echo $row['shop_id']; ?>" data-am-ucheck> <?php echo $row['shop_name']; ?>
            </label>
          <?php } ?>
          </div>
        </div>
      </form>
    </div>
    <div class="am-modal-footer ufoot">
      <div class="am-btn-group">
        <button type="button" class="am-btn ubtn-sure ubtn-green csubmitadd"><i class="iconfont icon-yuanxingxuanzhong" ></i>
        完成
        </button>
      </div>
    </div>
  </div>
</div>
<div id="uact_decreasem2" class="am-modal" tabindex="-1">
  <div class="am-modal-dialog umodal umodal-simple">
    <div class="am-modal-hd uhead">修改满减活动
      <a href="javascript:void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd umain1">
      <form class="am-form am-form-horizontal" id="cinfoedit">
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">活动名称：</label>
          <div class="umodal-normal">
            <input type="hidden" class="am-form-field uinput uinput-max" name="id">
            <input id="" class="uinput uinput-max" type="text" placeholder="" name="name">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">顾客类型：</label>
          <div class="umodal-normal am-text-left">
            <label class="am-radio-inline">
              <input type="radio" name="client" value="1" data-am-ucheck checked> 不限
            </label>
            <label class="am-radio-inline">
              <input type="radio" name="client" value="2" data-am-ucheck> 会员
            </label>
            <label class="am-radio-inline">
              <input type="radio" name="client" value="3" data-am-ucheck> 非会员
            </label>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">实付满：</label>
          <div class="umodal-normal">
            <input id="" class="uinput uinput-max" type="text" placeholder="" name="man">
          </div>
          <div class="umodal-text">&nbsp;元</div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">减：</label>
          <div class="umodal-normal">
            <input id="" class="uinput uinput-max" type="text" placeholder="" name="jian">
          </div>
          <div class="umodal-text">&nbsp;元</div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">开始时间：</label>
          <div class="umodal-normal">
            <div class="am-input-group am-datepicker-date udatepicker udatepicker-max" data-am-datepicker="{format:'yyyy-mm-dd'}">
              <input type="text" class="am-form-field" name="start">
              <span class="am-input-group-btn am-datepicker-add-on">
                <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span></button>
              </span>
            </div>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">结束时间：</label>
          <div class="umodal-normal">
            <div class="am-input-group am-datepicker-date udatepicker udatepicker-max" data-am-datepicker="{format:'yyyy-mm-dd'}">
              <input type="text" class="am-form-field" name="end">
              <span class="am-input-group-btn am-datepicker-add-on" >
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
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">参加店铺：</label>
          <div class="umodal-max am-text-left">
            <label class="am-checkbox-inline">
              <input type="checkbox" name="shop" value="all" data-am-ucheck> 全部
            </label>
          <?php foreach($this->_data['shop'] as $row) { ?>
            <label class="am-checkbox-inline" style="margin-left: 0px;margin-right: 10px;">
              <input type="checkbox" class="ccc" name="shop_id[]" value="<?php echo $row['shop_id']; ?>" data-am-ucheck> <?php echo $row['shop_name']; ?>
            </label>
          <?php } ?>
          </div>
        </div>
      </form>
    </div>
    <div class="am-modal-footer ufoot">
      <div class="am-btn-group">
        <button type="button" class="am-btn ubtn-sure ubtn-green csubmitedit"><i class="iconfont icon-yuanxingxuanzhong" ></i>
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
//分页首末页不可选中
if(<?php echo $this->_data['act_decrease_list']['pagenow'];?>>1){
  $('.upages li.cfirst').removeClass('am-disabled');
}
if(<?php echo $this->_data['act_decrease_list']['pagecount']-$this->_data['act_decrease_list']['pagenow']; ?><1){
  $('.upages li.clast').addClass('am-disabled');
}

function page_do() {
  var intpage = parseInt(document.getElementById("idpagego").value);
  if(isNaN(intpage)) {
    alert("请输入正确的页码！");
  } else {
    window.location = "act_decrease.php?<?php echo api_value_query($this->_data['request']); ?>&page=" + intpage;
  }
}

$(function() {
  $('.copenm3').on('click', function() {
    $('#uact_decreasem1').modal('close');
    $('#uact_decreasem3').modal('open');
  });
});

//删除操作JS
$(function() {
  $('.cdel').on('click', function() {
    $('#cconfirm').modal({
      relatedTarget: this,
      onConfirm: function(options) {
        var url="act_decrease_delete_do.php";
        $.post(url,{'id':$(this.relatedTarget).val()},function(res){
          if(res=='0'){
            window.location.reload();
          }else if(res =='100'){
            alert('活动正在进行');
          }else if(res =='101'){
            alert('活动已经结束'); 
          }else{
            alert('删除失败');
            console.log(res);
          }
        });
      },
      onCancel: function() {
        return;
      }
    });
  });
});
//添加操作JS
$('.csubmitadd').on('click',function(){
    $('.csubmitadd').attr("disabled",true);
    var url="act_decrease_add_do.php";
    var data = $("#cinfoadd").serialize();
/*    console.log(data);*/
    $.post(url,data,function(res){
      if(res=='0'){
        window.location.reload();
      }else if(res=='1'){
        alert('请完善数据');
        $('.csubmitadd').attr("disabled",false);
      }else{
        alert('添加失败');
        $('.csubmitadd').attr("disabled",false);
        console.log(res);
      }
    });
  });
//修改AJAX JS
$('.cedit').on('click',function(){
  $("#uact_decreasem2 input[name='shop_id[]']").uCheck('uncheck')
    var url="act_decrease_edit_ajax.php";
    var data = $(this).val();
    console.log(data);
    $.getJSON(url,{id:data},function(res){
      console.log(res);
      $("#uact_decreasem2 input[name='id']").val(res[0].act_decrease_id);
      $("#uact_decreasem2 input[name='name']").val(res[0].act_decrease_name);
      $("#uact_decreasem2 input[name='man']").val(res[0].act_decrease_man);
      $("#uact_decreasem2 input[name='jian']").val(res[0].act_decrease_jian);
      $("#uact_decreasem2 input[name='client']").each(function(){
          if($(this).val()==res[0].act_decrease_client){
            $(this).uCheck('check');
          }
        });
      if (res[0].act_decrease_shop==1) {$("#uact_decreasem2 input[name='shop']").uCheck('check');}else{$("#uact_decreasem2 input[name='shop']").uCheck('uncheck');}
      $("#uact_decreasem2 input[name='shop_id[]']").each(function(){
        console.log($(this).val());
          for (var i = 0; i < res.length; i++) {
            if($(this).val()==res[i].shop_id){
              $(this).uCheck('check');
            }
          }
        });
      
      $("#uact_decreasem2 input[name='start']").val(res[0].act_decrease_start);
      $("#uact_decreasem2 input[name='end']").val(res[0].act_decrease_end);
      $("#uact_decreasem2 textarea[name='memo']").val(res[0].act_decrease_memo);
    });
  });
//修改操作JS
$('.csubmitedit').on('click',function(){
    $('.csubmitedit').attr("disabled",true);
    var url="act_decrease_edit_do.php";
    var data = $("#cinfoedit").serialize();
    console.log(data);
    $.post(url,data,function(res){
      if(res=='0'){
        window.location.reload();
      }else if(res=='101'){
        alert('活动已经结束'); 
      }else if(res=='1'){
        alert('请完善数据');
        $('.csubmitedit').attr("disabled",false);
      }else{
        alert('修改失败');
        $('.csubmitedit').attr("disabled",false);
        console.log(res);
      }
    });
  });
//停止启用操作JS
$('.cstop').on('click',function(){
    var url="act_decrease_stop_do.php";
    var data = {
      id:$(this).val(),
      type:'stop'
    }
    console.log(data);
    $.post(url,data,function(res){
      if(res=='0'){
        window.location.reload();
      }else if(res=='101'){
        alert('活动已经结束');
      }else if(res=='102'){
        alert('活动未开始');
      }else{
        alert('停止失败');
        console.log(res);
      }
    });
  });
$('.cstart').on('click',function(){
    var url="act_decrease_stop_do.php";
    var data = {
      id:$(this).val(),
      type:'start'
    }
    console.log(data);
    $.post(url,data,function(res){
      if(res=='0'){
        window.location.reload();
      }else{
        alert('启用失败');
        console.log(res);
      }
    });
  });
//点击全部按钮，选择所有店铺
$("#uact_decreasem1 input[name='shop']").on('change',function(){
  $("#uact_decreasem1 input:checkbox").prop("checked",$(this).prop('checked'));
});
$("#uact_decreasem2 input[name='shop']").on('change',function(){
  $("#uact_decreasem2 input:checkbox").prop("checked",$(this).prop('checked'));
});

</script>
</body>
</html>