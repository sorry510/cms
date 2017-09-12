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
              <li class="uc2" mgoods_id="<?php echo $row2['mgoods_id'];?>">
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
      共计<span class="gtext-orange">0</span>件，原价<span class="gtext-orange">289.34</span>元，折扣<span class="gtext-orange">4.2</span>折，应收<span class="gtext-orange">242.2</span>元
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
      <span class="gtext-orange ufont1">123.42</span>　
      <span>元</span>　
    </div>
    <div class="am-u-lg-3">
      <span>导购：</span>
      <select class="uselect uselect-auto" data-am-selected="{dropUp: 1,maxHeight: '130px'}" name="">
        <option value="all">全部</option>
        <option value="0">大大</option>
        <option value="2">大大</option>
        <option value="3">大大</option>
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
          <input name="money" class="am-form-field umoneyinput" type="text">&nbsp;&nbsp;元
        </div>
        <label class="umodal-search">&nbsp;</label>
        <div class="utext">手动优惠：</div>
        <div class='umodal-text'>
          <input name="cash" class="am-form-field umoneyinput" type="text" placeholder="请输入金额">&nbsp;&nbsp;元
        </div>
      </div>
      <div class="gspace15"></div>
      <div class="am-g ucontent">
        <div class="am-u-lg-12">满减活动：满100减20元，满200减40元。</div>
        <div class="am-u-lg-12">满送活动：满100送10元券，满500送公仔。<span>共赠送公仔*3，公仔，公仔公仔公仔公仔公仔公仔公仔公仔公仔公仔公仔公仔公仔公仔公仔公仔公仔公仔公仔公仔公仔公仔公仔</span></div>
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
      <div class="am-fl ua1">实收金额：<span class="am-text-lg gtext-orange">23.20</span>元</div>
      <div class="am-fl ua2">
        <label class="am-checkbox">
          <input type="checkbox" value="" data-am-ucheck> 免单
        </label>
      </div>
      <div class="am-btn-group">
        <button type="button" class="am-btn ubtn-sure ubtn-green ccardrechargesubmit"><i class="iconfont icon-yuanxingxuanzhong"></i>
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
  var Pay = function(){
    this.card_id = 0;
    this.cardlist = [];
    this.card_act_discount = [];
    this.goods = {};
    this.cardActDiscount = function(user_type){
      //user_type 1会员 2非会员
      var _this = this;
      $.getJSON('card_act_discount_ajax.php',{user_type:user_type},function(res){
        if(res.length>0){
          $.each(res,function(k,v){
            _this.card_act_discount[k] = v.act_discount_id;
          });
        }
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
          $('#uworkbench .utop .ccard_id').val('');
          $('#uworkbench .utop .ccard_name').text('');
          $('#uworkbench .utop .ccard_phone').text('');
          $('#uworkbench .utop .ccard_type_name').text('');
          $('#uworkbench .utop .ccard_type_discount').text('');
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
          
          $('#uworkbenchm1 .ccardphoto').attr('src','http://<?php //echo $GLOBALS["gconfig"]["path"]["photo_card_show"];?>/'+res.card_photo_file);
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
      var data = {
        card_id:$("#uworkbenchm1 .ccard_list").val(),
        card_password:$("#uworkbenchm1 .ccard_password").val()
      };
      $.get(url,data,function(res){
        if(res=='0'){
          if(_this.cardlist.length > 1){
            var index = $("#uworkbenchm1 .ccard_list").find('option:selected').index();
            if(index>=0){
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
          $('#uworkbench .utop .ccard_type_name').text(res.c_card_type_name);
          $('#uworkbench .utop .ccard_type_discount').text(res.c_card_type_discount);
          _this.card_id = res.card_id;
          _this.cardMcombo(res.card_id);
          _this.cardTicket(res.card_id);
          $('#uworkbenchm1').modal('close');
        }else{
          // 密码错误
          alert('密码错误');
          return false;
        }
      });
    };
    this.cardMcombo = function(card_id){
      $('#uworkbench .uleft #tab2 .uc li').remove();
      $.getJSON('card_mymcombo_ajax.php', {card_id:card_id}, function(res){
        if(res.length>0){
          var addli = '';
          $.each(res,function(k,v){
            //没有做套餐用完时怎么显示
            if(v.card_mcombo_type==1){
              addli += '<li class="uc1" mcombo_id="'+v.mcombo_id+'">'+v.c_mcombo_name+'('+v.card_mcombo_ccount+')</li>';
            }else if(v.card_mcombo_type==2){
              addli += '<li class="uc2" mcombo_id="'+v.mcombo_id+'"><div class="uc2a" card_mcombo_id ="'+v.card_mcombo_id+'" mgoods_id="'+v.mgoods_id+'" mgoods_count="'+v.card_mcombo_gcount+'">'+v.c_mgoods_name+'('+v.c_mgoods_price+')('+v.card_mcombo_gcount+')</div><div class="uc2b cadd2"><a href="#">添加</a></div></li>';
            }
          });
          $('#uworkbench .uleft #tab2 .uc').append(addli);
        }
      });
      // $('#uworkbench .uleft #tab2 .cadd2').on('click', cadd2);
    };
    this.cardTicket = function(card_id){
      $('#umoney .ub .uleft #tab3 .uc li').remove();
      $.getJSON('card_myticket_ajax.php',{card_id:card_id},function(res){
        if(res.length>0){
          var addli = '';
          $.each(res, function(k, v){
            if(v.ticket_type=='1'){
              addli += '<li class="uc2" ticket_money_id="'+v.ticket_money_id+'" ticket_type="'+v.ticket_type+'" ticket_id="'+v.card_ticket_id+'" ticket_value="'+v.c_ticket_value+'" ticket_limit="'+v.c_ticket_limit+'"><div class="uc2a">代金券：'+v.c_ticket_name+'('+v.c_ticket_value+')</div><div class="uc2b cadd3"><a href="#">添加</a></div></li>';
              $('#tab3 .uc').append(addli);
            }else{
              addli += '<li class="uc2" ticket_goods_id="'+v.ticket_goods_id+'" mgoods_id="'+v.c_mgoods_id+'" ticket_type="'+v.ticket_type+'" ticket_id="'+v.card_ticket_id+'"><div class="uc2a">体验券：'+v.c_ticket_name+'('+v.c_ticket_value+')</div><div class="uc2b cadd3"><a href="#">添加</a></div></li>';
            }
          });
          $('#uworkbench .uleft #tab3 .uc').append(addli);
        }
        // $('#uworkbench .uleft #tab3 .cadd3').on('click', cadd3);
      });
    };
    this.cardClear = function(){
      this.card_id = 0;
      this.cardlist.length = 0;
      this.card_act_discount.length = 0;
      this.cardActDiscount(2);
      $('#uworkbench .uleft #tab2 .uc li').remove();
      $('#uworkbench .uleft #tab3 .uc li').remove();
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
          // console.log(_this.goods);
          if(type == 1){
            addhtml += '<div class="am-g uline"><li class="am-u-lg-4 gtext-overflow" title="'+product+'">'+product+'</li><li class="am-u-lg-2"><span>'+_this.goods.min_price+'</span>元</li><li class="am-u-lg-2"><a href="javascript:;" class="udec cbtndec"><i class="am-icon-minus"></i></a><input price="'+price+'" mgoods_id="'+mgoods_id+'" min_price="'+_this.goods.min_price+'" act_discount_id="'+_this.goods.act_discount_id+'" type="text" class="uinput2 uinput-35 cnum" value="1"><a href="javascript:;" class="uplus cbtnplus"><i class="am-icon-plus"></i></a></li><li class="am-u-lg-2">';
          }else{
            addhtml += '<li class="am-u-lg-4 gtext-overflow" title="'+product+'">'+product+'</li><li class="am-u-lg-2"><span>'+_this.goods.min_price+'</span>元</li><li class="am-u-lg-2"><a href="javascript:;" class="udec cbtndec"><i class="am-icon-minus"></i></a><input price="'+price+'" sgoods_id="'+sgoods_id+'" type="text" class="uinput2 uinput-35 cnum" value="1"><a href="javascript:;" class="uplus cbtnplus"><i class="am-icon-plus"></i></a></li><li class="am-u-lg-2">';
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
            $(".uright .cworker").selected();
          })
        })
      // $("#umoney .uright .cnum").on("input propertychange",jisuan);
      // goodsPrice(mgoods_id,sgoods_id);
    };
    this.goodsDelete = function(){
      $(this).parent().parent().remove();
      // jisuan();
    }
    this.goodsPrice = function(goods_id,goods_type){
      var dtd = $.Deferred();// 新建一个Deferred对象
      var _self = this;
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
          act_discount_id:_self.card_act_discount
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
          _self.goods = res;
          dtd.resolve();
        }
      });
      return dtd.promise();
    }
    this.mcomboAdd = function(){

    }
    this.ticketAdd = function(){

    }
    this.allGoodsPrice = function(){
      
    }
  }

  var pay = new Pay();
  pay.cardActDiscount(2);//初始化活动
  // 会员卡搜索
  $('#uworkbench .ccardsearch').on('click', function(event){
    pay.cardSearch(event);
  });
  // 会员卡选择（多个时）
  $('#uworkbenchm1 .ccard_list').on('change', function(event){
     pay.cardSelect(event);
  })
  // 选中会员卡
  $('#uworkbenchm1 .ccardsubmit').on('click', function(){
    pay.cardChecked();
  })
  // 商品搜索
  $('#uworkbench .uleft #tab1 .cgoodssearch').on('click', function(){
    pay.goodsSearch();
  });
  // 添加商品
  $('#uworkbench .uleft #tab1 .cadd').on('click', function(event){
    pay.goodsAdd(event);
  });
  //删除商品,套餐商品,券
  $(document).on("click",".cdel", pay.goodsDelete);

  $('.cpayopen').on('click', function(){
    $('#uworkbenchm2').modal('open');
  })

  //付款方式
  $('#uworkbenchm2 .upay').on('click',function(){
    $(this).addClass('upay-active').siblings().removeClass('upay-active');
  });


  // //套餐
  // /*function cadd2(){
  //   var content = $(this).prev().text();
  //   var mgoods_id = $(this).prev().attr('mgoods_id');
  //   var mgoods_count = $(this).prev().attr('mgoods_count');
  //   var card_mcombo_id = $(this).prev().attr('card_mcombo_id');
  //   var mcombo_id = $(this).parent().attr('mcombo_id');
  //   var flag = true;
  //   $('.cnum2').each(function(){
  //     if(mcombo_id == $(this).attr('mcombo_id') && mgoods_id == $(this).attr('mgoods_id')){
  //       flag = false;
  //     }
  //   });
  //   if(!flag){
  //     return false;//添加过了后面不在执行
  //   }
  //   var addhtml = '';
  //   addhtml ='<li><div class="ub1">'+content+'(<span class="gtext-green">套餐</span>)</div><div class="ub2"><a href="javascript:;" class="ufont1 cbtndec"><i class="am-icon-minus"></i></a>&nbsp;<input card_mcombo_id="'+card_mcombo_id+'" mcombo_id="'+mcombo_id+'" mgoods_count="'+mgoods_count+'" mgoods_id="'+mgoods_id+'" class="am-form-field uinput uinput-max cnum2" type="text" placeholder="" value="1">&nbsp;<a href="javascript:;" class="ufont1 cbtnplus"><i class="am-icon-plus"></i></a></div><div class="ub3 cdel" mcombo_id="'+mcombo_id+'" mgoods_id="'+mgoods_id+'"><a href="javascript:;">移除</a></div></li>';
  //   $(".uright .ub").append(addhtml);
  //   //限制数量不超标和非数字
  //   $("#umoney .uright .cnum2").on("input propertychange",function(){
  //       if(isNaN($(this).val())){
  //         $(this).val(0);
  //       }
  //       if(parseInt($(this).val())>parseInt($(this).attr('mgoods_count'))){
  //         $(this).val(parseInt($(this).attr('mgoods_count')));
  //       }
  //   });
  // }*/
  // //奖券
  // /*function cadd3(){
  //   var content = $(this).prev().text();
  //   var ticket_id = $(this).parent().attr('ticket_id');
  //   var ticket_type = $(this).parent().attr('ticket_type');
  //   var ticket_limit = Number($(this).parent().attr('ticket_limit'));
  //   var ticket_value = Number($(this).parent().attr('ticket_value'));
  //   var ticket_money_id = $(this).parent().attr('ticket_money_id');
  //   var ticket_goods_id = $(this).parent().attr('ticket_goods_id');
  //   var mgoods_id = $(this).parent().attr('mgoods_id');
  //   var now_money = Number($('.cmoney2').text());
  //   var flag = true;
  //   $('.cnum3').each(function(){
  //     if(ticket_id == $(this).attr('ticket_id')){
  //       flag = false;
  //     }
  //   })
  //   if(!flag){
  //     return false;//添加过了后面不在执行
  //   }
  //   if(ticket_type==1){
  //     $(".cnum3[ticket_type='1']").each(function(){
  //       now_money = now_money - Number($(this).attr('ticket_limit'));
  //     });
  //     if(now_money>=ticket_limit){
  //       var addhtml = '';
  //       addhtml ='<li><div class="ub1">'+content+'</div><div class="ub2"><input ticket_money_id="'+ticket_money_id+'" ticket_id="'+ticket_id+'" ticket_value="'+ticket_value+'" ticket_limit="'+ticket_limit+'" ticket_type="'+ticket_type+'" class="cnum3" type="hidden"></div><div class="ub3 cdel" ticket_id="'+ticket_id+'"><a href="javascript:;">移除</a></div></li>';
  //       $(".uright .ub").append(addhtml);
  //       jisuan();
  //     }else{
  //       $('#ualert .ctext').html("<span class='gtext-orange am-text-large'>消费金额不足，无法使用此代金券!!!</span>");
  //       $('#ualert').modal('open');
  //       return false;
  //     }
  //   }else{
  //     var addhtml = '';
  //     addhtml ='<li><div class="ub1">'+content+'</div><div class="ub2"><input ticket_goods_id="'+ticket_goods_id+'" ticket_id="'+ticket_id+'" ticket_type="'+ticket_type+'" mgoods_id="'+mgoods_id+'" class="cnum3" type="hidden"></div><div class="ub3 cdel" ticket_id="'+ticket_id+'"><a href="javascript:;">移除</a></div></li>';
  //     $(".uright .ub").append(addhtml);
  //     jisuan();
  //   }
  // }*/
</script>
</body>
</html>
