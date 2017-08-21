<?php

    function getImageDimensions($imagePath){
        $maxSize=384;

        $imageData=getimagesize($imagePath);
        $originalWidth=$imageData[0];
        $originalHeight=$imageData[1];

        if($originalWidth > $originalHeight){
            $height=($maxSize * $originalHeight) / ($originalWidth);
            $width=$maxSize;
        }else{
            $width=($maxSize * $originalWidth) / ($originalHeight);
            $height=$maxSize;
        }

        return array ($width, $height);
    }

    function getAuthorNames($connection){
        $queryName="SELECT `nome` FROM `users`";
        $queryResult=mysqli_query($connection, $queryName);
        if (!($queryResult) or ((mysqli_num_rows ($queryResult)) < 1)){

        }else{
                $rows=[];
                $rows[]=null;
                while($row=mysqli_fetch_assoc($queryResult)){
                    $rows[]=$row['nome'];
                }
                return $rows;
        }
    }

?>
