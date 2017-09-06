<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>
<!-- content -->
<div class="gcontent" id="umarketing_gift">
  <ul class="am-nav am-nav-pills ubread">
    <li class="am-active"><a href="javascript: void(0);">关注优惠券设置</a></li>
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
    <button class="am-btn ubtn-sure ubtn-blue" data-am-modal="{target:'#wechat_concern_couponm1'}">
      <i class="iconfont icon-xinzeng"></i>
      新增关注优惠券
    </button>
  </div>
  <div class="gspace15"></div>
  <table class="am-table am-table-bordered am-table-hover am-table-compact utable1">
    <thead>
      <tr>
        <td>新增时间</td>
        <td>活动名称</td>
        <td>优惠券</td>
        <td>优惠券可用开始时间</td>
        <td>有效期/到期时间</td>
        <td>活动开始时间</td>
        <td>活动到期时间</td>
        <td>活动状态</td>
        <td>备注</td>
        <td style="width:12%;">操作</td>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>2017-4-29&nbsp;10:36</td>
        <td>五一大酬宾</td>
        <td>--</td>
        <td>2017-4-29&nbsp;10:36</td>
        <td>2017-4-29&nbsp;12:00</td>
        <td>2017-4-29&nbsp;10:36</td>
        <td>2017-4-29&nbsp;12:00</td>
        <td class="gtext-green">未开始</td>
        <td>机会难得，赶紧来购吧</td>
        <td>
          <button class="am-btn ubtn-table ubtn-green" data-am-modal="{target:'#wechat_concern_couponm2'}">
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
        <td>--</td>
        <td>2017-4-29&nbsp;10:36</td>
        <td>2017-4-29&nbsp;12:00</td>
        <td>2017-4-29&nbsp;10:36</td>
        <td>2017-4-29&nbsp;12:00</td>
        <td class="gtext-green">未开始</td>
        <td>机会难得，赶紧来购吧</td>
        <td>
          <button class="am-btn ubtn-table ubtn-green" data-am-modal="{target:'#wechat_concern_couponm2'}">
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
        <td>--</td>
        <td>2017-4-29&nbsp;10:36</td>
        <td>2017-4-29&nbsp;12:00</td>
        <td>2017-4-29&nbsp;10:36</td>
        <td>2017-4-29&nbsp;12:00</td>
        <td class="gtext-green">未开始</td>
        <td>机会难得，赶紧来购吧</td>
        <td>
          <button class="am-btn ubtn-table ubtn-green" data-am-modal="{target:'#wechat_concern_couponm2'}">
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
<!-- 新增关注优惠券弹出框 -->
<div id="wechat_concern_couponm1" class="am-modal" tabindex="-1">
  <div class="am-modal-dialog umodal umodal-simple">
    <div class="am-modal-hd uhead">新增关注优惠券
      <a href="javascript:void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd umain1">
      <form class="am-form am-form-horizontal">
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">送券：</label>
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
          <label class="umodal-label am-form-label" for="">赠送类型：</label>
          <div class="umodal-normal" style="text-align:left;">
            <label class="am-radio-inline">
              <input type="radio" name="radio1" value="0" data-am-ucheck> 代金券
            </label>
            <label class="am-radio-inline">
              <input type="radio" name="radio1" value="1" data-am-ucheck> 体验券
            </label>
          </div>
        </div>

        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">优惠券：</label>
          <div class="umodal-normal">
            <select class="uselect uselect-max" data-am-selected>
              <option value="a">20元代金券</option>
              <option value="b">30元代金券</option>
            </select>
          </div>
        </div>

        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">可用时限：</label>
          <div class="umodal-normal am-text-left">
            <label class="am-radio-inline">
              <input type="radio" name="radio1" class="cchecked" value="0" data-am-ucheck checked> 有效期
            </label>
            <label class="am-radio-inline">
              <input type="radio" name="radio1" class="cchecked" value="1" data-am-ucheck> 到期时间
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
        <div class="am-form-group cispwd2">
          <label class="umodal-label am-form-label" for="">到期时间：</label>
          <div class="umodal-normal">
            <div class="am-input-group am-datepicker-date udatepicker udatepicker-max" data-am-datepicker="{format:'yyyy-mm-dd'}">
              <input id="date1" type="text" class="am-form-field">
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
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">参加店铺：</label>
          <div class="umodal-max am-text-left">
            <label class="am-checkbox-inline">
              <input type="checkbox"  value="" data-am-ucheck> 全部
            </label>
            <label class="am-checkbox-inline">
              <input type="checkbox"  value="" data-am-ucheck> 分店1
            </label>
            <label class="am-checkbox-inline">
              <input type="checkbox"  value="" data-am-ucheck> 分店2
            </label>
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
<!-- 修改关注优惠券弹出框 -->
<div id="wechat_concern_couponm2" class="am-modal" tabindex="-1">
  <div class="am-modal-dialog umodal umodal-simple">
    <div class="am-modal-hd uhead">修改关注优惠券
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
          <label class="umodal-label am-form-label" for="">送券：</label>
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
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">参加店铺：</label>
          <div class="umodal-max am-text-left">
            <label class="am-checkbox-inline">
              <input type="checkbox"  value="" data-am-ucheck> 全部
            </label>
            <label class="am-checkbox-inline">
              <input type="checkbox"  value="" data-am-ucheck> 分店1
            </label>
            <label class="am-checkbox-inline">
              <input type="checkbox"  value="" data-am-ucheck> 分店2
            </label>
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
// 时限设置隐藏
$('.cispwd2').hide();
$('.cchecked').on('click', function(e) {
        if($(this).val()==1){
          $('.cispwd1').fadeOut(0);
          $('.cispwd2').fadeIn(0);
        }else{
          $('.cispwd2').fadeOut(0);
          $('.cispwd1').fadeIn(0);
        }
});
</script>
</body>
</html>