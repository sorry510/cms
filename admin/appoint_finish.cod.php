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
        <label class="am-form-label">搜索：</label>
        <input class="am-form-field uinput uinput-220" type="text" name="" placeholder="会员卡号/姓名/手机号">
      </div>
      <div class="am-form-group">
        <label class="am-form-label">时间：</label> 
        <div class="am-input-group am-datepicker-date udatepicker" data-am-datepicker="{format: 'yyyy-mm-dd'}">
          <input type="text" class="am-form-field">
          <span class="am-input-group-btn am-datepicker-add-on">
            <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span> </button>
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
        <label for="doc-ipt-3" class="am-form-label">服务生：</label>
        <select class="uselect uselect-auto" data-am-selected name="">
          <option value="all">请选择</option>
          <option value="2">阿大</option>
          <option value="3">阿二</option>
        </select>
      </div>
      <div class="am-form-group">
        <button type="submit" class="am-btn ubtn-search">
          <i class="iconfont icon-search"></i>查询
        </button>
      </div>
    </form>
    <button class="am-btn ubtn-sure ubtn-blue" data-am-modal="{target:'#uappoint_finishm1'}">
      <i class="iconfont icon-xinzeng"></i>
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

<!-- 新增预约弹出框 -->
<div id="uappoint_finishm1" class="am-modal" tabindex="-1">
  <div class="am-modal-dialog umodal umodal-simple">
    <div class="am-modal-hd uhead">新增预约
      <a href="javascript:void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd">
      <form class="am-form am-form-horizontal">
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">搜索：</label>
          <div class="umodal-normal">
            <input id="" class="uinput uinput-max" type="text" placeholder="">
          </div>
          <div class="umodal-search">
            <button type="button" class="am-btn ubtn-search2 ubtn-green">
              <i class="iconfont icon-search"></i>查询
            </button>
          </div>
        </div>
        <div class="am-form-group">        
          <label class="umodal-label am-form-label" for="">卡号：</label>
          <div class="umodal-text">1001</div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">姓名：</label>
          <div class="umodal-normal">
            <input id="" class="uinput uinput-max" type="text" placeholder="">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">手机：</label>
          <div class="umodal-normal">
            <input id="" class="uinput uinput-max" type="text" placeholder="">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">人数：</label>
          <div class="umodal-normal">
            <input id="" class="uinput uinput-max" type="text" placeholder="">
          </div>
          <div class="umodal-text">&nbsp;人</div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">到店时间：</label>
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
          <label class="umodal-label am-form-label" for="">预约项目：</label>
          <div class="umodal-max am-text-left">
            <label class="am-checkbox-inline">
              <input type="checkbox"  value="" data-am-ucheck> 推拿
            </label>
            <label class="am-checkbox-inline">
              <input type="checkbox"  value="" data-am-ucheck> 按摩
            </label>
            <label class="am-checkbox-inline">
              <input type="checkbox"  value="" data-am-ucheck> 洗头
            </label>
          </div>
        </div>          
      </form>
    </div>
    <div class="am-modal-footer ufoot">
      <a class="am-btn-group" href="appoint_finish.php">
        <button type="button" class="am-btn ubtn-sure ubtn-green"><i class="iconfont icon-yuanxingxuanzhong"></i>
          完成
        </button>
      </a>
    </div>
  </div>
</div>

<!-- 预约详细信息弹出框 -->
<div id="uappoint_finishm2" class="am-modal" tabindex="-1">
  <div class="am-modal-dialog umodal umodal-simple">
    <div class="am-modal-hd uhead">修改预约
      <a href="javascript:void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd">
      <form class="am-form am-form-horizontal">
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">搜索：</label>
          <div class="umodal-normal">
            <input id="" class="uinput uinput-max" type="text" placeholder="">
          </div>
          <div class="umodal-search">
            <button type="button" class="am-btn ubtn-search2 ubtn-green">
              <i class="iconfont icon-search"></i>查询
            </button>
          </div>
        </div>
        <div class="am-form-group">        
          <label class="umodal-label am-form-label" for="">卡号：</label>
          <div class="umodal-text">1001</div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">姓名：</label>
          <div class="umodal-normal">
            <input id="" class="uinput uinput-max" type="text" placeholder="">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">手机：</label>
          <div class="umodal-normal">
            <input id="" class="uinput uinput-max" type="text" placeholder="">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">人数：</label>
          <div class="umodal-normal">
            <input id="" class="uinput uinput-max" type="text" placeholder="">
          </div>
          <div class="umodal-text">&nbsp;人</div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">到店时间：</label>
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
          <label class="umodal-label am-form-label" for="">预约项目：</label>
          <div class="umodal-max am-text-left">
            <label class="am-checkbox-inline">
              <input type="checkbox"  value="" data-am-ucheck> 推拿
            </label>
            <label class="am-checkbox-inline">
              <input type="checkbox"  value="" data-am-ucheck> 按摩
            </label>
            <label class="am-checkbox-inline">
              <input type="checkbox"  value="" data-am-ucheck> 洗头
            </label>
          </div>
        </div>          
      </form>
    </div>
    <div class="am-modal-footer ufoot">
      <div class="am-btn-group ubtn-left">
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
