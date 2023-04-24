<?php 
//TODO: retrive id with book and paths
session_start();
$logoPath = "../assets\logo.svg";
include '../includes/navbar.php';
$Allbooks = array(
    
    array('paths' =>'../assets/book.svg' ,'title'=>'book title1' ), 
    array('paths' =>'../assets/book.svg' ,'title'=>'book title2' ), 
    array('paths' =>'../assets/book.svg' ,'title'=>'book title3' ), 
    array('paths' =>'../assets/book.svg' ,'title'=>'book title4' ), 
    array('paths' =>'../assets/book.svg' ,'title'=>'book title5' ), 
    array('paths' =>'../assets/book.svg' ,'title'=>'book title6' ), 
    array('paths' =>'../assets/book.svg' ,'title'=>'book title7' ), 
    array('paths' =>'../assets/book.svg' ,'title'=>'book title8' ), 
    array('paths' =>'../assets/book.svg' ,'title'=>'book title9' ), 
    array('paths' =>'../assets/book.svg' ,'title'=>'book title10' ), 
    array('paths' =>'../assets/book.svg' ,'title'=>'book title11' ), 
    array('paths' =>'../assets/book.svg' ,'title'=>'book title12' ), 
    array('paths' =>'../assets/book.svg' ,'title'=>'book title13' ), 
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