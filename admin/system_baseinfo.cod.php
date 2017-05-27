<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>
<!-- content -->
<div class="gcontent" id="usystem_baseinfo">
  <ul class="am-nav am-nav-pills ubread">
    <li class="am-active"><a href="javascript: void(0);">企业信息</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="am-g ua">
    <div class="am-u-lg-2 ua1">第<span>1</span>年</div>
    <div class="am-u-lg-10 ua2">
      <div class="ua2a">郑州中杨计算机有限公司</div>
      <ul class="ua2b">
        <li><span>企业代码：</span>demo</li>
        <li><span>营业执照/身份证：</span>已上传</li>
        <li><span>绑定手机号：</span>12345678910 &nbsp;&nbsp;<a href="#"  data-am-modal="{target:'#usystem_baseinfom1'}">修改</a></li>
      </ul>
      <div class="ua2c"><span>系统版本：</span>美容美发--版本1.0<a class="am-badge am-badge-warning am-radius">续费/升级</a></div>
    </div>
  </div>
  <div class="am-g ub">
    <div class="am-u-lg-2 ub1"></div>
    <ul class="am-list am-u-lg-9 ub2">
      <li><span>所属行业：</span>美容美发</li>
      <li><span>所属区域：</span>河南省 郑州市</li>
      <li><span>企业地址：</span>金水区东风路13号</li>
      <li><span>企业规模：</span>10-30人</li>
      <li><span>开通日期：</span>2017-5-20</li>
      <li><span>联系人：</span>张小三</li>
      <li><span>手机号码：</span>12345678901</li>
      <li><span>微信号码：</span>12345678901</li>
    </ul>
    <div class="am-u-lg-1">
      <button class="am-btn ubtn-search ubtn-gray" data-am-modal="{target:'#usystem_baseinfom2'}">
        <i class="iconfont icon-question"></i>
        完善资料
      </button>
    </div>
  </div>
</div>
<!-- 修改手机号弹出框 -->
<div id="usystem_baseinfom1" class="am-modal" tabindex="-1">
  <div class="am-modal-dialog umodal">
    <div class="am-modal-hd uhead">修改绑定手机号
      <a href="javascript:void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd umain1">
      <form class="am-form am-form-horizontal">
        <div class="am-form-group">
          <label class="am-u-lg-3 am-form-label" for="">旧手机号码</label>
          <div class="am-u-lg-5">
            <input id="" class="am-form-field uinput uinput-max" type="text" placeholder="请输入您的手机号码">
          </div>
          <div class="am-u-lg-1">
            <button type="button" class="am-btn ubtn-search2 ubtn-green">
              <i class="iconfont icon-question"></i>
              短信验证
            </button>
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-3 am-form-label" for="">验证码</label>
          <div class="am-u-lg-3">
            <input id="" class="am-form-field uinput uinput-max" type="text" placeholder="请输入验证码">
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-3 am-form-label" for="">新手机号码</label>
          <div class="am-u-lg-5">
            <input id="" class="am-form-field uinput uinput-max" type="text" placeholder="请输入您的手机号码">
          </div>
          <div class="am-u-lg-1">
            <button type="button" class="am-btn ubtn-search2 ubtn-green">
              <i class="iconfont icon-question"></i>
              短信验证
            </button>
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-3 am-form-label" for="">验证码</label>
          <div class="am-u-lg-3">
            <input id="" class="am-form-field uinput uinput-max" type="text" placeholder="请输入验证码">
          </div>
        </div>
      </form>
    </div>
    <div class="am-modal-footer ufoot">
      <div class="am-btn-group ubaseinfosure">
        <button type="submit" class="am-btn ubtn-sure ubtn-green"><i class="iconfont icon-yuanxingxuanzhong"></i>
          完成
        </button>
      </div>
    </div>
  </div>
</div>
<!-- 完善资料弹出框 -->
<div id="usystem_baseinfom2" class="am-modal" tabindex="-1">
  <div class="am-modal-dialog umodal">
    <div class="am-modal-hd uhead">完善资料
      <a href="javascript:void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd umain1">
      <form class="am-form am-form-horizontal">
        <div class="am-form-group">
          <label class="am-u-lg-2 am-form-label" for="">所属行业</label>
          <div class="am-u-lg-4">
            <select class="uselect uselect-max" data-am-selected>
              <option value="a">美容美发</option>
              <option value="b">网站开发</option>
            </select>
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-2 am-form-label" for="">行业规模</label>
          <div class="am-u-lg-4">
            <select class="uselect uselect-max" data-am-selected>
              <option value="a">10-20人</option>
              <option value="b">20-30人</option>
            </select>
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-2 am-form-label" for="">所属区域</label>
          <div class="am-u-lg-3">
            <select class="uselect uselect-max" data-am-selected>
              <option value="a">河南省</option>
              <option value="b">河北省</option>
            </select>
          </div>
          <div class="am-u-lg-3">
            <select class="uselect uselect-max" data-am-selected>
              <option value="a">郑州市</option>
              <option value="b">荥阳市</option>
            </select>
          </div>
          <div class="am-u-lg-3">
            <select class="uselect uselect-max" data-am-selected>
              <option value="a">中原区</option>
              <option value="b">高新区</option>
            </select>
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-2 am-form-label" for="">企业地址</label>
          <div class="am-u-lg-9">
            <input id="" class="am-form-field uinput uinput-max" type="text" placeholder="请输入您的详细地址">
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-2 am-form-label" for="">联系人</label>
          <div class="am-u-lg-4">
            <input id="" class="am-form-field uinput uinput-max" type="text" placeholder="">
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-2 am-form-label" for="">手机号码</label>
          <div class="am-u-lg-4">
            <input id="" class="am-form-field uinput uinput-max" type="text" placeholder="请输入您的手机号码">
          </div>
          <div class="am-u-lg-1">
            <button type="button" class="am-btn ubtn-search2 ubtn-green">
              <i class="iconfont icon-question"></i>
              短信验证
            </button>
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-2 am-form-label" for="">验证码</label>
          <div class="am-u-lg-3">
            <input id="" class="am-form-field uinput uinput-max" type="text" placeholder="请输入验证码">
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-2 am-form-label" for="">微信号码</label>
          <div class="am-u-lg-4">
            <input id="" class="am-form-field uinput uinput-max" type="text" placeholder="请输入您的微信号码">
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