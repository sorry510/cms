<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>

<!-- content -->
<div id="umoney" class="gcontent">
  <div class="ua">
    <div class="gspace10"></div>
    <form class="am-form-inline ua1 cform1">
      <div class="am-form-group ua1a">
        <input class="am-form-field uinput ccard_search" type="text" placeholder="卡号/手机号/姓名" name="search" >
        <button type="button" class="am-btn ubtn-search ccard_submit">
          <span class="gtext-yellow">F1</span><i class="iconfont icon-search"></i>查询
        </button>
      </div>
    </form>
    <div class="ua2">
      <span class="ua2a">会员基本信息</span>
      <div class="am-form-file ua2b">
        <img src="../img/li.jpg" class="cphoto">
        <ul style="padding-left: 0;margin-left: 6%;">
          <li><font>卡号：</font><a href="javascript:void" class="ccard_code"></a></li>
          <li><font>姓名：</font><span class="ccard_name"></span></li>
          <li><font>手机：</font><span class="ccard_phone"></span></li>
          <li><font>类型：</font><span class="ccard_type"></span>（<span class="gtext-orange ccard_discount"></span>折）</li>
          <li><font>余额：</font><span class="gtext-orange ccard_ymoney" style="font-weight: bold;"></span>元</li>
        </ul>
        <div class="gspace10" style="clear: both;"></div>
        <div>
          <button class="am-btn ubtn-table ubtn-deepbule">
            充值
          </button>
          &nbsp;
          <button class="am-btn ubtn-table ubtn-deepbule">
            买套餐
          </button>
          &nbsp;
          <button class="am-btn ubtn-table ubtn-deepbule">
            送优惠券
          </button>
          &nbsp;
          <button class="am-btn ubtn-table ubtn-deepbule">
            绑微信
          </button>
        </div>
        <div class="gspace10"></div>
        <ul style="padding-left: 0px;">
          <li><font>到期时间：</font><span class="ccard_edate"></span></li>
          <li><font>开卡店铺：</font><span class="ccard_shop"></span></li>
          <li><font>车牌号码：</font><span class="ccard_carcode"></span></li>
          <li><font>生　　日：</font><span class="ccard_birthday"></span></li>
          <li><font>积分剩余：</font><span class="ccard_score"></span></li>
          <li><font>累计消费：</font><span class="ccard_cash"></span></li>
          <li><font>累计赠送：</font><span class="ccard_give"></span></li>
          <li><font>会员备注：</font><span class="ccard_memo"></span></li>
          <input type="hidden" class="ccard_id" value="">
        </ul>
      </div>
    </div>
  </div>
  <div class="ub">
    <div class="am-modal-bd umain1">
      <div class="am-tabs uleft" data-am-tabs="{noSwipe: 1}">
        <ul class="am-tabs-nav am-nav am-nav-tabs">
          <li class="am-active"><a href="#tab1">可选商品</a></li>
          <li><a href="#tab2">我的套餐</a></li>
          <li><a href="#tab3">我的优惠券</a></li>
        </ul>
        <div class="am-tabs-bd">
          <div class="am-tab-panel am-active" id="tab1">
            <div class="ua"><span class="ua1">分类/名称</span><span class="ua2">操作</span></div>
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
                  <input name="search" class="am-form-field uinput uinput-max csearch" type="text" placeholder="">
                </div>
                <div class="umodal-search ub2">
                  <button type="button" class="am-btn ubtn-search2 ubtn-green cgoodssubmit">
                    <span class="gtext-yellow">F2</span><i class="iconfont icon-search"></i>
                    查询
                  </button>
                </div>
              </div>
            <ul class="uc">
            <?php foreach($this->_data['mgoods_list'] as $row) { ?>
              <li class="uc1" mgoods_type="<?php echo $row['mgoods_catalog_id'];?>"><?php echo $row['mgoods_catalog_name'];?></li>
              <?php foreach($row['mgoods'] as $row2){ ?>
                <li class="uc2" mgoods_id="<?php echo $row2['mgoods_id'];?>">
                  <div class="uc2a" price="<?php echo $row2['mgoods_price'];?>" cprice="<?php echo $row2['mgoods_cprice'];?>"><?php echo $row2['mgoods_name']."(".$row2['mgoods_price'].")";?></div>
                  <div class="uc2b cadd"><a href="#">添加</a></div>
                </li>
              <?php } ?>
            <?php }?>
            <?php foreach($this->_data['sgoods_list'] as $row) { ?>
              <li class="uc1" sgoods_type="<?php echo $row['sgoods_catalog_id'];?>"><?php echo $row['sgoods_catalog_name'];?></li>
              <?php foreach($row['sgoods'] as $row2){ ?>
                <li class="uc2" sgoods_id="<?php echo $row2['sgoods_id'];?>">
                  <div class="uc2a" price="<?php echo $row2['sgoods_price'];?>" cprice="<?php echo $row2['sgoods_cprice'];?>"><?php echo $row2['sgoods_name']."(".$row2['sgoods_price'].")";?></div>
                  <div class="uc2b cadd"><a href="#">添加</a></div>
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
      <div class="uright">
        <div class="ua">已选择商品<span style="float:right;">（数量默认为1）</span></div>
        <ul class="ub-head">
          <li class="ub-head1">名称</li>
          <li class="ub-head2">数量</li>
          <li class="ub-head2">操作</li>
        </ul>
        <ul class="ub">
        </ul>
      </div>
    </div>
    <div class="am-u-lg-7 umain2">当前活动：| <span class="cact_name"><?php foreach($this->_data['act_discount_list'] as $row){
      echo $row['act_discount_name']." | ";
      }?><?php foreach($this->_data['act_decrease_list'] as $row){
      echo $row['act_decrease_name']." | ";
      }?><?php foreach($this->_data['act_give_list'] as $row){
      echo $row['act_give_name']." | ";
      }?></span></div>
    <div class="am-u-lg-5 umain3">共计<span class="cgoods_num">0</span>件，原价<span class="gtext-orange cmoney1">0.0</span>元，优惠后<span class="gtext-orange cmoney2">0.0</span>元</div> 
  </div>
  <div style="clear: both;"></div>
  <div class="uc">
    <form>
      <div class="am-u-lg-1 uc1">
        <button class="am-btn ubtn-guadan">
          挂单
        </button>
      </div>
      <div class="am-u-lg-8 uc2">
        <label class="am-checkbox-inline uc2a">
         <input type="checkbox"  value="" data-am-ucheck> <span>免单</span>　　
        </label>
        <label class="uc2b">实收金额：
        </label>
        <input type="text" class="am-form-field gtext-orange uc2c cmoney3">
        <input type="hidden" class="cmoney2-2">
        <input type="hidden" class="cact_decrease_id">
        <label class="uc2d">元
        </label>　　
        <label class="umodal-label am-form-label uc2e" for="">支付方式：</label>
        <label class="am-radio-inline">
          <input type="radio" name="payType" value="1" data-am-ucheck checked> 现金
        </label>
        <label class="am-radio-inline">
          <input type="radio" name="payType" value="2" data-am-ucheck> 银行卡
        </label>
        <label class="am-radio-inline">
          <input type="radio" name="payType" value="3" data-am-ucheck> 支付宝
        </label>
        <label class="am-radio-inline">
          <input type="radio" name="payType" value="4" data-am-ucheck> 微信
        </label>
        <label class="am-radio-inline">
          <input type="radio" name="payType" value="5" data-am-ucheck> 会员卡
        </label>
      </div>
      <div class="am-u-lg-2 uc3">
        <button type="button" class="am-btn ubtn-pay cpay">
          结账
        </button>
      </div>
    </form>
  </div>
</div>
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
    
<script src="../js/jquery.min.js"></script>
<script src="../js/amazeui.min.js"></script>
<script type="text/javascript">
$(function(){
  var act_discount_id = [];//限时打折活动id
  var act_decrease_id = [];//满减
  var act_give_id = [];//满送活动
  var use_act_decrease_id = [];
  var json1 = {};
  <?php foreach($this->_data['act_discount_list'] as $k => $v){?>
    act_discount_id[<?php echo $k;?>] = <?php echo $v['act_discount_id'];?>;
  <?php }?>
  <?php foreach($this->_data['act_decrease_list'] as $k => $v){?>
    json1 ={'act_decrease_id':'<?php echo $v['act_decrease_id'];?>','act_decrease_man':'<?php echo $v['act_decrease_man'];?>','act_decrease_jian':'<?php echo $v['act_decrease_jian'];?>'};
    act_decrease_id.push(json1);
  <?php }?>
  <?php foreach($this->_data['act_give_list'] as $k => $v){?>
    act_give_id[<?php echo $k;?>] = <?php echo $v['act_give_id'];?>;
  <?php }?>

  // f11,f12
  $(document).keyup(function(e){
      var e = window.event || e || e.which;
      if(e.keyCode==112){
        searchGoods();
        e.keyCode =0;
        return false;
      }
      if(e.keyCode==113){
        searchGoods();
      }
      // console.log(e.keyCode);
  });

  //添加商品
  function cadd(){
    var product = $(this).prev().text();
    var price = $(this).prev().attr('price');
    var cprice = $(this).prev().attr('cprice');
    var mgoods_id = $(this).parent().attr('mgoods_id');
    var sgoods_id = $(this).parent().attr('sgoods_id');
    var flag = true;
    $('.cnum').each(function(){
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
    var addhtml = '';
    if(mgoods_id != undefined){
      addhtml ='<li><div class="ub1">'+product+'</div><div class="ub2"><a href="javascript:;" class="ufont1 cbtndec"><i class="am-icon-minus"></i></a>&nbsp;<input price="'+price+'" mgoods_id="'+mgoods_id+'" class="am-form-field uinput uinput-max cnum" type="text" placeholder="" value="1">&nbsp;<a href="javascript:;" class="ufont1 cbtnplus"><i class="am-icon-plus"></i></a></div><div class="ub3 cdel" mgoods_id="'+mgoods_id+'"><a href="javascript:;">移除</a></div></li>';
    }
    if(sgoods_id != undefined){
      addhtml ='<li><div class="ub1">'+product+'</div><div class="ub2"><a href="javascript:;" class="ufont1 cbtndec"><i class="am-icon-minus"></i></a>&nbsp;<input price="'+price+'" sgoods_id="'+sgoods_id+'" class="am-form-field uinput uinput-max cnum" type="text" placeholder="" value="1">&nbsp;<a href="javascript:;" class="ufont1 cbtnplus"><i class="am-icon-plus"></i></a></div><div class="ub3 cdel" sgoods_id="'+sgoods_id+'"><a href="javascript:;">移除</a></div></li>';
    }
    $(".uright .ub").append(addhtml);
    $("#umoney .uright .cnum").on("input propertychange",jisuan);
    goodsPrice(mgoods_id,sgoods_id);
    // jisuan();
  }
  //套餐
  function cadd2(){
    var content = $(this).prev().text();
    var mgoods_id = $(this).prev().attr('mgoods_id');
    var mgoods_count = $(this).prev().attr('mgoods_count');
    var card_mcombo_id = $(this).prev().attr('card_mcombo_id');
    var mcombo_id = $(this).parent().attr('mcombo_id');
    var flag = true;
    $('.cnum2').each(function(){
      if(mcombo_id == $(this).attr('mcombo_id') && mgoods_id == $(this).attr('mgoods_id')){
        flag = false;
      }
    });
    if(!flag){
      return false;//添加过了后面不在执行
    }
    var addhtml = '';
    addhtml ='<li><div class="ub1">'+content+'(<span class="gtext-green">套餐</span>)</div><div class="ub2"><a href="javascript:;" class="ufont1 cbtndec"><i class="am-icon-minus"></i></a>&nbsp;<input card_mcombo_id="'+card_mcombo_id+'" mcombo_id="'+mcombo_id+'" mgoods_count="'+mgoods_count+'" mgoods_id="'+mgoods_id+'" class="am-form-field uinput uinput-max cnum2" type="text" placeholder="" value="1">&nbsp;<a href="javascript:;" class="ufont1 cbtnplus"><i class="am-icon-plus"></i></a></div><div class="ub3 cdel" mcombo_id="'+mcombo_id+'" mgoods_id="'+mgoods_id+'"><a href="javascript:;">移除</a></div></li>';
    $(".uright .ub").append(addhtml);
    //限制数量不超标和非数字
    $("#umoney .uright .cnum2").on("input propertychange",function(){
        if(isNaN($(this).val())){
          $(this).val(0);
        }
        if(parseInt($(this).val())>parseInt($(this).attr('mgoods_count'))){
          $(this).val(parseInt($(this).attr('mgoods_count')));
        }
    });
  }
  //奖券
  function cadd3(){
    var content = $(this).prev().text();
    var ticket_id = $(this).parent().attr('ticket_id');
    var ticket_type = $(this).parent().attr('ticket_type');
    var ticket_limit = Number($(this).parent().attr('ticket_limit'));
    var ticket_value = Number($(this).parent().attr('ticket_value'));
    var ticket_money_id = $(this).parent().attr('ticket_money_id');
    var ticket_goods_id = $(this).parent().attr('ticket_goods_id');
    var mgoods_id = $(this).parent().attr('mgoods_id');
    var now_money = Number($('.cmoney2').text());
    var flag = true;
    $('.cnum3').each(function(){
      if(ticket_id == $(this).attr('ticket_id')){
        flag = false;
      }
    })
    if(!flag){
      return false;//添加过了后面不在执行
    }
    if(ticket_type==1){
      $(".cnum3[ticket_type='1']").each(function(){
        now_money = now_money - Number($(this).attr('ticket_limit'));
      });
      if(now_money>=ticket_limit){
        var addhtml = '';
        addhtml ='<li><div class="ub1">'+content+'</div><div class="ub2"><input ticket_money_id="'+ticket_money_id+'" ticket_id="'+ticket_id+'" ticket_value="'+ticket_value+'" ticket_limit="'+ticket_limit+'" ticket_type="'+ticket_type+'" class="cnum3" type="hidden"></div><div class="ub3 cdel" ticket_id="'+ticket_id+'"><a href="javascript:;">移除</a></div></li>';
        $(".uright .ub").append(addhtml);
        jisuan();
      }else{
        $('#ualert .ctext').html("<span class='gtext-orange am-text-large'>消费金额不足，无法使用此代金券!!!</span>");
        $('#ualert').modal('open');
        return false;
      }
    }else{
      var addhtml = '';
      addhtml ='<li><div class="ub1">'+content+'</div><div class="ub2"><input ticket_goods_id="'+ticket_goods_id+'" ticket_id="'+ticket_id+'" ticket_type="'+ticket_type+'" mgoods_id="'+mgoods_id+'" class="cnum3" type="hidden"></div><div class="ub3 cdel" ticket_id="'+ticket_id+'"><a href="javascript:;">移除</a></div></li>';
      $(".uright .ub").append(addhtml);
      jisuan();
    }
  }

  function searchGoods(){
    $("#umoney .ub .uc li").hide();
    $.ajax({
      url:'allgoods_search_ajax.php',
      data:{
        type: $('#umoney .ub .ub .ctype').val(),
        search:$('#umoney .ub .ub .csearch').val()
      },
      type:"GET",
      dataType:"json"
    }).then(function(res){
      $.each(res, function(key, val) {
        $("#umoney .ub .uc li[mgoods_type]").each(function(){
          //console.log($(this).attr('mgoods_type'));
          if($(this).attr('mgoods_type')==val.mgoods_catalog_id){
            $(this).show();
          }
        });
        $("#umoney .ub .uc li[sgoods_type]").each(function(){
          if($(this).attr('sgoods_type')==val.sgoods_catalog_id){
            $(this).show();
          }
        });
        if(val.mgoods!=undefined){
          $.each(val.mgoods, function(key,val){
            $("#umoney .ub .uc li[mgoods_id]").each(function(){
              if($(this).attr('mgoods_id')  == val['mgoods_id']){
                $(this).show();
              }
            });
          })
        }
        if(val.sgoods!=undefined){
          $.each(val['sgoods'], function(key,val){
            $("#umoney .ub .uc li[sgoods_id]").each(function(){
              if($(this).attr('sgoods_id') == val['sgoods_id']){
                $(this).show();
              }
            });
          })
        }
      });
    }).then(function(){
      $('.cgoodssubmit').attr('disabled',false);
    })
  }

  function searchCard(){
    $('#umoney .ub .uleft #tab2 .uc li').remove();
    $('#umoney .ub .uleft #tab3 .uc li.uc2').remove();
    var flag = false;
    if($(".ccard_search").val()!=''){
      $(this).attr('disabled',true);
    }
    $.ajax({
      url:'card_search_ajax.php',
      data:$(".cform1").serialize(),
      type:"GET",
      dataType:"json"
    }).then(function(res){
      if(res.length===0){
        $('#umoney .ua .ua2 .ccard_id').val('');
        $('#umoney .ua .ua2 .ccard_code').text('');
        $('#umoney .ua .ua2 .ccard_carcode').text('');
        $('#umoney .ua .ua2 .ccard_name').text('');
        $('#umoney .ua .ua2 .ccard_phone').text('');
        $('#umoney .ua .ua2 .ccard_type').text('');
        $('#umoney .ua .ua2 .ccard_discount').text('');
        $('#umoney .ua .ua2 .ccard_ymoney').text('');
        $('#umoney .ua .ua2 .ccard_edate').text('');
        $('#umoney .ua .ua2 .ccard_shop').text('');
        $('#umoney .ua .ua2 .ccard_birthday').text('');
        $('#umoney .ua .ua2 .ccard_score').text('');
        $('#umoney .ua .ua2 .cphoto').attr('src','../img/li.jpg');
      }else{
        //目前有多个会员时显示最后一个符合
        $.each(res,function(key,val){
          $('#umoney .ua .ua2 .ccard_id').val(val.card_id);
          $('#umoney .ua .ua2 .ccard_code').text(val.card_code);
          $('#umoney .ua .ua2 .ccard_carcode').text(val.card_carcode);
          $('#umoney .ua .ua2 .ccard_name').text(val.card_name);
          $('#umoney .ua .ua2 .ccard_phone').text(val.card_phone);
          $('#umoney .ua .ua2 .ccard_type').text(val.c_card_type_name);
          $('#umoney .ua .ua2 .ccard_discount').text(val.c_card_type_discount);
          $('#umoney .ua .ua2 .ccard_ymoney').text(val.s_card_ymoney);
          $('#umoney .ua .ua2 .ccard_edate').text(val.edate);
          $('#umoney .ua .ua2 .ccard_shop').text(val.shop_name);
          $('#umoney .ua .ua2 .ccard_birthday').text(val.birthday);
          $('#umoney .ua .ua2 .ccard_score').text(val.s_card_score);
          $('#umoney .ua .ua2 .cphoto').attr('src','http://<?php echo $GLOBALS["gconfig"]["path"]["photo_show"];?>/'+val.card_photo_file);
        });
      }
    }).then(function(){
      act_discount_id.splice(0,act_discount_id.length);//清空活动id
      act_decrease_id.splice(0,act_decrease_id.length);//清空活动id
      act_give_id.splice(0,act_give_id.length);//清空活动id
      $('#umoney .cact_name').text('');//情况活动名称
      var card_id = 0;
      var user_type = 0;
      if($('#umoney .ua .ua2 .ccard_id').val().length!=0){
        card_id = $('#umoney .ua .ua2 .ccard_id').val();
        user_type = 1;//会员
      }
      $.getJSON('act_discount_ajax.php',{card_id:card_id,user_type:user_type},function(res){
        if(res.length>0){
          $.each(res,function(k,v){
            act_discount_id[k] = v.act_discount_id;
            $('#umoney .cact_name').append(v.act_discount_name+' | ');
          });
        }
      });
      $.getJSON('act_decrease_ajax.php',{card_id:card_id,user_type:user_type},function(res){
        if(res.length>0){
          $.each(res,function(k,v){
            var json = {'act_decrease_id':v.act_decrease_id,'act_decrease_man':v.act_decrease_man,'act_decrease_jian':v.act_decrease_jian};
            act_decrease_id.push(json);
            $('#umoney .cact_name').append(v.act_decrease_name+' | ');
          });
        }
      });
      $.getJSON('act_give_ajax.php',{card_id:card_id,user_type:user_type},function(res){
        if(res.length>0){
          $.each(res,function(k,v){
            act_give_id[k] = v.act_give_id;
            $('#umoney .cact_name').append(v.act_give_name+' | ');
          });
        }
      });
    }).then(function(){
      var url = "card_mymcombo_ajax.php";
      var data = {
          card_id:$('#umoney .ua .ua2 .ccard_id').val()
      }
      $.getJSON(url,data,function(res){
        // console.log(res);
        if(res.length>0){
          $.each(res,function(k,v){
            //没有做套餐用完时怎么显示
            if(v.card_mcombo_type==1){
              var addli = '<li class="uc1" mcombo_id="'+v.mcombo_id+'">'+v.c_mcombo_name+'('+v.card_mcombo_ccount+')</li>';
            }else if(v.card_mcombo_type==2){
              var addli = '<li class="uc2" mcombo_id="'+v.mcombo_id+'"><div class="uc2a" card_mcombo_id ="'+v.card_mcombo_id+'" mgoods_id="'+v.mgoods_id+'" mgoods_count="'+v.card_mcombo_gcount+'">'+v.c_mgoods_name+'('+v.c_mgoods_price+')('+v.card_mcombo_gcount+')</div><div class="uc2b cadd2"><a href="#">添加</a></div></li>'
            }
            $('#umoney .ub .uleft #tab2 .uc').append(addli);
          })
        }else{
          $('#umoney .ub .uleft #tab2 .uc li').remove();
        }
        $('#umoney .ub .uleft #tab2 .cadd2').on('click', cadd2);
      })
    }).then(function(){
      var url = "card_myticket_ajax.php";
      var data = {
          card_id:$('#umoney .ua .ua2 .ccard_id').val()
      }
      $.getJSON(url,data,function(res){
        // console.log(res);
        if(res.length>0){
          $.each(res,function(k,v){
            if(v.ticket_type==1){
              var addli = '<li class="uc2" ticket_money_id="'+v.ticket_money_id+'" ticket_type="'+v.ticket_type+'" ticket_id="'+v.card_ticket_id+'" ticket_value="'+v.c_ticket_value+'" ticket_limit="'+v.c_ticket_limit+'"><div class="uc2a">代金券：'+v.c_ticket_name+'('+v.c_ticket_value+')</div><div class="uc2b cadd3"><a href="#">添加</a></div></li>';
              $('#umoney .ub .uleft #tab3 .uc').append(addli);
            }else{
              var addli = '<li class="uc2" ticket_goods_id="'+v.ticket_goods_id+'" mgoods_id="'+v.c_mgoods_id+'" ticket_type="'+v.ticket_type+'" ticket_id="'+v.card_ticket_id+'"><div class="uc2a">体验券：'+v.c_ticket_name+'('+v.c_ticket_value+')</div><div class="uc2b cadd3"><a href="#">添加</a></div></li>';
              $('#umoney .ub .uleft #tab3 .uc').append(addli);
            }
          })
        }else{
          $('#umoney .ub .uleft #tab3 .uc li').remove();
        }
        $('#umoney .ub .uleft #tab3 .cadd3').on('click', cadd3);
      })
    }).then(function(){
      // 添加修改商品价格
      $('#umoney .cnum').each(function(){
        if($(this).attr('mgoods_id') != undefined){
          goodsPrice2($(this).attr('mgoods_id'),1);
        }
        if($(this).attr('sgoods_id') != undefined){
          goodsPrice2($(this).attr('sgoods_id'),2);
        }
      });
    }).then(function(){
      // console.log('jisuan');
      // jisuan();
      $("#umoney .ccard_submit").attr('disabled',false);
    })
  }

  function jisuan(){
    var money1 = 0;//原价
    var money2 = 0;//优惠价
    var money3 = 0;//优惠后满减价
    var decrease_id = 0;
    var jian = 0;
    var num = 0;
    var limit_money = 0;//满减活动用于计算的money
    use_act_decrease_id.splice(0,use_act_decrease_id.length);//清空使用的满减活动
    $("#umoney .uright .cnum").each(function(){
      if(isNaN($(this).val())){
        $(this).val(0);
      }
      money1 = Number(money1) + Number($(this).val())*Number($(this).attr('price'));
      money2 = Number(money2) + Number($(this).val())*Number($(this).attr('min_price'));
      num = Number(num) + Number($(this).val());
    });
    $("#umoney .uright .cnum3").each(function(){
      var mgoods_id = $(this).attr('mgoods_id');
      var ticket_value = $(this).attr('ticket_value');
      if(mgoods_id != undefined){
        $("#umoney .uright .cnum").each(function(){
          if(mgoods_id == $(this).attr('mgoods_id')){
            money2 = Number(money2)-Number($(this).attr('min_price'));
          }
        });
      }
      if(ticket_value != undefined){
        money2 = Number(money2)-Number(ticket_value);
      }
    });
    limit_money = money2;
    if(act_decrease_id.length!=0){
      for(var i=0;i<act_decrease_id.length;){
        if(limit_money>act_decrease_id[i].act_decrease_man){
          jian = Number(jian) + Number(act_decrease_id[i].act_decrease_jian);
          limit_money = Number(limit_money) - Number(act_decrease_id[i].act_decrease_man);
          use_act_decrease_id.push(act_decrease_id[i].act_decrease_id);//新的满减活动
        }else{
          i++;
        }
      }
      //满减活动只能选一个最大的
      /*$.each(act_decrease_id,function(k,v){
        if(money2>v.act_decrease_man){
          jian = v.act_decrease_jian;
          decrease_id = v.act_decrease_id;
        }
      });*/
    }
    money3 = Number(money2)-Number(jian);
    money3 = money3.toFixed(2);
    $("#umoney .cmoney1").text(money1);
    $("#umoney .cmoney2").text(money3);
    $("#umoney .cmoney2-2").val(money2);
    $("#umoney .cact_decrease_id").val(decrease_id);
    $("#umoney .cmoney3").val(money3);
    $("#umoney .cgoods_num").text(num);
  }

  function goodsPrice2(goods_id,goods_type){
    var mgoods_id = '';
    var sgoods_id = '';
    var card_id = 0;
    if($("#umoney .ccard_id").val().length==0){
      card_id = 0;
    }else{
      card_id = $("#umoney .ccard_id").val();
    }
    if(goods_type == 1){
      mgoods_id = goods_id;
    }else if(goods_type == 2){
      sgoods_id = goods_id;
    }
    if(mgoods_id!=''){
      var data = {
        mgoods_id:mgoods_id,
        card_id:card_id,
        act_discount_id:act_discount_id
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
      type:"POST"
    }).then(function(res){
      if(mgoods_id!=''){
        $("#umoney .uright .cnum[mgoods_id='"+mgoods_id+"']").attr('min_price',res.min_price);
        $("#umoney .uright .cnum[mgoods_id='"+mgoods_id+"']").attr('act_discount_id',res.act_discount_id);
      }
      if(sgoods_id!=''){
        $("#umoney .uright .cnum[sgoods_id='"+sgoods_id+"']").attr('min_price',res.min_price);
        $("#umoney .uright .cnum[sgoods_id='"+sgoods_id+"']").attr('act_discount_id',res.act_discount_id);
      }
    }).then(jisuan);
  }

  function goodsPrice(mgoods_id,sgoods_id){
    var card_id = 0;
    if($("#umoney .ccard_id").val().length==0){
      card_id = 0;
    }else{
      card_id = $("#umoney .ccard_id").val();
    }
    var mgoods_id = (mgoods_id!=undefined)?mgoods_id:'';
    var sgoods_id = (sgoods_id!=undefined)?sgoods_id:'';
    var url = 'goods_price_ajax.php';
    if(mgoods_id!=''){
      var data = {
        mgoods_id:mgoods_id,
        card_id:card_id,
        act_discount_id:act_discount_id
      };
    }
    if(sgoods_id!=''){
      var data = {
        sgoods_id:sgoods_id,
        card_id:card_id,
      };
    }
    $.ajax({
      url:url,
      data:data,
      type:"POST",
      dataType:"json"
    }).then(function(res){
      if(mgoods_id!=''){
        $("#umoney .uright .cnum[mgoods_id='"+mgoods_id+"']").attr('min_price',res.min_price);
        $("#umoney .uright .cnum[mgoods_id='"+mgoods_id+"']").attr('act_discount_id',res.act_discount_id);
      }
      if(sgoods_id!=''){
        $("#umoney .uright .cnum[sgoods_id='"+sgoods_id+"']").attr('min_price',res.min_price);
        $("#umoney .uright .cnum[sgoods_id='"+sgoods_id+"']").attr('act_discount_id',res.act_discount_id);
      }
    }).then(jisuan);
  }
  //会员查询
  $('.ccard_submit').on('click', searchCard);
  //商品查询
  $('.cgoodssubmit').on('click', searchGoods);
  //添加商品
  $('#umoney .ub .uleft #tab1 .cadd').on('click', cadd);
  //删除商品,套餐商品,券
  $(document).on("click",".cdel",function(){
    $(this).parent().remove();
    jisuan();
  });
  //+ -
  $(document).on("click", ".cbtndec", function() {
    var _self= $(this).siblings('input');
    if(parseInt(_self.val())>=1)
      _self.val(parseInt(_self.val())-1);
    jisuan();
  });
  $(document).on("click", ".cbtnplus", function() {
    var _self= $(this).siblings('input');
    var mgoods_count = _self.attr('mgoods_count');
    if(mgoods_count != undefined){
      if(parseInt(_self.val())<parseInt(mgoods_count)){
        _self.val(parseInt(_self.val())+1);
      }
    }else{
      _self.val(parseInt(_self.val())+1);
    }
    jisuan();
  });

  //结账
  $('.cpay').on('click',function(){
    // $(this).attr('disabled',true);
    var card_id = $('#umoney .ua .ua2 .ccard_id').val();
    var money1 = Number($("#umoney .cmoney1").text());
    var money2 = Number($("#umoney .cmoney2").text());
    var money3 = Number($("#umoney .cmoney3").val());
    var pay_type = $("#umoney input[name='payType']:checked").val();
    var arr= [];//商品
    var arr2= [];//套餐商品
    var arr3= [];//优惠券
    var ticket_limit = 0;
    var url = "money_do.php";
    var max_give_value = 0;
    $("#umoney .uright .cnum3[ticket_type='1']").each(function(k,v){
        ticket_limit = Number(ticket_limit)+Number($(this).attr('ticket_limit'));
        max_give_value = $(this).attr('ticket_value')>max_give_value?$(this).attr('ticket_value'):max_give_value;
    });
    var limit_money = Number(money2) + Number(max_give_value);
    if(ticket_limit>limit_money){
      $('#ualert .ctext').html("<span class='gtext-orange am-text-large'>代金券超出限额，请重新添加代金券!!!</span>");
      $('#ualert').modal('open');
      return false;
    }
    $('#umoney .ub .uright .cnum').each(function(){
      if($(this).attr('mgoods_id')!=undefined){
        var json = {'mgoods_id':$(this).attr('mgoods_id'),'num':$(this).val(),'price':$(this).attr('min_price'),'act_discount_id':$(this).attr('act_discount_id')};
      }
      if($(this).attr('sgoods_id')!=undefined){
        var json = {'sgoods_id':$(this).attr('sgoods_id'),'num':$(this).val(),'price':$(this).attr('min_price'),'act_discount_id':$(this).attr('act_discount_id')};
      }
      arr.push(json);
    });
    $('#umoney .ub .uright .cnum2').each(function(){
      var json = {'card_mcombo_id':$(this).attr('card_mcombo_id'),'num':$(this).val()};
      arr2.push(json);
    })
    $('#umoney .ub .uright .cnum3').each(function(){
      var json = {'card_ticket_id':$(this).attr('ticket_id')};
      arr3.push(json);
    })
    if(arr.length==0 && arr2.length==0 && arr3.length == 0){
      $('#ualert .ctext').html("<span class='gtext-orange am-text-large'>请添加至少一个商品!!!</span>");
      $('#ualert').modal('open');
      return false;
    }
    var data = {
          money1:money1,
          money2:money2,
          money3:money3,
          card_id:card_id,
          arr:arr,
          arr2:arr2,
          arr3:arr3,
          arr_give:act_give_id,
          act_decrease:use_act_decrease_id,
          pay_type:pay_type
        };
    console.log(data);
    $.post(url,data,function(res){
      $('.cpay').attr('disabled',false);
      console.log(res);
      return false;
     /* if(res=='0'){
        window.location.reload();
      }else{
        alert("出错了,请联系管理员");
        $('.cpay').attr('disabled',false);
      }*/
    });
  });
})
</script>
</body>
</html>
