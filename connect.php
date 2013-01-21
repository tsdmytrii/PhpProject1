<?php

/* функция для подключение к базе */
function connect($host, $user, $pass)
{
    $host = "localhost";
$pass = "dimadima";
$user = "root";
    $link3 = mysql_connect($host, $user, $pass);
    mysql_select_db("passwords", $link3);
}
$host = "localhost";
$pass = "dimadima";
$user = "root";
connect($host, $pass, $user);
?>
