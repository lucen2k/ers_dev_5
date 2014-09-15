<?php

#- PDO Wrapper Class
include_once(__DIR__.'/class.db.php');

#- db info
define('HOSENAME',	'localhost');
define('USERNAME',	'test');
define('PASSWORD',	'pass');
define('DATABASE',	'test');

#- pager用
$connect = mysql_connect(HOSENAME, USERNAME, PASSWORD) OR die("Database Error 1");
mysql_select_db(DATABASE, $connect) OR die("Database Error 2");
mysql_query("SET NAMES utf8");

#- db connect
$dsn = 'mysql:host='.HOSENAME.';dbname='.DATABASE.';charset=utf8';
try {
	$db = new db($dsn, USERNAME, PASSWORD);
} catch (PDOException $e) {
	exit('DB Error:'.$e->getMessage());
	die();
}

#- debug
function debug($value)
{
	if (empty($value)) {
		return false;
	}

	if (is_array($value) or is_object($value)) {
		echo '<div class="debug"><b>debug::</b><pre>';
		print_r($value);
		echo "</pre></div>";
	} else {
		echo '<div class="debug"><b>debug::</b> '.$value.'</div>';
	}
	return true;
}
function dump($value)
{
	if (empty($value)) {
		return false;
	}

	if (is_array($value) or is_object($value)) {
		echo '<div class="debug"><b>debug::</b><pre>';
		var_dump($value);
		echo "</pre></div>";
	} else {
		echo '<div class="debug"><b>debug::</b> '.$value.'</div>';
	}
	return true;
}
function error($value, $msg=null)
{
	if (empty($value)) {
		return false;
	}

	if (is_array($value)) {
		echo '<div class="error"><b>error::</b>'.$msg.'<pre>';
		print_r($value);
		echo "</pre></div>";
	} else {
		if (!empty($msg)) {
			$msg .= " ";
		}
		echo '<div class="error"><b>error::</b> '.$msg.$value.'</div>';
	}
	return true;
}