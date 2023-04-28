<?php 
$logoPath = "../assets\logo.svg";
include '../includes/navbar.php';

if(isset($_POST['book_info'])) {
   
   
    $book_info = json_decode($_POST['book_info'],true);
    // Do something with $book_info, such as displaying it on the page
   
}


$dummyData = array(
    array(
        'username' => "mustafa",
        'name' => "mustafa majid",
        'book-title' => 'coding if funny',
        'post-title' => 'flutter piace of cake',
        'post-desc' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum maxime magnam iste officiis voluptatem, in corporis. Error, quas. Cupiditate doloremque soluta ipsa accusantium vero quis repudiandae architecto quo voluptatem ipsam?",
        'number-like' => 350,
        'number-comment' => 20

    ),
    array(
        'username' => "mustafa",
        'name' => "mustafa majid",
        'book-title' => 'coding if funny',
        'post-title' => 'flutter piace of cake',
        'post-desc' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum maxime magnam iste officiis voluptatem, in corporis. Error, quas. Cupiditate doloremque soluta ipsa accusantium vero quis repudiandae architecto quo voluptatem ipsam?",
        'number-like' => 350,
        'number-comment' => 20

    ),
    array(
        'username' => "mustafa",
        'name' => "mustafa majid",
        'book-title' => 'coding if funny',
        'post-title' => 'flutter piace of cake',
        'post-desc' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum maxime magnam iste officiis voluptatem, in corporis. Error, quas. Cupiditate doloremque soluta ipsa accusantium vero quis repudiandae architecto quo voluptatem ipsam?",
        'number-like' => 350,
        'number-comment' => 20

    ),
    array(
        'username' => "mustafa",
        'name' => "mustafa majid",
        'book-title' => 'coding if funny',
        'post-title' => 'flutter piace of cake',
        'post-desc' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum maxime magnam iste officiis voluptatem, in corporis. Error, quas. Cupiditate doloremque soluta ipsa accusantium vero quis repudiandae architecto quo voluptatem ipsam?",
        'number-like' => 350,
        'number-comment' => 20

    ),
    array(
        'username' => "mustafa",
        'name' => "mustafa majid",
        'book-title' => 'coding if funny',
        'post-title' => 'flutter piace of cake',
        'post-desc' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum maxime magnam iste officiis voluptatem, in corporis. Error, quas. Cupiditate doloremque soluta ipsa accusantium vero quis repudiandae architecto quo voluptatem ipsam?",
        'number-like' => 350,
        'number-comment' => 20

    ),
    array(
        'username' => "mustafa",
        'name' => "mustafa majid",
        'book-title' => 'coding if funny',
        'post-title' => 'flutter piace of cake',
        'post-desc' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum maxime magnam iste officiis voluptatem, in corporis. Error, quas. Cupiditate doloremque soluta ipsa accusantium vero quis repudiandae architecto quo voluptatem ipsam?",
        'number-like' => 350,
        'number-comment' => 20

    ),
    array(
        'username' => "mustafa",
        'name' => "mustafa majid",
        'book-title' => 'coding if funny',
        'post-title' => 'flutter piace of cake',
        'post-desc' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum maxime magnam iste officiis voluptatem, in corporis. Error, quas. Cupiditate doloremque soluta ipsa accusantium vero quis repudiandae architecto quo voluptatem ipsam?",
        'number-like' => 350,
        'number-comment' => 20

    ),
);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <link rel="stylesheet" href="../styles/home.css">
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
    for ($i = 0; $i < count($dummyData); $i++) {

        echo "
        <div class='posts'>
        <div class='profile-info'>
        
           
            <img class=img-profile src=../assets/profile-pic.png >
            <div class=con-profile-data>
            <div class=con-name-username>
            <h3 class='name'>" . $dummyData[$i]['name']  . "</h3>
            <h4 class='username'>" . $dummyData[$i]['username']  . "</h4>
            </div>
            <h4 class='username'>" . $dummyData[$i]['book-title'] . "</h4>
            </div>
          
        </div>
        <div class='post-info'>
            <h2 class='title'>" . $dummyData[$i]['post-title'] . "</h2>
            <p class='post-desc'>" . $dummyData[$i]['post-desc'] . "</p>
        </div>
        

        <div class='reactions-info'>
            <div class='like-num'>
            <img class=like-reaction src=../assets/like-btn.svg >
            " . $dummyData[$i]['number-like'] . "</div>
            <div class='comment-num'>" . $dummyData[$i]['number-comment'] . " Comments</div>
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