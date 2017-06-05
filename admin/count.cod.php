<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>
<!-- content -->
<div class="gcontent" id="ucount">
  <ul class="am-nav am-nav-pills ubread">
    <li class="am-active"><a href="javascript: void(0);">统计数据表</a></li>
    <li><a href="count_rank.php">商品销售排名</a></li>
    <li><a href="count_business.php">营业数据曲线</a></li>
    <li><a href="count_income.php">收入组成曲线</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="utools">
    <form class="am-form-inline uform">
      <div class="am-form-group">
        开卡店铺：
        <select class="uselect" data-am-selected name="">
          <option value="all">全部</option>
          <option value="2">2</option>
          <option value="3">3</option>
        </select>
      </div>
      <div class="am-form-group">
        卡类型：
        <select class="uselect" data-am-selected name="">
          <option value="all">全部</option>
          <option value="2">2</option>
          <option value="3">3</option>
        </select>
      </div>
      <div class="am-form-group">
        <label for="doc-ipt-3" class="am-form-label">查询内容：</label>
        <input type="text" class="am-form-field uinput uinput140" placeholder="卡号/手机号/姓名" name="">
      </div>
      <div class="am-form-group">
        查询范围：从
        <div class="am-input-group am-datepicker-date udatepicker" data-am-datepicker="{format:'yyyy-mm-dd'}">
          <input type="text" class="am-form-field">
          <span class="am-input-group-btn am-datepicker-add-on">
            <button class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span></button>
          </span>
        </div>
        至
        <div class="am-input-group am-datepicker-date udatepicker" data-am-datepicker="{format:'yyyy-mm-dd'}">
          <input type="text" class="am-form-field">
          <span class="am-input-group-btn am-datepicker-add-on">
            <button class="am-btn am-btn-default" type="button"><span class="am-icon-calendar"></span></button>
          </span>
        </div>
      </div>
      <div class="am-form-group">
        <button type="submit" class="am-btn ubtn-search">
          <i class="iconfont icon-search"></i>查询
        </button>
      </div>
    </form>
  </div>
  <div class="gspace15"></div>
  <div class="ua">
    <div class="ua1 ua1-1">收入</div>
    <div class="ua2">
      <div class="ua2a"><span>0</span>&nbsp;元</div>
      <div>店铺实收</div>
      <div class="ua2c">(会员卡扣不计入实收)</div>
    </div>
    <ul class="ua3">
      <li>现金付款：<span>0</span>元（会员付款：0元，散客付款：0元）</li>
      <li>银行卡付款：<span>0</span>元（会员付款：0元，散客付款：0元）</li>
      <li>团购付款：<span>0</span>元（会员付款：0元，散客付款：0元）</li>
      <li>会员卡扣：<span>0</span>元</li>
    </ul>
  </div>
  <div class="gspace20"></div>
  <div class="ua">
    <div class="ua1 ua1-2">新增<br/>会员</div>
    <div class="ua2">
      <div class="gspace15"></div>
      <div class="ua2a"><span>0</span>&nbsp;人</div>
      <div>新增会员</div>
    </div>
    <ul class="ua3">
      <li>新增会员：0 人  </li>
      <li>折卡会员消费：0次，消费金额：0元。</li>
      <li>次卡会员消费：0次。</li>
      <li>时卡会员消费：0次。</li>
      <li>无卡消费：0次，消费金额：0元。</li>
    </ul>
  </div>  
  <div class="gspace20"></div>

  <div class="ua">
    <div class="ua1 ua1-3">全部<br/>会员</div>
    <div class="ua2">
      <div class="gspace15"></div>
      <div class="ua2a"><span>3</span>&nbsp;人</div>
      <div>全部会员</div>
    </div>
    <ul class="ua3">
      <li>全部会员：3人  (8折卡1张，10次卡2张)</li>
      <li>正常会员：3人  (8折卡1张，10次卡2张)</li>
      <li>停用会员：0人  </li>
      <li>过期会员：1人  (10次卡1张)</li>
      <li>全部会员卡累计储值余额：404元</li>
    </ul>
  </div>    
  <div class="gspace20"></div>
  <div class="ua">
    <div class="ua1 ua1-4">商品</div>
    <div class="ua2">
      <div class="gspace15"></div>
      <div class="ua2a"><span>0</span>&nbsp;元</div>
      <div>商品销售额</div>
    </div>
    <ul class="ua3">
      <div class="gspace25"></div>
      <li>商品销售量：，商品销售额：0元。</li>
      <li><a href="#">查看商品销售排名</a></li>
      <div class="gspace25"></div>
    </ul>
  </div> 
  <div class="gspace20"></div>
</div>
<script src="../js/jquery.min.js"></script>
<script src="../js/amazeui.min.js"></script>
</body>
</html>