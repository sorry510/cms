<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="zh-CN" xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php echo $this->fun_fetch('inc_head', ''); ?>
</head>
<body class="layui-layout-body">
	<div class="layui-layout layui-layout-admin">
<?php echo $this->fun_fetch('inc_top', ''); ?>
<?php echo $this->fun_fetch('inc_left', ''); ?>
		<div id="laimi-content" class="layui-body">
			<div class="layui-tab layui-tab-brief">
				<ul class="layui-tab-title">
					<li class="layui-this">
						<a href="mcombo2.php">计时套餐</a>
					</li>
				</ul>
				<div id="laimi-main" class="p-mcombo2 layui-tab-content">
<form class="layui-form">
	<div class="laimi-tools layui-form-item">		
		<label class="layui-form-label">商品</label>
		<div class="layui-input-inline last">
			<input class="layui-input laimi-input-200" type="text" value="<?php echo $this->_data['request']['search']?>" name="search" placeholder="商品名称/编码/简拼">
		</div>
		<div class="layui-input-inline">
			<button class="layui-btn layui-btn-normal">搜索</button>
		</div>
		<div class="laimi-float-right">
			<a href="mcombo2_add.php" class="layui-btn">新增计时套餐</a>
		</div>
	</div>
</form>
<table class="layui-table">
	<thead>
		<tr>
			<th>套餐名称</th>
			<th>编码</th>
			<th>商品价格</th>
			<th>会员价格</th>
			<th>有效期</th>
			<th>活动</th>
			<th>预约</th>
			<th>状态</th>
			<th width="180">操作</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($this->_data['mcombo_time_list']['list'] as $row) { ?>
		<tr>
			<td title="<?php echo $row['mcombo_name']; ?>"><a href="#" class="laimi-info laimi-color-lan" mcombo_id="<?php echo $row['mcombo_id'];?>"><?php echo $row['mcombo_name']; ?></a></td>
			<td><?php echo $row['mcombo_code']; ?></td>
			<td>¥<?php echo $row['mcombo_price']; ?></td>
			<td><?php echo $row['mcombo_cprice']==0?'--':'¥'.$row['mcombo_cprice']; ?></td>
			<td><?php echo $row['mcombo_limit_type'] == '2'?$row['mcombo_limit_days'].'天':'不限期' ;?></td>
			<td><i class="layui-icon <?php echo $row['mcombo_act']==1?'laimi-icon-dui':'laimi-icon-cuo';?>">&#x1005;</i></td>
			<td><i class="layui-icon <?php echo $row['mcombo_reserve']==1?'laimi-icon-dui':'laimi-icon-cuo';?>">&#x1005;</i></td>
			<td>正常</td>
			<td>
				<button onclick="window.location.href='mcombo2_edit.php?id=<?php echo $row['mcombo_id'];?>'" class="layui-btn layui-btn-mini" value="<?php echo $row['mcombo_id']; ?>">
					<svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-bianji"></use></svg>
					修改
				</button>
				<?php if($row['mcombo_state'] == 1){
                echo '<button class="layui-btn layui-bg-red layui-btn-mini laimi-state" value="'.$row["mcombo_id"].'" >
                        <svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-tingyong"></use></svg>
                        停用
                      </button>';
              }else if($row['mcombo_state'] == 2){
                echo '<button class="layui-btn layui-bg-blue layui-btn-mini laimi-state" value="'.$row["mcombo_id"].'" >
                        <svg class="laimi-bicon" aria-hidden="true"><use xlink:href="#icon-dui"></use></svg>
                        启用
                      </button>';
              }
        ?>
				<button class="layui-btn layui-btn-primary layui-btn-mini laimi-del" value="<?php echo $row["mcombo_id"] ?>">
					<svg class="laimi-hicon" aria-hidden="true"><use xlink:href="#icon-tingyong"></use></svg>
					删除
				</button>
			</td>
		</tr>
		<?php }; ?>
	</tbody>
</table>
<div class="laimi-page">
	<div id="laimi-page-content"></div>
</div>
				</div>
			</div>
		</div>
	</div>
	<!--电子档案明细弹出层开始-->
	<script type="text/html" id="laimi-info">
	<div id="laimi-modal-info" class="laimi-modal">
		<div class="layui-row">   
	    <div class="layui-col-md6">
	      <div class="layui-form-item" style="margin-bottom:-6px;">
			    <label class="layui-form-label">套餐名称</label>
			    <div class="layui-form-mid layui-word-aux">康师傅绿茶500ml</div>
			  </div>
	    </div>
	    <div class="layui-col-md6">
	      <div class="layui-form-item" style="margin-bottom:-6px;">
			    <label class="layui-form-label">套餐编码</label>
			    <div class="layui-form-mid layui-word-aux">1001321231101</div>
			  </div>
	    </div>
	     <div class="layui-col-md6">
	      <div class="layui-form-item" style="margin-bottom:-6px;">
			    <label class="layui-form-label">有效期</label>
			    <div class="layui-form-mid layui-word-aux">180天</div>
			  </div>
	    </div>
	    <div class="layui-col-md6">
	      <div class="layui-form-item" style="margin-bottom:-6px;">
			    <label class="layui-form-label">套餐价格</label>
			    <div class="layui-form-mid layui-word-aux">¥35.00</div>
			  </div>
	    </div>
	    <div class="layui-col-md6">
	      <div class="layui-form-item" style="margin-bottom:-6px;">
			    <label class="layui-form-label">会员价格</label>
			    <div class="layui-form-mid layui-word-aux">¥25.00</div>
			  </div>
	    </div>	   
	    <div class="layui-col-md6">
	      <div class="layui-form-item" style="margin-bottom:-6px;">
			    <label class="layui-form-label">参于活动</label>
			    <div class="layui-form-mid layui-word-aux"><i class="layui-icon laimi-icon-dui">&#x1005;</i></div>
			  </div>
	    </div>	    
	    <div class="layui-col-md6">
	      <div class="layui-form-item" style="margin-bottom:-6px;">
			    <label class="layui-form-label">参于预约</label>
			    <div class="layui-form-mid layui-word-aux"><i class="layui-icon laimi-icon-dui">&#x1007;</i></div>
			  </div>
	    </div>
	    <div class="layui-col-md6">
	      <div class="layui-form-item" style="margin-bottom:-6px;">
			    <label class="layui-form-label">套餐状态</label>
			    <div class="layui-form-mid layui-word-aux">正常</div>
			  </div>
	    </div>
	    <div class="layui-col-md12">
	      <div class="layui-form-item" style="margin-bottom:-6px;">
			    <label class="layui-form-label">套餐内容</label>
			    <div class="layui-form-mid layui-word-aux laimi-input-b80">
			    	<table class="layui-table">
					  <thead>
					    <tr>
					      <th>商品</th>
					      <th>价格</th>
					    </tr> 
					  </thead>
					  <tbody>
					    <tr>
					      <td>康师傅绿茶</td>
					      <td>¥25.00</td>
							</tr>
					    <tr>
					      <td>康师傅绿茶</td>
					      <td>¥25.00</td>
					    </tr>
					    <tr>
					      <td>康师傅绿茶</td>
					      <td>¥25.00</td>
					    </tr>
					  </tbody>
					</table>
		    </div>
		  </div>
    </div>
	</div>
	</script>
<!--电子档案明细弹出层结束-->
<?php echo $this->fun_fetch('inc_foot', ''); ?>
	<script>
	layui.use(["element", "laypage", "form"], function() {
		var $ = layui.jquery;
		var objlayer = layui.layer;
		var objelement = layui.element;
		var objpage = layui.laypage;
		var objform = layui.form;
		objpage.render({
			elem: 'laimi-page-content',
			count: <?php echo $this->_data['mcombo_time_list']['allcount'];?>,
			limit: 50,
			curr: <?php echo $this->_data['mcombo_time_list']['pagenow'];?>,
			layout: ['count', 'prev', 'page', 'next',  'skip'],
			jump: function(obj,first) {
				var search = "<?php echo api_value_query($this->_data['request']);?>";
				var url = window.location.pathname+'?'+'page='+obj.curr+'&'+search;
				if(!first){
					window.location.href = url;
        }
			}
		});
		$(".laimi-info").on("click", function() {
			objlayer.open({
				type: 1,
				title: ["计时套餐", "font-size:16px;"],
				btnAlign: "r",
				offset: 'rt',
				anim: 7,
				area: ["800px", "100%"],
				shadeClose: true,//点击遮罩关闭
				content: $("#laimi-info").html()
			});
			var url="act_give_edit_ajax.php";
		  var data = $(this).val();
		  $.getJSON(url,{id:data},function(res){
		  	console.log(res);
		    $("#laimi-modal-edit input[name='txtid']").val(res.act_give_id);
		    $("#laimi-modal-edit input[name='txtname']").val(res.act_give_name);
		    $("#laimi-modal-edit input[name='txtman']").val(res.act_give_man);
		    $("#laimi-modal-edit textarea[name='txtmemo']").val(res.act_give_memo);
		    $("#laimi-modal-edit option").each(function () {
		    	if (res.act_give_ttype==1) {
		    		if($(this).val()==(res.act_give_ttype+','+res.ticket_money_id)){
	            $(this).attr('selected',true);
	          }
		    	}else{
		    		if($(this).val()==(res.act_give_ttype+','+res.ticket_goods_id)){
	            $(this).attr('selected',true);
	          }
		    	}
	      });
		  });
		});
		//删除操作JS
	  $(".laimi-del").on("click", function() {
			var id = $(this).val();
			objlayer.confirm('你确定要删除吗', {icon: 0, title:'提示',shadeClose: true}, function(index){
			  $.post('mcombo_delete_do.php', {id:id}, function(res){
			  	if(res == 0){
			  		window.location.reload();
			  	}else{
			  		objlayer.alert('删除失败，请联系管理员', {
			  			title: '提示信息'
			  		});
			  	}
			  })
			  objlayer.close(index);
			});
		})
		//停止启用JS
	  $(".laimi-state").on("click", function() {
			var id = $(this).val();
			objlayer.confirm('你确定要修改吗', {icon: 0, title:'提示',shadeClose: true}, function(index){
			  $.post('mcombo_state_do.php', {id:id}, function(res){
			  	if(res == 0){
			  		window.location.reload();
			  	}else{
			  		objlayer.alert('修改失败，请联系管理员', {
			  			title: '提示信息'
			  		});
			  	}
			  })
			  objlayer.close(index);
			});
		})
	});
	</script>
</body>
</html>