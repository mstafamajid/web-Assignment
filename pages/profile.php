<?php 
session_start();
$logoPath = "../assets/logo.svg";
include "../includes/navbar.php";
include "../includes/connection_to_sql.php";
$userdata = $_SESSION["userdata"];
$userid = $conn->real_escape_string($userdata['user_id']);
$sqlstt = $conn->prepare("SELECT books.book_title as title, books.num_of_posts `num-of-posts`, books.image_path FROM books where books.user_id=?;
");
$sqlstt_num=$conn->prepare("SELECT count(*),SUM(num_of_posts) from books where books.user_id=?;");
$sqlstt_num->bind_param('i',$userid);
$sqlstt_num->execute();
$sqlstt_num->bind_result($num_of_book,$num_of_post);
$sqlstt_num->fetch();
$sqlstt_num->free_result(); 
// $sqlstt_sum=$conn->prepare("SELECT COUNT(post_id) FROM `posts` WHERE user_id=$userid;");
// $sqll_info=$conn->prepare("SELECT books.book_title,books.image_path FROM books join users on users.user_id=books.user_id WHERE users.user_id=7;");
// $result_info=$sqll_info=
$userdata['num-of-post'] = $num_of_post;
$userdata['num-of-book'] = $num_of_book;
$bookdata = [];

$sqlstt->bind_param("i", $userid);
$result = $sqlstt->execute();

if ($result) {

    $sqlstt->bind_result($title, $num_of_posts,$path);
    
    while ($sqlstt->fetch()) {
  
        array_push($bookdata, ['title' => $title, 'num-of-posts' => $num_of_posts, 'path'=>"../".$path]);
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
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@800&family=Poppins:wght@400;600&display=swap"
    rel="stylesheet">
    <link rel="stylesheet" href="../styles/profile.css?<?=time()?>">
    <script src="../js/profile.js" defer></script>
</head>

<body>
    <div class="main">
        <!-- left side  -->
        <div class="sideProfile">
            <div class="imageprofile">
                <img class="img" src="../assets/blank-profile-picture-hd-images-photo.JPG" alt="profile image">

            </div>
            <div class="userinfo">

                <!-- to retrive the name you just need put this code inside php tag -->
                <!-- php echo $userdata['']  -->
                <h2><?php echo $userdata['name']?></h2>

                <!-- to retrive the username you just need put this code inside php tag -->
                <!-- php echo "@".$usedata[''] -->
                <h4 class="username"><?php echo $userdata['username']?></h4>
            </div>
            <div class="bookinfo">
                <div class="numbook ">
                    <h2 class=" num">No. books</h2>
                    <h2><?php echo $userdata['num-of-book']?></h2>
                </div>
                <div class="numpost">
                    <h2 class=" num">No. posts</h2>
                    <h2><?php echo $userdata['num-of-post']?></h2>
                </div>


            </div>
            <button class="btn-add"><a href="addbook.php">Add book</a> </button>
            <button class="btn-add"><a href="addposts.php"> Add post</a></button>
        </div>

        <!--right side -->


        <div class="booksContainar">
            <h1>books</h1>

            <div class="books">
                <?php 
for ($i=0; $i < count($bookdata); $i++) { 
  echo "  <div class='eachBook'>
      <img class='picture' src='".$bookdata[$i]['path']."'>
 
  <div class='info-about-eachbook'>
  <h4>".$bookdata[$i]['title']."</h4>
  <p>".$bookdata[$i]['num-of-posts']."</p>
  </div>
</div>";
}
?>
            </div>

        </div>
    </div>
    <div class="aboutM">
<p class="coppyR">© 2023 KoyaUniveristy. All rights reserved.</p>
<a href="aboutUs.php">About Us</a>

</div>
</body>

</html>