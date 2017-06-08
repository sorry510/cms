<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>
<!-- content -->
<div id="uemployee_bonus" class="gcontent">
  <ul class="am-nav am-nav-pills ubread">
    <li class="am-active"><a href="javascript: void(0)">员工提成方案</a></li>
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
  <div class="am-modal-dialog umodal umodal-simple">
    <div class="am-modal-hd uhead">理疗师提成方案
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd">
      <form class="am-form am-form-horizontal">
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">办卡提成：</label>
          <div class="umodal-short">
            <input class="uinput uinput-max" type="text" name=""/>
          </div>
          <div class="umodal-text" for="">&nbsp;&nbsp;元/会员</div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">充值提成：</label>
          <div class="umodal-short" style="margin-right:10px">
            <select class="uselect uselect-max" data-am-selected>
              <option value="a">百分比</option>
              <option value="b">固定值</option>
            </select>
          </div>
          <div class="umodal-short">
            <input class="uinput uinput-max" type="text" name=""/>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">导购提成：</label>
          <div class="umodal-short" style="margin-right:10px">
            <select class="uselect uselect-max" data-am-selected>
              <option value="a">百分比</option>
              <option value="b">固定值</option>
            </select>
          </div>
          <div class="umodal-short">
            <input class="uinput uinput-max" type="text" name=""/>
          </div>
        </div>
      </form>
    </div>
    <div class="am-modal-footer ufoot">
      <div class="am-btn-group">
        <button type="submit" class="am-btn ubtn-sure ubtn-green cmodalopen2"><i class="iconfont icon-xiangyou2"></i>
          下一步
        </button>
      </div>
    </div>
  </div>
</div>
<div class="am-modal" tabindex="-1" id="uemployee_bonusm2">
  <div class="am-modal-dialog umodal">
    <div class="am-modal-hd uhead">理疗师提成方案
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd umain1">
      <ul class="am-list am-list-border ulist2">
        <li class="uheader"><span class="uspan1">分类/名称</span><span class="uspan2">提成</span></li>
        <li>
          <div class="am-form-group am-g">
            <form action="">
              <div class="umodal-short" style="padding-left:20px;">
                <select class="uselect uselect-max" data-am-selected>
                  <option value="a">AAA</option>
                  <option value="b">Banana</option>
                  <option value="o">Orange</option>
                  <option value="d">禁用</option>
                </select>
              </div>
              <div class="umodal-text" style="padding-left:10px;">
                <button type="button" class="am-btn ubtn-search2 ubtn-green">
                  <i class="iconfont icon-search"></i>
                  查询
                </button>
              </div>
              <div class="umodal-search" style="float:right;margin-right:25px;display:inline-block;">
                <button type="button" class="am-btn ubtn-search2 ubtn-gray">
                  保存
                </button>
              </div>
            </form>
          </div>
        </li>
      </ul>
      <ul class="am-list am-list-border ulist1">
        <li>
          <div class="am-form-group am-g">
            <div class="am-u-lg-6 am-text-left utext1">茶水/毛尖</div>
            <div class="am-u-lg-4 am-text-right">
              <input class="uinput uinput-60" type="text" name="">
              <span class="utext">&nbsp;&nbsp;%&nbsp;&nbsp;</span>
              <input class="uinput uinput-60" type="text" name="">
              <span class="utext">&nbsp;&nbsp;元&nbsp;&nbsp;</span>
            </div>
            <div class="am-u-lg-2">
              <button type="button" class="am-btn ubtn-search2 ubtn-gray">
                批量设置
              </button>
            </div>
          </div>
        </li>
        <li>
          <div class="am-form-group am-g">
            <div class="am-u-lg-6 am-text-left utext2">龙井（50元）</div>
            <div class="am-u-lg-4 am-u-end am-text-right">
              <input class="uinput uinput-60" type="text" name="">
              <span class="utext">&nbsp;&nbsp;%&nbsp;&nbsp;</span>
              <input class="uinput uinput-60" type="text" name="">
              <span class="utext">&nbsp;&nbsp;元&nbsp;&nbsp;</span>
            </div>
          </div>
        </li>
        <li>
          <div class="am-form-group am-g">
            <div class="am-u-lg-6 am-text-left utext2">竹叶青（8880元）特惠特惠特惠特惠特惠特惠特惠特惠特惠特惠特惠特惠特惠特惠特惠特惠特惠特惠特惠特惠特惠</div>
            <div class="am-u-lg-4 am-u-end am-text-right">
              <input class="uinput uinput-60" type="text" name="">
              <span class="utext">&nbsp;&nbsp;%&nbsp;&nbsp;</span>
              <input class="uinput uinput-60" type="text" name="">
              <span class="utext">&nbsp;&nbsp;元&nbsp;&nbsp;</span>
            </div>
          </div>
        </li>
        <li>
          <div class="am-form-group am-g">
            <div class="am-u-lg-6 am-text-left utext2">普洱（150元）</div>
            <div class="am-u-lg-4 am-u-end am-text-right">
              <input class="uinput uinput-60" type="text" name="">
              <span class="utext">&nbsp;&nbsp;%&nbsp;&nbsp;</span>
              <input class="uinput uinput-60" type="text" name="">
              <span class="utext">&nbsp;&nbsp;元&nbsp;&nbsp;</span>
            </div>
          </div>
        </li>
        <li>
          <div class="am-form-group am-g">
            <div class="am-u-lg-6 am-text-left utext2">普洱（150元）</div>
            <div class="am-u-lg-4 am-u-end am-text-right">
              <input class="uinput uinput-60" type="text" name="">
              <span class="utext">&nbsp;&nbsp;%&nbsp;&nbsp;</span>
              <input class="uinput uinput-60" type="text" name="">
              <span class="utext">&nbsp;&nbsp;元&nbsp;&nbsp;</span>
            </div>
          </div>
        </li>
        <li>
          <div class="am-form-group am-g">
            <div class="am-u-lg-6 am-text-left utext2">普洱（150元）</div>
            <div class="am-u-lg-4 am-u-end am-text-right">
              <input class="uinput uinput-60" type="text" name="">
              <span class="utext">&nbsp;&nbsp;%&nbsp;&nbsp;</span>
              <input class="uinput uinput-60" type="text" name="">
              <span class="utext">&nbsp;&nbsp;元&nbsp;&nbsp;</span>
            </div>
          </div>
        </li>
        <li>
          <div class="am-form-group am-g">
            <div class="am-u-lg-6 am-text-left utext2">普洱（150元）</div>
            <div class="am-u-lg-4 am-u-end am-text-right">
              <input class="uinput uinput-60" type="text" name="">
              <span class="utext">&nbsp;&nbsp;%&nbsp;&nbsp;</span>
              <input class="uinput uinput-60" type="text" name="">
              <span class="utext">&nbsp;&nbsp;元&nbsp;&nbsp;</span>
            </div>
          </div>
        </li>
        <li>
          <div class="am-form-group am-g">
            <div class="am-u-lg-6 am-text-left utext2">普洱（150元）</div>
            <div class="am-u-lg-4 am-u-end am-text-right">
              <input class="uinput uinput-60" type="text" name="">
              <span class="utext">&nbsp;&nbsp;%&nbsp;&nbsp;</span>
              <input class="uinput uinput-60" type="text" name="">
              <span class="utext">&nbsp;&nbsp;元&nbsp;&nbsp;</span>
            </div>
          </div>
        </li>
        <li>
          <div class="am-form-group am-g">
            <div class="am-u-lg-6 am-text-left utext2">普洱（150元）</div>
            <div class="am-u-lg-4 am-u-end am-text-right">
              <input class="uinput uinput-60" type="text" name="">
              <span class="utext">&nbsp;&nbsp;%&nbsp;&nbsp;</span>
              <input class="uinput uinput-60" type="text" name="">
              <span class="utext">&nbsp;&nbsp;元&nbsp;&nbsp;</span>
            </div>
          </div>
        </li>
        <li>
          <div class="am-form-group am-g">
            <div class="am-u-lg-6 am-text-left utext2">普洱（150元）</div>
            <div class="am-u-lg-4 am-u-end am-text-right">
              <input class="uinput uinput-60" type="text" name="">
              <span class="utext">&nbsp;&nbsp;%&nbsp;&nbsp;</span>
              <input class="uinput uinput-60" type="text" name="">
              <span class="utext">&nbsp;&nbsp;元&nbsp;&nbsp;</span>
            </div>
          </div>
        </li>
        <li>
          <div class="am-form-group am-g">
            <div class="am-u-lg-6 am-text-left utext2">普洱（150元）</div>
            <div class="am-u-lg-4 am-u-end am-text-right">
              <input class="uinput uinput-60" type="text" name="">
              <span class="utext">&nbsp;&nbsp;%&nbsp;&nbsp;</span>
              <input class="uinput uinput-60" type="text" name="">
              <span class="utext">&nbsp;&nbsp;元&nbsp;&nbsp;</span>
            </div>
          </div>
        </li>
        <li>
          <div class="am-form-group am-g">
            <div class="am-u-lg-6 am-text-left utext2">普洱（150元）</div>
            <div class="am-u-lg-4 am-u-end am-text-right">
              <input class="uinput uinput-60" type="text" name="">
              <span class="utext">&nbsp;&nbsp;%&nbsp;&nbsp;</span>
              <input class="uinput uinput-60" type="text" name="">
              <span class="utext">&nbsp;&nbsp;元&nbsp;&nbsp;</span>
            </div>
          </div>
        </li>
        <li>
          <div class="am-form-group am-g">
            <div class="am-u-lg-6 am-text-left utext2">普洱（150元）</div>
            <div class="am-u-lg-4 am-u-end am-text-right">
              <input class="uinput uinput-60" type="text" name="">
              <span class="utext">&nbsp;&nbsp;%&nbsp;&nbsp;</span>
              <input class="uinput uinput-60" type="text" name="">
              <span class="utext">&nbsp;&nbsp;元&nbsp;&nbsp;</span>
            </div>
          </div>
        </li>
      </ul>
    </div>
    <div class="am-modal-footer ufoot">
      <div class="am-btn-group ubtn-left">
        <button type="submit" class="am-btn ubtn-sure ubtn-green cmodalopen1"><i class="iconfont icon-xiangyou2"></i>
          上一步
        </button>
      </div>
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
$(function(){
  $('.cmodalopen1').on('click', function(e) {
    $('#uemployee_bonusm2').modal('close');
    $('#uemployee_bonusm1').modal('open');
    $('#uemployee_bonusm1 input').eq(0).focus();
  });
  $('.cmodalopen2').on('click', function(e) {
    $('#uemployee_bonusm1').modal('close');
    $('#uemployee_bonusm2').modal('open');
    $('#uemployee_bonusm2 input').eq(0).focus();
  });
})
    $(document).on('click','.abat',function(){
    $("[id*='abfb']").val($("#abfball").val());
    $("[id*='agdz']").val($("#agdzall").val());
  })
</script>
</body>
</html>
