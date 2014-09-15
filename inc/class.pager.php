<?php 
/* 
//Example of use: 
$sql = "SELECT * FROM users where 1"; 
$pager = new pager($sql,5);
while($row = mysql_fetch_array($pager->result)) 
{ 
    echo $row['id']." ".$row['name']."<br>"; 
} 
 
# paging
echo $pager->show(); 
 
# rows total
$pager->rows;
 
# page start
$page_s = $pager->start + 1;
 
# page end
$page_e = $pager->start + $pager->length;
*/ 
 
class Pager extends db
{ 
    var $sql; 
    var $query;
    var $getvar; 
    var $rows; 
    var $start; 
    var $getvar_val; 
    var $pager; 
    var $result; 
 
	function __construct($sql, $length, $getvar='page') 
	{
		$this->result=null; 
		$this->sql = $sql; 
		$this->query = $sql;
		$this->getvar = $getvar; 
		$this->rows = 0; 
		$this->start = 0; 
		$this->getvar_val = 1; 
		$this->pager = null; 
		$this->SetLength($length); 
		$this->GetStart(); 
		$this->doQuery(); 
	} 
 
	//Sets $length 
	function SetLength($length) 
	{ 
		$this->length = (int)$length; 
		if ($this->length<0) { 
			$this->length = 0; 
		} 
	} 
 
	function doQuery() 
	{ 
		$sql = trim($this->sql); 
		$sql = substr($sql,6); 
		$sql = 'SELECT SQL_CALC_FOUND_ROWS '.$sql.' limit '.$this->start.', '.$this->length; 
		$this->result = mysql_query($sql); 
		$sql = "SELECT FOUND_ROWS()"; 
		$result = mysql_query($sql); 
		$this->rows = mysql_result($result,0); 
	} 
 
  	//getvar_val() gets the 
  	//$getvar_val is a positive integer - > 0 
  	function Set_Getvar_val() 
  	{
  		if (!empty($_GET[$this->getvar])) {
  			$this->getvar_val = (int)$_GET[$this->getvar]; 
  		}
  		if ($this->getvar_val<1) { 
  			$this->getvar_val = 1; 
  		} 
  	} 
 
	//Gets the start of the data 
	function GetStart() 
	{ 
		$this->Set_Getvar_val(); 
		$this->start = (($this->getvar_val-1)*$this->length); 
	} 

	function show($next="Next",$last="Last",$separator=" ") 
	{ 
		$array = $this->pager(); 
		$str = array(); 
		foreach ($array as $k => $v) { 
			if ($k!='next'&&$k!='last') { 
				if ($k==$this->getvar_val) { 
					$str[] = '<span class="current">'.$k.'</span>'; 
				} else { 
					$str[] = '<a href="'.$v.'">'.$k.'</a>&nbsp;'; 
				}
			} 
		} 
		$str = implode($separator, $str); 
		$rt  = '<br><div class="pagination">';
		if (empty($array['last'])) {
			$rt .= '<span class="disabled">&#171; Previous</span>';
		} else {
			$rt .= '<a href="'.$array['last'].'">&#171; Previous</a>'.$separator;
		}
		$rt .= $str.$separator; 
		if (empty($array['next'])) {
			$rt .= '<span class="disabled">Next &#187;</span>';
		} else {
			$rt .= '<a href="'.$array['next'].'">Next &#187;</a>'.$separator;
		}
		$rt .= '</div>';

		return $rt; 
	} 
 
	//Returns an array of the links arround the given point 
	//['next'] => next page 
	//['last'] => last page 
	function pager($margin=10) 
	{ 
		$path = $_GET; 
		$newpath = $_SERVER['PHP_SELF']."?"; 
		foreach ($path as $key => $value) { 
			if ($key!=$this->getvar) { 
				$newpath .= $key."=".$value; 
				$newpath .="&amp;"; 
			}
		} 
		$newpath .= $this->getvar; 

		$linkpaths = array(); 
		$current = $this->start / $this->length + 1; 
		$pages = ceil(($this->rows/$this->length)); 
		$pagerstart = $current-$margin; 
		$pagerstart = ($pagerstart<1)? 1: $pagerstart; 
		$pagerend = $current+$margin; 

		$pagerend = ($pagerend > $pages)? (ceil(($this->rows / $this->length))): $pagerend;

		for ($i=$pagerstart;$i < ($pagerend+1);$i++) { 
			$linkpaths[$i] = $newpath."=".($i); 
		} 
		if (!empty($linkpaths[($current+1)]) && $linkpaths[($current+1)] != null) { 
			$linkpaths['next']=$linkpaths[($current+1)]; 
		} 
		if(!empty($linkpaths[($current-1)])) { 
			$linkpaths['last']=$linkpaths[($current-1)]; 
		} 

		return $linkpaths; 
	}
}