<?php 

$logoPath = "../assets/logo.svg";
include "../includes/navbar.php";
include "../includes/connection_to_sql.php";

$userdata = $_SESSION["userdata"];
if (isset($_POST["logout"])) {

    session_destroy();
    header("location:../index.php");
}
$userid = $conn->real_escape_string($userdata['user_id']);
$sqlstt = $conn->prepare("SELECT books.book_title as title, books.num_of_posts `num-of-posts`, books.image_path FROM books where books.user_id=?;
");
$sqlstt_num=$conn->prepare("SELECT count(*),SUM(num_of_posts) from books where books.user_id=?;");
$sqlstt_num->bind_param('i',$userid);
$sqlstt_num->execute();
$sqlstt_num->bind_result($num_of_book,$num_of_post);
$sqlstt_num->fetch();
$sqlstt_num->free_result(); 

$userdata['num-of-post'] = $num_of_post/2;
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

if (isset($_FILES['fileToUpload'])) {

    if ($_FILES['fileToUpload']['error'] == 0) {
        
        $file_path = $_FILES['fileToUpload']['tmp_name'];
        $file_name = $_FILES['fileToUpload']['name'];

        move_uploaded_file($file_path, "../uploads/" . $file_name);
        $image_path = "uploads/" . $file_name;
      $userdata["profile_image"]="../".$image_path;
      $_SESSION['userdata']=$userdata;
      $imgpt=$userdata["profile_image"];
     
      $sql = "UPDATE users SET profile_image = '$imgpt' WHERE user_id=$userid;";
      $conn->query($sql);

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
    <script>
    function submitForm() {
        document.getElementById("myForm").submit();
    }
</script>
</head>

<body>
    <div class="main">
        <!-- left side  -->
        <div class="sideProfile">
        <div class="imageprofile">
    <form action="profile.php" method="post" enctype="multipart/form-data" id="myForm">
        <label for="file-upload" class="custom-file-upload">
            <img class="img" src=<?php echo $userdata['profile_image'] ?> alt="profile image">
        </label>
        <input style="display:none" id="file-upload" type="file" name="fileToUpload" onchange="submitForm()">
    </form>
</div>
            <div class="userinfo">

                
                <h2><?php echo $userdata['name']?></h2>

               
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
  <p>".$bookdata[$i]['num-of-posts']/2 ." posts</p>
  </div>
</div>";
}
?>
            </div>

        </div>

        <div class="aboutM">
            <form action="profile.php" method="post">
                <input type="submit" name="logout"value="logout">
            </form>
        <a href="aboutUs.php">About Us</a>
<p class="coppyR">© 2023 KoyaUniveristy. All rights reserved.</p>
</div>

    </div>
    
</body>

</html>
