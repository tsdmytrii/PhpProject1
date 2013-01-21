<html>
<?php
        include "/var/www/PhpProject1/connect.php";
        connect($host, $user, $pass);
        $result = mysql_query("SELECT * FROM posts1");
        //for ($id=2; $id<mysql_num_rows($result); $id++){ 
        $result1 = mysql_query("SELECT * FROM posts1 where ID = 8");
        $row = mysql_fetch_array($result1);        
        $num = $row['0'];
        $file = $row['5']; //здесь адрес к картинке 
        $fl = getimagesize($file); 
        $type = $fl['mime']; 
        //$name = basename($file);
        $name= "$num.png";
        $newpath = "/var/www/PhpProject1/uploads/"; // здесь адрес куда ложить картинку (должны быть права на запись в эту папку) 
        switch($type) 
        {
        case "image/gif": $img = imagecreatefromgif($file);
        imagegif($img, $newpath.$name); 
        break;
        case "image/jpeg": $img = imagecreatefromjpeg($file); 
        imagejpeg($img, $newpath.$name); 
        break; 
        case "image/png": $img = imagecreatefrompng($file);
        imagepng($img, $newpath.$name);
        break;
        }   
        
?>
</html>