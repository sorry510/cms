<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>

<!-- content -->
<div id="uworkbench" class="gcontent">
  <ul class="am-nav am-nav-pills utop">
    <li>
      <div class="ucardsearch">
      <form id="cform1">
        <input type="text" class="am-form-field uinput uinput-160" placeholder="卡号/手机号/姓名" name="search" value="">
        <button type="button" class="am-btn ubtn-search ccardsearch">
          F1查询
        </button>
      </form>
      </div>
    </li>
    <li>
      <ul class="am-nav am-nav-pills ucarddetail">
        <li>姓名：<span class="ccard_name"></span></li>
        <li>类型：<span class="ccard_type_name"></span></li>
        <li>卡折扣：<span class="ccard_type_discount"></span></li>
        <li>手机号：<span class="ccard_phone"></span></li>
        <li>卡余额：<span class="ccard_ymoney"></span></li>
      </ul>
    </li>
    <li class="uroomcard gtext-yellow"><i class="iconfont icon-search"></i><span>201-1001</span></li>
  </ul>
  <div class="gspace15"></div>
  <div class="am-u-lg-4 uleft">
    <div class="am-tabs" data-am-tabs="{noSwipe: 1}">
      <ul class="am-tabs-nav am-nav am-nav-tabs ulhead">
        <li class="am-active"><a href="#tab1">可选商品</a></li>
        <li><a href="#tab2">我的套餐</a></li>
        <li><a href="#tab3">我的优惠券</a></li>
      </ul>
      <div class="am-tabs-bd">
        <div class="am-tab-panel am-active" id="tab1">
          <div class="ua"><span class="ua1">分类/名称</span><span class="ua2">操作</span></div>
          <form>
            <div class="am-form-group ub">
              <div class="umodal-normal ub1">
                <select name="type" class="uselect uselect-max ctype" data-am-selected>
                <option value="0">全部</option>
                <?php foreach($this->_data['mgoods_catalog_list'] as $row) { ?>
                  <option value="<?php echo 'm-'.$row['mgoods_catalog_id']; ?>"><?php echo $row['mgoods_catalog_name']; ?></option>
                <?php }?>
                <?php foreach($this->_data['sgoods_catalog_list'] as $row) { ?>
                  <option value="<?php echo 's-'.$row['sgoods_catalog_id']; ?>"><?php echo $row['sgoods_catalog_name']; ?></option>
                <?php }?>
                </select>
              </div>
              <div class="umodal-normal ub1">
                <input type="text" name="search" class="am-form-field uinput uinput-max csearch"  placeholder="名称/简拼/编码" value=""/>
              </div>
              <div class="umodal-search ub2">
                <button type="button" class="am-btn ubtn-search2 ubtn-green cgoodssearch">
                  <span class="gtext-yellow">F2</span><i class="iconfont icon-search"></i>
                  查询
                </button>
              </div>
            </div>
          </form>
          <ul class="uc">
          <?php foreach($this->_data['mgoods_list'] as $row) { ?>
            <li class="uc1" mgoods_type="<?php echo $row['mgoods_catalog_id'];?>"><?php echo $row['mgoods_catalog_name'];?></li>
            <?php foreach($row['mgoods'] as $row2){ ?>
              <li class="uc2" mgoods_id="<?php echo $row2['mgoods_id'];?>" mgoods_act="<?php echo $row2['mgoods_act'];?>">
                <div class="uc2a" price="<?php echo $row2['mgoods_price'];?>" cprice="<?php echo $row2['mgoods_cprice'];?>"><?php echo $row2['mgoods_name']."(".$row2['mgoods_price'].")";?></div>
                <div class="uc2b"><a href="#" class="cadd">添加</a></div>
              </li>
            <?php } ?>
          <?php }?>
          <?php foreach($this->_data['sgoods_list'] as $row) { ?>
            <li class="uc1" sgoods_type="<?php echo $row['sgoods_catalog_id'];?>"><?php echo $row['sgoods_catalog_name'];?></li>
            <?php foreach($row['sgoods'] as $row2){ ?>
              <li class="uc2" sgoods_id="<?php echo $row2['sgoods_id'];?>">
                <div class="uc2a" price="<?php echo $row2['sgoods_price'];?>" cprice="<?php echo $row2['sgoods_cprice'];?>"><?php echo $row2['sgoods_name']."(".$row2['sgoods_price'].")";?></div>
                <div class="uc2b"><a href="#" class="cadd">添加</a></div>
              </li>
            <?php } ?>
          <?php }?>
          </ul>
        </div>
        <div class="am-tab-panel am-fade" id="tab2">
          <div class="ua"><span class="ua1">分类/名称</span><span class="ua2">操作</span></div>
          <ul class="uc" style="height: 362px;">
          </ul>
        </div>
        <div class="am-tab-panel am-fade" id="tab3">
          <div class="ua"><span class="ua1">分类/名称</span><span class="ua2">操作</span></div>
          <ul class="uc" style="height: 362px;">
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="am-u-lg-7 am-fr uright">
    <ul class="am-g am-nav am-nav-pills urhead">
      <li class="am-u-lg-4">名称</li>
      <li class="am-u-lg-2">真实价格</li>
      <li class="am-u-lg-2">数量</li>
      <li class="am-u-lg-2">服务员</li>
      <li class="am-u-lg-2">操作</li>
    </ul>
    <ul class="urcontent">
     
    </ul>
    <div class="am-u-lg-12 utotaltext">
      共计<span class="gtext-orange cgoodscount">0</span>件，原价<span class="gtext-orange chmoney">0.00</span>元，合计<span class="gtext-orange cymoney">0.00</span>元
    </div>
  </div>
  <div class="ubottom">
    <div class="am-u-lg-2">
      <button class="am-btn ubtn-guadan">
        挂单
      </button>
    </div>
    <div class="am-u-lg-3" style="padding-left:30px;">
      <span>合计金额：</span>
      <span class="gtext-orange ufont1 cymoney">0.00</span>　
      <span>元</span>　
    </div>
    <div class="am-u-lg-3">
      <span>导购：</span>
      <select class="uselect uselect-auto cworker_guide" data-am-selected="{dropUp: 1,maxHeight: '130px'}" name="">
        <option value="0">请选择</option>
        <?php foreach($this->_data['worker_list'] as $row){?>
        <option value="<?php echo $row['worker_id'];?>"><?php echo $row['worker_name'];?></option>
        <?php }?>
      </select>
    </div>
    <div class="am-u-lg-2">
      <button type="button" class="am-btn ubtn-pay cpayopen">
        结账
      </button>
    </div>
  </div>
</div>
<!-- 选择会员 -->
<div id="uworkbenchm1" class="am-modal" tabindex="-1">
  <div class="am-modal-dialog umodal">
    <div class="am-modal-hd uhead">会员信息
      <a href="javascript:void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd">
      <div class="am-u-lg-4">
        <div class="am-u-lg-12">
          <select class="uselect uselect-max ccard_list" data-am-selected="{maxHeight: '130px'}" name="card_id">
          </select>
        </div>
        <div class="am-u-lg-12 gspace15"></div>
        <div class="am-u-lg-12">
          <img class="ucardphoto ccardphoto" src="../img/wu.jpg">
        </div>
      </div>
      <div class="am-u-lg-8">
        <div class="am-g ucontent">
          <div class="am-u-lg-6">会员卡号：<span class="ccard_code"></span></div>
          <div class="am-u-lg-6">会员姓名：<span class="ccard_name"></span></div>
          <div class="am-u-lg-6">手机号码：<span class="ccard_phone"></span></div>
          <div class="am-u-lg-6">卡类型：<span class="ccard_type_name"></span></div>
          <div class="am-u-lg-6">会员折扣：<span class="ccard_type_discount"></span></div>
          <div class="am-u-lg-6">卡余额：<span class="ccard_ymoney"></span></div>
        </div>
        <div class="am-g ucontent udelbottomboder">
          <div class="am-u-lg-6">积分剩余：<span class="ccard_yscore"></span></div>
          <div class="am-u-lg-6">车牌号码：<span class="ccard_carcode"></span></div>
          <div class="am-u-lg-6">累计消费：<span class="ccard_smoney"></span></div>
          <div class="am-u-lg-6">生日：<span class="ccard_birthday"></span></div>
          <div class="am-u-lg-6">到期时间：<span class="ccard_edate"></span></div>
          <div class="am-u-lg-6">开卡店铺：<span class="ccard_shop"></span></div>
          <div class="am-u-lg-12">会员备注：<span class="ccard_memo"></span></div>
        </div>
      </div>
      <div style="clear:both;"></div>
    </div>
    <div class="am-modal-footer ufoot">
      <div class="am-fl ua1">密码：
        <input type="password" name="card_password" class="am-form-field uinput uinput-160 ccard_password">
      </div>
      <div class="am-btn-group">
        <button type="button" class="am-btn ubtn-sure ubtn-green ccardsubmit"><i class="iconfont icon-xiangyou2"></i>
          完成
        </button>
      </div>
    </div>
  </div>
</div>
<!-- 结账 -->
<div id="uworkbenchm2" class="am-modal" tabindex="-1">
  <div class="am-modal-dialog umodal">
    <div class="am-modal-hd uhead">结账
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd">
      <div class="utitle">付款金额</div>
      <div class="ucontent2">
        <div class="utext">应收金额：</div>
        <div class='umodal-text'>
          <input name="money" class="am-form-field umoneyinput cymoney2" type="text" disabled>&nbsp;&nbsp;元
        </div>
        <label class="umodal-search">&nbsp;</label>
        <div class="utext">手动优惠：</div>
        <div class='umodal-text'>
          <input name="cash" class="am-form-field umoneyinput cjmoney" type="text" placeholder="请输入金额">&nbsp;&nbsp;元
        </div>
      </div>
      <div class="gspace15"></div>
      <div class="am-g ucontent">
        <div class="am-u-lg-12"><span class="cact_dec"></span><span class="cact_dec_use"></span></div>
        <div class="am-u-lg-12"><span class="cact_give"></span><span class="cact_give_use"></span></div>
      </div>
      <div class="gspace5"></div>
      <div class="utitle">付款方式</div>
      <div class="am-btn-group ucontent3">
         <a class="am-btn am-btn-default upay upay-active" payType="1">现金</a>
         <a class="am-btn am-btn-default upay" payType="2">银行卡</a>
         <a class="am-btn am-btn-default upay" payType="3">微信支付</a>
         <a class="am-btn am-btn-default upay" payType="4">支付宝</a>
         <a class="am-btn am-btn-default upay" payType="5">卡扣</a>
      </div>
      <input type="hidden" name="card_id" value="">
    </div>
    <div class="am-modal-footer ufoot">
      <div class="am-fl ua1">实收金额：<span class="am-text-lg gtext-orange csmoney">0.00</span>元</div>
      <div class="am-fl ua2">
        <label class="am-checkbox">
          <input type="checkbox" class="cfree" value="4" data-am-ucheck > 免单
        </label>
      </div>
      <div class="am-btn-group">
        <button type="button" class="am-btn ubtn-sure ubtn-green cpayconfirm"><i class="iconfont icon-yuanxingxuanzhong"></i>
          完成
        </button>
      </div>
    </div>
  </div>
</div>
<!-- alert -->
<div class="am-modal am-modal-alert" tabindex="-1" id="calert">
  <div class="am-modal-dialog">
    <div class="am-modal-hd">提 示</div>
    <div class="am-modal-bd">
      没有此会员信息！
    </div>
    <div class="am-modal-footer">
      <span class="am-modal-btn">确定</span>
    </div>
  </div>
</div>
<script src="../js/jquery.min.js"></script>
<script src="../js/amazeui.min.js"></script>
<script type="text/javascript">
(function(){
  this.card_id = 0;
  this.cardlist = [];
  this.card_act_discount = [];
  this.card_act_decrease = [];
  this.card_act_give = [];
  this.card_act_decrease_use = [];
  this.card_act_give_use = [];
  this.goods = {};
  this.money_act = 0;
  this.init = function(){
    var _this = this;
    _this.cardActDiscount();//初始化活动
    _this.cardActDecrease();//初始化活动
    _this.cardActGive();//初始化活动
    // 会员卡搜索
    $('#uworkbench .ccardsearch').on('click', function(event){
      _this.cardSearch(event);
    });
    // 会员卡选择（多个时）
    $('#uworkbenchm1 .ccard_list').on('change', function(event){
       _this.cardSelect(event);
    })
    // 选中会员卡
    $('#uworkbenchm1 .ccardsubmit').on('click', function(){
     _this.cardChecked();
    })
    // 商品搜索
    $('#uworkbench .uleft #tab1 .cgoodssearch').on('click', function(){
      _this.goodsSearch();
    });
    // 添加商品
    $('#uworkbench .uleft #tab1 .cadd').on('click', function(event){
      _this.goodsAdd(event);
    });
    //删除商品,套餐商品,券
    $(document).on("click",".cdel", function(event){
      _this.goodsDelete(event);
    });
    //+ -
    $(document).on("click", ".cbtndec", function(event) {
      _this.goodsNumDec(event);
    });
    $(document).on("click", ".cbtnplus", function(event) {
      _this.goodsNumPlus(event);
    });
    $('.cpayopen').on('click', function(){
      _this.bill();
      $('#uworkbenchm2').modal('open');
    })
    //付款方式
    $('#uworkbenchm2 .upay').on('click',function(){
      $(this).addClass('upay-active').siblings().removeClass('upay-active');
    });
    //赠送金额
    $('#uworkbenchm2 .cjmoney').on('input propertychange',function(){
      if(isNaN($(this).val())){
        $(this).val('');
      }
      var jmoney = $(this).val()?$(this).val():0;
      var ymoney = $('#uworkbenchm2 .cymoney2').val();
      if(Number(jmoney) >= Number(ymoney)){
        $(this).val(ymoney);
        jmoney = ymoney;
      }
      var smoney = Number(ymoney) - Number(jmoney);
        smoney = smoney.toFixed(2);
      // console.log(smoney);
      if($('#uworkbenchm2 .cfree').prop('checked')){
        $('#uworkbenchm2 .csmoney').text('0.00');
      }else{
        $('#uworkbenchm2 .csmoney').text(smoney);
      }
    })
    //免单
    $('#uworkbenchm2 .cfree').on('click',function(){
      if($(this).prop('checked')){
        $('#uworkbenchm2 .csmoney').text('0.00');
        $('#uworkbenchm2 .cact_dec_use').hide();
        $('#uworkbenchm2 .cact_give_use').hide();
      }else{
        var jmoney = $('#uworkbenchm2 .cjmoney').val();
        var ymoney = $('#uworkbenchm2 .cymoney2').val();
        var smoney = Number(ymoney) - Number(jmoney);
        $('#uworkbenchm2 .csmoney').text(smoney);
        $('#uworkbenchm2 .cact_dec_use').show();
        $('#uworkbenchm2 .cact_give_use').show();
      }
    })
    $('#uworkbenchm2 .cpayconfirm').on('click', function(event){
      _this.payConfirm(event);
    })
  }
  this.cardActDiscount = function(){
    this.card_act_discount.length = 0;
    //user_type 1会员 2非会员
    var _this = this;
    var dtd = $.Deferred();// 新建一个Deferred对象
    var user_type = 0;
    if(_this.card_id == 0){
      user_type = 2;
    }else{
      user_type = 1;
    }
    $.getJSON('card_act_discount_ajax.php',{user_type:user_type},function(res){
      // console.log('act');
      if(res.length>0){
        $.each(res,function(k,v){
          _this.card_act_discount[k] = v.act_discount_id;
        });
      }
      // console.log(_this.card_act_discount);
      dtd.resolve();
    });
    return dtd.promise();
  };
  this.cardActDecrease = function(){
    this.card_act_decrease.length = 0;
    //user_type 1会员 2非会员
    var _this = this;
    var user_type = 0;
    if(_this.card_id == 0){
      user_type = 2;
    }else{
      user_type = 1;
    }
    $.getJSON('card_act_decrease_ajax.php',{user_type:user_type},function(res){
      if(res.length > 0){
        $.each(res,function(k,v){
          _this.card_act_decrease.push(v);
        });
        // console.log(_this.card_act_decrease);
      }
    });
  };
  this.cardActGive = function(){
    this.card_act_give.length = 0;
    //user_type 1会员 2非会员
    var _this = this;
    var user_type = 0;
    if(_this.card_id == 0){
      user_type = 2;
    }else{
      user_type = 1;
    }
    $.getJSON('card_act_give_ajax.php',{user_type:user_type},function(res){
      if(res.length > 0){
        $.each(res,function(k,v){
          _this.card_act_give.push(v);
        });
      }
      // console.log(_this.card_act_give);
    });
  };
  this.cardSearch = function(event){
    //this指向Pay对象
    var _this = this;
    // emt指向触发事件的对象
    var event = event || window.event;
    var emt = event.target;
    var _self = $(emt);
    _self.attr('disabled',true);
    $.ajax({
      url:'card_search_ajax.php',
      data:$("#cform1").serialize(),
      type:"GET",
      dataType:"json"
    }).then(function(res){
      if(res.length==0){
        _this.cardClear();
        _self.attr('disabled',false);
        $('#calert').modal('open');
      }else if(res.length==1){
        _this.cardlist = res;
        _self.attr('disabled',false);
        $('#uworkbenchm1 .ccard_list option').remove();
        res = res[0];
        var option = "<option value='"+res.card_id+"'>"+res.card_name+"</option>";
        $('#uworkbenchm1 .ccard_list').append(option);
        $('#uworkbenchm1 .ccard_list').val(res.card_id);

        $('#uworkbenchm1 .ccard_code').text(res.card_code);
        $('#uworkbenchm1 .ccard_name').text(res.card_name);
        $('#uworkbenchm1 .ccard_phone').text(res.card_phone);
        $('#uworkbenchm1 .ccard_type_name').text(res.c_card_type_name);
        $('#uworkbenchm1 .ccard_type_discount').text(res.c_card_type_discount);
        $('#uworkbenchm1 .ccard_ymoney').text(res.s_card_ymoney);

        $('#uworkbenchm1 .ccard_yscore').text(res.s_card_yscore);
        $('#uworkbenchm1 .ccard_carcode').text(res.card_carcode);
        $('#uworkbenchm1 .ccard_smoney').text(res.s_card_smoney);
        $('#uworkbenchm1 .ccard_birthday').text(res.birthday);
        $('#uworkbenchm1 .ccard_shop').text(res.shop_name);
        $('#uworkbenchm1 .ccard_edate').text(res.edate);
        $('#uworkbenchm1 .ccard_memo').text(res.card_memo);
        
        $('#uworkbenchm1 .ccardphoto').attr('src','http://<?php echo $GLOBALS["gconfig"]["path"]["photo_card_show"];?>/'+res.card_photo_file);
        $('#uworkbenchm1').modal('open');
      }else{
        _this.cardlist = res;
        _self.attr('disabled',false);
        $('#uworkbenchm1 .ccard_list option').remove();
        var option = "<option value='0' selected>请选择</option>";
        $.each(res,function(key,val){
          option += "<option value='"+val.card_id+"'>"+val.card_name+"</option>";
        });
        $('#uworkbenchm1 .ccard_list').append(option);
        $('#uworkbenchm1').modal('open');
      }
    })
  };
  this.cardSelect = function(event){
    //this指向Pay对象
    var _this = this;
    // emt指向触发事件的对象
    var event = event || window.event;
    var emt = event.target;
    var _self = $(emt);
    var index = _self.find('option:selected').index();
    if(_this.cardlist.length>1){
      if(index == 0){
        $('#uworkbenchm1 .ccard_code').text('');
        $('#uworkbenchm1 .ccard_name').text('');
        $('#uworkbenchm1 .ccard_phone').text('');
        $('#uworkbenchm1 .ccard_type_name').text('');
        $('#uworkbenchm1 .ccard_type_discount').text('');
        $('#uworkbenchm1 .ccard_ymoney').text('');

        $('#uworkbenchm1 .ccard_yscore').text('');
        $('#uworkbenchm1 .ccard_carcode').text('');
        $('#uworkbenchm1 .ccard_smoney').text('');
        $('#uworkbenchm1 .ccard_birthday').text('');
        $('#uworkbenchm1 .ccard_shop').text('');
        $('#uworkbenchm1 .ccard_edate').text('');
        $('#uworkbenchm1 .ccard_memo').text('');
        $('#uworkbenchm1 .ccardphoto').attr('src','../img/wu.jpg');
      }else{
        res = _this.cardlist[index-1];
        $('#uworkbenchm1 .ccard_code').text(res.card_code);
        $('#uworkbenchm1 .ccard_name').text(res.card_name);
        $('#uworkbenchm1 .ccard_phone').text(res.card_phone);
        $('#uworkbenchm1 .ccard_type_name').text(res.c_card_type_name);
        $('#uworkbenchm1 .ccard_type_discount').text(res.c_card_type_discount);
        $('#uworkbenchm1 .ccard_ymoney').text(res.s_card_ymoney);

        $('#uworkbenchm1 .ccard_yscore').text(res.s_card_yscore);
        $('#uworkbenchm1 .ccard_carcode').text(res.card_carcode);
        $('#uworkbenchm1 .ccard_smoney').text(res.s_card_smoney);
        $('#uworkbenchm1 .ccard_birthday').text(res.birthday);
        $('#uworkbenchm1 .ccard_shop').text(res.shop_name);
        $('#uworkbenchm1 .ccard_edate').text(res.edate);
        $('#uworkbenchm1 .ccard_memo').text(res.card_memo);
        $('#uworkbenchm1 .ccardphoto').attr('src','http://<?php echo $GLOBALS["gconfig"]["path"]["photo_card_show"];?>/'+res.card_photo_file);
      }
    }
  };
  this.cardChecked = function(){
    var _this = this;
    var url = "card_password_do.php";
    var card_id = $("#uworkbenchm1 .ccard_list").val();
    var data = {
      card_id:card_id,
      card_password:$("#uworkbenchm1 .ccard_password").val()
    };
    if(card_id != 0){
      $.get(url,data,function(state){
        if(state == '0'){
          if(_this.cardlist.length > 1){
            var index = $("#uworkbenchm1 .ccard_list").find('option:selected').index();
            if(index > 0){
              res = _this.cardlist[index-1];
            }else{
              alert('请选择一个人');
              return false;
            }
          }else{
            res = _this.cardlist[0];
          }
          $('#uworkbench .utop .ccard_name').text(res.card_name);
          $('#uworkbench .utop .ccard_phone').text(res.card_phone);
          $('#uworkbench .utop .ccard_ymoney').text(res.s_card_ymoney);
          $('#uworkbench .utop .ccard_type_name').text(res.c_card_type_name);
          $('#uworkbench .utop .ccard_type_discount').text(res.c_card_type_discount);
         
          _this.card_id = res.card_id;
          _this.cardMcombo(res.card_id);
          _this.cardTicket(res.card_id);
          //重新计算所有商品价格
          _this.cardActDiscount()
            .then(function(){
              // console.log('sucss');
              var dtd = $.Deferred();
              var count = $("#uworkbench .uright .cnum[mgoods_id]").length;
              if(count > 0){
                $("#uworkbench .uright .cnum[mgoods_id]").each(function(k,v){
                  var elm = $(this);
                  var index = k;
                  _this.goodsPrice(elm.attr('mgoods_id'),1)
                    .then(function(){
                      elm.attr('min_price',_this.goods.min_price);
                      elm.attr('act_discount_id',_this.goods.act_discount_id);
                      elm.parent().prev().find('span').text(_this.goods.min_price);
                      if(count - index <= 1){
                        dtd.resolve();
                      }
                    })
                })
              }else{
                dtd.resolve();
              }
              return dtd.promise();
            })
            .then(function(){
              var dtd = $.Deferred();
              var count = $("#uworkbench .uright .cnum[sgoods_id]").length;
              if(count > 0){
                $("#uworkbench .uright .cnum[sgoods_id]").each(function(k,v){
                  // console.log($(this));
                  var elm = $(this);
                  var index = k;
                  _this.goodsPrice(elm.attr('sgoods_id'),2)
                    .then(function(){
                      elm.attr('min_price', _this.goods.min_price);
                      elm.attr('act_discount_id', _this.goods.act_discount_id);
                      elm.parent().prev().find('span').text(_this.goods.min_price);
                      if(count - index <= 1){
                        dtd.resolve();
                      }
                    })
                })
              }else{
                dtd.resolve();
              }
              return dtd.promise();
            })
            .then(function(){
              _this.allGoodsPrice();
            })
          _this.cardActDecrease();
          _this.cardActGive();
          $('#uworkbenchm1').modal('close');
        }else{
          // 密码错误
          alert('密码错误');
          return false;
        }
      });
    }else{
      alert('请选择一个人');
      return false;
    }
  };
  this.cardMcombo = function(card_id){
    var _this = this;
    $('#uworkbench .uleft #tab2 .uc li').remove();
    $.when($.getJSON('card_mymcombo_ajax.php', {card_id:card_id}))
      .done(function(res){
        console.log(res);
        if(res){
          var addli = '';
          $.each(res,function(k,v){
            //没有做套餐用完时怎么显示
            if(v.card_mcombo_type==1){
              addli += '<li class="uc1" mcombo_id="'+v.mcombo_id+'">'+v.c_mcombo_name+'('+v.card_mcombo_ccount+')</li>';
            }else if(v.card_mcombo_type==2){
              if(v.c_mcombo_type == 1)
                addli += '<li class="uc2" mcombo_type="'+v.c_mcombo_type+'" mcombo_id="'+v.mcombo_id+'"><div class="uc2a" card_mcombo_id ="'+v.card_mcombo_id+'" mgoods_id="'+v.mgoods_id+'" mgoods_count="'+v.card_mcombo_gcount+'">'+v.c_mgoods_name+'('+v.c_mgoods_price+')('+v.card_mcombo_gcount+')</div><div class="uc2b"><a href="#" class="cadd2">添加</a></div></li>';
              else if(v.c_mcombo_type == 2){
                addli += '<li class="uc2" mcombo_type="'+v.c_mcombo_type+'" mcombo_id="'+v.mcombo_id+'"><div class="uc2a" card_mcombo_id ="'+v.card_mcombo_id+'" mgoods_id="'+v.mgoods_id+'" mgoods_count="'+v.card_mcombo_gcount+'">'+v.c_mgoods_name+'('+v.c_mgoods_price+')</div><div class="uc2b"><a href="#" class="cadd2">添加</a></div></li>';
              }
            }
          });
          $('#uworkbench .uleft #tab2 .uc').append(addli);
          $('#uworkbench .uleft #tab2 .cadd2').on('click', _this.mcomboAdd);
        }
      })
  };
  this.cardTicket = function(card_id){
    var _this = this;
    $('#uworkbench .ub .uleft #tab3 .uc li').remove();
    $.when($.getJSON('card_myticket_ajax.php', {card_id:card_id}))
      .done(function(res){
        if(res){
          var addli = '';
          $.each(res, function(k, v){
            if(v.ticket_type=='1'){
              addli += '<li class="uc2" ticket_money_id="'+v.ticket_money_id+'" ticket_type="'+v.ticket_type+'" ticket_id="'+v.card_ticket_id+'" ticket_value="'+v.c_ticket_value+'" ticket_limit="'+v.c_ticket_limit+'"><div class="uc2a">代金券：'+v.c_ticket_name+'('+v.c_ticket_value+')</div><div class="uc2b"><a href="#" class="cadd3">添加</a></div></li>';
            }else{
              addli += '<li class="uc2" ticket_goods_id="'+v.ticket_goods_id+'" mgoods_id="'+v.c_mgoods_id+'" ticket_type="'+v.ticket_type+'" ticket_id="'+v.card_ticket_id+'"><div class="uc2a">体验券：'+v.c_ticket_name+'('+v.c_ticket_value+')</div><div class="uc2b"><a href="#" class="cadd3">添加</a></div></li>';
            }
          });
          $('#uworkbench .uleft #tab3 .uc').append(addli);
          $('#uworkbench .uleft #tab3 .cadd3').on('click', function(event){
            _this.ticketAdd(event)
          });
        }
      })
  };
  this.cardClear = function(){
    var _this = this;
    _this.card_id = 0;
    _this.cardlist.length = 0;
    //重新计算所有商品价格
    _this.cardActDiscount()
      .then(function(){
        // console.log('sucss');
        var dtd = $.Deferred();
        var count = $("#uworkbench .uright .cnum[mgoods_id]").length;
        if(count > 0){
          $("#uworkbench .uright .cnum[mgoods_id]").each(function(k,v){
            var elm = $(this);
            var index = k;
            _this.goodsPrice(elm.attr('mgoods_id'),1)
              .then(function(){
                elm.attr('min_price',_this.goods.min_price);
                elm.attr('act_discount_id',_this.goods.act_discount_id);
                elm.parent().prev().find('span').text(_this.goods.min_price);
                if(count - index <= 1){
                  dtd.resolve();
                }
              })
          })
        }else{
          dtd.resolve();
        }
        return dtd.promise();
      })
      .then(function(){
        var dtd = $.Deferred();
        var count = $("#uworkbench .uright .cnum[sgoods_id]").length;
        if(count > 0){
          $("#uworkbench .uright .cnum[sgoods_id]").each(function(k,v){
            // console.log($(this));
            var elm = $(this);
            var index = k;
            _this.goodsPrice(elm.attr('sgoods_id'),2)
              .then(function(){
                elm.attr('min_price', _this.goods.min_price);
                elm.attr('act_discount_id', _this.goods.act_discount_id);
                elm.parent().prev().find('span').text(_this.goods.min_price);
                if(count - index <= 1){
                  dtd.resolve();
                }
              })
          })
        }else{
          dtd.resolve();
        }
        return dtd.promise();
      })
      .then(function(){
        _this.allGoodsPrice();
      })
    _this.cardActDecrease();
    _this.cardActGive();
    $('#uworkbench .uleft #tab2 .uc li').remove();
    $('#uworkbench .uleft #tab3 .uc li').remove();
    $('#uworkbench .utop .ccard_name').text('');
    $('#uworkbench .utop .ccard_phone').text('');
    $('#uworkbench .utop .ccard_ymoney').text('');
    $('#uworkbench .utop .ccard_type_name').text('');
    $('#uworkbench .utop .ccard_type_discount').text('');
    if($('#uworkbenchm2 .upay-active').attr('payType') == 5){
      $('#uworkbenchm2 .upay').eq(0).addClass('upay-active').siblings().removeClass('upay-active');
    }
  };
  this.goodsSearch = function(){
    $('#uworkbench .uleft #tab1 .cgoodssearch').attr('disabled',true);
    $("#uworkbench .uleft #tab1 .uc li").hide();
    $.ajax({
      url:'allgoods_search_ajax.php',
      data:{
        type: $('#uworkbench .uleft #tab1 .ctype').val(),
        search:$('#uworkbench .uleft #tab1 .csearch').val()
      },
      type:"GET",
      dataType:"json"
    }).then(function(res){
      $.each(res, function(key, val) {
        $("#uworkbench .uleft #tab1 .uc li[mgoods_type]").each(function(){
          if($(this).attr('mgoods_type')==val.mgoods_catalog_id){
            $(this).show();
          }
        });
        $("#uworkbench .uleft #tab1 .uc li[sgoods_type]").each(function(){
          if($(this).attr('sgoods_type')==val.sgoods_catalog_id){
            $(this).show();
          }
        });
        if(val.mgoods!=undefined){
          $.each(val.mgoods, function(key,val){
            $("#uworkbench .uleft #tab1 .uc li[mgoods_id]").each(function(){
              if($(this).attr('mgoods_id')  == val['mgoods_id']){
                $(this).show();
              }
            });
          })
        }
        if(val.sgoods!=undefined){
          $.each(val['sgoods'], function(key,val){
            $("#uworkbench .uleft #tab1 .uc li[sgoods_id]").each(function(){
              if($(this).attr('sgoods_id') == val['sgoods_id']){
                $(this).show();
              }
            });
          })
        }
      });
      $('#uworkbench .uleft #tab1 .cgoodssearch').attr('disabled',false);
    })
  };
  this.goodsAdd = function(event){
    //this指向pay对象
    var _this = this;
    // emt指向触发事件的对象
    var event = event || window.event;
    var emt = event.target;
    var _self = $(emt);
    var product = _self.parent().prev().text();
    var price = _self.parent().prev().attr('price');
    var mgoods_id = _self.parent().parent().attr('mgoods_id');
    var mgoods_act = _self.parent().parent().attr('mgoods_act');
    var sgoods_id =_self.parent().parent().attr('sgoods_id');
    var flag = true;
    var goods_id = 0;
    var type = 0;
    $('.uright .cnum').each(function(){
      if(mgoods_id != undefined && mgoods_id == $(this).attr('mgoods_id')){
        flag = false;
      }
      if(sgoods_id != undefined && sgoods_id == $(this).attr('sgoods_id')){
        flag = false;
      }
    });
    if(!flag){
      return false;//添加过了后面不在执行
    }
    if(mgoods_id != undefined){
      goods_id = mgoods_id;
      type = 1;
    }else{
      goods_id = sgoods_id;
      type = 2;
    }
    var addhtml = '';
    $.when(_this.goodsPrice(goods_id,type))
      .done(function(){
        // console.log(333);
        if(type == 1){
          addhtml += '<div class="am-g uline"><li class="am-u-lg-4 gtext-overflow" title="'+product+'">'+product+'</li><li class="am-u-lg-2"><span>'+_this.goods.min_price+'</span>元</li><li class="am-u-lg-2"><a href="javascript:;" class="udec"><i class="am-icon-minus cbtndec"></i></a><input price="'+price+'" mgoods_id="'+mgoods_id+'" mgoods_act="'+mgoods_act+'" min_price="'+_this.goods.min_price+'" act_discount_id="'+_this.goods.act_discount_id+'" type="text" class="uinput2 uinput-35 cnum" value="1"><a href="javascript:;" class="uplus"><i class="am-icon-plus cbtnplus"></i></a></li><li class="am-u-lg-2">';
        }else if(type == 2){
          // console.log(_this.goods);
          addhtml += '<div class="am-g uline"><li class="am-u-lg-4 gtext-overflow" title="'+product+'">'+product+'</li><li class="am-u-lg-2"><span>'+_this.goods.min_price+'</span>元</li><li class="am-u-lg-2"><a href="javascript:;" class="udec"><i class="am-icon-minus cbtndec"></i></a><input price="'+price+'" sgoods_id="'+sgoods_id+'" min_price="'+_this.goods.min_price+'" type="text" class="uinput2 uinput-35 cnum" value="1"><a href="javascript:;" class="uplus"><i class="am-icon-plus cbtnplus"></i></a></li><li class="am-u-lg-2">';
        }
      })
      .done(function(){
        $.getJSON('goods_reward_worker_ajax.php', {goods_id:goods_id,type:type}, function(res){
          addhtml += '<select class="uselect uselect-auto cworker" name=""><option value="0">请选择</option>';
          if(res.length>0){
            $.each(res, function(k,v){
              addhtml +='<option value="'+v.worker_id+'">'+v.worker_name+'</option>';
            })
          }
          addhtml += '</select></li><li class="am-u-lg-2 udel"><a href="javascript:;" class="cdel">移除</a></li></div>';
          $(".uright .urcontent").append(addhtml);
          $(".uright .cnum").on("input propertychange", _this.allGoodsPrice);
          $(".uright .cworker").selected();
          _this.allGoodsPrice();
        })
      })
  };
  this.goodsDelete = function(event){
    //this指向pay对象
    var _this = this;
    // emt指向触发事件的对象
    var event = event || window.event;
    var emt = event.target;
    var _self = $(emt);
    _self.parent().parent().remove();
    _this.allGoodsPrice();
  }
  this.goodsPrice = function(goods_id,goods_type){
    var _this = this;
    var dtd = $.Deferred();// 新建一个Deferred对象
    var mgoods_id = '';
    var sgoods_id = '';
    var card_id = this.card_id;
    if(goods_type == 1){
      mgoods_id = goods_id;
    }else if(goods_type == 2){
      sgoods_id = goods_id;
    }
    if(mgoods_id!=''){
      var data = {
        mgoods_id:mgoods_id,
        card_id:card_id,
        act_discount_id:_this.card_act_discount
      };
    }
    if(sgoods_id!=''){
      var data = {
        sgoods_id:sgoods_id,
        card_id:card_id,
      };
    }
    var url = 'goods_price_ajax.php';
    $.ajax({
      url:url,
      data:data,
      type:"POST",
      dataType:"json",
      success: function(res){
        // console.log(1);
        _this.goods = res;
        // console.log(_this.goods);
        dtd.resolve();
      }
    });
    return dtd.promise();
  };
  this.mcomboAdd = function(){
    var product = $(this).parent().prev().text();
    var mgoods_id = $(this).parent().prev().attr('mgoods_id');
    var mgoods_count = $(this).parent().prev().attr('mgoods_count');
    var card_mcombo_id = $(this).parent().prev().attr('card_mcombo_id');
    var mcombo_id = $(this).parent().parent().attr('mcombo_id');
    var mcombo_type = $(this).parent().parent().attr('mcombo_type');
    var flag = true;
    $('#uworkbench .uright .cnum2').each(function(){
      if(mcombo_id == $(this).attr('mcombo_id') && mgoods_id == $(this).attr('mgoods_id')){
        flag = false;
      }
    });
    if(!flag){
      return false;//添加过了后面不在执行
    }
    var addhtml = '';
    addhtml += '<div class="am-g uline"><li class="am-u-lg-4 gtext-overflow" title="'+product+'">'+product+'(<span class="gtext-green">套餐</span>)</li><li class="am-u-lg-2"><span>--</span></li><li class="am-u-lg-2"><a href="javascript:;" class="udec"><i class="am-icon-minus cbtndec"></i></a><input card_mcombo_id="'+card_mcombo_id+'" mcombo_id="'+mcombo_id+'" mcombo_type="'+mcombo_type+'" mgoods_count="'+mgoods_count+'" mgoods_id="'+mgoods_id+'" class="uinput2 uinput-35 cnum2" type="text" value="1"><a href="javascript:;" class="uplus"><i class="am-icon-plus cbtnplus"></i></a></li><li class="am-u-lg-2">';
    $.getJSON('goods_reward_worker_ajax.php', {goods_id:mgoods_id,type:1}, function(res){
      addhtml += '<select class="uselect uselect-auto cworker"><option value="0">请选择</option>';
      if(res.length>0){
        $.each(res, function(k,v){
          addhtml +='<option value="'+v.worker_id+'">'+v.worker_name+'</option>';
        })
      }
      addhtml += '</select></li><li class="am-u-lg-2 udel"><a href="javascript:;" class="cdel">移除</a></li></div>';
      $(".uright .urcontent").append(addhtml);
      $(".uright .cworker").selected();
    })
    //限制数量不超标和非数字
    $("#uworkbench .uright .cnum2").on("input propertychange",function(){
        if(isNaN($(this).val())){
          $(this).val(0);
        }
        if($(this).attr('mcombo_type') == '1'){
          if(parseInt($(this).val())>parseInt($(this).attr('mgoods_count'))){
            $(this).val(parseInt($(this).attr('mgoods_count')));
          }
        }
    });
  };
  this.ticketAdd = function(event){
    //this指向pay对象
    var _this = this;
    // emt指向触发事件的对象
    var event = event || window.event;
    var emt = event.target;
    var _self = $(emt);
    var product = _self.parent().prev().text();
    var ticket_id = _self.parent().parent().attr('ticket_id');
    var ticket_type = _self.parent().parent().attr('ticket_type');
    var ticket_limit = Number(_self.parent().parent().attr('ticket_limit'));
    var ticket_value = Number(_self.parent().parent().attr('ticket_value'));
    var ticket_money_id = _self.parent().parent().attr('ticket_money_id');
    var ticket_goods_id = _self.parent().parent().attr('ticket_goods_id');
    var mgoods_id = _self.parent().parent().attr('mgoods_id');

    var limit_money = Number(_this.money_act);
    var flag = true;
    $('#uworkbench .uright .cnum3').each(function(){
      if(ticket_id == $(this).attr('ticket_id')){
        flag = false;
      }
    })
    if(!flag){
      return false;//添加过了后面不在执行
    }
    var addhtml = '';
    if(ticket_type==1){
      $("#uworkbench .uright .cnum3[ticket_type='1']").each(function(){
        limit_money = limit_money - Number($(this).attr('ticket_limit'));
      });
      if(limit_money >= ticket_limit){
        addhtml += '<div class="am-g uline"><li class="am-u-lg-4 gtext-overflow" title="'+product+'">'+product+'</li><li class="am-u-lg-2"><span>--</span></li><li class="am-u-lg-2">--<input ticket_money_id="'+ticket_money_id+'" ticket_id="'+ticket_id+'" ticket_value="'+ticket_value+'" ticket_limit="'+ticket_limit+'" ticket_type="'+ticket_type+'" class="uinput2 uinput-35 cnum3" type="hidden"></li><li class="am-u-lg-2">--</li><li class="am-u-lg-2 udel"><a href="javascript:;" class="cdel">移除</a></li></div>';
      }else{
        alert('消费金额不足，无法使用此代金券!!!');
        return false;
      }
    }else if(ticket_type == 2){
      // 必须先选择商品，在选择体验券，》时无法再次添加
      var limit_count = 0;
      var use_count = 0;
      $("#uworkbench .uright .cnum[mgoods_id='"+mgoods_id+"']").each(function(){
        limit_count = $(this).val();
      });
      var use_count = $("#uworkbench .uright .cnum3[mgoods_id='"+mgoods_id+"']").length;
      if(limit_count - use_count >= 1){
        addhtml += '<div class="am-g uline"><li class="am-u-lg-4 gtext-overflow" title="'+product+'">'+product+'</li><li class="am-u-lg-2"><span>--</span></li><li class="am-u-lg-2">--<input ticket_goods_id="'+ticket_goods_id+'" ticket_id="'+ticket_id+'" ticket_type="'+ticket_type+'" mgoods_id="'+mgoods_id+'" class="uinput2 uinput-35 cnum3" type="hidden"></li><li class="am-u-lg-2">--</li><li class="am-u-lg-2 udel"><a href="javascript:;" class="cdel">移除</a></li></div>';
      }else{
        alert('必须先选择商品，在选择体验券!!!');
        return false;
      }
    }
    $(".uright .urcontent").append(addhtml);
    _this.allGoodsPrice();
  };
  this.goodsNumDec = function(event){
    //this指向pay对象
    var _this = this;
    // emt指向触发事件的对象
    var event = event || window.event;
    var emt = event.target;
    var _self = $(emt);
    var _input = _self.parent().siblings('input');
    if(parseInt(_input.val())>=1){
      _input.val(parseInt(_input.val())-1);
    }
    _this.allGoodsPrice();
  };
  this.goodsNumPlus = function(event){
    //this指向pay对象
    var _this = this;
    // emt指向触发事件的对象
    var event = event || window.event;
    var emt = event.target;
    var _self = $(emt);
    var _input = _self.parent().siblings('input');
    var mgoods_count = _input.attr('mgoods_count');
    if(mgoods_count != undefined){
      if(parseInt(_input.val()) < parseInt(mgoods_count)){
        _input.val(parseInt(_input.val())+1);
      }
    }else{
      _input.val(parseInt(_input.val())+1);
    }
    _this.allGoodsPrice();
  }
  this.allGoodsPrice = function(){
    var _this = this;
    var hmoney = 0;//原价
    var ymoney = 0;//优惠价(计算商品，套餐，优惠券之后的价格)
    var ymoney2 = 0;//优惠价之后去掉满减后的价格
    var money_act = 0;//参加活动的总价
    var num = 0;
    //计算所有商品总价
    $("#uworkbench .uright .cnum").each(function(){
      if(isNaN($(this).val())){
        $(this).val(0);
      }
      hmoney = Number(hmoney) + Number($(this).val())*Number($(this).attr('price'));
      ymoney = Number(ymoney) + Number($(this).val())*Number($(this).attr('min_price'));
      if($(this).attr('mgoods_act') == '1'){
        money_act = Number(money_act) + Number($(this).val())*Number($(this).attr('min_price'));
      }
      num = Number(num) + Number($(this).val());
    });
    // 扣除券中对应商品价格或直接券的价值
    $("#uworkbench .uright .cnum3").each(function(){
      var mgoods_id = $(this).attr('mgoods_id');
      var ticket_value = $(this).attr('ticket_value');
      if(mgoods_id != undefined){
        $("#uworkbench .uright .cnum").each(function(){
          if(mgoods_id == $(this).attr('mgoods_id')){
            ymoney = Number(ymoney)-Number($(this).attr('min_price'));
            money_act = Number(money_act)-Number($(this).attr('min_price'));
          }
        });
      }
      if(ticket_value != undefined){
        ymoney = Number(ymoney)-Number(ticket_value);
        money_act = Number(money_act)-Number(ticket_value);
      }
    });
    hmoney = hmoney.toFixed(2);
    ymoney = ymoney.toFixed(2);
    $("#uworkbench .cgoodscount").text(num);
    $("#uworkbench .chmoney").text(hmoney);
    $("#uworkbench .cymoney").text(ymoney);
    _this.money_act = money_act;
    // console.log(_this.money_act);
  }
  this.bill = function(){
    var _this = this;
    _this.card_act_decrease_use.length = 0;
    _this.card_act_give_use.length = 0;
    var money_act = _this.money_act;
    var card_act_decrease = _this.clone(_this.card_act_decrease);//clone 一份满减活动数据
    var card_act_give = _this.clone(_this.card_act_give);//clone 一份满减活动数据
    var ymoney = $("#uworkbench .ubottom .cymoney").text();
    var ymoney2 = 0;
    var smoney = 0;
    var decrease_money = 0;
    var jmoney = $("#uworkbenchm2 .cjmoney").val() || 0;
    var use_act_decrese = [];
    var temp = {};
    var act_number = 0;
    // 满减，满减活动是倒序按价格从高到低排列
    if(card_act_decrease.length != 0){
      for(var i=0;i<card_act_decrease.length;){
        if(money_act > card_act_decrease[i].act_decrease_man && card_act_decrease[i].act_decrease_man > 0){
          act_number = parseInt(Number(money_act)/Number(card_act_decrease[i].act_decrease_man));//减了几次
          money_act = Number(money_act)%Number(card_act_decrease[i].act_decrease_man);//减过之后剩余价格
          decrease_money = Number(decrease_money) + Number(card_act_decrease[i].act_decrease_jian)*Number(act_number);//总共减了多少钱
          temp = card_act_decrease[i];
          temp.act_number = act_number;
          _this.card_act_decrease_use.push(temp);
        }else{
          i++;
        }
      }
    }
    if(_this.card_act_decrease.length > 0){
      var act_dec = '满减活动：';
      $.each(_this.card_act_decrease, function(k,v){
        act_dec += v.act_decrease_name+',';
      })
      act_dec = act_dec.slice(0,-1)+'。';
      $('#uworkbenchm2 .cact_dec').text(act_dec);
    }else{
      $('#uworkbenchm2 .cact_dec').text('');
    }
    if(_this.card_act_decrease_use.length > 0){
      var act_dec_use = '共减：';
      $.each(_this.card_act_decrease_use, function(k,v){
        act_dec_use += v.act_decrease_name+'*'+v.act_number+',';
      })
      act_dec_use = act_dec_use.slice(0,-1)+'；总计：'+decrease_money+'元';
      $('#uworkbenchm2 .cact_dec_use').text(act_dec_use);
    }else{
      $('#uworkbenchm2 .cact_dec_use').text('');
    }
    // 满送
    if(_this.card_id != 0){
      // 满送的总金额是参加活动的商品总额-满减的金额
      money_act = _this.money_act - decrease_money;
      for(var i=0;i<card_act_give.length;){
        if(money_act > card_act_give[i].act_give_man && card_act_give[i].act_give_man > 0){
          act_number = parseInt(Number(money_act)/Number(card_act_give[i].act_give_man));//减了几次
          money_act = Number(money_act)%Number(card_act_give[i].act_give_man);//减过之后剩余价格
          temp = card_act_give[i];
          temp.act_number = act_number;
          _this.card_act_give_use.push(temp);
        }else{
          i++;
        }
      }
      if(_this.card_act_give.length > 0){
        var act_give = '满送活动：';
        $.each(_this.card_act_give, function(k,v){
          act_give += v.act_give_name+',';
        })
        act_give = act_give.slice(0,-1)+'。';
        $('#uworkbenchm2 .cact_give').text(act_give);
      }else{
        $('#uworkbenchm2 .cact_give').text('');
      }
      if(_this.card_act_give_use.length > 0){
        var act_give_use = '共赠送：';
        $.each(_this.card_act_give_use, function(k,v){
          act_give_use += v.act_give_name+'*'+v.act_number+',';
        })
        act_give_use = act_give_use.slice(0,-1)+'。';
        $('#uworkbenchm2 .cact_give_use').text(act_give_use);
      }else{
        $('#uworkbenchm2 .cact_give_use').text('');
      }
    }else{
      $('#uworkbenchm2 .cact_give').text('');
      $('#uworkbenchm2 .cact_give_use').text('');
    }
    // 没有card_id时，卡扣禁用
    if(_this.card_id == 0){
      $("#uworkbenchm2 .upay[payType='5']").attr('disabled',true);
    }else{
      $("#uworkbenchm2 .upay[payType='5']").attr('disabled',false);
    }
    ymoney2 = ymoney - decrease_money;
    ymoney2 = ymoney2.toFixed(2);
    smoney = ymoney2 - Number(jmoney);
    smoney = smoney.toFixed(2);
    $('#uworkbenchm2 .cymoney2').val(ymoney2);
    if($('#uworkbenchm2 .cfree').prop('checked')){
      $('#uworkbenchm2 .csmoney').text('0.00');
    }else{
      $('#uworkbenchm2 .csmoney').text(smoney);
    }
  }
  this.payConfirm = function(event){
    //this指向pay对象
    var _this = this;
    // emt指向触发事件的对象
    var event = event || window.event;
    var emt = event.target;
    var _self = $(emt);
    // _self.attr('disabled',true);

    var card_id = _this.card_id;
    var worker_guide_id = $("#uworkbench .cworker_guide").val()
    var hmoney = $("#uworkbench .chmoney").text()
    var ymoney = $("#uworkbenchm2 .cymoney2").val();
    var smoney = $("#uworkbenchm2 .csmoney").text();
    var jmoney = $("#uworkbenchm2 .cjmoney").val();
    var pay_type = $("#uworkbenchm2 .upay-active").attr('payType');
    var pay_state = 1;
    var arr= [];//商品
    var arr2= [];//套餐商品
    var arr3= [];//优惠券
    var success = true;

    var ticket_limit = 0;
    var max_give_value = 0;
    $("#uworkbench .uright .cnum3[ticket_type='1']").each(function(k,v){
        ticket_limit = Number(ticket_limit)+Number($(this).attr('ticket_limit'));
        max_give_value = $(this).attr('ticket_value')>max_give_value?$(this).attr('ticket_value'):max_give_value;
    });
    var limit_money = Number(ymoney) + Number(max_give_value);
    if(ticket_limit > limit_money){
      alert('代金券超出限额，请重新添加代金券!!!')
      $('#ualert').modal('open');
      return false;
    }
    $("#uworkbench .uright .cnum3[ticket_type='2']").each(function(k,v){
      var mgoods_id = $(this).attr('mgood_id');
      var ticket_num = $("#uworkbench .uright .cnum3[mgoods_id='"+mgoods_id+"']").length;
      var mgoods_num = $("#uworkbench .uright .cnum[mgoods_id='"+mgoods_id+"']").val();
      // console.log(ticket_num);
      // console.log(mgoods_num);
      if(parseInt(ticket_num) > parseInt(mgoods_num)){
        success = false;
        return false;
      }
    });
    if(!success){
      alert('优惠券数量大于对应商品数量，请重新添加');
      return false;
    }
    if(pay_type == 5){
      // 卡余额<实际付款金额
      var card_money = $('#uworkbench .ccard_ymoney').text();
      if(parseFloat(smoney).toFixed(2) > parseFloat(card_money).toFixed(2)){
       alert('余额不足，请选用其它方式付款');
       return false;
      }
    }
    if($('#uworkbenchm2 .cfree').prop('checked')){
      pay_state = $('#uworkbenchm2 .cfree').val();
    }
    $('#uworkbench .uright .cnum').each(function(){
      if($(this).attr('mgoods_id') != undefined){
        var json = {'mgoods_id':$(this).attr('mgoods_id'),'num':$(this).val(),'price':$(this).attr('min_price'),'act_discount_id':$(this).attr('act_discount_id'),'worker_id':$(this).parent().next().find('select').val()};
      }
      if($(this).attr('sgoods_id') != undefined){
        var json = {'sgoods_id':$(this).attr('sgoods_id'),'num':$(this).val(),'price':$(this).attr('min_price'),'act_discount_id':$(this).attr('act_discount_id'),'worker_id':$(this).parent().next().find('select').val()};
      }
      arr.push(json);
    });
    $('#uworkbench .uright .cnum2').each(function(){
      var json = {'card_mcombo_id':$(this).attr('card_mcombo_id'),'num':$(this).val(),'mgoods_id':$(this).attr('mgoods_id'),'worker_id':$(this).parent().next().find('select').val()};
      arr2.push(json);
    })
    $('#uworkbench .uright .cnum3').each(function(){
      var json = {'card_ticket_id':$(this).attr('ticket_id')};
      arr3.push(json);
    })

    if(arr.length==0 && arr2.length==0 && arr3.length == 0){
      alert('请添加至少一个商品!!!');
      return false;
    }
    
    var data = {
      card_id:card_id,
      worker_guide_id:worker_guide_id,
      hmoney:hmoney,
      ymoney:ymoney,
      smoney:smoney,
      jmoney:jmoney,
      pay_type:pay_type,
      pay_state:pay_state,
      arr:arr,
      arr2:arr2,
      arr3:arr3,
      act_give_use:_this.card_act_give_use,
      act_decrease_use:_this.card_act_decrease_use
    };
    // console.log(data);
    // return false;
    $.post('workbench_do.php',data,function(res){
      _self.attr('disabled',false);
      // console.log(res);
      // return false;
      if(res=='0'){
        window.location.reload();
      }else{
        alert("出错了,请联系管理员");
      }
    });
  }
  this.clone = function(obj){
    //深层clone,用于只有数据的数组，json对象
    return JSON.parse(JSON.stringify(obj));
  }
  this.init();
})()
</script>
</body>
</html>
