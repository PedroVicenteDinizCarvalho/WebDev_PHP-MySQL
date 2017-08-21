<?php
	require_once 'method/mysql_connect.php'; 
	require_once 'method/draw_posts.php'; 
	require_once 'method/draw_post_box.php'; 
	require_once 'method/utility.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="stylesheets/common.css" type="text/css" rel="stylesheet"/>
    </head>
    <body>
        <header>
            <?php 
            	require_once 'header.php'; 
            ?>
        </header>
        <?php 
            drawPostBox(); 
        ?>
        <p class='text'><b>Previous Posts:</b></p>
        <div>
            <?php 
                drawPosts($connection);
            ?>
        </div>
    </body>
</html>
