<?php
#- default include
include(__DIR__.'/inc/default.inc.php');


#- Html header
$title = 'ERS Dev' ;
html_header($title);


#- Controller =======================================================

#- 検索結果 -------
$bind = array(":search" => "a%");
$set->search = $db->select('list', 'name LIKE :search', $bind);

#- Pager example of use -------
$sql = "SELECT * FROM list WHERE 1 ORDER BY id DESC"; 
$pager = new Pager($sql, PAGER_LIMIT);
//debug($pager);

# list 取得
$set->list = $db->pager($pager);

# paging
$set->pager = $pager->show();
 
#- Insert -------
$fields = array(
	'name' => 'LName FName',
);
//$db->insert('list', $fields);

#- Update -------
$fields = array(
	'name' => 'update name',
);
$db->update('list', $fields, 'id = 9');


#- View =============================================================
view('index', $set);



#- Function =========================================================

