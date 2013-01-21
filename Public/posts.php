<html>
    <head>
        <title> POSTS </title> 
    </head> 
    <body>        
        <?php
        // $link1 = mysql_connect("localhost", "root", "dimadima");
        //mysql_select_db("passwords", $link1);
        include "/var/www/PhpProject1/connect.php";
        connect($host, $user, $pass);
        $x = 5;
        $prev = 3;
        $curr_link = 1;
        $result_all = mysql_query("select * from posts1");
        $all = mysql_num_rows($result_all);
        $curr_css = "current";
        $link = "posts.php?page=";
        $page = $_GET['page'];

        function pagination($all, $x, $prev, $curr_link, $curr_css, $link) {
//осуществляем проверку, чтобы выводимые первая и последняя страницы
// не вышли за границы нумерации
            $first = $curr_link - $prev;
            if ($first < 1)
                $first = 1;
            $last = $curr_link + $prev;
            if ($last > ceil($all / $x))
                $last = ceil($all / $x);

//начало вывода нумерации
//выводим первую страницу
            $y = 1;
            if ($first > 1)
                echo "<a href='$link$y/'>1</a> ";
//если текущая страница далеко от 1-й, то часть предыдущих страниц 
//скрываем троеточием
            $y = $first - 1;
            if ($first > 6) {
                echo "<a href='$link" . $y . "/'>...</a> ";
            }
//если текущая страница имеет номер до 10, то выводим все номера 
//перед заданным диапазоном без скрытия 
            else {
                for ($i = 2; $i < $first; $i++) {
                    echo "<a href='$link" . $i . "/'>$i</a> ";
                }
            }
//отображаем заданный диапазон: текущая страница +-$prev
            for ($i = $first; $i < $last + 1; $i++) {
                echo "<a href='$link" . $i . "/'";
//если выводится текущая страница, то ей назначается особый стиль css
                if ($i == $curr_link) {
                    echo "class='$curr_css'";
                }
                echo ">$i</a> ";
            }
            $y = $last + 1;
//часть страниц скрываем троеточием
            if ($last < ceil($all / $x) and ceil($all / $x) - $last > 0)
                echo "<a href='$link" . $y . "/'>...</a> ";
//выводим последнюю страницу
            $e = ceil($all / $x);
            if ($last < ceil($all / $x))
                echo "<a href='$link" . $e . "/'>$e</a>";
        }
        
/* вывод списка постов для юзеров*/        
       
        /* условие для определения первого поста в списке
        * (можнож выводить только $x постов на 1 странице  */
        if ($page == 1) {
            $start_row = 0;
        } {
            $start_row = $x * ($page - 1);
        }
        
        /* вывод списка постов для юзеров*/
        $result = mysql_query("select * from posts1 limit $start_row, $x") or die(mysql_error());
        echo "Posts:<br>";
        echo "<table border = 1>";
        if ($row = mysql_fetch_array($result)) {
            do {
                echo "<tr><td>";
                printf("<a href=\"post.php?id=%s\"> %s </a><br>\n", $row["ID"], $row["Title"]);
                echo "</td></tr>";
            } while ($row = mysql_fetch_array($result));
        }
        echo "</table>";
        echo "Pages:";
        pagination($all, $x, $prev, $curr_link, $curr_css, $link);
        ?>
    </body>
</html>