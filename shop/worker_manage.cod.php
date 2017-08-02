<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>

<!-- content -->
<div id="uemployee_manage" class="gcontent">
  <ul class="am-nav am-nav-pills ubread">
    <li class="am-active"><a href="javascript: void(0)">员工管理</a></li>
    <li><a href="employee_group.php">员工分组</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="utools">
    <form class="am-form-inline uform2">
      <div class="am-form-group">
        <label class="am-form-label">分店：</label> 
        <select class="uselect uselect-auto" data-am-selected name="">
          <option value="all">全部</option>
          <option value="2">2</option>
          <option value="3">3</option>
        </select>
      </div>
      <div class="am-form-group">
        <label class="am-form-label">员工分组：</label> 
        <select class="uselect uselect-auto" data-am-selected name="">
          <option value="all">全部</option>
          <option value="2">2</option>
          <option value="3">3</option>
        </select>
      </div>
      <div class="am-form-group">
        <label class="am-form-label">姓名：</label>
        <input class="am-form-field uinput uinput-220" type="text" name="">
      </div>
      <div class="am-form-group">
        <button type="submit" class="am-btn ubtn-search">
          <i class="iconfont icon-search"></i>查询
        </button>
      </div>
    </form> 
    <button class="am-btn ubtn-sure ubtn-blue" data-am-modal="{target: '#uemployee_managem1'}">
      <i class="iconfont icon-xinzeng"></i>
      新增员工
    </button>
  </div>
  <div class="gspace15"></div>
  <table class="am-table am-table-bordered am-table-hover am-table-compact utable1" id="doc-modal-list">
    <thead>
      <tr>
        <td>分店</td>
        <td>员工分组</td>
        <td>员工姓名</td>
        <td>员工编号</td>
        <td>性别</td>
        <td>出生日期</td>
        <td>手机号码</td>
        <td>学历</td>
        <td>入职时间</td>
        <td>基本工资</td>
        <td>参与预约</td>
        <td>导购提成</td>
        <td width="12%">操作</td>
      </tr>
    </thead>
    <tr>
      <td>二七广场店</td>
      <td>店员</td>
      <td><a data-am-offcanvas="{target: '#uoffcanvas'}" href="#">张小明</a></td>
      <td>20115</td>
      <td>男</td>
      <td>19920101</td>
      <td>13623812345</td>
      <td>本科</td>
      <td>2008-03-16</td>
      <td>2000</td>
      <td>参与</td>
      <td>参与</td>
      <td>
        <button class="am-btn ubtn-table ubtn-green" data-am-modal="{target: '#uemployee_managem2'}">
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
<div class="am-modal" tabindex="-1" id="uemployee_managem1">
  <div class="am-modal-dialog umodal">
    <div class="am-modal-hd uhead">新增员工
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd umain1">
      <form class="am-form am-form-horizontal">
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">分店：</label>
          <div class="umodal-normal">
            <select class="uselect uselect-max" data-am-selected>
              <option value="a">大学路分店</option>
              <option value="b">解放路分店</option>
              <option value="o">东风路分店</option>
              <option value="m">Mango</option>
              <option value="d">禁用</option>
            </select>
          </div>
          <div class="umodal-search">&nbsp;</div>
          <label class="umodal-label am-form-label" for="">员工分组：</label>
          <div class="umodal-normal">
            <select class="uselect uselect-max" data-am-selected>
              <option value="a">销售员</option>
              <option value="b">理疗师</option>
            </select>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">员工姓名：</label>
          <div class="umodal-normal">
            <input type="text" class="am-form-field uinput uinput-max">
          </div>
          <div class="umodal-search">&nbsp;</div>
          <label class="umodal-label am-form-label" for="">员工编号：</label>
          <div class="umodal-normal">
            <input type="text" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">性别：</label>
          <div class="umodal-normal am-text-left">
            <label class="am-radio-inline">
              <input type="radio" name="radio1" value="male" data-am-ucheck> 男
            </label>
            <label class="am-radio-inline">
              <input type="radio" name="radio1" value="female" data-am-ucheck> 女
            </label>
          </div>
          <div class="umodal-search">&nbsp;</div>
          <label class="umodal-label am-form-label" for="">出生日期：</label>
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
          <label class="umodal-label am-form-label" for="">手机号码：</label>
          <div class="umodal-normal">
            <input type="text" class="am-form-field uinput uinput-max">
          </div>
          <div class="umodal-search">&nbsp;</div>
          <label class="umodal-label am-form-label" for="">身份证号：</label>
          <div class="umodal-normal">
            <input type="text" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">最高学历：</label>
          <div class="umodal-normal">
            <select class="uselect uselect-max" data-am-selected>
              <option value="a">高中</option>
              <option value="b">大学</option>
              <option value="o">Orange</option>
              <option value="m">Mango</option>
              <option value="d">禁用</option>
            </select>
          </div>
          <div class="umodal-search">&nbsp;</div>
          <label class="umodal-label am-form-label" for="">入职时间：</label>
          <div class="umodal-normal">
            <div class="am-input-group am-datepicker-date udatepicker udatepicker-max" data-am-datepicker="{format:'yyyy-mm-dd'}">
              <input type="text" class="am-form-field">
              <span class="am-input-group-btn am-datepicker-add-on">
                <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span></button>
              </span>
            </div>
          </div>
        </div>
        <div class="am-form-group ">
          <label class="umodal-label am-form-label">员工照片：</label>
          <div class="umodal-normal am-form-file am-text-left">
            <button type="button" class="am-btn am-btn-default am-btn-sm" style="width: 100%;">
              <i class="am-icon-cloud-upload"></i> 选择要上传的照片
            </button>
            <input type="file" id="doc-ipt-file-2">
          </div>
          <div class="umodal-search">&nbsp;</div>
          <label class="umodal-label am-form-label">身份证照：</label>
          <div class="umodal-normal am-form-file am-text-left">
            <button type="button" class="am-btn am-btn-default am-btn-sm" style="width: 100%;">
              <i class="am-icon-cloud-upload"></i> 选择要上传的照片
            </button>
            <input type="file" id="doc-ipt-file-2">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">住址：</label>
          <div class="umodal-normal">
            <input id="" class="am-form-field uinput uinput-max" type="password">
          </div>
          <div class="umodal-search">&nbsp;</div>
          <label class="umodal-label am-form-label" for="">基本工资：</label>
          <div class="umodal-normal">
            <input type="text" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">参与预约：</label>
          <div class="umodal-normal am-text-left" >
            <label class="am-radio-inline">
              <input type="radio" name="radio1" value="male" data-am-ucheck> 参与
            </label>
            <label class="am-radio-inline">
              <input type="radio" name="radio1" value="female" data-am-ucheck> 不参与
            </label>
          </div>
          <div class="umodal-search">&nbsp;</div>
          <label class="umodal-label am-form-label" for="">导购提成：</label>
          <div class="umodal-normal am-text-left">
            <label class="am-radio-inline">
              <input type="radio" name="radio1" value="male" data-am-ucheck> 参与
            </label>
            <label class="am-radio-inline">
              <input type="radio" name="radio1" value="female" data-am-ucheck> 不参与
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
<div class="am-modal" tabindex="-1" id="uemployee_managem2">
  <div class="am-modal-dialog umodal">
    <div class="am-modal-hd uhead">修改员工
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd umain1">
      <form class="am-form am-form-horizontal">
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">分店：</label>
          <div class="umodal-normal">
            <select class="uselect uselect-max" data-am-selected>
              <option value="a">大学路分店</option>
              <option value="b">解放路分店</option>
              <option value="o">Orange</option>
              <option value="m">Mango</option>
              <option value="d">禁用</option>
            </select>
          </div>
          <div class="umodal-search">&nbsp;</div>
          <label class="umodal-label am-form-label" for="">员工分组：</label>
          <div class="umodal-normal">
            <select class="uselect uselect-max" data-am-selected>
              <option value="a">销售员</option>
              <option value="b">理疗师</option>
              <option value="o">Orange</option>
              <option value="m">Mango</option>
              <option value="d">禁用</option>
            </select>
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">员工姓名：</label>
          <div class="umodal-normal">
            <input type="text" class="am-form-field uinput uinput-max">
          </div>
          <div class="umodal-search">&nbsp;</div>
          <label class="umodal-label am-form-label" for="">员工编号：</label>
          <div class="umodal-normal">
            <input type="text" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">性别：</label>
          <div class="umodal-normal am-text-left">
            <label class="am-radio-inline">
              <input type="radio" name="radio1" value="male" data-am-ucheck> 男
            </label>&nbsp;&nbsp;
            <label class="am-radio-inline">
              <input type="radio" name="radio1" value="female" data-am-ucheck> 女
            </label>
          </div>
          <div class="umodal-search">&nbsp;</div>
          <label class="umodal-label am-form-label" for="">出生日期：</label>
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
          <label class="umodal-label am-form-label" for="">手机号码：</label>
          <div class="umodal-normal">
            <input type="text" class="am-form-field uinput uinput-max">
          </div>
          <div class="umodal-search">&nbsp;</div>
          <label class="umodal-label am-form-label" for="">身份证号：</label>
          <div class="umodal-normal">
            <input type="text" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">最高学历：</label>
          <div class="umodal-normal">
            <select class="uselect uselect-max" data-am-selected>
              <option value="a">高中</option>
              <option value="b">大学</option>
              <option value="o">Orange</option>
              <option value="m">Mango</option>
              <option value="d">禁用</option>
            </select>
          </div>
          <div class="umodal-search">&nbsp;</div>
          <label class="umodal-label am-form-label" for="">入职时间：</label>
          <div class="umodal-normal">
            <div class="am-input-group am-datepicker-date udatepicker udatepicker-max" data-am-datepicker="{format:'yyyy-mm-dd'}">
              <input type="text" class="am-form-field">
              <span class="am-input-group-btn am-datepicker-add-on">
                <button  class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span></button>
              </span>
            </div>
          </div>
        </div>
        <div class="am-form-group ">
          <label class="umodal-label am-form-label">员工照片：</label>
          <div class="umodal-normal am-form-file am-text-left">
            <button type="button" class="am-btn am-btn-default am-btn-sm" style="width: 100%;">
              <i class="am-icon-cloud-upload"></i> 选择要上传的照片
            </button>
            <input type="file" id="doc-ipt-file-2">
          </div>
          <div class="umodal-search">&nbsp;</div>
          <label class="umodal-label am-form-label">身份证照：</label>
          <div class="umodal-normal am-form-file am-text-left">
            <button type="button" class="am-btn am-btn-default am-btn-sm" style="width: 100%;">
              <i class="am-icon-cloud-upload"></i> 选择要上传的照片
            </button>
            <input type="file" id="doc-ipt-file-2">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">住址：</label>
          <div class="umodal-normal">
            <input id="" class="am-form-field uinput uinput-max" type="password">
          </div>
          <div class="umodal-search">&nbsp;</div>
          <label class="umodal-label am-form-label" for="">基本工资：</label>
          <div class="umodal-normal">
            <input type="text" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group">
          <label class="umodal-label am-form-label" for="">参与预约：</label>
          <div class="umodal-normal am-text-left" >
            <label class="am-radio-inline">
              <input type="radio" name="radio1" value="male" data-am-ucheck> 参与
            </label>
            <label class="am-radio-inline">
              <input type="radio" name="radio1" value="female" data-am-ucheck> 不参与
            </label>
          </div>
          <div class="umodal-search">&nbsp;</div>
          <label class="umodal-label am-form-label" for="">导购提成：</label>
          <div class="umodal-normal am-text-left">
            <label class="am-radio-inline">
              <input type="radio" name="radio1" value="male" data-am-ucheck> 参与
            </label>
            <label class="am-radio-inline">
              <input type="radio" name="radio1" value="female" data-am-ucheck> 不参与
            </label>
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

<div id="uemployee_managem3" class="am-modal" tabindex="-1" style="min-height:291px;">
  <div class="am-modal-dialog umodal">
    <div class="am-modal-hd uhead">工作内容
      <a href="javascript:void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd umain1">
      <div class="am-tabs uleft" data-am-tabs="{noSwipe: 1}">
        <ul class="am-tabs-nav am-nav am-nav-tabs">
          <li class="am-active"><a href="#tab1">可选工作内容</a></li>
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
          <li class="ub-head3">名称</li>
          <li class="ub-head2">操作</li>
        </ul>
        <ul class="ub">
          <li>
            <div class="ub4">服务一（38元）</div>
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
<div id="uemployee_managem4" class="am-modal" tabindex="-1" style="min-height:291px;">
  <div class="am-modal-dialog umodal">
    <div class="am-modal-hd uhead">工作内容
      <a href="javascript:void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd umain1">
      <div class="am-tabs uleft" data-am-tabs="{noSwipe: 1}">
        <ul class="am-tabs-nav am-nav am-nav-tabs">
          <li class="am-active"><a href="#tab1">可选工作内容</a></li>
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
          <li class="ub-head3">名称</li>
          <li class="ub-head2">操作</li>
        </ul>
        <ul class="ub">
          <li>
            <div class="ub4">服务一（38元）</div>
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
<!-- 侧拉框 -->
<div id="uoffcanvas" class="am-offcanvas" >
  <div class="am-offcanvas-bar am-offcanvas-bar-flip goffcanvas" style="width: 690px;">
    <div class="am-offcanvas-content" >
      <div class="am-modal-hd"><span class="utitle">员工详细信息</span>
        <a href="javascript: void(0)" class="am-close am-close-spin doc-oc-js uclose2" data-rel="close"><img src="../img/close.jpg"></a>
      </div>
      <div class="gspace15"></div>
      <div class="am-g ucontent">
        <div class="am-u-lg-6">分店：<span>二七广场店</span></div>
        <div class="am-u-lg-6">员工分组：<span>店员</span></div>
        <div class="am-u-lg-6">员工姓名：<span>张小明</span></div>
        <div class="am-u-lg-6">员工编号：<span>HY1001</span></div>
        <div class="am-u-lg-6">　　性别：<span>男</div>
        <div class="am-u-lg-6">出生日期：<span>1990-03-11</span></div>
        <div class="am-u-lg-6">手机号码：<span>13131124545</span></div>
        <div class="am-u-lg-6">身份证号：<span>410205188203930022</span></div>
        <div class="am-u-lg-6">最高学历：<span>高中</span></div>
        <div class="am-u-lg-6">入职时间：<span>2008-02-01</span></div>
        <div class="am-u-lg-6">居信住址：<span>郑州市人民路与XXX路交叉口</span></div>
        <div class="am-u-lg-6">基本工资：<span>2000</span></div>
        <div class="am-u-lg-6">参与预约：<span>参与</span></div>
        <div class="am-u-lg-6">导购提成：<span>参与</span></div>
        <div class="am-u-lg-12">工作内容：<span>理疗，理发，洗头</span></div>
        <div class="am-u-lg-12 gspace15"></div>
        <label class="am-u-lg-6">照片</label>
        <label class="am-u-lg-6">身份证</label>
        <div class="am-u-lg-6"><img src="../img/wu.jpg"></div>
        <div class="am-u-lg-6"><img src="../img/wu.jpg"></div>
      </div>
    </div>
  </div>
</div>
<!-- 删除框 -->
<div id="cconfirm" class="am-modal am-modal-confirm" tabindex="-1">
  <div class="am-modal-dialog uconfirm">
    <div class="am-modal-hd uhead"><b>删&nbsp;&nbsp;&nbsp;&nbsp;除&nbsp;&nbsp;&nbsp;&nbsp;提&nbsp;&nbsp;&nbsp;&nbsp;醒</b></div>
    <div class="am-modal-bd">
      你，确定要删除这条记录吗?
    </div>
    <div class="am-modal-footer">
      <span class="am-modal-btn" data-am-modal-cancel>取消</span>
      <span class="am-modal-btn" data-am-modal-confirm>确定</span>
    </div>
  </div>
</div> 
<script src="../js/jquery.min.js"></script>
<script src="../js/amazeui.min.js"></script>
<script>
//下一步
$('.cmodelopen').on('click', function(e) {
  $('#uemployee_managem1').modal('close');
  $('#uemployee_managem3').modal('open');
});
$('.cmodelopen3').on('click', function(e) {
  $('#uemployee_managem2').modal('close');
  $('#uemployee_managem4').modal('open');
});
//上一步
$('.cmodelopen2').on('click', function(e) {
  $('#uemployee_managem3').modal('close');
  $('#uemployee_managem1').modal('open');
});
$('.cmodelopen4').on('click', function(e) {
  $('#uemployee_managem4').modal('close');
  $('#uemployee_managem2').modal('open');
});

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
/*右侧弹出框关闭按钮JS*/
$(function() {
  var id = '#uoffcanvas';
  var $myOc = $(id);
  $('.doc-oc-js').on('click', function() {
    $myOc.offCanvas($(this).data('rel'));
  });
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

// 添加
$('.cadd').on('click', function(){
  var product = $(this).prev().text();
  var addhtml ='<li><div class="ub4">'+product+'</div><div class="ub3 cdel2"><a href="javascript:;">移除</a></div></li>';
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
</script>
</body>
</html>
