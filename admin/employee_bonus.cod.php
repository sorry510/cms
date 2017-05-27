<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>
<!-- content -->
<div id="uemployee_bonus" class="gcontent">
  <ul class="am-nav am-nav-pills ubread">
    <li class="am-active"><a href="javascript: void(0)">员工提成设置</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="gspace30"></div>
  <table class="am-table am-table-bordered am-table-hover am-table-compact utable1" id="doc-modal-list">
    <thead>
      <tr>
        <td>分组</td>
        <td>修改时间</td>
        <td style="width: 12%;">操作</td>
      </tr>
    </thead>
    <tr>
      <td>理疗师</td>
      <td>2017-5-18&nbsp;&nbsp;18:30</td>
      <td>
        <button class="am-btn ubtn-table ubtn-green" data-am-modal="{target: '#uemployee_bonusm1'}">
          <i class="iconfont icon-bianji"></i>
          提成方案
        </button>
      </td>
    </tr>
  </table>
  <ul class="am-pagination am-pagination-centered upages">
    <li class="upage-info">共1页 3条记录</li>
    <li class="am-disabled"><a href="#">&laquo;</a></li>
    <li class="am-active"><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">&raquo;</a></li>
  </ul>
</div>

<!--modal框-->
<div class="am-modal" tabindex="-1" id="uemployee_bonusm1">
  <div class="am-modal-dialog umodal" style="width: 720px;">
    <div class="am-modal-hd uhead">理疗师提成方案
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd umain1">
      <form class="am-form am-form-horizontal">
        <div class="am-form-group">       
          <label class="am-u-lg-2 am-form-label" for="">办卡提成</label>
          <div class="am-u-lg-3" style="text-align: left;">
            <input class="uinput uinput-60" type="text" name="">&nbsp;元/会员
          </div>
          <label class="am-u-lg-2 am-form-label" for="">充值提成</label>
          <div class="am-u-lg-5">
            <label class="am-radio-inline">
              <input type="radio" name="radio1" value="male" data-am-ucheck> 百分比
            </label>
            <input class="uinput uinput-60" type="text" name="">
            <label class="am-radio-inline">
              <input type="radio" name="radio1" value="female" data-am-ucheck> 固定
            </label>
            <input class="uinput uinput-60" type="text" name="">
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-2 am-form-label" for="">导购提成</label>
          <div class="am-u-lg-5">
            <label class="am-radio-inline">
              <input type="radio" name="radio1" value="male" data-am-ucheck> 百分比
            </label>
            <input class="uinput uinput-60" type="text" name="">
            <label class="am-radio-inline">
              <input type="radio" name="radio1" value="female" data-am-ucheck> 固定
            </label>
            <input class="uinput uinput-60" type="text" name="">
          </div>
          <div class="am-u-lg-5"></div>
        </div>
        <div class="am-tabs am-form-group" data-am-tabs style="border:1px solid #ddd;">
          <ul class="am-u-lg-2 am-nav am-tabs-nav" style="padding-right: 0px;">
            <li class="am-active"><a href="#tab1">服务</a></li>
            <li><a href="#tab2">商品</a></li>
          </ul>
          <div class="am-u-lg-10 am-tabs-bd" style="border-bottom: none;border-right: none;">
            <div class="am-tab-panel am-fade am-in am-active" id="tab1">
              <div class="am-form-group">
                <label class="am-u-lg-3 am-form-label" for="" style="font-weight: bold;">服务分类1</label>
                <div class="am-u-lg-9">
                  <label class="am-radio-inline">
                    <input type="radio" name="radio1" value="male" data-am-ucheck><span style="font-weight: bold;">百分比</span>
                  </label>
                  <input class="uinput uinput-60" type="text" name="" id="abfball">
                  <label class="am-radio-inline">
                    <input type="radio" name="radio1" value="female" data-am-ucheck><span style="font-weight: bold;">固定值</span>
                  </label>
                  <input class="uinput uinput-60" type="text" name="" id="agdzall">
                  <button type="button" class="am-btn ubtn-search2 ubtn-green abat">
                    批量设置
                  </button>
                </div> 
              </div>
              <div class="gspace15"></div>
              <div class="am-form-group">
                <label class="am-u-lg-3 am-form-label" for="">----服务内容1</label>
                <div class="am-u-lg-9">
                  <label class="am-radio-inline">
                    百分比
                  </label>
                  <input class="uinput uinput-60" type="text" name="" id="abfb1">
                  <label class="am-radio-inline">
                    固定值
                  </label>
                  <input class="uinput uinput-60" type="text" name="" id="agdz1">
                </div>
              </div>
              <div class="am-form-group">
                <label class="am-u-lg-3 am-form-label" for="">----服务内容2</label>
                <div class="am-u-lg-9">
                  <label class="am-radio-inline">
                    百分比
                  </label>
                  <input class="uinput uinput-60" type="text" name="" id="abfb2">
                  <label class="am-radio-inline">
                    固定值
                  </label>
                  <input class="uinput uinput-60" type="text" name="" id="agdz2">
                </div>
              </div>
            </div>
            <div class="am-tab-panel am-fade" id="tab2">
              <div class="am-form-group">
                <label class="am-u-lg-3 am-form-label" for="" style="font-weight: bold;">服务分类1</label>
                <div class="am-u-lg-9">
                  <label class="am-radio-inline">
                    <input type="radio" name="radio1" value="male" data-am-ucheck><span style="font-weight: bold;">百分比</span>
                  </label>
                  <input class="uinput uinput-60" type="text" name="">
                  <label class="am-radio-inline">
                    <input type="radio" name="radio1" value="female" data-am-ucheck><span style="font-weight: bold;">固定值</span>
                  </label>
                  <input class="uinput uinput-60" type="text" name="">
                  <button type="button" class="am-btn ubtn-search2 ubtn-green">
                    批量设置
                  </button>
                </div> 
              </div>
              <div class="gspace15"></div>
              <div class="am-form-group">
                <label class="am-u-lg-3 am-form-label" for="">----服务内容1</label>
                <div class="am-u-lg-9">
                  <label class="am-radio-inline">
                    百分比
                  </label>
                  <input class="uinput uinput-60" type="text" name="">
                  <label class="am-radio-inline">
                    固定值
                  </label>
                  <input class="uinput uinput-60" type="text" name="">
                </div>
              </div>
              <div class="am-form-group">
                <label class="am-u-lg-3 am-form-label" for="">----服务内容2</label>
                <div class="am-u-lg-9">
                  <label class="am-radio-inline">
                    百分比
                  </label>
                  <input class="uinput uinput-60" type="text" name="">
                  <label class="am-radio-inline">
                    固定值
                  </label>
                  <input class="uinput uinput-60" type="text" name="">
                </div>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
    <div class="am-modal-footer ufoot">
      <div class="am-btn-group">
        <button type="submit" class="am-btn ubtn-sure ubtn-green"><i class="iconfont icon-yuanxingxuanzhong"></i>
          完成
        </button>
      </div>
    </div>
  </div>
</div>

<script src="../js/jquery.min.js"></script>
<script src="../js/amazeui.min.js"></script>
<script>
    $(document).on('click','.abat',function(){
    $("[id*='abfb']").val($("#abfball").val());
    $("[id*='agdz']").val($("#agdzall").val());
  })
</script>
</body>
</html>
