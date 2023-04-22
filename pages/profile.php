<?php 
session_start();
$logoPath = "../assets\logo.svg";
include "../includes/navbar.php";
$userdata=$_SESSION["userdata"];
$userdata['num-of-post']=150;
$userdata['num-of-book']=30;
$bookdata = array(
    array('title' =>"name",'num-of-posts'=>20),
    array('title' =>"name",'num-of-posts'=>20),
    array('title' =>"name",'num-of-posts'=>20),
    array('title' =>"name",'num-of-posts'=>20),
    array('title' =>"name",'num-of-posts'=>20),
    array('title' =>"name",'num-of-posts'=>20),
    array('title' =>"name",'num-of-posts'=>20),
    array('title' =>"name",'num-of-posts'=>20),
    array('title' =>"name",'num-of-posts'=>20),
    array('title' =>"name",'num-of-posts'=>20),
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
        *{
            margin: 0;
            padding: 0;     
        box-sizing: border-box;  
     }
   
        .main{
            display: flex;
            flex-direction: row;
          justify-content: space-around;
          border: 4px solid black;
         
        }
        .books{
            border: 1px solid red;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
          
        }
    </style>
</head>
<body>
   <div class="main">
    <div class="sideProfile">
<div class="imageprofile">
<img src="" alt="profile image">

</div>
<div class="userinfo">
<h2><?php echo $userdata['name']?></h2>
<h4><?php echo "@".$userdata['username']?></h4>
</div>
<div class="bookinfo">
<div class="numbook">
    <h2>No. books</h2>
    <h2><?php echo $userdata['num-of-book']?></h2>
</div>
<div class="numpost">
    <h2>No. posts</h2>
    <h2><?php echo $userdata['num-of-post']?></h2>
</div>
</div>

    </div>
    <div class="books">
        <h2>books</h2>
<?php 
for ($i=0; $i < count($bookdata); $i++) { 
  echo "  <div class='eachBook'>
  <div class='picture'>
      <img src='../assets/book.svg'>
  </div>
  <div class='info-about-eachbook'>
  <h4>".$bookdata[$i]['title']."</h4>
  <p>".$bookdata[$i]['num-of-posts']."</p>
  </div>
</div>";
}
?>
      
    </div>
   </div>
</body>
</html>