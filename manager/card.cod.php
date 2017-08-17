<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>
<!-- content -->
<div class="gcontent" id="ucard">
  <ul class="am-nav am-nav-pills ubread">
	  <li class="am-active"><a href="javascript:void">会员管理</a></li>
	  <li><a href="card2.php">过期会员</a></li>
	  <li><a href="card3.php">回收站</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="utools">
    <form class="am-form-inline uform2" method="get">
      <div class="am-form-group">
        <label for="doc-ipt-3" class="am-form-label">分店：</label>
        <select class="uselect uselect-auto" data-am-selected name="shop_id">
        <option value="0" <?php if($this->_data['request']['shop_id']=='0') echo "selected";?>>全部</option>
        <?php foreach($this->_data['shop_list'] as $row) { ?>
           <option value="<?php echo $row['shop_id'];?>" <?php if($row['shop_id']==$this->_data['request']['shop_id']) echo "selected";?>><?php echo $row['shop_name'];?></option>
        <?php }?>
        </select>
      </div>
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
        <td width="8%">生日</td>
        <td width="8%">开卡时间</td>
    	  <td>卡类型</td>
    	  <td>折扣</td>
        <td>到期时间</td>
        <td>卡状态</td>
        <td width="10%">开卡店铺</td>
        <td>电子档案</td>
        <td>消费明细</td>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="coffopen" cardid="<?php echo $row['card_id']; ?>"><a href="javascript:;"><?php echo $row['card_code']; ?></a></td>
        <td class="coffopen" cardid="<?php echo $row['card_id']; ?>"><a href="javascript:;"><?php echo $row['card_name']; ?></a></td>
        <td><?php echo $row['card_phone']; ?></td>
        <td><?php echo $row['card_sex'] == '3' ? '保密' : ($row['card_sex'] == '1' ? '男':'女'); ?></td>
        <td><?php echo $row['card_birthday_date'] == 0 ? '-' : date("Y-m-d",$row['card_birthday_date']); ?></td>
        <td><?php echo date("Y-m-d",$row['card_atime']); ?></td>
        <td><?php echo $row['c_card_type_name']; ?></td>
        <td><span class="gtext-orange"><?php echo $row['c_card_type_discount'] == '0' ? 10 : $row['c_card_type_discount']; ?></span>折</td>
        <td><?php echo $row['card_edate'] == 0 ? '-' : date("Y-m-d",$row['card_edate']); ?></td>
        <td><?php echo $row['card_state']=='1'?'正常':'停用';; ?></td>
        <td>解放路分店</td>
        <td><a href="e-record.php">电子档案</a></td>
        <td><a href="record_all.php?card_code=<?php echo $row['card_code']?>">消费明细</a></td>
      </tr>
      <tr>
        <td colspan="13" class="utable-text">余额：<span class="gtext-orange">￥<?php echo $row['s_card_ymoney']; ?></span>，剩余积分：<span class="gtext-orange"><?php echo $row['s_card_yscore']; ?></span>，套餐余：【
          <?php foreach($row['mcombo'] as $row2){
          echo $row2['mgoods_name'];
          echo '(<span class="gtext-orange">'.$row2['card_mcombo_gcount'].'</span>),';
          echo '到期时间：';
          echo date('Y-m-d',$row2['card_mcombo_cedate']);
          echo ';';
          }?>】</td>
      </tr>
      <tr>
        <td colspan="13" class="utable-text">累计消费：<span class="gtext-orange">￥<?php echo $row['s_card_smoney']; ?></span>元，累计积分：<span class="gtext-orange"><?php echo $row['s_card_sscore']; ?></span>分</td>
      </tr>
    </tbody>
  </table>
  <div class="gspace15"></div>
  <?php }?>
  <?php pageHtml($this->_data['cards_list'],$this->_data['request'],'card.php');?>
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
        <div class="am-u-lg-6">出生日期：<span class="ccard_birthday_date"></span></div>
        <div class="am-u-lg-6">到期时间：<span class="ccard_edate"></span></div>
        <div class="am-u-lg-6">余额：<font class="gtext-orange ccard_ymoney"></font><span>元</span></div>
        <div class="am-u-lg-6">备注：<span class="ccard_memo"></span></div>
        <input type="hidden" name="card_id" value="">
      </div>
    </div>
  </div>
</div>
<script src="../js/jquery.min.js"></script>
<script src="../js/amazeui.js"></script>
<script type="text/javascript">
<?php pageJs($this->_data['cards_list'],$this->_data['request'],'card.php');?>
$(function() {
    //侧拉打开
    $('.coffopen').on('click', function() {
      var url = "card_edit_ajax.php";
      $.getJSON(url,{card_id:$(this).attr('cardid')},function(res){
        // console.log(res);
        $("#ucardoff1 .ccard_name").text(res.card_name);
        $("#ucardoff1 .ccard_code").text(res.card_code);
        $("#ucardoff1 .ccard_phone").text(res.card_phone);
        $("#ucardoff1 .ccard_birthday_date").text(res.card_birthday_date);
        $("#ucardoff1 .ccard_edate").text(res.card_edate);
        $("#ucardoff1 .ccard_memo").text(res.card_memo);
        $("#ucardoff1 .ccard_ymoney").text(res.s_card_ymoney);
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
      });
      $('#ucardoff1').offCanvas('open');
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