layui.define("jquery",function(exports){
	var $ = layui.$;
	var obj = {
  	id: '',
  	area: ['50%','100%'],
    bgColor: '#FFFFFF',
  	zIndex: 2001,
  	content: '无数据',
  	header: '无标题',
    type: 0,
    flag: 0,
  	open: function(json){
  		this.id = json.id || this.id;
  		this.area = json.area || this.area;
  		this.content = json.content || this.content;
      this.bgColor = json.bgColor || this.bgColor;
  		this.zIndex = json.zIndex || this.zIndex;
      this.header = json.header || this.header;
      this.type = json.type || this.type;
  		this.flag = json.flag || this.flag;
  		this.init();
  		$(".offcanvas").stop(true).animate({right:'0'});
  		$('#offcanvas-mask').show();
	  },
    close: function(){
    	$('#offcanvas-mask').hide();
  	  $(".offcanvas").stop(true).animate({right:'-100%'});
    },
    destroy: function(){
      this.close();
      var wait = setInterval(function(){
          if(!$(".offcanvas").is(":animated")){
              clearInterval(wait);
              $('#offcanvas-mask').remove();
              $(".offcanvas").remove();
          }
      },200);
    },
    init: function(){
      if($(".offcanvas").length <= 0){
        var _this = this;
        var bd = '<div id="offcanvas-mask" style="position:absolute;left:0;top:0;width:100%;height:100%;z-index:2000;background-color:#000;opacity:0.3"></div>';
        var head = '<div class="offcanvas-hd" style="padding: 0 80px 0 20px;height:42px;line-height:42px;border-bottom:1px solid #eee;font-size:14px;color:#333;overflow:hidden;background-color:#F8F8F8;">'+this.header+'</div>';
        var close = '<span class="layui-layer-setwin"><a class="layui-layer-ico layui-layer-close layui-layer-close1 offcanvas-close" href="javascript:;"></a></span>'
        var ele = '<div class="offcanvas" style="position:absolute;right:-100%;top:0;">'+head+close+'<div class="offcanvas-bd"></div></div>';
        if(this.type == 0)
          $('body').append(bd);
        $('body').append(ele);

        $(".offcanvas").width(this.area[0]);
        $(".offcanvas").height(this.area[1]);
        if(this.id)
          $(".offcanvas").attr('id',this.id);
        $(".offcanvas").css({
          'zIndex': this.zIndex,
          'backgroundColor': this.bgColor
        });
        $('#offcanvas-mask,.offcanvas-close').on('click', function(){
          if(_this.flag == 1){
            _this.destroy();
          }else{
            _this.close();
          }
        })
      }else{
        $(".offcanvas-bd").empty();
      }
      $(".offcanvas-bd").append(this.content);
    },
  };
  //输出offcanvas接口
  exports('offcanvas', obj);
});