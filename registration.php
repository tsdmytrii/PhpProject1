<?php

@ini_set('display_errors', 1);
error_reporting('E_ALL');



$ip = $_SERVER['REMOTE_ADDR'];
//$conn = mysql_connect('localhost', 'root', 'dimadima');
//mysql_select_db('passwords', $conn);
include "/var/www/PhpProject1/connect.php";
        connect($host, $user, $pass);
$fullname = mysql_real_escape_string($_POST['fullname']);
$login = mysql_real_escape_string($_POST['login']);
$password = mysql_real_escape_string($_POST['password']);
$email = mysql_real_escape_string($_POST['email']);

/* валидация */
if (!isset($_POST['fullname']) || '' == trim($_POST['fullname'])) {
    echo "Enter your full name";
    return;
}

if (!preg_match("/^[a-zA-Z0-9_]+$/", $fullname)) {
    exit("Wrong full name");
}

if (!isset($_POST['login']) || '' == trim($_POST['login'])) {
    echo "Enter your login";
    return;
}

if (!preg_match("/^[a-zA-Z0-9_]+$/", $login)) {
    exit("Wrong login");
}

if (!isset($_POST['email']) || '' == trim($_POST['email'])) {
    echo "Enter your E-mail";
    return;
}

if (!preg_match("/^[A-Za-z0-9](([_\.\-+]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]){2,}$/", $email)) {
    exit("Wrong E-mail");
}

if (!isset($_POST['password']) || '' == trim($_POST['password'])) {
    echo "Enter your password";
    return;
}

if (!preg_match("/^[a-zA-Z0-9]{6,}$/", $password)) {
    exit("Wrong password");
}

if (isset($_POST['registration'])) {
    date_default_timezone_set('UTC');
    $dat = date('Y-m-d H:i:s');
}

$password = md5($password);

$errors = 0;
$result = mysql_query("select * from passwords") or die(mysql_error());
while ($row = mysql_fetch_row($result)) {
    if ($login == $row[3]) {
        $errors = 1;
    }
}
if ($errors == 0) {
    mysql_query("INSERT INTO passwords(name, password, login, email, ip, registration_date) values('$fullname','$password','$login','$email', '$ip', '$dat')") or die(mysql_error());
     setcookie("header", "");
    header("Location: /PhpProject1/success_registration.php");
} {
    echo "This login is already taken";
}
?>
