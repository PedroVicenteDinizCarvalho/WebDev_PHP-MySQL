<?php
	function drawPostSearch($connection, $keyword){
		$authorName=getAuthorNames($connection);

		$keyword=stripslashes($keyword);
		$keyword=mysqli_real_escape_string($connection, $keyword);

		$queryName="SELECT * FROM `posts` WHERE `content` LIKE '%".$keyword."%' ORDER BY `editTime` DESC";
		$queryResult=mysqli_query($connection, $queryName);

		if(!($queryResult) or ((mysqli_num_rows($queryResult)) < 1)){
			echo "<div><p>Não foram encontrados Resultados :(</p></div>";
		}else{
			while($post=mysqli_fetch_assoc($queryResult)){
				echo "<div class='post'>
						<p class='postTitle'><b>".$post['title']."</b></p>
						<p class='notes'> Postado em: ".$post['editTime']."</p>
						<div>";

				if($post['image'] <> "0"){
					$size=getImageDimensions($post['image']);
					echo "<center><img src=".$post['image']. " width=".$size[0]. " height=".$size[1]. "/></center>";
				}

				echo "<p>" .$post['content']. "</p>
					 </div>
					  <p class='notes'>Autor: ".$authorName[$post['authorId']]."</p></div>";
			}
		}
	}
?>