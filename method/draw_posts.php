<?php 
	function drawPosts($connection){
		
		$authorNames=getAuthorNames($connection);

		$queryName="SELECT * FROM `posts` ORDER BY `editTime` DESC";

		$queryResult=mysqli_query($connection, $queryName);

		if(!($queryResult) or ((mysqli_num_rows($queryResult)) < 1)){
			echo "<div class='post'><p>Não encontramos postagens :(</p></div>";
		}else{
			while($post=mysqli_fetch_assoc($queryResult)){
				echo "<div class='post'>
						<p class='postTitle'><b>".$post['title']."</b></p>
						<p class='notes'>Postado em: " .$post['editTime']."</p>
					  <div>";

				if($post['image'] <> "0"){
					$size=getImageDimensions($post['image']);
					echo "<center><img src=".$post['image']. " width=".$size[0]. " height=".$size[1]. "/></center>";
				}

				echo "<p>".$post['content']."</p></div>
					  <p class='notes'>Autor: ".$authorNames[$post['authorId']]."</p>";

				if(isset($_SESSION['userId'])){
					echo "<form action='method/delete_post.php' method='post'>
							<input type='hidden' value='".$post['id']."' name='postId'/>
							<input class='deleteButton' type='submit' value='Delete'/>
						  </form>";
				}else{
					echo "</div>";
				}
			}
		}
	}
?>