<?php
//$link1 = mysql_connect("localhost", "root", "dimadima");
//mysql_select_db("passwords", $link1);
include "/var/www/PhpProject1/connect.php";
        connect($host, $user, $pass);
$id = $_GET['id'];
$result = mysql_query("select * from posts1 where ID = $id") or die(mysql_error());
/* Вывод выбраного поста юзером */
echo "<table border = 1>";
if ($row = mysql_fetch_array($result)) {
    do {
        echo "<tr><td>";
        echo "Post name:";
        echo $row['1'];
        echo "<br><br>";
        echo "Description:<br>";
        echo $row['4'];
        echo "<br>";
                
        echo "<img src='http://localhost/PhpProject1/uploads/2.png' alt='Fuck'";
        
        echo "</td></tr>";
    } while ($row = mysql_fetch_array($result));
}
echo "</table>";
printf("<a href=\"posts.php?page=1\"> Back </a>");
?>
