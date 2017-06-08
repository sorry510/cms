<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>
<div id="uwechat_redpacket" class="gcontent">
  <ul class="am-nav am-nav-pills ubread">
     <li class="am-active"><a href="javascript: void(0);">微信红包活动</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="utools">
    <form class="am-form-inline uform2">
      <div class="am-form-group">
        <label for="doc-ipt-3" class="am-form-label">类型：</label>
        <select class="uselect uselect-auto" data-am-selected name="">
          <option value="all">全部</option>
          <option value="2">2</option>
          <option value="3">3</option>
        </select>
      </div>
      <div class="am-form-group">
        <label for="doc-ipt-3" class="am-form-label">时间：</label>
        <div class="am-input-group am-datepicker-date udatepicker udatepicker140" data-am-datepicker="{format: 'yyyy-mm-dd'}">
          <input type="text" class="am-form-field" name="">
          <span class="am-input-group-btn am-datepicker-add-on">
            <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span>
            </button>
          </span>
        </div>  
      </div>
      <div class="am-form-group">    
        <label for="doc-ipt-3" class="am-form-label">至：</label>
        <div class="am-input-group am-datepicker-date udatepicker udatepicker140" data-am-datepicker="{format: 'yyyy-mm-dd'}">
          <input type="text" class="am-form-field" name="">
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
    <button class="am-btn ubtn-sure ubtn-blue" data-am-modal="{target:'#uwechat_redpacketm1'}">
      <i class="iconfont icon-xinzeng"></i>
      新增微信红包活动
    </button>
  </div>
  <div class="gspace15"></div>
  <table class="am-table am-table-bordered am-table-hover am-table-compact utable1">
    <thead>
      <tr>
        <td>活动名称</td>
        <td>类型</td>
        <td>总金额(元)</td>
        <td>开始时间</td>
        <td>结束时间</td>
        <td style="width:8%">操作</td>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>端午活动</td>
        <td>关注红包</td>
        <td>1000</td>
        <td>2017-06-18</td>
        <td>2017-06-19</td>
        <td>
          <button class="am-btn ubtn-table ubtn-orange cmodal" flag="0"data-am-modal="{target:'#uwechat_redpacketm1'}">
            <i class="iconfont icon-bianji"></i>
             修改
          </button>
      </tr>
      <tr>
        <td>端午活动</td>
        <td>消费红包</td>
        <td>1000</td>
        <td>2017-04-18</td>
        <td>2017-04-19</td>
        <td>
          <button class="am-btn ubtn-table ubtn-orange cmodal" flag="1" data-am-modal="{target:'#uwechat_redpacketm1'}">
            <i class="iconfont icon-bianji"></i>
             修改
          </button>
      </tr>
      <tr>
        <td>端午活动</td>
        <td>裂变红包</td>
        <td>500</td>
        <td>2017-07-18</td>
        <td>2017-08-19</td>
        <td>
          <button class="am-btn ubtn-table ubtn-orange cmodal" flag="2" data-am-modal="{target:'#uwechat_redpacketm1'}">
            <i class="iconfont icon-bianji"></i>
             修改
          </button>
      </tr>
    </tbody>
  </table>
</div>
<!-- 关注红包 -->
<div class="am-modal" tabindex="-1" id="uwechat_redpacketm1">
  <div class="am-modal-dialog umodal">
    <div class="am-modal-hd uhead">新增微信红包活动
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd umain1">
      <form class="am-form am-form-horizontal">
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">活动名称：</label>
          <div class="umodal-normal">
            <input type="text" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">红包类型：</label>
          <div class="umodal-normal">
            <select id="cpacket" class="uselect uselect-max" data-am-selected>
              <option value="0" selected>关注红包</option>
              <option value="1">消费红包</option>
              <option value="2">裂变红包</option>>
            </select>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">总金额：</label>
          <div class="umodal-normal">
            <input type="text" class="am-form-field uinput uinput-max">
          </div>
          <div class="umodal-text am-text-left" style="text-indent:0.5em;">元</div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">总人数：</label>
          <div class="umodal-normal">
            <input type="text" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group cpacket2">
          <label class="umodal-label am-form-label" for="">裂变数量：</label>
          <div class="umodal-normal">
            <input type="text" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">红包金额：</label>
          <div class="umodal-money">
            <input type="text" class="am-form-field uinput uinput-max">
          </div>
          <div class="umodal-text">&nbsp;&nbsp;~&nbsp;&nbsp;</div>
           <div class="umodal-money">
            <input type="text" class="am-form-field uinput uinput-max">
          </div>
          <div class="umodal-text gtext-green">（随机发放）</div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">祝福语：</label>
          <div class="umodal-max">
            <input type="text" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group cpacket1">
          <label class="umodal-label am-form-label" for="">最低消费：</label>
          <div class="umodal-normal">
            <input type="text" class="am-form-field uinput uinput-max">
          </div>
          <div class="umodal-text am-text-left" style="text-indent:0.5em;">元</div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">开始时间：</label>
          <div class="umodal-normal">
            <div class="am-input-group am-datepicker-date udatepicker udatepicker-max" data-am-datepicker="{format:'yyyy-mm-dd'}">
              <input type="text" class="am-form-field">
              <span class="am-input-group-btn am-datepicker-add-on">
                <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span></button>
              </span>
            </div>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">结束时间：</label>
          <div class="umodal-normal">
            <div class="am-input-group am-datepicker-date udatepicker udatepicker-max" data-am-datepicker="{format:'yyyy-mm-dd'}">
              <input type="text" class="am-form-field">
              <span class="am-input-group-btn am-datepicker-add-on">
                <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span></button>
              </span>
            </div>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">备注：</label>
          <div class="umodal-max">
            <textarea class="am-form-field utextarea utextarea-max" row="3"></textarea>
          </div>
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
<script src="../js/jquery.min.js"></script>
<script src="../js/amazeui.min.js"></script>
<script type="text/javascript">
$(function(){
  $("[class*='cpacket']").hide();
  // 红包类型改变
  $('#cpacket').on('change',function(){
    switch($(this).val()){
      case '0':
        $("[class*='cpacket']").fadeOut(200);
        break;
      case '1':
        $("[class*='cpacket']").fadeOut(200);
        $('.cpacket1').fadeIn(200);
        break;
      case '2':
        $("[class*='cpacket']").fadeOut(200);
        $('.cpacket2').fadeIn(200);
        break;
      default:
        $("[class*='cpacket']").fadeOut(200);
        break;
    };
  });
  // 打开红包类型
  $('.cmodal').on('click', function(){
    switch($(this).attr('flag')){
      case '0':
        $("[class*='cpacket']").hide();
        break;
      case '1':
        $("[class*='cpacket']").hide();
        $('.cpacket1').show();
        break;
      case '2':
        $("[class*='cpacket']").hide();
        $('.cpacket2').show();
        break;
      default:
        $("[class*='cpacket']").hide();
        break;
    };
  });
});
</script>
</body>
</html>