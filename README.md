ers_dev_5
=========

PHPサーバ系開発用のシンプルなフレームワーク

【DB設定】
/inc/db.inc.php
<pre>
#- db info
define('HOSENAME',	'localhost');
define('USERNAME',	'test');
define('PASSWORD',	'pass');
define('DATABASE',	'test');
</pre>

【初期設置用のSQL】
/sql/test.sql

【クラスの使い方】
下のような初期画面に出るリンク「DB Class Discription」と「Other Class Discription」を参照
<pre>
debug::
ERS_Dev Object
(
    [version] => ers.dev.v.0.5
    [date] => 2014.09.12
    [author] => Lucen(5),Wataru(0)
    [db_class] => DB Class Discription
    [other_class] => Other Class Discription
    [search] => Array
        (
            [0] => Array
                (
                    [id] => 1
                    [name] => aaa
                    [created] => 0000-00-00 00:00:00
                    [modified] => 0000-00-00 00:00:00
                )

        )

    [list] => Array
        (
            [0] => Array [...]
</pre>

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
