<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>
<!-- content -->
<div id="urecord" class="gcontent">
  <ul class="am-nav am-nav-pills ubread">
    <li><a href="record.php">今日明细</a></li>
    <li class="am-active"><a href="#">所有明细</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="utools">
    <form class="am-form-inline uform1">
  	  <div class="am-form-group">
        <label class="am-form-label">会员卡号：</label> 
        <input class="am-form-field uinput uinput-160" type="text" name="card_code" value="<?php echo $this->_data['request']['card_code'];?>">
      </div>
      <div class="am-form-group">
        <label class="am-form-label">消费店铺：</label> 
        <select class="uselect uselect-auto" data-am-selected name="shop_id">
         <option value="0">全部</option>
         <?php foreach($this->_data['shop_list'] as $row) { ?>
            <option value="<?php echo $row['shop_id'];?>" <?php if($row['shop_id']==$this->_data['request']['shop_id']) echo "selected";?> ><?php echo $row['shop_name'];?></option>
         <?php }?>
        </select>
      </div>
      <div class="am-form-group">
        <label class="am-form-label">卡类型：</label> 
        <select class="uselect uselect-auto" data-am-selected name="card_type_id">
          <option value="0">全部</option>
          <?php foreach($this->_data['card_type_list'] as $row) { ?>
             <option value="<?php echo $row['card_type_id'];?>" <?php if($row['card_type_id']==$this->_data['request']['card_type_id']) echo "selected";?>><?php echo $row['card_type_name'];?></option>
          <?php }?>
        </select>
      </div>
      <div class="am-form-group">
        <label class="am-form-label">时间：</label> 
        <div class="am-input-group am-datepicker-date udatepicker" data-am-datepicker="{format: 'yyyy-mm-dd'}">
          <input type="text" class="am-form-field" name="stime" value="<?php echo $this->_data['request']['stime'];?>">
          <span class="am-input-group-btn am-datepicker-add-on">
            <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span> </button>
          </span>
        </div>
      </div>
      <div class="am-form-group">
        <label class="am-form-label">至：</label> 
        <div class="am-input-group am-datepicker-date udatepicker" data-am-datepicker="{format: 'yyyy-mm-dd'}">
          <input type="text" class="am-form-field" name="etime" value="<?php echo $this->_data['request']['etime'];?>">
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
  </div> 
  <div class="gspace15"></div>   
   <table class="am-table am-table-bordered am-table-hover utable1 am-table-compact">
    <thead>
      <tr>
        <td>消费时间</td>
        <td>消费单号</td>
        <td>卡号</td>
        <td>姓名</td>
        <td>性别</td>
        <td>手机号码</td>
        <td>卡类型</td>
        <td>消费类型</td>
        <td>会员卡扣</td>
        <td>现金</td>
        <td>刷卡</td>
        <td>团购</td>
        <td>微信</td>
        <td>支付宝</td>
        <td>消费店铺</td>
        <td>状态</td>
        <td width="12%;">操作</td>
      </tr>
    </thead>
    <?php foreach($this->_data['card_records_list']['list'] as $row){ ?>
    <tr>
      <td><?php echo date("Y-m-d H:i:s",$row['card_record_atime']);?></td>
      <td><a href="javascript:;"  class="coffopen" card_record_id="<?php echo $row['card_record_id'];?>"><?php echo $row['card_record_code'];?></a></td>
      <td><?php echo $row['c_card_code'];?></td>
      <td><?php echo $row['c_card_name'];?></td>
      <td><?php echo $row['c_card_sex'] == '3' ? '保密' : ($row['c_card_sex'] == '1' ? '男':'女'); ?></td>
      <td><?php echo $row['c_card_phone'];?></td>
      <td><?php echo $row['c_card_type_name'];?></td>
      <td><?php echo $row['card_record_type'] == '3' ? '消费' : ($row['card_record_type'] == '1' ? '充值':'买套餐'); ?></td>
      <td class="gtext-orange"><?php if($row['card_record_pay']=='5') echo $row['card_record_smoney']; else echo '0.00';?></td>
      <td class="gtext-orange"><?php echo $row['card_record_xianjin'];?></td>
      <td class="gtext-orange"><?php echo $row['card_record_yinhang'];?></td>
      <td class="gtext-orange">0.00</td>
      <td class="gtext-orange"><?php echo $row['card_record_weixin'];?></td>
      <td class="gtext-orange"><?php echo $row['card_record_zhifubao'];?></td>
      <td><?php echo $row['shop_name'];?></td>
      <td><?php echo $row['card_record_state'] == '1' ? '正常' : ($row['c_card_sex'] == '2' ? '挂单':($row['c_card_sex'] == '3' ? '退款' : '免单')); ?></td>
      <td>
        <button class="am-btn ubtn-table ubtn-orange">
          <i class="iconfont icon-dayin"></i>
          打印小票
        </button>
      </td>
    </tr>
    <?php } ?>
  </table>
  <ul class="am-pagination am-pagination-centered upages">
    <li class="upage-info">共<?php echo $this->_data['card_records_list']['pagecount']; ?>页 <?php echo $this->_data['card_records_list']['allcount']; ?>条记录</li>
    <li class="am-disabled"><a href="record_all.php?<?php echo api_value_query($this->_data['request'], $this->_data['card_records_list']['pagepre']); ?>">&laquo;</a></li>
    <li class="am-active"><a href="#"><?php echo $GLOBALS['intpage'];?></a></li>
    <li><a href="record_all.php?<?php echo api_value_query($this->_data['request'], $this->_data['card_records_list']['pagenext']); ?>">&raquo;</a></li>
  </ul>
</div>
<!-- 侧拉框 -->
<div id="uoffcanvas" class="am-offcanvas">
  <div class="am-offcanvas-bar am-offcanvas-bar-flip uoffcanvas">
    <div class="am-offcanvas-content" >
      <div class="am-modal-hd"><span class="utitle">消费单号:<span class="ccard_record_code"></span></span>
        <a href="javascript: void(0)" class="am-close am-close-spin doc-oc-js uclose2" data-rel="close"><img src="../img/close.jpg"></a>
      </div>
      <div class="gspace15"></div>
      <div class="am-g ucontent">
        <div class="am-u-lg-6">消费时间：<span class="ccard_record_atime"></span></div>
        <div class="am-u-lg-6">消费单号：<span class="ccard_record_code"></span></div>
        <div class="am-u-lg-6">会员卡号：<span class="ccard_code"></span></div>
        <div class="am-u-lg-6">会员姓名：<span class="ccard_name"></span></div>
        <div class="am-u-lg-6">会员类型：<span class="ccard_type_name"></div>
        <div class="am-u-lg-6">会员折扣：<span class="ccard_type_discount"></div>
        <div class="am-u-lg-6">操作类型：<span class="ccard_record_type"></span></div>
        <div class="am-u-lg-6">本次消费：<span class="ccard_record_smoney"></span></div>
        <div class="am-u-lg-6">支付方式：<span class="ccard_record_pay"></span></div>
        <div class="am-u-lg-6">手动优惠：<span class="ccard_record_jmoney">--</span></div>
        <div class="am-u-lg-6">操作人员：<span class="cuser_name"></span></div>
        <div class="am-u-lg-6">是否免单：<span class="ccard_record_state"></span></div>
      </div>
      
      <div class="gspace20"></div>
      <div class="ub">
        <button class="am-btn ubtn-sure ubtn-blue ubutton1">
          <i class="iconfont icon-dayin"></i>
          打印小票
        </button>
        <button class="am-btn ubtn-sure ubtn-red ubutton2 crefundopen" data-am-modal="{target: '#urecordm1', closeViaDimmer: 0, width: 320, height: 320}">
          <i class="iconfont icon-huaidanbaotui"></i>
          退款
        </button>
      </div>
     <div class="gspace15"></div>
    </div>
  </div>
</div>

<div id="urecordm1" class="am-modal am-modal-no-btn" tabindex="-1" >
  <div class="am-modal-dialog umodal">
    <div class="am-modal-hd uhead">退款
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd">
      <form class="am-form am-form-horizontal">
        <div class="am-form-group">
          <label class="umodal-label am-form-label utext1" for="">授权密码</label>
          <div class="umodal-small">
            <input class="am-form-field uinput uinput-max cpassword" type="password" name="password" placeholder="请输入授权密码">
            <input class="crecord_id" type="hidden" name="record_id">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">备注</label>
          <div class="umodal-small">
            <textarea style="height: 60px;" class="am-form-field utextarea utextarea-max" row="3" placeholder="请输入备注信息"></textarea>
          </div>
        </div>
        <div class="gspace20"></div>
        <p>1.如未设置，请到“设置”->“其他设置”->“授权密码”进行设置；</p>
        <div class="gspace15"></div>
        <div class="ua1">
          <button class="am-btn ubtn-sure ubtn-red crefunddo" type="button">
            <i class="iconfont icon-huaidanbaotui"></i>
            退款
          </button>
          <button class="am-btn ubtn-sure ubtn-red" type="submit">
            取消
          </button>
        </div>
      </form>
    </div>
  </div>
</div> 
<script src="../js/jquery.min.js"></script>
<script src="../js/amazeui.min.js"></script>
<script>
  $(function() {
    var id = '#uoffcanvas';
    var $myOc = $(id);

    //分页首末页不可选中
    if(<?php echo $GLOBALS['intpage'];?>>1){
      $('.upages li').eq(1).removeClass('am-disabled');
    }
    if(<?php echo $this->_data['card_records_list']['pagecount']-$GLOBALS['intpage']; ?><1){
      $('.upages li').last().addClass('am-disabled');
    }
    //关闭侧拉
    $('.doc-oc-js').on('click', function() {
      $myOc.offCanvas($(this).data('rel'));
    });

    //侧拉打开
    $('.coffopen').on('click',function() {
      var card_record_id = $(this).attr('card_record_id');
      $('.crefundopen').val(card_record_id);
      var url = "card_record_detail_ajax.php";
      $.getJSON(url,{card_record_id:card_record_id},function(res){
        // console.log(res);
        $("#uoffcanvas .ccard_record_atime").text(res.card_record_atime);
        $("#uoffcanvas .ccard_record_code").text(res.card_record_code);
        $("#uoffcanvas .ccard_type_name").text(res.c_card_type_name);
        $("#uoffcanvas .ccard_type_discount").text(res.c_card_type_discount);
        $("#uoffcanvas .ccard_name").text(res.c_card_name);
        $("#uoffcanvas .ccard_code").text(res.c_card_code);
        $("#uoffcanvas .ccard_record_smoney").text(res.card_record_smoney);
        $("#uoffcanvas .ccard_record_jmoney").text(res.card_record_jmoney);
        $("#uoffcanvas .cuser_name").text(res.c_user_name);
        switch(res.card_record_type)
        {
          case '1':
            $("#uoffcanvas .ccard_record_type").text('充值');
            break;
          case '2':
            $("#uoffcanvas .ccard_record_type").text('买套餐');
            break;
          case '3':
            $("#uoffcanvas .ccard_record_type").text('消费');
            break;
          default :
            $("#uoffcanvas .ccard_record_type").text('');
        }
        switch(res.card_record_pay)
        {
          case '1':
            $("#uoffcanvas .ccard_record_pay").text('现金');
            break;
          case '2':
            $("#uoffcanvas .ccard_record_pay").text('银行卡');
            break;
          case '3':
            $("#uoffcanvas .ccard_record_pay").text('微信');
            break;
          case '4':
            $("#uoffcanvas .ccard_record_pay").text('支付宝');
            break;
          case '5':
            $("#uoffcanvas .ccard_record_pay").text('卡扣');
            break;
          default :
            $("#uoffcanvas .ccard_record_pay").text('');
        }
        switch(res.card_record_state)
        {
          case '4':
            $("#uoffcanvas .ccard_record_state").text('免单');
            break;
          default :
            $("#uoffcanvas .ccard_record_state").text('--');
        }
        if(res.goods_list != undefined){
          var goods_head = '<p class="cjs"><strong>商品消费清单</strong></p>';
          var table_head = '<table class="am-table am-table-bordered am-table-hover utable1 am-table-compact cjs" style="color:black;"><thead><tr><td>编号</td><td>名称</td><td>单价</td><td>数量</td><td>金额</td><td>折后价</td></tr></thead>';
          var table_body = '';
          $.each(res.goods_list,function(k,v){
            if(v.mgoods_id!=0){
              table_body = table_body+'<tr><td>'+k+'</td><td>'+v.c_mgoods_name+'</td><td>'+v.c_mgoods_price+'元</td><td>'+v.card_record3_goods_count+'</td><td>'+v.c_mgoods_price*v.card_record3_goods_count+'</td><td>'+v.c_mgoods_cprice+'</td></tr>';
            }
            if(v.sgoods_id!=0){
              table_body = table_body+'<tr><td>'+k+'</td><td>'+v.c_sgoods_name+'</td><td>'+v.c_sgoods_price+'元</td><td>'+v.card_record3_goods_count+'</td><td>'+v.c_sgoods_price*v.card_record3_goods_count+'</td><td>'+v.c_sgoods_cprice+'</td></tr>';
            }
          });
          var table_bottom = '</table>';
          $(".am-offcanvas-content .ucontent").after(goods_head+table_head+table_body+table_bottom);
        }
        if(res.mcombo_goods_list != undefined){
          var goods_head = '<p class="cjs"><strong>套餐商品清单</strong></p>';
          var table_head = '<table class="am-table am-table-bordered am-table-hover utable1 am-table-compact cjs" style="color:black;"><thead><tr><td>编号</td><td>名称</td><td>单价</td><td>数量</td><td>金额</td><td>折后价</td></tr></thead>';
          var table_body = '';
          $.each(res.mcombo_goods_list,function(k,v){
              table_body = table_body+'<tr><td>'+k+'</td><td>'+v.c_mgoods_name+'</td><td>'+v.c_mgoods_price+'元</td><td>'+v.card_record2_mcombo_gcount+'</td><td>'+v.c_mgoods_price*v.card_record2_mcombo_gcount+'</td><td>'+v.c_mgoods_cprice+'</td></tr>';
          });
          var table_bottom = '</table>';
          $(".am-offcanvas-content .ucontent").after(goods_head+table_head+table_body+table_bottom);
        }
      });
      $('#uoffcanvas').offCanvas('open');
    });
    //侧拉关闭删除商品信息
    $myOc.on('close.offcanvas.amui', function() {
      $myOc.find('.cjs').remove();
    })
    //退款打开
    $('.crefundopen').on('click',function(){
      var card_record_id = $(this).val();
      $('.crecord_id').val(card_record_id);
    })
    //退款提交
    $('.crefunddo').on('click',function(){
      var card_record_id = $('.crecord_id').val();
      var password = $('.password').val();
      var url = 'refund_do.php';

      $.post(url,{card_record_id:card_record_id,password:password},function(res){
        console.log(res);
        return false;
       /* if(res=='0'){
          // window.location.reload();
        }else if(res=='1'){
          //密码错误
          $('.cpay').attr('disabled',false);
          return false;
        }else{
          $('.cpay').attr('disabled',false);
          return false;
        }*/
      });
    })
    //删除
    /*$('.cdel').on('click', function() {
      $('#cconfirm').modal({
        relatedTarget: this,
        onConfirm: function(options) {
          $(this.relatedTarget).parent('td').parent('tr').remove();
        },
        onCancel: function() {
          return;
        }
      });
    });*/
  });
</script>
</body>
</html>
