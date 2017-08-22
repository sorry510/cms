<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>
<!-- content -->
<div class="gcontent" id="ucard">
  <ul class="am-nav am-nav-pills ubread">
    <li><a href="card.php">会员管理</a></li>
    <li class="am-active"><a href="#">过期会员</a></li>
    <li><a href="card3.php">回收站</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="utools">
    <form class="am-form-inline uform2" method="get">
      <div class="am-form-group">
        <label for="doc-ipt-3" class="am-form-label">卡类型：</label>
        <select class="uselect uselect-auto" data-am-selected name="card_type">
        <option value="all" <?php if($this->_data['request']['card_type']=='all') echo "selected";?>>全部</option>
        <option value="0" <?php if($this->_data['request']['card_type']=='0') echo "selected";?>>未设置</option>
        <?php foreach($this->_data['card_type_list'] as $row) { ?>
           <option value="<?php echo $row['card_type_id'];?>" <?php if($row['card_type_id']==$this->_data['request']['card_type']) echo "selected";?>><?php echo $row['card_type_name'];?></option>
        <?php }?>
        </select>
      </div>
      <div class="am-form-group">
        <label for="doc-ipt-3" class="am-form-label">搜索：</label>
        <input type="text" class="am-form-field uinput uinput-160" placeholder="卡号/手机号/姓名" name="search" value="<?php echo $this->_data['request']['search'];?>">
      </div>
      <div class="am-form-group">
        <button type="submit" class="am-btn ubtn-search csearch">
          <i class="iconfont icon-search"></i>查询
        </button>
      </div>
    </form>
  </div>
  <div class="gspace15"></div>
  <?php foreach($this->_data['cards_list']['list'] as $row) { ?>
  <table class="am-table am-table-bordered am-table-hover am-table-compact utable1">
    <thead>
      <tr>
        <td>卡号</td>
        <td>姓名</td>
        <td>手机</td>
        <td>性别</td>
        <td>生日</td>
        <td>开卡时间</td>
        <td>卡类型</td>
        <td>折扣</td>
        <td>到期时间</td>
        <td>卡状态</td>
        <td>开卡店铺</td>
        <td>电子档案</td>
        <td>消费明细</td>
        <td>操作</td>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="coffopen" cardid="<?php echo $row['card_id']; ?>"><a href="javascript:;"><?php echo $row['card_code']; ?></a></td>
        <td class="coffopen" cardid="<?php echo $row['card_id']; ?>"><a href="javascript:;"><?php echo $row['card_name']; ?></a></td>
        <td><?php echo $row['card_phone']; ?></td>
        <td><?php echo $row['card_sex'] == '3' ? '保密' : ($row['card_sex'] == '1' ? '男':'女'); ?></td>
        <td><?php echo date("Y-m-d",$row['card_birthday_date']); ?></td>
        <td><?php echo date("Y-m-d",$row['card_atime']); ?></td>
        <td><?php echo $row['c_card_type_name']; ?></td>
        <td><span class="gtext-orange"><?php echo $row['c_card_type_discount'] == '0' ? 10 : $row['c_card_type_discount']; ?></span>折</td>
        <td><?php echo date("Y-m-d",$row['card_edate']); ?></td>
        <td><?php echo $row['card_state']=='1'?'正常':'停用';; ?></td>
        <td>解放路分店</td>
        <td><a href="e-record.php">电子档案</a></td>
        <td><a href="#">消费明细</a></td>
        <td>
          <button class="am-btn ubtn-table ubtn-orange cmodalopen1" value="<?php echo $row['card_id']; ?>">
            <i class="iconfont icon-bianji"></i>
            修改
          </button>
        </td>
      </tr>
      <tr>
        <td colspan="15" class="utable-text">余额：<span class="gtext-orange">￥<?php echo $row['s_card_ymoney']; ?></span>，剩余积分：<span class="gtext-orange"><?php echo $row['s_card_yscore']; ?></span>，套餐余：【中医问诊(<span class="gtext-orange">5</span>次)，经络疏通-专家(<span class="gtext-orange">6</span>次)，艾灸(<span class="gtext-orange">6</span>次) ，到期时间：2017-12-15】</td>
      </tr>
      <tr>
        <td colspan="15" class="utable-text">累计消费：<span class="gtext-orange">￥<?php echo $row['s_card_smoney']; ?></span>元，累计积分：<span class="gtext-orange"><?php echo $row['s_card_sscore']; ?></span>分</td>
      </tr>
    </tbody>
  </table>
  <div class="gspace15"></div>
  <?php }?>
  <?php pageHtml($this->_data['cards_list'],$this->_data['request'],'card2.php');?>
</div>
<!-- 修改会员 -->
<div id="ucardm1-1" class="am-modal" tabindex="-1">
  <div class="am-modal-dialog umodal">
    <div class="am-modal-hd uhead">修改会员
      <a href="javascript:void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd">
      <form class="am-form" id="ccardinfoedit" enctype="multipart/form-data">
        <div class="utextbox">
          <span class="utextbox-title">会员基本信息</span>
            <div class="am-form-group">
              <label class="am-form-label umodal-label"><span class="gtext-orange">*</span>会员姓名：</label>
              <div class="umodal-normal">
                <input type="text" class="am-form-field uinput uinput-max" name="card_name" value="">
              </div>
              <div class="umodal-search">&nbsp;</div>
              <label class="am-form-label umodal-label"><span class="gtext-orange">*</span>性别：</label>
              <div class="umodal-normal am-text-left">
                <label class="am-radio-inline">
                  <input type="radio" name="card_sex" value="1" data-am-ucheck> 男
                </label>
                <label class="am-radio-inline">
                  <input type="radio" name="card_sex" value="2" data-am-ucheck> 女
                </label>
                <label class="am-radio-inline">
                  <input type="radio" name="card_sex" value="3" data-am-ucheck> 保密
                </label> 
              </div>
              <label class="am-form-label umodal-label"><span class="gtext-orange">*</span>手机号码：</label>
              <div class="umodal-normal">
                <input type="text" class="am-form-field uinput uinput-max" name="card_phone">
              </div>
              <div class="umodal-search">&nbsp;</div>
              <label class="am-form-label umodal-label">出生日期：</label>
              <div class="umodal-normal">
                <div class="am-input-group am-datepicker-date udatepicker udatepicker-max" data-am-datepicker="{format:'yyyy-mm-dd'}">
                  <input type="text" class="am-form-field" name="card_birthday_date">
                  <span class="am-input-group-btn am-datepicker-add-on">
                    <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span></button>
                  </span>
                </div>
              </div>
              <label class="am-form-label umodal-label">启用密码：</label>
              <div class="umodal-normal am-text-left">
                <label class="am-radio-inline">
                  <input class="cispwd" type="radio" name="pwd_state" value="1" data-am-ucheck> 是
                </label>
                <label class="am-radio-inline">
                  <input class="cispwd" type="radio" name="pwd_state" value="2" data-am-ucheck> 否
                </label>
              </div>
              <div class="umodal-search">&nbsp;</div>
              <label class="am-form-label umodal-label">输入密码：</label>
              <div class="umodal-normal">
                <input type="password" name="card_password" class="am-form-field uinput uinput-max callow" disabled>
              </div>
            </div>
            <div class="am-form-file uphoto">
              <img id="cimg2" src="../img/wu.jpg">
              <a class="am-btn am-btn-gray am-btn-sm">
                <i class="am-icon-cloud-upload"></i> 点击上传</a>
              <input name="card_photo" id="doc-form-file2" class="cphoto" type="file" multiple>
            </div>
            <div style="clear:both;"></div>
        </div>
        <div class="utextbox">
          <span class="utextbox-title">会员卡信息</span>
            <div class="am-form-group">
              <label class="am-form-label umodal-label">会员卡号：</label>
              <div class="umodal-normal">
                <input type="text" name="card_code" class="am-form-field uinput uinput-max">
              </div>
              <div class="umodal-search">&nbsp;</div>
              <label class="am-form-label umodal-label">ID号：</label>
              <div class="umodal-normal">
                <input type="text" name="card_ikey" class="am-form-field uinput uinput-max">
              </div>
              <label class="am-form-label umodal-label">到期时间：</label>
              <div class="umodal-normal">
                <div class="am-input-group am-datepicker-date udatepicker udatepicker-max" data-am-datepicker="{format:'yyyy-mm-dd'}">
                  <input id="date1" type="text" name="card_edate" class="am-form-field">
                  <span class="am-input-group-btn am-datepicker-add-on">
                    <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span></button>
                  </span>
                </div>
              </div>
            </div>
            <div style="clear:both;"></div>
        </div>
        <div class="utextbox">
          <span class="utextbox-title">更多会员信息</span>
            <div class="am-form-group">
              <label class="am-form-label umodal-label">身份证号：</label>
              <div class="umodal-normal">
                <input type="text" name="card_identity" class="am-form-field uinput uinput-max">
              </div>
              <div class="umodal-search">&nbsp;</div>
              <label class="am-form-label umodal-label">车牌：</label>
              <div class="umodal-normal">
                <input type="text" name="card_carcode" class="am-form-field uinput uinput-max">
              </div>
              <label class="am-form-label umodal-label">备注：</label>
              <div class="umodal-max">
               <input type="text" name="card_memo" class="am-form-field uinput uinput-max">
              </div>
              <div style="clear:both;"></div>
            </div>
            <div style="clear:both;"></div>
        </div>
        <input type="hidden" name="card_id" value="">
      </form>
    </div>
    <div class="am-modal-footer ufoot">
      <div class="am-btn-group">
        <button type="button" class="am-btn ubtn-sure ubtn-green ccardeditsubmit"><i class="iconfont icon-xiangyou2"></i>
          完成
        </button>
      </div>
    </div>
  </div>
</div>
<!-- 侧拉框 -->
<div id="ucardoff1" class="am-offcanvas">
  <div class="am-offcanvas-bar am-offcanvas-bar-flip uoffcanvas">
    <div class="am-offcanvas-content" >
      <div class="am-modal-hd"><span class="utitle">会员明细</span>
        <a href="javascript: void(0)" class="am-close am-close-spin uclose2 coffcanvas1" data-rel="close"><img src="../img/close.jpg"></a>
      </div>
      <div class="gspace15"></div>
      <div class="am-g">
        <div class="am-u-lg-6">会员姓名：<span class="ccard_name"></span></div>
        <div class="am-u-lg-6">手机号码：<span class="ccard_phone"></span></div>
        <div class="am-u-lg-6">会员卡号：<span class="ccard_code"></span></div>
        <div class="am-u-lg-6">性别：<span class="ccard_sex"></span></div>
        <div class="am-u-lg-6">出生日期：<span class="ccard_birthday"></span></div>
        <div class="am-u-lg-6">到期时间：<span class="ccard_edate"></span></div>
        <div class="am-u-lg-6">联系地址：<span class="ccard_address"></span></div>
        <div class="am-u-lg-6">余额：<font class="gtext-orange ccard_ymoney"></font><span>元</span></div>
        <div class="am-u-lg-12">备注：<span class="ccard_memo"></span></div>
        <div class="am-u-lg-12"></div>
        <div>
          <button class="am-btn ubtn-sure ubtn-gray ubutton1 ccarddel">
            <i class="iconfont icon-shanchu"></i>
            删除
          </button>
          <button class="am-btn ubtn-sure ubtn-red ubutton2">
          </button>
        </div>
        <input type="hidden" name="card_id" value="">
      </div>
    </div>
  </div>
</div>
<!-- 警告框 -->
<div class="am-modal am-modal-alert" tabindex="-1" id="ualert">
  <div class="am-modal-dialog">
    <div class="am-modal-hd">警 告</div>
    <div class="am-modal-bd ctext">
      如有问题，请联系管理员！
    </div>
    <div class="am-modal-footer">
      <span class="am-modal-btn">确定</span>
    </div>
  </div>
</div>
<!-- 删除框 -->
<div id="cconfirm" class="am-modal am-modal-confirm" tabindex="-1">
  <div class="am-modal-dialog uconfirm">
    <div class="am-modal-hd uhead"><b>删&nbsp;&nbsp;&nbsp;&nbsp;除&nbsp;&nbsp;&nbsp;&nbsp;提&nbsp;&nbsp;&nbsp;&nbsp;醒</b></div>
    <div class="am-modal-bd">
      你确定要删除这个会员吗？
    </div>
    <div class="am-modal-footer">
      <span class="am-modal-btn" data-am-modal-cancel>取消</span>
      <span class="am-modal-btn" data-am-modal-confirm>确定</span>
    </div>
  </div>
</div>
<script src="../js/jquery.min.js"></script>
<script src="../js/ajaxfileupload.js"></script>
<script src="../js/amazeui.js"></script>
<script type="text/javascript">
<?php pageJs($this->_data['cards_list'],$this->_data['request'],'card.php');?>
$(function() {
    /******************************************modal************************************/
    //会员修改
    $('.cmodalopen1').on('click', function(e) {
      var url = "card_edit_ajax.php";
      // console.log($(this).val());
      $.getJSON(url,{card_id:$(this).val()},function(res){
        console.log(res);
        $("#ucardm1-1 input[name='card_name']").val(res.card_name);
        $("#ucardm1-1 input[name='card_code']").val(res.card_code);
        $("#ucardm1-1 input[name='card_phone']").val(res.card_phone);
        $("#ucardm1-1 input[name='card_carcode']").val(res.card_carcode);
        $("#ucardm1-1 input[name='card_ikey']").val(res.card_ikey);
        if(res.card_birthday_date=='1970-01-01'){
          $("#ucardm1-1 input[name='card_birthday_date']").val();
        }else{
          $("#ucardm1-1 input[name='card_birthday_date']").val(res.card_birthday_date);
        }
        $("#ucardm1-1 input[name='card_password']").val(res.card_password);
        if(res.card_edate=='1970-01-01'){
          $("#ucardm1-1 input[name='card_edate']").val('');
        }else{
          $("#ucardm1-1 input[name='card_edate']").val(res.card_edate);
        }
        $("#ucardm1-1 input[name='card_identity']").val(res.card_identity);
        $("#ucardm1-1 input[name='card_memo']").val(res.card_memo);
        $("#ucardm1-1 input[name='card_id']").val(res.card_id);
        $("#ucardm1-1 input[name='pwd_state']").each(function(){
          if($(this).val()==res.card_password_state){
            $(this).uCheck('check');
          }
        });
        if(res.card_password_state==1){
          $('.callow').attr('disabled',false);
        }else{
          $('.callow').attr('disabled',true);
        }
        $("#ucardm1-1 input[name='card_sex']").each(function(){
          if($(this).val()==res.card_sex){
            $(this).uCheck('check');
          }
        });
        if(res.card_photo_file.length!=0){
          $("#ucardm1-1 #cimg2").attr('src','http://<?php echo $GLOBALS["gconfig"]["path"]["photo_show"];?>/'+res.card_photo_file);
        }
      });
      $('#ucardm1-1').modal('open');
      $('#ucardm1-1 input').eq(0).focus();
    });
    //card修改提交信息
    $('.ccardeditsubmit').on('click',function(){
      // $(this).attr('disabled',true);
      var count=0;
      var url="card_edit_do.php";
      var data = $("#ccardinfoedit").serialize();
      var card_id = $("#ucardm1-1 input[name='card_id']").val();
      $.ajax({
        url:url,
        data:data,
        type:"POST",
      }).then(function(res){
        console.log(res);
        if(res=='0'){
          $.ajaxFileUpload ({
            url:'upload_do.php', //你处理上传文件的服务端
            secureuri:false, //与页面处理代码中file相对应的ID值
            fileElementId:'doc-form-file2',
            data:{card_id:card_id},
            dataType: 'text', //返回数据类型:text，xml，json，html,scritp,jsonp五种
            success: function (data) {
            count++;
              // console.log(data);
              // $('.ccardaddsubmit').attr('disabled',false);
              /*if(data == '0'){
                window.location.href='card.php';
              }else{
                $('#ualert .ctext').html("<span class='gtext-orange am-text-large'>上传图片失败</span>");
                $('#ualert').modal('open');
                $('.ccardrechargesubmit').attr('disabled',false);
                return false;
              }*/
            }
          });
          setInterval(function(){
            if(count===1)
              window.location.href='card2.php';
          }, 200);
        }else{
          $('#ualert .ctext').html("<span class='gtext-orange am-text-large'>修改会员失败</span>");
          $('#ualert').modal('open');
          $('.ccardrechargesubmit').attr('disabled',false);
          return false;
        }
      });
    });
    //侧拉打开
    $('.coffopen').on('click', function() {
      var url = "card_edit_ajax.php";
      $.getJSON(url,{card_id:$(this).attr('cardid')},function(res){
        // console.log(res);
        $("#ucardoff1 .ccard_name").text(res.card_name);
        $("#ucardoff1 .ccard_code").text(res.card_code);
        $("#ucardoff1 .ccard_phone").text(res.card_phone);
        $("#ucardoff1 .ccard_birthday").text(res.card_birthday);
        $("#ucardoff1 .ccard_edate").text(res.card_edate);
        $("#ucardoff1 .ccard_memo").text(res.card_memo);
        $("#ucardoff1 input[name='card_id']").val(res.card_id);
        switch(res.card_sex)
        {
          case '1':
            $("#ucardoff1 .ccard_sex").text('男');
            break;
          case '2':
            $("#ucardoff1 .ccard_sex").text('女');
            break;
          default :
            $("#ucardoff1 .ccard_sex").text('保密');
        }
        if(res.card_state=='1'){
          $("#ucardoff1 .ubutton2").removeClass('ccardnormal').addClass('ccardstop').html('<i class="iconfont icon-tingyong"></i> 停用');
        }else{
          $("#ucardoff1 .ubutton2").removeClass('ccardstop').addClass('ccardnormal').html('<i class="iconfont icon-question"></i> 启用');
        }
      });
      $('#ucardoff1').offCanvas('open');
    });
    //侧拉停用card
    $(document).on("click",".ccardstop",function(){
      var url = 'card_state_do.php';
      var data ={
          type:'stop',
          card_id:$("#ucardoff1 input[name='card_id']").val()
      }
      $.post(url,data,function(res){
        if(res=='0'){
          window.location.reload();
        }else{
          $('#ualert .ctext').html("<span class='gtext-orange am-text-large'>停用失败，请重新尝试停用</span>");
          $('#ualert').modal('open');
          return false;
          // console.log(res);
        }
      });
    });
    //侧拉重新启用card
    $(document).on("click",".ccardnormal",function(){
      var url = 'card_state_do.php';
      var data ={
          type:'normal',
          card_id:$("#ucardoff1 input[name='card_id']").val()
      }
      // console.log(data);
      $.post(url,data,function(res){
        if(res=='0'){
          window.location.reload();
          //console.log(res);
        }else{
          $('#ualert .ctext').html("<span class='gtext-orange am-text-large'>启用失败，请重新操作</span>");
          $('#ualert').modal('open');
          return false;
          // console.log(res);
        }
      });
    });
    //侧拉删除card
    $('.ccarddel').on('click', function() {
      $('#cconfirm').modal({
        onConfirm: function(options) {
          var url = 'card_state_do.php';
          var data ={
              type:'del',
              card_id:$("#ucardoff1 input[name='card_id']").val()
          }
          $.post(url,data,function(res){
            if(res=='0'){
              window.location.reload();
            }else{
              $('#ualert .ctext').html("<span class='gtext-orange am-text-large'>删除失败，不能删除</span>");
              $('#ualert').modal('open');
              return false;
              // console.log(res);
            }
          });
        },
        onCancel: function() {
          return false;
        }
      });
    });
    //侧拉关闭
    $('.coffcanvas1').on('click', function() {
      $('#ucardoff1').offCanvas('close');
    });
    //侧拉去掉禁止选中
    $('.goffcanvas').parent().on('open.offcanvas.amui', function() {
      $(this).css('user-select','');
    });
});
</script>
</body>
</html>