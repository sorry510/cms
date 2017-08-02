<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>
<div id="umarketing_discount" class="gcontent">
  <ul class="am-nav am-nav-pills ubread">
    <li class="am-active"><a href="#">限时打折</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="utools">
    <form class="am-form-inline uform2">
      <div class="am-form-group">
        <label for="doc-ipt-3" class="am-form-label">顾客类型：</label>
        <select class="uselect uselect-auto" data-am-selected name="">
           <option value="all">全部</option>
           <option value="2">2</option>
           <option value="3">3</option>
        </select>
      </div>
      <div class="am-form-group">
        <label for="doc-ipt-3" class="am-form-label">日期：</label>
        <div class="am-input-group am-datepicker-date udatepicker" data-am-datepicker="{format: 'yyyy-mm-dd'}">
          <input type="text" class="am-form-field" name="">
          <span class="am-input-group-btn am-datepicker-add-on">
            <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span>
            </button>
          </span>
        </div>  
      </div>
      <div class="am-form-group">    
        <label for="doc-ipt-3" class="am-form-label">至：</label>
        <div class="am-input-group am-datepicker-date udatepicker udatepicker140" data-am-datepicker="{format: 'yyyy-mm-dd'}">
          <input type="text" class="am-form-field" name="">
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
    <button class="am-btn ubtn-sure ubtn-blue" data-am-modal="{target:'#umarketing_discountm1'}">
      <i class="iconfont icon-addition"></i>
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
        <td>备注</td>
        <td style="width:20%;">操作</td>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>2017-05-04 12:00</td>
        <td>端午大酬宾</td>
        <td>不限</td>
        <td>2017-05-04</td>
        <td>2017-05-30</td>
        <td>全部</td>
        <td>无</td>
        <td>
          <button class="am-btn ubtn-table ubtn-green" data-am-modal="{target:'#umarketing_discountm3'}">
            <i class="iconfont icon-question"></i>
           折扣商品
          </button>
          &nbsp;
          <button class="am-btn ubtn-table ubtn-green" data-am-modal="{target:'#umarketing_discountm2'}">
            <i class="iconfont icon-bianji"></i>
           修改
          </button>
          &nbsp;
          <button class="am-btn ubtn-table ubtn-gray cdel">
             <i class="iconfont icon-shanchu"></i>
                      删除
          </button> 
        </td>
      </tr>
    </tbody>
  </table>
  <ul class="am-pagination am-pagination-centered upages">
    <li class="upagedec">共1页 3条记录</li>
    <li class="am-disabled"><a href="#">&laquo;</a></li>
    <li class="am-active"><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">&raquo;</a></li>
  </ul>
</div>
<!-- 弹出框添加 -->
<div class="am-modal" tabindex="-1" id="umarketing_discountm1">
  <div class="am-modal-dialog umodal umodal-simple">
    <div class="am-modal-hd uhead">新增活动
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd umain1">
      <form class="am-form am-form-horizontal" id="cadd">
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">活动名称：</label>
          <div class="umodal-normal">
            <input type="text" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">顾客类型：</label>
          <div class="umodal-normal am-text-left">
            <label class="am-radio-inline">
              <input type="radio" name="radio1" value="0" data-am-ucheck> 不限
            </label>
            <label class="am-radio-inline">
              <input type="radio" name="radio1" value="1" data-am-ucheck> 会员
            </label>
            <label class="am-radio-inline">
              <input type="radio" name="radio1" value="1" data-am-ucheck> 非会员
            </label>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">开始时间：</label>
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
          <label class="umodal-label am-form-label" for="">结束时间：</label>
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
          <label class="umodal-label am-form-label" for="">备注：</label>
          <div class="umodal-max">
            <textarea class="am-form-field utextarea utextarea-max" row="3"></textarea>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">参加店铺：</label>
          <div class="umodal-max am-text-left">
            <label class="am-checkbox-inline">
              <input type="checkbox"  value="" data-am-ucheck> 全部
            </label>
            <label class="am-checkbox-inline">
              <input type="checkbox"  value="" data-am-ucheck> 分店1
            </label>
            <label class="am-checkbox-inline">
              <input type="checkbox"  value="" data-am-ucheck> 分店2
            </label>
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
<div class="am-modal" tabindex="-1" id="umarketing_discountm2">
  <div class="am-modal-dialog umodal umodal-simple">
    <div class="am-modal-hd uhead">修改活动
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd umain1">
      <form class="am-form am-form-horizontal" id="cadd">
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">活动名称：</label>
          <div class="umodal-normal">
            <input type="text" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">顾客类型：</label>
          <div class="umodal-normal am-text-left">
            <label class="am-radio-inline">
              <input type="radio" name="radio1" value="0" data-am-ucheck> 不限
            </label>
            <label class="am-radio-inline">
              <input type="radio" name="radio1" value="1" data-am-ucheck> 会员
            </label>
            <label class="am-radio-inline">
              <input type="radio" name="radio1" value="1" data-am-ucheck> 非会员
            </label>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">开始时间：</label>
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
          <label class="umodal-label am-form-label" for="">结束时间：</label>
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
          <label class="umodal-label am-form-label" for="">备注：</label>
          <div class="umodal-max">
            <textarea class="am-form-field utextarea utextarea-max" row="3"></textarea>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">参加店铺：</label>
          <div class="umodal-max am-text-left">
            <label class="am-checkbox-inline">
              <input type="checkbox"  value="" data-am-ucheck> 全部
            </label>
            <label class="am-checkbox-inline">
              <input type="checkbox"  value="" data-am-ucheck> 分店1
            </label>
            <label class="am-checkbox-inline">
              <input type="checkbox"  value="" data-am-ucheck> 分店2
            </label>
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
<div class="am-modal" tabindex="-1" id="umarketing_discountm4">
  <div class="am-modal-dialog umodal">
    <div class="am-modal-hd uhead">折扣商品
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd">
      <form class="am-form am-form-horizontal">
        <div class="am-tabs am-form-group" data-am-tabs style="border:1px solid #ddd;">
          <ul class="am-u-lg-2 am-nav am-tabs-nav" style="padding-right: 0px;">
            <li class="am-active"><a href="#tab1">服务</a></li>
            <li><a href="#tab2">商品</a></li>
          </ul>
          <div class="am-u-lg-10 am-tabs-bd">
            <div class="am-tab-panel am-fade am-in am-active" id="tab1">
              <div class="am-form-group">
                <label class="am-u-lg-3 am-form-label" for="" style="font-weight: bold;">服务分类</label>
                <div class="am-u-lg-9">
                  <div class="ua">
                    <label class="am-checkbox-inline">
                      <input type="checkbox" value="join" checked="checked" data-am-ucheck id="ajoinall"> 参与活动
                    </label>
                  </div>
                  <div class="ua">
                    <label for="doc-ipt-3" class="am-form-label">折扣</label>
                    <input class="uinput uinput-60" type="text" id="acountall" name="count">
                  </div>
                  <div class="ua">
                    <label for="doc-ipt-3" class="am-form-label">优惠价</label>
                    <input class="uinput uinput-60" type="text" id="apriceall" name="price">
                  </div>
                  <button type="button" class="am-btn ubtn-search2 ubtn-green abat">
                    批量设置
                  </button>
                </div> 
              </div>
              <div class="gspace15"></div>
              <div class="am-form-group">
                <label class="am-u-lg-3 am-form-label" for="">————服务1</label>
                <div class="am-u-lg-9">
                  <div class="ua">
                    <label class="am-checkbox-inline">
                      <input type="checkbox" id="ajoin1" value="" data-am-ucheck> 参与活动
                    </label>
                  </div>
                  <div class="ua">
                    <label for="doc-ipt-3" class="am-form-label">折扣</label>
                    <input id="acount1" class="uinput uinput-60" type="text" name="">
                  </div>
                  <div class="ua">
                    <label for="doc-ipt-3" class="am-form-label">优惠价</label>
                    <input id="aprice1" class="uinput uinput-60" type="text" name="">
                  </div>
                </div>
              </div>
              <div class="am-form-group">
                <label class="am-u-lg-3 am-form-label" for="">————服务2</label>
                <div class="am-u-lg-9">
                  <div class="ua">
                    <label class="am-checkbox-inline">
                      <input id="ajoin2" type="checkbox"  value="" data-am-ucheck> 参与活动
                    </label>
                  </div>
                  <div class="ua">
                    <label for="doc-ipt-3" class="am-form-label">折扣</label>
                    <input id="acount2" class="uinput uinput-60" type="text" name="">
                  </div>
                  <div class="ua">
                    <label for="doc-ipt-3" class="am-form-label">优惠价</label>
                    <input id="aprice2" class="uinput uinput-60" type="text" name="">
                  </div>
                </div>
              </div>
            </div>
            <div class="am-tab-panel am-fade" id="tab2">
              wu
            </div>
          </div>
        </div>
      </form>
    </div>
    <div class="am-modal-footer ufoot">
      <div class="am-btn-group">
        <button type="submit" class="am-btn ubtn-sure ubtn-green"><i class="iconfont icon-yuanxingxuanzhong"></i>
          完成
        </button>
      </div>
    </div>
  </div>
</div>
<div class="am-modal" tabindex="-1" id="umarketing_discountm3">
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
                      <select class="uselect uselect-max" data-am-selected>
                        <option value="a">AAA</option>
                        <option value="b">Banana</option>
                        <option value="o">Orange</option>
                        <option value="d">禁用</option>
                      </select>
                    </div>
                    <div class="umodal-text" style="padding-left:10px;">
                      <button type="button" class="am-btn ubtn-search2 ubtn-green">
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
            <ul class="am-list am-list-border ucont">
              <li>
                <div class="am-form-group am-g">
                  <div class="am-u-lg-5 am-text-left utext1">服务1</div>
                  <div class="am-u-lg-5 am-text-right">
                    <label class="am-checkbox-inline">
                      <input type="checkbox"  value="" data-am-ucheck> 参与活动
                    </label>
                    <span class="utext3">&nbsp;&nbsp;&nbsp;折扣</span>
                    <input class="uinput uinput-60" type="text" name="">
                    <span class="utext3">&nbsp;&nbsp;&nbsp;优惠价</span>
                    <input class="uinput uinput-60" type="text" name=""> 
                  </div>
                  <div class="am-u-lg-2">
                    <button type="button" class="am-btn ubtn-search2 ubtn-gray">
                      批量设置
                    </button>
                  </div>
                </div>
              </li>
              <li>
                <div class="am-form-group am-g">
                  <div class="am-u-lg-5 am-text-left utext2">推拿（50元）</div>
                  <div class="am-u-lg-5 am-u-end am-text-right">
                    <label class="am-checkbox-inline">
                      <input type="checkbox"  value="" data-am-ucheck> 参与活动
                    </label>
                    <span class="utext3">&nbsp;&nbsp;&nbsp;折扣</span>
                    <input class="uinput uinput-60" type="text" name="">
                    <span class="utext3">&nbsp;&nbsp;&nbsp;优惠价</span>
                    <input class="uinput uinput-60" type="text" name=""> 
                  </div>
                </div>
              </li>
              <li>
                <div class="am-form-group am-g">
                  <div class="am-u-lg-5 am-text-left utext1">服务2</div>
                  <div class="am-u-lg-5 am-text-right">
                    <label class="am-checkbox-inline">
                      <input type="checkbox"  value="" data-am-ucheck> 参与活动
                    </label>
                    <span class="utext3">&nbsp;&nbsp;&nbsp;折扣</span>
                    <input class="uinput uinput-60" type="text" name="">
                    <span class="utext3">&nbsp;&nbsp;&nbsp;优惠价</span>
                    <input class="uinput uinput-60" type="text" name="">
                  </div>
                  <div class="am-u-lg-2">
                    <button type="button" class="am-btn ubtn-search2 ubtn-gray">
                      批量设置
                    </button>
                  </div>
                </div>
              </li>
              <li>
                <div class="am-form-group am-g">
                  <div class="am-u-lg-5 am-text-left utext2">针灸</div>
                  <div class="am-u-lg-5 am-u-end am-text-right">
                    <label class="am-checkbox-inline">
                      <input type="checkbox"  value="" data-am-ucheck> 参与活动
                    </label>
                    <span class="utext3">&nbsp;&nbsp;&nbsp;折扣</span>
                    <input class="uinput uinput-60" type="text" name="">
                    <span class="utext3">&nbsp;&nbsp;&nbsp;优惠价</span>
                    <input class="uinput uinput-60" type="text" name="">
                  </div>
                </div>
              </li>
              <li>
                <div class="am-form-group am-g">
                  <div class="am-u-lg-5 am-text-left utext2">话聊</div>
                  <div class="am-u-lg-5 am-u-end am-text-right">
                    <label class="am-checkbox-inline">
                      <input type="checkbox"  value="" data-am-ucheck> 参与活动
                    </label>
                    <span class="utext3">&nbsp;&nbsp;&nbsp;折扣</span>
                    <input class="uinput uinput-60" type="text" name="">
                    <span class="utext3">&nbsp;&nbsp;&nbsp;优惠价</span>
                    <input class="uinput uinput-60" type="text" name="">
                  </div>
                </div>
              </li>
            </ul>
          </div>
          <div class="am-tab-panel am-fade" id="tab2">
            <ul class="am-list am-list-border utop">
              <li class="uheader"><span class="uspan1">分类/名称</span><span class="uspan2">活动</span></li>
              <li>
                <div class="am-form-group am-g">
                  <form action="">
                    <div class="umodal-short" style="padding-left:20px;">
                      <select class="uselect uselect-max" data-am-selected>
                        <option value="a">AAA</option>
                        <option value="b">Banana</option>
                        <option value="o">Orange</option>
                        <option value="d">禁用</option>
                      </select>
                    </div>
                    <div class="umodal-text" style="padding-left:10px;">
                      <button type="button" class="am-btn ubtn-search2 ubtn-green">
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
            <ul class="am-list am-list-border ucont">
              <li>
                <div class="am-form-group am-g">
                  <div class="am-u-lg-5 am-text-left utext1">套餐1</div>
                  <div class="am-u-lg-5 am-text-right">
                    <label class="am-checkbox-inline">
                      <input type="checkbox"  value="" data-am-ucheck> 参与活动
                    </label>
                    <span class="utext3">&nbsp;&nbsp;&nbsp;折扣</span>
                    <input class="uinput uinput-60" type="text" name="">
                    <span class="utext3">&nbsp;&nbsp;&nbsp;优惠价</span>
                    <input class="uinput uinput-60" type="text" name=""> 
                  </div>
                  <div class="am-u-lg-2">
                    <button type="button" class="am-btn ubtn-search2 ubtn-gray">
                      设置
                    </button>
                  </div>
                </div>
              </li>
              <li>
                <div class="am-form-group am-g">
                  <div class="am-u-lg-5 am-text-left utext2">推拿（50元）</div>
                </div>
              </li>
              <li>
                <div class="am-form-group am-g">
                  <div class="am-u-lg-5 am-text-left utext1">套餐2</div>
                  <div class="am-u-lg-5 am-text-right">
                    <label class="am-checkbox-inline">
                      <input type="checkbox"  value="" data-am-ucheck> 参与活动
                    </label>
                    <span class="utext3">&nbsp;&nbsp;&nbsp;折扣</span>
                    <input class="uinput uinput-60" type="text" name="">
                    <span class="utext3">&nbsp;&nbsp;&nbsp;优惠价</span>
                    <input class="uinput uinput-60" type="text" name="">
                  </div>
                  <div class="am-u-lg-2">
                    <button type="button" class="am-btn ubtn-search2 ubtn-gray">
                      设置
                    </button>
                  </div>
                </div>
              </li>
              <li>
                <div class="am-form-group am-g">
                  <div class="am-u-lg-5 am-text-left utext2">针灸</div>
                </div>
              </li>
              <li>
                <div class="am-form-group am-g">
                  <div class="am-u-lg-5 am-text-left utext2">话聊</div>
                </div>
              </li>
            </ul>
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
        <button type="submit" class="am-btn ubtn-sure ubtn-green"><i class="iconfont icon-yuanxingxuanzhong"></i>
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
      onCancel: function(){
        return 
      }
    });
  });
  $('.copenm3').on('click', function() {
    $('#umarketing_discountm1').modal('close');
    $('#umarketing_discountm3').modal('open');
  });
  $(document).on('click','.abat',function(){
    $("[id*='aprice']").val($("#apriceall").val());
    $("[id*='acount']").val($("#acountall").val());
    $("[id*='ajoin']").prop('checked',$("#ajoinall").prop('checked'));
  })
});
</script>
</body>
</html>