<html>
    <head>
        <title> CSV </title>
        <meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
    </head>
    <body>
        <?php
        include "/var/www/PhpProject1/connect.php";
        connect($host, $user, $pass);
        $row = 1;
        if (($handle = fopen("/var/www/PhpProject1/articles.csv", "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $num = count($data);
                echo "<p> $num columns in line $row: <br /></p>\n";
                $id = $row;
                $row++;
                if ($row !== 1) {
                    $title = str_replace("'", "&#39;", $data[0]);
                    $author = str_replace("'", "&#39;",$data[1]);
                    $date = $data[2];
                    $text = str_replace("'", "&#39;",$data[3]);
                    $image = str_replace("'", "&#39;",$data[4]);
                    
               /* if ($title == null) {
                    echo "netu title";
                }
                 */   
                }
                
                mysql_query("INSERT INTO `posts1`(`ID`, `Title`, `Author`, `Date`, `Text`, `Image`) VALUES ('$id', '$title', '$author', '$date', '$text', '$image')") or die(mysql_error());
//mysql_query("INSERT INTO posts1('ID', 'title', 'author', 'data', 'text', 'image') values('$id', '$title', '$author', '$date', '$text, '$image')") or die(mysql_error());
                ////for ($c=0; $c < $num; $c++) {
                //echo $data[$c] . "<br />\n";
                //}
                //echo $data[2] . "<br />\n";
            }
            fclose($handle);
        }

        //mysql_query("INSERT INTO posts1(ID, title, author, data, text, image) values("$data[0]", "$data[1]", "$data[2], "$data[3]", "$data[4]") ");
        ?>
    </body>
</html>