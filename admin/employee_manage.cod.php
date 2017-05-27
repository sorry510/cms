<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>

<!-- content -->
<div id="uemployee_manage" class="gcontent">
  <ul class="am-nav am-nav-pills ubread">
    <li class="am-active"><a href="javascript: void(0)">员工管理</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="utools">
    <form class="am-form-inline uform2">
      <div class="am-form-group">
        姓名： 
        <input class="am-form-field uinput" type="text" name="">
      </div>
      <div class="am-form-group">
        电话： 
        <input class="am-form-field uinput" type="text" name="">
      </div>
      <div class="am-form-group">
        身份证号： 
        <input class="am-form-field uinput" type="text" name="">
      </div>
      <div class="am-form-group">
        分店： 
        <select class="uselect" data-am-selected name="">
          <option value="all">全部</option>
          <option value="2">2</option>
          <option value="3">3</option>
        </select>
      </div>
      <div class="am-form-group">
        分组： 
        <select class="uselect" data-am-selected name="">
          <option value="all">全部</option>
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
    <button class="am-btn ubtn-sure ubtn-blue" data-am-modal="{target: '#uemployee_managem1'}">
      <i class="iconfont icon-group"></i>
      新增员工
    </button>
  </div>
  <div class="gspace30"></div>
  <table class="am-table am-table-bordered am-table-hover am-table-compact utable1" id="doc-modal-list">
    <thead>
      <tr>
        <td>员工编号</td>
        <td>员工姓名</td>
        <td>性别</td>
        <td>电话</td>
        <td>身份证号</td>
        <td>出生日期</td>
        <td>入职时间</td>
        <td>职位</td>
        <td style="width: 12%;">操作</td>
      </tr>
    </thead>
    <tr>
      <td>20115</td>
      <td>张小明</td>
      <td>男</td>
      <td>13623812345</td>
      <td>410108199506201125</td>
      <td>19920101</td>
      <td>20000101</td>
      <td>店员</td>
      <td>
        <button class="am-btn ubtn-table ubtn-green" data-am-modal="{target: '#uemployee_managem2'}">
          <i class="iconfont icon-bianji"></i>
          修改
        </button>
        <button class="am-btn ubtn-table ubtn-gray cdel">
          <i class="iconfont icon-shanchu"></i>
          删除
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
<div class="am-modal" tabindex="-1" id="uemployee_managem1">
  <div class="am-modal-dialog umodal">
    <div class="am-modal-hd uhead">新增员工
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd umain1">
      <form class="am-form am-form-horizontal">
        <div class="am-form-group">
          <label class="am-u-lg-2 am-form-label" for="">编号</label>
          <div class="am-u-lg-4">
            <input type="text" class="am-form-field uinput uinput-max">
          </div>
          <label class="am-u-lg-2 am-form-label" for="">姓名</label>
          <div class="am-u-lg-4">
            <input type="text" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-2 am-form-label" for="">性别</label>
          <div class="am-u-lg-4" style="padding-top: 4px;">
            <label class="am-radio-inline">
              <input type="radio" name="radio1" value="male" data-am-ucheck> 男
            </label>
            <label class="am-radio-inline">
              <input type="radio" name="radio1" value="female" data-am-ucheck> 女
            </label>
          </div>
          <label class="am-u-lg-2 am-form-label" for="">出生日期</label>
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
          <label class="am-u-lg-2 am-form-label" for="">手机号码</label>
          <div class="am-u-lg-4">
            <input type="text" class="am-form-field uinput uinput-max">
          </div>
          <label class="am-u-lg-2 am-form-label" for="">身份证号</label>
          <div class="am-u-lg-4">
            <input type="text" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-2 am-form-label" for="">学历</label>
          <div class="am-u-lg-4">
            <select class="uselect uselect-max" data-am-selected>
              <option value="a">高中</option>
              <option value="b">大学</option>
              <option value="o">Orange</option>
              <option value="m">Mango</option>
              <option value="d">禁用</option>
            </select>
          </div>
          <label class="am-u-lg-2 am-form-label" for="">入职时间</label>
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
          <label class="am-u-lg-2 am-form-label" for="">住址</label>
          <div class="am-u-lg-10">
            <input id="" class="am-form-field uinput uinput-max" type="password">
          </div>
        </div>
        <div class="am-form-group ">
          <label class="am-u-lg-2 am-form-label">员工照片</label>
          <div class="am-u-lg-4 am-form-file" style="text-align: left;">
            <button type="button" class="am-btn am-btn-default am-btn-sm" style="width: 100%;">
              <i class="am-icon-cloud-upload"></i> 选择要上传的照片
            </button>
            <input type="file" id="doc-ipt-file-2">
          </div>
          <label class="am-u-lg-2 am-form-label">身份证照</label>
          <div class="am-u-lg-4 am-form-file" style="text-align: left;">
            <button type="button" class="am-btn am-btn-default am-btn-sm" style="width: 100%;">
              <i class="am-icon-cloud-upload"></i> 选择要上传的照片
            </button>
            <input type="file" id="doc-ipt-file-2">
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-2 am-form-label" for="">员工分组</label>
          <div class="am-u-lg-4">
            <select class="uselect uselect-max" data-am-selected>
              <option value="a">第一组</option>
              <option value="b">大学</option>
              <option value="o">Orange</option>
              <option value="m">Mango</option>
              <option value="d">禁用</option>
            </select>
          </div>
          <label class="am-u-lg-2 am-form-label" for="">基本工资</label>
          <div class="am-u-lg-4">
            <input type="text" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-2 am-form-label" for="">工作内容</label>
          <div class="am-u-lg-10" style="text-align: left;padding-top: 4px;">
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
          <label class="am-u-lg-2 am-form-label" for="">导购提成</label>
          <div class="am-u-lg-4" style="padding-top: 4px;">
            <label class="am-radio-inline">
              <input type="radio" name="radio1" value="male" data-am-ucheck> 参与
            </label>
            <label class="am-radio-inline">
              <input type="radio" name="radio1" value="female" data-am-ucheck> 不参与
            </label>
          </div>
          <label class="am-u-lg-2 am-form-label" for="">是否参与预约</label>
          <div class="am-u-lg-4" style="padding-top: 4px;">
            <label class="am-radio-inline">
              <input type="radio" name="radio1" value="male" data-am-ucheck> 参与
            </label>
            <label class="am-radio-inline">
              <input type="radio" name="radio1" value="female" data-am-ucheck> 不参与
            </label>
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
<div class="am-modal" tabindex="-1" id="uemployee_managem2">
  <div class="am-modal-dialog umodal">
    <div class="am-modal-hd uhead">修改员工
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd umain1">
      <form class="am-form am-form-horizontal">
        <div class="am-form-group">
          <label class="am-u-lg-2 am-form-label" for="">编号</label>
          <div class="am-u-lg-4">
            <input type="text" class="am-form-field uinput uinput-max">
          </div>
          <label class="am-u-lg-2 am-form-label" for="">姓名</label>
          <div class="am-u-lg-4">
            <input type="text" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-2 am-form-label" for="">性别</label>
          <div class="am-u-lg-4" style="padding-top: 4px;">
            <label class="am-radio-inline">
              <input type="radio" name="radio1" value="male" data-am-ucheck> 男
            </label>
            <label class="am-radio-inline">
              <input type="radio" name="radio1" value="female" data-am-ucheck> 女
            </label>
          </div>
          <label class="am-u-lg-2 am-form-label" for="">出生日期</label>
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
          <label class="am-u-lg-2 am-form-label" for="">手机号码</label>
          <div class="am-u-lg-4">
            <input type="text" class="am-form-field uinput uinput-max">
          </div>
          <label class="am-u-lg-2 am-form-label" for="">身份证号</label>
          <div class="am-u-lg-4">
            <input type="text" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-2 am-form-label" for="">学历</label>
          <div class="am-u-lg-4">
            <select class="uselect uselect-max" data-am-selected>
              <option value="a">高中</option>
              <option value="b">大学</option>
              <option value="o">Orange</option>
              <option value="m">Mango</option>
              <option value="d">禁用</option>
            </select>
          </div>
          <label class="am-u-lg-2 am-form-label" for="">入职时间</label>
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
          <label class="am-u-lg-2 am-form-label" for="">住址</label>
          <div class="am-u-lg-10">
            <input id="" class="am-form-field uinput uinput-max" type="password" >
          </div>
        </div>
        <div class="am-form-group ">
          <label class="am-u-lg-2 am-form-label">员工照片</label>
          <div class="am-u-lg-4 am-form-file" style="text-align: left;">
            <button type="button" class="am-btn am-btn-default am-btn-sm" style="width: 100%;">
              <i class="am-icon-cloud-upload"></i> 选择要上传的照片
            </button>
            <input type="file" id="doc-ipt-file-2">
          </div>
          <label class="am-u-lg-2 am-form-label">身份证照</label>
          <div class="am-u-lg-4 am-form-file" style="text-align: left;">
            <button type="button" class="am-btn am-btn-default am-btn-sm" style="width: 100%;">
              <i class="am-icon-cloud-upload"></i> 选择要上传的照片
            </button>
            <input type="file" id="doc-ipt-file-2">
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-2 am-form-label" for="">员工分组</label>
          <div class="am-u-lg-4">
            <select class="uselect uselect-max" data-am-selected>
              <option value="a">第一组</option>
              <option value="b">大学</option>
              <option value="o">Orange</option>
              <option value="m">Mango</option>
              <option value="d">禁用</option>
            </select>
          </div>
          <label class="am-u-lg-2 am-form-label" for="">基本工资</label>
          <div class="am-u-lg-4">
            <input type="text" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-2 am-form-label" for="">工作内容</label>
          <div class="am-u-lg-10" style="text-align: left;padding-top: 4px;">
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
          <label class="am-u-lg-2 am-form-label" for="">导购提成</label>
          <div class="am-u-lg-4" style="padding-top: 4px;">
            <label class="am-radio-inline">
              <input type="radio" name="radio1" value="male" data-am-ucheck> 参与
            </label>
            <label class="am-radio-inline">
              <input type="radio" name="radio1" value="female" data-am-ucheck> 不参与
            </label>
          </div>
          <label class="am-u-lg-2 am-form-label" for="">是否参与预约</label>
          <div class="am-u-lg-4" style="padding-top: 4px;">
            <label class="am-radio-inline">
              <input type="radio" name="radio1" value="male" data-am-ucheck> 参与
            </label>
            <label class="am-radio-inline">
              <input type="radio" name="radio1" value="female" data-am-ucheck> 不参与
            </label>
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
<!-- 删除框 -->
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
<script>
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
