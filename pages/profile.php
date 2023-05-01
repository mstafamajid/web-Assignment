<?php 
session_start();
$logoPath = "../assets/logo.svg";
include "../includes/navbar.php";
include "../includes/connection_to_sql.php";
$userdata = $_SESSION["userdata"];
$userid = $conn->real_escape_string($userdata['user_id']);
$sqlstt = $conn->prepare("SELECT books.book_title as title, COUNT(post_id) AS `num-of-posts` FROM posts, books WHERE posts.book_id=books.book_id AND books.user_id=? GROUP BY posts.book_id");
$sqlstt_sum=$conn->prepare("SELECT COUNT(post_id) FROM `posts` WHERE user_id=$userid;");

$sqlstt->bind_param("i", $userid);
$userdata['num-of-post'] = 150;
$userdata['num-of-book'] = 30;
$bookdata = [];
$result = $sqlstt->execute();

if ($result) {


    $sqlstt->bind_result($title, $num_of_posts);
    while ($sqlstt->fetch()) {
       
      
       
       
        array_push($bookdata, ['title' => $title, 'num-of-posts' => $num_of_posts]);
        
       

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
    <link rel="stylesheet" href="../styles/profile.css">
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
                <h2>name</h2>

                <!-- to retrive the username you just need put this code inside php tag -->
                <!-- php echo "@".$usedata[''] -->
                <h4 class="username">@userName</h4>
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
            <button class="btn-add"><a href="">Add book</a> </button>
            <button class="btn-add"><a href=""> Add post</a></button>
        </div>

        <!--right side -->


        <div class="booksContainar">
            <h1>books</h1>

            <div class="books">
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
    </div>
</body>

</html>