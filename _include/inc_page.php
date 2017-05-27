<?php
class Page{

	private $listrows; //一页显示行数
	private $total; //总数
	private $page;//当前页
	private $uri;//当前地址
	private $pagenum;//总页数

	function __construct($num,$listrows=10,$pagenum){
		$this->total = $num;
		$this->listrows = $listrows;
		$this->uri= $_SERVER['PHP_SELF'];
		$this->page = !empty($_GET['page'])?$_GET['page']:1;
		$this->pagenum = $pagenum;
	}
	public function bannerpage(){
		$prepage = $this->page-1;
		$nowpage = $this->page;
		$nextpage = $this->page +1;
		$str = "<ul class='ulpage'>";
		$str .="<li><a href='".$this->uri."?page=1'>首页</a></li>"; 
		if($this->page>1){
			$str .="<li><a href='".$this->uri."?page=".$prepage."'>上一页</a></li>";
		}
		$str .="<li><a href='".$this->uri."?page=".$this->page."'>".$this->page."</a></li>";
		if($this->page<$this->pagenum){
			$str .="<li><a href='".$this->uri."?page=". $nextpage ."'>下一页</a></li>";
		}
		$str .="<li><a href='".$this->uri."?page=".$this->pagenum."'>尾页</a></li>";
		$str .="<li>总共".$this->pagenum."页</a></li>";
		$str .="</ul>";

		
		return $str;
	}
	public function limit(){
		$start = ($this->page-1)*$this->listrows;
		$str = "limit ".$start.",".$this->listrows;
		return $str;
	}
	public function page(){
		return $this->page;
	}
}

?>