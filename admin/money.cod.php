<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>

<!-- content -->
<div id="umoney" class="gcontent">
  <div class="ua">
    <div class="gspace10"></div>
    <form class="am-form-inline ua1">
      <div class="am-form-group ua1a">
        <input class="am-form-field uinput" type="text" placeholder="卡号/手机号/姓名" name="" >
        <button type="submit" class="am-btn ubtn-search">
          <span class="gtext-yellow">F1</span><i class="iconfont icon-search"></i>查询
        </button>
      </div>
    </form>
    <div class="ua2">
      <span class="ua2a">会员基本信息</span>
      <div class="am-form-file ua2b">
        <img src="../img/li.jpg">
        <ul style="padding-left: 0;margin-left: 6%;">
          <li><font>卡号：</font><a href="javascript:void">100215</a></li>
          <li><font>姓名：</font>张小明</li>
          <li><font>手机：</font>13176694064</li>
          <li><font>类型：</font>钻石卡（<span class="gtext-orange">8</span>折）</li>
          <li><font>余额：</font><span class="gtext-orange" style="font-weight: bold;">1224</span>元</li>
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
          <li><font>到期时间：</font>2017-12-31</li>
          <li><font>开卡店铺：</font>大学路分店</li>
          <li><font>车牌号码：</font>100215</li>
          <li><font>生　　日：</font>1996-12-28</li>
          <li><font>积分剩余：</font>1002</li>
          <li><font>累计消费：</font>21520元</li>
          <li><font>累计赠送：</font>80元</li>
          <li><font>会员备注：</font></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="ub">
    <div class="am-modal-bd umain1">
      <div class="am-tabs utop" data-am-tabs="{noSwipe: 1}">
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
                <select class="uselect uselect-max" data-am-selected>
                  <option value="a">店铺通用型</option>
                  <option value="b">Banana</option>
                  <option value="o">Orange</option>
                  <option value="d">禁用</option>
                </select>
              </div>
              <div class="umodal-normal ub1">
                <input id="" class="am-form-field uinput uinput-max" type="text" placeholder="">
              </div>
              <div class="umodal-search ub2">
                <button type="button" class="am-btn ubtn-search2 ubtn-green">
                  <span class="gtext-yellow">F2</span><i class="iconfont icon-search"></i>
                  查询
                </button>
              </div>
            </div>
            <ul class="uc">
              <li class="uc1">茶水/毛尖</li>
              <li class="uc2">
                <div class="uc2a">普洱（38元）普洱普洱普洱普洱普洱普普洱普洱普洱普洱普洱普普洱普洱普洱普洱普洱普普洱普洱普洱普洱普洱普</div>
                <div class="uc2b cadd"><a href="#">添加</a></div>
              </li>
              <li class="uc2">
                <div class="uc2a">普洱（38元）</div>
                <div class="uc2b cadd"><a href="#">添加</a></div>
              </li>
              <li class="uc2">
                <div class="uc2a">普洱（38元）</div>
                <div class="uc2b cadd"><a href="#">添加</a></div>
              </li>
              <li class="uc1">茶水/毛尖</li>
              <li class="uc2">
                <div class="uc2a">普洱（38元）</div>
                <div class="uc2b cadd"><a href="#">添加</a></div>
              </li>
              <li class="uc1">茶水/毛尖</li>
              <li class="uc2">
                <div class="uc2a">普洱（38元）</div>
                <div class="uc2b cadd"><a href="#">添加</a></div>
              </li>              
              <li class="uc1">茶水/毛尖</li>
              <li class="uc2">
                <div class="uc2a">普洱（38元）</div>
                <div class="uc2b cadd"><a href="#">添加</a></div>
              </li>              
              <li class="uc1">茶水/毛尖</li>
              <li class="uc2">
                <div class="uc2a">普洱（38元）</div>
                <div class="uc2b cadd"><a href="#">添加</a></div>
              </li>              
              <li class="uc1">茶水/毛尖</li>
              <li class="uc2">
                <div class="uc2a">普洱（38元）</div>
                <div class="uc2b cadd"><a href="#">添加</a></div>
              </li>              
              <li class="uc1">茶水/毛尖</li>
              <li class="uc2">
                <div class="uc2a">普洱（38元）</div>
                <div class="uc2b cadd"><a href="#">添加</a></div>
              </li>              
              <li class="uc1">茶水/毛尖</li>
              <li class="uc2">
                <div class="uc2a">普洱（38元）</div>
                <div class="uc2b cadd"><a href="#">添加</a></div>
              </li>              
              <li class="uc1">茶水/毛尖</li>
              <li class="uc2">
                <div class="uc2a">普洱（38元）</div>
                <div class="uc2b cadd"><a href="#">添加</a></div>
              </li>
            </ul>
          </div>
          <div class="am-tab-panel am-fade" id="tab2">
            <div class="ua"><span class="ua1">分类/名称</span><span class="ua2">操作</span></div>
            <ul class="uc" style="height: 362px;">
              <li class="uc1">茶水/毛尖</li>
              <li class="uc2">
                <div class="uc2a">普洱（38元）普洱普洱普洱普洱普洱普普洱普洱普洱普洱普洱普普洱普洱普洱普洱普洱普普洱普洱普洱普洱普洱普</div>
                <div class="uc2b cadd"><a href="#">添加</a></div>
              </li>
              <li class="uc2">
                <div class="uc2a">普洱（38元）</div>
                <div class="uc2b cadd"><a href="#">添加</a></div>
              </li>
              <li class="uc2">
                <div class="uc2a">普洱（38元）</div>
                <div class="uc2b cadd"><a href="#">添加</a></div>
              </li>
              <li class="uc1">茶水/毛尖</li>
              <li class="uc2">
                <div class="uc2a">普洱（38元）</div>
                <div class="uc2b cadd"><a href="#">添加</a></div>
              </li>
              <li class="uc1">茶水/毛尖</li>
              <li class="uc2">
                <div class="uc2a">普洱（38元）</div>
                <div class="uc2b cadd"><a href="#">添加</a></div>
              </li>              
              <li class="uc1">茶水/毛尖</li>
              <li class="uc2">
                <div class="uc2a">普洱（38元）</div>
                <div class="uc2b cadd"><a href="#">添加</a></div>
              </li>              
              <li class="uc1">茶水/毛尖</li>
              <li class="uc2">
                <div class="uc2a">普洱（38元）</div>
                <div class="uc2b cadd"><a href="#">添加</a></div>
              </li>              
              <li class="uc1">茶水/毛尖</li>
              <li class="uc2">
                <div class="uc2a">普洱（38元）</div>
                <div class="uc2b cadd"><a href="#">添加</a></div>
              </li>              
              <li class="uc1">茶水/毛尖</li>
              <li class="uc2">
                <div class="uc2a">普洱（38元）</div>
                <div class="uc2b cadd"><a href="#">添加</a></div>
              </li>              
              <li class="uc1">茶水/毛尖</li>
              <li class="uc2">
                <div class="uc2a">普洱（38元）</div>
                <div class="uc2b cadd"><a href="#">添加</a></div>
              </li>              
              <li class="uc1">茶水/毛尖</li>
              <li class="uc2">
                <div class="uc2a">普洱（38元）</div>
                <div class="uc2b cadd"><a href="#">添加</a></div>
              </li>
            </ul>
          </div>
          <div class="am-tab-panel am-fade" id="tab3">
            <div class="ua"><span class="ua1">分类/名称</span><span class="ua2">操作</span></div>
            <ul class="uc" style="height: 362px;">
              <li class="uc1">茶水/毛尖</li>
              <li class="uc2">
                <div class="uc2a">普洱（38元）普洱普洱普洱普洱普洱普普洱普洱普洱普洱普洱普普洱普洱普洱普洱普洱普普洱普洱普洱普洱普洱普</div>
                <div class="uc2b cadd"><a href="#">添加</a></div>
              </li>
              <li class="uc2">
                <div class="uc2a">普洱（38元）</div>
                <div class="uc2b cadd"><a href="#">添加</a></div>
              </li>
              <li class="uc2">
                <div class="uc2a">普洱（38元）</div>
                <div class="uc2b cadd"><a href="#">添加</a></div>
              </li>
              <li class="uc1">茶水/毛尖</li>
              <li class="uc2">
                <div class="uc2a">普洱（38元）</div>
                <div class="uc2b cadd"><a href="#">添加</a></div>
              </li>
              <li class="uc1">茶水/毛尖</li>
              <li class="uc2">
                <div class="uc2a">普洱（38元）</div>
                <div class="uc2b cadd"><a href="#">添加</a></div>
              </li>              
              <li class="uc1">茶水/毛尖</li>
              <li class="uc2">
                <div class="uc2a">普洱（38元）</div>
                <div class="uc2b cadd"><a href="#">添加</a></div>
              </li>              
              <li class="uc1">茶水/毛尖</li>
              <li class="uc2">
                <div class="uc2a">普洱（38元）</div>
                <div class="uc2b cadd"><a href="#">添加</a></div>
              </li>              
              <li class="uc1">茶水/毛尖</li>
              <li class="uc2">
                <div class="uc2a">普洱（38元）</div>
                <div class="uc2b cadd"><a href="#">添加</a></div>
              </li>              
              <li class="uc1">茶水/毛尖</li>
              <li class="uc2">
                <div class="uc2a">普洱（38元）</div>
                <div class="uc2b cadd"><a href="#">添加</a></div>
              </li>              
              <li class="uc1">茶水/毛尖</li>
              <li class="uc2">
                <div class="uc2a">普洱（38元）</div>
                <div class="uc2b cadd"><a href="#">添加</a></div>
              </li>              
              <li class="uc1">茶水/毛尖</li>
              <li class="uc2">
                <div class="uc2a">普洱（38元）</div>
                <div class="uc2b cadd"><a href="#">添加</a></div>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="uright">
        <div class="ua">已选择商品<span style="float:right;">（数量为0代表不限数量）</span></div>
        <ul class="ub-head">
          <li class="ub-head1">名称</li>
          <li class="ub-head2">数量</li>
          <li class="ub-head2">操作</li>
        </ul>
        <ul class="ub">
          <li>
            <div class="ub1">服务一（38元）</div>
            <div class="ub2" style="padding-top:3px;">
              <a href="javascript:;" class="ufont1 cbtndec"><i class="am-icon-minus"></i></a>
              <input type="text" name="" class="uinput" value="0">
              <a href="javascript:;" class="ufont1 cbtnplus"><i class="am-icon-plus"></i></a>
            </div>
            <div class="ub3 cdel2"><a href="javascript:;">移除</a></div>
          </li>
        </ul>
      </div>
    </div>
    <div class="am-u-lg-6 umain2">当前活动：限时打折</div> 
    <div class="am-u-lg-6 umain3">共计三件，原价<span class="gtext-orange">256.0</span>元，优惠后<span class="gtext-orange">188.0</span>元</div> 
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
// 添加
$('.cadd').on('click', function(){
  var product = $(this).prev().text();
  var addhtml ='<li><div class="ub1">'+product+'</div><div class="ub2"><a href="javascript:;" class="ufont1 cbtndec"><i class="am-icon-minus"></i></a>&nbsp;<input id="" class="am-form-field uinput uinput-max" type="text" placeholder="" value="0">&nbsp;<a href="javascript:;" class="ufont1 cbtnplus"><i class="am-icon-plus"></i></a></div><div class="ub3 cdel2"><a href="javascript:;">移除</a></div></li>';
  $(".uright .ub").append(addhtml);
});


//删除
$(document).on("click",".cdel2",function(){
    $(this).parent().remove();
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
</script>
</body>
</html>
