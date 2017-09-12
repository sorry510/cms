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
          <input type="text" class="am-form-field" name="from" value="<?php echo $this->_data['request']['from']?>">
          <span class="am-input-group-btn am-datepicker-add-on">
            <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span>
            </button>
          </span>
        </div>  
      </div>
      <div class="am-form-group">    
        至
        <div class="am-input-group am-datepicker-date udatepicker udatepicker140" data-am-datepicker="{format: 'yyyy-mm-dd'}">
          <input type="text" class="am-form-field" name="to" value="<?php echo $this->_data['request']['to']?>">
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
  <table class="am-table am-table-bordered am-table-hover am-table-compact utable1 utable1-fixed">
    <thead>
      <tr>
        <td>时间</td>
        <td>类型</td>
        <td>金额</td>
        <td>经办人</td>
        <td>状态</td>
        <td width="30%">备注</td>
        <td width="18%">操作</td>
      </tr>
    </thead>
    <tbody>
    <?php foreach($this->_data['store_list']['list'] as $row) { ?>
      <tr>
        <td><a href="javascript:;" class="coffopen" store_id="<?php echo $row['store_id'];?>"><?php echo date('Y-m-d H:i:s',$row['store_time']);?></a></td>
        <td><?php echo $row['store_type']=='1'?'入库':'出库';?></td>
        <td><?php echo $row['store_money'];?></td>
        <td><?php echo $row['store_operator'];?></td>
        <td class="gtext-orange"><?php echo $row['store_state']=='1'?'未确认':'已确认';?></td>
        <td class="gtext-overflow" title="<?php echo $row['store_memo'];?>"><?php echo $row['store_memo'];?></td>
        <td>
          <?php if($row['store_state']=='1'){?>
          <button type="button" class="am-btn ubtn-table ubtn-green cedit" value="<?php echo $row['store_id'];?>" data-am-modal="{target: '#ustorem3'}">
            <i class="iconfont icon-bianji"></i>
            修改
          </button>&nbsp;&nbsp;
          <button type="button" class="am-btn ubtn-table ubtn-gray cdel" value="<?php echo $row['store_id'];?>">
            <i class="iconfont icon-shanchu"></i>
            删除
          </button>
          &nbsp;
          <button type="button" class="am-btn ubtn-table ubtn-blue ccheck" value="<?php echo $row['store_id'];?>">
            <i class="iconfont icon-yuanxingxuanzhong"></i>
            确认
          </button>
          <?php }else{?>
          <button type="button" class="am-btn ubtn-table ubtn-orange">
            <i class="iconfont icon-yuanxingxuanzhong"></i>
            已确认
          </button>
          <?php }?>
        </td>
      </tr>
    <?php } ?>
    </tbody>
  </table>
  <?php pageHtml($this->_data['store_list'],$this->_data['request'],'store.php');?>
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
          <label class="umodal-label am-form-label" for=""><span class="gtext-orange">*</span>时间：</label>
          <div class="umodal-normal">
            <div class="am-input-group am-datepicker-date udatepicker udatepicker-max cvalid" data-am-datepicker="{format:'yyyy-mm-dd'}">
              <input type="text" class="am-form-field cstore_time">
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
              <input type="radio" name="store_type" class="cstore_type" value="1" data-am-ucheck checked> 入库
            </label>
            <label class="am-radio-inline">
              <input type="radio" name="store_type" class="cstore_type" value="2" data-am-ucheck> 出库
            </label>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for=""><span class="gtext-orange">*</span>金额：</label>
          <div class="umodal-normal">
            <input id="" class="am-form-field uinput uinput-max cstore_money cvalid" type="text" placeholder="">
          </div>
          <div class="umodal-text">&nbsp;元</div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for=""><span class="gtext-orange">*</span>经办人：</label>
          <div class="umodal-normal">
            <input id="" class="am-form-field uinput uinput-max cstore_operator cvalid" type="text" placeholder="">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">备注：</label>
          <div class="umodal-max">
            <input type="text" class="am-form-field uinput uinput-max cstore_memo" placeholder="">
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
                <select name="type" class="uselect2 uselect-max cgoods_type" data-am-selected>
                  <option value="0">全部</option>
                  <?php foreach($this->_data['mgoods_catalog_list'] as $row) { ?>
                  <option value="<?php echo 'm-'.$row['mgoods_catalog_id']; ?>"><?php echo $row['mgoods_catalog_name']; ?></option>
                  <?php }?>
                  <?php foreach($this->_data['sgoods_catalog_list'] as $row) { ?>
                  <option value="<?php echo 's-'.$row['sgoods_catalog_id']; ?>"><?php echo $row['sgoods_catalog_name']; ?></option>
                <?php }?>
                </select>
              </div>
              <div class="ub1">
                <input class="am-form-field uinput2 uinput2-max cgoods_name" type="text" placeholder="">
              </div>
              <div class="ub2">
                <button type="button" ctype="add" class="am-btn ubtn-search3 ubtn-green cgoods_search">
                  <i class="iconfont icon-search"></i>
                  查询
                </button>
              </div>
            </div>
            <ul class="uc">
              <?php foreach($this->_data['mgoods_list'] as $row) { ?>
                <li class="uc1" mgoods_type="<?php echo $row['mgoods_catalog_id'];?>"><?php echo $row['mgoods_catalog_name'];?></li>
                <?php foreach($row['mgoods'] as $row2){ ?>
                  <li class="uc2" mgoods_id="<?php echo $row2['mgoods_id'];?>">
                    <div class="uc2a" mgoods_name="<?php echo $row2['mgoods_name'];?>"><?php echo $row2['mgoods_name'];?></div>
                    <div class="uc2b cadd" ctype="add"><a href="#">添加</a></div>
                  </li>
                <?php } ?>
              <?php }?>
              <?php foreach($this->_data['sgoods_list'] as $row) { ?>
                <li class="uc1" sgoods_type="<?php echo $row['sgoods_catalog_id'];?>"><?php echo $row['sgoods_catalog_name'];?></li>
                <?php foreach($row['sgoods'] as $row2){ ?>
                  <li class="uc2" sgoods_id="<?php echo $row2['sgoods_id'];?>">
                    <div class="uc2a" sgoods_name="<?php echo $row2['sgoods_name'];?>"><?php echo $row2['sgoods_name'];?></div>
                    <div class="uc2b cadd" ctype="add"><a href="#">添加</a></div>
                  </li>
                <?php } ?>
              <?php }?>
            </ul>
          </div>
          <div class="am-tab-panel am-fade" id="tab2" style="min-height:414px;">
            <div class="gspace50"></div>
            <div class="gspace50"></div>
            <div>
              <div class="umodal-normal" style="width:180px; margin:0px 5% 0px 15%;">
                <input id="" class="am-form-field uinput uinput-max" type="text" placeholder="条码枪扫码或手动输入">
              </div>           
              <button type="button" ctype="add" class="am-btn ubtn-search2 ubtn-green usearch cgoodsadd" style="width:80px;">
                添加
              </button>
            </div>
          </div>
        </div>
      </div>
      <div class="uright">
        <div class="ua">已选择商品<!-- <span>（数量为0代表不限数量）</span> --></div>
        <ul class="ub">
          <li class="ub1">名称</li>
          <li class="ub2">数量</li>
          <li class="ub3">操作</li>
        </ul>
        <ul class="uc">
          
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
        <button type="button" class="am-btn ubtn-sure ubtn-green cstoreadd"><i class="iconfont icon-yuanxingxuanzhong"></i>
          完成
        </button>
      </div>
    </div>
  </div>
</div>

<!-- 修改单据弹出框 -->
<div id="ustorem3" class="am-modal" tabindex="-1">
  <div class="am-modal-dialog umodal umodal-simple">
    <div class="am-modal-hd uhead">修改入库/出库
      <a href="javascript:void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd">
      <form class="am-form am-form-horizontal">
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for=""><span class="gtext-orange">*</span>时间：</label>
          <div class="umodal-normal">
            <div class="am-input-group am-datepicker-date udatepicker udatepicker-max cvalid" data-am-datepicker="{format:'yyyy-mm-dd'}">
              <input type="text" class="am-form-field cstore_time">
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
              <input type="radio" name="store_type" class="cstore_type" value="1" data-am-ucheck checked> 入库
            </label>
            <label class="am-radio-inline">
              <input type="radio" name="store_type" class="cstore_type" value="2" data-am-ucheck> 出库
            </label>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for=""><span class="gtext-orange">*</span>金额：</label>
          <div class="umodal-normal">
            <input id="" class="am-form-field uinput uinput-max cstore_money cvalid" type="text" placeholder="">
          </div>
          <div class="umodal-text">&nbsp;元</div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for=""><span class="gtext-orange">*</span>经办人：</label>
          <div class="umodal-normal">
            <input id="" class="am-form-field uinput uinput-max cstore_operator cvalid" type="text" placeholder="">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">备注：</label>
          <div class="umodal-max">
            <input type="text" class="am-form-field uinput uinput-max cstore_memo" placeholder="">
            <input type="hidden" class="cstore_id">
          </div>
        </div>
      </form>
    </div>         
    <div class="am-modal-footer ufoot">
      <div class="am-btn-group">
        <button type="button" class="am-btn ubtn-sure ubtn-green cmodelopen3">
          <i class="iconfont icon-xiangyou2"></i>
          下一步
        </button>
      </div>
    </div>
  </div>
</div>

<div id="ustorem4" class="am-modal" tabindex="-1" style="min-height:291px;">
  <div class="am-modal-dialog umodal">
    <div class="am-modal-hd uhead">修改入库/出库
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
                <select name="type" class="uselect2 uselect-max cgoods_type" data-am-selected>
                  <option value="0">全部</option>
                  <?php foreach($this->_data['mgoods_catalog_list'] as $row) { ?>
                  <option value="<?php echo 'm-'.$row['mgoods_catalog_id']; ?>"><?php echo $row['mgoods_catalog_name']; ?></option>
                  <?php }?>
                  <?php foreach($this->_data['sgoods_catalog_list'] as $row) { ?>
                  <option value="<?php echo 's-'.$row['sgoods_catalog_id']; ?>"><?php echo $row['sgoods_catalog_name']; ?></option>
                <?php }?>
                </select>
              </div>
              <div class="ub1">
                <input id="" class="am-form-field uinput2 uinput2-max cgoods_name" type="text" placeholder="">
              </div>
              <div class="ub2">
                <button type="button" ctype="edit" class="am-btn ubtn-search3 ubtn-green cgoods_search">
                  <i class="iconfont icon-search"></i>
                  查询
                </button>
              </div>
            </div>
            <ul class="uc">
              <?php foreach($this->_data['mgoods_list'] as $row) { ?>
                <li class="uc1" mgoods_type="<?php echo $row['mgoods_catalog_id'];?>"><?php echo $row['mgoods_catalog_name'];?></li>
                <?php foreach($row['mgoods'] as $row2){ ?>
                  <li class="uc2" mgoods_id="<?php echo $row2['mgoods_id'];?>">
                    <div class="uc2a" mgoods_name="<?php echo $row2['mgoods_name'];?>"><?php echo $row2['mgoods_name'];?></div>
                    <div class="uc2b cadd" ctype="edit"><a href="#">添加</a></div>
                  </li>
                <?php } ?>
              <?php }?>
              <?php foreach($this->_data['sgoods_list'] as $row) { ?>
                <li class="uc1" sgoods_type="<?php echo $row['sgoods_catalog_id'];?>"><?php echo $row['sgoods_catalog_name'];?></li>
                <?php foreach($row['sgoods'] as $row2){ ?>
                  <li class="uc2" sgoods_id="<?php echo $row2['sgoods_id'];?>">
                    <div class="uc2a" sgoods_name="<?php echo $row2['sgoods_name'];?>"><?php echo $row2['sgoods_name'];?></div>
                    <div class="uc2b cadd" ctype="edit"><a href="#">添加</a></div>
                  </li>
                <?php } ?>
              <?php }?>
            </ul>
          </div>
          <div class="am-tab-panel am-fade" id="tab2" style="min-height:414px;">
            <div class="gspace50"></div>
            <div class="gspace50"></div>
            <div>
              <div class="umodal-normal" style="width:180px; margin:0px 5% 0px 15%;">
                <input id="" class="am-form-field uinput uinput-max" type="text" placeholder="条码枪扫码或手动输入">
              </div>           
              <button type="button" ctype="edit" class="am-btn ubtn-search2 ubtn-green usearch cgoodsadd" style="width:80px;">
                添加
              </button>
            </div>
          </div>
        </div>
      </div>
      <div class="uright">
        <div class="ua">已选择商品<!-- <span>（数量为0代表不限数量）</span> --></div>
        <ul class="ub">
          <li class="ub1">名称</li>
          <li class="ub2">数量</li>
          <li class="ub3">操作</li>
        </ul>
        <ul class="uc">
          
        </ul>
      </div>
      <div style="clear:both;"></div>
    </div>
    <div class="am-modal-footer ufoot">
      <div class="am-btn-group ubtn-left">
        <button type="button" class="am-btn ubtn-sure ubtn-green cmodelopen4"><i class="iconfont icon-xiangyou2"></i>
          上一步
        </button>
      </div>
      <div class="am-btn-group">
        <button type="button" class="am-btn ubtn-sure ubtn-green cstoreedit"><i class="iconfont icon-yuanxingxuanzhong"></i>
          完成
        </button>
      </div>
    </div>
  </div>
</div>

<!-- 侧拉框 -->
<div id="uoffcanvas" class="am-offcanvas">
  <div class="am-offcanvas-bar am-offcanvas-bar-flip uoffcanvas">
    <div class="am-offcanvas-content" >
      <div class="am-modal-hd"><span class="utitle">出入库明细</span>
        <a href="javascript: void(0)" class="am-close am-close-spin doc-oc-js uclose2" data-rel="close"><img src="../img/close.jpg"></a>
      </div>
      <div class="gspace15"></div>
      <div class="am-g ucontent">
        <div class="am-u-lg-6">时间：<span class="cstore_time"></span></div>
        <div class="am-u-lg-6">类型：<span class="cstore_type"></span></div>
        <div class="am-u-lg-6">金额：<span class="cstore_money"></span></div>
        <div class="am-u-lg-6">经办人：<span class="cstore_operator"></div>
        <div class="am-u-lg-12">备注：<span class="cstore_memo"></div>
      </div>
    </div>
  </div>
</div>

<?php confirmHtml(1);?>
<?php confirmHtml(6);?>
<script src="../js/jquery.min.js"></script>
<script src="../js/amazeui.min.js"></script>
<script type="text/javascript">
<?php pageJs($this->_data['store_list'],$this->_data['request'],'store.php');?>
// cvalid
$('input.cvalid').on('input propertychange blur', function(){
  $(this).val()==''?$(this).addClass('am-field-error'):$(this).removeClass('am-field-error');
})
$('div.cvalid input').on('input propertychange blur', function(){
  $(this).val()==''?$(this).parent().addClass('am-field-error'):$(this).parent().removeClass('am-field-error');
})
// delete
$('.cdel').on('click', function() {
  $('#cconfirm1').modal({
    relatedTarget: this,
    onConfirm: function(options) {
      $.post('store_delete_do.php',{store_id:$(this.relatedTarget).val()},function(res){
        // console.log(res);
        if(res=='0'){
          window.location.reload();
        }else{
          alert('删除失败');
          console.log(res);
        }
      });
    },
    onCancel: function() {
      return false;
    }
  });
});
// 确认库存
$('.ccheck').on('click', function() {
  $('#cconfirm6').modal({
    relatedTarget: this,
    onConfirm: function(options) {
      $.post('store_state_do.php',{store_id:$(this.relatedTarget).val()},function(res){
        // console.log(res);
        if(res=='0'){
          window.location.reload();
        }else{
          alert('确认失败');
          console.log(res);
        }
      });
    },
    onCancel: function() {
      return false;
    }
  });
});

//下一步
$('.cmodelopen').on('click', function(e) {
  var _self = $(this);
  _self.attr('disabled',true);
  // 验证变红
  $('#ustorem1 .cvalid').each(function(){
    // console.log($(this).prop('tagName'));
    if($(this).prop('tagName')=='DIV'){
      if($(this).find('input').val()==''){
        $(this).addClass('am-field-error');
      }
    }else{
      if($(this).val()==''){
        $(this).addClass('am-field-error');
      }
    }
  })
  // 验证返回
  if($('#ustorem1 .cvalid').hasClass("am-field-error")){
    _self.attr('disabled',false);
    return false;
  }
  $('#ustorem1').modal('close');
  $('#ustorem2').modal('open');
});

//上一步
$('.cmodelopen2').on('click', function(e) {
  $('#ustorem2').modal('close');
  $('#ustorem1').modal('open');
});

//下一步
$('.cmodelopen3').on('click', function(e) {
  var _self = $(this);
  _self.attr('disabled',true);
  // 验证变红
  $('#ustorem3 .cvalid').each(function(){
    if($(this).prop('tagName')=='DIV'){
      if($(this).find('input').val()==''){
        $(this).addClass('am-field-error');
      }
    }else{
      if($(this).val()==''){
        $(this).addClass('am-field-error');
      }
    }
  })
  // 验证返回
  if($('#ustorem3 .cvalid').hasClass("am-field-error")){
    _self.attr('disabled',false);
    return false;
  }
  $('#ustorem3').modal('close');
  $('#ustorem4').modal('open');
});

//上一步
$('.cmodelopen4').on('click', function(e) {
  $('#ustorem4').modal('close');
  $('#ustorem3').modal('open');
});

// 添加商品
$('.cadd').on('click', cadd);

//弹出框中的查询
$('.cgoods_search').on('click',searchGoods);
// 扫码添加商品
$('.cgoodsadd').on('click',add2);
// 添加提交
$('.cstoreadd').on('click', function(){
  var url="store_add_do.php";
  var arr= [];
  $("#ustorem2 .cnum").each(function(k,v){
    if($(this).attr('mgoods_id')){
      var json = {'mgoods_id':$(this).attr('mgoods_id'),'num':$(this).val(),'mgoods_name':$(this).attr('mgoods_name')};
    }
    if($(this).attr('sgoods_id')){
      var json = {'sgoods_id':$(this).attr('sgoods_id'),'num':$(this).val(),'sgoods_name':$(this).attr('sgoods_name')};
    }
    arr.push(json);
  });
  var store_time = $("#ustorem1 .cstore_time").val();
  var store_type = $("#ustorem1 .cstore_type:checked").val();
  var store_money = $("#ustorem1 .cstore_money").val();
  var store_operator = $("#ustorem1 .cstore_operator").val();
  var store_memo = $("#ustorem1 .cstore_memo").val();
  var data = {
        arr:arr,
        store_time:store_time,
        store_type:store_type,
        store_money:store_money,
        store_operator:store_operator,
        store_memo:store_memo,
      }
  // console.log(data);
  $.post(url,data,function(res){
    if(res=='0'){
      window.location.reload();
    }else{
      alert('添加库存失败');
      console.log(res);
    }
  });
});

//修改打开
$('.cedit').on('click', function(){
  var store_id = $(this).val();
  $("#ustorem4 .uright .uc li").remove();/*删除之前可能存在的套餐商品*/
  $.ajax({
    type: "GET",
    url: "store_edit_ajax.php",
    data: {store_id:store_id}, 
    dataType:'json',
    success: function(msg){
      // console.log(msg);
      if(msg){
        $("#ustorem3 .cstore_time").val(msg.store_time);
        $("#ustorem3 .cstore_money").val(msg.store_money);
        $("#ustorem3 .cstore_operator").val(msg.store_operator);
        $("#ustorem3 .cstore_memo").val(msg.store_memo);
        $("#ustorem3 .cstore_id").val(msg.store_id);
        $("#ustorem3 .cstore_type").each(function(){
          if($(this).val() == msg.store_type){
            $(this).uCheck('check');
          }
        });

        $.each(msg.store_goods, function (key,val) {
          if(val.mgoods_id !='0'){
            addhtml ='<li><div class="uc1">'+val.c_goods_name+'</div><div class="uc2"><a href="javascript:;" class="ufont1 cbtndec"><i class="am-icon-minus"></i></a>&nbsp;<input mgoods_id="'+val.mgoods_id+'" mgoods_name="'+val.c_goods_name+'" class="am-form-field uinput2 uinput-35 cnum" type="text" placeholder="" value="'+val.store_goods_count+'">&nbsp;<a href="javascript:;" class="ufont1 cbtnplus"><i class="am-icon-plus"></i></a></div><div class="uc3 cdel2" mgoods_id="'+val.mgoods_id+'"><a href="javascript:;">移除</a></div></li>';
          }
          if(val.sgoods_id !='0'){
            addhtml ='<li><div class="uc1">'+val.c_goods_name+'</div><div class="uc2"><a href="javascript:;" class="ufont1 cbtndec"><i class="am-icon-minus"></i></a>&nbsp;<input sgoods_id="'+val.sgoods_id+'" sgoods_name="'+val.c_goods_name+'" class="am-form-field uinput2 uinput-35 cnum" type="text" placeholder="" value="'+val.store_goods_count+'">&nbsp;<a href="javascript:;" class="ufont1 cbtnplus"><i class="am-icon-plus"></i></a></div><div class="uc3 cdel2" sgoods_id="'+val.sgoods_id+'"><a href="javascript:;">移除</a></div></li>';
          }
          $("#ustorem4 .uright .uc").append(addhtml);
        });
      }
    }
  });
});
// 修改提交
$('.cstoreedit').on('click', function(){
  var url="store_edit_do.php";
  var arr= [];
  $("#ustorem4 .cnum").each(function(k,v){
    if($(this).attr('mgoods_id')){
      var json = {'mgoods_id':$(this).attr('mgoods_id'),'num':$(this).val(),'mgoods_name':$(this).attr('mgoods_name')};
    }
    if($(this).attr('sgoods_id')){
      var json = {'sgoods_id':$(this).attr('sgoods_id'),'num':$(this).val(),'sgoods_name':$(this).attr('sgoods_name')};
    }
    arr.push(json);
  });
  var store_time = $("#ustorem3 .cstore_time").val();
  var store_type = $("#ustorem3 .cstore_type:checked").val();
  var store_money = $("#ustorem3 .cstore_money").val();
  var store_operator = $("#ustorem3 .cstore_operator").val();
  var store_memo = $("#ustorem3 .cstore_memo").val();
  var store_id = $("#ustorem3 .cstore_id").val();
  var data = {
        arr:arr,
        store_time:store_time,
        store_type:store_type,
        store_money:store_money,
        store_operator:store_operator,
        store_memo:store_memo,
        store_id:store_id
      };
  $.post(url,data,function(res){
    // console.log(res);
    if(res=='0'){
      window.location.reload();
    }else{
      alert('修改库存失败');
      console.log(res);
    }
  });
})
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

//侧拉打开
$('.coffopen').on('click',function() {
  var url = "store_edit_ajax.php";
  $.getJSON(url,{store_id:$(this).attr('store_id')},function(res){
    // console.log(res);
    $("#uoffcanvas .cstore_time").text(res.store_time);
    $("#uoffcanvas .cstore_operator").text(res.store_operator);
    $("#uoffcanvas .cstore_memo").text(res.store_memo);
    if(res.store_money != 0){
      $("#uoffcanvas .cstore_money").text(res.store_money);
    }else{
      $("#uoffcanvas .cstore_money").text('--');
    }
    switch(res.store_type)
    {
      case '1':
        $("#uoffcanvas .cstore_type").text('入库');
        break;
      case '2':
        $("#uoffcanvas .cstore_type").text('出库');
        break;
      default :
        $("#uoffcanvas .cstore_type").text('--');
    }
   
    // 买套餐商品
    if(res.store_goods){
      var goods_head = '<p class="cjs"><strong>商品清单</strong></p>';
      var table_head = '<table class="am-table am-table-bordered am-table-hover utable1 am-table-compact cjs" style="color:black;"><thead><tr><td>序号</td><td>名称</td><td>数量</td></thead>';
      var table_body = '';
      $.each(res.store_goods, function(k,v){
          table_body = table_body+'<tr><td>'+(k+1)+'</td><td>'+v.c_goods_name+'</td><td>'+v.store_goods_count+'</td></tr>';
      });
      var table_bottom = '</table>';
      $(".am-offcanvas-content .ucontent").after(goods_head+table_head+table_body+table_bottom);
    }
  });
  $('#uoffcanvas').offCanvas('open');
});
//关闭侧拉
$('.doc-oc-js').on('click', function() {
  $('#uoffcanvas').offCanvas($(this).data('rel'));
});
//侧拉关闭删除商品信息
$('#uoffcanvas').on('close.offcanvas.amui', function() {
  $('#uoffcanvas').find('.cjs').remove();
});

//添加商品
function cadd(){
  var product = $(this).prev().text();
  var type = $(this).attr('ctype');
  var mgoods_name = $(this).prev().attr('mgoods_name');
  var sgoods_name = $(this).prev().attr('sgoods_name');
  var mgoods_id = $(this).parent().attr('mgoods_id');
  var sgoods_id = $(this).parent().attr('sgoods_id');
  var flag = true;
  if(type=='add'){
    $('#ustorem2 .cnum').each(function(){
      if(mgoods_id != undefined && mgoods_id == $(this).attr('mgoods_id')){
        flag = false;
      }
      if(sgoods_id != undefined && sgoods_id == $(this).attr('sgoods_id')){
        flag = false;
      }
    });
  }else{
    $('#ustorem4 .cnum').each(function(){
      if(mgoods_id != undefined && mgoods_id == $(this).attr('mgoods_id')){
        flag = false;
      }
      if(sgoods_id != undefined && sgoods_id == $(this).attr('sgoods_id')){
        flag = false;
      }
    });
  }
  // console.log(flag);
  if(!flag){
    return false;//添加过了后面不在执行
  }
  var addhtml = '';
  if(mgoods_id != undefined){
    addhtml ='<li><div class="uc1">'+product+'</div><div class="uc2"><a href="javascript:;" class="ufont1 cbtndec"><i class="am-icon-minus"></i></a>&nbsp;<input mgoods_id="'+mgoods_id+'" mgoods_name="'+mgoods_name+'" class="am-form-field uinput2 uinput-35 cnum" type="text" placeholder="" value="1">&nbsp;<a href="javascript:;" class="ufont1 cbtnplus"><i class="am-icon-plus"></i></a></div><div class="uc3 cdel2" mgoods_id="'+mgoods_id+'"><a href="javascript:;">移除</a></div></li>';
  }
  if(sgoods_id != undefined){
    addhtml ='<li><div class="uc1">'+product+'</div><div class="uc2"><a href="javascript:;" class="ufont1 cbtndec"><i class="am-icon-minus"></i></a>&nbsp;<input sgoods_id="'+sgoods_id+'" sgoods_name="'+sgoods_name+'" class="am-form-field uinput2 uinput-35 cnum" type="text" placeholder="" value="1">&nbsp;<a href="javascript:;" class="ufont1 cbtnplus"><i class="am-icon-plus"></i></a></div><div class="uc3 cdel2" sgoods_id="'+sgoods_id+'"><a href="javascript:;">移除</a></div></li>';
  }

  if(type=='add'){
    $("#ustorem2 .uright .uc").append(addhtml);
  }else{
    $("#ustorem4 .uright .uc").append(addhtml);
  }
}
//查询商品
function searchGoods(){
    var type = $(this).attr('ctype');
    var data = {};
    if(type=='add'){
      $("#ustorem2 #tab1 .uc li").hide();
      data={
        type: $("#ustorem2 #tab1 .cgoods_type").val(),
        search:$("#ustorem2 #tab1 .cgoods_name").val()
      };
    }else{
      $("#ustorem4 #tab1 .uc li").hide();
      data={
        type: $("#ustorem4 #tab1 .cgoods_type").val(),
        search:$("#ustorem4 #tab1 .cgoods_name").val()
      };
    }
    $.ajax({
      url:'store_goods_search_ajax.php',
      data:data,
      type:"GET",
      dataType:"json"
    }).then(function(res){
      if(res){
        if(type=='add'){
          $.each(res, function(key, val) {
            $("#ustorem2 #tab1 .uc li[mgoods_type]").each(function(){
              //console.log($(this).attr('mgoods_type'));
              if($(this).attr('mgoods_type')==val.mgoods_catalog_id){
                $(this).show();
              }
            });
            $("#ustorem2 #tab1 .uc li[sgoods_type]").each(function(){
              if($(this).attr('sgoods_type')==val.sgoods_catalog_id){
                $(this).show();
              }
            });
            if(val.mgoods!=undefined){
              $.each(val.mgoods, function(key,val){
                $("#ustorem2 #tab1 .uc li[mgoods_id]").each(function(){
                  if($(this).attr('mgoods_id')  == val['mgoods_id']){
                    $(this).show();
                  }
                });
              })
            }
            if(val.sgoods!=undefined){
              $.each(val.sgoods, function(key,val){
                $("#ustorem2 #tab1 .uc li[sgoods_id]").each(function(){
                  if($(this).attr('sgoods_id') == val['sgoods_id']){
                    $(this).show();
                  }
                });
              })
            }
          });
        }else{
          $.each(res, function(key, val) {
            $("#ustorem4 #tab1 .uc li[mgoods_type]").each(function(){
              //console.log($(this).attr('mgoods_type'));
              if($(this).attr('mgoods_type')==val.mgoods_catalog_id){
                $(this).show();
              }
            });
            $("#ustorem4 #tab1 .uc li[sgoods_type]").each(function(){
              if($(this).attr('sgoods_type')==val.sgoods_catalog_id){
                $(this).show();
              }
            });
            if(val.mgoods!=undefined){
              $.each(val.mgoods, function(key,val){
                $("#ustorem4 #tab1 .uc li[mgoods_id]").each(function(){
                  if($(this).attr('mgoods_id')  == val['mgoods_id']){
                    $(this).show();
                  }
                });
              })
            }
            if(val.sgoods!=undefined){
              $.each(val.sgoods, function(key,val){
                $("#ustorem4 #tab1 .uc li[sgoods_id]").each(function(){
                  if($(this).attr('sgoods_id') == val['sgoods_id']){
                    $(this).show();
                  }
                });
              })
            }
          });
        }
      }
      $('.cgoodssubmit').attr('disabled',false);
    });
}
// 扫码添加库存商品
function add2(){
  var goods_code = $(this).siblings().find('input').val();
  var type = $(this).attr('ctype');
  var goods_type = 0;
  var mgoods_id = 0;
  var sgoods_id = 0;
  var product = '';
  var flag = true;
  var addhtml = '';
  $.ajax({
    url:'store_goods_add_ajax.php',
    data:{
      goods_code:goods_code
    },
    type:"GET",
    dataType:"json"
  }).then(function(res){
    // console.log(res);
    if(res){
      if(res.goods_type=='1'){
        mgoods_id = res.mgoods_id;
        mgoods_name = res.mgoods_name;
        if(type=="add"){
          $('#ustorem2 .cnum').each(function(){
            if(mgoods_id == $(this).attr('mgoods_id')){
              flag = false;
            }
          });
        }else{
          $('#ustorem4 .cnum').each(function(){
            if(mgoods_id == $(this).attr('mgoods_id')){
              flag = false;
            }
          });
        }
        if(!flag){
          return false;//添加过了后面不在执行
        }
        addhtml ='<li><div class="uc1">'+mgoods_name+'</div><div class="uc2"><a href="javascript:;" class="ufont1 cbtndec"><i class="am-icon-minus"></i></a>&nbsp;<input mgoods_id="'+mgoods_id+'" mgoods_name="'+mgoods_name+'" class="am-form-field uinput2 uinput-35 cnum" type="text" placeholder="" value="1">&nbsp;<a href="javascript:;" class="ufont1 cbtnplus"><i class="am-icon-plus"></i></a></div><div class="uc3 cdel2"><a href="javascript:;">移除</a></div></li>';
        if(type=="add"){
          $("#ustorem2 .uright .uc").append(addhtml);
        }else{
          $("#ustorem4 .uright .uc").append(addhtml);
        }
      }else{
        sgoods_id = res.sgoods_id;
        sgoods_name = res.sgoods_name;
        if(type=="add"){
          $('#ustorem2 .cnum').each(function(){
            if(sgoods_id == $(this).attr('sgoods_id')){
              flag = false;
            }
          });
        }else{
          $('#ustorem4 .cnum').each(function(){
            if(sgoods_id == $(this).attr('sgoods_id')){
              flag = false;
            }
          });
        }
        if(!flag){
          return false;//添加过了后面不在执行
        }
        addhtml ='<li><div class="uc1">'+sgoods_name+'</div><div class="uc2"><a href="javascript:;" class="ufont1 cbtndec"><i class="am-icon-minus"></i></a>&nbsp;<input sgoods_id="'+sgoods_id+'" sgoods_name="'+sgoods_name+'" class="am-form-field uinput2 uinput-35 cnum" type="text" placeholder="" value="1">&nbsp;<a href="javascript:;" class="ufont1 cbtnplus"><i class="am-icon-plus"></i></a></div><div class="uc3 cdel2"><a href="javascript:;">移除</a></div></li>';
        if(type=="add"){
          $("#ustorem2 .uright .uc").append(addhtml);
        }else{
          $("#ustorem4 .uright .uc").append(addhtml);
        }
      }
      
    }
  });
}
</script>
</body>
</html>