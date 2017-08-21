<?php
    require_once 'method/mysql_connect.php'; 
    require_once 'method/draw_post_search.php'; 
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
         <p class='text'>Results:</p>
         <div>
            <?php
                drawPostSearch($connection, $_GET['keyword']);
            ?> 
         </div>
     </body>
 </html>
