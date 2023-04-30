<?php
$logoPath = "../assets\logo.svg";
include '../includes/navbar.php';
include '../includes/connection_to_sql.php';

// Assuming $conn is the database connection object

// Fetch all book names from books table
$sql = "SELECT book_id, book_title FROM books";
session_start();
$result = $conn->query($sql);

$userdata=$_SESSION['userdata'];
// Check if any results were returned
if ($result->num_rows > 0) {
    // Initialize an empty array to hold the book names
    $books = array();

    // Loop through each row in the result set and add the book id and name to the array
    while ($row = $result->fetch_assoc()) {
        $books[$row['book_id']] = $row['book_title'];
    }
}

if(isset($_POST["submit"])){

    $postTitle=$_POST["post-title"];
    $postDetail=$_POST["post-desc"];
    $selectedbook=$_POST["selectbook"];
 
    if (empty($postTitle) || empty($postDetail) || empty($selectedbook)) {
        echo "Please enter all required fields.";
    } else {
        $userid=intval($userdata['user_id']);
        $stmt = $conn->prepare("INSERT INTO posts (user_id, book_id, post_title, post_detail) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("iiss", $userid, $selectedbook, $postTitle, $postDetail);
        if($stmt->execute()) {
            header("location: home.php");
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
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
    <link rel="stylesheet" href="../styles/addposts.css">
    <style>
    
    </style>
</head>

<body>
    <div class="main">
        <h2>Add Post</h2>
        <form action='' method="post">
            <input type="text" name="post-title" id="post-title" placeholder="Write Post Title">
            <textarea placeholder="Write Post Description" name="post-desc" id="post-desc" cols="40" rows="10"></textarea>
            <div class="select book">
                <select name="selectbook" id="">
                    <option value="">Select a book</option>
                    <?php foreach ($books as $id => $name): ?>
                        <option value="<?php echo $id; ?>"><?php echo $name; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <input type="submit" value="add" name="submit" class="subBtn">
        </form>
    </div>
</body>

</html>
