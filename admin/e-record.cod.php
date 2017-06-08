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
        <td>诊疗人员</td>
        <td>服务项目</td>
        <td>顾客评价</td>
      </tr>
    </thead>
    <tr>
    	<td><a href="javascript:void" data-am-offcanvas="{target: '#uoffcanvas'}">诊疗时间</a></td>
      <td>会员卡号</td>
      <td>会员姓名</td>
      <td>诊疗人员</td>
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
<div class="am-modal" tabindex="-1" id="ue-recordm1">
  <div class="am-modal-dialog umodal umodal-simple">
    <div class="am-modal-hd uhead">新增电子档案
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd umain1">
      <form class="am-form am-form-horizontal">
        <div class="am-form-group" >
          <label class="umodal-label am-form-label" for="">会员卡号：</label>
          <div class="umodal-normal">
            <input type="text" class="am-form-field uinput uinput-max">
          </div>
          <div class="umodal-search">
            <button type="button" class="am-btn ubtn-search">
              <i class="iconfont icon-search"></i>查询
            </button>
          </div>
        </div>
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
          <label class="umodal-label am-form-label" for="">服务项目：</label>
          <div class="umodal-max am-text-left">
            <label class="am-checkbox-inline">
              <input type="checkbox"  value="" data-am-ucheck> 理疗
            </label>
            <label class="am-checkbox-inline">
              <input type="checkbox"  value="" data-am-ucheck> 理发
            </label>
            <label class="am-checkbox-inline">
              <input type="checkbox"  value="" data-am-ucheck> 洗头
            </label>
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
          <label class="umodal-label am-form-label">&nbsp;</label>
          <div class="umodal-normal am-form-file am-text-left">
            <button type="button" class="am-btn am-btn-default am-btn-sm" style="width: 100%;">
              <i class="am-icon-cloud-upload"></i> 上传图片
            </button>
            <input type="file" id="doc-ipt-file-2">
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

<!--侧拉框-->
<div id="uoffcanvas" class="am-offcanvas" >
  <div class="am-offcanvas-bar am-offcanvas-bar-flip goffcanvas" style="width: 690px;">
    <div class="am-offcanvas-content" >
      <div class="am-modal-hd"><span class="title">档案信息</span>
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
  $(function() {
    var id = '#uoffcanvas';
    var $myOc = $(id);
    $('.doc-oc-js').on('click', function() {
      $myOc.offCanvas($(this).data('rel'));
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
  });
</script>
</body>
</html>