<?php
    function drawLoginForm(){
        echo"<form action='method/login.php' method='POST'>
                <input type='email' placeholder='E-Mail' name='email'>
                <input type='password' placeholder='Password' name='password'>
                <input class='button' type='submit' value='Login'>
            </form>

            <form action='sign_up.php'>
                <input class='button' type='submit' value='Sign Up'>
            </form>";
    }
    function drawLogoutForm(){
        echo"<form action='method/logout.php' method='POST'>
                <input class='button' type='submit' value='Logout'>
             </form>";
    }
?>
    <p class="headerParagraph">
<?php
    session_start();
    if(!isset($_SESSION['userId']) or !isset($_SESSION['password'])){
        drawLoginForm();
    }else{
        drawLogoutForm();
    }
?>
		<form action = 'search.php' method = 'GET'>
			<input class='searchBar' type='search' placeholder='Search a post' name='keyword' required/>
			<input class='button' type='submit' value='Search'/>
		</form>
    <!-- The paragraph started at the first form -->
    </p>
