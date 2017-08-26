<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>
<!-- content -->
<div class="gcontent" id="ureserve">
  <ul class="am-nav am-nav-pills ubread">
    <li><a href="reserve_today.php">今日预约</a></li>
    <li><a href="reserve_tomrrow.php">明日预约</a></li>
    <li class="am-active"><a href="javascript:void(0)">更多预约</a></li>
    <li><a href="reserve_expire.php">过期预约</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="utools">
    <form class="am-form-inline uform2">
      <div class="am-form-group">
        <label class="am-form-label">搜索：</label>
        <input class="am-form-field uinput uinput-220" type="text" name="search" placeholder="会员卡号/姓名/手机号" value="<?php echo htmlspecialchars($this->_data['request']['search']); ?>">
      </div>
      <div class="am-form-group">
        <label for="doc-ipt-3" class="am-form-label">日期：</label>
        <div class="am-input-group am-datepicker-date udatepicker" data-am-datepicker="{format: 'yyyy-mm-dd'}">
          <input type="text" class="am-form-field" name="from" value="<?php echo htmlspecialchars($this->_data['request']['from']); ?>">
          <span class="am-input-group-btn am-datepicker-add-on">
            <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span>
            </button>
          </span>
        </div>  
      </div>
      <div class="am-form-group">    
        <label for="doc-ipt-3" class="am-form-label">至：</label>
        <div class="am-input-group am-datepicker-date udatepicker udatepicker140" data-am-datepicker="{format: 'yyyy-mm-dd'}">
          <input type="text" class="am-form-field" name="to" value="<?php echo htmlspecialchars($this->_data['request']['to']); ?>">
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
    <button class="am-btn ubtn-sure ubtn-blue" data-am-modal="{target:'#ureservem1'}">
      <i class="iconfont icon-xinzeng"></i>
      新增预约
    </button>
  </div>
  <div class="gspace15"></div>
    <table class="am-table am-table-bordered am-table-hover am-table-compact utable1">
    <thead>
      <tr>
        <td>预约到店时间</td>
        <td>会员卡号</td>
        <td>姓名</td>
        <td>电话</td>
        <td>人数</td>
        <td>预约内容</td>
        <td>预约方式</td>
        <td>预约添加时间</td>
        <td>状态</td>
        <td>备注</td>
        <td style="width:16%">操作</td>
      </tr>
    </thead>
    <tbody>
       <?php foreach($this->_data['reserve_list']['list'] as $row) { ?>
      <tr>
        <td><?php echo date('Y-m-d H:i',$row['reserve_dtime']) ; ?></td>
        <td><?php echo $row['code']; ?></td>
        <td><?php echo $row['reserve_name']; ?></td>
        <td><?php echo $row['reserve_phone']; ?></td>
        <td><?php echo $row['reserve_count']; ?></td>
        <td><?php echo $row['mgoods']; ?></td>
        <td><?php echo $row['type']; ?></td>
        <td><?php echo date('Y-m-d',$row['reserve_atime']); ?></td>
        <td><?php echo $row['state'] ;?></td>
        <td><?php echo $row['reserve_memo'] ;?></td>
        <td>
          <button class="am-btn ubtn-table ubtn-green chere" value="<?php echo $row['reserve_id']; ?>" <?php if ($row['reserve_here']) {
            echo "style='display:none;'";
          } ;?>>
            <i class="iconfont icon-bianji"></i>
            到店
          </button>
          &nbsp;
          <button class="am-btn ubtn-table ubtn-green cedit" data-am-modal="{target: '#ureservem2'}" value="<?php echo $row['reserve_id']; ?>">
            <i class="iconfont icon-bianji"></i>
            修改
          </button>
          &nbsp;
          <button class="am-btn ubtn-table <?php if ($row['reserve_state'] == 1) {
            echo " ubtn-red cstop";
          }else{echo " ubtn-green cstart";} ; ?> " value="<?php echo $row['reserve_id']; ?>">
            <i class="iconfont icon-shanchu"></i>
            <?php if ($row['reserve_state'] == 1) {
              echo "取消";
            }else{ echo "恢复";} ;?>
          </button>
        </td>
      </tr>
    <?php } ?> 
    </tbody>
  </table>
  <ul class="am-pagination am-pagination-centered upages">
    <li class="upage-info">共<?php echo $this->_data['reserve_list']['pagecount']; ?>页 <?php echo $this->_data['reserve_list']['allcount']; ?>条记录</li>
    <li class="cfirst am-disabled"><a href="reserve.php?<?php echo api_value_query($this->_data['request'], $this->_data['reserve_list']['pagepre']); ?>">&laquo;</a></li>
    <li class="am-active"><a href="#"><?php echo $this->_data['reserve_list']['pagenow'];?></a></li>
    <li class="clast"><a href="reserve.php?<?php echo api_value_query($this->_data['request'], $this->_data['reserve_list']['pagenext']); ?>">&raquo;</a></li>
    <li class="upage-info">，跳转到第 <input id="idpagego" class="am-form-field uinput" style="width:45px;height: 26px;vertical-align:bottom;line-height: 26px;" onkeydown="if(event.keyCode == 13){page_do();}"> 页</li>
  </ul>
</div>
<!-- 新增预约弹出框 -->
<div id="ureservem1" class="am-modal" tabindex="-1">
  <div class="am-modal-dialog umodal umodal-simple">
    <div class="am-modal-hd uhead">新增预约
      <a href="javascript:void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd">
      <form class="am-form am-form-horizontal" id="cinfoadd">
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">到店时间：</label>
          <div class="umodal-normal">
            <div class="am-input-group am-datepicker-date udatepicker udatepicker-max" data-am-datepicker="{format:'yyyy-mm-dd'}">
              <input type="text" class="am-form-field" name="dtime">
              <span class="am-input-group-btn am-datepicker-add-on">
                <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span></button>
              </span>
            </div>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">搜索：</label>
          <div class="umodal-normal">
            <input id="" class="uinput uinput-max" type="text" placeholder="请输入手机号" name="search">
            <input id="" class="uinput uinput-max" type="hidden" placeholder="" name="card_id">
          </div>
          <div class="umodal-search">
            <button type="button" class="am-btn ubtn-search2 ubtn-green caddsearch">
              <i class="iconfont icon-search"></i>查询
            </button>
          </div>
        </div>
        <div class="am-form-group">        
          <label class="umodal-label am-form-label" for="">卡号：</label>
          <div class="umodal-text caddtext"></div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">姓名：</label>
          <div class="umodal-normal">
            <input id="" class="uinput uinput-max" type="text" placeholder="" name="name">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">手机：</label>
          <div class="umodal-normal">
            <input id="" class="uinput uinput-max" type="text" placeholder="请输入手机号" name="phone">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">人数：</label>
          <div class="umodal-normal">
            <input id="" class="uinput uinput-max" type="text" placeholder="" name="count">
          </div>
          <div class="umodal-text">&nbsp;人</div>
        </div> 
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">备注：</label>
          <div class="umodal-max">
            <textarea class="am-form-field utextarea utextarea-max" row="3" name="memo"></textarea>
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

<!-- 修改预约弹出框 -->
<div id="ureservem2" class="am-modal" tabindex="-1">
  <div class="am-modal-dialog umodal umodal-simple">
    <div class="am-modal-hd uhead">修改预约
      <a href="javascript:void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd">
      <form class="am-form am-form-horizontal cinfoedit">
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">到店时间：</label>
          <div class="umodal-normal">
            <div class="am-input-group am-datepicker-date udatepicker udatepicker-max" data-am-datepicker="{format:'yyyy-mm-dd'}">
              <input type="text" class="am-form-field" name="dtime">
              <span class="am-input-group-btn am-datepicker-add-on">
                <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span></button>
              </span>
            </div>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">搜索：</label>
          <div class="umodal-normal">
            <input id="" class="uinput uinput-max"  type="text" name="search" placeholder="请输入手机号">
            <input id="" class="uinput uinput-max" name="card_id" type="hidden" placeholder="">
          </div>
          <div class="umodal-search">
            <button type="button" class="am-btn ubtn-search2 ubtn-green ceditsearch">
              <i class="iconfont icon-search"></i>查询
            </button>
          </div>
        </div>
        <div class="am-form-group">        
          <label class="umodal-label am-form-label" for="">卡号：</label>
          <div class="umodal-text cedittext"></div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">姓名：</label>
          <div class="umodal-normal">
            <input id="" class="uinput uinput-max" type="text" placeholder="" name="name">
            <input id="" class="uinput uinput-max" type="hidden" placeholder="" name="id">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">手机：</label>
          <div class="umodal-normal">
            <input id="" class="uinput uinput-max" type="text" placeholder="请输入手机号" name="phone">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">人数：</label>
          <div class="umodal-normal">
            <input id="" class="uinput uinput-max" type="text" placeholder="" name="count">
          </div>
          <div class="umodal-text">&nbsp;人</div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">备注：</label>
          <div class="umodal-max">
            <textarea class="am-form-field utextarea utextarea-max" row="3" name="memo"></textarea>
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
<!-- 新增套餐2 -->
<div id="ureservem3" class="am-modal" tabindex="-1" style="min-height:291px;">
  <div class="am-modal-dialog umodal">
    <div class="am-modal-hd uhead">新增预约项目
      <a href="javascript:void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd">
      <div class="am-tabs uleft" data-am-tabs="{noSwipe: 1}">
        <ul class="am-tabs-nav am-nav am-nav-tabs">
          <li class="am-active"><a href="#tab1">可选商品</a></li>
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
            </ul>
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
        <button type="button" class="am-btn ubtn-sure ubtn-green creserveadd"><i class="iconfont icon-yuanxingxuanzhong"></i>
          完成
        </button>
      </div>
    </div>
  </div>
</div>

<!-- 修改套餐2 -->
<div id="ureservem4" class="am-modal" tabindex="-1" style="min-height:291px;">
  <div class="am-modal-dialog umodal">
    <div class="am-modal-hd uhead">修改预约项目
      <a href="javascript:void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd">
      <div class="am-tabs uleft" data-am-tabs="{noSwipe: 1}">
        <ul class="am-tabs-nav am-nav am-nav-tabs">
          <li class="am-active"><a href="#tab1">可选商品</a></li>
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
                    <div class="uc2a" mgoods_name="<?php echo $row2['mgoods_name'] ;?>"><?php echo $row2['mgoods_name'];?></div>
                    <div class="uc2b cadd" ctype="edit"><a href="#">添加</a></div>
                  </li>
                <?php } ?>
              <?php }?>
            </ul>
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
        <button type="button" class="am-btn ubtn-sure ubtn-green creserveedit"><i class="iconfont icon-yuanxingxuanzhong"></i>
          完成
        </button>
      </div>
    </div>
  </div>
</div>

<script src="../js/jquery.min.js"></script>
<script src="../js/amazeui.min.js"></script>
<script type="text/javascript">
//分页首末页不可选中
if(<?php echo $this->_data['reserve_list']['pagenow'];?>>1){
  $('.upages li.cfirst').removeClass('am-disabled');
}
if(<?php echo $this->_data['reserve_list']['pagecount']-$this->_data['reserve_list']['pagenow']; ?><1){
  $('.upages li.clast').addClass('am-disabled');
}

function page_do() {
  var intpage = parseInt(document.getElementById("idpagego").value);
  if(isNaN(intpage)) {
    alert("请输入正确的页码！");
  } else {
    window.location = "reserve.php?<?php echo api_value_query($this->_data['request']); ?>&page=" + intpage;
  }
}

//取消恢复预约操作JS
$('.cstop').on('click',function(){
    var url="reserve_cancel_do.php";
    var data = {
      id:$(this).val(),
      type:'stop'
    }
    console.log(data);
    $.post(url,data,function(res){
      if(res=='0'){
        window.location.reload();
      }else if(res=='100'){
        alert('客人已到店');
      }else if(res=='101'){
        alert('预约已过期');
      }else{
        alert('停止失败');
        console.log(res);
      }
    });
  });
$('.cstart').on('click',function(){
    var url="reserve_cancel_do.php";
    var data = {
      id:$(this).val(),
      type:'start'
    }
    console.log(data);
    $.post(url,data,function(res){
      if(res=='0'){
        window.location.reload();
      }else{
        alert('恢复失败');
        console.log(res);
      }
    });
  });
//到店操作JS
$('.chere').on('click',function(){
    var url="reserve_here_do.php";
    var data = {
      id:$(this).val(),
    }
    console.log(data);
    $.post(url,data,function(res){
      if(res=='0'){
        window.location.reload();
      }else if(res=='101'){
        alert('预约已过期');
      }else{
        alert('操作失败');
        console.log(res);
      }
    });
  });
// 添加商品打开
$('.cadd').on('click', cadd);
//搜索操作JS
$('.caddsearch').on('click',function(){
   $('.caddtext').text('');
    $('.caddsearch').attr("disabled",true);
    var url="reserve_search_ajax.php";
    var data = $("#ureservem1 input[name='search']").val();
    console.log(data);
    $.getJSON(url,{phone:data},function(res){
      console.log(res);
      if (res == false) {
        $('.caddtext').text('');
        $("#ureservem1 input[name='card_id']").val('');
      }else{
        $('.caddtext').text(res.card_code);
         $("#ureservem1 input[name='card_id']").val(res.card_id);
         $("#ureservem1 input[name='name']").val(res.card_name);
         $("#ureservem1 input[name='phone']").val(res.card_phone);
      };
    });
    setTimeout("$('.caddsearch').attr('disabled',false)",1000);
  });
$('.ceditsearch').on('click',function(){
  $('.cedittext').text('');
    $('.ceditsearch').attr("disabled",true);
    var url="reserve_search_ajax.php";
    var data = $("#ureservem2 input[name='search']").val();
    $.getJSON(url,{phone:data},function(res){
      if (res == false) {
        $('.cedittext').text('');
         $("#ureservem2 input[name='card_id']").val('');
      }else{
        $('.cedittext').text(res.card_code);
         $("#ureservem2 input[name='card_id']").val(res.card_id);
         $("#ureservem2 input[name='name']").val(res.card_name);
         $("#ureservem2 input[name='phone']").val(res.card_phone);
      };
    });
    setTimeout("$('.ceditsearch').attr('disabled',false)",1000);
  });
//弹出框中的查询
$('.cgoods_search').on('click',searchGoods);
//下一步
$('.cmodelopen').on('click', function(e) {
  $('#ureservem1').modal('close');
  $('#ureservem3').modal('open');
});
$('.cmodelopen3').on('click', function(e) {
  $('#ureservem2').modal('close');
  $('#ureservem4').modal('open');
});
//上一步
$('.cmodelopen2').on('click', function(e) {
  $('#ureservem3').modal('close');
  $('#ureservem1').modal('open');
});
$('.cmodelopen4').on('click', function(e) {
  $('#ureservem4').modal('close');
  $('#ureservem2').modal('open');
});

//添加商品
$('.creserveadd').on('click', function(){
  var url="reserve_add_do.php";
  var arr= [];
  $("#ureservem3 .cnum").each(function(k,v){
    if($(this).attr('mgoods_id')){
      var json = {'mgoods_id':$(this).attr('mgoods_id'),'num':$(this).val(),'mgoods_name':$(this).attr('mgoods_name')};
    }
    arr.push(json);
  });
  var reserve_dtime = $("#ureservem1 input[name='dtime']").val();
  var card_id = $("#ureservem1 input[name='card_id']").val();
  var reserve_name = $("#ureservem1 input[name='name']").val();
  var reserve_phone = $("#ureservem1 input[name='phone']").val();
  var reserve_count = $("#ureservem1 input[name='count']").val();
  var reserve_memo = $("#ureservem1 textarea[name='memo']").val();
  var data = {
        mgoods_id:arr,
        dtime:reserve_dtime,
        card_id:card_id,
        name:reserve_name,
        phone:reserve_phone,
        count:reserve_count,
        memo:reserve_memo
      }
  console.log(data);
  $.post(url,data,function(res){
    if(res=='0'){
      window.location.reload();
    }else if(res == '1' || res == '2'){
      alert('请完善数据');
    }else{
      alert('添加失败');
      console.log(res);
    }
  });
});
//修改打开
$('.cedit').on('click', function(){
  $("#ureservem2 input[name='search']").val('');
  $("#ureservem4 .uright .uc li").remove();/*删除之前可能存在的套餐商品*/
  var url="reserve_edit_ajax.php";
  var data = $(this).val();
  $.getJSON(url,{id:data},function(msg){
      console.log(msg);
      $("#ureservem2 input[name='dtime']").val(msg.dtime);
      $("#ureservem2 input[name='card_id']").val(msg.card_id);
      $("#ureservem2 input[name='id']").val(msg.reserve_id);
      $("#ureservem2 input[name='name']").val(msg.reserve_name);
      $("#ureservem2 input[name='phone']").val(msg.reserve_phone);
      $("#ureservem2 input[name='count']").val(msg.reserve_count);
      $("#ureservem2 textarea[name='memo']").val(msg.reserve_memo);
      $.each(msg.reserve_goods, function (key,val) {
        if(val.mgoods_id !='0'){
          addhtml ='<li><div class="uc1">'+val.c_mgoods_name+'</div><div class="uc2"><a href="javascript:;" class="ufont1 cbtndec"><i class="am-icon-minus"></i></a>&nbsp;<input mgoods_id="'+val.mgoods_id+'" mgoods_name="'+val.c_mgoods_name+'" class="am-form-field uinput2 uinput-35 cnum" type="text" placeholder="">&nbsp;<a href="javascript:;" class="ufont1 cbtnplus"><i class="am-icon-plus"></i></a></div><div class="uc3 cdel2" mgoods_id="'+val.mgoods_id+'"><a href="javascript:;">移除</a></div></li>';
        }
        $("#ureservem4 .uright .uc").append(addhtml);
      });  
  });
});
// 修改提交
$('.creserveedit').on('click', function(){
  var url="reserve_edit_do.php";
  var arr= [];
  $("#ureservem4 .cnum").each(function(k,v){
    if($(this).attr('mgoods_id')){
      var json = {'mgoods_id':$(this).attr('mgoods_id'),'num':$(this).val(),'mgoods_name':$(this).attr('mgoods_name')};
    }
    arr.push(json);
  });
  var reserve_dtime = $("#ureservem2 input[name='dtime']").val();
  var card_id = $("#ureservem2 input[name='card_id']").val();
  var reserve_name = $("#ureservem2 input[name='name']").val();
  var reserve_phone = $("#ureservem2 input[name='phone']").val();
  var reserve_count = $("#ureservem2 input[name='count']").val();
  var reserve_memo = $("#ureservem2 textarea[name='memo']").val();
  var reserve_id = $("#ureservem2 input[name='id']").val();
  var data = {
        mgoods_id:arr,
        dtime:reserve_dtime,
        card_id:card_id,
        name:reserve_name,
        phone:reserve_phone,
        count:reserve_count,
        memo:reserve_memo,
        id:reserve_id
      };
      console.log(data);
  $.post(url,data,function(res){
    console.log(res);
    if(res=='0'){
      window.location.reload();
    }else{
      alert('修改失败');
      console.log(res);
    }
  });
})

//删除
$(document).on("click",".cdel2",function(){
    $(this).parent().remove();
});

//添加商品
function cadd(){
  var product = $(this).prev().text();
  var type = $(this).attr('ctype');
  var mgoods_name = $(this).prev().attr('mgoods_name');
  var mgoods_id = $(this).parent().attr('mgoods_id');
  var flag = true;
  console.log(1);
  if(type=='add'){
    $('#ureservem3 .cnum').each(function(){
      if(mgoods_id != undefined && mgoods_id == $(this).attr('mgoods_id')){
        flag = false;
      }
    });
  }else{
    $('#ureservem4 .cnum').each(function(){
      if(mgoods_id != undefined && mgoods_id == $(this).attr('mgoods_id')){
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

  if(type=='add'){
    $("#ureservem3 .uright .uc").append(addhtml);
  }else{
    $("#ureservem4 .uright .uc").append(addhtml);
  }
}
//查询商品
function searchGoods(){
    var type = $(this).attr('ctype');
    var data = {};
    if(type=='add'){
      $("#ureservem3 #tab1 .uc li").hide();
      data={
        type: $("#ureservem3 #tab1 .cgoods_type").val(),
        search:$("#ureservem3 #tab1 .cgoods_name").val()
      };
    }else{
      $("#ureservem4 #tab1 .uc li").hide();
      data={
        type: $("#ureservem4 #tab1 .cgoods_type").val(),
        search:$("#ureservem4 #tab1 .cgoods_name").val()
      };
    }
    $.ajax({
      url:'reserve_goods_search_ajax.php',
      data:data,
      type:"GET",
      dataType:"json"
    }).then(function(res){
      if(res){
        if(type=='add'){
          $.each(res, function(key, val) {
            $("#ureservem3 #tab1 .uc li[mgoods_type]").each(function(){
              //console.log($(this).attr('mgoods_type'));
              if($(this).attr('mgoods_type')==val.mgoods_catalog_id){
                $(this).show();
              }
            });
            $("#ureservem3 #tab1 .uc li[sgoods_type]").each(function(){
              if($(this).attr('sgoods_type')==val.sgoods_catalog_id){
                $(this).show();
              }
            });
            if(val.mgoods!=undefined){
              $.each(val.mgoods, function(key,val){
                $("#ureservem3 #tab1 .uc li[mgoods_id]").each(function(){
                  if($(this).attr('mgoods_id')  == val['mgoods_id']){
                    $(this).show();
                  }
                });
              })
            }
            if(val.sgoods!=undefined){
              $.each(val.sgoods, function(key,val){
                $("#ureservem3 #tab1 .uc li[sgoods_id]").each(function(){
                  if($(this).attr('sgoods_id') == val['sgoods_id']){
                    $(this).show();
                  }
                });
              })
            }
          });
        }else{
          $.each(res, function(key, val) {
            $("#ureservem4 #tab1 .uc li[mgoods_type]").each(function(){
              //console.log($(this).attr('mgoods_type'));
              if($(this).attr('mgoods_type')==val.mgoods_catalog_id){
                $(this).show();
              }
            });
            $("#ureservem4 #tab1 .uc li[sgoods_type]").each(function(){
              if($(this).attr('sgoods_type')==val.sgoods_catalog_id){
                $(this).show();
              }
            });
            if(val.mgoods!=undefined){
              $.each(val.mgoods, function(key,val){
                $("#ureservem4 #tab1 .uc li[mgoods_id]").each(function(){
                  if($(this).attr('mgoods_id')  == val['mgoods_id']){
                    $(this).show();
                  }
                });
              })
            }
            if(val.sgoods!=undefined){
              $.each(val.sgoods, function(key,val){
                $("#ureservem4 #tab1 .uc li[sgoods_id]").each(function(){
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

</script>
</body>
</html>
