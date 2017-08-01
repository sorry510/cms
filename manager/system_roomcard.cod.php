<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>

<!-- content -->
<div id="usystem_roomcard" class="gcontent">
  <ul class="am-nav am-nav-pills ubread">
  	<li class="am-active"><a href="javascript: void(0)">房间手牌管理</a></li>
    <li><a href="system_roomcate.php">分类管理</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="utools">
	<form class="am-form-inline uform2">
	</form>
	<button class="am-btn ubtn-sure ubtn-blue" data-am-modal="{target: '#usystem_roomcardm1'}">
	<i class="iconfont icon-xinzeng"></i>
	  新增房间/手牌
	</button>
  </div>
  <div class="gspace15"></div>
  <table class="am-table am-table-bordered am-table-hover am-table-compact utable1" id="doc-modal-list">
    <thead>
      <tr>
        <td>分类</td>
        <td>名称</td>
        <td>ID</td>
        <td width="12%">操作</td>
      </tr>
    </thead>
    <tr>
      <td>一楼大厅</td>
      <td>1000</td>
      <td>213124321</td>
      <td>
        <button class="am-btn ubtn-table ubtn-green" data-am-modal="{target:'#usystem_roomcardm2'}">
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
    <li class="upage-info">共1页 3条记录</li>
    <li class="am-disabled"><a href="#">&laquo;</a></li>
    <li class="am-active"><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">&raquo;</a></li>
  </ul> 
</div>

<!--modal框-->
<div class="am-modal" tabindex="-1" id="usystem_roomcardm1">
  <div class="am-modal-dialog umodal umodal-simple">
    <div class="am-modal-hd uhead">新增房间/手牌
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd umain1">
      <form class="am-form am-form-horizontal">
      	<div class="am-form-group">
          <label class="umodal-label am-form-label" for="">分类：</label>
          <div class="umodal-normal">
            <select class="uselect uselect-max" data-am-selected required>
              <option value="a">请选择分类</option>
              <option value="b">一楼大厅</option>
              <option value="o">二楼包间</option>
            </select>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">名称：</label>
          <div class="umodal-normal">
            <input type="text" class="am-form-field uinput uinput-max">
          </div>
          <div class="umodal-text gtext-green">（房间、手牌号码等）</div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">ID号：</label>
          <div class="umodal-normal">
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

<div class="am-modal" tabindex="-1" id="usystem_roomcardm2">
  <div class="am-modal-dialog umodal umodal-simple">
    <div class="am-modal-hd uhead">修改房间/手牌
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd umain1">
      <form class="am-form am-form-horizontal">
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">分类：</label>
          <div class="umodal-normal">
            <select class="uselect uselect-max" data-am-selected required>
              <option value="a">请选择分类</option>
              <option value="b">一楼大厅</option>
              <option value="o">二楼包间</option>
            </select>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">名称：</label>
          <div class="umodal-normal">
            <input type="text" class="am-form-field uinput uinput-max">
          </div>
          <div class="umodal-text gtext-green">（房间、手牌号码等）</div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">ID号：</label>
          <div class="umodal-normal">
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
