<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>
<!-- content -->
<div class="gcontent" id="uappoint_finish">
  <ul class="am-nav am-nav-pills ubread">
    <li class="am-active"><a href="javascript: void(0);">今日预约</a></li>
    <li><a href="javascript:void(0)">明日预约</a></li>
    <li><a href="javascript:void(0)">更多预约</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="utools">
    <form class="am-form-inline uform2">
      <div class="am-form-group">
        <label for="doc-ipt-3" class="am-form-label">搜索：</label>
        <input type="text" class="am-form-field uinput uinput140" placeholder="卡号/手机号/姓名" name="">
      </div>
      <div class="am-form-group">
        日期：
        <div class="am-input-group am-datepicker-date udatepicker udatepicker140" data-am-datepicker="{format: 'yyyy-mm-dd'}">
          <input type="text" class="am-form-field" name="">
          <span class="am-input-group-btn am-datepicker-add-on">
            <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span>
            </button>
          </span>
        </div>  
      </div>
      <div class="am-form-group">    
        至： 
        <div class="am-input-group am-datepicker-date udatepicker udatepicker140" data-am-datepicker="{format: 'yyyy-mm-dd'}">
          <input type="text" class="am-form-field" name="">
          <span class="am-input-group-btn am-datepicker-add-on">
            <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span> </button>
          </span>
        </div>   
      </div>
      <div class="am-form-group">
        服务生：
        <select class="uselect" data-am-selected name="">
          <option value="all">请选择</option>
          <option value="2">2</option>
          <option value="3">3</option>
        </select>
      </div>
      <div class="am-form-group">
        <button type="submit" class="am-btn ubtn-search">
          <i class="iconfont icon-search"></i>查询
        </button>
      </div>
    </form>
    <button class="am-btn ubtn-sure ubtn-blue" data-am-modal="{target:'#uappoint_finishm1'}">
      <i class="iconfont icon-clock"></i>
      新增预约
    </button>
  </div>
  <div class="gspace15"></div>
  <p class="ua">今日预约</p>        
  <div class="ub">
    <ul data-am-modal="{target:'#uappoint_finishm2'}">
      <li class="ub1c1">张晓明：3人</li>
      <li class="ub1c2">高温瑜伽</li>
      <li class="ub1c3">预抵：今日16：30分</li>
    </ul>
    <ul data-am-modal="{target:'#uappoint_finishm2'}">
      <li class="ub1c4">张晓明：3人</li>
      <li class="ub1c2">高温瑜伽</li>
      <li class="ub1c3">预抵：今日16：30分</li>
    </ul>
  </div>
  <div class="gspace30"></div>
  <p class="ua">明日预约</p>
  <div class="ub">
    <ul data-am-modal="{target:'#uappoint_finishm2'}">
      <li class="ub1c1">张晓明：3人</li>
      <li class="ub1c2">高温瑜伽</li>
      <li class="ub1c3">预抵：今日16：30分</li>
    </ul>
    <ul data-am-modal="{target:'#uappoint_finishm2'}">
      <li class="ub1c4">张晓明：3人</li>
      <li class="ub1c2">高温瑜伽</li>
      <li class="ub1c3">预抵：今日16：30分</li>
    </ul>
  </div>
  <div class="gspace30"></div>
  <p class="ua">更多预约</p>
  <div class="ub">
    <ul data-am-modal="{target:'#uappoint_finishm2'}">
      <li class="ub1c1">张晓明：3人</li>
      <li class="ub1c2">高温瑜伽</li>
      <li class="ub1c3">预抵：今日16：30分</li>
    </ul>
    <ul data-am-modal="{target:'#uappoint_finishm2'}">
      <li class="ub1c4">张晓明：3人</li>
      <li class="ub1c2">高温瑜伽</li>
      <li class="ub1c3">预抵：今日16：30分</li>
    </ul>
  </div>  
  <div class="gspace20"></div>
</div>
<!-- 添加预约弹出框 -->
<div id="uappoint_finishm1" class="am-modal" tabindex="-1">
  <div class="am-modal-dialog umodal">
    <div class="am-modal-hd uhead">新增预约
      <a href="javascript:void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd">
      <form class="am-form am-form-horizontal">
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">联系电话：</label>
          <div class="umodal-normal">
            <input id="" class="uinput uinput-max" type="text" placeholder="">
          </div>
          <div class="umodal-search">
            <button type="submit" class="am-btn ubtn-search">
              <i class="iconfont icon-search"></i>查询
            </button>
          </div>
          <label class="umodal-label am-form-label" for="">姓名：</label>
          <div class="umodal-normal">
            <input id="" class="uinput uinput-max" type="text" placeholder="">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">预约时间：</label>
          <div class="umodal-normal">
            <div class="am-input-group am-datepicker-date udatepicker udatepicker-max" data-am-datepicker="{format:'yyyy-mm-dd'}">
              <input type="text" class="am-form-field">
              <span class="am-input-group-btn am-datepicker-add-on">
                <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span></button>
              </span>
            </div>
          </div>
          <div class="umodal-search">&nbsp;</div>
          <label class="umodal-label am-form-label" for="">人数：</label>
          <div class="umodal-normal">
            <input id="" class="uinput uinput-max" type="text" placeholder="">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">预约内容：</label>
          <div class="umodal-max">
            <input id="" class="am-form-field uinput uinput-max" type="password" placeholder="">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">短信通知：</label>
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

<!-- 预约详细信息弹出框 -->
<div id="uappoint_finishm2" class="am-modal" tabindex="-1">
  <div class="am-modal-dialog umodal">
    <div class="am-modal-hd uhead">修改预约
      <a href="javascript:void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd">
      <form class="am-form am-form-horizontal">
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">联系电话：</label>
          <div class="umodal-normal">
            <input id="" class="uinput uinput-max" type="text" placeholder="">
          </div>
          <div class="umodal-search">
            <button type="submit" class="am-btn ubtn-search">
              <i class="iconfont icon-search"></i>查询
            </button>
          </div>
          <label class="umodal-label am-form-label" for="">姓名：</label>
          <div class="umodal-normal">
            <input id="" class="uinput uinput-max" type="text" placeholder="">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">预约时间：</label>
          <div class="umodal-normal">
            <div class="am-input-group am-datepicker-date udatepicker udatepicker-max" data-am-datepicker="{format:'yyyy-mm-dd'}">
              <input type="text" class="am-form-field">
              <span class="am-input-group-btn am-datepicker-add-on">
                <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span></button>
              </span>
            </div>
          </div>
          <div class="umodal-search">&nbsp;</div>
          <label class="umodal-label am-form-label" for="">人数：</label>
          <div class="umodal-normal">
            <input id="" class="uinput uinput-max" type="text" placeholder="">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">预约内容：</label>
          <div class="umodal-max">
            <input id="" class="am-form-field uinput uinput-max" type="password" placeholder="">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">短信通知：</label>
          <div class="umodal-max">
            <textarea class="am-form-field utextarea utextarea-max" row="3"></textarea>
          </div>
        </div>
      </form>
    </div>
    <div class="am-modal-footer ufoot">
      <div style="float:left; margin:20px 0 0 30px; display:inline;">
        <button type="button" class="am-btn ubtn-sure ubtn-blue"><i class="iconfont icon-chongzhi"></i>
          到店
        </button>
      </div>
      <div class="am-btn-group">
        <button type="button" class="am-btn ubtn-sure ubtn-gray"><i class="iconfont icon-shanchu"></i>
          删除
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
</body>
</html>
