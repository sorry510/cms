<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>
<!-- content -->
<div class="gcontent" id="usystem_shop_config">
  <ul class="am-nav am-nav-pills ubread">
    <li class="am-active"><a href="javascript: void(0);">参数设置</a></li>
  </ul>
  <div class="gspace20"></div>
  <form class="am-form" id="cform1">
    <div class="am-u-lg-12 ua">
      <label class="am-u-lg-2 ua1">小票打印：</label>
      <div class="am-u-lg-3 ub">
        <label class="am-radio-inline">
          <input type="radio" name="print_flag" value="1" data-am-ucheck <?php if($this->_data['shop_config']['print_flag']==1) echo 'checked';?>> 启用
        </label>
        <label class="am-radio-inline">
          <input type="radio" name="print_flag" value="2" data-am-ucheck <?php if($this->_data['shop_config']['print_flag']==2) echo 'checked';?>> 不启用
        </label>
      </div>
    </div>
    <div class="am-u-lg-12 ua">
      <label class="am-u-lg-2 ua1">打印标题：</label> 
      <input class="am-form-field uinput uinput-220" type="text" name="print_title" value="<?php echo $this->_data['shop_config']['print_title'];?>">
    </div>
    <div class="am-u-lg-12 ua">
      <label class="am-u-lg-2 ua1">打印尺寸：</label> 
      <select class="uselect uselect-auto" data-am-selected name="print_width">
        <option value="1" <?php if($this->_data['shop_config']['print_width']==1) echo 'selected';?>>58mm</option>
        <option value="2" <?php if($this->_data['shop_config']['print_width']==2) echo 'selected';?>>88mm</option>
      </select>
    </div>
    <div class="am-u-lg-12 ua">
      <label class="am-u-lg-2 ua1">打印备注：</label> 
      <input class="am-form-field uinput uinput-220" type="text" name="print_memo" value="<?php echo $this->_data['shop_config']['print_memo'];?>">
    </div>
    <div class="am-u-lg-12 ua">
      <label class="am-u-lg-2 ua1">二维码上传：</label>
      <div class="am-form-file am-text-left am-u-lg-2 ub">
        <button type="button" class="am-btn am-btn-default am-btn-sm">
          <i class="am-icon-cloud-upload"></i> 选择要上传的照片
        </button>
        <input type="file" class="cfile" name="ewm">
        <?php if($this->_data['shop_config']['print_ewm'] == ''){?>
        <img class="cimg" src="../img/wu.jpg" style="width:200px; height:250px;">
        <?php }else{?>
        <img class="cimg" src="http://<?php echo $GLOBALS["gconfig"]["path"]["photo_shop_show"].'/'.$this->_data['shop_config']['print_ewm'].'?'.rand(0,1000);?>" style="width:200px; height:250px;">
        <?php }?>
      </div>
    </div>
    <div class="am-u-lg-12 ua">
      <label class="am-u-lg-2 ua1"></label> 
      <div class="am-u-lg-8 ub">
        <button type="button" class="am-btn ubtn-sure ubtn-green csubmit">
          <i class="iconfont icon-yuanxingxuanzhong"></i>
            完成
        </button>
      </div>
    </div>
    <div class="am-u-lg-12"><div class="gspace20"></div></div> 
  </form>
</div>

<script src="../js/jquery.min.js"></script>
<script src="../js/amazeui.min.js"></script>
<script type="text/javascript">
  //上传文件
  $(".cfile").on('change',function(){
    var img = $(this).siblings('img');
    var file = this.files[0];
    if(window.FileReader) {
        var fr = new FileReader();
        fr.onloadend = function(e) {
          img.attr('src',e.target.result);
        }
        fr.readAsDataURL(file);
    }
  });
  $('.csubmit').on('click', function(){
    $.ajax({
      url: 'system_shop_config_add_do.php',
      type: 'POST',
      cache: false,
      data: new FormData($('#cform1')[0]),
      processData: false,
      contentType: false
    }).done(function(res){
      // console.log(res);return false;
      if(res==0){
        window.location.reload();
      }else{
        alert('设置失败，请重新尝试或联系管理员');
      }
    })
  })
</script>
</body>
</html>
