<?php

$id = $_POST['id'];
//$link = mysql_connect("localhost", "root", "dimadima");
//mysql_select_db("passwords", $link);
include "/var/www/PhpProject1/connect.php";
        connect($host, $user, $pass);
$changed_name = mysql_real_escape_string($_POST['name']);
$changed_description = mysql_real_escape_string($_POST['description']);
$changed_date = mysql_real_escape_string($_POST['date']);
mysql_query("UPDATE `posts` SET `name`='$changed_name',`description`='$changed_description',`date`='$changed_date' WHERE id='$id'") or die(mysql_error());
echo "Successfully updated!";
?>
