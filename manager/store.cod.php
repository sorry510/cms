<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>
<!-- content -->
<div class="gcontent" id="ustore">
  <ul class="am-nav am-nav-pills ubread">
    <li class="am-active"><a href="javascript: void(0);">入库和出库</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="utools">
    <form class="am-form-inline uform2">
      <div class="am-form-group">
        查询范围：从
        <div class="am-input-group am-datepicker-date udatepicker udatepicker140" data-am-datepicker="{format: 'yyyy-mm-dd'}">
          <input type="text" class="am-form-field" name="from">
          <span class="am-input-group-btn am-datepicker-add-on">
            <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span>
            </button>
          </span>
        </div>  
      </div>
      <div class="am-form-group">    
        至
        <div class="am-input-group am-datepicker-date udatepicker udatepicker140" data-am-datepicker="{format: 'yyyy-mm-dd'}">
          <input type="text" class="am-form-field" name="to">
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
    <button class="am-btn ubtn-sure ubtn-blue" data-am-modal="{target:'#ustorem1'}">
      <i class="iconfont icon-xinzeng"></i>
      新增入库/出库
    </button>
  </div>
  <div class="gspace15"></div>
  <table class="am-table am-table-bordered am-table-hover am-table-compact utable1">
    <thead>
      <tr>
        <td>时间</td>
        <td>类型</td>
        <td>金额</td>
        <td>经办人</td>
        <td>状态</td>
        <td>备注</td>
        <td style="width: 18%;">操作</td>
      </tr>
    </thead>
    <tbody>
    <?php foreach($this->_data['store_list']['list'] as $row) { ?>
      <tr>
        <td><?php echo date('Y-m-d H:i:s',$row['store_atime']);?></td>
        <td>店铺通用型</td>
        <td>888</td>
        <td>张三</td>
        <td class="gtext-orange">未确认</td>
        <td>账目未清点</td>
        <td>
          <button class="am-btn ubtn-table ubtn-green">
            <i class="iconfont icon-bianji"></i>
            修改
          </button>&nbsp;&nbsp;
          <button class="am-btn ubtn-table ubtn-gray cdel">
            <i class="iconfont icon-shanchu"></i>
            删除
          </button> 
          &nbsp;
          <button class="am-btn ubtn-table ubtn-blue">
            <i class="iconfont icon-yuanxingxuanzhong"></i>
            确认
          </button>
        </td>
      </tr>
    <?php } ?>
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

<!-- 新增单据弹出框 -->
<div id="ustorem1" class="am-modal" tabindex="-1">
  <div class="am-modal-dialog umodal umodal-simple">
    <div class="am-modal-hd uhead">新增入库/出库
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
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">类型：</label>
          <div class="umodal-normal am-text-left">
            <label class="am-radio-inline">
              <input type="radio" name="radio1" value="0" data-am-ucheck="" class="am-ucheck-radio"><span class="am-ucheck-icons"><i class="am-icon-unchecked"></i><i class="am-icon-checked"></i></span> 入库
            </label>
            <label class="am-radio-inline">
              <input type="radio" name="radio1" value="1" data-am-ucheck="" class="am-ucheck-radio"><span class="am-ucheck-icons"><i class="am-icon-unchecked"></i><i class="am-icon-checked"></i></span> 出库
            </label>  
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">金额：</label>
          <div class="umodal-normal">
            <input id="" class="am-form-field uinput uinput-max" type="text" placeholder="">
          </div>
          <div class="umodal-text">&nbsp;元</div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">经办人：</label>
          <div class="umodal-normal">
            <input id="" class="am-form-field uinput uinput-max" type="text" placeholder="">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">备注：</label>
          <div class="umodal-max">
            <input type="text" class="am-form-field uinput uinput-max" placeholder="">
          </div>
        </div>
      </form>
    </div>         
    <div class="am-modal-footer ufoot">
      <div class="am-btn-group">
        <button type="button" class="am-btn ubtn-sure ubtn-green cmodelopen">
          <i class="iconfont icon-xiangyou2"></i>
          下一步
        </button>
      </div>
    </div>
  </div>
</div>

<div id="ustorem2" class="am-modal" tabindex="-1" style="min-height:291px;">
  <div class="am-modal-dialog umodal">
    <div class="am-modal-hd uhead">新增入库/出库
      <a href="javascript:void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd">
      <div class="am-tabs uleft" data-am-tabs="{noSwipe: 1}">
        <ul class="am-tabs-nav am-nav am-nav-tabs">
          <li class="am-active"><a href="#tab1">可选套餐商品</a></li>
          <li><a href="#tab2">扫码添加商品</a></li>
        </ul>

        <div class="am-tabs-bd">
          <div class="am-tab-panel am-active" id="tab1">
            <div class="ua"><span class="ua1">分类/名称</span><span class="ua2">操作</span></div>
            <div class="am-form-group ub">
              <div class="ub1">
                <select class="uselect2 uselect-max" data-am-selected>
                  <option value="a">店铺通用型</option>
                  <option value="b">Banana</option>
                  <option value="o">Orange</option>
                  <option value="d">禁用</option>
                </select>
              </div>
              <div class="ub1">
                <input id="" class="am-form-field uinput2 uinput2-max" type="text" placeholder="">
              </div>
              <div class="ub2">
                <button type="button" class="am-btn ubtn-search3 ubtn-green">
                  <i class="iconfont icon-search"></i>
                  查询
                </button>
              </div>
            </div>
            <ul class="uc">
              <li class="uc1">茶水/毛尖</li>
              <li class="uc2">
                <div class="uc2a">普洱（38元）</div>
                <div class="uc2b cadd"><a href="#">添加</a></div>
              </li>
            </ul>
          </div>
          <div class="am-tab-panel am-fade" id="tab2" style="min-height:414px;">
            <div class="gspace50"></div>
            <div class="gspace50"></div>
            <div>
              <div class="umodal-normal" style="width:180px; margin:0px 5% 0px 15%;">
                <input id="" class="am-form-field uinput uinput-max" type="text" placeholder="条码枪扫码或手动输入">
              </div>           
              <button type="button" class="am-btn ubtn-search2 ubtn-green usearch" style="width:80px;">
                添加
              </button>
            </div>
          </div>
        </div>
      </div>
      <div class="uright">
        <div class="ua">已选择商品<span>（数量为0代表不限数量）</span></div>
        <ul class="ub">
          <li class="ub1">名称</li>
          <li class="ub2">数量</li>
          <li class="ub3">操作</li>
        </ul>
        <ul class="uc">
          <li>
            <div class="uc1">服务一（38元）</div>
            <div class="uc2">
              <a href="javascript:;" class="uc2a cbtndec"><i class="am-icon-minus"></i></a>
              <input type="text" name="" class="uinput2 uinput-35" value="0">
              <a href="javascript:;" class=" uc2b cbtnplus"><i class="am-icon-plus"></i></a>
            </div>
            <div class="uc3 cdel2"><a href="javascript:;">移除</a></div>
          </li>
        </ul>
      </div>
      <div style="clear:both;"></div>
    </div>         
    <div class="am-modal-footer ufoot">
      <div class="am-btn-group ubtn-left">
        <button type="button" class="am-btn ubtn-sure ubtn-green cmodelopen2"><i class="iconfont icon-xiangyou2"></i>
          上一步
        </button>
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

//下一步
$('.cmodelopen').on('click', function(e) {
  $('#ustorem1').modal('close');
  $('#ustorem2').modal('open');
});

//上一步
$('.cmodelopen2').on('click', function(e) {
  $('#ustorem2').modal('close');
  $('#ustorem1').modal('open');
});

// 添加
$('.cadd').on('click', function(){
  var product = $(this).prev().text();
  var addhtml ='<li><div class="ub1">'+product+'</div><div class="ub2"><a href="javascript:;" class="ufont1 cbtndec"><i class="am-icon-minus"></i></a>&nbsp;<input id="" class="am-form-field uinput uinput-max" type="text" placeholder="" value="0">&nbsp;<a href="javascript:;" class="ufont1 cbtnplus"><i class="am-icon-plus"></i></a></div><div class="ub3 cdel2"><a href="javascript:;">移除</a></div></li>';
  $(".uright .ub").append(addhtml);
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


//删除
$(document).on("click",".cdel2",function(){
    $(this).parent().remove();

});
</script>
</body>
</html>