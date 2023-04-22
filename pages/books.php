<?php 
session_start();
$logoPath = "../assets\logo.svg";
include '../includes/navbar.php';
$Allbooks = array(
    
    array('paths' =>'../assets/book.svg' ,'title'=>'book title' ), 
    array('paths' =>'../assets/book.svg' ,'title'=>'book title' ), 
    array('paths' =>'../assets/book.svg' ,'title'=>'book title' ), 
    array('paths' =>'../assets/book.svg' ,'title'=>'book title' ), 
    array('paths' =>'../assets/book.svg' ,'title'=>'book title' ), 
    array('paths' =>'../assets/book.svg' ,'title'=>'book title' ), 
    array('paths' =>'../assets/book.svg' ,'title'=>'book title' ), 
    array('paths' =>'../assets/book.svg' ,'title'=>'book title' ), 
    array('paths' =>'../assets/book.svg' ,'title'=>'book title' ), 
    array('paths' =>'../assets/book.svg' ,'title'=>'book title' ), 
    array('paths' =>'../assets/book.svg' ,'title'=>'book title' ), 
    array('paths' =>'../assets/book.svg' ,'title'=>'book title' ), 
    array('paths' =>'../assets/book.svg' ,'title'=>'book title' ), 
);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-color: grey;
        }
        .main{
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            gap: 100px;
         
            justify-content: center;
        }
        .eachbook{
            width: 244px;
height: 428.56px;
background: #FFFFFF;
border-radius: 15.8789px;
        }
    </style>
</head>
<body>
    <div class="main">
    <?php 
    for ($i=0; $i < count($Allbooks); $i++) { 
       echo "
       <div class='eachbook'>
       <div class='coverbook'>
           <img src=".$Allbooks[$i]['paths'].">
       </div>
       <div class='title'>
           <h2>".$Allbooks[$i]['title']."</h2>
       </div>
       <div class='seepost'>
<a href='posts_of_book.php'>See posts</a>
       </div>
   </div>
       ";

    }
    ?>
    </div>
</body>
</html>