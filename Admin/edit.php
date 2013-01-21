<html>
    <head>
        <title>EDIT POST</title>
    </head>
    <body>

    </body>
</html>
<?php
$id = $_GET['form_name'];

//$link = mysql_connect("localhost", "root", "dimadima");
//mysql_select_db("passwords", $link);
include "/var/www/PhpProject1/connect.php";
        connect($host, $user, $pass);
$result = mysql_query("SELECT Title, Text, Date FROM `posts1` where ID='$id'") or die(mysql_error());
$f = mysql_fetch_array($result);

$name = (string) $f['Title'];
$description = (string) $f['Text'];
$date = (string) $f['Date'];

/* Постойка формы для изменений*/
echo "<form method=post action='save_changes.php'>";
echo "Name: <input type='text' name='name' value ='$name'><br><br><br>";
echo "Description: <input type='text' name = 'description' value ='$description'><br>";
echo "Date: <input type='text' name='date' value ='$date'><br>";
echo "<input type='hidden' name='id' value='$id'>";
echo "<input type='submit' name='submit' value='Save changes'>";


echo "</form>";
?>
