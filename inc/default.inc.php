<?php

#- HTML
include(__DIR__.'/html.inc.php');

#- DB Class
include(__DIR__.'/db.inc.php');

#- Table Class
include(__DIR__.'/class.table.php');
$tbl = new Array_View_Table;

#- Pager Class
include(__DIR__.'/class.pager.php');

#- Config
include(__DIR__.'/config.inc.php');

#- view
Class ERS_Dev
{
   public $version 	= "ers.dev.v.0.5";
   public $date 	= "2014.09.12";
   public $author 	= "Lucen(5),Wataru(0)";
   public $db_class = "<a href='/inc/index.php' target='_blank'>DB Class Discription</a>";
   public $other_class = "<a href='/inc/index_class_doc.php' target='_blank'>Other Class Discription</a>";
}
$set = new ERS_Dev();

function view($name=null, $set=array())
{
	#- page title & view class set
	global $title, $tbl;
	$set->title = $title;

	#- view file not exist error
	if (empty($name)) {
		return false;
	}

	#- View file
	$view_file = VIEW_PATH.$name.'.phtml';
	if (file_exists($view_file)) {
		require_once($view_file);

		#- html footer
		echo "<br><br><br><br><br>\n";
		html_footer();

		return true;
	}
	error($view_file, 'ERS_Dev_Msg: File not found.');

	return false;
}

/**
 *　Version discription list
 *
 * ers.dev.v.0.5 - 2014.9.14
 * @author Lucen(5): Pager Class追加
 *
 * ers.dev.v.0.4 - 2014.9.12
 * @author Lucen(4): 開発スピードのために Table Class追加
 *
 * ers.pdo.v.0.3 - 2014.7.16
 * @author Lucen(3): View Object追加
 *
 * ers.php.v.0.2 - 2014.7.2
 * @author Lucen(2): Debug機能, CSS
 *
 * pod.view.v.0.1 - 2014.7.1 
 * @author Lucen(1): DB Class, ControllerとViewを分ける
 */