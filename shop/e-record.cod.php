<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>

<!-- content -->
<div id="ue-record" class="gcontent">
  <ul class="am-nav am-nav-pills ubread">
    <li class="am-active"><a href="javascript: void(0)">电子档案</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="utools">
    <form class="am-form-inline uform2">
      <div class="am-form-group">
        <label class="am-form-label">搜索：</label>
        <input class="am-form-field uinput uinput-220" type="text" name="search" placeholder="会员卡号/姓名/手机号" value="<?php echo $this->_data['request']['search'];?>">
      </div>
      <div class="am-form-group">
        <label class="am-form-label">时间：</label>
        <div class="am-input-group am-datepicker-date udatepicker" data-am-datepicker="{format: 'yyyy-mm-dd'}">
          <input type="text" class="am-form-field" name="from" value="<?php echo $this->_data['request']['from'];?>">
          <span class="am-input-group-btn am-datepicker-add-on">
            <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span> </button>
          </span>
        </div>
      </div>
      <div class="am-form-group">
        <label class="am-form-label">至：</label> 
        <div class="am-input-group am-datepicker-date udatepicker" data-am-datepicker="{format: 'yyyy-mm-dd'}">
          <input type="text" class="am-form-field" name="to" value="<?php echo $this->_data['request']['to'];?>">
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
    <button class="am-btn ubtn-sure ubtn-blue" data-am-modal="{target: '#ue-recordm1'}">
      <i class="iconfont icon-xinzeng"></i>
      新增电子档案
    </button>
  </div>
  <div class="gspace15"></div>
  <table class="am-table am-table-bordered am-table-hover am-table-compact utable1" id="doc-modal-list">
    <thead>
      <tr>
        <td>诊疗时间</td>
        <td>会员卡号</td>
        <td>会员姓名</td>
        <td>性别</td>
        <td>手机号码</td>
        <td>卡类型</td>
        <td>诊疗人员</td>
        <td>操作</td>
      </tr>
    </thead>
    <?php foreach($this->_data['record_history']['list'] as $row){?>
    <tr>
    	<td><a href="javascript:void" history_id="<?php echo $row['card_history_id'];?>" data-am-offcanvas="{target: '#uoffcanvas'}" class="coffopen"><?php echo date('Y-m-d', $row['card_history_atime'])?></a></td>
      <td><?php echo $row['c_card_code']?></td>
      <td><?php echo $row['c_card_name']?></td>
      <td><?php echo $row['c_card_code']==1?'男':($row['c_card_code']==2?'女':'保密');?></td>
      <td><?php echo $row['c_card_phone']?></td>
      <td><?php echo $row['c_card_type_name']?></td>
      <td><?php echo $row['c_worker_name']?></td>
      <td>
      <?php if($row['shop_id'] == $GLOBALS['_SESSION']['login_sid']){?>
        <button class="am-btn ubtn-table ubtn-orange cmodaledit" value="<?php echo $row['card_history_id']; ?>" data-am-modal="{target: '#ue-recordm3'}">
          <i class="iconfont icon-bianji"></i>
          修改
        </button>
      <?php }?>
      </td>
  	</tr>
    <?php }?>
  </table>
  <?php pageHtml($this->_data['record_history'],$this->_data['request'],'e-record.php');?>
</div>

<!--modal框-->
<div id="ue-recordm1" class="am-modal" tabindex="-1">
  <div class="am-modal-dialog umodal">
    <div class="am-modal-hd uhead">新增电子档案
      <a href="javascript:void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd">
      <form class="am-form am-form-horizontal">
        <div class="am-form-group" >
          <label class="umodal-label am-form-label" for="">会员：</label>
          <div class="umodal-normal">
            <input type="text" name="search" class="am-form-field uinput uinput-max csearch" placeholder="卡号/姓名/手机号">
          </div>
          <div class="umodal-search">
            <button type="button" class="am-btn ubtn-search csearchbtn">
              <i class="iconfont icon-search"></i>查询
            </button>
          </div>
        </div>
        <div class="am-scrollable-vertical" style="max-height:250px;margin:0 4%;">
          <table class="am-table am-table-bordered am-table-centered am-table-hover am-table-compact utable1 utable1-fixed ctable" style="width:100%;">
            <thead>
              <tr>
                <td>消费时间</td>
                <td>消费单号</td>
                <td>卡号</td>
                <td>姓名</td>
                <td>性别</td>
                <td>手机号码</td>
                <td>卡类型</td>
                <td>操作</td>
              </tr>
            </thead>
            <tbody>
        
            </tbody>
          </table>
        </div>
      </form>
    </div>
  </div>
</div>
<div id="ue-recordm2" class="am-modal" tabindex="-1">
  <div class="am-modal-dialog umodal">
    <div class="am-modal-hd uhead">新增电子档案
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd umain1">
      <form class="am-form am-form-horizontal" id="cform2">
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">会员姓名：</label>
          <label class="umodal-label am-form-label am-text-left cname"></label>
          <input type="hidden" class="crecord_id" name="record_id"/>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">诊疗时间：</label>
          <div class="umodal-normal">
            <div class="am-input-group am-datepicker-date udatepicker udatepicker-max cvalid" data-am-datepicker="{format:'yyyy-mm-dd'}">
              <input type="text" class="am-form-field" name="time">
              <span class="am-input-group-btn am-datepicker-add-on">
                <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span></button>
              </span>
            </div>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">诊疗人员：</label>
          <div class="umodal-normal">
            <select class="uselect uselect-max cvalid" name="worker_id" data-am-selected="{maxHeight: '150px'}">
              <option value="0">请选择</option>
              <?php foreach($this->_data['worker_list'] as $row){?>
              <option value="<?php echo $row['worker_id'];?>"><?php echo $row['worker_name'];?></option>
              <?php }?>
            </select>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">问题描述：</label>
          <div class="umodal-max">
            <textarea class="utextarea utextarea-max" name="question"></textarea>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">诊疗结果：</label>
          <div class="umodal-max">
            <textarea class="utextarea utextarea-max" name="result"></textarea>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">诊疗方案：</label>
          <div class="umodal-max">
            <textarea class="utextarea utextarea-max" name="plan"></textarea>
          </div>
        </div>
        <div id="uploader">
          <div class="queueList">
            <div id="dndArea" class="placeholder">
              <div id="filePicker"></div>
              <p>或将照片拖到这里，单次最多可选5张</p>
            </div>
          </div>
          <div class="statusBar" style="display:none;">
            <div class="progress">
              <span class="text">0%</span>
              <span class="percentage"></span>
            </div><div class="info"></div>
            <div class="btns">
              <div id="filePicker2"></div><div class="uploadBtn">开始上传</div>
            </div>
          </div>
        </div>
      </form>
    </div>
    <div class="am-modal-footer ufoot">
      <div class="am-btn-group">
        <button type="button" class="am-btn ubtn-sure ubtn-green crollback"><i class="iconfont icon-yuanxingxuanzhong"></i>
          上一步
        </button>
        <button type="button" class="am-btn ubtn-sure ubtn-green caddsubmit"><i class="iconfont icon-yuanxingxuanzhong"></i>
          完成
        </button>
      </div>
    </div>
  </div>
</div>
<div id="ue-recordm3" class="am-modal" tabindex="-1">
  <div class="am-modal-dialog umodal">
    <div class="am-modal-hd uhead">修改电子档案
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd umain1">
      <form class="am-form am-form-horizontal" id="cform3">
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">会员姓名：</label>
          <label class="umodal-label am-form-label am-text-left cname"></label>
          <input type="hidden" class="ccard_history_id" name="card_history_id"/>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">诊疗时间：</label>
          <div class="umodal-normal">
            <div class="am-input-group am-datepicker-date udatepicker udatepicker-max" data-am-datepicker="{format:'yyyy-mm-dd'}">
              <input type="text" class="am-form-field ctime" name="time">
              <span class="am-input-group-btn am-datepicker-add-on">
                <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span></button>
              </span>
            </div>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">诊疗人员：</label>
          <div class="umodal-normal">
            <select class="uselect uselect-max cworker_id" name="worker_id">
              <option value="0">请选择</option>
              <?php foreach($this->_data['worker_list'] as $row){?>
              <option value="<?php echo $row['worker_id'];?>"><?php echo $row['worker_name'];?></option>
              <?php }?>
            </select>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">问题描述：</label>
          <div class="umodal-max">
            <textarea class="utextarea utextarea-max cquestion" name="question"></textarea>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">诊疗结果：</label>
          <div class="umodal-max">
            <textarea class="utextarea utextarea-max cresult" name="result"></textarea>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">诊疗方案：</label>
          <div class="umodal-max">
            <textarea class="utextarea utextarea-max cplan" name="plan"></textarea>
          </div>
        </div>
        <div class="am-form-group ">
          <label class="umodal-label am-form-label">图片1：</label>
          <div class="umodal-normal am-form-file am-text-left">
            <button type="button" class="am-btn am-btn-default am-btn-sm" style="width: 100%;">
              <i class="am-icon-cloud-upload"></i> 上传图片1
            </button>
            <input type="file" class="cimg1" name="img1">
          </div>
        </div>
        <div class="am-form-group ">
          <label class="umodal-label am-form-label">图片2：</label>
          <div class="umodal-normal am-form-file am-text-left">
            <button type="button" class="am-btn am-btn-default am-btn-sm" style="width: 100%;">
              <i class="am-icon-cloud-upload"></i> 上传图片2
            </button>
            <input type="file" class="cimg2" name="img2">
          </div>
        </div>
        <div class="am-form-group ">
          <label class="umodal-label am-form-label">图片3：</label>
          <div class="umodal-normal am-form-file am-text-left">
            <button type="button" class="am-btn am-btn-default am-btn-sm" style="width: 100%;">
              <i class="am-icon-cloud-upload"></i> 上传图片3
            </button>
            <input type="file" class="cimg3" name="img3">
          </div>
        </div>
        <div class="am-form-group ">
          <label class="umodal-label am-form-label">图片4：</label>
          <div class="umodal-normal am-form-file am-text-left">
            <button type="button" class="am-btn am-btn-default am-btn-sm" style="width: 100%;">
              <i class="am-icon-cloud-upload"></i> 上传图片4
            </button>
            <input type="file" class="cimg4" name="img4">
          </div>
        </div>
        <div class="am-form-group ">
          <label class="umodal-label am-form-label">图片5：</label>
          <div class="umodal-normal am-form-file am-text-left">
            <button type="button" class="am-btn am-btn-default am-btn-sm" style="width: 100%;">
              <i class="am-icon-cloud-upload"></i> 上传图片5
            </button>
            <input type="file" class="cimg5" name="img5">
          </div>
        </div>
      </form>
    </div>
    <div class="am-modal-footer ufoot">
      <div class="am-btn-group">
        <button type="button" class="am-btn ubtn-sure ubtn-green ceditsubmit"><i class="iconfont icon-yuanxingxuanzhong"></i>
          完成
        </button>
      </div>
    </div>
  </div>
</div>
<!--侧拉框-->
<div id="uoffcanvas" class="am-offcanvas" >
  <div class="am-offcanvas-bar am-offcanvas-bar-flip uoffcanvas">
    <div class="am-offcanvas-content" >
      <div class="am-modal-hd"><span class="utitle">档案信息</span>
        <a href="javascript: void(0)" class="am-close am-close-spin doc-oc-js coffcanvas1" data-rel="close"><img src="../img/close.jpg"></a>
      </div>
      <div class="gspace15"></div>
      <div class="am-g ucontent">
        <div class="am-u-lg-6">会员卡号：<span>张三</span></div>
        <div class="am-u-lg-6">会员姓名：<span>3700824417</span></div>
        <div class="am-u-lg-6">诊疗时间：<span>a123212</span></div>
        <div class="am-u-lg-6">诊疗人员：<span>男</span></div>
        <div class="am-u-lg-12">服务项目：<span>无</span></div>
        <div class="am-u-lg-12">问题描述：<span>无</span></div>
        <div class="am-u-lg-12">诊疗结果：<span>无</span></div>
        <div class="am-u-lg-12">诊疗方案：<span>无</span></div>
        <div class="am-u-lg-12 gspace15"></div>
        <label class="am-u-lg-12">照片</label>
        <div class="am-u-lg-4"><img src="../img/wu.jpg"></div>
        <label class="am-u-lg-8">&nbsp;</label>
      </div>
    </div>
  </div>
</div>
<link rel="stylesheet" href="../webupload/webuploader.css" />
<link rel="stylesheet" href="../webupload/upload.css" />
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/amazeui.min.js"></script>
<script type="text/javascript" src="../webupload/webuploader.min.js"></script>
<script>
  <?php pageJs($this->_data['record_history'],$this->_data['request'],'e-record.php');?>
  // cvalid
  $('input.cvalid').on('input propertychange blur', function(){
    $(this).val()==''?$(this).addClass('am-field-error'):$(this).removeClass('am-field-error');
  })
  // select cvalid
  $('select.cvalid').on('change', function(){
    $(this).val()=='0'?$(this).addClass('am-field-error'):$(this).removeClass('am-field-error');
  })
  // 日期
  $('div.cvalid input').on('input propertychange blur', function(){
    console.log($(this).val());
    $(this).val()==''?$(this).parent().addClass('am-field-error'):$(this).parent().removeClass('am-field-error');
  })
  var card_record = [];
  var imgs_name = [];
  // 侧拉打开
  $('.coffopen').on('click', function(){
    var history_id = $(this).attr('history_id');
    $.getJSON('e-record_edit_ajax.php', {history_id:history_id}, function(res){
      console.log(res);
    })
  })
  //侧拉关闭
  $('.coffcanvas1').on('click', function() {
    $('#uoffcanvas').offCanvas('close');
  });
  //侧拉去掉禁止选中
  $('.uoffcanvas').parent().on('open.offcanvas.amui', function() {
    $(this).css('user-select','');
  });
  $(document).on('click','.cmodalopen2', function(event){
    var event = event || window.event;
    var _this = event.target;
    var index = $(_this).val();
    if(card_record[index]){
        $('#ue-recordm2 .cname').html(card_record[index].c_card_name);
        $('#ue-recordm2 .crecord_id').val(card_record[index].card_record_id);
    }
    $('#ue-recordm1').modal('close');
    $('#ue-recordm2').modal('open');
  })
  $('#ue-recordm1 .csearchbtn').on('click', function(){
    var _this = $(this);
    _this.attr('disabled',true);
    $('#ue-recordm1 .ctable tbody tr').remove();
    var search = $('#ue-recordm1 .csearch').val();
    $.getJSON('e-record_card_record_ajax.php', {search:search}, function(res){
      _this.attr('disabled',false);
      card_record = res;
      if(res.length > 0){
        var addhtml = '';
        $.each(res, function(k,v){
          addhtml += '<tr><td>'+v.date+'</td><td>'+v.card_record_id+'</td><td>'+v.c_card_code+'</td><td>'+v.c_card_name+'</td><td>'+v.sex+'</td><td>'+v.c_card_phone+'</td><td>'+v.c_card_type_name+'</td><td><button type="button" class="am-btn ubtn-table ubtn-green cmodalopen2" value="'+k+'">下一步</button></td></tr>';
        });
        $('#ue-recordm1 .ctable').find('tbody').append(addhtml);
      }
    });
  })
  $('#ue-recordm2 .crollback').on('click', function(){
    $('#ue-recordm2').modal('close');
    $('#ue-recordm1').modal('open');
  })
  $('#ue-recordm2 .caddsubmit').on('click', function(){
    var _this = $(this);
    _this.attr('disabled', true);
    // 验证变红
    $('#ue-recordm2 .cvalid').each(function(){
      if($(this).prop('tagName')=='SELECT'){
        if($(this).val()=='0'){
          $(this).addClass('am-field-error');
        }
      }else if($(this).prop('tagName')=='DIV'){
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
    if($('#ue-recordm2 .cvalid').hasClass("am-field-error")){
      console.log(11);
      _this.attr('disabled',false);
      return false;
    }
    console.log(222);
    var formData = new FormData($('#cform2')[0]);
    if(imgs_name){
      $.each(imgs_name, function(k,v){
        formData.append('img'+k, v);
      })
    }
    $.ajax({
      type: 'post',
      url: 'e-record_add_do.php',
      data: formData,
      contentType: false,// 当有文件要上传时，此项是必须的，否则后台无法识别文件流的起始位置(详见：#1)
      processData: false,// 是否序列化data属性，默认true(注意：false时type必须是post，详见：#2)
      success: function(res) {
          console.log(res);
          if(res == 0){
            window.location.reload();
          }else{
            alert('添加失败');
          }
      }
    })
  })
  $('.cmodaledit').on('click', function(){
    $('#ue-recordm3 .cworker_id').selected('destroy');
    var history_id = $(this).val();
    $.getJSON('e-record_edit_ajax.php', {history_id:history_id}, function(res){
      $('#ue-recordm3 .cname').text(res.c_card_name);
      $('#ue-recordm3 .ccard_history_id').val(res.card_history_id);
      $('#ue-recordm3 .ctime').val(res.time);
      $('#ue-recordm3 .cworker_id').val(res.worker_id);
      $('#ue-recordm3 .cworker_id').selected({
        maxHeight: '150px'
      });
      $('#ue-recordm3 .cquestion').val(res.card_history_question);
      $('#ue-recordm3 .cresult').val(res.card_history_result);
      $('#ue-recordm3 .cplan').val(res.card_history_plan);
      console.log(res);
    })
  })
  $('.ceditsubmit').on('click', function(){
    var formData = new FormData($('#cform3')[0]);
    $.ajax({
      type: 'post',
      url: 'e-record_edit_do.php',
      data: formData,
      contentType: false,// 当有文件要上传时，此项是必须的，否则后台无法识别文件流的起始位置(详见：#1)
      processData: false,// 是否序列化data属性，默认true(注意：false时type必须是post，详见：#2)
      success: function(res) {
          console.log(res);
      }
    })
  })
  $('#ue-recordm2').on('opened.modal.amui', function(){
    var id = $('#ue-recordm2 .crecord_id').val(),
        $wrap = $('#uploader'),
        // 图片容器
        $queue = $( '<ul class="filelist"></ul>' )
            .appendTo( $wrap.find( '.queueList' ) ),

        // 状态栏，包括进度和控制按钮
        $statusBar = $wrap.find( '.statusBar' ),

        // 文件总体选择信息。
        $info = $statusBar.find( '.info' ),

        // 上传按钮
        $upload = $wrap.find( '.uploadBtn' ),

        // 没选择文件之前的内容。
        $placeHolder = $wrap.find( '.placeholder' ),

        $progress = $statusBar.find( '.progress' ).hide(),

        // 添加的文件数量
        fileCount = 0,

        // 添加的文件总大小
        fileSize = 0,

        // 优化retina, 在retina下这个值是2
        ratio = window.devicePixelRatio || 1,

        // 缩略图大小
        thumbnailWidth = 110 * ratio,
        thumbnailHeight = 110 * ratio,

        // 可能有pedding, ready, uploading, confirm, done.
        state = 'pedding',

        // 所有文件的进度信息，key为file id
        percentages = {},
        // 判断浏览器是否支持图片的base64
        isSupportBase64 = ( function() {
            var data = new Image();
            var support = true;
            data.onload = data.onerror = function() {
                if( this.width != 1 || this.height != 1 ) {
                    support = false;
                }
            }
            data.src = "data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==";
            return support;
        } )(),

        // 检测是否已经安装flash，检测flash的版本
        flashVersion = ( function() {
            var version;

            try {
                version = navigator.plugins[ 'Shockwave Flash' ];
                version = version.description;
            } catch ( ex ) {
                try {
                    version = new ActiveXObject('ShockwaveFlash.ShockwaveFlash')
                            .GetVariable('$version');
                } catch ( ex2 ) {
                    version = '0.0';
                }
            }
            version = version.match( /\d+/g );
            return parseFloat( version[ 0 ] + '.' + version[ 1 ], 10 );
        } )(),

        supportTransition = (function(){
            var s = document.createElement('p').style,
                r = 'transition' in s ||
                        'WebkitTransition' in s ||
                        'MozTransition' in s ||
                        'msTransition' in s ||
                        'OTransition' in s;
            s = null;
            return r;
        })(),

        // WebUploader实例
        uploader;

    // 实例化
    uploader = WebUploader.create({
        pick: {
            id: '#filePicker',
            label: '点击选择图片'
        },
        formData: {
            uid: 123,
        },
        dnd: '#dndArea',
        paste: '#uploader',
        swf: '../webupload/Uploader.swf',
        chunked: false,
        chunkSize: 512 * 1024,
        server: './e-record_upload_do.php?id='+id,
        // runtimeOrder: 'flash',

        // accept: {
        //     title: 'Images',
        //     extensions: 'gif,jpg,jpeg,bmp,png',
        //     mimeTypes: 'image/*'
        // },

        // 禁掉全局的拖拽功能。这样不会出现图片拖进页面的时候，把图片打开。
        disableGlobalDnd: true,
        fileNumLimit: 5,
        fileSizeLimit: 200 * 1024 * 1024,    // 200 M
        fileSingleSizeLimit: 50 * 1024 * 1024    // 50 M
    });
    // 拖拽时不接受 js, txt 文件。
    uploader.on( 'dndAccept', function( items ) {
        var denied = false,
            len = items.length,
            i = 0,
            // 修改js类型
            unAllowed = 'text/plain;application/javascript ';

        for ( ; i < len; i++ ) {
            // 如果在列表里面
            if ( ~unAllowed.indexOf( items[ i ].type ) ) {
                denied = true;
                break;
            }
        }

        return !denied;
    });

    uploader.on('dialogOpen', function() {
        console.log('here');
    });


    // 添加“添加文件”的按钮，
    uploader.addButton({
        id: '#filePicker2',
        label: '继续添加'
    });

    uploader.on('ready', function() {
        window.uploader = uploader;
    });
    // 当有文件添加进来时执行，负责view的创建
    function addFile( file ) {
        var $li = $( '<li id="' + file.id + '">' +
                '<p class="title">' + file.name + '</p>' +
                '<p class="imgWrap"></p>'+
                '<p class="progress"><span></span></p>' +
                '</li>' ),

            $btns = $('<div class="file-panel">' +
                '<span class="cancel">删除</span>' +
                '<span class="rotateRight">向右旋转</span>' +
                '<span class="rotateLeft">向左旋转</span></div>').appendTo( $li ),
            $prgress = $li.find('p.progress span'),
            $wrap = $li.find( 'p.imgWrap' ),
            $info = $('<p class="error"></p>'),

            showError = function( code ) {
                switch( code ) {
                    case 'exceed_size':
                        text = '文件大小超出';
                        break;

                    case 'interrupt':
                        text = '上传暂停';
                        break;

                    default:
                        text = '上传失败，请重试';
                        break;
                }

                $info.text( text ).appendTo( $li );
            };

        if ( file.getStatus() === 'invalid' ) {
            showError( file.statusText );
        } else {
            // @todo lazyload
            $wrap.text( '预览中' );
            uploader.makeThumb( file, function( error, src ) {
                var img;

                if ( error ) {
                    $wrap.text( '不能预览' );
                    return;
                }

                if( isSupportBase64 ) {
                    img = $('<img src="'+src+'">');
                    $wrap.empty().append( img );
                } else {
                    $.ajax('../../server/preview.php', {
                        method: 'POST',
                        data: src,
                        dataType:'json'
                    }).done(function( response ) {
                        if (response.result) {
                            img = $('<img src="'+response.result+'">');
                            $wrap.empty().append( img );
                        } else {
                            $wrap.text("预览出错");
                        }
                    });
                }
            }, thumbnailWidth, thumbnailHeight );

            percentages[ file.id ] = [ file.size, 0 ];
            file.rotation = 0;
        }

        file.on('statuschange', function( cur, prev ) {
            if ( prev === 'progress' ) {
                $prgress.hide().width(0);
            } else if ( prev === 'queued' ) {
                $li.off( 'mouseenter mouseleave' );
                $btns.remove();
            }

            // 成功
            if ( cur === 'error' || cur === 'invalid' ) {
                console.log( file.statusText );
                showError( file.statusText );
                percentages[ file.id ][ 1 ] = 1;
            } else if ( cur === 'interrupt' ) {
                showError( 'interrupt' );
            } else if ( cur === 'queued' ) {
                $info.remove();
                $prgress.css('display', 'block');
                percentages[ file.id ][ 1 ] = 0;
            } else if ( cur === 'progress' ) {
                $info.remove();
                $prgress.css('display', 'block');
            } else if ( cur === 'complete' ) {
                $prgress.hide().width(0);
                $li.append( '<span class="success"></span>' );
            }

            $li.removeClass( 'state-' + prev ).addClass( 'state-' + cur );
        });

        $li.on( 'mouseenter', function() {
            $btns.stop().animate({height: 30});
        });

        $li.on( 'mouseleave', function() {
            $btns.stop().animate({height: 0});
        });

        $btns.on( 'click', 'span', function() {
            var index = $(this).index(),
                deg;

            switch ( index ) {
                case 0:
                    uploader.removeFile( file );
                    return;

                case 1:
                    file.rotation += 90;
                    break;

                case 2:
                    file.rotation -= 90;
                    break;
            }

            if ( supportTransition ) {
                deg = 'rotate(' + file.rotation + 'deg)';
                $wrap.css({
                    '-webkit-transform': deg,
                    '-mos-transform': deg,
                    '-o-transform': deg,
                    'transform': deg
                });
            } else {
                $wrap.css( 'filter', 'progid:DXImageTransform.Microsoft.BasicImage(rotation='+ (~~((file.rotation/90)%4 + 4)%4) +')');
            }
        });

        $li.appendTo( $queue );
    }

    // 负责view的销毁
    function removeFile( file ) {
        var $li = $('#'+file.id);

        delete percentages[ file.id ];
        updateTotalProgress();
        $li.off().find('.file-panel').off().end().remove();
    }

    function updateTotalProgress() {
        var loaded = 0,
            total = 0,
            spans = $progress.children(),
            percent;

        $.each( percentages, function( k, v ) {
            total += v[ 0 ];
            loaded += v[ 0 ] * v[ 1 ];
        } );

        percent = total ? loaded / total : 0;


        spans.eq( 0 ).text( Math.round( percent * 100 ) + '%' );
        spans.eq( 1 ).css( 'width', Math.round( percent * 100 ) + '%' );
        updateStatus();
    }

    function updateStatus() {
        var text = '', stats;

        if ( state === 'ready' ) {
            text = '选中' + fileCount + '张图片，共' +
                    WebUploader.formatSize( fileSize ) + '。';
        } else if ( state === 'confirm' ) {
            stats = uploader.getStats();
            if ( stats.uploadFailNum ) {
                text = '已成功上传' + stats.successNum+ '张照片至XX相册，'+
                    stats.uploadFailNum + '张照片上传失败，<a class="retry" href="#">重新上传</a>失败图片或<a class="ignore" href="#">忽略</a>'
            }

        } else {
            stats = uploader.getStats();
            text = '共' + fileCount + '张（' +
                    WebUploader.formatSize( fileSize )  +
                    '），已上传' + stats.successNum + '张';

            if ( stats.uploadFailNum ) {
                text += '，失败' + stats.uploadFailNum + '张';
            }
        }

        $info.html( text );
    }

    function setState( val ) {
        var file, stats;

        if ( val === state ) {
            return;
        }

        $upload.removeClass( 'state-' + state );
        $upload.addClass( 'state-' + val );
        state = val;

        switch ( state ) {
            case 'pedding':
                $placeHolder.removeClass( 'element-invisible' );
                $queue.hide();
                $statusBar.addClass( 'element-invisible' );
                uploader.refresh();
                break;

            case 'ready':
                $placeHolder.addClass( 'element-invisible' );
                $( '#filePicker2' ).removeClass( 'element-invisible');
                $queue.show();
                $statusBar.removeClass('element-invisible');
                uploader.refresh();
                break;

            case 'uploading':
                $( '#filePicker2' ).addClass( 'element-invisible' );
                $progress.show();
                $upload.text( '暂停上传' );
                break;

            case 'paused':
                $progress.show();
                $upload.text( '继续上传' );
                break;

            case 'confirm':
                $progress.hide();
                $( '#filePicker2' ).removeClass( 'element-invisible' );
                $upload.text( '开始上传' );

                stats = uploader.getStats();
                if ( stats.successNum && !stats.uploadFailNum ) {
                    setState( 'finish' );
                    return;
                }
                break;
            case 'finish':
                // console.log(uploader.getFiles());
                stats = uploader.getStats();
                // console.log(stats);
                if ( stats.successNum ) {
                    alert( '上传成功' );
                } else {
                    // 没有成功的图片，重设
                    state = 'done';
                    location.reload();
                }
                break;
        }

        updateStatus();
    }

    uploader.onUploadProgress = function( file, percentage ) {
        var $li = $('#'+file.id),
            $percent = $li.find('.progress span');

        $percent.css( 'width', percentage * 100 + '%' );
        percentages[ file.id ][ 1 ] = percentage;
        updateTotalProgress();
    };

    uploader.onFileQueued = function( file ) {
        fileCount++;
        fileSize += file.size;

        if ( fileCount === 1 ) {
            $placeHolder.addClass( 'element-invisible' );
            $statusBar.show();
        }

        addFile( file );
        setState( 'ready' );
        updateTotalProgress();
    };

    uploader.onFileDequeued = function( file ) {
        fileCount--;
        fileSize -= file.size;

        if ( !fileCount ) {
            setState( 'pedding' );
        }

        removeFile( file );
        updateTotalProgress();

    };
    
    uploader.on('uploadSuccess', function(file, response){
      imgs_name.push(response._raw);
    })
    uploader.on( 'all', function( type ) {
        var stats;
        switch( type ) {
            case 'uploadFinished':
                setState( 'confirm' );
                break;

            case 'startUpload':
                setState( 'uploading' );
                break;

            case 'stopUpload':
                setState( 'paused' );
                break;

        }
    });

    uploader.onError = function( code ) {
        alert( 'Eroor: ' + code );
    };

    $upload.on('click', function() {
        if ( $(this).hasClass( 'disabled' ) ) {
            return false;
        }

        if ( state === 'ready' ) {
            uploader.upload();
        } else if ( state === 'paused' ) {
            uploader.upload();
        } else if ( state === 'uploading' ) {
            uploader.stop();
        }
    });

    $info.on( 'click', '.retry', function() {
        uploader.retry();
    } );

    $info.on( 'click', '.ignore', function() {
        alert( 'todo' );
    } );

    $upload.addClass( 'state-' + state );
    updateTotalProgress();
  })
</script>
</body>
</html>