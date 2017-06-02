<?php echo $this->fun_fetch('inc_head', ''); ?>
<body id="ubody">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_leftbar', ''); ?>
<div id="ugoods_diy" class="gcontent">
  <ul class="am-nav am-nav-pills ubread">
    <li class="am-active"><a href="#">店铺私有商品</a></li>
    <li><a href="goods_diy_cate.php">商品分类</a></li>
  </ul>
  <div class="gspace15"></div>
  <div class="utools">
    <form class="am-form-inline uform2">
      <div class="am-form-group">
        商品信息： 
        <input class="am-form-field uinput" type="text" name="">
      </div>
      <div class="am-form-group">
        商品分类： 
        <select class="uselect" data-am-selected name="">
          <option value="all">全部</option>
          <option value="2">2</option>
          <option value="3">3</option>
        </select>
      </div>
    </form> 
    <button class="am-btn ubtn-sure ubtn-blue" data-am-modal="{target: '#ugoods_diym1'}">
    <i class="iconfont icon-question"></i>
      新增商品
    </button>
  </div>
  <div class="gspace15"></div>
  <table class="am-table am-table-bordered am-table-hover am-table-compact utable1" id="doc-modal-list">
    <thead>
      <tr>
        <td>商品分类</td>
        <td>商品编码</td>
        <td>商品名称</td>
        <td>商品价格</td>
        <td>会员价格</td>
        <td>是否库存</td>
        <td style="width: 12%;">操作</td>
      </tr>
    </thead>  
    <tr>
      <td>纽崔莱</td>
      <td>saa</td>
      <td>蛋白粉</td>
      <td class="gtext-orange">560元</td>
      <td class="gtext-orange">500元</td>
      <td>是</td>
      <td>
        <button class="am-btn ubtn-table ubtn-green" data-am-modal="{target: '#ugoods_diym2'}">
          <i class="iconfont icon-bianji"></i>
          编辑
        </button>
        <button class="am-btn ubtn-table ubtn-gray cdel">
          <i class="iconfont icon-shanchu"></i>
          删除
        </button>
      </td>
    </tr>
    <tr>
      <td>纽崔莱</td>
      <td>saa</td>
      <td>蛋白粉</td>
      <td class="gtext-orange">560元</td>
      <td class="gtext-orange">500元</td>
      <td>是</td>
      <td>
        <button class="am-btn ubtn-table ubtn-green" data-am-modal="{target: '#ugoods_diym2'}">
          <i class="iconfont icon-bianji"></i>
          编辑
        </button>
        <button class="am-btn ubtn-table ubtn-gray cdel">
          <i class="iconfont icon-shanchu"></i>
          删除
        </button>
      </td>
    </tr>
    <tr>
      <td>纽崔莱</td>
      <td>saa</td>
      <td>蛋白粉</td>
      <td class="gtext-orange">560元</td>
      <td class="gtext-orange">500元</td>
      <td>是</td>
      <td>
        <button class="am-btn ubtn-table ubtn-green" data-am-modal="{target: '#ugoods_diym2'}">
          <i class="iconfont icon-bianji"></i>
          编辑
        </button>
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
<div class="am-modal" tabindex="-1" id="ugoods_diym1">
  <div class="am-modal-dialog umodal">
    <div class="am-modal-hd uhead">新增商品
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd umain1">
      <form class="am-form am-form-horizontal" id="cadd">
        <div class="am-form-group">
          <label class="am-u-lg-3 am-form-label" for="">商品分类</label>
          <div class="am-u-lg-4 am-u-end am-u-end">
            <select class="uselect uselect-max" data-am-selected>
              <option value="a">Apple</option>
              <option value="b">Banana</option>
              <option value="o">Orange</option>
              <option value="m">Mango</option>
              <option value="d">禁用</option>
            </select>
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-3 am-form-label" for="">商品名称</label>
          <div class="am-u-lg-4">
            <input type="text" id="cgoodsname" class="am-form-field uinput uinput-max" onKeyUp="query()" required>
          </div>
          <div class="am-u-lg-2 am-u-end">
            <input type="text" id="cupen" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-3 am-form-label" for="">商品价格</label>
          <div class="am-u-lg-4 am-u-end">
            <input type="text" class="am-form-field uinput uinput-max" data-foolish-msg="把 密码交出来！" required>
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-3 am-form-label" for="">商品编码</label>
          <div class="am-u-lg-4 am-u-end am-u-end">
            <input type="text" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-3 am-form-label" for="">是否参与库存</label>
          <div class="am-u-lg-4 am-u-end am-u-end">
            <label class="am-checkbox-inline">
              <input type="checkbox" data-am-ucheck value="1"> 参与库存计算
            </label>
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-3 am-form-label" for="">会员价格</label>
          <div class="am-u-lg-4 am-u-end am-u-end">
            <input type="text" class="am-form-field uinput uinput-max">
          </div>
        </div>
      </form>
    </div>
    <div class="am-modal-footer ufoot">
      <div class="am-btn-group">
        <button type="button" class="am-btn ubtn-sure ubtn-green cadd-form"><i class="iconfont icon-yuanxingxuanzhong"></i>
          完成并继续添加
        </button>
        <button type="button" class="am-btn ubtn-sure ubtn-green cadd-form"><i class="iconfont icon-yuanxingxuanzhong"></i>
          完成
        </button>
      </div>
    </div>
  </div>
</div>

<div class="am-modal" tabindex="-1" id="ugoods_diym2">
  <div class="am-modal-dialog umodal">
    <div class="am-modal-hd uhead">修改商品
      <a href="javascript: void(0)" class="am-close am-close-spin uclose" data-am-modal-close><img src="../img/close.jpg"></a>
    </div>
    <div class="am-modal-bd umain1">
      <form class="am-form am-form-horizontal" id="cadd">
        <div class="am-form-group">
          <label class="am-u-lg-3 am-form-label" for="">商品分类</label>
          <div class="am-u-lg-4 am-u-end am-u-end">
            <select class="uselect uselect-max" data-am-selected>
              <option value="a">Apple</option>
              <option value="b">Banana</option>
              <option value="o">Orange</option>
              <option value="m">Mango</option>
              <option value="d">禁用</option>
            </select>
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-3 am-form-label" for="">商品名称</label>
          <div class="am-u-lg-4">
            <input type="text" id="cgoodsname2" class="am-form-field uinput uinput-max" onKeyUp="query()" required>
          </div>
          <div class="am-u-lg-2 am-u-end">
            <input type="text" id="cupen2" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-3 am-form-label" for="">商品价格</label>
          <div class="am-u-lg-4 am-u-end">
            <input type="text" class="am-form-field uinput uinput-max" data-foolish-msg="把 密码交出来！" required>
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-3 am-form-label" for="">商品编码</label>
          <div class="am-u-lg-4 am-u-end am-u-end">
            <input type="text" class="am-form-field uinput uinput-max">
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-3 am-form-label" for="">是否参与库存</label>
          <div class="am-u-lg-4 am-u-end am-u-end">
            <label class="am-checkbox-inline">
              <input type="checkbox" data-am-ucheck value="1"> 参与库存计算
            </label>
          </div>
        </div>
        <div class="am-form-group">
          <label class="am-u-lg-3 am-form-label" for="">会员价格</label>
          <div class="am-u-lg-4 am-u-end am-u-end">
            <input type="text" class="am-form-field uinput uinput-max">
          </div>
        </div>
      </form>
    </div>
    <div class="am-modal-footer ufoot">
      <div class="am-btn-group">
        <button type="button" class="am-btn ubtn-sure ubtn-green cadd-form"><i class="iconfont icon-yuanxingxuanzhong"></i>
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
<script src="../js/amazeui.min.js"></script>
<script src="../js/pinying.js"></script>
<script>
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
//根据文本框输入的汉字自动获取汉字拼音首字母到下拉列表中，支持多音字，需引入库pinying.js
function query(){
      $("#cupen").val(null);
      var str = $("#cgoodsname").val().trim();
      if(str == "") return;
      // console.log(str);
      var arrRslt = makePy(str);
      $("#cupen").val(arrRslt);
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