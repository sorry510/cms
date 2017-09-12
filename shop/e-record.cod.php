<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>

<!-- content -->
<div id="ue-record" class="gcontent">
  <ul class="am-nav am-nav-pills ubread">
    <li class="am-active"><a href="javascript: void(0)">电子档案</a></li>
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
        <button type="submit" class="am-btn ubtn-search">
          <i class="iconfont icon-search"></i>查询
        </button>
      </div>
    </form> 
    <button class="am-btn ubtn-sure ubtn-blue" data-am-modal="{target: '#ue-recordm1'}">
      <i class="iconfont icon-xinzeng"></i>
      新增电子档案
    </button>
  </div>
  <div class="gspace15"></div>
  <table class="am-table am-table-bordered am-table-hover am-table-compact utable1" id="doc-modal-list">
    <thead>
      <tr>
        <td>诊疗时间</td>
        <td>会员卡号</td>
        <td>会员姓名</td>
        <td>性别</td>
        <td>手机号码</td>
        <td>卡类型</td>
        <td>诊疗人员</td>
        <td>服务项目</td>
        <td>顾客评价</td>
      </tr>
    </thead>
    <tr>
    	<td><a href="javascript:void" data-am-offcanvas="{target: '#uoffcanvas'}">2017-5-18 15:36</a></td>
      <td>HY100214</td>
      <td>男</td>
      <td>15617771749</td>
      <td>--</td>
      <td>张小明</td>
      <td>李医生</td>
      <td>服务项目</td>
      <td>顾客评价</td>
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
<div id="ue-recordm1" class="am-modal" tabindex="-1">
  <div class="am-modal-dialog umodal">
    <div class="am-modal-hd uhead">新增电子档案
      <a href="javascript:void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd">
      <form class="am-form am-form-horizontal">
        <div class="am-form-group" >
          <label class="umodal-label am-form-label" for="">会员：</label>
          <div class="umodal-normal">
            <input type="text" name="search" class="am-form-field uinput uinput-max" placeholder="卡号/姓名/手机号">
          </div>
          <div class="umodal-search">
            <button type="button" class="am-btn ubtn-search">
              <i class="iconfont icon-search"></i>查询
            </button>
          </div>
        </div>
        <div class="am-scrollable-vertical" style="max-height:250px;margin:0 4%;">
          <table class="am-table am-table-bordered am-table-centered am-table-hover am-table-compact utable1 utable1-fixed" style="width:100%;">
            <thead>
              <tr>
                <td>消费时间</td>
                <td>消费单号</td>
                <td>卡号</td>
                <td>姓名</td>
                <td>性别</td>
                <td>手机号码</td>
                <td>卡类型</td>
                <td>操作</td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>2017-5-18</td>
                <td>1234498002</td>
                <td>cd12</td>
                <td>吴海</td>
                <td>男</td>
                <td>1234498222</td>
                <td>8折卡</td>
                <td><button type="button" class="am-btn ubtn-table ubtn-green cmodalopen2" value="">下一步</button></td>
              </tr>
              <tr>
                <td>2017-5-18</td>
                <td>1234498002</td>
                <td>cd12</td>
                <td>吴海</td>
                <td>男</td>
                <td>1234498222</td>
                <td>8折卡</td>
                <td><button class="am-btn ubtn-table ubtn-green cmodalopen2" value="">下一步</button></td>
              </tr>
              <tr>
                <td>2017-5-18</td>
                <td>1234498002</td>
                <td>cd12</td>
                <td>吴海</td>
                <td>男</td>
                <td>1234498222</td>
                <td>8折卡</td>
                <td><button class="am-btn ubtn-table ubtn-green cmodalopen2" value="">下一步</button></td>
              </tr>
              <tr>
                <td>2017-5-18</td>
                <td>1234498002</td>
                <td>cd12</td>
                <td>吴海</td>
                <td>男</td>
                <td>1234498222</td>
                <td>8折卡</td>
                <td><button class="am-btn ubtn-table ubtn-green cmodalopen2" value="">下一步</button></td>
              </tr>
            </tbody>
          </table>
        </div>
      </form>
    </div>
  </div>
</div>
<div id="ue-recordm2" class="am-modal" tabindex="-1">
  <div class="am-modal-dialog umodal">
    <div class="am-modal-hd uhead">新增电子档案
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd umain1">
      <form class="am-form am-form-horizontal">
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">会员姓名：</label>
          <label class="umodal-label am-form-label am-text-left" for="">张小明</label>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">诊疗时间：</label>
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
          <label class="umodal-label am-form-label" for="">诊疗人员：</label>
          <div class="umodal-normal">
            <select class="uselect uselect-max" data-am-selected>
              <option value="a">请选择</option>
              <option value="b">大学</option>
              <option value="o">Orange</option>
              <option value="m">Mango</option>
              <option value="d">禁用</option>
            </select>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">问题描述：</label>
          <div class="umodal-max">
            <textarea class="utextarea utextarea-max"></textarea>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">诊疗结果：</label>
          <div class="umodal-max">
            <textarea class="utextarea utextarea-max"></textarea>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">诊疗方案：</label>
          <div class="umodal-max">
            <textarea class="utextarea utextarea-max"></textarea>
          </div>
        </div>
        <div class="am-form-group ">
          <label class="umodal-label am-form-label">图片1：</label>
          <div class="umodal-normal am-form-file am-text-left">
            <button type="button" class="am-btn am-btn-default am-btn-sm" style="width: 100%;">
              <i class="am-icon-cloud-upload"></i> 上传图片1
            </button>
            <input type="file" id="doc-ipt-file-2">
          </div>
        </div>
        <div class="am-form-group ">
          <label class="umodal-label am-form-label">图片2：</label>
          <div class="umodal-normal am-form-file am-text-left">
            <button type="button" class="am-btn am-btn-default am-btn-sm" style="width: 100%;">
              <i class="am-icon-cloud-upload"></i> 上传图片2
            </button>
            <input type="file" id="doc-ipt-file-2">
          </div>
        </div>
        <div class="am-form-group ">
          <label class="umodal-label am-form-label">图片3：</label>
          <div class="umodal-normal am-form-file am-text-left">
            <button type="button" class="am-btn am-btn-default am-btn-sm" style="width: 100%;">
              <i class="am-icon-cloud-upload"></i> 上传图片3
            </button>
            <input type="file" id="doc-ipt-file-2">
          </div>
        </div>
        <div class="am-form-group ">
          <label class="umodal-label am-form-label">图片4：</label>
          <div class="umodal-normal am-form-file am-text-left">
            <button type="button" class="am-btn am-btn-default am-btn-sm" style="width: 100%;">
              <i class="am-icon-cloud-upload"></i> 上传图片4
            </button>
            <input type="file" id="doc-ipt-file-2">
          </div>
        </div>
        <div class="am-form-group ">
          <label class="umodal-label am-form-label">图片5：</label>
          <div class="umodal-normal am-form-file am-text-left">
            <button type="button" class="am-btn am-btn-default am-btn-sm" style="width: 100%;">
              <i class="am-icon-cloud-upload"></i> 上传图片5
            </button>
            <input type="file" id="doc-ipt-file-2">
          </div>
        </div>
      </form>
    </div>
    <div class="am-modal-footer ufoot">
      <div class="am-btn-group">
        <button type="button" class="am-btn ubtn-sure ubtn-green"><i class="iconfont icon-yuanxingxuanzhong"></i>
          完成
        </button>
      </div
      <div class="am-btn-group">
        <button type="button" class="am-btn ubtn-sure ubtn-green"><i class="iconfont icon-yuanxingxuanzhong"></i>
          完成
        </button>
      </div>
    </div>
  </div>
</div>
<!--侧拉框-->
<div id="uoffcanvas" class="am-offcanvas" >
  <div class="am-offcanvas-bar am-offcanvas-bar-flip uoffcanvas">
    <div class="am-offcanvas-content" >
      <div class="am-modal-hd"><span class="utitle">档案信息</span>
        <a href="javascript: void(0)" class="am-close am-close-spin doc-oc-js uclose2" data-rel="close"><img src="../img/close.jpg"></a>
      </div>
      <div class="gspace15"></div>
      <div class="am-g ucontent">
        <div class="am-u-lg-6">会员卡号：<span>张三</span></div>
        <div class="am-u-lg-6">会员姓名：<span>3700824417</span></div>
        <div class="am-u-lg-6">诊疗时间：<span>a123212</span></div>
        <div class="am-u-lg-6">诊疗人员：<span>男</span></div>
        <div class="am-u-lg-12">服务项目：<span>无</span></div>
        <div class="am-u-lg-12">问题描述：<span>无</span></div>
        <div class="am-u-lg-12">诊疗结果：<span>无</span></div>
        <div class="am-u-lg-12">诊疗方案：<span>无</span></div>
        <div class="am-u-lg-12 gspace15"></div>
        <label class="am-u-lg-12">照片</label>
        <div class="am-u-lg-4"><img src="../img/wu.jpg"></div>
        <label class="am-u-lg-8">&nbsp;</label>
      </div>
    </div>
  </div>
</div>
<script src="../js/jquery.min.js"></script>
<script src="../js/amazeui.min.js"></script>
<script>
/*右侧弹出框关闭按钮JS*/
$('.doc-oc-js').on('click', function() {
  $('#uoffcanvas').offCanvas($(this).data('rel'));
});
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
$('.cmodalopen2').on('click', function(){
  $('#ue-recordm1').modal('close');
  $('#ue-recordm2').modal('open');
})
</script>
</body>
</html>