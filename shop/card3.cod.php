<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>
<!-- content -->
<div class="gcontent" id="ucard">
  <ul class="am-nav am-nav-pills ubread">
    <li><a href="card.php">会员管理</a></li>
    <li><a href="card2.php">过期会员</a></li>
    <li class="am-active"><a href="#">回收站</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="utools">
    <form class="am-form-inline uform2" method="get">
      <div class="am-form-group">
        <label for="doc-ipt-3" class="am-form-label">卡类型：</label>
        <select class="uselect uselect-auto" data-am-selected name="card_type">
        <option value="0">全部</option>
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
        <td><?php echo date("Y-m-d",$row['card_birthday']); ?></td>
        <td><?php echo date("Y-m-d",$row['card_atime']); ?></td>
        <td><?php echo $row['c_card_type_name']; ?></td>
        <td><span class="gtext-orange"><?php echo $row['c_card_type_discount']; ?></span>折</td>
        <td><?php echo date("Y-m-d",$row['card_edate']); ?></td>
        <td><?php echo $row['card_state']=='1'?'正常':'停用';; ?></td>
        <td>解放路分店</td>
        <td><a href="e-record.php">电子档案</a></td>
        <td><a href="#">消费明细</a></td>
        <td>
          <button class="am-btn ubtn-table ubtn-orange crestore" value="<?php echo $row['card_id']; ?>">
            <i class="iconfont icon-question"></i>
            还原
          </button>
        </td>
      </tr>
      <tr>
        <td colspan="15" class="utable-text">余额：<span class="gtext-orange">￥<?php echo $row['s_card_ymoney']; ?></span>，剩余积分：<span class="gtext-orange"><?php echo $row['s_card_score']; ?></span>，套餐余：【中医问诊(<span class="gtext-orange">5</span>次)，经络疏通-专家(<span class="gtext-orange">6</span>次)，艾灸(<span class="gtext-orange">6</span>次) ，到期时间：2017-12-15】</td>
      </tr>
      <tr>
        <td colspan="15" class="utable-text">累计消费：<span class="gtext-orange">10331</span>元，累计赠送：<span class="gtext-orange">568.8</span>元，累计积分：<span class="gtext-orange">89634</span>元</td>
      </tr>
    </tbody>
  </table>
  <div class="gspace15"></div>
  <?php }?>
  <ul class="am-pagination am-pagination-centered upages">
    <li class="upage-info">共<?php echo $this->_data['cards_list']['pagecount']; ?>页 <?php echo $this->_data['cards_list']['allcount']; ?>条记录</li>
    <li class="am-disabled"><a href="card.php?<?php echo api_value_query($this->_data['request'], $this->_data['cards_list']['pagepre']); ?>">&laquo;</a></li>
    <li class="am-active"><a href="#"><?php echo $GLOBALS['intpage'];?></a></li>
    <li><a href="card.php?<?php echo api_value_query($this->_data['request'], $this->_data['cards_list']['pagenext']); ?>">&raquo;</a></li>
  </ul>
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
<script src="../js/amazeui.js"></script>
<script type="text/javascript">
$(function() {
    //分页首末页不可选中
    if(<?php echo $GLOBALS['intpage'];?>>1){
      $('.upages li').eq(1).removeClass('am-disabled');
    }
    if(<?php echo $this->_data['cards_list']['pagecount']-$GLOBALS['intpage']; ?><1){
      $('.upages li').last().addClass('am-disabled');
    }
    /******************************************modal************************************/
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
          var url = 'card_delete_do.php';
          var data ={
              card_id:$("#ucardoff1 input[name='card_id']").val()
          }
          $.post(url,data,function(res){
            if(res=='0'){
              window.location.reload();
            }else if(res='1'){
              $('#ualert .ctext').html("<span class='gtext-orange am-text-large'>此用户不存在</span>");
              $('#ualert').modal('open');
              return false;
              // console.log(res);
            }else{
              $('#ualert .ctext').html("<span class='gtext-orange am-text-large'>删除失败</span>");
              $('#ualert').modal('open');
              return false;
            }
          });
        },
        onCancel: function() {
          return false;
        }
      });
    });
    //还原
    $(".crestore").on("click",function(){
      var url = 'card_state_do.php';
      var data ={
          type:'restore',
          card_id:$(this).val()
      }
      $.post(url,data,function(res){
        if(res=='0'){
          window.location.reload();
        }else{
          $('#ualert .ctext').html("<span class='gtext-orange am-text-large'>还原失败，请重新尝试还原</span>");
          $('#ualert').modal('open');
          return false;
          // console.log(res);
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