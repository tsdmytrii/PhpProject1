<?php

@ini_set('display_errors', 1);
error_reporting('E_ALL');
$cookie = "Не вдається увійти";
$password = mysql_real_escape_string($_POST['password']);
$name = mysql_real_escape_string($_POST['name']);
$admincode = 1111;
$admin = mysql_real_escape_string($_POST['admin']);
//$link = mysql_connect("localhost", "root", "dimadima");
//mysql_select_db("passwords", $link);
include "/var/www/PhpProject1/connect.php";
connect($host, $user, $pass);
$hash = md5($password); // хеширование пароля
$result = mysql_query("SELECT * FROM `passwords` WHERE name='$name' and password = '$hash'") or die(mysql_error());
date_default_timezone_set('Europe/Kiev');
$dat = time('Y-m-d H:i:s');
/* проверка поля кода для админа если поле пустое, то вход выполняеться под юзером
  если же в поле что-то есть, то проверяеться пароль для администартора
  и сравниваеться с $admincode */

if (!isset($_POST['admin']) || '' == trim($_POST['admin'])) {  //вход для обычного пользователя
    if (mysql_num_rows($result) == 1) {
        setcookie("header", "");
        header("Location: /PhpProject1/Public/posts.php?page=1");
        $query = mysql_query("UPDATE passwords SET late_login_date ='$dat' WHERE login = '$name'");

        exit;
    } {
        setcookie("header", $cookie);
        header("Location: index.php");
        exit;
    }
} {
    if ($admin == $admincode) {  //вход для администратора
        if (mysql_num_rows($result) == 1) {
            setcookie("header", "");
            header("Location: /PhpProject1/Admin/post_upload.php");
            $query = mysql_query("UPDATE passwords SET late_login_date ='$dat' WHERE login = '$name'") or die(mysql_error());

            exit;
        } {
            setcookie("header", $cookie);
            header("Location: index.php");
            exit;
        }
    } {
        echo "Wrong admin code";
    }
}
?>