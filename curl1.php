<html>
    <head>
        <title> CURL </title>
    </head>
    <body>
    <?php

print_r( $_POST );
print_r( $_FILES );
move_uploaded_file ( $_FILES['upload']['tmp_name'], 'image.gif' );
?>
    </body>
</html>