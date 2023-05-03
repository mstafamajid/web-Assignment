<?php 
$logoPath = "../assets\logo.svg";
include '../includes/navbar.php';
include '../includes/connection_to_sql.php';
session_start();
if(isset($_POST['book_info'])) {
   
   
   
$_SESSION['book_info']=$_POST['book_info'];
   
    
    
}
$book_info = $_SESSION['book_info'];

$sql_book="SELECT * from books where book_id=$book_info";
$result=$conn->query($sql_book);
$row=$result->fetch_assoc();
$bookinfo=$row;
$book_img="../".$row['image_path'];

$sql = $conn->prepare("SELECT users.username,users.name, books.book_title,posts.post_title, posts.post_detail, posts.num_of_like  \n"
. "FROM posts \n"

. "JOIN books ON posts.book_id = books.book_id \n"

. "JOIN users ON users.user_id = posts.user_id \n"

. "WHERE books.book_id =?;");

$sql->bind_param("i",$book_info);
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
<link rel="stylesheet" href="../styles/posts_of_book.css?<?=time()?>">
  
   
</head>
<body>
<section class="container">

<div class="side">
    <ul class="sidebar">
    <div class='eachbook'>
       
<?php     echo    "<img class='coverbook' src='".$book_img."'>"  ?>      
       <div class='title'>
           <h4 class="bookTitle"><?php  echo $bookinfo['book_title'] ?></h4>
           </div>

           <div class='desc'>
            <h3>Description</h3>
            <p class="description"><?php echo $bookinfo['book_description'] ?></p>
       </div>

<a href="../pages/addposts.php" class="addp">Add Post</a>

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
        <div class=hr> </div>
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
