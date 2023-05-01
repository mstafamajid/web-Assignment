<?php
$logoPath = "../assets/logo.svg";
include '../includes/navbar.php';
include '../includes/connection_to_sql.php';

session_start();
$userdata=$_SESSION['userdata'];
if (isset($_FILES['image'])) {

    if ($_FILES['image']['error'] == 0) {

        $file_path = $_FILES['image']['tmp_name'];
        $file_name = $_FILES['image']['name'];

        move_uploaded_file($file_path, "../uploads/" . $file_name);
        $image_path = "uploads/" . $file_name;
     
    }
}

if (isset($_POST['addbook'])) {

    $bookName = $_POST['book-name'];
    $bookDesc = $_POST['book-desc'];

    if (empty($bookName) || empty($bookDesc)) {
        echo "Please enter all required fields.";
    } else {
        $userid=intval($userdata['user_id']);
        $stmt = $conn->prepare("INSERT INTO books (`user_id`,`book_title`, `book_description`, `image_path`) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("isss",$userid, $bookName, $bookDesc, $image_path);
        $stmt->execute();
        $stmt->close();
        header("location: home.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Book</title>
    <link rel="stylesheet" href="../styles/addbooks.css?<?=time()?>">
    <style>

    </style>
</head>

<body>
    <div class="main">
        <h2>Add Book</h2>
        <form action='' method="post" enctype="multipart/form-data">
            <input type="text" name="book-name" id="book-name">
            <textarea name="book-desc" id="book desc" cols="40" rows="10"></textarea>
            <div class="upload-cover">
                <div class="icon">
                    <img src="../assets/addbook.svg" alt="">
                </div>
                <h4>upload book photo</h4>
                <input type="file" name="image" id="upload">
            </div>
            <input type="submit" value="add" class="subBtn" name="addbook">
        </form>
    </div>
</body>

</html>
