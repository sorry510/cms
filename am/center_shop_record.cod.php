<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
    <title></title>
    <script src="js/mui.min.js"></script>
    <script src="http://at.alicdn.com/t/font_485373_ir4fvm75c4ygb9.js"></script>
    <link href="css/mui.min.css" rel="stylesheet"/>
    <link href="css/laimi.css" rel="stylesheet"/> 
</head>
<body id="laimi-body">
<header id="laimi-header" class="mui-bar mui-bar-nav">
	<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
	<h1 class="mui-title laimi-color-white laimi-font14" style="line-height:40px;">消费记录</h1>
</header>
<div id="laimi-content" class="mui-content mui-scroll-wrapper">
	<div class="mui-scroll">
		<div class="laimi-record-list">
		</div>
	</div>
</div>
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
      },
      down: {
      	style:'circle',//必选，下拉刷新样式，目前支持原生5+ ‘circle’ 样式
      	callback :pulldownRefresh //必选，刷新函数，根据具体业务来编写，比如通过ajax从服务器获取新数据；
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
  var recordid = 0;//最新的一条
  function pulldownRefresh() {
  	mui.getJSON('center_shop_record_ajax.php', {id:'<?php echo $GLOBALS['intid'];?>', page: 1}, function(res){
  		if(res){
  			mui.each(res.list, function(k, v){
  				if(v.card_record_id = recordid)
  					return false;
  				recordid = v.card_record_id;//有一点问题，无碍
  				var div = document.createElement('div');
  						div.className = 'mui-card laimi-first';
  						div.style.padding = '6px';
  				var html = '';
  				html += '<ul class="mui-table-view mui-table-view-chevron">'+
  									'<li class="mui-table-view-cell mui-collapse">'+
  										'<a class="mui-navigate-right" href="#">'+
  											'<svg class="laimi-icon2" aria-hidden="true">'+
  											    '<use xlink:href="#icon-jiekuanwenti"></use>'+
  											'</svg>'+
  											'<span class="laimi-font12 laimi-color-gray">'+v.atime+'</span>'+
  											'<span class="mui-badge mui-badge-inverted laimi-font14" style="float:right;color:'+(v.card_record_type == 1 ? '#0162CB' : '#FFA500')+';"><span class="laimi-color-gray laimi-font12">'+v.recordtype+'：</span> ¥'+(v.card_record_type == 1 ? v.card_record_cmoney : v.card_record_smoney)+'</span>'+
  										'</a>'+
  								    '<ul class="mui-table-view mui-table-view-chevron">';
  					mui.each(v.goods_list, function(k2, v2){
  							html += '<li class="mui-table-view-cell">'+
  						          	'<svg class="laimi-icon2" aria-hidden="true">'+
  									    		'<use xlink:href="#icon-yiyuyue1"></use>'+
  												'</svg>'+
  												(v2.c_mgoods_name != '' ? v2.c_mgoods_name : v2.c_sgoods_name)+'&nbsp;&nbsp;×'+v2.card_record3_goods_count+((v2.c_mgoods_name != '' && v2.c_mgoods_rprice == 0) ? '(套餐)' : '')+
  						          	'<span class="mui-badge mui-badge-inverted" style="font-size:14px;">¥'+(v2.c_mgoods_price != 0 ?v2.c_mgoods_price : v2.c_sgoods_price)+'</span>'+
  						          '</li>';
  	        });
            mui.each(v.mcombo_goods_list2, function(k3, v3){
                html += '<li class="mui-table-view-cell">'+
                          '<svg class="laimi-icon2" aria-hidden="true">'+
                            '<use xlink:href="#icon-yiyuyue1"></use>'+
                          '</svg>'+
                          v3.c_mgoods_name+'&nbsp;&nbsp;×'+v3.card_record3_mgoods_count+'(套餐)'+
                          '<span class="mui-badge mui-badge-inverted" style="font-size:14px;">¥'+v3.c_mgoods_price+'</span>'+
                        '</li>';
            });
  		          html += '<li class="mui-table-view-cell laimi-font12 laimi-color-gray">';
  		          if(v.card_record_type == 3){
  		          	html += '合计¥'+v.card_record_hmoney+'，优惠¥'+(Number(v.goods_money) - Number(v.goods_money2)).toFixed(2)+'，满减¥40，代金券¥5，手动优惠¥'+v.card_record_jmoney+'&nbsp;&nbsp;('+v.paytype+'支付)';
  		          }else if(v.card_record_type == 1){
  		          	html += '实收¥'+v.card_record_smoney+'，赠送¥'+(Number(v.card_record_cmoney) - Number(v.card_record_smoney)).toFixed(2)+'&nbsp;&nbsp;('+v.paytype+'支付)';
  		          }
  		          html += '</li>'+
  						          '<li class="laimi-font12 laimi-color-gray" style="padding:8px;margin-left:22px;">'+
  						          	'店铺：'+v.shop_name+
  						          '</li>'+
  										'</ul>'+
  									'</li>'+
  								'</ul>';
  				div.innerHTML = html;
  				mui('.laimi-record-list')[0].appendChild(div);
  			})
  		}
  		mui('#laimi-content').pullRefresh().endPulldownToRefresh();
  	});
  }
  /**
   * 上拉加载具体业务实现
   */
  function pullupRefresh() {
		mui.getJSON('center_shop_record_ajax.php', {id:'<?php echo $GLOBALS['intid'];?>', page: page.pagenext}, function(res){
			if(res.list.length > 0){
				page = res.page;
				if(recordid == 0)
					recordid = res.list[0].card_record_id;
				mui.each(res.list, function(k, v){
					var div = document.createElement('div');
							div.className = 'mui-card laimi-first';
							div.style.padding = '6px';
					var html = '';
					html += '<ul class="mui-table-view mui-table-view-chevron">'+
										'<li class="mui-table-view-cell mui-collapse">'+
											'<a class="mui-navigate-right" href="#">'+
												'<svg class="laimi-icon2" aria-hidden="true">'+
												    '<use xlink:href="#icon-jiekuanwenti"></use>'+
												'</svg>'+
												'<span class="laimi-font12 laimi-color-gray">'+v.atime+'</span>'+
												'<span class="mui-badge mui-badge-inverted laimi-font14" style="float:right;color:'+(v.card_record_type == 1 ? '#0162CB' : '#FFA500')+';"><span class="laimi-color-gray laimi-font12">'+v.recordtype+'：</span> ¥'+(v.card_record_type == 1 ? v.card_record_cmoney : v.card_record_smoney)+'</span>'+
											'</a>'+
									    '<ul class="mui-table-view mui-table-view-chevron">';
						mui.each(v.goods_list, function(k2, v2){
              //消费商品
								html += '<li class="mui-table-view-cell">'+
							          	'<svg class="laimi-icon2" aria-hidden="true">'+
										    		'<use xlink:href="#icon-yiyuyue1"></use>'+
													'</svg>'+
													(v2.c_mgoods_name != '' ? v2.c_mgoods_name : v2.c_sgoods_name)+'&nbsp;&nbsp;×'+v2.card_record3_goods_count+((v2.c_mgoods_name != '' && v2.c_mgoods_rprice == 0) ? '(套餐)' : '')+
							          	'<span class="mui-badge mui-badge-inverted" style="font-size:14px;">¥'+(v2.c_mgoods_price != 0 ?v2.c_mgoods_price : v2.c_sgoods_price)+'</span>'+
							          '</li>';
		        });
            mui.each(v.mcombo_goods_list2, function(k3, v3){
              // 消费套餐商品
                html += '<li class="mui-table-view-cell">'+
                          '<svg class="laimi-icon2" aria-hidden="true">'+
                            '<use xlink:href="#icon-yiyuyue1"></use>'+
                          '</svg>'+
                          v3.c_mgoods_name+'&nbsp;&nbsp;×'+v3.card_record3_mgoods_count+'(套餐)'+
                          '<span class="mui-badge mui-badge-inverted" style="font-size:14px;">¥'+v3.c_mgoods_price+'</span>'+
                        '</li>';
            });
            mui.each(v.mcombo_goods_list, function(k1, v1){
              // 买套餐商品
                html += '<li class="mui-table-view-cell">'+
                          '<svg class="laimi-icon2" aria-hidden="true">'+
                            '<use xlink:href="#icon-yiyuyue1"></use>'+
                          '</svg>'+
                          v1.c_mgoods_name+'&nbsp;&nbsp;×'+v1.card_record2_mcombo_gcount+'(套餐)'+
                          '<span class="mui-badge mui-badge-inverted" style="font-size:14px;">¥'+v1.c_mgoods_price+'</span>'+
                        '</li>';
            });
			          html += '<li class="mui-table-view-cell laimi-font12 laimi-color-gray">';
			          if(v.card_record_type == 3){
			          	html += '合计¥'+v.card_record_hmoney+'，优惠¥'+(Number(v.goods_money) - Number(v.goods_money2)).toFixed(2)+'，满减¥'+Number(v.card_record_mmoney).toFixed(2)+'，手动优惠¥'+v.card_record_jmoney+'&nbsp;&nbsp;('+v.paytype+'支付)';
			          }else if(v.card_record_type == 2){
			          	html += '合计¥'+v.card_record_hmoney+'，优惠¥'+(Number(v.mcombo_money) - Number(v.mcombo_money2)).toFixed(2)+'，满减¥'+Number(v.card_record_mmoney).toFixed(2)+'，手动优惠¥'+v.card_record_jmoney+'&nbsp;&nbsp;('+v.paytype+'支付)';
			          }else if(v.card_record_type == 1){
                  html += '实收¥'+v.card_record_smoney+'，赠送¥'+(Number(v.card_record_cmoney) - Number(v.card_record_smoney)).toFixed(2)+'&nbsp;&nbsp;('+v.paytype+'支付)';
                }
			          html += '</li>'+
							          '<li class="laimi-font12 laimi-color-gray" style="padding:8px;margin-left:22px;">'+
							          	'店铺：'+v.shop_name+
							          '</li>'+
											'</ul>'+
										'</li>'+
									'</ul>';
					div.innerHTML = html;
					mui('.laimi-record-list')[0].appendChild(div);
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
</script>
</body>
</html>