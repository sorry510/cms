<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>

<!-- content -->
<div id="ugoods_package" class="gcontent">
  <ul class="am-nav am-nav-pills ubread">
    <li class="am-active"><a href="javascript: void(0)">计次卡套餐</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="utools">
    <form class="am-form-inline uform2">
      <div class="am-form-group">
        <label for="doc-ipt-3" class="am-form-label">套餐：</label>
        <input type="text" class="am-form-field uinput uinput-220" placeholder="名称/简拼/编码" value="<?php echo $this->_data['request']['search']?>" name="search">
      </div>
      <div class="am-form-group">
        <button type="submit" class="am-btn ubtn-search">
          <i class="iconfont icon-search"></i>查询
        </button>
      </div>
    </form> 
    <button class="am-btn ubtn-sure ubtn-blue" data-am-modal="{target: '#umcombo_numberm1'}">
      <i class="iconfont icon-xinzeng"></i>
      新增套餐
    </button>
  </div>
  <div class="gspace15"></div>
  <table class="am-table am-table-bordered am-table-hover am-table-compact utable1 utable1-fixed" id="doc-modal-list">
    <thead>
      <tr>
        <td width="15%">套餐名称</td>
        <td>编码</td>
        <td>价格</td>
        <td>会员价格</td>
        <td>到期时间</td>
        <td>参与预约</td>
        <td>状态</td>
        <td width="18%">操作</td>
      </tr>
    </thead>
    <?php foreach($this->_data['mcombo_number_list']['list'] as $row) { ?>
    <tr>
      <td class="gtext-overflow" title="<?php echo $row['mcombo_name']; ?>"><a href="#" class="coffopen" mcombo_id="<?php echo $row['mcombo_id'];?>"><?php echo $row['mcombo_name']; ?></a></td>
      <td><?php echo $row['mcombo_code']; ?></td>
      <td class="gtext-orange"><?php echo $row['mcombo_price']; ?></td>
      <td class="gtext-orange"><?php echo $row['mcombo_cprice']==0?'--':$row['mcombo_cprice']; ?></td>
      <td class="gtext-green"><?php echo $row['mcombo_limit_type'] == '2'?$row['mcombo_limit_days'].'天':($row['mcombo_limit_type'] == '3'?$row['mcombo_limit_months'].'个月':'不限期') ?></td>
      <td class="<?php echo $row['mcombo_act']=='1'?'gtext-green':'gtext-orange';?>"><?php echo $row['mcombo_act']=='1'?'√':'x';?></td>
      <td class="<?php echo $row['mcombo_state']=='1'?'gtext-green':'gtext-orange';?>"><?php echo $row['mcombo_state']=='1'?'正常':'停用';?></td>
      <td>
        <button class="am-btn ubtn-table ubtn-green cupdate" value="<?php echo $row['mcombo_id']; ?>" data-am-modal="{target: '#umcombo_numberm2'}">
          <i class="iconfont icon-bianji"></i>
          修改
        </button>
        &nbsp;
        <button class="am-btn ubtn-table ubtn-gray cdel" value="<?php echo $row["mcombo_id"] ?>">
          <i class="iconfont icon-shanchu"></i>
          删除
        </button>
        &nbsp;
        <?php if($row['mcombo_state'] == 1){
            echo '<button class="am-btn ubtn-table ubtn-orange cmcombo_state" value="'.$row["mcombo_id"].'">
                      <i class="iconfont icon-tingyong"></i>
                      停用
                    </button>';
            }else if($row['mcombo_state'] == 2){
              echo '<button class="am-btn ubtn-table ubtn-blue cmcombo_state2" value="'.$row["mcombo_id"].'">
                      <i class="iconfont icon-question"></i>
                      启用
                    </button>';
            }
        ?>
        <input type="hidden" name="mcombo_state" value="<?php echo $row['mcombo_state']; ?>">
      </td>
    </tr>
    <?php } ?>
  </table>
  <?php pageHtml($this->_data['mcombo_number_list'],$this->_data['request'],'mcombo_number.php');?>
</div>

<!--新增套餐-->
<div class="am-modal" tabindex="-1" id="umcombo_numberm1">
  <div class="am-modal-dialog umodal umodal-simple">
    <div class="am-modal-hd uhead">新增套餐
      <a href="javascript:void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd umain1">
      <form class="am-form am-form-horizontal">
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for=""><span class="gtext-orange">*</span>套餐名称：</label>
          <div class="umodal-normal">
            <input type="text" name="mcombo_name" id="cgoodsname" class="am-form-field uinput uinput-max cvalid" onKeyUp="query()" required>
          </div>
          <div class="umodal-text" style="text-indent:2em;">简拼：</div>
          <div class="umodal-valid">
            <input type="text" name="mcombo_jianpin" id="cupen" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">编码：</label>
          <div class="umodal-normal">
            <input type="text" name="mcombo_code" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for=""><span class="gtext-orange">*</span>价格：</label>
          <div class="umodal-normal">
            <input type="text" name="mcombo_price" class="am-form-field uinput uinput-max cvalid">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">会员价：</label>
          <div class="umodal-normal">
            <input type="text" name="mcombo_cprice" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">有效期：</label>
          <div class="umodal-label">
            <input type="text" name="mcombo_limit_cont" class="am-form-field uinput uinput-max">
          </div>
          <div class="umodal-normal am-text-left">
            <label class="am-radio-inline">
              <input type="radio" name="mcombo_limit_type" value="1" data-am-ucheck checked> 不限制
            </label>
            <label class="am-radio-inline">
              <input type="radio" name="mcombo_limit_type" value="2" data-am-ucheck> 天
            </label>
            <label class="am-radio-inline">
              <input type="radio" name="mcombo_limit_type" value="3" data-am-ucheck> 月
            </label>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">参与预约：</label>
          <div class="umodal-normal am-text-left">
            <label class="am-radio-inline">
              <input type="radio" name="mcombo_act" value="1" data-am-ucheck checked> 参与
            </label>
            <label class="am-radio-inline">
              <input type="radio" name="mcombo_act" value="2" data-am-ucheck> 不参与
            </label>
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

<!-- 修改套餐 -->
<div class="am-modal" tabindex="-1" id="umcombo_numberm2">
  <div class="am-modal-dialog umodal umodal-simple">
    <div class="am-modal-hd uhead">修改套餐
      <a href="javascript:void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd umain1">
      <form class="am-form am-form-horizontal">
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for=""><span class="gtext-orange">*</span>套餐名称：</label>
          <div class="umodal-normal">
            <input type="text" id="cgoodsname2" name="mcombo_name" class="am-form-field uinput uinput-max cvalid" onKeyUp="query2()" required>
          </div>
          <div class="umodal-text" style="text-indent:2em;">简拼：</div>
          <div class="umodal-valid">
            <input type="text" id="cupen2" name="mcombo_jianpin" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">编码：</label>
          <div class="umodal-normal">
            <input type="text" name="mcombo_code" class="am-form-field uinput uinput-max">
            <input type="hidden" name="mcombo_code_old" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for=""><span class="gtext-orange">*</span>价格：</label>
          <div class="umodal-normal">
            <input type="text" name="mcombo_price" class="am-form-field uinput uinput-max cvalid">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">会员价：</label>
          <div class="umodal-normal">
            <input type="text" name="mcombo_cprice" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">有效期：</label>
          <div class="umodal-label">
            <input type="text" name="mcombo_limit_cont" class="am-form-field uinput uinput-max">
          </div>
          <div class="umodal-normal am-text-left">
            <label class="am-radio-inline">
              <input type="radio" name="mcombo_limit_type" value="1" data-am-ucheck checked> 不限制
            </label>
            <label class="am-radio-inline">
              <input type="radio" name="mcombo_limit_type" value="2" data-am-ucheck> 天
            </label>
            <label class="am-radio-inline">
              <input type="radio" name="mcombo_limit_type" value="3" data-am-ucheck> 月
            </label>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">参与预约：</label>
          <div class="umodal-normal am-text-left">
            <label class="am-radio-inline">
              <input type="radio" name="mcombo_act" value="2" data-am-ucheck> 参与
            </label>
            <label class="am-radio-inline">
              <input type="radio" name="mcombo_act" value="1" data-am-ucheck> 不参与
            </label>
          </div>
        </div>
        <input type="hidden" name="mcombo_id">
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
<div id="umcombo_numberm3" class="am-modal" tabindex="-1" style="min-height:291px;">
  <div class="am-modal-dialog umodal">
    <div class="am-modal-hd uhead">新增套餐
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
              <form id="form3">
              <div class="ub1">
                <select class="uselect2 uselect-max cmgoods_catalog" name="mgoods_catalog_id" data-am-selected>
                  <option value="0">全部</option>
                  <?php foreach($this->_data['mgoods_catalog_list'] as $row) { ?>
                  <option value="<?php echo $row['mgoods_catalog_id'] ?>"><?php echo $row['mgoods_catalog_name'] ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="ub1">
                <input id="" name="mgoods_search" class="am-form-field uinput2 uinput2-max cmgoods_search" type="text" placeholder="名称/简拼/编码">
              </div>
              <div class="ub2">
                <button type="button" class="am-btn ubtn-search3 ubtn-green cadd-form3">
                  <i class="iconfont icon-search"></i>
                  查询
                </button>
              </div>
            </form>
            </div>
            <ul class="uc">
            <?php foreach($this->_data['mgoods_list'] as $row){ ?>
              <li class="uc1" mgoods_catalog_id="<?php echo $row['mgoods_catalog_id']; ?>"><?php echo $row['mgoods_catalog_name']; ?></li>
              <?php foreach($row['mgoods'] as $cont){ ?>
              <li class="uc2" mgoods_id = "<?php echo $cont['mgoods_id'];?>">
                <div class="uc2a"><?php echo $cont['mgoods_name'];?>（<?php echo $cont['mgoods_price'];?>元）</div>
                <div class="uc2b cadd" ctype="add" mgoods_id="<?php echo $cont['mgoods_id']; ?>"><a href="#">添加</a></div>
              </li>
              <?php } ?>
            <?php } ?>
            </ul>
          </div>
          <div class="am-tab-panel am-fade" id="tab2" style="min-height:414px;">
            <div class="gspace50"></div>
            <div class="gspace50"></div>
            <div>
              <div class="umodal-normal" style="width:180px; margin:0px 5% 0px 15%;">
                <input id="" class="am-form-field uinput uinput-max cmgoods_code" type="text" placeholder="条码枪扫码或手动输入">
              </div>           
              <button type="button" ctype="add" class="am-btn ubtn-search2 ubtn-green usearch cmcombo_goods_add" style="width:80px;">
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
      <div style="clear:both"></div>
    </div>         
    <div class="am-modal-footer ufoot">
      <div class="am-btn-group ubtn-left">
        <button type="button" class="am-btn ubtn-sure ubtn-green cmodelopen2"><i class="iconfont icon-xiangyou2"></i>
          上一步
        </button>
      </div>
      <div class="am-btn-group">
        <button type="button" class="am-btn ubtn-sure ubtn-green cadd-mcombo"><i class="iconfont icon-yuanxingxuanzhong"></i>
          完成
        </button>
      </div>
    </div>
  </div>
</div>

<!-- 修改套餐2 -->
<div id="umcombo_numberm4" class="am-modal" tabindex="-1" style="min-height:291px;">
  <div class="am-modal-dialog umodal">
    <div class="am-modal-hd uhead">修改套餐
      <a href="javascript:void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd umain1">
      <div class="am-tabs uleft" data-am-tabs="{noSwipe: 1}">
        <ul class="am-tabs-nav am-nav am-nav-tabs">
          <li class="am-active"><a href="#tab1">可选套餐商品</a></li>
          <li><a href="#tab2">扫码添加商品</a></li>
        </ul>

        <div class="am-tabs-bd">
          <div class="am-tab-panel am-active" id="tab1">
            <div class="ua"><span class="ua1">分类/名称</span><span class="ua2">操作</span></div>
            <div class="am-form-group ub">
            <form action="" id="form4">
              <div class="ub1">
                <select class="uselect2 uselect-max cmgoods_catalog" name="mgoods_catalog_id" data-am-selected>
                  <option value="0">全部</option>
                  <?php foreach($this->_data['mgoods_catalog_list'] as $row) { ?>
                  <option value="<?php echo $row['mgoods_catalog_id'] ?>"><?php echo $row['mgoods_catalog_name'] ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="ub1">
                <input id="" name="mgoods_search" class="am-form-field uinput2 uinput2-max cmgoods_search" type="text" placeholder="名称/简拼/编码">
              </div>
              <div class="ub2">
                <button type="button" class="am-btn ubtn-search3 ubtn-green cadd-form4">
                  <i class="iconfont icon-search"></i>
                  查询
                </button>
              </div>
            </form>
            </div>
            <ul class="uc">
            <?php foreach($this->_data['mgoods_list'] as $row){ ?>
              <li class="uc1" mgoods_catalog_id="<?php echo $row['mgoods_catalog_id']; ?>"><?php echo $row['mgoods_catalog_name']; ?></li>
              <?php foreach($row['mgoods'] as $cont){ ?>
              <li class="uc2" mgoods_id = "<?php echo $cont['mgoods_id'];?>">
                <div class="uc2a"><?php echo $cont['mgoods_name'];?>（<?php echo $cont['mgoods_price'];?>元）</div>
                <div class="uc2b cadd" ctype="edit" mgoods_id="<?php echo $cont['mgoods_id']; ?>"><a href="#">添加</a></div>
              </li>
              <?php } ?>
            <?php } ?>
            </ul>
          </div>
          <div class="am-tab-panel am-fade" id="tab2" style="min-height:414px;">
            <div class="gspace50"></div>
            <div class="gspace50"></div>
            <div>
              <div class="umodal-normal" style="width:180px; margin:0px 5% 0px 15%;">
                <input id="" class="am-form-field uinput uinput-max cmgoods_code" type="text" placeholder="条码枪扫码或手动输入">
              </div>
              <button type="button" ctype="edit" class="am-btn ubtn-search2 ubtn-green usearch cmcombo_goods_add" style="width:80px;">
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
      <div style="clear:both"></div>
    </div>
    <div class="am-modal-footer ufoot">
      <div class="am-btn-group ubtn-left">
        <button type="button" class="am-btn ubtn-sure ubtn-green cmodelopen4"><i class="iconfont icon-xiangyou2"></i>
          上一步
        </button>
      </div>
      <div class="am-btn-group">
        <button type="button" class="am-btn ubtn-sure ubtn-green ceditor-mcombo"><i class="iconfont icon-yuanxingxuanzhong"></i>
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
<!-- 停用框 -->
<div id="cconfirm2" class="am-modal am-modal-confirm" tabindex="-1">
  <div class="am-modal-dialog uconfirm">
    <div class="am-modal-hd uhead"><b>确&nbsp;&nbsp;&nbsp;&nbsp;认&nbsp;&nbsp;&nbsp;&nbsp;提&nbsp;&nbsp;&nbsp;&nbsp;醒</b></div>
    <div class="am-modal-bd">
      你确定要停用吗？
    </div>
    <div class="am-modal-footer">
      <span class="am-modal-btn" data-am-modal-cancel>取消</span>
      <span class="am-modal-btn" data-am-modal-confirm>确定</span>
    </div>
  </div>
</div>
<!-- 启用框 -->
<div id="cconfirm3" class="am-modal am-modal-confirm" tabindex="-1">
  <div class="am-modal-dialog uconfirm">
    <div class="am-modal-hd uhead"><b>确&nbsp;&nbsp;&nbsp;&nbsp;认&nbsp;&nbsp;&nbsp;&nbsp;提&nbsp;&nbsp;&nbsp;&nbsp;醒</b></div>
    <div class="am-modal-bd">
      你确定要重新启用吗？
    </div>
    <div class="am-modal-footer">
      <span class="am-modal-btn" data-am-modal-cancel>取消</span>
      <span class="am-modal-btn" data-am-modal-confirm>确定</span>
    </div>
  </div>
</div>
<!-- 侧拉框 -->
<div id="uoffcanvas" class="am-offcanvas">
  <div class="am-offcanvas-bar am-offcanvas-bar-flip uoffcanvas">
    <div class="am-offcanvas-content" >
      <div class="am-modal-hd"><span class="utitle">套餐明细</span>
        <a href="javascript: void(0)" class="am-close am-close-spin doc-oc-js uclose2" data-rel="close"><img src="../img/close.jpg"></a>
      </div>
      <div class="gspace15"></div>
      <div class="am-g ucontent">
        <div class="am-u-lg-6">套餐名称：<span class="cmcombo_name"></span></div>
        <div class="am-u-lg-6">套餐编码：<span class="cmcombo_code"></span></div>
        <div class="am-u-lg-6">价格：<span class="cmcombo_price"></span></div>
        <div class="am-u-lg-6">会员价：<span class="cmcombo_cprice"></span></div>
        <div class="am-u-lg-6">有效期：<span class="cmcombo_edate"></div>
        <div class="am-u-lg-6">参与活动：<span class="cmcombo_act"></div>
        <div class="am-u-lg-6">状态：<span class="cmcombo_state"></span></div>
        <div class="am-u-lg-6">&nbsp;</div>
      </div>
    </div>
  </div>
</div>
<script src="../js/jquery.min.js"></script>
<script src="../js/pinying.js"></script>
<script src="../js/amazeui.min.js"></script>
<script type="text/javascript">
<?php pageJs($this->_data['mcombo_number_list'],$this->_data['request'],'mcombo_number.php');?>
// cvalid
$('.cvalid').on('input propertychange blur', function(){
  $(this).val()==''?$(this).addClass('am-field-error'):$(this).removeClass('am-field-error');
});

//删除
$('.cdel').on('click', function() {
  $('#cconfirm').modal({
    relatedTarget: this,
    onConfirm: function(options) {
      $.post('mcombo_delete_do.php',{'mcombo_id':$(this.relatedTarget).val()},function(res){
        // console.log(res);
        if(res=='0'){
          window.location.reload();
        }else{
          alert("删除失败");
        }
      });
    },
    onCancel: function() {
      return false;
    }
  });
});
//停用
$('.cmcombo_state').on('click',function(){
  $('#cconfirm2').modal({
    relatedTarget: this,
    onConfirm: function(options) {
      $.post('mcombo_state_do.php',{'mcombo_id':$(this.relatedTarget).val()},function(res){
        // console.log(res);
        if(res=='0'){
          window.location.reload();
        }else if(res=='1'){
          alert('修改失败');
        }
      });
    },
    onCancel: function() {
      return false;
    }
  });
});
//启用
$('.cmcombo_state2').on('click',function(){
  $('#cconfirm3').modal({
    relatedTarget: this,
    onConfirm: function(options) {
      $.post('mcombo_state_do.php',{'mcombo_id':$(this.relatedTarget).val()},function(res){
        // console.log(res);
        if(res=='0'){
          window.location.reload();
        }else if(res=='1'){
          alert('修改失败');
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
  // 验证变红
  $('#umcombo_numberm1 .cvalid').each(function(){
    if($(this).val()==''){
      $(this).addClass('am-field-error');
    }
  })
  // 验证返回
  if($('#umcombo_numberm1 .cvalid').hasClass("am-field-error")){
    return false;
  }
  $('#umcombo_numberm1').modal('close');
  $('#umcombo_numberm3').modal('open');
});
$('.cmodelopen3').on('click', function(e) {
  // 验证变红
  $('#umcombo_numberm2 .cvalid').each(function(){
    if($(this).val()==''){
      $(this).addClass('am-field-error');
    }
  })
  // 验证返回
  if($('#umcombo_numberm2 .cvalid').hasClass("am-field-error")){
    return false;
  }
  $('#umcombo_numberm2').modal('close');
  $('#umcombo_numberm4').modal('open');
});
//上一步
$('.cmodelopen2').on('click', function(e) {
  $('#umcombo_numberm3').modal('close');
  $('#umcombo_numberm1').modal('open');
});
$('.cmodelopen4').on('click', function(e) {
  $('#umcombo_numberm4').modal('close');
  $('#umcombo_numberm2').modal('open');
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

//根据文本框输入的汉字自动获取汉字拼音首字母到下拉列表中，支持多音字，需引入库pinying.js
function query(){
  $("#cupen").val(null);
  var str = $("#cgoodsname").val().trim();
  if(str == "") return;
  // console.log(str);
  var arrRslt = makePy(str);
  $("#cupen").val(arrRslt);
}
function query2(){
      $("#cupen2").val(null);
      var str = $("#cgoodsname2").val().trim();
      if(str == "") return;
      // console.log(str);
      var arrRslt = makePy(str);
      $("#cupen2").val(arrRslt);
}

//添加套餐弹出框中的查询按钮
$('.cadd-form3').on('click',function(){
  var mgoods_catalog_id = $("#umcombo_numberm3 .cmgoods_catalog").val();
  var mgoods_search = $("#umcombo_numberm3 .cmgoods_search").val();
  $("#umcombo_numberm3 .uleft .uc li").hide();
  $.ajax({
    type: "GET",
    url: "mcombo_ajax.php",
    data: {mgoods_catalog_id:mgoods_catalog_id,mgoods_search:mgoods_search}, 
    dataType:"json",
  }).then(function(res){   
    for(var i=0; i<res.length; i++){
      $("#umcombo_numberm3 .uleft .uc .uc1").each(function(){
        if($(this).attr('mgoods_catalog_id')  == res[i]['mgoods_catalog_id']){
          $(this).show();
        }
      });
      for(var j=0; j<res[i]['mgoods'].length; j++){
        $("#umcombo_numberm3 .uleft .uc .uc2").each(function(){
          if($(this).attr('mgoods_id')  == res[i]['mgoods'][j]['mgoods_id']){
            $(this).show();
          }
        });
      }
    }
  });
});

// 添加套餐商品
function add(){
  var product = $(this).prev().text();
  var mgoods_id = $(this).attr('mgoods_id');
  var type = $(this).attr('ctype');
  var flag = true;
  if(type=="add"){
    $('#umcombo_numberm3 .cnum').each(function(){
      if(mgoods_id== $(this).attr('mgoods_id')){
        flag = false;
      }
    });
  }else{
    $('#umcombo_numberm4 .cnum').each(function(){
      if(mgoods_id== $(this).attr('mgoods_id')){
        flag = false;
      }
    });
  }
  if(!flag){
    return false;//添加过了后面不在执行
  }
  var addhtml ='<li><div class="uc1">'+product+'</div><div class="uc2"><a href="javascript:;" class="uc2a cbtndec"><i class="am-icon-minus"></i></a><input type="text" class="uinput2 uinput-35 cnum" value="1" mgoods_id="' +mgoods_id +'"><a href="javascript:;" class=" uc2b cbtnplus"><i class="am-icon-plus"></i></a></div><div class="uc3 cdel2"><a href="javascript:;">移除</a></div></li>';
  if(type=="add"){
    $("#umcombo_numberm3 .uright .uc").append(addhtml);
  }else{
    $("#umcombo_numberm4 .uright .uc").append(addhtml);
  }
}
// 扫码添加套餐商品
function add2(){
  var mgoods_code = $(this).siblings().find('.cmgoods_code').val();
  var type = $(this).attr('ctype');
  var mgoods_id = 0;
  var mgoods_price = 0;
  var mgoods_name = '';
  var product = ''
  var flag = true;
  $.ajax({
    url:'mcombo_goods_add_ajax.php',
    data:{
      mgoods_code:mgoods_code
    },
    type:"GET",
    dataType:"json"
  }).then(function(res){
    // console.log(res);
    if(res){
      mgoods_id = res.mgoods_id;
      mgoods_price = res.mgoods_price;
      mgoods_name = res.mgoods_name;
      product = mgoods_name+'('+res.mgoods_price+'元)';
      if(type=="add"){
        $('#umcombo_numberm3 .cnum').each(function(){
          if(mgoods_id == $(this).attr('mgoods_id')){
            flag = false;
          }
        });
      }else{
        $('#umcombo_numberm4 .cnum').each(function(){
          if(mgoods_id == $(this).attr('mgoods_id')){
            flag = false;
          }
        });
      }
      if(!flag){
        return false;//添加过了后面不在执行
      }
      var addhtml ='<li><div class="uc1">'+product+'</div><div class="uc2"><a href="javascript:;" class="uc2a cbtndec"><i class="am-icon-minus"></i></a><input type="text" class="uinput2 uinput-35 cnum" value="1" mgoods_id="' +mgoods_id +'"><a href="javascript:;" class=" uc2b cbtnplus"><i class="am-icon-plus"></i></a></div><div class="uc3 cdel2"><a href="javascript:;">移除</a></div></li>';
      if(type=="add"){
        $("#umcombo_numberm3 .uright .uc").append(addhtml);
      }else{
        $("#umcombo_numberm4 .uright .uc").append(addhtml);
      }
    }
  });
}
$('.cadd').on('click',add);
//扫码添加商品
$('.cmcombo_goods_add').on('click',add2);
//添加套餐中的删除
$(document).on("click",".cdel2",function(){
  $(this).parent().remove();
});

//新增套餐提交按钮
$('.cadd-mcombo').on('click',function(){
  var url="mcombo_add_do.php";
  var arr= [];
  $("#umcombo_numberm3 .uright .cnum").each(function(k,v){
    var json = {'mgoods_id':$(this).attr('mgoods_id'),'number':$(this).val()};
    arr.push(json);
  });
  var mcombo_name = $("#umcombo_numberm1 input[name='mcombo_name']").val();
  var mcombo_jianpin = $("#umcombo_numberm1 input[name='mcombo_jianpin']").val();
  var mcombo_code = $("#umcombo_numberm1 input[name='mcombo_code']").val();
  var mcombo_price = $("#umcombo_numberm1 input[name='mcombo_price']").val();
  var mcombo_cprice = $("#umcombo_numberm1 input[name='mcombo_cprice']").val();
  var mcombo_limit_cont = $("#umcombo_numberm1 input[name='mcombo_limit_cont']").val();
  var mcombo_limit_type = $("#umcombo_numberm1 input[name='mcombo_limit_type']:checked").val();
  var mcombo_act = $("#umcombo_numberm1 input[name='mcombo_act']:checked").val();
  var data = {
        arr:arr,
        mcombo_name:mcombo_name,
        mcombo_jianpin:mcombo_jianpin,
        mcombo_code:mcombo_code,
        mcombo_price:mcombo_price,
        mcombo_cprice:mcombo_cprice,
        mcombo_limit_cont:mcombo_limit_cont,
        mcombo_limit_type:mcombo_limit_type,
        mcombo_act:mcombo_act,
        mcombo_type:1
      }
  $.post(url,data,function(res){
    // console.log(res);
    if(res=='0'){
      window.location.reload();
    }else if(res=='1'){
      alert('套餐价格和名称不能为空');
    }else if(res=='2'){
      alert('套餐编码不能重复');
      //console.log(res);
    }else{
      alert('添加套餐失败');
    }
  });
});

//修改套餐
$('.cupdate').on('click', function(e) {
  var mcombo_id = $(this).val();
  $("#umcombo_numberm4 .uright .uc li").remove();/*删除之前可能存在的套餐商品*/
  $.ajax({
    type: "GET",
    url: "mcombo_edit_ajax.php",
    data: {mcombo_id:mcombo_id}, 
    dataType:'json',
    success: function(msg){
      if(msg){
        $("#umcombo_numberm2 input[name='mcombo_name']").val(msg.mcombo_name);
        $("#umcombo_numberm2 input[name='mcombo_jianpin']").val(msg.mcombo_jianpin);
        $("#umcombo_numberm2 input[name='mcombo_code']").val(msg.mcombo_code);
        $("#umcombo_numberm2 input[name='mcombo_code_old']").val(msg.mcombo_code);
        $("#umcombo_numberm2 input[name='mcombo_price']").val(msg.mcombo_price);
        if(msg.mcombo_cprice!=0){
          $("#umcombo_numberm2 input[name='mcombo_cprice']").val(msg.mcombo_cprice);
        }else{
          $("#umcombo_numberm2 input[name='mcombo_cprice']").val('');
        }
        $("#umcombo_numberm2 input[name='mcombo_id']").val(msg.mcombo_id);
        if(msg.mcombo_limit_type == 1){
          $("#umcombo_numberm2 input[name='mcombo_limit_cont']").val(0);
        }else if(msg.mcombo_limit_type == 2){
          $("#umcombo_numberm2 input[name='mcombo_limit_cont']").val(msg.mcombo_limit_days);
        }else{
          $("#umcombo_numberm2 input[name='mcombo_limit_cont']").val(msg.mcombo_limit_months);
        }
        $("#umcombo_numberm2 input[name='mcombo_limit_type']").each(function(){
          if($(this).val() == msg.mcombo_limit_type){
            $(this).uCheck('check');
          }
        });
        $("#umcombo_numberm2 input[name='mcombo_act']").each(function(){
          if($(this).val() == msg.mcombo_act){
            $(this).uCheck('check');
          }
        });
        $.each(msg.mgoods, function (index,value) {
          var addhtml ='<li><div class="uc1">'+value.mgoods_name+'（'+value.mgoods_price+'元）</div><div class="uc2"><a href="javascript:;" class="uc2a cbtndec"><i class="am-icon-minus"></i></a><input type="text" mgoods_id="' +value.mgoods_id +'" class="uinput2 uinput-35 cnum" value="'+ value.mcombo_goods_count+'"><a href="javascript:;" class="uc2b cbtnplus"><i class="am-icon-plus"></i></a></div><div class="uc3 cdel2"><a href="javascript:;">移除</a></div></li>';
          $("#umcombo_numberm4 .uright .uc").append(addhtml);
        });
      }
    }
  });
});


//修改套餐弹出框中的查询
$('.cadd-form4').on('click',function(){
  var mgoods_catalog_id = $("#umcombo_numberm4 .cmgoods_catalog").val();
  var mgoods_search = $("#umcombo_numberm4 .cmgoods_search").val();
  $("#umcombo_numberm4 .uleft .uc li").hide();
  $.ajax({
    type: "GET",
    url: "mcombo_ajax.php",
    data: {mgoods_catalog_id:mgoods_catalog_id,mgoods_search:mgoods_search}, 
    dataType:"json",
  }).then(function(res){
    for(var i=0; i<res.length; i++){
      $("#umcombo_numberm4 .uleft .uc .uc1").each(function(){
        if($(this).attr('mgoods_catalog_id')  == res[i]['mgoods_catalog_id']){
          $(this).show();
        }
      });
      for(var j=0; j<res[i]['mgoods'].length; j++){
        //console.log(res[i]['mgoods'][j]['mgoods_name']);
        $("#umcombo_numberm4 .uleft .uc .uc2").each(function(){
          if($(this).attr('mgoods_id')  == res[i]['mgoods'][j]['mgoods_id']){
            $(this).show();
          }
        });
      }
    }
  });
});

//修改套餐提交按钮
$('.ceditor-mcombo').on('click',function(){
  var url="mcombo_edit_do.php";
  var arr= [];
  $("#umcombo_numberm4 .uright .cnum").each(function(k,v){
    var json = {'mgoods_id':$(this).attr('mgoods_id'),'number':$(this).val()};
    arr.push(json);
  });
  var mcombo_name = $("#umcombo_numberm2 input[name='mcombo_name']").val();
  var mcombo_jianpin = $("#umcombo_numberm2 input[name='mcombo_jianpin']").val();
  var mcombo_code = $("#umcombo_numberm2 input[name='mcombo_code']").val();
  var mcombo_code_old = $("#umcombo_numberm2 input[name='mcombo_code_old']").val();
  var mcombo_price = $("#umcombo_numberm2 input[name='mcombo_price']").val();
  var mcombo_cprice = $("#umcombo_numberm2 input[name='mcombo_cprice']").val();
  var mcombo_limit_cont = $("#umcombo_numberm2 input[name='mcombo_limit_cont']").val();
  var mcombo_limit_type = $("#umcombo_numberm2 input[name='mcombo_limit_type']:checked").val();
  var mcombo_act = $("#umcombo_numberm2 input[name='mcombo_act']:checked").val();
  var mcombo_id = $("#umcombo_numberm2 input[name='mcombo_id']").val();
  var data = {
        arr:arr,
        mcombo_name:mcombo_name,
        mcombo_jianpin:mcombo_jianpin,
        mcombo_code:mcombo_code,
        mcombo_code_old:mcombo_code_old,
        mcombo_price:mcombo_price,
        mcombo_cprice:mcombo_cprice,
        mcombo_limit_cont:mcombo_limit_cont,
        mcombo_limit_type:mcombo_limit_type,
        mcombo_act:mcombo_act,
        mcombo_id:mcombo_id,
        mcombo_type:1
      }
      // console.log(data);
      // return false;
  $.post(url,data,function(res){
    // console.log(res);
    if(res=='0'){
      window.location.reload();
    }else if(res==1){
      alert('编码不能相同');
    }else{
      alert('修改套餐失败');
      console.log(res);
    }
  });
});

//侧拉打开
$('.coffopen').on('click',function() {
  var url = "mcombo_detail_ajax.php";
  $('#uoffcanvas .crefundopen').val($(this).attr('mcombo_id'));
  $.getJSON(url,{mcombo_id:$(this).attr('mcombo_id')},function(res){
    // console.log(res);
    $("#uoffcanvas .cmcombo_name").text(res.mcombo_name);
    $("#uoffcanvas .cmcombo_code").text(res.mcombo_code);
    $("#uoffcanvas .cmcombo_price").text(res.mcombo_price);
    if(res.mcombo_cprice!=0){
      $("#uoffcanvas .cmcombo_cprice").text(res.mcombo_cprice);
    }else{
      $("#uoffcanvas .cmcombo_cprice").text('--');
    }
    switch(res.mcombo_limit_type)
    {
      case '1':
        $("#uoffcanvas .cmcombo_edate").text('不限期');
        break;
      case '2':
        $("#uoffcanvas .cmcombo_edate").text(res.mcombo_limit_days+'天');
        break;
      case '3':
        $("#uoffcanvas .cmcombo_edate").text(res.mcombo_limit_months+'个月');
        break;
      default :
        $("#uoffcanvas .cmcombo_edate").text('--');
    }
    switch(res.mcombo_act)
    {
      case '1':
        $("#uoffcanvas .cmcombo_act").text('参与');
        break;
      case '2':
        $("#uoffcanvas .cmcombo_act").text('不参与');
        break;
      default :
        $("#uoffcanvas .cmcombo_act").text('--');
    }
    switch(res.mcombo_state)
    {
      case '1':
        $("#uoffcanvas .cmcombo_state").text('正常');
        break;
      case '2':
        $("#uoffcanvas .cmcombo_state").text('停用');
        break;
      default :
        $("#uoffcanvas .cmcombo_state").text('--');
    }
    // 买套餐商品
    if(res.mgoods){
      var goods_head = '<p class="cjs"><strong>套餐商品清单</strong></p>';
      var table_head = '<table class="am-table am-table-bordered am-table-hover utable1 am-table-compact cjs" style="color:black;"><thead><tr><td>序号</td><td>名称</td><td>原价</td><td>数量</td></thead>';
      var table_body = '';
      $.each(res.mgoods,function(k,v){
          table_body = table_body+'<tr><td>'+(k+1)+'</td><td>'+v.mgoods_name+'</td><td>'+v.mgoods_price+'元</td><td>'+v.mcombo_goods_count+'</td></tr>';
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
})
</script>
</body>
</html>
