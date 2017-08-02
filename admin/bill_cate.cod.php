<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>
<div id="ubill_cate" class="gcontent">
  <ul class="am-nav am-nav-pills ubread">
    <li><a href="bill_manage.php">收支管理</a></li>
    <li class="am-active"><a href="#">收支分类</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="utools">
    <form class="am-form-inline uform2">
    </form>
    <button class="am-btn ubtn-sure ubtn-blue" data-am-modal="{target:'#ubill_catem1'}">
      <i class="iconfont icon-xinzeng"></i>
      新增收支分类
    </button>
  </div>
  <div class="gspace15"></div>
  <table class="am-table am-table-bordered am-table-hover am-table-compact utable1" id="doc-modal-list">
    <thead>
      <tr>
      <td>分类名称</td>
      <td style="width: 12%;">操作</td>
    </tr>
    </thead>
    <tr>
      <td>房租</td>
      <td>
        <button class="am-btn ubtn-table ubtn-green" data-am-modal="{target: '#ubill_catem2'}">
          <i class="iconfont icon-bianji"></i>
          修改
        </button>
        &nbsp;
        <button class="am-btn ubtn-table ubtn-gray cdel">
          <i class="iconfont icon-shanchu"></i>
          删除
        </button>
      </td>
    </tr> 
    <tr>
      <td>水电费</td>
      <td>
        <button class="am-btn ubtn-table ubtn-green" data-am-modal="{target: '#ubill_catem2'}">
          <i class="iconfont icon-bianji"></i>
          修改
        </button>
        &nbsp;
        <button class="am-btn ubtn-table ubtn-gray cdel">
          <i class="iconfont icon-shanchu"></i>
          删除
        </button>
      </td>
    </tr>
    <tr>
      <td>工资</td>
      <td>
        <button class="am-btn ubtn-table ubtn-green" data-am-modal="{target: '#ubill_catem2'}">
          <i class="iconfont icon-bianji"></i>
          修改
        </button>
        &nbsp;
        <button class="am-btn ubtn-table ubtn-gray cdel">
          <i class="iconfont icon-shanchu"></i>
          删除
        </button>
      </td>
    </tr>
  </table>
  <ul class="am-pagination am-pagination-centered upages">
    <li class="upagedec">共1页 3条记录</li>
    <li class="am-disabled"><a href="#">&laquo;</a></li>
    <li class="am-active"><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">&raquo;</a></li>
  </ul> 
</div>
<!-- 弹出框添加 -->
<div class="am-modal" tabindex="-1" id="ubill_catem1">
  <div class="am-modal-dialog umodal umodal-simple">
    <div class="am-modal-hd uhead">添加分类
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd">
      <form class="am-form am-form-horizontal">
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">分类名称：</label>
          <div class="umodal-normal">
            <input type="text" class="am-form-field uinput uinput-max">
          </div>
          <label class="umodal-label am-form-label" for=""></label>
          <div class="umodal-normal">
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
<div class="am-modal" tabindex="-1" id="ubill_catem2">
  <div class="am-modal-dialog umodal umodal-simple">
    <div class="am-modal-hd uhead">修改分类
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd">
      <form class="am-form am-form-horizontal">
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">分类名称：</label>
          <div class="umodal-normal">
            <input type="text" class="am-form-field uinput uinput-max">
          </div>
          <label class="umodal-label am-form-label" for=""></label>
          <div class="umodal-normal">
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
<script type="text/javascript">
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