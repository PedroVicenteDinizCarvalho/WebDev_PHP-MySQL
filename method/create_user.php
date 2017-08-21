<?php
	require_once 'mysql_connect.php';
	
	if(!isset($_POST['username']) or !isset($_POST['email']) or !isset($_POST['password1']) or !isset($_POST['password2'])){
		die();	
	}

	$username=stripslashes($_POST['username']);
	$email=stripslashes($_POST['email']);
	$password1=stripslashes($_POST['password1']);
	$password2=stripslashes($_POST['password2']);
	$username=mysqli_real_escape_string($connection, $username);
	$email=mysqli_real_escape_string($connection, $email);
	$password1=mysqli_real_escape_string($connection, $password1);
	$password2=mysqli_real_escape_string($connection, $password2);
	
	if($password1<>$password2){
		echo "<script>alert('As senhas não conferem')</script>";
		echo "<script>window.location.href='../sign_up.php'</script>";	
	}else{
		$password=hash("sha256", $password1);

	$queryText="INSERT INTO `users`(`nome`, `email`, `senha`) VALUES
		('".$username."','".$email."','".$password."')";
	$queryResult=mysqli_query($connection, $queryText);

		if(!$queryResult){
			echo"<script>alert('Error while creating user!')</script>";
		}else{
			echo"<script>window.location.href='../index.php'</script>";
		}
	}
?>