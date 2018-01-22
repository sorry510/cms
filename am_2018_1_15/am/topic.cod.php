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
</head>
<body id="laimi-body">
<header class="mui-bar mui-bar-nav">
	<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
	<h1 class="mui-title laimi-font14">热门专题</h1>
	<a class="mui-pull-right laimi-font14">
		<svg class="laimi-icon5" aria-hidden="true" style="margin-top:12px;color:#AAAAAA;">
		    <use xlink:href="#icon-fenxiang"></use>
		</svg>
	</a>
</header>
<div id="refreshContainer" class="mui-content mui-scroll-wrapper">
	<div class="mui-scroll">
		<!--数据列表-->
    <ul class="mui-card mui-table-view mui-table-view-cell laimi-showlist" style="background: #efeff4">
      
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
  /**
   * 上拉加载具体业务实现
   */
  function pullupRefresh() {
		mui.getJSON('wgoods_ajax.php', {type: 1, size: 2,page: page.pagenext}, function(res){
			if(res.list.length > 0){
				page = res.page;
				mui.each(res.list, function(k, v){
					var li = document.createElement('li');
							li.className = 'mui-card mui-table-view mui-table-view-cell';
					var html = '';
					html += '<a href="detail.php?id='+v.wgoods_id+'">'+
										'<div class="mui-table">'+
											'<div class="mui-table-cell" style="text-align:center;">'+
												'<img src="read_image.php?c=<?php echo $GLOBALS["_SESSION"]["login_cid"];?>&type=wgoods&image='+v.photo+'" style="width:100%"/>'+
												'<h5 style="font-size:14px;color:#000000;">'+v.wgoods_name+'</h5>'+
											'</div>'+
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