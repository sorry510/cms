<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title></title>
    <script src="js/mui.min.js"></script>
    <script src="js/iconfont.js"></script>
    <link href="css/mui.min.css" rel="stylesheet"/>
    <link href="css/laimi.css" rel="stylesheet"/>
    <style type="text/css">
			.laimi-list-div{margin:0px;padding:10px 12px;margin-top:6px;}
    </style>
</head>
<body id="laimi-body">
<header class="mui-bar mui-bar-nav">
	<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
	<h1 class="mui-title">
		<form method="post" action="list.php">
			<input type="search" name="search" placeholder="搜索商品，很多好货哦~" style="background-color:#FFFFFF;font-size:14px;color:#8F8F94;width:100%;">
		</form>
	</h1>
	<a class="mui-pull-right laimi-font14" href="class.html">
		<svg class="laimi-icon5" aria-hidden="true" style="margin-top:12px;color:#AAAAAA;">
		    <use xlink:href="#icon-fenlei4"></use>
		</svg>
	</a>
</header>
<?php echo $this->fun_fetch('inc_foot', ''); ?>
<!--下拉刷新容器-->
<div id="refreshContainer" class="mui-content mui-scroll-wrapper">
  <div class="mui-scroll">
  	<div style="line-height:32px;height:32px;background-color:#FFFFFF;color:#6D6D72;">
			<span style="margin-left:30px;font-size:12px;">
				<svg class="laimi-icon4" aria-hidden="true">
				    <use xlink:href="#icon-duigou1"></use>
				</svg>
				优选好货
			</span>
			<span style="margin-left:30px;font-size:12px;">
				<svg class="laimi-icon4" aria-hidden="true">
				    <use xlink:href="#icon-duigou1"></use>
				</svg>
				30天退换
			</span>
			<span style="margin-left:30px;font-size:12px;">
				<svg class="laimi-icon4" aria-hidden="true">
				    <use xlink:href="#icon-duigou1"></use>
				</svg>
				精选热门品牌
			</span>
		</div>
    <!--数据列表-->
    <ul class="mui-table-view mui-table-view-chevron laimi-showlist" style="background: #efeff4">
      
    </ul>
  </div>
</div>
<script type="text/javascript" charset="utf-8">
  mui.init({
		pullRefresh: {
			container: '#refreshContainer',
			up: {
				auto:true,
				contentrefresh: '正在加载...',
				callback: pullupRefresh
			}
		}
	});
  var page = {
  	allcount : 0,
  	pagecount: 1,
  	pagenext: 1,
  	pagenow: 1,
  	pagepre: 1,
  };
  mui('body').on('tap', 'a', function(){document.location.href=this.href;});//mui阻止href跳转，模拟一下
  /**
   * 上拉加载具体业务实现
   */
  function pullupRefresh() {
  	var name = "<?php echo $GLOBALS['sqlname'];?>";
  	var catalog_id = "<?php echo $GLOBALS['intcatalog_id'];?>"
		mui.getJSON('wgoods_ajax.php', {type: 2, size: 2 , name:name,catalog_id:catalog_id ,page: page.pagenext}, function(res){
			console.log(name);
			if(res.list.length > 0){
				page = res.page;
				mui.each(res.list, function(k, v){
					var li = document.createElement('li');
							li.className = 'mui-card mui-table-view-cell laimi-list-div';
					var html = '';
					var src = '../upload/<?php echo api_value_int0($GLOBALS['_SESSION']['login_cid']); ?>/wgoods_image/'+v.photo;
					html += '<a href="detail.php?id='+v.wgoods_id+'">'+
						        '<img class="mui-media-object mui-pull-left" style="max-width:100px;height:100px;" src="'+src+'">'+
						        '<div class="mui-media-body" style="white-space:normal;">'+v.wgoods_name+
						        	'<p class="laimi-font12">'+v.wgoods_name2+'</p>'+
						        	'<p style="color:#CF2D28;font-size:12px;margin-top:3px;line-height:30px;">¥<span style="font-size:20px;">'+v.min_price+'</span>&nbsp;';
						        	if (v.act_discount_id != 0) {
						        		html +='<span style="background-color:#CF2D28;color:#FFFFFF;font-size:10px;border-radius:2px; padding:2px 3px 0px 3px;">'+'限时打折'+'</span>';
						        	}
						        	html += '</p>'+
						        	'<p class="mui-pull-left laimi-font12">共有1250条评价</p>'+
						        '</div>'+
						      '</a>';
					li.innerHTML = html;
					mui('.laimi-showlist')[0].appendChild(li);
				})
				if(page.pagenow - page.pagecount >= 0){
					mui('#refreshContainer').pullRefresh().endPullupToRefresh(true);
				}else{
					mui('#refreshContainer').pullRefresh().endPullupToRefresh(false);
				}
			}else{
				mui('#refreshContainer').pullRefresh().endPullupToRefresh(true);
			}
		});
  }
</script>
</body>
</html>