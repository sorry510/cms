<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>
<div id="uwechat_redpacket" class="gcontent">
  <ul class="am-nav am-nav-pills ubread">
     <li class="am-active"><a href="javascript: void(0);">红包设置</a></li>
  </ul>
  <div class="gspace15"></div>
  <table class="am-table am-table-bordered am-table-hover am-table-compact utable1">
    <thead>
      <tr>
        <td>类型</td>
        <td>功能</td>
        <td>总金额(元)</td>
        <td>开始时间</td>
        <td>结束时间</td>
        <td style="width:8%">操作</td>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>关注红包</td>
        <td>开启</td>
        <td>1000</td>
        <td>2017-06-18</td>
        <td>2017-06-19</td>
        <td>
          <button class="am-btn ubtn-table ubtn-orange" data-am-modal="{target:'#uwechat_redpacketm1'}">
            <i class="iconfont icon-question"></i>
             配置红包
          </button>
      </tr>
      <tr>
        <td>消费红包</td>
        <td>开启</td>
        <td>1000</td>
        <td>2017-04-18</td>
        <td>2017-04-19</td>
        <td>
          <button class="am-btn ubtn-table ubtn-orange" data-am-modal="{target:'#uwechat_redpacketm2'}">
            <i class="iconfont icon-question"></i>
             配置红包
          </button>
      </tr>
      <tr>
        <td>裂变红包</td>
        <td>关闭</td>
        <td>500</td>
        <td>2017-07-18</td>
        <td>2017-08-19</td>
        <td>
          <button class="am-btn ubtn-table ubtn-orange" data-am-modal="{target:'#uwechat_redpacketm3'}">
            <i class="iconfont icon-question"></i>
             配置红包
          </button>
      </tr>
    </tbody>
  </table>
</div>
<!-- 关注红包 -->
<div class="am-modal" tabindex="-1" id="uwechat_redpacketm1">
  <div class="am-modal-dialog umodal">
    <div class="am-modal-hd uhead">关注红包
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd umain1">
      <form class="am-form am-form-horizontal">
        <div class="am-form-group">
          <label class="am-u-lg-3 am-form-label" for="">功能</label>
          <div class="am-u-lg-4 am-u-end">
            <label class="am-radio-inline">
              <input type="radio" name="radio1" value="0" data-am-ucheck> 开启
            </label>
            <label class="am-radio-inline">
              <input type="radio" name="radio1" value="1" data-am-ucheck> 关闭
            </label>
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-3 am-form-label" for="">发放总金额</label>
          <div class="am-u-lg-4 am-u-end">
            <input type="text" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-3 am-form-label" for="">发放总人数</label>
          <div class="am-u-lg-4 am-u-end">
            <input type="password" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-3 am-form-label" for="">红包金额</label>
          <div class="am-u-lg-2">
            <input type="text" class="am-form-field uinput uinput-max">
          </div>
          <div class="am-u-lg-1 ua1">~</div>
           <div class="am-u-lg-2">
            <input type="text" class="am-form-field uinput uinput-max">
          </div>
          <div class="am-u-lg-3 am-u-end ua2">随机发放</div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-3 am-form-label" for="">红包祝福语</label>
          <div class="am-u-lg-7 am-u-end">
            <input type="password" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-3 am-form-label" for="">开始时间</label>
          <div class="am-u-lg-4">
            <div class="am-input-group am-datepicker-date udatepicker udatepicker-max" data-am-datepicker="{format:'yyyy-mm-dd'}">
              <input type="text" class="am-form-field">
              <span class="am-input-group-btn am-datepicker-add-on">
                <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span></button>
              </span>
            </div>
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-3 am-form-label" for="">结束时间</label>
          <div class="am-u-lg-4">
            <div class="am-input-group am-datepicker-date udatepicker udatepicker-max" data-am-datepicker="{format:'yyyy-mm-dd'}">
              <input type="text" class="am-form-field">
              <span class="am-input-group-btn am-datepicker-add-on">
                <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span></button>
              </span>
            </div>
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-3 am-form-label" for="">备注</label>
          <div class="am-u-lg-8">
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
<!-- 消费 -->
<div class="am-modal" tabindex="-1" id="uwechat_redpacketm2">
  <div class="am-modal-dialog umodal">
    <div class="am-modal-hd uhead">消费红包
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd umain1">
      <form class="am-form am-form-horizontal">
        <div class="am-form-group">
          <label class="am-u-lg-3 am-form-label" for="">功能</label>
          <div class="am-u-lg-4 am-u-end">
            <label class="am-radio-inline">
              <input type="radio" name="radio1" value="0" data-am-ucheck> 开启
            </label>
            <label class="am-radio-inline">
              <input type="radio" name="radio1" value="1" data-am-ucheck> 关闭
            </label>
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-3 am-form-label" for="">发放总金额</label>
          <div class="am-u-lg-4 am-u-end">
            <input type="text" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-3 am-form-label" for="">发放总人数</label>
          <div class="am-u-lg-4 am-u-end">
            <input type="password" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-3 am-form-label" for="">红包金额</label>
          <div class="am-u-lg-2">
            <input type="text" class="am-form-field uinput uinput-max">
          </div>
          <div class="am-u-lg-1 ua1">~</div>
           <div class="am-u-lg-2">
            <input type="text" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-3 am-form-label" for="">红包祝福语</label>
          <div class="am-u-lg-7 am-u-end">
            <input type="password" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-3 am-form-label" for="">最低消费额</label>
          <div class="am-u-lg-4 am-u-end">
            <input type="password" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-3 am-form-label" for="">开始时间</label>
          <div class="am-u-lg-4">
            <div class="am-input-group am-datepicker-date udatepicker udatepicker-max" data-am-datepicker="{format:'yyyy-mm-dd'}">
              <input type="text" class="am-form-field">
              <span class="am-input-group-btn am-datepicker-add-on">
                <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span></button>
              </span>
            </div>
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-3 am-form-label" for="">结束时间</label>
          <div class="am-u-lg-4">
            <div class="am-input-group am-datepicker-date udatepicker udatepicker-max" data-am-datepicker="{format:'yyyy-mm-dd'}">
              <input type="text" class="am-form-field">
              <span class="am-input-group-btn am-datepicker-add-on">
                <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span></button>
              </span>
            </div>
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-3 am-form-label" for="">备注</label>
          <div class="am-u-lg-8">
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
<!-- 裂变 -->
<div class="am-modal" tabindex="-1" id="uwechat_redpacketm3">
  <div class="am-modal-dialog umodal">
    <div class="am-modal-hd uhead">裂变红包
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd umain1">
      <form class="am-form am-form-horizontal">
        <div class="am-form-group">
          <label class="am-u-lg-3 am-form-label" for="">功能</label>
          <div class="am-u-lg-4 am-u-end">
            <label class="am-radio-inline">
              <input type="radio" name="radio1" value="0" data-am-ucheck> 开启
            </label>
            <label class="am-radio-inline">
              <input type="radio" name="radio1" value="1" data-am-ucheck> 关闭
            </label>
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-3 am-form-label" for="">发放总金额</label>
          <div class="am-u-lg-4 am-u-end">
            <input type="text" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-3 am-form-label" for="">发放总人数</label>
          <div class="am-u-lg-4 am-u-end">
            <input type="password" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-3 am-form-label" for="">裂变数量</label>
          <div class="am-u-lg-4 am-u-end">
            <input type="password" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-3 am-form-label" for="">红包金额</label>
          <div class="am-u-lg-2">
            <input type="text" class="am-form-field uinput uinput-max">
          </div>
          <div class="am-u-lg-1 ua1">~</div>
           <div class="am-u-lg-2">
            <input type="text" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-3 am-form-label" for="">红包祝福语</label>
          <div class="am-u-lg-7 am-u-end">
            <input type="password" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-3 am-form-label" for="">开始时间</label>
          <div class="am-u-lg-4">
            <div class="am-input-group am-datepicker-date udatepicker udatepicker-max" data-am-datepicker="{format:'yyyy-mm-dd'}">
              <input type="text" class="am-form-field">
              <span class="am-input-group-btn am-datepicker-add-on">
                <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span></button>
              </span>
            </div>
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-3 am-form-label" for="">结束时间</label>
          <div class="am-u-lg-4">
            <div class="am-input-group am-datepicker-date udatepicker udatepicker-max" data-am-datepicker="{format:'yyyy-mm-dd'}">
              <input type="text" class="am-form-field">
              <span class="am-input-group-btn am-datepicker-add-on">
                <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span></button>
              </span>
            </div>
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-3 am-form-label" for="">备注</label>
          <div class="am-u-lg-8">
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
</body>
</html>