<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>

<!-- content -->
<div id="system_print" class="gcontent">
  <ul class="am-nav am-nav-pills ubread">
    <li class="am-active"><a href="javascript: void(0)">打印设置</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="utools">
    <form class="am-form-inline uform1">
      <div class="am-u-lg-12">
        <label class="am-u-lg-2">设置本地打印机：</label> 
      </div>
      <div class="am-u-lg-12 ua">
        <div class="am-u-lg-1" >&nbsp;</div>
        <label class="am-u-lg-1 ua1">是否启用：</label>
        <div class="ua2">
          <label class="am-radio-inline ua2a">
            <input type="radio" name="radio1" class="am-ucheck-radio" value="1" data-am-ucheck> 启用
          </label>
          <label class="am-radio-inline ua2a">
            <input type="radio" name="radio1" class="am-ucheck-radio" value="2" data-am-ucheck="" checked="">
            不启用
          </label>
        </div>
      </div>
      <div class="am-u-lg-12 ua">
        <div class="am-u-lg-1" >&nbsp;</div>
        <label class="am-u-lg-1 ua1">打印标题：</label> 
        <input class="am-form-field uinput uinput-220" type="text" name="">
      </div>
      <div class="am-u-lg-12 ua">
        <div class="am-u-lg-1">&nbsp;</div>
        <label class="am-u-lg-1 ua1">打印纸宽度：</label> 
        <select class="uselect uselect-auto" data-am-selected name="">
          <option value="all">58mm</option>
          <option value="2">2</option>
          <option value="3">3</option>
        </select>
      </div>
      <div class="am-u-lg-12 ua">
        <div class="am-u-lg-1">&nbsp;</div>
        <label class="am-u-lg-1 ua1">打印机选择：</label> 
        <select class="uselect uselect-auto" data-am-selected name="">
          <option value="all">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
        </select>
      </div>
      <div class="am-u-lg-12 ua">
        <div class="am-u-lg-1">&nbsp;</div>
        <label class="am-u-lg-1 ua1">打印份数：</label> 
        <select class="uselect uselect-auto" data-am-selected name="">
          <option value="all">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
        </select>
      </div>
      <div class="am-u-lg-12 ua">
        <div class="am-u-lg-1">&nbsp;</div>
        <label class="am-u-lg-1 ua1">联系电话：</label>
        <input class="am-form-field uinput uinput-220" type="text" name="">
      </div>
      <div class="am-u-lg-12 ua">
        <div class="am-u-lg-1">&nbsp;</div>
        <label class="am-u-lg-1 ua1" >微信二维码：</label>
        <div class="am-form-file" style="width: 220px;">
          <button type="button" class="am-btn am-btn-default am-btn-sm" style="width: 100%;">
            <i class="am-icon-cloud-upload"></i>
          </button>
          <input type="file" id="doc-ipt-file-2">
        </div>
      </div>
      <div class="am-u-lg-12 ua">
        <div class="am-u-lg-1">&nbsp;</div>
        <label class="am-u-lg-1 ua1">打印尾注1：</label>
        <textarea class="am-form-field utextarea" row="3"></textarea>
      </div>
      <div class="am-u-lg-12 ua">
        <div class="am-u-lg-1">&nbsp;</div>
        <label class="am-u-lg-1 ua1">打印尾注2：</label>
        <textarea class="am-form-field utextarea" row="3"></textarea>
      </div>
      <div class="gspace25"></div>

      <div class="am-u-lg-12">
        <label class="am-u-lg-2">设置云打印机1：</label> 
      </div>
      <div class="am-u-lg-12 ua">
        <div class="am-u-lg-1" >&nbsp;</div>
        <label class="am-u-lg-1 ua1">是否启用：</label>
        <div class="ua2">
          <label class="am-radio-inline ua2a">
            <input type="radio" name="radio2" class="am-ucheck-radio" value="1" data-am-ucheck> 启用
          </label>
          <label class="am-radio-inline ua2a">
            <input type="radio" name="radio2" class="am-ucheck-radio" value="2" data-am-ucheck="" checked="">
            不启用
          </label>
        </div>
      </div>
      <div class="am-u-lg-12 ua">
        <div class="am-u-lg-1">&nbsp;</div>
        <label class="am-u-lg-1 ua1">设备型号：</label> 
        <input class="am-form-field uinput uinput-220" type="text" name="">
      </div>
      <div class="am-u-lg-12 ua">
        <div class="am-u-lg-1">&nbsp;</div>
        <label class="am-u-lg-1 ua1">终端号：</label> 
        <input class="am-form-field uinput uinput-220" type="text" name="">
      </div>
      <div class="am-u-lg-12 ua">
        <div class="am-u-lg-1">&nbsp;</div>
        <label class="am-u-lg-1 ua1">密钥：</label> 
        <input class="am-form-field uinput uinput-220" type="text" name="">
      </div>
      <div class="gspace25"></div>

      <div class="am-u-lg-12">
        <label class="am-u-lg-2">设置云打印机2：</label> 
      </div>
      <div class="am-u-lg-12 ua">
        <div class="am-u-lg-1" >&nbsp;</div>
        <label class="am-u-lg-1 ua1">是否启用：</label>
        <div class="ua2">
          <label class="am-radio-inline ua2a">
            <input type="radio" name="radio3" class="am-ucheck-radio" value="1" data-am-ucheck> 启用
          </label>
          <label class="am-radio-inline ua2a">
            <input type="radio" name="radio3" class="am-ucheck-radio" value="2" data-am-ucheck="" checked="">
            不启用
          </label>
        </div>
      </div>
      <div class="am-u-lg-12 ua">
        <div class="am-u-lg-1">&nbsp;</div>
        <label class="am-u-lg-1 ua1">设备型号：</label> 
        <input class="am-form-field uinput uinput-220" type="text" name="">
      </div>
      <div class="am-u-lg-12 ua">
        <div class="am-u-lg-1">&nbsp;</div>
        <label class="am-u-lg-1 ua1">终端号：</label> 
        <input class="am-form-field uinput uinput-220" type="text" name="">
      </div>
      <div class="am-u-lg-12 ua">
        <div class="am-u-lg-1">&nbsp;</div>
        <label class="am-u-lg-1 ua1">密钥：</label> 
        <input class="am-form-field uinput uinput-220" type="text" name="">
      </div>
      <div class="gspace25"></div>
      <div class="am-u-lg-12">
        <div class="am-u-lg-1">&nbsp;</div>
        <label class="am-u-lg-1 ua1">&nbsp;</label> 
        <button type="submit" class="am-btn ubtn-sure ubtn-green"><i class="iconfont icon-yuanxingxuanzhong"></i>
          完成
        </button>
      </div>
    </form>
  </div>
</div>

<script src="../js/jquery.min.js"></script>
<script src="../js/amazeui.min.js"></script>

</body>
</html>
