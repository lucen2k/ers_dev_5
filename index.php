<?php
#- default include
include(__DIR__.'/inc/default.inc.php');


#- Html header
$title = 'ERS Dev' ;
html_header($title);


#- Controller =======================================================

# 検索結果
$bind = array(":search" => "a%");
$set->search = $db->select('list', 'name LIKE :search', $bind);

# Example of use: 
$sql = "SELECT * FROM list where 1"; 
$pager = new Pager($sql, PAGER_LIMIT);

# list 取得
$set->list = $db->pager($pager);

# paging
$set->pager = $pager->show();
 



#- View =============================================================
view('index', $set);



#- Function =========================================================

