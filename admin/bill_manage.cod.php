<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>
<div id="ubill_manage" class="gcontent">
  <ul class="am-nav am-nav-pills ubread">
    <li class="am-active"><a href="#">收支管理</a></li>
    <li><a href="bill_cate.php">收支分类</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="utools">
    <form class="am-form-inline uform2">
      <div class="am-form-group">
        <label for="doc-ipt-3" class="am-form-label">收支类型：</label>
        <select class="uselect uselect-auto" data-am-selected name="">
           <option value="all">全部</option>
           <option value="2">支出</option>
           <option value="3">收入</option>
        </select>
      </div>
      <div class="am-form-group">
        <label for="doc-ipt-3" class="am-form-label">日期：</label>
        <div class="am-input-group am-datepicker-date udatepicker" data-am-datepicker="{format: 'yyyy-mm-dd'}">
          <input type="text" class="am-form-field" name="">
          <span class="am-input-group-btn am-datepicker-add-on">
            <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span>
            </button>
          </span>
        </div>  
      </div>
      <div class="am-form-group">    
        <label for="doc-ipt-3" class="am-form-label">至：</label>
        <div class="am-input-group am-datepicker-date udatepicker udatepicker140" data-am-datepicker="{format: 'yyyy-mm-dd'}">
          <input type="text" class="am-form-field" name="">
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
    <button class="am-btn ubtn-sure ubtn-blue" data-am-modal="{target:'#ubill_managem1'}">
      <i class="iconfont icon-xinzeng"></i>
      新增收支
    </button>
  </div>
  <div class="gspace15"></div>
  <table class="am-table am-table-bordered am-table-hover am-table-compact utable1">
    <thead>
      <tr>
        <td>收支</td>
        <td>名称</td>
        <td>分类</td>
        <td>金额</td>
        <td>时间</td>
        <td>备注</td>
        <td style="width:12%;">操作</td>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>收入</td>
        <td>卖衣服</td>
        <td>房租</td>
        <td>￥40</td>
        <td>2010-5-20 15:20</td>
        <td>无</td>
        <td>
          <button class="am-btn ubtn-table ubtn-green" data-am-modal="{target:'#ubill_managem2'}">
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
    </tbody>
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
<div class="am-modal" tabindex="-1" id="ubill_managem1">
  <div class="am-modal-dialog umodal umodal-simple">
    <div class="am-modal-hd uhead">新增收支
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd umain1">
      <form class="am-form am-form-horizontal" id="cadd">
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">收支：</label>
          <div class="umodal-normal am-text-left">
            <label class="am-radio-inline">
              <input type="radio" name="radio1" value="0" data-am-ucheck> 支出
            </label>
            <label class="am-radio-inline">
              <input type="radio" name="radio1" value="1" data-am-ucheck> 收入
            </label>  
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">名称：</label>
          <div class="umodal-normal">
            <input type="text" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">分类：</label>
          <div class="umodal-normal">
            <select class="uselect uselect-max" data-am-selected>
              <option value="a">房租</option>
              <option value="b">水费</option>
              <option value="o">电费</option>
              <option value="m">物业费</option>
              <option value="d">其它</option>
            </select>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">金额：</label>
          <div class="umodal-normal">
            <input type="text" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">时间：</label>
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
          <label class="umodal-label am-form-label" for="">备注：</label>
          <div class="umodal-max">
            <textarea class="am-form-field utextarea utextarea-max" row="3"></textarea>
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
<div class="am-modal" tabindex="-1" id="ubill_managem2">
  <div class="am-modal-dialog umodal umodal-simple">
    <div class="am-modal-hd uhead">修改收支
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd umain1">
      <form class="am-form am-form-horizontal" id="cadd">
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">收支：</label>
          <div class="umodal-normal am-text-left">
            <label class="am-radio-inline">
              <input type="radio" name="radio1" value="0" data-am-ucheck> 支出
            </label>
            <label class="am-radio-inline">
              <input type="radio" name="radio1" value="1" data-am-ucheck> 收入
            </label>  
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">名称：</label>
          <div class="umodal-normal">
            <input type="text" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">分类：</label>
          <div class="umodal-normal">
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
          <label class="umodal-label am-form-label" for="">金额：</label>
          <div class="umodal-normal">
            <input type="text" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">时间：</label>
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
          <label class="umodal-label am-form-label" for="">备注：</label>
          <div class="umodal-max">
            <textarea class="am-form-field utextarea utextarea-max" row="3"></textarea>
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