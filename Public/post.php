<html>
    <head>
        <script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/jquery.lightbox-0.5.js"></script>
<link rel="stylesheet" type="text/css" href="../css/jquery.lightbox-0.5.css" media="screen" />
<script type="text/javascript">
$(function() {
	$('a').lightBox(); 
	});
</script>
    </head>
    <body>
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
        
        //echo "<img src='http://localhost/PhpProject1/uploads/$name1.jpeg'>";  
        echo "<a href='http://localhost/PhpProject1/uploads/$id.jpeg'> <img src='http://localhost/PhpProject1/uploads/$name1.jpeg' width='72' height='72' alt='' /></a>";                                        
  
        ?>

<script>
        (function(){

$(function(){

var cropped_postfix = '100px', resized_postfix = '200px';

$('img').hover(function () {

$(this).attr('src', $(this).attr('src').replace(cropped_postfix, resized_postfix));

},

function () {

$(this).attr('src', $(this).attr('src').replace(resized_postfix, cropped_postfix));

}

);

});

})();
</script>
        <?php
              echo "</td></tr>";
    } while ($row = mysql_fetch_array($result));
}
echo "</table>";
printf("<a href=\"posts.php?page=1\"> Back </a>");
?>
    </body>
</html>