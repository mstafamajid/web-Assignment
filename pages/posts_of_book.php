<?php 
$logoPath = "../assets\logo.svg";
include '../includes/navbar.php';
include '../includes/connection_to_sql.php';
if (!isset($_SESSION["userdata"])) {
    header("location:../index.php");
}
if(isset($_POST["delete"])){
    $postid=$_POST["delete"];
    $selectedbook=$_POST["book_id"];
    $sql="DELETE from posts where post_id='$postid'";
    $stmt_update=$conn->prepare("UPDATE books SET num_of_posts = num_of_posts - 2 WHERE book_id = ?");
    $stmt_update->bind_param("i",$selectedbook);
    $stmt_update->execute();
    $conn->query($sql);

}
if(isset($_POST['book_info'])) {
$_SESSION['book_info']=$_POST['book_info'];
}
$book_info = $_SESSION['book_info'];

$sql_book="SELECT * from books where book_id=$book_info";
$result=$conn->query($sql_book);
$row=$result->fetch_assoc();
$bookinfo=$row;
$book_img="../".$row['image_path'];

if (isset($_POST["like"]) && isset($_POST["post_id"])) {
    $post_id=$_POST["post_id"];
$user_id=$_SESSION['userdata']['user_id'];
    $query1 = "SELECT COUNT(*) as count FROM likes WHERE user_id = $user_id AND post_id = $post_id and is_liked='unlike'";
$result = $conn->query($query1);
$row = $result->fetch_assoc();

if ($row['count'] > 0) {
  
    $post_id = $_POST["post_id"];
    $sql = "UPDATE posts SET num_of_like = num_of_like - 1 WHERE post_id = $post_id";
    $conn->query($sql);
    $query2 = "UPDATE likes set is_liked='like' WHERE user_id = $user_id AND post_id = $post_id";
  $result = $conn->query($query2);
} else {
  
    $post_id = $_POST["post_id"];
    $sql = "UPDATE posts SET num_of_like = num_of_like + 1 WHERE post_id = $post_id";
    $conn->query($sql);
    $sql2="SELECT * from `likes` where post_id=$post_id AND user_id=$user_id and 'like'=is_liked ";
   $res2= $conn->query($sql2);
   $row=$res2->fetch_assoc();
   if($res2->num_rows>0){
       if($row['is_liked']=='like'){
           $sql = "UPDATE likes SET  is_liked='unlike' where post_id = $post_id and post_id=$post_id";
           $conn->query($sql);
       }
    }
    else{
        $query3 = "INSERT INTO `likes` (user_id, post_id,is_liked) VALUES ($user_id, $post_id,'unlike')";
        $conn->query($query3);

    }
 
}
}

$ui=$_SESSION['userdata']['user_id'];
$sql = "SELECT u.profile_image, b.book_id, l.user_id, p.post_id, p.post_title, p.post_detail, p.num_of_like, u.username, u.name, b.book_title, l.is_liked 
        FROM posts p 
        JOIN users u ON u.user_id = p.user_id 
        JOIN books b ON b.book_id = p.book_id 
        LEFT JOIN likes l ON l.post_id = p.post_id AND l.user_id =$ui
        
        where b.book_id=$book_info";

$result = $conn->query($sql);


// Create 2D array to hold data
$data = array();


if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if(($row["is_liked"]==null)){

            array_push($data,array(
                'isliked'=>'../assets/like-user.svg',
                'username' => $row["username"],
                'name' => $row['name'],
                'book_id'=>$row['book_id'],

                'book-title' => $row['book_title'],
                'post-title' => $row['post_title'],
                'post-desc' => $row['post_detail'],
                'number-like' => $row['num_of_like'],
                'image'=>$row['profile_image'],
                'post_id'=>$row['post_id'],
                'number-comment' => 20
            ));
        } else{
            if($row['user_id']==$_SESSION['userdata']['user_id']&$row['is_liked']=='unlike'){
                array_push($data,array(
                    'isliked'=>'../assets/liked.svg',
                    'username' => $row["username"],
                    'name' => $row['name'],
                'book_id'=>$row['book_id'],

                    'book-title' => $row['book_title'],
                    'post-title' => $row['post_title'],
                    'post-desc' => $row['post_detail'],
                    'number-like' => $row['num_of_like'],
                    'image'=>$row['profile_image'],
                    'post_id'=>$row['post_id'],
                    'number-comment' => 20
                ));
            } else{
                array_push($data,array(
                    'isliked'=>'../assets/like-user.svg',
                    'username' => $row["username"],
                    'name' => $row['name'],
                'book_id'=>$row['book_id'],
                'image'=>$row['profile_image'],
                    'book-title' => $row['book_title'],
                    'post-title' => $row['post_title'],
                    'post-desc' => $row['post_detail'],
                    'number-like' => $row['num_of_like'],
                    'post_id'=>$row['post_id'],
                    'number-comment' => 20
                ));
            }
        }
    }
};



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

       <?php 
       if($bookinfo['user_id']==$ui)
       echo '<a href="../pages/addposts.php" class="addp">Add Post</a>'
       ?>

    </ul>

</div>


<div class="home-feed">

<?php
$counter = 0;
for ($i = 0; $i < count($data); $i++) {

    echo "
    <div class='posts'>
    <div class='profile-info'>
    
       <div class='info_pack'>
       <img class=img-profile src=" . $data[$i]['image']  . " >
        <div class=con-profile-data>
        <div class=con-name-username>
        <h3 class='name'>" . $data[$i]['name']  . "</h3>
        <h4 class='username'>" . $data[$i]['username']  . "</h4>
        </div>
        <h4 class='username'>" . $data[$i]['book-title'] . "</h4>
        </div>
        </div>";

       
        if ($data[$i]['username']==$_SESSION['userdata']['username']) {
            echo "<form action='home.php' method='post'>
            <input type='hidden' name='book_id' value='".$data[$i]['book_id']."'>
            <button type='submit' name='delete' id='deletepost' value='". $data[$i]['post_id']."'> <img src='../assets/delete.svg' alt=''></button>
         </form>";
        }
        
          
        
      
        
      echo"  </div>
        <div class='post-info'>
        <h2 class='title'>" . $data[$i]['post-title'] . "</h2>
        <p class='post-desc'>" . $data[$i]['post-desc'] . "</p>
        </div>
        
        
        <div class='reactions-info'>
        <div class='like-num'>
        <img class=like-reaction src=../assets/like-btn.svg >
        " . $data[$i]['number-like'] . "</div>
        <div class='comment-num'>" . $data[$i]['number-comment'] . " Comments</div>
        </div>
        <div class=hr> </div>
        <div class='buttons'>
        <form method='post'>
        <input type='hidden' name='post_id' value='" . $data[$i]['post_id'] . "'>
        <button type='submit' name='like' class='like'>
        
        <img class='like-user' src='".$data[$i]['isliked']."'>
        </button>
        </form>
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
