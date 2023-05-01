<?php 
$logoPath = "../assets\logo.svg";
include '../includes/navbar.php';
include '../includes/connection_to_sql.php';
if(isset($_POST['book_info'])) {
   
   
    $book_info = json_decode($_POST['book_info'],true);
     $book_info['book_id'];
    
}

$sql = $conn->prepare("SELECT users.username,users.name, books.book_title,posts.post_title, posts.post_detail, posts.num_of_like \n"
. "FROM posts \n"

. "JOIN books ON posts.book_id = books.book_id \n"

. "JOIN users ON users.user_id = posts.user_id \n"

. "WHERE books.book_id =?;");
$sql->bind_param("i",$book_info['book_id']);
$result=$sql->execute();
$post_of_eachbook_data = array(
);
if($result){
    $sql->bind_result($username, $name,$book_title,$post_title,$post_detail,$num_of_like);
    while($sql->fetch()){
array_push($post_of_eachbook_data,array(
    'username' => $username,
    'name' => $name,
    'book-title' => $book_title,
    'post-title' => $post_title,
    'post-desc' => $post_detail,
    'number-like' => $num_of_like,
    'number-comment' => 20
));
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
    <link rel="stylesheet" href="../styles/home.css?<?=time()?>">
<!--     
    <style>
        .main {
            display: flex;
            flex-direction: row;
            gap: 30px;
            height: 100%;
            width: 100%;
        }

        .side {
            display: flex;
            flex-direction: column;
          
width: 291.96px;
height: 641px;


background: green;
border-radius: 19px;
        }


        .home-feed {

            padding-top: 50px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 90px;
            background-color: grey;
            height: 100%;

            width: 80%;
        }

        .posts {

            height: 340px;
            width: 638px;
            background-color: #FFF;
            border-radius: 20px;
        }

        .buttons {
            display: flex;
            flex-direction: row;
            justify-content: space-around;
            height: 30px;
            width: 100%;
            background-color: red;
            border-radius: 0px 0px 20px 20px;
        }
    </style> -->
   
</head>
<body>
<section class="container">

<div class="side">
    <ul class="sidebar">
        <li>

            <a href=""></a>
        </li>
        <li>
            <img class="img-sidebar" src="../assets/add-book-sidebar.svg" alt="" srcset=""><a
                href="../pages/addbook.php">add
                books</a>
        </li>
        <li>
            <img class="img-sidebar" src="../assets/add-post.svg" alt="" srcset=""><a
                href="../pages/addposts.php">add
                posts</a>
        </li>
        <li>
            <img class="img-sidebar" src="../assets/books.svg" alt="" srcset=""><a href="">books</a>
        </li>
        <div class="hr"></div>
        <form action="home.php" method="post" >
            <input type="submit" value="logout" name="logout">
        </form>

    </ul>

</div>


<div class="home-feed">

    <?php
    $counter = 0;
    for ($i = 0; $i < count($post_of_eachbook_data); $i++) {

        echo "
        <div class='posts'>
        <div class='profile-info'>
        
           
            <img class=img-profile src=../assets/profile-pic.png >
            <div class=con-profile-data>
            <div class=con-name-username>
            <h3 class='name'>" . $post_of_eachbook_data[$i]['name']  . "</h3>
            <h4 class='username'>" . $post_of_eachbook_data[$i]['username']  . "</h4>
            </div>
            <h4 class='username'>" . $post_of_eachbook_data[$i]['book-title'] . "</h4>
            </div>
          
        </div>
        <div class='post-info'>
            <h2 class='title'>" . $post_of_eachbook_data[$i]['post-title'] . "</h2>
            <p class='post-desc'>" . $post_of_eachbook_data[$i]['post-desc'] . "</p>
        </div>
        

        <div class='reactions-info'>
            <div class='like-num'>
            <img class=like-reaction src=../assets/like-btn.svg >
            " . $post_of_eachbook_data[$i]['number-like'] . "</div>
            <div class='comment-num'>" . $post_of_eachbook_data[$i]['number-comment'] . " Comments</div>
        </div>
        <div class=hr>. </div>
          <div class='buttons'>
            <div class='like'>
            <img class=like-user src=../assets/like-user.svg >
            like </div>
            <div class='comment'>
            <img class=like-user src=../assets/comment.svg >comment</div>
          </div>
        </div>
    ";
    }
    ?>
</div>
</section>
</body>
</html>