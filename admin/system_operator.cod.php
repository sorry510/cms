<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>
<div id="usystem_operator" class="gcontent">
  <ul class="am-nav am-nav-pills ubread">
    <li class="am-active"><a href="#">操作员</a></li>
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
    </form> 
    <button class="am-btn ubtn-sure ubtn-blue" data-am-modal="{target: '#usystem_operatorm1'}">
      <i class="iconfont icon-group"></i>
      新增操作员
    </button>
  </div>
  <div class="gspace30"></div>
  <table class="am-table am-table-bordered am-table-hover am-table-compact utable1" id="doc-modal-list">
    <thead>
      <tr>
        <td>操作员账号</td>
        <td>姓名</td>
        <td>所属分店</td>
        <td>身份</td>
        <td width="12%">操作</td>
      </tr>
    </thead>
    <tr>
      <td>201154</td>
      <td>李小明</td>
      <td>解放路分店</td>
      <td>店长</td>
      <td>
        <button class="am-btn ubtn-table ubtn-green" data-am-modal="{target: '#usystem_operatorm2'}">
          <i class="iconfont icon-bianji"></i>
          编辑
        </button>
        <button class="am-btn ubtn-table ubtn-gray cdel">
          <i class="iconfont icon-shanchu"></i>
          删除
        </button>
      </td>
    </tr>
    <tr>
      <td>201152</td>
      <td>张四</td>
      <td>解放路分店</td>
      <td>管理员</td>
      <td>
        <button class="am-btn ubtn-table ubtn-green" data-am-modal="{target: '#usystem_operatorm2'}">
          <i class="iconfont icon-bianji"></i>
          编辑
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
<div class="am-modal" tabindex="-1" id="usystem_operatorm1">
  <div class="am-modal-dialog umodal">
    <div class="am-modal-hd uhead">新增操作员
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd umain1">
      <form class="am-form am-form-horizontal" id="cadd">
        <div class="am-form-group">
          <label class="am-u-lg-3 am-form-label" for="">身份</label>
          <div class="am-u-lg-5 am-u-end">
            <label class="am-radio-inline">
              <input type="radio" name="radio1" value="0" data-am-ucheck> 管理员
            </label>
            <label class="am-radio-inline">
              <input type="radio" name="radio1" value="1" data-am-ucheck> 店长
            </label>
            <label class="am-radio-inline">
              <input type="radio" name="radio1" value="2" data-am-ucheck> 收银员
            </label>  
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-3 am-form-label" for="">账号</label>
          <div class="am-u-lg-4 am-u-end">
            <input type="text" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-3 am-form-label" for="">密码</label>
          <div class="am-u-lg-4 am-u-end">
            <input type="password" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-3 am-form-label" for="">所属分店</label>
          <div class="am-u-lg-4 am-u-end am-u-end">
            <select class="uselect uselect-max" data-am-selected>
              <option value="a">Apple</option>
              <option value="b">Banana</option>
              <option value="o">Orange</option>
              <option value="m">Mango</option>
              <option value="d">禁用</option>
            </select>
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-3 am-form-label" for="">姓名</label>
          <div class="am-u-lg-4 am-u-end am-u-end">
            <input type="text" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-3 am-form-label" for="">手机号码</label>
          <div class="am-u-lg-4 am-u-end am-u-end">
            <input type="text" class="am-form-field uinput uinput-max">
          </div>
        </div>
      </form>
    </div>
    <div class="am-modal-footer ufoot">
      <div class="am-btn-group">
        <button type="button" class="am-btn ubtn-sure ubtn-green cadd-form"><i class="iconfont icon-yuanxingxuanzhong"></i>
          完成
        </button>
      </div>
    </div>
  </div>
</div>
<div class="am-modal" tabindex="-1" id="usystem_operatorm2">
  <div class="am-modal-dialog umodal">
    <div class="am-modal-hd uhead">修改操作员
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd umain1">
      <form class="am-form am-form-horizontal">
        <div class="am-form-group">
          <label class="am-u-lg-3 am-form-label" for="">身份</label>
          <div class="am-u-lg-5 am-u-end">
            <label class="am-radio-inline">
              <input type="radio" name="radio1" value="0" data-am-ucheck checked disabled> 管理员
            </label>
            <label class="am-radio-inline">
              <input type="radio" name="radio1" value="1" data-am-ucheck disabled> 店长
            </label>
            <label class="am-radio-inline">
              <input type="radio" name="radio1" value="2" data-am-ucheck disabled> 收银员
            </label>  
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-3 am-form-label" for="">账号</label>
          <div class="am-u-lg-4 am-u-end">
            <input type="text" class="am-form-field uinput uinput-max" value="a123">
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-3 am-form-label" for="">密码</label>
          <div class="am-u-lg-4 am-u-end">
            <input type="password" class="am-form-field uinput uinput-max" value="1123">
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-3 am-form-label" for="">所属分店</label>
          <div class="am-u-lg-4 am-u-end am-u-end">
            <select class="uselect uselect-max" data-am-selected disabled>
              <option value="a">Apple</option>
              <option value="b">Banana</option>
              <option value="o">Orange</option>
              <option value="m">Mango</option>
              <option value="d">禁用</option>
            </select>
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-3 am-form-label" for="">姓名</label>
          <div class="am-u-lg-4 am-u-end am-u-end">
            <input type="text" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-3 am-form-label" for="">手机号码</label>
          <div class="am-u-lg-4 am-u-end am-u-end">
            <input type="text" class="am-form-field uinput uinput-max">
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