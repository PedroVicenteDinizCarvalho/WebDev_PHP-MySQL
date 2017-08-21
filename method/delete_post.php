<?php 
	session_start();

	if(!isset($_SESSION['userId']) and !isset($_SESSION['postId'])){
		die();
	}else{
		require_once 'mysql_connect.php';

		$id=$_POST['postId'];

		$queryName="DELETE FROM `posts` WHERE `id`='".$id."' LIMIT 1";
		$queryResult=mysqli_query($connection, $queryName);
	}

	if(!$queryResult){
		echo "<script>alert('Erro a postagem já foi deletada!')";
	}else{
		echo "<script>alert('O post foi deletado com sucesso!');
				window.location.href='../index.php'
			  </script>";
	}
?>