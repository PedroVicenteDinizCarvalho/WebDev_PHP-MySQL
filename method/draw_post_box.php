<?php
    function drawPostBox(){
        if (isset($_SESSION['userName']) and isset($_SESSION['password'])){
            echo "<div class='newPostForm'>
                    <p><b>Write a new post:</b></p>
                    <form action='method/create_post.php' method='POST' enctype='multipart/form-data'>
                        <p>
                            <input type='text' placeholder='Title' name='title' required>
                        </p>
                        <p>
                            <textarea rows='10' cols='50' name='content' required></textarea>
                        </p>
                        <p><input type='file' name='image'></p>
                        <p><input type='submit' value='Submit'></p>
                    </form>
                  </div>";
        }
    }
?>
