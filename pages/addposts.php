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
            background-color: #EBEBEB;
            font-family: 'Poppins', sans-serif;
        }

        .main {
            padding: 30px;
            padding-bottom: 20px;
            margin: 20px auto 0 auto;
            display: flex;
            flex-direction: column;
            align-items: center;
            border-radius: 20px;
            background-color: white;
            width: 450px;
        }

.main h2{
    color: #414CAB;
}


.main input[type="text"]{
border-radius: 5px;
width: 300px;
height: 50px;
background-color: #E7E9F6;
border: none;
font-size: 15px;
color: #51557E;
padding-left: 10px;
}

.main textarea{
font-family: 'Poppins', sans-serif;
border-radius: 5px;
max-width: 290px;
height: 170px;
background-color: #E7E9F6;
border: none;
font-size: 15px;
color: #51557E;
padding: 15px;
}

.subBtn{
transition: 0.2s;
font-weight: bolder;
color: white;
background-color: #414CAB;
font-size: 18px;
width: 317px;
padding: 10px;
border-radius: 7px;
}


.subBtn:hover{
box-shadow: 0 0 8px 0 #414CAB;
cursor: pointer;
}


select{
padding: 15px 20px;
background-color: #E7E9F6;
border: none;
border-radius: 7px;
color: #51557E;
font-family: 'Poppins', sans-serif;
margin-left: -160px;
}

select option{
    background-color: #414CAB;
    color: white;
    padding: 50px;
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