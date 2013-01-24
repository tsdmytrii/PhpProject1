<html>
    <?php
    include "/var/www/PhpProject1/connect.php";
    connect($host, $user, $pass);
    $result = mysql_query("SELECT * FROM posts1");
    $id = 0;
    While ($id <= mysql_num_rows($result)) {
        $result1 = mysql_query("SELECT * FROM posts1 where ID = $id");
        $row = mysql_fetch_array($result1);
        if ($row[5] !== 0) {
            $num = $row['0'];
            $file = $row['5']; //здесь адрес к картинке 
            $fl = getimagesize($file);
            $type = $fl['mime'];
            //$name = basename($file);
            $name = "$num.jpeg";
            $newpath = "/var/www/PhpProject1/uploads/"; // здесь адрес куда ложить картинку (должны быть права на запись в эту папку) 
            switch ($type) {
                case "image/gif": $img = imagecreatefromgif($file);
                    imagejpeg($img, $newpath . $name);

                    $f = "/var/www/PhpProject1/uploads/$id.jpeg";
                    $newname = "$id" . "_200px";
                    $src = imagecreatefromjpeg($f);
                    $filename = "/var/www/PhpProject1/uploads/$newname.jpeg";
                    list($width, $height) = getimagesize($f);
                    $newwidth = 200;
                    $newheight = 200;
                    $tmp = imagecreatetruecolor($newwidth, $newheight);
                    imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
                    imagejpeg($tmp, $filename, 100);
                    imagedestroy($src);
                    imagedestroy($tmp);
                    
                    
                    // создаём пустую квадратную картинку 
                    // важно именно truecolor!, иначе будем иметь 8-битный результат 
                    $f = "/var/www/PhpProject1/uploads/$newname.jpeg";
                    $src = imagecreatefromjpeg($f);
                            $w_src = imagesx($src);
                    $h_src = imagesy($src);
                    header("Content-type: image/jpeg");
                    $w = 100;
                    $dest = imagecreatetruecolor($w, $w);
                                       imagecopyresized($dest, $src, 0, 0, 50, 50, 100, 100, 100, 100);
                                        $q = 100;
                    $newname1 = "$id" . "_100px";
                    // вывод картинки и очистка памяти 
                    imagejpeg($dest, "/var/www/PhpProject1/uploads/$newname1.jpeg", $q);
                    imagedestroy($dest);
                    imagedestroy($src);
                    break;

                case "image/jpeg": $img = imagecreatefromjpeg($file);

                    imagejpeg($img, $newpath . $name);
                    $f = "/var/www/PhpProject1/uploads/$id.jpeg";
                    $newname = "$id" . "_200px";
                    $src = imagecreatefromjpeg($f);
                    $filename = "/var/www/PhpProject1/uploads/$newname.jpeg";
                    list($width, $height) = getimagesize($f);
                    $newwidth = 200;
                    $newheight = 200;
                    $tmp = imagecreatetruecolor($newwidth, $newheight);
                    imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
                    imagejpeg($tmp, $filename, 100);
                    imagedestroy($src);
                    imagedestroy($tmp);
                    
                    
                    
                    
                    
                    $f = "/var/www/PhpProject1/uploads/$newname.jpeg";
                    $src = imagecreatefromjpeg($f);
                            $w_src = imagesx($src);
                    $h_src = imagesy($src);
                    header("Content-type: image/jpeg");
                    $w = 100;
                    $dest = imagecreatetruecolor($w, $w);
                                       imagecopyresized($dest, $src, 0, 0, 50, 50, 100, 100, 100, 100);
                                        $q = 100;
                    $newname1 = "$id" . "_100px";
                    // вывод картинки и очистка памяти 
                    imagejpeg($dest, "/var/www/PhpProject1/uploads/$newname1.jpeg", $q);
                    imagedestroy($dest);
                    imagedestroy($src);
                    break;
                case "image/png": $img = imagecreatefrompng($file);

                    imagejpeg($img, $newpath . $name);
                    $f = "/var/www/PhpProject1/uploads/$id.jpeg";
                    $newname = "$id" . "_200px";
                    $src = imagecreatefromjpeg($f);
                    $filename = "/var/www/PhpProject1/uploads/$newname.jpeg";
                    list($width, $height) = getimagesize($f);
                    $newwidth = 200;
                    $newheight = 200;
                    $tmp = imagecreatetruecolor($newwidth, $newheight);
                    imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
                    imagejpeg($tmp, $filename, 100);
                    imagedestroy($src);
                    imagedestroy($tmp);
             
                    
                    
                    
$f = "/var/www/PhpProject1/uploads/$newname.jpeg";
                    $src = imagecreatefromjpeg($f);
                            $w_src = imagesx($src);
                    $h_src = imagesy($src);
                    header("Content-type: image/jpeg");
                    $w = 100;
                    $dest = imagecreatetruecolor($w, $w);
                                       imagecopyresized($dest, $src, 0, 0, 50, 50, 100, 100, 100, 100);
                                        $q = 100;
                    $newname1 = "$id" . "_100px";
                    // вывод картинки и очистка памяти 
                    imagejpeg($dest, "/var/www/PhpProject1/uploads/$newname1.jpeg", $q);
                    imagedestroy($dest);
                    imagedestroy($src);
                    break;
            } 
            
                $id++;
            
        }
        
    }
    ?>
</html>