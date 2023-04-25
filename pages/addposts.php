<?php
$logoPath = "../assets\logo.svg";
include '../includes/navbar.php';

$books_of_current_user=["book1", "book2", "book3" ,"book4"];

if(isset($_POST["submit"])){

    $bookname=$_POST["post-title"];
    $bookdesc=$_POST["post-desc"];
    $selectedbook=$_POST["selectbook"];
 
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/addposts.css">
    <style>
    
    </style>
</head>

<body>
    <div class="main">
        <h2>Add Post</h2>
        <form action='' method="post">
            <input type="text" name="post-title" id="post-title" placeholder="Write Post Title">
            <textarea placeholder="Write Post Description" name="post-desc" id="post-desc" cols="40" rows="10"></textarea>
            <div class="select book">
               
            <select name="selectbook" id="">
<option value="">select a book</option>
<?php 
for ($i=0; $i < count($books_of_current_user); $i++) { 
 echo "
 <option value='".$books_of_current_user[$i]."'>".$books_of_current_user[$i]."</option>
 
 ";
}
?>
            </select>
              
              

            </div>
            <input type="submit" value="add" name="submit" class="subBtn">
        </form>
    </div>
</body>

</html>