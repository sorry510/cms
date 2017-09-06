<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>
<!-- content -->
<div class="gcontent" id="usystem_company">
  <ul class="am-nav am-nav-pills ubread">
    <li class="am-active"><a href="javascript: void(0);">企业信息</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="am-g ua">
    <div class="am-u-lg-2 ua1">第<span><?php echo $this->_data['company_info']['years'];?></span>年</div>
    <div class="am-u-lg-10 ua2">
      <div class="ua2a"><?php echo $this->_data['company_info']['company_name'];?></div>
      <ul class="ua2b">
        <li><span>企业代码：</span><span class="ua2b1"><?php echo $this->_data['company_info']['company_code'];?></span></li>
        <li><span>营业执照/证件号码：</span><?php echo $this->_data['company_info']['company_identity_info'];?></li>
        <li><span>绑定手机号：</span><?php echo $this->_data['company_info']['company_phone']; ?> &nbsp;&nbsp;<a href="#"  data-am-modal="{target:'#usystem_companym1'}">修改</a></li>
      </ul>
      <div class="ua2c"><span>系统版本：</span><?php echo $this->_data['company_info']['company_info_xingzhi']; ?>--版本1.0<a class="am-badge am-badge-warning am-radius">续费/升级</a></div>
    </div>
  </div>
  <div class="am-g ub">
    <div class="am-u-lg-2 ub1"></div>
    <ul class="am-list am-u-lg-9 ub2">
      <li><span>所属行业：</span><?php echo $this->_data['company_info']['company_info_xingzhi']; ?></li>
      <li><span>所属区域：</span><?php echo $this->_data['company_info']['province']; ?> <?php echo $this->_data['company_info']['city']; ?></li>
      <li><span>企业地址：</span><?php echo $this->_data['company_info']['company_area_address']; ?></li>
      <li><span>企业规模：</span><?php echo $this->_data['company_info']['guimo']; ?></li>
      <li><span>开通日期：</span><?php echo date("Y-m-d",$this->_data['company_info']['company_atime']); ?></li>
      <li><span style="text-indent:1em;">联系人：</span><?php echo $this->_data['company_info']['company_link_name']; ?></li>
      <li><span>微信号码：</span><?php echo $this->_data['company_info']['company_link_weixin']; ?></li>
    </ul>
    <div class="am-u-lg-1">
      <button class="am-btn ubtn-search ubtn-green cedit" data-am-modal="{target:'#usystem_companym2'}">
        <i class="iconfont icon-bianji1"></i>
        完善资料
      </button>
    </div>
  </div>
</div>
<!-- 修改手机号弹出框 -->
<div id="usystem_companym1" class="am-modal" tabindex="-1">
  <div class="am-modal-dialog umodal">
    <div class="am-modal-hd uhead">修改绑定手机号
      <a href="javascript:void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd">
      <form class="am-form am-form-horizontal">
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">原手机号：</label>
          <div class="umodal-text" style="font-weight:bold;font-size:16px;">
            <?php echo $this->_data['company_info']['company_phone']; ?>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">验证码：</label>
          <div class="umodal-valid">
            <input id="" class="am-form-field uinput uinput-max" type="text" placeholder="">
          </div>
          <div class="umodal-search">
            <button type="button" class="am-btn ubtn-search2 ubtn-green">
              获取验证码
            </button>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">新手机号：</label>
          <div class="umodal-normal">
            <input id="" class="am-form-field uinput uinput-max" type="text" placeholder="">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">验证码：</label>
          <div class="umodal-valid">
            <input id="" class="am-form-field uinput uinput-max" type="text" placeholder="">
          </div>
          <div class="umodal-search">
            <button type="button" class="am-btn ubtn-search2 ubtn-green">
              获取验证码
            </button>
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
<!-- 完善资料弹出框 -->
<div id="usystem_companym2" class="am-modal" tabindex="-1">
  <div class="am-modal-dialog umodal">
    <div class="am-modal-hd uhead">完善资料
      <a href="javascript:void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd">
      <form class="am-form am-form-horizontal" id="cform1">
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">所属行业：</label>
          <div class="umodal-text">
            <?php echo $this->_data['company_info']['company_info_xingzhi']; ?>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">企业名称：</label>
          <div class="umodal-text">
            <?php echo $this->_data['company_info']['company_name']; ?>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">证件号码：</label>
          <div class="umodal-normal">
            <input name="identity" type="text" class="am-form-field uinput uinput-max" value="<?php echo $this->_data['company_info']['company_identity_info']; ?>">
          </div>
          <div class="umodal-text gtext-green">
            （营业执照/身份证号码，提交完成后不能修改，请正确填写）
          </div>
        </div>
        <div class="am-form-group am-form-file">
          <label class="umodal-label am-form-label" for="">证件上传：</label>
          <div class="umodal-normal">
            <button type="button" class="am-btn am-btn-default am-btn-sm" style="width:100%;">
              <i class="am-icon-cloud-upload"></i> 选择要上传的文件</button>
            <input type="file" name="photo" id="cfile" multiple>
            <div class="cfilename"></div>
          </div>
          <div class="umodal-text gtext-green">
            （营业执照/身份证照片，提交完成后不能修改，请正确填写）
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">所属区域：</label>
          <div class="umodal-short" style="margin-right: 20px;">
            <select name="province" class="uselect uselect-max cprovince" data-am-selected>
              <?php foreach($this->_data['province'] as $row){?>
              <option value="<?php echo $row['region_id'];?>" <?php if($row['region_id']==$this->_data['company_info']['company_area_sheng']) echo "selected"?>><?php echo $row['region_name'];?></option>
              <? }?>
            </select>
          </div>
          <div class="umodal-short">
            <select name="city" class="uselect uselect-max ccity" data-am-selected>
            </select>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">企业地址：</label>
          <div class="umodal-max">
            <input name="address" class="am-form-field uinput uinput-max" type="text" placeholder="" value="<?php echo $this->_data['company_info']['company_area_address']; ?>">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">行业规模：</label>
          <div class="umodal-short">
            <select name="guimo" class="uselect uselect-max" data-am-selected>
            <?php foreach($GLOBALS['gconfig']['system']['guimo'] as $key => $row){?>
              <option value="<?php echo $key;?>" <?php if($key==$this->_data['company_info']['company_info_guimo']) echo "selected"?>><?php echo $row;?></option>
            <?php }?>
            </select>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">联系人：</label>
          <div class="umodal-normal">
            <input name="name" class="am-form-field uinput uinput-max" type="text" placeholder="" value="<?php echo $this->_data['company_info']['company_link_name']; ?>">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">微信号码：</label>
          <div class="umodal-normal">
            <input name="weixin" class="am-form-field uinput uinput-max" type="text" placeholder="请输入您的微信号码" value="<?php echo $this->_data['company_info']['company_link_weixin']; ?>">
          </div>
        </div>
        <input type="hidden" name="company_id" class="ccompany_id" value="<?php echo $this->_data['company_info']['company_id'];?>">
      </form>
    </div>
    <div class="am-modal-footer ufoot">
      <div class="am-btn-group">
        <button type="button" class="am-btn ubtn-sure ubtn-green ccommit"><i class="iconfont icon-yuanxingxuanzhong"></i>
          完成
        </button>
      </div>
    </div>
  </div>
</div>
<script src="../js/jquery.min.js"></script>
<script src="../js/amazeui.min.js"></script>
<script src="../js/ajaxfileupload.js"></script>
<script type="text/javascript">
$(function(){
  // var province = $('.cprovince').val();
  getCity();
  $('.cprovince').on('change', getCity);

  $('#usystem_companym2').on('close.modal.amui', function(){
    // $('.cprovince').selected('destroy');
    // $('.cprovince').val(province);
    // $('.cprovince').selected();
    // getCity();
    window.location.reload();
  });
  $('.ccommit').on('click', function(){
    $(this).attr('disabled',true);
    var company_id = $('.ccompany_id').val();
    var url="system_company_do.php";
    var data = $("#cform1").serialize();
    $.ajax({
      url:url,
      data:data,
      type:"POST",
    }).then(function(res){
      if(res=='0'){
        $.ajaxFileUpload ({
          url:'company_upload_do.php', //你处理上传文件的服务端
          secureuri:false, //与页面处理代码中file相对应的ID值
          fileElementId:'cfile',
          data:{id:company_id},
          dataType: 'text', //返回数据类型:text，xml，json，html,scritp,jsonp五种
          success: function (res) {
            // console.log(data);
            $('.ccommit').attr('disabled',false);
            if(res == '0'){
              window.location.reload();
            }else{
             alert('上传失败')
              return false;
            }
          }
        });
      }else{
        alert("修改失败");
        $('.ccommit').attr('disabled',false);
        return false;
      }
    });
  });
  
  function getCity(){
    $('.ccity').find('option').remove();
    $.ajax({
      url:'city_ajax.php',
      data:{
        province_id:$('.cprovince').val()
      },
      type:"get",
      dataType:"json"
    }).then(function(res){
      var items = '';
      if(res){
        $.each(res, function(k,v){
          items = '<option value="'+v.region_id+'">'+v.region_name+'</option>';
          $('.ccity').append(items);
        })
      }
    }).then(function(){
      $('.ccity').val(<?php echo $this->_data['company_info']['company_area_shi'];?>);
      $('.ccity').selected();
    })
  }
  // 上传文件
  $('#cfile').on('change', function() {
    var fileNames = '';
    $.each(this.files, function() {
      fileNames += '<span class="am-badge">' + this.name + '</span> ';
    });
    $('.cfilename').html(fileNames);
  });
});
</script>
</body>
</html>