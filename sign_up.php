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
        <div class='signUpForm'>
            <form action='method/create_user.php' method='POST'>
                <p>
                    <label for='username'>User Name:</label>
                    <input type='text' placeholder='Enter your username' id='username' name='username' required/>
                </p>
                <p>
                    <label for='email'>E-Mail:</label>
                    <input type='email' placeholder='Enter your e-mail' id='email' name='email' required/>
                </p>
                <p>
                    <label for='password1'>Password:</label>
                    <input type='password' placeholder='Min. 6 characters' id='password1' name='password1' pattern='.{6,64}' required/>
                </p>
                <p>
                    <label for='password2'>Retype Password:</label>
                    <input type='password' placeholder='Same as above' id='password2' name='password2' pattern='.{6,64}' required/>
                </p>
                <p>
                    <input type='submit' value='Sign Up'/>
                </p>
            </form>
        </div>
    </body>
</html>
