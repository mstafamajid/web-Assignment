<?php 
//TODO: retrive id with book and paths
session_start();
$logoPath = "../assets\logo.svg";
include '../includes/navbar.php';
include '../includes/connection_to_sql.php';

$sql = "SELECT * from books";
$result = $conn->query($sql);

$Allbooks=array();

if($result->num_rows > 0){

    while($row = $result->fetch_assoc()){
$Allbooks []= array(
    'paths' =>"../assets/book.svg" ,
    'title'=>$row["book_title"] );

}

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/books.css">
    <style>
       
    </style>
</head>
<body>
    <div class="main">
    <?php 
    for ($i=0; $i < count($Allbooks); $i++) { 
       echo "
       <div class='eachbook'>
       
       <img class='coverbook' src=".$Allbooks[$i]['paths'].">
      
       <div class='title'>
           <h2>".$Allbooks[$i]['title']."</h2>
           </div>
           <div class='seepost'>
       <form action='posts_of_book.php' method='post'>
       <input type='hidden' name='book_info' value='".json_encode($Allbooks[$i])."'>
       <input type='submit' value='See posts'>
   </form>
       </div>
   </div>
       ";

    }
    ?>

    </div>
</body>
</html>
