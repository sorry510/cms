<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <title></title>
    <link href="css/mui.min.css" rel="stylesheet"/>
    <link href="css/laimi.css" rel="stylesheet"/> 
</head>
<body id="laimi-body">
<header class="mui-bar mui-bar-nav">
	<div class="mui-input-row mui-search" style="width:96%;margin:0 auto;">
		<input type="search" placeholder="搜索商品，很多好货哦~" style="background-color:#FFFFFF;font-size:14px;color:#8F8F94;">
	</div>
</header>
<?php echo $this->fun_fetch('inc_foot', ''); ?>
<div id="laimi-content" class="mui-content mui-scroll-wrapper">
	<div class="mui-scroll">
		<div id="slider" class="mui-slider" style="margin-top:0px;">
			<div class="mui-slider-group mui-slider-loop">
				<!-- 额外增加的一个节点(循环轮播：第一个节点是最后一张轮播) -->
				<div class="mui-slider-item mui-slider-item-duplicate">
					<a href="#"><img src="img/ad3.jpeg"></a>
				</div>
				<!-- 第一张 -->
				<div class="mui-slider-item">
					<a href="#"><img src="img/ad1.jpeg"></a>
				</div>
				<!-- 第二张 -->
				<div class="mui-slider-item">
					<a href="#"><img src="img/ad2.jpeg"></a>
				</div>
				<!-- 第三张 -->
				<div class="mui-slider-item">
					<a href="#"><img src="img/ad3.jpeg"></a>
				</div>
				<!-- 额外增加的一个节点(循环轮播：最后一个节点是第一张轮播) -->
				<div class="mui-slider-item mui-slider-item-duplicate">
					<a href="#">
						<img src="img/ad1.jpeg">
					</a>
				</div>
			</div>
			<div class="mui-slider-indicator">
				<div class="mui-indicator mui-active"></div>
				<div class="mui-indicator"></div>
				<div class="mui-indicator"></div>
			</div>
		</div>
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
		<div style="line-height:32px;height:32px;background-color:#FFFFFF;color:#FFA500;margin-top:6px;">
			<marquee behavior="scroll">
				<span style="margin-left:15px;font-size:12px;">
					<svg class="laimi-icon4" aria-hidden="true" style="color:#FFA500;">
					    <use xlink:href="#icon-tongzhi"></use>
					</svg>
					<?php echo $this->_data['notice'][0]['wnotice_title']; ?>
				</span>
			</marquee>
		</div>
		<div class="mui-row" style="margin-top:6px;background-color:#FFFFFF;">
			<div class="mui-col-sm-3" style="width:25%;padding:10px;">
	      <a href="list.html">
	      	<div style="margin:0 auto; background-color:#009688;height:43px;width:43px;border-radius:30px;text-align:center;">
	      		<svg class="laimi-icon3" aria-hidden="true" style="color:#FFFFFF;margin-top:7px;">
				    <use xlink:href="#icon-fenlei1"></use>
						</svg>				
	        </div>
	        <div style="font-size:12px;color:#555555;line-height:24px; text-align:center;">全部分类</div>
				</a>
	    </div>
	    <div class="mui-col-sm-3" style="width:25%;padding:10px;">
	    	<a href="shop.html">
		    	<div style="margin:0 auto; background-color:#5FB878;height:43px;width:43px;border-radius:30px;text-align:center;">
		    		<svg class="laimi-icon3" aria-hidden="true" style="color:#FFFFFF;margin-top:7px;">
				    <use xlink:href="#icon-zhuanti"></use>
						</svg>				
		    	</div>
		    	<div style="font-size:12px;color:#555555;line-height:24px; text-align:center;">热门专题</div>
				</a>
	    </div>
	    <div class="mui-col-sm-3" style="width:25%;padding:10px;">
	    	<a href="shop.html">
		    	<div style="margin:0 auto; background-color:#FFB800;height:43px;width:43px;border-radius:30px;text-align:center;">
		    		<svg class="laimi-icon3" aria-hidden="true" style="color:#FFFFFF;margin-top:7px;">
				    <use xlink:href="#icon-gouwuche"></use>
						</svg>				
	    		</div>
	    		<div style="font-size:12px;color:#555555;line-height:24px; text-align:center;">购物车</div>
				</a>
	    </div>
	    <div class="mui-col-sm-3" style="width:25%;padding:10px;">
	    	<a href="./index.php">
		    	<div style="margin:0 auto; background-color:#01AAED;height:43px;width:43px;border-radius:30px;text-align:center;">
		    		<svg class="laimi-icon3" aria-hidden="true" style="color:#FFFFFF;margin-top:7px;">
				    <use xlink:href="#icon-huiyuanzhongxinxian"></use>
						</svg>				
		    	</div>
		    	<div style="font-size:12px;color:#555555;line-height:24px; text-align:center;">会员中心</div>
				</a>
	    </div>
	  </div>
	  <ul class="mui-table-view" style="margin-top:6px;">
			<li class="mui-table-view-cell">
				<a class="mui-navigate-right" style="font-size:14px;">
					<span class="mui-badge mui-badge-inverted">更多商品</span>
					<svg class="laimi-icon2" aria-hidden="true">
					    <use xlink:href="#icon-huiyuanzhongxin1"></use>
					</svg>
					热门推荐商品
				</a>
			</li>
		</ul>
	  <ul class="mui-table-view mui-grid-view laimi-showlist">
		</ul>
	<div>
</div>
<script src="./js/mui.min.js"></script>
<script src="js/iconfont.js"></script>
<script type="text/javascript" charset="utf-8">
  mui.init({
    pullRefresh : {
      container:'#laimi-content',//待刷新区域标识，querySelector能定位的css选择器均可，比如：id、.class等
      up : {
        // height:100,//可选.默认50.触发上拉加载拖动距离
        auto:true,//可选,默认false.自动上拉加载一次
        contentrefresh : "正在加载...",//可选，正在加载状态时，上拉加载控件上显示的标题内容
        // contentnomore:'没有更多数据了',//可选，请求完毕若没有更多数据时显示的提醒内容；
        callback :pullupRefresh //必选，刷新函数，根据具体业务来编写，比如通过ajax从服务器获取新数据；
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
		mui.getJSON('wgoods_ajax.php', {type: 1, size: 2, page: page.pagenext}, function(res){
			console.log(res);
			if(res){
				page = res.page;
				mui.each(res.list, function(k, v){
					var li = document.createElement('li');
							li.className = 'mui-table-view-cell mui-media mui-col-xs-6';
					var html = '';
					html += '<a href="detail.html?id='+v.wgoods_id+'">'+
						        '<img class="mui-media-object" style="width:100%; height:auto;" src="read_image.php?c=<?php echo $GLOBALS["_SESSION"]["login_cid"];?>&type=wgoods&image='+v.photo+'">'+
						        '<div class="mui-media-body laimi-font12" style="text-align:left;">'+v.wgoods_name+'</div>'+
						        '<div style="width:100%;line-height:40px;">'+
						        	'<div style="float:left; text-align:left;color:#CF2D28;">'+
						        		'¥'+v.min_price+
						        	'</div>'+
						        	'<div style="float:right; text-align:right;margin-top:6px;">'+
						        		'<button type="button" class="mui-btn mui-btn-danger laimi-font12" style="padding:2px 6px 2px 6px;">购买</button>'+
						        	'</div>'+
						        '</div>'+
						      '</a>';
					li.innerHTML = html;
					mui('.laimi-showlist')[0].appendChild(li);
				})
				if(page.pagenow - page.pagecount >= 0){
					mui('#laimi-content').pullRefresh().endPullupToRefresh(true);
				}else{
					mui('#laimi-content').pullRefresh().endPullupToRefresh(false);
				}
			}else{
				mui('#laimi-content').pullRefresh().endPullupToRefresh(true);
			}
		});
  }

	mui("#slider").slider({
		interval: 3000
	});
</script>
</body>
</html>