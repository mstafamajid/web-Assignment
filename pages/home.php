<?php
session_start();
$logoPath = "../assets\logo.svg";
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
if (isset($_SESSION["userdata"])) {
    $userdata = $_SESSION['userdata'];
    //echo "welcome".$_SESSION['userdata']['name'];
}
include "../includes/navbar.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .container {
            display: flex;
            flex-direction: row;
            gap: 30px;
            height: 100%;
            width: 100%;
        }

        .side {
            display: flex;
            background-color: green;
        }

        .side ul li {
            list-style: none;
        }

        .side ul li a {
            text-decoration: none;
            color: #FFF;
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
    </style>
</head>

<body>
    <div class="container">
        <div class="side">
            <ul>
                <li><a href=""><?php echo $userdata['name'] ?></a></li>
                <li><a href="../pages/addbook.php">add books</a></li>
                <li><a href="../pages/addposts.php">add posts</a></li>
                <li><a href="">books</a></li>
            </ul>
        </div>
        <div class="home-feed">

            <?php
            $counter = 0;
            for ($i = 0; $i < count($dummyData); $i++) {

                echo "
                <div class='posts'>
                <div class='profile-info'>
                    <div class='picture-profile'></div>
                    <h3 class='name'>" . $dummyData[$i]['name']  . "</h3>
                    <h4 class='username'>" . $dummyData[$i]['username']  . "</h4>
                    
                    <h4 class='book-name'>" . $dummyData[$i]['book-title'] . "</h4>
                </div>
                <div class='post-info'>
                    <h2 class='title'>" . $dummyData[$i]['post-title'] . "</h2>
                    <p class='post-desc'>" . $dummyData[$i]['post-desc'] . "</p>
                </div>
                <div class='reactions-info'>
                    <div class='like-num'>" . $dummyData[$i]['number-like'] . "</div>
                    <div class='comment-num'>" . $dummyData[$i]['number-comment'] . "</div>
                </div>
                <hr color='black'>
                  <div class='buttons'>
                    <div class='like'>like </div>
                    <div class='comment'>comment</div>
                  </div>
                </div>
            ";
            }
            ?>
        </div>
    </div>
</body>

</html>