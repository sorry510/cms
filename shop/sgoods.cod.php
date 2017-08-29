<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>
<div id="usgoods" class="gcontent">
  <ul class="am-nav am-nav-pills ubread">
    <li class="am-active"><a href="#">单店销售商品</a></li>
    <li><a href="sgoods_catalog.php">商品分类</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="utools">
    <form class="am-form-inline uform2" if="form1">
      <div class="am-form-group">
        <label for="doc-ipt-3" class="am-form-label">商品分类：</label>
        <select class="uselect uselect-auto" data-am-selected name="sgoods_catalog_id">
          <option value="0">全部</option>
          <?php foreach($this->_data['sgoods_catalog_list'] as $row) { ?>
            <option value="<?php echo $row['sgoods_catalog_id']; ?>" <?php if($row['sgoods_catalog_id'] == $this->_data['request']['sgoods_catalog_id']){
            echo "selected" ;}?> ><?php echo $row['sgoods_catalog_name']; ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="am-form-group">
        <label for="doc-ipt-3" class="am-form-label">搜索：</label>
        <input class="am-form-field uinput uinput-220" type="text" value="<?php echo $this->_data['request']['search']; ?>" name="search" placeholder="商品名称/简拼/编码">
      </div>
      <div class="am-form-group">
        <button type="submit" class="am-btn ubtn-search">
          <i class="iconfont icon-search"></i>查询
        </button>
      </div>
    </form> 
    <button class="am-btn ubtn-sure ubtn-blue" data-am-modal="{target: '#usgoodsm1'}">
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
        <td>状态</td>
        <td style="width: 18%;">操作</td>
      </tr>
    </thead>  
    <?php foreach($this->_data['sgoods_list']['list'] as $row) { ?>
    <tr>
      <td><?php echo $row['sgoods_catalog_name']; ?></td>
      <td><?php echo $row['sgoods_name']; ?></td>
      <td><?php echo $row['sgoods_code']; ?></td>
      <td><?php echo $row['sgoods_price']; ?>元</td>
      <td><?php echo $row['sgoods_cprice']==0?'--':$row['sgoods_cprice']; ?></td>
      <td class="<?php echo $row['sgoods_type']=='2'?'gtext-green':'gtext-orange';?>"><?php echo $row['sgoods_type']=='2'?'√':'x';?></td>
      <td class="<?php echo $row['sgoods_state']=='1'?'gtext-green':'gtext-orange';?>"><?php echo $row['sgoods_state']=='1'?'正常':'停用';?></td>
      <td>
        <button class="am-btn ubtn-table ubtn-green cupdate" data-am-modal="{target: '#usgoodsm2'}" value="<?php echo $row['sgoods_id'] ?>">
          <i class="iconfont icon-bianji"></i>
          修改
        </button>
        &nbsp;
        <button class="am-btn ubtn-table ubtn-gray cdel" value="<?php echo $row['sgoods_id'] ?>">
          <i class="iconfont icon-shanchu"></i>
          删除
        </button>
        &nbsp;
        <?php if($row['sgoods_state'] == 1){
                echo '<button class="am-btn ubtn-table ubtn-orange csgoods_state" value="'.$row["sgoods_id"].'" state="'.$row['sgoods_state'].'">
                        <i class="iconfont icon-tingyong"></i>
                        停用
                      </button>';
              }else{
                echo '<button class="am-btn ubtn-table ubtn-blue csgoods_state2" value="'.$row["sgoods_id"].'" state="'.$row['sgoods_state'].'">
                        <i class="iconfont icon-question"></i>
                        启用
                      </button>';
              }
        ?>
        <input type="hidden" name="sgoods_state" value="<?php echo $row['sgoods_state']; ?>">
      </td>
    </tr>
    <?php } ?>
  </table>
  <?php pageHtml($this->_data['sgoods_list'],$this->_data['request'],'sgoods.php');?>
</div>

<!--新增商品-->
<div class="am-modal" tabindex="-1" id="usgoodsm1">
  <div class="am-modal-dialog umodal">
    <div class="am-modal-hd uhead">新增商品
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd">
      <form class="am-form am-form-horizontal" id="cform1">
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for=""><span class="gtext-orange">*</span>商品分类：</label>
          <div class="umodal-normal">
            <select class="uselect uselect-max" name="sgoods_catalog_id" data-am-selected>
            <option value="0">请选择</option>
            <?php foreach($this->_data['sgoods_catalog_list'] as $row) { ?>
              <option value="<?php echo $row['sgoods_catalog_id']; ?>"><?php echo $row['sgoods_catalog_name']; ?></option>
            <?php } ?>
            </select>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for=""><span class="gtext-orange">*</span>商品名称：</label>
          <div class="umodal-normal">
            <input type="text" id="cgoodsname" name="sgoods_name" class="am-form-field uinput uinput-max" onKeyUp="query()" required>
          </div>
          <div class="umodal-text" style="text-indent:2em;">简拼：</div>
          <div class="umodal-valid">
            <input type="text" id="cupen" name="sgoods_jianpin" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">商品编码：</label>
          <div class="umodal-normal">
            <input type="text" name="sgoods_code" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for=""><span class="gtext-orange">*</span>商品价格：</label>
          <div class="umodal-normal">
            <input type="text" name="sgoods_price" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">会员价格：</label>
          <div class="umodal-normal">
            <input type="text" name="sgoods_cprice" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">参与库存：</label>
          <div class="umodal-normal am-text-left">
            <label class="am-radio-inline">
              <input type="radio" name="sgoods_type" value="2" data-am-ucheck> 参与
            </label>
            <label class="am-radio-inline">
              <input type="radio" name="sgoods_type" value="1" data-am-ucheck checked> 不参与
            </label>
          </div>
        </div>
        <button type="reset" style="display:none;"></button>
      </form>
    </div>
    <div class="am-modal-footer ufoot">
      <div class="am-btn-group">
        <button type="button" class="am-btn ubtn-sure ubtn-green cadds-form2"><i class="iconfont icon-yuanxingxuanzhong"></i>
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
<div class="am-modal" tabindex="-1" id="usgoodsm2">
  <div class="am-modal-dialog umodal">
    <div class="am-modal-hd uhead">修改商品
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd">
      <form class="am-form am-form-horizontal" id="cform2">
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for=""><span class="gtext-orange">*</span>商品分类：</label>
          <div class="umodal-normal">
            <select class="uselect uselect-max csgoods_catalog" name="sgoods_catalog_id">
            <?php foreach($this->_data['sgoods_catalog_list'] as $row) { ?>
              <option value="0">请选择</option>
              <option value="<?php echo $row['sgoods_catalog_id']; ?>"><?php echo $row['sgoods_catalog_name']; ?></option>
            <?php } ?>
            </select>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for=""><span class="gtext-orange">*</span>商品名称：</label>
          <div class="umodal-normal">
            <input type="text" id="cgoodsname2" name="sgoods_name" class="am-form-field uinput uinput-max" onKeyUp="query2()" required>
          </div>
          <div class="umodal-text" style="text-indent:2em;">简拼：</div>
          <div class="umodal-valid">
            <input type="text" id="cupen2" name="sgoods_jianpin" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">商品编码：</label>
          <div class="umodal-normal">
            <input type="text" name="sgoods_code" class="am-form-field uinput uinput-max">
            <input type="hidden" name="sgoods_code_old" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for=""><span class="gtext-orange">*</span>商品价格：</label>
          <div class="umodal-normal">
            <input type="text" name="sgoods_price" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">会员价格：</label>
          <div class="umodal-normal">
            <input type="text" name="sgoods_cprice" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <!-- <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">参与库存：</label>
          <div class="umodal-normal am-text-left">
            <label class="am-radio-inline">
              <input type="radio" name="sgoods_type" value="2" data-am-ucheck> 参与
            </label>
            <label class="am-radio-inline">
              <input type="radio" name="sgoods_type" value="1" data-am-ucheck> 不参与
            </label>
          </div>
        </div> -->
        <input type="hidden" name="sgoods_id">
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
<?php confirmHtml(1)?>
<?php confirmHtml(2)?>
<?php confirmHtml(3)?>
<script src="../js/jquery.min.js"></script>
<script src="../js/amazeui.min.js"></script>
<script src="../js/pinying.js"></script>
<script>
<?php pageJs($this->_data['sgoods_list'],$this->_data['request'],'sgoods.php');?>
// 商品删除
$('.cdel').on('click', function() {
  $('#cconfirm1').modal({
    relatedTarget: this,
    onConfirm: function(options) {
      $.post('sgoods_delete_do.php',{'sgoods_id':$(this.relatedTarget).val()},function(res){
        console.log(res);
        if(res=='0'){
          window.location.reload();
        }else if(res=='1'){
          alert("库存中含有此商品，不能删除！");
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
$('.csgoods_state').on('click',function(){
  $('#cconfirm2').modal({
    relatedTarget: this,
    onConfirm: function(options) {
      $.get('sgoods_state_do.php',{'sgoods_id':$(this.relatedTarget).val()},function(res){
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
$('.csgoods_state2').on('click',function(){
  $('#cconfirm3').modal({
    relatedTarget: this,
    onConfirm: function(options) {
      $.get('sgoods_state_do.php',{'sgoods_id':$(this.relatedTarget).val()},function(res){
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
  var url="sgoods_add_do.php";
  var data = $("#cform1").serialize();
  $.post(url,data,function(res){
    if(res=='0'){
      window.location.href='sgoods.php';
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
//添加商品submit,并继续
$('.cadds-form2').on('click',function(){
  $(this).attr('disabled',true);
  var url="sgoods_add_do.php";
  var data = $("#cform1").serialize();
  $.post(url,data,function(res){
    if(res=='0'){
      $("#usgoodsm1 select[name='sgoods_catalog_id']").selected('destroy');
      $("#usgoodsm1 button[type='reset']").trigger("click");
      $("#usgoodsm1 select[name='sgoods_catalog_id']").val('0');
      $("#usgoodsm1 select[name='sgoods_catalog_id']").selected();
      $('.cadds-form2').attr('disabled',false);
    }else if(res=='1'){
      alert("缺少必填项");
      $('.cadds-form2').attr('disabled',false);
    }else if(res=='2'){
      alert("商品编码不能重复");
      $('.cadds-form2').attr('disabled',false);
    }else{
      alert("添加失败");
    }
  });
});

//修改商品show
$('.cupdate').on('click', function(e) {
  var sgoods_id = $(this).val();
  $.ajax({
    type: "GET",
    url: "sgoods_edit_ajax.php",
    data: {sgoods_id:sgoods_id}, 
    dataType:'json',
    success: function(msg){
    // console.log(msg);
      $("#usgoodsm2 input[name='sgoods_name']").val(msg.sgoods_name);
      $("#usgoodsm2 input[name='sgoods_jianpin']").val(msg.sgoods_jianpin);
      $("#usgoodsm2 input[name='sgoods_code']").val(msg.sgoods_code);
      $("#usgoodsm2 input[name='sgoods_code_old']").val(msg.sgoods_code);
      $("#usgoodsm2 input[name='sgoods_price']").val(msg.sgoods_price);
      $("#usgoodsm2 input[name='sgoods_cprice']").val(msg.sgoods_cprice);
      $("#usgoodsm2 input[name='sgoods_id']").val(msg.sgoods_id);
     /* $("#usgoodsm2 input[name='sgoods_type']").each(function(){
        if($(this).val() == msg.sgoods_type){
          $(this).uCheck('check');
        }
      });*/
      $('#usgoodsm2 .csgoods_catalog').val(msg.sgoods_catalog_id);
      $('#usgoodsm2 .csgoods_catalog').selected();
    }
  });
});

$('#usgoodsm2').on('close.modal.amui', function(){
  $('#usgoodsm2 .csgoods_catalog').selected('destroy');
});

//修改商品submit
$('.cadd-form3').on('click',function(){
  var data = $("#cform2").serialize();
  var url = "sgoods_edit_do.php";
  //console.log(data);
  $.post(url,data,function(res){
    if(res=='0'){
      window.location.reload();
    }else if(res=='1'){
      alert("缺少必填项");
      $('.cadd-form3').attr('disabled',false);
    }else if(res=='2'){
      alert("商品编码不能重复");
      $('.cadd-form3').attr('disabled',false);
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
