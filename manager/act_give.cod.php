<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>
<!-- content -->
<div class="gcontent" id="uact_give">
  <ul class="am-nav am-nav-pills ubread">
    <li class="am-active"><a href="javascript: void(0);">满送活动</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="utools">
    <form class="am-form-inline uform2">
      <div class="am-form-group">
        <label class="am-form-label">时间范围：</label> 
        <div class="am-input-group am-datepicker-date udatepicker" data-am-datepicker="{format: 'yyyy-mm-dd'}">
          <input type="text" class="am-form-field">
          <span class="am-input-group-btn am-datepicker-add-on">
            <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span></button>
          </span>
        </div>
      </div>
      <div class="am-form-group">
        <label class="am-form-label">至：</label> 
        <div class="am-input-group am-datepicker-date udatepicker" data-am-datepicker="{format: 'yyyy-mm-dd'}">
          <input type="text" class="am-form-field">
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
    <button class="am-btn ubtn-sure ubtn-blue" data-am-modal="{target:'#uact_givem1'}">
      <i class="iconfont icon-xinzeng"></i>
      新增满送活动
    </button>
  </div>
  <div class="gspace15"></div>
  <table class="am-table am-table-bordered am-table-hover am-table-compact utable1">
    <thead>
      <tr>
        <td>新增时间</td>
        <td>活动名称</td>
        <td>实付满</td>
        <td>类型</td>
        <td>优惠券</td>
        <td>可用时间</td>
        <td>有效期</td>
        <td>开始时间</td>
        <td>结束时间</td>
        <td>活动状态</td>
        <td>备注</td>
        <td style="width:12%;">操作</td>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>2017-4-29&nbsp;10:36</td>
        <td>五一大酬宾</td>
        <td>100元</td>
        <td>代金券</td>
        <td>20元优惠券</td>
        <td>当天开始</td>
        <td>30天</td>
        <td>2017-4-29 12:00</td>
        <td>2017-5-2 18:00</td>
        <td class="gtext-green">未开始</td>
        <td>机会难得，赶紧来购吧</td>
        <td>
          <button class="am-btn ubtn-table ubtn-green" data-am-modal="{target:'#uact_givem2'}">
            <i class="iconfont icon-bianji"></i>
            修改
          </button>
          &nbsp;
          <button class="am-btn ubtn-table ubtn-gray cdel">
            <i class="iconfont icon-shanchu"></i>
            删除
          </button> 
        </td>
      </tr>
      <tr>
        <td>2017-4-29&nbsp;10:36</td>
        <td>五一大酬宾</td>
        <td>100元</td>
        <td>代金券</td>
        <td>20元优惠券</td>
        <td>当天开始</td>
        <td>30天</td>
        <td>2017-4-29 12:00</td>
        <td>2017-5-2 16:00</td>
        <td class="gtext-orange">进行中</td>
        <td>机会难得，赶紧来购吧</td>
        <td>
          <button class="am-btn ubtn-table ubtn-green" data-am-modal="{target:'#uact_givem2'}">
            <i class="iconfont icon-bianji"></i>
            修改
          </button>
          &nbsp;
          <button class="am-btn ubtn-table ubtn-gray cdel">
            <i class="iconfont icon-shanchu"></i>
            删除
          </button> 
        </td>
      </tr>
      <tr>
        <td>2017-4-29&nbsp;10:36</td>
        <td>五一大酬宾</td>
        <td>100元</td>
        <td>代金券</td>
        <td>20元优惠券</td>
        <td>当天开始</td>
        <td>30天</td>
        <td>2017-4-29 8:00</td>
        <td>2017-5-2 22:00</td>
        <td>已结束</td>
        <td>机会难得，赶紧来购吧</td>
        <td>
          <button class="am-btn ubtn-table ubtn-green" data-am-modal="{target:'#uact_givem2'}">
            <i class="iconfont icon-bianji"></i>
            修改
          </button>
          &nbsp;
          <button class="am-btn ubtn-table ubtn-gray cdel">
            <i class="iconfont icon-shanchu"></i>
            删除
          </button> 
        </td>
      </tr>
    </tbody>
  </table>
</div>
<!-- 弹出框 -->
<div id="uact_givem1" class="am-modal" tabindex="-1">
  <div class="am-modal-dialog umodal umodal-simple">
    <div class="am-modal-hd uhead">新增满送活动
      <a href="javascript:void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd umain1">
      <form class="am-form am-form-horizontal">
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">活动名称：</label>
          <div class="umodal-normal">
            <input id="" class="uinput uinput-max" type="text" placeholder="">
          </div>
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
          <label class="umodal-label am-form-label" for="">顾客类型：</label>
          <div class="umodal-normal am-text-left">
            <label class="am-radio-inline">
              <input type="radio" name="radio1" value="male" data-am-ucheck checked> 仅限会员
            </label> 
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">实付满：</label>
          <div class="umodal-normal">
            <input id="" class="uinput uinput-max" type="text" placeholder="">
          </div>
          <div class="umodal-text">&nbsp;元</div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">赠送类型：</label>
          <div class="umodal-normal am-text-left">
            <label class="am-radio-inline">
              <input type="radio" name="radio2" value="male" data-am-ucheck checked> 代金券
            </label>
            <label class="am-radio-inline">
              <input type="radio" name="radio2" value="female" data-am-ucheck> 体验券
            </label> 
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">优惠券：</label>
          <div class="umodal-normal">
            <select class="uselect uselect-max" data-am-selected>
              <option value="a">第一组</option>
              <option value="b">大学</option>
              <option value="o">Orange</option>
              <option value="m">Mango</option>
              <option value="d">禁用</option>
            </select>
          </div>
        </div>
         <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">可用时间：</label>
          <div class="umodal-normal am-text-left">
            <label class="am-radio-inline">
              <input type="radio" name="radio3" value="male" data-am-ucheck checked> 当天开始
            </label>
            <label class="am-radio-inline">
              <input type="radio" name="radio3" value="female" data-am-ucheck> 第二天开始
            </label> 
          </div>
        </div>
        <div class="am-form-group cispwd1">
          <label class="umodal-label am-form-label" for="">有效期：</label>
          <div class="umodal-normal">
            <input id="date2" type="text" class="am-form-field uinput uinput-max">
          </div>
          <label class="umodal-label am-form-label am-text-left">&nbsp;天</label>
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
<div id="uact_givem2" class="am-modal" tabindex="-1">
  <div class="am-modal-dialog umodal umodal-simple">
    <div class="am-modal-hd uhead">新增满送活动
      <a href="javascript:void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd umain1">
      <form class="am-form am-form-horizontal">
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">活动名称：</label>
          <div class="umodal-normal">
            <input id="" class="uinput uinput-max" type="text" placeholder="">
          </div>
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
          <label class="umodal-label am-form-label" for="">顾客类型：</label>
          <div class="umodal-normal am-text-left">
            <label class="am-radio-inline">
              <input type="radio" name="radio1" value="male" data-am-ucheck checked> 仅限会员
            </label> 
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">实付满：</label>
          <div class="umodal-normal">
            <input id="" class="uinput uinput-max" type="text" placeholder="">
          </div>
          <div class="umodal-text">&nbsp;元</div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">赠送类型：</label>
          <div class="umodal-normal am-text-left">
            <label class="am-radio-inline">
              <input type="radio" name="radio2" value="male" data-am-ucheck checked> 代金券
            </label>
            <label class="am-radio-inline">
              <input type="radio" name="radio2" value="female" data-am-ucheck> 体验券
            </label> 
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">优惠券：</label>
          <div class="umodal-normal">
            <select class="uselect uselect-max" data-am-selected>
              <option value="a">第一组</option>
              <option value="b">大学</option>
              <option value="o">Orange</option>
              <option value="m">Mango</option>
              <option value="d">禁用</option>
            </select>
          </div>
        </div>
         <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">可用时间：</label>
          <div class="umodal-normal am-text-left">
            <label class="am-radio-inline">
              <input type="radio" name="radio3" value="male" data-am-ucheck checked> 当天开始
            </label>
            <label class="am-radio-inline">
              <input type="radio" name="radio3" value="female" data-am-ucheck> 第二天开始
            </label> 
          </div>
        </div>
        <div class="am-form-group cispwd1">
          <label class="umodal-label am-form-label" for="">有效期：</label>
          <div class="umodal-normal">
            <input id="date2" type="text" class="am-form-field uinput uinput-max">
          </div>
          <label class="umodal-label am-form-label am-text-left">&nbsp;天</label>
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
</script>
</body>
</html>