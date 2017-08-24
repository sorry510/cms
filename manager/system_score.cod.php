<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>
<!-- content -->
<div class="gcontent" id="system_score">
  <ul class="am-nav am-nav-pills ubread">
    <li class="am-active"><a href="javascript: void(0);">积分换礼</a></li>
    <li><a href="system_score_gift.php">礼品设置</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="utools">
    <form class="am-form-inline uform2">
      <div class="am-form-group">
        <label for="doc-ipt-3" class="am-form-label">分店：</label>
        <select class="uselect uselect-auto" data-am-selected name="shop_id">
          <option value="0">全部</option>
          <?php foreach($this->_data['shop_list'] as $row) { ?>
            <option value="<?php echo $row['shop_id']; ?>" <?php if($row['shop_id'] == $this->_data['request']['shop_id']){
            echo "selected" ;}?> ><?php echo $row['shop_name']; ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="am-form-group">
        日期：
        <div class="am-input-group am-datepicker-date udatepicker udatepicker140" data-am-datepicker="{format: 'yyyy-mm-dd'}">
          <input type="text" class="am-form-field" name="from" value="<?php echo $this->_data['request']['from']?>">
          <span class="am-input-group-btn am-datepicker-add-on">
            <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span>
            </button>
          </span>
        </div>  
      </div>
      <div class="am-form-group">    
        至：
        <div class="am-input-group am-datepicker-date udatepicker udatepicker140" data-am-datepicker="{format: 'yyyy-mm-dd'}">
          <input type="text" class="am-form-field" name="to" value="<?php echo $this->_data['request']['to']?>">
          <span class="am-input-group-btn am-datepicker-add-on">
            <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span> </button>
          </span>
        </div>   
      </div>
      <div class="am-form-group">
        搜索：
        <input type="text" class="am-form-field uinput uinput140" placeholder="卡号/手机号/姓名" name="search" value="<?php echo $this->_data['request']['search']?>">
      </div>
      <div class="am-form-group search">
        <button type="submit" class="am-btn ubtn-search">
          <i class="iconfont icon-search"></i>查询
        </button>
      </div>
    </form>
  </div>
  <div class="gspace15"></div>
  <table class="am-table am-table-bordered am-table-hover am-table-compact utable1">
    <thead>
      <tr>
        <td>日期</td>
        <td>会员卡号</td>
        <td>卡类型</td>
        <td>兑换内容</td>
        <td>兑换积分</td>
      </tr>
    </thead>
    <tbody>
    <?php foreach($this->_data['gift_record_list']['list'] as $row){?>
      <tr>
        <td><?php echo date("Y-m-d H:i",$row['gift_record_atime']);?></td>
        <td><?php echo $row['c_card_code'];?></td>
        <td><?php echo $row['c_card_type_name'];?></td>
        <td><?php echo $row['gift_goods'];?></td>
        <td><?php echo $row['gift_score'];?></td>
      </tr>
    <?php }?>
    </tbody>
  </table>
  <?php pageHtml($this->_data['gift_record_list'],$this->_data['request'],'system_score.php');?>
</div>


<!-- 礼品兑换弹出框 -->
<div id="usystem_scorem1" class="am-modal" tabindex="-1">
  <div class="am-modal-dialog umodal umodal-simple">
    <div class="am-modal-hd uhead">礼品兑换
      <a href="javascript:void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd">
      <form class="am-form am-form-horizontal">
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">搜索：</label>
          <div class="umodal-normal">
            <input class="am-form-field uinput uinput-max csearch" type="text" placeholder="卡号/姓名/手机号">
          </div>
          <div class="umodal-search">
              <button type="button" class="am-btn ubtn-search2 ubtn-green ccard_search">
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
          <div class="umodal-text ccard_code" style="width:200px;">&nbsp;</div>
          <label class="umodal-label am-form-label" for="">会员姓名：</label>
          <div class="umodal-text ccard_name">&nbsp;</div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">手机号码：</label>
          <div class="umodal-text ccard_phone" style="width:200px;">&nbsp;</div>
          <label class="umodal-label am-form-label" for="">积分：</label>
          <div class="umodal-text ccard_yscore">&nbsp;</div>
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
            <?php foreach($this->_data['gift_list'] as $row){?>
              <tr>
                <td>        
                  <label class="am-checkbox-inline" style="margin:0px;">
                    <input type="checkbox" class="ccheck" value="111" data-am-ucheck>&nbsp;
                  </label>
                </td>
                <td><?php echo $row['gift_name'];?></td>
                <td><?php echo $row['gift_score'];?></td>
                <td>
                  <a href="javascript:;" class="ufont1 cbtndec"><i class="am-icon-minus"></i></a>
                  <input type="text" score="<?php echo $row['gift_score'];?>" gift_id="<?php echo $row['gift_id'];?>" gift_name="<?php echo $row['gift_name'];?>" class="uinputmin1 cnum" value="1">
                  <a href="javascript:;" class="ufont1 cbtnplus"><i class="am-icon-plus" aria-hidden="true"></i></a>
                </td>
              </tr>
            <?php }?>
            </tbody>
          </table>
        </div>
        <input type="hidden" class="ccard_id">
      </form>
    </div>
    <div class="am-modal-footer ufoot">
      <div class="am-btn-group ubtn-left">
        <div style="line-height:40px;">累计扣除积分：<span class="gtext-orange call_score">0</span>分，&nbsp;&nbsp;剩余积分：<span class="gtext-orange ccard_yscore_now">0</span>分</div>
      </div>
      <div class="am-btn-group">
        <button type="button" class="am-btn ubtn-sure ubtn-green caddsubmit"><i class="iconfont icon-yuanxingxuanzhong"></i>
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
<?php pageJs($this->_data['gift_record_list'],$this->_data['request'],'system_score.php');?>
</script>
</body>
</html>
