<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>

<!-- content -->
<div id="ugoods_package" class="gcontent">
  <ul class="am-nav am-nav-pills ubread">
    <li class="am-active"><a href="javascript: void(0)">套餐管理</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="utools">
    <form class="am-form-inline uform2">
      <div class="am-form-group">
        <label for="doc-ipt-3" class="am-form-label">名称：</label>
        <input type="text" class="am-form-field uinput uinput-220" placeholder="" name="">
      </div>
      <div class="am-form-group">
        <button type="submit" class="am-btn ubtn-search">
          <i class="iconfont icon-search"></i>查询
        </button>
      </div>
    </form> 
    <button class="am-btn ubtn-sure ubtn-blue" data-am-modal="{target: '#ugoods_packagem1'}">
      <i class="iconfont icon-question"></i>
      新增套餐
    </button>
  </div>
  <div class="gspace15"></div>
  <table class="am-table am-table-bordered am-table-hover am-table-compact utable1" id="doc-modal-list">
    <thead>
      <tr>
        <td>套餐名称</td>
        <td>编码</td>
        <td>价格</td>
        <td>会员价格</td>
        <td>有效期限</td>
        <td width="12%">操作</td>
      </tr>
    </thead>
    <tr>
      <td>30次套餐</td>
      <td>1002158</td>
      <td class="gtext-orange">380元</td>
      <td class="gtext-orange">280元</td>
      <td class="gtext-orange">2017-12-12</td>
      <td>
        <button class="am-btn ubtn-table ubtn-green" data-am-modal="{target: '#ugoods_packagem2'}">
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
      <td colspan="6" class="utable-text">
        剪头(10次)，洗头(10次) 
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
<div class="am-modal" tabindex="-1" id="ugoods_packagem1">
  <div class="am-modal-dialog umodal" style="width: 800px;">
    <div class="am-modal-hd uhead">新增套餐
      <a href="javascript:void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd umain1">
      <form class="am-form am-form-horizontal">
        <div class="am-form-group">
          <div class="am-u-lg-6">
            <label class="am-u-lg-3 am-form-label" for="">名称</label>
            <div class="am-u-lg-6">
             <input type="text" id="cgoodsname1" class="am-form-field uinput uinput-max" onKeyUp="query()" required>
            </div>
            <div class="am-u-lg-3">
              <input type="text" id="cupen1" class="am-form-field uinput uinput-max">
            </div>
          </div>
          <div class="am-u-lg-6">
            <label class="am-u-lg-3 am-form-label" for="">编码</label>
            <div class="am-u-lg-6">
             <input type="text" class="am-form-field uinput uinput-max">
            </div>
            <div class="am-u-lg-3">
            </div>
          </div>
        </div>
        <div class="am-form-group">
          <div class="am-u-lg-6">
            <label class="am-u-lg-3 am-form-label" for="">价格</label>
            <div class="am-u-lg-6">
             <input type="text" class="am-form-field uinput uinput-max">
            </div>
            <div class="am-u-lg-3">
            </div>
          </div>
          <div class="am-u-lg-6">
            <label class="am-u-lg-3 am-form-label" for="">会员价</label>
            <div class="am-u-lg-6">
             <input type="text" class="am-form-field uinput uinput-max">
            </div>
            <div class="am-u-lg-3">
            </div>
          </div>
        </div>
        <div class="am-form-group">
          <div class="am-u-lg-6">
            <label class="am-u-lg-3 am-form-label" for="">有效期限</label>
            <div class="am-u-lg-6">
              <div class="am-input-group am-datepicker-date udatepicker udatepicker-max" data-am-datepicker="{format:'yyyy-mm-dd'}">
              <input type="text" class="am-form-field">
              <span class="am-input-group-btn am-datepicker-add-on">
                <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span></button>
              </span>
            </div>
            </div>
            <div class="am-u-lg-3" style="padding-top: 4px;">
              <label class="am-checkbox-inline">
                <input type="checkbox"  value="" data-am-ucheck> 不限
              </label>
            </div>
          </div>
          <div class="am-u-lg-6">
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

<div class="am-modal" tabindex="-1" id="ugoods_packagem2">
  <div class="am-modal-dialog umodal">
    <div class="am-modal-hd uhead">新增套餐
      <a href="javascript:void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd umain1">
      <form class="am-form am-form-horizontal">
        <div class="am-form-group">
          <div class="am-u-lg-6">
            <label class="am-u-lg-3 am-form-label" for="">名称</label>
            <div class="am-u-lg-6">
             <input type="text" id="cgoodsname1" class="am-form-field uinput uinput-max" onKeyUp="query()" required>
            </div>
            <div class="am-u-lg-3">
              <input type="text" id="cupen1" class="am-form-field uinput uinput-max">
            </div>
          </div>
          <div class="am-u-lg-6">
            <label class="am-u-lg-3 am-form-label" for="">编码</label>
            <div class="am-u-lg-6">
             <input type="text" class="am-form-field uinput uinput-max">
            </div>
            <div class="am-u-lg-3">
            </div>
          </div>
        </div>
        <div class="am-form-group">
          <div class="am-u-lg-6">
            <label class="am-u-lg-3 am-form-label" for="">价格</label>
            <div class="am-u-lg-6">
             <input type="text" class="am-form-field uinput uinput-max">
            </div>
            <div class="am-u-lg-3">
            </div>
          </div>
          <div class="am-u-lg-6">
            <label class="am-u-lg-3 am-form-label" for="">会员价</label>
            <div class="am-u-lg-6">
             <input type="text" class="am-form-field uinput uinput-max">
            </div>
            <div class="am-u-lg-3">
            </div>
          </div>
        </div>
        <div class="am-form-group">
          <div class="am-u-lg-6">
            <label class="am-u-lg-3 am-form-label" for="">有效期限</label>
            <div class="am-u-lg-6">
              <div class="am-input-group am-datepicker-date udatepicker udatepicker-max" data-am-datepicker="{format:'yyyy-mm-dd'}">
              <input type="text" class="am-form-field">
              <span class="am-input-group-btn am-datepicker-add-on">
                <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span></button>
              </span>
            </div>
            </div>
            <div class="am-u-lg-3" style="padding-top: 4px;">
              <label class="am-checkbox-inline">
                <input type="checkbox"  value="" data-am-ucheck> 不限
              </label>
            </div>
          </div>
          <div class="am-u-lg-6">
          </div>
        </div>
        <div class="ucontent">
          <div class="ua">
            <div class="ua1">
              <div class="am-tabs" data-am-tabs>
                <ul class="am-tabs-nav am-nav am-nav-tabs">
                  <li class="am-active"><a href="#tab1">服务</a></li>
                  <li><a href="#tab2">商品</a></li>
                </ul>
                <div class="am-tabs-bd" style="border:none;">
                  <div class="am-tab-panel am-fade am-in am-active" id="tab1" style="padding: 0; padding-top: 10px;">
                    <form class="am-form-inline" role="form">
                      <div class="am-form-group" style="margin-bottom: 10px;">
                        <div class="am-u-lg-5">
                          <input id="" class="am-form-field uinput uinput-max" type="text">
                        </div>
                        <div class="am-u-lg-3">
                          <button type="button" class="am-btn ubtn-green ubtn-search2">
                            <i class="iconfont icon-search"></i>
                            查询
                          </button>
                        </div>
                      </div>
                      <div class="am-tabs am-form-group" data-am-tabs style="border:1px solid #ddd;width: 100%;margin: 0;border:none;border-top:1px solid #ddd; ">
                        <ul class="am-u-lg-2 am-nav am-tabs-nav" style="padding-right: 0px;">
                          <li class="am-active"><a href="#tab3">分类1</a></li>
                          <li><a href="#tab4">分类2</a></li>
                        </ul>
                        <div class="am-u-lg-10 am-tabs-bd" style="border-bottom: none;border-right: none;padding-right: 0;">
                          <div class="am-tab-panel am-fade am-in am-active" id="tab3" style="padding: 0;">
                            <table class="am-table am-table-bordered am-table-centered am-table-hover am-table-compact" style="width: 100%;margin-bottom: 0;border:0;">
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
                          <div class="am-tab-panel am-fade" id="tab4" style="padding: 0;">
                            <table class="am-table am-table-bordered am-table-centered am-table-hover am-table-compact" style="width: 100%;margin-bottom: 0;border:0;">
                              <thead>
                                <tr class="utr1">
                                  <td>产品名称</td>
                                  <td>价格</td>
                                  <td class="add"><a href="javascript:;">添加</a></td>
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
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="am-tab-panel am-fade" id="tab2" style="padding: 0; padding-top: 10px;">
                    <form class="am-form-inline" role="form">
                      <div class="am-form-group" style="margin-bottom: 10px;">
                        <div class="am-u-lg-5">
                          <input id="" class="am-form-field uinput uinput-max" type="text">
                        </div>
                        <div class="am-u-lg-3">
                          <button type="button" class="am-btn ubtn-green ubtn-search2">
                            <i class="iconfont icon-search"></i>
                            查询
                          </button>
                        </div>
                      </div>
                      <div class="am-tabs am-form-group" data-am-tabs style="border:1px solid #ddd;width: 100%;margin: 0;border:none;border-top:1px solid #ddd; ">
                        <ul class="am-u-lg-2 am-nav am-tabs-nav" style="padding-right: 0px;">
                          <li class="am-active"><a href="#tab5">分类1</a></li>
                          <li><a href="#tab6">分类2</a></li>
                        </ul>
                        <div class="am-u-lg-10 am-tabs-bd" style="border-bottom: none;border-right: none;padding-right: 0;">
                          <div class="am-tab-panel am-fade am-in am-active" id="tab5" style="padding: 0;">
                            <table class="am-table am-table-bordered am-table-centered am-table-hover am-table-compact" style="width: 100%;margin-bottom: 0;border:0;">
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
                          <div class="am-tab-panel am-fade" id="tab6" style="padding: 0;">
                            <table class="am-table am-table-bordered am-table-centered am-table-hover am-table-compact" style="width: 100%;margin-bottom: 0;border:0;">
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
                        </div>
                      </div>
                    </form>
                  </div>
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
                  <td>
                    <input type="text" class="am-form-field uinput uinput-60" placeholder="">
                    <label class="am-checkbox-inline">
                      <input type="checkbox"  value="" data-am-ucheck> 不限
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
<script src="../js/pinying.js"></script>
<script src="../js/amazeui.min.js"></script>
<script>
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
//根据文本框输入的汉字自动获取汉字拼音首字母到下拉列表中，支持多音字，需引入库pinying.js
function query(){
      $("#cupen1").val(null);
      var str = $("#cgoodsname1").val().trim();
      if(str == "") return;
      // console.log(str);
      var arrRslt = makePy(str);
      $("#cupen1").val(arrRslt);
}
function query(){
      $("#cupen2").val(null);
      var str = $("#cgoodsname2").val().trim();
      if(str == "") return;
      // console.log(str);
      var arrRslt = makePy(str);
      $("#cupen2").val(arrRslt);
}

</script>
</body>
</html>
