<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>
<!-- content -->
<div class="gcontent" id="uticket_goods">
  <ul class="am-nav am-nav-pills ubread">
    <li class="am-active"><a href="javascript: void(0);">体验券管理</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="utools">
    <form class="am-form-inline uform2">
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
    <button class="am-btn ubtn-sure ubtn-blue" data-am-modal="{target:'#uticket_goodsm1'}">
      <i class="iconfont icon-xinzeng"></i>
      新增体验券
    </button>
  </div>
  <div class="gspace15"></div>
  <table class="am-table am-table-bordered am-table-hover am-table-compact utable1">
    <thead>
      <tr>
        <td>新增时间</td>
        <td>名称</td>
        <td>面值</td>
        <td>体验商品</td>
        <td>有效期</td>
        <td>启用方式</td>
        <td>备注</td>
        <td style="width:12%">操作</td>
      </tr>
    </thead>
    <tbody>
      <?php foreach($this->_data['ticket_goods_list']['list'] as $row) { ?>
      <tr>
        <td><?php echo date('Y-m-d H:i',$row['ticket_goods_atime']) ; ?></td>
        <td><?php echo $row['ticket_goods_name']; ?></td>
        <td><?php echo $row['ticket_goods_value']; ?></td>
        <td><?php echo $row['mgoods_name']; ?></td>
        <td><?php echo $row['ticket_goods_days']; ?></td>
        <td><?php echo $row['begin']; ?></td>
        <td><?php echo $row['ticket_goods_memo']; ?></td>
        <td>
          <button class="am-btn ubtn-table ubtn-green cedit" data-am-modal="{target: '#uticket_goodsm2'}" value="<?php echo $row['ticket_goods_id']; ?>">
            <i class="iconfont icon-bianji"></i>
            修改
          </button>
          &nbsp;
          <button class="am-btn ubtn-table ubtn-gray cdel" value="<?php echo $row['ticket_goods_id']; ?>">
            <i class="iconfont icon-shanchu"></i>
            删除
          </button>
        </td>
      </tr>
    <?php } ?> 
    </tbody>
  </table>
  <ul class="am-pagination am-pagination-centered upages">
    <li class="upage-info">共<?php echo $this->_data['ticket_goods_list']['pagecount']; ?>页 <?php echo $this->_data['ticket_goods_list']['allcount']; ?>条记录</li>
    <li class="cfirst am-disabled"><a href="ticket_goods.php?<?php echo api_value_query($this->_data['request'], $this->_data['ticket_goods_list']['pagepre']); ?>">&laquo;</a></li>
    <li class="am-active"><a href="#"><?php echo $this->_data['ticket_goods_list']['pagenow'];?></a></li>
    <li class="clast"><a href="ticket_goods.php?<?php echo api_value_query($this->_data['request'], $this->_data['ticket_goods_list']['pagenext']); ?>">&raquo;</a></li>
    <li>，跳转到第 <input id="idpagego" class="am-form-field uinput" style="width:45px;height: 26px;vertical-align:bottom;line-height: 26px;" onkeydown="if(event.keyCode == 13){page_do();}"> 页</li>
  </ul>
</div>

<!-- 新增体验券弹出框 -->
<div id="uticket_goodsm1" class="am-modal" tabindex="-1">
  <div class="am-modal-dialog umodal umodal-simple">
    <div class="am-modal-hd uhead">新增体验券
      <a href="javascript:void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd">
      <form class="am-form am-form-horizontal" id="cinfoadd">
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">名称：</label>
          <div class="umodal-normal">
            <input id="" class="am-form-field uinput uinput-max" type="text" placeholder="" name="name">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">面值：</label>
          <div class="umodal-normal">
            <input id="" class="am-form-field uinput uinput-max" type="text" placeholder="" name="value">
          </div>
          <div class="umodal-text">&nbsp;元</div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">商品搜索：</label>
          <div class="umodal-normal">
            <input id="" class="uinput uinput-max" type="text" placeholder="" name="goods">
          </div>
          <div class="umodal-search">
            <button type="button" class="am-btn ubtn-search2 ubtn-green caddsearch">
              <i class="iconfont icon-search"></i>查询
            </button>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">体验商品：</label>
          <div class="umodal-normal">
            <select class="uselect uselect-max" data-am-selected name="goods_id">

            </select>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">有效期：</label>
          <div class="umodal-normal">
            <input id="" class="am-form-field uinput uinput-max" type="text" placeholder="" name="days">
          </div>
          <div class="umodal-text">&nbsp;天</div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">可用时间：</label>
          <div class="umodal-normal am-text-left">
            <label class="am-radio-inline">
              <input type="radio" name="begin" value="1" data-am-ucheck checked> 当天开始
            </label>
            <label class="am-radio-inline">
              <input type="radio" name="begin" value="2" data-am-ucheck> 第二天开始
            </label> 
          </div>
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
        <button type="button" class="am-btn ubtn-sure ubtn-green csubmitadd"><i class="iconfont icon-yuanxingxuanzhong"></i>
        完成
        </button>
      </div>
    </div>
  </div>
</div>
<div id="uticket_goodsm2" class="am-modal" tabindex="-1">
  <div class="am-modal-dialog umodal umodal-simple">
    <div class="am-modal-hd uhead">修改体验券
      <a href="javascript:void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd">
      <form class="am-form am-form-horizontal" id="cinfoedit">
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">名称：</label>
          <div class="umodal-normal">
            <input type="hidden" class="am-form-field uinput uinput-max" name="id">
            <input id="" class="am-form-field uinput uinput-max" type="text" placeholder="" name="name">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">面值：</label>
          <div class="umodal-normal">
            <input id="" class="am-form-field uinput uinput-max" type="text" placeholder="" name="value">
          </div>
          <div class="umodal-text">&nbsp;元</div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">商品搜索：</label>
          <div class="umodal-normal">
            <input id="" class="uinput uinput-max" type="text" placeholder="" name="goods">
          </div>
          <div class="umodal-search">
            <button type="button" class="am-btn ubtn-search2 ubtn-green ceditsearch">
              <i class="iconfont icon-search"></i>查询
            </button>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">体验商品：</label>
          <div class="umodal-normal">
            <select class="uselect uselect-max" data-am-selected name="goods_id">
              
            </select>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">有效期：</label>
          <div class="umodal-normal">
            <input id="" class="am-form-field uinput uinput-max" type="text" placeholder="" name="days">
          </div>
          <div class="umodal-text">&nbsp;天</div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">可用时间：</label>
          <div class="umodal-normal am-text-left">
            <label class="am-radio-inline">
              <input type="radio" name="begin" value="1" data-am-ucheck checked> 当天开始
            </label>
            <label class="am-radio-inline">
              <input type="radio" name="begin" value="2" data-am-ucheck> 第二天开始
            </label> 
          </div>
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
        <button type="button" class="am-btn ubtn-sure ubtn-green csubmitedit"><i class="iconfont icon-yuanxingxuanzhong"></i>
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
//分页首末页不可选中
if(<?php echo $this->_data['ticket_goods_list']['pagenow'];?>>1){
  $('.upages li.cfirst').removeClass('am-disabled');
}
if(<?php echo $this->_data['ticket_goods_list']['pagecount']-$this->_data['ticket_goods_list']['pagenow']; ?><1){
  $('.upages li.clast').addClass('am-disabled');
}

function page_do() {
  var intpage = parseInt(document.getElementById("idpagego").value);
  if(isNaN(intpage)) {
    alert("请输入正确的页码！");
  } else {
    window.location = "ticket_goods.php?<?php echo api_value_query($this->_data['request']); ?>&page=" + intpage;
  }
}
// 表格中删除功能
$(function() {
  $('.cdel').on('click', function() {
    $('#cconfirm').modal({
      relatedTarget: this,
      onConfirm: function(options) {
        var url="ticket_goods_delete_do.php";
        $.post(url,{'id':$(this.relatedTarget).val()},function(res){
          if(res=='0'){
            window.location.reload();
          }else{
            alert('删除失败');
            console.log(res);
          }
          /*if(res == '100'){
            alert('活动开始前才可删除');
            console.log(res);
          }
          if (res != '0' &&  res != '100') {
            alert('删除失败');
            console.log(res);
          }*/
        });
      },
      onCancel: function() {
        return;
      }
    });
  });
});
$('.csubmitadd').on('click',function(){
    $('.csubmitadd').attr("disabled",true);
    var url="ticket_goods_add_do.php";
    var data = $("#cinfoadd").serialize();
    console.log(data);
    $.post(url,data,function(res){
      if(res=='0'){
        window.location.reload();
      }else if(res=='1'){
        alert('请完善数据');
        $('.csubmitadd').attr("disabled",false);
      }else{
        alert('添加失败');
        $('.csubmitadd').attr("disabled",false);
        console.log(res);
      }
    });
  });
$('.cedit').on('click',function(){
    var url="ticket_goods_edit_ajax.php";
    var data = $(this).val();
    console.log(data);
    $.getJSON(url,{id:data},function(res){
      console.log(res);
      console.log(res.ticket_goods_id);
      $("#uticket_goodsm2 input[name='id']").val(res.ticket_goods_id);
      $("#uticket_goodsm2 input[name='days']").val(res.ticket_goods_days);
      $("#uticket_goodsm2 input[name='name']").val(res.ticket_goods_name);
      $("#uticket_goodsm2 input[name='value']").val(res.ticket_goods_value);
      $("#uticket_goodsm2 input[name='goods']").val(res.mgoods_name);
      $("#uticket_goodsm2 select[name='goods_id']").append("<option value='"+res.mgoods_id+"'>"+res.mgoods_name+"</option>");
      $("#uticket_goodsm2 input[name='begin']").each(function(){
          if($(this).val()==res.ticket_goods_begin){
            $(this).uCheck('check');
          }
        });
      $("#uticket_goodsm2 textarea[name='memo']").val(res.ticket_goods_memo);
    });
  });
$('.csubmitedit').on('click',function(){
    $('.csubmitedit').attr("disabled",true);
    var url="ticket_goods_edit_do.php";
    var data = $("#cinfoedit").serialize();
    console.log(data);
    $.post(url,data,function(res){
      if(res=='0'){
        window.location.reload();
      }else if(res=='1'){
        alert('请完善数据');
        $('.csubmitedit').attr("disabled",false);
      }else{
        alert('修改失败');
        $('.csubmitedit').attr("disabled",false);
        console.log(res);
      }
    });
  });
$('.caddsearch').on('click',function(){
    $('.caddsearch').attr("disabled",true);
    $("#uticket_goodsm1 select").find("option").remove();
    var url="ticket_goods_search_ajax.php";
    var data = $("#uticket_goodsm1 input[name='goods']").val();
    $.getJSON(url,{goods:data},function(res){
      for (var i = 0; i < res.length; i++) {
        $("#uticket_goodsm1 select").append("<option value='"+res[i].mgoods_id+"'>"+res[i].mgoods_name+"</option>")
      }
    });
    setTimeout("$('.caddsearch').attr('disabled',false)",1000);
  });
$('.ceditsearch').on('click',function(){
    $('.ceditsearch').attr("disabled",true);
    $("#uticket_goodsm2 select").find("option").remove();
    var url="ticket_goods_search_ajax.php";
    var data = $("#uticket_goodsm2 input[name='goods']").val();
    $.getJSON(url,{goods:data},function(res){
      for (var i = 0; i < res.length; i++) {
          $("#uticket_goodsm2 select").append("<option value='"+res[i].mgoods_id+"'>"+res[i].mgoods_name+"</option>")
      }
    });
    setTimeout("$('.ceditsearch').attr('disabled',false)",1000);
  });
</script>
</body>
</html>