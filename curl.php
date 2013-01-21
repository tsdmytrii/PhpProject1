<?php

$upload = 'http://cdn.blog.hostpro.ua/wp-content/uploads/2011/09/php.png';
$postdata = array( 'name' => 'evgenijj',
                   'email' => 'evgenijj@mail.ru',
                   'message' => 'Какое-то сообщение от пользователя evgenijj',
                   'upload' => "@".$upload );

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'http://localhost/curl1.php');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 0);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
curl_exec($ch);
curl_close($ch);

?>
