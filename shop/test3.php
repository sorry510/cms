<!DOCTYPE html>
<html>
<head>
	<title>dd1</title>
	<link rel="stylesheet" type="text/css" href="../css/amazeui.min.css">
	
</head>
<body>
	<button
	  type="button"
	  class="am-btn am-btn-primary"
	  data-am-modal="{target: '#doc-modal-1', closeViaDimmer: 0, width: 600, height:400}">
	  Modal
	</button>

	<div class="am-modal am-modal-no-btn" tabindex="-1" id="doc-modal-1">
	  <div class="am-modal-dialog">
	    <div class="am-modal-hd">Modal 标题
	      <a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
	    </div>
	    <div class="am-modal-bd">
	      <form method="post" action="test.php" enctype="multipart/form-data" id="cform1">
	      	<div class="am-form-group am-form-file">
	      	  <input type="text" name='name'>
	      	</div>
	      	<div class="am-form-group am-form-file">
	      	  <button type="button" class="am-btn am-btn-default am-btn-sm">
	      	    <i class="am-icon-cloud-upload"></i> 选择要上传的文件</button>
	      	  <input type="file" name='file' multiple>
	      	</div>
	      	<div class="am-form-group">
	      		<script id="editor" name="text" type="text/plain"></script>
	      	</div>
          	<button type="button" class="am-btn csub">sub</button>
          </form>
	    </div>
	  </div>
	</div>
	<script type="text/javascript" src="../js/jquery.min.js"></script>
	<script type="text/javascript" src="../js/amazeui.min.js"></script>
	<script type="text/javascript" charset="utf-8" src="./css/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="./css/ueditor.all.min.js"> </script>
    <script type="text/javascript" charset="utf-8" src="./css/lang/zh-cn/zh-cn.js"></script>
    <script type="text/javascript">
    	var ue = UE.getEditor('editor',{
    		toolbars: [
    		    ['fullscreen', 'source', 'undo', 'redo', 'bold']
    		],
    		autoHeightEnabled: true,
    		autoFloatEnabled: true
    	});
    	$(".csub").on('click', function(){
    		var data = new FormData($('#cform1')[0]);
    		// console.log(data);
    		$.ajax({  
	            url: 'test4.php',
	            type: 'POST',
	            data: data,
	            cache: false,
	            processData: false,
	            contentType: false
	        }).done(function(ret){
	        	console.log(ret);
	        });  
    	})
    </script>
</body>
</html>