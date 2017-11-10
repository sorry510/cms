	<script src="../js/iconfont.js"></script>
	<script src="../js/layui.js"></script>
	<script type="text/javascript">
	layui.use('jquery', function() {
		var $ = layui.jquery;
		$('#laimi-left .layui-nav-item').on('click', function(){
			$(this).siblings('.layui-nav-item').removeClass('layui-nav-itemed');
		})
	})
	</script>