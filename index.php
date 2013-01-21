<html>

<head>
    <meta charset="utf-8">
    <title>PHP 1 task</title>
</head>

<body>

<?php
echo @$_COOKIE['header'];
?>

<form method="post" action="form.php">
    <p>Login: <input type="text" name="name"></p>
    <p>Password: <input type="password" name="password"></p>
    <p>Only for admins: <input type ="text" name="admin"></p>
   
    <p><input type="submit" name="submit" value="Увійти"></p>
    
</form>

<form method="get" action="registration_form.php">
	<p> <input type="submit" name="submit" value="registration"></p>

</form>



</body>
</html>





