<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>
<div id="umgoods" class="gcontent">
  <ul class="am-nav am-nav-pills ubread">
    <li class="am-active"><a href="#">多店通用商品</a></li>
    <li><a href="mgoods_catalog.php">商品分类</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="utools">
    <form class="am-form-inline uform2" if="form1" action="mgoods.php" method="get">
      <div class="am-form-group">
        <label for="doc-ipt-3" class="am-form-label">商品分类：</label>
        <select class="uselect uselect-auto" data-am-selected name="mgoods_catalog_id">
          <option value="0">全部</option>
          <?php foreach($this->_data['mgoods_catalog_list'] as $row) { ?>
          <option value="<?php echo $row['mgoods_catalog_id'] ?>" <?php if($row['mgoods_catalog_id'] == $this->_data['request']['mgoods_catalog_id']){echo "selected";} ?> ><?php echo $row['mgoods_catalog_name'] ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="am-form-group">
        <label for="doc-ipt-3" class="am-form-label">搜索：</label>
        <input class="am-form-field uinput uinput-220" type="text" name="search" value="<?php echo $this->_data['request']['search'];?>" placeholder="商品名称/简拼/编码">
      </div>
      <div class="am-form-group">
        <button type="submit" class="am-btn ubtn-search uadd-form1">
          <i class="iconfont icon-search"></i>查询
        </button>
      </div>
    </form> 
    <button class="am-btn ubtn-sure ubtn-blue" data-am-modal="{target: '#umgoodsm1'}">
    <i class="iconfont icon-xinzeng"></i>
      新增商品
    </button>
  </div>
  <div class="gspace15"></div>
  <table class="am-table am-table-bordered am-table-hover am-table-compact utable1" id="doc-modal-list">
    <thead>
      <tr>
        <td>商品分类</td>
        <td>商品名称</td>
        <td>商品编码</td>
        <td>商品价格</td>
        <td>会员价格</td>
        <td>参与库存</td>
        <td>参加活动</td>
        <td>参与预约</td>
        <td>状态</td>
        <td style="width: 18%;">操作</td>
      </tr>
    </thead>  
    <?php foreach($this->_data['mgoods_list']['list'] as $row) { ?>
    <tr>
      <td><?php echo $row['mgoods_catalog_name']; ?></td>
      <td><?php echo $row['mgoods_name']; ?></td>
      <td><?php echo $row['mgoods_code']; ?></td>
      <td><?php echo $row['mgoods_price']; ?></td>
      <td><?php echo $row['mgoods_cprice']==0?'--':$row['mgoods_cprice']; ?></td>
      <td class="<?php echo $row['mgoods_type']==2?'gtext-green':'gtext-orange';?>"><?php echo $row['mgoods_type']==2?'√':'x';?></td>
      <td class="<?php echo $row['mgoods_act']=='1'?'gtext-green':'gtext-orange';?>"><?php echo $row['mgoods_act']=='1'?'√':'x';?></td>
      <td class="<?php echo $row['mgoods_reserve']=='1'?'gtext-green':'gtext-orange';?>"><?php echo $row['mgoods_reserve']=='1'?'√':'x';?></td>
      <td class="<?php echo $row['mgoods_state']=='1'?'gtext-green':'gtext-orange';?>"><?php echo $row['mgoods_state']=='1'?'正常':'停用';?></td>
      <td>
        <button class="am-btn ubtn-table ubtn-green cupdate" data-am-modal="{target: '#umgoodsm2'}" value="<?php echo $row['mgoods_id']; ?>">
          <i class="iconfont icon-bianji"></i>
          修改
        </button>
        &nbsp;
        <button class="am-btn ubtn-table ubtn-gray cdel"  value="<?php echo $row['mgoods_id']; ?>">
          <i class="iconfont icon-shanchu"></i>
          删除
        </button>
        &nbsp;
        <?php if($row['mgoods_state'] == 1){
                echo '<button class="am-btn ubtn-table ubtn-orange cmgoods_state" value="'.$row["mgoods_id"].'" state="'.$row['mgoods_state'].'">
                        <i class="iconfont icon-tingyong"></i>
                        停用
                      </button>';
              }else if($row['mgoods_state'] == 2){
                echo '<button class="am-btn ubtn-table ubtn-blue cmgoods_state2" value="'.$row["mgoods_id"].'" state="'.$row['mgoods_state'].'">
                        <i class="iconfont icon-question"></i>
                        启用
                      </button>';
              }
        ?>
        <input type="hidden" class="cstate" name="mgoods_state" value="<?php echo $row['mgoods_state']; ?>">
      </td>
    </tr>
    <?php } ?>
  </table>
  <?php pageHtml($this->_data['mgoods_list'],$this->_data['request'],'mgoods.php');?>
</div>

<!--添加商品-->
<div class="am-modal" tabindex="-1" id="umgoodsm1">
  <div class="am-modal-dialog umodal">
    <div class="am-modal-hd uhead">新增商品
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd">
      <form class="am-form am-form-horizontal" id="form2">
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for=""><span class="gtext-orange">*</span>商品分类：</label>
          <div class="umodal-normal">
            <select class="uselect uselect-max" data-am-selected name="mgoods_catalog_id">
              <option value="0">请选择</option>
              <?php foreach($this->_data['mgoods_catalog_list'] as $row) { ?>
              <option value="<?php echo $row['mgoods_catalog_id'] ?>"><?php echo $row['mgoods_catalog_name'] ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for=""><span class="gtext-orange">*</span>商品名称：</label>
          <div class="umodal-normal">
            <input type="text" id="cgoodsname" name="mgoods_name" class="am-form-field uinput uinput-max" onKeyUp="query()" required>
          </div>
          <div class="umodal-text"  style="text-indent:2em;">简拼：</div>
          <div class="umodal-valid">
            <input type="text" id="cupen" name="mgoods_jianpin" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">商品编码：</label>
          <div class="umodal-normal">
            <input type="text" name="mgoods_code" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for=""><span class="gtext-orange">*</span>商品价格：</label>
          <div class="umodal-normal">
            <input type="text" name="mgoods_price" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">会员价格：</label>
          <div class="umodal-normal">
            <input type="text" name="mgoods_cprice" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">参与库存：</label>
          <div class="umodal-normal am-text-left">
            <label class="am-radio-inline">
              <input type="radio" name="mgoods_type" value="2" data-am-ucheck> 参与
            </label>
            <label class="am-radio-inline">
              <input type="radio" name="mgoods_type" value="1" data-am-ucheck checked> 不参与
            </label>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">参与活动：</label>
          <div class="umodal-normal am-text-left">
            <label class="am-radio-inline">
              <input type="radio" name="mgoods_act" value="1" data-am-ucheck checked> 参与
            </label>
            <label class="am-radio-inline">
              <input type="radio" name="mgoods_act" value="2" data-am-ucheck> 不参与
            </label>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">参与预约：</label>
          <div class="umodal-normal am-text-left">
            <label class="am-radio-inline">
              <input type="radio" name="mgoods_reserve" value="1" data-am-ucheck checked> 参与
            </label>
            <label class="am-radio-inline">
              <input type="radio" name="mgoods_reserve" value="2" data-am-ucheck> 不参与
            </label>
          </div>
        </div>
      </form>
    </div>
    <div class="am-modal-footer ufoot">
      <div class="am-btn-group">
        <button type="button" class="am-btn ubtn-sure ubtn-green cadd-form"><i class="iconfont icon-yuanxingxuanzhong"></i>
          完成并继续添加
        </button>
        <button type="button" class="am-btn ubtn-sure ubtn-green cadd-form2"><i class="iconfont icon-yuanxingxuanzhong"></i>
          完成
        </button>
      </div>
    </div>
  </div>
</div>
<!--修改商品-->
<div class="am-modal" tabindex="-1" id="umgoodsm2">
  <div class="am-modal-dialog umodal">
    <div class="am-modal-hd uhead">修改商品
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd">
      <form class="am-form am-form-horizontal"  id="form3" method="post" action="mgoods_editor_do.php">
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for=""><span class="gtext-orange">*</span>商品分类：</label>
          <div class="umodal-normal">
            <select class="uselect uselect-max" name="mgoods_catalog_id">
            <option value="0">请选择</option>
            <?php foreach($this->_data['mgoods_catalog_list'] as $row) { ?>
            <option value="<?php echo $row['mgoods_catalog_id'] ?>"><?php echo $row['mgoods_catalog_name'] ?></option>
            <?php } ?>
            </select>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for=""><span class="gtext-orange">*</span>商品名称：</label>
          <div class="umodal-normal">
            <input name= "mgoods_name" type="text" id="cgoodsname2" class="am-form-field uinput uinput-max" onKeyUp="query2()" required>
            <input name= "mgoods_name_old" type="hidden">
          </div>
          <div class="umodal-text" style="text-indent:2em;">简拼：</div>
          <div class="umodal-valid">
            <input type="text" name="mgoods_jianpin" id="cupen2" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">商品编码：</label>
          <div class="umodal-normal">
            <input type="text" name="mgoods_code" class="am-form-field uinput uinput-max">
            <input type="hidden" name="mgoods_code_old" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for=""><span class="gtext-orange">*</span>商品价格：</label>
          <div class="umodal-normal">
            <input type="text" name="mgoods_price" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">会员价格：</label>
          <div class="umodal-normal">
            <input type="text" name="mgoods_cprice" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">参与库存：</label>
          <div class="umodal-normal am-text-left">
            <label class="am-radio-inline">
              <input type="radio" name="mgoods_type" value="2"  data-am-ucheck> 参与
            </label>
            <label class="am-radio-inline">
              <input type="radio" name="mgoods_type" value="1"  data-am-ucheck checked> 不参与
            </label>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">参与活动：</label>
          <div class="umodal-normal am-text-left">
            <label class="am-radio-inline">
              <input type="radio" name="mgoods_act" value="1"  data-am-ucheck checked> 参与
            </label>
            <label class="am-radio-inline">
              <input type="radio" name="mgoods_act" value="2"  data-am-ucheck> 不参与
            </label>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">参与预约：</label>
          <div class="umodal-normal am-text-left">
            <label class="am-radio-inline">
              <input type="radio" name="mgoods_reserve" value="1"  data-am-ucheck checked> 参与
            </label>
            <label class="am-radio-inline">
              <input type="radio" name="mgoods_reserve" value="2"  data-am-ucheck> 不参与
            </label>
          </div>
        </div>
        <input type="hidden" name="mgoods_id">
      </form>
    </div>
    <div class="am-modal-footer ufoot">
      <div class="am-btn-group">
        <button type="button" class="am-btn ubtn-sure ubtn-green cadd-form3"><i class="iconfont icon-yuanxingxuanzhong"></i>
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
      你确定要删除这条记录吗？
    </div>
    <div class="am-modal-footer">
      <span class="am-modal-btn" data-am-modal-cancel>取消</span>
      <span class="am-modal-btn" data-am-modal-confirm>确定</span>
    </div>
  </div>
</div>
<!-- 停用框 -->
<div id="cconfirm2" class="am-modal am-modal-confirm" tabindex="-1">
  <div class="am-modal-dialog uconfirm">
    <div class="am-modal-hd uhead"><b>确&nbsp;&nbsp;&nbsp;&nbsp;认&nbsp;&nbsp;&nbsp;&nbsp;提&nbsp;&nbsp;&nbsp;&nbsp;醒</b></div>
    <div class="am-modal-bd">
      你确定要停用吗？
    </div>
    <div class="am-modal-footer">
      <span class="am-modal-btn" data-am-modal-cancel>取消</span>
      <span class="am-modal-btn" data-am-modal-confirm>确定</span>
    </div>
  </div>
</div>
<!-- 启用框 -->
<div id="cconfirm3" class="am-modal am-modal-confirm" tabindex="-1">
  <div class="am-modal-dialog uconfirm">
    <div class="am-modal-hd uhead"><b>确&nbsp;&nbsp;&nbsp;&nbsp;认&nbsp;&nbsp;&nbsp;&nbsp;提&nbsp;&nbsp;&nbsp;&nbsp;醒</b></div>
    <div class="am-modal-bd">
      你确定要重新启用吗？
    </div>
    <div class="am-modal-footer">
      <span class="am-modal-btn" data-am-modal-cancel>取消</span>
      <span class="am-modal-btn" data-am-modal-confirm>确定</span>
    </div>
  </div>
</div>
<script src="../js/jquery.min.js"></script>
<script src="../js/amazeui.min.js"></script>
<script src="../js/pinying.js"></script>
<script>

<?php pageJs($this->_data['mgoods_list'],$this->_data['request'],'mgoods.php');?>

// 商品删除
$('.cdel').on('click', function() {
  $('#cconfirm').modal({
    relatedTarget: this,
    onConfirm: function(options) {
      $.post('mgoods_delete_do.php',{'mgoods_id':$(this.relatedTarget).val()},function(res){
        if(res=='0'){
          window.location.reload();
        }else if(res=='1'){
          alert("套餐中含有此商品，不能删除！");
        }else if(res=='2'){
          alert("优惠券中含有此商品，不能删除！");
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
//商品停用
$('.cmgoods_state').on('click',function(){
  $('#cconfirm2').modal({
    relatedTarget: this,
    onConfirm: function(options) {
      $.get('mgoods_state_do.php',{'mgoods_id':$(this.relatedTarget).val()},function(res){
        // console.log(res);
        if(res=='0'){
          window.location.reload();
        }else if(res=='1'){
          alert('修改失败');
        }
      });
    },
    onCancel: function() {
      return false;
    }
  });
});
//商品启用
$('.cmgoods_state2').on('click',function(){
  $('#cconfirm3').modal({
    relatedTarget: this,
    onConfirm: function(options) {
      $.get('mgoods_state_do.php',{'mgoods_id':$(this.relatedTarget).val()},function(res){
        // console.log(res);
        if(res=='0'){
          window.location.reload();
        }else if(res=='1'){
          alert('修改失败');
        }
      });
    },
    onCancel: function() {
      return false;
    }
  });
});
//添加商品submit
$('.cadd-form2').on('click',function(){
  $(this).attr('disabled',true);
  var url="mgoods_add_do.php";
  var data = $("#form2").serialize();
  $.post(url,data,function(res){
    if(res=='0'){
      window.location.href='mgoods.php';
    }else if(res=='1'){
      alert("缺少必填项");
      $('.cadd-form2').attr('disabled',false);
    }else if(res=='2'){
      alert("商品编码不能重复");
      $('.cadd-form2').attr('disabled',false);
    }else{
      alert("添加失败");
    }
  });
});
//修改商品show
$('.cupdate').on('click', function(e) {
  var mgoods_id = $(this).val();
  $.ajax({
    type: "get",
    url: "mgoods_edit_ajax.php",
    data: {mgoods_id:mgoods_id}, 
    dataType:'json',
    success: function(msg){
      $("#umgoodsm2 input[name='mgoods_name']").val(msg.mgoods_name);
      $("#umgoodsm2 input[name='mgoods_name_old']").val(msg.mgoods_name);
      $("#umgoodsm2 input[name='mgoods_jianpin']").val(msg.mgoods_jianpin);
      $("#umgoodsm2 input[name='mgoods_code']").val(msg.mgoods_code);
      $("#umgoodsm2 input[name='mgoods_code_old']").val(msg.mgoods_code);
      $("#umgoodsm2 input[name='mgoods_price']").val(msg.mgoods_price);
      if(msg.mgoods_cprice==0){
        msg.mgoods_cprice = '';
      }
      $("#umgoodsm2 input[name='mgoods_cprice']").val(msg.mgoods_cprice);
      $("#umgoodsm2 input[name='mgoods_id']").val(msg.mgoods_id);
      $("#umgoodsm2 select[name='mgoods_catalog_id']").val(msg.mgoods_catalog_id);
      $("#umgoodsm2 select[name='mgoods_catalog_id']").selected();
      $("#umgoodsm2 input[name='mgoods_type']").each(function(){
        if($(this).val() == msg.mgoods_type){
          $(this).uCheck('check');
        }else{
          $(this).uCheck('uncheck')
        }
      });
      $("#umgoodsm2 input[name='mgoods_act']").each(function(){
        if($(this).val() == msg.mgoods_act){
          $(this).uCheck('check');
        }
      });
      $("#umgoodsm2 input[name='mgoods_reserve']").each(function(){
        if($(this).val() == msg.mgoods_reserve){
          $(this).uCheck('check');
        }
      });
    }
  });
});
//关闭弹出框时删除select
$('#umgoodsm2').on('close.modal.amui', function(){
  $("#umgoodsm2 select[name='mgoods_catalog_id']").selected('destroy');
});
//修改商品submit
$('.cadd-form3').on('click',function(){
  $(this).attr('disabled',true);
  var data = $("#form3").serialize();
  var url = "mgoods_edit_do.php";
  $.post(url,data,function(msg){
    if(msg=='0'){
      window.location.reload();
    }else if(res=='1'){
      alert("缺少必填项");
      $('.cadd-form2').attr('disabled',false);
    }else if(res=='2'){
      alert("商品编码不能重复");
      $('.cadd-form2').attr('disabled',false);
    }else{
      alert("修改失败");
    }
  });
});

//根据文本框输入的汉字自动获取汉字拼音首字母到下拉列表中，支持多音字，需引入库pinying.js
function query(){
  $("#cupen").val(null);
  var str = $("#cgoodsname").val().trim();
  if(str == "") return;
  // console.log(str);
  var arrRslt = makePy(str);
  $("#cupen").val(arrRslt);
}
function query2(){
      $("#cupen2").val(null);
      var str = $("#cgoodsname2").val().trim();
      if(str == "") return;
      // console.log(str);
      var arrRslt = makePy(str);
      $("#cupen2").val(arrRslt);
}
</script>
</body>
</html>
