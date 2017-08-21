<?php  
	session_start();

	if(!isset($_SESSION['userId']) and !isset($_POST['title']) or !isset($_POST['content'])){
		die();
		echo "<script>alert('Faça Login!')</script>";
		echo "<script>window.location.href='../index.php'</script>";
	}else{
		require_once 'mysql_connect.php';
			$title=stripslashes($_POST['title']);
			$content=stripslashes($_POST['content']);
			$title=mysqli_real_escape_string($connection, $title);
			$content=mysqli_real_escape_string($connection, $content);

			$authorId=$_SESSION['userId'];

			$tmpFilePath=$_FILES['image']['tmp_name'];			
	}
	

	if($tmpFilePath <> ""){
		$check=getimagesize($_FILES['image']['tmp_name']);
		$ext=explode("/", $check['mime']);
		$hash=md5(time());
		$newFilePath="postImg/".$hash.".".$ext[1];
		if(file_exists($tmpFilePath)){
			if(move_uploaded_file($tmpFilePath, "../".$newFilePath)){
				$image=$newFilePath;
			}else{
				$image="0";
			}
		}
	}else{
		$image="0";
	}

	$queryText="INSERT INTO `posts`(`title`, `content`, `authorId`, `image`) VALUES 
		('".$title."','".$content."','".$authorId."','".$image."')";
	$queryResult=mysqli_query($connection, $queryText);

	if(!$queryResult){
		echo "<script>alert('Erro na criação do post!')</script>";
	}else{
		echo "<script>window.location.href='../index.php'</script>";
	}
?>