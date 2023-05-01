<?php
$logoPath = "../assets\logo.svg";
include "../includes/navbar.php";
include '../includes/connection_to_sql.php';

session_start();
if (isset($_POST["like"]) && isset($_POST["post_id"])) {
    $post_id=$_POST["post_id"];
$user_id=$_SESSION['userdata']['user_id'];
    $query1 = "SELECT COUNT(*) as count FROM likes WHERE user_id = $user_id AND post_id = $post_id";
$result = $conn->query($query1);
$row = $result->fetch_assoc();

if ($row['count'] > 0) {
    $post_id = $_POST["post_id"];
    $sql = "UPDATE posts SET num_of_like = num_of_like - 1 WHERE post_id = $post_id";
    $conn->query($sql);
    $query2 = "DELETE FROM likes WHERE user_id = $user_id AND post_id = $post_id";
  $result = $conn->query($query2);
} else {
   
    $post_id = $_POST["post_id"];
    $sql = "UPDATE posts SET num_of_like = num_of_like + 1 WHERE post_id = $post_id";
    $conn->query($sql);
    $query3 = "INSERT INTO `likes` (user_id, post_id) VALUES ($user_id, $post_id)";
    $conn->query($query3);
 
}
}
if (!isset($_SESSION["userdata"])) {
    header("location:../index.php");
}
if (isset($_POST["logout"])) {

    session_destroy();
    header("location:../index.php");
}


$sql = "SELECT p.post_id,p.book_id, u.name, u.username, p.post_title, p.post_detail, b.book_title,p.num_of_like FROM posts p , users u, books b where p.book_id=b.book_id and u.user_id=b.user_id;";

$result = $conn->query($sql);

// Create 2D array to hold data
$data = array();


if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = array(
            'username' => $row["username"],
            'name' => $row['name'],
            'book-title' => $row['book_title'],
            'post-title' => $row['post_title'],
            'post-desc' => $row['post_detail'],
            'number-like' => $row['num_of_like'],
            'post_id'=>$row['post_id'],
            'number-comment' => 20
        );
    }
};



if (isset($_SESSION["userdata"])) {
    $userdata = $_SESSION['userdata'];
    //echo "welcome".$_SESSION['userdata']['name'];
    // access
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/home.css?<?= time() ?>">
    <title>Document</title>


</head>

<body>
    <section class="container">

        <div class="side">
            <ul class="sidebar">
                <li>

                    <a href="profile.php"><?php echo $userdata['name'] ?></a>
                </li>
                <?php
                if ($userdata['type'] == 'writer') {
                    echo '
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
                    
                    ';
                }
                ?>

                <li>
                    <img class="img-sidebar" src="../assets/books.svg" alt="" srcset=""><a href="books.php">books</a>
                </li>
                <div class="hr"></div>
                <form action="home.php" method="post">
                    <input type="submit" value="logout" name="logout">
                </form>

            </ul>

        </div>


        <div class="home-feed">

            <?php
            $counter = 0;
            for ($i = 0; $i < count($data); $i++) {

                echo "
                <div class='posts'>
                <div class='profile-info'>
                
                   
                    <img class=img-profile src=../assets/profile-pic.png >
                    <div class=con-profile-data>
                    <div class=con-name-username>
                    <h3 class='name'>" . $data[$i]['name']  . "</h3>
                    <h4 class='username'>" . $data[$i]['username']  . "</h4>
                    </div>
                    <h4 class='username'>" . $data[$i]['book-title'] . "</h4>
                    </div>
                  
                </div>
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
                      <img class='like-user' src='../assets/like-user.svg'>
                      like
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