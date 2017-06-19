<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>

<!-- content -->
<div id="ugoods_package" class="gcontent">
  <ul class="am-nav am-nav-pills ubread">
    <li class="am-active"><a href="javascript: void(0)">套餐管理</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="utools">
    <form class="am-form-inline uform2">
      <div class="am-form-group">
        <label for="doc-ipt-3" class="am-form-label">名称：</label>
        <input type="text" class="am-form-field uinput uinput-220" placeholder="" name="">
      </div>
      <div class="am-form-group">
        <button type="submit" class="am-btn ubtn-search">
          <i class="iconfont icon-search"></i>查询
        </button>
      </div>
    </form> 
    <button class="am-btn ubtn-sure ubtn-blue" data-am-modal="{target: '#ugoods_packagem1'}">
      <i class="iconfont icon-xinzeng"></i>
      新增套餐
    </button>
  </div>
  <div class="gspace15"></div>
  <table class="am-table am-table-bordered am-table-hover am-table-compact utable1" id="doc-modal-list">
    <thead>
      <tr>
        <td>添加时间</td>
        <td>套餐名称</td>
        <td>编码</td>
        <td>价格</td>
        <td>会员价格</td>
        <td>有效期/到期时间</td>
        <td>套餐内容</td>
        <td>参与预约</td>
        <td width="12%">操作</td>
      </tr>
    </thead>
    <tr>
      <td>2017-12-12&nbsp;&nbsp;21:36</td>
      <td>30次套餐</td>
      <td>1002158</td>
      <td class="gtext-orange">380元</td>
      <td class="gtext-orange">280元</td>
      <td class="gtext-orange">2017-12-12</td>
      <td>剪头十次，洗头十次</td>
      <td class="gtext-green">√</td>
      <td>
        <button class="am-btn ubtn-table ubtn-green" data-am-modal="{target: '#ugoods_packagem2'}">
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
  </table>
  <ul class="am-pagination am-pagination-centered upages">
    <li class="upage-info">共1页 3条记录</li>
    <li class="am-disabled"><a href="#">&laquo;</a></li>
    <li class="am-active"><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">&raquo;</a></li>
  </ul>
</div>

<!--modal框-->
<div class="am-modal" tabindex="-1" id="ugoods_packagem1">
  <div class="am-modal-dialog umodal umodal-simple">
    <div class="am-modal-hd uhead">新增套餐
      <a href="javascript:void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd umain1">
      <form class="am-form am-form-horizontal">
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">套餐名称：</label>
          <div class="umodal-normal">
            <input type="text" id="cgoodsname" class="am-form-field uinput uinput-max" onKeyUp="query()" required>
          </div>
          <div class="umodal-text" style="text-indent:2em;">简拼：</div>
          <div class="umodal-valid">
            <input type="text" id="cupen" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">编码：</label>
          <div class="umodal-normal">
            <input type="text" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">价格：</label>
          <div class="umodal-normal">
            <input type="text" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">会员价：</label>
          <div class="umodal-normal">
            <input type="text" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">时限设置：</label>
          <div class="umodal-normal am-text-left">
            <label class="am-radio-inline">
              <input type="radio" name="radio1" class="cchecked" value="0" data-am-ucheck checked> 有效期/天
            </label>
            <label class="am-radio-inline">
              <input type="radio" name="radio1" class="cchecked" value="1" data-am-ucheck> 有效期/月
            </label>
            <label class="am-radio-inline">
              <input type="radio" name="radio1" class="cchecked" value="2" data-am-ucheck> 不限
            </label>
          </div>
        </div>
        <div class="am-form-group cispwd1">
          <label class="umodal-label am-form-label" for="">有效期：</label>
          <div class="umodal-normal">
            <input id="date2" type="text" class="am-form-field uinput uinput-max">
          </div>
          <label class="umodal-label am-form-label am-text-left">&nbsp;天</label>
        </div>
        <div class="am-form-group cispwd2">
          <label class="umodal-label am-form-label" for="">有效期：</label>
          <div class="umodal-normal">
            <input id="date2" type="text" class="am-form-field uinput uinput-max">
          </div>
          <label class="umodal-label am-form-label am-text-left">&nbsp;月</label>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">参与预约：</label>
          <div class="umodal-normal am-text-left">
            <label class="am-radio-inline">
              <input type="radio" name="radio4" value="0" data-am-ucheck> 参与
            </label>
            <label class="am-radio-inline">
              <input type="radio" name="radio4" value="1" data-am-ucheck> 不参与
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
<div class="am-modal" tabindex="-1" id="ugoods_packagem2">
  <div class="am-modal-dialog umodal umodal-simple">
    <div class="am-modal-hd uhead">新增套餐
      <a href="javascript:void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd umain1">
      <form class="am-form am-form-horizontal">
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">套餐名称：</label>
          <div class="umodal-normal">
            <input type="text" id="cgoodsname" class="am-form-field uinput uinput-max" onKeyUp="query()" required>
          </div>
          <div class="umodal-text" style="text-indent:2em;">简拼：</div>
          <div class="umodal-valid">
            <input type="text" id="cupen" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">编码：</label>
          <div class="umodal-normal">
            <input type="text" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">价格：</label>
          <div class="umodal-normal">
            <input type="text" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">会员价：</label>
          <div class="umodal-normal">
            <input type="text" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">时限设置：</label>
          <div class="umodal-normal am-text-left">
            <label class="am-radio-inline">
              <input type="radio" name="radio1" class="cchecked" value="0" data-am-ucheck checked> 有效期/天
            </label>
            <label class="am-radio-inline">
              <input type="radio" name="radio1" class="cchecked" value="1" data-am-ucheck> 有效期/月
            </label>
            <label class="am-radio-inline">
              <input type="radio" name="radio1" class="cchecked" value="2" data-am-ucheck> 不限
            </label>
          </div>
        </div>
        <div class="am-form-group cispwd1">
          <label class="umodal-label am-form-label" for="">有效期：</label>
          <div class="umodal-normal">
            <input id="date2" type="text" class="am-form-field uinput uinput-max">
          </div>
          <label class="umodal-label am-form-label am-text-left">&nbsp;天</label>
        </div>
        <div class="am-form-group cispwd2">
          <label class="umodal-label am-form-label" for="">有效期：</label>
          <div class="umodal-normal">
            <input id="date2" type="text" class="am-form-field uinput uinput-max">
          </div>
          <label class="umodal-label am-form-label am-text-left">&nbsp;月</label>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">参与预约：</label>
          <div class="umodal-normal am-text-left">
            <label class="am-radio-inline">
              <input type="radio" name="radio4" value="0" data-am-ucheck> 参与
            </label>
            <label class="am-radio-inline">
              <input type="radio" name="radio4" value="1" data-am-ucheck> 不参与
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

<div id="ugoods_packagem3" class="am-modal" tabindex="-1" style="min-height:291px;">
  <div class="am-modal-dialog umodal">
    <div class="am-modal-hd uhead">新增套餐
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
              <div class="umodal-normal ub1">
                <select class="uselect uselect-max" data-am-selected>
                  <option value="a">店铺通用型</option>
                  <option value="b">Banana</option>
                  <option value="o">Orange</option>
                  <option value="d">禁用</option>
                </select>
              </div>
              <div class="umodal-normal ub1">
                <input id="" class="am-form-field uinput uinput-max" type="text" placeholder="">
              </div>
              <div class="umodal-search ub2">
                <button type="button" class="am-btn ubtn-search2 ubtn-green">
                  <i class="iconfont icon-search"></i>
                  查询
                </button>
              </div>
            </div>
            <ul class="uc">
              <li class="uc1">茶水/毛尖</li>
              <li class="uc2">
                <div class="uc2a">普洱（38元）普洱普洱普洱普洱普洱普普洱普洱普洱普洱普洱普普洱普洱普洱普洱普洱普普洱普洱普洱普洱普洱普</div>
                <div class="uc2b cadd"><a href="#">添加</a></div>
              </li>
              <li class="uc2">
                <div class="uc2a">普洱（38元）</div>
                <div class="uc2b cadd"><a href="#">添加</a></div>
              </li>
              <li class="uc2">
                <div class="uc2a">普洱（38元）</div>
                <div class="uc2b cadd"><a href="#">添加</a></div>
              </li>
              <li class="uc1">茶水/毛尖</li>
              <li class="uc2">
                <div class="uc2a">普洱（38元）</div>
                <div class="uc2b cadd"><a href="#">添加</a></div>
              </li>
              <li class="uc1">茶水/毛尖</li>
              <li class="uc2">
                <div class="uc2a">普洱（38元）</div>
                <div class="uc2b cadd"><a href="#">添加</a></div>
              </li>              
              <li class="uc1">茶水/毛尖</li>
              <li class="uc2">
                <div class="uc2a">普洱（38元）</div>
                <div class="uc2b cadd"><a href="#">添加</a></div>
              </li>              
              <li class="uc1">茶水/毛尖</li>
              <li class="uc2">
                <div class="uc2a">普洱（38元）</div>
                <div class="uc2b cadd"><a href="#">添加</a></div>
              </li>              
              <li class="uc1">茶水/毛尖</li>
              <li class="uc2">
                <div class="uc2a">普洱（38元）</div>
                <div class="uc2b cadd"><a href="#">添加</a></div>
              </li>              
              <li class="uc1">茶水/毛尖</li>
              <li class="uc2">
                <div class="uc2a">普洱（38元）</div>
                <div class="uc2b cadd"><a href="#">添加</a></div>
              </li>              
              <li class="uc1">茶水/毛尖</li>
              <li class="uc2">
                <div class="uc2a">普洱（38元）</div>
                <div class="uc2b cadd"><a href="#">添加</a></div>
              </li>              
              <li class="uc1">茶水/毛尖</li>
              <li class="uc2">
                <div class="uc2a">普洱（38元）</div>
                <div class="uc2b cadd"><a href="#">添加</a></div>
              </li>
            </ul>
          </div>
          <div class="am-tab-panel am-fade" id="tab2" style="min-height:414px;">
            <div class="gspace50"></div>
            <div class="gspace50"></div>
            <div>
              <div class="umodal-normal" style="width:180px; margin:0px 5% 0px 15%;">
                <input id="" class="am-form-field uinput uinput-max" type="text" placeholder="条码枪扫码或手动输入">
              </div>           
              <button type="button" class="am-btn ubtn-search2 ubtn-green usearch" style="width:80px;">
                添加
              </button>
            </div>
          </div>
        </div>
      </div>
      <div class="uright">
        <div class="ua">已选择商品<span style="float:right;">（数量为0代表不限数量）</span></div>
        <ul class="ub-head">
          <li class="ub-head1">名称</li>
          <li class="ub-head2">数量</li>
          <li class="ub-head2">操作</li>
        </ul>
        <ul class="ub">
          <li>
            <div class="ub1">服务一（38元）</div>
            <div class="ub2" style="padding-top:3px;">
              <a href="javascript:;" class="ufont1 cbtndec"><i class="am-icon-minus"></i></a>
              <input type="text" name="" class="uinput" value="0">
              <a href="javascript:;" class="ufont1 cbtnplus"><i class="am-icon-plus"></i></a>
            </div>
            <div class="ub3 cdel2"><a href="javascript:;">移除</a></div>
          </li>
        </ul>
      </div>
    </div>         
    <div class="am-modal-footer ufoot">
      <div class="am-btn-group ubtn-left">
        <button type="button" class="am-btn ubtn-sure ubtn-green cmodelopen2"><i class="iconfont icon-xiangyou2"></i>
          上一步
        </button>
      </div>
      <div class="am-btn-group">
        <button type="button" class="am-btn ubtn-sure ubtn-green"><i class="iconfont icon-yuanxingxuanzhong"></i>
          完成
        </button>
      </div>
    </div>
  </div>
</div>
<div id="ugoods_packagem4" class="am-modal" tabindex="-1" style="min-height:291px;">
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
              <div class="umodal-normal ub1">
                <select class="uselect uselect-max" data-am-selected>
                  <option value="a">店铺通用型</option>
                  <option value="b">Banana</option>
                  <option value="o">Orange</option>
                  <option value="d">禁用</option>
                </select>
              </div>
              <div class="umodal-normal ub1">
                <input id="" class="am-form-field uinput uinput-max" type="text" placeholder="">
              </div>
              <div class="umodal-search ub2">
                <button type="button" class="am-btn ubtn-search2 ubtn-green">
                  <i class="iconfont icon-search"></i>
                  查询
                </button>
              </div>
            </div>
            <ul class="uc">
              <li class="uc1">茶水/毛尖</li>
              <li class="uc2">
                <div class="uc2a">普洱（38元）普洱普洱普洱普洱普洱普普洱普洱普洱普洱普洱普普洱普洱普洱普洱普洱普普洱普洱普洱普洱普洱普</div>
                <div class="uc2b cadd"><a href="#">添加</a></div>
              </li>
              <li class="uc2">
                <div class="uc2a">普洱（38元）</div>
                <div class="uc2b cadd"><a href="#">添加</a></div>
              </li>
              <li class="uc2">
                <div class="uc2a">普洱（38元）</div>
                <div class="uc2b cadd"><a href="#">添加</a></div>
              </li>
              <li class="uc1">茶水/毛尖</li>
              <li class="uc2">
                <div class="uc2a">普洱（38元）</div>
                <div class="uc2b cadd"><a href="#">添加</a></div>
              </li>
              <li class="uc1">茶水/毛尖</li>
              <li class="uc2">
                <div class="uc2a">普洱（38元）</div>
                <div class="uc2b cadd"><a href="#">添加</a></div>
              </li>              
              <li class="uc1">茶水/毛尖</li>
              <li class="uc2">
                <div class="uc2a">普洱（38元）</div>
                <div class="uc2b cadd"><a href="#">添加</a></div>
              </li>              
              <li class="uc1">茶水/毛尖</li>
              <li class="uc2">
                <div class="uc2a">普洱（38元）</div>
                <div class="uc2b cadd"><a href="#">添加</a></div>
              </li>              
              <li class="uc1">茶水/毛尖</li>
              <li class="uc2">
                <div class="uc2a">普洱（38元）</div>
                <div class="uc2b cadd"><a href="#">添加</a></div>
              </li>              
              <li class="uc1">茶水/毛尖</li>
              <li class="uc2">
                <div class="uc2a">普洱（38元）</div>
                <div class="uc2b cadd"><a href="#">添加</a></div>
              </li>              
              <li class="uc1">茶水/毛尖</li>
              <li class="uc2">
                <div class="uc2a">普洱（38元）</div>
                <div class="uc2b cadd"><a href="#">添加</a></div>
              </li>              
              <li class="uc1">茶水/毛尖</li>
              <li class="uc2">
                <div class="uc2a">普洱（38元）</div>
                <div class="uc2b cadd"><a href="#">添加</a></div>
              </li>
            </ul>
          </div>
          <div class="am-tab-panel am-fade" id="tab2" style="min-height:414px;">
            <div class="gspace50"></div>
            <div class="gspace50"></div>
            <div>
              <div class="umodal-normal" style="width:180px; margin:0px 5% 0px 15%;">
                <input id="" class="am-form-field uinput uinput-max" type="text" placeholder="条码枪扫码或手动输入">
              </div>           
              <button type="button" class="am-btn ubtn-search2 ubtn-green usearch" style="width:80px;">
                添加
              </button>
            </div>
          </div>
        </div>
      </div>
      <div class="uright">
        <div class="ua">已选择商品<span style="float:right;">（数量为0代表不限数量）</span></div>
        <ul class="ub-head">
          <li class="ub-head1">名称</li>
          <li class="ub-head2">数量</li>
          <li class="ub-head2">操作</li>
        </ul>
        <ul class="ub">
          <li>
            <div class="ub1">卡布奇诺卡布奇诺卡布奇诺卡布奇诺</div>
            <div class="ub2">
              <input id="" class="am-form-field uinput uinput-max" type="text" placeholder="">
            </div>
            <div class="ub3 cdel2"><a href="javascript:;">移除</a></div>
          </li>
        </ul>
      </div>
    </div>         
    <div class="am-modal-footer ufoot">
      <div class="am-btn-group ubtn-left">
        <button type="button" class="am-btn ubtn-sure ubtn-green cmodelopen4"><i class="iconfont icon-xiangyou2"></i>
          上一步
        </button>
      </div>
      <div class="am-btn-group">
        <button type="button" class="am-btn ubtn-sure ubtn-green"><i class="iconfont icon-yuanxingxuanzhong"></i>
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
<script src="../js/jquery.min.js"></script>
<script src="../js/pinying.js"></script>
<script src="../js/amazeui.min.js"></script>
<script type="text/javascript">
$(function() {
  $('.cdel').on('click', function() {
    $('#cconfirm').modal({
      relatedTarget: this,
      onConfirm: function(options) {
        $(this.relatedTarget).parent('td').parent('tr').remove();
      },
      onCancel: function() {
        return;
      }
    });
  });
});

//下一步
$('.cmodelopen').on('click', function(e) {
  $('#ugoods_packagem1').modal('close');
  $('#ugoods_packagem3').modal('open');
});
$('.cmodelopen3').on('click', function(e) {
  $('#ugoods_packagem2').modal('close');
  $('#ugoods_packagem4').modal('open');
});
//上一步
$('.cmodelopen2').on('click', function(e) {
  $('#ugoods_packagem3').modal('close');
  $('#ugoods_packagem1').modal('open');
});
$('.cmodelopen4').on('click', function(e) {
  $('#ugoods_packagem4').modal('close');
  $('#ugoods_packagem2').modal('open');
});

// 时限设置隐藏
    $('.cispwd2').hide();
    $('.cchecked').on('click', function(e) {
      if($(this).val()==1){
        $('.cispwd1').fadeOut(0);
        $('.cispwd2').fadeIn(0);
      }else if($(this).val()==2){
        $('.cispwd2').fadeOut(0);
        $('.cispwd1').fadeOut(0);
      }else{
        $('.cispwd2').fadeOut(0);
        $('.cispwd1').fadeIn(0);
      }
    });
// 添加
$('.cadd').on('click', function(){
  var product = $(this).prev().text();
  var addhtml ='<li><div class="ub1">'+product+'</div><div class="ub2"><a href="javascript:;" class="ufont1 cbtndec"><i class="am-icon-minus"></i></a>&nbsp;<input id="" class="am-form-field uinput uinput-max" type="text" placeholder="" value="0">&nbsp;<a href="javascript:;" class="ufont1 cbtnplus"><i class="am-icon-plus"></i></a></div><div class="ub3 cdel2"><a href="javascript:;">移除</a></div></li>';
  $(".uright .ub").append(addhtml);
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
      $("#cupen1").val(null);
      var str = $("#cgoodsname1").val().trim();
      if(str == "") return;
      // console.log(str);
      var arrRslt = makePy(str);
      $("#cupen1").val(arrRslt);
}
function query(){
      $("#cupen2").val(null);
      var str = $("#cgoodsname2").val().trim();
      if(str == "") return;
      // console.log(str);
      var arrRslt = makePy(str);
      $("#cupen2").val(arrRslt);
}
</script>
</body>
</html>
