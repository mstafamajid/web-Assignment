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
    <style>
        body {
            background-color: #ebebeb;

        }

        .main {

            margin: 0 auto;
            display: flex;
            flex-direction: column;
            align-items: center;

            background-color: white;
            width: 400px;
            height: 500px;
        }

        form {
            padding: 0px 30px;
            gap: 30px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .upload-cover {
            height: 60px;
            width: 100%;

            border: 2px dashed black;
            border-radius: 20px;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-evenly;
        }

        .icon {
            display: flex;

            justify-content: center;
            align-items: center;
            padding: 0 10px;
            height: 50px;
            background-color: white;
            border-radius: 10px;

        }
    </style>
</head>

<body>
    <div class="main">
        <h2>Add Book</h2>
        <form action='' method="post">
            <input type="text" name="post-title" id="post-title">
            <textarea name="post-desc" id="post-desc" cols="40" rows="10"></textarea>
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
            <input type="submit" value="add" name="submit">
        </form>
    </div>
</body>

</html>