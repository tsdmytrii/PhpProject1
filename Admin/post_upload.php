<html>
    <head>
        <title> UPLOAD </title>   
    </head>
    <body>
        <?php
        //$link = mysql_connect("localhost", "root", "dimadima");
        //mysql_select_db("passwords", $link);
        include "/var/www/PhpProject1/connect.php";
        connect($host, $user, $pass);
        /* постройка таблицы с постами */
        echo "<table border=\"1\" width=\"100%\" bgcolor=\"ffffff\">";
        echo "<tr><td>ID</td><td>Name</td><td>Date</td><td>Edit</td>";
        $result = mysql_query("SELECT * FROM `posts1`") or die(mysql_error());
        for ($c = 1; $c <= mysql_num_rows($result); $c++) {
            echo "<tr>";
            $f = mysql_fetch_array($result);
            echo "<td>$f[ID]</td><td>$f[Title]</td><td>$f[Date]</td><td>";
            echo "<form name='edit' method=get action=edit.php>";
            echo "<input type='hidden' name='form_name' value='$f[ID]'>";
            echo "<input type=submit name='edit' value='edit'></form>";
            echo "<form name='delete' method=get action=delete.php>";
            echo "<input type='hidden' name='id_for_delete' value='$f[ID]'>";
            echo "<input type = submit name = 'delete' value = 'delete'></form></td>";
            echo "</tr>";
        }
        ?>
     