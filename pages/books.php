<?php 
//TODO: retrive id with book and paths

$logoPath = "../assets\logo.svg";
include '../includes/navbar.php';
include '../includes/connection_to_sql.php';
if (!isset($_SESSION["userdata"])) {
    header("location:../index.php");
}
$sql = "SELECT * from books";
$result = $conn->query($sql);

$Allbooks=[];

if($result->num_rows > 0){

    while($row = $result->fetch_assoc()){
array_push($Allbooks, $row) ;

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
    <link rel="stylesheet" href="../styles/books.css?<?=time()?>">
    <script src="../js/books.js" defer></script>
    <style>
       
    </style>
</head>
<body>
    <div class="main">
    <?php 
    for ($i=0; $i < count($Allbooks); $i++) { 
       echo "
       <div class='eachbook'>
       
       <img class='coverbook' src="."../".$Allbooks[$i]['image_path'].">
      
       <div class='title'>
           <h2>".$Allbooks[$i]['book_title']."</h2>
           </div>
           <div class='seepost'>
       <form action='posts_of_book.php' method='post'>
       <input type='hidden' name='book_info' value='".$Allbooks[$i]['book_id']."'>
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
