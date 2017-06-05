<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>
<!-- content -->
<div class="gcontent" id="convert">
  <ul class="am-nav am-nav-pills ubread">
    <li class="am-active"><a href="javascript: void(0);">积分换礼</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="utools">
    <form class="am-form-inline uform2">
      <div class="am-form-group">
        <input type="text" class="am-form-field uinput uinput140" placeholder="卡号/手机号/姓名" name="">
      </div>
      <div class="am-form-group search">
        <button type="button" class="am-btn ubtn-search">
          <i class="iconfont icon-search"></i>搜索
        </button>
      </div>
      <div class="am-form-group ua">
        <div>
          <span>会员号：1111</span><span>手机：4235234545</span><span>积分：1111分</span>
        </div>
        <div>
          <span>会员号：2222</span><span>手机：12345678901</span><span>积分：2222分</span>
        </div>
        <div>
          <span>会员号：333</span><span>手机：4534534656</span><span>积分：3333分</span>
        </div>
      </div>
      <div class="am-form-group next">
        <button type="button" class="am-btn ubtn-search">
          <i class="iconfont icon-question"></i>下一个
        </button>
      </div>
    </form>
    <button class="am-btn ubtn-sure ubtn-blue" data-am-modal="{target:'#uconvertm1'}">
      <i class="iconfont icon-question"></i>
      兑换礼品
    </button>
  </div>
  <div class="gspace15"></div>
  <table class="am-table am-table-bordered am-table-hover am-table-compact utable1">
    <thead>
      <tr>
        <td>日期</td>
        <td>会员卡号</td>
        <td>名称</td>
        <td>兑换内容</td>
        <td>兑换积分</td>
        <td style="width:8%">操作</td>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>2017-6-6</td>
        <td>123456789012</td>
        <td>打折卡</td>
        <td>菜刀</td>
        <td>100分</td>
        <td>
          <button class="am-btn ubtn-table ubtn-gray cdel">
            <i class="iconfont icon-shanchu"></i>
            删除
          </button> 
        </td>
      </tr>
      <tr>
        <td>2017-6-4</td>
        <td>123456789043</td>
        <td>优惠卡</td>
        <td>剪刀</td>
        <td>90分</td>
        <td>
          <button class="am-btn ubtn-table ubtn-gray cdel">
            <i class="iconfont icon-shanchu"></i>
            删除
          </button> 
        </td>
      </tr>
    </tbody>
  </table>
</div>
<!-- 礼品兑换弹出框 -->
<div id="uconvertm1" class="am-modal" tabindex="-1">
  <div class="am-modal-dialog umodal">
    <div class="am-modal-hd uhead">礼品兑换
      <a href="javascript:void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd umain1">
      <form class="am-form am-form-horizontal">
        <div class="uleft">
          <div class="ua">当前积分：<span>1200</span>分</div>
          <div class="ub">扣除积分：<input type="text" class="am-form-field uinput uinput-max" value=0 placeholder=""> 分</div>
          <div class="uc">兑换礼品</div>
          <table class="am-table am-table-bordered am-table-centered am-table-hover am-table-compact ud" id="tb">
          </table> 
          <div class="ue">剩余积分：<span>1200</span>分</div>
        </div>
        <div class="uright">
          <div class="ua">礼品列表</div>
          <table class="am-table am-table-bordered am-table-hover am-table-compact">
            <thead>
              <tr>
                <td>礼品名称</td>
                <td>积分数</td>
                <td>操作</td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>香皂</td>
                <td><span>80</span>分</td>
                <td class="add">
                  <a href="#">选择</a>
                </td>
              </tr>
              <tr>
                <td>香皂</td>
                <td><span>100</span>分</td>
                <td class="add">
                  <a href="#">选择</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </form>
    </div>
    <div class="am-modal-footer ufoot">
      <div class="am-btn-group">
        <button type="button" class="am-btn ubtn-sure ubtn-green"><i class="iconfont icon-yuanxingxuanzhong"></i>
          完成
        </button>
      </div>
    </div>
  </div>
</div>
<!-- 删除按钮弹出框 -->
<div id="cconfirm" class="am-modal am-modal-confirm" tabindex="-1">
  <div class="am-modal-dialog uconfirm">
    <div class="am-modal-hd uhead"><b>删&nbsp;&nbsp;&nbsp;&nbsp;除&nbsp;&nbsp;&nbsp;&nbsp;提&nbsp;&nbsp;&nbsp;&nbsp;醒</b></div>
    <div class="am-modal-bd">
      你，确定要删除这条记录吗？
    </div>
    <div class="am-modal-footer">
      <span class="am-modal-btn" data-am-modal-cancel>取消</span>
      <span class="am-modal-btn" data-am-modal-confirm>确定</span>
    </div>
  </div>
</div>
<script src="../js/jquery.min.js"></script>
<script src="../js/amazeui.min.js"></script>
<script type="text/javascript">
$(function() {
  $('.cdel').on('click', function() {
    $('#cconfirm').modal({
      relatedTarget: this,
      onConfirm: function(options) {
        $(this.relatedTarget).parent('td').parent('tr').remove();
      },
      onCancel: function() {
        return;
      }
    });
  });
});

//会员卡查询
$(function() {
  $(".utools .ua").css({'display':'none'});
  $(".utools .next").css({'display':'none'});
  $(".search").click(function(){
    $(".utools .next").css({'display':'inline-block'});
    $(".utools .ua").css({'display':'inline-block'});
    $(".utools .ua div").css({'display':'none'});
    $(".utools .ua div").eq(0).css({'display':'inline-block'});
    var a=1;
    var b=$('.utools .ua').children('div').length;
    $(".next").click(function(){
      $(".ua div").eq(a).css({'display':'inline-block'}).siblings().css({'display':'none'});
      a=a+1;
      if(a == b){a=0;}
    });
  });
});

//扣除积分
var dedintegration=0;
//获得当前积分
var curintegration= $(".uleft .ua span").text();
//剩余积分
var surintegration = $(".uleft .ue span").text();
// 添加功能
$(function() {
  $('.add').on('click', function(){
    var product = $(this).siblings().eq(0).text();
    var integration = $(this).siblings().eq(1).children().eq(0).text();
    //当前需要扣除的积分
    dedintegration = dedintegration*1 + integration*1;
    //剩余积分
    surintegration = curintegration*1 - dedintegration*1;
    var trhtml = '<tr><td>'+product+'</td><td><span>'+integration+'</span>积分</td><td id="cclose"><a href="javascript:;"><img src="../img/close.jpg"></a></td></tr>';
    $("#tb").append(trhtml);
    $(".uleft .ub input").val(dedintegration);
    $(".uleft .ue span").text(surintegration);
  });
});

// 删除功能
$(document).on("click","#cclose",function(){
  var integration = $(this).siblings().eq(1).children().eq(0).text();
  //console.log(integration);
  //更改扣除的积分
  dedintegration = dedintegration*1 - integration*1;
  $(".uleft .ub input").val(dedintegration);
  //更改剩余积分
  surintegration = surintegration*1 + integration*1;
  console.log(surintegration);
   $(".uleft .ue span").text(surintegration);
  $(this).parent().remove();
});
</script>
</body>
</html>
