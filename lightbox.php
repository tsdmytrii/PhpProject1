<html>
    <head>
        <title> LIGHTBOX </title>
        <script type="text/javascript" src="../js/jquery.js"></script>
        <style>
            #image-gallery {
                height: 100px;
                width: 200px;
                margin-left: auto;
                margin-right: auto;
                margin-top: 10%;
                border: 1px black solid;
                
            }
            img {
                padding: 10px;
            }
        </style>
    </head>
    <body>  
        <div id="image-gallery">
        <?php
        for ($i=1; $i<=3; $i++)
        {
            $name = "$i"."_1";
            echo "<img src='http://localhost/PhpProject1/imglight/$name.jpg' alt=''>";
        }
        ?>
        </div>
        <div id="lightbox">
            
        </div>
    </body>
</html>



