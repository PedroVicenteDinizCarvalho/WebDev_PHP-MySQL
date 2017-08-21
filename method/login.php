<?php 
	require_once 'mysql_connect.php';

	if(!isset($_POST['email']) and !isset($_POST['password'])){
		die();
	}else{
		$email=stripslashes($_POST['email']);
		$password=stripslashes($_POST['password']);
		$email=mysqli_real_escape_string($connection, $email);
		$password=mysqli_real_escape_string($connection, $password);
	}

	$password=hash("sha256", $password);

	$queryText="SELECT * FROM `users` WHERE `email`='".$email."' AND 
		`senha`='".$password."' LIMIT 1";
	$queryResult=mysqli_query($connection, $queryText);

	if((!$queryResult) or ((mysqli_num_rows ($queryResult)) < 1)){
		echo "<script>alert ('Email ou senha invalidos!');
				location.href='../index.php'</script>";
	}else{
		$row=mysqli_fetch_assoc ($queryResult);
		session_start();
			$_SESSION['userId']=$row['id'];
			$_SESSION['userName']=$row['nome'];
			$_SESSION['password']=$row['senha'];
			$_SESSION['userEmail']=$row['email'];

		echo "<script>alert ('Login sussesful');
			window.location.href='../index.php';</script>";
	}
?>