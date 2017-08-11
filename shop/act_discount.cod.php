<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>
<div id="uact_discount" class="gcontent">
  <ul class="am-nav am-nav-pills ubread">
    <li class="am-active"><a href="#">限时打折</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="utools">
    <form class="am-form-inline uform2">
      <div class="am-form-group">
          <label for="doc-ipt-3" class="am-form-label">活动名称：</label>
          <input type="text" value="<?php echo htmlspecialchars($this->_data['request']['act_name']); ?>" class="am-form-field uinput uinput-220" placeholder="" name="act_name">
      </div>
      <!-- <div class="am-form-group">
        <label for="doc-ipt-3" class="am-form-label">顾客类型：</label>
        <select class="uselect uselect-auto" data-am-selected name="client">
          <option value="0">全部</option>
          <option value="1" <?php if($this->_data['request']['client']=='1'){echo "selected='selected'";}  ;?> >不限</option>
          <option value="2" <?php if($this->_data['request']['client']=='2'){echo "selected='selected'";} ;?>>会员</option>
          <option value="3" <?php if($this->_data['request']['client']=='3'){echo "selected='selected'";} ;?>>非会员</option>
        </select>
      </div> -->
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
    <button class="am-btn ubtn-sure ubtn-blue" data-am-modal="{target:'#uact_discountm1'}">
      <i class="iconfont icon-xinzeng"></i>
      新增活动
    </button>
  </div>
  <div class="gspace15"></div>
  <table class="am-table am-table-bordered am-table-hover am-table-compact utable1">
    <thead>
      <tr>
        <td>新增时间</td>
        <td>活动名称</td>
        <td>顾客类型</td>
        <td>开始时间</td>
        <td>结束时间</td>
        <td>参加店铺</td>
        <td>状态</td>
        <td>备注</td>
        <td style="width:16%;">操作</td>
      </tr>
    </thead>
    <tbody>
      <?php foreach($this->_data['act_discount_list']['list'] as $row) { ?>
      <tr>
        <td><?php echo date('Y-m-d H:i',$row['act_discount_atime']) ; ?></td>
        <td><?php echo $row['act_discount_name']; ?></td>
        <td><?php echo $row['clienttype'] ;?></td>
        <td><?php echo date('Y-m-d',$row['act_discount_start']); ?></td>
        <td><?php echo date('Y-m-d',$row['act_discount_end']); ?></td>
        <td><?php echo $row['shoptype'] ;?></td>
        <td<?php
        if ($row['act_discount_state'] == 1) {
          if ($row['datstate'] == '进行中') {
            echo " class='gtext-green'>进行中";
          }elseif ($row['datstate'] == '未开始') {
             echo " class='gtext-orange'>未开始";
          }elseif ($row['datstate'] == '已结束') {
             echo " >已结束";
          }
        }else{ echo " class='gtext-orange'>停止"; }
          ;?></td>
        
        <td><?php echo $row['act_discount_memo']; ?></td>
        <td>
          <button <?php if ($row['datstate'] == '已结束') {
            echo "style='display:none'";
          } ;?> class="am-btn ubtn-table ubtn-green cedit" data-am-modal="{target: '#uact_discountm2'}" value="<?php echo $row['act_discount_id']; ?>">
            <i class="iconfont icon-bianji"></i>
            修改
          </button>
          <?php if ($row['datstate'] == '未开始') {
            echo "&nbsp;";
          } ;?>
          <button <?php if ($row['datstate'] == '已结束' || $row['datstate'] == '进行中') {
            echo "style='display:none'";
          } ;?> class="am-btn ubtn-table ubtn-gray cdel" value="<?php echo $row['act_discount_id']; ?>">
            <i class="iconfont icon-shanchu"></i>
            删除
          </button>
          <?php if ($row['datstate'] == '进行中') {
            echo "&nbsp;";
          } ;?>
          <button <?php if ($row['datstate'] == '已结束' || $row['datstate'] == '未开始') {
            echo "style='display:none'";
          } ;?> class="am-btn ubtn-table <?php if ($row['act_discount_state'] == 1) {
            echo " ubtn-red cstop";
          }else{echo " ubtn-green cstart";} ; ?> " value="<?php echo $row['act_discount_id']; ?>">
            <i class="iconfont icon-shanchu"></i>
            <?php if ($row['act_discount_state'] == 1) {
              echo "停止";
            }else{ echo "启用";} ;?>
          </button>
        </td>
      </tr>
    <?php } ?> 
    </tbody>
  </table>
  <ul class="am-pagination am-pagination-centered upages">
    <li class="upage-info">共<?php echo $this->_data['act_discount_list']['pagecount']; ?>页 <?php echo $this->_data['act_discount_list']['allcount']; ?>条记录</li>
    <li class="cfirst am-disabled"><a href="act_discount.php?<?php echo api_value_query($this->_data['request'], $this->_data['act_discount_list']['pagepre']); ?>">&laquo;</a></li>
    <li class="am-active"><a href="#"><?php echo $this->_data['act_discount_list']['pagenow'];?></a></li>
    <li class="clast"><a href="act_discount.php?<?php echo api_value_query($this->_data['request'], $this->_data['act_discount_list']['pagenext']); ?>">&raquo;</a></li>
    <li>，跳转到第 <input id="idpagego" class="am-form-field uinput" style="width:45px;height: 26px;vertical-align:bottom;line-height: 26px;" onkeydown="if(event.keyCode == 13){page_do();}"> 页</li>
  </ul>
</div>
<!-- 弹出框添加 -->
<div class="am-modal" tabindex="-1" id="uact_discountm1">
  <div class="am-modal-dialog umodal umodal-simple">
    <div class="am-modal-hd uhead">新增活动
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd umain1">
      <form class="am-form am-form-horizontal" id="cinfoadd">
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">活动名称：</label>
          <div class="umodal-normal">
            <input type="text" class="am-form-field uinput uinput-max" name="name">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">顾客类型：</label>
          <div class="umodal-normal am-text-left">
            <label class="am-radio-inline">
              <input type="radio" name="client" value="1" data-am-ucheck checked> 不限
            </label>
            <label class="am-radio-inline">
              <input type="radio" name="client" value="2" data-am-ucheck> 会员
            </label>
            <label class="am-radio-inline">
              <input type="radio" name="client" value="3" data-am-ucheck> 非会员
            </label>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">开始时间：</label>
          <div class="umodal-normal">
            <div class="am-input-group am-datepicker-date udatepicker udatepicker-max" data-am-datepicker="{format:'yyyy-mm-dd'}">
              <input type="text" class="am-form-field" name="start">
              <span class="am-input-group-btn am-datepicker-add-on">
                <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span></button>
              </span>
            </div>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">结束时间：</label>
          <div class="umodal-normal">
            <div class="am-input-group am-datepicker-date udatepicker udatepicker-max" data-am-datepicker="{format:'yyyy-mm-dd'}">
              <input type="text" class="am-form-field" name="end">
              <span class="am-input-group-btn am-datepicker-add-on">
                <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span></button>
              </span>
            </div>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">备注：</label>
          <div class="umodal-max">
            <textarea class="am-form-field utextarea utextarea-max" row="3" name="memo"></textarea>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">参加店铺：</label>
          <div class="umodal-max am-text-left">
            <label class="am-checkbox-inline">
              <input type="checkbox" name="shop" value="all" data-am-ucheck> 全部
            </label>
          <?php foreach($this->_data['shop'] as $row) { ?>
            <label class="am-checkbox-inline" style="margin-left: 0px;margin-right: 10px;" >
              <input type="checkbox" name="shop_id[]" value="<?php echo $row['shop_id']; ?>" data-am-ucheck> <?php echo $row['shop_name']; ?>
            </label>
          <?php } ?> 
          </div>
        </div>
      </form>
    </div>
    <div class="am-modal-footer ufoot">
      <div class="am-btn-group">
        <button type="button" class="am-btn ubtn-sure ubtn-green copenm3"><i class="iconfont icon-yuanxingxuanzhong"></i>
          下一步
        </button>
      </div>
    </div>
  </div>
</div>
<div class="am-modal" tabindex="-1" id="uact_discountm2">
  <div class="am-modal-dialog umodal umodal-simple">
    <div class="am-modal-hd uhead">修改活动
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd umain1">
      <form class="am-form am-form-horizontal" id="cinfoedit">
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">活动名称：</label>
          <div class="umodal-normal">
            <input type="hidden" class="am-form-field uinput uinput-max" name="id">
            <input type="text" class="am-form-field uinput uinput-max" name="name">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">顾客类型：</label>
          <div class="umodal-normal am-text-left">
            <label class="am-radio-inline">
              <input type="radio" name="client" value="1" data-am-ucheck> 不限
            </label>
            <label class="am-radio-inline">
              <input type="radio" name="client" value="2" data-am-ucheck> 会员
            </label>
            <label class="am-radio-inline">
              <input type="radio" name="client" value="3" data-am-ucheck> 非会员
            </label>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">开始时间：</label>
          <div class="umodal-normal">
            <div class="am-input-group am-datepicker-date udatepicker udatepicker-max" data-am-datepicker="{format:'yyyy-mm-dd'}">
              <input type="text" class="am-form-field" name="start">
              <span class="am-input-group-btn am-datepicker-add-on">
                <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span></button>
              </span>
            </div>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">结束时间：</label>
          <div class="umodal-normal">
            <div class="am-input-group am-datepicker-date udatepicker udatepicker-max" data-am-datepicker="{format:'yyyy-mm-dd'}">
              <input type="text" class="am-form-field" name="end">
              <span class="am-input-group-btn am-datepicker-add-on">
                <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span></button>
              </span>
            </div>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">备注：</label>
          <div class="umodal-max">
            <textarea class="am-form-field utextarea utextarea-max" row="3" name="memo"></textarea>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">参加店铺：</label>
          <div class="umodal-max am-text-left">
            <label class="am-checkbox-inline">
              <input type="checkbox" name="shop" value="all" data-am-ucheck> 全部
            </label>
          <?php foreach($this->_data['shop'] as $row) { ?>
            <label class="am-checkbox-inline" style="margin-left: 0px;margin-right: 10px;">
              <input type="checkbox" class="ccc" name="shop_id[]" value="<?php echo $row['shop_id']; ?>" data-am-ucheck> <?php echo $row['shop_name']; ?>
            </label>
          <?php } ?>
          </div>
        </div>
      </form>
    </div>
    <div class="am-modal-footer ufoot">
      <div class="am-btn-group">
        <button type="button" class="am-btn ubtn-sure ubtn-green copenm4 cedit2"><i class="iconfont icon-yuanxingxuanzhong"></i>
          下一步
        </button>
      </div>
    </div>
  </div>
</div>
<div class="am-modal" tabindex="-1" id="uact_discountm3">
  <div class="am-modal-dialog umodal">
    <div class="am-modal-hd uhead">折扣商品
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd umain1">
      <div class="am-tabs utabs" data-am-tabs="{noSwipe: 1}">
        <ul class="am-tabs-nav am-nav am-nav-tabs">
          <li class="am-active"><a href="#tab1">可选商品</a></li>
          <li><a href="#tab2">可选套餐</a></li>
        </ul>
        <div class="am-tabs-bd">
          <div class="am-tab-panel am-active" id="tab1">
            <ul class="am-list am-list-border utop">
              <li class="uheader"><span class="uspan1">分类/名称</span><span class="uspan2">活动</span></li>
              <li>
                <div class="am-form-group am-g">
                  <form action="">
                    <div class="umodal-short" style="padding-left:20px;">
                      <select class="uselect uselect-max" name="mgoods" data-am-selected>
                        <?php foreach($this->_data['mgoods_catalog'] as $row) { ?>
                          <option value="<?php echo $row['mgoods_catalog_id']; ?>"><?php echo $row['mgoods_catalog_name']; ?></option>
                        <?php } ?> 
                      </select>
                    </div>
                    <div class="umodal-text" style="padding-left:10px;">
                      <button type="button" class="am-btn ubtn-search2 ubtn-green csearchmgoods">
                        <i class="iconfont icon-search"></i>
                        查询
                      </button>
                    </div>
                    <div class="umodal-search" style="float:right;margin-right:25px;display:inline-block;">
                      <button type="button" class="am-btn ubtn-search2 ubtn-gray">
                        保存
                      </button>
                    </div>
                  </form>
                </div>
              </li>
            </ul>
            <form id="cinfoadd2">
            <ul class="am-list am-list-border ucont cmgoods">
            <?php foreach($this->_data['mgoods_catalog'] as $row) { ?>
              <li name="ha" mgoods_catalog_id="<?php echo $row['mgoods_catalog_id'] ;?>">
                <div class="am-form-group am-g">
                  <div class="am-u-lg-5 am-text-left utext1">
                    <?php echo $row['mgoods_catalog_name'] ;?>
                  </div>
                  <div class="am-u-lg-5 am-text-right">
                    <span class="utext3">&nbsp;&nbsp;&nbsp;折扣</span>
                    <input class="uinput uinput-60" type="text" name="allgoods_value<?php echo $row['mgoods_catalog_id'] ;?>">
                  </div>
                  <div class="am-u-lg-2">
                    <button type="button" name="" class="am-btn ubtn-search2 ubtn-gray allset1" mgoods_catalog_id="<?php echo $row['mgoods_catalog_id'] ;?>">批量设置</button>
                  </div>
                </div>
              </li>
              <?php foreach($this->_data['mgoods'] as $row2) { 
                 if ($row['mgoods_catalog_id'] == $row2['mgoods_catalog_id']) {
              ?>
              <li name="haha" mgoods_catalog_id="<?php echo $row2['mgoods_catalog_id'] ;?>">
                <div class="am-form-group am-g">
                  <div class="am-u-lg-5 am-text-left utext2"><?php echo $row2['mgoods_name']."(".$row2['mgoods_price']."元)" ;?></div>
                  <div class="am-u-lg-5 am-u-end am-text-right">
                    <span class="utext3">&nbsp;&nbsp;&nbsp;折扣</span>
                    <input mgoods_catalog_id="<?php echo $row['mgoods_catalog_id'] ;?>" mgoods_id="<?php echo $row2['mgoods_id'] ;?>" mgoods_price="<?php echo $row2['mgoods_price'] ;?>" class="uinput uinput-60" type="text" name="goods_value[]">
                    <span class="utext3">&nbsp;&nbsp;&nbsp;优惠价</span>
                    <input mgoods_catalog_id="<?php echo $row['mgoods_catalog_id'] ;?>" mgoods_price="<?php echo $row2['mgoods_price'] ;?>" mgoods_id="<?php echo $row2['mgoods_id'] ;?>" class="uinput uinput-60" type="text" name="goods_price[]">
                  </div>
                </div>
              </li>
              <?php }
              } ?>
            <?php } ?> 
            </ul>
          </div>
          <div class="am-tab-panel am-fade" id="tab2">
            <ul class="am-list am-list-border utop">
              <li class="uheader"><span class="uspan1">套餐/名称</span><span class="uspan2">活动</span></li>
              <li>
                <div class="am-form-group am-g">
                  <form action="">
                    <div class="umodal-short" style="padding-left:20px;">
                      <select class="uselect uselect-max" name="mcombo" data-am-selected>
                        <?php foreach($this->_data['mcombo'] as $row) { ?>
                          <option value="<?php echo $row['mcombo_id']; ?>"><?php echo $row['mcombo_name']; ?></option>
                        <?php } ?> 
                      </select>
                    </div>
                    <div class="umodal-text" style="padding-left:10px;">
                      <button type="button" class="am-btn ubtn-search2 ubtn-green csearchmcombo">
                        <i class="iconfont icon-search"></i>
                        查询
                      </button>
                    </div>
                    <div class="umodal-search" style="float:right;margin-right:25px;display:inline-block;">
                      <button type="button" class="am-btn ubtn-search2 ubtn-gray">
                        保存
                      </button>
                    </div>
                  </form>
                </div>
              </li>
            </ul>
            <ul class="am-list am-list-border ucont cmcombo">
              <li name="ha" >
                <div class="am-form-group am-g">
                  <div class="am-u-lg-5 am-text-left utext1">
                    套餐名称
                  </div>
                  <div class="am-u-lg-5 am-text-right">
                    <span class="utext3">&nbsp;&nbsp;&nbsp;折扣</span>
                    <input class="uinput uinput-60" type="text" name="allcombo_value">
                  </div>
                  <div class="am-u-lg-2">
                    <button type="button" class="am-btn ubtn-search2 ubtn-gray allset2">批量设置</button>
                  </div>
                </div>
              </li>
              <?php foreach($this->_data['mcombo'] as $row) { ?>
              <li name="haha" mcombo="<?php echo $row['mcombo_id'] ;?>">
                <div class="am-form-group am-g">
                  <div class="am-u-lg-5 am-text-left utext2"><?php echo $row['mcombo_name']."(".$row['mcombo_price']."元)" ;?></div>
                  <div class="am-u-lg-5 am-text-right">
                    <span class="utext3">&nbsp;&nbsp;&nbsp;折扣</span>
                    <input class="uinput uinput-60" mcombo_price="<?php echo $row['mcombo_price'] ;?>"  mcombo_id="<?php echo $row['mcombo_id'] ;?>" type="text" name="combo_value[]">
                    <span class="utext3">&nbsp;&nbsp;&nbsp;优惠价</span>
                    <input class="uinput uinput-60" mcombo_price="<?php echo $row['mcombo_price'] ;?>"  mcombo_id="<?php echo $row['mcombo_id'] ;?>" type="text" name="combo_price[]">
                  </div>
                  <div class="am-u-lg-2">

                  </div>
                </div>
              </li>
              <?php } ?> 
            </ul>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="am-modal-footer ufoot">
      <div class="am-btn-group ubtn-left">
        <button type="submit" class="am-btn ubtn-sure ubtn-green cmodalopen1"><i class="iconfont icon-xiangyou2"></i>
          上一步
        </button>
      </div>
      <div class="am-btn-group">
        <button type="submit" class="am-btn ubtn-sure ubtn-green csubmitadd"><i class="iconfont icon-yuanxingxuanzhong"></i>
          完成
        </button>
      </div>
    </div>
  </div>
</div>
<div class="am-modal" tabindex="-1" id="uact_discountm4">
  <div class="am-modal-dialog umodal">
    <div class="am-modal-hd uhead">折扣商品
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd umain1">
      <div class="am-tabs utabs" data-am-tabs="{noSwipe: 1}">
        <ul class="am-tabs-nav am-nav am-nav-tabs">
          <li class="am-active"><a href="#tab1">可选商品</a></li>
          <li><a href="#tab2">可选套餐</a></li>
        </ul>
        <div class="am-tabs-bd">
          <div class="am-tab-panel am-active" id="tab1">
            <ul class="am-list am-list-border utop">
              <li class="uheader"><span class="uspan1">分类/名称</span><span class="uspan2">活动</span></li>
              <li>
                <div class="am-form-group am-g">
                  <form action="">
                    <div class="umodal-short" style="padding-left:20px;">
                      <select class="uselect uselect-max" name="mgoods" data-am-selected>
                        <?php foreach($this->_data['mgoods_catalog'] as $row) { ?>
                          <option value="<?php echo $row['mgoods_catalog_id']; ?>"><?php echo $row['mgoods_catalog_name']; ?></option>
                        <?php } ?> 
                      </select>
                    </div>
                    <div class="umodal-text" style="padding-left:10px;">
                      <button type="button" class="am-btn ubtn-search2 ubtn-green csearchmgoods">
                        <i class="iconfont icon-search"></i>
                        查询
                      </button>
                    </div>
                    <div class="umodal-search" style="float:right;margin-right:25px;display:inline-block;">
                      <button type="button" class="am-btn ubtn-search2 ubtn-gray">
                        保存
                      </button>
                    </div>
                  </form>
                </div>
              </li>
            </ul>
            <form id="cinfoadd2">
            <ul class="am-list am-list-border ucont cmgoods">
            <?php foreach($this->_data['mgoods_catalog'] as $row) { ?>
              <li name="ha" mgoods_catalog_id="<?php echo $row['mgoods_catalog_id'] ;?>">
                <div class="am-form-group am-g">
                  <div class="am-u-lg-5 am-text-left utext1">
                    <?php echo $row['mgoods_catalog_name'] ;?>
                  </div>
                  <div class="am-u-lg-5 am-text-right">
                    <span class="utext3">&nbsp;&nbsp;&nbsp;折扣</span>
                    <input class="uinput uinput-60" type="text" name="allgoods_value<?php echo $row['mgoods_catalog_id'] ;?>">
                  </div>
                  <div class="am-u-lg-2">
                    <button type="button" name="" class="am-btn ubtn-search2 ubtn-gray allset1" mgoods_catalog_id="<?php echo $row['mgoods_catalog_id'] ;?>">批量设置</button>
                  </div>
                </div>
              </li>
              <?php foreach($this->_data['mgoods'] as $row2) { 
                 if ($row['mgoods_catalog_id'] == $row2['mgoods_catalog_id']) {
              ?>
              <li name="haha" mgoods_catalog_id="<?php echo $row2['mgoods_catalog_id'] ;?>">
                <div class="am-form-group am-g">
                  <div class="am-u-lg-5 am-text-left utext2"><?php echo $row2['mgoods_name']."(".$row2['mgoods_price']."元)" ;?></div>
                  <div class="am-u-lg-5 am-u-end am-text-right">
                    <span class="utext3">&nbsp;&nbsp;&nbsp;折扣</span>
                    <input mgoods_catalog_id="<?php echo $row['mgoods_catalog_id'] ;?>" mgoods_id="<?php echo $row2['mgoods_id'] ;?>" mgoods_price="<?php echo $row2['mgoods_price'] ;?>" class="uinput uinput-60" type="text" name="goods_value[]">
                    <span class="utext3">&nbsp;&nbsp;&nbsp;优惠价</span>
                    <input mgoods_catalog_id="<?php echo $row['mgoods_catalog_id'] ;?>" mgoods_price="<?php echo $row2['mgoods_price'] ;?>" mgoods_id="<?php echo $row2['mgoods_id'] ;?>" class="uinput uinput-60" type="text" name="goods_price[]">
                  </div>
                </div>
              </li>
              <?php }
              } ?>
            <?php } ?> 
            </ul>
          </div>
          <div class="am-tab-panel am-fade" id="tab2">
            <ul class="am-list am-list-border utop">
              <li class="uheader"><span class="uspan1">套餐/名称</span><span class="uspan2">活动</span></li>
              <li>
                <div class="am-form-group am-g">
                  <form action="">
                    <div class="umodal-short" style="padding-left:20px;">
                      <select class="uselect uselect-max" name="mcombo" data-am-selected>
                        <?php foreach($this->_data['mcombo'] as $row) { ?>
                          <option value="<?php echo $row['mcombo_id']; ?>"><?php echo $row['mcombo_name']; ?></option>
                        <?php } ?> 
                      </select>
                    </div>
                    <div class="umodal-text" style="padding-left:10px;">
                      <button type="button" class="am-btn ubtn-search2 ubtn-green csearchmcombo">
                        <i class="iconfont icon-search"></i>
                        查询
                      </button>
                    </div>
                    <div class="umodal-search" style="float:right;margin-right:25px;display:inline-block;">
                      <button type="button" class="am-btn ubtn-search2 ubtn-gray">
                        保存
                      </button>
                    </div>
                  </form>
                </div>
              </li>
            </ul>
            <ul class="am-list am-list-border ucont cmcombo">
              <li name="ha">
                <div class="am-form-group am-g">
                  <div class="am-u-lg-5 am-text-left utext1">
                    套餐名称
                  </div>
                  <div class="am-u-lg-5 am-text-right">
                    <span class="utext3">&nbsp;&nbsp;&nbsp;折扣</span>
                    <input class="uinput uinput-60" type="text" name="allcombo_value">
                  </div>
                  <div class="am-u-lg-2">
                    <button type="button" class="am-btn ubtn-search2 ubtn-gray allset2">批量设置</button>
                  </div>
                </div>
              </li>
              <?php foreach($this->_data['mcombo'] as $row) { ?>
              <li name="haha" mcombo="<?php echo $row['mcombo_id'] ;?>">
                <div class="am-form-group am-g">
                  <div class="am-u-lg-5 am-text-left utext2"><?php echo $row['mcombo_name']."(".$row['mcombo_price']."元)" ;?></div>
                  <div class="am-u-lg-5 am-text-right">
                    <span class="utext3">&nbsp;&nbsp;&nbsp;折扣</span>
                    <input class="uinput uinput-60" mcombo_price="<?php echo $row['mcombo_price'] ;?>"  mcombo_id="<?php echo $row['mcombo_id'] ;?>" type="text" name="combo_value[]">
                    <span class="utext3">&nbsp;&nbsp;&nbsp;优惠价</span>
                    <input class="uinput uinput-60" mcombo_price="<?php echo $row['mcombo_price'] ;?>"  mcombo_id="<?php echo $row['mcombo_id'] ;?>" type="text" name="combo_price[]">
                  </div>
                  <div class="am-u-lg-2">

                  </div>
                </div>
              </li>
              <?php } ?> 
            </ul>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="am-modal-footer ufoot">
      <div class="am-btn-group ubtn-left">
        <button type="submit" class="am-btn ubtn-sure ubtn-green cmodalopen2"><i class="iconfont icon-xiangyou2"></i>
          上一步
        </button>
      </div>
      <div class="am-btn-group">
        <button type="submit" class="am-btn ubtn-sure ubtn-green csubmitedit"><i class="iconfont icon-yuanxingxuanzhong"></i>
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
$('.copenm3').on('click', function() {
  $('#uact_discountm1').modal('close');
  $('#uact_discountm3').modal('open');
});
$('.cmodalopen1').on('click', function() {
  $('#uact_discountm3').modal('close');
  $('#uact_discountm1').modal('open');
});
$('.copenm4').on('click', function() {
  $('#uact_discountm2').modal('close');
  $('#uact_discountm4').modal('open');
});
$('.cmodalopen2').on('click', function() {
  $('#uact_discountm4').modal('close');
  $('#uact_discountm2').modal('open');
});
//分页首末页不可选中
if(<?php echo $this->_data['act_discount_list']['pagenow'];?>>1){
  $('.upages li.cfirst').removeClass('am-disabled');
}
if(<?php echo $this->_data['act_discount_list']['pagecount']-$this->_data['act_discount_list']['pagenow']; ?><1){
  $('.upages li.clast').addClass('am-disabled');
}

function page_do() {
  var intpage = parseInt(document.getElementById("idpagego").value);
  if(isNaN(intpage)) {
    alert("请输入正确的页码！");
  } else {
    window.location = "act_discount.php?<?php echo api_value_query($this->_data['request']); ?>&page=" + intpage;
  }
}
//删除操作JS
$(function() {
  $('.cdel').on('click', function() {
    $('#cconfirm').modal({
      relatedTarget: this,
      onConfirm: function(options) {
        var url="act_discount_delete_do.php";
        $.post(url,{'id':$(this.relatedTarget).val()},function(res){
          if(res=='0'){
            window.location.reload();
          }else if(res =='100'){
            alert('活动正在进行');
          }else if(res =='101'){
            alert('活动已经结束'); 
          }else{
            alert('删除失败');
            console.log(res);
          }
        });
      },
      onCancel: function() {
        return;
      }
    });
  });
});
//添加操作JS
$('.csubmitadd').on('click',function(){
    $('.csubmitadd').attr("disabled",true);
    var shop_id = [];
    $("#uact_discountm1 input[name='shop_id[]']:checked").each(function(){
      shop_id.push($(this).val());
    })
    var url="act_discount_add_do.php";
    var arr1 = [];
    var arr2 = [];
      $("#uact_discountm3 li[name='haha'] input[name='goods_value[]']").each(function(){
        if ($(this).val() != '' || $(this).siblings('input').val()) {
          var json = {'mgoods_catalog_id':$(this).attr('mgoods_catalog_id'),'mgoods_id':$(this).attr('mgoods_id'),'value':$(this).val(),'price':$(this).siblings('input').val()};
        arr1.push(json);
        }  
      });
      $("#uact_discountm3 li[name='haha'] input[name='combo_value[]']").each(function(){
        if ($(this).val() != '' || $(this).siblings('input').val()) {
          var json = {'mcombo_id':$(this).attr('mcombo_id'),'value':$(this).val(),'price':$(this).siblings('input').val()};
        arr2.push(json);
        } 
      });

    var name = $("#uact_discountm1 input[name='name']").val();
    var client = $("#uact_discountm1 input[name='client']:checked").val();
    var start = $("#uact_discountm1 input[name='start']").val();
    var end = $("#uact_discountm1 input[name='end']").val();
    var memo = $("#uact_discountm1 textarea[name='memo']").val();
    var data = {
        name:name,
        client:client,
        start:start,
        end:end,
        memo:memo,
        shop_id:shop_id,
        arr1:arr1,
        arr2:arr2
    }
    console.log(data);
    $.post(url,data,function(res){
      if(res=='0'){
        window.location.reload();
      }else if(res=='1'){
        alert('请完善数据');
        $('.csubmitadd').attr("disabled",false);
      }else{
        $('.csubmitadd').attr("disabled",false);
        alert('添加失败');
        console.log(res);
      }
    });
  });
//修改AJAX1 JS
$('.cedit').on('click',function(){
  $("#uact_discountm2 input[name='shop_id[]']").uCheck('uncheck')
    var url="act_discount_edit_ajax.php";
    var data = $(this).val();
    console.log(data);
    $.getJSON(url,{id:data},function(res){
      console.log(res);
      $("#uact_discountm2 input[name='id']").val(res[0].act_discount_id);
      $("#uact_discountm2 input[name='name']").val(res[0].act_discount_name);
      $("#uact_discountm2 input[name='client']").each(function(){
          if($(this).val()==res[0].act_discount_client){
            $(this).uCheck('check');
          }
        });
      if (res[0].act_discount_shop==1) {$("#uact_discountm2 input[name='shop']").uCheck('check');}else{$("#uact_discountm2 input[name='shop']").uCheck('uncheck');}
      $("#uact_discountm2 input[name='shop_id[]']").each(function(){
        console.log($(this).val());
          for (var i = 0; i < res.length; i++) {
            if($(this).val()==res[i].shop_id){
              $(this).uCheck('check');
            }
          }
        });
      $("#uact_discountm2 input[name='start']").val(res[0].act_discount_start);
      $("#uact_discountm2 input[name='end']").val(res[0].act_discount_end);
      $("#uact_discountm2 textarea[name='memo']").val(res[0].act_discount_memo);
    });
  });
//修改AJAX2 JS
$('.cedit2').on('click',function(){
    $("#uact_discountm4 input").each(function () {
      $(this).val('');
      $(this).attr('disabled',false);
    })
    var url="act_discount_edit_ajax2.php";
    var data = $("#uact_discountm2 input[name='id']").val();
    console.log(data);
    $.getJSON(url,{id:data},function(res){
      for (var i = 0; i < res.length; i++) {
        if (res[i].act_discount_goods_value != '0.0') {
          $("#uact_discountm4 input[name='goods_value[]']").each(function() {
            if ($(this).attr('mgoods_id') == res[i].mgoods_id) {
              $(this).val(res[i].act_discount_goods_value);
            }
          })
        }
        if (res[i].act_discount_goods_price != '0.00') {
          $("#uact_discountm4 input[name='goods_price[]']").each(function() {
            if ($(this).attr('mgoods_id') == res[i].mgoods_id) {
              if (res[i].act_discount_goods_price != '') {
                $(this).val(res[i].act_discount_goods_price);
              }
            }
          })
        }
        if (res[i].act_discount_goods_value != '0.0') {
          $("#uact_discountm4 input[name='combo_value[]']").each(function() {
            if ($(this).attr('mcombo_id') == res[i].mcombo_id) {
              $(this).val(res[i].act_discount_goods_value);
            }
          })
        }
        if (res[i].act_discount_goods_price != '0.00') {
          $("#uact_discountm4 input[name='combo_price[]']").each(function() {
            if ($(this).attr('mcombo_id') == res[i].mcombo_id) {
              if (res[i].act_discount_goods_price != '') {
                $(this).val(res[i].act_discount_goods_price);
              }
            }
          })
        }
      }  
    });
  });
//修改操作JS
$('.csubmitedit').on('click',function(){
    $('.csubmitedit').attr("disabled",true);
    var shop_id = [];
    $("#uact_discountm2 input[name='shop_id[]']:checked").each(function(){
      shop_id.push($(this).val());
    })
    var arr1 = [];
    var arr2 = [];
      $("#uact_discountm4 li[name='haha'] input[name='goods_value[]']").each(function(){
        if ($(this).val() != '' || $(this).siblings('input').val()) {
          var json = {'mgoods_catalog_id':$(this).attr('mgoods_catalog_id'),'mgoods_id':$(this).attr('mgoods_id'),'value':$(this).val(),'price':$(this).siblings('input').val()};
        arr1.push(json);
        }  
      });
      $("#uact_discountm4 li[name='haha'] input[name='combo_value[]']").each(function(){
        if ($(this).val() != '' || $(this).siblings('input').val()) {
          var json = {'mcombo_id':$(this).attr('mcombo_id'),'value':$(this).val(),'price':$(this).siblings('input').val()};
        arr2.push(json);
        } 
      });

    var name = $("#uact_discountm2 input[name='name']").val();
    var client = $("#uact_discountm2 input[name='client']:checked").val();
    var start = $("#uact_discountm2 input[name='start']").val();
    var end = $("#uact_discountm2 input[name='end']").val();
    var memo = $("#uact_discountm2 textarea[name='memo']").val();
    var id = $("#uact_discountm2 input[name='id']").val();
    var data = {
        id:id,
        name:name,
        client:client,
        start:start,
        end:end,
        memo:memo,
        shop_id:shop_id,
        arr1:arr1,
        arr2:arr2
    }
    var url="act_discount_edit_do.php";
    console.log(data);

    $.post(url,data,function(res){
      if(res=='0'){
        window.location.reload();
      }else if(res=='101'){
        alert('活动已经结束')
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
//停止启用操作JS
$('.cstop').on('click',function(){
    var url="act_discount_stop_do.php";
    var data = {
      id:$(this).val(),
      type:'stop'
    }
    console.log(data);
    $.post(url,data,function(res){
      if(res=='0'){
        window.location.reload();
      }else if(res=='101'){
        alert('活动已经结束');
      }else if(res=='102'){
        alert('活动未开始');
      }else{
        alert('停止失败');
        console.log(res);
      }
    });
  });
$('.cstart').on('click',function(){
    var url="act_discount_stop_do.php";
    var data = {
      id:$(this).val(),
      type:'start'
    }
    console.log(data);
    $.post(url,data,function(res){
      if(res=='0'){
        window.location.reload();
      }else{
        alert('启用失败');
        console.log(res);
      }
    });
  });
//弹出框mgoodssearch
$('#uact_discountm3 .csearchmgoods').on('click',function(){
  $("#uact_discountm3 #tab1 li[name='ha']").hide();
  $("#uact_discountm3 #tab1 li[name='haha']").hide();
  $('#uact_discountm3 #tab1 li').each(function () {
    if ($("#uact_discountm3 select[name='mgoods']").val() == $(this).attr('mgoods_catalog_id') ) {
      $(this).show();
    }
  }) 
});
$('#uact_discountm4 .csearchmgoods').on('click',function(){
  $("#uact_discountm4 #tab1 li[name='ha']").hide();
  $("#uact_discountm4 #tab1 li[name='haha']").hide();
  $('#uact_discountm4 #tab1 li').each(function () {
    if ($("#uact_discountm4 select[name='mgoods']").val() == $(this).attr('mgoods_catalog_id') ) {
      $(this).show();
    }
  }) 
});
//弹出框下一步选择商品套餐JS
$('#uact_discountm3 .csearchmcombo').on('click',function(){
  $("#uact_discountm3 #tab2 li[name='haha']").hide();
  $('#uact_discountm3 #tab2 li').each(function () {
    if ($("#uact_discountm3 select[name='mcombo']").val() == $(this).attr('mcombo') ) {
      $(this).show();
    }
  }) 
});
$('#uact_discountm4 .csearchmcombo').on('click',function(){
  $("#uact_discountm4 #tab2 li[name='haha']").hide();
  $('#uact_discountm4 #tab2 li').each(function () {
    if ($("#uact_discountm4 select[name='mcombo']").val() == $(this).attr('mcombo') ) {
      $(this).show();
    }
  }) 
});
$('#uact_discountm3 .allset1').on('click',function () {
  var i = $(this).attr('mgoods_catalog_id');
  var value = Number($("#uact_discountm3 #tab1 li input[name='allgoods_value"+i+"']").val());
  $("#uact_discountm3 #tab1 li input[name='goods_value[]']").each(function () {
    if($(this).attr('mgoods_catalog_id') == i) {
      if (value>0) {
        $(this).val(value);
        var value2 = Number($(this).attr('mgoods_price'));
        var k = value * value2 / 10;
        k = k.toFixed(2);
        $(this).siblings('input').val(k);
      }
    }
  })
})
$('#uact_discountm3 .allset2').on('click',function(){
  var value = Number($("#uact_discountm3 #tab2 li input[name='allcombo_value']").val());
  console.log(value);
  $("#uact_discountm3 #tab2 li input[name='combo_value[]']").val(value);
  if (value>0) {
    $("#uact_discountm3 #tab2 li input[name='combo_value[]']").each(function () {
      var value2 = Number($(this).attr('mcombo_price'));
      console.log(value2);
      var k = value * value2 / 10;
      k = k.toFixed(2);
      $(this).siblings('input').val(k);
    })
  }
})
$('#uact_discountm4 .allset1').on('click',function () {
  var i = $(this).attr('mgoods_catalog_id');
  var value = Number($("#uact_discountm4 #tab1 li input[name='allgoods_value"+i+"']").val());
  $("#uact_discountm4 #tab1 li input[name='goods_value[]']").each(function () {
    if($(this).attr('mgoods_catalog_id') == i) {
      if (value>0) {
        $(this).val(value);
        var value2 = Number($(this).attr('mgoods_price'));
        var k = value * value2 / 10;
        k = k.toFixed(2);
        $(this).siblings('input').val(k);
      }
    }
  })
})
$('#uact_discountm4  .allset2').on('click',function(){
  var value = Number($("#uact_discountm4 #tab2 li input[name='allcombo_value']").val());
  console.log(value);
  /*var price = $("#uact_discountm3 #tab2 li input[name='allcombo_price']").val();*/
  $("#uact_discountm4 #tab2 li input[name='combo_value[]']").val(value);
  if (value>0) {
    $("#uact_discountm4 #tab2 li input[name='combo_value[]']").each(function () {
      var value2 = Number($(this).attr('mcombo_price'));
      console.log(value2);
      var k = value * value2 / 10;
      k = k.toFixed(2);
      $(this).siblings('input').val(k);
    })
  }
})
$("[id*='uact_discountm'] li input[name='goods_value[]']").on("input propertychange", function () {
  if (isNaN($(this).val())) {
    $(this).val(''); $(this).siblings("input").val('');
  }else{
    var value = Number($(this).val());
    var k = Number($(this).attr('mgoods_price')) * value / 10;
    k = k.toFixed(2);
    $(this).siblings("input").val(k);
  }
  if ($(this).val()=='') {$(this).siblings('input').val('');}
})
$("[id*='uact_discountm'] li input[name='goods_price[]']").on("input propertychange",function () {
  if (isNaN($(this).val())) {
    $(this).val(''); $(this).siblings("input").val('');
  }else{
    var price = Number($(this).val());
    var value = price / Number($(this).attr('mgoods_price')) * 10;
    value = value.toFixed(2);
    $(this).siblings("input").val(value);
  }
  if ($(this).val()=='') {$(this).siblings('input').val('');}
})
$("[id*='uact_discountm'] li input[name='combo_value[]']").on("input propertychange",function () {
  if (isNaN($(this).val())) {
    $(this).val(''); $(this).siblings("input").val('');
  }else{
    var value = Number($(this).val());
    var k = Number($(this).attr('mcombo_price')) * value / 10;
    k = k.toFixed(2);
    $(this).siblings("input").val(k);
  }
  if ($(this).val()=='') {$(this).siblings('input').val('');}
})
$("[id*='uact_discountm'] li input[name='combo_price[]']").on("input propertychange",function () {
  if (isNaN($(this).val())) {
    $(this).val(''); $(this).siblings("input").val('');
  }else{
    var price = Number($(this).val());
    var value = price / Number($(this).attr('mcombo_price')) * 10;
    value = value.toFixed(2);
    $(this).siblings("input").val(value);
  }
  if ($(this).val()=='') {$(this).siblings('input').val('');}
})
//点击全部按钮，选择所有店铺
$("#uact_discountm1 input[name='shop']").on('change',function(){
  $("#uact_discountm1 input:checkbox").prop("checked",$(this).prop('checked'));
});
$("#uact_discountm2 input[name='shop']").on('change',function(){
  $("#uact_discountm2 input:checkbox").prop("checked",$(this).prop('checked'));
});
</script>
</body>
</html>