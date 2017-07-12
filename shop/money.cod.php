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
        <img src="../img/li.jpg">
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
          <li><font>车牌号码：</font><span class="ccard_carid"></span></li>
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
              <li class="uc1">代金券</li>
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
    <div class="am-u-lg-6 umain2">当前活动：| <?php foreach($this->_data['act_discount_list'] as $row){
      echo $row['act_discount_name']." | ";
      }?><?php foreach($this->_data['act_decrease_list'] as $row){
      echo $row['act_decrease_name']." | ";
      }?><?php foreach($this->_data['act_give_list'] as $row){
      echo $row['act_give_name']." | ";
      }?></div>
    <div class="am-u-lg-6 umain3">共计<span class="cgoods_num">0</span>件a，原价<span class="gtext-orange call_money">0.0</span>元，优惠后<span class="gtext-orange crel_money">0.0</span>元</div> 
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
        <span class="gtext-orange uc2c">188.0
        </span>　
        <label class="uc2d">元
        </label>　　
        <label class="umodal-label am-form-label uc2e" for="">支付方式：</label>
        <label class="am-radio-inline">
          <input type="radio" name="radio1" value="male" data-am-ucheck> 现金
        </label>
        <label class="am-radio-inline">
          <input type="radio" name="radio1" value="female" data-am-ucheck> 会员卡
        </label>
        <label class="am-radio-inline">
          <input type="radio" name="radio1" value="female" data-am-ucheck> 支付宝
        </label>
        <label class="am-radio-inline">
          <input type="radio" name="radio1" value="female" data-am-ucheck> 微信
        </label>
        <label class="am-radio-inline">
          <input type="radio" name="radio1" value="female" data-am-ucheck> POS
        </label>
      </div>
      <div class="am-u-lg-2 uc3" style="">
        <button class="am-btn ubtn-pay">
          结账
        </button>
      </div>
    </form>
  </div>
</div>

    
<script src="../js/jquery.min.js"></script>
<script src="../js/amazeui.min.js"></script>
<script type="text/javascript">
$(function(){


  var goods = [];
  // <?php //foreach($this->_data['act_discount_list'] as $row){
  //   foreach($row['arrgoods'] as $k=>$v){
  //     echo "var json = {'mgoods_id':".$v['mgoods_id'].",'price':".$v['act_discount_goods_price'].",'discout':".$v['act_discount_goods_value']."}";
  //     echo "goods.push(json)";
  //   }
  // }
  // ?>
  console.log(goods);

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
    $(this).unbind("click"); //移除click
    var product = $(this).prev().text();
    var price = $(this).prev().attr('price');
    var cprice = $(this).prev().attr('cprice');
    var mgoods_id = $(this).parent().attr('mgoods_id');
    var sgoods_id = $(this).parent().attr('sgoods_id');
    var addhtml = '';
    if(mgoods_id!=null){
      addhtml ='<li><div class="ub1">'+product+'</div><div class="ub2"><a href="javascript:;" class="ufont1 cbtndec"><i class="am-icon-minus"></i></a>&nbsp;<input price="'+price+'" cprice="'+cprice+'" mgoods_id="'+mgoods_id+'" class="am-form-field uinput uinput-max cnum" type="text" placeholder="" value="1">&nbsp;<a href="javascript:;" class="ufont1 cbtnplus"><i class="am-icon-plus"></i></a></div><div class="ub3 cdel" mgoods_id="'+mgoods_id+'"><a href="javascript:;">移除</a></div></li>';
    }
    if(sgoods_id!=null){
      addhtml ='<li><div class="ub1">'+product+'</div><div class="ub2"><a href="javascript:;" class="ufont1 cbtndec"><i class="am-icon-minus"></i></a>&nbsp;<input price="'+price+'" cprice="'+cprice+'" sgoods_id="'+sgoods_id+'" class="am-form-field uinput uinput-max cnum" type="text" placeholder="" value="1">&nbsp;<a href="javascript:;" class="ufont1 cbtnplus"><i class="am-icon-plus"></i></a></div><div class="ub3 cdel" sgoods_id="'+sgoods_id+'"><a href="javascript:;">移除</a></div></li>';
    }
    $(".uright .ub").append(addhtml);
    jisuan()
    // $.ajax({
    //   url:'card_mcombo_ajax.php',
    //   data:{
    //     mcombo_id:mcombo_id
    //   },
    //   type:"GET",
    //   dataType:"json"
    // }).then(function(res){
    //   var cont = '';
    //   $.each(res,function(k,v){
    //     cont +=v.mgoods_name+v.mcombo_goods_count+'次,';
    //   })
    //   cont = cont.substr(0,cont.length-1);
    //   var addtr = '<tr><td>'+product+'</td><td>'+cont+'</td><td><span class="gtext-orange">￥'+price+'</span></td><td><a href="javascript:;" class="uc2a cbtndec"><i class="am-icon-minus"></i></a><input type="text" class="uinput2 uinput-35 cnum" mcombo_id="'+mcombo_id+'" value="1"><a href="javascript:;" class=" uc2b cbtnplus"><i class="am-icon-plus"></i></a></td><td><a href="javascript:;" class="am-text-primary cdel" mcombo_id="'+mcombo_id+'">移除</a></td></tr>'
    //   $('#ucardm4 table tbody').append(addtr);
    // }).then(function(){
    //   jisuan()
    //   $("#ucardm3 .uright .cnum").on("input propertychange",jisuan2);
    //   $("#ucardm4 .cnum").on("input propertychange",jisuan2);
    // })
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
        $('#umoney .ua .ua2 .ccard_name').text('');
        $('#umoney .ua .ua2 .ccard_phone').text('');
        $('#umoney .ua .ua2 .ccard_type').text('');
        $('#umoney .ua .ua2 .ccard_discount').text('');
        $('#umoney .ua .ua2 .ccard_ymoney').text('');
        $('#umoney .ua .ua2 .ccard_edate').text('');
        $('#umoney .ua .ua2 .ccard_shop').text('');
        $('#umoney .ua .ua2 .ccard_birthday').text('');
        $('#umoney .ua .ua2 .ccard_score').text('');
      }
      $.each(res,function(key,val){
        $('#umoney .ua .ua2 .ccard_id').val(val.card_id);
        $('#umoney .ua .ua2 .ccard_code').text(val.card_code);
        $('#umoney .ua .ua2 .ccard_name').text(val.card_name);
        $('#umoney .ua .ua2 .ccard_phone').text(val.card_phone);
        $('#umoney .ua .ua2 .ccard_type').text(val.c_card_type_name);
        $('#umoney .ua .ua2 .ccard_discount').text(val.c_card_type_discount);
        $('#umoney .ua .ua2 .ccard_ymoney').text(val.s_card_ymoney);
        $('#umoney .ua .ua2 .ccard_edate').text(val.edate);
        $('#umoney .ua .ua2 .ccard_shop').text(val.shop_name);
        $('#umoney .ua .ua2 .ccard_birthday').text(val.birthday);
        $('#umoney .ua .ua2 .ccard_score').text(val.s_card_score);
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
            if(v.card_mcombo_type==1){
              var addli = '<li class="uc1">'+v.mcombo_name+'('+v.card_mcombo_ccount+')</li>';
            }else if(v.card_mcombo_type==2){
              var addli = '<li class="uc2"><div class="uc2a">'+v.mgoods_name+'('+v.mgoods_price+')</div><div class="uc2b cadd"><a href="#">添加</a></div></li>'
            }
            $('#umoney .ub .uleft #tab2 .uc').append(addli);
          })
        }else{
          $('#umoney .ub .uleft #tab2 .uc li').remove();
        }
      })
    }).then(function(){
      // 
      // <li class="uc1">茶水/毛尖</li>
      // <li class="uc2">
      //   <div class="uc2a">普洱（38元）普洱普洱普洱普洱普洱普普洱普洱普洱普洱普洱普普洱普洱普洱普洱普洱普普洱普洱普洱普洱普洱普</div>
      //   <div class="uc2b cadd"><a href="#">添加</a></div>
      // </li>
      var url = "card_myticket_ajax.php";
      var data = {
          card_id:$('#umoney .ua .ua2 .ccard_id').val()
      }
      $.getJSON(url,data,function(res){
        // console.log(res);
        if(res.length>0){
          $.each(res,function(k,v){
            if(v.ticket_type==1){
              var addli = '<li class="uc2"><div class="uc2a">'+v.ticket_name+'('+v.ticket_value+')</div><div class="uc2b cadd"><a href="#">添加</a></div></li>';
              $('#umoney .ub .uleft #tab3 .uc .uc1').after(addli);
            }else if(v.ticket_type==2){
              // var addli = '<li class="uc2"><div class="uc2a">'+v.mgoods_name+'('+v.mgoods_price+')</div><div class="uc2b cadd"><a href="#">添加</a></div></li>'
            }
          })
        }else{
          $('#umoney .ub .uleft #tab3 .uc li.uc2').remove();
        }
      })
      $("#umoney .ccard_submit").attr('disabled',false);
    })
  }
  function jisuan(){
    var all_money = 0;
    var num = 0;
    // $("#ucardm4 .cnum").each(function(k,v){
    //   var json = {'id':$(this).attr('mcombo_id'),'num':$(this).val()};
    //   arr.push(json);
    // });
    var discount = Number($("#money .ccard_discount").text());
    $("#umoney .uright .cnum").each(function(){
      if($("#umoney .ccard_id").val().length==0){

      }
      all_money = Number(all_money) + Number($(this).val())*Number($(this).attr('price'));
      num = Number(num) + Number($(this).val());
    });
    $("#umoney .call_money").text(all_money);
    // $("#money .cpay").val(all_money);
    // $("#money .relmoney").text(all_money);
    $("#umoney .cgoods_num").text(num);
  }
  //会员查询
  $('.ccard_submit').on('click',searchCard);
  //商品查询
  $('.cgoodssubmit').on('click',searchGoods);
  // 添加商品
  $('#umoney .ub .uleft #tab1 .cadd').on('click', cadd);
  //删除
  $(document).on("click",".cdel",function(){
    var mgoods_id = $(this).attr('mgoods_id');
    var sgoods_id = $(this).attr('sgoods_id');
    $(this).parent().remove();
    if(mgoods_id!=null){
      $("#umoney .ub .uleft #tab1 [mgoods_id="+mgoods_id+"]").find(".cadd").bind('click',cadd);
    }
    if(sgoods_id!=null){
      $("#umoney .ub .uleft #tab1 [sgoods_id="+sgoods_id+"]").find(".cadd").bind('click',cadd);
    }
  });

  // + -
  $(document).on("click", ".cbtndec", function() {
    var _self= $(this).siblings('input');
    if(parseInt(_self.val())>=1)
      _self.val(parseInt(_self.val())-1);
  });
  $(document).on("click", ".cbtnplus", function() {
    var _self= $(this).siblings('input');
    _self.val(parseInt(_self.val())+1);
  });
})
</script>
</body>
</html>
