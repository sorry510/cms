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
        <li><span>企业代码：</span><span class="ua2b1">demo</span></li>
        <li><span>营业执照/证件号码：</span>123456789012345</li>
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
      <li><span style="text-indent:1em;">联系人：</span>张小三</li>
      <li><span>微信号码：</span>12345678901</li>
    </ul>
    <div class="am-u-lg-1">
      <button class="am-btn ubtn-search ubtn-green" data-am-modal="{target:'#usystem_baseinfom2'}">
        <i class="iconfont icon-bianji1"></i>
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
    <div class="am-modal-bd">
      <form class="am-form am-form-horizontal">
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">原手机号：</label>
          <div class="umodal-text" style="font-weight:bold;font-size:16px;">
            13623833360
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">验证码：</label>
          <div class="umodal-valid">
            <input id="" class="am-form-field uinput uinput-max" type="text" placeholder="">
          </div>
          <div class="umodal-search">
            <button type="button" class="am-btn ubtn-search2 ubtn-green">
              获取验证码
            </button>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">新手机号：</label>
          <div class="umodal-normal">
            <input id="" class="am-form-field uinput uinput-max" type="text" placeholder="">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">验证码：</label>
          <div class="umodal-valid">
            <input id="" class="am-form-field uinput uinput-max" type="text" placeholder="">
          </div>
          <div class="umodal-search">
            <button type="button" class="am-btn ubtn-search2 ubtn-green">
              获取验证码
            </button>
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
<!-- 完善资料弹出框 -->
<div id="usystem_baseinfom2" class="am-modal" tabindex="-1">
  <div class="am-modal-dialog umodal">
    <div class="am-modal-hd uhead">完善资料
      <a href="javascript:void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd">
      <form class="am-form am-form-horizontal">
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">所属行业：</label>
          <div class="umodal-text">
            服务类行业
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">企业名称：</label>
          <div class="umodal-text">
            皇朝大酒店
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">证件号码：</label>
          <div class="umodal-normal">
            <input type="text" class="am-form-field uinput uinput-max">
          </div>
          <div class="umodal-text gtext-green">
            （营业执照/身份证号码，提交完成后不能修改，请正确填写）
          </div>
        </div>
        <div class="am-form-group am-form-file">
          <label class="umodal-label am-form-label" for="">证件上传：</label>
          <div class="umodal-normal">
            <button type="button" class="am-btn am-btn-default am-btn-sm" style="width:100%;">
              <i class="am-icon-cloud-upload"></i> 选择要上传的文件</button>
          </div>
          <input type="file" id="doc-ipt-file-2">
          <div class="umodal-text gtext-green">
            （营业执照/身份证照片，提交完成后不能修改，请正确填写）
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">所属区域：</label>
          <div class="umodal-short" style="margin-right: 20px;">
            <select name="province1" class="uselect uselect-max cmap" data-am-selected>
            </select>
          </div>
          <div class="umodal-short">
            <select name="city1" class="uselect uselect-max cmap" data-am-selected>
            </select>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">企业地址：</label>
          <div class="umodal-max">
            <input id="" class="am-form-field uinput uinput-max" type="text" placeholder="">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">行业规模：</label>
          <div class="umodal-short"  style="padding-right: 20px;">
            <select class="uselect uselect-max" data-am-selected>
              <option value="a">10-20人</option>
              <option value="b">20-30人</option>
            </select>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">联系人：</label>
          <div class="umodal-normal">
            <input id="" class="am-form-field uinput uinput-max" type="text" placeholder="">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">微信号码：</label>
          <div class="umodal-normal">
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
<script src="../js/PCASClass.js"></script>
<script type="text/javascript">
new PCAS("province1","city1");
</script>
</body>
</html>