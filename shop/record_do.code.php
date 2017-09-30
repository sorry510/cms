<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>test1</title>
	<script language="javascript" src="../lodop/LodopFuncs.js"></script>
</head>
<body>
	<object id="LODOP_X" classid="clsid:2105C259-1E0C-4534-8141-A753534CB4CA" width=100% height=500> 
	        <param name="Color" value="#ADD8E6"> 
		<embed id="LODOP_EM" TYPE="application/x-print-lodop" width=100% height=500 color="#ADD8E6"  PLUGINSPAGE="install_lodop32.exe"></embed>
	</object>
	<div id="div1">
		<h1>我的天</h1>
		<ul>
			<li>12</li>
			<li>34</li>
			<li>dad1</li>
			<li>dda</li>
			<li>43</li>
		</ul>
		<button type="button">succe</button>
		<a href="javascript:Print()">打印预览</a>
	</div>
</body>
<script type="text/javascript" language="javascript">
	var LODOP;
	function CreateOnePage(){
		LODOP=getLodop();
		LODOP.PRINT_INIT("打印控件功能演示_Lodop功能_表单一");
		LODOP.SET_PRINT_STYLE("FontSize",18);
		LODOP.SET_PRINT_STYLE("Bold",1);
		LODOP.ADD_PRINT_TEXT(50,231,260,39,"打印页面部分内容");
		LODOP.ADD_PRINT_HTM(88,200,350,600,document.getElementById("div1").innerHTML);
	};
	function Print(){
		CreateOnePage();
		LODOP.PREVIEW();
	}
	function OpenPreview() {
	    LODOP=getLodop(document.getElementById('LODOP_X'),document.getElementById('LODOP_EM')); 
		LODOP.PRINT_INIT("打印控件Lodop功能演示_自己设计预览界面");
		LODOP.SET_PRINT_STYLE("FontSize",21);
		LODOP.ADD_PRINT_TEXT(50,231,260,39,"打印页面部分内容");
		LODOP.ADD_PRINT_HTM(88,200,350,600,document.getElementById("div1").innerHTML);
		//LODOP.SET_PRINT_PAGESIZE(0,1380,2450,"A4");
		LODOP.SET_PRINT_MODE("PRINT_PAGE_PERCENT","Full-Page");//按整页缩放
		LODOP.SET_SHOW_MODE("HIDE_PAPER_BOARD",true);//隐藏走纸板
		LODOP.SET_PREVIEW_WINDOW(0,3,0,0,0,""); //隐藏工具条，设置适高显示
		LODOP.SET_SHOW_MODE("PREVIEW_IN_BROWSE",true); //预览界面内嵌到页面内
		LODOP.PREVIEW();
		// LODOP.PRINT();
		blPreviewOpen=true;			
	};
	if (needCLodop()) {
		window.On_CLodop_Opened=function(){
			OpenPreview();							
			window.On_CLodop_Opened=null;
		};					
	} else 
	window.onload = function(){OpenPreview();};
</script>
</html>