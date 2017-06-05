<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>
<!-- content -->
<div class="gcontent" id="ustock_manage">
  <ul class="am-nav am-nav-pills ubread">
    <li class="am-active"><a href="javascript: void(0);">入库和出库</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="utools">
    <form class="am-form-inline uform2">
      <div class="am-form-group">
        查询范围：从
        <div class="am-input-group am-datepicker-date udatepicker udatepicker140" data-am-datepicker="{format: 'yyyy-mm-dd'}">
          <input type="text" class="am-form-field" name="">
          <span class="am-input-group-btn am-datepicker-add-on">
            <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span>
            </button>
          </span>
        </div>  
      </div>
      <div class="am-form-group">    
        至
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
    <button class="am-btn ubtn-sure ubtn-blue" data-am-modal="{target:'#ustock_managerm1'}">
      <i class="iconfont icon-xinzeng"></i>
      新增单据
    </button>
  </div>
  <div class="gspace30"></div>
  <table class="am-table am-table-bordered am-table-hover am-table-compact utable1">
    <thead>
      <tr>
        <td>时间</td>
        <td>类型</td>
        <td>金额</td>
        <td>经办人</td>
        <td>备注</td>
        <td style="width: 12%;">操作</td>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>2017-5-22</td>
        <td>店铺通用型</td>
        <td>888</td>
        <td>张三</td>
        <td>账目未清点</td>
        <td>
          <button class="am-btn ubtn-table ubtn-green">
            <i class="iconfont icon-bianji"></i>
            编辑
          </button>&nbsp;&nbsp;
          <button class="am-btn ubtn-table ubtn-gray cdel">
            <i class="iconfont icon-shanchu"></i>
            删除
          </button> 
        </td>
      </tr>
      <tr>
        <td>2017-5-22</td>
        <td>店铺通用型</td>
        <td>888</td>
        <td>张三</td>
        <td>账目未清点</td>
        <td>
          <button class="am-btn ubtn-table ubtn-green">
            <i class="iconfont icon-bianji"></i>
            编辑
          </button>&nbsp;&nbsp;
          <button class="am-btn ubtn-table ubtn-gray cdel">
            <i class="iconfont icon-shanchu"></i>
            删除
          </button> 
        </td>
      </tr>
    </tbody>
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
<!-- 弹出框 -->
<div id="ustock_managerm1" class="am-modal" tabindex="-1">
  <div class="am-modal-dialog umodal">
    <div class="am-modal-hd uhead">新增单据
      <a href="javascript:void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd">
      <form class="am-form am-form-horizontal">
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
          <div class="umodal-search">&nbsp;</div>
          <label class="umodal-label am-form-label" for="">类型：</label>
          <div class="umodal-normal">
            <select class="uselect uselect-max" data-am-selected>
              <option value="a">店铺通用型</option>
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
            <input id="" class="am-form-field uinput uinput-max" type="password" placeholder="">
          </div>
          <div class="umodal-search">&nbsp;</div>
          <label class="umodal-label am-form-label" for="">经办人：</label>
          <div class="umodal-normal">
            <input id="" class="am-form-field uinput uinput-max" type="password" placeholder="">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">备注：</label>
          <div class="umodal-max">
            <input type="text" class="am-form-field uinput uinput-max" placeholder="">
          </div>
        </div>
        <div class="ucontent">
          <div class="ua">
            <div class="ua1">
              <form class="am-form-inline" role="form">
                <div class="am-form-group">
                  <div class="am-u-lg-5">
                    <input id="" class="am-form-field uinput uinput-max" type="text" placeholder="条码">
                  </div>
                  <div class="am-u-lg-4">
                    <input id="" class="am-form-field uinput uinput-max" type="text" placeholder="关键字">
                  </div>
                  <div class="am-u-lg-3">
                    <button type="button" class="am-btn ubtn-green ubtn-search2">
                      <i class="iconfont icon-search"></i>
                      查询
                    </button>
                  </div>
                </div>
                <div class="am-form-group">
                  <ul class="am-u-lg-3 ucate">
                    <li>全部分类</li>
                    <li>分类1</li>
                    <li>分类2</li>
                  </ul>
                  <table class="am-table am-table-bordered am-table-centered am-table-hover am-table-compact">
                    <thead>
                      <tr class="utr1">
                        <td>产品名称</td>
                        <td>价格</td>
                        <td>添加</td>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>基础套餐一</td>
                        <td>￥789</td>
                        <td class="add"><a href="javascript:;">添加</a></td>
                      </tr>
                      <tr>
                        <td>基础套餐二</td>
                        <td>￥999</td>
                        <td class="add"><a href="javascript:;">添加</a></td>
                      </tr>
                    </tbody>
                  </table> 
                </div>
              </form>
            </div>
            <div class="ua2">
              <i class="iconfont icon-shuangxiangjiantou"></i>
            </div>
          </div>
          <div class="ub">
            <table class="am-table am-table-bordered am-table-centered am-table-hover am-table-compact" id="tb">
              <thead>
                <tr class="utr1">
                  <td>产品名称</td>
                  <td>价格</td>
                  <td>数量</td>
                  <td>移除</td>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>基础套餐</td>
                  <td>￥998</td>
                  <td><input type="text" class="am-form-field uinput uinput-60" placeholder=""></td>
                  <td><a href="javascript:;" class="am-text-primary mdel">移除</a></td>
                </tr>
              </tbody>
            </table> 
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

$(function() {
  $('.add').on('click', function(){
    var product = $(this).siblings().eq(0).text();
    var price = $(this).siblings().eq(1).text();
    var trhtml = "<tr><td>"+product+"</td><td>"+price+"</td><td><input type='text' class='am-form-field uinput uinput-60' placeholder=''></td><td><a href='javascript:;' class='am-text-primary mdel'>移除</a></td></tr>";
    $("#tb").append(trhtml);
    var height = $(".ucontent .ub").outerHeight(true);
    $(".ucontent .ua1").css('min-height',height);
  });
});

$(document).on("click",".mdel",function(){
    $(this).parent().parent().remove();
    var height = $(".ucontent .ub").outerHeight(true);
    $(".ucontent .ua1").css('min-height',height);
});
 
</script>
</body>
</html>