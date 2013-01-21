<?php
$id = $_GET['id_for_delete'];
//$link = mysql_connect("localhost", "root", "dimadima");
//mysql_select_db("passwords", $link);
include "/var/www/PhpProject1/connect.php";
        connect($host, $user, $pass);
mysql_query("DELETE from posts1 where ID='$id'") or die(mysql_error());
?>