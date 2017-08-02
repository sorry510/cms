<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>
<!-- content -->
<div class="gcontent" id="system_convert">
  <ul class="am-nav am-nav-pills ubread">
    <li class="am-active"><a href="javascript: void(0);">积分换礼</a></li>
    <li><a href="system_convert_giftmanager.php">礼品设置</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="utools">
    <form class="am-form-inline uform2">
      <div class="am-form-group">
        搜索：
        <input type="text" class="am-form-field uinput uinput140" placeholder="卡号/手机号/姓名" name="">
      </div>

      <div class="am-form-group">
        日期：
        <div class="am-input-group am-datepicker-date udatepicker udatepicker140" data-am-datepicker="{format: 'yyyy-mm-dd'}">
          <input type="text" class="am-form-field" name="">
          <span class="am-input-group-btn am-datepicker-add-on">
            <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span>
            </button>
          </span>
        </div>  
      </div>
      <div class="am-form-group">    
        至：
        <div class="am-input-group am-datepicker-date udatepicker udatepicker140" data-am-datepicker="{format: 'yyyy-mm-dd'}">
          <input type="text" class="am-form-field" name="">
          <span class="am-input-group-btn am-datepicker-add-on">
            <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span> </button>
          </span>
        </div>   
      </div>
      <div class="am-form-group search">
        <button type="button" class="am-btn ubtn-search">
          <i class="iconfont icon-search"></i>查询
        </button>
      </div>
    </form>
    <button class="am-btn ubtn-sure ubtn-blue" data-am-modal="{target:'#usystem_convertm1'}">
      <i class="iconfont icon-question"></i>
      积分换礼
    </button>
  </div>
  <div class="gspace15"></div>
  <table class="am-table am-table-bordered am-table-hover am-table-compact utable1">
    <thead>
      <tr>
        <td>日期</td>
        <td>会员卡号</td>
        <td>名称</td>
        <td>兑换内容</td>
        <td>兑换积分</td>
        <td style="width:8%">操作</td>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>2017-6-6</td>
        <td>123456789012</td>
        <td>打折卡</td>
        <td>菜刀</td>
        <td>100分</td>
        <td>
          <button class="am-btn ubtn-table ubtn-gray cdel">
            <i class="iconfont icon-shanchu"></i>
            删除
          </button> 
        </td>
      </tr>
      <tr>
        <td>2017-6-4</td>
        <td>123456789043</td>
        <td>优惠卡</td>
        <td>剪刀</td>
        <td>90分</td>
        <td>
          <button class="am-btn ubtn-table ubtn-gray cdel">
            <i class="iconfont icon-shanchu"></i>
            删除
          </button> 
        </td>
      </tr>
    </tbody>
  </table>
</div>


<!-- 礼品兑换弹出框 -->
<div id="usystem_convertm1" class="am-modal" tabindex="-1">
  <div class="am-modal-dialog umodal umodal-simple">
    <div class="am-modal-hd uhead">礼品兑换
      <a href="javascript:void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd">
      <form class="am-form am-form-horizontal">
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">搜索：</label>
          <div class="umodal-normal">
            <input id="" class="am-form-field uinput uinput-max" type="text" placeholder="卡号/姓名/手机号">
          </div>
          <div class="umodal-search">
              <button type="button" class="am-btn ubtn-search2 ubtn-green">
                <i class="iconfont icon-search"></i>
                查询
              </button>
          </div>
        </div>
        <div class="am-form-group">
          <div class="gspace20" style="border-bottom:1px solid #dddddd;"></div>
        </div>
        <div class="am-form-group" style="margin-bottom:0px;">
          <label class="umodal-label am-form-label" for="">会员卡号：</label>
          <div class="umodal-text" style="width:200px;">1001</div>
          <label class="umodal-label am-form-label" for="">会员姓名：</label>
          <div class="umodal-text">张晓明</div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">手机号码：</label>
          <div class="umodal-text" style="width:200px;">15690859087</div>
          <label class="umodal-label am-form-label" for="">积分：</label>
          <div class="umodal-text">2180</div>
        </div>
        <div class="am-scrollable-vertical uscroll-table">
          <table class="am-table am-table-bordered am-table-hover am-table-compact utable1" style="width:100%;">
            <thead>
              <tr>
                <td>礼品列表</td>
                <td>名称</td>
                <td>扣除积分</td>
                <td>数量</td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>        
                  <label class="am-checkbox-inline" style="margin:0px;">
                    <input type="checkbox" id="ajoin1" value="" data-am-ucheck>&nbsp;
                  </label>
                </td>
                <td>香皂</td>
                <td>800</td>
                <td>
                  <a href="javascript:;" class="ufont1 cbtndec"><i class="am-icon-minus"></i></a>
                  <input type="text" name="adcd" class="uinputmin1" value="1">
                  <a href="javascript:;" class="ufont1 cbtnplus"><i class="am-icon-plus" aria-hidden="true"></i></a>
                </td>
              </tr>
              <tr>
                <td>
                  <label class="am-checkbox-inline" style="margin:0px;">
                    <input type="checkbox" id="ajoin1" value="" data-am-ucheck>&nbsp;
                  </label>
                </td>
                <td>洗衣粉</td>
                <td>1200</td>
                <td>
                  <a href="javascript:;" class="ufont1 cbtndec"><i class="am-icon-minus"></i></a>
                  <input type="text" name="adcd" class="uinputmin1" value="1">
                  <a href="javascript:;" class="ufont1 cbtnplus"><i class="am-icon-plus" aria-hidden="true"></i></a>
                </td>
              </tr>
              <tr>
                <td>
                  <label class="am-checkbox-inline" style="margin:0px;">
                    <input type="checkbox" id="ajoin1" value="" data-am-ucheck>&nbsp;
                  </label>
                </td>
                <td>洗衣粉</td>
                <td>1200</td>
                <td>
                  <a href="javascript:;" class="ufont1 cbtndec"><i class="am-icon-minus"></i></a>
                  <input type="text" name="adcd" class="uinputmin1" value="1">
                  <a href="javascript:;" class="ufont1 cbtnplus"><i class="am-icon-plus" aria-hidden="true"></i></a>
                </td>
              </tr>      
              <tr>
                <td>
                  <label class="am-checkbox-inline" style="margin:0px;">
                    <input type="checkbox" id="ajoin1" value="" data-am-ucheck>&nbsp;
                  </label>
                </td>
                <td>洗衣粉</td>
                <td>1200</td>
                <td>
                  <a href="javascript:;" class="ufont1 cbtndec"><i class="am-icon-minus"></i></a>
                  <input type="text" name="adcd" class="uinputmin1" value="1">
                  <a href="javascript:;" class="ufont1 cbtnplus"><i class="am-icon-plus" aria-hidden="true"></i></a>
                </td>
              </tr>      
              <tr>
                <td>
                  <label class="am-checkbox-inline" style="margin:0px;">
                    <input type="checkbox" id="ajoin1" value="" data-am-ucheck>&nbsp;
                  </label>
                </td>
                <td>洗衣粉</td>
                <td>1200</td>
                <td>
                  <a href="javascript:;" class="ufont1 cbtndec"><i class="am-icon-minus"></i></a>
                  <input type="text" name="adcd" class="uinputmin1" value="1">
                  <a href="javascript:;" class="ufont1 cbtnplus"><i class="am-icon-plus" aria-hidden="true"></i></a>
                </td>
              </tr>      
              <tr>
                <td>
                  <label class="am-checkbox-inline" style="margin:0px;">
                    <input type="checkbox" id="ajoin1" value="" data-am-ucheck>&nbsp;
                  </label>
                </td>
                <td>洗衣粉</td>
                <td>1200</td>
                <td>
                  <a href="javascript:;" class="ufont1 cbtndec"><i class="am-icon-minus"></i></a>
                  <input type="text" name="adcd" class="uinputmin1" value="1">
                  <a href="javascript:;" class="ufont1 cbtnplus"><i class="am-icon-plus" aria-hidden="true"></i></a>
                </td>
              </tr>      
              <tr>
                <td>
                  <label class="am-checkbox-inline" style="margin:0px;">
                    <input type="checkbox" id="ajoin1" value="" data-am-ucheck>&nbsp;
                  </label>
                </td>
                <td>洗衣粉</td>
                <td>1200</td>
                <td>
                  <a href="javascript:;" class="ufont1 cbtndec"><i class="am-icon-minus"></i></a>
                  <input type="text" name="adcd" class="uinputmin1" value="1">
                  <a href="javascript:;" class="ufont1 cbtnplus"><i class="am-icon-plus" aria-hidden="true"></i></a>
                </td>
              </tr>      
              <tr>
                <td>
                  <label class="am-checkbox-inline" style="margin:0px;">
                    <input type="checkbox" id="ajoin1" value="" data-am-ucheck>&nbsp;
                  </label>
                </td>
                <td>洗衣粉</td>
                <td>1200</td>
                <td>
                  <a href="javascript:;" class="ufont1 cbtndec"><i class="am-icon-minus"></i></a>
                  <input type="text" name="adcd" class="uinputmin1" value="1">
                  <a href="javascript:;" class="ufont1 cbtnplus"><i class="am-icon-plus" aria-hidden="true"></i></a>
                </td>
              </tr>      <tr>
                <td>
                  <label class="am-checkbox-inline" style="margin:0px;">
                    <input type="checkbox" id="ajoin1" value="" data-am-ucheck>&nbsp;
                  </label>
                </td>
                <td>洗衣粉</td>
                <td>1200</td>
                <td>
                  <a href="javascript:;" class="ufont1 cbtndec"><i class="am-icon-minus"></i></a>
                  <input type="text" name="adcd" class="uinputmin1" value="1">
                  <a href="javascript:;" class="ufont1 cbtnplus"><i class="am-icon-plus" aria-hidden="true"></i></a>
                </td>
              </tr>      
              <tr>
                <td>
                  <label class="am-checkbox-inline" style="margin:0px;">
                    <input type="checkbox" id="ajoin1" value="" data-am-ucheck>&nbsp;
                  </label>
                </td>
                <td>洗衣粉</td>
                <td>1200</td>
                <td>
                  <a href="javascript:;" class="ufont1 cbtndec"><i class="am-icon-minus"></i></a>
                  <input type="text" name="adcd" class="uinputmin1" value="1">
                  <a href="javascript:;" class="ufont1 cbtnplus"><i class="am-icon-plus" aria-hidden="true"></i></a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </form>
    </div>
    <div class="am-modal-footer ufoot">
      <div class="am-btn-group ubtn-left">
        <div style="line-height:40px;">累计扣除积分：<span style="color:#FA7307;">2500</span>分，&nbsp;&nbsp;剩余积分：<span style="color:#FA7307;">2500</span>分</div>
      </div>
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

// + -
$(document).on("click", ".cbtndec", function() {
  var _self= $(this).siblings('input');
  if(parseInt(_self.val())>=1)
    _self.val(parseInt(_self.val())-1);
});
$(document).on("click", ".cbtnplus", function() {
  var _self= $(this).siblings('input');
  _self.val(parseInt(_self.val())+1);
});
</script>
</body>
</html>
