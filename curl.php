<?php


$upload = 'http://cdn.blog.hostpro.ua/wp-content/uploads/2011/09/php.png';
$ch = curl_init ();
curl_setopt ($ch , CURLOPT_URL , $upload);
//curl_setopt ($ch , CURLOPT_USERAGENT , "Mozilla/5.0 (Windows NT 5.1) AppleWebKit/536.11 (KHTML, like Gecko) Chrome/20.0.1132.47 Safari/536.11");
curl_setopt ($ch , CURLOPT_HEADER , 0);
curl_setopt ($ch , CURLOPT_RETURNTRANSFER , 1 );
curl_setopt ($ch , CURLOPT_BINARYTRANSFER , 1);
$content = curl_exec($ch);
curl_close($ch);
header("Content-type: image/png");
echo $content;
/*$file = "http://localhost/PhpProject1/curl.php";
$num = 1;
$newpath = "/var/www/PhpProject1/uploads/";
$name= "$num.png";
$img = imagecreatefrompng($file);
imagepng($img, $newpath.$name);
*/
?>
