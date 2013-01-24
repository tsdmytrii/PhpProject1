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
        $name = "$id" . "_200px";
        $name1 = "$id" . "_100px";
        ?>
        <a href="" class="b-socials__link"><img src="http://localhost/PhpProject1/uploads/<?php echo "$name1"; ?>.jpeg " 
                                                onmouseover="this.src='http://localhost/PhpProject1/uploads/<?php echo "$name"; ?>.jpeg'"
                                                onmouseout="this.src='http://localhost/PhpProject1/uploads/<?php echo "$name1"; ?>.jpeg'"
                                                alt="Fuck"></a>;        

        <?php
        //echo "<img class=forhover src='http://localhost/PhpProject1/uploads/$name.jpeg' alt='Fuck'";

        echo "</td></tr>";
    } while ($row = mysql_fetch_array($result));
}
echo "</table>";
printf("<a href=\"posts.php?page=1\"> Back </a>");
?>
