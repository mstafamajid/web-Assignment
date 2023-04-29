<?php
// Validate input fields
// Check if username and email already exist
// Store input data to database

include('../includes/connection_to_sql.php');

$errors = [];
$data = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_fields = ['name', 'username', 'email', 'password', 'confirm-password', 'role'];

    foreach ($input_fields as $field) {
        if (empty($_POST[$field])) {
            $errors[$field] = ucfirst(str_replace("-", " ", $field)) . " is required.";
        } else {
            $data[$field] = $_POST[$field];
        }
    }

    if (!empty($_POST['email']) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Please enter a valid email address.";
    }

    if (!empty($_POST['password']) && !empty($_POST['confirm-password']) && $_POST['password'] !== $_POST['confirm-password']) {
        $errors['confirm-password'] = "Passwords do not match.";
    }
$username=$conn->real_escape_string( $data['username']);
$email=$conn->real_escape_string( $data['email']);

    // Check if username and email already exist in database
    $stmt = $conn->prepare("SELECT * FROM `users` WHERE `username` = ? OR `email` = ?");
    $stmt->bind_param("ss",$username ,$email);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    if ($result) {
        if ($result['username'] === $data['username']) {
            $errors['username'] = "Username already exists.";
        }
        if ($result['email'] === $data['email']) {
            $errors['email'] = "Email already exists.";
        }
    }

    if (empty($errors)) {
        $stmt = $conn->prepare("INSERT INTO `users` (`username`, `name`, `email`, `password`, `type`) VALUES (?, ?,?,?,?)");
        $stmt->bind_param("sssss", $data['username'], $data['name'], $data['email'], $data['password'], $data['role']);
        
        if ($stmt->execute()) {
            // Redirect to success page
           
            header('location: ../index.php');
        } else {
            echo "Error: " . $conn->error;
        }
    }else{
    
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
    <script src="../js/signup.js" defer></script>
<link rel="stylesheet" href="../styles/signup.css">


</head>

<body>


    <div class="container">



        <div class="leftSide">
            <h2>Welcome to</h2>
            <img src="../assets/logoW.svg" alt="aaaaaaaaa">
            <p>Welcome to our website, your one stop
                destination for books and information about
                books. With our user-friendly interface, you can
                easily read post reviews. Join our community of
                book lovers today and immerse yourself in the
                wonderful world of literature!</p>
            <div>
                <a href="../index.php" class="signupBtnn">Login</a>
            </div>
        </div>


        <div class="rightSide">
            <h2>Sign Up</h2>

            <form action="signup.php" method="POST">

                <div class="nm">
                    <div>
                        <input type="text" id="name" name="name" placeholder="Enter your name">
                        <br>
                        
                        
                            <?php
                             if (!empty($errors['name'])) echo "<span class='error-input-signup'>".$errors['name']."</span>";
                        
                            ?>
                    </div>

                    <div> <input type="text" id="username" name="username" placeholder="Choose a username"><br>
                        <?php
                        if (!empty($errors['username'])) echo "<span class='error-input-signup'>".$errors['username']."</span>";

                        ?> </div>

                </div>


                <br>

                <input type="email" id="email" name="email" placeholder="Enter your email"><br>
                <?php
                if (!empty($errors['email'])) echo "<span class='error-input-signup'>".$errors['email']."</span>";

                ?><br>

                <input type="password" id="password" name="password" placeholder="Enter a password"><br>
                <?php
                if (!empty($errors['password'])) echo "<span class='error-input-signup'>".$errors['password']."</span>";

                ?><br>

                <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm your password"><br>
                <?php
                if (!empty($errors['confirm-password'])) echo "<span class='error-input-signup'>".$errors['confirm-password']."</span>";

                ?><br>

                <input type="radio" id="writer" name="role" value="writer">
                <span class="remember">Writer</span>

                <input type="radio" id="reader" name="role" value="reader" checked>
                <span class="remember">Reader</span><br><br>

                <input type="submit" value="SignUp" name="submit" >
                

            </form>

        </div>








    </div>


</body>

</html>