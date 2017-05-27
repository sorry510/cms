<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>
<!-- content -->
<div class="gcontent" id="umarketing_experience">
  <ul class="am-nav am-nav-pills ubread">
    <li class="am-active"><a href="javascript: void(0);">体验券设置</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="utools">
    <form class="am-form-inline uform2">
    </form>
    <button class="am-btn ubtn-sure ubtn-blue" data-am-modal="{target:'#umarketing_experiencem1'}">
      <i class="iconfont icon-question"></i>
      新增体验券
    </button>
  </div>
  <div class="gspace30"></div>
  <table class="am-table am-table-bordered am-table-hover am-table-compact utable1">
    <thead>
      <tr>
        <td>名称</td>
        <td>面值</td>
        <td>有效期</td>
        <td>到期时间</td>
        <td>体验项目</td>
        <td style="width:12%">操作</td>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>五折券</td>
        <td>100元</td>
        <td>一年</td>
        <td>2017-7-8</td>
        <td>电器区</td>
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
        <td>五折券</td>
        <td>100元</td>
        <td>一年</td>
        <td>2017-7-8</td>
        <td>电器区</td>
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
<!-- 新增体验券弹出框 -->
<div id="umarketing_experiencem1" class="am-modal" tabindex="-1">
  <div class="am-modal-dialog umodal">
    <div class="am-modal-hd uhead">新增体验券
      <a href="javascript:void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd umain1">
      <form class="am-form am-form-horizontal">
        <div class="am-form-group">
          <label class="am-u-lg-2 am-form-label" for="">名称</label>
          <div class="am-u-lg-4">
            <input id="" class="am-form-field uinput uinput-max" type="password" placeholder="">
          </div>
          <label class="am-u-lg-2 am-form-label" for="">面值</label>
          <div class="am-u-lg-4">
            <input id="" class="am-form-field uinput uinput-max" type="text" placeholder="">
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-2 am-form-label" for="">到期时间</label>
          <div class="am-u-lg-4">
            <div class="am-input-group am-datepicker-date udatepicker udatepicker-max" data-am-datepicker="{format:'yyyy-mm-dd'}">
              <input type="text" class="am-form-field">
              <span class="am-input-group-btn am-datepicker-add-on">
                <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span></button>
              </span>
            </div>
          </div>
          <label class="am-u-lg-2 am-form-label" for="">有效期</label>
          <div class="am-u-lg-4 ua">
            <input id="" class="uinput uinput-max" type="text" placeholder="">
            <span>天</span>
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-2 am-form-label" for="">备注</label>
          <div class="am-u-lg-10">
            <input type="text" class="am-form-field uinput uinput-max" placeholder="">
          </div>
        </div>
        <div class="ucontent">
          <div class="ua">
            <div class="ua1 am-tabs" data-am-tabs>
              <ul class="am-tabs-nav am-nav am-nav-tabs ua1a">
                <li class="am-active"><a href="#tab1">服务</a></li>
                <li><a href="#tab2">商家</a></li>
              </ul>
              <div class="am-tabs-bd">
                <div class="am-tab-panel am-fade am-in am-active" id="tab1">
                  <form class="am-form-inline" role="form">
                    <div class="am-form-group usearch">
                      <div class="am-u-lg-4">
                        <input id="" class="am-form-field uinput uinput-max" type="text" placeholder="关键字">
                      </div>
                      <div class="am-u-lg-3">
                        <button type="button" class="am-btn ubtn-green ubtn-search2">
                          <i class="iconfont icon-search"></i>
                          搜索
                        </button>
                      </div>
                    </div>
                  </form>
                  <div class="gspace10"></div>
                  <div class="am-form-group am-tabs  utabsnest">
                    <ul class="am-u-lg-4 am-tabs-nav am-nav am-nav-tabs">
                      <li class="am-active"><a href="#tab3">全部分类</a></li>
                      <li><a href="#tab4">分类1</a></li>
                      <li><a href="#tab5">分类2</a></li>
                    </ul>
                    <div class="am-tabs-bd">
                      <div class="am-tab-panel am-fade am-in am-active" id="tab3">
                      <table class="am-table am-table-bordered am-table-centered am-table-hover am-table-compact">
                          <thead>
                            <tr class="utr1">
                              <td>服务名称</td>
                              <td>价格</td>
                              <td>添加</td>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>服务一</td>
                              <td>￥789</td>
                              <td class="add"><a href="javascript:;">添加</a></td>
                            </tr>
                            <td>服务二</td>
                              <td>￥789</td>
                              <td class="add"><a href="javascript:;">添加</a></td>
                            </tr>
                          </tbody>
                        </table> 
                      </div>
                      <div class="am-tab-panel am-fade" id="tab4">
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
                              <td>服务三</td>
                              <td>￥789</td>
                              <td class="add"><a href="javascript:;">添加</a></td>
                            </tr>
                            <tr>
                              <td>服务四</td>
                              <td>￥789</td>
                              <td class="add"><a href="javascript:;">添加</a></td>
                            </tr>
                            <tr>
                              <td>服务五</td>
                              <td>￥789</td>
                              <td class="add"><a href="javascript:;">添加</a></td>
                            </tr>
                            <tr>
                              <td>服务六</td>
                              <td>￥789</td>
                              <td class="add"><a href="javascript:;">添加</a></td>
                            </tr>
                          </tbody>
                        </table> 
                      </div>
                      <div class="am-tab-panel am-fade" id="tab5">
                        <table class="am-table am-table-bordered am-table-centered am-table-hover am-table-compact">
                          <thead>
                            <tr class="utr1">
                              <td>服务名称</td>
                              <td>价格</td>
                              <td>添加</td>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>服务七</td>
                              <td>￥789</td>
                              <td class="add"><a href="javascript:;">添加</a></td>
                            </tr>
                          </tbody>
                        </table> 
                      </div> 
                    </div>
                  </div>
                </div>

                <div class="am-tab-panel am-fade" id="tab2">
                  暂时没有该项
                </div>
              </div>
            </div>
            <div class="ua2">
              <i class="iconfont icon-shuangxiangjiantou"></i>
            </div>
          </div>
          <div class="ub">
            <table class="am-table am-table-bordered am-table-centered am-table-hover am-table-compact" id="tb">
              <thead>
                <tr class="utr1">
                  <td>服务名称</td>
                  <td>次数</td>
                  <td>移除</td>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>基础套餐</td>
                  <td>
                    <input type="text" class="am-form-field uinput uinput-60" placeholder="">  
                    <label class="am-checkbox-inline ub1">
                      <input type="checkbox"  value="" data-am-ucheck>不限
                    </label>
                  </td>
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
// 表格中删除功能
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
// 添加功能
$(function() {
  $('.add').on('click', function(){
      var product = $(this).siblings().eq(0).text();
      var trhtml = "<tr><td>"+product+"</td><td><input type='text' class='am-form-field uinput uinput-60' placeholder=''> <label class='am-checkbox-inline ub1'><input type='checkbox'  value='' data-am-ucheck>不限</label></td><td><a href='javascript:;' class='am-text-primary mdel'>移除</a></td></tr>";
      $("#tb").append(trhtml);
      var height = $(".ucontent .ub").outerHeight(true);
      $(".ucontent .ua1").css('min-height',height);
        $("input[type='checkbox'], input[type='radio']").uCheck();
  });
});
// 移除功能
$(document).on("click",".mdel",function(){
    $(this).parent().parent().remove();
    var height = $(".ucontent .ub").outerHeight(true);
    $(".ucontent .ua1").css('min-height',height);
});
</script>
</body>
</html>